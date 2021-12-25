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
                                <table class="table-striped  nk-tb-list nk-tb-ulist dataTable no-footer" data-auto-responsive="false" id="user_data" role="grid" aria-describedby="DataTables_Table_1_info">
                                    <thead class="tb-member-head thead-light">  
                                        <tr> 
                                            <th width="10%">Avatar</th> 
                                            <th width="20%">Nom de la vidéo</th>  
                                            <th width="20%">Description </th> 
                                            <th width="10%">Catégorie </th> 
                                            <th width="10%">Type </th>  
                                            <th width="20%">Mise à jour</th>
                                             
                                            
                                            <th width="5%">Modifier</th> 
                                            <th width="5%">Supprimer</th>  
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
                                             
                                            
                                            <th width="5%">Modifier</th> 
                                            <th width="5%">Supprimer</th> 
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


   <!-- modal  -->
   <div id="userModal" class="modal fade">
      <div class="modal-dialog modal-md">
        <form method="post" id="user_form" enctype="multipart/form-data">
          <div class="modal-content">
            <div class="modal-header bg-hub text-white">
              <p class="modal-title text-center">cat</p>
              <button type="button" class="close text-danger" data-dismiss="modal"><i class="fa fa-close"></i></button>
            </div>
            <div class="modal-body">
                    

                  <!-- .contenues -->
                  <div class="col-md-12">
                    <div class="row">

                      <div class="form-group col-md-12">
                        <label><i class="fa fa-pencil"></i> Entrez le nom de la formation</label>
                        <input type="text" name="nom" id="nom" class="form-control" placeholder="Nom de la formation" />
                        
                      </div>

                      <div class="form-group col-md-6">
                        <label><i class="fa fa-calendar"></i> Debit formation formation</label>
                        <input type="date" name="date_debit" id="date_debit" class="form-control" placeholder="Nom de la formation" />

                      </div>

                      <div class="form-group col-md-6">
                        <label><i class="fa fa-calendar"></i> Fin formation</label>
                        <input type="date" name="date_fin" id="date_fin" class="form-control" placeholder="Nom de la formation" />

                      </div>

                      <div class="form-group col-md-12">
                        <label><i class="fa fa-calendar"></i>Date Fin de l'inscrition </label>
                        <input type="date" name="fin_inscription" id="fin_inscription" class="form-control" placeholder="Nom de la formation" />

                      </div>


                     
                      <div class="form-group col-md-12">
                        <label><i class="fa fa-camera"></i> Selectionner l'image de l'utilisateur</label>
                        <input type="file" name="user_image" id="user_image" class="form-control" />
                        
                      </div>


                      <div class="form-group jf-inputwithicon col-md-12 description_bloc">
                          <label><i class="fa fa-edit"></i> Saisissez une description de la formation</label>
                          <textarea class="form-control textarea" name="description" id="description" placeholder="Saisissez une expression">

                          </textarea>
                      </div>

                  
                      <div class="form-group jf-inputwithicon col-md-12 description_mod" style="display: none;">
                         
                      </div>



                      <div class="col-md-12">
                          <div class="row">

                            <div class="col-md-1 mb-2"></div>
                            <div class="col-md-10">
                              <div class="col-md-12">
                                <div class="row">
                                 
                                  <div class="col-12 mb-2">
                                    <div class="col-md-12" style="margin-top: 7px;">
                                      <span id="user_uploaded_image"></span>
                                    </div>
                                    <div class="col-md-12" id="description" style="margin-top: 7px;">

                                    </div>
                                  </div>
                                 
                                </div>
                              </div>
                              
                              
                            </div>
                            <div class="col-md-1"></div>
                            
                          </div>
                        </div>

                      
                      

                      
                    </div>
                  </div>
                  <!-- fin contenus -->

                    
              
            </div>
            <div class="modal-footer">

                <input type="hidden" name="idf" id="idf" placeholder="idf">
                
                <input type="hidden" name="operation" id="operation" />
                <input type="submit" name="action" id="action" class="btn btn-hub" value="Add" />
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Fermer</button>
            </div>
          </div>
        </form>
      </div>
    </div>
   <!-- fin modal -->


 



    <script type="text/javascript" language="javascript" >  
     $(document).ready(function(){  

      var  $message = '';

          $('#add_button').click(function(){  
               $('#user_form')[0].reset();  
               $('.modal-title').text("Paramètrage des carousels");  
               $('#action').val("Add"); 
               $('#user_uploaded_image').html("");

               $('.description_mod').hide(); 
               $('.description_bloc').show(); 

              
          })  


          $(document).on('submit', '#user_form', function(event){  
               event.preventDefault();  
               var description = $('#description').val();  
             
               var idf = $('#idf').val(); 

               var date_debit = $('#date_debit').val();
               var date_fin = $('#date_fin').val();
               var fin_inscription = $('#fin_inscription').val();
               var nom = $('#nom').val();

               var extension  = $('#user_image').val().split('.').pop().toLowerCase(); 
               var action       = $('#action').val();


               if(extension != '')  
               {  
                    if(jQuery.inArray(extension, ['gif','png','jpg','jpeg','webp']) == -1)  
                    {  

                         var erreur = "Invalid Image File";
                         swal("Succès!!!",erreur,'error');

                         $('#user_image').val('');  
                         return false;  
                    }  
               }

               if(description != '' && nom != '' && date_debit != ''
                 && date_fin != '' && fin_inscription != '')
                {

                  if (action =="Add") {
                       
                      $.ajax({  
                           url:"<?php echo base_url() . 'admin/operation_formations'?>",  
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
                        // alert("insertion");

                  }
                  if (action == 'Edit') {

                        $.ajax({  
                             url:"<?php echo base_url() . 'admin/modification_formations'?>",  
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
               var idf = $(this).attr("idf");  
               $.ajax({  
                    url:"<?php echo base_url(); ?>admin/fetch_single_formations",  
                    method:"POST",  
                    data:{idf:idf},  
                    dataType:"json",  
                    success:function(data)  
                    {  
                         $('#userModal').modal('show');

                         $('.description_mod').show(); 
                         $('.description_bloc').hide();  
                        
                         $('#nom').val(data.nom);
                         $('#date_debit').val(data.date_debit);
                         $('#date_fin').val(data.date_fin);
                         $('#fin_inscription').val(data.fin_inscription);

                         $('#idf').val(idf);

                         $('#user_uploaded_image').html(data.user_image);

                         $('.description_mod').html(data.text_description);

                         $('.modal-title').text("modification de la formation  "+data.nom);  
                        
                         $('#action').val("Edit");

                         $('.textarea').summernote();
                         
                    }  
               });  
          });

          $(document).on('click', '.delete', function(){
              var idf = $(this).attr("idf");

              if(confirm("Are you sure you want to delete this?"))
              {
                
                  $.ajax({
                        url:"<?php echo base_url(); ?>admin/supression_formations",
                        method:"POST",
                        data:{idf:idf},
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




        const showErrrorMessage = function(erreur) {
          swal("Oups!!!", erreur, "info");
        };

        const showSuccessMessage = function(message) {
          swal("Succès!!!", message, "success");
        };



          function filtrage(nombre){
            $.ajax({
             url:"<?php echo base_url(); ?>admin/pagination_view_formations/"+nombre,
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
             url:"<?php echo base_url(); ?>admin/pagination_view_formations",
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
             url:"<?php echo base_url(); ?>admin/fetch_search_view_formations",
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




     });  
     </script>


    

  



</body>

</html>