
<!DOCTYPE html>
<html lang="en" class="js">

<head>
<base href="../../">
    <meta charset="utf-8">
    <meta name="MUN" content="mis">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Digital Nepal, Digital Palika.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="<?= base_url('images/favicon.png') ?>">
    <!-- Page Title  -->
    <title><?= $title ?></title>
    <!-- StyleSheets  -->
    
    <link href="http://nepalidatepicker.sajanmaharjan.com.np/nepali.datepicker/css/nepali.datepicker.v4.0.1.min.css" rel="stylesheet" type="text/css"/>
    
</head>

<body class="nk-body ui-rounder npc-default has-sidebar ">
    <div class="nk-app-root">
    <?php include(APPPATH . 'Views/admin/templates/sidenav.php');?>
        <!-- main @s -->
        <div class="nk-main ">
            <!-- wrap @s -->
            <div class="nk-wrap ">
             <?php include(APPPATH . 'Views/admin/templates/header.php');?>
                    <!-- content @s -->
                <div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="nk-block-head nk-block-head-sm">
                                    <div class="nk-block-between">
                                        <div class="nk-block-head-content">
                                            <h3 class="nk-block-title page-title">चलानी अद्यावधिक</h3>
                                            <div class="nk-block-des text-soft">
                                                <p>चलानी विवरण अद्यावधिक</p>
                                            </div>
                                        </div><!-- .nk-block-head-content -->
                                     </div><!-- .nk-block-between -->
                                 </div><!-- .nk-block-head -->
                                 <div class="card card-bordered">
                                            <div class="card-inner">
                                                <form method="post" action="<?php echo base_url('chalani/update/' . $chalani['id']); ?>" class="form-validate" enctype="multipart/form-data">
                                                    <div class="row g-gs">
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="received_date">मिति</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="nepali-datepicker" name="received_date" value="<?= $chalani['received_date'] ?>" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="form-label" for="subject">विषय</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="subject" name="subject" value="<?= $chalani['subject'] ?>" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="office">कार्यालय</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="office" name="office"value="<?= $chalani['office'] ?>" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label class="form-label" for="send_date">ठेगाना</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="address" name="address" value="<?= $chalani['address'] ?>" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="form-label" for="email">इमेल</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="email" class="form-control" id="email" name="email" value="<?= $chalani['email'] ?>" >
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="form-label" for="type">पत्रको किसिम</label>
                                                                <div class="form-control-wrap ">
                                                                    <select class="form-select js-select2" id="type" name="type" data-placeholder="Select an option" required>
                                                                    <option value="विषय नखुलेको" <?= $chalani['type'] == 'विषय नखुलेको' ? 'selected' : '' ?>>विषय नखुलेको</option>
                                                                        <option value="गोप्य" <?= $chalani['type'] == 'गोप्य' ? 'selected' : '' ?>>गोप्य</option>
                                                                        <option value="जरुरी"<?= $chalani['type'] == 'जरुरी' ? 'selected' : '' ?>>जरुरी</option>
                                                                        <option value="सामान्य" <?= $chalani['type'] == 'सामान्य' ? 'selected' : '' ?>>सामान्य</option>
                                                                        <option value="व्यक्तिगत" <?= $chalani['type'] == 'व्यक्तिगत' ? 'selected' : '' ?>>व्यक्तिगत</option>
                                                                        
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="form-label" for="fv-full-file">दस्ताबेज</label>
                                                                <div class="form-control-wrap">
                                                                <input type="file" class="form-file-input" name="file" id="file">
                                                                <label class="form-file-label" for="customFile">Choose file</label>
                                                                <small style="color: red;">Upload image or pdf below 5 MB only</small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label class="form-label" for="remarks">कैफियत</label>
                                                                <div class="form-control-wrap">
                                                                <textarea class="form-control form-control-sm" id="remarks" name="remarks" placeholder="थप विवरण" ><?= $chalani['remarks'] ?></textarea>  
                                                            </div>
                                                            </div>
                                                        </div>
                                                        <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <button type="submit" class="btn btn-lg btn-primary" name="chalani">UPDATE</button>
                                                                <a href="<?php echo base_url('chalani-list'); ?>" class="btn btn-danger">CANCEL</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div><!-- .nk-block -->
                            </div><!-- .nk-block -->
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
                <!-- content @e -->
    <script src="http://nepalidatepicker.sajanmaharjan.com.np/nepali.datepicker/js/nepali.datepicker.v3.min.js" type="text/javascript"></script>
  <script>
    window.onload = function() {
      var mainInput = document.getElementById("nepali-datepicker");
      mainInput.nepaliDatePicker({
        unicodeDate: true
      });
      var mainDate = document.getElementById("nepali-datepicker-send-date");
      mainDate.nepaliDatePicker({
        unicodeDate: true
      });
    };
    
  </script>
</body>       

</html>