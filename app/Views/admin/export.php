<!DOCTYPE html>
<html lang="en" class="js">

<head>
    <base href="">
    <meta charset="utf-8">
    <meta name="Municipality" content="MUN-MIS">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Digital Palika">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="<?= base_url('images/favicon.png') ?>">
    <!-- Page Title  -->
    <title>Export</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="<?= base_url('assets/css/dashlite.css?ver=3.1.2') ?>">
    <link id="skin-default" rel="stylesheet" href="<?= base_url('assets/css/theme.css?ver=3.1.2') ?>">
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
                                <div class="nk-block-head nk-block-head-sm">
                                    <div class="nk-block-between">
                                        <div class="nk-block-head-content">
                                            <h3 class="nk-block-title page-title">Backup Database</h3>
                                            <div class="nk-block-des text-soft">
                                                
                                            </div>
                                        </div><!-- .nk-block-head-content -->
                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->
                 <!-- Default card -->
                 <div class="card">
                      <div class="card-header with-border">
                        <h3 class="card-title"><?php echo lang('App.backup_db') ?></h3>
                      </div>
                      <div class="card-body">
                      	<a href="<?php echo url('backup/exportDB') ?>" class="btn btn-lg btn-primary"> <i class="fa fa-download"></i> &nbsp;&nbsp;&nbsp; <?php echo lang('App.backup_generate_message') ?></a>
                      </div>
                      <!-- /.card-body -->

                </div>
  <!-- /.card -->
                <!-- content @e -->
            </div>
            <!-- wrap @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->
    
 
</body>
<script src="<?= base_url('assets/js/libs/datatable-btns.js?ver=3.1.2')?>"></script>
</html>