<!DOCTYPE html>
<html lang="fr">

<head>

   <?php include('_meta.php') ?>

</head>

<body id="page-top">

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
                       <div class="row card-body">
                           <!-- mes scripts commencent -->
                           <div class="col-md-12">
                             <div class="row">
                               <div class="col-md-12">
                                 <button id="start" type="button" class="btn btn-hub pull-right mr-1"> <i class="fa fa-video mr-1"></i> Commencer la conférence</button>
                                 <a href="<?php echo(base_url()) ?>admin/invite">
                                   <i class="fa fa-hand-o-left  mr-1"></i> Retour
                                 </a>
                               </div>
                               <div class="col-md-12 embed-responsive embed-responsive-16by9 mt-2">
                                  <div id="jitsi-container" class="col-md-12 embed-responsive-item"></div>
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
          var button = document.querySelector('#start');
          var container = document.querySelector('#jitsi-container');
          var api = null;
          
          button.addEventListener('click', () => {
              var possible = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
              var stringLength = 30;
          
              function pickRandom() {
              return possible[Math.floor(Math.random() * possible.length)];
              }
          
          var randomString = Array.apply(null, Array(stringLength)).map(pickRandom).join('');
          
              var domain = "meet.jit.si";
              var options = {
                  "roomName": randomString,
                  "parentNode": container,
                  // "width": 600,
                  // "height": 600,
              };
              api = new JitsiMeetExternalAPI(domain, options);
          });
    </script>

</body>

</html>