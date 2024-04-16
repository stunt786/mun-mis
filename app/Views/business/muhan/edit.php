
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
                                            <h3 class="nk-block-title page-title"><?= $title ?></h3>
                                            <div class="nk-block-des text-soft">
                                                <p>खानेपानी उपभोक्ता समिती अद्यावधिक फारम</p>
                                            </div>
                                        </div><!-- .nk-block-head-content -->
                                     </div><!-- .nk-block-between -->
                                 </div><!-- .nk-block-head -->
                                 <div class="card card-bordered">
                                            <div class="card-inner">
                                                <form method="post" action="<?php echo base_url('waterreg/update/' . $waterreg['id']); ?>" class="form-validate" enctype="multipart/form-data">
                                                    <div class="row g-gs">
                                                        <div>
                                                            <h6 style="color:red">खा.पा.उ.स. विवरण</h6>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label class="form-label" for="cert_no">दर्ता प्रमाणपत्र नं</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="cert_no" name="cert_no" value="<?= $waterreg['cert_no'] ?>" readonly>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label" for="org_name">खानेपानी उपभोक्ता समितिको नाम</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="org_name" name="org_name" value="<?= $waterreg['org_name'] ?>" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label class="form-label" for="fiscal_year">आर्थिक वर्ष</label>
                                                                <div class="form-control-wrap">
                                                                <select class="form-select js-select2" id="fiscal_year" name="fiscal_year" data-placeholder="Select an option" required>
                                                                <option value="">Select a year</option>
                                                                <?php foreach ($years as $list): ?>
                                                                    <option value="<?= $list['year'] ?>" <?php if ($old_year == $list['year']): ?>selected<?php endif; ?>><?= $list['year'] ?></option>
                                                                <?php endforeach; ?>
                                                                </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label class="form-label" for="org_established_nep_date">सञ्‍चालन मिति</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="nepali-datepicker" name="org_established_nep_date" value="<?= $waterreg['org_established_nep_date'] ?>" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="org_province_id">प्रदेश</label>
                                                                <div class="form-control-wrap">
                                                                <select class="form-select js-select2" data-search="on" id="province" name="org_province_id" data-placeholder="Select an option" onchange="fetchDistrictData(this.value)" required>
                                                                <option value="">Select Province</option>
                                                                <?php foreach ($province as $list): ?>
                                                                    <option value="<?= $list['id'] ?>" <?php if ($old_province == $list['province']): ?>selected<?php endif; ?>><?= $list['province'] ?></option>
                                                                <?php endforeach; ?>
                                                                </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="org_district_id">जिल्ला</label>
                                                                <div class="form-control-wrap">
                                                                <select class="form-select js-select2" data-search="on" id="districtID" name="org_district_id" data-placeholder="Select an option" onchange="fetchMunicipalityData(this.value)" required>
                                                                <option value="">Select District</option>
                                                                <?php foreach ($district as $list): ?>
                                                                    <option value="<?= $list['id'] ?>" <?php if ($old_district == $list['district']): ?>selected<?php endif; ?>><?= $list['district'] ?></option>
                                                                <?php endforeach; ?>
                                                                </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="org_municipality_id">स्थानिय तह</label>
                                                                <div class="form-control-wrap">
                                                                <select class="form-select js-select2" data-search="on" id="org_municipality_id" name="org_municipality_id" data-placeholder="Select an option" required>
                                                                <option value="">Select Municipality</option>
                                                                <?php foreach ($municipality as $list): ?>
                                                                    <option value="<?= $list['id'] ?>" <?php if ($old_municipality == $list['municipality']): ?>selected<?php endif; ?>><?= $list['municipality'] ?></option>
                                                                <?php endforeach; ?>
                                                                </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="org_ward_id">वडा</label>
                                                                <div class="form-control-wrap">
                                                                <select class="form-select js-select2" id="org_ward_id" name="org_ward_id" data-placeholder="Select an option" required>
                                                                <option value="">Select Ward</option>
                                                                <?php foreach ($ward as $list): ?>
                                                                    <option value="<?= $list['ward'] ?>" <?php if ($old_ward == $list['ward']): ?>selected<?php endif; ?>><?= $list['ward'] ?></option>
                                                                <?php endforeach; ?>
                                                                </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="form-label" for="org_road_name">ठेगाना/टोल</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="org_road_name" name="org_road_name" value="<?= $waterreg['org_road_name'] ?>" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="org_phone">सम्पर्क</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="org_phone" name="org_phone" value="<?= $waterreg['org_phone'] ?>" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="org_email">इमेल</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="email" class="form-control" id="org_email" name="org_email" value="<?= $waterreg['org_email'] ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label class="form-label" for="org_pan">पान नम्बर (PAN)</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="org_pan" name="org_pan" value="<?= $waterreg['org_pan'] ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="org_type">सेवाको किसिम</label>
                                                                <div class="form-control-wrap">
                                                                <select class="form-select js-select2" data-search="on" id="org_type" name="org_type" data-placeholder="Select an option" required>
                                                                <option value="">Select Type</option>
                                                                    <option value="खानेपानी सरसफाई तथा जिविकोपार्जन" <?= $waterreg['org_type'] == 'खानेपानी सरसफाई तथा जिविकोपार्जन' ? 'selected' : '' ?>>खानेपानी सरसफाई तथा जिविकोपार्जन</option>
                                                                    <option value="व्यक्तिगत" <?= $waterreg['org_type'] == 'व्यक्तिगत' ? 'selected' : '' ?>>व्यक्तिगत</option>
                                                                    <option value="साझेदारी" <?= $waterreg['org_type'] == 'साझेदारी' ? 'selected' : '' ?>>साझेदारी</option>
                                                                </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="review_date">जलश्रोत निर्णय मिति</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="review_date" name="review_date" value="<?= $waterreg['review_date'] ?>" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="org_type_description">जलश्रोतको नाम</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="org_type_description" name="org_type_description" value="<?= $waterreg['org_type_description'] ?>" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="fv-full-file1">कागजात अपलोड</label>
                                                                <div class="form-control-wrap">
                                                                <input type="file" class="form-file-input" name="file1" id="file1">
                                                                <label class="form-file-label" for="customFile">Choose File</label>
                                                                <?= form_error('file1') ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <h6 style="color:red">उपयोग गरिने जलश्रोतको विवरण</h6>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="form-label" for="org_resource_name">जलस्रोतको नाम (चार किल्ला सहित ) भएको ठाउँ</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="org_resource_name" name="org_resource_name" value="<?= $waterreg['org_resource_name'] ?>" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="form-label" for="org_use">जलश्रोतबाट गरिने प्रयोग</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="org_use" name="org_use" value="<?= $waterreg['org_use'] ?>" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="form-label" for="org_capacity">उ.सं.ले उपयोग गर्न चाहेको जलस्रोतको परिमाण (LPS)</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="org_capacity" name="org_capacity" value="<?= $waterreg['org_capacity'] ?>" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="org_tole">सेवा पुर्याउने क्षेत्र</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="org_tole" name="org_tole" value="<?= $waterreg['org_tole'] ?>" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="org_members">सेवाबाट लाभान्वित हुने उ.भो संख्या</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="number" class="form-control" id="org_members" name="org_members"value="<?= $waterreg['org_members'] ?>" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="org_future">भविष्यमा सेवा विस्तार गर्न सक्ने सम्भावना</label>
                                                                <select class="form-select js-select2" data-search="on" id="org_future" name="org_future" data-placeholder="Select an option" value="<?= $waterreg['cert_no'] ?>" required>
                                                                <option value="">Select Type</option>
                                                                    <option value="छ" <?= $waterreg['org_future'] == 'छ' ? 'selected' : '' ?>>छ</option>
                                                                    <option value="छैन" <?= $waterreg['org_future'] == 'छैन' ? 'selected' : '' ?>>छैन</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="fv-full-file2">अन्य कागजात अपलोड</label>
                                                                <div class="form-control-wrap">
                                                                <input type="file" class="form-file-input" name="file2" id="file2">
                                                                <label class="form-file-label" for="customFile">Choose File</label>
                                                                <?= form_error('file2') ?>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        
                                                        <div>
                                                            <h6 style="color:red">निवेदकको विवरण</h6>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="form-label" for="applicant_name">निवेदकको नाम</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="applicant_name" name="applicant_name" value="<?= $waterreg['applicant_name'] ?>" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="form-label" for="applicant_phone">निवेदकको फोन नं</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="applicant_phone" name="applicant_phone" value="<?= $waterreg['applicant_phone'] ?>" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="form-label" for="applicant_address">निवेदकको ठेगाना</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="applicant_address" name="applicant_address" value="<?= $waterreg['applicant_address'] ?>" required>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div>
                                                            <h6 style="color:red">थप विवरण</h6>
                                                        </div>

                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="org_reg_date">खा.पा.उ.स दर्ता मिति</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="org_reg_date" name="org_reg_date" value="<?= $waterreg['org_reg_date'] ?>" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">    
                                                            <div class="form-group">
                                                                <label class="form-label" for="status">खा.पा.उ.स संचालन स्थिति</label>
                                                                <div class="form-control-wrap">
                                                                    <select type="text" name="status" id="status" class="form-control"  required>
                                                                    <option value="1" <?= $waterreg['status'] == 1 ? 'selected' : '' ?>>संचालनमा रहेको</option>
                                                                    <option value="0" <?= $waterreg['status'] == 0 ? 'selected' : '' ?> >बन्द भएको</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="expiry_date">नविकरण बहाल रहने मिति</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control date-picker" data-date-format="yyyy-mm-dd" id="expiry_date" name="expiry_date" value="<?= $waterreg['expiry_date'] ?>" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="renew_date">अन्तिम नविकरण मिति</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="renew_date" name="renew_date" value="<?= $waterreg['renew_date'] ?>" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">    
                                                            <div class="form-group">
                                                                <label class="form-label" for="expiry_status">नविकरण स्थिति</label>
                                                                <div class="form-control-wrap">
                                                                    <select type="text" name="expiry_status" id="expiry_status" class="form-control"  required>
                                                                    <option value="1" <?= $waterreg['expiry_status'] == 1 ? 'selected' : '' ?> >नविकरण भएको</option>
                                                                    <option value="0" <?= $waterreg['expiry_status'] == 0 ? 'selected' : '' ?> >नविकरण बाँकी</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="chief_officer">खा.पा समिति अध्यक्षको नाम</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="chief_officer" name="chief_officer" value="<?= $waterreg['chief_officer'] ?>" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="chief_officer_job">खा.पा समिति अध्यक्षको पद</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="chief_officer_job" name="chief_officer_job" value="<?= $waterreg['chief_officer_job'] ?>" required>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- <div class="col-12">
                                                            <div class="form-group">
                                                                <label class="form-label" for="remarks">कैफियत</label>
                                                                <div class="form-control-wrap">
                                                                <textarea class="form-control form-control-sm" id="remarks" name="remarks" placeholder="Write Remarks" ></textarea> 
                                                            </div>
                                                            </div>
                                                        </div> -->
                                                        <div class="alert alert-fill alert-info alert-icon">
                                                            <em class="icon ni ni-alert-circle"></em> 
                                                            <strong>नविकरण बहाल रहने मिति</strong> आउँदो अङ्ग्रेजी वर्षको  YYYY-07-17 फर्मेटमा (असार मसान्त/श्रावण १ गते) राख्ने । 
                                                        </div>
                                                        <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <button type="submit" class="btn btn-lg btn-primary" name="muhan">UPDATE</button>
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
    <script src="<?=base_url('js/jquery.min.js') ?>"></script>
    
    <script src="<?=base_url('assets/js/libs/editors/tinymce.js?ver=3.1.2') ?>"></script>
    <link rel="stylesheet" href="<?=base_url('assets/css/editors/tinymce.css?ver=3.1.2') ?>">
    
    
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
      var mainDate = document.getElementById("renew_date");
      mainDate.nepaliDatePicker({
        unicodeDate: true
      });
      var mainDate = document.getElementById("org_reg_date");
      mainDate.nepaliDatePicker({
        unicodeDate: true
      });
    };
   </script>
   <script>
        function fetchDistrictData(provinceId) {
            $.ajax({
                url: "<?php echo site_url("bewosaye/district") ?>",
                method: "POST",
                data: {
                    pId: provinceId
                },
                success: function(result) {
                    let data = JSON.parse(result);

                    let output = "<option>select District</option>";
                    for (let row in data) {
                        output += `<option value="${data[row].id}">${data[row].district}</option>`;
                        console.log(data[row].id);
                        console.log(data[row].district);
                    }
                    document.querySelector("#districtID").innerHTML = output;
                    console.log(result);
                }
            });
        }

        function fetchMunicipalityData(districtID) {
            $.ajax({
                url: "<?php echo site_url("bewosaye/municipality") ?>",
                method: "POST",
                data: {
                    dId: districtID
                },
                success: function(result) {
                    let data = JSON.parse(result);

                    // let output = "<option>select city</option>";
                    // for (let row in data) {
                    //     output += `<option value="${data[row].id}">${data[row].name}</option>`;
                    //     console.log(data[row].id);
                    //     console.log(data[row].name);
                    // }
                    // document.querySelector("#cityId").innerHTML = output;
                    document.querySelector("#org_municipality_id").innerHTML = data;
                    // console.log(result);
                }
            });
        }
</script>
</body>       
</html>