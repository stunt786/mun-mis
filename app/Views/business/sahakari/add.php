
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
                                                <p>सहकारी दर्ता फारम</p>
                                            </div>
                                        </div><!-- .nk-block-head-content -->
                                     </div><!-- .nk-block-between -->
                                 </div><!-- .nk-block-head -->
                                 <div class="card card-bordered">
                                            <div class="card-inner">
                                                <form method="post" action="<?= site_url('sahakari') ?>" class="form-validate" enctype="multipart/form-data">
                                                    <div class="row g-gs">
                                                        <div>
                                                            <h6 style="color:red">सहकारीको विवरण</h6>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label class="form-label" for="cert_no">दर्ता प्रमाणपत्र नं</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="cert_no" name="cert_no" readonly>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label" for="org_name">सहकारीको नाम</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="org_name" name="org_name" required>
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
                                                                    <option value="<?= $list['year'] ?>"><?= $list['year'] ?></option>
                                                                <?php endforeach; ?>
                                                                </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label class="form-label" for="org_established_nep_date">स्थापना मिति</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="nepali-datepicker" name="org_established_nep_date" required>
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
                                                                    <option value="<?= $list['id'] ?>"><?= $list['province'] ?></option>
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
                                                                </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="org_municipality_id">स्थानीय तह</label>
                                                                <div class="form-control-wrap">
                                                                <select class="form-select js-select2" data-search="on" id="org_municipality_id" name="org_municipality_id" data-placeholder="Select an option" required>
                                                                <option value="">Select Municipality</option>
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
                                                                    <option value="<?= $list['ward'] ?>"><?= $list['ward'] ?></option>
                                                                <?php endforeach; ?>
                                                                </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="form-label" for="org_road_name">टोल/ठेगाना</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="org_road_name" name="org_road_name" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="org_phone">सम्पर्क नं</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="org_phone" name="org_phone" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="org_email">इमेल</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="email" class="form-control" id="org_email" name="org_email">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label class="form-label" for="org_pan">पान नं (PAN)</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="org_pan" name="org_pan">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="org_type">सहकारी बर्गिकरण</label>
                                                                <div class="form-control-wrap">
                                                                <select class="form-select js-select2" data-search="on" id="org_type" name="org_type" data-placeholder="Select an option" required>
                                                                <option value="">Select Type</option>
                                                                    <option value="बहुउदेश्यीय संस्था">बहुउदेश्यीय संस्था</option>
                                                                    <option value="कृषि संस्था">कृषि संस्था</option>
                                                                    <option value="श्रमिक संस्था">श्रमिक संस्था</option>
                                                                    <option value="उपभोक्ता संस्था">उपभोक्ता संस्था</option>
                                                                </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="org_type_description">मुख्य कार्य विवरण</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="org_type_description" name="org_type_description" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="org_dayewto">दायित्व</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="org_dayewto" name="org_dayewto" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="org_work_area">कार्यक्षेत्र</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="org_work_area" name="org_work_area" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label class="form-label" for="org_members">जम्मा सदस्य संख्या</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="number" class="form-control" id="org_members" name="org_members" readonly>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label class="form-label" for="org_male">पुरुष संख्या</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="number" class="form-control" id="org_male" name="org_male" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label class="form-label" for="org_female">महिला संख्या</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="number" class="form-control" id="org_female" name="org_female" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="org_share_capital">सेयर पुजिको रकम</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="number" class="form-control" id="org_share_capital" name="org_share_capital" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="org_entry_capital">सदस्य प्रवेश शुल्क रकम</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="number" class="form-control" id="org_entry_capital" name="org_entry_capital" required>
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
                                                                <label class="form-label" for="fv-full-file2">विधान/अन्य</label>
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
                                                                    <input type="text" class="form-control" id="applicant_name" name="applicant_name" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="form-label" for="applicant_phone">निवेदकको फोन नं</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="applicant_phone" name="applicant_phone" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="form-label" for="applicant_address">निवेदकको ठेगाना</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="applicant_address" name="applicant_address" required>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div>
                                                            <h6 style="color:red">थप विवरण</h6>
                                                        </div>

                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="org_reg_date">सहकारी दर्ता मिति</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="org_reg_date" name="org_reg_date" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">    
                                                            <div class="form-group">
                                                                <label class="form-label" for="status">सहकारी संचालन स्थिति</label>
                                                                <div class="form-control-wrap">
                                                                    <select type="text" name="status" id="status" class="form-control"  required>
                                                                    <option value="1">संचालनमा रहेको</option>
                                                                    <option value="0">बन्द भएको</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="expiry_date">नविकरण बहाल रहने मिति</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control date-picker" data-date-format="yyyy-mm-dd" id="expiry_date" name="expiry_date" value="2024-07-17" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="renew_date">अन्तिम नविकरण मिति</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="renew_date" name="renew_date" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">    
                                                            <div class="form-group">
                                                                <label class="form-label" for="expiry_status">नविकरण स्थिति</label>
                                                                <div class="form-control-wrap">
                                                                    <select type="text" name="expiry_status" id="expiry_status" class="form-control"  required>
                                                                    <option value="1">नविकरण भएको</option>
                                                                    <option value="0">नविकरण बाँकी</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="chief_officer">कार्यालय प्रमुख</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="chief_officer" name="chief_officer" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="chief_officer_job">कार्यालय प्रमुख पद</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="chief_officer_job" name="chief_officer_job" required>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label class="form-label" for="remarks">थप विवरण</label>
                                                                <textarea class="form-control form-control-sm" id="remarks" name="remarks" placeholder="Write Remarks" ></textarea> 
                                                            </div>
                                                        </div>

                                                        <div class="alert alert-fill alert-info alert-icon">
                                                            <em class="icon ni ni-alert-circle"></em> 
                                                            <strong>नविकरण बहाल रहने मिति</strong> आउँदो अङ्ग्रेजी वर्षको  YYYY-07-17 फर्मेटमा (असार मसान्त/श्रावण १ गते) राख्ने । 
                                                        </div>
                                                        <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <button type="submit" class="btn btn-lg btn-primary" name="sahakari">SAVE</button>
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
    // Get references to the input fields
    const orgMembersInput = document.getElementById('org_members');
    const orgMaleInput = document.getElementById('org_male');
    const orgFemaleInput = document.getElementById('org_female');

    // Function to calculate and update the total organization members
    function updateTotalMembers() {
        const orgMaleCount = parseInt(orgMaleInput.value) || 0;
        const orgFemaleCount = parseInt(orgFemaleInput.value) || 0;

        const totalMembers = orgMaleCount + orgFemaleCount;
        orgMembersInput.value = totalMembers;
    }

    // Attach event listeners to the male and female input fields
    orgMaleInput.addEventListener('input', updateTotalMembers);
    orgFemaleInput.addEventListener('input', updateTotalMembers);

    // Initial calculation when the page loads
    updateTotalMembers();
</script>
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
                    document.querySelector("#org_municipality_id").innerHTML = data;
                    // console.log(result);
                }
            });
        }
</script>

</body>       

</html>