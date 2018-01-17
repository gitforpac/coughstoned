<template>
    <li class="dropdown notifications-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <i class="fa fa-bell-o"></i>
          <span class="label label-warning">{{notifications.length}}</span>
        </a>
        <ul class="dropdown-menu">
          <li class="header">You have notifications</li>
          <li>
            <!-- inner menu: contains the actual data -->
            <ul class="menu">
              <li v-for="notification in notifications">
                <a href="#">
                  {{ JSON.parse(notification.data).package.name }}
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
        props: ['notifications'],
    }
</script>
