<!DOCTYPE html>

<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-admin-path="../assets-admin/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>BUMN Muda</title>

    <meta name="description" content="" />
    <link rel="stylesheet" href="/assets-admin/vendor-admin/fonts/boxicons.css" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="/assets-admin/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    {{-- <link rel="stylesheet" href="/assets-admin/vendor-admin/fonts/boxicons.css" /> --}}

    <!-- Core CSS -->
    <link rel="stylesheet" href="/assets-admin/vendor-admin/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="/assets-admin/vendor-admin/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="/assets-admin/css/demo.css" />

    <!-- Vendor-admins CSS -->
    <link rel="stylesheet" href="/assets-admin/vendor-admin/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <link rel="stylesheet" href="/assets-admin/vendor-admin/libs/apex-charts/apex-charts.css" />

 

    <!-- Helpers -->
    <script src="/assets-admin/vendor-admin/js/helpers.js"></script>

    {{-- jquery --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <link rel="stylesheet" href="/minified/themes/default.min.css" />


    <script src="https://cdn.jsdelivr.net/npm/sceditor@3/minified/formats/xhtml.min.js"></script>



      {{-- datatable --}}
      <link rel="stylesheet" href="https://cdn.datatables.net/2.0.2/css/dataTables.dataTables.css" />
      <script src="https://cdn.datatables.net/2.0.2/js/dataTables.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="/assets-admin/js/config.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>

  <body>
    <div id="pageLoader" class="page-loader" style="inset: 0; background-color: #ddd;display:flex;justify-content: center;align-items: center; position:fixed;z-index: 9999;">
      <!-- <img src="/image/logo 1.png" alt=""> -->
      <div class="spinner-border  spinner-border-lg text-warning" role="status">
                          <span class="visually-hidden">Loading...</span>
                        </div>
    </div>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">

        @include('admin.component.sidebar')

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

            @include('admin.component.navbar')

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            @yield('content')
            <!-- / Content -->
        
            <!-- Footer -->
            {{-- <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                <div class="mb-2 mb-md-0">
                  ©
                  <script>
                    document.write(new Date().getFullYear());
                  </script>
                  , made with ❤️ by
                  <a href="https://themeselection.com" target="_blank" class="footer-link fw-bolder">ThemeSelection</a>
                </div>
                <div>
                  <a href="https://themeselection.com/license/" class="footer-link me-4" target="_blank">License</a>
                  <a href="https://themeselection.com/" target="_blank" class="footer-link me-4">More Themes</a>

                  <a
                    href="https://themeselection.com/demo/sneat-bootstrap-html-admin-template/documentation/"
                    target="_blank"
                    class="footer-link me-4"
                    >Documentation</a
                  >

                  <a
                    href="https://github.com/themeselection/sneat-html-admin-template-free/issues"
                    target="_blank"
                    class="footer-link me-4"
                    >Support</a
                  >
                </div>
              </div>
            </footer> --}}
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->


    <script>
          function rupiah(e){
      e.value = formatRupiah(e.value);
    }
      /* Fungsi */
function formatRupiah(angka, prefix)
{
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
        split    = number_string.split(','),
        sisa     = split[0].length % 3,
        rupiah     = split[0].substr(0, sisa),
        ribuan     = split[0].substr(sisa).match(/\d{3}/gi);
        
    if (ribuan) {
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
    }
    
    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
}
    </script>

    <!-- Core JS -->
    <!-- build:js assets-admin/vendor-admin/js/core.js -->
    <script src="/assets-admin/vendor-admin/libs/jquery/jquery.js"></script>
    <script src="/assets-admin/vendor-admin/libs/popper/popper.js"></script>
    <script src="/assets-admin/vendor-admin/js/bootstrap.js"></script>
    <script src="/assets-admin/vendor-admin/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="/assets-admin/vendor-admin/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendor-admins JS -->
    <script src="/assets-admin/vendor-admin/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="/assets-admin/js/main.js"></script>

    <!-- Page JS -->
    <script src="/assets-admin/js/dashboards-analytics.js"></script>

    <script src="/minified/sceditor.min.js"></script>
    <script src="/minified/formats/bbcode.js"></script>
    <script src="/minified/formats/xhtml.js"></script>
  
    <script>
var textarea = document.querySelectorAll("#mytextarea");

textarea.forEach(element => {
  sceditor.create(element, {
	format: 'xhtml',
  emoticons : {
    hidden: {
        ':aliasforalien:': 'emoticons/alien.png',
        ':aliasforblink:': 'emoticons/blink.png'
    }
  },
	style: 'minified/themes/content/default.min.css'
});
});

      </script>
  <script type="text/javascript">
       
    $(document).ready(function(){
        // $("#pageLoader").fadeOut();
        $("#pageLoader").fadeOut("slow");
        // $("#pageLoader").fadeOut(3000);
    
    });
    
    </script>
    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
