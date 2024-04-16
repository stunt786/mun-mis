
<!DOCTYPE html>
<html lang="en" class="js">

<head>
    <base href="../../../">
    <meta charset="utf-8">
    <meta name="author" content="mun-mis">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Digital Nepal, Digital Palika">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="./images/favicon.png">
    <!-- Page Title  -->
    <title>Login Page</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="<?= base_url('assets/css/dashlite.css?ver=3.1.2') ?>">
    <link id="skin-default" rel="stylesheet" href="<?= base_url('assets/css/theme.css?ver=3.1.2') ?>">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
        <!-- Default theme -->
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
    <style>
        .background-image {
            background-image: url('./images/slides/buddha.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
            width: 100%;
            position: relative;
        }
        
        .background-image img {
            visibility: hidden;
            height: 100%;
            width: 100%;
        }
		
    </style>
</head>

<body class="nk-body ui-rounder npc-default pg-auth">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- wrap @s -->
            <div class="nk-wrap nk-wrap-nosidebar">
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="nk-split nk-split-page nk-split-lg">
                        <div class="nk-split-content nk-block-area nk-block-area-column nk-auth-container bg-white">
                            <div class="absolute-top-right d-lg-none p-3 p-sm-5">
                                <a href="#" class="toggle btn-white btn btn-icon btn-light" data-target="athPromo"><em class="icon ni ni-info"></em></a>
                            </div>
                            <div class="nk-block nk-block-middle nk-auth-body">
                                <div class="brand-logo pb-5">
                                    <a href="html/index.html" class="logo-link">
                                        <img class="logo-light logo-img logo-img-lg" src="./images/logo-smart2x.png" srcset="./images/logo-smart2x.png" alt="logo">
                                        <img class="logo-dark logo-img logo-img-lg" src="./images/logo-smart2x.png" srcset="./images/logo-smart2x.png" alt="logo-dark">
                                        
                                    </a>
                                </div>
                                <div class="nk-block-head">
                                    <div class="nk-block-head-content">
                                        <h5 class="nk-block-title">Sign-In</h5>
                                        <div class="nk-block-des">
                                            <p>Access the System using your email and passcode.</p>
                                        </div>
                                    </div>
                                </div><!-- .nk-block-head -->
                                <form method="post" action="<?php echo base_url('auth/login/check'); ?>" class="form-validate is-alter" autocomplete="off" enctype="multipart/form-data">
                                <?= csrf_field() ?>
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="username">Email or Username</label>
                                            <a class="link link-primary link-sm" tabindex="-1" href="#">Need Help?</a>
                                        </div>
                                        <div class="form-control-wrap">
                                            <input autocomplete="username" type="text" name="username" class="form-control form-control-lg" required id="username" placeholder="Enter your username">
                                        </div>
                                    </div><!-- .form-group -->
                                    <?= form_error('username') ?>
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="password">Passcode</label>
                                            <a class="link link-primary link-sm" tabindex="-1" href="<?php echo base_url('auth/forgetPassword') ?>">Forgot Password?</a>
                                        </div>
                                        <?= form_error('password') ?>
                                        <div class="form-control-wrap">
                                            <a tabindex="-1" href="#" class="form-icon form-icon-right passcode-switch lg" data-target="password">
                                                <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                                <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                            </a>
                                            <input autocomplete="new-password" type="password" name="password" class="form-control form-control-lg" required id="password"  placeholder="Enter your passcode">
                                        </div>
                                        <?php if (setting('google_recaptcha_enabled') == '1'): ?>
                                          <script src="https://www.google.com/recaptcha/api.js" async defer></script>
                                          <div class="form-group">
                                            <div class="g-recaptcha" data-sitekey="<?php echo setting('google_recaptcha_sitekey') ?>"></div>
                                            <?php echo form_error('g-recaptcha-response', '<span style="display:block" class="error invalid-feedback">', '</span>'); ?>
                                          </div>
                                        <?php endif ?>
                                        <div class="form-label-group">
                                            <label class="remember" for="remember">Remember Me</label>
                                            <input type="checkbox" id="remember" name="remember_me" />
                                        </div>
                                    </div><!-- .form-group -->
                                    <?= form_error('remember_me') ?>
                                    <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                                    <div class="form-group">
                                        <button class="btn btn-lg btn-primary btn-block" name="login" type="submit">Sign in</button>
                                    </div>
                                </form><!-- form -->
                                
                                
                            </div><!-- .nk-block -->
                            <div class="nk-block nk-auth-footer">
                                
                                <div class="mt-3">
                                    <p>&copy; <script>document.write(new Date().getFullYear())</script> All Rights Reserved.</p>
                                </div>
                            </div><!-- .nk-block -->
                        </div><!-- .nk-split-content -->
                        <div class="nk-split-content nk-split-stretch bg-lighter d-flex toggle-break-lg toggle-slide toggle-slide-right" data-toggle-body="true" data-content="athPromo" data-toggle-screen="lg" data-toggle-overlay="true">
                            <div class="background-image">
                                <!-- Add your background image URL below -->
                                <img src="./images/slides/buddha.jpg" alt="Gautam Buddha Image">
                            </div>
                            <!-- ... (your existing content) ... -->
                        </div>
                        <!-- .nk-split-content -->
                    </div><!-- .nk-split -->
                </div>
                <!-- wrap @e -->
            </div>
            <!-- content @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->
    <!-- JavaScript -->
    <script src="<?= base_url('assets/js/bundle.js?ver=3.1.2') ?>"></script>
    <script src="<?=base_url('assets/js/scripts.js?ver=3.1.2') ?>"></script>
    <!-- select region modal -->
    <!-- JavaScript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<script>
    $(document).ready(function(){
        <?php if (session()->getFlashdata('notify_success')) { ?>
        alertify.set('notifier','position', 'top-right');
        alertify.success("<?= session()->getFlashdata('notify_success') ?>");
            <?php }?>

    })
</script>

</html>