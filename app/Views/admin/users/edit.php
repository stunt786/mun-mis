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
    <title>Edit User</title>
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
                                            <h3 class="nk-block-title page-title">प्रयोगकर्ता अद्यावधिक</h3>
                                            <div class="nk-block-des text-soft">
                                                <p>Edit User Details</p>
                                            </div>
                                        </div><!-- .nk-block-head-content -->
                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->
                                <?php echo form_open_multipart('users/update/'.$user->id, [ 'class' => 'form-validate', 'autocomplete' => 'off' ]); ?>
                                <div class="nk-block">
                                    <div class="card card-bordered">
                                        <div class="card-inner-group">
                                            <div class="card-inner">
                                                <div class="nk-block-head">
                                                    <div class="nk-block-head-content">
                                                        <h5 class="title nk-block-title">व्यक्तिगत विवरण</h5>
                                                        <p>Edit User information</p>
                                                    </div>
                                                </div>
                                                <div class="nk-block">
                                                    <div class="row gy-4">
                                                        <div class="col-xxl-3 col-md-4">
                                                            <div class="form-group">
                                                                <label class="form-label" for="full-name">नाम थर</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="formClient-Name" name="name" value="<?php echo $user->name ?>" placeholder="Full Name" required>
                                                                </div>
                                                            </div>
                                                        </div><!--col-->
                                                        <div class="col-xxl-3 col-md-4">
                                                            <div class="form-group">
                                                                <label class="form-label" for="phone-no">सम्पर्क नं</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="number" class="form-control" id="formClient-Contact" name="phone" placeholder="Phone no" value="<?php echo $user->phone ?>" required>
                                                                </div>
                                                            </div>
                                                        </div><!--col-->
                                                        <div class="col-xxl-3 col-md-4">
                                                            <div class="form-group">
                                                                <label class="form-label" for="formClient-Email">इमेल</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="email" class="form-control" data-rule-remote="<?php echo url('users/check?notId='.$user->id) ?>" data-msg-remote="<?php echo lang('App.user_email_exists') ?>" id="formClient-Email" name="email" placeholder="Email" value="<?php echo $user->email ?>" required>
                                                                </div>
                                                            </div>
                                                        </div><!--col-->
                                                        <div class="col-xxl-3 col-md-4">
                                                            <div class="form-group">
                                                                <label class="form-label">कार्यालय/शाखा</label>
                                                                <div class="form-control-wrap">
                                                                <textarea type="text" class="form-control form-control-sm" name="address" id="formClient-Address" placeholder="<?php echo lang('App.user_enter_address') ?>"><?php echo $user->address ?></textarea>
                                                            </div>
                                                            </div>
                                                        </div><!--col-->
                                                    </div><!--row-->
                                                </div>
                                            </div><!-- .card-inner -->
                                            <div class="card-inner">
                                                <div class="nk-block-head">
                                                    <div class="nk-block-head-content">
                                                        <h5 class="title nk-block-title">लगइन विवरण</h5>
                                                        <p>Add login information of user </p>
                                                    </div>
                                                </div>
                                                <div class="nk-block">
                                                    <div class="row gy-4">
                                                    <div class="col-xxl-3 col-md-4">
                                                            <div class="form-group">
                                                                <label class="form-label" for="formClient-Username">यूजरनेम (Username)</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" class="form-control" data-rule-remote="<?php echo url('users/check?notId='.$user->id) ?>" data-msg-remote="<?php echo lang('App.user_username_take') ?>" id="formClient-Username" name="username" placeholder="username" value="<?php echo $user->username ?>" required>
                                                                    <small style="color: green;">Username in English without Spaces and special characters</small>
                                                                </div>
                                                            </div>
                                                        </div><!--col-->
                                                        <div class="col-xxl-3 col-md-4">
                                                            <div class="form-group">
                                                                <label class="form-label">प्रयोगकर्ता रोल (Role)</label>
                                                                <div class="form-control-wrap">
                                                                    <select class="form-select js-select2" id="formClient-Role" name="role" data-placeholder="Select Role">
                                                                        <option value="">Select</option>
                                                                        <?php foreach (model('App\Models\RoleModel')->findAll() as $row): ?>
                                                                            <?php $sel = !empty($user->role) && $user->role==$row->id ? 'selected' : '' ?>
                                                                                <option value="<?php echo $row->id ?>" <?php echo $sel ?>><?php echo $row->title ?></option>
                                                                            <?php endforeach ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div><!--col-->
                                                        <?php if (logged('id')!=$user->id): ?>
                                                            <?php endif ?>
                                                        <div class="col-xxl-3 col-md-4">
                                                            <div class="form-group">
                                                                <label class="form-label">प्रयोगकर्ता सक्रिय स्थिति (Status)</label>
                                                                <div class="form-control-wrap">
                                                                    <select class="form-select js-select2" id="formClient-Status" name="status" data-placeholder="Select Status">
                                                                    <?php $sel = $user->status==1 ? 'selected' : '' ?>
                                                                    <option value="1" <?php echo $sel ?>><?php echo lang('App.user_active') ?></option>
                                                                    <?php $sel = $user->status==0 ? 'selected' : '' ?>
                                                                    <option value="0" <?php echo $sel ?>><?php echo lang('App.user_inactive') ?></option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div><!--col-->
                                                        <div class="col-xxl-3 col-md-4">
                                                            <div class="form-group">
                                                                <label class="form-label">पासवर्ड (Password)</label>
                                                                <input type="password" class="form-control" minlength="8" id="formClient-Password" name="password" placeholder="Enter Password">
                                                            </div>
                                                        </div><!--col-->
                                                        <div class="col-xxl-3 col-md-4">
                                                            <div class="form-group">
                                                                <label class="form-label">पासवर्ड सुनिश्चितता (Confirm Password)</label>
                                                                <input type="password" class="form-control" id="c" equalTo="#formClient-Password" name="confirm_password" placeholder="Reenter Password">
                                                            </div>
                                                        </div><!--col-->
                                                    </div><!--row-->
                                                </div>
                                            </div><!-- .card-inner -->
                                            <div class="card-inner">
                                                <div class="nk-block-head">
                                                    <div class="nk-block-head-content">
                                                        <h5 class="title nk-block-title">प्रोफाइल फोटो</h5>
                                                        <p>प्रोफाइल फोटो अपलोड</p>
                                                    </div>
                                                </div>
                                                <div class="nk-block">
                                                    <div class="row gy-4">
                                                        <div class="col-xxl-3 col-md-4">
                                                            <div class="form-group">
                                                                <label class="form-label">Profile Image</label>
                                                                <div class="form-control-wrap">
                                                                    <div class="form-file">
                                                                        <input type="file" multiple class="form-file-input" name="image" id="formClient-Image" accept="image/">
                                                                        <label class="form-file-label" for="testReport">Choose Image</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div><!--col-->
                                                                                                                
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <button type="submit" class="btn btn-primary">Update User</button>
                                                                <a href="<?php echo base_url('users'); ?>" class="btn btn-danger">CANCEL</a>
                                                            </div>
                                                        </div><!--col-->
                                                    </div><!--row-->
                                                </div>
                                            </div><!-- .card-inner -->
                                        </div>
                                    </div><!-- .card -->
                                </div><!-- .nk-block -->
                            </form>
                            <?php echo form_close(); ?>
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
 function createUsername(name) {
      return name.toLowerCase()
        .replace(/ /g,'_')
        .replace(/[^\w-]+/g,'')
        ;;
  }
</script>
</html>