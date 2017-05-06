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
            echo form_open_multipart('users/insert');
            ?>
            <div class="row">
                <div class="col m8 s12 card offset-m2 red white-text" style="padding: 20px!important;">
                    <h5>SIGN UP</h5>
                </div>
                <div class="col m8 s12 card offset-m2" style="padding: 20px!important;">
                    <div class="row">
                        <div class="input-field col s12 m6">
                            <input id="username" type="text" class="validate" name="usernameProfile" required>
                            <label for="username">Username</label>
                        </div>
                        <div class="input-field col s12 m6">
                            <input id="email" type="email" class="validate" name="emailProfile" required>
                            <label for="email" data-error="Not a valid email" data-success="Ok !">Email</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="displayName" type="text" class="validate" name="displayNameProfile" required>
                            <label for="displayName">Display Name</label>
                        </div>
                    </div>

                    <!--                        UPLOAD IMAGE-->
                    <div class="row">
                        <div class="col s12">
                            <div class="file-field input-field">
                                <div class="btn red">
                                    <input type="file" name="userfileProfile" size="20">
                                    <span><i class="material-icons white-text left">add_a_photo</i> Upload your profile photo</span>
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m6">
                            <input id="password" type="password" class="validate" name="passwordProfile" required>
                            <label for="password">Password</label>
                        </div>
                        <div class="input-field col s12 m6">
                            <input id="passwordConfirm" type="password" class="validate" name="passwordConfirmProfile" onkeyup="confirmPassword()" required>
                            <label for="passwordConfirm">Confirm Password</label>
                        </div>
                        <div class="input-field col s12">
                            <p id="indicator"></p>
                        </div>
                        <div class="input-field col s12">
                            <a class="teal-text" href="<?php echo site_url('users/login')?>">Already have a account ? <b>Log In</b></a>
                        </div>
                        <button class="btn waves-effect waves-light btn-large right" type="submit" name="submit" id="submitButton">
                            Sign Up
                            <i class="material-icons right">send</i>
                        </button>

                        <script>

                            function confirmPassword() {
                                var indicator = document.getElementById("indicator");
                                var password = document.getElementById("password");
                                var confirm= document.getElementById("passwordConfirm");
                                var submit= document.getElementById("submitButton");

                                if (password.value==confirm.value){
                                    indicator.innerHTML = "<b class='green-text'>Password match</b>";
                                    submit.disabled = false;
                                    submit.className = "btn waves-effect waves-light btn-large right";
                                }else{
                                    indicator.innerHTML = "<b class='red-text'>Password not match !</b>";
                                    submit.disabled = true;
                                    submit.className = "btn waves-effect waves-light btn-large right disable";
                                }
                            }
                        </script>
                    </div>

                </div>
            </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>
