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
            echo form_open_multipart('places/gopromote','id="formPlace"');
        } else {
            echo form_open_multipart('places/update/'.$place['ID_PLACE'],'id="formPlace"');
        }
        ?>
        <div class="row">
            <div class="col m8 s12 card offset-m2" style="padding: 20px!important;">
                <input type="hidden" value="<?php echo $place;?>" name="placePromo">
                <div class="row">
                    <div class="input-field col s12">
                        <input id="title" type="text" class="validate" name="headlinePromo" required value="<?php echo $promo['HEADLINE'] ;?>">
                        <label for="title">Headline</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s4">
                        <input id="costItem" type="number" class="validate" name="costPromo" required value="<?php echo $promo['COST'] ;?>">
                        <label for="costItem" id="labelCosttem">Cost (coin)</label>
                    </div>
                    <div class="input-field col s4">
                        <input id="untilItem" type="number" class="validate" name="untilPromo" required value="<?php echo $promo['UNTIL'] ;?>">
                        <label for="untilItem" id="labelUntilItem">Duration (day)</label>
                    </div>
                    <div class="input-field col s4">
                        <input id="featuredItem" type="number" class="validate" name="quotaPromo" required value="<?php echo $promo['QUOTA'] ;?>">
                        <label for="featuredItem" id="labelFeaturedItem">Quota</label>
                    </div>
                </div>

                <div class="row">

                        <div class="input-field col s12" style="margin-bottom: 24px;">
                            <textarea id="descriptionTour" class="materialize-textarea" data-length="1000" maxlength="1000" name="descriptionPromo" required><?php echo $promo['DESCRIPTION'];?></textarea>
                            <label for="textarea1">Description</label>
                        </div>
                </div>
                <div class="row">
                    <div class="col s12">
                        <button class="btn waves-effect waves-light  btn-large right col s12 m4 right" type="submit" name="submit">
                            Promote
                            <i class="material-icons right">send</i>
                        </button>
                    </div>
                </div>
            </div>

        </div>

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
