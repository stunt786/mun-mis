
<!DOCTYPE html>
<html lang="en" class="js">

<head>
    <base href="../../" >
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
                                                <p>कृषि/पशु समूह अद्यावधिक फारम</p>
                                            </div>
                                        </div><!-- .nk-block-head-content -->
                                     </div><!-- .nk-block-between -->
                                 </div><!-- .nk-block-head -->
                                 <div class="card card-bordered">
                                            <div class="card-inner">
                                                <form method="post" action="<?php echo base_url('agri/update/' . $agri['id']); ?>" class="form-validate" enctype="multipart/form-data">
                                                    <div class="row g-gs">
                                                        <div>
                                                            <h6 style="color:red">समूहको विवरण</h6>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label class="form-label" for="certno">दर्ता प्रमाणपत्र नं</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="certno" name="certno" value="<?= $agri['certno'] ?>" readonly>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label" for="orgname">समुहको नाम</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="orgname" name="orgname" value="<?= $agri['orgname'] ?>" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label class="form-label" for="fiscalyear">आर्थिक वर्ष</label>
                                                                <div class="form-control-wrap">
                                                                <select class="form-select js-select2" id="fiscalyear" name="fiscalyear" data-placeholder="Select an option" onchange="fetchStateData(this.value)" required>
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
                                                                <label class="form-label" for="orgestablishednepdate">समुह स्थापना मिति</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="nepali-datepicker" name="orgestablishednepdate" value="<?= $agri['orgestablishednepdate'] ?>" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="orgprovinceid">प्रदेश</label>
                                                                <div class="form-control-wrap">
                                                                <select class="form-select js-select2" data-search="on" id="province" name="orgprovinceid" data-placeholder="Select an option" required>
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
                                                                <label class="form-label" for="orgdistrictid">जिल्ला</label>
                                                                <div class="form-control-wrap">
                                                                <select class="form-select js-select2" data-search="on" id="district" name="orgdistrictid" data-placeholder="Select an option" required>
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
                                                                <label class="form-label" for="orgmunicipalityid">स्थानीय तह</label>
                                                                <div class="form-control-wrap">
                                                                <select class="form-select js-select2" data-search="on" id="municipality" name="orgmunicipalityid" data-placeholder="Select an option" required>
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
                                                                <label class="form-label" for="orgwardid">वडा</label>
                                                                <div class="form-control-wrap">
                                                                <select class="form-select js-select2" id="orgwardid" name="orgwardid" data-placeholder="Select an option" required>
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
                                                                <label class="form-label" for="orgroadname">ठेगाना/टोल</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="orgroadname" name="orgroadname" value="<?= $agri['orgroadname'] ?>" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label class="form-label" for="orgphone">सम्पर्क नं</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="orgphone" name="orgphone" value="<?= $agri['orgphone'] ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="orgemail">इमेल</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="email" class="form-control" id="orgemail" name="orgemail" value="<?= $agri['orgemail'] ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="orgpan">पान नम्बर (PAN)</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="orgpan" name="orgpan" value="<?= $agri['orgpan'] ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="orgmembers">सदस्यको विवरण(अध्यक्ष/सचिब/कोषाध्यक्ष)</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="orgmembers" name="orgmembers" value="<?= $agri['orgmembers'] ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="orgtype">समुह बर्गीकरण</label>
                                                                <div class="form-control-wrap">
                                                                <select class="form-select js-select2" data-search="on" id="orgtype" name="orgtype" data-placeholder="Select an option" required>
                                                                <option value="">Select Type</option>
                                                                <option value="कृषि समुह" <?= $agri['orgtype'] == 'कृषि समुह' ? 'selected' : '' ?> >कृषि समुह</option>
                                                                <option value="कृषि फार्म" <?= $agri['orgtype'] == 'कृषि समुह' ? 'selected' : '' ?> >कृषि फार्म</option>
                                                                <option value="पशु समुह" <?= $agri['orgtype'] == 'कृषि फार्म' ? 'selected' : '' ?> >पशु समुह</option>
                                                                <option value="पशु-पंछि फार्म" <?= $agri['orgtype'] == 'पशु-पंछि फार्म' ? 'selected' : '' ?> >पशु-पंछि फार्म</option>
                                                                <option value="कृषि तथा पशु-पंछि समुह" <?= $agri['orgtype'] == 'कृषि तथा पशु-पंछि समुह' ? 'selected' : '' ?> >कृषि तथा पशु-पंछि समुह</option>
                                                                <option value="पशु क्षेत्र विकाश समुह" <?= $agri['orgtype'] == 'पशु क्षेत्र विकाश समुह' ? 'selected' : '' ?> >पशु क्षेत्र विकाश समुह</option>
                                                                </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="orgtypedescription">समुहको कार्य विवरण</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="orgtypedescription" name="orgtypedescription" value="<?= $agri['orgtypedescription'] ?>" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                                                                                
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="fv-full-file1">कागजात अपलोड</label>
                                                                <div class="form-control-wrap">
                                                                <input type="file" class="form-file-input" name="file1" id="file1">
                                                                <label class="form-file-label" for="customFile">Choose file</label>
                                                                <small style="color: red;">Upload image or pdf below 5 MB only</small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                          
                                                        <div>
                                                            <h6 style="color:red">निवेदकको विवरण</h6>
                                                            
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="form-label" for="applicantname">निवेदकको नाम</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="applicantname" name="applicantname" value="<?= $agri['applicantname'] ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="form-label" for="applicantphone">निवेदकको फोन नं</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="applicantphone" name="applicantphone" value="<?= $agri['applicantphone'] ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="form-label" for="applicant_address">निवेदकको ठेगाना</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="applicantaddress" name="applicantaddress" value="<?= $agri['applicantaddress'] ?>">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div>
                                                            <h6 style="color:red">थप विवरण</h6>
                                                        </div>

                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="branchofficer">कृषि/पशु शाखा प्रमुख</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="branchofficer" name="branchofficer" value="<?= $agri['branchofficer'] ?>" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="branchofficerjob">कृषि/पशु शाखा प्रमुख पद</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="branchofficerjob" name="branchofficerjob"value="<?= $agri['branchofficerjob'] ?>" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="chiefofficer">कार्यालय प्रमुख</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="chiefofficer" name="chiefofficer" value="<?= $agri['chiefofficer'] ?>" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="chiefofficerjob">कार्यालय प्रमुख पद</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="chiefofficerjob" name="chiefofficerjob" value="<?= $agri['chiefofficerjob'] ?>" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="orgregdate">समूह दर्ता मिति</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="orgregdate" name="orgregdate" value="<?= $agri['orgregdate'] ?>" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">    
                                                            <div class="form-group">
                                                                <label class="form-label" for="orgstatus">समूह संचालन स्थिति</label>
                                                                <div class="form-control-wrap">
                                                                    <select type="text" name="orgstatus" id="orgstatus" class="form-control"  required>
                                                                    <option value="1" <?= $agri['orgstatus'] == 1 ? 'selected' : '' ?> >संचालनमा रहेको</option>
                                                                    <option value="0" <?= $agri['orgstatus'] == 1 ? 'selected' : '' ?> >बन्द भएको</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="expirydate">नविकरण बहाल रहने मिति</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control date-picker" data-date-format="yyyy-mm-dd" id="expirydate" name="expirydate" value="<?= $agri['expirydate'] ?>" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="renewdate">अन्तिम नविकरण मिति</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="renewdate" name="renewdate" value="<?= $agri['renewdate'] ?>" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">    
                                                            <div class="form-group">
                                                                <label class="form-label" for="expirystatus">नविकरण स्थिति</label>
                                                                <div class="form-control-wrap">
                                                                    <select type="text" name="expirystatus" id="expirystatus" class="form-control"  required>
                                                                    <option value="1" <?= $agri['expirystatus'] == 1 ? 'selected' : '' ?> >नविकरण भएको</option>
                                                                    <option value="0" <?= $agri['expirystatus'] == 0 ? 'selected' : '' ?> >नविकरण बाँकी</option>
                                                                   </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="fv-full-file1">विधान अपलोड</label>
                                                                <div class="form-control-wrap">
                                                                <input type="file" class="form-file-input" name="file2" id="file2">
                                                                <label class="form-file-label" for="customFile">Choose file</label>
                                                                <small style="color: red;">Upload image or pdf below 5 MB only</small>
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
                                                                <button type="submit" class="btn btn-lg btn-primary" name="agris">UPDATE</button>
                                                                <a href="<?php echo base_url('agri-list'); ?>" class="btn btn-danger">CANCEL</a>
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
    <script src="<?= base_url('js/jquery.min.js') ?>"></script>
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
        var current_province = $('#province').val();
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

        $('#province.val(current_province');

        $('#province').change();
    });
</script>


</body>       

</html>