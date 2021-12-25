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

                            <!-- en tête -->
                            <div class="col-md-12">
                              <div class="row">

                                <form class="col-md-12 col-xs-12" method="post" id="user_form" enctype="multipart/form-data">
                                  <div class="col-md-12">
                                    <div class="row">

                                      <div class="col-md-1">
                                         
                                          <ul class="navbar-nav ml-auto">
                                            <!-- Nav Item - User Information -->
                                            <li class="nav-item dropdown no-arrow">
                                                <a class="nav-link dropdown-toggle" href="javascript:void(0);" id="userDropdown" role="button"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    
                                                    <i class="fas fa-list fa-2x text-gray-300"></i>
                                                </a>
                                                <!-- Dropdown - User Information -->
                                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                                    aria-labelledby="userDropdown">
                                                    <a class="dropdown-item" href="<?php echo(base_url())?>admin/liste_formateur">
                                                        <i class="fas fa-book fa-sm fa-fw mr-2 text-gray-400"></i>
                                                      Fitrage formations
                                                    </a>
                                                    <a class="dropdown-item" href="">
                                                        <i class="fas fa-refresh fa-sm fa-fw mr-2 text-gray-400"></i>
                                                        Actualiser la page
                                                    </a>

                                                    
                                                    
                                                </div>
                                            </li>
                                          </ul>
                                      </div>  

                                      <div class="col-md-5">
                                       <select class="form-control" id="idformation" name="idannee">
                                          <?php 
                                            if ($formations->num_rows() > 0) {
                                              ?>
                                              <option value="">Selectionnez la formation</option>
                                              <?php
                                              foreach ($formations->result_array() as $key) {
                                                ?>
                                                <option value="<?php echo($key['idf']) ?>"><?php echo(substr($key['nom'], 0,35)) ?>...</option>
                                                <?php
                                              }
                                            }
                                            else{

                                              ?>                                
                                              <option value="">Aucune formation n'est diponible</option>
                                              <?php
                                            }
                                          ?>
                                       </select>
                                      </div>

                                      <div class="col-md-5">
                                       <select class="form-control" id="editions" name="formation">
                                          <?php 
                                            if ($editions->num_rows() > 0) {
                                              ?>
                                              <option value="">Selectionnez l'édition pour formation</option>
                                              <?php
                                              foreach ($editions->result_array() as $key) {
                                                ?>
                                                <option value="<?php echo($key['edition']) ?>"><?php echo(substr($key['edition'], 0,35)) ?></option>
                                                <?php
                                              }
                                            }
                                            else{

                                              ?>                                
                                              <option value="">Aucune édition n'est diponible</option>
                                              <?php
                                            }
                                          ?>
                                       </select>
                                      </div>

                                      <div class="col-md-1">

                                        <input type="hidden" name="idf" id="idf" placeholder="idf">
                                        <input type="hidden" name="edition" id="edition" placeholder="edition">

                                        <input type="submit" name="valider" class="btn btn-hub">
                                      </div>
                                      <div class="col-md-12 text-center">
                                       Veillez effectuer une action pour vous permettre de bien visualiser
                                        <hr>
                                      </div>

                                      
                                      
                                    </div>
                                  </div>
                                  
                                </form>


                                
                              </div>
                            </div>
                            <!-- fin en-tete -->

                            <!-- resultat -->
                            <div class="col-md-12 mb-2">
                             <div class="col-md-12 table-responsive" id="country_table">
                              
                               <?php include('component/view_formateur.php') ?>
                             </div>
                            </div>
                            <!-- fin resultat -->

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
   

    var chart = new CanvasJS.Chart("chartContainer2", {
        theme: "theme2",
        animationEnabled: true,
        title: {
            text: ""
        },
        data: [
        {
            type: "pie",        
            dataPoints: [<?php echo $chart_data; ?>]
        }
        ]
    });
    chart.render();

 </script>

   <script type="text/javascript">
     $(document).ready(function($) {
          $(document).on('submit', '#user_form', function(event){  
               event.preventDefault();  
               
               var idf          = $('#idf').val();
               var edition        = $('#edition').val();
               
              

                if(idf != '' && edition != '')
                {

                     filtrage_impression(idf, edition);

                }
                else
                {
                  var erreur = "Tous les champs doivent être remplis";
                  showErrrorMessage(erreur);
                }
 
          });

          $("#editions").on("change", function() {

            var edition = $(this).val();
                if (edition !='') {
                  $('#edition').val(edition);
                }
                else{

                  $('#edition').val("");

                  showErrrorMessage("Erreur lors de l'opération!!! Veillez selectionner l'édition 😰");
                }
          });

          $("#idformation").on("change", function() {

            var idf = $(this).val();
                if (idf !='') {
                  $('#idf').val(idf);
                }
                else{

                  $('#idf').val("");

                  showErrrorMessage("Erreur lors de l'opération!!! Veillez selectionner la formation 😰");
                }
          });




        const showErrrorMessage = function(erreur) {
          swal("Oups!!!", erreur, "info");
        };

        const showSuccessMessage = function(message) {
          swal("Succès!!!", message, "success");
        };



          function filtrage_impression(idf, edition){
            $.ajax({
               url:"<?php echo base_url(); ?>admin/pagination_view_formateur_pdf",
               method:"GET",
               data:{
                idf: idf,
                edition: edition 
              },
              beforeSend:function()
              {
                $('#country_table').html('<div class="col-md-12 post_data"><p><span class="content-placeholder" style="width:100%; height: 30px;">&nbsp;</span></p><p><span class="content-placeholder" style="width:100%; height: 100px;">&nbsp;</span></p></div>');
              },
              success:function(data)
              {
                $('#country_table').html(data);
                generate_token();
              }

            });
          }


         
     });
   </script>




</body>

</html>