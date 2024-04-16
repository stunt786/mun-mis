<!DOCTYPE html>
<html lang="en" class="js">

<head>
<base href="../../">
    <meta charset="utf-8">
    <meta name="Municipality" content="MUN-MIS">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Digital Palika">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="<?= base_url('images/favicon.png') ?>">
    <!-- Page Title  -->
    <title>ActivityLogs</title>
    <!-- StyleSheets  -->
    
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
                                    <div class="nk-block-between">
                                        <div class="nk-block-head-content">
                                            <h3 class="nk-block-title page-title">प्रयोगकर्ता क्रियाकलाप</h3>
                                            <div class="nk-block-des text-soft">
                                                <p>View User Activity</p>
                                            </div>
                                        </div><!-- .nk-block-head-content -->
                                        
                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->
                                <div class="nk-block">
                                <div class="card card-bordered card-preview">
                                <section class="content">

                                        <!-- Default card -->
                                        <div class="card">
                                            
                                            <div class="card-body">
                                        
                                              <table class="table table-bordered table-striped">
                                                <thead>
                                                </thead>
                                                <tbody>
                                        
                                                    <tr>
                                                      <td width="150"><?php echo lang('App.id') ?>: </td>
                                                      <td><strong><?php echo $activity->id ?></strong></td>
                                                    </tr>
                                        
                                                    <tr>
                                                      <td><?php echo lang('App.activity_message') ?>: </td>
                                                      <td><strong><?php echo $activity->title ?></strong></td>
                                                    </tr>
                                        
                                                    <tr>
                                                      <td><?php echo lang('App.user') ?>: </td>
                                                      <?php $User = model('App\Models\UserModel')->getById($activity->user) ?>
                                                      <td><strong><?php echo $activity->user > 0 ? $User->name : '' ?></strong> <a href="<?php echo url('users/view/'.$User->id) ?>" target="_blank"><i class="fa fa-eye"></i></a></td>
                                                    </tr>
                                        
                                                    <tr>
                                                      <td><?php echo lang('App.activity_datetime') ?>: </td>
                                                      <td><strong><?php echo date('h:m a - d M, Y', strtotime($activity->created_at)) ?></strong></td>
                                                    </tr>
                                        
                                                </tbody>
                                              </table>
                                            </div>
                                            <!-- /.card-body -->
                                        </div>
                                        
                                        </section>
                                        </div><!-- .card-preview -->
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
    
 
</body>
<script src="<?= base_url('assets/js/libs/datatable-btns.js?ver=3.1.2') ?>"></script>
</html>