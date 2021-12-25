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



<!-- <div class="col-xl-6 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Nombre Total des prodits entrants en stock</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo($nombre_total); ?></div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-file fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div> -->

<!-- Earnings (Annual) Card Example -->
<!-- <div class="col-xl-6 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        Nombre Total des prodits entrants en stock par catégorie</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo($nombre_total_by_cat); ?></div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-tag fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div> -->

<div class="col-xl-12 col-md-6 mb-4">
	<div class="row">
		<div class="col-md-6 mb-2 mt-2">
			<div class="card">
				<div class="card-header bg-secondary text-white text-center">
					Statistiques sur formation 
				</div>
				<div class="card-body">
					<div id="chartContainer" style="height: 200px; width: 100%;"></div>
				</div>
			</div>
		</div>

		<div class="col-md-6 mt-2">
			<div class="card">
				<div class="card-header bg-secondary text-white text-center">
					Statistiques sur formation
				</div>
				<div class="card-body">
					<div id="chartContainer2" style="height: 200px; width: 100%;"></div>
				</div>
			</div>
			 
		</div>
	</div>
	
</div>
