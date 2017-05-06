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
                <h5>My Posts</h5>
                <table class="bordered responsive-table">
                    <thead>
                    <tr>
                        <th>Title</th>
                        <th>Rate</th>
                        <th>Visibility</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php foreach ($posts as $post){?>
                    <tr>
                        <td><?php echo $post->TITLE;?></td>
                        <td><?php echo $post->HIT;?></td>
                        <td>
                            <?php if($post->VISIBILITY == 1) echo "<i class=\"material-icons teal-text\">check</i>"; else echo "<i class=\"material-icons red-text\">close</i>";?>
                        </td>
                        <td><?php echo $post->CREATED_AT;?></td>
                        <td>
                            <a class="btn waves-effect teal" href="<?php echo site_url('places/check/'.$post->ID_PLACE);?>"><i class="material-icons">mode_edit</i></a>
                            <?php if ($post->VISIBILITY==1){?>
                            <a class="btn waves-effect orange" href="<?php echo site_url('places/toggle/'.$post->ID_PLACE."/0");?>"><i class="material-icons">visibility_off</i></a>
                            <?php }else{?>
                            <a class="btn waves-effect orange" href="<?php echo site_url('places/toggle/'.$post->ID_PLACE."/1");?>"><i class="material-icons">visibility</i></a>
                            <?php }?>
                            <a class="btn waves-effect red" onclick="return confirm('Are you sure you want to delete this item?');" href="<?php echo site_url('places/remove/'.$post->ID_PLACE);?>"><i class="material-icons">delete</i></a>
                            <a class="btn waves-effect teal" href="<?php echo site_url('places/detail/'.$post->ID_PLACE);?>"><i class="material-icons">details</i></a>
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
