<!DOCTYPE html>
<html lang="en" class="js">

<head>
    <base href="../../">
    <meta charset="utf-8">
    <meta name="Municipality" content="MUN-MIS">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Digital Nepal, Digital Palika.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="<?= base_url('images/favicon.png') ?>">
    <!-- Page Title  -->
    <title><?= $title ?></title>
    <!-- StyleSheets  -->
    
</head>

<body class="nk-body ui-rounder npc-default has-sidebar ">
    <div class="nk-app-root">
    <div class="nk-sidebar" data-content="sidebarMenu">
         <?php include(APPPATH . 'Views/admin/templates/sidenav.php');?>
        </div>
        <!-- main @s -->
        <div class="nk-main ">
            <!-- wrap @s -->
            <div class="nk-wrap ">
                <!-- main header @s -->
                <?php include(APPPATH . 'Views/admin/templates/header.php');?>
                <!-- main header @e -->
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="nk-block-head nk-block-head-sm">
                                    <div class="nk-block-between g-3">
                                        <div class="nk-block-head-content">
                                            <h3 class="nk-block-title page-title"><?= $title ?></h3>
                                        </div>
                                        <div class="nk-block-head-content">
                                            <a href="<?php echo base_url('agri-list'); ?>" class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em class="icon ni ni-arrow-left"></em><span>Back</span></a>
                                            <a href="html/pharmacy/medicine-list.html" class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none"><em class="icon ni ni-arrow-left"></em></a>
                                        </div>
                                    </div>
                                </div><!--.nk-block-head-->
                                <div class="nk-block">
                                    <div class="card card-bordered">
                                        <div class="card-aside-wrap">
                                            <div class="card-content">
                                                <div class="card-inner">
                                                    <div class="nk-block">
                                                        <div class="nk-block-head nk-block-head-sm nk-block-between">
                                                            <h5 class="title">कृषि विवरण</h5>
                                                        </div><!-- .nk-block-head -->
                                                        <div class="profile-ud-list">
                                                                    <div class="profile-ud-item">
                                                                        <div class="profile-ud wider">
                                                                            <span class="profile-ud-label">#</span>
                                                                            <span class="profile-ud-value"><?= $detail['id'] ?></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="profile-ud-item">
                                                                        <div class="profile-ud wider">
                                                                            <span class="profile-ud-label">दर्ता प्रमाणपत्र नं</span>
                                                                            <span class="profile-ud-value"><?= $detail['certno'] ?></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="profile-ud-item">
                                                                        <div class="profile-ud wider">
                                                                            <span class="profile-ud-label">आर्थिक वर्ष</span>
                                                                            <span class="profile-ud-value"><?= $detail['fiscalyear'] ?></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="profile-ud-item">
                                                                        <div class="profile-ud wider">
                                                                            <span class="profile-ud-label">प्रदेश</span>
                                                                            <span class="profile-ud-value"><?= $detail['province'] ?></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="profile-ud-item">
                                                                        <div class="profile-ud wider">
                                                                            <span class="profile-ud-label">जिल्ला</span>
                                                                            <span class="profile-ud-value"><?= $detail['district'] ?></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="profile-ud-item">
                                                                        <div class="profile-ud wider">
                                                                            <span class="profile-ud-label">स्थानीय तह</span>
                                                                            <span class="profile-ud-value"><?= $detail['municipality'] ?></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="profile-ud-item">
                                                                        <div class="profile-ud wider">
                                                                            <span class="profile-ud-label">वडा नं</span>
                                                                            <span class="profile-ud-value"><?= $detail['orgwardid'] ?></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="profile-ud-item">
                                                                        <div class="profile-ud wider">
                                                                            <span class="profile-ud-label">समूहको नाम</span>
                                                                            <span class="profile-ud-value"><?= $detail['orgname'] ?></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="profile-ud-item">
                                                                        <div class="profile-ud wider">
                                                                            <span class="profile-ud-label">समूह स्थापना मिति</span>
                                                                            <span class="profile-ud-value"><?= $detail['orgestablishednepdate'] ?></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="profile-ud-item">
                                                                        <div class="profile-ud wider">
                                                                            <span class="profile-ud-label">ठेगाना/टोल</span>
                                                                            <span class="profile-ud-value"><?= $detail['orgroadname'] ?></span>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="profile-ud-item">
                                                                        <div class="profile-ud wider">
                                                                            <span class="profile-ud-label">सम्पर्क नं</span>
                                                                            <span class="profile-ud-value"><?= $detail['orgphone'] ?></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="profile-ud-item">
                                                                        <div class="profile-ud wider">
                                                                            <span class="profile-ud-label">इमेल</span>
                                                                            <span class="profile-ud-value"><?= $detail['orgemail'] ?></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="profile-ud-item">
                                                                        <div class="profile-ud wider">
                                                                            <span class="profile-ud-label">पान नम्बर (PAN)</span>
                                                                            <span class="profile-ud-value"><?= $detail['orgpan'] ?></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="profile-ud-item">
                                                                        <div class="profile-ud wider">
                                                                            <span class="profile-ud-label">समूह बर्गीकरण</span>
                                                                            <span class="profile-ud-value"><?= $detail['orgtype'] ?></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="profile-ud-item">
                                                                        <div class="profile-ud wider">
                                                                            <span class="profile-ud-label">समूहको कार्य विवरण</span>
                                                                            <span class="profile-ud-value"><?= $detail['orgtypedescription'] ?></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="profile-ud-item">
                                                                        <div class="profile-ud wider">
                                                                            <span class="profile-ud-label">पुजिगत लगानी</span>
                                                                            <span class="profile-ud-value"><?= $detail['orgmembers'] ?></span>
                                                                        </div>
                                                                    </div>
                                                        </div>       
                                                            <div class="nk-divider divider md"></div>
                                                            <div class="profile-ud-list">
                                                                    <div class="profile-ud-item">
                                                                        <div class="profile-ud wider">
                                                                            <span class="profile-ud-label">कृषि/पशु शाखा प्रमुख</span>
                                                                            <span class="profile-ud-value"><?= $detail['branchofficer'] ?></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="profile-ud-item">
                                                                        <div class="profile-ud wider">
                                                                            <span class="profile-ud-label">कृषि/पशु शाखा प्रमुख पद</span>
                                                                            <span class="profile-ud-value"><?= $detail['branchofficerjob'] ?></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="profile-ud-item">
                                                                        <div class="profile-ud wider">
                                                                            <span class="profile-ud-label">कार्यालय प्रमुख</span>
                                                                            <span class="profile-ud-value"><?= $detail['chiefofficer'] ?></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="profile-ud-item">
                                                                        <div class="profile-ud wider">
                                                                            <span class="profile-ud-label">कार्यालय प्रमुख पद</span>
                                                                            <span class="profile-ud-value"><?= $detail['chiefofficerjob'] ?></span>
                                                                        </div>
                                                                    </div>
                                                            </div>   
                                                                <div class="nk-divider divider md"></div>
                                                                <div class="profile-ud-list">
                                                                    <div class="profile-ud-item">
                                                                        <div class="profile-ud wider">
                                                                            <span class="profile-ud-label">निवेदकको नाम</span>
                                                                            <span class="profile-ud-value"><?= $detail['applicantname'] ?></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="profile-ud-item">
                                                                        <div class="profile-ud wider">
                                                                            <span class="profile-ud-label">निवेदकको ठेगाना</span>
                                                                            <span class="profile-ud-value"><?= $detail['applicantaddress'] ?></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="profile-ud-item">
                                                                        <div class="profile-ud wider">
                                                                            <span class="profile-ud-label">निवेदकको सम्पर्क</span>
                                                                            <span class="profile-ud-value"><?= $detail['applicantphone'] ?></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="profile-ud-item">
                                                                        <div class="profile-ud wider">
                                                                            <span class="profile-ud-label">समूह दर्ता मिति</span>
                                                                            <span class="profile-ud-value"><?= $detail['orgregdate'] ?></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="profile-ud-item">
                                                                        <div class="profile-ud wider">
                                                                            <span class="profile-ud-label">समूह संचालन स्थिति</span>
                                                                            <span class="profile-ud-value"><?php
                                                                            $status = $detail['orgstatus'];
                                                                            $statusText = $status == 1 ? 'सक्रिय' : 'निस्कृय';
                                                                            $statusColor = $status == 1 ? 'green' : 'red';
                                                                            ?>
                                                                            <button style="background-color: <?php echo $statusColor; ?>; color: white; border: none; padding: 5px 10px; border-radius: 5px;">
                                                                                <?php echo $statusText; ?>
                                                                            </button></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="profile-ud-item">
                                                                        <div class="profile-ud wider">
                                                                            <span class="profile-ud-label">अन्तिम नविकरण मिति</span>
                                                                            <span class="profile-ud-value"><?= $detail['renewdate'] ?></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="profile-ud-item">
                                                                        <div class="profile-ud wider">
                                                                            <span class="profile-ud-label">नविकरण वहाल रहने मिति</span>
                                                                            <span class="profile-ud-value"><?= $detail['expirydate'] ?></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="profile-ud-item">
                                                                        <div class="profile-ud wider">
                                                                            <span class="profile-ud-label">नविकरण स्थिति</span>
                                                                            <span class="profile-ud-value"><?php
                                                                            $status = $detail['expirystatus'];
                                                                            $statusText = $status == 1 ? 'नविकरण' : 'नविकरण बाँकी';
                                                                            $statusColor = $status == 1 ? 'green' : 'red';
                                                                            ?>
                                                                            <button style="background-color: <?php echo $statusColor; ?>; color: white; border: none; padding: 5px 10px; border-radius: 5px;">
                                                                                <?php echo $statusText; ?>
                                                                            </button></span></span>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="nk-divider divider md"></div>
                                                                <div class="profile-ud-list">
                                                                    <div class="profile-ud-item">
                                                                        <div class="profile-ud wider">
                                                                            <span class="profile-ud-label">दस्ताबेज</span>
                                                                            <span class="profile-ud-value"><a href="<?= base_url('/' . $detail['file_path']) ?>"><em class="icon ni ni-eye"></em><span>View Document</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="profile-ud-item">
                                                                        <div class="profile-ud wider">
                                                                            <span class="profile-ud-label">विधान</span>
                                                                            <span class="profile-ud-value"><a href="<?= base_url('/' . $detail['image_path']) ?>"><em class="icon ni ni-eye"></em><span>View Document</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                    
                                                        </div>
                                                    </div><!-- .nk-block -->
                                                </div><!-- .card-inner -->
                                            </div><!-- .card-content -->
                                        </div><!-- .card-aside-wrap -->
                                    </div><!-- .card -->
                                </div><!-- .nk-block -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content @e -->
            </div>
            <!-- wrap @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->
    
    <!-- JavaScript -->
    
    <script src="<?= base_url('assets/js/libs/datatable-btns.js?ver=3.1.2') ?>"></script>
</body>

</html>