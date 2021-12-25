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
                                <?php //include("component/header_zoom.php") ?>

                                <?php include("component/conference_zoom.php") ?>
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

  
    <div class="modal fade" id="userModal3">
      <div class="modal-dialog modal-md">
          <div class="modal-content">
              <div class="modal-header bg-secondary text-white">
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

                  <button type="submit" class="btn btn-hub envoyer_message" name="valider" id="envoyer_message">
                      <i class="fa fa-send"></i> Envoyer
                  </button>
                  <a href="javascript:void(0);" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> fermer</a>
              </div> 
              </form>
              
          </div>
      </div>
    </div>

     <!-- modal ajout radio -->
    <div class="modal fade" tabindex="-1" role="dialog" id="userModal">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
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
                            <i class="fa fa-pencil mr-1"></i> Entrez le nom de la conférence
                          </label>
                          <input type="text" name="nom" id="nom" class="form-control" placeholder="Entrez le nom de la conférence">
                        </div>

                        <div class="col-md-6 form-group">
                          <label>
                            <i class="fa fa-calendar mr-1"></i> Date debit de la conférence
                          </label>
                          <input type="date" name="date_debit" id="date_debit" class="form-control">
                        </div>

                        <div class="col-md-6 form-group">
                          <label>
                            <i class="fa fa-clock-o mr-1"></i> Heure debit de la conférence
                          </label>
                          <input type="time" name="heure_debit" id="heure_debit" class="form-control">
                        </div>

                        <div class="col-md-6 form-group">
                          <label>
                            <i class="fa fa-calendar mr-1"></i> Date fin de la conférence
                          </label>
                          <input type="date" name="date_fin" id="date_fin" class="form-control">
                        </div>

                        <div class="col-md-6 form-group">
                          <label>
                            <i class="fa fa-clock-o mr-1"></i>Heure fin de la conférence
                          </label>
                          <input type="time" name="heure_fin" id="heure_fin" class="form-control">
                        </div>

                        <div class="col-md-12">
                          <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                              <div class="buysell-field form-action text-center mb-2">
                                    <div>

                                      <input type="hidden" name="idconference" id="idconference" />

                                      <input type="hidden" name="operation" id="operation" />

                                      <input type="submit" name="action" id="action" class="btn btn-hub mb-2" value="Add" />
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
               $('.modal-title').text("Ajout d'une conférence");  
               $('#action').val("Add"); 
               $('#userModal').modal('show'); 
               $('#user_uploaded_image').html(''); 
               $('.aff').hide();  

                $('#date_debit').val(""); 
                $('#date_fin').val("");
                $('#heure_debit').val("");
                $('#heure_fin').val("");
                $('#nom').val("");
            }); 

              $(document).on('submit', '#user_form', function(event){  
                 event.preventDefault();  
                 var nom   = $('#nom').val();  
                 var date_debit     = $('#date_debit').val(); 
                 var date_fin    = $('#date_fin').val();
                 var heure_debit    = $('#heure_debit').val();
                 var heure_fin    = $('#heure_fin').val();

                 var action     = $('#action').val();

                 if(nom != '' && date_debit != '' && date_fin != '' && heure_debit != '' && heure_fin != '')
                  {

                    if (action =="Add") {
                         
                        $.ajax({  
                             url:"<?php echo base_url() . 'admin/operation_conference'?>",  
                             method:'POST',  
                             data:new FormData(this),  
                             contentType:false,  
                             processData:false,  
                             success:function(data)  
                             {  
                                  var message  = data;
                                  if (message == "echec!!!") {
                                    swal("Error!!!", "Erreur! la conférence "+nom+" existe déjà!!!", "info");
                                  }
                                  else{
                                    swal('succès 👌', data, 'success');
                                    $('#user_form')[0].reset(); 
                                    $('#userModal').modal('hide'); 
                                  }

                                  load_sms_sender_users(1);  
                             }  
                        });
                         
                    }
                    if (action == 'Edit') {

                          $.ajax({  
                               url:"<?php echo base_url() . 'admin/modification_conference'?>",  
                               method:'POST',  
                               data:new FormData(this),  
                               contentType:false,  
                               processData:false,  
                               success:function(data)  
                               {  
                                    
                                    var message =  data;
                                    swal("Succès!!!",message,'success');
                                    $('#userModal').modal('hide'); 

                                    load_sms_sender_users(1); 

                               }  
                          });

                    }

                  }
                  else
                  {
                    
                     var erreur = "Tous les champs doivent être remplis";
                     swal("Erreur!!!",erreur,'error');

                  }


                   
            });  

        
             $(document).on('click', '.update', function(){  
               var idconference = $(this).attr("idconference");  
               $.ajax({  
                    url:"<?php echo base_url(); ?>admin/fetch_single_conference",  
                    method:"POST",  
                    data:{idconference:idconference},  
                    dataType:"json",  
                    success:function(data)  
                    {  
                          $('#userModal').modal('show');  
                          $('#nom').val(data.nom);  
                          $('#date_debit').val(data.date_debit); 

                          $('#date_fin').val(data.date_fin);
                          $('#heure_debit').val(data.heure_debit);
                          $('#heure_fin').val(data.heure_fin);
                         
                          $('.modal-title').text("Modification de la conférence de"+data.nom);
                            
                          $('#action').val("Edit"); 
                          $('#idconference').val(idconference); 

                          detail_user(data.idclient); 
                    }  
               });  
          });

          $(document).on('click', '.delete', function(event){
              event.preventDefault();
               var idconference = $(this).attr("idconference");
              
              if(confirm("Etes-vous sûre de vouloir supprimer la cette conférence?"))
              {
                
                  $.ajax({
                      url:"<?php echo base_url(); ?>admin/supression_conference",
                      method:"POST",
                      data:{idconference:idconference},
                      success:function(data)
                      {
                         
                           var message =  data;
                           swal("Succès!!!",message,'success');
                           
                           load_sms_sender_users(1);
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
          function load_sms_sender_users(page)
          {
            $.ajax({
              url:"<?php echo base_url(); ?>admin/pagination_conference_client/"+page,
              method:"GET",
              dataType:"json",
              beforeSend:function()
              {
                 $('#country_table2').html('<div id="loading" style="" ></div>');
              },
              success:function(data)
              {
                $('#country_table2').html(data.country_table);
                $('#pagination_link2').html(data.pagination_link);
              }
            });
          }

          function search_message_users(query)
          {
            $.ajax({
             url:"<?php echo base_url(); ?>admin/search_conference_client",
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



          $(document).on('keyup', '#search_text', function(event) {
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
           
         
          $(document).on("click", ".pagination2 li a", function(event){
            event.preventDefault();
            var page = $(this).data("ci-pagination-page");
            load_sms_sender_users(page);
          });

          load_sms_sender_users(1);


        
      });
    </script>


   

</body>

</html>