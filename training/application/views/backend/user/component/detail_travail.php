<div class="col-md-12">
	<div class="row resultat_menus">

		<!-- detail cours -->
		<div class="col-md-8">

			<?php

			$logo_cours = ''; 
			$idtravail = 0; 
			$idlesson = 0;
			$idf = 0;  
			$code = 0; 
			$descriptionlesson ='';
			$jour_fin ='';
			$heure_fin ='';
	
				if ($offre_tag->num_rows() <= 0) {
					# code...
				}
				else{

					foreach ($offre_tag->result_array() as $row) {
						$logo_cours = $row['logo'];
						$idtravail = $row['idtravail'];
						$descriptionlesson = $row['descriptionlesson'];
						$jour_fin = $row['jour_fin'];
						$heure_fin = $row['heure_fin'];

						$idlesson = $row['idlesson'];
						$idf = $row['idf'];
						$code = $row['code'];
						

							?>



							<div class="col-md-12">
								<div class="row">
									<div class="col-md-12 mb-3">
										<div class="col-md-12 embed-responsive embed-responsive-16by9">

						                   	<video controls width="250" class="embed-responsive-item">

											    <source src="<?php echo(base_url())?>upload/lesson/<?php echo($row['fichier'])?>"
											            type="video/webm">

											    <source src="<?php echo(base_url())?>upload/lesson/<?php echo($row['fichier'])?>"
											            type="video/mp4">

											    Sorry, your browser doesn\'t support embedded videos.
											</video>
										</div>	
									</div>
									<div class="col-md-12 mb-2">
										<div class="position-absolute top-0 left-0 mt-3 ml-3">
							                <small class="btn btn-xs btn-success btn-pill text-uppercase shadow-soft mb-3"><?php echo (nl2br($row['nomtravail'])); ?></small>
							             </div>

							            <div class="position-absolute bottom-0 left-0 mb-3 ml-4">
							                <div class="d-flex align-items-center flex-wrap">
							                  <ul class="list-inline mt-n1 mb-0 mr-2">
							                    <li class="list-inline-item mx-0"><i class="fa fa-star"></i></li>
							                    <li class="list-inline-item mx-0"><i class="fa fa-star"></i></li>
							                    <li class="list-inline-item mx-0"><i class="fa fa-star"></i></li>
							                    <li class="list-inline-item mx-0"><i class="fa fa-star"></i></li>
							                    <li class="list-inline-item mx-0"><i class="fa fa-star"></i></li>
							                  </ul>
							                  
							                </div>
							            </div>
									</div>

									<div class="col-md-12 mt-5">
										<?php 
										echo(nl2br($row['descriptiontravail']));

										 ?>
									</div>


								</div>
							</div>

							<!-- debit et fin -->
							
							<!-- fin -->



							<?php
						
						# code...
					}
				}


			?>
			
		</div>
		<!-- fin detail -->

		<!-- zone de lesson -->
		<div class="col-md-4">

			<div class="col-md-12">

				<div class="js-sticky-block card card-bordered hs-kill-sticky" data-hs-sticky-block-options="{
                   &quot;parentSelector&quot;: &quot;#stickyBlockStartPoint&quot;,
                   &quot;breakpoint&quot;: &quot;md&quot;,
                   &quot;startPoint&quot;: &quot;#stickyBlockStartPoint&quot;,
                   &quot;endPoint&quot;: &quot;#stickyBlockEndPoint&quot;,
                   &quot;stickyOffsetTop&quot;: 12,
                   &quot;stickyOffsetBottom&quot;: 12
                 }" style="">
              <div class="position-relative p-1">
                <!-- Video Popup -->
                
                 <img class="card-img-top" src="<?php echo(base_url())?>upload/cours/<?php echo($logo_cours)?>" alt="Image Description">

	               <hr>

					<div id='horloge' class="text-center" style="background-color:#1C1C1C;color:silver;font-size:40px;"></div>
                <!-- End Video Popup -->
              </div>

              <div class="card-body">
               
               

               



                 <?php 

                    $date = date("Y-m-d");
					$heure = date("H:i:s");
					$today = $date.' '.$heure;
					$limite = $jour_fin.' '.$heure_fin;

					if ($today > $limite) {
						# code...

						// echo("idtravail:".$idtravail.' idlesson:'.$idlesson." idf:".$idf." code:".$code);

						// echo($today.' =>'.$jour_fin.' '.$heure_fin);
						?>
						<div class="col-md-12 alert alert-success mb-1">
							<i class="fa fa-clock-o mr-1"></i> <span class="text-success"> Fin de dépôt:</span> <span class="text-danger"><?php echo(nl2br(substr(date(DATE_RFC822, strtotime($today)), 0, 23))) ?></span>
						</div>


						 <!-- Icon Block -->
		                <div class="media text-body font-size-1 mb-2">
		                  <div class="min-w-3rem text-center mr-3">
		                    <i class="fa fa-certificate"></i>
		                  </div>
		                  <div class="media-body">
		                    <?php echo(substr($descriptionlesson, 0,100)) ?>...
		                  </div>
		                </div>
		                <!-- End Icon Block -->

		                 <h5 class="h5 text-center">Soumettre votre travail</h5>



						<div class="col-md-12 card">

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


							<form method="POST" action="<?php echo(base_url()) ?>user/operation_remise/<?php echo($idtravail) ?>/<?php echo($idlesson) ?>/<?php echo($idf) ?>/<?php echo($code) ?>" enctype="multipart/form-data" class="row card-body">

								<div class="col-md-12 form-group mb-2">
									<label><i class="fa fa-file mr-1"></i> Attachez votre travail</label>
									<input type="file" name="user_image" id="user_image" class="form-control-file">
								</div>
								<div class="col-md-12 form-group">
									<button type="submit" class="btn btn-primary btn-sm btn-block"><i class="fa fa-send mr-1"></i> Envoyer le fichier
									</button>
								</div>
								
							</form>
						</div>
						<?php
					}
					else{
						
						?>
						 <!-- Icon Block -->
		                <div class="media text-body font-size-1 mb-2">
		                  <div class="min-w-3rem text-center mr-3">
		                    <i class="fa fa-certificate"></i>
		                  </div>
		                  <div class="media-body">
		                    <?php echo(substr($descriptionlesson, 0,500)) ?>...
		                  </div>
		                </div>
		                <!-- End Icon Block -->

		               
						<?php
					}

					

                   ?>


              </div>

              <!-- Button trigger modal -->
              <a class="card-footer text-center font-weight-bold py-3" data-toggle="modal" data-target="#copyToClipboardModal" href="javascript:;">
                <i class="fa fa-book mr-1"></i>
                Compris
              </a>
              <!-- End Button trigger modal -->
            </div>
				
			</div>
			
		</div>
		<!-- fin lessons -->
		
	</div>
	
</div>

 










