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
                <h5>User List</h5>
                <table class="bordered responsive-table">
                    <thead>
                    <tr>
                        <th>Username</th>
                        <th>Level</th>
                        <th>Status</th>
                        <th>Coin</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php foreach ($lusers as $user){?>
                        <tr>
                            <td><?php echo $user->USERNAME;?></td>
                            <td><?php echo $user->ID_LEVEL;?></td>
                            <td>
                                <?php if($user->STATUS == 1) echo "<i class=\"material-icons teal-text\">check</i>"; else echo "<i class=\"material-icons red-text\">close</i>";?>
                            </td>
                            <td><?php echo $user->COIN;?></td>
                            <td>
                                <?php if ($user->STATUS==1){?>
                                    <a class="btn waves-effect orange" href="<?php echo site_url('users/toggle/'.$user->USERNAME."/0");?>"><i class="material-icons">lock_outline</i></a>
                                <?php }else{?>
                                    <a class="btn waves-effect orange" href="<?php echo site_url('users/toggle/'.$user->USERNAME."/1");?>"><i class="material-icons">lock_open</i></a>
                                <?php }?>
                                <a class="btn waves-effect red" onclick="return confirm('Are you sure you want to delete this item?');" href="<?php echo site_url('users/remove/'.$user->USERNAME);?>"><i class="material-icons">delete</i></a>
                            </td>
                        </tr>
                    <?php } ?>

                    </tbody>
                </table>
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
