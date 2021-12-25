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
                                  <label><i class="fa fa-lemon-o"></i> Selectionnez la leçon</label>
                                   <select  name="lessons" id="lessons" class="form-control">
                                   
                                   </select> 
                              </div>

                              <div class="form-group col-md-12">
                                  <label><i class="fa fa-pencil"></i> Titre de du travail</label>
                                   <input type="text" name="nomtravail" id="nomtravail" class="form-control" placeholder="Titre de du travail"> 
                              </div>
                              <div class="col-md-12 form-group">
                                 <label><i class="fa fa-book mr-1"></i> La description de du travail</label>
                                 <textarea name="descriptiontravail" id="descriptiontravail" class="form-control" placeholder="la petite decription">
                                   
                                 </textarea>
                              </div>

                              <div class="form-group col-md-6">
                                  <label><i class="fa fa-calendar"></i> Date fin dépôt</label>
                                   <input type="date" name="jour_fin" id="jour_fin" class="form-control" > 
                              </div>

                              <div class="form-group col-md-6">
                                  <label><i class="fa fa-clock-o"></i> Heure fin dépôt</label>
                                   <input type="time" name="heure_fin" id="heure_fin" class="form-control" > 
                              </div>

                             

                            </div>

                          
                            </div>
                        </div>


                        

                        <div class="buysell-field form-action text-center mb-2">
                            <div>

                              <!-- ce ci recupere l'id du traviail pour le show -->
                              <input type="hidden" name="trav" id="trav" placeholder="idpersone" />


                              <input type="hidden" name="idf" id="idf" placeholder="idpersone" />
                              <input type="hidden" name="idcours" id="idcours" />
                              <input type="hidden" name="idlesson" id="idlesson" />
                             
                              <input type="hidden" name="idtravail" id="idtravail" />
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


    <div class="modal fade" id="userModal2">
      <div class="modal-dialog modal-lg">
          <div class="modal-content">
              <div class="modal-header bg-hub text-white">

                 <div class="modal-title">Liste de travaux remis</div> 
                  <button class="close" data-dismiss="modal"><i class="fa fa-close"></i></button>
              </div>
              
              <div class="modal-body">
                <div class="col-md-12">
                  <div class="row">

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

         $('#add_button').click(function(){  
             $('#user_form')[0].reset();  
             $('.modal-title').text("Paramètrage des travaux");  
             $('#action').val("Add");
             $('#user_uploaded_image').html("");

         });  

         $(document).on('submit', '#user_form', function(event){  
               event.preventDefault();  
               var nomtravail   = $('#nomtravail').val(); 
               var descriptiontravail  = $('#descriptiontravail').val();
               var idf        = $('#idf').val();
               var idcours    = $('#idcours').val();
               var idlesson    = $('#idlesson').val();
               
               var action = $('#action').val();

              
              
               if(nomtravail != '' && descriptiontravail != '' && idlesson != '')
                {

                  if (action =="Add") {
                       
                      $.ajax({  
                           url:"<?php echo base_url() . 'formateur/operation_travail'?>",  
                           method:'POST',  
                           data:new FormData(this),  
                           contentType:false,  
                           processData:false,  
                           success:function(data)  
                           {  
                                var message =  data;
                                if (message =="echec!!!") {
                                 swal("Erreur!!!", " Ce travail  existe déjà à cette formation 🏧","info");
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
                             url:"<?php echo base_url() . 'formateur/modification_travail'?>",  
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
               var idtravail = $(this).attr("idtravail");  
               $.ajax({  
                    url:"<?php echo base_url(); ?>formateur/fetch_single_travail",  
                    method:"POST",  
                    data:{idtravail:idtravail},  
                    dataType:"json",  
                    success:function(data)  
                    {  
                         $('#userModal').modal('show');  
                         $('#idlesson').val(data.idlesson);
                         $('#nomtravail').val(data.nomtravail);
                         $('#descriptiontravail').val(data.descriptiontravail);

                         $('#jour_fin').val(data.jour_fin);
                         $('#heure_fin').val(data.heure_fin);
                         
                         $('#user_uploaded_image').html(data.user_image);
                         
                         $('.modal-title').text("modification du cours "+data.nomtravail);  
                         $('#idtravail').val(idtravail);   
                         $('#action').val("Edit");  
                    }  
               });  
          });

          $(document).on('click', '.delete', function(){
              var idtravail = $(this).attr("idtravail");

              if(confirm("Are you sure you want to delete this?"))
            {
              
                $.ajax({
                      url:"<?php echo base_url(); ?>formateur/supression_travail",
                      method:"POST",
                      data:{idtravail:idtravail},
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
                    url:"<?php echo base_url(); ?>formateur/fetch_cours_requete",
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

          $(document).on('change', '#cours', function(){
              var idcours = $(this).val();
              if(idcours != '')
              {
                // alert(idcours);
                 $.ajax({
                    url:"<?php echo base_url(); ?>formateur/fetch_lesson_requete",
                    method:"POST",
                    data:{idcours:idcours},
                    beforeSend:function()
                    {
                       $('#lessons').html('<div id="loading" style="" ></div>');
                    },
                    success:function(data)
                    {
                       $('#lessons').html(data);

                       $('#idlesson').val(idlesson);
                    }

                 });
              }
              else
              {
                 $('#lessons').html('<option value="">Selectionner une leçon</option>');
                 swal("Error", "veillez complèter la formation", "error");
                 $('#idcours').val("");
                 
              }
              // alert(idv);
          });



          $(document).on('change', '#lessons',function(){
              var idlesson = $(this).val();
              if (idlesson !='') {
                $('#idlesson').val(idlesson);
              }
              else{
                $('#idlesson').val("");
                swal("Ouf!!!", "Veillez complèter la leçon 😰", "error");
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
             url:"<?php echo base_url(); ?>formateur/pagination_view_travail/",
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
             url:"<?php echo base_url(); ?>formateur/fetch_search_view_travail",
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
                  url: '<?php echo base_url(); ?>formateur/fetch_limit_view_travail',
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


         /*
         script pour les travaux remis
         ==============================
         ******************************
         ******************************
         ==============================

         */

         $(document).on('click', '.remise', function(event) {
           event.preventDefault();
           /* Act on the event */
           var idtravail = $(this).attr("idtravail");
           var trav = $('#trav').val(idtravail);
           if (trav !='') {
            showPagination_travaux(1);
           }
           else{
            swal("Erreur!!!!", "travail est vide", "info");
           }
           
           
         });

         function showPagination_travaux(page)
         {

            var idtravail =  $('#trav').val();

            if (idtravail != '') {

                $.ajax({
                  url:"<?php echo base_url(); ?>formateur/pagination_travaux_remis/"+page,
                  method:"POST",
                  dataType:"json",
                  data:{idtravail:idtravail},
                  beforeSend:function()
                  {
                     $('#country_table2').html('<div id="loading" style="" ></div>');
                  },
                  success:function(data)
                  {
                    $('#userModal2').modal('show'); 
                    $('.modal-title').text("Liste de travaux remis");  
                    $('#country_table2').html(data.country_table);
                    $('#pagination_link2').html(data.pagination_link2);
                  }
                });
            }  

         }

        $(document).on("click", ".pagination_filter li a", function(event){
          event.preventDefault();
          var page = $(this).data("ci-pagination-page");
          showPagination_travaux(page);

        });

        


        
      });
    </script>





</body>

</html>