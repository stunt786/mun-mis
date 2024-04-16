
<!DOCTYPE html>
<html lang="en" class="js">

<head>
    
    <meta charset="utf-8">
    <meta name="MUN" content="mis">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Digital Nepal, Digital Palika.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="<?= base_url('images/favicon.png') ?>">
    <!-- Page Title  -->
    <title><?= $title ?></title>
    <!-- StyleSheets  -->
    
    <link href="https://nepalidatepicker.sajanmaharjan.com.np/nepali.datepicker/css/nepali.datepicker.v4.0.1.min.css" rel="stylesheet" type="text/css"/>

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
                                            <h3 class="nk-block-title page-title"><?= $title ?></h3>
                                            <div class="nk-block-des text-soft">
                                                <p>Laws & Directives Records</p>
                                            </div>
                                        </div><!-- .nk-block-head-content -->
                                     </div><!-- .nk-block-between -->
                                 </div><!-- .nk-block-head -->
                                 <div class="card card-bordered">
                                            <div class="card-inner">
                                                <form method="post" action="<?php echo base_url('laws/update/' . $lawdirective['id']); ?>" class="form-validate" enctype="multipart/form-data">
                                                    <div class="row g-gs">
                                                        <div>
                                                            <h6 style="color:red">ऐन,कार्यविधि, नियमावली विवरण</h6>
                                                        </div>
                                                        
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label" for="lname">विवरण</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="lname" name="lname" value="<?= $lawdirective['lname'] ?>" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="fiscalyear">आर्थिक वर्ष</label>
                                                                <div class="form-control-wrap">
                                                                <select class="form-select js-select2" id="fiscalyear" name="fiscalyear" data-placeholder="Select an option" required>
                                                                <option value="">Select a year</option>
                                                                <?php foreach ($years as $list): ?>
                                                                    <option value="<?= $list['year'] ?>" <?php if ($old_year == $list['year']): ?>selected<?php endif; ?>><?= $list['year'] ?></option>
                                                                <?php endforeach; ?>
                                                                </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="publish">कार्यपालिका/गाउँसभा निर्णय मिति</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="publish" name="publish" value="<?= $lawdirective['publish'] ?>" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="karyapalika">प्रकाशन मिति</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="karyapalika" name="karyapalika" value="<?= $lawdirective['karyapalika'] ?>" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                       
                                                       
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="type">प्रकार</label>
                                                                <div class="form-control-wrap">
                                                                <select class="form-select js-select2" data-search="on" id="type" name="type" data-placeholder="Select an option" required>
                                                                <option value="">Select Type</option>
                                                                    <option value="ऐन" <?= $lawdirective['type'] == 'ऐन' ? 'selected' : '' ?>>ऐन</option>
                                                                    <option value="नियमावली" <?= $lawdirective['type'] == 'नियमावली' ? 'selected' : '' ?>>नियमावली</option>
                                                                    <option value="कार्यविधि" <?= $lawdirective['type'] == 'कार्यविधि' ? 'selected' : '' ?>>कार्यविधि</option>
                                                                    <option value="निर्देशिका" <?= $lawdirective['type'] == 'निर्देशिका' ? 'selected' : '' ?>>निर्देशिका</option>
                                                                    <option value="मापदण्ड"<?= $lawdirective['type'] == 'मापदण्ड' ? 'selected' : '' ?>>मापदण्ड</option>
                                                                    <option value="विद्येक" <?= $lawdirective['type'] == 'विद्येक' ? 'selected' : '' ?>>विद्येक</option>
                                                                    <option value="अन्य" <?= $lawdirective['type'] == 'अन्य' ? 'selected' : '' ?>>अन्य</option>
                                                                </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                       
                                                        
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="fv-full-file1">फाइल अपलोड-PDF</label>
                                                                <div class="form-control-wrap">
                                                                <input type="file" class="form-file-input" name="file1" id="file1">
                                                                <label class="form-file-label" for="customFile">Choose File</label>
                                                                <?= form_error('file1') ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="fv-full-file2">फाइल अपलोड-Doc</label>
                                                                <div class="form-control-wrap">
                                                                <input type="file" class="form-file-input" name="file2" id="file2">
                                                                <label class="form-file-label" for="customFile">Choose File</label>
                                                                <?= form_error('file2') ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <button type="submit" class="btn btn-lg btn-primary" name="lawdirective">UPDATE</button>
                                                                <a href="<?php echo base_url('laws-list'); ?>" class="btn btn-danger">CANCEL</a>
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
    <script src="https://nepalidatepicker.sajanmaharjan.com.np/nepali.datepicker/js/nepali.datepicker.v3.min.js" type="text/javascript"></script>
    <script src="<?= base_url('js/jquery.min.js') ?>"></script>
      
    
  <script>
    window.onload = function() {
      var mainInput = document.getElementById("publish");
      mainInput.nepaliDatePicker({
        unicodeDate: true
      });
      var mainDate = document.getElementById("karyapalika");
      mainDate.nepaliDatePicker({
        unicodeDate: true
      });
      
    };
   </script>
</body>       
</html>