<?php include "inc/header.php"; ?>

	<div class="content contemplete clear">
		<div class="mainContent templete clear">
		  <div class="about">
		  	<h2>Contact Us</h2>
		  		<table>
		  			<tr>
		  				<td>First Name</td>
		  				<td><input type="text" name="name" placeholder="Enter First Name"></td>
		  			</tr>
		  			<tr>
		  				<td>Last Name</td>
		  				<td><input type="text" name="name" placeholder="Enter Last Name"></td>
		  			</tr>
		  			<tr>
		  				<td>Email Address</td>
		  				<td><input type="email" name="email" placeholder="Enter Email Addr"></td>
		  			</tr>
		  			<tr>
		  				<td>Your Message</td>
		  				<td>
		  					<textarea name=""></textarea>
		  				</td>
		  			</tr>
		  			<tr>
		  				<td></td>
		  				<td><input type="submit" name="submit" value="submit"></td>
		  			</tr>
		  		</table>
		  </div>

					<div class="googleMap">
						<div id="map"></div>
					</div>

		</div>
		<?php include "inc/sidebar.php"; ?>
	</div>
	<?php include "inc/footer.php"; ?>

	<div class="fixedIcon clear">
		<a href="https://www.facebook.com"><img src="images/fb.png" alt="facebook"></a>
		<a href="https://www.twitter.com"><img src="images/tw.png" alt="Twitter"></a>
		<a href="https://www.google.com"><img src="images/gl.png" alt="Google"></a>
		<a href="https://www.linkedin.com"><img src="images/lin.png" alt="linked"></a>
	</div>

<script src="http://maps.google.com/maps/api/js"></script>
  <script src="js/gmaps.js"></script>

	<script type="text/javascript">
    var map;
    $(document).ready(function(){
      var map = new GMaps({
        el: '#map',
        lat: 23.7805733,
        lng: 90.2792342
      });

      GMaps.geolocate({
        success: function(position){
          map.setCenter(position.coords.latitude, position.coords.longitude);
        },
        error: function(error){
          alert('Geolocation failed: '+error.message);
        },
        not_supported: function(){
          alert("Your browser does not support geolocation");
        },
        always: function(){
          alert("Done!");
        }
      });
    });
  </script>
</body>
</html>