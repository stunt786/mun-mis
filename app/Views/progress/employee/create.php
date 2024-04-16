
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
                                                <p>कर्मचारी विवरण</p>
                                            </div>
                                        </div><!-- .nk-block-head-content -->
                                     </div><!-- .nk-block-between -->
                                 </div><!-- .nk-block-head -->
                                 <div class="card card-bordered">
                                            <div class="card-inner">
                                                <form method="post" action="<?= site_url('employee') ?>" class="form-validate" enctype="multipart/form-data">
                                                    <div class="row g-gs">
                                                        <div>
                                                            <h6 style="color:red">व्यक्तिगत विवरण</h6>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <div class="form-control-wrap">
                                                                <input type="text" class="form-control form-control-outlined" id="outlined-default" name="fullname" required>
                                                                <label class="form-label-outlined" for="outlined">नाम थर</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control form-control-outlined" id="nepali-datepicker" name="dob" required>
                                                                    <label class="form-label-outlined" for="outlined">जन्म मिति</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <div class="form-control-wrap">
                                                                    <select class="form-select js-select2" data-search="on" id="gender" name="gender" data-placeholder="Select an option" required>
                                                                    <option value="">Select Gender</option>
                                                                    <option value="पुरुष">पुरुष</option>
                                                                    <option value="महिला">महिला</option>
                                                                    <option value="अन्य">अन्य</option>
                                                                </select>
                                                                <label class="form-label-outlined" for="outlined-select">लिङ्ग</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                
                                                                <div class="form-control-wrap">
                                                                <input type="file" class="form-file-input" name="file1" id="file1">
                                                                <label class="form-file-label" for="customFile">पासपोर्ट साइज फोटो</label>
                                                                <?= form_error('file1') ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <div class="form-control-wrap">
                                                                <select class="form-select js-select2" data-search="on" id="province" name="province" data-placeholder="Select an option" onchange="fetchDistrictData(this.value)" required>
                                                                <option value="">Select Province</option>
                                                                <?php foreach ($province as $list): ?>
                                                                    <option value="<?= $list['id'] ?>"><?= $list['province'] ?></option>
                                                                <?php endforeach; ?>
                                                                </select>
                                                                <label class="form-label-outlined" for="outlined-select">प्रदेश</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <div class="form-control-wrap">
                                                                <select class="form-select js-select2" data-search="on" id="districtID" name="district" data-placeholder="Select an option" onchange="fetchMunicipalityData(this.value)" required>
                                                                <option value="">Select District</option>
                                                                </select>
                                                                <label class="form-label-outlined" for="outlined-select">जिल्ला</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <div class="form-control-wrap">
                                                                <select class="form-select js-select2" data-search="on" id="municipality" name="municipality" data-placeholder="Select an option" required>
                                                                <option value="">Select Municipality</option>
                                                                </select>
                                                                <label class="form-label-outlined" for="outlined-select">स्थानीय तह</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <div class="form-control-wrap">
                                                                <select class="form-select js-select2" id="ward" name="ward" data-placeholder="Select an option" required>
                                                                <option value="">Select Ward</option>
                                                                <?php foreach ($ward as $list): ?>
                                                                    <option value="<?= $list['ward'] ?>"><?= $list['ward'] ?></option>
                                                                <?php endforeach; ?>
                                                                </select>
                                                                <label class="form-label-outlined" for="outlined-select">वडा नं</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control form-control-outlined" id="tole" name="tole">
                                                                    <label class="form-label-outlined" for="outlined">मार्ग/टोल</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control form-control-outlined" id="contact" name="contact">
                                                                    <label class="form-label-outlined" for="outlined">सम्पर्क नं</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                
                                                                <div class="form-control-wrap">
                                                                    <input type="email" class="form-control form-control-outlined" id="email" name="email">
                                                                    <label class="form-label-outlined" for="outlined">इमेल</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control form-control-outlined" id="mobile" name="mobile" required>
                                                                    <label class="form-label-outlined" for="outlined">मोबाइल नं</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control form-control-outlined" id="ctznid" name="ctznid" required>
                                                                    <label class="form-label-outlined" for="outlined">परिचयपत्र नं (ना.प्र/लाइसेन्स/अन्य)</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <div class="form-control-wrap">
                                                                <select class="form-select js-select2" data-search="on" id="ctzndistrict" name="ctzndistrict" data-placeholder="Select an option" required>
                                                                <option value="">Select District</option>
                                                                <?php foreach ($district as $list): ?>
                                                                    <option value="<?= $list['id'] ?>"><?= $list['district'] ?></option>
                                                                <?php endforeach; ?>
                                                                </select>
                                                                <label class="form-label-outlined" for="outlined-select">ना.प्र जारी जिल्ला</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control form-control-outlined" id="pan" name="pan" required>
                                                                    <label class="form-label-outlined" for="outlined">स्थायी पान नं (PAN)</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <div class="form-control-wrap">
                                                                    <select class="form-select js-select2" data-search="on" id="education" name="education" required>
                                                                    <option value="">Select Status</option>
                                                                    <option value="साक्षर">साक्षर</option>
                                                                    <option value="आधारभूत तह">आधारभूत तह</option>
                                                                    <option value="SLC/SEE">SLC/SEE</option>
                                                                    <option value="उच्च माध्यामिक तह">उच्च माध्यामिक तह</option>
                                                                    <option value="स्‍नातक तह">स्‍नातक तह</option>
                                                                    <option value="स्नातकोत्तर तह">स्नातकोत्तर तह</option>
                                                                    <option value="विद्यावारिधि तह">विद्यावारिधि तह</option>
                                                                    <option value="निरक्षर">निरक्षर</option>
                                                                    </select>
                                                                <label class="form-label-outlined" for="outlined-select">शैक्षिक योग्यता</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <div class="form-control-wrap">
                                                                    <select class="form-select js-select2" data-search="on" id="bloodgroup" name="bloodgroup">
                                                                    <option value="">Select Blood Group</option>
                                                                    <option value="A+">A+</option>
                                                                    <option value="A-">A-</option>
                                                                    <option value="B+">B+</option>
                                                                    <option value="B-">B-</option>
                                                                    <option value="O-">O-</option>
                                                                    <option value="O+">O+</option>
                                                                    <option value="AB+">AB+</option>
                                                                    <option value="AB-">AB-</option>
                                                                    </select>
                                                                <label class="form-label-outlined" for="outlined-select">रक्त समूह</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <div class="form-control-wrap">
                                                                    <select class="form-select js-select2" data-search="on" id="marriedstatus" name="marriedstatus" onchange="toggleSpouseField()" required>
                                                                    <option value="">Select Status</option>
                                                                    <option value="0">अविवाहित</option>
                                                                    <option value="1">विवाहित</option>
                                                                    </select>
                                                                <label class="form-label-outlined" for="outlined-select">वैवाहिक स्थिति</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control form-control-outlined" id="gfather" name="gfather">
                                                                    <label class="form-label-outlined" for="outlined">बाजेको नाम थर</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control form-control-outlined" id="father" name="father">
                                                                    <label class="form-label-outlined" for="outlined">बाबुको नाम थर</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control form-control-outlined" id="spouse" name="spouse">
                                                                    <label class="form-label-outlined" for="outlined">पति/पत्नीको नाम थर</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div>
                                                            <h6 style="color:red">कार्यालय सम्बन्धि विवरण</h6>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control form-control-outlined" id="empid" name="empid">
                                                                    <label class="form-label-outlined" for="outlined">कर्मचारी संकेत नं</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control form-control-outlined" id="sanchayakosh" name="sanchayakosh">
                                                                    <label class="form-label-outlined" for="outlined">संचयकोष नं</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control form-control-outlined" id="laganikosh" name="laganikosh">
                                                                    <label class="form-label-outlined" for="outlined">लगानी कोष नं</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control form-control-outlined" id="sheetroll" name="sheetroll">
                                                                    <label class="form-label-outlined" for="outlined">सिटरोल  नं</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control form-control-outlined" id="niyukti" name="niyukti">
                                                                    <label class="form-label-outlined" for="outlined">सेवामा नियुक्ति मिति</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control form-control-outlined" id="datefrom" name="datefrom">
                                                                    <label class="form-label-outlined" for="outlined">यस कार्यालयमा कार्यरत मिति देखी</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control form-control-outlined" id="dateto" name="dateto">
                                                                    <label class="form-label-outlined" for="outlined">यस कार्यालयमा कार्यरत मिति सम्म</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <div class="form-control-wrap">
                                                                    <select class="form-select js-select2" data-search="on" id="sewa" name="sewa" required>
                                                                    <option value="">Select Status</option>
                                                                    <option value="नेपाल प्रशासन">नेपाल प्रशासन</option>
                                                                    <option value="नेपाल स्वास्थ्य">नेपाल स्वास्थ्य</option>
                                                                    <option value="नेपाल शिक्षा">नेपाल शिक्षा</option>
                                                                    <option value="नेपाल इन्जिनियरिङ">नेपाल इन्जिनियरिङ</option>
                                                                    <option value="नेपाल कृषि">नेपाल कृषि</option>
                                                                    <option value="नेपाल विविध">नेपाल विविध</option>
                                                                    <option value="नेपाल लेखापरिक्षण">नेपाल लेखापरिक्षण</option>
                                                                    <option value="अन्य">अन्य</option>
                                                                    </select>
                                                                <label class="form-label-outlined" for="outlined-select">सेवा/समुह</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <div class="form-control-wrap">
                                                                    <select class="form-select js-select2" data-search="on" id="level" name="level" required>
                                                                    <option value="">Select Status</option>
                                                                    <option value="श्रेणी विहिन">श्रेणी विहिन</option>
                                                                    <option value="चौथो">चौथो</option>
                                                                    <option value="पाचौँ">पाचौँ</option>
                                                                    <option value="छैठौं">छैठौं</option>
                                                                    <option value="शाखा अधिकृत">शाखा अधिकृत</option>
                                                                    </select>
                                                                <label class="form-label-outlined" for="outlined-select">तह/श्रेणी</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control form-control-outlined" id="pad" name="pad">
                                                                    <label class="form-label-outlined" for="outlined">पद</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <div class="form-control-wrap">
                                                                    <select class="form-select js-select2" data-search="on" id="empstatus" name="empstatus" required>
                                                                    <option value="">Select Status</option>
                                                                    <option value="1">कार्यरत</option>
                                                                    <option value="0">पूर्व-कर्मचारी</option>
                                                                    </select>
                                                                <label class="form-label-outlined" for="outlined-select">कार्यरत अवस्था</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <div class="form-control-wrap">
                                                                    <select class="form-select js-select2" data-search="on" id="office" name="office" required>
                                                                    <option value="">Select Office</option>
                                                                    <option value="थलारा गा.पा">थलारा गा.पा</option>
                                                                    <option value="वडा नं १">वडा नं १</option>
                                                                    <option value="वडा नं २">वडा नं २</option>
                                                                    <option value="वडा नं ३">वडा नं ३</option>
                                                                    <option value="वडा नं ४">वडा नं ४</option>
                                                                    <option value="वडा नं ५">वडा नं ५</option>
                                                                    <option value="वडा नं ६">वडा नं ६</option>
                                                                    <option value="वडा नं ७">वडा नं ७</option>
                                                                    <option value="वडा नं ८">वडा नं ८</option>
                                                                    <option value="वडा नं ९">वडा नं ९</option>
                                                                    <option value="दंगाजी स्वास्थ्य चौकी">दंगाजी स्वास्थ्य चौकी</option>
                                                                    <option value="पाराकाट्ने स्वास्थ्य चौकी">पाराकाट्ने स्वास्थ्य चौकी</option>
                                                                    <option value="कोटभैरब स्वास्थ्य चौकी">कोटभैरब स्वास्थ्य चौकी</option>
                                                                    <option value="कोइरालाकोट स्वास्थ्य चौकी">कोइरालाकोट स्वास्थ्य चौकी</option>
                                                                    <option value="मालुमेला स्वास्थ्य चौकी">मालुमेला स्वास्थ्य चौकी</option>
                                                                    <option value="आधारभुत स्वास्थ्य सेवा केन्द्र-मोतिपुर">आधारभुत स्वास्थ्य सेवा केन्द्र-मोतिपुर</option>
                                                                    <option value="आधारभुत स्वास्थ्य सेवा केन्द्र-महेन्द्रधार">आधारभुत स्वास्थ्य सेवा केन्द्र-महेन्द्रधार</option>
                                                                    <option value="आधारभुत स्वास्थ्य सेवा केन्द्र-खौला">आधारभुत स्वास्थ्य सेवा केन्द्र-खौला</option>
                                                                    <option value="आधारभुत स्वास्थ्य सेवा केन्द्र-सायर">आधारभुत स्वास्थ्य सेवा केन्द्र-सायर</option>
                                                                    <option value="आधारभुत स्वास्थ्य सेवा केन्द्र-कुलाकाट्ने">आधारभुत स्वास्थ्य सेवा केन्द्र-कुलाकाट्ने</option>
                                                                    </select>
                                                                <label class="form-label-outlined" for="outlined-select">कार्यरत कार्यालय</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <div class="form-control-wrap">
                                                                    <select class="form-select js-select2" data-search="on" id="branch" name="branch" required>
                                                                    <option value="">Select Status</option>
                                                                    <option value="शिक्षा तथा खेलकुद शाखा">शिक्षा तथा खेलकुद शाखा</option>
                                                                    <option value="स्वास्थ्य शाखा">स्वास्थ्य शाखा</option>
                                                                    <option value="आयुर्वेद शाखा">आयुर्वेद शाखा</option>
                                                                    <option value="कृषि सेवा शाखा">कृषि सेवा शाखा</option>
                                                                    <option value="पशु सेवा शाखा">पशु सेवा शाखा</option>
                                                                    <option value="प्राविधिक शाखा">प्राविधिक शाखा</option>
                                                                    <option value="प्रशासन शाखा">प्रशासन शाखा</option>
                                                                    <option value="महिला तथा जेष्ठ नागरिक शाखा">महिला तथा जेष्ठ नागरिक शाखा</option>
                                                                    <option value="सहकारी शाखा">सहकारी शाखा</option>
                                                                    <option value="उद्यम विकास शाखा">उद्यम विकास शाखा</option>
                                                                    <option value="सा.सु तथा पंजिकरण शाखा">सा.सु तथा पंजिकरण शाखा</option>
                                                                    <option value="सूचना प्रविधि शाखा">सूचना प्रविधि शाखा</option>
                                                                    <option value="अन्य">अन्य</option>
                                                                    </select>
                                                                <label class="form-label-outlined" for="outlined-select">कार्यरत शाखा</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control form-control-outlined" id="role" name="role">
                                                                    <label class="form-label-outlined" for="outlined">जिम्मेवारी</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control form-control-outlined" id="resigndate" name="resigndate">
                                                                    <label class="form-label-outlined" for="outlined">सरुवा/अवकास/राजीनामा मिति</label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        
                                                        <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <button type="submit" class="btn btn-lg btn-primary" name="apanga">SAVE</button>
                                                                <a href="<?php echo base_url('employee-list'); ?>" class="btn btn-danger">CANCEL</a>
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
      
      var mainDate = document.getElementById("datefrom");
      mainDate.nepaliDatePicker({
        unicodeDate: true
      });

      var mainDate = document.getElementById("dateto");
      mainDate.nepaliDatePicker({
        unicodeDate: true
      });

      var mainDate = document.getElementById("resigndate");
      mainDate.nepaliDatePicker({
        unicodeDate: true
      });

      var mainDate = document.getElementById("niyukti");
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
    function toggleSpouseField(){
        var maritalStatus = document.getElementById("marriedstatus").value;
        var spouseField = document.getElementById("spouse"); 

        if(maritalStatus === "1"){
            spouseField.disabled = false; 
        }else {
            spouseField.disabled = true;
            spouseField.value = "";
        }
    }
</script>
</body>       
</html>