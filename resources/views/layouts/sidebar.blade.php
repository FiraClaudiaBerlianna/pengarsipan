<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arsiparis</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .left-sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #f8f9fa; /* Light background */
            border-right: 1px solid #ddd;
        }

        .brand-logo {
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        }

        .nav-small-cap {
            font-size: 12px;
            font-weight: bold;
            letter-spacing: 0.5px;
            text-transform: uppercase;
        }

        .sidebar-item a {
            transition: all 0.3s ease;
            text-decoration: none; /* Hilangkan garis bawah */
        }

        /* Hover effect untuk sidebar menu */
        .sidebar-item a:hover {
            background-color: #d1e7ff; /* Soft blue background */
            color: #0d6efd !important; /* Blue text */
            box-shadow: 0 4px 8px rgba(13, 110, 253, 0.5); /* Blue shadow */
        }

        .hover-bg-primary:hover {
            background-color: #e9f2ff !important; /* Soft blue hover */
        }

        .sidebar-item a i {
            transition: all 0.3s ease;
        }

        .sidebar-item a:hover i {
            color: #0d6efd; /* Highlighted icon */
        }

        .scroll-sidebar {
            overflow-y: auto;
            height: calc(100vh - 70px); /* Adjust for brand height */
        }

        .close-btn {
            cursor: pointer;
        }

        .text-primary {
            color: #0d6efd !important; /* Consistent primary blue */
        }
    </style>
</head>
<body>

    <aside class="left-sidebar bg-light shadow-sm">
        <!-- Sidebar scroll-->
        <div>
            <!-- Brand Logo -->
            <div class="brand-logo d-flex align-items-center justify-content-between py-3">
                <a href="#" class="text-nowrap logo-img">
                    <img src="https://bnn.go.id/konten/unggahan/2019/03/bnn-250x250.png" width="60" alt="Logo" />
                </a>
                <div>
                    <div class="text-dark mx-3 fw-semibold fs-5">Arsiparis</div>
                    <div class="text-muted mx-3 fs-6">BNNK Ciamis</div> <!-- Teks tambahan -->
                </div>
                <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                    <i class="ti ti-x fs-8"></i>
                </div>
            </div>

            <!-- Sidebar Navigation -->
            <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
                <ul id="sidebarnav" class="list-unstyled">
                    <!-- Home Section -->
                    <li class="nav-small-cap">
                        <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                        <span class="hide-menu text-muted">HOME</span>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="#" aria-expanded="false">
                            <span>
                                <i class="ti ti-layout-dashboard"></i>
                            </span>
                            <span class="hide-menu">Dashboard</span>
                        </a>
                    </li>

                    <!-- Surat Section -->
                    <li class="nav-small-cap">
                        <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                        <span class="hide-menu text-muted">SURAT</span>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('surat_masuk.index') }}" aria-expanded="false">
                            <span>
                                <i class="ti ti-mail"></i>
                            </span>
                            <span class="hide-menu">Surat Masuk</span>
                        </a>
                    </li>

                    <!-- Menambahkan Surat Keluar dengan margin -->
                    <li class="sidebar-item mt-3">
                        <a class="sidebar-link" href="{{ route('surat_keluar.index') }}" aria-expanded="false">
                            <span>
                                <i class="ti ti-mail-opened"></i>
                            </span>
                            <span class="hide-menu">Surat Keluar</span>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- End Sidebar Navigation -->
        </div>
        <!-- End Sidebar Scroll-->
    </aside>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
