

class Packages {

	getPackages() {

		axios.get('/loadpackages')
          .then(function(response) {
            //initialize data
            var packages = response.data;
            var cebu = {lat: 9.9557, lng: 123.4008};
            var mapoptions = {
              zoom: 10,
              center: cebu
            };

            var gm = new google.maps.Map(document.getElementById('maps'), mapoptions);

            if(packages.length == null || packages.length == undefined ) {
                packages = new Array(packages);
            }
            if(packages.length !== 0 || packages !== "") {
            packages.map(function(p){
                var marker = new google.maps.Marker({
                  position: {lat: p.latitude, lng: p.longitude},
                  map: gm,
                  icon: 'img/m2.png',
                });

                var mcontent = '<div class="map-content">';
                mcontent += '<a href="/adventure/'+p.id+'"><img src="/storage/cover_images/'+p.thumb_img+'"></a>';
                mcontent += '<h3 class="c-header">'+p.name+'</h3>';
                mcontent += '<h3 class="c-price">₱'+p.price+' per person</h3>';
                mcontent += '<span class="c-rate">12 Review(s)</span>'
                mcontent += '</div>';

                var infoBubble = new InfoBubble({
                  maxWidth: 265,
                  content: mcontent,
                  padding: 0,
                  borderRadius: 2,
                  arrowSize: 5,
                  borderWidth: 0,
                  disableAutoPan: false,
                  disableAnimation: false,
                  hideCloseButton: false,
                  arrowPosition: 30,
                  arrowStyle: 1,
                  minHeight: 290,
                  autopanMargin: 54,
                  closeSrc: '/img/cancel.png',
                });
                marker.addListener('click',function(){
                    if (!infoBubble.isOpen()) {
                        infoBubble.open(gm, marker);
                      }
                })


            }) 
        } 

      })

	}



}