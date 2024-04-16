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
.footer{
padding-top: 20%;
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
          <img src="<?= base_url('assets/images/img/logo.png'); ?>" height="100px" width="480px" style="float:left" id="image">
          <img src="<?= base_url('/' . $detail['image_path']) ?>" width="100" style="float:right" id="photo">
      </div>
        </div>
        <div class="row">
    <div class="col-md-12">
        <div style="line-height: 5mm;">
            <div>
                <label>पान नं:&nbsp;&nbsp;&nbsp;</label>
                <b><?= $detail['orgpan'] ?></b><br>
            </div>
            <div>
                <label for="">दर्ता नं:&nbsp;&nbsp;</label>
                <h><?= $detail['fiscal_year'] . "/" . $detail['cert_no'] ?></h>
                
                <div style="float: right;"> <!-- Align container to the right -->
                    <label for="">दर्ता मिति:&nbsp;</label>
                    <h><?= $detail['orgregdate'] ?></h>
                </div>
            </div>
        </div>
    </div>
</div>


      
<div class="col-md-12">
    <div style="text-align: center;">
        <!--<center><h2 style="color:blue" class="foo"><b><u>Business Registration Certificate</u></b></h2></center>-->
        <img src="<?= base_url('assets/images/img/gha.jpg') ?>" height="75px" width="400px" style="float: center;" id="image">
    </div>
</div>

  <div class="container-md" style="width: 100%;">
    <p class="p" style="text-align:justify;line-height:6mm;font-family:kalimati; font-size:14px">
    <u><?= $detail['barga'] ?></u> वर्गको निर्माण व्यवशायीइजाजतपत्र सम्बन्धी कार्यविधि २०७५ को दफा (२) को उपदफा (४) बमोजिम निर्माण व्यवशाय गर्न <u><?= $detail['municipality'] ?></u> वडा नं <u><?= $detail['orgwardid'] ?></u> स्थित कार्यालय भएको <strong><u><?= $detail['orgname'] ?></strong></u> फर्म वा कम्पनिलाई इजाजतपत्र प्रदान गरीएको छ । <br>
    </p>
    <p class="p" style="text-align:justify;line-height:10mm; font-size:22px"> <img src="./assets/images/img/gha-1.jpg" height="140px" width="140px" style="float: left;" id="image"><br> </u>

  </div>
          <div class="footer">
            <div class="col-md-12">
              <div style="line-height: 5mm;">
            
                
                <div style="float: right;"> <!-- Approver -->
                    <!-- Dotted line for Approver's signature -->
                    <hr style="border: none; border-top: 1px dotted black; width: 150px;">
                    <label for="">&nbsp&nbspइजाजत पत्र दिनेको&nbsp;</label><br>
                    <label for="">&nbsp&nbspहस्ताक्षर:&nbsp;</label><br>
                    <label for="">&nbsp&nbspनाम थर:&nbsp;<?= $detail['chiefofficer'] ?></label><br>
                    <label for="">&nbsp&nbspपद:&nbsp;<?= $detail['chiefofficerjob'] ?></label><br>
                    <label for="">&nbsp&nbspमिति:&nbsp;<?= $detail['orgregdate'] ?></label><br>
                </div>
            </div>
          </div>
        </div>
</div>

</body>
</html>
            