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
                             <?php include("component/objet_basic_paie.php") ?>
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



     <!-- modal ajout radio -->
    <div class="modal fade" tabindex="-1" role="dialog" id="userModal">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                <div class="modal-body modal-body-lg">
                    <div class="nk-block-head nk-block-head-xs text-center">
                        <span class="nk-block-title modal-title">Paramètrage admin</span>
                        
                    </div>
                    <div class="nk-block">

                      

                      <form method="post" id="user_form" enctype="multipart/form-data" class="col-md-12">
                        
                        <div class="col-md-12">
                            <div class="row">

                               <div class="form-group col-md-12">
                                  <label><i class="fa fa-user"></i> Nom de  la personne</label>
                                     <select  name="Hommes" id="Hommes" class="form-control selectpicker" data-live-search="true">
                                      <?php 
                                      if ($Hommes->num_rows() > 0) {
                                        ?>
                                        <option value="">Selectionnez la personne</option>
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
                                    <label><i class="fa fa-calendar"></i> Date de  paiement </label>
                                    <input type="date" name="date_paie" id="date_paie" class="form-control" />  
                                </div>

                                <div class="form-group col-md-12">
                                    <label><i class="fa fa-calendar"></i> Entrez le montant</label>
                                    <input type="number" min="1" name="montant" id="montant" class="form-control" placeholder="10 $" />  
                                </div>

                                 <div class="form-group col-md-12">
                              <label><i class="fa fa-book"></i> Entrez le motif de paiement</label>
                              <textarea name="motif" id="motif" placeholder="Entrez le motif de paiement" class="form-control"></textarea>
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

                              <input type="hidden" name="idpersonne" id="idpersonne" placeholder="idpersone" />
                              <input type="hidden" name="idp" id="idp" />
                              <input type="hidden" name="operation" id="operation" />

                              <input type="submit" name="action" id="action" class="btn btn-hub" value="Add" />
                            </div>
                            <div class="pt-3">
                                <a href="javascript:void(0);" data-dismiss="modal" class="link link-danger">Annuler l'opération</a>
                            </div>
                        </div>


                      </form>
                        
                        
                        
                    </div><!-- .nk-block -->
                </div><!-- .modal-body -->
            </div><!-- .modal-content -->
        </div><!-- .modla-dialog -->
    </div>
    <!-- fin modal-->

   
   <?php include('_script.php') ?>

   <script type="text/javascript">
     $(document).ready(function() {

      function load_country_data(page)
          {
            $.ajax({
             url:"<?php echo base_url(); ?>admin/pagination_view_paiements/"+page,
             method:"GET",
             dataType:"json",
              beforeSend:function()
              {
                $('#country_table').html('<div class="col-md-12 post_data"><p><span class="content-placeholder" style="width:100%; height: 30px;">&nbsp;</span></p><p><span class="content-placeholder" style="width:100%; height: 100px;">&nbsp;</span></p></div>');
              },
             success:function(data)
             {
              $('#country_table').html(data.country_table);
              $('#pagination_link').html(data.pagination_link);
             }
            });
          }

         $(document).on("click", ".pagination li a", function(event){
            event.preventDefault();
            var page = $(this).data("ci-pagination-page");
            load_country_data(page);
         });

         views();
         load_country_data(1);

         function load_data(query)
         {
            $.ajax({
             url:"<?php echo base_url(); ?>admin/fetch_search_view_paiements",
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
            load_country_data(1);
          }
         });

         function views(){
           var recherche = $('#search_text').val();
           if (recherche !='') {
            load_data(recherche);
           }
           else{
            load_country_data(1);
           }
         }


         $('.delete_checkbox').click(function(){
            if($(this).is(':checked'))
            {
             $(this).closest('tr').addClass('bg-red');
            }
            else
            {
             $(this).closest('tr').removeClass('bg-red');
            }
          });

        

          $(document).on('click', '.invvalider_liste', function(event) {
            event.preventDefault();
            /* Act on the event */

            event.preventDefault();
              var checkbox = $('.delete_checkbox:checked');

              if(confirm("Etes-vous sûre de vouloir le valider?"))
              {
                
                  if(checkbox.length > 0)
                {
                 var checkbox_value = [];
                 $(checkbox).each(function(){
                  checkbox_value.push($(this).val());

                 });

                 // alert("email:"+checkbox_value);
                 $.ajax({
                      url:"<?php echo base_url(); ?>admin/invalider_multiple_fausse_tranaction",
                      method:"POST",
                      data:{
                          checkbox_value:checkbox_value
                      },
                      success:function(data)
                      {
                          
                          showSuccessMessage(data);
                          
                          $('.bg-red').fadeOut(1500);

                          load_country_data(1);

                          
                      }
                 });
                }
                else
                {
                  showErrrorMessage("veillez selectionner au moins une fausse transaction");
                 
                }

              }
              else
              {

                showErrrorMessage("opération annulée");

              }

          });



          /*
          *operation ajout paiement local
          *==============================
          *==============================
          */

          $('#add_button').click(function(){  
               $('#user_form')[0].reset();  
               $('.modal-title').text("Paiement des start-ups");  
               $('#action').val("Add");  
               $('#user_uploaded_image').html(''); 
               $('.aff').hide(); 
          });

           $(document).on('submit', '#user_form', function(event){  
               event.preventDefault();  
               var idpersonne = $('#idpersonne').val(); 
               var date_paie = $('#date_paie').val();
               var montant = $('#montant').val();
               var motif = $('#motif').val();
               
               var nom_complet = $('#nom_complet').val();
               
               
               var action = $('#action').val();

               // alert(nomtbl_info+" description:"+description+" action:"+action);

               if(idpersonne != ''  && date_paie != '' && montant !='' && motif !='')
                {

                  if (action =="Add") {
                       
                     if (montant >= 1) {

                       $.ajax({  
                             url:"<?php echo base_url() . 'admin/operation_paiement'?>",  
                             method:'POST',  
                             data:new FormData(this),  
                             contentType:false,  
                             processData:false,  
                             success:function(data)  
                             {  
                                  swal('succès', ''+data, 'success'); 
                                  $('#user_form')[0].reset();  
                                  $('#userModal').modal('hide');  
                                 load_country_data(1);  
                             }  
                        });

                     }
                     else{
                      swal('erreur!!!', "veillez entrer un montant supperieur à 1$", 'info');
                     }
                        // alert("insertion");

                  }
                  if (action == 'Edit') {

                      if (montant >= 1) {

                         $.ajax({  
                               url:"<?php echo base_url() . 'admin/modification_paiement'?>",  
                               method:'POST',  
                               data:new FormData(this),  
                               contentType:false,  
                               processData:false,  
                               success:function(data)  
                               {  
                                    swal('succès', ''+data, 'success'); 
                                    $('#user_form')[0].reset();  
                                    $('#userModal').modal('hide');  
                                    dataTable.ajax.reload();  
                               }  
                          });

                      }
                       else{
                        swal('erreur!!!', "veillez entrer un montant supperieur à 1$", 'info');
                      }

                        

                  }

                }
                else
                {
                  // swall("Tous les champs doivent être remplis", "", "danger");
                  swal("Erreur!!!", "Tous les champs doivent être remplis", "error");
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




       
     });
   </script>

</body>

</html>