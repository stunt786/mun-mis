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
                                            <h3 class="nk-block-title page-title">General Setting</h3>
                                            <div class="nk-block-des text-soft">
                                                
                                            </div>
                                        </div><!-- .nk-block-head-content -->
                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->
                 <!-- Default card -->
                       <!-- Default card -->
      <div class="card">

<div class="card-header with-border">
  <h3 class="card-title"><?php echo lang('App.general_setings') ?></h3>
</div>

<?php echo form_open_multipart('settings/generalUpdate', [ 'class' => 'form-validate', 'autocomplete' => 'off', 'method' => 'post' ]); ?>
<div class="card-body">

  <div class="form-group">
    <label for="formSetting-Company-Name"><?php echo lang('App.settings_timezone') ?></label>
    <select name="timezone" id="timezone" class="form-control select2">
      <?php $tzlist = DateTimeZone::listIdentifiers(DateTimeZone::ALL); ?>
      <?php foreach ($tzlist as $key => $value): ?>
        <?php $sel = setting('timezone')==$value ? 'selected' : ''; ?>
        <option value="<?php echo $value ?>" <?php echo $sel ?>><?php echo $value ?></option>
      <?php endforeach ?>
    </select>
  </div>
  

  <div class="form-group">
    <label for="formSetting-Language-Name"><?php echo lang('App.default_lang') ?></label>
    <select name="default_lang" id="default_lang" class="form-control select2">
      <?php $tzlist = supported_languages(); ?>
      <?php foreach ($tzlist as $key => $value): ?>
        <?php $sel = setting('default_lang')==$key ? 'selected' : ''; ?>
        <option value="<?php echo $key ?>" <?php echo $sel ?>><?php echo $value->name.' ('.$value->nativeName.')' ?></option>
      <?php endforeach ?>
    </select>
  </div>
  

  <div class="form-group">
    <label for="formSetting-DateFormat"><?php echo lang('App.settings_date_format') ?> &nbsp; <a href="#" data-toggle="modal" data-target="#myModal"><i class="fa fa-info-circle"></i></a></label>
    <input type="text" class="form-control" name="date_format" id="formSetting-DateFormat" value="<?php echo setting('date_format') ?>" required placeholder="<?php echo lang('App.settings_date_format') ?>" autofocus />
  </div>

  <div class="form-group">
    <label for="formSetting-DateTimeFormat"><?php echo lang('App.settings_datetime_format') ?> &nbsp; <a href="#" data-toggle="modal" data-target="#myModal"><i class="fa fa-info-circle"></i></a> </label>
    <input type="text" class="form-control" name="datetime_format" id="formSetting-DateTimeFormat" value="<?php echo setting('datetime_format') ?>" required placeholder="Enter Date Time Format" autofocus />
    
  </div>

  <br>
  <h4><?php echo lang('App.settings_g_recaptcha') ?> &nbsp; &nbsp; <input type="checkbox" value="ok" class="js-switch" name="google_recaptcha_enabled" onchange="recaptchKeysHideShow( $(this).is(':checked') )" <?php echo setting('google_recaptcha_enabled') == '1' ? 'checked' : '' ?> /> </h4>
  <hr>

  <div class="form-group recaptchKeysHideShow">
    <label for="formSetting-DateTimeFormat"><?php echo lang('App.settings_gr_sitekey') ?> </label>
    <input type="text" class="form-control" name="google_recaptcha_sitekey" id="formSetting-DateTimeFormat" value="<?php echo setting('google_recaptcha_sitekey') ?>" required placeholder="<?php echo lang('App.settings_gr_sitekey') ?>" autofocus />
    
  </div>
  <div class="form-group recaptchKeysHideShow">
    <label for="formSetting-DateTimeFormat"><?php echo lang('App.settings_gr_secretkey') ?> </label>
    <input type="text" class="form-control" name="google_recaptcha_secretkey" id="formSetting-DateTimeFormat" value="<?php echo setting('google_recaptcha_secretkey') ?>" required placeholder="<?php echo lang('App.settings_gr_secretkey') ?>" autofocus />
    
  </div>


  

</div>
<!-- /.card-body -->

<div class="card-footer">
  <button type="submit" class="btn btn-flat btn-primary"><?php echo lang('App.submit') ?></button>
</div>
<!-- /.card-footer-->

<?php echo form_close(); ?>

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
<script>
  $(document).ready(function() {
    $('.form-validate').validate();

      //Initialize Select2 Elements
    $('.select2').select2()



var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

elems.forEach(function(html) {
  var switchery = new Switchery(html, {size: 'small'});
});

  })

  function previewImage(input, previewDom) {

    if (input.files && input.files[0]) {

      $(previewDom).show();

      var reader = new FileReader();

      reader.onload = function(e) {
        $(previewDom).find('img').attr('src', e.target.result);
      }

      reader.readAsDataURL(input.files[0]);
    }else{
      $(previewDom).hide();
    }

  }

  function recaptchKeysHideShow(checked) {

    if(!checked)
      $('.recaptchKeysHideShow').hide(300);
    else
      $('.recaptchKeysHideShow').show(300);
    
  }

  recaptchKeysHideShow(<?php echo setting('google_recaptcha_enabled') ?>);
</script>
</html>