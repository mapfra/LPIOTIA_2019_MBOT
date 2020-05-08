function initMap(){
      // Map options
      var options = {
      	zoom:8,
      	center:{lat:43.592128,lng:7.101313}
      }

      // New map
      var map = new google.maps.Map(document.getElementById('map'), options);
      
      // Listen for click on map
      google.maps.event.addListener(map, 'click', function(event){
        // Add marker
        addMarker({coords:event.latLng});
    });



      /*
      // Add marker
      var marker = new google.maps.Marker({
        position:{lat:42.4668,lng:-70.9495},
        map:map,
        icon:'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png'
      });

      var infoWindow = new google.maps.InfoWindow({
        content:'<h1>Lynn MA</h1>'
      });

      marker.addListener('click', function(){
        infoWindow.open(map, marker);
      });
      */

      var idTr=document.getElementById('idTr0');
   	  var cells =  idTr.cells;
   	  var cell0 = cells[0];
   	  console.log(cell0);

      // Array of markers
      var markers = [
      {
      	coords:{lat:43.592128,lng:7.101313},
      	content:'<h1>relevé 1</h1>'
      },
      {
      	coords:{lat:43.600395,lng:7.0901754},
      	content:'<h1>Amesbury MA</h1>'
      }

      ];

      

      // Loop through markers
      for(var i = 0;i < markers.length;i++){
        // Add marker
        addMarker(markers[i]);
    }
    

  //     	for( i=0; i<=10; i++) {
  //   	var idTr=document.getElementById('idTr'+i);
  //   	var cells =  idTr.cells;
  //   	var cellcount = cells.length;
  //   	cell0 = cells[0];
  //   	cell1 = cells[1];

		//     // ici tu en fais ce que tu veux.
		//     // par exemple : affichage dans la console du navigateur
		//     console.log(cell0);
		//     console.log(cell1);

		// }
   

      // Add Marker Function
      function addMarker(props){
      	var marker = new google.maps.Marker({
      		position:props.coords,
      		map:map,
          //icon:props.iconImage
      });

        // Check for customicon
        if(props.iconImage){
          // Set icon image
          marker.setIcon(props.iconImage);
      }

        // Check content
        if(props.content){
        	var infoWindow = new google.maps.InfoWindow({
        		content:props.content
        	});

        	marker.addListener('click', function(){
        		infoWindow.open(map, marker);
        	});
        }
    }
}