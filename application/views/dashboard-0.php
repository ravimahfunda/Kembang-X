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
                <h5>Promos</h5>
                <ul class="collapsible" data-collapsible="accordion">
                    <?php foreach ($lpromos as $promo){?>
                        <li>
                            <div class="collapsible-header"><i class="material-icons">new_releases</i><b><?php echo $promo->HEADLINE;?></b> at <b><?php echo $promo->TITLE;?></b> until <b><?php echo $promo->UNTIL;?></b></div>
                            <div class="collapsible-body">
                                <div>
                                    <a class=" right btn teal waves-effect" href="<?php echo site_url('places/detail/'.$promo->ID_PLACE);?>"><i class="material-icons">more_vert</i></a>
                                    <a class=" right btn orange waves-effect" onclick="return confirm('Are you sure ? Cost : <?php echo $promo->COST;?> Coin');" href="<?php echo site_url('places/claim/'.$promo->ID_PROMO.'/'.$user['USERNAME']);?>"><i class="material-icons">redeem</i></a>
                                </div>

                                <span>
                                Quota remaining : <?php echo $promo->QUOTA;?><br/>
                                Cost : <?php echo $promo->COST;?> Coin<br/>
                                    <div class="divider"></div><br/>
                                <?php echo $promo->DESCRIPTION;?>
                            </span>
                            </div>
                        </li>
                    <?php } ?>
                </ul>
            </div>

            <div class="col l8 s12 card offset-l3" style="padding: 20px!important;">
                <h5>My Claims</h5>
                <ul class="collapsible" data-collapsible="accordion">
                    <?php foreach ($lmclaims as $claim){?>
                        <li>
                            <div class="collapsible-header"><i class="material-icons">new_releases</i><b><?php echo $claim->HEADLINE;?></b> at <b><?php echo $claim->TITLE;?></b> until <b><?php echo $claim->UNTIL;?></b></div>
                            <div class="collapsible-body">
                                <span>
                                    U-CODE : <?php echo $claim->U_CODE;?>
                                </span>
                            </div>
                        </li>
                    <?php } ?>
                </ul>
            </div>
            <div class="col l8 s12 card offset-l3" style="padding: 20px!important;">
                <h5>My Receipents</h5>
                <ul class="collapsible" data-collapsible="accordion">
                    <?php foreach ($lmrecs as $claim){?>
                        <li>
                            <div class="collapsible-header">
                                <i class="material-icons">new_releases</i><b><?php echo $claim->USERNAME;?></b>
                                <?php if($claim->STATUS==1){?>
                                <i class="material-icons teal-text">check</i>
                                <?php }else{?>
                                <i class="material-icons red-text">close</i>
                                <?php }?>
                            </div>
                            <div class="collapsible-body">
                                <span>
                                <?php if($claim->STATUS==1){?>
                                    Has been claimed.
                                <?php }else{?>
                                    <form action="<?php echo site_url('places/ver_claim/'.$claim->ID_CLAIM.'/'.$claim->USERNAME)?>" method="post">
                                        <div class="row">
                                            <input type="text" placeholder="U-Code" name="ucodeVer" required class="col s8">
                                            <div class="col s4">
                                                <button class="btn waves-effect waves-light right col s12" type="submit" name="submit">
                                                    Verify
                                                    <i class="material-icons right">send</i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                <?php }?>

                                </span>
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
<?php
/**
 * Created by PhpStorm.
 * User: Chevalier
 * Date: 5/6/2017
 * Time: 4:40 AM
 */