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
                                                    <a class="dropdown-item" href="<?php echo(base_url())?>admin/liste_formation">
                                                        <i class="fas fa-book fa-sm fa-fw mr-2 text-gray-400"></i>
                                                      Liste de formations
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
                                       <select class="form-control" id="idannee" name="formation">
                                          <?php 
                                            if ($annees->num_rows() > 0) {
                                              ?>
                                              <option value="">Selectionnez l'année de a formation</option>
                                              <?php
                                              foreach ($annees->result_array() as $key) {
                                                ?>
                                                <option value="<?php echo($key['annee']) ?>"><?php echo(substr($key['annee'], 0,35)) ?></option>
                                                <?php
                                              }
                                            }
                                            else{

                                              ?>                                
                                              <option value="">Aucun article n'est diponible</option>
                                              <?php
                                            }
                                          ?>
                                       </select>
                                      </div>

                                      <div class="col-md-1">

                                        <input type="hidden" name="idf" id="idf" placeholder="idf">
                                        <input type="hidden" name="annee" id="annee" placeholder="annee">

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
                              
                               <?php include('component/view_entree.php') ?>
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


    <div class="modal fade" id="userModal3">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header bg-hub text-white">
                       <div class="modal-title">information personnele aux termes de contrat</div> 
                    </div>
                    
                  

                    <div class="modal-body">
                        <div class="col-md-12">
                            <div class="row">

                                
                             <form method="POST" id="user_form2" class="col-md-12">

                             <div class="col-md-12">
                                    <div class="row">

                                      
                                        
                                       <div class="col-md-12">
                                          <label><i class="fa fa-envelope"></i>Entrez le message Message</label>
                                          <textarea class="form-control textarea" id="message1" name="message" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" placeholder="Quoi de news?">
                                            
                                          </textarea>
                                         
                                       </div>

                                    </div>
                                </div>
                                

                                
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer bg-white">

                        <button type="submit" class="btn btn-hub" name="valider" id="envoyer_message">
                            <i class="fa fa-send"></i> Envoyer
                        </button>
                        <a href="javascript:void(0);" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> fermer</a>
                    </div> 
                    </form>
                    
                </div>
            </div>
        </div>

   
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
            type: "pie",                
            dataPoints: [<?php echo $chart_data; ?>]
        }
        ]
    });
    chart.render();

    var chart = new CanvasJS.Chart("chartContainer2", {
        theme: "theme2",
        animationEnabled: true,
        title: {
            text: ""
        },
        data: [
        {
            type: "column",                
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
               var annee        = $('#annee').val();
               
              

                if(idf != '' && annee != '')
                {

                     filtrage_impression(idf, annee);

                }
                else
                {
                  var erreur = "Tous les champs doivent être remplis";
                  showErrrorMessage(erreur);
                }
 
          });

          $("#idannee").on("change", function() {

            var annee = $(this).val();
                if (annee !='') {
                  $('#annee').val(annee);
                }
                else{

                  $('#annee').val("");

                  showErrrorMessage("Erreur lors de l'opération!!! Veillez selectionner l'année de la formation 😰");
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



          function filtrage_impression(idf, annee){
            $.ajax({
               url:"<?php echo base_url(); ?>admin/pagination_view_inscription_pdf",
               method:"GET",
               data:{
                idf: idf,
                annee: annee 
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


         
            function generate_token(){

              var url = "https://api.orange.com/oauth/v3/token";

              let promise = fetch(url, {
                  method: "POST", //ou POST, PUT, DELETE, etc.
                  headers: {
                    // "Content-Type": "text/plain;charset=UTF-8",
                    "Authorization": "Basic bjNFaE9kYUh6NjE5c2RmVUNXUE85WWQ2THR3WURDMW06cThrQ1VsVTNVaTBjejJxQg==",
                    "Content-Type": "application/x-www-form-urlencoded",
                     //pour un corps de type chaine
                  },
                  // body: undefined, //ou string, FormData, Blob, BufferSource, ou URLSearchParams
                  body:{
                    "grant_type": "client_credentials"
                  }
                  
              }).then(function(response) {
                if(response.ok) {
                  console.log(response);
                } else {
                  console.log('Mauvaise réponse du réseau');
                }
              })
              .catch(function(error) {
                console.log('Il y a eu un problème avec l\'opération fetch: ' + error.message);
              });

            }







     });
   </script>

    <script type="text/javascript" language="javascript">
        $(document).ready(function(){
         
            $('.delete_checkbox').click(function(){
              if($(this).is(':checked'))
              {
               $(this).closest('tr').addClass('removeRow');
              }
              else
              {
               $(this).closest('tr').removeClass('removeRow');
              }
            });


            $('#envoyer_message').click(function(event){
                  event.preventDefault();
                  var checkbox = $('.delete_checkbox:checked');

                  var message = $('#message1').val();

                  if (message !='') {
                    // alert(sujet+" message "+message);

                      if(checkbox.length > 0)
                      {
                           var checkbox_value = [];
                           $(checkbox).each(function(){
                            checkbox_value.push($(this).val());
                           });

                           // alert("email:"+checkbox_value+" message:"+message);
                           $.ajax({
                                url:"<?php echo base_url(); ?>admin/infomation_telephone",
                                method:"POST",
                                data:{
                                    checkbox_value:checkbox_value,
                                    message: message
                                },
                                beforeSend: function(){

                                },
                                success:function(data)
                                {
                                    
                                    showSuccessMessage(data);
                                    
                                    $('.removeRow').fadeOut(1500);

                                    
                                }
                           });
                      }
                      else
                      {
                        swal("Erreur!!","veillez selectionner au moins un numéro","error");
                       
                      }

                  }
                  else{
                   
                    if (message=='') {
                        swal("Erreur!!","veillez entrer le message","error");
                    }
                  }

                  

                
                  
             });


            const showErrrorMessage = function(erreur) {
              swal("Erreur!!!",message,"error");
            };

            const showSuccessMessage = function(message) {
              swal("success!!!",message,"success");
            };

            

            $('#example-tbody').on( 'click', 'tr', function () {
                $(this).toggleClass('bg-danger text-white');
            } );






            




            

        });
        </script>



</body>

</html>