<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Arsiparis</title>
  <link rel="shortcut icon" type="image/png" href="https://bnn.go.id/konten/unggahan/2019/03/bnn-250x250.png" />
  <link rel="stylesheet" href="../backend/css/styles.min.css" />
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
  <!-- Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
       data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    @include('layouts.sidebar')
    <!-- Sidebar End -->
    
    <!-- Main Wrapper -->
    <div class="body-wrapper">
      <!-- Header Start -->
      @include('layouts.header')
      <!-- Header End -->
      
      <div class="container-fluid">
        <!-- Row 1 -->
        <div class="row">
          <div class="col-lg-8 d-flex align-items-stretch">
            <div class="card w-100">
              <div class="card-body">
                <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                  <div class="mb-3 mb-sm-0">
                    <h5 class="card-title fw-semibold">Grafik</h5>
                  </div>
                </div>
                <canvas id="bar-chart-custom-tooltip"></canvas>
              </div>
            </div>
          </div>
          
        </div>
      </div>
    </div>
  </div>


      
  @include('Layouts.js')
</body>
</html>
