
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
                                                <p>व्यवशाय दर्ता अद्यावधिक फारम</p>
                                            </div>
                                        </div><!-- .nk-block-head-content -->
                                     </div><!-- .nk-block-between -->
                                 </div><!-- .nk-block-head -->
                                 <div class="card card-bordered">
                                            <div class="card-inner">
                                                <form method="post" action="<?php echo base_url('bewosaye/update/' . $business['id']); ?>" class="form-validate" enctype="multipart/form-data">
                                                    <div class="row g-gs">
                                                        <div>
                                                            <h6 style="color:red">व्यवशायको विवरण</h6>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label class="form-label" for="cert_no">दर्ता प्रमाणपत्र नं</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="cert_no" name="cert_no" value="<?= $business['cert_no'] ?>" readonly>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label" for="org_name">व्यवशाय/फर्मको नाम</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="org_name" name="org_name" value="<?= $business['org_name'] ?>" required>
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
                                                                <label class="form-label" for="org_established_nep_date">व्यवशाय स्थापना मिति</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="nepali-datepicker" name="org_established_nep_date" value="<?= $business['org_established_nep_date'] ?>" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="org_province_id">प्रदेश</label>
                                                                <div class="form-control-wrap">
                                                                <select class="form-select js-select2" data-search="on" id="province" name="org_province_id" data-placeholder="Select an option" required>
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
                                                                <select class="form-select js-select2" data-search="on" id="district" name="org_district_id" data-placeholder="Select an option" required>
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
                                                                <label class="form-label" for="org_municipality_id">स्थानीय तह</label>
                                                                <div class="form-control-wrap">
                                                                <select class="form-select js-select2" data-search="on" id="municipality" name="org_municipality_id" data-placeholder="Select an option" required>
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
                                                                <label class="form-label" for="org_ward_id">वडा नं</label>
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
                                                                    <input type="text" class="form-control" id="org_road_name" name="org_road_name" value="<?= $business['org_road_name'] ?>" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label class="form-label" for="org_house_no">घर नं</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="org_house_no" name="org_house_no" value="<?= $business['org_house_no'] ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="org_phone">सम्पर्क नं</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="org_phone" name="org_phone" value="<?= $business['org_phone'] ?>" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="org_email">इमेल</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="email" class="form-control" id="org_email" name="org_email" value="<?= $business['org_email'] ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label class="form-label" for="org_pan">पान नं (PAN)</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="org_pan" name="org_pan" value="<?= $business['org_pan'] ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="org_type">व्यवशाय बर्गीकरण</label>
                                                                <div class="form-control-wrap">
                                                                <select class="form-select js-select2" data-search="on" id="org_type" name="org_type" data-placeholder="Select an option" required>
                                                                <option value="">Select Type</option>
                                                                <?php foreach ($buscategory as $list): ?>
                                                                    <option value="<?= $list['category'] ?>" <?php if ($old_category == $list['category']): ?>selected<?php endif; ?>><?= $list['category'] ?></option>
                                                                <?php endforeach; ?>
                                                                </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="form-label" for="org_type_description">व्यवशाय कारोवार विवरण</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="org_type_description" name="org_type_description" value="<?= $business['org_type_description'] ?>" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="org_total_capital">पुजिगत लगानी</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="org_total_capital" name="org_total_capital" value="<?= $business['org_total_capital'] ?>" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">    
                                                            <div class="form-group">
                                                                <label class="form-label" for="org_ownership">व्यवशाय प्रकृति</label>
                                                                <div class="form-control-wrap">
                                                                    <select type="text" name="org_ownership" id="org_ownership" class="form-control"  required>
                                                                    <option value="व्यक्तिगत" <?= $business['org_ownership'] == 'व्यक्तिगत' ? 'selected' : '' ?> >व्यक्तिगत</option>
                                                                    <option value="साझेदारी" <?= $business['org_ownership'] == 'साझेदारी' ? 'selected' : '' ?> >साझेदारी</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="org_land_kitta_no">कित्ता नं</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="org_land_kitta_no" name="org_land_kitta_no" value="<?= $business['org_land_kitta_no'] ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="boardsize">परिचय पाटिको साइज</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="boardsize" name="boardsize" value="<?= $business['boardsize'] ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="fv-full-file1">दस्ताबेज अपलोड</label>
                                                                <div class="form-control-wrap">
                                                                <input type="file" class="form-file-input" name="file1" id="file1">
                                                                <label class="form-file-label" for="customFile">Choose File</label>
                                                                <?= form_error('file1') ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <h6 style="color:red">मुख्य संचालक व्यक्तिको विवरण</h6>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="prop_name">संचालकको नाम</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="prop_name" name="prop_name" value="<?= $business['prop_name'] ?>" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="prop_phone">संचालकको सम्पर्क नं</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="prop_phone" name="prop_phone" value="<?= $business['prop_phone'] ?>" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="prop_road_name">संचालकको ठेगाना</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="prop_road_name" name="prop_road_name" value="<?= $business['prop_road_name'] ?>" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="prop_ctzn_no">संचालकको नागरिकता नं.</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="prop_ctzn_no" name="prop_ctzn_no" value="<?= $business['prop_ctzn_no'] ?>" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="prop_ctzn_district">ना.प्र.प.जारी जिल्ला</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="prop_ctzn_district" name="prop_ctzn_district" value="<?= $business['prop_ctzn_district'] ?>" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="prop_ctzn_date">ना.प्र.प.जारी मिति</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="nepali-datepicker-send-date" name="prop_ctzn_date" value="<?= $business['prop_ctzn_date'] ?>" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="fv-full-file2">संचालकको फोटो</label>
                                                                <div class="form-control-wrap">
                                                                <input type="file" class="form-file-input" name="file2" id="file2">
                                                                <label class="form-file-label" for="customFile">Choose File</label>
                                                                <?= form_error('file2') ?>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div>
                                                            <h6 style="color:red">जग्गाधनी / घरधनिको विवरण</h6>
                                                            <label>संचालक नै घर धनी हो</label>
                                                            <input type="checkbox" id="fill_checkbox">
                                                        </div>

                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="org_house_owner">घरधनिको नाम</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="org_house_owner" name="org_house_owner" value="<?= $business['org_house_owner'] ?>" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="org_house_owner_address">घरधनिको ठेगाना</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="org_house_owner_address" name="org_house_owner_address" value="<?= $business['org_house_owner_address'] ?>" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="org_house_owner_phone">घरधनिको फोन नं.</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="org_house_owner_phone" name="org_house_owner_phone" value="<?= $business['org_house_owner_phone'] ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="org_house_rent">मासिक भाडा रकम रु.</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="org_house_rent" name="org_house_rent" value="<?= $business['org_house_rent'] ?>">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div>
                                                            <h6 style="color:red">निवेदकको विवरण</h6>
                                                            <label>संचालक नै निवेदक हो </label>
                                                            <input type="checkbox" id="fill_checkbox1">
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="form-label" for="applicant_name">निवेदकको नाम</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="applicant_name" name="applicant_name" value="<?= $business['applicant_name'] ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="form-label" for="applicant_phone">निवेदकको फोन नं</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="applicant_phone" name="applicant_phone" value="<?= $business['applicant_phone'] ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="form-label" for="applicant_address">निवेदकको ठेगाना</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="applicant_address" name="applicant_address" value="<?= $business['applicant_address'] ?>">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div>
                                                            <h6 style="color:red">थप विवरण</h6>
                                                        </div>

                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="org_reg_date">व्यवशाय दर्ता मिति</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="org_reg_date" name="org_reg_date" value="<?= $business['org_reg_date'] ?>" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">    
                                                            <div class="form-group">
                                                                <label class="form-label" for="status">व्यवशाय संचालन स्थिति</label>
                                                                <div class="form-control-wrap">
                                                                    <select type="text" name="status" id="status" class="form-control"  required>
                                                                    <option value="1" <?= $business['status'] == 1 ? 'selected' : '' ?>>संचालनमा रहेको</option>
                                                                    <option value="0" <?= $business['status'] == 0 ? 'selected' : '' ?> >बन्द भएको</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="expiry_date">नविकरण बहाल रहने मिति</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control date-picker" data-date-format="yyyy-mm-dd"" id="expiry_date" name="expiry_date" value="<?= $business['expiry_date'] ?>" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="renew_date">अन्तिम नविकरण मिति</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="renew_date" name="renew_date" value="<?= $business['renew_date'] ?>" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">    
                                                            <div class="form-group">
                                                                <label class="form-label" for="expiry_status">नविकरण स्थिति</label>
                                                                <div class="form-control-wrap">
                                                                    <select type="text" name="expiry_status" id="expiry_status" class="form-control"  required>
                                                                    <option value="1" <?= $business['expiry_status'] == 1 ? 'selected' : '' ?> >नविकरण भएको</option>
                                                                    <option value="0" <?= $business['expiry_status'] == 0 ? 'selected' : '' ?> >नविकरण बाँकी</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="chief_officer">दर्ता गर्ने अधिकारी</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="chief_officer" name="chief_officer" value="<?= $business['chief_officer'] ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- <div class="col-12">
                                                            <div class="form-group">
                                                                <label class="form-label" for="remarks">Remarks</label>
                                                            <div id="editor-container">
                                                                <input type="hidden" name="remarks" id="remarks">   
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
                                                                <button type="submit" class="btn btn-lg btn-primary" name="business">UPDATE</button>
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
    <script src="<?= base_url('js/jquery.min.js')?>"></script>
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

<script>
    $(document).ready(function () {
        $('#province').change(function () {
            var province_id = $(this).val();
            $.ajax({
                type: 'POST',
                url: '<?= base_url('bewosaye/getDistricts') ?>',
                data: {province_id: province_id},
                dataType: 'json',
                success: function (data) {
                    $('#district').empty();
                    $('#district').append('<option value="">Select District</option>');
                    $.each(data, function (key, value) {
                        $('#district').append('<option value="' + value.id + '">' + value.district + '</option>');
                    });
                }
            });
        });

        $('#district').change(function () {
            var district_id = $(this).val();
            $.ajax({
                type: 'POST',
                url: '<?= base_url('bewosaye/getMunicipalities') ?>',
                data: {district_id: district_id},
                dataType: 'json',
                success: function (data) {
                    $('#municipality').empty();
                    $('#municipality').append('<option value="">Select Municipality</option>');
                    $.each(data, function (key, value) {
                        $('#municipality').append('<option value="' + value.id + '">' + value.municipality + '</option>');
                    });
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function () {
        // Event listener for the checkbox click
        $('#fill_checkbox').change(function () {
            // Check if the checkbox is checked
            if ($(this).is(':checked')) {
                // Get the value of the prop_phone field
                var propNameValue = $('#prop_name').val();
                var propAddressValue = $('#prop_road_name').val();
                var propPhoneValue = $('#prop_phone').val();
                // Fill the org_house_owner field with the prop_phone value
                $('#org_house_owner').val(propNameValue);
                $('#org_house_owner_address').val(propAddressValue);
                $('#org_house_owner_phone').val(propPhoneValue);
            } else {
                // Checkbox is unchecked, handle if needed
            }
        });
    });
</script>
<script>
    $(document).ready(function () {
        // Event listener for the checkbox click
        $('#fill_checkbox1').change(function () {
            // Check if the checkbox is checked
            if ($(this).is(':checked')) {
                // Get the value of the prop_phone field
                var propNameValue = $('#prop_name').val();
                var propAddressValue = $('#prop_road_name').val();
                var propPhoneValue = $('#prop_phone').val();
                // Fill the applicant field with the prop_phone value
                $('#applicant_name').val(propNameValue);
                $('#applicant_address').val(propAddressValue);
                $('#applicant_phone').val(propPhoneValue);
            } else {
                // Checkbox is unchecked, handle if needed
            }
        });
    });
</script>
</body>       

</html>