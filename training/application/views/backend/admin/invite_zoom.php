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
                              <!-- menu -->
                              <div class="col-md-3">

                               <?php include("menu_zoom.php") ?>
                                
                              </div>
                              <!-- fin menu -->
                              <!-- contenu -->
                              <div class="col-md-9">
                                <?php include("component/header_zoom.php") ?>

                              </div>
                              <!-- fin contenu -->
                               

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

  
    

     <!-- modal ajout radio -->
    <div class="modal fade" tabindex="-1" role="dialog" id="userModal">
        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">

              <div class="modal-header bg-hub text-center">
                    <span class="nk-block-title modal-title text-white">Paramètrage admin</span>
                    
                </div>
                <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                <div class="modal-body modal-body-lg">
                    
                    <div class="nk-block">

                        <form method="post" id="user_form" enctype="multipart/form-data" class="col-md-12 row">

                        <div class="col-md-12 form-group">
                          <label>
                            <i class="fa fa-pencil mr-1"></i> A la conférence
                          </label>
                          <select class="selectpicker form-control" id="conferences" name="conferences" data-live-search="true">
                          <?php 
                            if ($conference->num_rows() > 0) {
                              ?>
                              <option value="">Selectionnez le nom de la conférence</option>
                              <?php
                              foreach ($conference->result_array() as $key) {
                                ?>
                                <option value="<?php echo($key['idconference']) ?>"><?php echo(substr($key['nom'], 0,35)) ?>...</option>
                                <?php
                              }
                            }
                            else{

                              ?>                                
                              <option value="">Aucune conférence n'est diponible</option>
                              <?php
                            }
                          ?>
                       </select>
                        </div>

                        <div class="col-md-12 form-group">
                          <label>
                            <i class="fa fa-globe mr-1"></i> Lien de la conférence
                          </label>
                          <input type="url" name="link" id="link" class="form-control" placeholder="ex:https://www.domaine.com/metting...">
                        </div>

                       

                        <div class="col-md-12">
                          <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                              <div class="buysell-field form-action text-center mb-2">
                                    <div>

                                      <input type="hidden" name="idinvite" id="idinvite" />
                                      <input type="hidden" name="idconference" id="idconference" />

                                      <input type="hidden" name="operation" id="operation" />

                                      <input type="submit" name="action" id="envoyer_message" class="btn btn-hub mb-2" value="Envoyer" />
                                    </div>
                                    <div class="pt-3">
                                        <a href="javascript:void(0);" data-dismiss="modal" class="link link-danger">Annuler l'opération</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4"></div>
                          </div>
                        </div>

                        </form>
                        
                        
                        
                    </div><!-- .nk-block -->
                </div><!-- .modal-body -->
            </div><!-- .modal-content -->
        </div><!-- .modla-dialog -->
    </div>
    <!-- fin modal-->

    <div class="modal" tabindex="-1" role="dialog" id="modal_detail_user">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Le Profil</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <!-- detail -->
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
              <!-- fin detail -->

          </div>
          <div class="modal-footer">
            
            <button type="button" class="btn btn-hub" data-dismiss="modal">Fermer</button>
          </div>
        </div>
      </div>
    </div>

     <div class="modal fade" id="userModal4">
      <div class="modal-dialog modal-lg">
          <div class="modal-content">
              <div class="modal-header bg-hub text-white">

                 <div class="modal-title">information personnele aux termes de contrat</div> 
                  <button class="close" data-dismiss="modal"><i class="fa fa-close"></i></button>
              </div>
              
              <div class="modal-body">
                <div class="col-md-12">
                  <div class="row">

                      <div class="col-md-4">
                       <select class="form-control" id="roles" name="roles">
                          <?php 
                            if ($roles->num_rows() > 0) {
                              ?>
                              <option value="">Selectionnez une catégorie</option>
                              <?php
                              foreach ($roles->result_array() as $key) {
                                ?>
                                <option value="<?php echo($key['idrole']) ?>"><?php echo(substr($key['nom'], 0,35)) ?>...</option>
                                <?php
                              }
                            }
                            else{

                              ?>                                
                              <option value="">Aucune catégorie n'est diponible</option>
                              <?php
                            }
                          ?>
                       </select>
                      </div>
                      <div class="col-md-3">
                        <button class="btn btn-hub add_button2"><i class="fa fa-group"></i></button>
                        
                      </div>

                      <div class="col-md-5">
                        <div class="col-md-12 mb-4 mt-2"><div class="form-group">
                          <div class="input-group">

                            <input type="hidden" name="idrole" id="idrole">
                           
                           <input type="text" name="search_text" id="search_text2" placeholder="Rechercher un message" class="form-control" />
                           <span class="input-group-addon btn btn-primary"><i class="fa fa-search mr-2"></i></span>

                          </div>
                         </div>
                       </div>
                      </div>

                      <div class="col-md-12">
                        
                          <hr>
                      </div>



                      <!-- resultat -->
                      <div class="col-md-12 mb-2">
                         
                         <div class="col-md-12 table-responsive" id="country_table2">
                          
                          
                         </div>
                         <div class="col-md-12">

                           <div align="right" class="col-md-12" id="pagination_link2"></div>
                           
                         </div>
                      </div>
                      <!-- fin resultat -->



                  </div>
                </div>






              </div>

                       
            
          </div>
      </div>
    </div>

    <script type="text/javascript">
      $(document).ready(function() {

            //alert("boom");
            $('.add_button').click(function(e){ 
               e.preventDefault(); 
               $('#user_form')[0].reset();  
               $('.modal-title').text("Envoie des sms");  
               $('#action').val("Add"); 
               $('#userModal3').modal('show');  
            }); 

            $('.add_button2').click(function(e){ 
               e.preventDefault(); 
               $('#user_form')[0].reset(); 
               $('.modal-title').text("Ajout des invités");  
               $('#action').val("Add"); 
               $('#userModal4').modal('hide'); 
               $('#userModal').modal('show'); 
              
            }); 

            $('.add_button_user').click(function(e){ 
               e.preventDefault(); 
               $('#user_form')[0].reset(); 
               $('.modal-title').text("Ajout des invités");  
               $('#action').val("Add"); 
               $('#userModal4').modal('show'); 
              
            }); 

              

        
            $(document).on('click', '.update', function(){  
               var id = $(this).attr("id");  
               detail_user(id); 
           });

          $(document).on('click', '.delete', function(event){
              event.preventDefault();
               var idinvite = $(this).attr("idinvite");
              
              if(confirm("Etes-vous sûre de vouloir le supprimer à la cette conférence?"))
              {
                
                  $.ajax({
                      url:"<?php echo base_url(); ?>admin/supression_invite",
                      method:"POST",
                      data:{idinvite:idinvite},
                      success:function(data)
                      {
                         
                           var message =  data;
                           swal("Succès!!!",message,'success');
                           
                           load_zoom_sender_users(1);
                      }
                    });
              }
              else
              {
                var erreur = "opération annulée :)";
                swal("Oups!!!",erreur,'info');
              }
          });

        

          // pour les utilisateurs 
          function load_zoom_sender_users(page)
          {
            $.ajax({
              url:"<?php echo base_url(); ?>admin/pagination_invite_client/"+page,
              method:"GET",
              dataType:"json",
              beforeSend:function()
              {
                 $('#country_table').html('<div id="loading" style="" ></div>');
              },
              success:function(data)
              {
                $('#country_table').html(data.country_table);
                $('#pagination_link').html(data.pagination_link);
              }
            });
          }

          function search_zoom_users(query)
          {
            $.ajax({
             url:"<?php echo base_url(); ?>admin/search_invite_client",
             method:"POST",
             data:{query:query},
              beforeSend:function()
              {
                 $('#country_table').html('<div id="loading" style="" ></div>');
              },
             success:function(data){
              $('#country_table').html(data);
             }
            })
           }



          $(document).on('keyup', '#search_text', function(event) {
             event.preventDefault();
             /* Act on the event */
              var search = $(this).val();
              if(search != '')
              {
               search_zoom_users(search);
              }
              else
              {
                load_zoom_sender_users(1);
              }
          });
           
         
          $(document).on("click", ".pagination2 li a", function(event){
            event.preventDefault();
            var page = $(this).data("ci-pagination-page");
            load_zoom_sender_users(page);
          });

          load_zoom_sender_users(1);

          function detail_user(id_user){

            if (id_user !='') {
              
              $.ajax({  
                    url:"<?php echo base_url(); ?>admin/fetch_single_personne_zoom",  
                    method:"POST",  
                    data:{id:id_user},  
                    dataType:"json",  
                    success:function(data)  
                    {   
                         
                         $('.aff').show();
            
                         $('#nom_complet').text('NOM:'+data.first_name+' '+data.last_name+' '+data.prenom+' SEXE:'+data.sexe+' Date de naissance:'+data.date_nais);

                         $('#info').text('email:'+data.email+' adresse:'+data.full_adresse+' téléphone:'+data.telephone );

                         $('#user_uploaded_image').html(data.user_image);

                        

                        $('#modal_detail_user').modal('show');

                         
                    }  
               });  

            }
            else{
               $('#idclient').val("");
              swal("Erreur!!!","veillez selectionner le nom de la personne","error");
            }

          } 

          $("#conferences").on("change", function() {

              var idconference = $(this).val();
              if (idconference !='') {
                  $('#idconference').val(idconference);
              }
              else{

                   var erreur = "Veillez complèter la conférence 😰";
                   swal("Oups!!!",erreur,'error');
              }
          });


          /*
          script pour l'unitialisation
          ============================
          ****************************
          ****************************

          */

          // pour les utilisateurs 
          function load_sms_sender_users(page)
          {
            $.ajax({
              url:"<?php echo base_url(); ?>admin/pagination_message_users_zoom",
              method:"GET",
              
              beforeSend:function()
              {
                 $('#country_table2').html('<div id="loading" style="" ></div>');
              },
              success:function(data)
              {
                $('#country_table2').html(data);
               
              }
            });
          }
           
         
          $(document).on("click", ".pagination2 li a", function(event){
            event.preventDefault();
            var page = $(this).data("ci-pagination-page");
            load_sms_sender_users(page);
          });

          load_sms_sender_users(1);

          function search_message_users(query)
          {
            $.ajax({
             url:"<?php echo base_url(); ?>admin/search_message_users_zoom",
             method:"POST",
             data:{query:query},
              beforeSend:function()
              {
                 $('#country_table2').html('<div id="loading" style="" ></div>');
              },
             success:function(data){
              $('#country_table2').html(data);
             }
            })
           }



          $(document).on('keyup', '#search_text2', function(event) {
             event.preventDefault();
             /* Act on the event */
              var search = $(this).val();
              if(search != '')
              {
               search_message_users(search);
              }
              else
              {
                load_sms_sender_users(1);
              }
          });


          $("#roles").on("change", function() {

            var idrole = $(this).val();
                if (idrole !='') {
                  $('#idrole').val(idrole);
                  load_sms_sender_users_by_role(1);
                }
                else{

                  $('#idrole').val("");

                  showErrrorMessage("Erreur lors de l'opération!!! Veillez selectionner une catégorie 😰");
                }
          });

          $("#roles").on("change", function() {

            var idrole = $(this).val();
                if (idrole !='') {
                  $('#idrole').val(idrole);
                  load_sms_sender_users_by_role(1);
                }
                else{

                  $('#idrole').val("");

                  showErrrorMessage("Erreur lors de l'opération!!! Veillez selectionner une catégorie 😰");
                }
          });

           // pour les utilisateurs 
          function load_sms_sender_users_by_role(page)
          {
            var idrole = $('#idrole').val();
            if (idrole !='') {

                $.ajax({
                  url:"<?php echo base_url(); ?>admin/pagination_message_users_byrole_zoom/"+page,
                  method:"POST",
                  dataType:"json",
                  data:{idrole:idrole},
                  beforeSend:function()
                  {
                     $('#country_table2').html('<div id="loading" style="" ></div>');
                  },
                  success:function(data)
                  {
                    $('#country_table2').html(data.country_table);
                    $('#pagination_link2').html(data.pagination_link2);
                  }
                });
            }
          }

          $(document).on("click", ".pagination_filter li a", function(event){
            event.preventDefault();
            var page = $(this).data("ci-pagination-page");
            load_sms_sender_users_by_role(page);
          });

          $('.delete_checkbox').click(function(){
            if($(this).is(':checked'))
            {
             $(this).closest('tr').addClass('bg-danger');
            }
            else
            {
             $(this).closest('tr').removeClass('bg-danger');
            }
          });

          $(document).on('click', '#envoyer_message', function(event) {
            event.preventDefault();
            /* Act on the event */

             event.preventDefault();
                var checkbox = $('.delete_checkbox:checked');

                var idconference   = $('#idconference').val();  
                var link     = $('#link').val(); 
                 

                if (idconference !='' && link !='') {
                  // alert(idconference+" link "+link);

                    if(checkbox.length > 0)
                    {
                         var checkbox_value = [];
                         $(checkbox).each(function(){
                          checkbox_value.push($(this).val());
                         });

                         // alert("users:"+checkbox_value+" link:"+link);
                         $.ajax({
                              url:"<?php echo base_url(); ?>admin/infomation_zoom",
                              method:"POST",
                              data:{
                                  checkbox_value:checkbox_value,
                                  link: link,
                                  idconference: idconference
                              },
                              beforeSend:function()
                              {
                                 $('#country_table').html('<div id="loading" style="" ></div>');
                                 // $("#envoyer_message").attr("disabled", true);
                                
                              },
                              success:function(data)
                              {
                                  
                                  var message  = data;
                                  if (message == "echec!!!") {
                                    swal("Error!!!", "Erreur! cette personne est disponible pour la conférence", "info");
                                  }
                                  else{

                                    swal('succès 👌', data, 'success');
                                    $('#user_form')[0].reset(); 
                                    $('#userModal').modal('hide'); 
                                    load_zoom_sender_users(1);

                                  }

                                  
                              }
                         });
                    }
                    else
                    {
                      swal("Erreur!!","veillez selectionner au moins une personne à rejoindre la conférence ","error");
                     
                    }

                }
                else{
                 
                  if (link=='') {
                      swal("Erreur!!","veillez entrer le lien","error");
                  }
                  if (idconference=='') {
                      swal("Erreur!!","veillez entrer la conférence ","error");
                  }
                }

          });


        
        
      });
    </script>


   

</body>

</html>