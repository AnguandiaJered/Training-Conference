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

                               <?php include("menu_activities.php") ?>
                                
                              </div>
                              <!-- fin menu -->
                              <!-- contenu -->
                              <div class="col-md-9">

                                <?php include("component/_cours.php") ?>

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
                                  <label><i class="fa fa-pencil"></i> Nom du cours</label>
                                   <input type="text" name="nomcours" id="nomcours" class="form-control" placeholder="Nom du cours"> 
                              </div>
                              <div class="col-md-12 form-group">
                                 <label><i class="fa fa-book mr-1"></i> La description du cours</label>
                                 <textarea name="descriptioncours" id="descriptioncours" class="form-control" placeholder="la petite decription">
                                   
                                 </textarea>
                              </div>

                              <div class="form-group col-md-12 mb-2">
                                  <label><i class="fa fa-camera"></i> Selectionner logo du cours</label>
                                  <input type="file" name="user_image" id="user_image" class="form-control-file" />
                                  
                              </div>

                              <div class="form-group col-md-12 mb-2">
                                  <label><i class="fa fa-file-pdf-o"></i> Attacher un fichier du cours</label>
                                  <input type="file" name="user_image2" id="user_image2" class="form-control-file" />
                                  
                              </div>

                              <div class="col-md-12 mb-2">
                                <div class="row">

                                  <div class="col-md-4 mb-2"></div>
                                  <div class="col-md-4">
                                    <div class="col-md-12">
                                      <div class="row">
                                        <div class="col-md-12" style="margin-top: 7px;">
                                          <span id="user_uploaded_image"></span>
                                        </div>
                                        
                                      </div>
                                    </div>
                                    
                                  </div>
                                  <div class="col-md-4 mb-2"></div>
                                  
                                </div>
                              </div>




                            </div>

                          
                            </div>
                        </div>


                        

                        <div class="buysell-field form-action text-center mb-2">
                            <div>


                             
                              <input type="hidden" name="idf" id="idf" placeholder="idpersone" />
                             
                              <input type="hidden" name="idcours" id="idcours" />
                              <input type="hidden" name="operation" id="operation" />

                              <input type="submit" name="action" id="action" class="btn btn-hub" value="Add" />
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


    <script type="text/javascript">
      $(document).ready(function() {

         $('#add_button').click(function(){  
             $('#user_form')[0].reset();  
             $('.modal-title').text("Paramètrage des cours");  
             $('#action').val("Add");
             $('#user_uploaded_image').html("");

         });  

         $(document).on('submit', '#user_form', function(event){  
               event.preventDefault();  
               var nomcours   = $('#nomcours').val(); 
               var descriptioncours  = $('#descriptioncours').val();
               var idf    = $('#idf').val();
               

               var extension  = $('#user_image').val().split('.').pop().toLowerCase(); 
               var extension2  = $('#user_image2').val().split('.').pop().toLowerCase(); 
              
               var action = $('#action').val();

               if(extension != '')  
               {  
                    if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)  
                    {  
                         swal("Erreur!!!","Image invalide! elle doit être du format png,jpg,gif","error");  
                         $('#user_image').val('');  
                         return false;  
                    }  
               }

               if(extension2 != '')  
               {  
                    if(jQuery.inArray(extension2, ['pdf','pptx','docx','xlsx','zip']) == -1)  
                    {  
                         swal("Erreur!!!","File invalide! elle doit être du format pdf,pptx,docs,xlsx,zip","error");  
                         $('#user_image2').val('');  
                         return false;  
                    }  
               }

              
               if(nomcours != '' && descriptioncours != '' && idf != '')
                {

                  if (action =="Add") {
                       
                      $.ajax({  
                           url:"<?php echo base_url() . 'formateur/operation_cours'?>",  
                           method:'POST',  
                           data:new FormData(this),  
                           contentType:false,  
                           processData:false,  
                           success:function(data)  
                           {  
                                var message =  data;
                                if (message =="echec!!!") {
                                 swal("Erreur!!!", " Ce cours exite existe déjà à cette formation 🏧","info");
                                }
                                else{

                                  swal("succès!!!",message,"success");
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
                             url:"<?php echo base_url() . 'formateur/modification_cours'?>",  
                             method:'POST',  
                             data:new FormData(this),  
                             contentType:false,  
                             processData:false,  
                             success:function(data)  
                             {  
                                  swal('succès', ''+data, 'success'); 
                                  $('#user_form')[0].reset();  
                                  $('#userModal').modal('hide');  
                                  load_country_data();  
                             }  
                        });

                  }

                }
                else
                {
                  swal("Erreur!!!", "Tous les champs doivent être remplis🔕", "error");
                }


                 
          });  


          $(document).on('click', '.update', function(){  
               var idcours = $(this).attr("idcours");  
               $.ajax({  
                    url:"<?php echo base_url(); ?>formateur/fetch_single_cours",  
                    method:"POST",  
                    data:{idcours:idcours},  
                    dataType:"json",  
                    success:function(data)  
                    {  
                         $('#userModal').modal('show');  
                         $('#idf').val(data.idf);
                         $('#nomcours').val(data.nomcours);
                         $('#descriptioncours').val(data.descriptioncours);
                         
                         $('#user_uploaded_image').html(data.user_image);
                         
                         $('.modal-title').text("modification du cours "+data.nomcours);  
                         $('#idcours').val(idcours);   
                         $('#action').val("Edit");  
                    }  
               });  
          });

          $(document).on('click', '.delete', function(){
              var idcours = $(this).attr("idcours");

              if(confirm("Are you sure you want to delete this?"))
            {
              
                $.ajax({
                      url:"<?php echo base_url(); ?>formateur/supression_cours",
                      method:"POST",
                      data:{idcours:idcours},
                      success:function(data)
                      {
                         swal("succès!", ''+data, "success");
                         load_country_data();
                      }
                    });
            }
            else
            {
              swal("Ouf!!!", "opération annulée :)", "error");
            }

               

          });

          $(document).on('change', '#formations',function(){
              var idf = $(this).val();
              if (idf !='') {
                $('#idf').val(idf);
              }
              else{
                $('#idf').val("");
                swal("Ouf!!!", "Veillez complèter la formation 😰", "error");
              }
          });


          /*

          script pour affichage du tableau
          ==================================
          **********************************
          **********************************
          ++++++++++++++++++++++++++++++++++
          ==================================
          */
           function load_country_data()
          {
            $.ajax({
             url:"<?php echo base_url(); ?>formateur/pagination_view_cours/",
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

         function load_data(query)
         {
            $.ajax({
             url:"<?php echo base_url(); ?>formateur/fetch_search_view_cours",
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

         $(document).on('change', '#limit', function(event) {
              event.preventDefault();
              /* Act on the event */
              var limit = $(this).val();
              if (limit !='') {
                $.ajax({
                  url: '<?php echo base_url(); ?>formateur/fetch_limit_view_module',
                  type: 'POST',
                  data: {limit: limit},
                  beforeSend:function()
                  {
                     $('#country_table').html('<div class="col-md-12 post_data"><p><span class="content-placeholder" style="width:100%; height: 30px;">&nbsp;</span></p><p><span class="content-placeholder" style="width:100%; height: 100px;">&nbsp;</span></p></div>');
                  },
                  success: (data)=>{
                    $('#country_table').html(data);
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