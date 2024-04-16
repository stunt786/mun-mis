<!DOCTYPE html>
<html lang="en" class="js">

<head>
    
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
                                            <a href="<?php echo base_url('bewosaye-list'); ?>" class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em class="icon ni ni-arrow-left"></em><span>Back</span></a>
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
                                                            <h5 class="title">खा.पा.उ.स. विवरण</h5>
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
                                                                            <span class="profile-ud-value"><?= $detail['cert_no'] ?></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="profile-ud-item">
                                                                        <div class="profile-ud wider">
                                                                            <span class="profile-ud-label">आर्थिक वर्ष</span>
                                                                            <span class="profile-ud-value"><?= $detail['fiscal_year'] ?></span>
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
                                                                            <span class="profile-ud-value"><?= $detail['org_ward_id'] ?></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="profile-ud-item">
                                                                        <div class="profile-ud wider">
                                                                            <span class="profile-ud-label">खा.पा.उ.सको नाम</span>
                                                                            <span class="profile-ud-value"><?= $detail['org_name'] ?></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="profile-ud-item">
                                                                        <div class="profile-ud wider">
                                                                            <span class="profile-ud-label">स्थापना मिति</span>
                                                                            <span class="profile-ud-value"><?= $detail['org_established_nep_date'] ?></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="profile-ud-item">
                                                                        <div class="profile-ud wider">
                                                                            <span class="profile-ud-label">ठेगाना/टोल</span>
                                                                            <span class="profile-ud-value"><?= $detail['org_road_name'] ?></span>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="profile-ud-item">
                                                                        <div class="profile-ud wider">
                                                                            <span class="profile-ud-label">सम्पर्क नं</span>
                                                                            <span class="profile-ud-value"><?= $detail['org_phone'] ?></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="profile-ud-item">
                                                                        <div class="profile-ud wider">
                                                                            <span class="profile-ud-label">इमेल</span>
                                                                            <span class="profile-ud-value"><?= $detail['org_email'] ?></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="profile-ud-item">
                                                                        <div class="profile-ud wider">
                                                                            <span class="profile-ud-label">पान नम्बर (PAN)</span>
                                                                            <span class="profile-ud-value"><?= $detail['org_pan'] ?></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="profile-ud-item">
                                                                        <div class="profile-ud wider">
                                                                            <span class="profile-ud-label">सेवाको किसिम</span>
                                                                            <span class="profile-ud-value"><?= $detail['org_type'] ?></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="profile-ud-item">
                                                                        <div class="profile-ud wider">
                                                                            <span class="profile-ud-label">मुख्य कार्य विवरण</span>
                                                                            <span class="profile-ud-value"><?= $detail['org_type_description'] ?></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="profile-ud-item">
                                                                        <div class="profile-ud wider">
                                                                            <span class="profile-ud-label">सेवाबाट लाभान्वित हुने उ.भो संख्या</span>
                                                                            <span class="profile-ud-value"><?= $detail['org_members'] ?></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="profile-ud-item">
                                                                        <div class="profile-ud wider">
                                                                            <span class="profile-ud-label">सेवा पुर्याउने क्षेत्र</span>
                                                                            <span class="profile-ud-value"><?= $detail['org_tole'] ?></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="profile-ud-item">
                                                                        <div class="profile-ud wider">
                                                                            <span class="profile-ud-label">उ.सं.ले उपयोग गर्न चाहेको जलस्रोतको परिमाण (लि./दिन)</span>
                                                                            <span class="profile-ud-value"><?= $detail['org_capacity'] ?></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="profile-ud-item">
                                                                        <div class="profile-ud wider">
                                                                            <span class="profile-ud-label">जलश्रोत समिति निर्णय मिति</span>
                                                                            <span class="profile-ud-value"><?= $detail['review_date'] ?></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="profile-ud-item">
                                                                        <div class="profile-ud wider">
                                                                            <span class="profile-ud-label">जलस्रोतको नाम (चार किल्ला सहित ) भएको ठाउँ</span>
                                                                            <span class="profile-ud-value"><?= $detail['org_resource_name'] ?></span>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    
                                                        </div>
                                                        
                                                    
                                                    <div class="nk-divider divider md"></div>
                                                        <div class="profile-ud-list">
                                                                    <div class="profile-ud-item">
                                                                        <div class="profile-ud wider">
                                                                            <span class="profile-ud-label">जलश्रोतबाट गरिने प्रयोग</span>
                                                                            <span class="profile-ud-value"><?= $detail['org_use'] ?></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="profile-ud-item">
                                                                        <div class="profile-ud wider">
                                                                            <span class="profile-ud-label">भविष्यमा सेवा विस्तार गर्न सक्ने सम्भावना</span>
                                                                            <span class="profile-ud-value"><?= $detail['org_future'] ?></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="profile-ud-item">
                                                                        <div class="profile-ud wider">
                                                                            <span class="profile-ud-label">खा.पा समिति अध्यक्षको नाम</span>
                                                                            <span class="profile-ud-value"><?= $detail['chief_officer'] ?></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="profile-ud-item">
                                                                        <div class="profile-ud wider">
                                                                            <span class="profile-ud-label">खा.पा समिति अध्यक्षको पद</span>
                                                                            <span class="profile-ud-value"><?= $detail['chief_officer_job'] ?></span>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                </div>

                                                                <div class="nk-divider divider md"></div>
                                                        <div class="profile-ud-list">
                                                                    <div class="profile-ud-item">
                                                                        <div class="profile-ud wider">
                                                                            <span class="profile-ud-label">निवेदकको नाम</span>
                                                                            <span class="profile-ud-value"><?= $detail['applicant_name'] ?></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="profile-ud-item">
                                                                        <div class="profile-ud wider">
                                                                            <span class="profile-ud-label">निवेदकको ठेगाना</span>
                                                                            <span class="profile-ud-value"><?= $detail['applicant_address'] ?></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="profile-ud-item">
                                                                        <div class="profile-ud wider">
                                                                            <span class="profile-ud-label">निवेदकको सम्पर्क</span>
                                                                            <span class="profile-ud-value"><?= $detail['applicant_phone'] ?></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="profile-ud-item">
                                                                        <div class="profile-ud wider">
                                                                            <span class="profile-ud-label">खा.पा.उ.स दर्ता मिति</span>
                                                                            <span class="profile-ud-value"><?= $detail['org_reg_date'] ?></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="profile-ud-item">
                                                                        <div class="profile-ud wider">
                                                                            <span class="profile-ud-label">खा.पा.उ.स संचालन स्थिति</span>
                                                                            <span class="profile-ud-value"><?php
                                                                            $status = $detail['status'];
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
                                                                            <span class="profile-ud-label">नविकरण मिति</span>
                                                                            <span class="profile-ud-value"><?= $detail['renew_date'] ?></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="profile-ud-item">
                                                                        <div class="profile-ud wider">
                                                                            <span class="profile-ud-label">नविकरण वहाल रहने मिति</span>
                                                                            <span class="profile-ud-value"><?= $detail['expiry_date'] ?></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="profile-ud-item">
                                                                        <div class="profile-ud wider">
                                                                            <span class="profile-ud-label">नविकरण स्थिति</span>
                                                                            <span class="profile-ud-value"><?php
                                                                            $status = $detail['expiry_status'];
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
                                                                            <span class="profile-ud-label">कागजात</span>
                                                                            <span class="profile-ud-value"><a href="<?= base_url('/' . $detail['file_path']) ?>"><em class="icon ni ni-eye"></em><span>View Document</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="profile-ud-item">
                                                                        <div class="profile-ud wider">
                                                                            <span class="profile-ud-label">थप कागजात</span>
                                                                            <span class="profile-ud-value"><a href="<?= base_url('/' . $detail['image_path']) ?>"><em class="icon ni ni-eye"></em><span>View Image</span>
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