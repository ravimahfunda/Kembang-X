<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('head.php');?>
</head>
<body class="grey lighten-4">
<?php include('nav-dash.php'); ?>

<div class="">
    <div class="section">
        <div class="row">
            <div class="col l8 s12 card offset-l3" style="padding: 20px!important;">
                <h5>Review List</h5>
                <ul class="collapsible" data-collapsible="accordion">
                    <?php foreach ($lreviews as $review){?>
                        <li>
                            <div class="collapsible-header"><i class="material-icons">account_circle</i><b><?php echo $review->AUTHOR;?></b> leaves notes at <b><?php echo $review->TITLE;?></b></div>
                            <div class="collapsible-body">
                                <a class="right grey-text darken-4" href="<?php echo site_url('places/detail/'.$review->ID_PLACE);?>"><i class="material-icons">more_vert</i></a>
                                <span><?php echo $review->NOTES;?></span>
                            </div>
                        </li>
                    <?php } ?>
                </ul>
            </div>
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
</body>
</html>
