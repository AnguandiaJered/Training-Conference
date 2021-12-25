<div class="col-md-12">
	<div class="row resultat_menus">

		<div class="col-md-12" style="margin-top: 10px;">

			<?php 
	
				if ($offre_tag->num_rows() <= 0) {
					# code...
				}
				else{

					foreach ($offre_tag->result_array() as $row) {

						$vues  =  $this->db->query("SELECT COUNT(idart) AS total FROM vues WHERE idart=".$row['idart']." ");
						if ($vues->num_rows() <=0) {
							$nombre_vue = 0;
						}
						else{
							foreach ($vues->result_array() as $key_vue) {
								$nombre_vue = $key_vue['total'];
							}
						}

							?>
							
							<!-- debit bloc -->
							<input type="hidden" name="idart" id="idart" class="idart form-control" placeholder="idart" class="form-control" value="<?php echo($row['idart']) ?>">

							<input type="hidden" name="ipv4" id="ipv4" class="form-control ipv4" placeholder="adresse ipv4">
							<!-- fin bloc -->

							<!-- debit et fin -->
							<div class="col-md-12 single-post-container clearfix">
								<div class="single-post col-md-12">
									<div class="img-crop">
										<img src="<?php echo(base_url())?>upload/article/<?php echo($row['image'])?>" class="img-responsive img-thumbnail" alt=" " style="height: 500px;">
										
									</div><!-- img-crop -->
									
									<!-- Post Share Start -->
									<div class="post-share clearfix col-md-12">
										<div class="row">
											<div class="col-md-2"></div>
											<div class="col-md-8 form-inline">

												<span><a href="#"><i class="fa fa-eye mr-1"></i>  <?php echo($nombre_vue) ?>  Vue(s)</a></span> <span class="mr-4"></span>
													
												<span class="date"><i class="fa fa-clock-o"></i>  <?= nl2br(substr(date(DATE_RFC822, strtotime($row['created_at'])), 0, 23));?></span>

					                      		Partagez ce lien &nbsp;<i class="fa fa-hand-o-right mr-4"></i>


					                     		<a href="javascript:void(0);" class="btn-circle mr-2 btn_facebook"><i class="fa fa-facebook"></i></a>

					                      		<a href="javascript:void(0);" class="btn-circle mr-2 btn_twitter"><i class="fa fa-twitter"></i></a>

					                      		<a href="javascript:void(0);" class="btn-circle mr-2 btn_google"><i class="fa fa-google"></i></a>

					                      		<a href="javascript:void(0);" class="btn-circle mr-2 btn_linkedin"><i class="fa fa-linkedin"></i></a>
					                      		
					                      		<hr>

					                      
					                   		</div>
											<div class="col-md-2"></div>
										</div>
										
									</div><!-- Post Share End -->

									<div class="col-md-12 col-md-offset-2">
										<a class="post-category" href="<?php echo(base_url()) ?>home/publication/<?php echo($row['idcat']) ?>"> </a>
										<div class="post-title">
											<h6><?php echo (nl2br($row['nom'])); ?> </h6>
										</div>
										
										
									</div>
									
									<div class="clearfix"></div>

									<div class="clearfix col-md-12">

					                   <?php echo(html_entity_decode($row['description'])) ?>
					                  
					                </div>
									
									<div class="post-text-content clearfix col-md-12">
										<?php echo(html_entity_decode($row['description'])) ?>

										 <!-- script commentaire -->
								        <?php 
								        if ($commentaires->num_rows() >0) {
								        	foreach ($commentaires->result_array() as $key) {
								        		# code...
								        		?>
								        		<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
										        	<?php echo(html_entity_decode($key['etape1'])) ?>
										        </div>
										        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
										        	<?php echo(html_entity_decode($key['etape2'])) ?>
										        </div>

										       <!--  -->
										       
								        		<?php
								        	}
								        	# code...
								        }
								        else{

								        }

								        ?>
								        <!-- fin commentaire -->


									</div><!-- post-text-content -->
									
									
									
									
									
								</div><!-- single-post -->
								
							</div>
							<!-- fin -->



							<?php
						
						# code...
					}
				}


			?>
			
		</div>
		
	</div>
	
</div>

 










