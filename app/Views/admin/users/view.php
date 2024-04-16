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
    <title>View User</title>
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
                                
                            <section class="content">

                            <div class="row">
                                      <div class="col-12">
                                        <!-- Custom Tabs -->
                                        <div class="card">
                                          <div class="card-header d-flex p-0">
                                            <h5 class="card-title p-3"><?php echo lang('App.view_user') ?></h5>
                                            <ul class="nav nav-pills ml-auto p-2">

                            					<li class="nav-item active"><a class="nav-link active" data-toggle="tab"><?php echo lang('App.overview') ?></a></li>
                            					
                                            </ul>
                                          </div><!-- /.card-header -->
                                          <div class="card-body">
                                            <div class="tab-content">
                                              <div class="tab-pane active" id="tab_1">
                            				  <div class="row">
                                  		<div class="col-sm-2" style="padding-left: 50px;">
                                  			<br>
                                  			<img src="<?php echo userProfile($user->id) ?>" width="150" class="img-circle" alt="">
                                  			<br>
                                  		</div>
                                  		<div class="col-sm-10" style="padding-left: 50px;">
                                  			<table class="table table-bordered table-striped">
                                  				<tbody>
                                  					<tr>
                                  						<td width="160"><strong><?php echo lang('App.user_name') ?></strong>:</td>
                                  						<td><?php echo $user->name ?></td>
                                  					</tr>
                                  					<tr>
                                  						<td><strong><?php echo lang('App.user_email') ?></strong>:</td>
                                  						<td><?php echo $user->email ?></td>
                                  					</tr>
                                  					<tr>
                                  						<td><strong><?php echo lang('App.user_contact') ?></strong>:</td>
                                  						<td><?php echo $user->phone ?></td>
                                  					</tr>
                                  					<tr>
                                  						<td><strong><?php echo lang('App.user_last_login') ?></strong>:</td>
                                  						<td><?php echo ($user->last_login!='0000-00-00 00:00:00')?date( setting('datetime_format'), strtotime($user->last_login)):'No Record' ?></td>
                                  					</tr>
                                  					<tr>
                                  						<td><strong><?php echo lang('App.user_username') ?></strong>:</td>
                                  						<td><?php echo $user->username ?></td>
                                  					</tr>
                                  					<tr>
                                  						<td><strong><?php echo lang('App.user_role') ?></strong>:</td>
                                  						<td><?php echo $user->role->title ?></td>
                                  					</tr>
                                  				</tbody>
                                  			</table>
                                  		</div>
                                  	</div>
                                              </div>
                                              
                                                
                                            </div>
                                            <!-- /.tab-content -->
                                          </div><!-- /.card-body -->
                                        </div>
                                        <!-- ./card -->
                                      </div>
                                      <!-- /.col -->
                                    </div>
                                    <!-- /.row -->
                                    <!-- END CUSTOM TABS -->
                                                
                            </section>
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