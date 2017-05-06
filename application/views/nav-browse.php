<ul id="dropdown1" class="dropdown-content">
    <li><a href="<?php echo site_url('users/profile');?>" class="waves-effect "><i class="material-icons left">account_box</i>Profile</a></li>
    <li><a href="<?php echo site_url('users/dashboard/1');?>" class="waves-effect "><i class="material-icons left">dashboard</i>Dashboard</a></li>
    <li class="divider"></li>
    <li><a href="<?php echo site_url('users/logout');?>" class="waves-effect "><i class="material-icons left">exit_to_app</i>Logout</a></li>
</ul>
<div class="navbar-fixed">
<nav class="nav-extended white z-depth-2">
    <div class="nav-wrapper container">
      <a id="logo-container" href="<?php echo site_url('homepage');?>" class="brand-logo" style="padding-top: 10px;"><img src="<?php echo base_url();?>/assets/images/logo2.png" /></a>
      <a href="#" data-activates="mobile-demo" class="button-collapse grey-text"><i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down">
          <?php if(isset($user)){?>
          <li>
              <div class="chip">
                  <img src="<?php echo base_url();?>/assets/images/coin.png" alt="Coin">
                  <b><?php echo $user['COIN'];?></b>
              </div>
          </li>
          <li>
              <div class="chip">
                  <b><?php echo $user['BADGE'];?></b>
              </div>
          </li>
          <li><a class="dropdown-button center-align" style="width: 200px!important;" href="#!" data-activates="dropdown1"><?php echo substr($user['DISPLAY_NAME'],0,15)."..";?><i class="material-icons right">arrow_drop_down</i></a></li>
          <?php } else {?>
          <li><a href="<?php echo site_url('users/login')?>" class="waves-effect waves-light btn red">Login</a></li>
          <li><a href="<?php echo site_url('users/signup')?>" class="waves-effect waves-light btn red">Join Us</a></li>
          <?php }?>
      </ul>
    </div>
    <div class="nav-content container ">
        <?php if(isset($user)){?>
        <a class="btn-floating btn-large waves-effect waves-light red  halfway-fab hide-on-med-and-down z-depth-2 hoverable" href="<?php echo site_url('places');?>">
            <i class="material-icons s0">add</i>
        </a>
        <?php }?>

    <ul class="tabs tabs-transparent">
        <li class="tab"><a class="tab-text active" href="#test1">Tourism</a></li>
        <li class="tab"><a class="tab-text" href="#test2">Markets</a></li>
      </ul>
    </div>
        
</nav>
    
</div>

<ul id="mobile-demo" class="side-nav">
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
    <li><a href="<?php echo site_url('users/dashboard/1');?>" class="waves-effect hoverable"><i class="material-icons left">dashboard</i>Dashboard</a></li>
    <li class="divider"></li>
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