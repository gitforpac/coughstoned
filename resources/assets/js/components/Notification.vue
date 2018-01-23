<template>
    <li class="dropdown notifications-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" v-on:click="MarAsRead(userid)">
          <i class="fa fa-bell-o"></i>
          <span class="label label-warning">{{unreadNotifications.length}}</span>
        </a>
        <ul class="dropdown-menu">
          <li class="header">You {{unreadNotifications.length}} notifications</li>
          <li>
            <!-- inner menu: contains the actual data -->
            <ul class="menu">
              <li v-for="unread in unreadNotifications" class="ur">
                <a href="javascript:void(0)" id="viewbookingsbtn" :data-id="unread.data.package.id" v-on:click="MarAsRead(userid)">
                 <i class="fa fa-book" aria-hidden="true"></i> <strong>{{ unread.data.package.name }}</strong> has a new booking.
                </a>
              </li>
              <li v-for="notification in allNotifications">
                <a href="javascript:void(0)" id="viewbookingsbtn" :data-id="notification.data.package.id" v-on:click="MarAsRead(userid)">
                 <i class="fa fa-book" aria-hidden="true"></i> <strong>{{ notification.data.package.name }} </strong>has a new booking.
                </a>
              </li>
            </ul>
          </li>
          <li class="footer"><a href="#">View all</a></li>
        </ul>
    </li>

</template>

<script>
    export default {
        props: ['notifications','unreads','userid'],
        data() {
          return {
            unreadNotifications: this.unreads,
            allNotifications: this.notifications,
            notifFlag: 'closed',
          }
        },
        methods: {
          MarAsRead: function(id) {

            if(this.notifFlag === 'closed'){
              this.notifFlag = 'open';
            } else if(this.notifFlag === 'open') {
              this.notifFlag = 'closed';
              axios.post('/notifications/read/'+id).then( () =>{
                this.unreadNotifications = [];
              });
              axios.get('/notifications/get/'+id).then( (res) => {
                this.allNotifications = res.data;
              });
            }

          }
        },
        mounted() {
          Echo.channel('App.Admin.'+this.userid)
             .listen(".Illuminate\\Notifications\\Events\\BroadcastNotificationCreated", (e) => {
                  let newUnreads = {data:{package: e.package,}};
                  this.unreadNotifications.push(newUnreads);
                  this.$notify({
                      text: '<p style="font-size:16px;line-height:25px!important"><strong>'+newUnreads.data.package.name+' </strong>has a new booking</p>',
                      type: 'success',
                      duration: 5000,
                    });
              });
        }
    }
</script>
