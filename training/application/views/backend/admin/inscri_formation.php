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

   
   <?php include('_script.php') ?>


   <!-- modal  -->
   <div id="userModal" class="modal fade">
      <div class="modal-dialog modal-lg">
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

                      <div class="form-group col-md-6">
                        <label><i class="fa fa-pencil"></i> Nom complet de l'apprenant</label>
                        <input type="text" name="nomcomplet" id="nomcomplet" class="form-control" placeholder="Nom de l'apprenant" />
                        
                      </div>

                      <div class="form-group col-md-6">
                        <label><i class="fa fa-google"></i> Email de l'apprenant</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="nom@gmail.com" />
                        
                      </div>

                      <div class="form-group col-md-6">
                        <label><i class="fa fa-phone"></i> Téléphone</label>
                        <input type="text" name="telephone" id="telephone" class="form-control" placeholder="+243970524665" />

                      </div>

                      <div class="form-group col-md-6">
                        <label><i class="fa fa-tag"></i> Niveau d'étude</label>
                        <input type="text" name="niveau_etude" id="niveau_etude" class="form-control" placeholder="Licencié" />

                      </div>

                      

                      <div class="form-group col-md-12">
                        <label><i class="fa fa-map-marker"></i> Adresse domicile </label>
                        <input type="text" name="domicile" id="domicile" class="form-control" placeholder="Adresse domicile" />

                      </div>

                      <div class="form-group col-md-6">
                        <label><i class="fa fa-calendar"></i> Année de formation </label>
                       <select class="form-control" id="idannee" name="idannee">
                         <option value="">Selectionnez l'année de formation</option>
                         <option value="2021">2021</option>
                         <option value="2022">2022</option>
                         <option value="2023">2023</option>
                         <option value="2024">2024</option>
                         <option value="2025">2025</option>
                       </select>

                      </div>

                      <div class="form-group col-md-6">
                        <label><i class="fa fa-pencil"></i> Selectionnez la Formation </label>
                       <select class="form-control" id="idformation" name="idformation">
                         
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
                                <option value="">Aucun article n'est diponible</option>
                                <?php
                              }
                            ?>
                       </select>

                      </div>

                      
                    </div>
                  </div>
                  <!-- fin contenus -->

                    
              
            </div>
            <div class="modal-footer">

                <input type="hidden" name="idinscription" id="idinscription" placeholder="idinscription">

                <input type="hidden" name="idf" id="idf" placeholder="idf">
                <input type="hidden" name="annee" id="annee" placeholder="annee">
                
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
               $('.modal-title').text("Inscription des apprenants");  
               $('#action').val("Add"); 
                
          })  


          $(document).on('submit', '#user_form', function(event){  
               event.preventDefault();  
               var nomcomplet = $('#nomcomplet').val();  
             
               var email = $('#email').val(); 

               var telephone    = $('#telephone').val();
               var niveau_etude = $('#niveau_etude').val();
               var idf          = $('#idf').val();
               var annee        = $('#annee').val();
               var domicile     = $('#domicile').val();

               var action       = $('#action').val();


               if(nomcomplet != '' && email != '' && idf != ''
                 && annee != '' && telephone != '')
                {

                  if (action =="Add") {
                       
                      $.ajax({  
                           url:"<?php echo base_url() . 'admin/operation_inscription_formations'?>",  
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
                             url:"<?php echo base_url() . 'admin/modification_inscription_formations'?>",  
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
               var idinscription = $(this).attr("idinscription");  
               $.ajax({  
                    url:"<?php echo base_url(); ?>admin/fetch_single_inscription_formations",  
                    method:"POST",  
                    data:{idinscription:idinscription},  
                    dataType:"json",  
                    success:function(data)  
                    {  
                         $('#userModal').modal('show');
                        
                         $('#nomcomplet').val(data.nomcomplet);
                         $('#email').val(data.email);
                         $('#niveau_etude').val(data.niveau_etude);
                         $('#telephone').val(data.telephone);

                         $('#domicile').val(data.domicile);

                         $('#annee').val(data.annee);
                         $('#idf').val(data.idf);
                         $('#nom').val(data.nom);

                         $('.modal-title').text("modification  "+data.nomcomplet+" pour la formation "+data.nom+" débitant le "+data.date_debit+" année "+data.annee);  
                        
                         $('#action').val("Edit");

                         $('#idinscription').val(idinscription);
                         
                    }  
               });  
          });

          $(document).on('click', '.delete', function(){
              var idinscription = $(this).attr("idinscription");

              if(confirm("Are you sure you want to delete this?"))
              {
                
                  $.ajax({
                        url:"<?php echo base_url(); ?>admin/supression_inscription_formations",
                        method:"POST",
                        data:{idinscription:idinscription},
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



          function filtrage(nombre){
            $.ajax({
             url:"<?php echo base_url(); ?>admin/pagination_view_inscription_formations/"+nombre,
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
             url:"<?php echo base_url(); ?>admin/pagination_view_inscription_formations",
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
             url:"<?php echo base_url(); ?>admin/fetch_search_view_inscription_formations",
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