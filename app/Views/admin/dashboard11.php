<body>
    <!-- Include Header -->
    <?php include('templates\header.php'); ?>

    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Include Navbar -->
            <?php include('templates\sidenav.php'); ?>

            <!-- Content wrapper -->
            <div class="content-wrapper">
                <!-- Content -->
                <div class="container-xxl flex-grow-1 container-p-y">
                    <!-- Page content goes here -->
                </div>
                <!-- / Content -->

                <!-- Include Footer -->
                <?php include('templates\footer.php'); ?>
            </div>
            <!-- / Content wrapper -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>

        <!-- Drag Target Area To SlideIn Menu On Small Screens -->
        <div class="drag-target"></div>
    </div>
    <!-- / Layout wrapper -->
</body>

