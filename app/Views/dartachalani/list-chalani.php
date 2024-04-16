<!DOCTYPE html>
<html lang="en" class="js">

<head>
    
    <meta charset="utf-8">
    <meta name="Municipality" content="MUN-MIS">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Digital Palika">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="<?= base_url('images/favicon.png') ?>">
    <!-- Page Title  -->
    <title><?= $title ?></title>
    <!-- StyleSheets  -->
     <!-- CSS -->
     <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
        <!-- Default theme -->
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
   
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
                                            <h3 class="nk-block-title page-title">चलानी सूचि</h3>
                                            <div class="nk-block-des text-soft">
                                                <p>चलानी विवरण सूचि</p>
                                            </div>
                                        </div><!-- .nk-block-head-content -->
                                        <div class="nk-block-head-content">
                                            <div class="toggle-wrap nk-block-tools-toggle">
                                                <a href="<?php echo base_url('dashboard'); ?>" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                                                <div class="toggle-expand-content" data-content="pageMenu">
                                                    <ul class="nk-block-tools g-3">
                                                        <li class="nk-block-tools-opt">
                                                            <div class="drodown">
                                                                <a href="<?php echo base_url('add-chalani'); ?>" class="dropdown-toggle btn btn-icon btn-primary" data-bs-toggle="dropdown"><em class="icon ni ni-plus"></em></a>
                                                                <div class="dropdown-menu dropdown-menu-end">
                                                                    <ul class="link-list-opt no-bdr">
                                                                        <?php if (hasPermissions('chalani_add')): ?>
                                                                        <li><a href="<?php echo base_url('add-chalani'); ?>"><span>नयाँ चलानी</span></a></li>
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
                                                <table class="datatable-init-export table" data-export-title="Export">
                                                    <thead style="text-align: center;">
                                                        <tr>
                                                            <th style="width: 10%;">चलानी नं</th>
                                                            <th style="width: 15%;">मिति</th>
                                                            <th style="width: 15%;">विषय</th>
                                                            <th style="width: 15%;">कार्यालय</th>
                                                            <th style="width: 25%;">ठेगाना</th>
                                                            <th style="width: 15%;">इमेल</th>
                                                            <th style="width: 5%;">दस्ताबेज</th>
                                                            <th class="nk-tb-col nk-tb-col-tools text-end">#</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php foreach ($chalani as $list) : ?>
                                                        <tr>
                                                            <td><?= $list['serial_number'] ?></td>
                                                            <td><?= $list['received_date'] ?></td>
                                                            <td><?= $list['subject'] ?></td>
                                                            <td><?= $list['office'] ?></td>
                                                            <td><?= $list['address'] ?></td>
                                                            <td><?= $list['email'] ?></td>
                                                            <td style="text-align: center;">
                                                                <a href="<?= base_url('/' . $list['file_path']) ?>" title="View Document">
                                                                    <i class="ni ni-eye"></i>
                                                                </a>
                                                            </td>
                                                            <td class="nk-tb-col nk-tb-col-tools">
                                                                <ul class="nk-tb-actions gx-1">
                                                                    
                                                                    <li>
                                                                        <div class="drodown">
                                                                            <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                                <ul class="link-list-opt no-bdr">
                                                                                    <?php if (hasPermissions('chalani_view')): ?>
                                                                                    <li><a href="<?= base_url('dartachalani/chalaniDetails/' . $list['id']) ?>"><em class="icon ni ni-eye"></em><span>View Details</span></a></li>
                                                                                    <?php endif ?>
                                                                                    <?php if (hasPermissions('chalani_edit')): ?>
                                                                                    <li><a href="<?= base_url('chalani/edit/' . $list['id']) ?>"><em class="icon ni ni-edit"></em><span>Edit</span></a></li>
                                                                                    <?php endif ?>
                                                                                    <?php if (hasPermissions('chalani_delete')): ?>
                                                                                    <li><a href="<?= base_url('chalani/delete/' . $list['id']) ?>"><em class="icon ni ni-trash"></em><span>Delete</span></a></li>
                                                                                    <?php endif ?>
                                                                                    </ul>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                            </td>
                                                        </tr>
                                                        <?php endforeach; ?>   
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
<script src="<?= base_url('assets/js/libs/datatable-btns.js?ver=3.1.2') ?>"></script>
<!-- JavaScript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<script>
    $(document).ready(function(){
        <?php if (session()->getFlashdata('main_success')) { ?>
        alertify.set('notifier','position', 'top-right');
        alertify.success("<?= session()->getFlashdata('main_success') ?>");
            <?php }?>

    })
</script>
</html>