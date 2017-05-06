<!DOCTYPE html>
<html lang="en">
<head>
	<?php include('head.php');?>
</head>
<body class="grey lighten-4">
  <?php include('nav-main.php'); ?>

	<div class="container">
		<div class="section">
				<?php
				if($intent == 0){
					echo form_open_multipart('places/insert','id="formPlace"');
				} else {
					echo form_open_multipart('places/update/'.$place['ID_PLACE'],'id="formPlace"');
				}
				?>
				<div class="row">
					<div class="col m9 s12 card" style="padding: 20px!important;">
						  <div class="row">
							<div class="input-field col s12">
							  <input id="title" type="text" class="validate" name="titlePlace" required value="<?php echo $place['TITLE'] ;?>">
							  <label for="title">Title</label>
							</div>
						  </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="featuredItem" type="text" class="validate" name="featuredItemPlaces" required value="<?php echo $place['FEATURED_ITEM'] ;?>">
                                <label for="featuredItem" id="labelFeaturedItem">Land Mark</label>
                            </div>
                        </div>

<!--                        UPLOAD IMAGE-->

						  <div class="row">
							  <div class="col s12">
								<div class="file-field input-field">
								  <div class="btn red">
									  <?php if($intent==0){ ?>
									<input type="file" name="userfilePlace" size="20" required>
									  <?php }else{ ?>
									  <input type="file" name="userfilePlace" size="20" >
									  <?php } ?>
									<span><i class="material-icons white-text left">add_a_photo</i> Leave a picture..</span>
								  </div>
								  <div class="file-path-wrapper">
									<input class="file-path validate" type="text">
								  </div>
								</div>
							  </div>
						  </div>

						<div class="row">
                            <div class="col s12">
                                <div class="input-field col s9">
                                    <input id="address" class="validate" type="text" value="<?php echo $place['ADDRESS'] ;?>" name="addressPlace" required>
                                </div>

                                <button id="geo" class="btn waves-effect waves-light btn-large red col s3" type="button" value="Search">Search
                                    <i class="material-icons right">search</i>
                                </button>
                            </div>
                        </div>
                        <div class="row">
                                <div class="col s12">
                                <div id="googleMap" style="width:100%;height:400px;"></div>
                                </div>
                                <script>
                                    function myMap() {
                                        var mapProp = {
                                            center:new google.maps.LatLng(-6.229728,106.6894294),
                                            zoom:17,
                                        };
                                        var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);

                                        var geocoder = new google.maps.Geocoder();

                                        document.getElementById('geo').addEventListener('click', function() {
                                            geocodeAddress(geocoder, map);
                                        });
                                    }

                                    function geocodeAddress(geocoder, resultsMap) {
                                        var address = document.getElementById('address').value;
                                        geocoder.geocode({'address': address}, function(results, status) {
                                            if (status === 'OK') {
                                                resultsMap.setCenter(results[0].geometry.location);
                                                var marker = new google.maps.Marker({
                                                    map: resultsMap,
                                                    position: results[0].geometry.location
                                                });
                                            } else {
                                                alert('Geocode was not successful for the following reason: ' + status);
                                            }
                                        });
                                    }
                                </script>

                                <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC4Jv-i8bxCoWevDD0Q7JZrvoJykZKRirk&callback=myMap"></script>

						</div>

                        <div class="row">

								  <div class="input-field col s12" style="margin-bottom: 24px;">
									  <textarea id="descriptionTour" class="materialize-textarea" data-length="4000" maxlength="4000" name="descriptionPlace" required><?php echo $place['DESCRIPTION'];?></textarea>
									  <label for="textarea1">Description</label>
								  </div>

						  </div>
					</div>
					<div class="col m3 s12 card side-form" style="padding: 20px!important;">
						<div class="row">
							<p class="col s12">Category</p>
							<?php if ($place['TYPE']=="MARKET"){ ?>
								<p class="col s12" onclick="selectType()">
									<input class="with-gap" name="typePlaces" type="radio" id="tourism" value="TOURISM"/>
									<label for="tourism">Tourism</label>
								</p>
								<p class="col s12" onclick="selectType()" onload="selectType()">
									<input class="with-gap" name="typePlaces" type="radio" id="markets" value="MARKETS" checked/>
									<label for="markets">Markets</label>
								</p>
							<?php }else { ?>
								<p class="col s12" onclick="selectType()">
									<input class="with-gap" name="typePlaces" type="radio" id="tourism" value="TOURISM" checked/>
									<label for="tourism">Tourism</label>
								</p>
								<p class="col s12" onclick="selectType()">
									<input class="with-gap" name="typePlaces" type="radio" id="markets" value="MARKETS"/>
									<label for="markets">Markets</label>
								</p>
							<?php }?>
						</div>
						<div class="row">
							<div class="input-field col s12">
								<input id="operationTime" type="text" class="validate" name="operationalTimePlaces" value="<?php echo $place['OPERATIONAL_TIME'] ;?>">
								<label for="operationTime">Operation Time</label>
							</div>
						</div>
						<div class="row" id="conPrice" style="display: none;">
                            <div class="input-field col s12">
                                <input id="averagePrice" type="number" class="validate" name="averagePricePlaces" value="<?php echo $place['AVERAGE_PRICE'];?>">
                                <label for="averagePrice">Average Price</label>
                            </div>
                        </div>

                        <div class="row">
							<div class="input-field col s12">
                                <textarea id="textarea1" class="materialize-textarea" name="hashTagPlace"><?php echo $place['HASH_TAG'] ;?></textarea>
                                <label for="textarea1">Hash Tag</label>
							</div>
						</div>
						<script>
							function selectType() {
								var label = document.getElementById('labelFeaturedItem');
								var tourism = document.getElementById('tourism');
								var price = document.getElementById('conPrice');

								if (tourism.checked == true){
									label.innerHTML= "Land Mark";
									price.style= "display : none!important;";
								}else{
									label.innerHTML= "Featured Item";
									price.style= "display : block!important;";
								}
							}
						</script>
						<div class="row">
							<div class="col s12">
							<button class="btn waves-effect waves-light  btn-large right col s12" type="submit" name="submit">
								Publish
								<i class="material-icons right">send</i>
							</button>
							</div>
						</div>
					</div>
				</div>

				</form>
			</form>
		</div>
		</div>
	</div>
  <style>
	@media screen and (min-width: 601px) {
		.side-form{
			transform: translate(20px,0);
		}
	}
  </style>
  <style>

      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
          height: 100%;
      }
      .controls {
          margin-top: 10px;
          border: 1px solid transparent;
          border-radius: 2px 0 0 2px;
          box-sizing: border-box;
          -moz-box-sizing: border-box;
          height: 32px;
          outline: none;
          box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
      }

      #pac-input {
          background-color: #fff;
          font-family: Roboto;
          font-size: 15px;
          font-weight: 300;
          margin-left: 12px;
          padding: 0 11px 0 13px;
          text-overflow: ellipsis;
          width: 300px;
      }

      #pac-input:focus {
          border-color: #4d90fe;
      }

      .pac-container {
          font-family: Roboto;
      }

      #type-selector {
          color: #fff;
          background-color: #4d90fe;
          padding: 5px 11px 0px 11px;
      }

      #type-selector label {
          font-family: Roboto;
          font-size: 13px;
          font-weight: 300;
      }
  </style>
  </body>
</html>
