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
                                            <h3 class="nk-block-title page-title">खा.पा.उ.स विवरण</h3>
                                            <div class="nk-block-des text-soft">
                                                <p>जम्मा खा.पा.उ.स विवरण</p>
                                            </div>
                                        </div><!-- .nk-block-head-content -->
                                        <div class="nk-block-head-content">
                                            <div class="toggle-wrap nk-block-tools-toggle">
                                                <a href="<?php echo base_url('dashboard'); ?>" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                                                <div class="toggle-expand-content" data-content="pageMenu">
                                                    <ul class="nk-block-tools g-3">
                                                        <li class="nk-block-tools-opt">
                                                            <div class="drodown">
                                                                <a href="<?php echo base_url('add-waterreg'); ?>" class="dropdown-toggle btn btn-icon btn-primary" data-bs-toggle="dropdown"><em class="icon ni ni-plus"></em></a>
                                                                <div class="dropdown-menu dropdown-menu-end">
                                                                    <ul class="link-list-opt no-bdr">
                                                                    <?php if (hasPermissions('muhan_add')): ?>
                                                                        <li><a href="<?php echo base_url('add-waterreg'); ?>"><span>नयाँ उ.सं</span></a></li>
                                                                        <?php endif ?>
                                                                        <?php if (hasPermissions('muhan_import')): ?>
                                                                        <li><a href="<?php echo base_url('import-waterreg'); ?>"><span>Import Excel</span></a></li>
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
                                                            <th>दर्ता नं</th>
                                                            <th>खा.पा.उ.स.को नाम</th>
                                                            <th>ठेगाना</th>
                                                            <th>वडा नं</th>
                                                            <th>खा.पा.उ.स बर्गिकरण</th>
                                                            <th>सम्पर्क</th>
                                                            <th>नविकरण स्थिति</th>
                                                            <th>अन्तिम नविकरण मिति</th>
                                                            <th>दस्ताबेज</th>
                                                            <th class="nk-tb-col nk-tb-col-tools text-end">#</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php foreach ($waterreg as $list) : ?>
                                                        <tr>
                                                            <td><?= $list['cert_no'] ?></td>
                                                            <td style="text-align: center;"><?= $list['org_name'] ?></td>
                                                            <td><?= $list['org_road_name'] ?></td>
                                                            <td><?= $list['org_ward_id'] ?></td>
                                                            <td><?= $list['org_type'] ?></td>
                                                            <td><?= $list['org_phone'] ?></td>
                                                            <td style="color: <?= $list['expiry_status'] == 1 ? 'green' : 'red' ?>;">
                                                                <?= $list['expiry_status'] == 1 ? 'नविकरण' : 'नविकरण बाँकी' ?>
                                                            </td>
                                                            <td><?= $list['renew_date'] ?></td>
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
                                                                                    <?php if (hasPermissions('muhan_view')): ?>
                                                                                    <li><a href="<?= base_url('waterreg/waterregDetails/' . $list['id']) ?>" target="_blank"><em class="icon ni ni-eye"></em><span>View Details</span></a></li>
                                                                                    <?php endif ?>
                                                                                    <?php if (hasPermissions('muhan_edit')): ?>
                                                                                    <li><a href="<?= base_url('waterreg/edit/' . $list['id']) ?>"><em class="icon ni ni-edit"></em><span>Edit</span></a></li>
                                                                                    <?php endif ?>
                                                                                    <?php if (hasPermissions('muhan_delete')): ?>
                                                                                    <li><a href="<?= base_url('waterreg/delete/' . $list['id']) ?>"><em class="icon ni ni-trash"></em><span>Delete</span></a></li>
                                                                                    <?php endif ?>
                                                                                    <?php if (hasPermissions('muhan_print')): ?>
                                                                                    <li><a href="<?= base_url('waterreg/print/' . $list['id']) ?>" target="_blank"><em class="icon ni ni-printer"></em><span>Print</span></a></li>
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
<script src="<?php echo base_url('/js/jquery.min.js'); ?>"></script>
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