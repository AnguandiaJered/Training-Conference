<?php 
class crud_model extends CI_Model{
   // opertion role
  var $table1 = "role";  
  var $select_column1 = array("idrole", "nom", "created_at");  
  var $order_column1 = array(null, "nom", "created");
  // fin de la role

  // opertion tbl_info
  var $table2 = "tbl_info";  
  var $select_column2 = array("idinfo", "nom_site", "icone", "adresse", "tel1","tel2","facebook","twitter", "linkedin", "email", "termes", "confidentialite", 
    "description", "mission", "objectif","blog");  
  var $order_column2 = array(null, "nom_site", "adresse","tel1","tel2", 
    "description", "mission", "objectif","blog", null, null);
    // fin de la tbl_info
  // opertion category
  var $table3 = "category";  
  var $select_column3 = array("idcat", "nom", "created_at");  
  var $order_column3 = array(null, "nom", "created_at");
  // fin category

  // opertion produit
  var $table4 = "profile_product";  
  var $select_column4 = array("product_id", "category_id", "product_name", "product_price", "product_image", "id_user", "first_name", "image", "nom","Qte");  
  var $order_column4 = array(null, "nom","product_name","product_price","first_name", "id_user","Qte");
  // fin produit

  // opertion galery produit
  var $table5 = "profile_galery";  
  var $select_column5 = array("idgalery","product_id", "photos", "product_name", "product_price", "Qte");  
  var $order_column5 = array(null, "product_id", "photos", "product_name", "product_price", "Qte");
  // fin produit

   // opertion galery produit
  var $table6 = "profile_entree_stock";  
  var $select_column6 = array("ide","product_id", "QteEntree", "product_name", "product_price", "Qte","created_at","product_image");  
  var $order_column6 = array(null, "product_id", "QteEntree", "product_name", "product_price", "Qte","created_at","product_image");
  // fin produit

   // opertion galery produit
  var $table7 = "profile_sortie_stock";  
  var $select_column7 = array("ids","product_id", "QteEntree", "product_name", "product_price", "Qte","created_at","product_image","nom");  
  var $order_column7 = array(null, "product_id", "QteEntree", "product_name", "product_price", "Qte","created_at","product_image","nom");
  // fin produit

   //users
  var $table8 = "users";  
  var $select_column8 = array("id", "first_name", "last_name", "email","image","telephone","full_adresse","biographie","date_nais","facebook","twitter","linkedin","idrole","sexe");  
  var $order_column8 = array(null, "first_name", "last_name","telephone","sexe","id", null, null);
  // fin information

   // opertion conference
  var $table9 = "profile_conference";  
  var $select_column9 = array("idconference", "nom","date_debit","heure_debit","date_fin","heure_fin",
  "first_name","last_name","telephone","id_user", "created_at");  
  var $order_column9 = array(null, "nom","date_debit","heure_debit","date_fin","heure_fin",
  "first_name","last_name","telephone","id_user", "created_at");
  // fin conference

   // opertion profile_invite
  var $table10 = "profile_invite";  
  var $select_column10 = array("idinvite","idconference", "nom","date_debit","heure_debit","date_fin","heure_fin",
  "first_name","last_name","telephone","id_user","link", "created_at");  
  var $order_column10 = array(null, "nom","date_debit","heure_debit","date_fin","heure_fin",
  "first_name","last_name","telephone","id_user","link", "created_at");
  // fin profile_invite

   // contact
  var $table12 = "contact";  
  var $select_column12 = array("id", "nom", "sujet","email", "message","fichier","created_at");  
  var $order_column12 = array(null, "nom", "sujet","email","fichier", null, null);
  // fin contact

  // opertion category information
  var $table15 = "profile_article";  
  var $select_column15 = array("idart", "nom","description","lien","image", 
    "type","idcat","nom_cat","created_at");  
  var $order_column15 = array(null, "nom","description","lien","type","idcat","nom_cat", "created_at");
  // fin category



// voir tous les messages 
  function count_all_message_users()
  {
    $query = $this->db->get("profile_user");
    return $query->num_rows();
  }

  function fetch_produits()
  {
    $this->db->order_by("product_id", "DESC");
    $this->db->limit(100);
    return $this->db->get('profile_product');
  } 

  function fetch_categores()
  {
    $this->db->order_by('nom','ASC');
      return $this->db->get('category');
  }

  // information basique du site
  function Select_contact_info_site()
  {
      return $this->db->query('SELECT * FROM tbl_info  LIMIT 1');
  }

  // contact 
  function insert_contact($data)  
  {  
       $this->db->insert('contact', $data);  
  }

// test_email si existe
  function get_users_email($email)
  {
      $this->db->limit(1);
      return $this->db->get_where('users', array('email' => $email));
  }
// utilisateur connecte
  function fetch_connected($id){
      $this->db->where('id',$id);
      return $this->db->get('users')->result_array();
  }
  // online 
  function insert_online($data){
      $this->db->insert('online', $data);
  }
  // creation de compte
  function insert_user($data)
  {
    $this->db->insert('users', $data);
    return $this->db->insert_id();
  } 

  // insertion dans la table recuper pwd 
  function insert_recupere($data){
     $this->db->insert('recupere', $data);
  }

  // suppression deconnexion en ligne 
  function delete_online($id_user){
    $this->db->where('id_user', $id_user);
    $this->db->delete("online");
  }

  //modification des utilisateurs
  function update_user($email, $data)
  {
    $this->db->where('email', $email);
    return $this->db->update('users', $data);
  }

  // insertion des notifications 
  function insert_notification($data)  
  {  
     $this->db->insert('notification', $data);  
  }
  function update_crud($user_id, $data)  
  {  
       $this->db->where("id", $user_id);  
       $this->db->update("users", $data);  
  }
  //supression de notification
  function delete_notifacation_tag($id){
    $this->db->where('id', $id);
    $this->db->delete('notification');
  }

  //supression de favories
  function delete_favory_tag($idfovorie){
    $this->db->where('idfovorie', $idfovorie);
    $this->db->delete('favories');
  }

  //supression de favories
  function delete_favory_vente($code){
    $this->db->where('code', $code);
    $this->db->delete('pading_vente');
  }

  function Select_users()
  {
      $this->db->order_by('first_name','ASC');
      $this->db->limit(50);
      return $this->db->get('users');
  }

  function Select_roles()
  {
      $this->db->order_by('nom','ASC');
      $this->db->limit(50);
      return $this->db->get('role');
  }

  // utilisateur vente en attente
  function fetch_connected_vente($user_id){
      $this->db->where('user_id',$user_id);
      $this->db->group_by('code');
      return $this->db->get('profile_padding_vente')->result_array();
  }

  // nombre des produits au panier 
  function fetch_number_Panier_connected($user_id){
      $nombreTotal;
      $query= $this->db->query("SELECT COUNT(product_id) AS nombre FROM cart WHERE user_id=".$user_id." ");
      if ($query->num_rows() > 0) {
        foreach ($query->result_array() as $key) {
          # code...
          $nombreTotal = $key['nombre'];
        }

      }
      else{
        $nombreTotal = 0;
      }
      return $nombreTotal;
  }

 

  function get_info_user(){
      $nom = $this->db->get("users")->result_array();
      return $nom;
  }

  function get_total_apprenants($idf){
      $nom = $this->db->get_where("profile_format", array(
        'idf'   =>  $idf
        )
      )->result_array();
      return $nom;
  }

  function get_total_coach($idf){
      $nom = $this->db->get_where("profile_coach", array(
        'idf'   =>  $idf
        )
      )->result_array();
      return $nom;
  }

  function statistiques_nombre_entree_enstock($query){
      $my_nombre;
      $data_ok = $this->db->query("SELECT count(*) AS nombre from ".$query." ");
      if ($data_ok->num_rows() > 0) {

        foreach ($data_ok->result_array() as $key) {
          $my_nombre = $key['nombre'];
        }
        # code...
      }
      else{
           $my_nombre = 0;
      }

      return $my_nombre;
  }

  function statistiques_nombre_entree_enstock_cat($query){
      $my_nombre;
      $data_ok = $this->db->query("SELECT count(*) AS nombre from ".$query." GROUP BY nom ");
      if ($data_ok->num_rows() > 0) {

        foreach ($data_ok->result_array() as $key) {
          $my_nombre = $key['nombre'];
        }
        # code...
      }
      else{
           $my_nombre = 0;
      }

      return $my_nombre;
  }



  function statistiques_nombre_tag_by_column($query, $value){
      $my_nombre;
      $data_ok = $this->db->query("SELECT count(*) AS nombre from ".$query." WHERE idrole=".$value." ");
      if ($data_ok->num_rows() > 0) {

        foreach ($data_ok->result_array() as $key) {
          $my_nombre = $key['nombre'];
        }
        # code...
      }
      else{
           $my_nombre = 0;
      }

      return $my_nombre;
  }


  function statistiques_nombre($query){
      $my_nombre;
      $data_ok = $this->db->query("SELECT count(*) AS nombre from ".$query." ");
      if ($data_ok->num_rows() > 0) {

        foreach ($data_ok->result_array() as $key) {
          $my_nombre = $key['nombre'];
        }
        # code...
      }
      else{
           $my_nombre = 0;
      }

      return $my_nombre;
  }

  function statistiques_nombre_where($query, $colone,$value){
      $my_nombre;
      $data_ok = $this->db->query("SELECT count(*) AS nombre from ".$query." WHERE ".$colone."='".$value."' ");
      if ($data_ok->num_rows() > 0) {

        foreach ($data_ok->result_array() as $key) {
          $my_nombre = $key['nombre'];
        }
        # code...
      }
      else{
           $my_nombre = 0;
      }

      return $my_nombre;

  }

  function statistiques_nombre_where_null($query, $colone,$value){
      $my_nombre;
      $data_ok = $this->db->query("SELECT count(*) AS nombre from ".$query." WHERE ".$colone." is ".$value." ");
      if ($data_ok->num_rows() > 0) {

        foreach ($data_ok->result_array() as $key) {
          $my_nombre = $key['nombre'];
        }
        # code...
      }
      else{
           $my_nombre = 0;
      }

      return $my_nombre;

  }


   // script pour ctegorie mrchandise du site
    function make_query_category()  
    {  
          
         $this->db->select($this->select_column3);  
         $this->db->from($this->table3);
         
         if(isset($_POST["search"]["value"]))  
         {  
              $this->db->like("idcat", $_POST["search"]["value"]);  
              $this->db->or_like("nom", $_POST["search"]["value"]);
         }  
         if(isset($_POST["order"]))  
         {  
              $this->db->order_by($this->order_column3[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
         }  
         else  
         {  
              $this->db->order_by('idcat', 'DESC');  
         }  
    }

   function make_datatables_category(){  
         $this->make_query_category();  
         if($_POST["length"] != -1)  
         {  
              $this->db->limit($_POST['length'], $_POST['start']);  
         }  
         $query = $this->db->get();  
         return $query->result();  
    }

    function get_filtered_data_category(){  
         $this->make_query_category();  
         $query = $this->db->get();  
         return $query->num_rows();  
    }       
    function get_all_data_category()  
    {  
         $this->db->select("*");  
         $this->db->from($this->table3);  
         return $this->db->count_all_results();  
    }

    function insert_category($data)  
    {  
         $this->db->insert('category', $data);  
    }

    
    function update_category($idcat, $data)  
    {  
         $this->db->where("idcat", $idcat);  
         $this->db->update("category", $data);  
    }


    function delete_category($idcat)  
    {  
         $this->db->where("idcat", $idcat);  
         $this->db->delete("category");  
    }

    function fetch_single_category($idcat)  
    {  
         $this->db->where("idcat", $idcat);  
         $query=$this->db->get('category');  
         return $query->result();  
    } 

  // script pour role du site
   function make_query_role()  
   {  
          
         $this->db->select($this->select_column1);  
         $this->db->from($this->table1);  
         if(isset($_POST["search"]["value"]))  
         {  
              $this->db->like("idrole", $_POST["search"]["value"]);  
              $this->db->or_like("nom", $_POST["search"]["value"]);
         }  
         if(isset($_POST["order"]))  
         {  
              $this->db->order_by($this->order_column1[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
         }  
         else  
         {  
              $this->db->order_by('idrole', 'DESC');  
         }  
    }

   function make_datatables_role(){  
         $this->make_query_role();  
         if($_POST["length"] != -1)  
         {  
              $this->db->limit($_POST['length'], $_POST['start']);  
         }  
         $query = $this->db->get();  
         return $query->result();  
    }

    function get_filtered_data_role(){  
         $this->make_query_role();  
         $query = $this->db->get();  
         return $query->num_rows();  
    }       
    function get_all_data_role()  
    {  
         $this->db->select("*");  
         $this->db->from($this->table1);  
         return $this->db->count_all_results();  
    }

    function insert_role($data)  
    {  
         $this->db->insert('role', $data);  
    }

    
    function update_role($idrole, $data)  
    {  
         $this->db->where("idrole", $idrole);  
         $this->db->update("role", $data);  
    }


    function delete_role($idrole)  
    {  
         $this->db->where("idrole", $idrole);  
         $this->db->delete("role");  
    }

    function fetch_single_role($idrole)  
    {  
         $this->db->where("idrole", $idrole);  
         $query=$this->db->get('role');  
         return $query->result();  
    } 
    // fin de script role

    // script pour information du site
    function make_query_tbl_info()  
    {  
          
         $this->db->select($this->select_column2);  
         $this->db->from($this->table2);  
         if(isset($_POST["search"]["value"]))  
         {  
              $this->db->like("adresse", $_POST["search"]["value"]);  
              $this->db->or_like("nom_site", $_POST["search"]["value"]);
              $this->db->or_like("tel1", $_POST["search"]["value"]); 
              $this->db->or_like("tel2", $_POST["search"]["value"]);
              $this->db->or_like("email", $_POST["search"]["value"]);
              $this->db->or_like("idinfo", $_POST["search"]["value"]);
              $this->db->or_like("termes", $_POST["search"]["value"]);
              $this->db->or_like("confidentialite", $_POST["search"]["value"]);  
         }  
         if(isset($_POST["order"]))  
         {  
              $this->db->order_by($this->order_column2[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
         }  
         else  
         {  
              $this->db->order_by('idinfo', 'DESC');  
         }  
    }

   function make_datatables_tbl_info(){  
         $this->make_query_tbl_info();  
         if($_POST["length"] != -1)  
         {  
              $this->db->limit($_POST['length'], $_POST['start']);  
         }  
         $query = $this->db->get();  
         return $query->result();  
    }

    function get_filtered_data_tbl_info(){  
         $this->make_query_tbl_info();  
         $query = $this->db->get();  
         return $query->num_rows();  
    }       
    function get_all_data_tbl_info()  
    {  
         $this->db->select("*");  
         $this->db->from($this->table2);  
         return $this->db->count_all_results();  
    }

    function insert_tbl_info($data)  
    {  
         $this->db->insert('tbl_info', $data);  
    }

    
    function update_tbl_info($idinfo, $data)  
    {  
         $this->db->where("idinfo", $idinfo);  
         $this->db->update("tbl_info", $data);  
    }


    function delete_tbl_info($idinfo)  
    {  
         $this->db->where("idinfo", $idinfo);  
         $this->db->delete("tbl_info");  
    }

    function delete_compte_utilisateur($id)  
    {  
         $this->db->where("id", $id);  
         $this->db->delete("users");  
    }

    function fetch_single_tbl_info($idinfo)  
    {  
         $this->db->where("idinfo", $idinfo);  
         $query=$this->db->get('tbl_info');  
         return $query->result();  
    } 

    function fetch_single_to_modal($product_id)  
    {  
         $this->db->where("product_id", $product_id);  
         $query=$this->db->get('profile_product');  
         return $query->result();  
    } 

    function fetch_single_galery_to_modal($product_id)  
    {  
         $this->db->where("product_id", $product_id);  
         $query=$this->db->get('profile_galery');  
         return $query->result();  
    } 

    function fetch_single_rand_pro_one()  
    {  
         $img='';
         $query = $this->db->query("SELECT * FROM profile_product ORDER BY RAND() LIMIT 1"); 
          if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
              $img ='
                <a class="category-item mb-4" 
                   href="'.base_url().'user/detailProduct/'.$row->product_id.'">
                   <img class="img-fluid" src="'.base_url().'upload/product/'.$row->product_image.'" alt=""><strong class="category-item-title">'.$row->nom.'</strong>
                </a>

              ';
            }
          }
          else{

          } 
         return $img;  
    }

    /*

    OPERATION DE FILTRE POUR LES CATEGORIES
    DES SRTICLE CLOMMECE
    ===================================================
    ===================================================

    */

    // filtrage de category 
    function filtre_de_nom_Category_produit()  
    {   
         $query=$this->db->query("SELECT * FROM profile_product ORDER BY RAND() LIMIT 6");  
         return $query;  
    } 

    // filtrage de category 
    function filtre_de_donnees_produit_tag($product_id)  
    {   
         $query=$this->db->query("SELECT * FROM profile_product WHERE product_id=".$product_id." LIMIT 1");  
         return $query;  
    } 

     // filtrage de category 
    function filtre_de_cat_Category_produit()  
    {   
         $query=$this->db->query("SELECT * FROM profile_product GROUP BY category_id LIMIT 40");  
         return $query;  
    } 

     /*

    FIN OPERATION DE FILTRE POUR LES CATEGORIES
    DES SRTICLE CLOMMECE
    ===================================================
    ===================================================

    */




    // fin de tbl_info 

    // script users
    function make_query_users()  
    {  
          
         $this->db->select($this->select_column8);  
         $this->db->from($this->table8);  
         if(isset($_POST["search"]["value"]))  
         {  
              $this->db->like("first_name", $_POST["search"]["value"]);  
              $this->db->or_like("last_name", $_POST["search"]["value"]); 
              $this->db->or_like("full_adresse", $_POST["search"]["value"]); 
              $this->db->or_like("biographie", $_POST["search"]["value"]);  
         }  
         if(isset($_POST["order"]))  
         {  
              $this->db->order_by($this->order_column8[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
         }  
         else  
         {  
              $this->db->order_by('id', 'DESC');  
         }  
    }

    function make_datatables_users(){  
         $this->make_query_users();  
         if($_POST["length"] != -1)  
         {  
              $this->db->limit($_POST['length'], $_POST['start']);  
         }  
         $query = $this->db->get();  
         return $query->result();  
    }

    function get_filtered_data_users(){  
         $this->make_query_users();  
         $query = $this->db->get();  
         return $query->num_rows();  
    }       
    function get_all_data_users()  
    {  
         $this->db->select("*");  
         $this->db->from($this->table8);  
         return $this->db->count_all_results();  
    }

    function insert_users($data)  
    {  
         $this->db->insert('users', $data);  
    }

    
    function update_users($id, $data)  
    {  
         $this->db->where("id", $id);  
         $this->db->update("users", $data);  
    }


    function delete_users($id)  
    {  
         $this->db->where("id", $id);  
         $this->db->delete("users");  
    }

    function fetch_single_users($id)  
    {  
         $this->db->where("id", $id);  
         $query=$this->db->get('users');  
         return $query->result();  
    }

    //fin de script users

    // script pour information du produit en stock

    function fetch_details_view_product($limit, $start)
    {
      $output = '';
      $this->db->select("*");
      $this->db->from("profile_product");
      $this->db->order_by("product_id", "DESC");
      $this->db->limit($limit, $start);
      $query = $this->db->get();
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
      if ($query->num_rows() < 0) {
        
      }
      else{

        foreach($query->result() as $row)
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
      return $output;
    }


   function fetch_data_search_view_product($query)
   {
      $this->db->select("*");
      $this->db->from("profile_product");
      $this->db->limit(10);
      if($query != '')
      {
       $this->db->like('product_id', $query);
       $this->db->or_like('Qte', $query);
       $this->db->or_like('product_name', $query);
       $this->db->or_like('product_price', $query);
       $this->db->or_like('nom', $query);
      }
      $this->db->order_by('product_id', 'DESC');
      return $this->db->get();
   }


    function make_query_product()  
    {  
          
         $this->db->select($this->select_column4);  
         $this->db->from($this->table4);
         $this->db->limit(30);  
         if(isset($_POST["search"]["value"]))  
         {  
              $this->db->like("nom", $_POST["search"]["value"]);  
              $this->db->or_like("product_price", $_POST["search"]["value"]);
              $this->db->or_like("product_name", $_POST["search"]["value"]); 
              $this->db->or_like("first_name", $_POST["search"]["value"]);
         }  
         if(isset($_POST["order"]))  
         {  
              $this->db->order_by($this->order_column4[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
         }  
         else  
         {  
              $this->db->order_by('product_id', 'DESC');  
         }  
    }

   function make_datatables_product(){  
         $this->make_query_product();  
         if($_POST["length"])  
         {  
              $this->db->limit($_POST['length'], $_POST['start']);  
         }  
         $query = $this->db->get();  
         return $query->result();  
    }

    function get_filtered_data_product(){  
         $this->make_query_product();  
         $query = $this->db->get();  
         return $query->num_rows();  
    }       
    function get_all_data_product()  
    {  
         $this->db->select("*");  
         $this->db->from($this->table4);  
         return $this->db->count_all_results();  
    }

    function insert_product($data)  
    {  
         $this->db->insert('product', $data);  
    }

    
    
    function update_product($product_id, $data)  
    {  
         $this->db->where("product_id", $product_id);  
         $this->db->update("product", $data);  
    }


    function delete_product($product_id)  
    {  
         $this->db->where("product_id", $product_id);  
         $this->db->delete("product");  
    }

    function fetch_single_product($product_id)  
    {  
         $this->db->where("product_id", $product_id);  
         $query=$this->db->get('profile_product');  
         return $query->result();  
    } 

    // fin de produit en stock 


    // script pour information galery du produit en stock
    function make_query_galery()  
    {  
          
         $this->db->select($this->select_column5);  
         $this->db->from($this->table5);
         $this->db->limit(30);  
         if(isset($_POST["search"]["value"]))  
         {  
              $this->db->like("product_name", $_POST["search"]["value"]);  
              $this->db->or_like("product_price", $_POST["search"]["value"]);
              $this->db->or_like("Qte", $_POST["search"]["value"]); 
             
         }  
         if(isset($_POST["order"]))  
         {  
              $this->db->order_by($this->order_column5[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
         }  
         else  
         {  
              $this->db->order_by('idgalery', 'DESC');  
         }  
    }

   function make_datatables_galery(){  
         $this->make_query_galery();  
         if($_POST["length"])  
         {  
              $this->db->limit($_POST['length'], $_POST['start']);  
         }  
         $query = $this->db->get();  
         return $query->result();  
    }

    function get_filtered_data_galery(){  
         $this->make_query_galery();  
         $query = $this->db->get();  
         return $query->num_rows();  
    }       
    function get_all_data_galery()  
    {  
         $this->db->select("*");  
         $this->db->from($this->table5);  
         return $this->db->count_all_results();  
    }

    function insert_galery($data)  
    {  
         $this->db->insert('galery', $data);  
    }

    
    function update_galery($idgalery, $data)  
    {  
         $this->db->where("idgalery", $idgalery);  
         $this->db->update("galery", $data);  
    }


    function delete_galery($idgalery)  
    {  
         $this->db->where("idgalery", $idgalery);  
         $this->db->delete("galery");  
    }

    function fetch_single_galery($idgalery)  
    {  
         $this->db->where("idgalery", $idgalery);  
         $query=$this->db->get('profile_galery');  
         return $query->result();  
    } 

    // fin de galery produit en stock 


     // script pour information entreee du produit en stock
    function make_query_entree()  
    {  
          
         $this->db->select($this->select_column6);  
         $this->db->from($this->table6);
         $this->db->limit(30);  
         if(isset($_POST["search"]["value"]))  
         {  
              $this->db->like("product_name", $_POST["search"]["value"]);  
              $this->db->or_like("product_price", $_POST["search"]["value"]);
              $this->db->or_like("Qte", $_POST["search"]["value"]); 
              $this->db->or_like("QteEntree", $_POST["search"]["value"]);
             
         }  
         if(isset($_POST["order"]))  
         {  
              $this->db->order_by($this->order_column6[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
         }  
         else  
         {  
              $this->db->order_by('ide', 'DESC');  
         }  
    }

   function make_datatables_entree(){  
         $this->make_query_entree();  
         if($_POST["length"])  
         {  
              $this->db->limit($_POST['length'], $_POST['start']);  
         }  
         $query = $this->db->get();  
         return $query->result();  
    }

    function get_filtered_data_entree(){  
         $this->make_query_entree();  
         $query = $this->db->get();  
         return $query->num_rows();  
    }       
    function get_all_data_entree()  
    {  
         $this->db->select("*");  
         $this->db->from($this->table6);  
         return $this->db->count_all_results();  
    }

    function insert_entree($data)  
    {  
         $this->db->insert('entree', $data); 
         return $this->db->insert_id(); 
    }

    
    function update_entree($ide, $data)  
    {  
         $this->db->where("ide", $ide);  
         $this->db->update("entree", $data);  
    }


    function delete_entree($ide)  
    {  
         $this->db->where("ide", $ide);  
         $this->db->delete("entree");  
    }

    function fetch_single_entree($ide)  
    {  
         $this->db->where("ide", $ide);  
         $query=$this->db->get('profile_entree_stock');  
         return $query->result();  
    } 

    // fin de entree produit en stock 

    // script pour information sortie du produit en stock
    function count_all_view_sortie()
    {
      $query = $this->db->get("profile_sortie_stock");
      $this->db->limit(30);
      return $query->num_rows();
    }

    
    /*

    LES SCRIPTS POUR LA GESTION D'AFFICHAGE DE PRODUITS COMMENCENTS
    =================================================================
    USER INTERFACE
    *************

    */

     /*
      favorie
     =======================
     */

     // ajouter au favorie
    function insert_to_favories($data)
    {
      $this->db->insert('favories', $data);
    } 

    function verification_favory($id_user, $product_id){
      return $this->db->get_where('favories', array(
        'id_user'     =>  $id_user,
        'product_id'  =>  $product_id  
      ));
    }

    // retourner le nom  
    function get_name_article_tag($product_id){
      $this->db->where("product_id", $product_id);
      $this->db->limit(1);
      $nom = $this->db->get("product")->result_array();
      foreach ($nom as $key) {
        $titre = $key["product_name"];
        return $titre ;
      }

    }

    // retourner les numéros  
    function get_telephone_du_site(){
      $this->db->limit(1);
      $nom = $this->db->get("tbl_info");
      $numeros = '';
      if ($nom->num_rows() > 0) {
        foreach ($nom->result_array() as $key) {
          $numeros = $key["tel1"].' ou '.$key["tel2"];
          
        }
      }
      else{
         $numeros ="+243817883541 ou +243970524665";
      }
      return $numeros ;
      

    }

     // retourner les numéros  
    function get_email_du_site(){
      $this->db->limit(1);
      $nom = $this->db->get("tbl_info");
      $numeros = '';
      if ($nom->num_rows() > 0) {
        foreach ($nom->result_array() as $key) {
          $numeros = $key["email"];
          
        }
      }
      else{
         $numeros ="etsyetu@gmail.com";
      }
      return $numeros ;
      

    }


   



    // ajouter au panier
    function insert_to_cart($data)
    {
      $this->db->insert('cart', $data);
    } 

    // suppression panier
    function suppression_produit_cart($idc){
      $this->db->where("idc", $idc);
      $this->db->delete("cart");
    }
    // insertion padding vente 
    function insert_pading_vente($data){
      $this->db->insert('pading_vente', $data);
    }

    // voir les administrateurs
    function get_admins(){
        $user = $this->db->get_where("users", array(
          'idrole'  =>  1
        ))->result_array();
        return $user;
    }

    // vider panier 
    function vide_suppression_produit_cart($user_id){
      $this->db->where("user_id", $user_id);
      $this->db->delete("cart");
    }
    // solde net à payer
    function calcul_net_apayer($user_id){
        $query = $this->db->query("SELECT SUM(product_priceTotal) AS total_a_payer FROM cart WHERE user_id= '".$user_id."'");
        $montant;
        if ($query->num_rows() > 0) {
          foreach ($query->result_array() as $key) {
            $montant = $key['total_a_payer'];
          }
        }
        else{

          $montant = 0;
        }

        return $montant;

    }


    // solde net à payer
    function padding_vente_calcul_net_apayer($user_id, $code){
        $query = $this->db->query("SELECT SUM(product_priceTotal) AS total_a_payer FROM pading_vente WHERE user_id= '".$user_id."' AND code= '".$code."'");
        $montant;
        if ($query->num_rows() > 0) {
          foreach ($query->result_array() as $key) {
            $montant = $key['total_a_payer'];
          }
        }
        else{

          $montant = 0;
        }

        return $montant;

    }

    // detail des produits 
    function detail_cart($user_id){
      $this->db->order_by("idc","DESC");
      $query = $this->db->get_where("cart",array(
        'user_id' =>  $user_id
      ));
      return $query;
    }

    // detail des produits en attente de vente
    function padding_vente_detail_cart($user_id, $code){
      $this->db->order_by("idv","DESC");
      $query = $this->db->get_where("pading_vente",array(
        'user_id' =>  $user_id,
        'code' =>  $code,

      ));
      return $query;
    }

    // acheteur
    function detail_acheteur($id){
      $this->db->where("id", $id);
      $user = $this->db->get("users")->result_array();
      return $user;
    }




    // pagination product
    function fetch_pagination_product(){
      $this->db->limit(300);
      $query = $this->db->get("product");
      return $query->num_rows();
    }

     // recherche des produits par fultres
    function fetch_data_search_product_to_lean($query)
     {
      $this->db->select("*");
      $this->db->from("product");
      $this->db->limit(12);
      if($query != '')
      {
       $this->db->like('product_id', $query);
       $this->db->or_like('product_name', $query);
       $this->db->or_like('product_price', $query);

      }
      $this->db->order_by('product_name', 'ASC');
      return $this->db->get();
    }

    // pagination de produits
    function fetch_details_pagination_product($limit, $start){
        $output = '';
        $this->db->select("*");
        $this->db->from("product");
        $this->db->order_by("product_name", "ASC");
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        
        foreach($query->result() as $row)
        {

         $output .= '
         
        <div class="col-xl-3 col-lg-4 col-sm-6">
          <div class="product text-center">
            <div class="position-relative mb-3">
              <div class="badge text-white badge-"></div><a class="d-block" href="javascript:void(0);"><img class="img-fluid w-100" src="'.base_url().'upload/product/'.$row->product_image.'" alt="..." style="height: 250px;"></a>
              <div class="product-overlay">
                <ul class="mb-0 list-inline">
                <input type="number" min="1" max="'.$row->Qte.'" name="quantity" class="form-control quantity" id="'.$row->product_id.'" placeholder="Entrez la quantité" /><br />
                  <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-outline-dark add_favory" href="javascript:void(0);" favoryProduct="'.$row->product_id.'"><i class="far fa-heart"></i></a></li> 
                  <li class="list-inline-item m-0 p-0">
                   <a class="btn btn-sm btn-dark add_cart" 
                      data-productname="'.$row->product_name.'" 
                      data-price="'.$row->product_price.'" 
                      data-productid="'.$row->product_id.'" 
                      data-product_image="'.$row->product_image.'" 
                      Qte="'.$row->Qte.'"
                      href="javascript:void(0);">
                    Ajouter au panier
                    </a></li>
                  <li class="list-inline-item mr-0"><a class="btn btn-sm btn-outline-dark modalView" product_id="'.$row->product_id.'"><i class="fas fa-expand"></i></a></li>
                </ul>
              </div>
            </div>
            <h6> <a class="reset-anchor" href="'.base_url().'user/detailProduct/'.$row->product_id.'">'.$row->product_name.'</a></h6>
            <p class="small text-muted">'.$row->product_price.'$</p>
          </div>
        </div>



         ';
        }
        
        return $output;
    }
    // fin pagination

    // pagination de produits
    function fetch_details_pagination_product_shop($limit, $start){
        $output = '';
        $this->db->select("*");
        $this->db->from("product");
        $this->db->order_by("product_name", "ASC");
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        
        foreach($query->result() as $row)
        {

         $output .= '

        <div class="col-lg-4 col-sm-6">
          <div class="product text-center">
            <div class="position-relative mb-3">
              <div class="badge text-white badge-"></div><a class="d-block" href="javascript:void(0);"><img class="img-fluid w-100" src="'.base_url().'upload/product/'.$row->product_image.'" alt="..." style="height: 250px;"></a>
              <div class="product-overlay">
                <ul class="mb-0 list-inline">
                <input type="number" min="1" max="'.$row->Qte.'" name="quantity" class="form-control quantity" id="'.$row->product_id.'" placeholder="Entrez la quantité" /><br />
                  <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-outline-dark add_favory" href="javascript:void(0);" favoryProduct="'.$row->product_id.'"><i class="far fa-heart"></i></a></li> 
                  <li class="list-inline-item m-0 p-0">
                   <a class="btn btn-sm btn-dark add_cart" 
                      data-productname="'.$row->product_name.'" 
                      data-price="'.$row->product_price.'" 
                      data-productid="'.$row->product_id.'" 
                      data-product_image="'.$row->product_image.'" 
                      Qte="'.$row->Qte.'"
                      href="javascript:void(0);">
                    + Au panier
                    </a></li>
                  <li class="list-inline-item mr-0"><a class="btn btn-sm btn-outline-dark modalView" product_id="'.$row->product_id.'"><i class="fas fa-expand"></i></a></li>
                </ul>
              </div>
            </div>
            <h6> <a class="reset-anchor" href="'.base_url().'user/detailProduct/'.$row->product_id.'">'.$row->product_name.'</a></h6>
            <p class="small text-muted">'.$row->product_price.'$</p>
          </div>
        </div>



         ';
        }
        
        return $output;
    }
    // fin pagination

    // recent produits 
    function fetch_details_recent_products($limit, $start){
        $output = '';
        $this->db->select("*");
        $this->db->from("product");
        $this->db->order_by("product_id", "DESC");
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        
        foreach($query->result() as $row)
        {

         $output .= '

        <div class="col-lg-4 col-sm-6">
          <div class="product text-center">
            <div class="position-relative mb-3">
              <div class="badge text-white badge-"></div><a class="d-block" href="javascript:void(0);"><img class="img-fluid w-100" src="'.base_url().'upload/product/'.$row->product_image.'" alt="..." style="height: 250px;"></a>
              <div class="product-overlay">
                <ul class="mb-0 list-inline">
                <input type="number" min="1" max="'.$row->Qte.'" name="quantity" class="form-control quantity" id="'.$row->product_id.'" placeholder="Entrez la quantité" /><br />
                  <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-outline-dark add_favory" href="javascript:void(0);" favoryProduct="'.$row->product_id.'"><i class="far fa-heart"></i></a></li> 
                  <li class="list-inline-item m-0 p-0">
                   <a class="btn btn-sm btn-dark add_cart" 
                      data-productname="'.$row->product_name.'" 
                      data-price="'.$row->product_price.'" 
                      data-productid="'.$row->product_id.'" 
                      data-product_image="'.$row->product_image.'" 
                      Qte="'.$row->Qte.'"
                      href="javascript:void(0);">
                    + Au panier
                    </a></li>
                  <li class="list-inline-item mr-0"><a class="btn btn-sm btn-outline-dark modalView" product_id="'.$row->product_id.'"><i class="fas fa-expand"></i></a></li>
                </ul>
              </div>
            </div>
            <h6> <a class="reset-anchor" href="'.base_url().'user/detailProduct/'.$row->product_id.'">'.$row->product_name.'</a></h6>
            <p class="small text-muted">'.$row->product_price.'$</p>
          </div>
        </div>



         ';
        }
        
        return $output;
    }
    // fin pagination

    // fultre selon la categorie des formations
   function fultrage_fetch_data_search_product_by_product_id($query)
   {
    
    $this->db->limit(24);
    $this->db->order_by('product_name', 'ASC');
    $resultat = $this->db->get_where("product", array(
      'product_id' =>  $query
    ));

    return $resultat;
   
   }

   // fultre selon la categorie des formations
   function fultrage_fetch_data_search_product_by_category_id($query)
   {
    
    $this->db->limit(24);
    $this->db->order_by('product_name', 'ASC');
    $resultat = $this->db->get_where("product", array(
      'category_id' =>  $query
    ));

    return $resultat;
   }

   // fultre selon le prix des formations
   function fultrage_fetch_data_search_product_by_product_price($query)
   {
    
    $this->db->limit(24);
    $this->db->order_by('product_name', 'ASC');
    $resultat = $this->db->get_where("product", array(
      'product_price' =>  $query
    ));

    return $resultat;
   }

   /*

   Gestion de paiement
   =====================================
   =====================================

   */

    function insert_paiement_pading($data){
        $this->db->insert('paiement_pading', $data);
        return $this->db->insert_id();
    }

    function insert_paiement_compte($data){
        $this->db->insert('paiement', $data);
        return $this->db->insert_id();
    }

    function get_name_user($id){
      $this->db->where("id", $id);
      $nom = $this->db->get("users")->result_array();
      foreach ($nom as $key) {
        return $key["first_name"];
      }

    }

    function get_name_formation($idf){
      $this->db->where("idf", $idf);
      $nom = $this->db->get("formations")->result_array();
      foreach ($nom as $key) {
        return $key["nom"];
      }

    }

     // script de contact 
  // contact
  function make_query_contact()  
  {  
      
     $this->db->select($this->select_column12);  
     $this->db->from($this->table12);  
     if(isset($_POST["search"]["value"]))  
     {  
          $this->db->like("sujet", $_POST["search"]["value"]);  
          $this->db->or_like("nom", $_POST["search"]["value"]);  
          $this->db->or_like("email", $_POST["search"]["value"]);  
     }  
     if(isset($_POST["order"]))  
     {  
          $this->db->order_by($this->order_column12[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
     }  
     else  
     {  
          $this->db->order_by('id', 'DESC');  
     }  
  }

  function make_datatables_contact(){  
     $this->make_query_contact();  
     if($_POST["length"] != -1)  
     {  
          $this->db->limit($_POST['length'], $_POST['start']);  
     }  
     $query = $this->db->get();  
     return $query->result();  
  }

  function get_filtered_data_contact(){  
     $this->make_query_contact();  
     $query = $this->db->get();  
     return $query->num_rows();  
  }       
  function get_all_data_contact()  
  {  
     $this->db->select("*");  
     $this->db->from($this->table12);  
     return $this->db->count_all_results();  
  }



  function update_contact($id, $data)  
  {  
     $this->db->where("id", $id);  
     $this->db->update("contact", $data);  
  }


  function delete_contact($id)  
  {  
     $this->db->where("id", $id);  
     $this->db->delete("contact");  
  }

  function fetch_single_contact($id)  
  {  
     $this->db->where("id", $id);  
     $query=$this->db->get('contact');  
     return $query->result();  
  }


  function Select_articles()
  {
      $this->db->order_by('nom','ASC');
      $this->db->limit(50);
      return $this->db->get('profile_article');
  }

  function Select_formations()
  {
      $this->db->order_by('idf','DESC');
      $this->db->limit(20);
      return $this->db->get('formations');
  }

  function Select_category()
  {
      $this->db->order_by('nom','ASC');
      $this->db->limit(50);
      return $this->db->get('category');
  }

   // script pour nos article 
  function make_query_article()  
  {  
      
     $this->db->select($this->select_column15);  
     $this->db->from($this->table15);
     $this->db->limit(10);
     
     if(isset($_POST["search"]["value"]))  
     {  
          $this->db->like("idart", $_POST["search"]["value"]);  
          $this->db->or_like("nom", $_POST["search"]["value"]);
          $this->db->or_like("description", $_POST["search"]["value"]);
          $this->db->or_like("lien", $_POST["search"]["value"]);
          $this->db->or_like("nom_cat", $_POST["search"]["value"]);
          $this->db->or_like("type", $_POST["search"]["value"]);
     }  
     if(isset($_POST["order"]))  
     {  
          $this->db->order_by($this->order_column15[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
     }  
     else  
     {  
          $this->db->order_by('idart', 'DESC');  
     }  
  }

   function make_datatables_article(){  
         $this->make_query_article();  
         if($_POST["length"] != -1)  
         {  
              $this->db->limit($_POST['length'], $_POST['start']);  
         }  
         $query = $this->db->get();  
         return $query->result();  
    }

    function get_filtered_data_article(){  
         $this->make_query_article();  
         $query = $this->db->get();  
         return $query->num_rows();  
    }       
    function get_all_data_article()  
    {  
         $this->db->select("*");  
         $this->db->from($this->table15);  
         return $this->db->count_all_results();  
    }

    function insert_article($data)  
    {  
         $this->db->insert('article', $data);  
    }

    
    function update_article($idart, $data)  
    {  
         $this->db->where("idart", $idart);  
         $this->db->update("article", $data);  
    }


    function delete_article($idart)  
    {  
         $this->db->where("idart", $idart);  
         $this->db->delete("article");  
    }

    function fetch_single_article($idart)  
    {  
         $this->db->where("idart", $idart);  
         $query=$this->db->get('article');  
         return $query->result();  
    } 
    //fin de la article information

    // filtrage avec limit 
    function fetch_details_view_articles_limit($limit)
    {
      $output = '';
       $etat = '';
      $this->db->select("*");
      $this->db->from("profile_article");
      $this->db->order_by("idart", "DESC");
      $this->db->limit($limit);
      $query = $this->db->get();
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
      if ($query->num_rows() < 0) {
        
      }
      else{

        foreach($query->result() as $row)
        {

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
      return $output;
    }

     function fetch_details_view_articles()
    {
      $output = '';
       $etat = '';
      $this->db->select("*");
      $this->db->from("profile_article");
      $this->db->order_by("idart", "DESC");
      $this->db->limit(10);
      $query = $this->db->get();
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
      if ($query->num_rows() < 0) {
        
      }
      else{

        foreach($query->result() as $row)
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
      return $output;
    }

    function fetch_data_search_view_article($query)
    {
        $this->db->select("*");
        $this->db->from("profile_article");
        $this->db->limit(10);
        if($query != '')
        {
         $this->db->like('idart', $query);
         $this->db->or_like('nom', $query);
         $this->db->or_like('description', $query);
         $this->db->or_like('type', $query);
         $this->db->or_like('nom_cat', $query);
        }
        $this->db->order_by('idart', 'DESC');
        return $this->db->get();
    }

    function Select_artcle_orders()
    {
        $this->db->order_by('created_at','DESC');
        $this->db->limit(15);
        return $this->db->get('article');
    }

    // operation commentaire

    function insert_commentaire($data)  
    {  
         $this->db->insert('commentaire', $data);  
    }

    
    function update_commentaire($idcomment, $data)  
    {  
         $this->db->where("idcomment", $idcomment);  
         $this->db->update("commentaire", $data);  
    }


    function delete_commentaire($idcomment)  
    {  
         $this->db->where("idcomment", $idcomment);  
         $this->db->delete("commentaire");  
    }

    function fetch_single_commentaire($idcomment)  
    {  
         $this->db->where("idcomment", $idcomment);  
         $query=$this->db->get('profile_commentaire');  
         return $query->result();  
    } 


    function fetch_details_view_commentaire()
    {
      $output = '';
       $etat = '';
      $this->db->select("*");
      $this->db->from("profile_commentaire");
      $this->db->order_by("idcomment", "DESC");
      $this->db->limit(10);
      $query = $this->db->get();
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
      if ($query->num_rows() < 0) {
        
      }
      else{

        foreach($query->result() as $row)
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
      return $output;
    }

    // filtrage avec limit 
    function fetch_details_view_commentaire_limit($limit)
    {
      $output = '';
       $etat = '';
      $this->db->select("*");
      $this->db->from("profile_commentaire");
      $this->db->order_by("idcomment", "DESC");
      $this->db->limit($limit);
      $query = $this->db->get();
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
      if ($query->num_rows() < 0) {
        
      }
      else{

        foreach($query->result() as $row)
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
      return $output;
    }

    function fetch_data_search_view_commentaire($query)
    {
        $this->db->select("*");
        $this->db->from("profile_commentaire");
        $this->db->limit(10);
        if($query != '')
        {
         $this->db->like('idart', $query);
         $this->db->or_like('nom', $query);
         $this->db->or_like('description', $query);
         $this->db->or_like('type', $query);
         $this->db->or_like('nomcat', $query);
        }
        $this->db->order_by('idcomment', 'DESC');
        return $this->db->get();
    }

     /*
    ===============================
    ===============================
    * operation formations
    *operation fin
    */

    function insert_formations($data)  
    {  
         $this->db->insert('formations', $data);  
    }

    function update_formations($idf, $data)  
    {  
         $this->db->where("idf", $idf);  
         $this->db->update("formations", $data);  
    }


    function delete_formations($idf)  
    {  
         $this->db->where("idf", $idf);  
         $this->db->delete("formations");  
    }

    function fetch_single_formations($idf)  
    {  
         $this->db->where("idf", $idf);  
         $query=$this->db->get('formations');  
         return $query->result();  
    } 

    function fetch_data_search_view_formations($query)
    {
        $this->db->select("*");
        $this->db->from("formations");
        $this->db->limit(10);
        if($query != '')
        {
         $this->db->like('idf', $query);
         $this->db->or_like('nom', $query);
         $this->db->or_like('date_debit', $query);
         $this->db->or_like('date_fin', $query);
         $this->db->or_like('fin_inscription', $query);
         $this->db->or_like('description', $query);
         $this->db->or_like('created_at', $query);
        
        }
        $this->db->order_by('idf', 'DESC');
        return $this->db->get();
    }


    function fetch_details_view_formations()
    {
      $output = '';
      $etat = '';
      $this->db->select("*");
      $this->db->from("formations");
      $this->db->order_by("idf", "DESC");
      $this->db->limit(10);
      $query = $this->db->get();
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
      if ($query->num_rows() < 0) {
        
      }
      else{

        foreach($query->result() as $row)
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
      return $output;
    }

    // filtrage avec limit 
    function fetch_details_view_formations_limit($limit)
    {
      $output = '';
       $etat = '';
      $this->db->select("*");
      $this->db->from("formations");
      $this->db->order_by("idf", "DESC");
      $this->db->limit($limit);
      $query = $this->db->get();
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
      if ($query->num_rows() < 0) {
        
      }
      else{

        foreach($query->result() as $row)
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
      return $output;
    }

    // information formations du site
    function Select_info_formations()
    {
        return $this->db->query('SELECT * FROM formations  LIMIT 6');
    }
    // fin formations


     /*
    ===============================
    ===============================
    * inscription_formations 
    *operation fin
    */

    function insert_inscription_formations($data)  
    {  
         $this->db->insert('inscription_formations', $data); 
         return $this->db->insert_id(); 
    }

     function insert_remise($data)  
    {  
         $this->db->insert('remise', $data); 
         return $this->db->insert_id(); 
    }


    function update_inscription_formations($idinscription, $data)  
    {  
         $this->db->where("idinscription", $idinscription);  
         $this->db->update("inscription_formations", $data);  
    }


    function delete_inscription_formations($idinscription)  
    {  
         $this->db->where("idinscription", $idinscription);  
         $this->db->delete("inscription_formations");  
    }

    function fetch_single_inscription_formations($idinscription)  
    {  
         $this->db->where("idinscription", $idinscription);  
         $query=$this->db->get('profile_inscription');  
         return $query->result();  
    } 

    function fetch_single_test_inscription_formations($idf,$email,$annee)  
    {  
         $query=$this->db->get_where('profile_inscription',
            array(
              'idf'     =>    $idf,
              'email'   =>    $email,
              'annee'   =>    $annee
            )
         );  
         return $query->num_rows();  
    } 

    function fetch_single_test_inscription_confirmation($idf,$id_user)  
    {  
         $query=$this->db->get_where('profile_format',
            array(
              'idf'       =>    $idf,
              'id_user'   =>    $id_user
            )
         );  
         return $query->num_rows();  
    } 

    function fetch_single_test_inscription_coach($idf,$id_user)  
    {  
         $query=$this->db->get_where('coach',
            array(
              'idf'       =>    $idf,
              'id_user'   =>    $id_user
            )
         );  
         return $query->num_rows();  
    } 
    function fetch_single_test_cours($idf,$nomcours)  
    {  
         $query=$this->db->get_where('cours',
            array(
              'idf'       =>    $idf,
              'nomcours'   =>    $nomcours
            )
         );  
         return $query->num_rows();  
    } 

    function fetch_single_test_lesson($idcours,$nomlesson)  
    {  
         $query=$this->db->get_where('lesson',
            array(
              'idcours'       =>    $idcours,
              'nomlesson'     =>    $nomlesson
            )
         );  
         return $query->num_rows();  
    } 

    function fetch_single_test_travail($idlesson,$nomtravail)  
    {  
         $query=$this->db->get_where('travail',
            array(
              'idlesson'       =>    $idlesson,
              'nomtravail'     =>    $nomtravail
            )
         );  
         return $query->num_rows();  
    } 

     function fetch_single_test_inscription_formations_home($idf,$email)  
    {  
         $query=$this->db->get_where('profile_inscription',
            array(
              'idf'     =>    $idf,
              'email'   =>    $email
            )
         );  
         return $query->num_rows();  
    }

    function fetch_single_inscription_remise($id_apprenant,$idtravail)  
    {  
         $query=$this->db->get_where('remise',
            array(
              'id_apprenant'      =>    $id_apprenant,
              'idtravail'         =>    $idtravail
            )
         );  
         return $query->num_rows();  
    } 

    function nomre_de_lesson($idcours)  
    {  
         $query=$this->db->query("SELECT * FROM profile_lesson WHERE idcours=".$idcours." ");  
         return $query->num_rows();  
    } 

    function nomre_de_travail($idlesson)  
    {  
         $query=$this->db->query("SELECT * FROM profile_travail WHERE idlesson=".$idlesson." ");  
         return $query->num_rows();  
    } 

    function fetch_data_search_view_inscription_formations($query)
    {
        $this->db->select("*");
        $this->db->from("profile_inscription");
        $this->db->limit(10);
        if($query != '')
        {
         $this->db->like('idinscription', $query);
         $this->db->or_like('nom', $query);
         $this->db->or_like('nomcomplet', $query);
         $this->db->or_like('date_debit', $query);
         $this->db->or_like('date_fin', $query);
         $this->db->or_like('created_at', $query);
         $this->db->or_like('annee', $query);
        
        }
        $this->db->order_by('idinscription', 'DESC');
        return $this->db->get();
    }


    function fetch_details_view_inscription_formations()
    {
      $output = '';
      $etat = '';
      $this->db->select("*");
      $this->db->from("profile_inscription");
      $this->db->order_by("idinscription", "DESC");
      $this->db->limit(10);
      $query = $this->db->get();
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
      if ($query->num_rows() < 0) {
        
      }
      else{

        foreach($query->result() as $row)
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
      return $output;
    }

    // filtrage avec limit 
    function fetch_details_view_inscription_formations_limit($limit)
    {
      $output = '';
       $etat = '';
      $this->db->select("*");
      $this->db->from("profile_inscription");
      $this->db->order_by("idinscription", "DESC");
      $this->db->limit($limit);
      $query = $this->db->get();
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
      if ($query->num_rows() < 0) {
        
      }
      else{

        foreach($query->result() as $row)
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
      return $output;
    }


    // impression de resultat de formations 
    // filtrage avec limit 
    function fetch_details_view_inscription_pdf($idf, $annee)
    {
      $output = '';
      $etat = '';
      $query = $this->db->get_where("profile_inscription", array(
        'idf'     =>  $idf,
        'annee'   =>  $annee
      ));

      $output .= '<link href="' . base_url() . 'js/css/style.css" rel="stylesheet">';
      $output .= '

      <div class="col-md-12 mt-2 mb-2" >
         
      </div>

      <div class="col-md-12 mt-2 mb-2">
        <a class="btn btn-outline-warning pull-right mb-2" href="'.base_url().'admin/printFormation/'.$idf.'/'.$annee.'"><i class="fa fa-print mr-1"></i> Imprimmer la liste</a>
      </div>

      <table class="table-warning table-striped nk-tb-list nk-tb-ulist dataTable no-footer" data-auto-responsive="false" id="user_data" role="grid" aria-describedby="DataTables_Table_1_info">
          <thead class="tb-member-head thead-light">  
              <tr> 
                  <th width="10%">Avatar</th> 
                  <th width="10%">Titre </th>

                  <th width="20%">Date debit </th>
                  <th width="20%">Date fin </th>
                  <th width="10%">Apprenant Nom complet</th>

                  <th width="20%">Mise à jour</th>

                  <th width="5%">Niveau d\'étude</th> 
                  <th width="5%">Téléphone</th>  
              </tr>  
         </thead> 

         <tbody id="example-tbody">
      ';
      if ($query->num_rows() < 0) {
        
      }
      else{

        foreach($query->result() as $row)
        {

            


         $output .= '
         <tr>
          
          <td>
           <input type="checkbox" name="tel" value="'.$row->telephone.'" class="tels delete_checkbox">
          <img src="'.base_url().'upload/formations/'.$row->image.'" class="img img-responsive img-thumbnail" width="50" height="35" style="border-radius:50%;" /></td>

          <td>'.nl2br(substr($row->nom, 0,30)).' ....'.'</td>
          <td>'.nl2br(substr(date(DATE_RFC822, strtotime($row->date_debit)), 0, 23)).'</td>
          <td>'.nl2br(substr(date(DATE_RFC822, strtotime($row->date_fin)), 0, 23)).'</td>
          <td>'.nl2br(substr($row->nomcomplet, 0,15)).' ....'.'</td>
          <td>'.nl2br(substr(date(DATE_RFC822, strtotime($row->created_at)), 0, 23)).'</td>

          <td>'.nl2br(substr($row->niveau_etude, 0,30)).' ....'.'</td>
          <td>'.nl2br(substr($row->telephone, 0,15)).'</td>
         

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

                  <th width="5%">Niveau d\'étude</th> 
                  <th width="5%">Téléphone</th>  

              </tr>  
         </tfoot>   
          
      </table>';
      return $output;
    }

     // filtrage avec limit 
    function fetch_details_view_formation_pdf($idf, $annee)
    {
      $output = '';
      $etat = '';
      $nom_formation ='';
      $query = $this->db->get_where("profile_inscription", array(
        'idf'     =>  $idf,
        'annee'   =>  $annee
      ));

      foreach($query->result() as $row)
      {
        $nom_formation = $row->nom;
      }

        $icone    = '';
        $email    = '';

        $info = $this->db->get('tbl_info')->result_array();
        foreach ($info as $key) {
          $nom_site = $key['nom_site'];
          $icone    = $key['icone'];
          $email    = $key['email'];
          
        }



       $message = "REPUBLIQUE DEMOCRATIQUE DU CONGO <br/>
         <h5>
            Liste des apprenants iscrits à la formation ".$nom_formation."
         <h5>
        ";

         $img =  base_url().'upload/tbl_info/'.$icone;

         $output = '<div align="right">';
         $output .= '<table width="100%" cellspacing="5" cellpadding="5" id="user_data" >';
         $output .= '
         <tr>
          <td width="25%"><img src="'.base_url().'upload/tbl_info/'.$icone.'" width="150" height="100"/></td>
          <td width="50%" align="center">
           <p><b>'.$message.' </b></p>
           <p><b>Mise à jour : </b>'.date('d/m/Y').'</p>

           <!--<a href="'.base_url().'upload/tbl_info/'.$icone.'" class="btn btn-primary"> voir l\'image</a>-->

           <hr>
           
          </td>

          <td width="25%">
          <img src="'.base_url().'upload/tbl_info/'.$icone.'" width="150" height="100" />
          </td>


         </tr>
         ';
      
        $output .= '</table>';

         $output .= '</div>';

      $output .= '<link href="' . base_url() . 'js/css/sb-admin-2.min.css" rel="stylesheet">';
      $output .= '

      <style>
          body { margin:0;padding:0; }
          @media only screen and (max-width: 480px) {
              /* horizontal scrollbar for tables if mobile screen */
              .tablemobile {
                  overflow-x: auto;
                  display: block;
              }
          }
      </style>

      <table class="table-striped nk-tb-list nk-tb-ulist dataTable no-footer tablemobile" data-auto-responsive="false" id="user_data" role="grid" aria-describedby="DataTables_Table_1_info">
          <thead class="tb-member-head thead-light">  
              <tr> 
                  <th width="15%">Nom</th> 
                  <th width="10%">Titre </th>

                  <th width="15%">Date debit </th>
                  <th width="15%">Date fin </th>
                  
                  <th width="15%">Mise à jour</th>

                  <th width="5%">Niveau d\'étude</th> 
                  <th width="5%">Téléphone</th> 
                  
              </tr>  
         </thead> 

         <tbody>
      ';
      if ($query->num_rows() < 0) {
        
      }
      else{

        foreach($query->result() as $row)
        {

            


         $output .= '
         <tr>
          
          <td>'.nl2br(substr($row->nomcomplet, 0,15)).'</td>

          <td>'.nl2br(substr($row->nom, 0,30)).' ....'.'</td>
          <td>'.nl2br(substr(date(DATE_RFC822, strtotime($row->date_debit)), 0, 23)).'</td>
          <td>'.nl2br(substr(date(DATE_RFC822, strtotime($row->date_fin)), 0, 23)).'</td>
          
          <td>'.nl2br(substr(date(DATE_RFC822, strtotime($row->created_at)), 0, 23)).'</td>

          <td>'.nl2br(substr($row->niveau_etude, 0,30)).' ....'.'</td>
          <td>'.nl2br(substr($row->telephone, 0,15)).'</td>
         

         </tr>
         ';
        }
      }
      $output .= '
          </tbody>

         <tfoot>  
              <tr>  
                  <th width="15%">Nom</th> 
                  <th width="10%">Titre </th>

                  <th width="15%">Date debit </th>
                  <th width="15%">Date fin </th>
                  
                  <th width="15%">Mise à jour</th>

                  <th width="5%">Niveau d\'étude</th> 
                  <th width="5%">Téléphone</th> 
                  
              </tr>  
         </tfoot>   
          
      </table>';
      return $output;
    }


    // information inscription_formations du site
    function Select_info_inscription_formations()
    {
        return $this->db->query('SELECT * FROM inscription_formations  LIMIT 6');
    }
    // fin inscription_formations

    function Select_formations_ok($column, $table)
    {
        $this->db->group_by($column);
        $this->db->limit(1000);
        return $this->db->get($table);
    }

    function Select_formateur_ok($column, $table)
    {
        $this->db->group_by($column);
        $this->db->limit(1000);
        return $this->db->get($table);
    }

    function Select_table_by($column, $table)
    {
        $this->db->group_by($column);
        $this->db->limit(1000);
        return $this->db->get($table);
    }

    function Select_table_by_coach($column, $table, $id_user)
    {
        $this->db->group_by($column);
        $this->db->where("id_user", $id_user);
        $this->db->limit(1000);
        return $this->db->get($table);
    }

    // appel de startups
    function fetch_membre_apprenant_inscrit()
    {
        $this->db->order_by('first_name','ASC');
        return $this->db->get_where('users', array(
          'idrole'    =>  2
        ));
    }

    // appel de formateurs
    function fetch_membre_formateur_inscrit()
    {
        $this->db->order_by('first_name','ASC');
        return $this->db->get_where('users', array(
          'idrole'    =>  4
        ));
    }

     // appel de dates 
    function fetch_categores_dates_compt()
    {
        $this->db->group_by('date_paie');
        $this->db->order_by('date_paie','DESC');
        return $this->db->get('paiement');
    }

    // script pour information  des paiements 
    function count_all_view_paiement()
    {

      $this->db->group_by("token");
      $this->db->limit(30);
      $query = $this->db->get("profile_paiement");
      return $query->num_rows();
    }

    // script pour le paiement normal

    function fetch_details_view_paiement($limit, $start)
    {
      $output = '';
      $this->db->select("*");
      $this->db->from("profile_paiement");
      // $this->db->group_by("token");
      $this->db->order_by("idp","DESC");
      $this->db->limit($limit, $start);
      $query = $this->db->get();
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
      if ($query->num_rows() < 0) {
        
      }
      else{
        $mobile = '';
        $etat_paiement ='';

        foreach($query->result() as $row)
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
      return $output;
    }

    // pour le paiement 
    function fetch_data_search_paiement($query)
    {
        $this->db->select("*");
        $this->db->from("profile_paiement");
        $this->db->group_by("token");

        $this->db->limit(10);
        if($query != '')
        {
         $this->db->like('token', $query);
         $this->db->or_like('first_name', $query);
         $this->db->or_like('last_name', $query);
         $this->db->or_like('telephone', $query);
        }
        return $this->db->get();
    }


    function fetch_single_personne_user($id)  
    {  
         $this->db->where("id", $id);  
         $query=$this->db->get('users');  
         return $query->result();  
    }

    function insert_paiement($data)  
    {  
         $this->db->insert('paiement', $data);  
    }

    function get_stat_paie(){
          $chart_data = '';
          $montant;
          $nom = $this->db->query("SELECT SUM(montant) AS montant,date_paie FROM profile_paiement WHERE etat_paiement=1 GROUP BY date_paie")->result_array();
          foreach ($nom as $key) {

            $sexe = "jour:".nl2br(substr(date(DATE_RFC822, strtotime($key["date_paie"])), 0, 23));
            $montant = $key["montant"];
            $chart_data .= "{ indexLabel:'".$sexe."', y:".$montant."}, ";
            
          }

          return $chart_data;

    }

      function get_info_paiement_transaction($idp){
          $nom = $this->db->get_where("paiement", array(
            'idp' =>  $idp
          ))->result_array();
          return $nom;
      }

      // suppression paiement normal
      function delete_paiement_normal($idp)  
      {  
         $this->db->where("idp", $idp);  
         $this->db->delete("paiement");  
      }

      function update_paiement_etat($codeFacture, $data)  
      {  
         $this->db->where("codeFacture", $codeFacture);  
         $this->db->update("paiement", $data);  
      }

      // impression paiement de galerie
      function fetch_single_details_facture($codeFacture)
      {

          $this->db->where('codeFacture', $codeFacture);
          $data = $this->db->get('profile_paiement');

          $nom_site = '';
          $icone    = '';
          $email    = '';

          $info = $this->db->get('tbl_info')->result_array();
          foreach ($info as $key) {
            $nom_site = $key['nom_site'];
            $icone    = $key['icone'];
            $email    = $key['email'];
            
          }

          $output = '';
          $nomf;
          $created_at;
          $nom;
          $icone;

           

           $message = "REPUBLIQUE DEMOCRATIQUE DU CONGO <br/>
           <h6>
              RECU DE PAIEMENT  AU SYSTEME ".$nom_site."
           </h6>
           ";

           $output .= '<link href="' . base_url() . 'js/css/sb-admin-2.min.css" rel="stylesheet">';

           $output = '<div align="right">';
           $output .= '<table  width="100%" cellspacing="5" cellpadding="5" id="user_data" >';
           $output .= '
           <tr>
            <td width="25%"><img src="'.base_url().'upload/tbl_info/'.$icone.'" width="150" height="100"/></td>
            <td width="50%" align="center">
             <p><b>'.$message.' </b></p>
             <p><b>Mise à jour : </b>'.date('d/m/Y').'</p>

             <hr>
             
            </td>

            <td width="25%">
            <img src="'.base_url().'upload/tbl_info/'.$icone.'" width="150" height="100" />
            </td>


           </tr>
           ';
        
          $output .= '</table>';

           $output .= '</div>';

           $output .= '
              <div class="table-responsive">
               
               <br />
               <table class="table table-bordered panier_table" width="100%" cellspacing="5" cellpadding="5"  id="user_data" border="0">
                <tr>
                 <th width="5%">Avatar</th>
                 <th width="30%">Nom de l\'apprenant</th>
                 <th width="5%">téléphone</th>

                 <th width="15%">Montant</th>
                 <th width="25%">motif</th>

                 <th width="20%">Date</th>
                 
                </tr>

            ';

              foreach($data->result_array() as $items)
              {

                $idpersonne   = $items["idpersonne"];
                $montantT;
                $montantRestant;

                $montant_a_payer = 30;


                $data_paie = $this->db->query("SELECT SUM(montant) AS montant FROM paiement WHERE idpersonne=".$idpersonne." ");
                if ($data_paie->num_rows() > 0) {
                  # code...
                  foreach($data_paie->result_array() as $items2)
                    {
                      $montantT =  $items2["montant"];
                    }
                }
                else{
                  $montantT = 0;
                }

                // $montantRestant =  $montant_a_payer - $montantT;
                $retour = "javascript:history.go(-1);";



                $nom_complet = $items["first_name"].' '.$items["last_name"];
                 $output .= '
                 <tr>
                  <td width="20%" align="center">
                 
                  <img src="'.base_url().'upload/photo/'.$items["image"].'" style="height: 40px; width: 50px; border-radius: 50%;"/>
                  </td> 
                  <td align="center">
                  '.$nom_complet.'
                  
                  </td>
                  <td>'.$items["telephone"].'</td>
                  <td>'.$items["montant"].'$</td>
                  <td>'.$items["motif"].'</td>

                  <td width="15%">'.nl2br(substr(date(DATE_RFC822, strtotime($items["created_at"])), 0, 23)).'</td>


                 </tr>
                 ';

                 $output .= '
                 <tr>
                  <td colspan="5">
                    <div align="right">Total montant payé</div>
                  </td> 
                  <td >'.$montantT.'$</td>
                  
                 </tr>
                 ';

                 
              }
              $output .= '
               
          </table>

          </div>

         
      
          <div align="right" style="margin-botton:20px;">

              <a href="'.base_url().'admin/paiement_normale" style="text-decoration: none; color: black;">signature:</a>
        
          </div>
         
          ';


        
          return $output;
      }

      // pour le paiement 
      function fetch_data_paiement_date($jour1, $jour2)
      {
          $query = $this->db->query("SELECT * FROM profile_paiement WHERE date_paie BETWEEN '".$jour1."' AND '".$jour2."' ");
          return $query;
      }

      // pour la somme du paiement 
      function fetch_sum_data_paiement_date($jour1, $jour2)
      {
          $montant;
          $query = $this->db->query("SELECT SUM(montant) AS montant FROM profile_paiement WHERE date_paie BETWEEN '".$jour1."' AND '".$jour2."' AND etat_paiement=1 ");
          if ($query->num_rows() > 0) {
            # code...

            foreach ($query->result_array() as $key) {
              # code...
              $montant = $key['montant'];
            }
          }
          else{
            $montant = 0;
          }

          return $montant;
      }

      // pour le paiement 
      function fetch_data_limit_paiement($query)
      {
          $this->db->select("*");
          $this->db->from("profile_paiement");
         
          if($query != '')
          {
            $this->db->limit($query);
          }
          return $this->db->get();
      }

      // impression paiement de galerie
    function fetch_single_details_listePaiement($jour1,$jour2)
    {

       $data = $this->db->query("SELECT * FROM profile_paiement WHERE date_paie BETWEEN '".$jour1."' AND '".$jour2."' AND etat_paiement=1");

        $montantT = $this->fetch_sum_data_paiement_date($jour1, $jour2);
       

        $nom_site = '';
        $icone    = '';
        $email    = '';
        $retour = "javascript:history.go(-1);";

        $info = $this->db->get('tbl_info')->result_array();
        foreach ($info as $key) {
          $nom_site = $key['nom_site'];
          $icone    = $key['icone'];
          $email    = $key['email'];
          
        }

        $output = '';
        $nomf;
        $created_at;
        $nom;
        $icone;

         

         $message = "REPUBLIQUE DEMOCRATIQUE DU CONGO <br/>
         <h3>
            LISTE DE PAIEMENT DU  ".nl2br(substr(date(DATE_RFC822, strtotime($jour1)), 0, 23))." AU 
            ".nl2br(substr(date(DATE_RFC822, strtotime($jour2)), 0, 23))." AU SYSTEME ".$nom_site."
         <h3>
         ";



         $output = '<div align="right">';
         $output .= '<link href="' . base_url() . 'js/css/style.css" rel="stylesheet">';
         $output .= '<table width="100%" cellspacing="5" cellpadding="5" id="user_data" >';
         $output .= '
         <tr>
          <td width="25%"><img src="'.base_url().'upload/tbl_info/'.$icone.'" width="150" height="100"/></td>
          <td width="50%" align="center">
           <p><b>'.$message.' </b></p>
           <p><b>Mise à jour : </b>'.date('d/m/Y').'</p>

           <hr>
           
          </td>

          <td width="25%">
          <img src="'.base_url().'upload/tbl_info/'.$icone.'" width="150" height="100" />
          </td>


         </tr>
         ';
      
        $output .= '</table>';

        $output .= '</div>';

        $output .= '
            <div class="table-responsive">
             
             <br />
             <table class="table table-hover table-striped table-bordered panier_table"  border="1">
              <tr>
               <th width="5%">Avatar</th>
               <th width="30%">Nom complet</th>
               <th width="5%">téléphone</th>

               <th width="15%">Montant</th>
               <th width="25%">motif</th>

               <th width="20%">Date</th>
               
              </tr>

          ';

            foreach($data->result_array() as $items)
            {

              $idpersonne   = $items["idpersonne"];
              $montantT;
              $montantRestant;

              $montant_a_payer = 30;


              $nom_complet = $items["first_name"].' '.$items["last_name"];
               $output .= '
               <tr>
                <td width="20%" align="center">
               
                <img src="'.base_url().'upload/photo/'.$items["image"].'" style="height: 40px; width: 50px; border-radius: 50%;"/>
               </td> 
                <td align="center">
                '.$nom_complet.'
              
                </td>
                <td>'.$items["telephone"].'</td>
                <td>'.$items["montant"].'$</td>
                <td>'.$items["motif"].'</td>

                <td width="15%">'.nl2br(substr(date(DATE_RFC822, strtotime($items["created_at"])), 0, 23)).'</td>


               </tr>
               ';

            }

            $output .= '
             <tr>
              <td colspan="5">
                <div align="right">Total montant payé</div>
              </td> 
              <td >'.$montantT.'$</td>
              
             </tr>
           ';

            $output .= '
             
        </table>

        </div>

        <hr>
    
        <div align="right" style="margin-botton:20px;">

            <a href="'.$retour.'" style="text-decoration: none; color: black;">signature:</a>
      
        </div>
        <div align="center" style="

         background-image: url('.base_url().'upload/tbl_info/'.$icone.'); background-repeat: no-repeat; background-size: 40%; background-position: center; height:100px;">
        </div>
        
        ';

        return $output;
    }


     /*
    ===============================
    ===============================
    * confirmation operation formations
    *operation fin
    */

    function insert_formations_conf($data)  
    {  
         $this->db->insert('format', $data);
         return $this->db->insert_id();  
    }

    function update_formations_conf($idformat, $data)  
    {  
         $this->db->where("idformat", $idformat);  
         $this->db->update("format", $data);  
    }


    function delete_formations_conf($idformat)  
    {  
         $this->db->where("idformat", $idformat);  
         $this->db->delete("format");  
    }

    function fetch_single_formations_conf($idformat)  
    {  
         $this->db->where("idformat", $idformat);  
         $query=$this->db->get('profile_format');  
         return $query->result();  
    } 

    function fetch_data_search_view_formations_conf($query)
    {
        $this->db->select("*");
        $this->db->from("profile_format");
        $this->db->limit(10);
        if($query != '')
        {
         $this->db->like('idf', $query);
         $this->db->or_like('nom', $query);
         $this->db->or_like('date_debit', $query);
         $this->db->or_like('date_fin', $query);
         $this->db->or_like('fin_inscription', $query);
         $this->db->or_like('description', $query);
         $this->db->or_like('created_at', $query);
         $this->db->or_like('first_name', $query);
         $this->db->or_like('last_name', $query);
        
        }
        $this->db->order_by('idformat', 'DESC');
        return $this->db->get();
    }


    function fetch_details_view_formations_conf()
    {
      $output = '';
      $etat = '';
      $this->db->select("*");
      $this->db->from("profile_format");
      $this->db->order_by("idformat", "DESC");
      $this->db->limit(10);
      $query = $this->db->get();
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
      if ($query->num_rows() < 0) {
        
      }
      else{

        foreach($query->result() as $row)
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
      return $output;
    }

    // filtrage avec limit 
    function fetch_details_view_formations_limit_conf($limit)
    {
      $output = '';
       $etat = '';
      $this->db->select("*");
      $this->db->from("profile_format");
      $this->db->order_by("idformat", "DESC");
      $this->db->limit($limit);
      $query = $this->db->get();
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
      if ($query->num_rows() < 0) {
        
      }
      else{

        foreach($query->result() as $row)
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
      return $output;
    }

    // information formations du site
    function Select_info_formations_conf()
    {
        return $this->db->query('SELECT * FROM profile_format  LIMIT 6');
    }
    // fin formations

     /*
    ===============================
    ===============================
    * coach operation formations
    *operation fin
    */

    function insert_coach($data)  
    {  
         $this->db->insert('coach', $data);
         return $this->db->insert_id();  
    }

    function update_coach($idcoach, $data)  
    {  
         $this->db->where("idcoach", $idcoach);  
         $this->db->update("coach", $data);  
    }


    function delete_coach($idcoach)  
    {  
         $this->db->where("idcoach", $idcoach);  
         $this->db->delete("coach");  
    }

    function fetch_single_coach($idcoach)  
    {  
         $this->db->where("idcoach", $idcoach);  
         $query=$this->db->get('profile_coach');  
         return $query->result();  
    } 

    function fetch_data_search_view_coach($query)
    {
        $this->db->select("*");
        $this->db->from("profile_coach");
        $this->db->limit(10);
        if($query != '')
        {
         $this->db->like('idf', $query);
         $this->db->or_like('nom', $query);
         $this->db->or_like('date_debit', $query);
         $this->db->or_like('date_fin', $query);
         
         $this->db->or_like('first_name', $query);
         $this->db->or_like('last_name', $query);
        
        }
        $this->db->order_by('idcoach', 'DESC');
        return $this->db->get();
    }

    function fetch_data_search_mes_formation($query, $id_user)
    {
        $this->db->select("*");
        $this->db->from("profile_coach");
        $this->db->limit(10);
        if($query != '')
        {
         $this->db->like('idf', $query);
         $this->db->or_like('nom', $query);
         $this->db->or_like('date_debit', $query);
         $this->db->or_like('date_fin', $query);
         
         $this->db->or_like('first_name', $query);
         $this->db->or_like('last_name', $query);
         $this->db->where('id_user', $id_user);
        
        }
        $this->db->order_by('idcoach', 'DESC');
        return $this->db->get();
    }


    function fetch_details_view_coach()
    {
      $output = '';
      $etat = '';
      $this->db->select("*");
      $this->db->from("profile_coach");
      $this->db->order_by("idcoach", "DESC");
      $this->db->limit(10);
      $query = $this->db->get();
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
      if ($query->num_rows() < 0) {
        
      }
      else{

        foreach($query->result() as $row)
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
      return $output;
    }

    // filtrage avec limit 
    function fetch_details_view_coach_limit($limit)
    {
      $output = '';
       $etat = '';
      $this->db->select("*");
      $this->db->from("profile_coach");
      $this->db->order_by("idcoach", "DESC");
      $this->db->limit($limit);
      $query = $this->db->get();
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
      if ($query->num_rows() < 0) {
        
      }
      else{

        foreach($query->result() as $row)
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
      return $output;
    }


     // impression de resultat de formations 
    // filtrage avec limit 
    function fetch_details_view_formateur_pdf($idf, $edition)
    {
      $output = '';
      $etat = '';
      $query = $this->db->get_where("profile_coach", array(
        'idf'     =>  $idf,
        'edition'   =>  $edition
      ));

      $output .= '<link href="' . base_url() . 'js/css/style.css" rel="stylesheet">';
      $output .= '

      <div class="col-md-12 mt-2 mb-2" >
         
      </div>

      <div class="col-md-12 mt-2 mb-2">
        <a class="btn btn-outline-warning pull-right mb-2" href="'.base_url().'admin/printFormateur/'.$idf.'/'.$edition.'"><i class="fa fa-print mr-1"></i> Imprimmer la liste</a>
      </div>

      <table class="table-warning table-striped nk-tb-list nk-tb-ulist dataTable no-footer" data-auto-responsive="false" id="user_data" role="grid" aria-describedby="DataTables_Table_1_info">
          <thead class="tb-member-head thead-light">  
              <tr> 
                  <th width="10%">Avatar</th> 
                  <th width="10%">Titre </th>

                  <th width="20%">Date debit </th>
                  <th width="20%">Date fin </th>
                  <th width="10%">Formateur Nom complet</th>

                  <th width="20%">Mise à jour</th>

                  
                  <th width="5%">Téléphone</th>  
              </tr>  
         </thead> 

         <tbody id="example-tbody">
      ';
      if ($query->num_rows() < 0) {
        
      }
      else{

        foreach($query->result() as $row)
        {

            


         $output .= '
         <tr>
          
          <td>
           <input type="checkbox" name="tel" value="'.$row->telephone.'" class="tels delete_checkbox">
          <img src="'.base_url().'upload/photo/'.$row->image.'" class="img img-responsive img-thumbnail" width="50" height="35" style="border-radius:50%;" /></td>

          <td>'.nl2br(substr($row->nom, 0,30)).' ....'.'</td>
          <td>'.nl2br(substr(date(DATE_RFC822, strtotime($row->date_debit)), 0, 23)).'</td>
          <td>'.nl2br(substr(date(DATE_RFC822, strtotime($row->date_fin)), 0, 23)).'</td>
          <td>'.nl2br(substr($row->first_name.' '.$row->last_name, 0,30)).' ....'.'</td>
          <td>'.nl2br(substr(date(DATE_RFC822, strtotime($row->created_at)), 0, 23)).'</td>

         
          <td>'.nl2br(substr($row->telephone, 0,15)).'</td>
         

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
                  <th width="10%">Formateur Nom complet</th>

                  <th width="20%">Mise à jour</th>

                
                  <th width="5%">Téléphone</th>  

              </tr>  
         </tfoot>   
          
      </table>';
      return $output;
    }

    // filtrage avec limit 
    function pdffetch_details_view_formateur($idf, $edition)
    {
      $output = '';
      $etat = '';
      $nom_formation ='';
      $query = $this->db->get_where("profile_coach", array(
        'idf'       =>  $idf,
        'edition'   =>  $edition
      ));

      foreach($query->result() as $row)
      {
        $nom_formation = $row->nom;
      }

        $icone    = '';
        $email    = '';

        $info = $this->db->get('tbl_info')->result_array();
        foreach ($info as $key) {
          $nom_site = $key['nom_site'];
          $icone    = $key['icone'];
          $email    = $key['email'];
          
        }



       $message = "REPUBLIQUE DEMOCRATIQUE DU CONGO <br/>
         <h5>
            Liste des formateurs attribués à la formation ".$nom_formation."
         <h5>
        ";

         $img =  base_url().'upload/tbl_info/'.$icone;

         $output = '<div align="right">';
         $output .= '<table width="100%" cellspacing="5" cellpadding="5" id="user_data" >';
         $output .= '
         <tr>
          <td width="25%"><img src="'.base_url().'upload/tbl_info/'.$icone.'" width="150" height="100"/></td>
          <td width="50%" align="center">
           <p><b>'.$message.' </b></p>
           <p><b>Mise à jour : </b>'.date('d/m/Y').'</p>

           <!--<a href="'.base_url().'upload/tbl_info/'.$icone.'" class="btn btn-primary"> voir l\'image</a>-->

           <hr>
           
          </td>

          <td width="25%">
          <img src="'.base_url().'upload/tbl_info/'.$icone.'" width="150" height="100" />
          </td>


         </tr>
         ';
      
        $output .= '</table>';

         $output .= '</div>';

      $output .= '<link href="' . base_url() . 'js/css/sb-admin-2.min.css" rel="stylesheet">';
      $output .= '

      <style>
          body { margin:0;padding:0; }
          @media only screen and (max-width: 480px) {
              /* horizontal scrollbar for tables if mobile screen */
              .tablemobile {
                  overflow-x: auto;
                  display: block;
              }
          }
      </style>

      <table class="table-striped nk-tb-list nk-tb-ulist dataTable no-footer tablemobile" data-auto-responsive="false" id="user_data" role="grid" aria-describedby="DataTables_Table_1_info">
          <thead class="tb-member-head thead-light">  
              <tr>
                  <th width="5">Avatar</th> 
                  <th width="15%">Nom</th> 
                  <th width="10%">Titre </th>

                  <th width="15%">Date debit </th>
                  <th width="15%">Date fin </th>
                  
                  <th width="5%">Téléphone</th> 
                  <th width="15%">Mise à jour</th>

                  
              </tr>  
         </thead> 

         <tbody>
      ';
      if ($query->num_rows() < 0) {
        
      }
      else{

        foreach($query->result() as $row)
        {

            


         $output .= '
         <tr>

          <td>
           <img src="'.base_url().'upload/photo/'.$row->image.'" class="img img-responsive img-thumbnail" width="50" height="35" style="border-radius:50%;" />
          </td>
          
          <td>'.nl2br(substr($row->first_name.' '.$row->last_name, 0,30)).' ....'.'</td>

          <td>'.nl2br(substr($row->nom, 0,30)).' ....'.'</td>
          <td>'.nl2br(substr(date(DATE_RFC822, strtotime($row->date_debit)), 0, 23)).'</td>
          <td>'.nl2br(substr(date(DATE_RFC822, strtotime($row->date_fin)), 0, 23)).'</td>
          
          <td>'.nl2br(substr($row->telephone, 0,15)).'</td>
          <td>'.nl2br(substr(date(DATE_RFC822, strtotime($row->created_at)), 0, 23)).'</td>

         

         </tr>
         ';
        }
      }
      $output .= '
          </tbody>

         <tfoot>  
              <tr>  
                  <th width="5">Avatar</th> 
                  <th width="15%">Nom</th> 
                  <th width="10%">Titre </th>

                  <th width="15%">Date debit </th>
                  <th width="15%">Date fin </th>
                  
                  <th width="5%">Téléphone</th> 
                  <th width="15%">Mise à jour</th>
                  
              </tr>  
         </tfoot>   
          
      </table>';
      return $output;
    }




    /*
    script pour cours aux formations
    ==========================
    **************************
    **************************
    ==========================

    */

    function insert_cours($data)  
    {  
         $this->db->insert('cours', $data);
         return $this->db->insert_id();   
    }

    
    function update_cours($idcours, $data)  
    {  
         $this->db->where("idcours", $idcours);  
         $this->db->update("cours", $data);  
    }


    function delete_cours($idcours)  
    {  
         $this->db->where("idcours", $idcours);  
         $this->db->delete("cours");  
    }

    function fetch_single_cours($idcours)  
    {  
         $this->db->where("idcours", $idcours);  
         $query=$this->db->get('profile_cours');  
         return $query->result();  
    } 

     // script pour information  des module 
    function count_all_view_cours()
    {

      $this->db->limit(30);
      $query = $this->db->get("profile_cours");
      return $query->num_rows();
    }

    function count_all_view_cours_user($id_user)
    {

      $this->db->limit(30);
      $this->db->where("id_user",$id_user);
      $query = $this->db->get("profile_cours");
      return $query->num_rows();
    }

    // pour le paiement 
    function fetch_data_search_cours($query)
    {
        $this->db->select("*");
        $this->db->from("profile_cours");
       
        $this->db->limit(10);
        if($query != '')
        {
         $this->db->like('descriptioncours', $query);
         $this->db->or_like('nomcours', $query);
         $this->db->or_like('created_at', $query);
        
         $this->db->or_like('first_name', $query);
         $this->db->or_like('last_name', $query);
         $this->db->or_like('code', $query);
        }
        return $this->db->get();
    }

    function fetch_data_limit_cours($query)
    {
        $this->db->select("*");
        $this->db->from("profile_cours");
       
        if($query != '')
        {
          $this->db->limit($query);
        }
        return $this->db->get();
    }

    function fetch_data_limit_cours_coach($query, $id_user)
    {
        $this->db->select("*");
        $this->db->from("profile_cours");
       
        if($query != '')
        {
          $this->db->limit($query);
          $this->db->where("id_user", $id_user);
        }
        return $this->db->get();
    }



    function fetch_details_view_cours()
    {
      $output = '';
      $this->db->select("*");
      $this->db->from("profile_cours");
      $this->db->order_by("idcours","DESC");
      $this->db->limit(4);
      
      $query = $this->db->get();
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
      if ($query->num_rows() < 0) {
        
      }
      else{
        $btn1 = '';
        $btn2 ='';
        $evenement = '';
        $etat_paiement ='';
        $etat = '';

        foreach($query->result() as $row)
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
      return $output;
    }
  // fin de script cours

    function fetch_cours_requete($idf)
    {
      $this->db->where('idf', $idf);
      $this->db->order_by('nomcours', 'ASC');
      $query = $this->db->get('cours');
      $output = '<option value="">Selectionner un cours</option>';
      foreach($query->result() as $row)
      {
       $output .= '<option value="'.$row->idcours.'">'.$row->nomcours.'</option>';
      }
      return $output;
    }

    function fetch_cours_requete_coach($idf, $id_user)
    {

      $this->db->order_by('nomcours', 'ASC');
      $query = $this->db->get('cours', array(
          'idf'       =>  $idf,
          'id_user'   =>  $id_user
      ));
      $output = '<option value="">Selectionner un cours</option>';
      foreach($query->result() as $row)
      {
       $output .= '<option value="'.$row->idcours.'">'.$row->nomcours.'</option>';
      }
      return $output;
    }

    function fetch_lesson_requete($idcours)
    {
        $this->db->where('idcours', $idcours);
        $this->db->order_by('nomlesson', 'ASC');
        $query = $this->db->get('lesson');
        $output = '<option value="">Selectionner une leçon</option>';
        foreach($query->result() as $row)
        {
         $output .= '<option value="'.$row->idlesson.'">'.$row->nomlesson.'</option>';
        }
        return $output;
    }

    function fetch_lesson_requete_lesson($idcours, $id_user)
    {
        
        $this->db->order_by('nomlesson', 'ASC');
        $query = $this->db->get_where('lesson', array(
          'idcours'   =>  $idcours,
          'id_user'   =>  $id_user
        ));
        $output = '<option value="">Selectionner une leçon</option>';
        foreach($query->result() as $row)
        {
         $output .= '<option value="'.$row->idlesson.'">'.$row->nomlesson.'</option>';
        }
        return $output;
    }



    /*
    script pour lesson aux formations
    ==========================
    **************************
    **************************
    ==========================

    */

    function insert_lesson($data)  
    {  
         $this->db->insert('lesson', $data);
         return $this->db->insert_id();   
    }

    
    function update_lesson($idlesson, $data)  
    {  
         $this->db->where("idlesson", $idlesson);  
         $this->db->update("lesson", $data);  
    }


    function delete_lesson($idlesson)  
    {  
         $this->db->where("idlesson", $idlesson);  
         $this->db->delete("lesson");  
    }

    function fetch_single_lesson($idlesson)  
    {  
         $this->db->where("idlesson", $idlesson);  
         $query=$this->db->get('profile_lesson');  
         return $query->result();  
    } 

     // script pour information  des module 
    function count_all_view_lesson()
    {

      $this->db->limit(30);
      $query = $this->db->get("profile_lesson");
      return $query->num_rows();
    }

    function count_all_view_lesson_user($id_user)
    {

      $this->db->limit(30);
      $this->db->where("id_user",$id_user);
      $query = $this->db->get("profile_lesson");
      return $query->num_rows();
    }

    // pour le paiement 
    function fetch_data_search_lesson($query)
    {
        $this->db->select("*");
        $this->db->from("profile_lesson");
       
        $this->db->limit(10);
        if($query != '')
        {
         $this->db->like('descriptioncours', $query);
         $this->db->or_like('nomcours', $query);
         $this->db->or_like('created_at', $query);
        
         $this->db->or_like('first_name', $query);
         $this->db->or_like('last_name', $query);
         $this->db->or_like('code', $query);

         $this->db->or_like('nomlesson', $query);
         $this->db->or_like('descriptionlesson', $query);
        }
        return $this->db->get();
    }

    function fetch_data_limit_lesson($query)
    {
        $this->db->select("*");
        $this->db->from("profile_lesson");
       
        if($query != '')
        {
          $this->db->limit($query);
        }
        return $this->db->get();
    }

    function fetch_data_limit_lesson_coach($query, $id_user)
    {
        $this->db->select("*");
        $this->db->from("profile_lesson");
        $this->db->where("id_user",$id_user);
       
        if($query != '')
        {
          $this->db->limit($query);
        }
        return $this->db->get();
    }



    function fetch_details_view_lesson()
    {
      $output = '';
      $this->db->select("*");
      $this->db->from("profile_lesson");
      $this->db->order_by("idlesson","DESC");
      $this->db->limit(4);
      
      $query = $this->db->get();
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
      if ($query->num_rows() < 0) {
        
      }
      else{
        $btn1 = '';
        $btn2 ='';
        $evenement = '';
        $etat_paiement ='';
        $etat = '';

        foreach($query->result() as $row)
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
      return $output;
    }
  // fin de script cours


    /*
    script pour travail aux formations
    ==========================
    **************************
    **************************
    ==========================

    */

    function insert_travail($data)  
    {  
         $this->db->insert('travail', $data);
         return $this->db->insert_id();   
    }

    
    function update_travail($idtravail, $data)  
    {  
         $this->db->where("idtravail", $idtravail);  
         $this->db->update("travail", $data);  
    }


    function delete_travail($idtravail)  
    {  
         $this->db->where("idtravail", $idtravail);  
         $this->db->delete("travail");  
    }

    function fetch_single_travail($idtravail)  
    {  
         $this->db->where("idtravail", $idtravail);  
         $query=$this->db->get('profile_travail');  
         return $query->result();  
    } 

     // script pour information  des module 
    function count_all_view_travail()
    {

      $this->db->limit(30);
      $query = $this->db->get("profile_travail");
      return $query->num_rows();
    }

    function count_all_view_travail_user($id_user)
    {

      $this->db->limit(30);
      $this->db->where("id_user",$id_user);
      $query = $this->db->get("profile_travail");
      return $query->num_rows();
    }

    // pour le travail 
    function fetch_data_search_travail($query)
    {
        $this->db->select("*");
        $this->db->from("profile_travail");
       
        $this->db->limit(10);
        if($query != '')
        {
         $this->db->like('descriptioncours', $query);
         $this->db->or_like('nomcours', $query);
         $this->db->or_like('created_at', $query);
        
         $this->db->or_like('first_name', $query);
         $this->db->or_like('last_name', $query);
         $this->db->or_like('code', $query);

         $this->db->or_like('nomlesson', $query);
         $this->db->or_like('descriptionlesson', $query);

         $this->db->or_like('nomtravail', $query);
         $this->db->or_like('descriptiontravail', $query);
        }
        return $this->db->get();
    }

    function fetch_data_limit_travail($query)
    {
        $this->db->select("*");
        $this->db->from("profile_travail");
       
        if($query != '')
        {
          $this->db->limit($query);
        }
        return $this->db->get();
    }

    function fetch_data_limit_travail_coach($query, $id_user)
    {
        $this->db->select("*");
        $this->db->from("profile_travail");
       
        if($query != '')
        {
          $this->db->limit($query);
          $this->db->where("id_user", $id_user);
        }
        return $this->db->get();
    }



    function fetch_details_view_travail()
    {
      $output = '';
      $this->db->select("*");
      $this->db->from("profile_travail");
      $this->db->order_by("idtravail","DESC");
      $this->db->limit(4);
      
      $query = $this->db->get();
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
      if ($query->num_rows() < 0) {
        
      }
      else{
        $btn_plus = '';
        $btn1 = '';
        $btn2 ='';
        $evenement = '';
        $etat_paiement ='';
        $etat = '';

        foreach($query->result() as $row)
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
      return $output;
    }
  // fin de script cours

   // script pour les travaux remis 
   // voir tous les messages 
   function count_all_travaux_users_remis($idtravail)
   {
      $query = $this->db->get_where("profile_remise", array('idtravail'  =>  $idtravail));
      return $query->num_rows();

   }

   // pagination users 
   function fetch_details_travaux_remis($limit, $start, $idtravail)
   {
    $output = '';
    $this->db->select("*");
    $this->db->from("profile_remise");
    $this->db->where("idtravail", $idtravail);
    $this->db->order_by("first_name", "ASC");
    $this->db->limit($limit, $start);
    $query = $this->db->get();
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
          <th width="5%">Télécharger</th>
          
          
         </tr>
       <theader>
       <tbody>
      ';

      if ($query->num_rows() <= 0) {
        # code...
        $output .=' <td colspan="8" class="text-center"><img src="'.base_url().'upload/tbl_info/book2.png" class="table-user-thumb" style="border-radius: 50%; width: 150px; height: 150px;" /></td>';
      }
      else{

         foreach($query->result() as $row)
          {
              $etat ='<span class="badge badge-warning"><i class="fa fa-user"></i> Apprenant</span>';

              $link = '<a href="tel:'.$row->telephone.'" class="text-primary"><i class="fa fa-phone"></i></a>
               <input type="checkbox" name="tel" value="'.$row->telephone.'" class="tels delete_checkbox">
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


                <td>'.substr(date(DATE_RFC822, strtotime($row->created_at)), 0, 23).'</td>

                <td>
                  <a download="'.base_url().'upload/lesson/'.$row->file.'" href="'.base_url().'upload/lesson/'.$row->file.'" class="btn btn-primary btn-sm">
                  <i class="fa fa-download"></i></a>
                  </a>
                </td>
               
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
              <th width="5%">Télécharger</th>
              
             </tr>
           <tfooter>
        </table>';
        return $output;
   }


   /*
   =================================
   *********************************
   script pour les formateurs 
   ==================================
   **********************************
   */
    function statistiques_nombre_formation($query, $id_user){
      $my_nombre;
      $data_ok = $this->db->query("SELECT count(*) AS nombre from ".$query." 
        WHERE id_user=".$id_user." ");
      if ($data_ok->num_rows() > 0) {

        foreach ($data_ok->result_array() as $key) {
          $my_nombre = $key['nombre'];
        }
        # code...
      }
      else{
           $my_nombre = 0;
      }

      return $my_nombre;
    }

    function fetch_details_view_formations_formateur($id_user)
    {
      $output = '';
      $etat = '';
      $this->db->select("*");
      $this->db->from("formations");
      $this->db->order_by("idf", "DESC");
      $this->db->limit(10);
      $query = $this->db->get();
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
      if ($query->num_rows() < 0) {
        
      }
      else{

        foreach($query->result() as $row)
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
      return $output;
    }

    // filtrage avec limit 
    function fetch_details_view_formations_limit_formateur($limit)
    {
      $output = '';
       $etat = '';
      $this->db->select("*");
      $this->db->from("formations");
      $this->db->order_by("idf", "DESC");
      $this->db->limit($limit);
      $query = $this->db->get();
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
      if ($query->num_rows() < 0) {
        
      }
      else{

        foreach($query->result() as $row)
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
      return $output;
    }



    // SCRIPT POUR FORMATEUR AU FORMATION 
    // filtrage avec limit 
    function fetch_details_mes_formations($limit, $id_user)
    {
      $output = '';
       $etat = '';
      $this->db->select("*");
      $this->db->from("profile_coach");
      $this->db->where("id_user", $id_user);
      $this->db->order_by("idcoach", "DESC");
      $this->db->limit($limit);

      $query = $this->db->get();
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
      if ($query->num_rows() < 0) {
        
      }
      else{

        foreach($query->result() as $row)
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
      return $output;
    }

    function fetch_details_mes_formations_all($id_user)
    {
      $output = '';
      $etat = '';
      $this->db->select("*");
      $this->db->from("profile_coach");
      $this->db->order_by("idcoach", "DESC");
      $this->db->where("id_user", $id_user);
      $this->db->limit(10);
      $query = $this->db->get();
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
      if ($query->num_rows() < 0) {
        
      }
      else{

        foreach($query->result() as $row)
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
      return $output;
    }

     function fetch_details_view_mes_formations($id_user)
    {
      $output = '';
      $etat = '';
      $this->db->select("*");
      $this->db->from("profile_coach");
      $this->db->order_by("idcoach", "DESC");
      $this->db->where("id_user", $id_user);
      $this->db->limit(10);
      $query = $this->db->get();
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
      if ($query->num_rows() < 0) {
        
      }
      else{

        foreach($query->result() as $row)
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
      return $output;
    }

     function fetch_details_view_cours_coach($id_user)
    {
      $output = '';
      $this->db->select("*");
      $this->db->from("profile_cours");
      $this->db->order_by("idcours","DESC");
      $this->db->where("id_user", $id_user);
      $this->db->limit(4);
      
      $query = $this->db->get();
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
      if ($query->num_rows() < 0) {
        
      }
      else{
        $btn1 = '';
        $btn2 ='';
        $evenement = '';
        $etat_paiement ='';
        $etat = '';

        foreach($query->result() as $row)
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
      return $output;
    }
  // fin de script cours

     function fetch_details_view_lesson_coach($id_user)
    {
      $output = '';
      $this->db->select("*");
      $this->db->from("profile_lesson");
      $this->db->where("id_user", $id_user);
      $this->db->order_by("idlesson","DESC");
      $this->db->limit(4);
      
      $query = $this->db->get();
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
      if ($query->num_rows() < 0) {
        
      }
      else{
        $btn1 = '';
        $btn2 ='';
        $evenement = '';
        $etat_paiement ='';
        $etat = '';

        foreach($query->result() as $row)
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
      return $output;
    }
  // fin de script cours

    function fetch_details_view_travail_lesson($id_user)
    {
      $output = '';
      $this->db->select("*");
      $this->db->from("profile_travail");
      $this->db->where("id_user", $id_user);
      $this->db->order_by("idtravail","DESC");
      $this->db->limit(4);
      
      $query = $this->db->get();
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
      if ($query->num_rows() < 0) {
        
      }
      else{
        $btn_plus = '';
        $btn1 = '';
        $btn2 ='';
        $evenement = '';
        $etat_paiement ='';
        $etat = '';

        foreach($query->result() as $row)
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
      return $output;
    }
  // fin de script cours

    /*
   =================================
   *********************************
   script pour les formateurs 
   ==================================
   **********************************
   */

   function get_name_formation_pub($idf){
        $this->db->where("idf", $idf);
        $nom = $this->db->get("formations")->result_array();
        foreach ($nom as $key) {
          $titre = $key["nom"];
          return $titre ;
        }

    }

    function get_name_cours_name($code){
        $this->db->where("code", $code);
        $nom = $this->db->get("cours")->result_array();
        foreach ($nom as $key) {
          $titre = $key["nomcours"];
          return $titre ;
        }

    }

    function get_name_lesson_name($code){
        $this->db->where("code", $code);
        $nom = $this->db->get("profile_lesson")->result_array();
        foreach ($nom as $key) {
          $titre = $key["nomlesson"];
          return $titre ;
        }

    }

    function get_name_travail_name($code){
        $this->db->where("code", $code);
        $nom = $this->db->get("profile_travail")->result_array();
        foreach ($nom as $key) {
          $titre = $key["nomtravail"];
          return $titre ;
        }

    }

    function get_name_cours_idcours($code){
        $this->db->where("code", $code);
        $nom = $this->db->get("cours");
        if ($nom->num_rows() > 0) {
          # code...
          foreach ($nom->result_array() as $key) {
            $titre = $key["idcours"];
            return $titre ;
          }
        }
        else{

          return 0;

        }

    }

    function get_name_lessons_idcours($code){
        $this->db->where("code", $code);
        $nom = $this->db->get("lesson");
        if ($nom->num_rows() > 0) {
          # code...
          foreach ($nom->result_array() as $key) {
            $titre = $key["idlesson"];
            return $titre ;
          }
        }
        else{

          return 0;

        }

    }

    function get_name_travail_idlesson($code){
        $this->db->where("code", $code);
        $nom = $this->db->get("profile_travail");
        if ($nom->num_rows() > 0) {
          # code...
          foreach ($nom->result_array() as $key) {
            $titre = $key["idtravail"];
            return $titre ;
          }
        }
        else{

          return 0;

        }

    }

    function Select_our_formation_tag($idf)
    {   
        $this->db->limit(1);
        return $this->db->get_where("formations", array(
          'idf' =>  $idf
        ));
    }

    function Select_our_cours_tag($code)
    {   
        $this->db->limit(1);
        return $this->db->get_where("profile_cours", array(
          'code' =>  $code
        ));
    }

    function Select_our_lessons_tag($code)
    {   
        $this->db->limit(1);
        return $this->db->get_where("profile_lesson", array(
          'code' =>  $code
        ));
    }



    function Select_our_leson_tag($idcours)
    {   
        
        return $this->db->get_where("profile_lesson", array(
          'idcours' =>  $idcours
        ));
    }

    function Select_our_travail_tag($idtravail)
    {   
        
        return $this->db->get_where("profile_travail", array(
            'idtravail' =>  $idtravail
        ));
    }



    function Select_our_cours_by_formation($idf)
    {   
        $this->db->limit(1);
        return $this->db->get_where("profile_cours", array(
          'idf' =>  $idf
        ));
    }

    function Select_our_lesson_by_formation($idcours)
    {   
        $this->db->limit(1);
        return $this->db->get_where("profile_lesson", array(
          'idcours' =>  $idcours
        ));
    }

    function Select_article_all_ok()
    {
        return $this->db->query("SELECT * FROM profile_article  ORDER BY created_at DESC LIMIT 10");
    }

    function Select_padding_articles_tri()
    {
        return $this->db->query('SELECT * FROM profile_article  ORDER BY RAND() LIMIT 3');
    }

    function fetch_pagination_formations()
    {
      $this->db->limit(50);
      $this->db->order_by('created_at', 'DESC');
      $query = $this->db->query("SELECT * FROM formations");
      return $query->num_rows();
    }

     // detail des articles par formations
    function fetch_details_pagination_formations($limit, $start)
    {
      $output = '';
      $this->db->select("*");
      $this->db->from("formations");
      $this->db->order_by("created_at", "DESC");

      $this->db->limit($limit, $start);
      $query = $this->db->get();

      $link ='';
      $jour = date('Y-m-d');


      foreach($query->result() as $key)
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
      
      return $output;
    }

     // recherche de articles
    function fetch_data_search_formations($query)
    {
      $this->db->select("*");
      $this->db->from("formations");
      $this->db->limit(8);
      if($query != '')
      {
       $this->db->like('nom', $query);
       $this->db->or_like('description', $query);

      }
      $this->db->order_by('created_at', 'DESC');
      return $this->db->get();
    }

     // retour de nom de jours
    function get_info_annee(){
        $journee='';
        $nom = $this->db->query("SELECT YEAR(now()) AS jour");
        foreach ($nom->result_array() as $key) {
          $journee=$key['jour'];
        }
        return $journee;
    }

    // insertion des vues 
    function insert_vues_ip($data)  
    {  
       $this->db->insert('vues', $data);  
    }

    function Select_idart_tag_insert($idart, $machine)
    {   
        $this->db->limit(1);
        return $this->db->get_where("vues", array(
          'idart'   =>  $idart,
          'machine' =>  $machine
        ));
    }

    function fetch_pagination_articles()
    {
      $this->db->limit(50);
      $this->db->order_by('created_at', 'DESC');
      $query = $this->db->query("SELECT * FROM profile_article");
      return $query->num_rows();
    }

     // detail des articles par formations
    function fetch_details_pagination_articles($limit, $start)
    {
      $output = '';
      $this->db->select("*");
      $this->db->from("profile_article");
      $this->db->order_by("created_at", "DESC");
      $this->db->limit($limit, $start);
      $query = $this->db->get();



      foreach($query->result() as $key)
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
      
      return $output;
    }

     // detail des articles par formations
    function fetch_details_pagination_articles_admin($limit, $start)
    {
      $output = '';
      $this->db->select("*");
      $this->db->from("profile_article");
      $this->db->order_by("created_at", "DESC");
      $this->db->limit($limit, $start);
      $query = $this->db->get();



      foreach($query->result() as $key)
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
      
      return $output;
    }

     // detail des articles par formations
    function fetch_details_pagination_articles_formateur($limit, $start)
    {
      $output = '';
      $this->db->select("*");
      $this->db->from("profile_article");
      $this->db->order_by("created_at", "DESC");
      $this->db->limit($limit, $start);
      $query = $this->db->get();



      foreach($query->result() as $key)
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
      
      return $output;
    }


     // recherche de articles
    function fetch_data_search_articles($query)
    {
      $this->db->select("*");
      $this->db->from("profile_article");
      $this->db->limit(8);
      if($query != '')
      {
       $this->db->like('nom', $query);
       $this->db->or_like('description', $query);

      }
      $this->db->order_by('nom', 'ASC');
      return $this->db->get();
    }

    function get_name_article_pub($idart){
        $this->db->where("idart", $idart);
        $nom = $this->db->get("profile_article")->result_array();
        foreach ($nom as $key) {
          $titre = $key["nom"];
          return $titre ;
        }

    }

    function Select_article_by_tag($idart)
    {
        return $this->db->query("SELECT * FROM profile_article  WHERE idart=".$idart." ORDER BY created_at DESC LIMIT 1");
    }

    function Select_our_articles_tag($idart)
    {   
        $this->db->limit(1);
        return $this->db->get_where("profile_article", array(
          'idart' =>  $idart
        ));
    }

    function Select_our_commentaire_to_articles_tag($idart)
    {   
        $this->db->limit(1);
        return $this->db->get_where("commentaire", array(
          'idart' =>  $idart
        ));
    }

     function fetch_details_view_mes_formations_user($id_user)
    {
      $output = '';
      $etat = '';
      $this->db->select("*");
      $this->db->from("profile_format");
      $this->db->order_by("id_user", "DESC");
      $this->db->where("id_user", $id_user);
      $this->db->limit(10);
      $query = $this->db->get();
      $output .= '
      <table class="table-striped  nk-tb-list nk-tb-ulist dataTable no-footer" data-auto-responsive="false" id="user_data" role="grid" aria-describedby="DataTables_Table_1_info">
          <thead class="tb-member-head thead-light">  
              <tr> 
                 <th width="10%">Avatar</th> 
                  <th width="15%">Nom de la formation</th>
                  <th width="15%">Date debit</th>
                  <th width="10%">Fin iscription</th>
                  <th width="10%">Apprenant admis </th>
                  <th width="10%">Fin formation </th>

                  <th width="20%">Mise à jour</th>

              </tr>  
         </thead> 

         <tbody>
      ';
      if ($query->num_rows() < 0) {
        
      }
      else{

        foreach($query->result() as $row)
        {

            


         $output .= '
         <tr>
          
          <td><img src="'.base_url().'upload/formations/'.$row->image.'" class="img img-responsive img-thumbnail" width="50" height="35" style="border-radius:50%;" /></td>

          <td>'.nl2br(substr($row->nom, 0,40)).' ....'.'</td>
          <td>'.nl2br(substr(date(DATE_RFC822, strtotime($row->date_debit)), 0, 23)).'</td>
          <td class="text-danger">'.nl2br(substr(date(DATE_RFC822, strtotime($row->fin_inscription)), 0, 23)).'</td>
          <td>'.nl2br(substr($row->first_name.' '.$row->last_name, 0,40)).' ....'.'</td>

         

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
                  <th width="15%">Nom de la formation</th>
                  <th width="15%">Date debit</th>
                  <th width="10%">Fin iscription</th>
                  <th width="10%">Apprenant admis </th>
                  <th width="10%">Fin formation </th>

                 

                  <th width="20%">Mise à jour</th>


              </tr>  
         </tfoot>   
          
      </table>';
      return $output;
    }


     /*
    script pour la conference
    ===========================
    zoom conference
    ==========================
    ****************************
    ****************************

    */
    // script pour reservation du site
   function make_query_conference()  
   {  
          
         $this->db->select($this->select_column4);  
         $this->db->from($this->table4);  
         if(isset($_POST["search"]["value"]))  
         {  
              $this->db->like("idconference", $_POST["search"]["value"]);  
              $this->db->or_like("first_name", $_POST["search"]["value"]);
              $this->db->or_like("last_name", $_POST["search"]["value"]);
              $this->db->or_like("date_debit", $_POST["search"]["value"]);
              $this->db->or_like("heure_debit", $_POST["search"]["value"]);
              $this->db->or_like("date_fin", $_POST["search"]["value"]);
              $this->db->or_like("heure_fin", $_POST["search"]["value"]);
         }  
         if(isset($_POST["order"]))  
         {  
              $this->db->order_by($this->order_column7[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
         }  
         else  
         {  
              $this->db->order_by('idconference', 'DESC');  
         }  
    }

   function make_datatables_conference(){  
         $this->make_query_conference();  
         if($_POST["length"] != -1)  
         {  
              $this->db->limit($_POST['length'], $_POST['start']);  
         }  
         $query = $this->db->get();  
         return $query->result();  
    }

    function get_filtered_data_conference(){  
         $this->make_query_conference();  
         $query = $this->db->get();  
         return $query->num_rows();  
    }       
    function get_all_data_conference()  
    {  
         $this->db->select("*");  
         $this->db->from($this->table4);  
         return $this->db->count_all_results();  
    }

    function insert_conference($data)  
    {  
         $this->db->insert('conference', $data); 
    }

    
    function update_conference($idconference, $data)  
    {  
         $this->db->where("idconference", $idconference);  
         $this->db->update("conference", $data);  
    }


    function delete_conference($idconference)  
    {  
         $this->db->where("idconference", $idconference);  
         $this->db->delete("conference");  
    }

    function fetch_single_conference($idconference)  
    {  
         $this->db->where("idconference", $idconference);  
         $query=$this->db->get('profile_conference');  
         return $query->result();  
    } 

    function fetch_single_conference_in_stadium($id_user,$nom)  
    {    
         $query=$this->db->get_where("conference",array(
            'id_user'     =>  $id_user,
            'nom'         =>  $nom
         ));  
         return $query->num_rows();  
    } 
    // fin de script place

    // pagination users 
   function fetch_detail_conference($limit, $start)
   {
    $output = '';
    $sexe = '';
    $adresse = "";
    $this->db->select("*");
    $this->db->from("profile_conference");
    $this->db->order_by("idconference", "DESC");
    $this->db->limit($limit, $start);
    $query = $this->db->get();
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
      foreach($query->result() as $row)
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
        return $output;
   }

    // pagination users 
   function fetch_detail_conference_tug($limit, $start, $id_user)
   {
    $output = '';
    $sexe = '';
    $adresse = "";
    $this->db->select("*");
    $this->db->from("profile_conference");
    $this->db->where("id_user", $id_user);
    $this->db->order_by("idconference", "DESC");
    $this->db->limit($limit, $start);
    $query = $this->db->get();
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
      foreach($query->result() as $row)
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
        return $output;
   }

    // voir tous les conference 
   function count_all_conferences()
   {
    $query = $this->db->get("profile_conference");
    return $query->num_rows();
   }

    // voir tous les conference 
   function count_all_conferences_tug($id_user)
   {
      $query = $this->db->get_where("profile_conference", array(
        'id_user'   =>  $id_user
      ));
      return $query->num_rows();
   }

   function fetch_data_conference_ok($query)
   {
      $this->db->select("*");
      $this->db->limit(10);
      $this->db->from("profile_conference");
     
      if($query != '')
      {
       $this->db->like('nom', $query);
       $this->db->or_like('date_debit', $query);
       $this->db->or_like('heure_debit', $query);

       $this->db->or_like('date_fin', $query);
       $this->db->or_like('heure_fin', $query);

       $this->db->or_like('first_name', $query);
       $this->db->or_like('last_name', $query);
       $this->db->or_like('telephone', $query);
      
      }
     
      $this->db->order_by('first_name', 'ASC');
      return $this->db->get();
   }


   /*
    script pour la conference
    ===========================
    zoom conference
    ==========================
    ****************************
    ****************************

    */
    // script pour invite du site
   function make_query_invite()  
   {  
          
         $this->db->select($this->select_column5);  
         $this->db->from($this->table5);  
         if(isset($_POST["search"]["value"]))  
         {  
              $this->db->like("idinvite", $_POST["search"]["value"]);  
              $this->db->or_like("first_name", $_POST["search"]["value"]);
              $this->db->or_like("last_name", $_POST["search"]["value"]);
              $this->db->or_like("date_debit", $_POST["search"]["value"]);
              $this->db->or_like("heure_debit", $_POST["search"]["value"]);
              $this->db->or_like("date_fin", $_POST["search"]["value"]);
              $this->db->or_like("heure_fin", $_POST["search"]["value"]);
         }  
         if(isset($_POST["order"]))  
         {  
              $this->db->order_by($this->order_column5[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
         }  
         else  
         {  
              $this->db->order_by('idinvite', 'DESC');  
         }  
    }

   function make_datatables_invite(){  
         $this->make_query_invite();  
         if($_POST["length"] != -1)  
         {  
              $this->db->limit($_POST['length'], $_POST['start']);  
         }  
         $query = $this->db->get();  
         return $query->result();  
    }

    function get_filtered_data_invite(){  
         $this->make_query_invite();  
         $query = $this->db->get();  
         return $query->num_rows();  
    }       
    function get_all_data_invite()  
    {  
         $this->db->select("*");  
         $this->db->from($this->table4);  
         return $this->db->count_all_results();  
    }

    function insert_invite($data)  
    {  
         $this->db->insert('invite', $data); 
         return $this->db->insert_id(); 
    }

    
    function update_invite($idinvite, $data)  
    {  
         $this->db->where("idinvite", $idinvite);  
         $this->db->update("invite", $data);  
    }


    function delete_invite($idinvite)  
    {  
         $this->db->where("idinvite", $idinvite);  
         $this->db->delete("invite");  
    }

    function fetch_single_invite($idinvite)  
    {  
         $this->db->where("idinvite", $idinvite);  
         $query=$this->db->get('profile_invite');  
         return $query->result();  
    } 

    function fetch_single_invite_in_stadium($id_user,$idconference)  
    {    
         $query=$this->db->get_where("invite",array(
            'id_user'         =>  $id_user,
            'idconference'    =>  $idconference
         ));  
         return $query->num_rows();  
    } 
    // fin de script place

    // pagination users 
   function fetch_detail_invite($limit, $start)
   {
    $output = '';
    $sexe = '';
    $adresse = "";
    $this->db->select("*");
    $this->db->from("profile_invite");
    $this->db->order_by("idinvite", "DESC");
    $this->db->limit($limit, $start);
    $query = $this->db->get();
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
      foreach($query->result() as $row)
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
        return $output;
   }

    // voir tous les invite 
   function count_all_invites()
   {
    $query = $this->db->get("profile_invite");
    return $query->num_rows();
   }

   function fetch_data_invite_ok($query)
   {
      $this->db->select("*");
      $this->db->limit(10);
      $this->db->from("profile_invite");
     
      if($query != '')
      {
         $this->db->like('nom', $query);
         $this->db->or_like('date_debit', $query);
         $this->db->or_like('heure_debit', $query);

         $this->db->or_like('date_fin', $query);
         $this->db->or_like('heure_fin', $query);

         $this->db->or_like('first_name', $query);
         $this->db->or_like('last_name', $query);
         $this->db->or_like('telephone', $query);
        
      }
     
      $this->db->order_by('first_name', 'ASC');
      return $this->db->get();
   }

   function fetch_data_sms_users($query)
   {
      $this->db->select("*");
      $this->db->limit(10);
      $this->db->from("profile_user");
      if($query != '')
      {
       $this->db->like('id', $query);
       $this->db->or_like('first_name', $query);
       $this->db->or_like('last_name', $query);
       $this->db->or_like('nom', $query);
       $this->db->or_like('telephone', $query);
      }
      $this->db->order_by('first_name', 'ASC');
      return $this->db->get();
   }

   // voir tous les messages 
   function count_all_message_users_byrole($idrole)
   {
    $query = $this->db->get_where("profile_user", array('idrole'  =>  $idrole));
    return $query->num_rows();
   }

    function get_role_user($id){
        $this->db->where("id", $id);
        $nom = $this->db->get("users")->result_array();
        foreach ($nom as $key) {
          return $key["idrole"];
        }

    }

    function get_telephone_user($id){
        $this->db->where("id", $id);
        $nom = $this->db->get("users")->result_array();
        foreach ($nom as $key) {
          return $key["telephone"];
        }

    }


   // pagination users 
   function fetch_detailsmessage_users_zoom()
   {
    $output = '';
    $this->db->select("*");
    $this->db->from("profile_user");
    $this->db->order_by("first_name", "ASC");
    $this->db->limit(10);
    $query = $this->db->get();
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
      foreach($query->result() as $row)
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
        return $output;
   }

   // pagination users 
   function fetch_detailsmessage_users_byrole_zoom($limit, $start, $idrole)
   {
    $output = '';
    $this->db->select("*");
    $this->db->from("profile_user");
    $this->db->where("idrole", $idrole);
    $this->db->order_by("first_name", "ASC");
    $this->db->limit($limit, $start);
    $query = $this->db->get();
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
      foreach($query->result() as $row)
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
        return $output;
   }





  





    



























   // validation
  function can_login($email, $password_ok)
  {
      $this->db->where('email', $email);
      $query = $this->db->get('users');
      if($query->num_rows() > 0)
      {
       foreach($query->result() as $row)
       {
          if($row->idrole == '1')
          {

             $password = md5($password_ok);
             $store_password = $row->passwords;
             if($password == $store_password)
             {
              $this->session->set_userdata('admin_login', $row->id);
             }
             else
             {
              return 'mot de passe incorrect';
             }

          }
          elseif($row->idrole == '2')
          {
             $password = md5($password_ok);
             $store_password = $row->passwords;
             if($password == $store_password)
             {
              $this->session->set_userdata('id', $row->id);
             }
             else
             {
              return 'mot de passe incorrect';
             }

          }
          elseif($row->idrole == '3')
          {
             $password = md5($password_ok);
             $store_password = $row->passwords;
             if($password == $store_password)
             {
              $this->session->set_userdata('instuctor_login', $row->id);
             }
             else
             {
              return 'mot de passe incorrect';
             }

          }

          elseif($row->idrole == '4')
          {
             $password = md5($password_ok);
             $store_password = $row->passwords;
             if($password == $store_password)
             {
              $this->session->set_userdata('formateur_login', $row->id);
             }
             else
             {
              return 'mot de passe incorrect';
             }

          }
          else
          {
           return 'les informations incorrectes';
          }
          



       }
      }
      else
      {
       return 'adresse email incorrecte';
      }
    
  }


  function can_recuperation($email)
    {
        $this->db->where('email', $email);
        $query = $this->db->get('users');
        if($query->num_rows() > 0)
        {
            foreach($query->result() as $row)
            {
               
            }
        }
        else
        {
        return 'Adresse email non trouvée!!!!';
        }
    }


    // sauvegarde des donnees  et controle d'acces 
      function create_backup() 
      {
          $this->load->dbutil();
          $options = array(
              'format' => 'txt', 
              'add_drop' => TRUE,
              'add_insert' => TRUE,
              'newline' => "\n"
          );
          $tables = array('');
          $file_name = 'ischub';
          $backup = & $this->dbutil->backup(array_merge($options, $tables));
          $this->load->helper('download');
          force_download($file_name . '.sql', $backup);
      }

      function import_db()
      {
          $this->load->database();
          // $this->db->truncate('users');
          // $this->db->truncate('categorie_aprenant');
          // $this->db->truncate('derogation');
          // $this->db->truncate('edition');
          // $this->db->truncate('formation');
          // $this->db->truncate('inscription_formation');
          // $this->db->truncate('messagerie');
          // $this->db->truncate('notification');
          // $this->db->truncate('online');
          // $this->db->truncate('paiement');
          // $this->db->truncate('presence');
          // $this->db->truncate('question');
          // $this->db->truncate('recouvrement');
          // $this->db->truncate('recupere');
          // $this->db->truncate('reponse');
          // $this->db->truncate('role');
          // $this->db->truncate('rubrique');
          // $this->db->truncate('tbl_info');
          // $this->db->truncate('tranche');
          

          $file_n = $_FILES["file_name"]["name"];
          move_uploaded_file($_FILES["file_name"]["tmp_name"], "upload/" . $_FILES["file_name"]["name"]);
          $filename = "upload/".$file_n;
          $mysql_host = 'localhost';
          $mysql_username = 'root';
          $mysql_password = '';
          $mysql_database = 'media';
          mysql_connect($mysql_host, $mysql_username, $mysql_password) or die('Error connect to MySQL: ' . mysql_error());
          mysql_select_db($mysql_database) or die('Error to connect MySQL: ' . mysql_error());
          $templine = '';
          $lines = file($filename);
          foreach ($lines as $line)
          {
                  if (substr($line, 0, 2) == '--' || $line == '')
                  {
                      continue;
                  }
                  $templine .= $line;
                  if (substr(trim($line), -1, 1) == ';')
                  {
                      mysql_query($templine) or print('Error \'<strong>' . $templine . '\': ' . mysql_error() . '<br /><br />');
                      $templine = '';
                  if (mysql_errno() == 1062) 
                  {
                  print 'no way!';
                  }
              }
          }
          unlink("upload/" . $file_n);

      }
    //fin validation et sauvegarde des données

}


?>