<!DOCTYPE html>
<html lang="en" class="js">

<head>
    
    <meta charset="utf-8">
    <meta name="Municipality" content="MUN-MIS">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Digital Nepal, Digital Palika.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="<?= base_url('images/favicon.png') ?>">
    <!-- Page Title  -->
    <title>Chalani Details</title>
    
</head>

<body class="nk-body ui-rounder npc-default has-sidebar ">
    <div class="nk-app-root">
    <div class="nk-sidebar" data-content="sidebarMenu">
         <?php include(APPPATH . 'Views/admin/templates/sidenav.php');?>
        </div>
        <!-- main @s -->
        <div class="nk-main ">
            <!-- wrap @s -->
            <div class="nk-wrap ">
                <!-- main header @s -->
                <?php include(APPPATH . 'Views/admin/templates/header.php');?>
                <!-- main header @e -->
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="nk-block-head nk-block-head-sm">
                                    <div class="nk-block-between g-3">
                                        <div class="nk-block-head-content">
                                            <h3 class="nk-block-title page-title">चलानी विवरण</h3>
                                        </div>
                                        <div class="nk-block-head-content">
                                            <a href="<?php echo base_url('list-chalani'); ?>" class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em class="icon ni ni-arrow-left"></em><span>Back</span></a>
                                            <a href="html/pharmacy/medicine-list.html" class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none"><em class="icon ni ni-arrow-left"></em></a>
                                        </div>
                                    </div>
                                </div><!--.nk-block-head-->
                                <div class="nk-block">
                                    <div class="card card-bordered">
                                        <div class="card-aside-wrap">
                                            <div class="card-content">
                                                <div class="card-inner">
                                                    <div class="nk-block">
                                                        <div class="nk-block-head nk-block-head-sm nk-block-between">
                                                            <h5 class="title">चलानी विवरण</h5>
                                                        </div><!-- .nk-block-head -->
                                                        <div class="row gy-5">

                                                            <div class="col-md-3 col-lg-2 col-6">
                                                                <div class="profile-stats">
                                                                    <span class="profile-ud-label">ID</span>
                                                                    <span><?= $detail['id'] ?></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3 col-lg-2  col-6">
                                                                <div class="profile-stats">
                                                                    <span class="profile-ud-label">चलानी मिति</span>
                                                                    <span><?= $detail['received_date'] ?></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3 col-lg-2  col-6">
                                                                <div class="profile-stats">
                                                                    <span class="profile-ud-label">चलानी नं</span>
                                                                    <span><?= $detail['serial_number'] ?></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3 col-lg-2  col-6">
                                                                <div class="profile-stats">
                                                                    <span class="profile-ud-label">प्राथमिकता प्रकार</span>
                                                                    <span><?= $detail['type'] ?></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3 col-lg-2  col-6">
                                                                <div class="profile-stats">
                                                                    <span class="profile-ud-label">आर्थिक वर्ष</span>
                                                                    <span><?= $detail['year'] ?></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3 col-lg-2 col-6">
                                                                <div class="profile-stats">
                                                                    <span class="profile-ud-label">इमेल</span>
                                                                    <span><?= $detail['email'] ?></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                    </div><!-- .nk-block -->
                                                    <div class="nk-divider divider md"></div>
                                                    <div class="nk-block">
                                                        
                                                        <div class="row gy-5">
                                                            <div class="col-md-3 col-sm-4">
                                                                <div class="profile-stats">
                                                                    <span class="profile-ud-label">विषय</span>
                                                                    <span><?= $detail['subject'] ?></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3 col-sm-4">
                                                                <div class="profile-stats">
                                                                    <span class="profile-ud-label">कार्यालय</span>
                                                                    <span><?= $detail['office'] ?></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3 col-sm-4">
                                                                <div class="profile-stats">
                                                                    <span class="profile-ud-label">ठेगाना</span>
                                                                    <span"><?= $detail['address'] ?></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3 col-sm-4">
                                                                <div class="profile-stats">
                                                                    <span class="profile-ud-label">कैफियत</span>
                                                                    <span"><?= $detail['remarks'] ?></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                    </div><!-- .nk-block -->
                                                    <div class="nk-divider divider md"></div>
                                                    <div class="nk-block">
                                                        <div class="nk-block-head nk-block-head-sm nk-block-between">
                                                            <h5 class="title">दस्ताबेज</h5>
                                                        </div><!-- .nk-block-head -->
                                                        <div class="row gy-5">
                                                            <div class="col-md-3 col-sm-4">
                                                                <div class="profile-stats">
                                                                    <span class="profile-ud-label">View Document</span>
                                                                    <span><a href="<?= base_url('/' . $detail['file_path']) ?>"><em class="icon ni ni-eye"></em><span>View Details</span></a></span>
                                                                </div>
                                                            </div>
                                                            
                                                        </div>
                                                    </div><!-- .nk-block -->
                                                </div><!-- .card-inner -->
                                            </div><!-- .card-content -->
                                        </div><!-- .card-aside-wrap -->
                                    </div><!-- .card -->
                                </div><!-- .nk-block -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content @e -->
            </div>
            <!-- wrap @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->
    
    <!-- JavaScript -->
    
    <script src="<?= base_url('assets/js/libs/datatable-btns.js?ver=3.1.2') ?>"></script>
</body>

</html>