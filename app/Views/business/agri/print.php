<!DOCTYPE html>
<html lang="np">
<title>PRINT</title>
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
    
     <!-- Bootstrap Core CSS -->
    <!-- <link href="./assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="./assets/css/style.css" rel="stylesheet"> -->
    <!-- Custom CSS -->
    <!-- <link href="./asset/css/sb-admin.css" rel="stylesheet"> -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<style>
	@media print { 
		color: #FF0000;
        text-shadow:none !important;
        background: #FFFFFF;

		@page {
			size:11.6in 8.26in;
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
		width:11in;
		height: 7.8in;
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
padding-top: 10%;
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
  
    <div id='print'>
      
        
        <div class="col-md-12">
            <div style="text-align: centre;">
                <img src="<?= base_url('assets/images/img/logo.png'); ?>"  style="float:centre" id="image">
          <!-- <img src="<?= base_url('/' . $detail['image_path']) ?>" width="100" style="float:right" id="photo"> -->
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
                <h><?= $detail['fiscalyear'] . "/" . $detail['certno'] ?></h>
                <div style="float: right;"> 
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
        <img src="<?= base_url('assets/images/img/group.jpg') ?>" height="85px" width="400px" style="float: center;" id="image">
    </div>
   </div>

  <div class="container-md" style="width: 100%;">
    <p class="p" style="text-align:center;line-height:9mm;font-family:kalimati; font-size:24px">
        कृषि पद्धतिलाई सु-व्यवस्थित गर्दै कृषि कार्यलाई टेवा पुर्याउने उद्धेश्यले यस जिल्लाको &nbsp&nbsp<u><?= $detail['municipality'] ?></u> वडा नं <u><?= $detail['orgwardid'] ?></u>&nbsp&nbsp मा मिति  <u>&nbsp&nbsp <?= $detail['orgregdate'] ?></u> &nbsp&nbsp गतेमा गठित भएको  <u><?= $detail['orgtype'] ?></u> श्री <u><?= $detail['orgname'] ?></u> लाई यस कार्यालयको अभिलेखमा दर्ता गरी यो प्रमाणपत्र प्रदान गरिएको छ ।<br>
    </p>
    
  </div>
          <div class="footer">
            <div class="col-md-12">
              <div style="line-height: 5mm;">
              <div style="float: left;"> <!-- Approver -->
                    <!-- Dotted line for Approver's signature -->
                    <hr style="border: none; border-top: 1px dotted black; width: 120px;">
                    <label for="">स्विकृत गर्नेको हस्ताक्षर&nbsp;</label><br>
                    <label for="">नाम थर:&nbsp;<?= $detail['branchofficer'] ?></label><br>
                    <label for="">पद:&nbsp;<?= $detail['branchofficerjob'] ?></label>
                </div>
                
                <div style="float: right;"> <!-- Approver -->
                    <!-- Dotted line for Approver's signature -->
                    <hr style="border: none; border-top: 1px dotted black; width: 120px;">
                    <label for="">स्विकृत गर्नेको हस्ताक्षर&nbsp;</label><br>
                    <label for="">नाम थर:&nbsp;<?= $detail['chiefofficer'] ?></label><br>
                    <label for="">पद:&nbsp;<?= $detail['chiefofficerjob'] ?></label>
                </div>
            </div>
          </div>
        </div>
</div>

</body>
</html>
            