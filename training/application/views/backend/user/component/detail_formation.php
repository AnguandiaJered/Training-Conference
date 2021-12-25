<div class="col-md-12">
	<div class="row resultat_menus">

		<div class="col-md-12" style="margin-top: 10px;">

			<?php 
	
				if ($offre_tag->num_rows() <= 0) {
					# code...
				}
				else{

					foreach ($offre_tag->result_array() as $row) {

						
							?>

							<div class="col-md-12 p-r-25 p-r-15-sr991 mb-2">

					          <div class="card">
					            <div class="card-body">
					              <div class="col-md-12">

					                <div class="row">

					                  <div class="col-md-4">
					                    <a href="http://localhost:82/hubujn/home/formation/10" class="img-fluid">
					                      <img src="<?php echo(base_url()) ?>upload/formations/<?php echo($row['image']) ?>" alt="IMG" class="img img-responsive img-thumbnail" style="height: 200px; border-color:#DC4405;">
					                    </a>
					                   
					                  </div>

					                  <div class="col-md-8">

					                  	

					                    <h5 class="card-title"><?php echo($row['nom']) ?></h5>
					                    
					                    <div class="card-text">
					                      Debit inscription: <span class="text-warning">
					                        <i class="fa fa-calendar mr-1"></i> <?php echo(nl2br(substr(date(DATE_RFC822, strtotime($row["date_debit"])), 0, 23))) ?>
					                      </span>
					                    </div>

					                    <div class="card-text">
					                      Debit fin de la formation: <span class="text-success">
					                        <i class="fa fa-calendar mr-1"></i> <?php echo(nl2br(substr(date(DATE_RFC822, strtotime($row["date_fin"])), 0, 23))) ?>
					                      </span>
					                    </div>
					                    <div class="card-text">
					                      Fin inscription: <span class="text-warning">
					                        <i class="fa fa-calendar mr-1"></i> <?php echo(nl2br(substr(date(DATE_RFC822, strtotime($row["fin_inscription"])), 0, 23))) ?>
					                      </span>
					                    </div>

					                    <div class="col-md-12">
					                    	<?php echo(html_entity_decode($row["description"])) ?>
					                    </div>
					                    
					                   

					                  </div>


					                </div>

					              </div>
					            </div>
					          </div>


					        </div>
							
							

							<!-- debit et fin -->

							<?php 
							$jour = date('Y-m-d');
							if ($row['fin_inscription'] >= $jour) {
								# code...
								?>

								<!-- .contenues -->
				                <div class="col-md-12">
				                	<div class="row">
				                		<div class="col-md-12">

				                			<div class="col-md-12 card">
							                    <form class="row card-body" method="POST" 
							                     action="<?php echo(base_url()) ?>user/operation_inscription_formations">

							                    	<div class="col-md-12">
														<div class="text-center" align="center">
											        		<?php
										                    if($this->session->flashdata('message'))
										                    {
										                        echo '
										                        <div class="alert alert-success">
										                        <button class="close" data-dismiss="alert">x</button>
										                            '.$this->session->flashdata("message").'
										                        </div>
										                        ';
										                    }
										                    elseif ($this->session->flashdata('message2')) {
										                      echo '
										                        <div class="alert alert-danger">
										                        <button class="close" data-dismiss="alert">x</button>
										                            '.$this->session->flashdata("message2").'
										                        </div>
										                        ';
										                    }
										                    else{

										                    }
										                    ?>
											        	</div>
										            </div>



							                      <div class="form-group col-md-6">
							                        <label><i class="fa fa-pencil"></i> Nom complet de l'apprenant</label>
							                        <input type="text" name="nomcomplet" id="nomcomplet" class="form-control" placeholder="Nom de l'apprenant" value="<?php echo($first_name) ?> <?php echo($last_name) ?>" />
							                        
							                      </div>

							                      <div class="form-group col-md-6">
							                        <label><i class="fa fa-google"></i> Email de l'apprenant</label>
							                        <input type="email" name="email" id="email" class="form-control" placeholder="nom@gmail.com" value="<?php echo($email) ?>" />
							                        
							                      </div>

							                      <div class="form-group col-md-6">
							                        <label><i class="fa fa-phone"></i> Téléphone</label>
							                        <input type="text" name="telephone" id="telephone" class="form-control" placeholder="+243970524665" value="<?php echo($telephone) ?>" />

							                      </div>

							                      <div class="form-group col-md-6">
							                        <label><i class="fa fa-tag"></i> Niveau d'étude</label>
							                        <input type="text" name="niveau_etude" id="niveau_etude" class="form-control" placeholder="Licencié" />

							                      </div>

							                      

							                      <div class="form-group col-md-12">
							                        <label><i class="fa fa-map-marker"></i> Adresse domicile </label>
							                        <input type="text" name="domicile" id="domicile" class="form-control" placeholder="Adresse domicile" value="<?php echo($full_adresse) ?>" />

							                      </div>

							                      <div class="col-md-12 form-group">
							                      	
									                <input type="hidden" name="idf" id="idf" placeholder="idf" value="<?php echo($row['idf']) ?>">
									               
									               <button type="submit" name="action" id="action" class="btn btn-hub pull-right">
									               	<i class="fa fa-save mr-1"></i> Je m'inscris
									               </button>
									               
							                      </div>

							                      
							                    </form>
							                  </div>
				                			
				                		</div>
				                	</div>
				                </div>
				                 <!-- fin contenus -->

								<?php
							}
							else{
								?>
								 <div class="col-md-12">
								 	<div class="row">
								 		<div class="col-md-4"></div>
								 		<div class="col-md-4">
								 			 <a class="btn btn-dark btn-sm" href="<?php echo(base_url()) ?>user/formations_all"><i class="fa fa-eye"></i> voir plus de formations</a>
								 		</div>
								 		<div class="col-md-4"></div>
								 	</div>
								 </div>
								<?php
							}

							 ?>
							
							<!-- fin -->



							<?php
						
						# code...
					}
				}


			?>
			
		</div>
		
	</div>
	
</div>

 










