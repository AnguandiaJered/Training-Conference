<?php 

defined('BASEPATH') OR exit('No direct script access allowed');  
class admin extends CI_Controller
{
		private $token;
		private $connected;
		protected $email_sites;
		public function __construct()
		{
		  parent::__construct();
		  if(!$this->session->userdata('admin_login'))
		  {
		      	redirect(base_url().'login');
		  }
		  $this->load->library('form_validation');
		  $this->load->library('encryption');
	      $this->load->library('pdf');
		  $this->load->model('crud_model'); 

		  $this->load->helper('url');

		  $this->token = "sk_test_51GzffmHcKfZ3B3C9DATC3YXIdad2ummtHcNgVK4E5ksCLbFWWLYAyXHRtVzjt8RGeejvUb6Z2yUk740hBAviBSyP00mwxmNmP1";
		  $this->connected = $this->session->userdata('admin_login');
		  $this->email_sites = $this->crud_model->get_email_du_site();

		}

		function index(){
			$data['title']="mon profile admin";
			$data['contact_info_site']  = $this->crud_model->Select_contact_info_site(); 
			$this->load->view('backend/admin/templete_admin', $data);
		}

		function article(){
			$data['title']="Paramétrage  des Blogs et publication";
		    $data['contact_info_site']  = $this->crud_model->Select_contact_info_site(); 
 
			$data['articles']  		= $this->crud_model->Select_articles();
			$data['categories']  	= $this->crud_model->Select_category();

			$this->load->view('backend/admin/article', $data);	
		}

		 function calendrier(){
	      $data['title']="Calendrier d'activité pour une réunion";
	      $data['contact_info_site']  = $this->crud_model->Select_contact_info_site(); 
	      $data['users'] = $this->crud_model->fetch_connected($this->connected);
	      
	      $this->load->view('backend/admin/zoom_calendar', $data);
	    }


		function zoom(){
	      $data['title']="Paramètrage zoom!";
	      $data['contact_info_site']  = $this->crud_model->Select_contact_info_site(); 
	      $data['users'] = $this->crud_model->fetch_connected($this->connected);
	      
	      $this->load->view('backend/admin/zoom', $data);
	    }

	    function invite(){
	      $data['title']="Paramètrage des invités zoom!";
	      $data['contact_info_site']  = $this->crud_model->Select_contact_info_site(); 
	      $data['users'] = $this->crud_model->fetch_connected($this->connected);
	      
	      $data['roles']  		= $this->crud_model->Select_formations_ok("idrole","role");
	      $data['conference']  		= $this->crud_model->Select_formations_ok("idconference","conference");
	      $this->load->view('backend/admin/invite_zoom', $data);
	    }

	    function reunion(){
	      $data['title']="Créer une reunion";
	      $data['contact_info_site']  = $this->crud_model->Select_contact_info_site(); 
	      $data['users'] = $this->crud_model->fetch_connected($this->connected);
	      
	      $data['roles']  		= $this->crud_model->Select_formations_ok("idrole","role");
	      $data['conference']  		= $this->crud_model->Select_formations_ok("idconference","conference");
	      $this->load->view('backend/admin/reunion', $data);
	    }

	    function joinmetting($param =''){
	      $data['title']="Rejoindre la reunion";
	      $data['domain']=$param;

	      $data['contact_info_site']  = $this->crud_model->Select_contact_info_site(); 
	      $data['users'] = $this->crud_model->fetch_connected($this->connected);
	      
	      $data['roles']  		= $this->crud_model->Select_formations_ok("idrole","role");
	      $data['conference']  		= $this->crud_model->Select_formations_ok("idconference","conference");
	      $this->load->view('backend/admin/joinmetting', $data);
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
	            $this->load->view('backend/admin/article_tag', $data);
	        }
	        else{

	            $data['title']="Nos blogs et évenèments";
	            $data['category_article']  = $this->crud_model->Select_article_all_ok();
	            $data['article_tag']  = $this->crud_model->Select_article_all_ok();
	            $this->load->view('backend/admin/blog', $data);

	        }

		}

		function commentaire(){
			$data['title']="Paramétrage  des commentaire pour les blogs";
		    $data['contact_info_site']  = $this->crud_model->Select_contact_info_site(); 
 
			$data['articles']  		= $this->crud_model->Select_articles();
			$data['categories']  	= $this->crud_model->Select_category();
			$data['articles']  	= $this->crud_model->Select_artcle_orders();
			

			$this->load->view('backend/admin/commentaire', $data);	
		}

		function formations(){

			$data['title']="Paramètrage de formations";
			$data['contact_info_site']  = $this->crud_model->Select_contact_info_site(); 
			$this->load->view('backend/admin/formations', $data);
		}

		function inscri_formation(){
			$data['title']="Paramètrage de l'inscription aux formations";
			$data['contact_info_site']  = $this->crud_model->Select_contact_info_site(); 
			$data['formations']  		= $this->crud_model->Select_formations();
			$this->load->view('backend/admin/inscri_formation', $data);
		}

		function liste_formation(){
			$data['title']="Paramètrage de l'inscription aux formations";
			$data['contact_info_site']  = $this->crud_model->Select_contact_info_site(); 
			$data['formations']  		= $this->crud_model->Select_formations_ok("idf","profile_inscription");
			$data['annees']  		= $this->crud_model->Select_formations_ok("annee","profile_inscription");
			$this->load->view('backend/admin/liste_formation', $data);
		}

		function liste_formateur(){
			$data['title']="Paramètrage de formateurs aux formations";
			$data['contact_info_site']  = $this->crud_model->Select_contact_info_site(); 
			$data['formations']  		= $this->crud_model->Select_formations_ok("idf","profile_coach");
			$data['editions']  		= $this->crud_model->Select_formateur_ok("edition","profile_coach");
			$this->load->view('backend/admin/liste_formateur', $data);
		}

		function dashbord(){
			  $data['title']="Tableau de bord";
			  $data['contact_info_site']  = $this->crud_model->Select_contact_info_site(); 
		      // $data['nombre_location'] = $this->crud_model->statistiques_nombre("profile_location");


		      $data['nombre_client'] = $this->crud_model->statistiques_nombre_tag_by_column("users", 2);

		      $data['nombre_membre'] = $this->crud_model->statistiques_nombre_tag_by_column("users", 3);

		      $data['nombre_paiement'] = $this->crud_model->statistiques_nombre("paiement");

		      $data['nombre_users'] = $this->crud_model->statistiques_nombre("users");
		      $this->load->view('backend/admin/dashbord', $data);
		}


		function printFormation($idf='', $annee=''){


	    	
	        $customer_id = "Bon d'etrée en stock ";
	        $html_content = '';

	        $html_content .= '<link href="' . base_url() . 'js/css/sb-admin-2.min.css" rel="stylesheet">';
	        
	        $html_content .= $this->crud_model->fetch_details_view_formation_pdf($idf, $annee);

	       //echo($html_content);
	       $this->pdf->loadHtml($html_content);
	       $this->pdf->setPaper('A3', 'portrait');
    	   //Render the HTML as PDF
	       $this->pdf->render();
	       $this->pdf->stream("".$customer_id.".pdf", array("Attachment"=>0));
	       
	    }

	    function paiement_normale($param1=''){
	    	$data['title']="Les transactions de paiement!";
	    	$data['token']= $param1;
	    	$data['users'] = $this->crud_model->fetch_connected($this->connected);
		    $data['contact_info_site']  = $this->crud_model->Select_contact_info_site();

		    $data['Hommes']   = $this->crud_model->fetch_membre_apprenant_inscrit();

	        $data['dates']    = $this->crud_model->fetch_categores_dates_compt();

		    $this->load->view('backend/admin/le_paiement', $data);

	    }

	    function format(){
	    	$data['title']="Validation inscription aux formatons!";
	    	$data['users'] = $this->crud_model->fetch_connected($this->connected);
		    $data['contact_info_site']  = $this->crud_model->Select_contact_info_site();

		    $data['Hommes']   = $this->crud_model->fetch_membre_apprenant_inscrit();

	        $data['formations']  		= $this->crud_model->Select_table_by("idf","formations");

		    $this->load->view('backend/admin/format', $data);

	    }

	    function attributionformat(){
	    	$data['title']="Attribution privilège aux formatons!";
	    	$data['users'] = $this->crud_model->fetch_connected($this->connected);
		    $data['contact_info_site']  = $this->crud_model->Select_contact_info_site();

		    $data['Hommes']   			= $this->crud_model->fetch_membre_formateur_inscrit();

	        $data['formations']  		= $this->crud_model->Select_table_by("idf","formations");

		    $this->load->view('backend/admin/attributionformat', $data);

	    }


	    function cours(){
	    	$data['title']="Paramètrage des cours!";
	    	$data['users'] = $this->crud_model->fetch_connected($this->connected);
		    $data['contact_info_site']  = $this->crud_model->Select_contact_info_site();

		    $data['Hommes']   			= $this->crud_model->fetch_membre_formateur_inscrit();

	        $data['formations']  		= $this->crud_model->Select_table_by("idf","profile_format");

		    $this->load->view('backend/admin/cours', $data);

	    }

	    function lesson(){
	    	$data['title']="Paramètrage des leçons!";
	    	$data['users'] = $this->crud_model->fetch_connected($this->connected);
		    $data['contact_info_site']  = $this->crud_model->Select_contact_info_site();

		    $data['Hommes']   			= $this->crud_model->fetch_membre_formateur_inscrit();

	        $data['formations']  		= $this->crud_model->Select_table_by("idf","profile_format");
	        $data['cours']  			= $this->crud_model->Select_table_by("idf","profile_format");

		    $this->load->view('backend/admin/lesson', $data);

	    }

	    function travaux(){
	    	$data['title']="Paramètrage des travaux!";
	    	$data['users'] = $this->crud_model->fetch_connected($this->connected);
		    $data['contact_info_site']  = $this->crud_model->Select_contact_info_site();

		    $data['Hommes']   			= $this->crud_model->fetch_membre_formateur_inscrit();

	        $data['formations']  		= $this->crud_model->Select_table_by("idf","profile_format");
	        
		    $this->load->view('backend/admin/travaux', $data);

	    }

	    

		function evaluation(){

		      $data['title']="Liste entière de projets startups";
		      $data['contact_info_site']  = $this->crud_model->Select_contact_info_site(); 
		      $data['users'] = $this->crud_model->fetch_connected($this->connected);
		      $data['padding'] = $this->crud_model->fetch_all_projects();

		      $this->load->view('backend/admin/evaluation', $data);
		}

		function evaluation_paiement(){
		    $data['title']="Evaluation de paiement";
	    	$data['users'] = $this->crud_model->fetch_connected($this->connected);
		    $data['contact_info_site']  = $this->crud_model->Select_contact_info_site();

		    $data['Hommes']   = $this->crud_model->fetch_membre_apprenant_inscrit();

	        $data['dates']    = $this->crud_model->fetch_categores_dates_compt();
	        $data['chart_data'] = $this->crud_model->get_stat_paie();
	        $this->load->view('backend/admin/evaluation_paiement', $data);
	    }

		
	


		function profile(){
	      $data['title']="mon profile admin";
	      $data['contact_info_site']  = $this->crud_model->Select_contact_info_site(); 
	      $data['users'] = $this->crud_model->fetch_connected($this->connected);
	      // $this->load->view('backend/admin/viewx', $data);
	      $this->load->view('backend/admin/profile', $data);
	    }

	    function basic(){
	        $data['title']="Information basique de mon compte";
	        $data['contact_info_site']  = $this->crud_model->Select_contact_info_site(); 
	        $data['users'] = $this->crud_model->fetch_connected($this->connected);
	        $this->load->view('backend/admin/basic', $data);
	    }

	    function basic_image(){
	        $data['title']="Information basique de ma photo";
	        $data['contact_info_site']  = $this->crud_model->Select_contact_info_site(); 
	        $data['users'] = $this->crud_model->fetch_connected($this->connected);
	        $this->load->view('backend/admin/basic_image', $data);
	    }

	    function basic_secure(){
	        $data['title']="Paramètrage de sécurité de mon compte";
	        $data['contact_info_site']  = $this->crud_model->Select_contact_info_site(); 
	        $data['users'] = $this->crud_model->fetch_connected($this->connected);
	        $this->load->view('backend/admin/basic_secure', $data);
	    }

	    function notification($param1=''){
	      $data['title']    ="Listes des formations";
	      $data['contact_info_site']  = $this->crud_model->Select_contact_info_site(); 
	      $data['users']    = $this->crud_model->fetch_connected($this->connected);
	      $this->load->view('backend/admin/notification', $data);
	    }


		function site(){
			$data['title']="Paramétrage  du site";
			$data['contact_info_site']  = $this->crud_model->Select_contact_info_site(); 
	    	$data['contact_info_site']  = $this->crud_model->Select_contact_info_site(); 
			$this->load->view('backend/admin/site', $data);		
		}
		function role(){
			$data['title']="Paramètrage de roles";
			$data['contact_info_site']  = $this->crud_model->Select_contact_info_site(); 
			$this->load->view('backend/admin/role', $data);
		}

		function category(){

			$data['title']="Paramètrage cétegorie produit";
			$data['contact_info_site']  = $this->crud_model->Select_contact_info_site(); 
			$this->load->view('backend/admin/category', $data);
		}

		function users(){
	      $data['title']="Nos utilisateurs";
	      $data['contact_info_site']  = $this->crud_model->Select_contact_info_site(); 
	      $data['contact_info_site']  = $this->crud_model->Select_contact_info_site(); 
	      $data['nombre_users']   = $this->crud_model->statistiques_nombre("users");
	      $data['nombre_users_m'] = $this->crud_model->statistiques_nombre_where("users","sexe","M");
	      $data['nombre_users_f'] = $this->crud_model->statistiques_nombre_where("users","sexe","F");
	      $data['nombre_users_a'] = $this->crud_model->statistiques_nombre_where_null("users","sexe","NULL");
	      $data['users']  = $this->crud_model->Select_users();   
	      $data['roles']  = $this->crud_model->Select_roles();    
	      $this->load->view('backend/admin/users', $data);
	    }

	    function stat_users(){
		    $data['title']="Statistique sur nos utilisateurs";
		    $data['contact_info_site']  = $this->crud_model->Select_contact_info_site(); 
		    $data['nombre_users']   = $this->crud_model->statistiques_nombre("users");
		    $data['nombre_users_m'] = $this->crud_model->statistiques_nombre_where("users","sexe","M");
		    $data['nombre_users_f'] = $this->crud_model->statistiques_nombre_where("users","sexe","F");
		    $data['nombre_users_a'] = $this->crud_model->statistiques_nombre_where_null("users","sexe","NULL");
		    $this->load->view('backend/admin/stat_users', $data);
		}


		// script pour la sauvegarge de données 
	    function database($param1 = '', $param2 = '')
	    {
	        
	        if($param1 == 'restore')
	        {
	            // $this->crud_model->import_db();
	            $this->session->set_flashdata('message',"Importation de la base des données avec succès!!!");
	            redirect(base_url() . 'admin/database/', 'refresh');
	        }
	        if($param1 == 'create')
	        {
	          $this->crud_model->create_backup();
	          $this->session->set_flashdata('message',"Sauvegarde de la base des données avec succès!!!");
	          redirect(base_url() . 'admin/database/', 'refresh');
	        }

	        $data['title'] = "Sauvegarde et restauration de la base des données";
	        $data['contact_info_site']  = $this->crud_model->Select_contact_info_site(); 
	         $data['contact_info_site']  = $this->crud_model->Select_contact_info_site();
	        $data['users'] = $this->crud_model->fetch_connected($this->connected);
	        $this->load->view('backend/admin/database', $data);
	    }
	    // fin script sauvegarde des données 

	    function approvisionnement(){
			$data['title']="Approvisionnement des produits";
			$data['contact_info_site']  = $this->crud_model->Select_contact_info_site(); 
			$data['categories'] = $this->crud_model->fetch_categores();
			$data['produits'] = $this->crud_model->fetch_produits();
			$this->load->view('backend/admin/approvisionnement', $data);
		}

		function galery(){

			$data['title']="Ajout Approvisionnement galery des produits";
			$data['contact_info_site']  = $this->crud_model->Select_contact_info_site(); 
			$data['categories'] = $this->crud_model->fetch_categores();
			$data['produits'] = $this->crud_model->fetch_produits();
			$this->load->view('backend/admin/galery', $data);
		}

		function entree(){

			$data['title']="Entrée en stock des produits";
			$data['contact_info_site']  = $this->crud_model->Select_contact_info_site(); 
			$data['categories'] = $this->crud_model->fetch_categores();
			$data['produits'] = $this->crud_model->fetch_produits();
			$this->load->view('backend/admin/entree_stock', $data);
		}

		

		function contact_info(){
		    $data['title']="Les informations de contact";
		    $data['contact_info_site']  = $this->crud_model->Select_contact_info_site();
		    $this->load->view('backend/admin/contact_info', $data);
		}

		/*

	    DEBIT FONCTION APPEL DES VIEWS UTILISATION DE PORTALI Ecommerce
	    MES SCRIPTS EcommerceB COMMENCE DEJE
	    ========================================================
	    */


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
		         redirect('admin/basic', 'refresh');
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
		           redirect('admin/basic_image', 'refresh');
		     }
		     else{

		        $this->session->set_flashdata('message2', 'Veillez selectionner la photo');
		        redirect('admin/basic_image', 'refresh');

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
		                   redirect('admin/basic_secure', 'refresh');

		               }
		               else{
		   
		                $this->session->set_flashdata('message2', 'les deux mot de passe doivent être identiques');
		                redirect('admin/basic_secure', 'refresh');
		               }
		         
		          }

		       }
		       else{

		          $this->session->set_flashdata('message2', 'information incorecte');
		          redirect('admin/basic_secure', 'refresh');
		       }
		     
		  } 

		  function view_1($param1='', $param2='', $param3=''){
		      
			  if($param1=='display_delete') {
			  	$this->session->set_flashdata('message', 'suppression avec succès ');
			    $query = $this->crud_model->delete_notifacation_tag($param2);
			    redirect('admin/notification');
			  }

			  if($param1=='display_delete_message') {

			    $query = $this->crud_model->delete_message_tag($param3);
			    redirect('admin/message/'.$param2);
			  }
			  else{

			  }

		  }


		// script de produit en stock

		function pagination_view_product()
		{

		  $this->load->library("pagination");
		  $config = array();
		  $config["base_url"] = "#";
		  $config["total_rows"] = $this->crud_model->count_all_view_product();
		  $config["per_page"] = 10;
		  $config["uri_segment"] = 3;
		  $config["use_page_numbers"] = TRUE;
		  $config["full_tag_open"] = '<ul class="nav pagination">';
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
		   'pagination_link'  => $this->pagination->create_links(),
		   'country_table'   => $this->crud_model->fetch_details_view_product($config["per_page"], $start)
		  );
		  echo json_encode($output);
		}


		function fetch_search_view_product()
		{
		  $output = '';
		  $query = '';
		  if($this->input->post('query'))
		  {
		   $query = $this->input->post('query');
		  }
		  $data = $this->crud_model->fetch_data_search_view_product($query);
		  $output .= '
	      <table class="table-striped  nk-tb-list nk-tb-ulist dataTable no-footer" data-auto-responsive="false" id="user_data" role="grid" aria-describedby="DataTables_Table_1_info">
	          <thead>  
	            <tr>         
	               <th width="10%">Image</th>
	               <th width="15%">Nom du produit</th>  
	               <th width="10%">Prix</th>
	               <th width="10%">Catégorie produit</th>
	               <th width="15%">Qte en stock</th>
	               <th width="10%">Utilisateur action</th>
	               <th width="5%">Modifier</th> 
	               <th width="5%">Supprimer</th>  
	            </tr> 
	         </thead> 
	      ';
	      if ($data->num_rows() < 0) {
	        
	      }
	      else{

	        foreach($data->result() as $row)
	        {
	         $output .= '
	         <tr>
	          <td><img src="'.base_url().'upload/product/'.$row->product_image.'" class="img img-responsive img-thumbnail" width="50" height="35" style="border-radius:50%;" /></td>

	          <td>'.nl2br(substr($row->product_name, 0,10)).'...'.'</td>
	          <td>'.nl2br(substr($row->product_price, 0,10)).' $'.'</td>
	          <td>'.nl2br(substr($row->nom, 0,20)).' ...'.'</td>
	          <td>'.nl2br(substr($row->Qte, 0,10)).' '.'</td>
	          <td>'.nl2br(substr($row->first_name, 0,10)).'...'.'</td>
	          
	          <td><button type="button" name="update" product_id="'.$row->product_id.'" class="btn btn-warning btn-circle btn-sm update"><i class="fa fa-edit"></i></button></td>
	          <td><button type="button" name="delete" product_id="'.$row->product_id.'" class="btn btn-danger btn-circle btn-sm delete"><i class="fa fa-trash"></i></button></td>
	          

	         </tr>
	         ';
	        }
	      }
	      $output .= '
	          <tfoot>  
	            <tr>         
	               <th width="10%">Image</th>
	               <th width="15%">Nom du produit</th>  
	               <th width="10%">Prix</th>
	               <th width="10%">Catégorie produit</th>
	               <th width="15%">Qte en stock</th>
	               <th width="10%">Utilisateur action</th>
	               <th width="5%">Modifier</th> 
	               <th width="5%">Supprimer</th>  
	            </tr> 
	         </tfoot>   
	            
	        </table>';
		  echo $output;
		}


        function fetch_product(){  

           $fetch_data = $this->crud_model->make_datatables_product();  
           $data = array();  
           foreach($fetch_data as $row)  
           {  
                $sub_array = array();  
                $sub_array[] = '<img src="'.base_url().'upload/product/'.$row->product_image.'" class="img-thumbnail" width="50" height="35" />';  
                $sub_array[] = nl2br(substr($row->product_name, 0,10)).'...'; 
                $sub_array[] = nl2br(substr($row->product_price, 0,10)).'...';  
                $sub_array[] = nl2br(substr($row->nom, 0,10)).'...'; 

                // $sub_array[] = '<img src="'.base_url().'upload/photo/'.$row->image.'" class="img-thumbnail" width="50" height="35" />';
                $sub_array[] = nl2br(substr($row->first_name, 0,10)).'...'; 
                
 
                $sub_array[] = '<button type="button" name="update" product_id="'.$row->product_id.'" class="btn btn-warning btn-xs update"><i class="fa fa-edit"></i></button>';  
                $sub_array[] = '<button type="button" name="delete" product_id="'.$row->product_id.'" class="btn btn-danger btn-xs delete"><i class="fa fa-trash"></i></button>';  
                $data[] = $sub_array;  
           }  
           $output = array(  
                "draw"                =>     intval($_POST["draw"]),  
                "recordsTotal"        =>     $this->crud_model->get_all_data_product(),  
                "recordsFiltered"     =>     $this->crud_model->get_filtered_data_product(),  
                "data"                =>     $data  
           );  
           echo json_encode($output);  
       }

      function fetch_single_product()  
      {  
           $output = array();  
           $data = $this->crud_model->fetch_single_product($_POST["product_id"]);  
           foreach($data as $row)  
           {  
                $output['product_name'] 		= $row->product_name;  
                $output['product_price'] 		= $row->product_price; 
                $output['category_id'] 			= $row->category_id; 
                $output['Qte'] 					= $row->Qte;
                $output['nom'] 					= $row->nom;
                

                if($row->product_image != '')  
                {  
                     $output['user_image'] = '<img src="'.base_url().'upload/product/'.$row->product_image.'" class="img-thumbnail" width="70" height="70" /><input type="hidden" name="hidden_user_image" value="'.$row->product_image.'" />';  
                }  
                else  
                {  
                     $output['user_image'] = '<input type="hidden" name="hidden_user_image" value="" />';  
                }  
           }  
           echo json_encode($output);  
      }  


      function operation_product(){

      	$id_user = $this->session->userdata("admin_login");


      	  if($_FILES["user_image"]["size"] > 0)  
          {  
               $insert_data = array(  
		           'product_name'           =>     $this->input->post('product_name'),  
		           'product_price'          =>     $this->input->post("product_price"), 
		           'Qte'          			=>     $this->input->post("Qte"),
		           'category_id'         	=>     $this->input->post('category_id'), 
		           'id_user'           		=>     $id_user, 
		           'product_image'          =>     $this->upload_image_product()
			  	);    
          }  
          else  
          {  
               $user_image = "photoDefaut.jpg";  
               $insert_data = array(  
		           'product_name'           =>     $this->input->post('product_name'),  
		           'product_price'          =>     $this->input->post("product_price"), 
		           'Qte'          			=>     $this->input->post("Qte"),
		           'category_id'         	=>     $this->input->post('category_id'), 
		           'id_user'           		=>     $id_user, 
		           'product_image'          =>     $user_image
			  	); 
          }

	      
	       
	      $requete=$this->crud_model->insert_product($insert_data);
	      echo("Ajout information avec succès");
	      
      }

      function modification_product(){
  
          if($_FILES["user_image"]["size"] > 0)  
          {  
               $updated_data = array(  
		           'product_name'           =>     $this->input->post('product_name'),  
		           'product_price'          =>     $this->input->post("product_price"), 
		           'category_id'         	=>     $this->input->post('category_id'),  
		           'Qte'          			=>     $this->input->post("Qte"),
		           'product_image'          =>     $this->upload_image_product()
			  	);    
          }  
          else  
          {  
               $updated_data = array(  
		           'product_name'           =>     $this->input->post('product_name'),  
		           'product_price'          =>     $this->input->post("product_price"), 
		           'Qte'          			=>     $this->input->post("Qte"),
		           'category_id'         	=>     $this->input->post('category_id')  
			  	);    
          }
  
          $this->crud_model->update_product($this->input->post("product_id"), $updated_data);

          echo("modification avec succès");
      }

      


      function supression_product(){
 
          $this->crud_model->delete_product($this->input->post("product_id"));

          echo("suppression avec succès");
        
      }


      function upload_image_product()  
	  {  
	       if(isset($_FILES["user_image"]))  
	       {  
	            $extension = explode('.', $_FILES['user_image']['name']);  
	            $new_name = rand() . '.' . $extension[1];  
	            $destination = './upload/product/' . $new_name;  
	            move_uploaded_file($_FILES['user_image']['tmp_name'], $destination);  
	            return $new_name;  
	       }  
	  } 
	  // fin de script product 


	  // script de galery produit en stock
        function fetch_galery(){  

           $fetch_data = $this->crud_model->make_datatables_galery();  
           $data = array();  
           foreach($fetch_data as $row)  
           {  
                $sub_array = array();  
                $sub_array[] = '<img src="'.base_url().'upload/product/galery/'.$row->photos.'" class="img-thumbnail" width="50" height="35" />';  
                $sub_array[] = nl2br(substr($row->product_name, 0,10)).'...'; 
                $sub_array[] = nl2br(substr($row->product_price, 0,10)).'...';  
                $sub_array[] = nl2br(substr($row->Qte, 0,10)).'...'; 

                
 
                $sub_array[] = '<button type="button" name="update" idgalery="'.$row->idgalery.'" class="btn btn-warning btn-circle btn-sm update"><i class="fa fa-edit"></i></button>';  
                $sub_array[] = '<button type="button" name="delete" idgalery="'.$row->idgalery.'" class="btn btn-danger btn-circle btn-sm delete"><i class="fa fa-trash"></i></button>';  
                $data[] = $sub_array;  
           }  
           $output = array(  
                "draw"                =>     intval($_POST["draw"]),  
                "recordsTotal"        =>     $this->crud_model->get_all_data_galery(),  
                "recordsFiltered"     =>     $this->crud_model->get_filtered_data_galery(),  
                "data"                =>     $data  
           );  
           echo json_encode($output);  
       }

      function fetch_single_galery()  
      {  
           $output = array();  
           $data = $this->crud_model->fetch_single_galery($_POST["idgalery"]);  
           foreach($data as $row)  
           {  
                $output['product_name'] 		= $row->product_name;  
                $output['product_price'] 		= $row->product_price; 
                $output['product_id'] 			= $row->product_id;

                $output['Qte'] 					= $row->Qte;
                

                if($row->photos != '')  
                {  
                     $output['user_image'] = '<img src="'.base_url().'upload/product/galery/'.$row->photos.'" class="img-thumbnail" width="70" height="70" /><input type="hidden" name="hidden_user_image" value="'.$row->photos.'" />';  
                }  
                else  
                {  
                     $output['user_image'] = '<input type="hidden" name="hidden_user_image" value="" />';  
                }  
           }  
           echo json_encode($output);  
      }  


      function operation_galery(){

      
      	  if($_FILES["user_image"]["size"] > 0)  
          {  
                $insert_data = array(  
		           'product_id'      =>     $this->input->post('product_id'),  
		           'photos'          =>     $this->upload_image_galery()
			  	);    
          }  
          else  
          {  
               $user_image = "photoDefaut.jpg";  
               $insert_data = array(  
		           'product_id'      =>     $this->input->post('product_id'),  
		           'photos'          =>     $user_image
			   ); 
          }

	      
	       
	      $requete=$this->crud_model->insert_galery($insert_data);
	      echo("Ajout information avec succès");
	      
      }

      function modification_galery(){
  
          if($_FILES["user_image"]["size"] > 0)  
          {  
               $updated_data = array(  
		           'product_id'      =>     $this->input->post('product_id'),  
		           'photos'          =>     $this->upload_image_galery()
			  	);    
          }  
          else  
          {  
               $updated_data = array(  
		           'product_id'      =>     $this->input->post('product_id')  
			  	);    
          }
  
          $this->crud_model->update_galery($this->input->post("idgalery"), $updated_data);

          echo("modification avec succès");
      }

      


      function supression_galery(){
 
          $this->crud_model->delete_galery($this->input->post("idgalery"));

          echo("suppression avec succès");
        
      }


      function upload_image_galery()  
	  {  
	       if(isset($_FILES["user_image"]))  
	       {  
	            $extension = explode('.', $_FILES['user_image']['name']);  
	            $new_name = rand() . '.' . $extension[1];  
	            $destination = './upload/product/galery/' . $new_name;  
	            move_uploaded_file($_FILES['user_image']['tmp_name'], $destination);  
	            return $new_name;  
	       }  
	  } 
	  // fin de script product galery


		// script de category
	    function fetch_category(){  

	           $fetch_data = $this->crud_model->make_datatables_category();  
	           $data = array();  
	           foreach($fetch_data as $row)  
	           {  
	                $sub_array = array();  
	               
	                $sub_array[] = nl2br(substr($row->nom, 0,50)); 
	                $sub_array[] = nl2br(substr(date(DATE_RFC822, strtotime($row->created_at)), 0, 23)); 
	               
	 
	                $sub_array[] = '<button type="button" name="update" idcat="'.$row->idcat.'" class="btn btn-warning btn-sm btn-circle update"><i class="fa fa-edit"></i></button>';  
	                $sub_array[] = '<button type="button" name="delete" idcat="'.$row->idcat.'" class="btn btn-danger btn-sm btn-circle delete"><i class="fa fa-trash"></i></button>';  
	                $data[] = $sub_array;  
	           }  
	           $output = array(  
	                "draw"                =>     intval($_POST["draw"]),  
	                "recordsTotal"        =>     $this->crud_model->get_all_data_category(),  
	                "recordsFiltered"     =>     $this->crud_model->get_filtered_data_category(),  
	                "data"                =>     $data  
	           );  
	           echo json_encode($output);  
	      }

	      function fetch_single_category()  
	      {  
	           $output = array();  
	           $data = $this->crud_model->fetch_single_category($_POST["idcat"]);  
	           foreach($data as $row)  
	           {  
	                $output['nom'] 		= $row->nom;  
	                
	               
	           }  
	           echo json_encode($output);  
	      }  


	      function operation_category(){

	          $insert_data = array(  
		           'nom'           	=>     $this->input->post('nom')
			  );  

		      $requete=$this->crud_model->insert_category($insert_data);
		      echo("Ajout information avec succès");
		      
	      }

	      function modification_category(){
	  
	          $updated_data = array(  
		           'nom'           	=>     $this->input->post('nom')
			  );
	  
	          $this->crud_model->update_category($this->input->post("idcat"), $updated_data);

	          echo("modification avec succès");
	      }

	      function supression_category(){
	 
	          $this->crud_model->delete_category($this->input->post("idcat"));
	          echo("suppression avec succès");
	        
	      }

		  // fin de sript parametrage 



	    // script des utilisateurs 
	    function fetch_users(){  

	           $fetch_data = $this->crud_model->make_datatables_users();  
	           $data = array(); 
	           $etat =''; 
	           foreach($fetch_data as $row)  
	           {  
	           		if ($row->idrole == 1) {
	           			$etat ='<span class="badge badge-success">Admin</span>';
	           		}
	           		else if ($row->idrole == 2) {
	           			$etat ='<span class="badge badge-danger">Apprenant</span>';
	           		}
	           		else if ($row->idrole == 3) {
	           			$etat ='<span class="badge badge-info">Agent</span>';
	           		}
	           		else if ($row->idrole == 4) {
	           			$etat ='<span class="badge badge-secondary">Formateur</span>';
	           		}
	           		else{
	           			$etat ='<span class="badge badge-danger">User</span>';
	           		}

	                $sub_array = array();  
	                $sub_array[] = '<img src="'.base_url().'upload/photo/'.$row->image.'" class="table-user-thumb" style="border-radius: 50%; width: 50px; height: 30px;" />';  
	                $sub_array[] = nl2br(substr($row->first_name, 0,50)).'...';  
	                $sub_array[] = nl2br(substr($row->last_name, 0,50)).'...'; 

	                $sub_array[] = nl2br(substr($row->sexe, 0,50)).'';

	                $sub_array[] = nl2br(substr($row->email, 0,50));

	                $sub_array[] = nl2br(substr($row->telephone, 0,50));
	                $sub_array[] = $etat;

	                
	 
	                $sub_array[] = '<button type="button" name="update" id="'.$row->id.'" class="btn btn-warning btn-circle btn-sm update"><i class="fa fa-edit"></i></button>'; 

	                $sub_array[] = '<button type="button" name="delete" id="'.$row->id.'" class="btn btn-danger btn-circle btn-sm delete"><i class="fa fa-trash"></i></button>';
	                
	                $data[] = $sub_array;  
	           }  
	           $output = array(  
	                "draw"                =>     intval($_POST["draw"]),  
	                "recordsTotal"        =>     $this->crud_model->get_all_data_users(),  
	                "recordsFiltered"     =>     $this->crud_model->get_filtered_data_users(),  
	                "data"                =>     $data  
	           );  
	           echo json_encode($output);  
	      }

	      function operation_users(){

	          if($_FILES["user_image"]["size"] > 0)  
	          {  
	               $insert_data = array(  
	                   'first_name'     =>     $this->input->post('first_name'),  
	                   'last_name'      =>     $this->input->post("last_name"),
	                   'email'          =>     $this->input->post("email"),
	                   'telephone'      =>     $this->input->post("telephone"),
	                   'full_adresse'   =>     $this->input->post("full_adresse"),
	                   'date_nais'      =>     $this->input->post("date_nais"), 
	                   'idrole'         =>     $this->input->post("idrole"),
	                   'sexe'           =>     $this->input->post("sexe"),
	                   'facebook'       =>     $this->input->post("facebook"),
	                   'twitter'        =>     $this->input->post("twitter"),
	                   'linkedin'       =>     $this->input->post("linkedin"),
	                   'passwords'      =>     md5(123456),
	                   'idrole'         =>     $this->input->post("idrole"), 
	                   'image'          =>     $this->upload_image_users()
	                );    
	          }  
	          else  
	          {  
	                 $user_image = "icone-user.png";  
	                 $insert_data = array(  
	                   'first_name'     =>     $this->input->post('first_name'),  
	                   'last_name'      =>     $this->input->post("last_name"),
	                   'email'          =>     $this->input->post("email"),
	                   'telephone'      =>     $this->input->post("telephone"),
	                   'full_adresse'   =>     $this->input->post("full_adresse"),
	                   'date_nais'      =>     $this->input->post("date_nais"), 
	                   'idrole'         =>     $this->input->post("idrole"),
	                   'sexe'           =>     $this->input->post("sexe"),
	                   'facebook'       =>     $this->input->post("facebook"),
	                   'twitter'        =>     $this->input->post("twitter"),
	                   'linkedin'       =>     $this->input->post("linkedin"),
	                   'idrole'         =>     $this->input->post("idrole"),
	                   'image'          =>     $user_image
	                );   
	          }

	        $requete=$this->crud_model->insert_users($insert_data);
	        echo("Ajout information avec succès");
	        
	      }

	      function modification_users(){

	          if($_FILES["user_image"]["size"] > 0)  
	          {  
	               $updated_data = array(  
	                   'first_name'     =>     $this->input->post('first_name'),  
	                   'last_name'      =>     $this->input->post("last_name"),
	                   'email'          =>     $this->input->post("email"),
	                   'telephone'      =>     $this->input->post("telephone"),
	                   'full_adresse'   =>     $this->input->post("full_adresse"),
	                   'date_nais'      =>     $this->input->post("date_nais"), 
	                   'sexe'           =>     $this->input->post("sexe"),
	                   'facebook'       =>     $this->input->post("facebook"),
	                   'twitter'        =>     $this->input->post("twitter"),
	                   'linkedin'       =>     $this->input->post("linkedin"),
	                   'idrole'         =>     $this->input->post("idrole"),
	                   'image'          =>     $this->upload_image_users()
	                );    
	          }  
	          
	          else  
	          {   
	               $updated_data = array(  
	                   'first_name'     =>     $this->input->post('first_name'),  
	                   'last_name'      =>     $this->input->post("last_name"),
	                   'email'          =>     $this->input->post("email"),
	                   'telephone'      =>     $this->input->post("telephone"),
	                   'full_adresse'   =>     $this->input->post("full_adresse"),
	                   'date_nais'      =>     $this->input->post("date_nais"), 
	                   'sexe'           =>     $this->input->post("sexe"),
	                   'facebook'       =>     $this->input->post("facebook"),
	                   'twitter'        =>     $this->input->post("twitter"),
	                   'idrole'         =>     $this->input->post("idrole"),
	                   'linkedin'       =>     $this->input->post("linkedin")
	                );   
	          }
	  
	          
	          $this->crud_model->update_users($this->input->post("id"), $updated_data);

	          echo("modification avec succès");
	      }

	      function supression_users(){
	 
	          $this->crud_model->delete_users($this->input->post("id"));
	          echo("suppression avec succès");
	        
	      }

	      function fetch_single_users()  
	      {  
	           $output = array();  
	           $data = $this->crud_model->fetch_single_users($this->input->post('id'));  
	           foreach($data as $row)  
	           {  
	                $output['first_name'] = $row->first_name;  
	                $output['last_name'] = $row->last_name; 

	                $output['email'] = $row->email;
	                $output['telephone'] = $row->telephone;
	                $output['full_adresse'] = $row->full_adresse;
	                $output['biographie'] = $row->biographie;
	                $output['date_nais'] = $row->date_nais;
	                $output['sexe'] = $row->sexe;
	                $output['idrole'] = $row->idrole;

	                $output['facebook'] = $row->facebook;
	                $output['linkedin'] = $row->linkedin;
	                $output['twitter'] = $row->twitter;
	                $output['image'] = $row->image;

	                if($row->image != '')  
	                {  
	                     $output['user_image'] = '<img src="'.base_url().'upload/photo/'.$row->image.'" class="img-thumbnail" width="300" height="250" /><input type="hidden" name="hidden_user_image" value="'.$row->image.'" />';  
	                }  
	                else  
	                {  
	                     $output['user_image'] = '<input type="hidden" name="hidden_user_image" value="" />';  
	                }  

	                
	           }  
	           echo json_encode($output);  
	      }

      // fun script utilisateurs 



	    // script de role
		function fetch_role(){  

		       $fetch_data = $this->crud_model->make_datatables_role();  
		       $data = array();  
		       foreach($fetch_data as $row)  
		       {  
		            $sub_array = array();  
		           
		            $sub_array[] = nl2br(substr($row->nom, 0,50)); 
		            $sub_array[] = nl2br(substr(date(DATE_RFC822, strtotime($row->created_at)), 0, 23)); 
		           

		            $sub_array[] = '<button type="button" name="update" idrole="'.$row->idrole.'" class="btn btn-warning btn-circle btn-sm update"><i class="fa fa-edit"></i></button>';  
		            $sub_array[] = '<button type="button" name="delete" idrole="'.$row->idrole.'" class="btn btn-danger btn-circle btn-sm delete"><i class="fa fa-trash"></i></button>';  
		            $data[] = $sub_array;  
		       }  
		       $output = array(  
		            "draw"                =>     intval($_POST["draw"]),  
		            "recordsTotal"        =>     $this->crud_model->get_all_data_role(),  
		            "recordsFiltered"     =>     $this->crud_model->get_filtered_data_role(),  
		            "data"                =>     $data  
		       );  
		       echo json_encode($output);  
		  }

		  function fetch_single_role()  
		  {  
		       $output = array();  
		       $data = $this->crud_model->fetch_single_role($_POST["idrole"]);  
		       foreach($data as $row)  
		       {  
		            $output['nom']    = $row->nom;  
		            
		           
		       }  
		       echo json_encode($output);  
		  }  


		  function operation_role(){

		    $insert_data = array(  
		           'nom'            =>     $this->input->post('nom')
		    );  

		      $requete=$this->crud_model->insert_role($insert_data);
		      echo("Ajout information avec succès");
		      
		  }

		  function modification_role(){

		      $updated_data = array(  
		           'nom'            =>     $this->input->post('nom')
		    );

		      $this->crud_model->update_role($this->input->post("idrole"), $updated_data);

		      echo("modification avec succès");
		  }

		  function supression_role(){

		      $this->crud_model->delete_role($this->input->post("idrole"));
		      echo("suppression avec succès");
		    
		  }

		  // fin role

		// script de tbl_info
	    function fetch_tbl_info(){  

	           $fetch_data = $this->crud_model->make_datatables_tbl_info();  
	           $data = array();  
	           foreach($fetch_data as $row)  
	           {  
	                $sub_array = array();  
	                $sub_array[] = '<img src="'.base_url().'upload/tbl_info/'.$row->icone.'" class="img-thumbnail img-responsive" width="50" height="35" style="border-radius:50%;" />';  
	                $sub_array[] = nl2br(substr($row->nom_site, 0,10)).'...'; 
	                $sub_array[] = nl2br(substr($row->email, 0,10)).'...';  
	                $sub_array[] = nl2br(substr($row->tel1, 0,10)).'...'; 
	                // $sub_array[] = nl2br(substr($row->tel2, 0,5)).'...'; 
	                $sub_array[] = nl2br(substr($row->adresse, 0,10)).'...'; 
	                $sub_array[] = nl2br(substr($row->facebook, 0,10)).'...'; 
	                $sub_array[] = nl2br(substr($row->twitter, 0,10)).'...'; 
	                $sub_array[] = nl2br(substr($row->linkedin, 0,10)).'...'; 
	                // $sub_array[] = nl2br(substr($row->termes, 0,10)).'...'; 
	                // $sub_array[] = nl2br(substr($row->confidentialite, 0,10)).'...'; 
	                
	 
	                $sub_array[] = '<button type="button" name="update" idinfo="'.$row->idinfo.'" class="btn btn-warning btn-circle btn-sm update"><i class="fa fa-edit"></i></button>';  
	                $sub_array[] = '<button type="button" name="delete" idinfo="'.$row->idinfo.'" class="btn btn-danger btn-circle btn-sm delete"><i class="fa fa-trash"></i></button>';  
	                $data[] = $sub_array;  
	           }  
	           $output = array(  
	                "draw"                =>     intval($_POST["draw"]),  
	                "recordsTotal"        =>     $this->crud_model->get_all_data_tbl_info(),  
	                "recordsFiltered"     =>     $this->crud_model->get_filtered_data_tbl_info(),  
	                "data"                =>     $data  
	           );  
	           echo json_encode($output);  
	      }

	      function fetch_single_tbl_info()  
	      {  
	           $output = array();  
	           $data = $this->crud_model->fetch_single_tbl_info($_POST["idinfo"]);  
	           foreach($data as $row)  
	           {  
	                $output['nom_site']     = $row->nom_site;  
	                $output['adresse']      = $row->adresse; 
	                $output['tel1']       = $row->tel1; 
	                $output['tel2']       = $row->tel2; 
	                $output['email']      = $row->email; 
	                $output['facebook']     = $row->facebook; 
	                $output['twitter']      = $row->twitter; 
	                $output['linkedin']     = $row->linkedin;

	                $output['termes']       = $row->termes;
	                $output['confidentialite']  = $row->confidentialite;

	                $output['description']   = $row->description;
	                $output['mission']       = $row->mission;
	                $output['objectif']      = $row->objectif;
	                $output['blog']      = $row->blog;


	                if($row->icone != '')  
	                {  
	                     $output['user_image'] = '<img src="'.base_url().'upload/tbl_info/'.$row->icone.'" class="img-thumbnail" width="70" height="70" /><input type="hidden" name="hidden_user_image" value="'.$row->icone.'" />';  
	                }  
	                else  
	                {  
	                     $output['user_image'] = '<input type="hidden" name="hidden_user_image" value="" />';  
	                }  
	           }  
	           echo json_encode($output);  
	      }  


	      function operation_tbl_info(){


	          if($_FILES["user_image"]["size"] > 0)  
	          {  
	               $insert_data = array(  
	               'nom_site'             =>     $this->input->post('nom_site'),  
	               'tel1'               =>     $this->input->post("tel1"), 
	               'tel2'                 =>     $this->input->post('tel2'), 
	               'adresse'              =>     $this->input->post("adresse"), 
	               'facebook'             =>     $this->input->post("facebook"), 
	               'twitter'              =>     $this->input->post("twitter"),
	               'linkedin'             =>     $this->input->post("linkedin"), 
	               'email'              =>     $this->input->post("email"),
	               'termes'               =>     $this->input->post("termes"),
	               'confidentialite'        =>     $this->input->post("confidentialite"), 
	               'description'        =>     $this->input->post("description"), 
	               'mission'            =>     $this->input->post("mission"), 
	               'objectif'           =>     $this->input->post("objectif"),
	               'blog'               =>     $this->input->post("blog"), 
	               'icone'              =>     $this->upload_image_tbl_info()
	          );    
	          }  
	          else  
	          {  
	               $user_image = "icone-user.png";  
	               $insert_data = array(  
	               'nom_site'           =>     $this->input->post('nom_site'),  
	               'tel1'               =>     $this->input->post("tel1"), 
	               'tel2'               =>     $this->input->post('tel2'), 
	               'adresse'            =>     $this->input->post("adresse"), 
	               'facebook'           =>     $this->input->post("facebook"), 
	               'twitter'            =>     $this->input->post("twitter"),
	               'linkedin'           =>     $this->input->post("linkedin"), 
	               'email'              =>     $this->input->post("email"),
	               'termes'             =>     $this->input->post("termes"),
	               'confidentialite'    =>     $this->input->post("confidentialite"), 
	               'description'        =>     $this->input->post("description"), 
	               'mission'            =>     $this->input->post("mission"), 
	               'objectif'           =>     $this->input->post("objectif"), 
	               'blog'               =>     $this->input->post("blog"), 
	               'icone'              =>     $user_image
	          );   
	          }

	        
	         
	        $requete=$this->crud_model->insert_tbl_info($insert_data);
	        echo("Ajout information avec succès");
	        
	      }

	      function modification_tbl_info(){
	  
	          if($_FILES["user_image"]["size"] > 0)  
	          {  
	               $updated_data = array(  
	               'nom_site'             =>     $this->input->post('nom_site'),  
	               'tel1'               =>     $this->input->post("tel1"), 
	               'tel2'                 =>     $this->input->post('tel2'), 
	               'adresse'              =>     $this->input->post("adresse"), 
	               'facebook'             =>     $this->input->post("facebook"), 
	               'twitter'              =>     $this->input->post("twitter"),
	               'linkedin'             =>     $this->input->post("linkedin"), 
	               'email'              =>     $this->input->post("email"),
	               'termes'               =>     $this->input->post("termes"),
	               'confidentialite'        =>     $this->input->post("confidentialite"), 
	               'description'        =>     $this->input->post("description"), 
	               'mission'            =>     $this->input->post("mission"), 
	               'objectif'           =>     $this->input->post("objectif"),
	               'blog'               =>     $this->input->post("blog"), 
	               'icone'                  =>     $this->upload_image_tbl_info()
	          );    
	          }  
	          else  
	          {  
	               $updated_data = array(  
	               'nom_site'             =>     $this->input->post('nom_site'),  
	               'tel1'               =>     $this->input->post("tel1"), 
	               'tel2'                 =>     $this->input->post('tel2'), 
	               'adresse'              =>     $this->input->post("adresse"), 
	               'facebook'             =>     $this->input->post("facebook"), 
	               'twitter'              =>     $this->input->post("twitter"),
	               'linkedin'             =>     $this->input->post("linkedin"), 
	               'email'              =>     $this->input->post("email"),
	               'termes'               =>     $this->input->post("termes"),
	               'description'        =>     $this->input->post("description"), 
	               'mission'            =>     $this->input->post("mission"), 
	               'objectif'           =>     $this->input->post("objectif"), 
	               'blog'               =>     $this->input->post("blog"),
	               'confidentialite'        =>     $this->input->post("confidentialite")
	          );    
	          }
	  
	          $this->crud_model->update_tbl_info($this->input->post("idinfo"), $updated_data);

	          echo("modification avec succès");
	      }

	      


	      function supression_tbl_info(){
	 
	          $this->crud_model->delete_tbl_info($this->input->post("idinfo"));

	          echo("suppression avec succès");
	        
	      }

	      // fin script tbl_info


	    // script de galery produit en stock

	    function pagination_view_sortie()
		{

		  $this->load->library("pagination");
		  $config = array();
		  $config["base_url"] = "#";
		  $config["total_rows"] = $this->crud_model->count_all_view_sortie();
		  $config["per_page"] = 10;
		  $config["uri_segment"] = 3;
		  $config["use_page_numbers"] = TRUE;
		  $config["full_tag_open"] = '<ul class="nav pagination">';
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
		   'pagination_link'  => $this->pagination->create_links(),
		   'country_table'   => $this->crud_model->fetch_details_view_sortie($config["per_page"], $start)
		  );
		  echo json_encode($output);
		}


		function fetch_search_view_sortie()
		{
		  $output = '';
		  $query = '';
		  if($this->input->post('query'))
		  {
		   $query = $this->input->post('query');
		  }
		  $data = $this->crud_model->fetch_data_search_view_sortie($query);
		  $output .= '
	      <table class="table-striped  nk-tb-list nk-tb-ulist dataTable no-footer" data-auto-responsive="false" id="user_data" role="grid" aria-describedby="DataTables_Table_1_info">
	          <thead>  
	            <tr>         
	               <th width="10%">Image</th>
	               <th width="25%">Nom du produit</th>  
	               <th width="10%">Prix</th>
	               <th width="10%">Qte en stock</th>
	                 
	               <th width="10%">Qte en sortie</th>

	               <th width="25%">Mise à jour</th>

	               <th width="5%">Modifier</th> 
	               <th width="5%">Supprimer</th>  
	            </tr> 
	         </thead> 
	      ';
	      if ($data->num_rows() < 0) {
	        
	        $output .= '
	         <tr>
	          <td colspan="8">Aucune donnée n\'est à présent</td>

	         </tr>
	         ';
	      }
	      else{

	        foreach($data->result() as $row)
	        {
	         $output .= '
	         <tr>
	          <td><img src="'.base_url().'upload/product/'.$row->product_image.'" class="img img-responsive img-thumbnail" width="50" height="35" style="border-radius:50%;" /></td>

	          <td>'.nl2br(substr($row->product_name, 0,10)).'...'.'</td>
	          <td>'.nl2br(substr($row->product_price, 0,10)).' $'.'</td>
	          <td>'.nl2br(substr($row->Qte, 0,10)).'...'.'</td>
	          <td>'.nl2br(substr($row->QteEntree, 0,10)).'...'.'</td>
	          <td>'.nl2br(substr(date(DATE_RFC822, strtotime($row->created_at)), 0, 23)).'</td>

	          <td><button type="button" name="update" ids="'.$row->ids.'" class="btn btn-warning btn-circle btn-sm update"><i class="fa fa-edit"></i></button></td>
	          <td><button type="button" name="delete" ids="'.$row->ids.'" class="btn btn-danger btn-circle btn-sm delete"><i class="fa fa-trash"></i></button></td>
	          

	         </tr>
	         ';
	        }
	      }
	      $output .= '
	          <tfoot>  
	                <tr>         
	                  <th width="10%">Image</th>
	                  <th width="25%">Nom du produit</th>  
	                  <th width="10%">Prix</th>
	                  <th width="10%">Qte en stock</th>
	                   
	                  <th width="10%">Qte en sortie</th>

	                  <th width="25%">Mise à jour</th>

	                  
	                  <th width="5%">Modifier</th> 
	                  <th width="5%">Supprimer</th>      
	              </tr> 
	         </tfoot>   
	            
	        </table>';
		  echo $output;
		}



        function fetch_entree(){  

           $fetch_data = $this->crud_model->make_datatables_entree();  
           $data = array();  
           foreach($fetch_data as $row)  
           {  
                $sub_array = array();  
                $sub_array[] = '<img src="'.base_url().'upload/product/'.$row->product_image.'" class="img img-responsive img-thumbnail" width="50" height="35" style="border-radius:50%;" />';  
                $sub_array[] = nl2br(substr($row->product_name, 0,10)).'...'; 
                $sub_array[] = nl2br(substr($row->product_price, 0,10)).' $';  
                $sub_array[] = nl2br(substr($row->Qte, 0,10)).'...'; 

                $sub_array[] = nl2br(substr($row->QteEntree, 0,10)).'...';

                $sub_array[] = nl2br(substr(date(DATE_RFC822, strtotime($row->created_at)), 0, 23)); 
                
                $sub_array[] = '<button type="button" name="update" ide="'.$row->ide.'" class="btn btn-warning btn-circle btn-sm update"><i class="fa fa-edit"></i></button>';  
                $sub_array[] = '<button type="button" name="delete" ide="'.$row->ide.'" class="btn btn-danger btn-circle btn-sm delete"><i class="fa fa-trash"></i></button>';  
                $data[] = $sub_array;  
           }  
           $output = array(  
                "draw"                =>     intval($_POST["draw"]),  
                "recordsTotal"        =>     $this->crud_model->get_all_data_entree(),  
                "recordsFiltered"     =>     $this->crud_model->get_filtered_data_entree(),  
                "data"                =>     $data  
           );  
           echo json_encode($output);  
        }

      function fetch_single_entree()  
      {  
           $output = array();  
           $data = $this->crud_model->fetch_single_entree($_POST["ide"]);  
           foreach($data as $row)  
           {  
                $output['product_name'] 		= $row->product_name;  
                $output['product_price'] 		= $row->product_price; 
                $output['product_id'] 			= $row->product_id;

                $output['Qte'] 					= $row->Qte;
                $output['QteEntree'] 			= $row->QteEntree;
                

           }  
           echo json_encode($output);  
      }  


      function operation_entree(){

      	    $insert_data = array(  
	           'product_id'      =>    $this->input->post('product_id'),  
	           'QteEntree'      =>     $this->input->post('QteEntree') 
		  	);

		  	$updated_data = array(  
	           'Qte'      =>    $this->input->post('qte_disponsible')
		  	);  
	       
	      	$requete=$this->crud_model->insert_entree($insert_data);
	      	if ($requete > 0) {
	      		$this->crud_model->update_product($this->input->post("product_id"), $updated_data);
	      	}

	      	echo("Ajout information avec succès");
	      
      }

      function modification_entree(){
  
        $updated_data = array(  
           'product_id'     =>    $this->input->post('product_id'),  
           'QteEntree'      =>     $this->input->post('QteEntree') 
	  	);

        $this->crud_model->update_entree($this->input->post("ide"), $updated_data);

        echo("modification avec succès");
      }

      function supression_entree(){
 
          $this->crud_model->delete_entree($this->input->post("ide"));

          echo("suppression avec succès");
        
      }
	  // fin de script entree product

	  // script de sortie produit en stock
       function fetch_sortie(){  

           $fetch_data = $this->crud_model->make_datatables_sortie();  
           $data = array();  
           foreach($fetch_data as $row)  
           {  
                $sub_array = array();  
                $sub_array[] = '<img src="'.base_url().'upload/product/'.$row->product_image.'" class="img img-responsive img-thumbnail" width="50" height="35" style="border-radius:50%;" />';  
                $sub_array[] = nl2br(substr($row->product_name, 0,10)).'...'; 
                $sub_array[] = nl2br(substr($row->product_price, 0,10)).' $';  
                $sub_array[] = nl2br(substr($row->Qte, 0,10)).'...'; 

                $sub_array[] = nl2br(substr($row->QteEntree, 0,10)).'...';

                $sub_array[] = nl2br(substr(date(DATE_RFC822, strtotime($row->created_at)), 0, 23)); 
                
                $sub_array[] = '<button type="button" name="update" ids="'.$row->ids.'" class="btn btn-warning btn-circle btn-sm update"><i class="fa fa-edit"></i></button>';  
                $sub_array[] = '<button type="button" name="delete" ids="'.$row->ids.'" class="btn btn-danger btn-circle btn-sm delete"><i class="fa fa-trash"></i></button>';  
                $data[] = $sub_array;  
           }  
           $output = array(  
                "draw"                =>     intval($_POST["draw"]),  
                "recordsTotal"        =>     $this->crud_model->get_all_data_sortie(),  
                "recordsFiltered"     =>     $this->crud_model->get_filtered_data_sortie(),  
                "data"                =>     $data  
           );  
           echo json_encode($output);  
       }

      function fetch_single_sortie()  
      {  
           $output = array();  
           $data = $this->crud_model->fetch_single_sortie($_POST["ids"]);  
           foreach($data as $row)  
           {  
                $output['product_name'] 		= $row->product_name;  
                $output['product_price'] 		= $row->product_price; 
                $output['product_id'] 			= $row->product_id;

                $output['Qte'] 					= $row->Qte;
                $output['QteEntree'] 			= $row->QteEntree;
                

           }  
           echo json_encode($output);  
      }  


      function operation_sortie(){

      	    $insert_data = array(  
	           'product_id'      =>    $this->input->post('product_id'),  
	           'QteEntree'      =>     $this->input->post('QteEntree') 
		  	);

		  	$updated_data = array(  
	           'Qte'      =>    $this->input->post('qte_disponsible')
		  	);  
	       
	      	$requete=$this->crud_model->insert_sortie($insert_data);
	      	if ($requete > 0) {
	      		$this->crud_model->update_product($this->input->post("product_id"), $updated_data);
	      	}

	      	echo("Ajout information avec succès");
	      
      }

      function modification_sortie(){
  
        $updated_data = array(  
           'product_id'     =>    $this->input->post('product_id'),  
           'QteEntree'      =>     $this->input->post('QteEntree') 
	  	);

        $this->crud_model->update_sortie($this->input->post("ids"), $updated_data);

        echo("modification avec succès");
      }

      function supression_sortie(){
 
          $this->crud_model->delete_sortie($this->input->post("ids"));
          echo("suppression avec succès");
        
      }
	  // fin de script sortie product









      function upload_image_users()  
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

      function upload_image_tbl_info()  
  	  {  
  	       if(isset($_FILES["user_image"]))  
  	       {  
  	            $extension = explode('.', $_FILES['user_image']['name']);  
  	            $new_name = rand() . '.' . $extension[1];  
  	            $destination = './upload/tbl_info/' . $new_name;  
  	            move_uploaded_file($_FILES['user_image']['tmp_name'], $destination);  
  	            return $new_name;  
  	       }  
  	  }

  	// script pour formulaire de contact 
    // ajout des contacts
    function fetch_contact(){  

       $fetch_data = $this->crud_model->make_datatables_contact();  
       $data = array();  
       foreach($fetch_data as $row)  
       {  

          if ($row->fichier != '') {
            $etat = '<a href="'.base_url().'upload/contact/'.$row->fichier.'" class="badge badge-white"><i class="fa fa-file"></i></a>';
          }
          else{
            $etat = '';
          }

            $sub_array = array();

            $sub_array[] = '
            <input type="checkbox" class="delete_checkbox" value="'.$row->email.'" />
            ';  
              
            $sub_array[] = nl2br(substr($row->nom, 0,20)).'...';  
            $sub_array[] = nl2br(substr($row->sujet, 0,20)).'...'; 
            $sub_array[] = $row->email; 
            $sub_array[] = nl2br(substr($row->message, 0,50)).'...';
            $sub_array[] = substr(date(DATE_RFC822, strtotime($row->created_at)), 0, 23);

            $sub_array[] = $etat; 

            $sub_array[] = '<button type="button" name="delete" idcontact="'.$row->id.'" class="btn btn-dark btn-circle btn-sm update"><i class="fa fa-comment-o"></i></button>'; 

            $sub_array[] = '<button type="button" name="delete" idcontact="'.$row->id.'" class="btn btn-danger btn-circle btn-sm delete"><i class="fa fa-trash"></i></button>';  
            $data[] = $sub_array;  
       }  
       $output = array(  
            "draw"                =>     intval($_POST["draw"]),  
            "recordsTotal"        =>     $this->crud_model->get_all_data_contact(),  
            "recordsFiltered"     =>     $this->crud_model->get_filtered_data_contact(),  
            "data"                =>     $data  
       );  
       echo json_encode($output);  
  }

  function fetch_single_contact()  
  {  
       $output = array();  
       $data = $this->crud_model->fetch_single_contact($this->input->post('idcontact'));  
       foreach($data as $row)  
       {  
            $output['nom'] = $row->nom;  
            $output['message'] = $row->message;
            $output['email'] = $row->email;
            $output['sujet'] = $row->sujet; 

       }  
       echo json_encode($output);  
  } 

  function operation_contact(){

    $insert_data = array(  
         'nom'          =>     $this->input->post('name'),  
         'sujet'       =>     $this->input->post("subject"),
         'email'         =>     $this->input->post("email"),  
         'message'       =>     $this->input->post("message")  
         
  );  
     
    $requete=$this->crud_model->insert_contact($insert_data);
    echo("Ajout message  avec succès");
    
  }

  
  function supression_contact()
  {

      $this->crud_model->delete_contact($this->input->post("idcontact"));

      echo("suppression avec succès");
    
  }

    function infomation_par_mail()
    {
        if($this->input->post('checkbox_value'))
        {
           $id = $this->input->post('checkbox_value');
           for($count = 0; $count < count($id); $count++)
           {
               
                $mail    = $id[$count];
                $website = $this->email_sites;

                $to =$id[$count];
                $subject = $this->input->post('sujet');
                $message2 = $this->input->post('message');
                 

                $headers= "MIME Version 1.0\r\n";
                $headers .= "Content-type: text/html; charset=UTF-8\r\n";
                $headers .= "From: no-reply@etskase.com" . "\r\n" ."Reply-to: sumailiroger681@gmail.com"."\r\n"."X-Mailer: PHP/".phpversion();

                mail($to,$subject,$message2,$headers);

           }

           if(mail($to,$subject,$message2,$headers) > 0){
                echo("message envoyé avec succès");
           } 
           else {
                echo("échec lors de l'envoie de message!!!!!!!!!!!!");
           }


        }
    }
     // fin contact

    // script de article
	function fetch_article(){  

	       $fetch_data = $this->crud_model->make_datatables_article();  
	       $data = array();  
	       $etat = '';
	       foreach($fetch_data as $row)  
	       {  
	            $sub_array = array(); 

	            if ($row->type=='texte') {
	            	$etat = '
	            <div class="user-avatar bg-dim-primary d-none d-sm-flex text-center">
	                <span><i class="fa fa-file text-primary" ></i></span>
	            </div>
	             ';
	            }
	            elseif ($row->type=='video'){
	            	$etat = '
		                <div class="user-avatar bg-dim-danger d-none d-sm-flex">
		                    <span><i class="fa fa-video-camera text-primary"></i></span>
		                </div>
		            ';
	            }
	            else{

	            	$etat = '';
	            }


	            $sub_array[] = $etat;
	           
	            // $sub_array[] = '<img src="'.base_url().'upload/article/'.$row->image.'" class="img-thumbnail user-avatar bg-success  d-sm-flex" width="50" height="35" />';  
	            $sub_array[] = nl2br(substr($row->nom, 0,20)).'...';  
	            $sub_array[] = nl2br(substr($row->description, 0,10)).'...'; 

	            $sub_array[] = nl2br(substr($row->nom_cat, 0,15)).' ...';

	            $sub_array[] = nl2br(substr($row->type, 0,15)).'';

	            $sub_array[] = nl2br(substr(date(DATE_RFC822, strtotime($row->created_at)), 0, 23)); 

	           
	            $sub_array[] = '<button type="button" name="update" idart="'.$row->idart.'" class="btn btn-success btn-circle btn-sm update"><i class="fa fa-edit"></i></button>'; 

	            $sub_array[] = '<button type="button" name="delete" idart="'.$row->idart.'" class="btn btn-danger btn-circle btn-sm delete"><i class="fa fa-trash"></i></button>';
	            
	            $data[] = $sub_array;  
	       }  
	       $output = array(  
	            "draw"                =>     intval($_POST["draw"]),  
	            "recordsTotal"        =>     $this->crud_model->get_all_data_article(),  
	            "recordsFiltered"     =>     $this->crud_model->get_filtered_data_article(),  
	            "data"                =>     $data  
	       );  
	       echo json_encode($output);  
	  }


	  function fetch_article_pub(){  

	       $fetch_data = $this->crud_model->make_datatables_article();  
	       $data = array();  
	       $etat = '';
	       foreach($fetch_data as $row)  
	       {  
	            $sub_array = array(); 

	            if ($row->type=='texte') {
	              $etat = '
	            <div class="user-avatar bg-dim-success d-none d-sm-flex">
	                <span><i class="fa fa-file text-success" ></i></span>
	            </div>
	             ';
	            }
	            elseif ($row->type=='video'){
	              $etat = '
	                <div class="user-avatar bg-dim-danger d-none d-sm-flex">
	                    <span><i class="fa fa-video-camera text-success"></i></span>
	                </div>
	            ';
	            }
	            else{

	              $etat = '';
	            }


	            $sub_array[] = '<input type="checkbox" class="delete_checkbox" value="'.$row->idart.'" id="delete_checkbox" />'; 

	            // $sub_array[] = $etat;
	           
	            $sub_array[] = '<img src="'.base_url().'upload/article/'.$row->image.'" class="img-thumbnail user-avatar bg-success  d-sm-flex" width="50" height="35" />';  
	            $sub_array[] = nl2br(substr($row->nom, 0,20)).'...';  
	            $sub_array[] = nl2br(substr($row->description, 0,10)).'...'; 

	            $sub_array[] = nl2br(substr($row->nom_cat, 0,15)).' ...';

	            $sub_array[] = nl2br(substr($row->type, 0,15)).'';

	            // $sub_array[] = nl2br(substr(date(DATE_RFC822, strtotime($row->created_at)), 0, 23)); 

	           
	            $sub_array[] = '<button type="button" name="update" idart="'.$row->idart.'" class="btn btn-success btn-circle btn-sm update"><i class="fa fa-edit"></i></button>'; 

	            $sub_array[] = '<button type="button" name="delete" idart="'.$row->idart.'" class="btn btn-danger btn-circle btn-sm delete"><i class="fa fa-trash"></i></button>';
	            
	            $data[] = $sub_array;  
	       }  
	       $output = array(  
	            "draw"                =>     intval($_POST["draw"]),  
	            "recordsTotal"        =>     $this->crud_model->get_all_data_article(),  
	            "recordsFiltered"     =>     $this->crud_model->get_filtered_data_article(),  
	            "data"                =>     $data  
	       );  
	       echo json_encode($output);  
	  }



	  function operation_article(){

	      if($_FILES["user_image"]["size"] > 0)  
	      {  
	           $insert_data = array(  
	               'nom'     	      =>     $this->input->post('nom'),  
	               'description'    =>     htmlspecialchars($this->input->post("description")),
	               'lien'           =>     $this->input->post("lien"),
	               'idcat'     	    =>     $this->input->post('idcat'), 
	               'type'     	    =>     $this->input->post('type'), 
	               'image'          =>     $this->upload_image_article()
	            );    
	      }  
	      else  
	      {  
	             $user_image = "icone-user.png";  
	             $insert_data = array(  
	               'nom'     	      =>     $this->input->post('nom'),  
	               'description'    =>     htmlspecialchars($this->input->post("description")),
	               'lien'           =>     $this->input->post("lien"),
	               'idcat'     	    =>     $this->input->post('idcat'), 
	               'type'     	    =>     $this->input->post('type'),
	               'image'          =>     $user_image
	            );   
	      }

	    $requete=$this->crud_model->insert_article($insert_data);
	    echo("Ajout information avec succès");
	    
	  }

	  function modification_article(){

	      if($_FILES["user_image"]["size"] > 0)  
	      {  
	           $updated_data = array(  
	               'nom'     	      =>     $this->input->post('nom'),  
	               'description'    =>     htmlspecialchars($this->input->post("description")),
	               'lien'           =>     $this->input->post("lien"),
	               'idcat'     	    =>     $this->input->post('idcat'), 
	               'type'     	    =>     $this->input->post('type'), 
	               'image'          =>     $this->upload_image_article()
	            );    
	      }  
	      
	      else  
	      {   
	           $updated_data = array(  
	               'nom'     	    =>     $this->input->post('nom'),  
	               'description'    =>     htmlspecialchars($this->input->post("description")),
	               'lien'           =>     $this->input->post("lien"),
	               'idcat'     	    =>     $this->input->post('idcat'), 
	               'type'     	    =>     $this->input->post('type')
	            );   
	      }

	      
	      $this->crud_model->update_article($this->input->post("idart"), $updated_data);

	      echo("modification avec succès");
	  }

	  function supression_article(){

	      $this->crud_model->delete_article($this->input->post("idart"));
	      echo("suppression avec succès");
	    
	  }

	  function fetch_single_article()  
	  {  
	       $output = array();  
	       $data = $this->crud_model->fetch_single_article($this->input->post('idart'));  
	       foreach($data as $row)  
	       {  
	            $output['nom'] = $row->nom;  
	            $output['description'] = $row->description; 

	            $output['lien'] 	= $row->lien;
	            $output['type'] 	= $row->type;
	            $output['idcat'] 	= $row->idcat;
	            
	            $output['image'] 	= $row->image;
	            $output['text_description']   ='
	              <textarea class="form-control textarea" name="description" id="description" placeholder="Parler un peu sur la description de l\'article">
	                  '.$row->description.'
	              </textarea>
	            ';


	            if($row->image != '')  
	            {  
	                 $output['user_image'] = '<img src="'.base_url().'upload/article/'.$row->image.'" class="img-thumbnail" width="300" height="250" /><input type="hidden" name="hidden_user_image" value="'.$row->image.'" />';  
	            }  
	            else  
	            {  
	                 $output['user_image'] = '<input type="hidden" name="hidden_user_image" value="" />';  
	            }  

	            
	       }  
	       echo json_encode($output);  
	  }

	  function upload_image_article()  
      {  
           if(isset($_FILES["user_image"]))  
           {  
                $extension = explode('.', $_FILES['user_image']['name']);  
                $new_name = rand() . '.' . $extension[1];  
                $destination = './upload/article/' . $new_name;  
                move_uploaded_file($_FILES['user_image']['tmp_name'], $destination);  
                return $new_name;  
           }  
      }


    function pagination_view_article($param1='')
	{
	  $limit = $param1;
	  if ($limit !='') {
	  	$output = $this->crud_model->fetch_details_view_articles_limit($limit);
	  }
	  else{
	  	$output = $this->crud_model->fetch_details_view_articles();
	  }
	  
	  echo($output);
	}

	function fetch_search_view_article()
	{
	  $output = '';
	  $query = '';
	  $etat = '';
	  if($this->input->post('query'))
	  {
	   $query = $this->input->post('query');
	  }
	  $data = $this->crud_model->fetch_data_search_view_article($query);
	 $output .= '
      <table class="table-striped  nk-tb-list nk-tb-ulist dataTable no-footer" data-auto-responsive="false" id="user_data" role="grid" aria-describedby="DataTables_Table_1_info">
          <thead class="tb-member-head thead-light">  
              <tr> 
                  <th width="10%">Avatar</th> 
                  <th width="20%">Nom de la vidéo</th>  
                  <th width="20%">Description </th> 
                  <th width="10%">Catégorie </th> 
                  <th width="10%">Type </th>  
                  <th width="20%">Mise à jour</th>
                   
                  
                  <th width="5%">Modifier</th> 
                  <th width="5%">Supprimer</th>  
              </tr>  
         </thead> 

         <tbody>
      ';
      if ($data->num_rows() < 0) {
        
      }
      else{

        foreach($data->result() as $row)
        {

            if ($row->type=='texte') {
              $etat = '
                <div class="user-avatar bg-dim-hub d-none d-sm-flex text-center">
                    <span><i class="fa fa-file text-hub" ></i></span>
                </div>
               ';
            }
            elseif ($row->type=='video'){
              $etat = '
                  <div class="user-avatar bg-dim-danger d-none d-sm-flex">
                      <span><i class="fa fa-video-camera text-hub"></i></span>
                  </div>
              ';
            }
            else{

              $etat = '';
            }


         $output .= '
         <tr>
          
          <td><img src="'.base_url().'upload/article/'.$row->image.'" class="img img-responsive img-thumbnail" width="50" height="35" style="border-radius:50%;" /></td>

          <td>'.nl2br(substr($row->nom, 0,20)).'...'.'</td>
          <td>'.nl2br(substr($row->description, 0,20)).' ....'.'</td>
          <td>'.nl2br(substr($row->nom_cat, 0,20)).' ...'.'</td>
          <td>'.$etat.'</td>
          <td>'.nl2br(substr(date(DATE_RFC822, strtotime($row->created_at)), 0, 23)).'</td>
          
          <td><button type="button" name="update" idart="'.$row->idart.'" class="btn btn-hub btn-circle btn-sm update"><i class="fa fa-edit"></i></button></td>
          <td><button type="button" name="delete" idart="'.$row->idart.'" class="btn btn-danger btn-circle btn-sm delete"><i class="fa fa-trash"></i></button></td>
          

         </tr>
         ';
        }
      }
      $output .= '
          </tbody>

         <tfoot>  
              <tr>  
                  <th width="10%">Avatar</th> 
                  <th width="20%">Nom de la vidéo</th>  
                  <th width="20%">Description </th> 
                  <th width="10%">Catégorie </th> 
                  <th width="10%">Type </th>  
                  <th width="20%">Mise à jour</th>
                   
                  
                  <th width="5%">Modifier</th> 
                  <th width="5%">Supprimer</th> 
              </tr>  
         </tfoot>   
          
      </table>';

	    echo($output);
	  
	}

	// fin de sript article 

	/**
   * commentaires des articles de publications
   ===============================================
   *===============================================
   *

   */

   	function operation_commentaire(){

	    $insert_data = array(  
           'etape1'     	=>     htmlspecialchars($this->input->post('etape1')),  
           'etape2'    		=>     htmlspecialchars($this->input->post("etape2")),
           'idart'          =>     $this->input->post("idart")
        ); 

	    $requete=$this->crud_model->insert_commentaire($insert_data);
	    echo("Ajout information avec succès");
	    
	  }

	  function modification_commentaire(){

	    $updated_data = array(  
            'etape1'     	=>     htmlspecialchars($this->input->post('etape1')),  
   			'etape2'    	=>     htmlspecialchars($this->input->post("etape2")),
   			'idart'         =>     $this->input->post("idart")
        );

	    $this->crud_model->update_commentaire($this->input->post("idcomment"), $updated_data);

	    echo("modification avec succès");
	  }

	  function supression_commentaire(){

	      $this->crud_model->delete_commentaire($this->input->post("idcomment"));
	      echo("suppression avec succès");
	    
	  }

	  function fetch_single_commentaire()  
	  {  
	       $output = array();  
	       $data = $this->crud_model->fetch_single_commentaire($this->input->post('idcomment'));  
	       foreach($data as $row)  
	       {  
	            $output['etape1'] = $row->etape1;  
	            $output['etape2'] = $row->etape2; 
	            $output['idart']  = $row->idart;

	            $output['nom']  = $row->nom;

	            $output['description']  = substr(nl2br(html_entity_decode($row->description)), 100) .'...';

	            $output['text_description']   ='
	              <textarea class="form-control textarea" name="etape1" id="etape1" >
	                  '.$row->etape1.'
	              </textarea>
	            ';

	            $output['text_description2']   ='
	              <textarea class="form-control textarea" name="etape2" id="etape2">
	                  '.$row->etape2.'
	              </textarea>
	            ';
	            

	            $output['image'] 	= $row->image;
	            
	            if($row->image != '')  
	            {  
	                 $output['user_image'] = '<img src="'.base_url().'upload/article/'.$row->image.'" class="img-thumbnail" width="300" height="250" /><input type="hidden" name="hidden_user_image" value="'.$row->image.'" />';  
	            }  
	            else  
	            {  
	                 $output['user_image'] = '<input type="hidden" name="hidden_user_image" value="" />';  
	            }  
	            
	       }  
	       echo json_encode($output);  
	  }

	function pagination_view_commentaire($param1='')
	{
	  $limit = $param1;
	  if ($limit !='') {
	  	$output = $this->crud_model->fetch_details_view_commentaire_limit($limit);
	  }
	  else{
	  	$output = $this->crud_model->fetch_details_view_commentaire();
	  }
	  
	  echo($output);
	}

	function fetch_search_view_commentaire()
	{
	  $output = '';
	  $query = '';
	  $etat = '';
	  if($this->input->post('query'))
	  {
	   $query = $this->input->post('query');
	  }
	  $data = $this->crud_model->fetch_data_search_view_commentaire($query);
	 $output .= '
      <table class="table-striped  nk-tb-list nk-tb-ulist dataTable no-footer" data-auto-responsive="false" id="user_data" role="grid" aria-describedby="DataTables_Table_1_info">
          <thead class="tb-member-head thead-light">  
              <tr> 
                  <th width="10%">Avatar</th> 
                  <th width="20%">Nom de la vidéo</th>  
                  <th width="20%">Description </th> 
                  <th width="10%">Catégorie </th> 
                  <th width="10%">Type </th>  
                  <th width="20%">Mise à jour</th>
                   
                  
                  <th width="5%">Modifier</th> 
                  <th width="5%">Supprimer</th>  
              </tr>  
         </thead> 

         <tbody>
      ';
      if ($data->num_rows() < 0) {
        
      }
      else{

        foreach($data->result() as $row)
        {

            if ($row->type=='texte') {
              $etat = '
                <div class="user-avatar bg-dim-success d-none d-sm-flex text-center">
                    <span><i class="fa fa-file text-hub" ></i></span>
                </div>
               ';
            }
            elseif ($row->type=='video'){
              $etat = '
                  <div class="user-avatar bg-dim-danger d-none d-sm-flex">
                      <span><i class="fa fa-video-camera text-hub"></i></span>
                  </div>
              ';
            }
            else{

              $etat = '';
            }


         $output .= '
         <tr>
          
          <td><img src="'.base_url().'upload/article/'.$row->image.'" class="img img-responsive img-thumbnail" width="50" height="35" style="border-radius:50%;" /></td>

          <td>'.nl2br(substr($row->nom, 0,20)).'...'.'</td>
          <td>'.nl2br(substr($row->description, 0,20)).' ....'.'</td>
          <td>'.nl2br(substr($row->nomcat, 0,20)).' ...'.'</td>
          <td>'.$etat.'</td>
          <td>'.nl2br(substr(date(DATE_RFC822, strtotime($row->created_at)), 0, 23)).'</td>
          
          <td><button type="button" name="update" idcomment="'.$row->idcomment.'" class="btn btn-hub btn-circle btn-sm update"><i class="fa fa-edit"></i></button></td>
          <td><button type="button" name="delete" idcomment="'.$row->idcomment.'" class="btn btn-danger btn-circle btn-sm delete"><i class="fa fa-trash"></i></button></td>
          

         </tr>
         ';
        }
      }
      $output .= '
          </tbody>

         <tfoot>  
              <tr>  
                  <th width="10%">Avatar</th> 
                  <th width="20%">Nom de la vidéo</th>  
                  <th width="20%">Description </th> 
                  <th width="10%">Catégorie </th> 
                  <th width="10%">Type </th>  
                  <th width="20%">Mise à jour</th>
                   
                  
                  <th width="5%">Modifier</th> 
                  <th width="5%">Supprimer</th> 
              </tr>  
         </tfoot>   
          
      </table>';

	    echo($output);
	  
	}

	/**
	   * formations des articles de publications
	   ===============================================
	   *===============================================
	   *
    */

   	function operation_formations(){

   		if($_FILES["user_image"]["size"] > 0)  
	    {
	    	$insert_data = array(  
	           'nom'    			=>     htmlspecialchars($this->input->post('nom')),
	           'date_debit'    		=>     htmlspecialchars($this->input->post('date_debit')),
	           'date_fin'    		=>     htmlspecialchars($this->input->post('date_fin')),
	           'fin_inscription'    =>     $this->input->post('fin_inscription'),
	           'description'    	=>     htmlspecialchars($this->input->post('description')),
	    
	           'image'    			=>     $this->upload_formations()
	        ); 

	    	$requete=$this->crud_model->insert_formations($insert_data);
	    	echo("Ajout information avec succès");
	    }
	    else{

	    	$insert_data = array(  
	           'nom'    			=>     htmlspecialchars($this->input->post('nom')),
	           'date_debit'    		=>     htmlspecialchars($this->input->post('date_debit')),
	           'date_fin'    		=>     htmlspecialchars($this->input->post('date_fin')),
	           'fin_inscription'    =>     $this->input->post('fin_inscription'),
	           'description'    	=>     htmlspecialchars($this->input->post('description')) 
	        ); 

	    	$requete=$this->crud_model->insert_formations($insert_data);
	    	echo("Ajout information avec succès");
	    }

	    
	    
	  }

	  function modification_formations(){

	  	if($_FILES["user_image"]["size"] > 0)  
	    {
	    	$updated_data = array(  
	           'nom'    			=>     htmlspecialchars($this->input->post('nom')),
	           'date_debit'    		=>     htmlspecialchars($this->input->post('date_debit')),
	           'date_fin'    		=>     htmlspecialchars($this->input->post('date_fin')),
	           'fin_inscription'    =>     $this->input->post('fin_inscription'),
	           'description'    	=>     htmlspecialchars($this->input->post('description')),  
	           'image'    			=>     $this->upload_formations()
	        ); 

	    	$this->crud_model->update_formations($this->input->post("idf"), $updated_data);
	    	echo("modification avec succès");
	    }
	    else{

	    	$updated_data = array(  
	           'nom'    			=>     htmlspecialchars($this->input->post('nom')),
	           'date_debit'    		=>     htmlspecialchars($this->input->post('date_debit')),
	           'date_fin'    		=>     htmlspecialchars($this->input->post('date_fin')),
	           'fin_inscription'    =>     $this->input->post('fin_inscription'),
	           'description'    	=>     htmlspecialchars($this->input->post('description')) 
	        ); 

	    	$this->crud_model->update_formations($this->input->post("idf"), $updated_data);
	    	echo("modification avec succès");
	    }

	   
	  }

	  function supression_formations(){

	      $this->crud_model->delete_formations($this->input->post("idf"));
	      echo("suppression avec succès");
	    
	  }

	  function fetch_single_formations()  
	  {  
	       $output = array();  
	       $data = $this->crud_model->fetch_single_formations($this->input->post('idf'));  
	       foreach($data as $row)  
	       {  

	            $output['nom']  			= $row->nom;
	            $output['date_debit']  		= $row->date_debit;
	            $output['date_fin']  		= $row->date_fin;
	            $output['fin_inscription']  = $row->fin_inscription;
	            $output['description']  	= $row->description;

	            $output['text_description']   ='
	             <label><i class="fa fa-edit"></i> Saisissez une description de la formation</label>
	              <textarea class="form-control textarea" name="description" id="description" placeholder="Saisissez une description de la formation">
	                  '.$row->description.'
	              </textarea>
	            ';

	           
	            $output['image'] 	= $row->image;
	            
	            if($row->image != '')  
	            {  
	                 $output['user_image'] = '<img src="'.base_url().'upload/formations/'.$row->image.'" class="img-thumbnail" width="300" height="250" /><input type="hidden" name="hidden_user_image" value="'.$row->image.'" />';  
	            }  
	            else  
	            {  
	                 $output['user_image'] = '<input type="hidden" name="hidden_user_image" value="" />';  
	            }  
	            
	       }  
	       echo json_encode($output);  
	  }


	 

	function pagination_view_formations($param1='')
	{
	  $limit = $param1;
	  if ($limit !='') {
	  	$output = $this->crud_model->fetch_details_view_formations_limit($limit);
	  }
	  else{
	  	$output = $this->crud_model->fetch_details_view_formations();
	  }
	  
	  echo($output);
	}

	function fetch_search_view_formations()
	{
	  $output = '';
	  $query = '';
	  $etat = '';
	  if($this->input->post('query'))
	  {
	   $query = $this->input->post('query');
	  }
	  $data = $this->crud_model->fetch_data_search_view_formations($query);
	 $output .= '
      <table class="table-striped  nk-tb-list nk-tb-ulist dataTable no-footer" data-auto-responsive="false" id="user_data" role="grid" aria-describedby="DataTables_Table_1_info">
          <thead class="tb-member-head thead-light">  
              <tr> 
                  <th width="10%">Avatar</th> 
                  <th width="10%">Titre </th>

                  <th width="20%">Date debit </th>
                  <th width="20%">Date fin </th>
                  <th width="10%">Fin inscription </th>

                  <th width="20%">Mise à jour</th>

                  <th width="5%">Modifier</th> 
                  <th width="5%">Supprimer</th>  
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
          
          <td><img src="'.base_url().'upload/formations/'.$row->image.'" class="img img-responsive img-thumbnail" width="50" height="35" style="border-radius:50%;" /></td>

          <td>'.nl2br(substr($row->nom, 0,30)).' ....'.'</td>
          <td>'.nl2br(substr(date(DATE_RFC822, strtotime($row->date_debit)), 0, 23)).'</td>
          <td>'.nl2br(substr(date(DATE_RFC822, strtotime($row->date_fin)), 0, 23)).'</td>
          <td>'.nl2br(substr(date(DATE_RFC822, strtotime($row->fin_inscription)), 0, 23)).'</td>
          <td>'.nl2br(substr(date(DATE_RFC822, strtotime($row->created_at)), 0, 23)).'</td>

          
          <td><button type="button" name="update" idf="'.$row->idf.'" class="btn btn-hub btn-circle btn-sm update"><i class="fa fa-edit"></i></button></td>
          <td><button type="button" name="delete" idf="'.$row->idf.'" class="btn btn-danger btn-circle btn-sm delete"><i class="fa fa-trash"></i></button></td>
          

         </tr>
         ';
        }
      }
      $output .= '
          </tbody>

         <tfoot>  
              <tr>  
                  <th width="10%">Avatar</th> 
                  <th width="10%">Titre </th>

                  <th width="20%">Date debit </th>
                  <th width="20%">Date fin </th>
                  <th width="10%">Fin inscription </th>

                  <th width="20%">Mise à jour</th>

                  <th width="5%">Modifier</th> 
                  <th width="5%">Supprimer</th> 

              </tr>  
         </tfoot>   
          
      </table>';

	    echo($output);
	  
	}

	function upload_formations()  
	{  
	       if(isset($_FILES["user_image"]))  
	       {  
	            $extension = explode('.', $_FILES['user_image']['name']);  
	            $new_name = rand() . '.' . $extension[1];  
	            $destination = './upload/formations/' . $new_name;  
	            move_uploaded_file($_FILES['user_image']['tmp_name'], $destination);  
	            return $new_name;  
	       }  
	}

	// fin formations 


	/**
	   * inscription_formations des articles de publications
	   ===============================================
	   *===============================================
	   *
    */


   	function operation_inscription_formations(){

   		$email =    htmlspecialchars($this->input->post('email'));
   		$annee =    htmlspecialchars($this->input->post('annee'));
   		$idf   =    htmlspecialchars($this->input->post('idf'));

   		$test = $this->crud_model->fetch_single_test_inscription_formations($idf,$email,$annee);
   		if ($test > 0) {

   			echo("vous vous  êtes déjà inscrit pour cette formation 🏧");
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
	    	echo("Ajout information avec succès");

   		}
	    
	  }

	  function modification_inscription_formations(){

	  	$updated_data = array(  
           'nomcomplet'    		=>     htmlspecialchars($this->input->post('nomcomplet')),
           'email'    			=>     htmlspecialchars($this->input->post('email')),
           'telephone'    		=>     htmlspecialchars($this->input->post('telephone')),
           'niveau_etude'    	=>     $this->input->post('niveau_etude'),
           'domicile'    		=>     htmlspecialchars($this->input->post('domicile')),

           'idf'    			=>     htmlspecialchars($this->input->post('idf')),
           'annee'    			=>     htmlspecialchars($this->input->post('annee'))
        ); 

    	$this->crud_model->update_inscription_formations($this->input->post("idinscription"), $updated_data);
    	echo("modification avec succès");

	   
	  }

	  function supression_inscription_formations(){

	      $this->crud_model->delete_inscription_formations($this->input->post("idinscription"));
	      echo("suppression avec succès");
	    
	  }

	  function fetch_single_inscription_formations()  
	  {  
	       $output = array();  
	       $data = $this->crud_model->fetch_single_inscription_formations($this->input->post('idinscription'));  
	       foreach($data as $row)  
	       {  
				$output['nom']  			= $row->nom;
	            $output['date_debit']  		= $row->date_debit;
	            $output['date_fin']  		= $row->date_fin;
	           
	            $output['nomcomplet']  	= $row->nomcomplet;
	            $output['email']  	= $row->email;

	            $output['idf']  	= $row->idf;
	            $output['annee']  	= $row->annee;
	            $output['domicile']  	= $row->domicile;
	            $output['niveau_etude']  	= $row->niveau_etude;
	            $output['telephone']  	= $row->telephone;

	            $output['date_debit'] = nl2br(substr(date(DATE_RFC822, 
	            	strtotime($row->date_debit)), 0, 23));

	           
	           
	            $output['image'] 	= $row->image;
	            
	            if($row->image != '')  
	            {  
	                 $output['user_image'] = '<img src="'.base_url().'upload/formations/'.$row->image.'" class="img-thumbnail" width="300" height="250" /><input type="hidden" name="hidden_user_image" value="'.$row->image.'" />';  
	            }  
	            else  
	            {  
	                 $output['user_image'] = '<input type="hidden" name="hidden_user_image" value="" />';  
	            }  
	            
	       }  
	       echo json_encode($output);  
	  }

	function pagination_view_inscription_formations($param1='')
	{
	  $limit = $param1;
	  if ($limit !='') {
	  	$output = $this->crud_model->fetch_details_view_inscription_formations_limit($limit);
	  }
	  else{
	  	$output = $this->crud_model->fetch_details_view_inscription_formations();
	  }
	  
	  echo($output);
	}

	function pagination_view_inscription_pdf()
	{
	  $idf 		= 	$_GET['idf'];
	  $annee 	= 	$_GET['annee'];
	  if ($idf !='' && $annee !='') {
	  	$output = $this->crud_model->fetch_details_view_inscription_pdf($idf, $annee);
	  }
	  else{
	  	$output = $this->crud_model->fetch_details_view_inscription_formations();
	  }
	  
	  echo($output);
	}

	function fetch_search_view_inscription_formations()
	{
	  $output = '';
	  $query = '';
	  $etat = '';
	  if($this->input->post('query'))
	  {
	   $query = $this->input->post('query');
	  }
	  $data = $this->crud_model->fetch_data_search_view_inscription_formations($query);
		 $output .= '
	      <table class="table-striped  nk-tb-list nk-tb-ulist dataTable no-footer" data-auto-responsive="false" id="user_data" role="grid" aria-describedby="DataTables_Table_1_info">
	          <thead class="tb-member-head thead-light">  
	              <tr> 
	                  <th width="10%">Avatar</th> 
	                  <th width="10%">Titre </th>

	                  <th width="20%">Date debit </th>
	                  <th width="20%">Date fin </th>
	                  <th width="10%">Apprenant Nom complet</th>

	                  <th width="20%">Mise à jour</th>

	                  <th width="5%">Modifier</th> 
	                  <th width="5%">Supprimer</th>  
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
	          
	          <td><img src="'.base_url().'upload/formations/'.$row->image.'" class="img img-responsive img-thumbnail" width="50" height="35" style="border-radius:50%;" /></td>

	          <td>'.nl2br(substr($row->nom, 0,30)).' ....'.'</td>
	          <td>'.nl2br(substr(date(DATE_RFC822, strtotime($row->date_debit)), 0, 23)).'</td>
	          <td>'.nl2br(substr(date(DATE_RFC822, strtotime($row->date_fin)), 0, 23)).'</td>
	          <td>'.nl2br(substr($row->nomcomplet, 0,15)).' ....'.'</td>
	          <td>'.nl2br(substr(date(DATE_RFC822, strtotime($row->created_at)), 0, 23)).'</td>

	          
	          <td><button type="button" name="update" idinscription="'.$row->idinscription.'" class="btn btn-hub btn-circle btn-sm update"><i class="fa fa-edit"></i></button></td>
	          <td><button type="button" name="delete" idinscription="'.$row->idinscription.'" class="btn btn-danger btn-circle btn-sm delete"><i class="fa fa-trash"></i></button></td>
	          

	         </tr>
	         ';
	        }
	      }
	      $output .= '
	          </tbody>

	         <tfoot>  
	              <tr>  
	                  <th width="10%">Avatar</th> 
	                  <th width="10%">Titre </th>

	                  <th width="20%">Date debit </th>
	                  <th width="20%">Date fin </th>
	                  <th width="10%">Apprenant Nom complet</th>

	                  <th width="20%">Mise à jour</th>

	                  <th width="5%">Modifier</th> 
	                  <th width="5%">Supprimer</th> 

	              </tr>  
	         </tfoot>   
	          
	      </table>';

	    echo($output);
	  
	}


	 // script pour les paiements

    /*
	*==============================
    *script pour le paiement normal
    *==============================
    *==============================
    */

	function pagination_view_paiements()
	{

	  $this->load->library("pagination");
	  $config = array();
	  $config["base_url"] = "#";
	  $config["total_rows"] = $this->crud_model->count_all_view_paiement();
	  $config["per_page"] = 4;
	  $config["uri_segment"] = 3;
	  $config["use_page_numbers"] = TRUE;
	  $config["full_tag_open"] = '<ul class="nav pagination">';
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
	   'pagination_link'  => $this->pagination->create_links(),
	   'country_table'   => $this->crud_model->fetch_details_view_paiement($config["per_page"], $start)
	  );
	  echo json_encode($output);
	}


	function fetch_search_view_paiements()
	{
	  $output = '';
	  $query = '';
	  if($this->input->post('query'))
	  {
	   $query = $this->input->post('query');
	  }
	  $data = $this->crud_model->fetch_data_search_paiement($query);
	 $output .= '
      <table class="table-striped  nk-tb-list nk-tb-ulist dataTable no-footer" data-auto-responsive="false" id="user_data" role="grid" aria-describedby="DataTables_Table_1_info">
          <thead>
            <tr>
              <td>
                <div class="col-md-12 form-inline">
                  Action
                </div>
              </td>

              <td>
                Profile complet des ceo et leurs entreprises

              </td>
              
              
              <td>
                Montant
              </td>
              <td>
                Mobile
              </td>
              <td>
                Token de transation
              </td>

              <td>
                supprimer
              </td>
              
              
            </tr>

        </thead>
         <tbody id="example-tbody">
      ';
      if ($data->num_rows() < 0) {
        
      }
      else{
        $mobile = '';
        $etat_paiement ='';

        foreach($data->result() as $row)
        {

          if ($row->motif =="m-pesa") {
            $mobile = '
            <img src="'.base_url().'upload/module/m-pesa.com.png" class="img-thumbnail img-responsive" style="height: 25px; width: 50px;">
            ';
          }
          elseif ($row->motif =="airtel money") {
            $mobile = '
            <img src="'.base_url().'upload/module/airtel.jpg" class="img-thumbnail img-responsive" style="height: 25px; width: 50px;">
            ';
          }
          else{

             $mobile = substr($row->motif, 0,250);
          }

          if ($row->etat_paiement ==0) {
            $etat_paiement = '
                 &nbsp;
                <a href="javascript:void(0);" idp="'.$row->idp.'" class="btn btn-danger btn-circle invvalider_liste btn-sm"><i class="fa fa-trash"></i></a>
            ';
          }
          
          else{
              $etat_paiement = '
                 &nbsp;
                <a href="javascript:void(0);" idp="'.$row->idp.'" class="btn btn-secondary btn-circle btn-sm"><i class="fa fa-eye text-white"></i></a>
              ';
          }


         $output .= '
        
         <tr role="row" class="odd">
            <td>
              <input type="checkbox" name="delete_checkbox" value="'.$row->idp.'" class="delete_checkbox">
              '.$etat_paiement.'
            </td>
              
              <td>

                <div class="col-md-12">
                  <div class="row">

                    <div class="col-md-4">
                      <img src="'.base_url().'upload/photo/'.$row->image.'" class="table-user-thumb img img-thumbnail" style="height: 50px;width: 50px;" alt="">
                      
                    </div>

                    <div class="col-md-8">
                      
                            <div class="col-md-12">
                            '.$row->first_name.'
                            '.$row->last_name.'
                          </div>
                          
                    </div>
                  </div>
                </div>
                
              </td>

              
              <td class="sorting_1">'.$row->montant.' $</td>
              <td>
                  
                  '.$mobile.'
              </td>
               <td class="sorting_1">
                
                <div class="table-actions">
                     <i class="fa fa-key"></i> &nbsp;'.substr($row->token, 0,10).'...&nbsp;
                     
                  </div>
               </td>

               <td class="sorting_1">
                
                <div class="table-actions text-center">
                     
                       <a href="'.base_url().'admin/facture/'.$row->codeFacture.'"  class="btn btn-primary btn-circle btn-sm"><i class="fa fa-print text-white"></i></a>
                  </div>
               </td>
              
          </tr>






         ';
        }
      }
      $output .= '
          </tbody>
        <tfoot role="row" class="odd">
            <tr>
              <td>
                <div class="col-md-12 form-inline">
                  Action
                </div>
              </td>
              <td>
                Profile complet des ceo et leurs entreprises
              </td>
              
              
              <td>
                Montant
              </td>
              <td>
                Mobile
              </td>
              <td>
                Token de transation
              </td>
              <td>
                supprimer
              </td>
              
            </tr>

        </tfoot>   
            
        </table>';
	  echo $output;
	}

	function fetch_single_personne_user()  
	{  
       $output = array();  
       $data = $this->crud_model->fetch_single_personne_user($_POST["id"]);  
       foreach($data as $row)  
       {  
            $output['first_name'] 		= $row->first_name;  
            $output['last_name'] 		= $row->last_name; 
            $output['email'] 			= $row->email; 
            $output['date_nais'] 		= $row->date_nais; 
            $output['telephone'] 		= $row->telephone; 
            $output['full_adresse'] 	= $row->full_adresse; 

            $output['sexe'] 			= $row->sexe;
            
            if($row->image != '')  
            {  
                $output['user_image'] = '<img src="'.base_url().'upload/photo/'.$row->image.'" class="img-thumbnail" width="70" height="70" /><input type="hidden" name="hidden_user_image" value="'.$row->image.'" />';  
            }  
            else  
            {  
                $output['user_image'] = '<input type="hidden" name="hidden_user_image" value="" />';  
            }  
       }  
       echo json_encode($output);  
	}

	function operation_paiement(){

      $idpersonne   = $this->input->post('idpersonne');
      $montant      = $this->input->post('montant');
      $rand = md5($this->input->post("montant").''.$this->input->post('idpersonne'));
      $insert_data = array(  
           'idpersonne'         =>     $this->input->post('idpersonne'),  
           'date_paie'          =>     $this->input->post("date_paie"), 
           'montant'            =>     $this->input->post("montant"), 
           'motif'              =>     $this->input->post("motif"),
           'token'				=>	   md5($this->input->post("date_paie")),
           'codeFacture'		=>	   trim($rand)
      );

      $users_cool = $this->crud_model->get_info_user();
      foreach ($users_cool as $key) {

          if ($key['idrole'] == 1) {
            $url ="admin/paiement_normale";

            $id_user_recever = $key['id'];

            $nom   = $this->crud_model->get_name_user($idpersonne);
            $message =$nom." vient de payer ".$montant."$";

            $notification = array(
              'titre'     =>    "nouveau paiement",
              'icone'     =>    "fa fa-bell",
              'message'   =>     $message,
              'url'       =>     $url,
              'id_user'   =>     $id_user_recever
            );
            
            $not = $this->crud_model->insert_notification($notification);

          }
          
            # code...
      }


	    $requete=$this->crud_model->insert_paiement($insert_data);
	    echo("Ajout information avec succès");
	    
	}


	function fetch_limit_view_paiements()
	{
	  $output = '';
	  $query = '';
	  if($this->input->post('limit'))
	  {
	   $query = $this->input->post('limit');
	  }
	  $data = $this->crud_model->fetch_data_limit_paiement($query);
	  $output .= '
      <table class="table-striped  nk-tb-list nk-tb-ulist dataTable no-footer" data-auto-responsive="false" id="user_data" role="grid" aria-describedby="DataTables_Table_1_info">
          <thead>
            <tr>
              <td>
                action
              </td>

              <td>
                Profile complet 

              </td>
              
              <td>
                Montant
              </td>
              <td>
                Motif
              </td>
              <td>
                Token de transation
              </td>

              <td>
                supprimer
              </td>
              
            </tr>

        </thead>
         <tbody id="example-tbody">
      ';
      if ($data->num_rows() < 0) {
        
      }
      else{
        $mobile = '';
        $etat_paiement ='';

        foreach($data->result() as $row)
        {

          if ($row->motif =="m-pesa") {
            $mobile = '
            <img src="'.base_url().'upload/module/m-pesa.com.png" class="img-thumbnail img-responsive" style="height: 25px; width: 50px;">
            ';
          }
          elseif ($row->motif =="airtel money") {
            $mobile = '
            <img src="'.base_url().'upload/module/airtel.jpg" class="img-thumbnail img-responsive" style="height: 25px; width: 50px;">
            ';
          }
          else{

             $mobile = '<img src="'.base_url().'upload/module/chat.svg" class="img-thumbnail img-responsive" style="height: 25px; width: 50px;">';
          }

          if ($row->etat_paiement ==0) {
            $etat_paiement = '
                 &nbsp;
                <a href="javascript:void(0);" idp="'.$row->idp.'" class="btn btn-danger btn-circle invvalider_liste btn-sm"><i class="fa fa-trash"></i></a>
            ';
          }
          
          else{
              $etat_paiement = '
                 &nbsp;
                <a href="javascript:void(0);" idp="'.$row->idp.'" class="btn btn-secondary btn-circle btn-sm"><i class="fa fa-eye text-white"></i></a>
              ';
          }


         $output .= '
        
         <tr role="row" class="odd">
            <td>
              <input type="checkbox" name="delete_checkbox" value="'.$row->idp.'" class="delete_checkbox">
              '.$etat_paiement.'
            </td>
              
              <td>

                <div class="col-md-12">
                  <div class="row">

                    <div class="col-md-4">
                      <img src="'.base_url().'upload/photo/'.$row->image.'" class="table-user-thumb img img-thumbnail" style="height: 50px;width: 50px;" alt="">
                      
                    </div>

                    <div class="col-md-8">
                      
                            <div class="col-md-12">
                            '.$row->first_name.'
                            '.$row->last_name.'
                          </div>
                         
                    </div>
                  </div>
                </div>
                
              </td>

             

              <td class="sorting_1">'.$row->montant.' $</td>
              <td>
                  
                  '.$row->motif.'
              </td>
               <td class="sorting_1">
                
                <div class="table-actions">
                     <i class="fa fa-key"></i> &nbsp;'.substr($row->token, 0,10).'...&nbsp;
                     
                  </div>
               </td>


               <td class="sorting_1">
                
                <div class="table-actions text-center">
                     
                       <a href="'.base_url().'admin/facture/'.$row->codeFacture.'"  class="btn btn-primary btn-circle btn-sm"><i class="fa fa-print text-white"></i></a>
                  </div>
               </td>
              
          </tr>

         ';

        }
      }
      $output .= '
          </tbody>
        <tfoot role="row" class="odd">
            <tr>
              <td>
                action
              </td>

              <td>
                Profile complet 

              </td>
              
              <td>
                Montant
              </td>
              <td>
                Motif
              </td>
              <td>
                Token de transation
              </td>

              <td>
                supprimer
              </td>
              
            </tr>

        </tfoot>   
            
        </table>';
	  echo $output;
	}

  // filtrage de piement par date 
  function fetch_datebetwine_paiement_filtre()
  {
    $output = '';
    $query = '';
    $total;
    $jour1 =$this->input->post('jour1');
    $jour2 =$this->input->post('jour2');
    if($jour1 > $jour2)
    {
     $data = $this->crud_model->fetch_data_paiement_date($jour2, $jour1);
     $total = $this->crud_model->fetch_sum_data_paiement_date($jour2, $jour1);
    }
    else{
      $data = $this->crud_model->fetch_data_paiement_date($jour1, $jour2);
      $total = $this->crud_model->fetch_sum_data_paiement_date($jour1, $jour2);
    }
    
    $output .= '
      <a class="btn btn-outline-warning pull-right mt-2 mb-2" 
      href="'.base_url().'admin/pdf_liste_facture/'.$jour1.'/'.$jour2.' "><i class="fa fa-print mr-1"></i> PDF</a>
      <table class="table-striped  nk-tb-list nk-tb-ulist dataTable no-footer" data-auto-responsive="false" id="user_data" role="grid" aria-describedby="DataTables_Table_1_info">
          <thead>
            <tr>
              <td>
                action
              </td>

              <td>
                Profile complet 

              </td>
              
              <td>
                Montant
              </td>
              <td>
                Motif
              </td>
              <td>
                Token de transation
              </td>

              <td>
                supprimer
              </td>

            </tr>

        </thead>
         <tbody id="example-tbody">
      ';
      if ($data->num_rows() < 0) {
        
      }
      else{
        $mobile = '';
        $etat_paiement ='';

        foreach($data->result() as $row)
        {

          if ($row->motif =="m-pesa") {
            $mobile = '
            <img src="'.base_url().'upload/module/m-pesa.com.png" class="img-thumbnail img-responsive" style="height: 25px; width: 50px;">
            ';
          }
          elseif ($row->motif =="airtel money") {
            $mobile = '
            <img src="'.base_url().'upload/module/airtel.jpg" class="img-thumbnail img-responsive" style="height: 25px; width: 50px;">
            ';
          }
          else{

             $mobile = '<img src="'.base_url().'upload/module/chat.svg" class="img-thumbnail img-responsive" style="height: 25px; width: 50px;">';
          }

          if ($row->etat_paiement ==0) {
            $etat_paiement = '
                 &nbsp;
                <a href="javascript:void(0);" idp="'.$row->idp.'" class="btn btn-danger btn-circle invvalider_liste btn-sm"><i class="fa fa-trash"></i></a>
            ';
          }
          
          else{
              $etat_paiement = '
                 &nbsp;
                <a href="javascript:void(0);" idp="'.$row->idp.'" class="btn btn-secondary btn-circle btn-sm"><i class="fa fa-eye text-white"></i></a>
              ';
          }


         $output .= '
        
         <tr role="row" class="odd">
            <td>
              <input type="checkbox" name="delete_checkbox" value="'.$row->idp.'" class="delete_checkbox">
              '.$etat_paiement.'
            </td>
              
              <td>

                <div class="col-md-12">
                  <div class="row">

                    <div class="col-md-4">
                      <img src="'.base_url().'upload/photo/'.$row->image.'" class="table-user-thumb img img-thumbnail" style="height: 50px;width: 50px;" alt="">
                      
                    </div>

                    <div class="col-md-8">
                      
                        <div class="col-md-12">
	                        '.$row->first_name.'
	                        '.$row->last_name.'
                        </div>
                          
                    </div>
                  </div>
                </div>
                
              </td>

              

              <td class="sorting_1">'.$row->montant.' $</td>
              <td>
                  
                  '.$row->motif.'
              </td>
               <td class="sorting_1">
                
                <div class="table-actions">
                     <i class="fa fa-key"></i> &nbsp;'.substr($row->token, 0,10).'...&nbsp;
                     
                  </div>
               </td>


               <td class="sorting_1">
                
                <div class="table-actions text-center">
                     
                       <a href="'.base_url().'admin/facture/'.$row->codeFacture.'"  class="btn btn-primary btn-circle btn-sm"><i class="fa fa-print text-white"></i></a>
                  </div>
               </td>
              
          </tr>

         ';

        }
      }

      $output .='
      <tr>
        <td colspan="5">Montant total </td>
        <td><h4>'.$total.'$</h4></td>
        
      </tr>
      
      ';


      $output .= '
          </tbody>
        <tfoot role="row" class="odd">
            <tr>
             <td>
                action
              </td>

              <td>
                Profile complet 

              </td>
              
              <td>
                Montant
              </td>
              <td>
                Motif
              </td>
              <td>
                Token de transation
              </td>

              <td>
                supprimer
              </td>
              
            </tr>

        </tfoot>   
            
        </table>';
    echo $output;
  }

  

       // invalider trancation
     function invalider_multiple_fausse_tranaction()
     {
        if($this->input->post('checkbox_value'))
        {
           $id = $this->input->post('checkbox_value');
           for($count = 0; $count < count($id); $count++)
           {
                $idp    = $id[$count];
                // echo($idp);
                $this->crud_model->delete_paiement_normal($idp);
                echo("votre paiement à été annulé");

           }
        }
     }
     // fin valider trancation

    function facture($param1=''){
       $customer_id = "paiement facture ".$param1;
       $html_content = '';
       $html_content .= '<link href="' . base_url() . 'js/css/sb-admin-2.min.css" rel="stylesheet">';
       $html_content .= $this->crud_model->fetch_single_details_facture($param1);


       $dataUpdate = array(
        'etat_paiement' =>  1
       );
       $cool = $this->crud_model->update_paiement_etat($param1, $dataUpdate);

       // echo($html_content);
       $this->load->library('pdf');
       $this->pdf->loadHtml($html_content);
       $this->pdf->render();
       $this->pdf->stream("paiement reçu_".$customer_id.".pdf", array("Attachment"=>0));
    }

    function pdf_liste_facture($jour1='', $jour2=''){
       $customer_id = "Liste de paiement de paiement du ".$jour1." au ".$jour2;
       $html_content = '';

       $html_content .= '<link href="' . base_url() . 'js/css/style.css" rel="stylesheet">';
      
       if ($jour1 > $jour2) {
         # code...
        $html_content .= $this->crud_model->fetch_single_details_listePaiement($jour2, $jour1);

       }
       else{
        $html_content .= $this->crud_model->fetch_single_details_listePaiement($jour1, $jour2);

       }

       // echo($html_content);
       $this->load->library('pdf');
       $this->pdf->loadHtml($html_content);
       $this->pdf->render();
       $this->pdf->stream("".$customer_id.".pdf", array("Attachment"=>0));
    }



    /**
	   * confirmation formations des articles de publications
	   ===============================================
	   *===============================================
	   *
    */

   	function operation_formations_conf(){

   		$idf = $this->input->post('idf');
   		$id_user = $this->input->post('id_user');
   		$jour = $this->input->post('jour');
   		$test = $this->crud_model->fetch_single_test_inscription_confirmation($idf,$id_user);
   		if ($test > 0) {

   			echo("echec!!!");
   		}
   		else{

	   		$insert_data = array(  
	           'id_user'    	=>     htmlspecialchars($this->input->post('id_user')),
	           'idf'    		=>     htmlspecialchars($this->input->post('idf')),
	           'jour'    		=>     htmlspecialchars($this->input->post('jour'))
	        ); 

	    	$requete=$this->crud_model->insert_formations_conf($insert_data);
	    	$nom_formation   = $this->crud_model->get_name_formation($idf);

	    	if ($requete > 0) {
	    		# code...
	    		$url ="user/learn/formation/".$idf."/".$id_user."/".$nom_formation;

	        

	            $nom   = $this->crud_model->get_name_user($id_user);
	            $message =$nom." vous venez d'être confirmé à la formation ".$nom_formation;

	            $notification = array(
	              'titre'     =>    "Votre inscription a été validé avec succès",
	              'icone'     =>    "fa fa-headphones",
	              'message'   =>     $message,
	              'url'       =>     $url,
	              'id_user'   =>     $id_user
	            );
	            
	            $not = $this->crud_model->insert_notification($notification);
	    		  
    		}
	    	echo("Ajout information avec succès");
   		}


	    
	    
	  }

	  function modification_formations_conf(){

	  		$updated_data = array(  
	           'id_user'    	=>     htmlspecialchars($this->input->post('id_user')),
	           'idf'    		=>     htmlspecialchars($this->input->post('idf')),
	           'jour'    		=>     htmlspecialchars($this->input->post('jour'))
	        ); 

	    	$this->crud_model->update_formations_conf($this->input->post("idformat"), $updated_data);
	    	echo("modification avec succès");

	   
	  }

	  function supression_formations_conf(){

	      $this->crud_model->delete_formations_conf($this->input->post("idformat"));
	      echo("suppression avec succès");
	    
	  }

	  function fetch_single_formations_conf()  
	  {  
	       $output = array();  
	       $data = $this->crud_model->fetch_single_formations_conf($this->input->post('idformat'));  
	       foreach($data as $row)  
	       {  

	            $output['nom']  			= $row->nom;
	            $output['date_debit']  		= $row->date_debit;
	            $output['date_fin']  		= $row->date_fin;
	            $output['fin_inscription']  = $row->fin_inscription;
	            $output['description']  	= $row->description;
	            $output['idf']  			= $row->idf;
	            $output['id_user']  		= $row->id_user;
	            $output['jour']  			= $row->jour;

	       }  
	       echo json_encode($output);  
	  }


	 

	function pagination_view_formations_conf($param1='')
	{
	  $limit = $param1;
	  if ($limit !='') {
	  	$output = $this->crud_model->fetch_details_view_formations_limit_conf($limit);
	  }
	  else{
	  	$output = $this->crud_model->fetch_details_view_formations_conf();
	  }
	  
	  echo($output);
	}

	function fetch_search_view_formations_conf()
	{
	  $output = '';
	  $query = '';
	  $etat = '';
	  if($this->input->post('query'))
	  {
	   $query = $this->input->post('query');
	  }
	  $data = $this->crud_model->fetch_data_search_view_formations_conf($query);
		 $output .= '
	      <table class="table-striped  nk-tb-list nk-tb-ulist dataTable no-footer" data-auto-responsive="false" id="user_data" role="grid" aria-describedby="DataTables_Table_1_info">
	          <thead class="tb-member-head thead-light">  
	              <tr> 
	                  <th width="10%">Avatar</th> 
	                  <th width="10%">Titre </th>

	                  <th width="30%">Nom complet</th>
	                  <th width="10%">Téléphone </th>
	                  <th width="10%">Fin inscription </th>

	                  <th width="20%">Mise à jour</th>

	                  <th width="5%">Modifier</th> 
	                  <th width="5%">Supprimer</th>  
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
	          
	          <td><img src="'.base_url().'upload/photo/'.$row->avatar.'" class="img img-responsive img-thumbnail" width="50" height="35" style="border-radius:50%;" /></td>

	          <td>'.nl2br(substr($row->nom, 0,30)).' ....'.'</td>

	          <td>'.nl2br(substr($row->first_name.' '.$row->last_name, 0,40)).' ....'.'</td>
	          <td>'.nl2br(substr($row->telephone, 0,30)).' ....'.'</td>


	          <td>'.nl2br(substr(date(DATE_RFC822, strtotime($row->fin_inscription)), 0, 23)).'</td>
	          <td>'.nl2br(substr(date(DATE_RFC822, strtotime($row->created_at)), 0, 23)).'</td>

	          
	          <td><button type="button" name="update" idformat="'.$row->idformat.'" class="btn btn-hub btn-circle btn-sm update"><i class="fa fa-edit"></i></button></td>
	          <td><button type="button" name="delete" idformat="'.$row->idformat.'" class="btn btn-danger btn-circle btn-sm delete"><i class="fa fa-trash"></i></button></td>
	          

	         </tr>
	         ';
	        }
	      }
	      $output .= '
	          </tbody>

	         <tfoot>  
	              <tr>  
	                  <th width="10%">Avatar</th> 
	                  <th width="10%">Titre </th>

	                  <th width="30%">Nom complet</th>
	                  <th width="10%">Téléphone </th>
	                  <th width="10%">Fin inscription </th>

	                  <th width="20%">Mise à jour</th>

	                  <th width="5%">Modifier</th> 
	                  <th width="5%">Supprimer</th> 

	              </tr>  
	         </tfoot>   
	          
	      </table>';

	    echo($output);
	  
	}

	// fin confirmation au formation


	/**
	   * coach formations des articles de publications
	   ===============================================
	   *===============================================
	   *
    */

   	function operation_coach(){

   		$idf = $this->input->post('idf');
   		$id_user = $this->input->post('id_user');
   		
   		$test = $this->crud_model->fetch_single_test_inscription_coach($idf,$id_user);
   		if ($test > 0) {

   			echo("echec!!!");
   		}
   		else{

	   		$insert_data = array(  
	           'id_user'    	=>     htmlspecialchars($this->input->post('id_user')),
	           'edition'    	=>     htmlspecialchars($this->input->post('edition')),
	           'idf'    		=>     htmlspecialchars($this->input->post('idf'))
	        ); 

	    	$requete=$this->crud_model->insert_coach($insert_data);
	    	$nom_formation   = $this->crud_model->get_name_formation($idf);

	    	if ($requete > 0) {
	    		# code...
	    		$url ="formateur/myformation/".$idf."/".$id_user;

	            $nom   = $this->crud_model->get_name_user($id_user);
	            $message =$nom." vous venez d'être attribué à la formation".$nom_formation;

	            $notification = array(
	              'titre'     =>    "Coach mentor pour la foration ".$nom_formation,
	              'icone'     =>    "fa fa-headphones",
	              'message'   =>     $message,
	              'url'       =>     $url,
	              'id_user'   =>     $id_user
	            );
	            
	            $not = $this->crud_model->insert_notification($notification);
	    		  
    		}
	    	echo("Ajout information avec succès");
   		}


	    
	    
	  }

	  function modification_coach(){

	  		$updated_data = array(  
	           'id_user'    	=>     htmlspecialchars($this->input->post('id_user')),
	           'edition'    	=>     htmlspecialchars($this->input->post('edition')),
	           'idf'    		=>     htmlspecialchars($this->input->post('idf'))
	        ); 

	    	$this->crud_model->update_coach($this->input->post("idcoach"), $updated_data);
	    	echo("modification avec succès");

	   
	  }

	  function supression_coach(){

	      $this->crud_model->delete_coach($this->input->post("idcoach"));
	      echo("suppression avec succès");
	    
	  }

	  function fetch_single_coach()  
	  {  
	       $output = array();  
	       $data = $this->crud_model->fetch_single_coach($this->input->post('idcoach'));  
	       foreach($data as $row)  
	       {  
	            $output['idf']  			= $row->idf;
	            $output['id_user']  		= $row->id_user;
	            $output['nom']  			= $row->nom;
	            $output['edition']  		= $row->edition;


	       }  
	       echo json_encode($output);  
	  }


	 

	function pagination_view_coach_limit($param1='')
	{
	  $limit = $param1;
	  if ($limit !='') {
	  	$output = $this->crud_model->fetch_details_view_coach_limit($limit);
	  }
	  else{
	  	$output = $this->crud_model->fetch_details_view_coach();
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
	  $data = $this->crud_model->fetch_data_search_view_coach($query);
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

                  <th width="5%">Modifier</th> 
                  <th width="5%">Supprimer</th>  
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

          
          <td><button type="button" name="update" idcoach="'.$row->idcoach.'" class="btn btn-hub btn-circle btn-sm update"><i class="fa fa-edit"></i></button></td>
          <td><button type="button" name="delete" idcoach="'.$row->idcoach.'" class="btn btn-danger btn-circle btn-sm delete"><i class="fa fa-trash"></i></button></td>
          

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

                  <th width="5%">Modifier</th> 
                  <th width="5%">Supprimer</th> 

              </tr>  
         </tfoot>   
          
      </table>';

	    echo($output);
	  
	}

	// fin coach au formation

	function pagination_view_formateur_pdf()
	{
	  $idf 		= 	$_GET['idf'];
	  $edition 	= 	$_GET['edition'];
	  if ($idf !='' && $edition !='') {
	  	$output = $this->crud_model->fetch_details_view_formateur_pdf($idf, $edition);
	  }
	  else{
	  	
	  }
	  
	  echo($output);
	}

	function printFormateur($idf='', $edition=''){


	    	
        $customer_id = "Liste de formateurs par formation ";
        $html_content = '';

        $html_content .= '<link href="' . base_url() . 'js/css/sb-admin-2.min.css" rel="stylesheet">';
        
        $html_content .= $this->crud_model->pdffetch_details_view_formateur($idf, $edition);

       //echo($html_content);
       $this->pdf->loadHtml($html_content);
       $this->pdf->setPaper('A4', 'portrait');
	   //Render the HTML as PDF
       $this->pdf->render();
       $this->pdf->stream("".$customer_id.".pdf", array("Attachment"=>0));
       
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

	    $output = $this->crud_model->fetch_details_view_cours();
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

  function fetch_limit_view_module()
  {
    $output = '';
    $query = '';
    if($this->input->post('limit'))
    {
     $query = $this->input->post('limit');
    }
    $data = $this->crud_model->fetch_data_limit_cours($query);
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

  // fin informations tinfo_user

  // requete de cours
  function fetch_cours_requete(){
	  if($this->input->post('idf'))
	  {
	   	echo $this->crud_model->fetch_cours_requete($this->input->post('idf'));
	  }

  }

  // requete de cours
  function fetch_lesson_requete(){
	  if($this->input->post('idcours'))
	  {
	   	echo $this->crud_model->fetch_lesson_requete($this->input->post('idcours'));
	  }

  }
  // fin requete de cours


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
		            
		            $not = $this->crud_model->insert_notification($notification);
			          
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

	    $output = $this->crud_model->fetch_details_view_lesson();
	    echo($output);
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

  function fetch_limit_view_lesson()
  {
    $output = '';
    $query = '';
    if($this->input->post('limit'))
    {
     $query = $this->input->post('limit');
    }
    $data = $this->crud_model->fetch_data_limit_lesson($query);
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


     // cours
    function pagination_view_travail()
    {

	    $output = $this->crud_model->fetch_details_view_travail();
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

  function fetch_limit_view_travail()
  {
    $output = '';
    $query = '';
    if($this->input->post('limit'))
    {
     $query = $this->input->post('limit');
    }
    $data = $this->crud_model->fetch_data_limit_travail($query);
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
		   'country_table'   => $this->crud_model->fetch_details_pagination_articles_admin($config["per_page"], $start)
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
			            <a href="'.base_url().'admin/blog/'.$key->idart.'" class="img-fluid">
			              <img src="'.base_url().'upload/article/'.$key->image.'" alt="IMG" class="img img-responsive img-thumbnail" style="height: 200px; border-color:#DC4405;">
			            </a>
			            <div class="col-md-12 p-t-16">
			              <h5 class="p-b-5">
			                <a href="'.base_url().'admin/blog/'.$key->idart.'" class="f1-m-3 cl2 hov-cl10 trans-03">
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


      /*
    script pour la conference
    ===========================
    zoom conference
    ==========================
    ****************************
    ****************************

    */

    // script de conference
	
	  function fetch_single_conference()  
	  {  
	       $output = array();  
	       $data = $this->crud_model->fetch_single_conference($_POST["idconference"]);  
	       foreach($data as $row)  
	       {  
	            $output['nom']    				= $row->nom;
	            $output['date_debit']    		= $row->date_debit;
	            $output['date_fin']    			= $row->date_fin;
	            $output['heure_debit']    		= $row->heure_debit;
	            $output['heure_fin']    		= $row->heure_fin;
	            
	            $output['first_name']    		= $row->first_name; 
	            $output['last_name']   			= $row->last_name;
	            $output['telephone']    		= $row->telephone; 
	            
	           
	       }  
	       echo json_encode($output);  
	  }  


	  function operation_conference(){

	  	$id_user 	= $this->connected;
	  	$nom 	= $this->input->post('nom');
	  	
	  	$codeReservation = str_shuffle(substr("0123456789", 0,10));

	  	$query = $this->crud_model->fetch_single_conference_in_stadium($id_user, $nom);
	  	if ($query > 0) {
	  		# code...
	  		echo "echec!!!";
	  	}
	  	else{

		    $insert_data = array(  
		           'nom'            	 =>     $this->input->post('nom'),
		           'date_debit'          =>     $this->input->post('date_debit'),
		           'heure_debit'         =>     $this->input->post('heure_debit'),
		           'date_fin'            =>     $this->input->post('date_fin'),
		           'heure_fin'           =>     $this->input->post('heure_fin'),
		           'id_user'    		 =>     $id_user  
		    );  

		    $requete=$this->crud_model->insert_conference($insert_data);
		    echo("Ajout information avec succès");
	  	}

	      
	  }

	  function modification_conference(){

	      $updated_data = array(  
	      	   'nom'            	 =>     $this->input->post('nom'),
	           'date_debit'          =>     $this->input->post('date_debit'),
	           'heure_debit'         =>     $this->input->post('heure_debit'),
	           'date_fin'            =>     $this->input->post('date_fin'),
	           'heure_fin'           =>     $this->input->post('heure_fin')
	      );

	      $this->crud_model->update_conference($this->input->post("idconference"), $updated_data);
	      echo("modification avec succès");
	  }

	  

	  function supression_conference(){

	      $this->crud_model->delete_conference($this->input->post("idconference"));
	      echo("suppression avec succès");
	    
	  }

	   // pagination user to sms 
    function pagination_conference_client()
   {

    $this->load->library("pagination");
    $config = array();
    $config["base_url"] = "#";
    $config["total_rows"] = $this->crud_model->count_all_conferences();
    $config["per_page"] = 4;
    $config["uri_segment"] = 3;
    $config["use_page_numbers"] = TRUE;
    $config["full_tag_open"] = '<ul class="pagination pagination2">';
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
     'pagination_link'  => $this->pagination->create_links(),
     'country_table'   => $this->crud_model->fetch_detail_conference($config["per_page"], $start)
    );
    echo json_encode($output);
  }

   function search_conference_client()
   {
	  $output = '';
	  $query = '';

	  if($this->input->post('query'))
	  {
	   $query = $this->input->post('query');
	  }
	  $data = $this->crud_model->fetch_data_conference_ok($query);
	  $output .= '
   
	    <table class="table-striped table-bordered nk-tb-list nk-tb-ulist dataTable no-footer" data-auto-responsive="true" id="user_data" role="grid" aria-describedby="DataTables_Table_1_info">
	     <theader>
	       <tr>
	        
	        <th width="10%">Avatar</th>
	        <th width="20%">Nom de la Conférence</th>
	        <th width="10%">Date debit</th>
	        <th width="10%">Heure debit</th>
	        
	        <th width="10%">Date fin</th>
	        <th width="10%">Heure fin</th>
	        <th width="20%">Mise à jour</th>

	        <th width="5%">Editer</th>
	        <th width="5%">Supprimer</th>
	        
	        
	       </tr>
	     <theader>
	     <tbody>
	    ';
	      foreach($data->result() as $row)
	      {
	          

	          $etat ='<span class="badge badge-warning"><i class="fa fa-user"></i> Client </span>';


	           $email = '<a href="mailto:'.$row->email.'" class="text-primary"><i class="fa fa-google mr-1"></i> '.$row->email.'</a>
	          
	          ';

	         
	           $output .= '
	           <tr>
	            
	            <td><img src="'.base_url().'upload/photo/'.$row->image.'" class="table-user-thumb" style="border-radius: 50%; width: 50px; height: 30px;" /></td>

	            <td>'.substr($row->nom, 0,20).'...</td>

	            <td>'.nl2br(substr(date(DATE_RFC822, strtotime($row->date_debit)), 0, 23)).'</td>
	            <td>'.$row->heure_debit.'</td>
	            <td>'.nl2br(substr(date(DATE_RFC822, strtotime($row->date_fin)), 0, 23)).'</td>
	            <td>'.$row->heure_fin.'</td>

	            <td>'.nl2br(substr(date(DATE_RFC822, strtotime($row->date_fin)), 0, 23)).'</td>

	            <td>
	              <button type="button" name="update" idconference="'.$row->idconference.'" class="btn btn-warning btn-circle btn-sm update mr-2"><i class="fa fa-edit"></i></button> 
	            </td>
	            <td>
	            <button type="button" name="delete" idconference="'.$row->idconference.'" class="btn btn-danger btn-circle btn-sm delete"><i class="fa fa-trash"></i></button>
	            </td>
	            
	           </tr>
	           ';

	      }
	      $output .= '
	            <tbody>
	            <tfooter>
	             <tr>
	              <th width="10%">Avatar</th>
	              <th width="20%">Nom de la Conférence</th>
	              <th width="10%">Date debit</th>
	              <th width="10%">Heure debit</th>
	              
	              <th width="10%">Date fin</th>
	              <th width="10%">Heure fin</th>
	              <th width="20%">Mise à jour</th>

	              <th width="5%">Editer</th>
	              <th width="5%">Supprimer</th>
	              
	              
	             </tr>
	           <tfooter>
	    </table>';
	  	echo $output;
	}

	// fin conference

	/*
    script pour la invite
    ===========================
    zoom invite
    ==========================
    ****************************
    ****************************

    */

    // script de invite
	
	  function fetch_single_invite()  
	  {  
	       $output = array();  
	       $data = $this->crud_model->fetch_single_invite($_POST["idinvite"]);  
	       foreach($data as $row)  
	       {  
	            $output['nom']    				= $row->nom;
	            $output['date_debit']    		= $row->date_debit;
	            $output['date_fin']    			= $row->date_fin;
	            $output['heure_debit']    		= $row->heure_debit;
	            $output['heure_fin']    		= $row->heure_fin;
	            
	            $output['first_name']    		= $row->first_name; 
	            $output['last_name']   			= $row->last_name;
	            $output['telephone']    		= $row->telephone; 
	            
	           
	       }  
	       echo json_encode($output);  
	  }  


	  function operation_invite(){

	  	$id_user 	= $this->connected;
	  	$idconference 	= $this->input->post('idconference');
	  	
	  	$codeReservation = str_shuffle(substr("0123456789", 0,10));

	  	$query = $this->crud_model->fetch_single_invite_in_stadium($id_user, $idconference);
	  	if ($query > 0) {
	  		# code...
	  		echo "echec!!!";
	  	}
	  	else{

		    $insert_data = array(  
		           'idconference'        =>     $this->input->post('idconference'),
		           'id_user'    		 =>     $id_user  
		    );  

		    $requete=$this->crud_model->insert_invite($insert_data);
		    echo("Ajout information avec succès");
	  	}

	      
	  }

	  function modification_invite(){
	  	  $id_user 	= $this->connected;
	      $updated_data = array(  
      	    'idconference'        =>     $this->input->post('idconference'),
	        'id_user'    		  =>     $id_user  
	      );

	      $this->crud_model->update_conference($this->input->post("idinvite"), $updated_data);
	      echo("modification avec succès");
	  }

	  

	  function supression_invite(){

	      $this->crud_model->delete_invite($this->input->post("idinvite"));
	      echo("suppression avec succès");
	    
	  }

	   // pagination user to sms 
    function pagination_invite_client()
   {

    $this->load->library("pagination");
    $config = array();
    $config["base_url"] = "#";
    $config["total_rows"] = $this->crud_model->count_all_invites();
    $config["per_page"] = 4;
    $config["uri_segment"] = 3;
    $config["use_page_numbers"] = TRUE;
    $config["full_tag_open"] = '<ul class="pagination pagination2">';
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
     'pagination_link'  => $this->pagination->create_links(),
     'country_table'   => $this->crud_model->fetch_detail_invite($config["per_page"], $start)
    );
    echo json_encode($output);
  }

   function search_invite_client()
   {
	  $output = '';
	  $query = '';

	  if($this->input->post('query'))
	  {
	   $query = $this->input->post('query');
	  }
	  $data = $this->crud_model->fetch_data_invite_ok($query);
	  $output .= '
   
	    <table class="table-striped table-bordered nk-tb-list nk-tb-ulist dataTable no-footer" data-auto-responsive="true" id="user_data" role="grid" aria-describedby="DataTables_Table_1_info">
	     <theader>
	       <tr>
	        
	        <th width="10%">Avatar</th>
	        <th width="20%">Nom de la Conférence</th>
	        <th width="10%">Date debit</th>
	        <th width="10%">Heure debit</th>
	        
	        <th width="10%">Date fin</th>
	        <th width="10%">Heure fin</th>
	        <th width="20%">Mise à jour</th>

	        <th width="5%">Profil</th>
	        <th width="5%">Supprimer</th>
	        
	        
	       </tr>
	     <theader>
	     <tbody>
	    ';
	      foreach($data->result() as $row)
	      {
	          

	          $etat ='<span class="badge badge-warning"><i class="fa fa-user"></i> Client </span>';


	           $email = '<a href="mailto:'.$row->email.'" class="text-primary"><i class="fa fa-google mr-1"></i> '.$row->email.'</a>
	          
	          ';

	         
	           $output .= '
	           <tr>
	            
	            <td><img src="'.base_url().'upload/photo/'.$row->image.'" class="table-user-thumb" style="border-radius: 50%; width: 50px; height: 30px;" /></td>

	            <td>'.substr($row->nom, 0,20).'...</td>

	            <td>'.nl2br(substr(date(DATE_RFC822, strtotime($row->date_debit)), 0, 23)).'</td>
	            <td>'.$row->heure_debit.'</td>
	            <td>'.nl2br(substr(date(DATE_RFC822, strtotime($row->date_fin)), 0, 23)).'</td>
	            <td>'.$row->heure_fin.'</td>

	            <td>'.nl2br(substr(date(DATE_RFC822, strtotime($row->date_fin)), 0, 23)).'</td>

	            <td>
	              <button type="button" name="update" id="'.$row->id.'" class="btn btn-warning btn-circle btn-sm update mr-2"><i class="fa fa-user"></i></button> 
	            </td>
	            <td>
	            <button type="button" name="delete" idinvite="'.$row->idinvite.'" class="btn btn-danger btn-circle btn-sm delete"><i class="fa fa-trash"></i></button>
	            </td>
	            
	           </tr>
	           ';

	      }
	      $output .= '
	            <tbody>
	            <tfooter>
	             <tr>
	              <th width="10%">Avatar</th>
	              <th width="20%">Nom de la Conférence</th>
	              <th width="10%">Date debit</th>
	              <th width="10%">Heure debit</th>
	              
	              <th width="10%">Date fin</th>
	              <th width="10%">Heure fin</th>
	              <th width="20%">Mise à jour</th>

	              <th width="5%">Profil</th>
	              <th width="5%">Supprimer</th>
	              
	              
	             </tr>
	           <tfooter>
	    </table>';
	  	echo $output;
	}
	// fin invite

	function fetch_single_personne_zoom()  
	{  
       $output = array();  
       $data = $this->crud_model->fetch_single_personne_user($_POST["id"]);  
       foreach($data as $row)  
       {  
            $output['first_name'] 		= $row->first_name;  
            $output['last_name'] 		= $row->last_name; 
            $output['email'] 			= $row->email; 
            $output['date_nais'] 		= $row->date_nais; 
            $output['telephone'] 		= $row->telephone; 
            $output['full_adresse'] 	= $row->full_adresse; 

            $output['sexe'] 			= $row->sexe;
            
            if($row->image != '')  
            {  
                $output['user_image'] = '<img src="'.base_url().'upload/photo/'.$row->image.'" class="img-thumbnail" width="200" height="200" /><input type="hidden" name="hidden_user_image" value="'.$row->image.'" />';  
            }  
            else  
            {  
                $output['user_image'] = '<input type="hidden" name="hidden_user_image" value="" />';  
            }  
       }  
       echo json_encode($output);  
	}



	// pagination user to sms 
    function pagination_message_users_zoom()
   {

    $output = $this->crud_model->fetch_detailsmessage_users_zoom();
    echo($output);
  }

   function search_message_users_zoom()
   {
	  $output = '';
	  $query = '';

	  if($this->input->post('query'))
	  {
	   $query = $this->input->post('query');
	  }
	  $data = $this->crud_model->fetch_data_sms_users($query);
	   $output .= '
	   
	    <table class="table-striped table-bordered nk-tb-list nk-tb-ulist dataTable no-footer" data-auto-responsive="true" id="user_data" role="grid" aria-describedby="DataTables_Table_1_info">
	     <theader>
	       <tr>
	        <th width="5%">Selectionner</th>
	        <th width="5%">Avatar</th>
	        <th width="20%">Nom complet</th>
	        <th width="15%">Télephone</th>
	        <th width="10%">Statut</th>
	        
	        <th width="5%">Sexe</th>
	        <th width="20%">Mise à jour</th>
	        
	        
	       </tr>
	     <theader>
	     <tbody>
	    ';
	    if ($data->num_rows() <= 0) {
	    	# code...
	    }
	    else{

	    	foreach($data->result() as $row)
		    {

		          
		          if ($row->idrole == 1) {
		            $etat ='<span class="badge badge-success"><i class="fa fa-tag"></i> '.$row->nom.'</span>';
		          }
		          else if ($row->idrole == 2) {
		            $etat ='<span class="badge badge-warning"><i class="fa fa-user"></i> '.$row->nom.'</span>';
		          }
		          else if ($row->idrole == 3) {
		            $etat ='<span class="badge badge-secondary"><i class="fa fa-home"></i> '.$row->nom.'</span>';
		          }
		          else if ($row->idrole == 4) {
		            $etat ='<span class="badge badge-primary"><i class="fa fa-money"></i> '.$row->nom.'</span>';
		          }
		          else{
		            $etat ='<span class="badge badge-danger"><i class="fa fa-eye"></i></span>';
		          }

		          $link = '<a href="tel:'.$row->telephone.'" class="text-primary"><i class="fa fa-phone"></i></a>
		           <input type="checkbox" name="id" value="'.$row->id.'" class="tels delete_checkbox">
		          ';

		           $email = '<a href="mailto:'.$row->email.'" class="text-primary"><i class="fa fa-google mr-1"></i> '.$row->email.'</a>
		          
		          ';

		           $output .= '
		           <tr>
		            <td>'.$link.'</td>
		            <td><img src="'.base_url().'upload/photo/'.$row->image.'" class="table-user-thumb" style="border-radius: 50%; width: 50px; height: 30px;" /></td>

		             <td>'.substr($row->first_name.' '.$row->last_name, 0,20).'...</td>

		            <td>'.$row->telephone.'</td>
		            <td>'.$etat.'</td>
		            
		            <td>'.$row->sexe.'</td>


		            <td>'.substr(date(DATE_RFC822, strtotime($row->debit_event)), 0, 23).'</td>
		           
		           </tr>
		           ';
		        

		    }

	    }
	      
          $output .= '
	        <tbody>
	        <tfooter>
	         <tr>
	          <th width="5%">Selectionner</th>
	          <th width="5%">Avatar</th>
	          <th width="20%">Nom complet</th>
	          <th width="15%">Télephone</th>
	          <th width="10%">Statut</th>
	          
	          <th width="5%">Sexe</th>
	          <th width="20%">Mise à jour</th>
	          
	         </tr>
	       <tfooter>
	    </table>';
	  	echo $output;
	}

	// pagination user to sms 
    function pagination_message_users_byrole_zoom()
	{
		sleep(1);
		$idrole = $this->input->post('idrole');

	    $this->load->library("pagination");
	    $config = array();
	    $config["base_url"] = "#";
	    $config["total_rows"] = $this->crud_model->count_all_message_users_byrole($idrole);
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
	     'country_table'   => $this->crud_model->fetch_detailsmessage_users_byrole_zoom($config["per_page"], $start, $idrole)
	    );
	    echo json_encode($output);
	}

	function infomation_zoom()
    {
        if($this->input->post('checkbox_value'))
        {
           $id = $this->input->post('checkbox_value');
           for($count = 0; $count < count($id); $count++)
           {

           		
                $id_user 		=	$id[$count];
                $url 			= 	htmlentities($this->input->post('link'));
                $idconference 	= 	$this->input->post('idconference');

                $mon_lien = $this->input->post('link');


                
                // echo("id:".$id_user." message:".$url);

               

			  	
			  	$codeReservation = str_shuffle(substr("0123456789", 0,10));

			  	$query2 = $this->crud_model->fetch_single_invite_in_stadium($id_user, $idconference);
			  	if ($query2 > 0) {
			  		# code...
			  		echo "echec!!!";
			  	}
			  	else{

				    $insert_data = array(  
				           'idconference'        =>     $this->input->post('idconference'),
				           'id_user'    		 =>     $id_user  
				    );  

				    $query=$this->crud_model->insert_invite($insert_data);

				    // invitation
	                if ($query > 0) {

	                	$nom_respect	= $this->crud_model->get_name_user($this->connected);

	                    $nom    		= $this->crud_model->get_name_user($id_user);
	                    $idrole     	= $this->crud_model->get_role_user($id_user);
	                    $telephone    	= $this->crud_model->get_telephone_user($id_user);

	                    if ($idrole == 1) {
	                    	# code...
	                    	$url    	="admin/joinmetting/". $url;
	                    }
	                    elseif ($idrole == 2) {
	                    	# code...
	                    	$url    	="user/joinmetting/". $url;
	                    }
	                    elseif ($idrole == 3) {
	                    	# code...
	                    	$url    	="comptable/joinmetting/". $url;
	                    }
	                    elseif ($idrole == 4) {
	                    	# code...
	                    	$url    	="formateur/joinmetting/". $url;
	                    }
	                    else{
	                    	$url = '';
	                    }

	                    $message =$nom_respect." Vient de vous ajouter pour faire part dans une conférence";

	                    $notification = array(
	                      'titre'     =>    "Bonjour  ".$nom." vous venez d'être sélectionné(e) dans une conférence",
	                      'icone'     =>    "fa fa-video",
	                      'message'   =>     $message,
	                      'url'       =>     $url,
	                      'id_user'   =>     $id_user
	                    );
	                    
	                    $not = $this->crud_model->insert_notification($notification);

	                    echo("invitation reussie avec succès!!!");

	                    
	                }
 
				    // fin invitation
			  	}

           }

        }
    }



























}



 ?>