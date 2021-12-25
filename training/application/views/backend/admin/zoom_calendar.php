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
                              <!-- menu -->
                              <div class="col-md-3">

                               <?php include("menu_zoom.php") ?>
                                
                              </div>
                              <!-- fin menu -->
                              <!-- contenu -->
                              <div class="col-md-9">

                                <!-- les scripts commencent -->
                                  <div id="calendar" class="col-md-12"></div>

                                  <!-- fin de mes scripts -->
                                


                              <?php

                              $message;
                              $debit_event;
                              $fin_event;
                              $this->db->group_by("idconference");
                              $evenement=$this->db->get('conference');
                              if ($evenement->num_rows() > 0) {
                                foreach ($evenement->result_array() as $row) {

                                 $date_debit  = $row['date_debit'];
                                 $date_fin    = $row['date_fin'];
                                 $heure_debit = $row['heure_debit'];
                                 $heure_fin   = $row['heure_fin'];
                                 $nom         = $row['nom'];

                                  $debit_event = $date_debit.' '.$heure_debit.':00';
                                  $fin_event   = $date_fin.' '.$heure_fin.':00';;
                                  $json[] = array(
                                    'title' => $nom,
                                    'start' => $debit_event,
                                    'end'   => $fin_event,
                                    'className' => 'bg-warning' 
                                );

                                // var_dump($json);

                                }
                              }
                              else{

                              }


                               ?>

                                
                              </div>
                              <!-- fin contenu -->
                               

                             </div>
                           </div>

                          
                           <!-- fin de mes scripts commencent -->
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

  
    <script type="text/javascript">
      $(document).ready(function() {

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

   

</body>

</html>