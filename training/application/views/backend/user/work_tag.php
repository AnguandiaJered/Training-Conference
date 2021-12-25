<!DOCTYPE html>
<html lang="fr">

<head>

   <?php include('_meta.php') ?>

</head>

<body id="page-top" onload="showDate();">

    <!-- Page Wrapper -->
    <div id="wrapper">

      <?php include('_navigation.php') ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include('_menuheader.php') ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid mb-4">

                   <div class="col-md-12 card">
                       <div class="row card-body col-md-12">
                           <!-- mes scripts commencent -->

                            <div class="col-md-12">
                              <div class="row">
                                <div class="col-md-12">
                                  <!-- contenu -->
                                  <?php include('component/detail_travail.php') ?>
                                  <!-- fin contenu -->
                                </div>
                                
                              </div>
                            </div>
                          
                           <!-- fin de mes scripts commencent -->
                       </div>
                   </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include('_footer.php') ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

   
   <?php include('_script.php') ?>

    <script type="text/javascript">
      $(document).ready(function() {
          
          /*
          FIN SCRIPT PARTAGE DE BUTTON RESEAUX SOCIAUX
      */

      });
  </script>

  <script type="text/javascript"> 
     function refresh(){
         var t = 1000; // rafraîchissement en millisecondes
         setTimeout('showDate()',t)
     }
     
     function showDate() {
         var date = new Date()
         var h = date.getHours();
         var m = date.getMinutes();
         var s = date.getSeconds();
         if( h < 10 ){ h = '0' + h; }
         if( m < 10 ){ m = '0' + m; }
         if( s < 10 ){ s = '0' + s; }
         var time = h + ':' + m + ':' + s
         document.getElementById('horloge').innerHTML = time;
         refresh();
      }
  </script>

</body>

</html>