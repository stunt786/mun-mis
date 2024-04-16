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
    <title>UserLogs</title>
    <!-- StyleSheets  -->
    <style>
        .row-1{
            padding-bottom: 25px;
        }
    </style>
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
                            <div class="row-1">
                                <div class="col-sm-12">
                                    <?php echo form_open('activityLogs', ['method' => 'GET', 'autocomplete' => 'off']); ?> 
                                    <div class="row">

                                        <div class="col-sm-2">
                                          <div class="form-group">
                                            <p style="margin-top: 20px"><strong><?php echo lang('App.filter') ?> :</strong> </p>
                                          </div>
                                        </div>

                                        <div class="col-sm-4">
                                          <div class="form-group">
                                            <label for="Filter-IpAddress"><?php echo lang('App.activity_ip_address') ?> </label>
                                            <input type="text" name="ip" id="Filter-IpAddress" onchange="$(this).parents('form').submit();" class="form-control" value="<?php echo get('ip') ?>" placeholder="Search by Ip Addres" />
                                          </div>
                                        </div>

                                        <div class="col-sm-4">
                                          <div class="form-group">
                                            <label for="Filter-User"><?php echo lang('App.user') ?></label>
                                            <select name="user" id="Filter-User" onchange="$(this).parents('form').submit();" class="form-control select2">
                                              <option value=""><?php echo lang('App.select_user') ?></option>
                                              <?php foreach (model('App\Models\UserModel')->findAll() as $row): ?>
                                                <?php $sel = (get('user')==$row->id)?'selected':'' ?>
                                                <option value="<?php echo $row->id ?>" <?php echo $sel ?>><?php echo $row->name ?> #<?php echo $row->id ?></option>
                                              <?php endforeach ?>
                                            </select>
                                          </div>
                                        </div>
                                            
                                        <div class="col-sm-2 text-right">
                                          <div class="form-group" style="margin-top: 25px;">
                                            <a href="<?php echo url('activityLogs') ?>" class="btn btn-danger"><?php echo lang('App.reset') ?></a>
                                            <button type="submit" class="btn btn-primary"><?php echo lang('App.filter') ?></button>
                                          </div>
                                        </div>
                                            
                                    </div>
                                            
                                  <?php echo form_close(); ?>
                                            
                                </div>
                                </div>
                                <div class="nk-block">
                                <div class="card card-bordered card-preview">
                                            <div class="card-inner">
                                                <table class="datatable-init-export nowrap table" data-export-title="Export">
                                                    <thead style="text-align: center;">
                                                        <tr>
                                                            <th style="width: 10%;">#</th>
                                                            <th style="width: 20%;">IP Address</th>
                                                            <th style="width: 40%;">Message</th>
                                                            <th style="width: 20%;">Date-Time</th>
                                                            <th class="nk-tb-col nk-tb-col-tools text-end">#</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php foreach ($activity_logs as $row): ?>
                                                        <tr style="text-align: center;">
                                                          <td width="60"><?php echo $row->id ?></td>
                                                          <td><?php echo !empty($row->ip_address)?'<a href="'.url('activityLogs/index?ip='.urlencode($row->ip_address)).'">'.$row->ip_address.'</a>':'N.A' ?></td>
                                                          <td>
                                                            <a href="<?php echo url('activityLogs/view/'.$row->id) ?>"><?php echo $row->title ?></a>
                                                          </td>
                                                          <td><?php echo date( setting('datetime_format') , strtotime($row->created_at)) ?></td>
                                                          <td>
                                                            <?php if (hasPermissions('activity_log_view')): ?>
                                                              <a href="<?php echo url('activityLogs/view/'.$row->id) ?>" class="btn btn-sm btn-default" title="View Activity" data-toggle="tooltip"><i class="ni ni-eye-alt"></i></a>
                                                              <?php if ($row->user > 0): ?>
                                                                <a href="<?php echo url('users/view/'.$row->user) ?>" class="btn btn-sm btn-default" title="View User" target="_blank" data-toggle="tooltip"><i class="ni ni-user-alt"></i></a>
                                                              <?php endif ?>
                                                            <?php endif ?>
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
<script src="<?= base_url('assets/js/libs/datatable-btns.js?ver=3.1.2') ?>"></script>
</html>