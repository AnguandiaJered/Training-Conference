
<?php

$message;
$debit_event;
$fin_event;
$this->db->group_by("idformat");
$evenement=$this->db->get('profile_format');
if ($evenement->num_rows() > 0) {
  foreach ($evenement->result_array() as $row) {

    // $message ='<button type="button" name="update" idmath="'.$row["idmath"].'" class="btn btn-warning btn-circle btn-sm update"> '.$row['nomMatch'].' </button>';

    $message = $row['nom'];
    $debit_event = $row['date_debit'];
    $fin_event = $row['fin_inscription'];
    $json[] = array(
      'title' => $message,
      'start' => $debit_event,
      'end'   => $fin_event,
      'className' => 'bg-warning update ' 
  );

  // var_dump($json);

  }
}
else{

}


 ?>
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
                            <div class="row">


                              <div class="col-md-1">
                                  
                            </div>
                            <div class="col-md-10">
                              

                            <div class="col-md-12">
                              <div class="row">
                                <div class="col-md-12" style="margin-top: 10px;">

                                  <!-- les scripts commencent -->
                                  <div id="calendar"></div>

                                  <!-- fin de mes scripts -->
                                  
                                </div>
                              </div>
                            </div>


                            </div>
                            <div class="col-md-1">
                              
                            </div>
                              
                            </div>
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
     <div id="userModal" class="modal fade">
      <div class="modal-dialog">
        <form method="post" id="user_form" enctype="multipart/form-data">
          <div class="modal-content">
            <div class="modal-header bg-dark text-white">
              <p class="modal-title text-center">role</p>
              <button type="button" class="close text-danger" data-dismiss="modal"><i class="fa fa-close"></i></button>
            </div>
            <div class="modal-body">
                    

                <div class="col-md-12">
                  <div class="row">

                    <div class="form-group col-md-12">
                         <label> <i class="fa fa-globe"></i> Entrer le nom de la rencontre</label>
                         <input type="text" name="nomMatch" id="nomMatch" class="form-control" placeholder="Entrez le nom d'une recontre" disabled="" />
                    </div>

                    <div class="form-group col-md-6">
                         <label> <i class="fa fa-calendar"></i> Le jour du match</label>
                         <input type="date" name="jour" id="jour" class="form-control" disabled="" />
                    </div>

                     <div class="form-group col-md-6 mb-2">
                         <label> <i class="fa fa-globe"></i> L'heure du match</label>
                         <input type="time" name="heure" id="heure" class="form-control" disabled="" />
                    </div>

                    <div class="col-md-12 info">
                      <div class="row">
                        <div class="col-2"></div>
                        <div class="col-3">
                          <div class="col-md-12" style="margin-top: 7px;">
                            <span id="user_uploaded_image"></span>
                          </div>
                        </div>
                        <div class="col-2"><h1 id="vs">VS</h1></div>
                        <div class="col-3">
                          <div class="col-md-12" style="margin-top: 7px;">
                            <span id="user_uploaded_image2"></span>
                          </div>
                        </div>
                        <div class="col-2"></div>
                        
                      </div>
                    </div>

                    
                  </div>
                </div>

                    
              
            </div>
            <div class="modal-footer">
              <input type="hidden" name="idmath" id="idmath" />

              <input type="hidden" name="equipe1" id="equipe1" />
              <input type="hidden" name="equipe2" id="equipe2" />

              <input type="hidden" name="operation" id="operation" />
              <input type="submit" name="action" id="action" class="btn btn-dark" value="Add" />
              <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Fermer</button>
            </div>
          </div>
        </form>
      </div>
    </div> 
    <!-- fin modal-->


   
   <?php include('_script.php') ?>

   <script type="text/javascript">
  $(document).ready(function(){
    "use strict";
    $('#calendar').fullCalendar({
        defaultView: 'month',

        header: {
            left: 'title', // you can add today btn
            center: '',
            right: 'month, agendaWeek, listWeek, prev, next', // you can add agendaDay btn
        },
        contentHeight: 'auto',
        defaultDate: '<?= date('Y-m-d'); ?>',
        editable: false,
        droppable: false, // this allows things to be dropped onto the calendar
        eventLimit: false, // allow "more" link when too many events
            
        events: <?= json_encode($json); ?>
    });
  });
  </script>

  <script type="text/javascript">
    $(document).ready(function() {

      $(document).on('click', '.update', function(){  
               var idmath = $(this).attr("idmath");  
               $.ajax({  
                    url:"<?php echo base_url(); ?>user/fetch_single_matchs",  
                    method:"POST",  
                    data:{idmath:idmath},  
                    dataType:"json",  
                    success:function(data)  
                    {  
                         $('#userModal').modal('show');  
                         $('#nomMatch').val(data.nomMatch);
                         $('#equipe1').val(data.equipe1);
                         $('#equipe2').val(data.equipe2);
                         $('#jour').val(data.jour);
                         $('#heure').val(data.heure);

                         showEquipeByName(data.equipe2);
                         showEquipe1(data.equipe1);
                         
                         $('.modal-title').text("modification du match "+data.nomMatch);  
                         $('#idmath').val(idmath);   
                         $('#action').val("Edit");  
                    }  
               });  
          });
    });
  </script>

</body>

</html>