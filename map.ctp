        <html>
        <head>
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
        <meta charset="utf-8">
        <meta http-equiv="refresh" content="120">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <title>Location Track </title>
        <style>
        #map {height: 100%;}
        html, body {
          height: 80%;
          margin: 0;
          padding: 0;
        }
        
         #panel {
          position: absolute;
          top: 10px;
          right: 5%;
          z-index: 5;
          text-align: left;
        }
        #start1{
          text-overflow: ellipsis;
          white-space: nowrap; 
          width: 200px; 
          overflow: hidden; 
        }
        </style>
      </head>
      <body>
        <div id="panel" style="margin-top:150px;"> 
            <input type="text" id="start1" value="<?php echo $this->Session->read('TEMPLAT'); ?>,<?php echo $this->Session->read('TEMPLONG'); ?>">
            <input type="hidden" id="end1" value="<?php echo $CURLAT; ?>,<?php echo $CURLONG; ?>"> <br>
            <label>Driver ID/Name :<?php echo $Driverid;?>/<?php echo $Drivername; ?>
            </label> <br>
            <label>Car Number :<?php echo $Carnumber; ?></label> <br>
            <label>Car Sim Number :<?php echo $Carsimnumber ;?></label> <br>
            <div id="result"></div>
        </div>
    
      <div id="map" style="margin-top: 120px;"></div>
      <script>  
             var values=[];
             var waypts=[];
              
              // values.push(new google.maps.LatLng(,));// we have to continue from here
             
              // if (typeof(Storage) !== "undefined") {
              //   sessionStorage.setItem("lastname", values);        
              // } else {
              //   document.getElementById("result").innerHTML = "Sorry, your browser does not support Web Storage...";
              // }

        var position1={lat:16.7741495,lng:96.1569669};
        var position2={lat:16.779557,lng:96.150591};
       
       function initMap() { 
        var directionsService = new google.maps.DirectionsService;
        var directionsDisplay = new google.maps.DirectionsRenderer({
        polylineOptions: {strokeColor: "red"}
          });      
         var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 10,
            center: {lat:16.7741495,lng:96.1569669}
              });
          directionsDisplay.setMap(map);
          calculateAndDisplayRoute(directionsService, directionsDisplay);   
        }
        
        function calculateAndDisplayRoute(directionsService, directionsDisplay) {

            //  for(var i=0;i<values.length;i++)
            //   { 
            //  waypts.push({location:values[i],stopover:false}); 
            //   } 
            //   directionsService.route({ 
            //   origin: position1,
            //   destination: position2,
            //   waypoints: waypts,
            //   optimizeWaypoints: true,
            //   travelMode: 'DRIVING'
            // }, function(response, status) {
            //   if (status === 'OK') {
            //     directionsDisplay.setDirections(response);
            //     var route = response.routes[0];

            //    } else {
            //     window.alert('Directions request failed due to ' + status); 
            //   }
            // });


                var first=new google.maps.LatLng(16.777053,96.153742);
                var second=new google.maps.LatLng(16.779477,96.153324);
                var third=new google.maps.LatLng(16.782107,96.153324);
                var fourth=new google.maps.LatLng(16.795429,96.150448);
                var sixth=new google.maps.LatLng(16.794056,96.144850);
                var seven=new google.maps.LatLng(16.780153,96.147760);
 
               directionsService.route({ //WALKING
                origin: position1,
                destination: position2,
                waypoints:  [{location: first, stopover: false},
                              {location: second, stopover: false},
                              {location: third, stopover: false},
                              {location: fourth, stopover: false},
                              {location: sixth, stopover: false},
                              {location: seven, stopover: false},
                              ],
                optimizeWaypoints: true,
                travelMode: 'DRIVING'
              }, function(response, status) {
                if (status === 'OK') {
                  directionsDisplay.setDirections(response);
                  var route = response.routes[0];

                 } else {
                  window.alert('Directions request failed due to ' + status); 
                }
              });
             //} one of right way

             /*values=[first,second,third,fourth,sixth,seven];            
             for(var i=0;i<values.length;i++)
              { 
             waypts.push({location:values[i],stopover:false}); 
              } 
              directionsService.route({ 
              origin: position1,
              destination: position2,
              waypoints: waypts,
              optimizeWaypoints: true,
              travelMode: 'DRIVING'
            }, function(response, status) {
              if (status === 'OK') {
                directionsDisplay.setDirections(response);
                var route = response.routes[0];

               } else {
                window.alert('Directions request failed due to ' + status); 
              }
            });one of right way*/
          }
        
///////testing for array list
// ArrayList<LatLng> locations = new ArrayList();
// locations.add(new LatLng(30.243442, -1.432320));
// locations.add(new LatLng(... , ...));
// .
// .
// .

// for(LatLng location : locations){
//     mMap.addMarker(new MarkerOptions()
//         .position(location)
//         .title(...)
// }
      </script>
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAFwIKbZKLKiJD41L3D3TueT_UL2fdIeck&callback=initMap&libraries=places,geometry">
        </script>
        
     </body>
    </html> 
