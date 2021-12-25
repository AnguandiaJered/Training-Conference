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
                           <?php include("component/_evaluation.php") ?>
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
    var chart = new CanvasJS.Chart("chartContainer", {
          theme: "theme2",
          animationEnabled: true,
          title: {
              text: ""
          },
          data: [
            {
                type: "column",
                showInLegend: true,
                  legendText: "{indexLabel}",                
                dataPoints: [<?php echo $chart_data; ?>]
            }
          ]
      });
      chart.render();

       var chart2 = new CanvasJS.Chart("chartContainer2", {
          theme: "theme2",
          animationEnabled: true,
          title: {
              text: ""
          },
          data: [
            {
                type: "area",
                showInLegend: true,
                  legendText: "{indexLabel}",                
                dataPoints: [<?php echo $chart_data; ?>]
            }
          ]
      });
      chart2.render();

  </script>

  <script type="text/javascript">
    $(document).ready(function() {

       $(document).on('click', '.btn_envoyer', function(event) {
          event.preventDefault();
          /* Act on the event */
          var jour1 = $('#jour1').val();
          var jour2 = $('#jour2').val();
          if (jour1 !='' && jour2 !='') {
            $.ajax({
              url: '<?php echo(base_url()); ?>admin/fetch_datebetwine_paiement_filtre',
              type: 'POST',
              data: {
                jour1: jour1,
                jour2: jour2,
              },
              beforeSend:function()
              {
                 $('.my_table').html('<div id="loading" style="" ></div>');
              },
              success: (data)=>{
                $('.my_table').html(data);
              }
            });

          }
          else{
            swal("erreur!!!", "veillez completer les dates", "error");
          }
        });

        $(document).on('change', '#limit', function(event) {
          event.preventDefault();
          /* Act on the event */
          var limit = $(this).val();
          if (limit !='') {
            $.ajax({
              url: '<?php echo base_url(); ?>admin/fetch_limit_view_paiements',
              type: 'POST',
              data: {limit: limit},
              beforeSend:function()
              {
                 $('.my_table').html('<div id="loading" style="" ></div>');
              },
              success: (data)=>{
                $('.my_table').html(data);
              }
            });
          }
          else{
            swal("erreur!!!", "veillez selectionner un filtre", "error");
          }
          
          
          
        });
      
    });
  </script>


</body>

</html>