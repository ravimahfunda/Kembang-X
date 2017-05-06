<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('head.php');?>
    <style>
        .article {
            padding: 20px!important;
        }
        .imageReview{
            height: 40vh!important;
            margin-bottom: 16px;
        }


        .gallery{
            padding: 0!important;
            height: 125px!important;
            background-size: cover;
            background-position: center;
        }

        .overlay{
            margin: 0!important;
            opacity: 0;
            transition: opacity 0.7s;
        }
        .gallery:hover > .overlay {
            cursor: pointer;
            width:100%;
            height:100%;
            position:relative;
            background-color:#000;
            opacity:0.3;
            background-size: auto;
        }
        .modal{
            border-radius: 5px!important;
        }

        @media screen and (min-width: 601px) {
            .article {
                padding: 40px!important;
            }
            .imageReview{
                height: 60vh!important;
                margin-bottom: 0px;
            }
            .gallery{
                height: 300px!important;
            }
        }

        @media screen and (max-width: 600px) {
            .header{
                height: 200px!important;
            }
            #googleMap{
                height: 200px!important;
            }
        }
    </style>
</head>
<body class="grey lighten-4">
<?php
    include('nav-main.php');
?>

<div class="container">
    <br/>
    <br/>
    <div class="section">
        <div class="row">
            <?php $img =  $place['IMAGE'];?>
            <div class="col s12 card medium header" style="background-image: url('<?php echo base_url();?>uploads/<?php echo $img;?>'); background-size: cover; background-position: center; padding: 16px;">
                <?php
                $tags = explode(" ",$place['HASH_TAG']);
                foreach ($tags as $tag){
                    ?>
                    <div class="chip white">
                        <?php echo $tag;?>
                    </div>
                    <?php
                }
                ?><br/>
            </div>

<!--            NAV WEAPON-->
            <div class="col s12 card hide-on-small-only" style="padding: 0;">

                <a class='dropdown-button btn-flat btn-large right btn-large grey-text darken-4 col s4 m3 l2' href='#' data-activates='shareDrop'><i class="material-icons right">share</i>Share</a>
                <?php if(isset($user)){?>
                    <?php if($beenReport < 1){?>
                    <a class="waves-effect waves-grey btn-flat right btn-large grey-text darken-4 col s4 m3 l2" href="#modal2"><i class="material-icons right">report_problem</i>Report</a>
                    <?php } else {?>
                    <a class="waves-effect waves-grey btn-flat right btn-large grey-text darken-4 col s4 m3 l2" href=""><i class="material-icons right red-text">report_problem</i>Reported</a>
                    <?php }?>
                    <?php if($beenReview < 1){?>
                        <a class="waves-effect waves-grey btn-flat right btn-large grey-text darken-4 col s4 m3 l2" href="#modal1"><i class="material-icons right">rate_review</i>Review</a>
                    <?php } else {?>
                        <a class="waves-effect waves-grey btn-flat right btn-large grey-text darken-4 col s4 m3 l2" href=""><i class="material-icons right teal-text">rate_review</i>Reviewed</a>
                    <?php }?>
                <?php }?>
            </div>
            <div class="col s12 card hide-on-med-and-up" style="padding: 0;">
                <a class='dropdown-button btn-flat btn-large right btn-large grey-text darken-4 col s4 m3 l2' href='#' data-activates='shareDrop'><i class="material-icons ">share</i></a>
                <?php if(isset($user)){?>
                    <?php if($beenReport < 1){?>
                        <a class="waves-effect waves-grey btn-flat right btn-large grey-text darken-4 col s4 m3 l2" href="#modal2"><i class="material-icons ">report_problem</i></a>
                    <?php } else {?>
                        <a class="waves-effect waves-grey btn-flat right btn-large grey-text darken-4 col s4 m3 l2" href=""><i class="material-icons  red-text">report_problem</i></a>
                    <?php }?>
                    <?php if($beenReview < 1){?>
                        <a class="waves-effect waves-grey btn-flat right btn-large grey-text darken-4 col s4 m3 l2" href="#modal1"><i class="material-icons ">rate_review</i></a>
                    <?php } else {?>
                        <a class="waves-effect waves-grey btn-flat right btn-large grey-text darken-4 col s4 m3 l2" href=""><i class="material-icons  teal-text">rate_review</i></a>
                    <?php }?>
                <?php }?>
            </div>

            <div id="modal1" class="modal">
                <?php echo form_open_multipart('places/review'); ?>
                    <div class="modal-content">
                        <h4>Give a word.. </h4>
                        <h5>Rate it..</h5>
                        <input type="hidden" name="id_place" value="<?php echo $place['ID_PLACE'];?>">
                        <select id="ratingBar" name="rate">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>

                        <div class="file-field input-field">
                            <div class="btn red">
                                <span><i class="material-icons white-text left">add_a_photo</i> Leave a picture..</span>
                                <input type="file" name="userfileReviewPlace" size="20">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text">
                            </div>
                        </div>
                        <div class="input-field col s12" style="margin-bottom: 24px;">
                            <textarea id="textarea1" class="materialize-textarea" data-length="200" name="notesReviewPlace"></textarea>
                            <label for="textarea1">Leave a note..</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn waves-effect waves-light btn-large" type="submit" name="action">Submit
                            <i class="material-icons right">send</i>
                        </button>
                    </div>

                </form>
            </div>

            <div id="modal2" class="modal">
                <?php echo form_open_multipart('places/report'); ?>
                <div class="modal-content">
                    <h4>Tell us your inconvenience.. </h4>
                    <input type="hidden" name="id_place" value="<?php echo $place['ID_PLACE'];?>">
                    <input type="hidden" name="type_place" value="<?php echo $place['TYPE'];?>">
                    <div class="input-field col s12" style="margin-bottom: 24px;">
                        <textarea id="textarea1" class="materialize-textarea" data-length="200" name="notesReportPlace"></textarea>
                        <label for="textarea1">Leave a note..</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn waves-effect waves-light btn-large red" type="submit" name="action">Report
                        <i class="material-icons right">send</i>
                    </button>
                </div>

                </form>
            </div>

            <script src="<?php echo base_url();?>/assets/js/jquery.barrating.min.js"></script>
            <script>
                $(document).ready(function(){
                    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
                    $('.modal').modal();
                });

                $(function() {
                    $('#ratingBar').barrating({
                        theme: 'fontawesome-stars'
                    });
                });
            </script>
<!--            END'S HERE-->

            <div class="col s12 card flow-text article">
                <p><i>Created at <?php echo $place['CREATED_AT'];?></i></p>
                <h5><b><?php echo $place['TITLE'];?></b></h5>
                <blockquote>
                    <p>Operation time : <?php echo $place['OPERATIONAL_TIME'];?></p>
                    <?php if ($place['TYPE']=='TOURISM'){ ?>
                        <p>Landmark : <?php echo $place['FEATURED_ITEM'];?></p>
                    <?php }else{ ?>
                        <p>Featured Item : <?php echo $place['FEATURED_ITEM'];?></p>
                        <p>Average Price : <?php echo $place['AVERAGE_PRICE'];?></p>
                    <?php } ?>
                    <p>Address : <?php echo $place['ADDRESS'];?></p>
                </blockquote>


                <div id="googleMap" style="width:100%;height:400px;"></div>

                <input type="hidden" value="<?php echo $place['ADDRESS'];?>" id="address">
                <script>
                    function myMap() {
                        var mapProp = {
                            center:new google.maps.LatLng(-6.229728,106.6894294),
                            zoom:17,
                        };
                        var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);

                        var geocoder = new google.maps.Geocoder();

                        geocodeAddress(geocoder, map);

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

                <p>Description</p>
                <?php echo $place['DESCRIPTION'];?>
            </div>

            <h5 class="grey-text darken-5 card flow-text col s12" style="padding: 10px; text-align: center;">Recent Reviews</h5>
            <?php foreach ($reviews as $review){ ?>
                <a class="col s4 m4 gallery" style="background-image: url('<?php echo base_url()."uploads/".$review->IMAGE ;?>');" href="#modalReview<?php echo $review->ID_REVIEW;?>">
                    <div class="overlay"></div>
                </a>
                <div id="modalReview<?php echo $review->ID_REVIEW;?>" class="modal modal-review" style="height: 70%;">
                    <div class="modal-content white">
                        <div class="row">
                        <div class="col s12 m8 imageReview" style="background-image: url('<?php echo base_url()."uploads/".$review->IMAGE ;?>'); background-size: cover;">
                        </div>
                        <div class="col s12 m4">
                            <select id="ratingBar<?php echo $review->ID_REVIEW;?>" name="rate">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                            <p><i>Created at <?php echo $review->CREATED_AT;?></i><br/>
                            <b>Review by <?php echo $review->AUTHOR;?></b></p>
                            <p><?php echo $review->NOTES;?></p>
                        </div>
                        </div>
                    </div>

                    <script>
                        document.getElementById('ratingBar<?php echo $review->ID_REVIEW;?>').value = <?php echo $review->RATE;?>;
                        $(function() {
                            $('#ratingBar<?php echo $review->ID_REVIEW;?>').barrating({
                                theme: 'fontawesome-stars'
                            });
                        });
                    </script>
                </div>
            <?php } ?>
        </div>
    </div>

</div>

</body>
</html>
