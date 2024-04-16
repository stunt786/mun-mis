<!DOCTYPE html>
<html lang="en" class="js">

<head>
    <base href="../">
    <meta charset="utf-8">
    <meta name="Municipality" content="MUN-MIS">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Digital Palika">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="<?= base_url('images/favicon.png') ?>">
    <!-- Page Title  -->
    <title></title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="<?= base_url('assets/css/dashlite.css?ver=3.1.2') ?>">
    <link id="skin-default" rel="stylesheet" href="<?=base_url('assets/css/theme.css?ver=3.1.2') ?>">
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
                                            <h3 class="nk-block-title page-title">प्रयोगकर्ता सूचि</h3>
                                            <div class="nk-block-des text-soft">
                                                <p>System Users Records</p>
                                            </div>
                                        </div><!-- .nk-block-head-content -->
                                        <div class="nk-block-head-content">
                                            <div class="toggle-wrap nk-block-tools-toggle">
                                                <a href="<?php echo base_url('dashboard'); ?>" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                                                <div class="toggle-expand-content" data-content="pageMenu">
                                                    <ul class="nk-block-tools g-3">
                                                        
                                                        <li class="nk-block-tools-opt">
                                                            <div class="drodown">
                                                                <a href="<?php echo base_url('add-user'); ?>" class="dropdown-toggle btn btn-icon btn-primary" data-bs-toggle="dropdown"><em class="icon ni ni-plus"></em></a>
                                                                <div class="dropdown-menu dropdown-menu-end">
                                                                    <ul class="link-list-opt no-bdr">
                                                                    <?php if (hasPermissions('users_add')): ?>
                                                                        <li><a href="<?php echo url('users/add') ?>"><span>नयाँ प्रयोगकर्ता</span></a></li>
                                                                        <?php endif ?>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div><!-- .toggle-wrap -->
                                        </div><!-- .nk-block-head-content -->
                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->
                                <div class="nk-block">
                                <div class="card card-bordered card-preview">
                                            <div class="card-inner">
                                                <table class="datatable-init-export nowrap table" data-export-title="Export">
                                                    <thead style="text-align: center;">
                                                        <tr>
                                                            <th>#</th>
                                                            <th>प्रोफाइल</th>
                                                            <th>यूजरनेम</th>
                                                            <th>ईमेल</th>
                                                            <th>रोल</th>
                                                            <th>पछिल्लो लगइन मिति</th>
                                                            <th>प्रयोगकर्ता सक्रिय</th>
                                                            <th class="nk-tb-col nk-tb-col-tools text-end">#</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php foreach ($users as $list) : ?>
                                                        <tr style="text-align: center;">
                                                        <td><?php echo $list->id ?></td>
                                                        <td style="text-align: center;">
                                                            <img src="<?php echo userProfile($list->id) ?>" width="40" height="40" alt="" class="img-avtar">
                                                          </td>
                                                        <td><?php echo $list->name ?></td>
                                                        <td><?php echo $list->email ?></td>
                                                        <td><?php echo ucfirst(model('App\Models\RoleModel')->getRowById($list->role, 'title')) ?></td>
                                                        <td>
                                                          <?php echo ($list->last_login!='0000-00-00 00:00:00')?date( setting('date_format'), strtotime($list->last_login)):'No Record' ?>
                                                        </td>
                                                        <td>
                                                            <?php if (logged('id')!==$list->id): ?>
                                                              <input type="checkbox" name="my-checkbox"  onchange="updateUserStatus('<?php echo $list->id ?>', $(this).is(':checked') )" <?php echo ($list->status) ? 'checked' : '' ?> data-bootstrap-switch  data-off-color="secondary" data-on-color="success"  data-off-text="<?php echo lang('App.user_inactive') ?>" data-on-text="<?php echo lang('App.user_active') ?>">
                                                            <?php else: ?>
                                                              <input type="checkbox" name="my-checkbox" disabled data-bootstrap-switch  data-off-color="secondary" data-on-color="success"  data-off-text="<?php echo lang('App.user_inactive') ?>" data-on-text="<?php echo lang('App.user_active') ?>">
                                                            <?php endif ?>
                                                          </td>
                                                            <td class="nk-tb-col nk-tb-col-tools">
                                                                <ul class="nk-tb-actions gx-1">
                                                                    <li>
                                                                        <div class="drodown">
                                                                            <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                                <ul class="link-list-opt no-bdr">
                                                                                  <?php if (hasPermissions('users_edit')): ?>
                                                                                    <li><a href="<?php echo url('users/edit/'.$list->id) ?>"  title="<?php echo lang('App.edit_user') ?>"><em class="icon ni ni-edit"></em><span>Edit</span></a></li>
                                                                                    <?php endif ?>
                                                                                    <?php if (hasPermissions('users_delete')): ?>
                                                                                    <li><a href="<?php echo url('users/delete/'.$list->id) ?>"  onclick="return confirm('Do you really want to delete this user ?')" title="<?php echo lang('App.delete_user') ?>" data-toggle="tooltip"><em class="icon ni ni-trash"></em><span>Delete</span></a></li>
                                                                                    <?php else: ?>
                                                                                      <a href="#"  title="<?php echo lang('App.delete_user_cannot') ?>" data-toggle="tooltip" disabled><i class="fa fa-trash"></i></a>
                                                                                    <?php endif ?>
                                                                                    </ul>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                            </td>
                                                        </tr>
                                                        <?php endforeach ?>   
                                                    </tbody>
                                                </table>
                                            </div>
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
<script src="./assets/js/libs/datatable-btns.js?ver=3.1.2"></script>
</html>