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
                          

                        
                          <!-- insertion de tableau -->
                          <div class="col-md-12">
                            <div class="table-responsive" id="country_table">
                                <table class="table-striped  nk-tb-list nk-tb-ulist dataTable no-footer" data-auto-responsive="false" id="user_data" role="grid" aria-describedby="DataTables_Table_1_info">
                                    <thead class="tb-member-head thead-light">  
                                        <tr> 
                                            <th width="10%">Avatar</th> 
                                            <th width="20%">Nom de la vidéo</th>  
                                            <th width="20%">Description </th> 
                                            <th width="10%">Catégorie </th> 
                                            <th width="10%">Type </th>  
                                            <th width="20%">Mise à jour</th>
                                              
                                        </tr>  
                                   </thead> 

                                   <tbody>
                                     
                                   </tbody>

                                   <tfoot>  
                                        <tr>  
                                            <th width="10%">Avatar</th> 
                                            <th width="20%">Nom de la vidéo</th>  
                                            <th width="20%">Description </th> 
                                            <th width="10%">Catégorie </th> 
                                            <th width="10%">Type </th>  
                                            <th width="20%">Mise à jour</th>
                                             
                                        </tr>  
                                   </tfoot>   
                                    
                                </table>
                            </div>
                          </div>
                          <!-- fin insertion tableau -->
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

    <script type="text/javascript" language="javascript" >  
     $(document).ready(function(){  

          

        const showErrrorMessage = function(erreur) {
          swal("Oups!!!", erreur, "info");
        };

        const showSuccessMessage = function(message) {
          swal("Succès!!!", message, "success");
        };





          function load_country_data()
          {
            $.ajax({
             url:"<?php echo base_url(); ?>user/pagination_view_coach_limit",
             method:"GET",

              beforeSend:function()
              {
                $('#country_table').html('<div class="col-md-12 post_data"><p><span class="content-placeholder" style="width:100%; height: 30px;">&nbsp;</span></p><p><span class="content-placeholder" style="width:100%; height: 100px;">&nbsp;</span></p></div>');
              },
             success:function(data)
             {
              $('#country_table').html(data);
             }
            });
          }

        

        load_country_data();


        




        






     });  
     </script>


    

  



</body>

</html>