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
                                     <button class="btn btn-dim btn-sm btn-outline-primary pull-right  mb-4" id="add_button" data-toggle="modal" data-target="#userModal"><i class="fa fa-plus"></i>Effectuer l'opération</button>
                                   </div>
                                 </div>
                              </div>
                              <!-- insertion de tableau -->
                              <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table-striped  nk-tb-list nk-tb-ulist dataTable no-footer" data-auto-responsive="false" id="user_data" role="grid" aria-describedby="DataTables_Table_1_info">
	                                    <thead>  
                                            <tr>  
                                                 <th width="10%">Icone</th>  
                                                 <th width="10%">Nom du site</th>  
                                                 <th width="15%">Adresse</th>
                                                 <th width="5%">Téléphone principal</th>
                                                 <th width="15%">Adresse</th>
                                                 <th width="5%">Facebook</th>
                                                 <th width="5%">Twitter</th>  
                                                 <th width="5%">Linkedin</th> 
                                                
                                                 <th width="5%">Modifier</th> 
                                                 <th width="5%">Supprimer</th>  
                                            </tr>  
                                       </thead>

                                       <tfoot>  
                                            <tr>  
                                                 <th width="10%">Icone</th>  
                                                 <th width="10%">Nom du site</th>  
                                                 <th width="15%">Adresse</th>
                                                 <th width="5%">Téléphone principal</th>
                                                 <th width="15%">Adresse</th>
                                                 <th width="5%">Facebook</th>
                                                 <th width="5%">Twitter</th>  
                                                 <th width="5%">Linkedin</th> 
                                                
                                                 <th width="5%">Modifier</th> 
                                                 <th width="5%">Supprimer</th>  
                                            </tr>  
                                       </tfoot>    
	                                    
	                                </table>
                                </div>
                              </div>
                              <!-- fin insertion tableau -->
                        	<!-- fin de mes scripts -->
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
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
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

		                            <div class="form-group col-md-6">
		                                <label> <i class="fa fa-globe"></i> Entrer le nom du site</label>
		                                <input type="text" name="nom_site" id="nom_site" class="form-control" placeholder="Nom du site" />
		                              
		                            </div>

		                            <div class="form-group col-md-6">
		                                <label><i class="fa fa-google"></i> Adresse email </label>
		                                <input type="text" name="email" id="email" class="form-control" placeholder="Adresse email" />  
		                            </div>

		                            <div class="form-group col-md-6">
		                                <label><i class="fa fa-phone"></i> Numéro de téléphone</label>
		                                <input type="text" name="tel1" id="tel1" class="form-control" placeholder="Numéro de téléphone" />  
		                            </div>

		                            <div class="form-group col-md-6 jf-inputwithicon">
		                                <label><i class="fa fa-phone"></i> Autre numéro </label>
		                                <input type="text" name="tel2" id="tel2" class="form-control" placeholder="Autre numéro de téléphone" />
		                              
		                            </div>

		                            <div class="form-group col-md-6 ">
		                                <label><i class="fa fa-facebook"></i> Page facebook</label>
		                                <input type="text" name="facebook" id="facebook" class="form-control" placeholder="htpps://facebook.com/" />
		                              
		                            </div>

		                            <div class="form-group col-md-6">
		                                <label><i class="fa fa-twitter"></i> Page twitter</label>
		                                <input type="text" name="twitter" id="twitter" class="form-control" placeholder="htpps://twitter.com/" />
		                              
		                            </div>

		                            <div class="form-group col-md-12">
		                                <label><i class="fa fa-linkedin"></i> Page linkedin</label>
		                                <input type="text" name="linkedin" id="linkedin" class="form-control" placeholder="htpps://linkedin.com/" />
		                              
		                            </div>

		                             <div class="form-group col-md-12">
		                                <label><i class="fa fa-camera"></i>Selectionner l'icone</label>
		                                <input type="file" name="user_image" id="user_image" class="form-control" />
		                                
		                             </div>
		                            
		                        </div>
		                    </div>

		                    <div class="form-group col-md-12">
		                        <label><i class="fa fa-map-marker"></i> Adresse domicile </label>
		                        <textarea name="adresse" id="adresse" placeholder="Adresse domicile" class="form-control"></textarea>
		                    </div>

		                    <div class="form-group jf-inputwithicon col-md-12">
		                        <label><i class="fa fa-book"></i> Terme de contrat</label>
		                        <textarea class="form-control" name="termes" id="termes" placeholder="Le terme de contrat"></textarea>
		                    </div>

		                    <div class="form-group jf-inputwithicon col-md-12">
		                        <label><i class="fa fa-pencil"></i> Les conditions et politique de confidentialité</label>
		                        <textarea class="form-control" name="confidentialite" id="confidentialite" placeholder="Les conditions de confidentialité"></textarea>
		                    </div>

                        <!-- debit ajout -->
                        <div class="form-group jf-inputwithicon col-md-12">
                            <label><i class="fa fa-pencil"></i> Description du site</label>
                            <textarea class="form-control" name="description" id="description" placeholder="Description du site"></textarea>
                        </div>
                        <!-- fin ajout -->

                        <!-- debit ajout -->
                        <div class="form-group jf-inputwithicon col-md-12">
                            <label><i class="fa fa-pencil"></i> La mission du site</label>
                            <textarea class="form-control" name="mission" id="mission" placeholder=" La mission du site"></textarea>
                        </div>
                        <!-- fin ajout -->

                        <!-- debit ajout -->
                        <div class="form-group jf-inputwithicon col-md-12">
                            <label><i class="fa fa-pencil"></i> L'objectif du site</label>
                            <textarea class="form-control" name="objectif" id="objectif" placeholder=" L'objectif du site"></textarea>
                        </div>
                        <!-- fin ajout -->

                        <!-- debit ajout -->
                        <div class="form-group jf-inputwithicon col-md-12">
                            <label><i class="fa fa-pencil"></i> Blog pour information</label>
                            <textarea class="form-control" name="blog" id="blog" placeholder=" Blog pour information"></textarea>
                        </div>
                        <!-- fin ajout -->




		                    <div class="col-md-12">
		                    	<div class="row">
		                    		<div class="col-md-4"></div>
		                    		<div class="col-md-4 mb-2">
		                    			<span id="user_uploaded_image"></span>
		                    		</div>
		                    		<div class="col-md-4"></div>
		                    	</div>
		                    </div>

		                    <div class="buysell-field form-action text-center mb-2">
	                            <div>

	                            	<input type="hidden" name="idinfo" id="idinfo" />
						            <input type="hidden" name="operation" id="operation" />
						            <input type="submit" name="action" id="action" class="btn btn-primary" value="Add" />
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



  	
    <script type="text/javascript">
    	$(document).ready(function(){
    		// alert("cool");
    	});
    </script>
  
    <script type="text/javascript" language="javascript" >  
     $(document).ready(function(){  
          $('#add_button').click(function(){  
               $('#user_form')[0].reset();  
               $('.modal-title').text("Paramètrage des informations basiques du site");  
               $('#action').val("Add");  
               $('#user_uploaded_image').html('');  
          })  
          // var dataTable = $('#user_data').DataTable();
          var dataTable = $('#user_data').DataTable({  
               "processing":true,  
               "serverSide":true,  
               "order":[],  
               "ajax":{  
                    url:"<?php echo base_url() . 'admin/fetch_tbl_info'; ?>",  
                    type:"POST"  
               },  
               "columnDefs":[  
                    {  
                         "targets":[0, 3, 4],  
                         "orderable":false,  
                    },  
               ],  
          });

          $(document).on('submit', '#user_form', function(event){  
               event.preventDefault();  
               var nom_site = $('#nom_site').val();  
               var tel1 = $('#tel1').val();
               var tel2 = $('#tel2').val();
               var adresse = $('#adresse').val();
               var facebook = $('#facebook').val();
               var twitter = $('#twitter').val();
               var linkedin = $('#linkedin').val();
               var email = $('#email').val();
               var termes = $('#termes').val(); 
               var confidentialite = $('#confidentialite').val();  
               var extension = $('#user_image').val().split('.').pop().toLowerCase(); 
               var action = $('#action').val();


               if(extension != '')  
               {  
                    if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)  
                    {  

                         swal("Oups!!!","Invalid Image File","error");

                         $('#user_image').val('');  
                         return false;  
                    }  
               }

               // alert(nomtbl_info+" description:"+description+" action:"+action);


               if(nom_site != '' && tel1 != '' && tel2 != '' && adresse != '' && facebook != '' && twitter != '' && linkedin != '' && email != '')
                {

                  if (action =="Add") {
                       
                      $.ajax({  
                           url:"<?php echo base_url() . 'admin/operation_tbl_info'?>",  
                           method:'POST',  
                           data:new FormData(this),  
                           contentType:false,  
                           processData:false,  
                           success:function(data)  
                           {  
                                var message = data;
                                swal("Succès!!!", message, "success"); 
                                $('#user_form')[0].reset();  
                                $('#userModal').modal('hide');  
                                dataTable.ajax.reload();  
                           }  
                      });
                        // alert("insertion");

                  }
                  if (action == 'Edit') {

                        $.ajax({  
                             url:"<?php echo base_url() . 'admin/modification_tbl_info'?>",  
                             method:'POST',  
                             data:new FormData(this),  
                             contentType:false,  
                             processData:false,  
                             success:function(data)  
                             {  
                                  var message = data;
                         		  swal("Succès!!!", message, "success"); 
                                  $('#user_form')[0].reset();  
                                  $('#userModal').modal('hide');  
                                  dataTable.ajax.reload();  
                             }  
                        });

                  }

                }
                else
                {

                  	var erreur = "Tous les champs doivent être remplis";
	            	 swal("Oups!!!", erreur, "info");
                }


                 
          });  


          $(document).on('click', '.update', function(){  
               var idinfo = $(this).attr("idinfo");  
               $.ajax({  
                    url:"<?php echo base_url(); ?>admin/fetch_single_tbl_info",  
                    method:"POST",  
                    data:{idinfo:idinfo},  
                    dataType:"json",  
                    success:function(data)  
                    {  
                         $('#userModal').modal('show');  
                         $('#nom_site').val(data.nom_site);
                         $('#tel1').val(data.tel1);
                         $('#tel2').val(data.tel2);
                         $('#adresse').val(data.adresse);
                         $('#facebook').val(data.facebook);
                         $('#twitter').val(data.twitter);
                         $('#linkedin').val(data.linkedin);
                         $('#email').val(data.email);  
                         $('#termes').val(data.termes); 
                         $('#confidentialite').val(data.confidentialite);

                         $('#objectif').val(data.objectif);
                         $('#mission').val(data.mission);
                         $('#description').val(data.description);

                         $('#blog').val(data.blog);

                         $('.modal-title').text("modification des informations pour le paramètrage du site");  
                         $('#idinfo').val(idinfo);  
                         $('#user_uploaded_image').html(data.user_image);  
                         $('#action').val("Edit");  
                    }  
               });  
          });

          $(document).on('click', '.delete', function(){
              var idinfo = $(this).attr("idinfo");

              if(confirm("Are you sure you want to delete this?"))
	          {
	            
	           		$.ajax({
                      url:"<?php echo base_url(); ?>admin/supression_tbl_info",
                      method:"POST",
                      data:{idinfo:idinfo},
                      success:function(data)
                      {

                         var message = data;
                         swal("Succès!!!", erreur, "success");
                         dataTable.ajax.reload();
                      }
                    });
	          }
	          else
	          {
	            var erreur = "opération annulée :)";
	            swal("Ouf!!!", erreur, "info");
	          }

                


          });

          const showErrrorMessage = function(erreur) {
		      swal("Ouf!!!", erreur, "info");
		    };

		    const showSuccessMessage = function(message) {
		      swal("Succès!!!", message, "success");
		    };



     });  
     </script>



</body>

</html>