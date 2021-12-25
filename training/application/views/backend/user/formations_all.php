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
                       <div class="row card-body col-md-12">
                           <!-- mes scripts commencent -->

                            <div class="col-md-12">
                              <div class="row">
                                <div class="col-md-8">
                                  <!-- contenu -->
                                  <?php include('component/liste_article.php') ?>
                                  <!-- fin contenu -->
                                </div>
                                <div class="col-md-4 text-primary card">
                                  <div class="col-md-12 card-body">
                                    <!-- menunpub -->
                                    <?php include("component/_menuFormation.php") ?>

                                    
                                  </div>



                                  
                                  <!-- fin menu pub -->
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

      function load_country_data2(page)
      {
        $.ajax({
         url:"<?php echo base_url(); ?>user/pagination_access_our_formation/"+page,
         method:"GET",
         dataType:"json",

          beforeSend:function()
          {
            $('.resultat_menus').html('<div id="loading" style="" ></div>');
          },
         success:function(data)
         {
          $('.resultat_menus').html(data.country_table);
          $('#pagination_link').html(data.pagination_link);
         }
        });
      }
       
       load_country_data2(1);

       $(document).on("click", ".pagination li a", function(event){
        event.preventDefault();
        var page = $(this).data("ci-pagination-page");
        load_country_data2(page);
       });


       function load_data(query)
       {
            $.ajax({
             url:"<?php echo base_url(); ?>user/fetch_search_our_formation",
             method:"POST",
             data:{query:query},
              beforeSend:function()
              {
                $('.resultat_menus').html('<div id="loading" style="" ></div>');
              },
              success:function(data){
                $('.resultat_menus').html(data);
              }

            });
        }

       $(document).on('keyup','.search_text',function(event){

            var search = $(this).val();
            if(search != '')
            {
               load_data(search);
               $('#pagination_link2').html('');
            }
            else
            {
               load_country_data2(1);
            }
          
      });



      });
  </script>

</body>

</html>