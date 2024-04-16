<!DOCTYPE html>
<html lang="np">
<title>Thalara MIS</title>
<head>
<base href="../../">
	<meta charset="UTF-8">
    <link rel="icon" href="images/logo.jpg">
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
			size:8.26in 11.6in;
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
		margin-right:50px;
		margin-left:40px;
		}
		}
		#print{
		width:7.8in;
		height: 11in;
		}
		input {
    border: 0;
    outline: 0;
    background: transparent;
    border-bottom: 1px solid black;
}

.col-md-12{
	margin-bottom: 20px;
	padding-right: 100px;
}

body {
	font-family: kalimati;
	
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
          <img src="<?= base_url('assets/images/img/logo.png'); ?>" height="100px" width="480px" style="float:center" id="image">
          
      </div>
        </div>
        <div class="row">
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
        <img src="<?= base_url('assets/images/img/water.jpg') ?>" height="75px" width="400px" style="float: center;" id="image">
    </div>
</div>

  <div class="container-md" style="width: 100%;">
    <p class="p" style="text-align:justify;line-height:6mm;font-family:kalimati; font-size:14px">
    श्री अध्यक्ष जयू  <u><br><?= $detail['org_name'] ?></u>;<br><br> 
    <u><?= $detail['org_name'] ?></u>, लाई <u><?= $detail['municipality'] ?></u> को जलश्रोत नियमावली, २०७५ को दफा (८) को उपदफा (१) बमोजिम
    <u><?= $detail['review_date'] ?></u> गते को जलश्रोत नियमावली, २०७५ बमोजिम आफ्नो कार्य सञ्‍चालन गर्ने गराउने गरी देहाय बमोजिम उपयोगका लागि यस कार्यालयमा दर्ता गरी यो दर्ता प्रमाणपत्र प्रदान गरिएको छ ।<br>
    </p>
    <p class="para" style="text-align:left;line-height:8mm;font-family:kalimati; font-size:16px">
    <strong> १. उपयोग गरिने  जलस्रोत विवरण</strong><br>
    (क) जलस्रोतको नाम (चार किल्ला सहित ) भएको ठाउँ : <u><?= $detail['org_resource_name'] ?></u><br>
    (ख) जलस्रोत बाट गरिने प्रयोग :<u><?= $detail['org_use'] ?></u><br>
    (ग) जलस्रोतको नाम :<u><?= $detail['org_type_description'] ?></u><br>
    (घ) उपभोक्ता संस्थाले उपयोग गर्न चाहेको जलस्रोतको परिमाण : <u><?= $detail['org_capacity'] ?> (LPS)</u><br>
    <strong> २. उपभोक्ता संस्थाले पुर्याउन चाहेको सेवा सम्बन्धी विवरण</strong><br>
    (क) सेवाको किसिम : <u><?= $detail['org_type'] ?></u><br>
    (ख) सेवा पुर्याउने क्षेत्र : <u><?= $detail['org_tole'] ?></u><br>
    (ग) सेवाबाट लाभान्वित हुने उपभोक्ताहरूको संख्या : <u><?= $detail['org_members'] ?></u><br>
    (घ) भविष्यमा सेवा विस्तार गर्न सक्ने सम्भावना : <u><?= $detail['org_future'] ?></u><br>
    

    </p>
  </div>
          <div class="footer">
            <div class="col-md-12">
              <div style="line-height: 5mm;">
            
                <div style="float: right;"> <!-- Approver -->
                    <!-- Dotted line for Approver's signature -->
                    <hr style="border: none; border-top: 1px dotted black; width: 120px;">
                    <label for="">स्विकृत गर्नेको हस्ताक्षर&nbsp;</label><br>
                    <label for="">नाम थर:&nbsp;<?= $detail['chief_officer'] ?></label><br>
                    <label for="">पद:&nbsp;<?= $detail['chief_officer_job'] ?></label>
                </div>
            </div>
          </div>
        </div>
</div>

</body>
</html>
            