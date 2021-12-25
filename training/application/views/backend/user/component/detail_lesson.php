<div class="col-md-12">
	<div class="row resultat_menus">

		<!-- detail cours -->
		<div class="col-md-8">

			<?php

			$logo_cours = ''; 
			$idlesson = 0; 
			$descriptioncours ='';
	
				if ($offre_tag->num_rows() <= 0) {
					# code...
				}
				else{

					foreach ($offre_tag->result_array() as $row) {
						$logo_cours = $row['logo'];
						$idlesson = $row['idlesson'];
						$descriptioncours = $row['descriptioncours'];
						

							?>



							<div class="card card-bordered h-100" style="border-color: white;">
					            <div class="card-img-top position-relative">

					            	<div class="col-md-12 embed-responsive embed-responsive-16by9">

					                   <video controls width="250" class="embed-responsive-item">

										    <source src="<?php echo(base_url())?>upload/lesson/<?php echo($row['fichier'])?>"
										            type="video/webm">

										    <source src="<?php echo(base_url())?>upload/lesson/<?php echo($row['fichier'])?>"
										            type="video/mp4">

										    Sorry, your browser doesn\'t support embedded videos.
										</video>
									</div>
					             
					              <div class="position-absolute top-0 left-0 mt-3 ml-3">
					                <small class="btn btn-xs btn-success btn-pill text-uppercase shadow-soft mb-3"><?php echo (nl2br($row['nomlesson'])); ?></small>
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

					            <div class="card-body">
					              
					              <style type="text/css">
					              	.text-inherit {
									    color: inherit;
									    font-size: 18px;
									}
									a {
									    color: #377dff;
									    text-decoration: none;
									    background-color: transparent;
									}
									*, ::after, ::before {
									    box-sizing: border-box;
									}
									user agent stylesheet
									a:-webkit-any-link {
									    color: -webkit-link;
									    cursor: pointer;
									    text-decoration: underline;
									}
									.h1, .h2, .h3, .h4, .h5, .h6, h1, h2, h3, h4, h5, h6 {
									    color: #1e2022;
									}
									.avatar-circle .avatar-img {
									    border-radius: 50%;
									}
									.avatar-img {
									    max-width: 50px;
									    height: 50px;
									    -o-object-fit: cover;
									    object-fit: cover;
									    border-radius: .3125rem;
									}
									img {
									    vertical-align: middle;
									    border-style: none;
									}
					              </style>

					              <div class="mb-3" style="margin-top: 30px;">
					                <h3>
					                  <div class="text-inherit" href="javascript:void(0);"><?php echo(nl2br($row['descriptionlesson'])) ?></div>
					                </h3>
					              </div>

					              <div class="d-flex align-items-center">
					                <div class="avatar-group">
					                  <a class="avatar avatar-xs avatar-circle" data-toggle="tooltip" data-placement="top" title="" href="#" data-original-title="Nataly Gaga">
					                    <img class="avatar-img" src="<?php echo(base_url())?>upload/photo/<?php echo($row['image'])?>">

					                  </a>
					                </div>
					                <div class="d-flex align-items-center ml-auto">
					                  <div class="small text-muted">
					                    <i class="fa fa-book-reader d-block d-sm-inline-block mb-1 mb-sm-0 mr-1"></i>
					                    <?php 
						                   if ($nbr_lesson > 1) {
						                   	# code...
						                   	echo($nbr_lesson.' travaux');
						                   }
						                   else{
						                   	echo($nbr_lesson.' travail');
						                   }

						                ?>
					                  </div>
					                  <small class="text-muted mx-2">|</small>
					                  <div class="small text-muted">
					                    <i class="fa fa-clock d-block d-sm-inline-block mb-1 mb-sm-0 mr-1"></i>
					                   <?= nl2br(substr(date(DATE_RFC822, strtotime($row['created_at'])), 0, 23));?>
					                  </div>
					                </div>
					              </div>
					            </div>

					            <div class="card-footer border-0 pt-0">
					              <div class="d-flex justify-content-between align-items-center">
					                <div class="mr-2">
					                  
					                  <span class="d-block h5 text-lh-sm mb-0"><?php echo(nl2br($row['nom'])) ?></span>
					                </div>
					               
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

                <!-- End Video Popup -->
              </div>

              <div class="card-body">
               
                <div class="mb-2">
                  <a class="btn btn-block btn-primary transition-3d-hover" href="javascript:void(0);">Suivre</a>
                </div>

                

               

                <!-- Icon Block -->
                <div class="media text-body font-size-1 mb-2">
                  <div class="min-w-3rem text-center mr-3">
                    <i class="fa fa-bookmark"></i>
                  </div>
                  <div class="media-body">
                   <?php 
                   if ($nbr_lesson > 1) {
                   	# code...
                   	echo($nbr_lesson.' travaux');
                   }
                   else{
                   	echo($nbr_lesson.' travail');
                   }

                   ?>



                  
                  </div>
                </div>
                <!-- End Icon Block -->

               

              

                <!-- Icon Block -->
                <div class="media text-body font-size-1 mb-2">
                  <div class="min-w-3rem text-center mr-3">
                    <i class="fa fa-certificate"></i>
                  </div>
                  <div class="media-body">
                    <?php echo(substr($descriptioncours, 0,400)) ?>...
                  </div>
                </div>
                <!-- End Icon Block -->

                 <h2 class="h4">Liste des travaux à remettre</h2>



                 <?php 

                  if ($data_lesson->num_rows() > 0) {
                  	# code...
                  	foreach ($data_lesson->result_array() as $key) {
                  		# code...
                  		$url_lesson = base_url().'user/work/'.$idlesson.'/'.$key['code'];
                  		?>
                  		<!-- Icon Block -->
                  		<hr>
		                <div class="media text-body font-size-1 mb-2">
		                  <div class="min-w-3rem text-center mr-3">
		                    <i class="fa fa-book"></i>
		                  </div>
		                  <div class="media-body">
		                   <a href="<?php echo($url_lesson) ?>" class="text-muted">
		                   	<?php echo($key['nomtravail']) ?> 
		                   </a>
		                  </div>
		                </div>
		                <!-- End Icon Block -->
                  		<?php

                  	}
                  }
                  else{

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

 










