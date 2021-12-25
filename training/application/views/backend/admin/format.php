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
                                 <button class="btn btn-dim btn-sm btn-outline-primary pull-right  mb-2" id="add_button" data-toggle="modal" data-target="#userModal"><i class="fa fa-plus"></i>Effectuer l'opération</button>
                               </div>
                             </div>
                          </div>

                          <div class="col-md-12">

                              <div class="row">
                                <div class="col-md-2 mb-2">
                                   <div class="col-md-10">
                                     <select class="form-control" id="filtrage">
                                       <option value="">Filtrer</option>
                                       <option value="2">2</option>
                                       <option value="10">10</option>
                                       <option value="15">15</option>
                                       <option value="25">25</option>
                                       <option value="100">100</option>
                                       <option value="150">150</option>
                                     
                                     </select>
                                   </div>
                                </div>
                                <div class="col-md-2 mb-2">
                                  
                                </div>
                                <div class="col-md-4 mb-2"></div>
                                <div class="col-md-4 mb-2">
                                  <div class="form-group">
                                      <div class="input-group">
                                         <span class="input-group-addon" style="margin-top: 8px;"><i class="fa fa-search mr-2"></i> Recherche &nbsp;</span>
                                         <input type="text" name="search_text" id="search_text" placeholder="Recherche..." class="form-control" />
                                      </div>
                                  </div>
                                </div>
                              </div>
                              
                          </div>
                          <!-- insertion de tableau -->
                          <div class="col-md-12">
                            <div class="table-responsive" id="country_table">
                                
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



     <!-- modal ajout radio -->
    <div class="modal fade" tabindex="-1" role="dialog" id="userModal">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content">

                <div class="modal-header bg-hub text-white">
                  <p class="modal-title text-center">cat</p>
                  <button type="button" class="close text-danger" data-dismiss="modal"><i class="fa fa-close"></i></button>
                </div>

                <div class="modal-body modal-body-lg">
                    
                    <div class="nk-block">

                      

                      <form method="post" id="user_form" enctype="multipart/form-data" class="col-md-12">
                        
                        <div class="col-md-12">
                            <div class="row">

                              <div class="form-group col-md-12">
                                  <label><i class="fa fa-repeat"></i> Nom de la formation</label>
                                     <select  name="formations" id="formations" class="form-control selectpicker" data-live-search="true">
                                      <?php 
                                      if ($formations->num_rows() > 0) {
                                        ?>
                                        <option value="">Selectionnez la formation</option>
                                        <?php
                                        foreach ($formations->result_array() as $key) {
                                          ?>
                                          <option value="<?php echo($key['idf']) ?>">
                                            <?php echo($key['nom']) ?></option>
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

                               <div class="form-group col-md-12">
                                  <label><i class="fa fa-user"></i> Nom de  l'apprenant</label>
                                     <select  name="Hommes" id="Hommes" class="form-control selectpicker" data-live-search="true">
                                      <?php 
                                      if ($Hommes->num_rows() > 0) {
                                        ?>
                                        <option value="">Selectionnez l'apprenant</option>
                                        <?php
                                        foreach ($Hommes->result_array() as $key) {
                                          ?>
                                          <option value="<?php echo($key['id']) ?>">
                                            <?php echo($key['first_name'].' '.$key['last_name']) ?></option>
                                          <?php
                                        }
                                      }
                                      else{

                                        ?>
                                        <option value="">Aucun apprenant n'est diponible</option>
                                        <?php
                                      }
                                      ?>
                                      
                                     </select> 
                               </div>

                                

                                <div class="form-group col-md-12">
                                    <label><i class="fa fa-calendar"></i> Date de validation </label>
                                    <input type="date" name="jour" id="jour" class="form-control" />  
                                </div>

                                
                          </div>

                          <div class="col-md-12 aff">
                              <div class="row">
                                <div class="col-md-5">
                                  <span id="nom_complet" class="text-center"></span>
                                </div>
                                
                                <div class="col-md-5">
                                  <span id="info" class="text-center"></span>
                                </div>
                                <div class="col-md-2">
                                  <span id="user_uploaded_image"></span>
                                </div>

                              </div>
                            </div>

                            </div>
                        </div>


                        

                        <div class="buysell-field form-action text-center mb-2">
                            <div>

                              <input type="hidden" name="idf" id="idf" placeholder="idpersone" />
                              <input type="hidden" name="id_user" id="idpersonne" placeholder="idpersone" />
                              <input type="hidden" name="idformat" id="idformat" />
                              <input type="hidden" name="operation" id="operation" />

                              <input type="submit" name="action" id="action" class="btn btn-hub" value="Add" />
                            </div>
                            <div class="pt-3">
                                <a href="javascript:void(0);" data-dismiss="modal" class="link link-danger">Annuler l'opération</a>
                            </div>
                        </div>


                      </form>

                      <!-- style popover -->


                      <div class="col-md-12">
                        <div class="row">
                          
                          <div class="col-md-12 content">
                            
                          </div>

                        </div>
                      </div>

                      <!-- fin style popover -->
                        
                        
                        
                    </div><!-- .nk-block -->
                </div><!-- .modal-body -->
            </div><!-- .modal-content -->
        </div><!-- .modla-dialog -->
    </div>
    <!-- fin modal-->

   
   <?php include('_script.php') ?>

   <script type="text/javascript">
     $(document).ready(function() {

       function filtrage(nombre){
            $.ajax({
             url:"<?php echo base_url(); ?>admin/pagination_view_formations_conf/"+nombre,
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
          function load_country_data(page)
          {
            $.ajax({
             url:"<?php echo base_url(); ?>admin/pagination_view_formations_conf",
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

         $(document).on("click", ".pagination li a", function(event){
            event.preventDefault();
            var page = $(this).data("ci-pagination-page");
            load_country_data(page);
         });

         function load_data(query)
         {
            $.ajax({
             url:"<?php echo base_url(); ?>admin/fetch_search_view_formations_conf",
             method:"POST",
             data:{query:query},
              beforeSend:function()
              {
                $('#country_table').html('<div class="col-md-12 post_data"><p><span class="content-placeholder" style="width:100%; height: 30px;">&nbsp;</span></p><p><span class="content-placeholder" style="width:100%; height: 100px;">&nbsp;</span></p></div>');
              },
             success:function(data){
              $('#country_table').html(data);
             }
            })
         }



         $('#search_text').keyup(function(){
          var search = $(this).val();
          if(search != '')
          {
           load_data(search);
          }
          else
          {
            load_country_data();
          }
         });

        load_country_data();


        



          /*
          *operation ajout paiement local
          *==============================
          *==============================
          */

          $('#add_button').click(function(){  
               $('#user_form')[0].reset();  
               $('.modal-title').text("Confirmation de la place pour l'inscription");  
               $('#action').val("Add");  
               $('#user_uploaded_image').html(''); 
               $('.aff').hide(); 
          });

            $(document).on('submit', '#user_form', function(event){  
               event.preventDefault();  
               
             
               var idf = $('#idf').val(); 
               var id_user = $('#id_user').val(); 

               var jour = $('#jour').val();
               
              
               var action       = $('#action').val();


               if(idf != '' && id_user != '' && jour != '')
                {

                  if (action =="Add") {
                       
                      $.ajax({  
                           url:"<?php echo base_url() . 'admin/operation_formations_conf'?>",  
                           method:'POST',  
                           data:new FormData(this),  
                           contentType:false,  
                           processData:false,  
                           success:function(data)  
                           {  
                                var message =  data;
                                if (message =="echec!!!") {
                                 swal("Erreur!!!", " l'apprenant est déjà inscrit pour cette formation 🏧","info");
                                }
                                else{

                                  showSuccessMessage(message);
                                  $('#user_form')[0].reset();  
                                  $('#userModal').modal('hide');  
                                   load_country_data();  
                                }
                               
                           }  
                      });
                        // alert("insertion");

                  }
                  if (action == 'Edit') {

                        $.ajax({  
                             url:"<?php echo base_url() . 'admin/modification_formations_conf'?>",  
                             method:'POST',  
                             data:new FormData(this),  
                             contentType:false,  
                             processData:false,  
                             success:function(data)  
                             {  
                                  
                                  var message =  data;
                                  showSuccessMessage(message);

                                  $('#user_form')[0].reset();  
                                  $('#userModal').modal('hide');  
                                   load_country_data();  
                             }  
                        });

                  }

                }
                else
                {
                  var erreur = "Tous les champs doivent être remplis";
                  showErrrorMessage(erreur);
                }
 
          });  


          $(document).on('click', '.update', function(){  
               var idformat = $(this).attr("idformat");  
               $.ajax({  
                    url:"<?php echo base_url(); ?>admin/fetch_single_formations_conf",  
                    method:"POST",  
                    data:{idformat:idformat},  
                    dataType:"json",  
                    success:function(data)  
                    {  
                         $('#userModal').modal('show');

                         $('.description_mod').show(); 
                         $('.description_bloc').hide();  
                        
                         $('#idf').val(data.idf);
                         $('#jour').val(data.jour);
                         $('#idpersonne').val(data.id_user);
                         
                         $('#idformat').val(idformat);

                         $('.modal-title').text("modification de la formation  "+data.nom);  
                        
                         $('#action').val("Edit");

                         detail_user(data.id_user);

                        
                         
                    }  
               });  
          });

          $(document).on('click', '.delete', function(){
              var idformat = $(this).attr("idformat");

              if(confirm("Are you sure you want to delete this?"))
              {
                
                  $.ajax({
                        url:"<?php echo base_url(); ?>admin/supression_formations_conf",
                        method:"POST",
                        data:{idformat:idformat},
                        success:function(data)
                        {
                      
                           var message =  data;
                           showSuccessMessage(message);

                           load_country_data();
                        }
                      });
              }
              else
              {
                var erreur = "opération annulée :)";
                showErrrorMessage(erreur);
              }

          });

         

          $("#filtrage").on("change", function() {

            var nombre = $(this).val();
                if (nombre !='') {
                  filtrage(nombre);
                }
                else{

                 showErrrorMessage("Erreur lors de l'opération!!! Veillez selectionner le filtre d'information 😰");
                }
          });

          $(document).on('change', '#Hommes',function(){
              var idpersonne = $(this).val();
              $('#idpersonne').val(idpersonne);
              detail_user(idpersonne);
            
          });

          function detail_user(id_user){

            if (id_user !='') {
              
              $.ajax({  
                    url:"<?php echo base_url(); ?>admin/fetch_single_personne_user",  
                    method:"POST",  
                    data:{id:id_user},  
                    dataType:"json",  
                    success:function(data)  
                    {   
                         
                         $('.aff').show();
            
                         $('#nom_complet').text('NOM:'+data.first_name+' '+data.last_name+' '+data.prenom+' SEXE:'+data.sexe+' Date de naissance:'+data.date_nais);

                         $('#info').text('email:'+data.email+' adresse:'+data.full_adresse+' téléphone:'+data.telephone );

                         $('#user_uploaded_image').html(data.user_image);
                         
                    }  
               });  

            }
            else{
              swal("Erreur!!!","veillez selectionner le nom de la personne","error");
            }

          } 




          const showErrrorMessage = erreur=> {
            swal("Erreur!!!",erreur,"error");
          };

          const showSuccessMessage = function(message) {
            swal("Succès!!!",message,"success");
          };

         


          $(document).on('change', '#formations', function(event) {
            event.preventDefault();
            /* Act on the event */
            var idf = $(this).val();
            if(idf !='')
            {
              $('#idf').val(idf);
            }
            else{
              $('#idf').val("");
              showErrrorMessage("Veillez selectionner une formation");
            }

          });

         


       
     });
   </script>

</body>

</html>