<!DOCTYPE html>
<html>
<head>
	<link href="assets/ionicons-2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css"/>
	<link href="assets/css/style.css" rel="stylesheet" type="text/css"/>
	<script src="assets/js/jquery-1.11.3.min.js"></script>
	<script src="http://maps.googleapis.com/maps/api/js?libraries=places"></script>
	<script src="assets/js/simpleModalJS.js"></script>
	
</head>

<body>
	<!--MODALS-->
	<div id="simplemodal-modal">
		<i class="simplemodal-close icon ion-close-round"></i>
		<div class="content">
			<h2>
				Add a new location
			</h2>
			<hr/>
			<p>
				<form>
					<div class="formgroup">
						<label>Name:</label>	<input type="text" name="name" placeholder="Enter your name"/>
					</div><br/><br/>
					<div class="formgroup">
						<label>Email:</label>	<input type="email" name="email" placeholder="Enter your email"/>
					</div><br/><br/>
					<div class="formgroup">
						<label>Current Address:</label>	<input type="text" id="google-loc" name="loc" class="loc" placeholder="Address (ex. 148 Elm St.)"/>
					</div>
					<div class="formgroup">
						<textarea name="desc" placeholder= "place a unique description of yourself"></textarea>
					</div><br/><br/>
				</form>
			</p>
		<div style="clear:both;"></div>
		</div>
	</div>
	<!--End of Modals-->
	
<div id="googleMapContainer">
	<div id="user-controls">
		<ul class="user-controls-list">
			<li><a href="#" class="new-content-btn"><i class="icon ion-compose"></i></a></li>
		</ul>
	</div>
	<div id="googleMap" style="width:100%;height:620px;">
	
	</div>
</div>

</body>
<!--MODALS-->
	<script>
		
	jQuery(function ($) {
	// Load dialog on page load
	//$('#basic-modal-content').modal();

	// Load dialog on click
	$('.new-content-btn').click(function (e) {
		$('#simplemodal-modal').modal({
			onShow : function() {
				var input = document.getElementById('google-loc');
	
	var defaultbounds = new google.maps.LatLngBounds(
	new google.maps.LatLng(-90,-180),
	new google.maps.LatLng(90,180));
	
	var options = {
		bounds:defaultbounds
	};
	var autocomplete = new google.maps.places.Autocomplete(input,options);
			},
			
			onClose : function() {
				$('#google-loc').unbind();
				$('.pac-container').remove();
				$.modal.close();
			}
			
		});

		return false;
	});
		
	
});
	</script>
<!--END OF MODALS-->
	
	<!--Google Maps -->
		
<script>
function initialize() {
  var mapProp = {
    center:new google.maps.LatLng(39.9465097,-97.3788671),
    zoom:4,
	zoomControl:false,
	  scrollwheel:false,
	  scaleControl:false,
	  draggable:false,
    disableDefaultUI: true,
    mapTypeId:google.maps.MapTypeId.ROADMAP
  };
  var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
	 var strictBounds = new google.maps.LatLngBounds(
     new google.maps.LatLng(28.70, -127.50), 
     new google.maps.LatLng(48.85, -55.90)
   );
	
	//Markers
	var image = {
		url: "assets/images/bubble-marker.png",
		 size: new google.maps.Size(20, 20),
		origin: new google.maps.Point(0,0),
		
	};
	var myLatLng = new google.maps.LatLng(39.9465097, -97.3788671);
  	var marker = new google.maps.Marker({
		 position: myLatLng,
		 map: map,
		 title: 'test',
		 icon: image
	  });
	

	var contentString = '<div id="content">'+
	    '<h5>Marker Header</h5><hr/>'+
	    '<ul style="display:block;margin:0px !important;list-style-type:none;"> <li>Richard Abear</li><li>Pittsburgh, Pennsylvania</li><br/><br/><li><b>Description:</b> Sibling</li></ul>';
      '</div>';

  var infowindow = new google.maps.InfoWindow({
      content: contentString
  });
	
	google.maps.event.addListener(marker, 'click', function() {
    		infowindow.open(map, marker);
	}); 
	
	
	
}
google.maps.event.addDomListener(window, 'load', initialize);
	
</script> <!-- End of google Maps -->
</html>