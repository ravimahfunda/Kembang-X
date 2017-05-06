<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('head.php');?>
</head>
<body class="grey lighten-4">
<?php include('nav-main.php'); ?>

<div class="container">
    <br/>
    <br/>
    <div class="section">
        <?php
//            if ($msg == 1){
//                echo "<script>Materialize.toast('Your data has been saved', 4000, 'rounded')</script>";
//            } else if ($msg==2){
//                echo "<script>Materialize.toast('Failed to save', 4000, 'rounded')</script>";
//            }
            echo form_open_multipart('users/update/'.$user['USERNAME'],'id="formUser"');
        ?>

        <style>

        </style>
        <div class="row">
            <div class="col m4 s12 card" style="padding: 20px!important;">
                <!--                        UPLOAD IMAGE-->
                <div class=" ">
                    <img class="circle col s12 responsive-image" src="<?php echo base_url();?>/Uploads/<?php echo $user['PROFILE_IMAGE'];?>"/>
                </div>
                <div class="row">
                    <div class="col s12">
                        <div class="file-field input-field">
                            <div class="btn red">
                                <input type="file" name="userfile" size="20" class="col s12">
                                <span><i class="material-icons white-text left">add_a_photo</i> Upload your profile photo</span>
                            </div>
                            <div class="file-path-wrapper col s12">
                                <input class="file-path validate" type="text">
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col m8 s12 card  side-form" style="padding: 20px!important;">

                <div class="row">
                    <div class="input-field col s12">
                        <input id="displayName" type="text" class="validate" name="displayName" required value="<?php echo $user['DISPLAY_NAME'] ;?>">
                        <label for="displayname">Display Name</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s6">
                        <input id="badge" type="text" class="validate " readonly value="<?php echo $user['BADGE'] ;?>">
                        <label for="badge">Badge</label>
                    </div>

                    <div class="input-field col s3">
                        <input id="exp" type="text" class="validate " readonly value="<?php echo $user['EXP'] ;?> / <?php echo $user['WANTED_EXP'] ;?>">
                        <label for="exp">Experiences</label>
                    </div>

                    <div class="input-field col s3">
                        <input id="coin" type="text" class="validate " readonly value="<?php echo $user['COIN'] ;?>">
                        <label for="coin">Coin</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12">
                        <input id="email" type="text" class="validate" name="email" required value="<?php echo $user['EMAIL'] ;?>">
                        <label for="email" >Email</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m6">
                        <input id="oldPassword" type="password" class="validate" name="oldPassword" required>
                        <label for="oldPassword">Old Password</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input id="newPassword" type="password" class="validate" name="newPassword" required>
                        <label for="newPassword">New Password / Confirm</label>
                    </div>

                    <button class="btn waves-effect waves-light btn-large right" type="submit" name="submit" id="submitButton">
                        Submit
                        <i class="material-icons right">send</i>
                    </button>
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
