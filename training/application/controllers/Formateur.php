<?php 

defined('BASEPATH') OR exit('No direct script access allowed');  
class formateur extends CI_Controller
{
	private $token;
	private $connected;
	public function __construct()
	{
	  parent::__construct();
	  if(!$this->session->userdata('formateur_login'))
	  {
	      	redirect(base_url().'login');
	  }
	  $this->load->library('form_validation');
	  $this->load->library('encryption');
      $this->load->library('pdf');
	  $this->load->model('crud_model'); 

	  $this->load->helper('url');

	  $this->token = "sk_test_51GzffmHcKfZ3B3C9DATC3YXIdad2ummtHcNgVK4E5ksCLbFWWLYAyXHRtVzjt8RGeejvUb6Z2yUk740hBAviBSyP00mwxmNmP1";
	  $this->connected = $this->session->userdata('formateur_login');

	  /*
	  je script pour les galeries du contrat d'expiration
	
		// $this->crud_model->show_galery_expire();
		$this->crud_model->show_galery_expire();
	  */



	}

	function index(){
		$data['title']="mon profile entreprise";
		$data['contact_info_site']  = $this->crud_model->Select_contact_info_site(); 
		$this->load->view('backend/formateur/templete_admin', $data);
  		// $this->load->view('backend/formateur/templete_admin', $data);
	}

  function joinmetting($param =''){
    $data['title']="Rejoindre la reunion";
    $data['domain']=$param;

    $data['contact_info_site']  = $this->crud_model->Select_contact_info_site(); 
    $data['users'] = $this->crud_model->fetch_connected($this->connected);
    
    $data['roles']      = $this->crud_model->Select_formations_ok("idrole","role");
    $data['conference']     = $this->crud_model->Select_formations_ok("idconference","conference");
    $this->load->view('backend/formateur/joinmetting', $data);
  }

	function cv(){
		$data['title']="mon cv";
		$data['contact_info_site']  = $this->crud_model->Select_contact_info_site(); 
		$this->load->view('backend/formateur/cv', $data);
	}


	function formations(){

		$data['title']="Mes formations";
		$data['contact_info_site']  = $this->crud_model->Select_contact_info_site(); 
		$this->load->view('backend/formateur/formations', $data);
	}


    function cours(){
    	$data['title']="Paramètrage des cours!";
    	$data['users'] = $this->crud_model->fetch_connected($this->connected);
	    $data['contact_info_site']  = $this->crud_model->Select_contact_info_site();

	    $data['Hommes']   			= $this->crud_model->fetch_membre_formateur_inscrit();

        $data['formations']  		= $this->crud_model->Select_table_by_coach("idf","profile_coach", $this->connected);

	    $this->load->view('backend/formateur/cours', $data);

    }

    function travaux(){
    	$data['title']="Paramètrage des travaux!";
    	$data['users'] = $this->crud_model->fetch_connected($this->connected);
	    $data['contact_info_site']  = $this->crud_model->Select_contact_info_site();

	    $data['Hommes']   			= $this->crud_model->fetch_membre_formateur_inscrit();

        $data['formations']  		= $this->crud_model->Select_table_by_coach("idf","profile_coach", $this->connected);
        
	    $this->load->view('backend/formateur/travaux', $data);

    }

    function lesson(){
    	$data['title']="Paramètrage des leçons!";
    	$data['users'] = $this->crud_model->fetch_connected($this->connected);
	    $data['contact_info_site']  = $this->crud_model->Select_contact_info_site();

	    $data['Hommes']   			= $this->crud_model->fetch_membre_formateur_inscrit();

        $data['formations']  		= $this->crud_model->Select_table_by_coach("idf","profile_coach", $this->connected);
        $data['cours']  			= $this->crud_model->Select_table_by("idf","profile_format");

	    $this->load->view('backend/formateur/lesson', $data);

    }

  

	function dashbord(){
		  $data['title']="Tableau de bord";
		  $data['contact_info_site']  = $this->crud_model->Select_contact_info_site(); 

		  $data['nombre_formation'] = $this->crud_model->statistiques_nombre_formation("profile_coach",$this->connected);

		 
	      // $data['nombre_location'] = $this->crud_model->statistiques_nombre("profile_location");


	      $data['nombre_apprenant'] = $this->crud_model->statistiques_nombre_tag_by_column("users", 2);

	      $data['nombre_membre'] = $this->crud_model->statistiques_nombre_tag_by_column("users", 3);

	     

	      $data['nombre_users'] = $this->crud_model->statistiques_nombre("users");
	     
	      $this->load->view('backend/formateur/dashbord', $data);
	}

	function calendrier(){
		  $data['title']="mon profile entreprise";
	      $data['users'] = $this->crud_model->fetch_connected($this->connected);
	      $data['contact_info_site']  = $this->crud_model->Select_contact_info_site(); 
	      // $this->load->view('backend/formateur/viewx', $data);
	      $this->load->view('backend/formateur/calendrier', $data);
	}

	function profile(){
      $data['title']="mon profile entreprise";
      $data['users'] = $this->crud_model->fetch_connected($this->connected);
      $data['contact_info_site']  = $this->crud_model->Select_contact_info_site(); 
      // $this->load->view('backend/formateur/viewx', $data);
      $this->load->view('backend/formateur/profile', $data);
    }

    function basic(){
        $data['title']="Information basique de mon compte";
        $data['users'] = $this->crud_model->fetch_connected($this->connected);
        $data['contact_info_site']  = $this->crud_model->Select_contact_info_site(); 
        $this->load->view('backend/formateur/basic', $data);
    }

    function basic_image(){
        $data['title']="Information basique de ma photo";
        $data['users'] = $this->crud_model->fetch_connected($this->connected);
        $data['contact_info_site']  = $this->crud_model->Select_contact_info_site(); 
        $this->load->view('backend/formateur/basic_image', $data);
    }

    function basic_secure(){
        $data['title']="Paramètrage de sécurité de mon compte";
        $data['users'] = $this->crud_model->fetch_connected($this->connected);
        $data['contact_info_site']  = $this->crud_model->Select_contact_info_site(); 
        $this->load->view('backend/formateur/basic_secure', $data);
    }

    function notification($param1=''){
      $data['title']    ="Listes des formations";
      $data['users']    = $this->crud_model->fetch_connected($this->connected);
      $data['contact_info_site']  = $this->crud_model->Select_contact_info_site(); 
      $this->load->view('backend/formateur/notification', $data);
    }

    function blog($param1=''){
		$data['title']="Exporez des formations";
		$data['contact_info_site']  = $this->crud_model->Select_contact_info_site(); 
		$data['users'] = $this->crud_model->fetch_connected($this->connected);

		$data['padding_articles']   = $this->crud_model->Select_padding_articles_tri();

		if ($param1 !='') {
            $title_job = $this->crud_model->get_name_article_pub($param1);
            $data['title']          = $title_job;
            $data['category_article']  = $this->crud_model->Select_article_by_tag($param1);
            $data['offre_tag']  = $this->crud_model->Select_our_articles_tag($param1);
            $data['commentaires']  = $this->crud_model->Select_our_commentaire_to_articles_tag($param1);
            $this->load->view('backend/formateur/article_tag', $data);
        }
        else{

            $data['title']="Nos blogs et évenèments";
            $data['category_article']  = $this->crud_model->Select_article_all_ok();
            $data['article_tag']  = $this->crud_model->Select_article_all_ok();
            $this->load->view('backend/formateur/blog', $data);

        }

	}



	  // script de client
  function fetch_client(){  

       $fetch_data = $this->crud_model->make_datatables_client();  
       $data = array();  
       foreach($fetch_data as $row)  
       {  
            $sub_array = array();  
           
            $sub_array[] = nl2br(substr($row->fullname, 0,50));
            $sub_array[] = nl2br(substr($row->tel, 0,15));
            $sub_array[] = nl2br(substr($row->email, 0,20));

            $sub_array[] = nl2br(substr($row->adresse, 0,20));

            $sub_array[] = nl2br(substr(date(DATE_RFC822, strtotime($row->created_at)), 0, 23)); 
           

            $sub_array[] = '<button type="button" name="update" idclient="'.$row->idclient.'" class="btn btn-warning btn-circle btn-sm update"><i class="fa fa-edit"></i></button>';  
            $sub_array[] = '<button type="button" name="delete" idclient="'.$row->idclient.'" class="btn btn-danger btn-circle btn-sm delete"><i class="fa fa-trash"></i></button>';  
            $data[] = $sub_array;  
       }  
       $output = array(  
            "draw"                =>     intval($_POST["draw"]),  
            "recordsTotal"        =>     $this->crud_model->get_all_data_client(),  
            "recordsFiltered"     =>     $this->crud_model->get_filtered_data_client(),  
            "data"                =>     $data  
       );  
       echo json_encode($output);  
  }

  function fetch_single_client()  
  {  
       $output = array();  
       $data = $this->crud_model->fetch_single_client($_POST["idclient"]);  
       foreach($data as $row)  
       {  
            $output['fullname'] 	= $row->fullname;
            $output['tel'] 			= $row->tel;
            $output['email'] 		= $row->email;
            $output['adresse'] 		= $row->adresse;
            
           
       }  
       echo json_encode($output);  
  }  


  function operation_client(){

      $insert_data = array(  
           'fullname'   =>     $this->input->post('fullname'),
           'tel'     	=>     $this->input->post('tel'),
           'email'     	=>     $this->input->post('email'),
           'adresse'    =>     $this->input->post('adresse')
	  );  

      $requete=$this->crud_model->insert_client($insert_data);
      echo("Ajout information avec succès");
      
  }

  function modification_client(){

      $updated_data = array(  
           'fullname'   =>     $this->input->post('fullname'),
           'tel'     	=>     $this->input->post('tel'),
           'email'     	=>     $this->input->post('email'),
           'adresse'    =>     $this->input->post('adresse')
	  );

      $this->crud_model->update_client($this->input->post("idclient"), $updated_data);
      echo("modification avec succès");
  }

  function supression_client(){

      $this->crud_model->delete_client($this->input->post("idclient"));
      echo("suppression avec succès");
    
  }

  // fin de script  client 

   // script de location
  function fetch_location(){  

       $fetch_data = $this->crud_model->make_datatables_location();  
       $data = array(); 
       $etat =''; 
       foreach($fetch_data as $row)  
       {  
            $sub_array = array(); 

            if ($row->etat == 0) {
             	$etat ='<span class="badge badge-info">innocupée</span>';
            }
            else{
            	$etat ='<span class="badge badge-success">occupée</span>';
            } 
           
            $sub_array[] = nl2br(substr($row->nom, 0,50)).' ...';
            $sub_array[] = nl2br(substr($row->fullname, 0,15)).' ...';

            $sub_array[] = nl2br(substr($row->montant, 0,20));

            $sub_array[] = nl2br(substr(date(DATE_RFC822, strtotime($row->date_debit)), 0, 23));
            $sub_array[] = nl2br(substr(date(DATE_RFC822, strtotime($row->date_fin)), 0, 23));
            $sub_array[] = $etat;

            $sub_array[] = nl2br(substr(date(DATE_RFC822, strtotime($row->created_at)), 0, 23)); 
           

            $sub_array[] = '<button type="button" name="update" idl="'.$row->idl.'" class="btn btn-warning btn-circle btn-sm update"><i class="fa fa-edit"></i></button>';  
            $sub_array[] = '<button type="button" name="delete" idl="'.$row->idl.'" idchambre="'.$row->idchambre.'" class="btn btn-danger btn-circle btn-sm delete"><i class="fa fa-trash"></i></button>';  
            $data[] = $sub_array;  
       }  
       $output = array(  
            "draw"                =>     intval($_POST["draw"]),  
            "recordsTotal"        =>     $this->crud_model->get_all_data_location(),  
            "recordsFiltered"     =>     $this->crud_model->get_filtered_data_location(),  
            "data"                =>     $data  
       );  
       echo json_encode($output);  
  }

  function fetch_single_location()  
  {  
       $output = array();  
       $data = $this->crud_model->fetch_single_location($_POST["idl"]);  
       foreach($data as $row)  
       {  
            $output['montant'] 			= $row->montant;
            $output['idclient'] 		= $row->idclient;
            $output['idchambre'] 		= $row->idchambre;
            $output['date_debit'] 		= $row->date_debit;
            $output['date_fin'] 		= $row->date_fin;
       }  
       echo json_encode($output);  
  }  

  function fetch_single_location_2()  
  {  
       $output = array();  
       $data = $this->crud_model->fetch_single_location_2($_POST["idl"]);  
       foreach($data as $row)  
       {  
            $output['montant'] 			= $row->montant;
            $output['idclient'] 		= $row->idclient;
            $output['idchambre'] 		= $row->idchambre;

            $output['date_debit'] = nl2br(substr(date(DATE_RFC822, strtotime($row->date_debit)), 0, 23));
            $output['date_fin'] = nl2br(substr(date(DATE_RFC822, strtotime($row->date_fin)), 0, 23));
           
            $output['nom'] 				= $row->nom;
            $output['fullname'] 		= $row->fullname;
            $output['adresse'] 			= $row->adresse;

            $output['tel'] 				= $row->tel;
            $output['email'] 			= $row->email;
            $output['montant'] 			= $row->montant;

       }  
       echo json_encode($output);  
  }  


  function operation_location(){

      $insert_data = array(  
           'montant'   		=>     $this->input->post('montant'),
           'idchambre'  	=>     $this->input->post('idchambre'),
           'idclient'   	=>     $this->input->post('idclient'),
           'date_debit'     =>     $this->input->post('date_debit'),
           'date_fin'    	=>     $this->input->post('date_fin')
	  );  

      $requete=$this->crud_model->insert_location($insert_data);
      echo("Ajout information avec succès");
      
  }

  function modification_location(){

      $updated_data = array(  
           'montant'   		=>     $this->input->post('montant'),
           'idchambre'  	=>     $this->input->post('idchambre'),
           'idclient'   	=>     $this->input->post('idclient'),
           'date_debit'     =>     $this->input->post('date_debit'),
           'date_fin'    	=>     $this->input->post('date_fin')
	  );

      $this->crud_model->update_location($this->input->post("idl"), $updated_data);
      echo("modification avec succès");
  }

  function supression_location(){

  		$idchambre = $this->input->post('idchambre');
  		if ($idchambre !='') {
  			
  			$updated_data = array(  
	           'etat'   =>     0
			);

		    $this->crud_model->update_chambre($idchambre, $updated_data);
  		}

      $this->crud_model->delete_location($this->input->post("idl"));
      echo("suppression avec succès");
    
  }

  // fin de script  location 

  function modification_panel($param1='', $param2='', $param3=''){

      if ($param1="option1") {
         $data = array(
            'first_name'        => $this->input->post('first_name'),
            'last_name'       => $this->input->post('last_name'),
            'telephone'       => $this->input->post('telephone'),
            'full_adresse'      => $this->input->post('full_adresse'),
            'biographie'        => $this->input->post('biographie'),
            'date_nais'       => $this->input->post('date_nais'),
            'sexe'          => $this->input->post('sexe'),
            'email'         => $this->input->post('mail_ok'), 

            'facebook'        => $this->input->post('facebook'),
            'linkedin'        => $this->input->post('linkedin'),
            'twitter'         => $this->input->post('twitter')
        );

        $id_user= $this->connected;
        $query = $this->crud_model->update_crud($id_user, $data);
        $this->session->set_flashdata('message', 'votre profile a été mis à jour avec succès!!!🆗');
         redirect('formateur/basic', 'refresh');
      }

  }

  function modification_photo(){

     $id_user= $this->connected;
     if ($_FILES['user_image']['size'] > 0) {
       # code...
        $data = array(
          'image'     => $this->upload_image()
        );
       $query = $this->crud_model->update_crud($id_user, $data);
       $this->session->set_flashdata('message', 'modification avec succès');
           redirect('formateur/basic_image', 'refresh');
     }
     else{

        $this->session->set_flashdata('message2', 'Veillez selectionner la photo');
        redirect('formateur/basic_image', 'refresh');

     }
     
  }


  function upload_image()  
  {  
       if(isset($_FILES["user_image"]))  
       {  
            $extension = explode('.', $_FILES['user_image']['name']);  
            $new_name = rand() . '.' . $extension[1];  
            $destination = './upload/photo/' . $new_name;  
            move_uploaded_file($_FILES['user_image']['tmp_name'], $destination);  
            return $new_name;  
       }  
  }

  function modification_account($param1=''){
       $id_user= $this->connected;
       $first_name;

       $passwords = md5($this->input->post('user_password_ancien'));
       
       $users = $this->db->query("SELECT * FROM users WHERE passwords='".$passwords."' AND id='".$id_user."' ");

       if ($users->num_rows() > 0) {
          
          foreach ($users->result_array() as $row) {
            $first_name = $row['first_name'];
            // echo($first_name);
             $nouveau   =  $this->input->post('user_password_nouveau');
             $confirmer =  $this->input->post('user_password_confirmer');
             if ($nouveau == $confirmer) {
              $new_pass= md5($nouveau);

              $data = array(
                  'passwords'  => $new_pass
                );

                 $query = $this->crud_model->update_crud($id_user, $data);
                 $this->session->set_flashdata('message', 'votre clée de sécurité a été changer avec succès '.$first_name);
                   redirect('formateur/basic_secure', 'refresh');

               }
               else{
   
                $this->session->set_flashdata('message2', 'les deux mot de passe doivent être identiques');
                redirect('formateur/basic_secure', 'refresh');
               }
         
          }

       }
       else{

          $this->session->set_flashdata('message2', 'information incorecte');
          redirect('formateur/basic_secure', 'refresh');
       }
     
  } 

  function view_1($param1='', $param2='', $param3=''){
      
	  if($param1=='display_delete') {
	  	$this->session->set_flashdata('message', 'suppression avec succès ');
	    $query = $this->crud_model->delete_notifacation_tag($param2);
	    redirect('formateur/notification');
	  }

	  if($param1=='display_delete_message') {

	    $query = $this->crud_model->delete_message_tag($param3);
	    redirect('formateur/message/'.$param2);
	  }
	  else{

	  }

  }

  // script de stade
  function fetch_stade(){  

       $fetch_data = $this->crud_model->make_datatables_stade();  
       $data = array();  
       foreach($fetch_data as $row)  
       {  
            $sub_array = array();  
           
            $sub_array[] = nl2br(substr($row->nom, 0,50)); 
            $sub_array[] = nl2br(substr(date(DATE_RFC822, strtotime($row->created_at)), 0, 23)); 
           

            $sub_array[] = '<button type="button" name="update" idstade="'.$row->idstade.'" class="btn btn-warning btn-circle btn-sm update"><i class="fa fa-edit"></i></button>';  
            $sub_array[] = '<button type="button" name="delete" idstade="'.$row->idstade.'" class="btn btn-danger btn-circle btn-sm delete"><i class="fa fa-trash"></i></button>';  
            $data[] = $sub_array;  
       }  
       $output = array(  
            "draw"                =>     intval($_POST["draw"]),  
            "recordsTotal"        =>     $this->crud_model->get_all_data_stade(),  
            "recordsFiltered"     =>     $this->crud_model->get_filtered_data_stade(),  
            "data"                =>     $data  
       );  
       echo json_encode($output);  
  }

    function fetch_single_stade()  
    {  
         $output = array();  
         $data = $this->crud_model->fetch_single_stade($_POST["idstade"]);  
         foreach($data as $row)  
         {  
              $output['nom']    = $row->nom;  
              
             
         }  
         echo json_encode($output);  
    }  


    function operation_stade(){

      $insert_data = array(  
             'nom'            =>     $this->input->post('nom')
      );  

        $requete=$this->crud_model->insert_stade($insert_data);
        echo("Ajout information avec succès");
        
    }

    function modification_stade(){

        $updated_data = array(  
             'nom'            =>     $this->input->post('nom')
      );

        $this->crud_model->update_stade($this->input->post("idstade"), $updated_data);

        echo("modification avec succès");
    }

    function supression_stade(){

        $this->crud_model->delete_stade($this->input->post("idstade"));
        echo("suppression avec succès");
      
    }

    // fin stade

  // script de place
  function fetch_place(){  

       $fetch_data = $this->crud_model->make_datatables_place();  
       $data = array();  
       foreach($fetch_data as $row)  
       {  
            $sub_array = array();  
            $sub_array[] = nl2br(substr($row->nomPlace, 0,50));
            $sub_array[] = nl2br(substr($row->nom, 0,50)); 
            $sub_array[] = nl2br(substr(date(DATE_RFC822, strtotime($row->created_at)), 0, 23)); 
           

            $sub_array[] = '<button type="button" name="update" idplace="'.$row->idplace.'" class="btn btn-warning btn-circle btn-sm update"><i class="fa fa-edit"></i></button>';  
            $sub_array[] = '<button type="button" name="delete" idplace="'.$row->idplace.'" class="btn btn-danger btn-circle btn-sm delete"><i class="fa fa-trash"></i></button>';  
            $data[] = $sub_array;  
       }  
       $output = array(  
            "draw"                =>     intval($_POST["draw"]),  
            "recordsTotal"        =>     $this->crud_model->get_all_data_place(),  
            "recordsFiltered"     =>     $this->crud_model->get_filtered_data_place(),  
            "data"                =>     $data  
       );  
       echo json_encode($output);  
  }

    function fetch_single_place()  
    {  
         $output = array();  
         $data = $this->crud_model->fetch_single_place($_POST["idplace"]);  
         foreach($data as $row)  
         {  
              $output['nom']        = $row->nom; 
              $output['nomPlace']     = $row->nomPlace;
              $output['idstade']      = $row->idstade; 
              
             
         }  
         echo json_encode($output);  
    }  


    function operation_place(){

      $idstade = $this->input->post('idstade');
      $nomPlace = $this->input->post('nomPlace');

      $query = $this->crud_model->fetch_single_place_in_stadium($idstade,$nomPlace);
      if ($query > 0) {
        # code...
        echo "echec!!!";
      }
      else{

        $insert_data = array(  
               'idstade'             =>     $this->input->post('idstade'),
               'nomPlace'            =>     $this->input->post('nomPlace')
        );  

        $requete=$this->crud_model->insert_place($insert_data);
        echo("Ajout information avec succès");
      }

        
    }

    function modification_place(){

        $updated_data = array(  
            'idstade'             =>     $this->input->post('idstade'),
            'nomPlace'            =>     $this->input->post('nomPlace')
        );

        $this->crud_model->update_place($this->input->post("idplace"), $updated_data);

        echo("modification avec succès");
    }

    function supression_place(){

        $this->crud_model->delete_place($this->input->post("idplace"));
        echo("suppression avec succès");
      
    }
    // fin place

    function fetch_single_matchs()  
    {  
	       $output = array();  
	       $data = $this->crud_model->fetch_single_matchs($_POST["idmath"]);  
	       foreach($data as $row)  
	       {  
	            $output['nomMatch']    		= $row->nomMatch;
	            $output['equipe1']    		= $row->equipe1;
	            $output['equipe2']    		= $row->equipe2;
	            $output['jour']    			= $row->jour;
	            $output['heure']    		= $row->heure;

	       }  
	       echo json_encode($output);  
    } 



	function pagination_view_coach_limit($param1='')
	{
	  $limit = $param1;
	  if ($limit !='') {
	  	$output = $this->crud_model->fetch_details_mes_formations($limit, $this->connected);
	  }
	  else{
	  	$output = $this->crud_model->fetch_details_view_mes_formations($this->connected);
	  }
	  
	  echo($output);
	}

	function fetch_search_view_coach()
	{
	  $output = '';
	  $query = '';
	  $etat = '';
	  if($this->input->post('query'))
	  {
	   $query = $this->input->post('query');
	  }
	  $data = $this->crud_model->fetch_data_search_mes_formation($query, $this->connected);
		 $output .= '
      <table class="table-striped  nk-tb-list nk-tb-ulist dataTable no-footer" data-auto-responsive="false" id="user_data" role="grid" aria-describedby="DataTables_Table_1_info">
          <thead class="tb-member-head thead-light">  
              <tr> 
                  <th width="10%">Avatar</th> 
                  <th width="15%">Nom complet</th>
                  <th width="15%">Edition</th>
                  <th width="10%">Téléphone </th>
                  <th width="10%">Fin formation </th>

                  <th width="10%">Titre </th>

                  <th width="20%">Mise à jour</th>

              </tr>  
         </thead> 

         <tbody>
      ';
      if ($data->num_rows() < 0) {
        
      }
      else{

        foreach($data->result() as $row)
        {

            


         $output .= '
         <tr>
          
          <td><img src="'.base_url().'upload/photo/'.$row->image.'" class="img img-responsive img-thumbnail" width="50" height="35" style="border-radius:50%;" /></td>

          <td>'.nl2br(substr($row->first_name.' '.$row->last_name, 0,40)).' ....'.'</td>
           <td>'.nl2br(substr($row->edition, 0,30)).' ....'.'</td>
          <td>'.nl2br(substr($row->telephone, 0,30)).' ....'.'</td>

          <td>'.nl2br(substr($row->nom, 0,30)).' ....'.'</td>

          <td>'.nl2br(substr(date(DATE_RFC822, strtotime($row->date_fin)), 0, 23)).'</td>
          <td>'.nl2br(substr(date(DATE_RFC822, strtotime($row->created_at)), 0, 23)).'</td>

          
         
         </tr>
         ';
        }
      }
      $output .= '
          </tbody>

         <tfoot>  
              <tr>  
                  <th width="10%">Avatar</th> 
                  <th width="15%">Nom complet</th>
                  <th width="15%">Edition</th>
                  <th width="10%">Téléphone </th>
                  <th width="10%">Fin formation </th>

                  <th width="10%">Titre </th>

                  <th width="20%">Mise à jour</th>

                  

              </tr>  
         </tfoot>   
          
      </table>';

	    echo($output);
	  
	}


	/*
    script pour cours aux formations
    ==========================
    **************************
    **************************
    ==========================

    */
    function fetch_single_cours()  
    {  
         $output = array();  
         $data = $this->crud_model->fetch_single_cours($_POST["idcours"]);  
         foreach($data as $row)  
         {  
              $output['nomcours']    = $row->nomcours; 
              $output['descriptioncours']    = $row->descriptioncours;
              $output['nom']    = $row->nom;
              $output['id_user']    = $row->id_user;
              $output['idf']    = $row->idf;
              
              if($row->logo != '')  
              {  
                   $output['user_image'] = '<img src="'.base_url().'upload/cours/'.$row->logo.'" class="img-thumbnail" width="300" height="250" /><input type="hidden" name="hidden_user_image" value="'.$row->logo.'" />';  
              }  
              else  
              {  
                   $output['user_image'] = '<input type="hidden" name="hidden_user_image" value="" />';  
              }  
              
             
         }  
         echo json_encode($output);  
    }  


    function operation_cours(){

    	$idf 			= $this->input->post('idf');
    	$nomcours 		= htmlspecialchars($this->input->post('nomcours'));
    	$descriptioncours 	= htmlspecialchars($this->input->post('descriptioncours'));
    	$code = rand();

    	$data['nomcours'] 			= $nomcours;
    	$data['descriptioncours'] 	= $descriptioncours;
    	$data['idf'] 				= $idf;
    	$data['id_user'] 			= $this->connected;
    	$data['code'] 				= $code;



    	$test = $this->crud_model->fetch_single_test_cours($idf,$this->connected);
   		if ($test > 0) {

   			echo("echec!!!");
   		}
   		else{

   			if($_FILES["user_image"]["size"] > 0)  
		    {  
		        $data['logo'] = $this->upload_image_cours();
		    }  
		    else  
		    {  
		        $data['logo'] = "book2.png";   
		            
		    }

        if($_FILES["user_image2"]["size"] > 0)  
        {  
            $data['pdf'] = $this->upload_image_pdf();
        } 

		    $requete=$this->crud_model->insert_cours($data);
		    if ($requete > 0) {
		    	# code...
		    	$users_cool = $this->crud_model->get_total_apprenants($idf);
			    foreach ($users_cool as $key) {

		          	$url ="user/cours/".$idf."/".$code;

		            $id_user_recever = $key['id'];

		            $nom   = $this->crud_model->get_name_user($this->connected);
		            $nom_formation   = $this->crud_model->get_name_formation($idf);
		            $message =$nom." vient d'ajouter un cours
		             ".$nomcours." à la formation ".$nom_formation;

		            $notification = array(
		              'titre'     =>    "nouveau cours: ".$nomcours,
		              'icone'     =>    "fa fa-book",
		              'message'   =>     $message,
		              'url'       =>     $url,
		              'id_user'   =>     $id_user_recever
		            );
		            
		            $not = $this->crud_model->insert_notification($notification);
			          
			        # code...
			    }

			    echo("Ajout information avec succès");

		    }
		    

   		}
    					
	    
      
    }

    function modification_cours(){

     	$data['nomcours'] 		= $this->input->post('nomcours');
    	$data['descriptioncours'] 			= $this->input->post('descriptioncours');
    	$data['idf'] 				= $this->input->post('idf');

	    if($_FILES["user_image"]["size"] > 0)  
	    {  
	        $data['logo'] = $this->upload_image_cours();
	    } 

      if($_FILES["user_image2"]["size"] > 0)  
      {  
          $data['pdf'] = $this->upload_image_pdf();
      }  
	    
	   

      $this->crud_model->update_cours($this->input->post("idcours"), $data);

      echo("modification avec succès");

    }

    function supression_cours(){

        $this->crud_model->delete_cours($this->input->post("idcours"));
        echo("suppression avec succès");
      
    }


     // cours
    function pagination_view_cours()
    {

	    $output = $this->crud_model->fetch_details_view_cours_coach($this->connected);
	    echo($output);
  	}







  function fetch_search_view_cours()
  {
    $output = '';
    $query = '';
    if($this->input->post('query'))
    {
     $query = $this->input->post('query');
    }
    $data = $this->crud_model->fetch_data_search_cours($query);
    $output .= '
      <table class="table-striped  nk-tb-list nk-tb-ulist dataTable no-footer" data-auto-responsive="false" id="user_data" role="grid" aria-describedby="DataTables_Table_1_info">
          <thead>
            <tr>
              <td>
                Image
              </td>

              <td>
                Titre

              </td>
              <td>
               Description
              </td>
              
              <td>
                voir plus
              </td>
             
              <td>
                Date
              </td>

              <td>
               Utilisateur action
              </td>

              <td>
              Modifier
              </td>

              <td>
                Supprimer
              </td>
              
              
            </tr>

        </thead>
         <tbody id="example-tbody">
      ';
      if ($data->num_rows() < 0) {
        
      }
      else{
        $btn1 = '';
        $btn2 ='';
        $evenement = '';
        $etat_paiement ='';
        $etat = '';

        foreach($data->result() as $row)
        {

          if ($row->id_user == $this->connected) {
          	# code...
          	$btn1 = '<button type="button" name="update" idcours="'.$row->idcours.'" class="btn btn-hub btn-circle btn-sm update"><i class="fa fa-edit"></i></button>';

          	$btn2 = '<button type="button" name="delete" idcours="'.$row->idcours.'" class="btn btn-danger btn-circle btn-sm delete"><i class="fa fa-trash"></i></button>'; 
          }
          else{
          	$btn1 = '<button type="button" name="update" idcours="'.$row->idcours.'" class="btn btn-warning btn-circle btn-sm"><i class="fa fa-close"></i></button>';

          	$btn2 = '<button type="button" name="delete" idcours="'.$row->idcours.'" class="btn btn-success btn-circle btn-sm"><i class="fa fa-book"></i></button>';
          }
          

         $output .= '
        
         <tr role="row" class="odd">
            <td>
               <img src="'.base_url().'upload/cours/'.$row->logo.'" class="table-user-thumb img img-thumbnail" style="height: 50px;width: 50px;" alt="">
            </td>

             <td>'.substr($row->nomcours, 0,20).'...</td>

             <td>'.substr($row->descriptioncours, 0,30).'...</td>

             <td><a href="'.base_url().'upload/cours/'.$row->logo.'" target="_blank"><i class="fa fa-eye mr-1"></i> </a></td>
             
             <td>'.nl2br(substr(date(DATE_RFC822, strtotime($row->created_at)), 0, 23)).'</td>
              
              <td>

                <div class="col-md-12">
                  <div class="row">
                      <div class="col-md-12">
                        
                        '.substr($row->first_name, 0,20).'
                      </div>
                  </div>
                </div>
                
              </td>

              <td>'.$btn1.'</td>

              <td>'.$btn2.'</td>

          </tr>

         ';
        }
      }
      $output .= '
        </tbody>
        <tfoot role="row" class="odd">
           <tr>
              <td>
                Image
              </td>

              <td>
                Titre

              </td>
              <td>
               Description
              </td>
              
              <td>
                voir plus
              </td>
              
              <td>
                Date
              </td>

              <td>
               Utilisateur action
              </td>

              <td>
              Modifier
              </td>

              <td>
                Supprimer
              </td>
              
              
            </tr>

        </tfoot>   
            
        </table>';
    echo $output;
  }

  function fetch_limit_view_module()
  {
    $output = '';
    $query = '';
    if($this->input->post('limit'))
    {
     $query = $this->input->post('limit');
    }
    $data = $this->crud_model->fetch_data_limit_cours_coach($query, $this->connected);
    $output .= '
      <table class="table-striped  nk-tb-list nk-tb-ulist dataTable no-footer" data-auto-responsive="false" id="user_data" role="grid" aria-describedby="DataTables_Table_1_info">
          <thead>
            <tr>
              <td>
                Image
              </td>

              <td>
                Titre

              </td>
              <td>
               Description
              </td>
              
              <td>
                voir plus
              </td>
             
              <td>
                Date
              </td>

              <td>
               Utilisateur action
              </td>

              <td>
              Modifier
              </td>

              <td>
                Supprimer
              </td>
              
              
            </tr>

        </thead>
         <tbody id="example-tbody">
      ';
      if ($data->num_rows() < 0) {
        
      }
      else{
        $btn1 = '';
        $btn2 ='';
        $evenement = '';
        $etat_paiement ='';
        $etat = '';

        foreach($data->result() as $row)
        {

          $btn1 = '<button type="button" name="update" idcours="'.$row->idcours.'" class="btn btn-hub btn-circle btn-sm update"><i class="fa fa-edit"></i></button>';

          $btn2 = '<button type="button" name="delete" idcours="'.$row->idcours.'" class="btn btn-danger btn-circle btn-sm delete"><i class="fa fa-trash"></i></button>';  

         $output .= '
        
         <tr role="row" class="odd">
            <td>
               <img src="'.base_url().'upload/cours/'.$row->logo.'" class="table-user-thumb img img-thumbnail" style="height: 50px;width: 50px;" alt="">
            </td>

             <td>'.substr($row->nomcours, 0,20).'...</td>

             <td>'.substr($row->descriptioncours, 0,30).'...</td>

             <td><a href="'.base_url().'upload/cours/'.$row->logo.'" target="_blank"><i class="fa fa-eye mr-1"></i> </a></td>
             
             <td>'.nl2br(substr(date(DATE_RFC822, strtotime($row->created_at)), 0, 23)).'</td>
              
              <td>

                <div class="col-md-12">
                  <div class="row">
                      <div class="col-md-12">
                        
                        '.substr($row->first_name, 0,20).'
                      </div>
                  </div>
                </div>
                
              </td>

              <td>'.$btn1.'</td>

              <td>'.$btn2.'</td>

          </tr>

         ';
        }
      }
      $output .= '
        </tbody>
        <tfoot role="row" class="odd">
           <tr>
              <td>
                Image
              </td>

              <td>
                Titre

              </td>
              <td>
               Description
              </td>
              
              <td>
                voir plus
              </td>
              
              <td>
                Date
              </td>

              <td>
               Utilisateur action
              </td>

              <td>
              Modifier
              </td>

              <td>
                Supprimer
              </td>
              
              
            </tr>

        </tfoot>   
            
        </table>';
    echo $output;
  }

   function upload_image_cours()  
  {  
       if(isset($_FILES["user_image"]))  
       {  
            $extension = explode('.', $_FILES['user_image']['name']);  
            $new_name = rand() . '.' . $extension[1];  
            $destination = './upload/cours/' . $new_name;  
            move_uploaded_file($_FILES['user_image']['tmp_name'], $destination);  
            return $new_name;  
       }  
  }

  function upload_image_pdf()  
  {  
       if(isset($_FILES["user_image2"]))  
       {  
            $extension = explode('.', $_FILES['user_image2']['name']);  
            $new_name = rand() . '.' . $extension[1];  
            $destination = './upload/pdf/' . $new_name;  
            move_uploaded_file($_FILES['user_image2']['tmp_name'], $destination);  
            return $new_name;  
       }  
  }

  function upload_image_lesson()  
  {  
       if(isset($_FILES["user_image"]))  
       {  
            $extension = explode('.', $_FILES['user_image']['name']);  
            $new_name = rand() . '.' . $extension[1];  
            $destination = './upload/lesson/' . $new_name;  
            move_uploaded_file($_FILES['user_image']['tmp_name'], $destination);  
            return $new_name;  
       }  
  }

  // fin informations tinfo_user

  /*
    script pour leçons aux formations
    ==========================
    **************************
    **************************
    ==========================

    */
    function fetch_single_lesson()  
    {  
         $output = array();  
         $data = $this->crud_model->fetch_single_lesson($_POST["idlesson"]);  
         foreach($data as $row)  
         {  
              $output['nomcours']    = $row->nomcours; 
              $output['descriptioncours']    = $row->descriptioncours;
              $output['idcours']    = $row->idcours;
              $output['id_user']    = $row->id_user;
              $output['idf']    = $row->idf;
              $output['nom']    = $row->nom;
              $output['nomlesson']    = $row->nomlesson;
              $output['descriptionlesson']    = $row->descriptionlesson;
              
              if($row->fichier != '')  
              {  
                $output['user_image'] = '
                    <div class="col-md-12 embed-responsive embed-responsive-16by9">

	                   <video controls width="250" class="embed-responsive-item">

						    <source src="'.base_url().'upload/lesson/'.$row->fichier.'"
						            type="video/webm">

						    <source src="'.base_url().'upload/lesson/'.$row->fichier.'"
						            type="video/mp4">

						    Sorry, your browser doesn\'t support embedded videos.
						</video>
					</div>
				';  
              }  
              else  
              {  
                   $output['user_image'] = '<input type="hidden" name="hidden_user_image" value="" />';  
              }  
              
             
         }  
         echo json_encode($output);  
    }  


    function operation_lesson(){

    	$idf 			= $this->input->post('idf');
    	$idcours 			= $this->input->post('idcours');
    	$nomlesson 		= htmlspecialchars($this->input->post('nomlesson'));
    	$descriptionlesson 	= htmlspecialchars($this->input->post('descriptionlesson'));
    	$code = rand();

    	$data['nomlesson'] 			= $nomlesson;
    	$data['descriptionlesson'] 	= $descriptionlesson;
    	$data['idcours'] 				= $idcours;
    	$data['id_user'] 			= $this->connected;
    	$data['code'] 				= $code;



    	$test = $this->crud_model->fetch_single_test_lesson($idcours,$nomlesson);
   		if ($test > 0) {

   			echo("echec!!!");
   		}
   		else{

   			if($_FILES["user_image"]["size"] > 0)  
		    {  
		        $data['fichier'] = $this->upload_image_lesson();
		    }  
		   
		    $requete=$this->crud_model->insert_lesson($data);
		    if ($requete > 0) {
		    	# code...
		    	$users_cool = $this->crud_model->get_total_apprenants($idf);
			    foreach ($users_cool as $key) {

		          	$url ="user/lesson/".$idcours."/".$code;

		            $id_user_recever = $key['id'];

		            $nom   = $this->crud_model->get_name_user($this->connected);
		            $nom_formation   = $this->crud_model->get_name_formation($idf);
		            $message =$nom." vient d'ajouter une leçon
		             ".$nomlesson." à la formation ".$nom_formation;

		            $notification = array(
		              'titre'     =>    "nouvelle leçon: ".$nomlesson,
		              'icone'     =>    "fa fa-video",
		              'message'   =>     $message,
		              'url'       =>     $url,
		              'id_user'   =>     $id_user_recever
		            );
		            
		            // $not = $this->crud_model->insert_notification($notification);
			          
			        # code...
			    }

			    echo("Ajout information avec succès");

		    }
		    

   		}
    					
	    
      
    }

    function modification_lesson(){

     	$data['nomlesson'] 		= $this->input->post('nomlesson');
    	$data['descriptionlesson'] 			= $this->input->post('descriptionlesson');
    	$data['idcours'] 				= $this->input->post('idcours');


	    if($_FILES["user_image"]["size"] > 0)  
	    {  
	        $data['fichier'] = $this->upload_image_lesson();
	    }  
	    
	   

      $this->crud_model->update_lesson($this->input->post("idlesson"), $data);

      echo("modification avec succès");

    }

    function supression_lesson(){

        $this->crud_model->delete_lesson($this->input->post("idlesson"));
        echo("suppression avec succès");
      
    }


     // cours
    function pagination_view_lesson()
    {

	    $output = $this->crud_model->fetch_details_view_lesson_coach($this->connected);
	    echo($output);
  	}

  	// requete de cours
  function fetch_cours_requete(){
	  if($this->input->post('idf'))
	  {
	   	echo $this->crud_model->fetch_cours_requete($this->input->post('idf'));
	    // echo $this->crud_model->fetch_cours_requete_coach($this->input->post('idf'), $this->connected);
	  }

  }







  function fetch_search_view_lesson()
  {
    $output = '';
    $query = '';
    if($this->input->post('query'))
    {
     $query = $this->input->post('query');
    }
    $data = $this->crud_model->fetch_data_search_lesson($query);
    $output .= '
      <table class="table-striped  nk-tb-list nk-tb-ulist dataTable no-footer" data-auto-responsive="false" id="user_data" role="grid" aria-describedby="DataTables_Table_1_info">
          <thead>
            <tr>
              <td>
                Image
              </td>

              <td>
                Titre

              </td>
              <td>
               Description
              </td>
              
              <td>
                voir plus
              </td>
             
              <td>
                Date
              </td>

              <td>
               Utilisateur action
              </td>

              <td>
              Modifier
              </td>

              <td>
                Supprimer
              </td>
              
              
            </tr>

        </thead>
         <tbody id="example-tbody">
      ';
      if ($data->num_rows() < 0) {
        
      }
      else{
        $btn1 = '';
        $btn2 ='';
        $evenement = '';
        $etat_paiement ='';
        $etat = '';

        foreach($data->result() as $row)
        {

          if ($row->id_user == $this->connected) {
          	# code...
          	$btn1 = '<button type="button" name="update" idlesson="'.$row->idlesson.'" class="btn btn-hub btn-circle btn-sm update"><i class="fa fa-edit"></i></button>';

            $btn2 = '<button type="button" name="delete" idlesson="'.$row->idlesson.'" class="btn btn-danger btn-circle btn-sm delete"><i class="fa fa-trash"></i></button>'; 
          }
          else{
          	$btn1 = '<button type="button" name="update" idlesson="'.$row->idlesson.'" class="btn btn-warning btn-circle btn-sm"><i class="fa fa-close"></i></button>';

          	$btn2 = '<button type="button" name="delete" idlesson="'.$row->idlesson.'" class="btn btn-success btn-circle btn-sm"><i class="fa fa-book"></i></button>';
          }

          

         $output .= '
        
         <tr role="row" class="odd">
            <td>
               <img src="'.base_url().'upload/cours/'.$row->logo.'" class="table-user-thumb img img-thumbnail" style="height: 50px;width: 50px;" alt="">
            </td>

             <td>'.substr($row->nomlesson, 0,20).'...</td>

             <td>'.substr($row->descriptionlesson, 0,30).'...</td>

             <td><a href="'.base_url().'upload/lesson/'.$row->fichier.'" target="_blank"><i class="fa fa-eye mr-1"></i> </a></td>
             
             <td>'.nl2br(substr(date(DATE_RFC822, strtotime($row->created_at)), 0, 23)).'</td>
              
              <td>

                <div class="col-md-12">
                  <div class="row">
                      <div class="col-md-12">
                        
                        '.substr($row->first_name, 0,20).'
                      </div>
                  </div>
                </div>
                
              </td>

              <td>'.$btn1.'</td>

              <td>'.$btn2.'</td>

          </tr>

         ';
        }
      }
      $output .= '
        </tbody>
        <tfoot role="row" class="odd">
           <tr>
              <td>
                Image
              </td>

              <td>
                Titre

              </td>
              <td>
               Description
              </td>
              
              <td>
                voir plus
              </td>
              
              <td>
                Date
              </td>

              <td>
               Utilisateur action
              </td>

              <td>
              Modifier
              </td>

              <td>
                Supprimer
              </td>
              
              
            </tr>

        </tfoot>   
            
        </table>';
    echo $output;
  }

  function fetch_limit_view_lesson()
  {
    $output = '';
    $query = '';
    if($this->input->post('limit'))
    {
     $query = $this->input->post('limit');
    }
    $data = $this->crud_model->fetch_data_limit_lesson_coach($query, $this->connected);
    $output .= '
      <table class="table-striped  nk-tb-list nk-tb-ulist dataTable no-footer" data-auto-responsive="false" id="user_data" role="grid" aria-describedby="DataTables_Table_1_info">
          <thead>
            <tr>
              <td>
                Image
              </td>

              <td>
                Titre

              </td>
              <td>
               Description
              </td>
              
              <td>
                voir plus
              </td>
             
              <td>
                Date
              </td>

              <td>
               Utilisateur action
              </td>

              <td>
              Modifier
              </td>

              <td>
                Supprimer
              </td>
              
              
            </tr>

        </thead>
         <tbody id="example-tbody">
      ';
      if ($data->num_rows() < 0) {
        
      }
      else{
        $btn1 = '';
        $btn2 ='';
        $evenement = '';
        $etat_paiement ='';
        $etat = '';

        foreach($data->result() as $row)
        {

          $btn1 = '<button type="button" name="update" idlesson="'.$row->idlesson.'" class="btn btn-hub btn-circle btn-sm update"><i class="fa fa-edit"></i></button>';

          $btn2 = '<button type="button" name="delete" idlesson="'.$row->idlesson.'" class="btn btn-danger btn-circle btn-sm delete"><i class="fa fa-trash"></i></button>';  

         $output .= '
        
         <tr role="row" class="odd">
            <td>
               <img src="'.base_url().'upload/cours/'.$row->logo.'" class="table-user-thumb img img-thumbnail" style="height: 50px;width: 50px;" alt="">
            </td>

             <td>'.substr($row->nomlesson, 0,20).'...</td>

             <td>'.substr($row->descriptionlesson, 0,30).'...</td>

             <td><a href="'.base_url().'upload/lesson/'.$row->fichier.'" target="_blank"><i class="fa fa-eye mr-1"></i> </a></td>
             
             <td>'.nl2br(substr(date(DATE_RFC822, strtotime($row->created_at)), 0, 23)).'</td>
              
              <td>

                <div class="col-md-12">
                  <div class="row">
                      <div class="col-md-12">
                        
                        '.substr($row->first_name, 0,20).'
                      </div>
                  </div>
                </div>
                
              </td>

              <td>'.$btn1.'</td>

              <td>'.$btn2.'</td>

          </tr>

         ';
        }
      }
      $output .= '
        </tbody>
        <tfoot role="row" class="odd">
           <tr>
              <td>
                Image
              </td>

              <td>
                Titre

              </td>
              <td>
               Description
              </td>
              
              <td>
                voir plus
              </td>
              
              <td>
                Date
              </td>

              <td>
               Utilisateur action
              </td>

              <td>
              Modifier
              </td>

              <td>
                Supprimer
              </td>
              
              
            </tr>

        </tfoot>   
            
        </table>';
    echo $output;
  }

  // fin informations tinfo_user

  /*
    script pour travail aux formations
    ==========================
    **************************
    **************************
    ==========================

    */
    function fetch_single_travail()  
    {  
         $output = array();  
         $data = $this->crud_model->fetch_single_travail($_POST["idtravail"]);  
         foreach($data as $row)  
         {  
              $output['nomcours']    = $row->nomcours; 
              $output['descriptioncours']    = $row->descriptioncours;
              $output['idcours']    = $row->idcours;
              $output['id_user']    = $row->id_user;
              $output['idf']    = $row->idf;
              $output['nom']    = $row->nom;
              $output['nomlesson']    = $row->nomlesson;
              $output['descriptionlesson']    = $row->descriptionlesson;

              // operation travail
              $output['nomtravail']    = $row->nomtravail;
              $output['idlesson']    = $row->idlesson;
              $output['descriptiontravail']    = $row->descriptiontravail;
              $output['jour_fin']    = $row->jour_fin;
              $output['heure_fin']    = $row->heure_fin;
              
              
             
         }  
         echo json_encode($output);  
    }  


    function operation_travail(){

    	$idf 			= $this->input->post('idf');
    	$idcours 		= $this->input->post('idcours');
    	$idlesson 		= $this->input->post('idlesson');
    	$nomtravail 		= htmlspecialchars($this->input->post('nomtravail'));
    	$descriptiontravail 	= htmlspecialchars($this->input->post('descriptiontravail'));
    	$code = rand();

    	$data['nomtravail'] 			= $nomtravail;
    	$data['descriptiontravail'] 	= $descriptiontravail;
    	$data['idlesson'] 				= $idlesson;
    	$data['id_user'] 				= $this->connected;
    	$data['code'] 					= $code;

    	$data['jour_fin'] 				= $this->input->post('jour_fin');
    	$data['heure_fin'] 				= $this->input->post('heure_fin');

    	$test = $this->crud_model->fetch_single_test_travail($idlesson,$nomtravail);
   		if ($test > 0) {

   			echo("echec!!!");
   		}
   		else{

   			
		   
		    $requete=$this->crud_model->insert_travail($data);
		    if ($requete > 0) {
		    	# code...
		    	$users_cool = $this->crud_model->get_total_apprenants($idf);
			    foreach ($users_cool as $key) {

		          	$url ="user/work/".$idlesson."/".$code;

		            $id_user_recever = $key['id'];

		            $nom   = $this->crud_model->get_name_user($this->connected);
		            $nom_formation   = $this->crud_model->get_name_formation($idf);
		            $message =$nom." vient d'ajouter un travail
		             ".$nomtravail." à la formation ".$nom_formation;

		            $notification = array(
		              'titre'     =>    "Vous avez peut être raté travail: ".$nomtravail,
		              'icone'     =>    "fa fa-bookmark-o",
		              'message'   =>     $message,
		              'url'       =>     $url,
		              'id_user'   =>     $id_user_recever
		            );
		            
		            $not = $this->crud_model->insert_notification($notification);
			          
			        # code...
			    }

			    echo("Ajout information avec succès");

		    }
		    

   		}
    					
	    
      
    }

    function modification_travail(){

     	$data['nomtravail'] 		= $this->input->post('nomtravail');
    	$data['descriptiontravail'] 			= $this->input->post('descriptiontravail');
    	$data['idlesson'] 				= $this->input->post('idlesson');

    	$data['jour_fin'] 		= $this->input->post('jour_fin');
    	$data['heure_fin'] 		= $this->input->post('heure_fin');


      $this->crud_model->update_travail($this->input->post("idtravail"), $data);

      echo("modification avec succès");

    }

    function supression_travail(){

        $this->crud_model->delete_travail($this->input->post("idtravail"));
        echo("suppression avec succès");
      
    }

    // requete de cours
	function fetch_lesson_requete(){
		  if($this->input->post('idcours'))
		  {
		   	// echo $this->crud_model->fetch_lesson_requete($this->input->post('idcours'));
		   	echo $this->crud_model->fetch_lesson_requete_lesson($this->input->post('idcours'),$this->connected);
		   	
		  }

	}
	// fin requete de cours


     // cours
    function pagination_view_travail()
    {

	    $output = $this->crud_model->fetch_details_view_travail_lesson($this->connected);
	    echo($output);
  	}







  function fetch_search_view_travail()
  {
    $output = '';
    $query = '';
    if($this->input->post('query'))
    {
     $query = $this->input->post('query');
    }

    $data = $this->crud_model->fetch_data_search_travail($query);
    $output .= '
      <table class="table-striped  nk-tb-list nk-tb-ulist dataTable no-footer" data-auto-responsive="false" id="user_data" role="grid" aria-describedby="DataTables_Table_1_info">
          <thead>
            <tr>
              <td>
                Image
              </td>

              <td>
                Titre

              </td>
              <td>
               Description
              </td>

              <td>
              Date fin dépôt
              </td>
              
              <td>
                Date
              </td>

              <td>
               Utilisateur action
              </td>

              <td>
                Remise
              </td>

              <td>
              Modifier
              </td>

              <td>
                Supprimer
              </td>
              
              
            </tr>

        </thead>
         <tbody id="example-tbody">
      ';
      if ($data->num_rows() < 0) {
        
      }
      else{
        $btn_plus = '';
        $btn1 = '';
        $btn2 ='';
        $evenement = '';
        $etat_paiement ='';
        $etat = '';

        foreach($data->result() as $row)
        {

          $btn_plus = '<button type="button" name="update" idtravail="'.$row->idtravail.'" class="btn btn-primary btn-circle btn-sm remise"><i class="fa fa-bookmark-o"></i></button>';

           if ($row->id_user == $this->connected) {
          	# code...
          	
	          $btn1 = '<button type="button" name="update" idtravail="'.$row->idtravail.'" class="btn btn-hub btn-circle btn-sm update"><i class="fa fa-edit"></i></button>';

	          $btn2 = '<button type="button" name="delete" idtravail="'.$row->idtravail.'" class="btn btn-danger btn-circle btn-sm delete"><i class="fa fa-trash"></i></button>';  

          }
          else{
          	$btn1 = '<button type="button" name="update" idcours="'.$row->idcours.'" class="btn btn-warning btn-circle btn-sm"><i class="fa fa-close"></i></button>';

          	$btn2 = '<button type="button" name="delete" idcours="'.$row->idcours.'" class="btn btn-success btn-circle btn-sm"><i class="fa fa-book"></i></button>';
          }
          

         $output .= '
        
         <tr role="row" class="odd">
            <td>
               <img src="'.base_url().'upload/cours/'.$row->logo.'" class="table-user-thumb img img-thumbnail" style="height: 50px;width: 50px;" alt="">
            </td>

             <td>'.substr($row->nomtravail, 0,20).'...</td>

             <td>'.substr($row->descriptiontravail, 0,30).'...</td>

              <td>'.nl2br(substr(date(DATE_RFC822, strtotime($row->jour_fin)), 0, 23)).' '.$row->heure_fin.'</td>

             
             <td>'.nl2br(substr(date(DATE_RFC822, strtotime($row->created_at)), 0, 23)).'</td>
              
              <td>

                <div class="col-md-12">
                  <div class="row">
                      <div class="col-md-12">
                        
                        '.substr($row->first_name, 0,20).'
                      </div>
                  </div>
                </div>
                
              </td>

              <td>'.$btn_plus.'</td>

              <td>'.$btn1.'</td>

              <td>'.$btn2.'</td>

          </tr>

         ';
        }
      }
      $output .= '
        </tbody>
        <tfoot role="row" class="odd">
           <tr>
              <td>
                Image
              </td>

              <td>
                Titre

              </td>
              <td>
               Description
              </td>

              <td>
              Date fin dépôt
              </td>
              
              <td>
                Date
              </td>

              <td>
               Utilisateur action
              </td>

              <td>
                Remise
              </td>

              <td>
              Modifier
              </td>

              <td>
                Supprimer
              </td>
              
              
              
            </tr>

        </tfoot>   
            
        </table>';
    echo $output;
  }

  function fetch_limit_view_travail()
  {
    $output = '';
    $query = '';
    if($this->input->post('limit'))
    {
     $query = $this->input->post('limit');
    }
    $data = $this->crud_model->fetch_data_limit_travail_coach($query,$this->connected);
    $output .= '
      <table class="table-striped  nk-tb-list nk-tb-ulist dataTable no-footer" data-auto-responsive="false" id="user_data" role="grid" aria-describedby="DataTables_Table_1_info">
          <thead>
            <tr>
              <td>
                Image
              </td>

              <td>
                Titre

              </td>
              <td>
               Description
              </td>

              <td>
              Date fin dépôt
              </td>
              
              <td>
                Date
              </td>

              <td>
               Utilisateur action
              </td>

              <td>
                Remise
              </td>

              <td>
              Modifier
              </td>

              <td>
                Supprimer
              </td>
              
              
            </tr>

        </thead>
         <tbody id="example-tbody">
      ';
      if ($data->num_rows() < 0) {
        
      }
      else{
        $btn_plus = '';
        $btn1 = '';
        $btn2 ='';
        $evenement = '';
        $etat_paiement ='';
        $etat = '';

        foreach($data->result() as $row)
        {

          $btn_plus = '<button type="button" name="update" idtravail="'.$row->idtravail.'" class="btn btn-primary btn-circle btn-sm remise"><i class="fa fa-bookmark-o"></i></button>';

          $btn1 = '<button type="button" name="update" idtravail="'.$row->idtravail.'" class="btn btn-hub btn-circle btn-sm update"><i class="fa fa-edit"></i></button>';

          $btn2 = '<button type="button" name="delete" idtravail="'.$row->idtravail.'" class="btn btn-danger btn-circle btn-sm delete"><i class="fa fa-trash"></i></button>';  

         $output .= '
        
         <tr role="row" class="odd">
            <td>
               <img src="'.base_url().'upload/cours/'.$row->logo.'" class="table-user-thumb img img-thumbnail" style="height: 50px;width: 50px;" alt="">
            </td>

             <td>'.substr($row->nomtravail, 0,20).'...</td>

             <td>'.substr($row->descriptiontravail, 0,30).'...</td>

              <td>'.nl2br(substr(date(DATE_RFC822, strtotime($row->jour_fin)), 0, 23)).' '.$row->heure_fin.'</td>

             
             <td>'.nl2br(substr(date(DATE_RFC822, strtotime($row->created_at)), 0, 23)).'</td>
              
              <td>

                <div class="col-md-12">
                  <div class="row">
                      <div class="col-md-12">
                        
                        '.substr($row->first_name, 0,20).'
                      </div>
                  </div>
                </div>
                
              </td>

              <td>'.$btn_plus.'</td>

              <td>'.$btn1.'</td>

              <td>'.$btn2.'</td>

          </tr>

         ';
        }
      }
      $output .= '
        </tbody>
        <tfoot role="row" class="odd">
           <tr>
              <td>
                Image
              </td>

              <td>
                Titre

              </td>
              <td>
               Description
              </td>

              <td>
              Date fin dépôt
              </td>
              
              <td>
                Date
              </td>

              <td>
               Utilisateur action
              </td>

              <td>
                Remise
              </td>

              <td>
              Modifier
              </td>

              <td>
                Supprimer
              </td>
              
              
              
            </tr>

        </tfoot>   
            
        </table>';
    echo $output;
  }

  // fin informations travail

   /*
	 script pour les travaux remis
	 ==============================
	 ******************************
	 ******************************
	 ==============================

	*/
    function pagination_travaux_remis()
	{
		sleep(1);
		$idtravail = $this->input->post('idtravail');

	    $this->load->library("pagination");
	    $config = array();
	    $config["base_url"] = "#";
	    $config["total_rows"] = $this->crud_model->count_all_travaux_users_remis($idtravail);
	    $config["per_page"] = 5;
	    $config["uri_segment"] = 3;
	    $config["use_page_numbers"] = TRUE;
	    $config["full_tag_open"] = '<ul class="pagination pagination_filter">';
	    $config["full_tag_close"] = '</ul>';
	    $config["first_tag_open"] = '<li class="page-item">';
	    $config["first_tag_close"] = '</li>';
	    $config["last_tag_open"] = '<li class="page-item">';
	    $config["last_tag_close"] = '</li>';
	    $config['next_link'] = '<li class="page-item active"><i class="btn btn-info">&gt;&gt;</i>';
	    $config["next_tag_open"] = '<li class="page-item">';
	    $config["next_tag_close"] = '</li>';
	    $config["prev_link"] = '<li class="page-item active"><i class="btn btn-info">&lt;&lt;</i>';
	    $config["prev_tag_open"] = "<li class='page-item'>";
	    $config["prev_tag_close"] = "</li>";
	    $config["cur_tag_open"] = "<li class='page-item active'><a href='#' class='page-link'>";
	    $config["cur_tag_close"] = "</a></li>";
	    $config["num_tag_open"] = "<li class='page-item'>";
	    $config["num_tag_close"] = "</li>";
	    $config["num_links"] = 1;
	    $this->pagination->initialize($config);
	    $page = $this->uri->segment(3);
	    $start = ($page - 1) * $config["per_page"];

	    $output = array(
	     'pagination_link2'  => $this->pagination->create_links(),
	     'country_table'   => $this->crud_model->fetch_details_travaux_remis($config["per_page"], $start, $idtravail)
	    );
	    echo json_encode($output);
	}


	// pagination de articles
        function pagination_access_our_article()
		{

		  $this->load->library("pagination");
		  $config = array();
		  $config["base_url"] = "#";
		  $config["total_rows"] = $this->crud_model->fetch_pagination_articles();
		  $config["per_page"] = 4;
		  $config["uri_segment"] = 3;
		  $config["use_page_numbers"] = TRUE;
		  $config["full_tag_open"] = '<ul class="pagination">';
		  $config["full_tag_close"] = '</ul>';
		  $config["first_tag_open"] = '<li class="page-item">';
		  $config["first_tag_close"] = '</li>';
		  $config["last_tag_open"] = '<li class="page-item">';
		  $config["last_tag_close"] = '</li>';
		  $config['next_link'] = '<li class="page-item active"><i class="btn btn-primary btn-sm">&gt;&gt;</i>';
		  $config["next_tag_open"] = '<li class="page-item">';
		  $config["next_tag_close"] = '</li>';
		  $config["prev_link"] = '<li class="page-item active"><i class="btn btn-primary btn-sm">&lt;&lt;</i>';
		  $config["prev_tag_open"] = "<li class='page-item'>";
		  $config["prev_tag_close"] = "</li>";
		  $config["cur_tag_open"] = "<li class='page-item active'><a href='#' class='page-link'>";
		  $config["cur_tag_close"] = "</a></li>";
		  $config["num_tag_open"] = "<li class='page-item'>";
		  $config["num_tag_close"] = "</li>";
		  $config["num_links"] = 1;
		  $this->pagination->initialize($config);
		  $page = $this->uri->segment(3);
		  $start = ($page - 1) * $config["per_page"];

		  $output = array(
		   'pagination_link' => $this->pagination->create_links(),
		   'country_table'   => $this->crud_model->fetch_details_pagination_articles_formateur($config["per_page"], $start)
		  );
		  echo json_encode($output);
		}



     // recherche de formations
     function fetch_search_our_articles()
     {
          $output = '';
          $query = '';
          if($this->input->post('query'))
          {
           $query = $this->input->post('query');
          }
          $data = $this->crud_model->fetch_data_search_articles($query);
          
          if($data->num_rows() > 0)
          {

              
               foreach($data->result() as $key)
               {

                 $vues  =  $this->db->query("SELECT COUNT(idart) AS total FROM vues WHERE idart=".$key->idart." ");
                  if ($vues->num_rows() <=0) {
                    $nombre_vue = 0;
                  }
                  else{
                    foreach ($vues->result_array() as $key_vue) {
                      $nombre_vue = $key_vue['total'];
                    }
                  }

                $output .= '
                  <div class="col-md-6 p-r-25 p-r-15-sr991 mb-2">
			          <!-- Item latest -->
			          <div class="col-md-12 m-b-45">
			            <a href="'.base_url().'formateur/blog/'.$key->idart.'" class="img-fluid">
			              <img src="'.base_url().'upload/article/'.$key->image.'" alt="IMG" class="img img-responsive img-thumbnail" style="height: 200px; border-color:#DC4405;">
			            </a>
			            <div class="col-md-12 p-t-16">
			              <h5 class="p-b-5">
			                <a href="'.base_url().'formateur/blog/'.$key->idart.'" class="f1-m-3 cl2 hov-cl10 trans-03">
			                  '.nl2br(substr($key->nom, 0,200)).'...
			                </a>
			              </h5>

			              <span class="cl8">
			               
			                <span class="f1-s-3 m-rl-3">
			                  <i class="fa fa-eye"></i>  '.$nombre_vue.' vue(s) &nbsp;&nbsp; - &nbsp;&nbsp;
			                </span>
			                <span class="f1-s-3">
			                  '.nl2br(substr(date(DATE_RFC822, strtotime($key->created_at)), 0, 23)).'
			                </span>
			              </span>
			            </div>
			          </div>
			        </div>


                  
                 ';

               }
          }
          else
          {
                $output .= '
                    <div class="media text-muted pt-3">
                        <img data-src="holder.js/32x32?theme=thumb&amp;bg=007bff&amp;fg=007bff&amp;size=1" alt="32x32" class="mr-2 rounded" style="width: 100%; height: auto;" src="data:'.base_url().'upload/annumation/b.gif" srcset="'.base_url().'upload/annumation/b.gif" data-holder-rendered="true">
                        
                      </div>
                ';
          }

        echo $output;
     }

     // fin script articles 






 

    








}