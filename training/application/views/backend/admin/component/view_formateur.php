<?php 

$chart_data = '';
$url = '';

$detail3 = $this->db->query("SELECT COUNT(idcoach) AS nombre, nom FROM profile_coach GROUP BY idf");
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

<div class="col-xl-12 col-md-6 mb-4">
	<div class="row">
		<div class="col-md-3 mb-2 mt-2"></div>

		<div class="col-md-6 mt-2">
			<div class="card">
				<div class="card-header bg-secondary text-white text-center">
					Statistiques sur formateur par instructeur
				</div>
				<div class="card-body">
					<div id="chartContainer2" style="height: 200px; width: 100%;"></div>
				</div>
			</div>
			 
		</div>

        <div class="col-md-3 mb-2 mt-2"></div>



	</div>
	
</div>
