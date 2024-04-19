
<!DOCTYPE html>
<html lang="en" class="js">

<head>
<base href="">
    <meta charset="utf-8">
    <meta name="MUN" content="mis">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Digital Nepal, Digital Palika.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="<?= base_url('images/favicon.png') ?>">
    <!-- Page Title  -->
    <title><?= $title ?></title>
     


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
                                <div class="nk-block">
                                    <div class="card card-bordered">
                                        <div class="card-aside-wrap">

                                                 <!-- Edit Section for card-inner-->
                                                 <div id="jan" class="card-inner card-inner-lg page-section" >
                                                <div class="nk-block-head nk-block-head-lg">
                                                    <div class="nk-block-between">
                                                        <div class="nk-block-head-content">
                                                            <h5 class="title fw-medium" id="monthTitle"></h5>
                                                        </div><!-- .nk-block-head-content -->
                                                        <div class="nk-block-head-content align-self-start d-lg-none">
                                                            <a href="#" class="toggle btn btn-icon btn-trigger mt-n1" data-target="userAside"><em class="icon ni ni-menu-alt-r"></em></a>
                                                        </div>
                                                    </div><!-- .nk-block-between -->
                                                </div><!-- .nk-block-head -->
                                                <div class="nk-block">
                                                <?php echo form_open('edu/saveData', ['method' => 'POST', 'class' => 'form-settings gy-3', 'enctype' => 'multipart/form-data']); ?>
                                                <?php $row = !empty($edumonthly) ? $edumonthly : null; ?>
                                                <?php var_dump($row); ?>
                                                <div class="row g-3 align-center">
                                                            <div class="col-lg-5">
                                                                <div class="form-group">
                                                                    <label class="form-label" for="site-name">Assessment</label>
                                                                    <span class="form-note">assessment</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-7">
                                                                <div class="form-group">
                                                                    <div class="form-control-wrap">
                                                                        <input type="text" class="form-control" id="assessment" name="assessment" value="<?= $row ? esc($row['assessment']) : '' ?>" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row g-3 align-center">
                                                            <div class="col-lg-5">
                                                                <div class="form-group">
                                                                    <label class="form-label" for="username">Progress Summary</label>
                                                                    <span class="form-note">progress summary</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-7">
                                                                <div class="form-group">
                                                                    <div class="form-control-wrap">
                                                                    <textarea class="form-control" id="remarks" name="remarks" rows="4"><?= $row ? esc($row['remarks']) : '' ?></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row g-3 align-center">
                                                            <div class="col-lg-5">
                                                                <div class="form-group">
                                                                    <label class="form-label" for="phone">Document</label>
                                                                    <span class="form-note">document file</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-7">
                                                                <div class="form-group">
                                                                    <div class="form-control-wrap">
                                                                    <label class="form-file-label" for="img_type">Choose Image</label>
                                                                    <input type="file" multiple class="form-file-input" name="image" accept=".jpg,.png,.jpeg,.pdf,.doc,.docx,.xls,.xlsx,.odt,.ods" id="formAdmin-Image">
                                                                    <p>Already uploaded document: <a id="fileLink" href="#" style="display:none;">View</a></p>  <!-- Ensure this link is correct -->
                                                                </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row g-3 align-center">
                                                            <div class="col-lg-5">
                                                                <div class="form-group">
                                                                    <label class="form-label" for="site-copyright">Remarks</label>
                                                                    <span class="form-note">remarks</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-7">
                                                                <div class="form-group">
                                                                    <div class="form-control-wrap">
                                                                        <input type="text" class="form-control" id="remarks" name="remarks" value="<?= $row ? esc($row['remarks']) : '' ?>" >
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-7">
                                                                <div class="form-group">
                                                                    <div class="form-control-wrap">
                                                                        <input type="text" class="form-control" id="selectedMonth" name="month" value="<?= esc($selectedMonth) ?>" required hidden>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row g-3">
                                                            <div class="col-lg-7">
                                                                <div class="form-group mt-2">
                                                                    <button type="submit" class="btn btn-lg btn-primary">UPDATE</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div><!-- .nk-block-head -->
                                            </div><!-- .card-inner -->
                                            <?php echo form_close(); ?>
                            

                                            <div class="card-aside card-aside-left user-aside toggle-slide toggle-slide-left toggle-break-lg" data-content="userAside" data-toggle-screen="lg" data-toggle-overlay="true">
                                                <div class="card-inner-group" data-simplebar>
                                                <div class="card-inner">
                                                        <div class="user-card">
                                                            
                                                            <div class="user-info">
                                                                <span class="lead-text">All Months</span>
                                                                <span class="sub-text">Month wise report</span>
                                                            </div>
                                                        </div><!-- .user-card -->
                                                    </div><!-- .card-inner -->
                                                    <div class="card-inner p-0">
                                                        <ul class="link-list-menu">
                                                            <li><a href="#january" class="month-tab" data-month="January"><em class="icon ni ni-calendar-alt-fill"></em><span>January</span></a></li>
                                                            <li><a href="#february" class="month-tab" data-month="February"><em class="icon ni ni-calendar-alt-fill"></em><span>February</span></a></li>
                                                            <li><a href="#march" class="month-tab" data-month="March"><em class="icon ni ni-calendar-alt-fill"></em><span>March</span></a></li>
                                                            <li><a href="#april" class="month-tab" data-month="April"><em class="icon ni ni-calendar-alt-fill"></em><span>April</span></a></li>
                                                            <li><a href="#may" class="month-tab" data-month="May"><em class="icon ni ni-calendar-alt-fill"></em><span>May</span></a></li>
                                                            <li><a href="#june" class="month-tab" data-month="June"><em class="icon ni ni-calendar-alt-fill"></em><span>June</span></a></li>
                                                            <li><a href="#july" class="month-tab" data-month="July"><em class="icon ni ni-calendar-alt-fill"></em><span>July</span></a></li>
                                                            <li><a href="#august" class="month-tab" data-month="August"><em class="icon ni ni-calendar-alt-fill"></em><span>August</span></a></li>
                                                            <li><a href="#september" class="month-tab" data-month="September"><em class="icon ni ni-calendar-alt-fill"></em><span>September</span></a></li>
                                                            <li><a href="#october" class="month-tab" data-month="October"><em class="icon ni ni-calendar-alt-fill"></em><span>October</span></a></li>
                                                            <li><a href="#november" class="month-tab" data-month="November"><em class="icon ni ni-calendar-alt-fill"></em><span>November</span></a></li>
                                                            <li><a href="#december" class="month-tab" data-month="December"><em class="icon ni ni-calendar-alt-fill"></em><span>December</span></a></li>
                                                            
                                                        </ul>
                                                    </div><!-- .card-inner -->
                                                </div><!-- .card-inner-group -->
                                            </div><!-- card-aside -->
                                        </div><!-- card-aside-wrap -->
                                    </div><!-- .card -->
                                </div><!-- .nk-block -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content @e -->

    
                <script src="./assets/js/jquery.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
    const monthTabs = document.querySelectorAll('.month-tab');
    const form = document.getElementById('monthlyForm');

    monthTabs.forEach(tab => {
        tab.addEventListener('click', function(event) {
            event.preventDefault();
            const month = this.dataset.month;
            updateMonthTitle(month);
            fetchMonthData(month);
        });
    });

    function fetchMonthData(month) {
        fetch(`/edu-monthly/getMonthData?month=${month}`)
            .then(response => {
                if (!response.ok) throw new Error('Failed to fetch data: ' + response.statusText);
                return response.json();
            })
            .then(data => {
                if (!data || Object.keys(data).length === 0) {  // Check if data is empty
                    resetFormFields();  // Reset form fields if no data is returned
                    alert('No data available for this month.');
                } else {
                    populateFormFields(data);
                }
            })
            .catch(error => {
                console.error('Error in fetching data:', error);
                resetFormFields();  // Reset form fields also on fetch error
                alert('Failed to retrieve data. Please try again.');
            });
    }

    function populateFormFields(data) {
        document.getElementById('assessment').value = data.assessment || ''; 
        document.getElementById('progress_summary').value = data.progress_summary || '';
        document.getElementById('remarks').value = data.remarks || '';
        // Update other form fields as necessary

        const fileLink = document.getElementById('fileLink');  // Assuming you have a <a> tag with this ID for displaying the link
    if (data.file_path && fileLink) {
        fileLink.href = `/proguploads/${data.file_path}`;
        fileLink.textContent = 'View Document';  // Change the link text accordingly
        fileLink.style.display = 'inline';  // Make sure the link is visible
    } else if (fileLink) {
        fileLink.href = '#';
        fileLink.textContent = 'No document uploaded';
        fileLink.style.display = 'none';  // Optionally hide the link if no document is available
    }
    }

    function resetFormFields() {
        document.getElementById('assessment').value = ''; 
        document.getElementById('progress_summary').value = '';
        document.getElementById('remarks').value = '';
        // Reset other form fields as necessary
    }

    function updateMonthTitle(month) {
        const monthTitle = document.getElementById('monthTitle');
        monthTitle.textContent = `Record for - ${month}`;
    }
});

</script>

</body>       
</html>