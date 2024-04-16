<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <base href="../../../">
    <meta charset="utf-8">
    <meta name="MIS" content="System">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="./images/favicon.png">
    <!-- Page Title  -->
    <title>Reset Password | MUN-MIS</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="<?= base_url('assets/css/dashlite.css?ver=3.1.2') ?>">
    <link id="skin-default" rel="stylesheet" href="<?= base_url('assets/css/theme.css?ver=3.1.2') ?>">
    
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
                        <div class="nk-split-content nk-block-area nk-block-area-column nk-auth-container bg-white w-lg-45">
                            <div class="absolute-top-right d-lg-none p-3 p-sm-5">
                                <a href="#" class="toggle btn btn-white btn-icon btn-light" data-target="athPromo"><em class="icon ni ni-info"></em></a>
                            </div>
                            <div class="nk-block nk-block-middle nk-auth-body">
                                <div class="brand-logo pb-5">
                                    <a href="html/index.html" class="logo-link">
                                        <img class="logo-light logo-img logo-img-lg" src="./images/logo-1.png" srcset="./images/logo-1.png" alt="logo">
                                        <img class="logo-dark logo-img logo-img-lg" src="./images/logo-1.png" srcset="./images/logo-1.png" alt="logo-dark">
                                        
                                    </a>
                                </div>
                                <div class="nk-block-head">
                                    <div class="nk-block-head-content">
                                        <h5 class="nk-block-title">Reset password</h5>
                                        <div class="nk-block-des">
                                            <p>Enter registered email to get password reset link.</p>
                                        </div>
                                    </div>
                                </div><!-- .nk-block-head -->
                                <?= form_open('/auth/forgetPassword/reset', ['method' => 'POST', 'autocomplete' => 'off']); ?> 
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="default-01">Email</label>
                                            <a class="link link-primary link-sm" href="#">Need Help?</a>
                                        </div>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control form-control-lg" value="<?= !empty(post('username'))? post('username') : get('username')  ?>" name="username" id="username" placeholder="Enter your email address">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-lg btn-primary btn-block">Send Reset Link</button>
                                    </div>
                                    <?= form_close(); ?>
                                <div class="form-note-s2 pt-5">
                                    <a href="<?php echo base_url('auth/login'); ?>"><strong>Return to login</strong></a>
                                </div>
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
                                <img src="./images/slides/buddha.jpg" alt="Gautam Buddha">
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
    <script src="<?= base_url('assets/js/scripts.js?ver=3.1.2') ?>"></script>
    <!-- select region modal -->
    
</html>