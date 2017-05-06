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
                <h5>Place List</h5>
                <table class="bordered responsive-table">
                    <thead>
                    <tr>
                        <th>Title</th>
                        <th>Address</th>
                        <th>Category</th>
                        <th>Visibility</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php foreach ($lplaces as $place){?>
                        <tr>
                            <td><?php echo $place->TITLE;?></td>
                            <td><?php echo $place->ADDRESS;?></td>
                            <td><?php echo $place->TYPE;?></td>
                            <td>
                                <?php if($place->VISIBILITY == 1) echo "<i class=\"material-icons teal-text\">check</i>"; else echo "<i class=\"material-icons red-text\">close</i>";?>
                            </td>
                            <td>
                                <?php if ($place->VISIBILITY==1){?>
                                    <a class="btn waves-effect orange" href="<?php echo site_url('places/sutoggle/'.$place->ID_PLACE."/0");?>"><i class="material-icons">visibility_off</i></a>
                                <?php }else{?>
                                    <a class="btn waves-effect orange" href="<?php echo site_url('places/sutoggle/'.$place->ID_PLACE."/1");?>"><i class="material-icons">visibility</i></a>
                                <?php }?>
                                <a class="btn waves-effect red" onclick="return confirm('Are you sure you want to delete this item?');" href="<?php echo site_url('places/remove/'.$place->ID_PLACE);?>"><i class="material-icons">delete</i></a>
                                <a class="btn waves-effect teal" href="<?php echo site_url('places/promote/'.$place->ID_PLACE);?>"><i class="material-icons">attach_money</i></a>
                                <a class="btn waves-effect teal" href="<?php echo site_url('places/detail/'.$place->ID_PLACE);?>"><i class="material-icons">details</i></a>
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
