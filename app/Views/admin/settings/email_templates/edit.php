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
    <title>Email Template</title>
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
                                            <h3 class="nk-block-title page-title">Email Template</h3>
                                            <div class="nk-block-des text-soft">
                                                <p>Email Template Design</p>
                                            </div>
                                        </div><!-- .nk-block-head-content -->
                                        <div class="nk-block-head-content">
                                            <div class="toggle-wrap nk-block-tools-toggle">
                                                <a href="<?php echo base_url('dashboard'); ?>" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                                                <div class="toggle-expand-content" data-content="pageMenu">
                                                    
                                                </div>
                                            </div><!-- .toggle-wrap -->
                                        </div><!-- .nk-block-head-content -->
                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->
                                <div class="card card-bordered">
                                            <div class="card-inner">
                                            <?php echo form_open_multipart('settings/update_email_templates/'.$template->id, [ 'class' => 'form-validate', 'autocomplete' => 'off', 'method' => 'post' ]); ?>
                                                    <div class="row g-gs">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label" for="settings_email_code">Email Code</label>
                                                                <div class="form-control-wrap">
                                                                <input type="text" class="form-control" readonly name="code" id="Code" value="<?php echo $template->code ?>" required placeholder="Enter Code" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label" for="settings_email_name">Email Template Name</label>
                                                                <div class="form-control-wrap ">
                                                                <input type="text" class="form-control" name="name" id="Name" value="<?php echo $template->name ?>" required placeholder="<?php echo lang('App.settings_email_name') ?>" autofocus />
                                                            </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                        <label for="Data"> <?php echo lang('App.settings_email_template') ?></label>
                                                        <textarea name="data" rows="40" id="Data"><?php echo $template->data ?></textarea>
                                                    </div>
                                                        <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <button type="submit" class="btn btn-lg btn-primary">UPDATE</button>
                                                                <a href="<?php echo base_url('settings/email_templates'); ?>" class="btn btn-danger">CANCEL</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
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
<script src="<?php echo assets_url('admin') ?>/plugins/ckeditor/ckeditor.js"></script>
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('Data')
  })
</script>
</html>