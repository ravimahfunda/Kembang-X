<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('head.php');?>
</head>
<body class="teal">

<div class="container">
    <br/>
    <br/>
    <div class="section">
        <div class="col s12">
            <?php
            echo form_open_multipart('users/authentificate');
            ?>
            <div class="row">
                <div class="col m8 s12 card offset-m2 red white-text" style="padding: 20px!important;">
                    <h5>LOG IN</h5>
                </div>
                <div class="col m8 s12 card offset-m2" style="padding: 20px!important;">
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="username" type="text" class="validate" name="key" required>
                            <label for="username">Username</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="password" type="password" class="validate" name="password" required>
                            <label for="password">Password</label>
                        </div>
                    </div>
                    <div class="input-field col s12">
                        <a class="teal-text" href="<?php echo site_url('users/signup')?>">Are you new here ? <b>Sign Up</b></a>
                    </div>
                    <button class="btn waves-effect waves-light  btn-large right" type="submit" name="submit">
                        Log In
                        <i class="material-icons right">send</i>
                    </button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>
