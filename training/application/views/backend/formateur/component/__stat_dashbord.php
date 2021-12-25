<!-- debit de statistique -->
<div class="row">


    <div class="col-lg-12">
        <div class="row">

            <!-- fin de blocs  -->

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Nombre Total des apprenants</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo($nombre_apprenant); ?></div>
                            </div>
                            <div class="col-auto">
                                <a href="javascript:void(0);">
                                    <i class="fas fa-university fa-2x text-gray-300"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Annual) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Mes formations </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo($nombre_formation); ?></div>
                            </div>
                            <div class="col-auto">
                                <a href="<?php echo(base_url()) ?>formateur/formations">
                                    
                                    <i class="fas fa-headphones fa-2x text-gray-300"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tasks Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Nombre des membres accès au système
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo($nombre_membre); ?></div>
                                    </div>
                                    <div class="col">
                                        <div class="progress progress-sm mr-2">
                                            <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <a href="javascript:void(0);">
                                    
                                    <i class="fas fa-key fa-2x text-gray-300"></i>
                                </a>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Total des utilisateurs </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo($nombre_users); ?></div>
                            </div>
                            <div class="col-auto">
                                <a href="javascript:void(0);">
                                    
                                    <i class="fas fa-group fa-2x text-gray-300"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>

<!-- fin de statistique -->

<div class="col-md-12">
	<div class="row">
		<div class="col-md-12">
			<div class="row">

					 <?php        
						 $chart_data = '';
                            $url = '';

                            $detail3 = $this->db->query("SELECT COUNT(idinscription) AS nombre, nom FROM profile_inscription GROUP BY idf");
                            if ($detail3->num_rows() > 0) {
                                      foreach ($detail3->result_array() as $key) {

                                        $sexe = "Formation :".$key["nom"];

                                         $chart_data .= "{ indexLabel:'".$sexe."', y:".$key["nombre"]."}, ";
                                      }

                                      $chart_data = substr($chart_data, 0, -2);
                                      // echo($chart_data);
                            }
                            else{

                            }
					  ?>


				


                <div class="col-md-2"></div>

				<div class="col-md-8">
				  <div class="card">
				    <div class="card-header text-white bg-hub">
				      Statistique par rapport aux formations 
				    </div>
				    <div class="card-body">
				      <div id="chartContainer2" style="height: 300px; width: 100%;"></div>
				    </div>
				  </div>
				</div>
                
                <div class="col-md-2"></div>



			</div>
		</div>
	</div>
</div>