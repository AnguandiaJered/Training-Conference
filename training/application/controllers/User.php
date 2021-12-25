<?php 

defined('BASEPATH') OR exit('No direct script access allowed');  
class user extends CI_Controller
{
	private $token;
	private $connected;
	public function __construct()
	{
	  parent::__construct();
	  if(!$this->session->userdata('id'))
	  {
	      	redirect(base_url().'login');
	  }
	  $this->load->library('form_validation');
	  $this->load->library('encryption');
      $this->load->library('pdf');
	  $this->load->model('crud_model'); 

	  $this->load->helper('url');

	  $this->token = "sk_test_51GzffmHcKfZ3B3C9DATC3YXIdad2ummtHcNgVK4E5ksCLbFWWLYAyXHRtVzjt8RGeejvUb6Z2yUk740hBAviBSyP00mwxmNmP1";
	  $this->connected = $this->session->userdata('id');

	  /*
	  je script pour les galeries du contrat d'expiration
	
		// $this->crud_model->show_galery_expire();
		$this->crud_model->show_galery_expire();
	  */



	}

	function index(){
		$data['title']="mon profile entreprise";
		$data['contact_info_site']  = $this->crud_model->Select_contact_info_site(); 
		$this->load->view('backend/user/templete_admin', $data);
  		// $this->load->view('backend/user/templete_admin', $data);
	}

  function joinmetting($param =''){
    $data['title']="Rejoindre la reunion";
    $data['domain']=$param;

    $data['contact_info_site']  = $this->crud_model->Select_contact_info_site(); 
    $data['users'] = $this->crud_model->fetch_connected($this->connected);
    
    $data['roles']      = $this->crud_model->Select_formations_ok("idrole","role");
    $data['conference']     = $this->crud_model->Select_formations_ok("idconference","conference");
    $this->load->view('backend/user/joinmetting', $data);
  }

	function cours($idformation='', $code='')
	{
		
		$data['contact_info_site']  = $this->crud_model->Select_contact_info_site();
		$data['users'] = $this->crud_model->fetch_connected($this->connected);

		if ($idformation !='' && $code !='') {
            $title_job = $this->crud_model->get_name_cours_name($code);
            $data['title']          = $title_job;
            $data['offre_tag']  = $this->crud_model->Select_our_cours_tag($code);
            $idcours = $this->crud_model->get_name_cours_idcours($code);
            $data['nbr_lesson']  = $this->crud_model->nomre_de_lesson($idcours);
            $data['data_lesson']  = $this->crud_model->Select_our_leson_tag($idcours);
            $this->load->view('backend/user/cours_tag', $data);
        }
        else{

            redirect('user/profile','refresh');

        } 
		
	}

	function lesson($idcours='', $code='')
	{
		
		$data['contact_info_site']  = $this->crud_model->Select_contact_info_site();
		$data['users'] = $this->crud_model->fetch_connected($this->connected);

		if ($idcours !='' && $code !='') {
            $title_job = $this->crud_model->get_name_lesson_name($code);
            $data['title']          = $title_job;
            $data['offre_tag']  = $this->crud_model->Select_our_lessons_tag($code);
            $idlesson = $this->crud_model->get_name_lessons_idcours($code);
            $data['nbr_lesson']  = $this->crud_model->nomre_de_travail($idlesson);
            $data['data_lesson']  = $this->crud_model->Select_our_travail_tag($idlesson);
            $this->load->view('backend/user/lesson_tag', $data);
        }
        else{

            redirect('user/profile','refresh');

        } 
		
	}

	function work($idlesson='', $code='')
	{
		
		$data['contact_info_site']  = $this->crud_model->Select_contact_info_site();
		$data['users'] = $this->crud_model->fetch_connected($this->connected);

		if ($idlesson !='' && $code !='') {
            $title_job = $this->crud_model->get_name_travail_name($code);
            $data['title']          = $title_job;
            $idtravail = $this->crud_model->get_name_travail_idlesson($code);
            $data['offre_tag']  = $this->crud_model->Select_our_travail_tag($idtravail);
           
           
            $this->load->view('backend/user/work_tag', $data);
        }
        else{

            redirect('user/profile','refresh');

        } 
		
	}


	

	function formations_all($param1=''){
		$data['title']="Exporez des formations";
		$data['contact_info_site']  = $this->crud_model->Select_contact_info_site(); 
		$data['users'] = $this->crud_model->fetch_connected($this->connected);

		$data['padding_articles']   = $this->crud_model->Select_padding_articles_tri();

		if ($param1 !='') {
            $title_job = $this->crud_model->get_name_formation_pub($param1);
            $data['title']          = $title_job;
            $data['offre_tag']  = $this->crud_model->Select_our_formation_tag($param1);
            $this->load->view('backend/user/formation_tag', $data);
        }
        else{

            $data['title']="Explorez des formations au prix le plus bas possible jamais atteint!";
            $data['category_article']  = $this->crud_model->Select_article_all_ok();
            $data['article_tag']  = $this->crud_model->Select_article_all_ok();
            $this->load->view('backend/user/formations_all', $data);

        }

	}

	function blog($param1=''){
		$data['title']="Exporew des formations";
		$data['contact_info_site']  = $this->crud_model->Select_contact_info_site(); 
		$data['users'] = $this->crud_model->fetch_connected($this->connected);

		$data['padding_articles']   = $this->crud_model->Select_padding_articles_tri();

		if ($param1 !='') {
            $title_job = $this->crud_model->get_name_article_pub($param1);
            $data['title']          = $title_job;
            $data['category_article']  = $this->crud_model->Select_article_by_tag($param1);
            $data['offre_tag']  = $this->crud_model->Select_our_articles_tag($param1);
            $data['commentaires']  = $this->crud_model->Select_our_commentaire_to_articles_tag($param1);
            $this->load->view('backend/user/article_tag', $data);
        }
        else{

            $data['title']="Nos blogs et évenèments";
            $data['category_article']  = $this->crud_model->Select_article_all_ok();
            $data['article_tag']  = $this->crud_model->Select_article_all_ok();
            $this->load->view('backend/user/blog', $data);

        }

	}

	function formations(){

		$data['title']="Mes formations";
		$data['contact_info_site']  = $this->crud_model->Select_contact_info_site(); 
		$this->load->view('backend/user/formations', $data);
	}

  

	function dashbord(){
		  $data['title']="Tableau de bord";
		  $data['contact_info_site']  = $this->crud_model->Select_contact_info_site(); 

		  $data['nombre_formation'] = $this->crud_model->statistiques_nombre_formation("profile_format",$this->connected);
	      // $data['nombre_location'] = $this->crud_model->statistiques_nombre("profile_location");
		  $data['nombre_coach'] = $this->crud_model->statistiques_nombre("profile_coach");

	      $data['nombre_apprenant'] = $this->crud_model->statistiques_nombre_tag_by_column("users", 2);

	      $data['nombre_membre'] = $this->crud_model->statistiques_nombre_tag_by_column("users", 3);

	     

	      $data['nombre_formations'] = $this->crud_model->statistiques_nombre("formations");
	      $data['nombre_travaux'] = $this->crud_model->statistiques_nombre("profile_travail");
	     
	      $this->load->view('backend/user/dashbord', $data);
	}

	function calendrier(){
		  $data['title']="mon profile entreprise";
	      $data['users'] = $this->crud_model->fetch_connected($this->connected);
	      $data['contact_info_site']  = $this->crud_model->Select_contact_info_site(); 
	      // $this->load->view('backend/user/viewx', $data);
	      $this->load->view('backend/user/calendrier', $data);
	}



	function profile(){
      $data['title']="mon profile entreprise";
      $data['users'] = $this->crud_model->fetch_connected($this->connected);
      $data['contact_info_site']  = $this->crud_model->Select_contact_info_site(); 
      // $this->load->view('backend/user/viewx', $data);
      $this->load->view('backend/user/profile', $data);
    }

    function basic(){
        $data['title']="Information basique de mon compte";
        $data['users'] = $this->crud_model->fetch_connected($this->connected);
        $data['contact_info_site']  = $this->crud_model->Select_contact_info_site(); 
        $this->load->view('backend/user/basic', $data);
    }

    function basic_image(){
        $data['title']="Information basique de ma photo";
        $data['users'] = $this->crud_model->fetch_connected($this->connected);
        $data['contact_info_site']  = $this->crud_model->Select_contact_info_site(); 
        $this->load->view('backend/user/basic_image', $data);
    }

    function basic_secure(){
        $data['title']="Paramètrage de sécurité de mon compte";
        $data['users'] = $this->crud_model->fetch_connected($this->connected);
        $data['contact_info_site']  = $this->crud_model->Select_contact_info_site(); 
        $this->load->view('backend/user/basic_secure', $data);
    }

    function notification($param1=''){
      $data['title']    ="Listes des formations";
      $data['users']    = $this->crud_model->fetch_connected($this->connected);
      $data['contact_info_site']  = $this->crud_model->Select_contact_info_site(); 
      $this->load->view('backend/user/notification', $data);
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
         redirect('user/basic', 'refresh');
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
           redirect('user/basic_image', 'refresh');
     }
     else{

        $this->session->set_flashdata('message2', 'Veillez selectionner la photo');
        redirect('user/basic_image', 'refresh');

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

  function upload_fichier_remis()  
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
                   redirect('user/basic_secure', 'refresh');

               }
               else{
   
                $this->session->set_flashdata('message2', 'les deux mot de passe doivent être identiques');
                redirect('user/basic_secure', 'refresh');
               }
         
          }

       }
       else{

          $this->session->set_flashdata('message2', 'information incorecte');
          redirect('user/basic_secure', 'refresh');
       }
     
  } 

  function view_1($param1='', $param2='', $param3=''){
      
	  if($param1=='display_delete') {
	  	$this->session->set_flashdata('message', 'suppression avec succès ');
	    $query = $this->crud_model->delete_notifacation_tag($param2);
	    redirect('user/notification');
	  }

	  if($param1=='display_delete_message') {

	    $query = $this->crud_model->delete_message_tag($param3);
	    redirect('user/message/'.$param2);
	  }
	  else{

	  }

  }


   /*
   =================================
   *********************************
   script pour les formateurs 
   ==================================
   **********************************
   */

   // pagination de articles
    function pagination_access_our_formation()
	{

	  $this->load->library("pagination");
	  $config = array();
	  $config["base_url"] = "#";
	  $config["total_rows"] = $this->crud_model->fetch_pagination_formations();
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
	   'country_table'   => $this->crud_model->fetch_details_pagination_formations($config["per_page"], $start)
	  );
	  echo json_encode($output);
	}



     // recherche de formations
     function fetch_search_our_formation()
     {
          $output = '';
          $query = '';
          if($this->input->post('query'))
          {
           $query = $this->input->post('query');
          }
          $data = $this->crud_model->fetch_data_search_formations($query);
          
          if($data->num_rows() > 0)
          {

              
              $link ='';
		      $jour = date('Y-m-d');


		      foreach($data->result() as $key)
		      {


		        if ($key->fin_inscription >= $jour) {
		          # code...
		          $link = '
		          <a class="btn btn-dark btn-sm" href="'.base_url().'user/formations_all/'.$key->idf.'"><i class="fa fa-eye"></i> voir plus</a>

		          <a class="btn btn-hub btn-sm" href="'.base_url().'user/formations_all/'.$key->idf.'"><i class="fa fa-hand-o-right"></i> Je m\'inscris à cette formation</a>';
		        }
		        else{
		          $link = '<a class="btn btn-dark btn-sm" href="'.base_url().'user/formations_all/'.$key->idf.'"><i class="fa fa-eye"></i> voir plus</a>

		          <a class="btn btn-danger btn-sm" href="javascript:void(0);"><i class="fa fa-calendar"></i> L\'inscription s\'est cloturée</a>

		          ';
		        }


		       $output .= '
		        <div class="col-md-12 p-r-25 p-r-15-sr991 mb-2">

		          <div class="card">
		            <div class="card-body">
		              <div class="col-md-12">

		                <div class="row">

		                  <div class="col-md-4">
		                    <a href="'.base_url().'user/formations_all/'.$key->idf.'" class="img-fluid">
		                      <img src="'.base_url().'upload/formations/'.$key->image.'" alt="IMG" class="img img-responsive img-thumbnail" style="height: 200px; border-color:#DC4405;">
		                    </a>
		                  </div>

		                  <div class="col-md-8">

		                    <h5 class="card-title">'. substr($key->nom, 0,100).'</h5>
		                   
		                    <div class="card-text">
		                      Debit inscription: <span class="text-warning">
		                        <i class="fa fa-calendar mr-1"></i> '.nl2br(substr(date(DATE_RFC822, strtotime($key->date_debit)), 0, 23)).'
		                      </span>
		                    </div>
		                    <div class="card-text">
		                      Fin inscription: <span class="text-warning">
		                        <i class="fa fa-calendar mr-1"></i> '.nl2br(substr(date(DATE_RFC822, strtotime($key->fin_inscription)), 0, 23)).'
		                      </span>
		                    </div>
		                    
		                    
		                    '.$link.'

		                  </div>


		                </div>

		              </div>
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

    function operation_inscription_formations(){
    	$year = $this->crud_model->get_info_annee();
   		$email =    htmlspecialchars($this->input->post('email'));
   		$annee =    $year;
   		$idf   =    htmlspecialchars($this->input->post('idf'));

   		$test = $this->crud_model->fetch_single_test_inscription_formations_home($idf,$email);
   		if ($test > 0) {
   			$this->session->set_flashdata('message2', 'vous vous  êtes déjà inscrit pour cette formation 🏧');
		    redirect('user/formations_all/'.$idf, 'refresh');
   			
   		}
   		else{

   			$insert_data = array(  
	           'nomcomplet'    		=>     htmlspecialchars($this->input->post('nomcomplet')),
	           'email'    			=>     htmlspecialchars($this->input->post('email')),
	           'telephone'    		=>     htmlspecialchars($this->input->post('telephone')),
	           'niveau_etude'    	=>     $this->input->post('niveau_etude'),
	           'domicile'    		=>     htmlspecialchars($this->input->post('domicile')),

	           'idf'    			=>     htmlspecialchars($this->input->post('idf')),
	           'annee'    			=>     htmlspecialchars($this->input->post('annee'))
	        ); 
   			$requete=$this->crud_model->insert_inscription_formations($insert_data);

   			if ($requete > 0) {
   				# code...

   				$users_cool = $this->crud_model->get_info_user();
	            foreach ($users_cool as $key) {

	                if ($key['idrole'] == 1) {
		               
		                $id_user_recever = $key['id'];
		                # code...
			        	$url    ="admin/inscri_formation/";
			            $nom    = htmlspecialchars($this->input->post('nomcomplet'));

			            $message = $nom." vient d'ajouter un module ".$this->input->post('titre');


			            $notification = array(
			              'titre'     =>    "Nouvelle inscription à la formation",
			              'icone'     =>    "fa fa-compass",
			              'message'   =>     $message,
			              'url'       =>     $url,
			              'id_user'   =>     $id_user_recever
			            );
			            
			            $not = $this->crud_model->insert_notification($notification);

		            }

		            
	              
	                # code...
	            }
   			}
   			else{

   			}


	    	$this->session->set_flashdata('message', "Félécitation!!! Votre inscription est encours de traitement 🆗, vous recevrez une notification de confirmation dans un instant!");
	    	redirect('user/formations_all/'.$idf, 'refresh');
	    	

   		}
	    
	  }


	  /*
	  **********************
	  script pour les articles 
	  =======================
	  ========================
	  */

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
		   'country_table'   => $this->crud_model->fetch_details_pagination_articles($config["per_page"], $start)
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
			            <a href="'.base_url().'user/blog/'.$key->idart.'" class="img-fluid">
			              <img src="'.base_url().'upload/article/'.$key->image.'" alt="IMG" class="img img-responsive img-thumbnail" style="height: 200px; border-color:#DC4405;">
			            </a>
			            <div class="col-md-12 p-t-16">
			              <h5 class="p-b-5">
			                <a href="'.base_url().'user/blog/'.$key->idart.'" class="f1-m-3 cl2 hov-cl10 trans-03">
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

    // insertion de vues 
    function insert_vue(){

        $idart      = $this->input->post('idart');
        $machine    = $this->input->post('machine');
        $test_existe = $this->crud_model->Select_idart_tag_insert($idart,$machine);
        if ($test_existe->num_rows() > 0) {
            echo("adresse ip existe deja");
        }
        else{

            $data_insert = array(
                'idart'        => $this->input->post('idart'),
                'machine'       => $this->input->post('machine')
            );

            $query = $this->crud_model->insert_vues_ip($data_insert);

        }
        
    }



    function pagination_view_coach_limit($param1='')
	{
	  $limit = $param1;
	  if ($limit !='') {
	  	$output = $this->crud_model->fetch_details_view_mes_formations_user($this->connected);
	  }
	  else{
	  	$output = $this->crud_model->fetch_details_view_mes_formations_user($this->connected);
	  }
	  
	  echo($output);
	}


	function operation_remise($idtravail='',$idlesson='', $idf='', $code=''){
			if ($idtravail !='' && $idlesson !='' && $idf !='' && $code !='') {
				# code...
				$test = $this->crud_model->fetch_single_inscription_remise($this->connected,$idtravail);
				if ($test > 0) {
					$this->session->set_flashdata('message2', 'Vous avez déjà remis à ce travail');
				 	redirect('user/work/'.$idlesson."/".$code, 'refresh');
					
				}
				else{

					$data['file'] = $this->upload_fichier_remis();
					$data['id_apprenant'] 	= $this->connected;
					$data['idtravail'] 		= $idtravail;

					$requete=$this->crud_model->insert_remise($data);

					if ($requete > 0) {
			    		# code...
				    	$users_cool = $this->crud_model->get_total_coach($idf);
					    foreach ($users_cool as $key) {

				          	$url ="formateur/formations";

				            $id_user_recever = $key['id_user'];

				            $nom   = $this->crud_model->get_name_user($this->connected);
				            $nom_formation   = $this->crud_model->get_name_formation($idf);
				            $message =$nom." vient de remettre son travail à la formation ".$nom_formation;

				            $notification = array(
				              'titre'     =>    "nouveau dépôt de travail",
				              'icone'     =>    "fa fa-tags",
				              'message'   =>     $message,
				              'url'       =>     $url,
				              'id_user'   =>     $id_user_recever
				            );
				            
				            $not = $this->crud_model->insert_notification($notification);
					          
					        # code...
					    }

					    $this->session->set_flashdata('message', "Félécitation!!! Votre travail est remis avec succès 🆗, vous recevrez une notification de confirmation dans un instant!");
			    		redirect('user/work/'.$idlesson."/".$code, 'refresh');

			    	}
				}

			}
			else{
				$this->session->set_flashdata('message2', 'Tous les champs doivent être completés');
				 redirect('user/work/'.$idlesson."/".$code, 'refresh');
			}
		   
			
			
	    
	}





	





    








}