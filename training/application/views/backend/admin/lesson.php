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
                                  <label><i class="fa fa-bookmark-o"></i> Nom du cours</label>
                                   <select  name="cours" id="cours" class="form-control">
                                   
                                   </select> 
                              </div>

                              <div class="form-group col-md-12">
                                  <label><i class="fa fa-pencil"></i> Titre de la leçon</label>
                                   <input type="text" name="nomlesson" id="nomlesson" class="form-control" placeholder="Titre de la leçon"> 
                              </div>
                              <div class="col-md-12 form-group">
                                 <label><i class="fa fa-book mr-1"></i> La description de la leçon</label>
                                 <textarea name="descriptionlesson" id="descriptionlesson" class="form-control" placeholder="la petite decription">
                                   
                                 </textarea>
                              </div>

                              <div class="form-group col-md-12 mb-2">
                                  <label><i class="fa fa-video"></i> Selectionner le fichier de la leçon</label>
                                  <input type="file" name="user_image" id="user_image" class="form-control-file" />
                                  
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
                             
                              <input type="hidden" name="idlesson" id="idlesson" />
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
             $('.modal-title').text("Paramètrage des leçons");  
             $('#action').val("Add");
             $('#user_uploaded_image').html("");

         });  

         $(document).on('submit', '#user_form', function(event){  
               event.preventDefault();  
               var nomlesson   = $('#nomlesson').val(); 
               var descriptionlesson  = $('#descriptionlesson').val();
               var idf        = $('#idf').val();
               var idcours    = $('#idcours').val();
               

               var extension  = $('#user_image').val().split('.').pop().toLowerCase(); 
              
               var action = $('#action').val();

               if(extension != '')  
               {  

                
                    if(jQuery.inArray(extension, ['mp4','flv','avi','mov','wmv']) == -1)  
                    {  
                         swal("Erreur!!!","Vidéo invalide! elle doit être du format FLV, AVI, MOV, MP4, WMV.","error");  
                         $('#user_image').val('');  
                         return false;  
                    }  
               }

              
               if(nomlesson != '' && descriptionlesson != '' && idcours != '')
                {

                  if (action =="Add") {
                       
                      $.ajax({  
                           url:"<?php echo base_url() . 'admin/operation_lesson'?>",  
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
                             url:"<?php echo base_url() . 'admin/modification_lesson'?>",  
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
               var idlesson = $(this).attr("idlesson");  
               $.ajax({  
                    url:"<?php echo base_url(); ?>admin/fetch_single_lesson",  
                    method:"POST",  
                    data:{idlesson:idlesson},  
                    dataType:"json",  
                    success:function(data)  
                    {  
                         $('#userModal').modal('show');  
                         $('#idcours').val(data.idcours);
                         $('#nomlesson').val(data.nomlesson);
                         $('#descriptionlesson').val(data.descriptionlesson);
                         
                         $('#user_uploaded_image').html(data.user_image);
                         
                         $('.modal-title').text("modification du cours "+data.nomlesson);  
                         $('#idlesson').val(idlesson);   
                         $('#action').val("Edit");  
                    }  
               });  
          });

          $(document).on('click', '.delete', function(){
              var idlesson = $(this).attr("idlesson");

              if(confirm("Are you sure you want to delete this?"))
            {
              
                $.ajax({
                      url:"<?php echo base_url(); ?>admin/supression_lesson",
                      method:"POST",
                      data:{idlesson:idlesson},
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

          $(document).on('change', '#formations', function(){
              var idf = $(this).val();
              if(idf != '')
              {
                // alert(idf);
                 $.ajax({
                    url:"<?php echo base_url(); ?>admin/fetch_cours_requete",
                    method:"POST",
                    data:{idf:idf},
                    beforeSend:function()
                    {
                       $('#cours').html('<div id="loading" style="" ></div>');
                    },
                    success:function(data)
                    {
                       $('#cours').html(data);

                       $('#idf').val(idf);
                    }

                 });
              }
              else
              {
                 $('#cours').html('<option value="">Selectionner un cours</option>');
                 swal("Error", "veillez completer la formation", "error");
                 $('#idf').val("");
                 
              }
              // alert(idv);
          });

          $(document).on('change', '#cours',function(){
              var idcours = $(this).val();
              if (idcours !='') {
                $('#idcours').val(idcours);
              }
              else{
                $('#idcours').val("");
                swal("Ouf!!!", "Veillez complèter le cours 😰", "error");
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
             url:"<?php echo base_url(); ?>admin/pagination_view_lesson/",
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
             url:"<?php echo base_url(); ?>admin/fetch_search_view_lesson",
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
                  url: '<?php echo base_url(); ?>admin/fetch_limit_view_lesson',
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