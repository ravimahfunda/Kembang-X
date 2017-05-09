<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <?php include('head.php');?>
</head>
<body class="grey lighten-4">

    <?php include('nav-browse.php'); ?>
    
    <div class="container">
        <br/>
        <br/>
        <div class="section">

            <div class="col s12 card">
                <div class="slider">

                    <a href="<?php echo site_url('users/dashboard/0')?>">
                    <ul class="slides hoverable">
                            <li>
                                <img src="<?php echo base_url()."/assets/images/bandung.jpg";?>"> <!-- random image -->
                                <div class="caption left-align">
                                    <h3>Special Promo</h3>
                                    <h5 class="light grey-text text-lighten-3">Special promo just for you..</h5>
                                </div>
                            </li>


                        <?php foreach ($lpromos as $promo){?>
                            <li>
                                <img src="<?php echo base_url()."/uploads/".$promo->IMAGE;?>"> <!-- random image -->
                                <div class="caption left-align">
                                    <h3><?php echo $promo->HEADLINE;?></h3>
                                    <h5 class="light grey-text text-lighten-3">In <?php echo $promo->TITLE." until ".$promo->UNTIL;?></h5>
                                </div>
                            </li>
                        <?php }?>
                    </ul>
                    </a>

                </div>
            </div>
            <script>
                $(document).ready(function(){
                    $('.slider').slider();
                });
            </script>

            <div id="test1" class="col s12">
                <div class="row">
                    <div class="col s12" >
                        <h5 class="grey-text darken-5 card flow-text" style="padding: 10px; text-align: center;">Trending Places</h5>
                    </div>

                    <?php foreach( $hotPlaces as $place){ ?>
                    <div class="col m6 s12">

                        <div class="card small sticky-action">
                            <div class="card-image waves-effect waves-block waves-light">
                              <img class="activator" src="<?php echo base_url();?>uploads/<?php echo $place->IMAGE;?>">

                            </div>
                            <div class="card-content">
                              <span class="card-title activator grey-text text-darken-4"><?php echo $place->TITLE;?><i class="material-icons right">more_vert</i></span>
                            <div class="card-action white">

                              <a href="<?php echo site_url('places/detail/').$place->ID_PLACE ;?>">Read More</a>
                              <a class="right" style="margin-right: 0"><span style="font-size: 18px;"><?php echo $place->HIT;?></span><i class="material-icons right">star</i></a>
                            </div>
                            </div>
                            <div class="card-reveal">
                              <span class="card-title"><?php echo $place->TITLE;?><i class="material-icons right">close</i></span>
                                Operation Time : <?php echo $place->OPERATIONAL_TIME;?><br/>
                                Land Mark : <?php echo $place->FEATURED_ITEM;?><br/>
                                Address : <?php echo $place->ADDRESS;?><br/><br/>
                                <?php
                                    $tags = explode(" ",$place->HASH_TAG);
                                    foreach ($tags as $tag){
                                ?>
                                    <div class="chip">
                                        <?php echo $tag;?>
                                    </div>
                                <?php
                                    }
                                ?><br/>
                                <a class="black-text">Posted By <b><?php echo $place->DISPLAY_NAME ;?></b></a>
                            </div>
                        </div>
                    </div>
                    <?php } ?>

                    <div class="col s12" >
                        <h5 class="grey-text darken-5 card flow-text" style="padding: 10px; text-align: center;">New Places</h5>
                    </div>
                    <?php foreach( $newPlaces as $place){ ?>
                        <div class="col m6 s12">

                            <div class="card small sticky-action">
                                <div class="card-image waves-effect waves-block waves-light">
                                    <img class="activator" src="<?php echo base_url();?>/uploads/<?php echo $place->IMAGE;?>">
                                </div>
                                <div class="card-content">
                                    <span class="card-title activator grey-text text-darken-4"><?php echo $place->TITLE;?><i class="material-icons right">more_vert</i></span>
                                    <div class="card-action white">
                                        <a href="<?php echo site_url('places/detail/').$place->ID_PLACE ;?>">Read More</a>
                                        <a class="right" style="margin-right: 0"><span style="font-size: 18px;"><?php echo $place->HIT;?></span><i class="material-icons right">star</i></a>
                                    </div>
                                </div>
                                <div class="card-reveal">
                                    <span class="card-title"><?php echo $place->TITLE;?><i class="material-icons right">close</i></span>
                                    Operation Time : <?php echo $place->OPERATIONAL_TIME;?><br/>
                                    Land Mark : <?php echo $place->FEATURED_ITEM;?><br/>
                                    Address : <?php echo $place->ADDRESS;?><br/><br/>
                                    <?php
                                    $tags = explode(" ",$place->HASH_TAG);
                                    foreach ($tags as $tag){
                                        ?>
                                        <div class="chip">
                                            <?php echo $tag;?>
                                        </div>
                                        <?php
                                    }
                                    ?><br/>
                                    <a class="black-text">Posted By <b><?php echo $place->DISPLAY_NAME ;?></b></a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                
            </div>
            <div id="test2" class="col s12">
                <div class="row">
                    <div class="col s12" >
                        <h5 class="grey-text darken-5 card flow-text" style="padding: 10px; text-align: center;">Trending Markets</h5>
                    </div>

                    <?php foreach( $hotMarkets as $place){ ?>
                        <div class="col m6 s12">

                            <div class="card small sticky-action">
                                <div class="card-image waves-effect waves-block waves-light">
                                    <img class="activator" src="<?php echo base_url();?>uploads/<?php echo $place->IMAGE;?>">
                                </div>
                                <div class="card-content">
                                    <span class="card-title activator grey-text text-darken-4"><?php echo $place->TITLE;?><i class="material-icons right">more_vert</i></span>
                                    <div class="card-action white">
                                        <a href="<?php echo site_url('places/detail/').$place->ID_PLACE ;?>">Read More</a>
                                        <a class="right" style="margin-right: 0"><span style="font-size: 18px;"><?php echo $place->HIT;?></span><i class="material-icons right">star</i></a>
                                    </div>
                                </div>
                                <div class="card-reveal">
                                    <span class="card-title"><?php echo $place->TITLE;?><i class="material-icons right">close</i></span>
                                    Operation Time : <?php echo $place->OPERATIONAL_TIME;?><br/>
                                    Land Mark : <?php echo $place->FEATURED_ITEM;?><br/>
                                    Address : <?php echo $place->ADDRESS;?><br/><br/>
                                    <?php
                                    $tags = explode(" ",$place->HASH_TAG);
                                    foreach ($tags as $tag){
                                        ?>
                                        <div class="chip">
                                            <?php echo $tag;?>
                                        </div>
                                        <?php
                                    }
                                    ?><br/>
                                    <a class="black-text">Posted By <b><?php echo $place->DISPLAY_NAME ;?></b></a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                    <div class="col s12" >
                        <h5 class="grey-text darken-5 card flow-text" style="padding: 10px; text-align: center;">New Markets</h5>
                    </div>
                    <?php foreach( $newMarkets as $place){ ?>
                        <div class="col m6 s12">

                            <div class="card small sticky-action">
                                <div class="card-image waves-effect waves-block waves-light">
                                    <img class="activator" src="<?php echo base_url();?>/uploads/<?php echo $place->IMAGE;?>">
                                </div>
                                <div class="card-content">
                                    <span class="card-title activator grey-text text-darken-4"><?php echo $place->TITLE;?><i class="material-icons right">more_vert</i></span>
                                    <div class="card-action white">
                                        <a href="<?php echo site_url('places/detail/').$place->ID_PLACE ;?>">Read More</a>
                                        <a class="right" style="margin-right: 0"><span style="font-size: 18px;"><?php echo $place->HIT;?></span><i class="material-icons right">star</i></a>
                                    </div>
                                </div>
                                <div class="card-reveal">
                                    <span class="card-title"><?php echo $place->TITLE;?><i class="material-icons right">close</i></span>
                                    Operation Time : <?php echo $place->OPERATIONAL_TIME;?><br/>
                                    Featured Item : <?php echo $place->FEATURED_ITEM;?><br/>
                                    Average Price : Rp. <?php echo $place->AVERAGE_PRICE;?><br/>
                                    Address : <?php echo $place->ADDRESS;?><br/><br/>
                                    <?php
                                    $tags = explode(" ",$place->HASH_TAG);
                                    foreach ($tags as $tag){
                                        ?>
                                        <div class="chip">
                                            <?php echo $tag;?>
                                        </div>
                                        <?php
                                    }
                                    ?><br/>
                                    <a class="black-text">Posted By <b><?php echo $place->DISPLAY_NAME ;?></b></a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>

        </div>

    </div>
  <script src="<?php echo base_url();?>/assets/js/jquery.barrating.min.js"></script>
  </body>
</html>
