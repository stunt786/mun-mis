
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
                                                <p>निर्माण व्यवशाय दर्ता फारम</p>
                                            </div>
                                        </div><!-- .nk-block-head-content -->
                                     </div><!-- .nk-block-between -->
                                 </div><!-- .nk-block-head -->
                                 <div class="card card-bordered">
                                            <div class="card-inner">
                                                <form method="post" action="<?= site_url('ghabarga') ?>" class="form-validate" enctype="multipart/form-data">
                                                    <div class="row g-gs">
                                                        <div>
                                                            <h6 style="color:red">निर्माण व्यवशाय दर्ता फारम </h6>
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
                                                                <label class="form-label" for="orgname">निर्माण व्यवशायको नाम</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="orgname" name="orgname" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label class="form-label" for="fiscal_year">आर्थिक वर्ष</label>
                                                                <div class="form-control-wrap">
                                                                <select class="form-select js-select2" id="fiscal_year" name="fiscal_year" data-placeholder="Select an option" onchange="fetchStateData(this.value)" required>
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
                                                                <label class="form-label" for="orgestddate">सञ्‍चालन/स्थापना मिति</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="nepali-datepicker" name="orgestddate" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="orgprovinceid">प्रदेश</label>
                                                                <div class="form-control-wrap">
                                                                <select class="form-select js-select2" data-search="on" id="province" name="orgprovinceid" data-placeholder="Select an option"  onchange="fetchDistrictData(this.value)" required>
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
                                                                <label class="form-label" for="orgdistrictid">जिल्ला</label>
                                                                <div class="form-control-wrap">
                                                                <select class="form-select js-select2" data-search="on" id="districtID" name="orgdistrictid" data-placeholder="Select an option"onchange="fetchMunicipalityData(this.value)" required>
                                                                <option value="">Select District</option>
                                                                </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="orgmunicipalityid">स्थानीय तह</label>
                                                                <div class="form-control-wrap">
                                                                <select class="form-select js-select2" data-search="on" id="orgmunicipalityid" name="orgmunicipalityid" data-placeholder="Select an option" required>
                                                                <option value="">Select Municipality</option>
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
                                                                    <option value="<?= $list['ward'] ?>"><?= $list['ward'] ?></option>
                                                                <?php endforeach; ?>
                                                                </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="form-label" for="orgroad">ठेगाना/टोल</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="orgroad" name="orgroad" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label class="form-label" for="orgphone">सम्पर्क नं</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="orgphone" name="orgphone">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="orgemail">इमेल</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="email" class="form-control" id="orgemail" name="orgemail">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="orgpan">पान नम्बर (PAN)</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="orgpan" name="orgpan">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="orgtype">फर्म वा कम्पनिको बर्गीकरण</label>
                                                                <div class="form-control-wrap">
                                                                <select class="form-select js-select2" data-search="on" id="orgtype" name="orgtype" data-placeholder="Select an option" required>
                                                                <option value="">Select Type</option>
                                                                <option value="प्राइभेट लिमिटेड कम्पनी">प्राइभेट लिमिटेड कम्पनी</option>
                                                                <option value="पब्लिक लिमिटेड कम्पनी">पब्लिक लिमिटेड कम्पनी</option>
                                                                <option value="एकलौटी">एकलौटी</option>
                                                                <option value="साझेदारी">साझेदारी</option>
                                                                </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="barga">इजाजत लिन चाहेको वर्ग</label>
                                                                <div class="form-control-wrap">
                                                                <select class="form-select js-select2" data-search="on" id="barga" name="barga" data-placeholder="Select an option" required>
                                                                <option value="">Select Type</option>
                                                                <option value="घ">घ</option>
                                                                <option value="अन्य">अन्य</option>
                                                                </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="maxcapital">व्यवशाय अधिक्तम पूजि</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="number" class="form-control" id="maxcapital" name="maxcapital">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="currentcapital">व्यवशाय जारी पूजि</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="number" class="form-control" id="currentcapital" name="currentcapital">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="ogroup">समूहिकरण हुन चाहेको समूह</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="ogroup" name="ogroup">
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
                                                                <label class="form-label" for="fv-full-file1">संचालकको फोटो</label>
                                                                <div class="form-control-wrap">
                                                                <input type="file" class="form-file-input" name="file2" id="file2">
                                                                <label class="form-file-label" for="customFile">Choose Image</label>
                                                                <?= form_error('file2') ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                          
                                                        <div>
                                                            <h6 style="color:red">आर्थिक/भौतिक/मानविय श्रोतको विवरण</h6>
                                                            
                                                        </div>

                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="overdraftcapital">स्थायी ओभरड्राफ्ट रकम रु</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="overdraftcapital" name="overdraftcapital">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="mudatiaccount">मुद्दति खाता रकम रु</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="mudatiaccount" name="mudatiaccount">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="currentaccount">चल्ती खाता रकम रु</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="currentaccount" name="currentaccount">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="savingaccount">बचत खाता रकम रु</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="savingaccount" name="savingaccount">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="skilledemployee">प्राविधिक कर्मचारी संख्या</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="number" class="form-control" id="skilledemployee" name="skilledemployee">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="unskilledemployee">अ-प्राविधिक कर्मचारी संख्या</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="number" class="form-control" id="unskilledemployee" name="unskilledemployee">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="otheremployee">अन्य कर्मचारी संख्या</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="number" class="form-control" id="otheremployee" name="otheremployee">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label class="form-label" for="vehicleslist">सवारी साधन/मेशिनरी औजार विवरण</label>
                                                                <div class="form-control-wrap">
                                                                <textarea class="form-control form-control-sm" id="vehicleslist" name="vehicleslist" placeholder="Write list" ></textarea>  
                                                            </div>
                                                            </div>
                                                        </div>

                                                        <div>
                                                            <h6 style="color:red">निवेदक विवरण</h6>
                                                        </div>

                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="applicantname">निवेदकको नाम</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="applicantname" name="applicantname" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="applicantaddress">निवेदकको ठेगाना</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="applicantaddress" name="applicantaddress" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="applicantphone">निवेदकको सम्पर्क नं</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="applicantphone" name="applicantphone" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="applicantemail">निवेदकको इमेल</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="email" class="form-control" id="applicantemail" name="applicantemail">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div>
                                                            <h6 style="color:red">अन्य विवरण</h6>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="chiefofficer">दर्ता गर्ने अधिकारी</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="chiefofficer" name="chiefofficer" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="chiefofficerjob">दर्ता अधिकारी पद</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="chiefofficerjob" name="chiefofficerjob" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="orgregdate">निर्माण व्यवशाय दर्ता मिति</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="orgregdate" name="orgregdate" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">    
                                                            <div class="form-group">
                                                                <label class="form-label" for="orgstatus">निर्माण व्यवशाय संचालन स्थिति</label>
                                                                <div class="form-control-wrap">
                                                                    <select type="text" name="orgstatus" id="orgstatus" class="form-control"  required>
                                                                    <option value="1">संचालनमा रहेको</option>
                                                                    <option value="0" >बन्द भएको</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="expirydate">नविकरण बहाल रहने मिति</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control date-picker" data-date-format="yyyy-mm-dd" id="expirydate" name="expirydate" value="2024-07-17" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="form-label" for="renewdate">अन्तिम नविकरण मिति</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="renewdate" name="renewdate" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">    
                                                            <div class="form-group">
                                                                <label class="form-label" for="expirystatus">नविकरण स्थिति</label>
                                                                <div class="form-control-wrap">
                                                                    <select type="text" name="expirystatus" id="expirystatus" class="form-control"  required>
                                                                    <option value="1" selected >नविकरण भएको</option>
                                                                    <option value="0" >नविकरण बाँकी</option>
                                                                    </select>
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
                                                                <button type="submit" class="btn btn-lg btn-primary" name="ghabarga">Save</button>
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
    <script src="<?php echo base_url('./js/jquery.min.js'); ?>"></script>
    
    
  <script>
    window.onload = function() {
      var mainInput = document.getElementById("nepali-datepicker");
      mainInput.nepaliDatePicker({
        unicodeDate: true
      });
      var mainDate = document.getElementById("renewdate");
      mainDate.nepaliDatePicker({
        unicodeDate: true
      });
      var mainDate = document.getElementById("orgregdate");
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
                    document.querySelector("#orgmunicipalityid").innerHTML = data;
                    // console.log(result);
                }
            });
        }
</script>

</body>       

</html>