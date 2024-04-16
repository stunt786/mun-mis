<!DOCTYPE html>
<html lang="en" class="js">

<head>
    <base href="/">
    <meta charset="utf-8">
    <meta name="Municipality" content="MUN-MIS">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Digital Palika">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="<?= base_url('images/favicon.png') ?>">
    <!-- Page Title  -->
    <title>Edit Roles</title>
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
                <div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="nk-block-head nk-block-head-sm">
                                    <div class="nk-block-between">
                                        <div class="nk-block-head-content">
                                            <h3 class="nk-block-title page-title">प्रयोगकर्ता प्रकार अद्यावधिक</h3>
                                            <div class="nk-block-des text-soft">
                                                <p>Edit Role</p>
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
                                            <?php echo form_open('roles/update/'.$role->id, [ 'class' => 'form-validate' ]); ?>  
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label" for="fv-full-name">प्रयोगकर्ता प्रकार (Role Name)</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="formClient-Name" name="name" value="<?php echo $role->title ?>" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <h4>अनुमति सूचि</h4>
                                                        
                                                        <div class="form-group">
                                                            <label for="formClient-Table"><?php echo lang('App.permissions') ?></label>
                                                            <div class="row">
                                                              <div class="col-sm-10">
                                                                <table class="table table-bordered table-striped">
                                                                  <thead>
                                                                    <tr>
                                                                      <th>Permission List</th>
                                                                      <th width="50" class="text-center"><input type="checkbox" class="check-select-all-p"></th>
                                                                    </tr>
                                                                  </thead>
                                                                  <tbody>
                                                                  <tr>
                                                                    <?php if (!empty($permissions = model('App\Models\PermissionModel')->findAll())): ?>
                                                                      <?php foreach ($permissions as $row): ?>
                                                                        <td><?php echo ucfirst($row->title) ?></td>
                                                                        <?php 
                                                                          $isChecked = in_array($row->code, $role_permissions) ? 'checked' : '';
                                                                         ?>
                                                                        <td width="50" class="text-center"><input type="checkbox" class="check-select-p" name="permission[]" value="<?php echo $row->code ?>" <?php echo $isChecked ?>></td>
                                                                      </tr>
                                                                      <?php endforeach ?>
                                                                    <?php else: ?>
                                                                      <tr>
                                                                        <td colspan="2" class="text-center">No Permissions Found</td>
                                                                      </tr>
                                                                    <?php endif ?>
                                                                  </tbody>
                                                                </table>
                                                              </div>
                                                            </div>

                                                                </div>
                                                        
                                                        <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />                                               
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <button type="submit" class="btn btn-lg btn-primary">UPDATE</button>
                                                                <a href="<?php echo base_url('roles'); ?>" class="btn btn-danger">CANCEL</a>
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
<script src="./assets/js/libs/datatable-btns.js?ver=3.1.2"></script>
<script>
  $(document).ready(function() {
    $('.form-validate').validate({
      errorElement: 'span',
      errorPlacement: function (error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
      },
      highlight: function (element, errorClass, validClass) {
        $(element).addClass('is-invalid');
      },
      unhighlight: function (element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
      }
    });

    $('.check-select-all-p').on('change', function() {

      $('.check-select-p').attr('checked', $(this).is(':checked'));
      
    })

    $('.table-DT').DataTable({
      "ordering": false,
    });
  })

</script>
</html>