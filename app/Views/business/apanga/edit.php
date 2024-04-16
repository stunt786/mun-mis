
<!DOCTYPE html>
<html lang="en" class="js">

<head>
<base href="../../">
    <meta charset="utf-8">
    <meta name="MUN" content="mis">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Digital Nepal, Digital Palika.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="<?= base_url('images/favicon.pn') ?>">
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
                                                <p>अपाङ्ग परिचयपत्र विवरण</p>
                                            </div>
                                        </div><!-- .nk-block-head-content -->
                                     </div><!-- .nk-block-between -->
                                 </div><!-- .nk-block-head -->
                                 <div class="card card-bordered">
                                            <div class="card-inner">
                                                <form method="post" action="<?php echo base_url('apanga/update/' . $apanga['id']); ?>" class="form-validate" enctype="multipart/form-data">
                                                    <div class="row g-gs">
                                                        <div>
                                                            <h6 style="color:red">अपाङ्गता विवरण</h6>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label class="form-label" for="cert_no">दर्ता प्रमाणपत्र नं</label><em style="color:red">*</em>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="cert_no" name="cert_no" value="<?= $apanga['cert_no'] ?>" readonly>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label class="form-label" for="fiscal_year">दर्ता आर्थिक वर्ष</label><em style="color:red">*</em>
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
                                                                <label class="form-label" for="reg_date">दर्ता मिति</label><em style="color:red">*</em>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="nepali-datepicker" name="reg_date" value="<?= $apanga['reg_date'] ?>" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label" for="name">नाम थर</label><em style="color:red">*</em>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="name" name="name" value="<?= $apanga['name'] ?>" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="birth_date">जन्म मिति</label><em style="color:red">*</em>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="birth_date" name="birth_date" value="<?= $apanga['birth_date'] ?>" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="age">उमेर</label><em style="color:red">*</em>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="age" name="age" value="<?= $apanga['age'] ?>" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="gender">लिङ्ग</label><em style="color:red">*</em>
                                                                <div class="form-control-wrap">
                                                                    <select class="form-select js-select2" data-search="on" id="gender" name="gender" data-placeholder="Select an option" required>
                                                                    <option value="">Select Gender</option>
                                                                    <option value="पुरुष" <?= $apanga['gender'] == 'पुरुष' ? 'selected' : '' ?>>पुरुष</option>
                                                                    <option value="महिला" <?= $apanga['gender'] == 'महिला' ? 'selected' : '' ?>>महिला</option>
                                                                    <option value="अन्य" <?= $apanga['gender'] == 'अन्य' ? 'selected' : '' ?>>अन्य</option>
                                                                </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="province">प्रदेश</label><em style="color:red">*</em>
                                                                <div class="form-control-wrap">
                                                                <select class="form-select js-select2" data-search="on" id="province" name="province" data-placeholder="Select an option" onchange="fetchDistrictData(this.value)" required>
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
                                                                <label class="form-label" for="district">जिल्ला</label><em style="color:red">*</em>
                                                                <div class="form-control-wrap">
                                                                <select class="form-select js-select2" data-search="on" id="districtID" name="district" data-placeholder="Select an option" onchange="fetchMunicipalityData(this.value)" required>
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
                                                                <label class="form-label" for="municipality">स्थानीय तह</label><em style="color:red">*</em>
                                                                <div class="form-control-wrap">
                                                                <select class="form-select js-select2" data-search="on" id="municipality" name="municipality" data-placeholder="Select an option" required>
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
                                                                <label class="form-label" for="ward">वडा नं</label><em style="color:red">*</em>
                                                                <div class="form-control-wrap">
                                                                <select class="form-select js-select2" id="ward" name="ward" data-placeholder="Select an option" required>
                                                                <option value="">Select Ward</option>
                                                                <?php foreach ($ward as $list): ?>
                                                                    <option value="<?= $list['ward'] ?>" <?php if ($old_ward == $list['ward']): ?>selected<?php endif; ?>><?= $list['ward'] ?></option>
                                                                <?php endforeach; ?>
                                                                </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="tole">ठेगाना/टोल</label><em style="color:red">*</em>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="tole" name="tole" value="<?= $apanga['tole'] ?>" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="mobile">सम्पर्क नं</label><em style="color:red">*</em>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="mobile" name="mobile"value="<?= $apanga['mobile'] ?>" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="email">इमेल</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="email" class="form-control" id="email" name="email" value="<?= $apanga['email'] ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="id_no">परिचयपत्र नं (नागरिकता/जन्म दर्ता/अन्य)</label><em style="color:red">*</em>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="id_no" name="id_no" value="<?= $apanga['id_no'] ?>" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="father">बाबुको नाम थर</label><em style="color:red">*</em>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="father" name="father" value="<?= $apanga['father'] ?>" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="mother">आमाको नाम थर</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="mother" name="mother" value="<?= $apanga['mother'] ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="guardian">अभिभावक/संरक्षकको नाम थर</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="guardian" name="guardian" value="<?= $apanga['guardian'] ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="guardian_relation">अभिभावक/संरक्षकको संगको नाता</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="guardian_relation" name="guardian_relation"value="<?= $apanga['guardian_relation'] ?>" >
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="guardian_contact">अभिभावक/संरक्षकको सम्पर्क</label><em style="color:red">*</em>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="guardian_contact" name="guardian_contact" value="<?= $apanga['guardian_contact'] ?>" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="disability_type">अपाङ्ग  बर्गीकरण</label><em style="color:red">*</em>
                                                                <div class="form-control-wrap">
                                                                <select class="form-select js-select2" data-search="on" id="disability_type" name="disability_type" data-placeholder="Select an option" required>
                                                                    <option value="">Select Type</option>
                                                                    <option value="क" <?= $apanga['disability_type'] == 'क' ? 'selected' : '' ?>>क बर्ग</option>
                                                                    <option value="ख" <?= $apanga['disability_type'] == 'ख' ? 'selected' : '' ?>>ख बर्ग</option>
                                                                    <option value="ग" <?= $apanga['disability_type'] == 'ग' ? 'selected' : '' ?>>ग बर्ग</option>
                                                                    <option value="घ" <?= $apanga['disability_type'] == 'घ' ? 'selected' : '' ?>>घ बर्ग</option>
                                                                    <option value="अन्य" <?= $apanga['disability_type'] == 'अन्य' ? 'selected' : '' ?> >अन्य</option>
                                                                </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="form-label" for="disability_description">अपाङ्गता सम्बन्धि विवरण</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="disability_description" name="disability_description" value="<?= $apanga['disability_description'] ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="disability_reason">अपाङ्गताको कारण</label><em style="color:red">*</em>
                                                                <div class="form-control-wrap">
                                                                <select class="form-select js-select2" data-search="on" id="disability_reason" name="disability_reason" data-placeholder="Select an option" required>
                                                                    <option value="">Select Reason</option>
                                                                    <option value="रोगको दिर्घ असर" <?= $apanga['disability_reason'] == 'रोगको दिर्घ असर' ? 'selected' : '' ?>>रोगको दिर्घ असर</option>
                                                                    <option value="दुर्घटना" <?= $apanga['disability_reason'] == 'दुर्घटना' ? 'selected' : '' ?>>दुर्घटना</option>
                                                                    <option value="जन्मजात" <?= $apanga['disability_reason'] == 'जन्मजात' ? 'selected' : '' ?>>जन्मजात</option>
                                                                    <option value="सशत्र द्धन्द" <?= $apanga['disability_reason'] == 'सशत्र द्धन्द' ? 'selected' : '' ?>>सशत्र द्धन्द</option>
                                                                    <option value="वंसाणुगत" <?= $apanga['disability_reason'] == 'वंसाणुगत' ? 'selected' : '' ?>>वंसाणुगत</option>
                                                                    <option value="अन्य" <?= $apanga['disability_reason'] == 'अन्य' ? 'selected' : '' ?> >अन्य</option>
                                                                </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label class="form-label" for="maritial_status">वैवाहिक स्थिति</label>
                                                                <div class="form-control-wrap">
                                                                <select class="form-select js-select2" data-search="on" id="maritial_status" name="maritial_status" data-placeholder="Select an option" required>
                                                                    <option value="">Select Type</option>
                                                                    <option value="विवाहित" <?= $apanga['maritial_status'] == 'विवाहित' ? 'selected' : '' ?>>विवाहित</option>
                                                                    <option value="अविवाहित" <?= $apanga['maritial_status'] == 'अविवाहित' ? 'selected' : '' ?>>अविवाहित</option>
                                                                </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="helper_tool">सहायक सामाग्रीको प्रयोग गरे/नगरेको</label><em style="color:red">*</em>
                                                                <div class="form-control-wrap">
                                                                <select class="form-select js-select2" data-search="on" id="helper_tool" name="helper_tool" data-placeholder="Select an option" required>
                                                                    <option value="">Select Type</option>
                                                                    <option value="1" <?= $apanga['helper_tool'] == 1 ? 'selected' : '' ?>>गरेको</option>
                                                                    <option value="0" <?= $apanga['helper_tool'] == 0 ? 'selected' : '' ?>>नगरेको</option>
                                                                </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="helper_tool_name">सहायक सामाग्रीको प्रयोग गरेको भए नाम</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="helper_tool_name" name="helper_tool_name">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="people_need">अन्य व्यक्तिको सहाएता चाहिने/नचाहिने</label>
                                                                <div class="form-control-wrap">
                                                                <select class="form-select js-select2" data-search="on" id="people_need" name="people_need" data-placeholder="Select an option">
                                                                    <option value="">Select Type</option>
                                                                    <option value="1" <?= $apanga['people_need'] == 1 ? 'selected' : '' ?>>चाहिने</option>
                                                                    <option value="0" <?= $apanga['people_need'] == 0 ? 'selected' : '' ?>>नचाहिने</option>
                                                                </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="people_need_desc">अन्य व्यक्तिको सहाएता चाहिने भए/कार्यहरु</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="people_need_desc" name="people_need_desc" value="<?= $apanga['people_need_desc'] ?>" >
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="blood_group">रक्त समुह (Blood Group)</label>
                                                                <div class="form-control-wrap">
                                                                <select class="form-select js-select2" data-search="on" id="blood_group" name="blood_group" data-placeholder="Select an option" >
                                                                    <option value="">Select Blood Group</option>
                                                                    <option value="A+" <?= $apanga['blood_group'] == 'A+' ? 'selected' : '' ?>>A+</option>
                                                                    <option value="A-" <?= $apanga['blood_group'] == 'A-' ? 'selected' : '' ?>>A-</option>
                                                                    <option value="B+" <?= $apanga['blood_group'] == 'B+' ? 'selected' : '' ?>>B+</option>
                                                                    <option value="B-" <?= $apanga['blood_group'] == 'B-' ? 'selected' : '' ?>>B-</option>
                                                                    <option value="O-" <?= $apanga['blood_group'] == 'O+' ? 'selected' : '' ?>>O-</option>
                                                                    <option value="O+" <?= $apanga['blood_group'] == 'O-' ? 'selected' : '' ?>>O+</option>
                                                                    <option value="AB+" <?= $apanga['blood_group'] == 'AB+' ? 'selected' : '' ?>>AB+</option>
                                                                    <option value="AB-" <?= $apanga['blood_group'] == 'AB-' ? 'selected' : '' ?>>AB-</option>
                                                                </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="education">शैक्षिक योग्यता</label><em style="color:red">*</em>
                                                                <div class="form-control-wrap">
                                                                    <select class="form-select js-select2" data-search="on" id="education" name="education" data-placeholder="Select an option" required>
                                                                    <option value="">Select Education</option>
                                                                    <option value="साक्षर" <?= $apanga['education'] == 'साक्षर' ? 'selected' : '' ?>>साक्षर</option>
                                                                    <option value="आधारभूत तह" <?= $apanga['education'] == 'आधारभूत तह' ? 'selected' : '' ?>>आधारभूत तह</option>
                                                                    <option value="SLC/SEE" <?= $apanga['education'] == 'SLC/SEE' ? 'selected' : '' ?>>SLC/SEE</option>
                                                                    <option value="उच्च माध्यामिक तह" <?= $apanga['education'] == 'उच्च माध्यामिक तह' ? 'selected' : '' ?>>उच्च माध्यामिक तह</option>
                                                                    <option value="स्‍नातक तह" <?= $apanga['education'] == 'स्‍नातक तह' ? 'selected' : '' ?>>स्‍नातक तह</option>
                                                                    <option value="स्नातकोत्तर तह" <?= $apanga['education'] == 'स्नातकोत्तर तह' ? 'selected' : '' ?>>स्नातकोत्तर तह</option>
                                                                    <option value="विद्यावारिधि तह" <?= $apanga['education'] == 'विद्यावारिधि तह' ? 'selected' : '' ?>>विद्यावारिधि तह</option>
                                                                    <option value="निरक्षर" <?= $apanga['education'] == 'निरक्षर' ? 'selected' : '' ?>>निरक्षर</option>
                                                                </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="training">तालिम तथा सिप</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="training" name="training" value="<?= $apanga['training'] ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="current_job">हालको पेशा</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="current_job" name="current_job" value="<?= $apanga['current_job'] ?>">
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
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="fv-full-file2">पासपोर्ट साइज फोटो अपलोड</label><em style="color:red">*</em>
                                                                <div class="form-control-wrap">
                                                                <input type="file" class="form-file-input" name="file2" id="file2">
                                                                <label class="form-file-label" for="customFile">Choose Image</label>
                                                                <?= form_error('file2') ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <h6 style="color:red">Personal Information in English</h6>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label class="form-label" for="ereg_date">Registration Date</label><em style="color:red">*</em>
                                                                <div class="form-control-wrap">
                                                                <input type="text" class="form-control date-picker" data-date-format="yyyy-mm-dd" id="ereg_date" name="ereg_date" value="<?= $apanga['ereg_date'] ?>" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label" for="ename">Full Name</label><em style="color:red">*</em>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="ename" name="ename" value="<?= $apanga['ename'] ?>" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="ebirth_date">Date of Birth (AD)</label><em style="color:red">*</em>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="ebirth_date" name="ebirth_date" value="<?= $apanga['ebirth_date'] ?>" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="egender">Gender</label><em style="color:red">*</em>
                                                                <div class="form-control-wrap">
                                                                    <select class="form-select js-select2" data-search="on" id="egender" name="egender" data-placeholder="Select an option" required>
                                                                    <option value="">Select Gender</option>
                                                                    <option value="Male" <?= $apanga['egender'] == 'Male' ? 'selected' : '' ?>>Male</option>
                                                                    <option value="Female" <?= $apanga['egender'] == 'Female' ? 'selected' : '' ?>>Female</option>
                                                                    <option value="other" <?= $apanga['egender'] == 'Other' ? 'selected' : '' ?>>Other</option>
                                                                </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="eprovince">Province</label><em style="color:red">*</em>
                                                                <div class="form-control-wrap">
                                                                <input type="text" class="form-control" id="eprovince" name="eprovince" value="<?= $apanga['eprovince'] ?>" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="edistrict">District</label><em style="color:red">*</em>
                                                                <div class="form-control-wrap">
                                                                <input type="text" class="form-control" id="edistrict" name="edistrict" value="<?= $apanga['edistrict'] ?>" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="emunicipality">Municipality</label><em style="color:red">*</em>
                                                                <div class="form-control-wrap">
                                                                <input type="text" class="form-control" id="emunicipality" name="emunicipality" value="<?= $apanga['emunicipality'] ?>" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="eward">Ward</label><em style="color:red">*</em>
                                                                <div class="form-control-wrap">
                                                                <input type="text" class="form-control" id="eward" name="eward" value="<?= $apanga['eward'] ?>" required>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="eid_no">ID(citizenship/birth/other)</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="eid_no" name="eid_no" value="<?= $apanga['eid_no'] ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="efather">Father's Name</label><em style="color:red">*</em>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="efather" name="efather" value="<?= $apanga['efather'] ?>" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="emother">Mother's Name</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="emother" name="emother" value="<?= $apanga['emother'] ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="eguardian">Guardian's Name</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="eguardian" name="eguardian" value="<?= $apanga['eguardian'] ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="edisability_type">Disability Category</label><em style="color:red">*</em>
                                                                <div class="form-control-wrap">
                                                                <select class="form-select js-select2" data-search="on" id="edisability_type" name="edisability_type" data-placeholder="Select an option" required>
                                                                    <option value="">Select Type</option>
                                                                    <option value="KA" <?= $apanga['edisability_type'] == 'KA' ? 'selected' : '' ?>>Ka Barga</option>
                                                                    <option value="KHA" <?= $apanga['edisability_type'] == 'KHA' ? 'selected' : '' ?>>Kha Barga</option>
                                                                    <option value="GA" <?= $apanga['edisability_type'] == 'GA' ? 'selected' : '' ?>>Ga Barga</option>
                                                                    <option value="GHA" <?= $apanga['edisability_type'] == 'GHA' ? 'selected' : '' ?>>Gha Barga</option>
                                                                    <option value="Other" <?= $apanga['edisability_type'] == 'Other' ? 'selected' : '' ?> >Other</option>
                                                                </select>
                                                                </div>
                                                            </div>
                                                        </div>
                        
                                                        <div>
                                                            <h6 style="color:red">निवेदकको विवरण</h6>
                                                            <label style="color:green">बाबु/आमा/संरक्षक नै निवेदक हो </label><br>
                                                            <input type="checkbox" id="fill_checkbox">
                                                            <input type="checkbox" id="fill_checkbox1">
                                                            <input type="checkbox" id="fill_checkbox2">
                                                            
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="form-label" for="applicant_name">निवेदकको नाम</label><em style="color:red">*</em>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="applicant_name" name="applicant_name" value="<?= $apanga['applicant_name'] ?>" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="form-label" for="applicant_phone">निवेदकको फोन नं</label><em style="color:red">*</em>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="applicant_phone" name="applicant_phone" value="<?= $apanga['applicant_phone'] ?>" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="form-label" for="applicant_address">निवेदकको ठेगाना</label><em style="color:red">*</em>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="applicant_address" name="applicant_address" value="<?= $apanga['applicant_address'] ?>" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="form-label" for="father1">Father/Mother/Guardian</label><em style="color:red"></em>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="father1" name="father1" value="<?= $apanga['father1'] ?>" readonly>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        

                                                        <div>
                                                            <h6 style="color:red">थप विवरण</h6>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="chief_officer">कार्यालय प्रमुख</label><em style="color:red">*</em>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="chief_officer" name="chief_officer" value="<?= $apanga['chief_officer'] ?>" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="chief_officer_job">कार्यालय प्रमुख पद</label><em style="color:red">*</em>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="chief_officer_job" name="chief_officer_job" value="<?= $apanga['chief_officer_job'] ?>" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="echiefofficer">Chief Officer</label><em style="color:red">*</em>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="echiefofficer" name="echiefofficer" value="<?= $apanga['echiefofficer'] ?>" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="echiefofficerjob">Chief Officer Job</label><em style="color:red">*</em>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="echiefofficerjob" name="echiefofficerjob" value="<?= $apanga['echiefofficerjob'] ?>" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">    
                                                            <div class="form-group">
                                                                <label class="form-label" for="status">परिचयपत्र स्थिति</label><em style="color:red">*</em>
                                                                <div class="form-control-wrap">
                                                                    <select type="text" name="status" id="status" class="form-control"  required>
                                                                    <option value="1" selected>कायम रहेको</option>
                                                                    <option value="0">खारेज गरिएको</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        

                                                        <!-- <div class="col-12">
                                                            <div class="form-group">
                                                                <label class="form-label" for="remarks">Remarks</label>
                                                                <textarea class="tinymce-basic form-control">Hello, World!</textarea>
                                                            </div>
                                                        </div> -->
                                                        
                                                        <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <button type="submit" class="btn btn-lg btn-primary" name="apanga">SAVE</button>
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
    
    <script src="./assets/js/jquery.min.js"></script>
    <script src="assets/js/libs/editors/tinymce.js?ver=3.1.2"></script>
    <link rel="stylesheet" href="assets/css/editors/tinymce.css?ver=3.1.2">
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>    window.onload = function() { -->
    
    <script>
    window.onload = function() {
        var mainInput = document.getElementById("nepali-datepicker");
      mainInput.nepaliDatePicker({
        unicodeDate: true
      });
      
      var mainDate = document.getElementById("birth_date");
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
                    pId: provinceId,
                    csrf_test_name: $('input[name="csrf_test_name"]').val()
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
                    dId: districtID,
                    csrf_test_name: $('input[name="csrf_test_name"]').val()
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
                    document.querySelector("#municipality").innerHTML = data;
                    // console.log(result);
                }
            });
        }
</script>

<script>
    $(document).ready(function () {
        // Event listener for the checkbox click
        $('#fill_checkbox').change(function () {
            // Check if the checkbox is checked
            if ($(this).is(':checked')) {
                // Get the value of the prop_phone field
                var propNameValue = $('#father').val();
                var propFatherValue = $('#efather').val();
                var propContactValue = $('#guardian_contact').val();
                // Fill the org_house_owner field with the prop_phone value
                $('#applicant_name').val(propNameValue);
                $('#father1').val(propFatherValue);
                $('#applicant_phone').val(propContactValue);
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
                var propNameValue = $('#mother').val();
                var propMotherValue = $('#emother').val();
                var propContactValue = $('#guardian_contact').val();
                // Fill the applicant field with the prop_phone value
                $('#applicant_name').val(propNameValue);
                $('#father1').val(propMotherValue);
                $('#applicant_phone').val(propContactValue);
            } else {
                // Checkbox is unchecked, handle if needed
            }
        });
    });
</script>

<script>
    $(document).ready(function () {
        // Event listener for the checkbox click
        $('#fill_checkbox2').change(function () {
            // Check if the checkbox is checked
            if ($(this).is(':checked')) {
                // Get the value of the prop_phone field
                var propNameValue = $('#guardian').val();
                var propGuardianValue = $('#eguardian').val();
                var propContactValue = $('#guardian_contact').val();
                // Fill the applicant field with the prop_phone value
                $('#applicant_name').val(propNameValue);
                $('#father1').val(propGuardianValue);
                $('#applicant_phone').val(propContactValue);
            } else {
                // Checkbox is unchecked, handle if needed
            }
        });
    });
</script>
</body>       
</html>