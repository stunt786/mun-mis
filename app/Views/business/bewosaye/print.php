<!DOCTYPE html>
<html lang="np">
<title>PRINT</title>
<head>

	<meta charset="UTF-8">
    <link rel="icon" href="./images/logo.jpg">
<style>
    @font-face {
        font-family: Kalimati;
        src: url("./assets/css/Kalimati.ttf") format('truetype');
	}
	@font-face {
        font-family: kokila;
        src: url("./assets/css/kokila.ttf") format('truetype');
	}
  @page{
    border: 1mm blue;
  }


h4 {
  margin: 0;
}

</style>
    
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

	<style>
	@media print { 
		color: #FF0000;
        text-shadow:none !important;
        background: #FFFFFF;

		@page {
			size:8.27in 11.6in;
      margin: 0;
		}
		head{
			height:0px;
			display: none;
		}
		#head{
			display: none;
			height:0px;
		}
		#print{
		position:fixed;
		top:0px;
		margin-top:20px;
		margin-bottom:20px;
		margin-right:30px;
		margin-left:30px;
		}
		}
		#print{
		width:7.8in;
		height: 11in;
    margin: 0;
    padding: 0;
    display: flex;
        flex-direction: column;
		}
		input {
    border: 0;
    outline: 0;
    background: transparent;
    border-bottom: 1px solid black;
}

.col-md-12{
	margin-bottom: 20px;
	padding-right: 30px;
}
.footer{
padding-top: 20%;
}
body {
	font-family: kalimati, sans-serif;
	
}
.p {
	font-family: kalimati;
  margin-left: 20px;
  padding-right: 10%;
	
}
.para {
	padding-top: 30px;
  margin-left: 20px;
	
}
.row-header-bottom{
  padding-top: 20px;
}
u {    
    border-bottom: 1.5px dotted #000;
    text-decoration: none;
}
	</style>
</head> 
<body>
<div class="col-md-2" id="head">
    <button class="btn btn-info" onclick="print()">
      <i class="glyphicon glyphicon-print"></i>&nbspPRINT</button>
    
    
  </div>
  <div style="text-align: left;">
    <div id='print'>
      <div style="margin-left:.5in;margin-right:.5in;margin-top:.1in;margin-bottom:.1in;line-height:1mm;"></div>
        <div class="row">
            <div class="col-md-12">
          <img src="<?= base_url('assets/images/img/logo.png'); ?>" height="120px" width="480px" style="float:left" id="image">
          <img src="<?= base_url('/' . $detail['image_path']) ?>" width="100" style="float:right" id="photo">
      </div>
        </div>
        <div class="row-header-bottom">
          <div class="col-md-12">
            <div style="line-height: 5mm;">
            <div>
                <label>पान नं:&nbsp;&nbsp;&nbsp;</label>
                <b><?= $detail['org_pan'] ?></b><br>
            </div>
            <div>
                <label for="">दर्ता नं:&nbsp;&nbsp;</label>
                <h><?= $detail['fiscal_year'] . "/" . $detail['cert_no'] ?></h>
                
                <div style="float: right;"> <!-- Align container to the right -->
                    <label for="">दर्ता मिति:&nbsp;</label>
                    <h><?= $detail['org_reg_date'] ?></h>
                </div>
            </div>
        </div>
    </div>
</div>


      
<div class="col-md-12">
    <div style="text-align: center;">
        <!--<center><h2 style="color:blue" class="foo"><b><u>Business Registration Certificate</u></b></h2></center>-->
        <img src="<?= base_url('assets/images/img/certibuss.jpg') ?>" height="75px" width="400px" style="float: center;" id="image">
    </div>
</div>

  <div class="container-md" style="width: 100%;">
    <p class="p" style="text-align:justify;line-height:6mm;font-family:kalimati; font-size:14px">
        जिल्ला बझाङ थलारा गाउँपालिका वडा नं <u><?= $detail['org_ward_id'] ?></u> बस्‍ने श्री <strong><u><?= $detail['prop_name'] ?></strong></u> लाई व्यवशाय दर्ता तथा नविकरण निर्देशिकाको दफा (४) को उपदफा (३) बमोजिम निम्‍न विवरण अनुसारको व्यवसाय दर्ता गरी यो प्रमाण पत्र जारी गरीएको छ । <br>
    </p>
    <p class="para" style="text-align:left;line-height:8mm;font-family:kalimati; font-size:16px">
        व्यवशायको नाम: <u><?= $detail['org_name'] ?> <br></u> 
        व्यवशायको रहने स्थान: <u><?= $detail['municipality'] ?> &nbsp&nbsp</u>वडा नं. &nbsp&nbsp <?= $detail['org_ward_id'] ?>,&nbsp&nbsp<u> <?= $detail['org_road_name'] ?></u> <br>
        बाटोको नाम: <u> </u>
        <u>&nbsp&nbsp&nbsp&nbsp </u> घर नं:&nbsp&nbsp <u> <?= $detail['org_house_no'] ?>&nbsp&nbsp&nbsp </u>टोल:<u> <?= $detail['org_road_name'] ?></u> <br>
        व्यवशाय रहने घर/जग्गाधनीको नाम: <u><?= $detail['prop_name'] ?> </u> <br>
        व्यवशायको प्रकृति: <u><?= $detail['org_type'] ?></u> <br>
        पूजिगत लगानी:रु <u><?= $detail['org_total_capital'] ?> </u> <br>
        व्यवशायको विवरण: <u><?= $detail['org_type_description'] ?></u>
    </p>
  </div>
          <div class="footer">
            <div class="col-md-12">
              <div style="line-height: 5mm;">
            
                <div style="float: left;"> <!-- Creator -->
                   <!-- Dotted line for Creator's signature -->
                    <hr style="border: none; border-top: 1px dotted black; width: 120px;">
                    <label for="">व्यवशायीको हस्ताक्षर&nbsp;</label>
                </div>
                <div style="float: right;"> <!-- Approver -->
                    <!-- Dotted line for Approver's signature -->
                    <hr style="border: none; border-top: 1px dotted black; width: 120px;">
                    <label for="">स्विकृत गर्नेको हस्ताक्षर&nbsp;</label><br>
                    <label for="">&nbsp;<?= $detail['chief_officer'] ?></label><br>
                </div>
            </div>
          </div>
        </div>
</div>

</body>
</html>
            