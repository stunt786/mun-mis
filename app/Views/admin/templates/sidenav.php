<!DOCTYPE html>
<html lang="en" class="js">

<head>
    <base href="">
    <meta charset="utf-8">
    <meta name="Digital Palika" content="MUN_MIS">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Digital Palika">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="<?= base_url('images/favicon.png') ?>">
    <!-- Page Title  -->
    <title>Home</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="<?= base_url('assets/css/dashlite.css?ver=3.1.2') ?>">
    <link id="skin-default" rel="stylesheet" href="<?= base_url('assets/css/theme.css?ver=3.1.2') ?>">
    <!-- FontAwesome Icons --> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<div class="nk-sidebar" data-content="sidebarMenu">
    <div class="nk-sidebar-bar">
        <div class="nk-apps-brand">
            <a href="<?php echo base_url('dashboard'); ?>" class="logo-link">
                <img class="logo-light logo-img" src="<?= base_url('images/logo-1.png') ?>" srcset="<?= base_url('images/logo-1.png') ?>" alt="logo">
                <img class="logo-dark logo-img" src="<?= base_url('images/logo-1.png') ?>" srcset="<?= base_url('images/logo-1.png') ?>" alt="logo-dark">
            </a>
        </div>
        <div class="nk-sidebar-element">
            <div class="nk-sidebar-body">
                <div class="nk-sidebar-content" data-simplebar>
                    <div class="nk-sidebar-menu">
                        <!-- Menu -->
                        <ul class="nk-menu apps-menu">
                            <?php if (hasPermissions('module_dartachalani')): ?> 
                            <li class="nk-menu-item active">
                                <a href="#" class="nk-menu-link nk-menu-switch" data-target="navDartachalani">
                                    <span class="nk-menu-icon"><em class="fas fa-address-book"></em></span>
                                </a>
                            </li>
                            <?php endif ?>
                            <?php if (hasPermissions('module_dartamis')): ?> 
                            <li class="nk-menu-item">
                                <a href="#" class="nk-menu-link nk-menu-switch" data-target="navBusiness">
                                    <span class="nk-menu-icon"><em class="icon ni ni-building"></em></span>
                                </a>
                            </li>
                            <?php endif ?>
                            <?php if (hasPermissions('module_progress')): ?> 
                            <li class="nk-menu-item">
                                <a href="#" class="nk-menu-link nk-menu-switch" data-target="navProgress">
                                    <span class="nk-menu-icon"><em class="icon ni ni-bar-chart"></em></span>
                                </a>
                            </li>
                            <?php endif ?>
                            <?php if (hasPermissions('module_project')): ?> 
                            <li class="nk-menu-item">
                                <a href="#" class="nk-menu-link nk-menu-switch" data-target="navProject">
                                    <span class="nk-menu-icon"><em class="icon ni ni-briefcase"></em></span>
                                </a>
                            </li>
                            <?php endif ?>
                            <?php if (hasPermissions('module_healthpost')): ?> 
                            <li class="nk-menu-item">
                                <a href="#" class="nk-menu-link nk-menu-switch" data-target="navHospital">
                                    <span class="nk-menu-icon"><em class="icon ni ni-plus-medi"></em></span>
                                </a>
                            </li>
                            <?php endif ?>
                            <?php if (hasPermissions('module_setting')): ?> 
                            <li class="nk-menu-item">
                                <a href="#" class="nk-menu-link nk-menu-switch" data-target="navSetting">
                                    <span class="nk-menu-icon"><em class="icon ni ni-setting"></em></span>
                                </a>
                            </li>
                            <?php endif ?>
                            
                            
                        </ul>
                    </div>
                    <div class="nk-sidebar-footer">
                        <ul class="nk-menu nk-menu-md apps-menu">
                            <li class="nk-menu-item">
                                <a href="<?php echo base_url('profile'); ?>" class="nk-menu-link" title="Settings">
                                    <span class="nk-menu-icon"><em class="icon ni ni-setting"></em></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="nk-sidebar-profile nk-sidebar-profile-fixed dropdown">
                    <a href="#" data-bs-toggle="dropdown" data-offset="50,-50">
                        <div class="user-avatar">
                            <span><img src="<?php echo userProfile(logged('id')) ?>" class="user-image img-circle elevation-2" alt="User Image"></span>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-md ml-4">
                        <div class="dropdown-inner user-card-wrap d-none d-md-block">
                            <div class="user-card">
                                <div class="user-avatar">
                                    <span><img src="<?php echo userProfile(logged('id')) ?>" class="user-image img-circle elevation-2" alt="User Image"></span>
                                </div>
                                <div class="user-info">
                                    <span class="lead-text"><?php echo logged('name') ?></span>
                                    <span class="sub-text text-soft"><?php echo logged('email') ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="dropdown-inner">
                            <ul class="link-list">
                                <li><a href="<?php echo url('profile') ?>"><em class="icon ni ni-user-alt"></em><span>View Profile</span></a></li>
                                <?php if (hasPermissions('activity_log_view')): ?>
                                <li><a href="<?php echo url('activityLogs') ?>"><em class="icon ni ni-activity-alt"></em><span>Login Activity</span></a></li>
                                <?php endif ?>
                        </ul>
                        </div>
                        <div class="dropdown-inner">
                            <ul class="link-list">
                                <li><a href="/auth/logout"><em class="icon ni ni-signout"></em><span>Sign out</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="nk-sidebar-main is-light">
        <div class="nk-sidebar-inner" data-simplebar>
            <div class="nk-menu-content menu-active" data-content="navDartachalani">
                <h5 class="title">दर्ता तथा चलानी</h5>
                <ul class="nk-menu">
                    <?php if (hasPermissions('darta_list')): ?>
                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="fas fa-book-open"></em></span>
                            <span class="nk-menu-text">दर्ता</span>
                        </a>
                        <?php endif ?>
                        <ul class="nk-menu-sub">
                            <?php if (hasPermissions('darta_add')): ?>
                            <li class="nk-menu-item">
                               <a href="<?php echo base_url('add-darta'); ?>" class="nk-menu-link"><span class="nk-menu-text">नयाँ दर्ता</span></a>
                            </li>
                            <?php endif ?>
                            <?php if (hasPermissions('darta_list')): ?>
                            <li class="nk-menu-item">
                                <a href="<?php echo base_url('list-darta'); ?>" class="nk-menu-link"><span class="nk-menu-text">दर्ता सूची</span></a>
                            </li>
                            <?php endif ?>
                        </ul><!-- .nk-menu-sub -->
                    </li><!-- .nk-menu-item -->
                    <?php if (hasPermissions('chalani_list')): ?>
                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="fas fa-book-open"></em></span>
                            <span class="nk-menu-text">चलानी</span>
                        </a>
                        <?php endif ?>
                        <ul class="nk-menu-sub">
                            <?php if (hasPermissions('chalani_add')): ?>
                            <li class="nk-menu-item">
                                <a href="<?php echo base_url('add-chalani'); ?>" class="nk-menu-link"><span class="nk-menu-text">नयाँ चलानी</span></a>
                            </li>
                            <?php endif ?>
                            <?php if (hasPermissions('chalani_list')): ?>
                            <li class="nk-menu-item">
                                 <a href="<?php echo base_url('list-chalani'); ?>" class="nk-menu-link"><span class="nk-menu-text">चलानी सूची</span></a>
                            </li>
                            <?php endif ?>
                            
                        </ul><!-- .nk-menu-sub -->
                    </li><!-- .nk-menu-item -->
                    
                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-activity-round-fill"></em></span>
                            <span class="nk-menu-text">Report</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="#" class="nk-menu-link"><span class="nk-menu-text">दर्ता रिपोर्ट</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="#" class="nk-menu-link"><span class="nk-menu-text">चलानी रिपोर्ट</span></a>
                            </li>
                            
                        </ul><!-- .nk-menu-sub -->
                    </li><!-- .nk-menu-item -->
                    
                    
                </ul><!-- .nk-menu -->
            </div>
            <div class="nk-menu-content" data-content="navBusiness">
                <h5 class="title">दर्ता प्रणाली(MIS)</h5>
                <ul class="nk-menu">
                    <li class="nk-menu-item">
                        <a href="dashboard" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-home-fill"></em></span>
                            <span class="nk-menu-text">Dashboard</span>
                        </a>
                    </li><!-- .nk-menu-item -->
                    <?php if (hasPermissions('bewosaye_list')): ?>
                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="fa fa-industry"></em></span>
                            <span class="nk-menu-text">उद्योग व्यवशाय</span>
                        </a>
                        <?php endif ?>
                        <ul class="nk-menu-sub">
                            <?php if (hasPermissions('bewosaye_add')): ?>
                            <li class="nk-menu-item">
                                <a href="<?php echo base_url('add-bewosaye'); ?>" class="nk-menu-link"><span class="nk-menu-text">नयाँ</span></a>
                            </li>
                            <?php endif ?>
                            <?php if (hasPermissions('bewosaye_list')): ?>
                            <li class="nk-menu-item">
                                <a href="<?php echo base_url('bewosaye-list'); ?>" class="nk-menu-link"><span class="nk-menu-text">सूची</span></a>
                            </li>
                            <?php endif ?>
                        </ul><!-- .nk-menu-sub -->
                    </li><!-- .nk-menu-item -->
                    <?php if (hasPermissions('agri_list')): ?>
                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="fas fa-tractor"></em></span>
                            <span class="nk-menu-text">कृषि/पशु समूह</span>
                        </a>
                        <?php endif ?>
                        <ul class="nk-menu-sub">
                            <?php if (hasPermissions('agri_add')): ?>
                            <li class="nk-menu-item">
                                <a href="<?php echo base_url('add-agri'); ?>" class="nk-menu-link"><span class="nk-menu-text">नयाँ</span></a>
                            </li>
                            <?php endif ?>
                            <?php if (hasPermissions('agri_list')): ?>
                            <li class="nk-menu-item">
                                <a href="<?php echo base_url('agri-list'); ?>" class="nk-menu-link"><span class="nk-menu-text">सूची</span></a>
                            </li>
                            <?php endif ?>
                        </ul><!-- .nk-menu-sub -->
                    </li><!-- .nk-menu-item -->
                    <?php if (hasPermissions('sahakari_list')): ?>
                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="fas fa-people-carry"></em></span>
                            <span class="nk-menu-text">सहकारी</span>
                        </a>
                        <?php endif ?>
                        <ul class="nk-menu-sub">
                            <?php if (hasPermissions('sahakari_add')): ?>
                            <li class="nk-menu-item">
                                <a href="<?php echo base_url('add-sahakari'); ?>" class="nk-menu-link"><span class="nk-menu-text">नयाँ</span></a>
                            </li>
                            <?php endif ?>
                            <?php if (hasPermissions('sahakari_list')): ?>
                            <li class="nk-menu-item">
                                <a href="<?php echo base_url('sahakari-list'); ?>" class="nk-menu-link"><span class="nk-menu-text">सूची</span></a>
                            </li>
                            <?php endif ?>
                        </ul><!-- .nk-menu-sub -->
                    </li><!-- .nk-menu-item -->
                    <?php if (hasPermissions('ghabarga_list')): ?>
                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="fas fa-toolbox"></em></span>
                            <span class="nk-menu-text">निर्माण-व्यवशाय</span>
                        </a>
                        <?php endif ?>
                        <ul class="nk-menu-sub">
                            <?php if (hasPermissions('ghabarga_add')): ?>
                            <li class="nk-menu-item">
                                <a href="<?php echo base_url('add-ghabarga'); ?>" class="nk-menu-link"><span class="nk-menu-text">नयाँ</span></a>
                            </li>
                            <?php endif ?>
                            <?php if (hasPermissions('ghabarga_list')): ?>
                            <li class="nk-menu-item">
                                <a href="<?php echo base_url('ghabarga-list'); ?>" class="nk-menu-link"><span class="nk-menu-text">सूची</span></a>
                            </li>
                            <?php endif ?>
                        </ul><!-- .nk-menu-sub -->
                    </li><!-- .nk-menu-item -->
                    <?php if (hasPermissions('club_list')): ?>
                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="fas fa-child"></em></span>
                            <span class="nk-menu-text">बाल/युवा क्लब</span>
                        </a>
                        <?php endif ?>
                        <ul class="nk-menu-sub">
                            <?php if (hasPermissions('club_add')): ?>
                            <li class="nk-menu-item">
                                <a href="<?php echo base_url('add-club'); ?>" class="nk-menu-link"><span class="nk-menu-text">नयाँ</span></a>
                            </li>
                            <?php endif ?>
                            <?php if (hasPermissions('club_list')): ?>
                            <li class="nk-menu-item">
                                <a href="<?php echo base_url('club-list'); ?>" class="nk-menu-link"><span class="nk-menu-text">सूची</span></a>
                            </li>
                            <?php endif ?>
                        </ul><!-- .nk-menu-sub -->
                    </li><!-- .nk-menu-item -->
                    <?php if (hasPermissions('muhan_list')): ?>
                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="fas fa-faucet"></em></span>
                            <span class="nk-menu-text">खानेपानी/मुहान</span>
                        </a>
                        <?php endif ?>
                        <ul class="nk-menu-sub">
                            <?php if (hasPermissions('muhan_add')): ?>
                            <li class="nk-menu-item">
                                <a href="<?php echo base_url('add-waterreg'); ?>" class="nk-menu-link"><span class="nk-menu-text">नयाँ</span></a>
                            </li>
                            <?php endif ?>
                            <?php if (hasPermissions('muhan_list')): ?>
                            <li class="nk-menu-item">
                                <a href="<?php echo base_url('waterreg-list'); ?>" class="nk-menu-link"><span class="nk-menu-text">सूची</span></a>
                            </li>
                            <?php endif ?>
                        </ul><!-- .nk-menu-sub -->
                    </li><!-- .nk-menu-item -->
                    <?php if (hasPermissions('samuha_list')): ?>
                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-users-fill"></em></span>
                            <span class="nk-menu-text">आमा/महिला समूह</span>
                        </a>
                        <?php endif ?>
                        <ul class="nk-menu-sub">
                            <?php if (hasPermissions('samuha_add')): ?>
                            <li class="nk-menu-item">
                                <a href="<?php echo base_url('add-samuha'); ?>" class="nk-menu-link"><span class="nk-menu-text">नयाँ</span></a>
                             </li>
                            <?php endif ?>
                            <?php if (hasPermissions('samuha_list')): ?>
                            <li class="nk-menu-item">
                                <a href="<?php echo base_url('samuha-list'); ?>" class="nk-menu-link"><span class="nk-menu-text">सूची</span></a>
                            </li>
                            <?php endif ?>
                        </ul><!-- .nk-menu-sub -->
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="fas fa-wheelchair"></em></span>
                            <span class="nk-menu-text">अपाङ्गता परिचयपत्र</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <?php if (hasPermissions('apanga_add')): ?>
                            <li class="nk-menu-item">
                                <a href="<?php echo base_url('add-apanga'); ?>" class="nk-menu-link"><span class="nk-menu-text">नयाँ</span></a>
                            </li>
                            <?php endif ?>
                            <?php if (hasPermissions('apanga_list')): ?>
                            <li class="nk-menu-item">
                                <a href="<?php echo base_url('apanga-list'); ?>" class="nk-menu-link"><span class="nk-menu-text">सूची</span></a>
                            </li>
                            <?php endif ?>
                        </ul><!-- .nk-menu-sub -->
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-users-fill"></em></span>
                            <span class="nk-menu-text">अन्य</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="#" class="nk-menu-link"><span class="nk-menu-text">नयाँ</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="#" class="nk-menu-link"><span class="nk-menu-text">सूची</span></a>
                            </li>
                            
                        </ul><!-- .nk-menu-sub -->
                    </li><!-- .nk-menu-item -->
                </ul><!-- .nk-menu -->
            </div>
            <div class="nk-menu-content" data-content="navProgress">
                <h5 class="title">प्रगति विवरण प्रणाली</h5>
                <ul class="nk-menu">
                    <?php if (hasPermissions('employee_list')): ?>
                    <li class="nk-menu-item">
                        <a href="<?php echo base_url('employee-list'); ?>" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-user-circle-fill"></em></span>
                            <span class="nk-menu-text">कर्मचारी विवरण</span>
                        </a>
                    </li>
                    <?php endif ?>
                    <?php if (hasPermissions('law_list')): ?>
                    <li class="nk-menu-item">
                        <a href="<?php echo base_url('laws-list'); ?>" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-files-fill"></em></span>
                            <span class="nk-menu-text">ऐन, नियमावली, कार्यविधि</span>
                        </a>
                    </li>
                    <?php endif ?>
                    <?php if (hasPermissions('year_list')): ?>
                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-pen-alt-fill"></em></span>
                            <span class="nk-menu-text">शिक्षा शाखा</span>
                        </a>
                        <?php endif ?>
                        <?php if (hasPermissions('year_list')): ?>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="<?php echo base_url('edu-monthly'); ?>" class="nk-menu-link"><span class="nk-menu-text">Monthly Report</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="#" class="nk-menu-link"><span class="nk-menu-text">One Time </span></a>
                            </li>
                            
                        </ul><!-- .nk-menu-sub -->
                        <?php endif ?>
                    </li><!-- .nk-menu-item -->
                    <?php if (hasPermissions('year_list')): ?>
                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-plus-circle-fill"></em></span>
                            <span class="nk-menu-text">स्वास्थ्य शाखा</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="#" class="nk-menu-link"><span class="nk-menu-text">Add</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="#" class="nk-menu-link"><span class="nk-menu-text">View</span></a>
                            </li>
                            
                        </ul><!-- .nk-menu-sub -->
                    </li><!-- .nk-menu-item --><!-- .nk-menu-item -->
                    <?php endif ?>
                    <?php if (hasPermissions('year_list')): ?>
                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-plus-circle-fill"></em></span>
                            <span class="nk-menu-text">कृषि/पशु विकाश शाखा</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="#" class="nk-menu-link"><span class="nk-menu-text">Add</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="#" class="nk-menu-link"><span class="nk-menu-text">View</span></a>
                            </li>
                            
                        </ul><!-- .nk-menu-sub -->
                    </li><!-- .nk-menu-item --><!-- .nk-menu-item -->
                    <?php endif ?>
                    <?php if (hasPermissions('year_list')): ?>
                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-plus-circle-fill"></em></span>
                            <span class="nk-menu-text">उद्यम शाखा</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="#" class="nk-menu-link"><span class="nk-menu-text">Add</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="#" class="nk-menu-link"><span class="nk-menu-text">View</span></a>
                            </li>
                            
                        </ul><!-- .nk-menu-sub -->
                    </li><!-- .nk-menu-item --><!-- .nk-menu-item -->
                    <?php endif ?>
                    <?php if (hasPermissions('year_list')): ?>
                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-plus-circle-fill"></em></span>
                            <span class="nk-menu-text">सा.सु/पंजिकरण शाखा</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="#" class="nk-menu-link"><span class="nk-menu-text">Add</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="#" class="nk-menu-link"><span class="nk-menu-text">View</span></a>
                            </li>
                            
                        </ul><!-- .nk-menu-sub -->
                    </li><!-- .nk-menu-item --><!-- .nk-menu-item -->
                    <?php endif ?>
                    <?php if (hasPermissions('year_list')): ?>
                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-plus-circle-fill"></em></span>
                            <span class="nk-menu-text">महिला विकाश शाखा</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="#" class="nk-menu-link"><span class="nk-menu-text">Add</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="#" class="nk-menu-link"><span class="nk-menu-text">View</span></a>
                            </li>
                            
                        </ul><!-- .nk-menu-sub -->
                    </li><!-- .nk-menu-item --><!-- .nk-menu-item -->
                    <?php endif ?>
                    <?php if (hasPermissions('year_list')): ?>
                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-plus-circle-fill"></em></span>
                            <span class="nk-menu-text">भौतिक पूर्वाधार शाखा</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="#" class="nk-menu-link"><span class="nk-menu-text">Add</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="#" class="nk-menu-link"><span class="nk-menu-text">View</span></a>
                            </li>
                            
                        </ul><!-- .nk-menu-sub -->
                    </li><!-- .nk-menu-item --><!-- .nk-menu-item -->
                    <?php endif ?>
                    <?php if (hasPermissions('year_list')): ?>
                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-plus-circle-fill"></em></span>
                            <span class="nk-menu-text">आर्थिक विकाश शाखा</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="#" class="nk-menu-link"><span class="nk-menu-text">Add</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="#" class="nk-menu-link"><span class="nk-menu-text">View</span></a>
                            </li>
                            
                        </ul><!-- .nk-menu-sub -->
                    </li><!-- .nk-menu-item --><!-- .nk-menu-item -->
                    <?php endif ?>
                    <?php if (hasPermissions('year_list')): ?>
                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-plus-circle-fill"></em></span>
                            <span class="nk-menu-text">रोजगार शाखा</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="#" class="nk-menu-link"><span class="nk-menu-text">Add</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="#" class="nk-menu-link"><span class="nk-menu-text">View</span></a>
                            </li>
                            
                        </ul><!-- .nk-menu-sub -->
                    </li><!-- .nk-menu-item --><!-- .nk-menu-item -->
                    <?php endif ?>
                    <?php if (hasPermissions('year_list')): ?>
                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-plus-circle-fill"></em></span>
                            <span class="nk-menu-text">विपद व्यवस्थापन शाखा</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="#" class="nk-menu-link"><span class="nk-menu-text">Add</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="#" class="nk-menu-link"><span class="nk-menu-text">View</span></a>
                            </li>
                            
                        </ul><!-- .nk-menu-sub -->
                    </li><!-- .nk-menu-item --><!-- .nk-menu-item -->
                    <?php endif ?>
                    <?php if (hasPermissions('year_list')): ?>
                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-plus-circle-fill"></em></span>
                            <span class="nk-menu-text">न्यायीक सम्पादन</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="#" class="nk-menu-link"><span class="nk-menu-text">Add</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="#" class="nk-menu-link"><span class="nk-menu-text">View</span></a>
                            </li>
                            
                        </ul><!-- .nk-menu-sub -->
                    </li><!-- .nk-menu-item --><!-- .nk-menu-item -->
                    <?php endif ?>
                    <?php if (hasPermissions('year_list')): ?>
                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-linux"></em></span>
                            <span class="nk-menu-text">सूचना प्रविधि शाखा</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="#" class="nk-menu-link"><span class="nk-menu-text">Add</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="#" class="nk-menu-link"><span class="nk-menu-text">View</span></a>
                            </li>
                            
                        </ul><!-- .nk-menu-sub -->
                    </li><!-- .nk-menu-item --><!-- .nk-menu-item -->
                    <?php endif ?>
                </ul><!-- .nk-menu -->
            </div>
            <div class="nk-menu-content" data-content="navProject">
                <h5 class="title">योजना प्रणाली</h5>
                <ul class="nk-menu">
                    <li class="nk-menu-item">
                        <a href="#" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-inbox-fill"></em></span>
                            <span class="nk-menu-text">बजेट</span>
                        </a>
                    </li>
                    <li class="nk-menu-item">
                        <a href="#" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-chat-fill"></em></span>
                            <span class="nk-menu-text">योजना विवरण</span>
                        </a>
                    </li>
                    
                </ul><!-- .nk-menu -->
            </div>
            <div class="nk-menu-content" data-content="navHospital">
                <h5 class="title">स्वास्थ्य व्यवस्थापन प्रणाली</h5>
                <ul class="nk-menu">
                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-tile-thumb-fill"></em></span>
                            <span class="nk-menu-text">बिरामि विवरण</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="#" class="nk-menu-link"><span class="nk-menu-text">Project Cards</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="#" class="nk-menu-link"><span class="nk-menu-text">Project List</span></a>
                            </li>
                        </ul><!-- .nk-menu-sub -->
                    </li><!-- .nk-menu-item -->
                    
                    
                    <li class="nk-menu-item">
                        <a href="#" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-file-fill"></em></span>
                            <span class="nk-menu-text">नयाँ सेवा</span>
                        </a>
                    </li>
                </ul><!-- .nk-menu -->
            </div>
            
            <div class="nk-menu-content" data-content="navSetting">
                <h5 class="title">Users & Role Management</h5>
                <ul class="nk-menu">
                    <?php if (hasPermissions('year_list')): ?>
                    <li class="nk-menu-item">
                        <a href="<?php echo base_url('yearlist'); ?>" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-calendar-alt-fill"></em></span>
                            <span class="nk-menu-text">आर्थिक वर्ष</span>
                        </a>
                    </li>
                    <?php endif ?>
                    <?php if (hasPermissions('ward_list')): ?>
                    <li class="nk-menu-item">
                        <a href="<?php echo base_url('wardlist'); ?>" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-building-fill"></em></span>
                            <span class="nk-menu-text">वडा कार्यालय</span>
                        </a>
                    </li>
                    <?php endif ?>
                    <?php if (hasPermissions('buscat_list')): ?>
                    <li class="nk-menu-item">
                        <a href="<?php echo base_url('buscategorylist'); ?>" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-list-fill"></em></span>
                            <span class="nk-menu-text">व्यवशाय प्रकार</span>
                        </a>
                    </li>
                    <?php endif ?>
                    <?php if (hasPermissions('users_list')): ?>
                    <li class="nk-menu-item">
                        <a href="<?php echo base_url('users'); ?>" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-user-alt-fill"></em></span>
                            <span class="nk-menu-text">प्रयोगकर्ता व्यवस्थापन</span>
                        </a>
                    </li>
                    <?php endif ?>
                    <?php if (hasPermissions('roles_list')): ?>
                    <li class="nk-menu-item">
                        <a href="<?php echo base_url('roles'); ?>" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-crosshair-fill"></em></span>
                            <span class="nk-menu-text">प्रयोगकर्ता प्रकार</span>
                        </a>
                    </li>
                    <?php endif ?>
                    <?php if (hasPermissions('permissions_list')): ?>
                    <li class="nk-menu-item">
                        <a href="<?php echo base_url('permissions'); ?>" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-security"></em></span>
                            <span class="nk-menu-text">अनुमति व्यवस्थापन</span>
                        </a>
                    </li>
                    <?php endif ?>
                    <?php if (hasPermissions('activity_log_list')): ?>
                    <li class="nk-menu-item">
                        <a href="<?php echo base_url('activityLogs'); ?>" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-activity-round-fill"></em></span>
                            <span class="nk-menu-text">क्रियाकलाप</span>
                        </a>
                    </li>
                    <?php endif ?>
                    <?php if (hasPermissions('backup_db')): ?>
                    <li class="nk-menu-item">
                        <a href="<?php echo base_url('backup'); ?>" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-db-fill"></em></span>
                            <span class="nk-menu-text">ब्याकप</span>
                        </a>
                    </li>
                   <?php endif ?>
                   <?php if (hasPermissions('general_settings')): ?>
                    <li class="nk-menu-item">
                        <a href="<?php echo base_url('settings/general'); ?>" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-opt-dot-fill"></em></span>
                            <span class="nk-menu-text">General Setting</span>
                        </a>
                    </li>
                   <?php endif ?>
                   <?php if (hasPermissions('company_settings')): ?>
                    <li class="nk-menu-item">
                        <a href="<?php echo base_url('settings/company'); ?>" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-location"></em></span>
                            <span class="nk-menu-text">Office setting</span>
                        </a>
                    </li>
                   <?php endif ?>
                   <?php if (hasPermissions('email_templates')): ?>
                    <li class="nk-menu-item">
                        <a href="<?php echo base_url('settings/email_templates'); ?>" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-mail-fill"></em></span>
                            <span class="nk-menu-text">Email Setting</span>
                        </a>
                    </li>
                   <?php endif ?>
                </ul><!-- .nk-menu -->
            </div>
            
            
        </div>
    </div>
</div>

<!-- JavaScript -->
    <script src="<?= base_url('assets/js/bundle.js?ver=3.1.2') ?>"></script>
    <script src="<?= base_url('assets/js/scripts.js?ver=3.1.2') ?>"></script>
    <link rel="stylesheet" href="<?= base_url('assets/css/editors/quill.css?ver=3.1.2') ?>">
    <script src="<?= base_url('assets/js/libs/editors/quill.js?ver=3.1.2') ?>"></script>
    <script src="<?= base_url('assets/js/editors.js?ver=3.1.2') ?>"></script>