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

                    		<!-- mes script commencent -->
		                      <div class="col-md-12">
		                         <div class="row">
		                           <div class="col-md-12">
		                             <button class="btn btn-dim btn-sm btn-outline-secondary pull-right  mb-4" id="add_button" data-toggle="modal" data-target="#userModal"><i class="fa fa-plus"></i>Effectuer l'opération</button>
		                           </div>
		                         </div>
		                      </div>
		                      <!-- insertion de tableau -->
		                      <div class="col-md-12">
		                        <div class="table-responsive">
		                            <table class="table-striped  nk-tb-list nk-tb-ulist dataTable no-footer" data-auto-responsive="false" id="user_data" role="grid" aria-describedby="DataTables_Table_1_info">
		                                <thead>  
		                                    <tr>
                                            <th width="25%">Nom de la place</th>   
		                                        <th width="25%">Nom de stade</th>  
		                                        <th width="40%">Mise à jour</th>
		                                         
		                                        
		                                        <th width="5%">Modifier</th> 
		                                        <th width="5%">Supprimer</th>  
		                                    </tr>  
		                               </thead> 

		                               

                                    <tfoot>  
                                        <tr>  
                                            <th width="25%">Nom de la place</th>   
                                            <th width="25%">Nom de stade</th>  
                                            <th width="40%">Mise à jour</th>
                                             
                                            
                                            <th width="5%">Modifier</th> 
                                            <th width="5%">Supprimer</th>   
                                        </tr>  
                                   </tfoot>   
		                                
		                            </table>
		                        </div>
		                      </div>
		                      <!-- fin insertion tableau -->
		                      <!-- fin de mes scripts -->
		                   
		        			<!-- fin -->
                    		
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
                <div class="modal-header bg-secondary text-center">
                    <span class="nk-block-title modal-title text-white">Paramètrage admin</span>
                    
                </div>
                <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                <div class="modal-body modal-body-lg">
                    
                    <div class="nk-block">

                    	<form method="post" id="user_form" enctype="multipart/form-data" class="col-md-12 row">

                        <div class="form-group col-md-12">
                          <label><i class="fa fa-male"></i>Selectionnez le Stade</label>  
                              <select name="stade_ok" id="stade_ok" class="form-control selectpicker" data-live-search="true">
                                <option value="">Selectionnez le Stade</option>
                                <?php
                                  if ($stades->num_rows() > 0) {
                                   foreach ($stades->result_array() as $key) {
                                      ?>
                                       <option value="<?php echo($key['idstade']) ?>"><?php echo($key['nom']) ?></option>
                                      <?php
                                   }
                                  }
                                  else{
                                    ?>
                                    <option value="">aucun stade n'est disponible</option>
                                    <?php
                                  }
                                ?>
                                
                              </select>
                        </div>

                    		
                    		<div class="col-md-12 mb-2">
                          <label><i class="fa fa-map-marker"></i> Nom de la place</label>
                    			<input type="text" name="nomPlace" id="nomPlace" class="form-control" placeholder="Entrez le nom de la place" />
                    		</div>



                    		

                    		<div class="col-md-12" style="margin-bottom: 20px;">
                    			<div class="row">
                    				<div class="col-md-4"></div>
                    				<div class="col-md-4">

                    					<div class="buysell-field form-action text-center mb-2">
				                            <div>

                                      <input type="hidden" name="idplace" id="idplace" />
				                            	<input type="hidden" name="idstade" id="idstade" />
             									        <input type="hidden" name="operation" id="operation" />
			                    				     <input type="submit" name="action" id="action" class="btn btn-secondary btn-lg" value="Add" />
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


     <script type="text/javascript" language="javascript" >  
     $(document).ready(function(){  

     	 var  $message = '';
          $('#add_button').click(function(){  
               $('#user_form')[0].reset();  
               $('.modal-title').text("Paramètrage de place pour le stade");  
               $('#action').val("Add");  
          })  
          // var dataTable = $('#user_data').DataTable();
          var dataTable = $('#user_data').DataTable({  
               "processing":true,  
               "serverSide":true,  
               "order":[],  
               "ajax":{  
                    url:"<?php echo base_url() . 'entreprise/fetch_place'; ?>",  
                    type:"POST"  
               },  
               "columnDefs":[  
                    {  
                         "targets":[0, 0, 0],  
                         "orderable":false,  
                    },  
               ],  
          });

          $(document).on('submit', '#user_form', function(event){  
               event.preventDefault();  
               var nomPlace = $('#nomPlace').val();
               var idstade = $('#idstade').val();  
               
               var action = $('#action').val();


               if(nomPlace != '' && idstade !='')
                {

                  if (action =="Add") {
                       
                      $.ajax({  
                           url:"<?php echo base_url() . 'entreprise/operation_place'?>",  
                           method:'POST',  
                           data:new FormData(this),  
                           contentType:false,  
                           processData:false,  
                           success:function(data)  
                           {  
                                
                               

                                $('#user_form')[0].reset();  
                                $('#userModal').modal('hide');
                                var message  = data;
                                if (message == "echec!!!") {
                                  swal("Error!!!", "Erreur! cette place existe déjà", "info");
                                }
                                else{
                                  swal('succès 👌', data, 'success'); 
                                }
                                dataTable.ajax.reload();  
                           }  
                      });

                  }
                  if (action == 'Edit') {

                        $.ajax({  
                             url:"<?php echo base_url() . 'entreprise/modification_place'?>",  
                             method:'POST',  
                             data:new FormData(this),  
                             contentType:false,  
                             processData:false,  
                             success:function(data)  
                             {  
                                  swal('succès 👌', data, 'success');
                                   

                                  $('#user_form')[0].reset();  
                                  $('#userModal').modal('hide');  
                                  dataTable.ajax.reload();  
                             }  
                        });

                  }

                }
                else
                {
                  swal("Erreur 🙆!!!", "Tous les champs doivent être remplis", "error");
                }


                 
          });  


          $(document).on('click', '.update', function(){  
               var idplace = $(this).attr("idplace");  
               $.ajax({  
                    url:"<?php echo base_url(); ?>entreprise/fetch_single_place",  
                    method:"POST",  
                    data:{idplace:idplace},  
                    dataType:"json",  
                    success:function(data)  
                    {  
                         $('#userModal').modal('show');  
                         $('#nom').val(data.nom);
                         $('#nomPlace').val(data.nomPlace);
                         $('#idstade').val(data.idstade);
                         
                         $('.modal-title').text("modification place pour le stade "+data.nom);  
                         $('#idplace').val(idplace);   
                         $('#action').val("Edit");  
                    }  
               });  
          });

          $(document).on('click', '.delete', function(){
              var idplace = $(this).attr("idplace");

              if(confirm("Are you sure you want to delete this?"))
		          {
		            
		           		$.ajax({
	                    url:"<?php echo base_url(); ?>entreprise/supression_place",
	                    method:"POST",
	                    data:{idplace:idplace},
	                    success:function(data)
	                    {
	                       swal('succès 👌', data, 'success');
	                        
	                       dataTable.ajax.reload();
	                    }

                  });
		          }
		          else
		          {
		            swal("Ouf!!!", "opération annulée :)", "info");
		          }
          });

          $("#stade_ok").on("change", function(t) {

            var idstade = $(this).val();
            if (idstade !='') {
                $('#idstade').val(idstade);
            }
            else{

                 var erreur = "Veillez complèter le stade 😰";
                 swal("Oups!!!",erreur,'error');
            }
        });

        





     });  
     </script>






</body>

</html>