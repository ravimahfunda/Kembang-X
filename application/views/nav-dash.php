<div class="navbar-fixed">
    <nav class="nav-extended white z-depth-2">
        <div class="nav-wrapper container">
            <a id="logo-container" href="<?php echo base_url();?>" class="brand-logo center" style="padding-top: 10px;"><img src="<?php echo base_url();?>/assets/images/logo2.png" /></a>
            <a href="#" data-activates="mobile-demo" class="button-collapse grey-text"><i class="material-icons">menu</i></a>
            <a class="btn-floating btn-large waves-effect waves-light red  halfway-fab hide-on-med-and-down z-depth-2 hoverable" href="<?php echo site_url('places');?>">
                <i class="material-icons s0">add</i>
            </a>
        </div>
    </nav>
</div>

<ul id="mobile-demo" class="side-nav fixed">
    <?php if(isset($user)){?>
        <li><div class="userView">
                <div class="background">
                    <img src="<?php echo base_url();?>/assets/images/backdrop.jpg">
                </div>
                <a href="#!user"><img class="circle" src="<?php echo base_url()."uploads/".$user['PROFILE_IMAGE'];?>"</a>
                <a href="#!name"><span class="white-text name"><?php echo $user['DISPLAY_NAME'];?></span></a>
                <a href="#!email"><span class="white-text email"><?php echo $user['EMAIL'];?></span></span></a>
            </div></li>
        <li><a href="<?php echo site_url('users/profile');?>" class="waves-effect hoverable"><i class="material-icons left">account_box</i>Profile</a></li>
        <li class="divider"></li>
        <li><a href="<?php echo site_url('users/dashboard/0');?>" class="waves-effect hoverable"><i class="material-icons left">new_releases</i>Promos</a></li>
        <li><a href="<?php echo site_url('users/dashboard/1');?>" class="waves-effect hoverable"><i class="material-icons left">description</i>My Posts</a></li>
        <li><a href="<?php echo site_url('users/dashboard/2');?>" class="waves-effect hoverable"><i class="material-icons left">rate_review</i>My Reviews</a></li>
        <li class="divider"></li>
        <?php if($user['ID_ROLE']==7){?>
        <li><a href="<?php echo site_url('users/dashboard/lu');?>" class="waves-effect hoverable"><i class="material-icons left">person</i>User List</a></li>
        <li><a href="<?php echo site_url('users/dashboard/lp');?>" class="waves-effect hoverable"><i class="material-icons left">place</i>Place List</a></li>
        <li><a href="<?php echo site_url('users/dashboard/lv');?>" class="waves-effect hoverable"><i class="material-icons left">forum</i>Review List</a></li>
        <li><a href="<?php echo site_url('users/dashboard/lr');?>" class="waves-effect hoverable"><i class="material-icons left">report_problem</i>Report List</a></li>
        <li class="divider"></li>
        <?php } ?>
        <li><a href="<?php echo site_url('users/logout');?>" class="waves-effect hoverable"><i class="material-icons left">exit_to_app</i>Logout</a>
    <?php } else {?>
        <li><a href="<?php echo site_url('users/login')?>" class="waves-effect waves-light btn red">Login</a></li>
        <li><a href="<?php echo site_url('users/signup')?>" class="waves-effect waves-light btn red">Join Us</a></li>
    <?php }?>
</ul>
<?php if(isset($user)){?>
    <div class="fixed-action-btn hide-on-large-only ">
        <a class="btn-floating btn-large red z-depth-2 hoverable" href="<?php echo site_url('places');?>">
            <i class="large material-icons">add</i>
        </a>
    </div>
<?php }?>
<style>
    .tab-text{
        color: #212121!important;
    }
    .indicator{
        background-color : #f44336!important;
    }
</style>