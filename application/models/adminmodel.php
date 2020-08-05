<?php

class adminmodel extends CI_Model{

    public function get_all_categories(){
		$query = $this -> db->query('SELECT dc1.*,(select dc2.category_title from `dabur_categories` as dc2 where dc1.parent_id=dc2.id) as parent FROM `dabur_categories` as dc1 WHERE dc1.is_deleted=\'no\' ');

		if($query -> num_rows()){
                                  return $query->result();
                               }
                               else{
                                   return FALSE;
                               }
                            }
	public function get_all_pricestructure(){
		$query = $this -> db->query('SELECT *, (select dabur_products.description from dabur_products where dabur_products.id = dabur_pricestructure.product_id) as description FROM dabur_pricestructure where is_deleted =\'no\' order by id desc ');

		if($query -> num_rows()){
			return $query->result();
		}
		else{
			return FALSE;
		}
	}
     public function get_all_users(){
		 $q =  $this -> db ->order_by('user_id', 'DESC')
			 -> where(['is_deleted' => 'no', 'username !=' => 'admin'])
			 ->  get('dabur_users');
		 if($q -> num_rows()){
			 return $q->result();
		 }
		 else{
			 return FALSE;
		 }
	 }
	public function get_all_salesplanning(){
		$q = $this -> db->query('SELECT dabur_sales_planing.id, dabur_sales_planing.product_id, dabur_sales_planing.sales, dabur_sales_planing.start_date,
 		dabur_sales_planing.end_date, dabur_products.description, dabur_countries.country_name from dabur_sales_planing JOIN dabur_products ON dabur_sales_planing.product_id = dabur_products.id JOIN dabur_countries 
		ON dabur_products.country_id = dabur_countries.id WHERE dabur_sales_planing.is_deleted = \'no\' order by dabur_sales_planing.id desc ');
		if($q -> num_rows()){
			return $q->result();
		}
		else{
			return FALSE;
		}
	}
	public function get_user_type(){
		$q =  $this -> db -> where(['is_deleted' => 'no', 'user_type !=' => 'admin'])
			->  get('dabur_usertype');
		if($q -> num_rows()){
			return $q->result();
		}
		else{
			return FALSE;
		}
	}

    public function get_parent_id(){
        $q =  $this -> db -> where(['parent_id' => 0]) 
                          -> get('dabur_categories');
          if($q -> num_rows()){
              return $q->result();
           }
           else{
               return FALSE;
           }
    }

    public function insert_category($category_title, $parent_id, $status){
        $data = array(
            'category_title'=>$category_title,
            'parent_id'=>$parent_id,
            'status' => $status
        );
    
       $q = $this->db->insert('dabur_categories',$data);
       if($q){
		   $lastid = $this->db->insert_id();
		   $data = array(
			   'concerning_id'=> $lastid,
			   'table_name'=>'dabur_categories',
			   'created' => date('Y-m-d H:i:s'),
			   'created_by' => $_SESSION['user_id']
		   );
		   $q = $this->db->insert('dabur_create_log',$data);
           return TRUE;
       }
       else{
           return FALSE;
       }
	}
	public function insert_salesplanning($product_id, $sales, $start_date, $end_date){
		$data = array(
			'product_id'=>$product_id,
			'sales'=>$sales,
			'start_date' => $start_date,
			'end_date' => $end_date
		);

		$q = $this->db->insert('dabur_sales_planing',$data);
		if($q){
			$lastid = $this->db->insert_id();
			$data = array(
				'concerning_id'=> $lastid,
				'table_name'=>'dabur_sales_planing',
				'created' => date('Y-m-d H:i:s'),
				'created_by' => $_SESSION['user_id']
			);
			$q = $this->db->insert('dabur_create_log',$data);
			return TRUE;
		}
		else{
			return FALSE;
		}
	}
	public function insert_product($country_id, $category_id, $sub_category_id, $brand
		,$variant, $size,$uom_id, $fgcode, $description){
		$data = array(
			'category_id'=>$category_id,
			'sub_category_id'=>$sub_category_id,
			'brand' => $brand,
			'variant' => $variant,
			'size' => $size,
			'uom_id' => $uom_id,
			'fgcode' => $fgcode,
			'description' => $description,
			'country_id' => $country_id
		);

		$q = $this->db->insert('dabur_products',$data);
		if($q){
			$lastid = $this->db->insert_id();
			$data = array(
				'concerning_id'=> $lastid,
				'table_name'=>'dabur_products',
				'created' => date('Y-m-d H:i:s'),
				'created_by' => $_SESSION['user_id']
			);
			$q = $this->db->insert('dabur_create_log',$data);
			return TRUE;
		}
		else{
			return FALSE;
		}
	}
	public function insert_user($username, $email, $password,
								$first_name, $last_name, $phone, $user_type_id, $status){
		$data = array(
			'username'=>$username,
			'email'=>$email,
			'password' => $password,
			'first_name' => $first_name,
			'last_name' => $last_name,
			'phone' => $phone,
			'user_type_id' => $user_type_id,
			'status' => $status
		);

		$q = $this->db->insert('dabur_users',$data);
		if($q){
			$lastid = $this->db->insert_id();
			$data = array(
				'concerning_id'=> $lastid,
				'table_name'=>'dabur_users',
				'created' => date('Y-m-d H:i:s'),
				'created_by' => $_SESSION['user_id']
			);
			$q = $this->db->insert('dabur_create_log',$data);
			return TRUE;
		}
		else{
			return FALSE;
		}
	}
	public function get_single_record($id){
		$q =  $this -> db -> where(['id' => $id])
			-> get('dabur_categories');
		if($q -> num_rows()){
			return $q->result();
		}
		else{
			return FALSE;
		}
	}

	public function get_single_product_pricestructure($id){
		$query = $this -> db->query('SELECT *, (select dabur_products.description from dabur_products where dabur_products.id = dabur_pricestructure.product_id) as description, (select dabur_products.country_id from dabur_products where dabur_products.id = dabur_pricestructure.product_id) as country_id FROM dabur_pricestructure WHERE id = '.$id);

		if($query -> num_rows()){
			return $query->result();
		}
		else{
			return FALSE;
		}
	}
	public function get_single_salesplan($id){
		$query = $this -> db->query('SELECT *, (select dabur_products.description from dabur_products where dabur_products.id = dabur_sales_planing.product_id) as product, (select dabur_products.country_id from dabur_products where dabur_products.id = dabur_sales_planing.product_id) as country_id FROM dabur_sales_planing WHERE id = '.$id);

		if($query -> num_rows()){
			return $query->result();
		}
		else{
			return FALSE;
		}
	}
	public function get_singleuser_record($id){
		$q =  $this -> db -> where(['user_id' => $id])
			-> get('dabur_users');
		if($q -> num_rows()){
			return $q->result();
		}
		else{
			return FALSE;
		}
	}
	public function get_countries($region_id){
		$q =  $this -> db -> where(['region_id' => $region_id])
			-> get('dabur_countries');
		$output = '<option value="">Select Country</option>';

			foreach ($q->result() as $row) {
				$output .= '<option value="'.$row->id.'">'.$row->country_name.'</option>';
		}
			return $output;

	}
	public function get_description($user_type_id){
		$q =  $this -> db -> where(['user_type_id' => $user_type_id])
			-> select('description')
			-> get('dabur_usertype');

		foreach ($q->result() as $row) {
			$output = $row->description;
		}
		return $output;

	}
	public function get_product_description($country_id){
		$q =  $this -> db -> where(['country_id' => $country_id])
			-> select('id, description')
			-> get('dabur_products');
		$output = '<option value="">Select Product</option>';

		foreach ($q->result() as $row) {
			$output .= '<option value="'.$row->id.'">'.$row->description.'</option>';
		}
		return $output;

	}
	public function get_subcategory($category_id){
		$q =  $this -> db -> where(['parent_id' => $category_id])
			-> get('dabur_categories');
		$output = '<option value="">Select Sub Category</option>';

		foreach ($q->result() as $row) {
			$output .= '<option value="'.$row->id.'">'.$row->category_title.'</option>';
		}
		return $output;

	}
	public function get_single_record_region($id){
		$q =  $this -> db -> where(['id' => $id])
			-> get('dabur_regions');
		if($q -> num_rows()){
			return $q->result();
		}
		else{
			return FALSE;
		}
	}
	public function get_single_record_uom($id){
		$q =  $this -> db -> where(['id' => $id])
			-> get('dabur_unit_of_measure');
		if($q -> num_rows()){
			return $q->result();
		}
		else{
			return FALSE;
		}
	}
	public function get_single_record_usertype($id){
		$q =  $this -> db -> where(['user_type_id' => $id])
			-> get('dabur_usertype');
		if($q -> num_rows()){
			return $q->result();
		}
		else{
			return FALSE;
		}
	}
	public function get_single_product($id){
		$q =  $this -> db -> where(['id' => $id])
			-> get('dabur_products');
		if($q -> num_rows()){
			return $q->result();
		}
		else{
			return FALSE;
		}
	}
	public function get_single_country_record($id){
		$q =  $this -> db -> where(['id' => $id])
			-> get('dabur_countries');
		if($q -> num_rows()){
			return $q->result();
		}
		else{
			return FALSE;
		}
	}
	public function get_single_country($id){
		$q =  $this -> db -> where(['id' => $id])
			-> get('dabur_countries');
		if($q -> num_rows()){
			return $q->result();
		}
		else{
			return FALSE;
		}
	}
	public function getregionid($id){
		$q =  $this -> db -> where(['id' => $id])
			-> select('region_id')
			-> get('dabur_distributor');
		if($q -> num_rows()){
			return $q->result();
		}
		else{
			return FALSE;
		}
	}
	public function get_categoryid($id){
		$q =  $this -> db -> where(['id' => $id])
			-> select('category_id')
			-> get('dabur_products');
		if($q -> num_rows()){
			return $q->result();
		}
		else{
			return FALSE;
		}
	}
	public function get_region_countries($id){
		$q =  $this -> db -> where(['region_id' => $id])
			-> get('dabur_countries');
		if($q -> num_rows()){
			return $q->result();
		}
		else{
			return FALSE;
		}
	}
	public function get_subcategory_id($id){
		$q =  $this -> db -> where(['parent_id' => $id])
			-> get('dabur_categories');
		if($q -> num_rows()){
			return $q->result();
		}
		else{
			return FALSE;
		}
	}
	public function get_single_distributor($id){
		$q =  $this -> db -> where(['id' => $id])
			-> get('dabur_distributor');
		if($q -> num_rows()){
			return $q->result();
		}
		else{
			return FALSE;
		}
	}
	public function delete_category($id){
		$data = array('is_deleted' => 'yes');
		$where = "id = $id";
//		 $q = $this->db->update_string('dabur_categories', $data, $where);
		 $q = $this->db->query("UPDATE dabur_categories SET is_deleted='yes' WHERE id = $id");
		 if ($this->db->affected_rows() > 0) {
			 $data = array(
				 'concerning_id'=> $id,
				 'table_name'=>'dabur_categories',
				 'deleted' => date('Y-m-d H:i:s'),
				 'deleted_by' => $_SESSION['user_id']
			 );
			 $q = $this->db->insert('dabur_delete_log',$data);
			return TRUE;
		 }
		 else
			{
				return FALSE;
			}
	}
	public function delete_pricestructure($id){

		$q = $this->db->query("UPDATE dabur_pricestructure  SET is_deleted='yes' WHERE id = $id");
		if ($this->db->affected_rows() > 0) {
			$data = array(
				'concerning_id'=> $id,
				'table_name'=>'dabur_pricestructure',
				'deleted' => date('Y-m-d H:i:s'),
				'deleted_by' => $_SESSION['user_id']
			);
			$q = $this->db->insert('dabur_delete_log',$data);
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	public function delete_salesplan($id){

		$q = $this->db->query("UPDATE dabur_sales_planing  SET is_deleted='yes' WHERE id = $id");
		if ($this->db->affected_rows() > 0) {
			$data = array(
				'concerning_id'=> $id,
				'table_name'=>'dabur_sales_planing',
				'deleted' => date('Y-m-d H:i:s'),
				'deleted_by' => $_SESSION['user_id']
			);
			$q = $this->db->insert('dabur_delete_log',$data);
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	public function delete_region($id){
		$data = array('is_deleted' => 'yes');
		$where = "id = $id";
//		 $q = $this->db->update_string('dabur_categories', $data, $where);
		$q = $this->db->query("UPDATE dabur_regions SET is_deleted='yes' WHERE id = $id");
		if ($this->db->affected_rows() > 0) {
			$data = array(
				'concerning_id'=> $id,
				'table_name'=>'dabur_regions',
				'deleted' => date('Y-m-d H:i:s'),
				'deleted_by' => $_SESSION['user_id']
			);
			$q = $this->db->insert('dabur_delete_log',$data);
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	public function delete_country($id){

		$q = $this->db->query("UPDATE dabur_countries SET is_deleted='yes' WHERE id = $id");
		if ($this->db->affected_rows() > 0) {
			$data = array(
				'concerning_id'=> $id,
				'table_name'=>'dabur_countries',
				'deleted' => date('Y-m-d H:i:s'),
				'deleted_by' => $_SESSION['user_id']
			);
			$q = $this->db->insert('dabur_delete_log',$data);
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	public function delete_user($id){

		$q = $this->db->query("UPDATE dabur_users SET is_deleted='yes' WHERE user_id = $id");
		if ($this->db->affected_rows() > 0) {
			$data = array(
				'concerning_id'=> $id,
				'table_name'=>'dabur_users',
				'deleted' => date('Y-m-d H:i:s'),
				'deleted_by' => $_SESSION['user_id']
			);
			$q = $this->db->insert('dabur_delete_log',$data);
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	public function delete_distributor($id){

		$q = $this->db->query("UPDATE dabur_distributor SET is_deleted='yes' WHERE id = $id");
		if ($this->db->affected_rows() > 0) {
			$data = array(
				'concerning_id'=> $id,
				'table_name'=>'dabur_distributor',
				'deleted' => date('Y-m-d H:i:s'),
				'deleted_by' => $_SESSION['user_id']
			);
			$q = $this->db->insert('dabur_delete_log',$data);
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	public function delete_product($id){

		$q = $this->db->query("UPDATE dabur_products SET is_deleted='yes' WHERE id = $id");
		if ($this->db->affected_rows() > 0) {
			$data = array(
				'concerning_id'=> $id,
				'table_name'=>'dabur_products',
				'deleted' => date('Y-m-d H:i:s'),
				'deleted_by' => $_SESSION['user_id']
			);
			$q = $this->db->insert('dabur_delete_log',$data);
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	public function delete_uom($id){

		$q = $this->db->query("UPDATE dabur_unit_of_measure SET is_deleted='yes' WHERE id = $id");
		if ($this->db->affected_rows() > 0) {
			$data = array(
				'concerning_id'=> $id,
				'table_name'=>'dabur_unit_of_measure',
				'deleted' => date('Y-m-d H:i:s'),
				'deleted_by' => $_SESSION['user_id']
			);
			$q = $this->db->insert('dabur_delete_log',$data);
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	public function delete_usertype($id){

		$q = $this->db->query("UPDATE dabur_usertype SET is_deleted='yes' WHERE user_type_id = $id");
		if ($this->db->affected_rows() > 0) {
			$data = array(
				'concerning_id'=> $id,
				'table_name'=>'dabur_usertype',
				'deleted' => date('Y-m-d H:i:s'),
				'deleted_by' => $_SESSION['user_id']
			);
			$q = $this->db->insert('dabur_delete_log',$data);
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	public function update_category($idd, $category_title, $parent_id, $status){
		$data = array('category_title' => $category_title, 'parent_id' => $parent_id, 'status' => $status );
		$where = "id = $idd";
//		$q = $this->db->update_string('dabur_categories', $data, $where);
		$q = $this->db->query("UPDATE dabur_categories SET category_title= '$category_title',
 		parent_id = $parent_id, status = '$status' WHERE id = $idd");
		if ($this->db->affected_rows() > 0) {
			$data = array(
				'concerning_id'=> $idd,
				'table_name'=>'dabur_categories',
				'edited' => date('Y-m-d H:i:s'),
				'edited_by' => $_SESSION['user_id']
			);
			$q = $this->db->insert('dabur_edit_log',$data);
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	public function update_product($idd, $country_id, $category_id, $sub_category_id, $brand
		,$variant, $size, $uom_id, $fgcode, $description){
		$q = $this->db->query("UPDATE dabur_products SET country_id = $country_id,
 		category_id = $category_id, sub_category_id = $sub_category_id, brand = '$brand',
 		  variant = '$variant', size = $size, uom_id = $uom_id, fgcode = '$fgcode', description = '$description'
 		  WHERE id = $idd");
		if ($this->db->affected_rows() > 0) {
			$data = array(
				'concerning_id'=> $idd,
				'table_name'=>'dabur_products',
				'edited' => date('Y-m-d H:i:s'),
				'edited_by' => $_SESSION['user_id']
			);
			$q = $this->db->insert('dabur_edit_log',$data);
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	public function update_salesplanning($idd, $product_id, $sales, $startdate, $enddate){
		$start = date_create($startdate);
		$start_date = date_format($start,'Y-m-d');
        $end = date_create($enddate);
		$end_date = date_format($end, 'Y-m-d');
	 	$q = $this->db->query("UPDATE dabur_sales_planing SET product_id = $product_id,
 		sales = $sales, start_date = '$start_date', end_date = '$end_date' WHERE id = $idd");
		if ($this->db->affected_rows() > 0) {
			$data = array(
				'concerning_id'=> $idd,
				'table_name'=>'dabur_sales_planing',
				'edited' => date('Y-m-d H:i:s'),
				'edited_by' => $_SESSION['user_id']
			);
			$q = $this->db->insert('dabur_edit_log',$data);
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	public function update_pricestructure($idd, $product_id, $case_config,
	$rsp_aed, $rsp_pc, $ptr_aed, $ptw_aed, $dplc_aed, $billing_price_aed){
		$q = $this->db->query("UPDATE dabur_pricestructure SET product_id = $product_id,
 		case_config = $case_config, rsp_aed = $rsp_aed, rsp_pc = $rsp_pc,
 		  ptr_aed = $ptr_aed, ptw_aed = $ptw_aed, dplc_aed = $dplc_aed, billing_price_aed = $billing_price_aed WHERE id = $idd");
		if ($this->db->affected_rows() > 0) {
			$data = array(
				'concerning_id'=> $idd,
				'table_name'=>'dabur_pricestructure',
				'edited' => date('Y-m-d H:i:s'),
				'edited_by' => $_SESSION['user_id']
			);
			$q = $this->db->insert('dabur_edit_log',$data);
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	public function update_distributor($idd, $distributor_name, $region_id, $country_id, $exchange_rate){
		$q = $this->db->query("UPDATE dabur_distributor SET distributor_name= '$distributor_name',
 		region_id = $region_id, country_id = $country_id, exchange_rate = '$exchange_rate' WHERE id = $idd");
		if ($this->db->affected_rows() > 0) {
			$data = array(
				'concerning_id'=> $idd,
				'table_name'=>'dabur_distributor',
				'edited' => date('Y-m-d H:i:s'),
				'edited_by' => $_SESSION['user_id']
			);
			$q = $this->db->insert('dabur_edit_log',$data);
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	public function update_country($idd, $country_name, $region_id, $currency_name,$currency_code){
		$q = $this->db->query("UPDATE dabur_countries SET country_name= '$country_name', region_id = $region_id,
 		currency_name = '$currency_name', currency_code = $currency_code WHERE id = $idd");
		if ($this->db->affected_rows() > 0) {
			$data = array(
				'concerning_id'=> $idd,
				'table_name'=>'dabur_countries',
				'edited' => date('Y-m-d H:i:s'),
				'edited_by' => $_SESSION['user_id']
			);
			$q = $this->db->insert('dabur_edit_log',$data);
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	public function update_region($idd, $region_title){
		 $q = $this->db->query("UPDATE dabur_regions SET region_title= '$region_title' WHERE id = $idd");
		if ($this->db->affected_rows() > 0) {
			$data = array(
				'concerning_id'=> $idd,
				'table_name'=>'dabur_regions',
				'edited' => date('Y-m-d H:i:s'),
				'edited_by' => $_SESSION['user_id']
			);
			$q = $this->db->insert('dabur_edit_log',$data);
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	public function update_uom($idd, $unit_of_measure){
		$q = $this->db->query("UPDATE dabur_unit_of_measure SET unit_of_measure= '$unit_of_measure' WHERE id = $idd");
		if ($this->db->affected_rows() > 0) {
			$data = array(
				'concerning_id'=> $idd,
				'table_name'=>'dabur_unit_of_measure',
				'edited' => date('Y-m-d H:i:s'),
				'edited_by' => $_SESSION['user_id']
			);
			$q = $this->db->insert('dabur_edit_log',$data);
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	public function update_usertype($idd, $user_type, $description){
		$q = $this->db->query("UPDATE dabur_usertype SET user_type= '$user_type', description = '$description'  WHERE user_type_id = $idd");
		if ($this->db->affected_rows() > 0) {
			$data = array(
				'concerning_id'=> $idd,
				'table_name'=>'dabur_usertype',
				'edited' => date('Y-m-d H:i:s'),
				'edited_by' => $_SESSION['user_id']
			);
			$q = $this->db->insert('dabur_edit_log',$data);
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	public function update_user($idd, $username, $email, $password,
								$first_name, $last_name, $phone, $user_type_id, $status){
		$q = $this->db->query("UPDATE dabur_users SET username= '$username', email = '$email', password = '$password'
  		,first_name = '$first_name', last_name = '$last_name', phone = $phone, user_type_id = $user_type_id
  		  	, status = '$status' WHERE user_id = $idd");
		if ($this->db->affected_rows() > 0) {
			$data = array(
				'concerning_id'=> $idd,
				'table_name'=>'dabur_users',
				'edited' => date('Y-m-d H:i:s'),
				'edited_by' => $_SESSION['user_id']
			);
			$q = $this->db->insert('dabur_edit_log',$data);
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	public function get_all_region(){
		$q =  $this -> db ->order_by('id', 'DESC')
			-> where(['is_deleted' => 'no'])
			->  get('dabur_regions');
		if($q -> num_rows()){
			return $q->result();
		}
		else{
			return FALSE;
		}
	}
	public function get_all_uom(){
		$q =  $this -> db ->order_by('id', 'DESC')
			-> where(['is_deleted' => 'no'])
			->  get('dabur_unit_of_measure');
		if($q -> num_rows()){
			return $q->result();
		}
		else{
			return FALSE;
		}
	}
	public function all_countries(){
		$q =  $this -> db ->order_by('id', 'DESC')
			-> where(['is_deleted' => 'no'])
			->  get('dabur_countries');
		if($q -> num_rows()){
			return $q->result();
		}
		else{
			return FALSE;
		}
	}
	public function get_all_usertype(){
		$q =  $this -> db ->order_by('user_type_id', 'DESC')
			-> where(['is_deleted' => 'no'])
			->  get('dabur_usertype');
		if($q -> num_rows()){
			return $q->result();
		}
		else{
			return FALSE;
		}
	}
	public function get_all_countries(){
		$this -> db -> order_by('dabur_countries.id', 'DESC');
		$this -> db -> where(['dabur_countries.is_deleted' => 'no']);
		$this->db->select('dabur_countries.id, dabur_countries.currency_name, dabur_countries.country_name, dabur_countries.currency_code, dabur_regions.region_title');
		$this->db->from('dabur_countries');
		$this->db->join('dabur_regions', 'dabur_countries.region_id = dabur_regions.id');
		$query = $this->db->get();
		if($query -> num_rows()){
			return $query->result();
		}
		else{
			return FALSE;
		}
	}
	public function get_all_products(){
//		SELECT dabur_products.id,dabur_products.brand, dabur_products.variant,
//		dabur_products.size, dabur_products.fgcode, dabur_products.description,
//		dabur_categories.category_title as Category, (select dabur_categories.category_title
//		from dabur_categories WHERE dabur_products.sub_category_id = dabur_categories.id) as
//		subCategory ,(select dabur_unit_of_measure.unit_of_measure FROM dabur_unit_of_measure
//		WHERE dabur_unit_of_measure.id = dabur_products.uom_id) as uom from dabur_products,
//		dabur_categories, dabur_unit_of_measure WHERE dabur_products.category_id = dabur_categories.id
//		$this -> db -> order_by('dabur_products.id', 'DESC');
//		$this -> db -> where(['dabur_products.is_deleted' => 'no', 'dabur_products.category_id' => 'dabur_categories.id']);
//		$this->db->select('dabur_products.id, dabur_products.brand, dabur_products.variant, dabur_products.size,
//		 dabur_products.fgcode, dabur_products.description, dabur_categories.category_title as Category');
		$query = $this -> db->query('SELECT dabur_products.id, dabur_products.brand, dabur_products.variant, dabur_products.size, dabur_products.fgcode, dabur_products.description, (select dabur_categories.category_title from dabur_categories WHERE dabur_products.category_id = dabur_categories.id) as category, (select dabur_categories.category_title from dabur_categories WHERE dabur_products.sub_category_id = dabur_categories.id) as subcategory ,(select dabur_unit_of_measure.unit_of_measure FROM dabur_unit_of_measure WHERE dabur_unit_of_measure.id = dabur_products.uom_id) as uom, (select dabur_countries.country_name FROM dabur_countries WHERE dabur_countries.id = dabur_products.country_id) as country from dabur_products WHERE dabur_products.is_deleted = "no" ');
//		$this->db->from('dabur_unit_of_measure','dabur_products','dabur_categories');
//		$this->db->join('dabur_regions', 'dabur_countries.region_id = dabur_regions.id');
//		$query = $this->db->get();
//		$q = "SELECT dabur_products.id,dabur_products.brand, dabur_products.variant,
//		dabur_products.size, dabur_products.fgcode, dabur_products.description,
//		dabur_categories.category_title as Category, (select dabur_categories.category_title
//		from dabur_categories WHERE dabur_products.sub_category_id = dabur_categories.id) as
//		subCategory ,(select dabur_unit_of_measure.unit_of_measure FROM dabur_unit_of_measure
//		WHERE dabur_unit_of_measure.id = dabur_products.uom_id) as uom from dabur_products,
//		dabur_categories, dabur_unit_of_measure WHERE dabur_products.category_id = dabur_categories.id";
//		$query = $this -> db -> query();
//		print_r($query);
//		exit;
		if($query -> num_rows()){
			return $query->result();
		}
		else{
			return FALSE;
		}
	}
	public function get_distinct_country(){
		$query = $this -> db->query('SELECT DISTINCT dabur_products.country_id, (select dabur_countries.country_name FROM dabur_countries where id = dabur_products.country_id) as country_name FROM dabur_products');
		if($query -> num_rows()){
			return $query->result();
		}
		else{
			return FALSE;
		}
	}
	public function get_country(){
		$query = $this -> db->query('SELECT * FROM dabur_countries where is_deleted = \'no\'');
		if($query -> num_rows()){
			return $query->result();
		}
		else{
			return FALSE;
		}
	}
	public function get_all_distributors(){
		$this -> db -> order_by('dabur_distributor.id', 'DESC');
		$this -> db -> where(['dabur_distributor.is_deleted' => 'no']);
		$this->db->select('dabur_distributor.id, dabur_distributor.exchange_rate, dabur_distributor.distributor_name, dabur_regions.region_title, dabur_countries.country_name');
		$this->db->from('dabur_distributor');
		$this->db->join('dabur_regions', 'dabur_distributor.region_id = dabur_regions.id');
		$this->db->join('dabur_countries', 'dabur_distributor.country_id = dabur_countries.id');
		$query = $this->db->get();
		if($query -> num_rows()){
			return $query->result();
		}
		else{
			return FALSE;
		}
	}
	public function insert_region($region_title){
		$data = array(
			'region_title'=> $region_title
		);

		$q = $this->db->insert('dabur_regions', $data);
		if($q){
			$lastid = $this->db->insert_id();
			$data = array(
				'concerning_id'=> $lastid,
				'table_name'=>'dabur_regions',
				'created' => date('Y-m-d H:i:s'),
				'created_by' => $_SESSION['user_id']
			);
			$q = $this->db->insert('dabur_create_log',$data);
			return TRUE;
		}
		else{
			return FALSE;
		}
	}
	public function insert_pricestructure($product_id, $case_config,
		$rsp_aed, $rsp_pc, $ptr_aed, $ptw_aed, $dplc_aed, $billing_price_aed){
		$data = array(
			'product_id'=> $product_id,
			'case_config'=> $case_config,
			'rsp_aed'=> $rsp_aed,
			'rsp_pc'=> $rsp_pc,
			'ptr_aed'=> $ptr_aed,
			'ptw_aed'=> $ptw_aed,
			'dplc_aed'=> $dplc_aed,
			'billing_price_aed'=> $billing_price_aed
		);

		$q = $this->db->insert('dabur_pricestructure', $data);
		if($q){
			$lastid = $this->db->insert_id();
			$data = array(
				'concerning_id'=> $lastid,
				'table_name'=>'dabur_pricestructure',
				'created' => date('Y-m-d H:i:s'),
				'created_by' => $_SESSION['user_id']
			);
			$q = $this->db->insert('dabur_create_log',$data);
			return TRUE;
		}
		else{
			return FALSE;
		}
	}
	public function insert_uom($unit_of_measure){
		$data = array(
			'unit_of_measure'=> $unit_of_measure
		);

		$q = $this->db->insert('dabur_unit_of_measure', $data);
		if($q){
			$lastid = $this->db->insert_id();
			$data = array(
				'concerning_id'=> $lastid,
				'table_name'=>'dabur_unit_of_measure',
				'created' => date('Y-m-d H:i:s'),
				'created_by' => $_SESSION['user_id']
			);
			$q = $this->db->insert('dabur_create_log',$data);
			return TRUE;
		}
		else{
			return FALSE;
		}
	}
	public function insert_usertype($user_type, $description){
		$data = array(
			'user_type'=> $user_type,
			'description' => $description
		);

		$q = $this->db->insert('dabur_usertype', $data);
		if($q){
			$lastid = $this->db->insert_id();
			$data = array(
				'concerning_id'=> $lastid,
				'table_name'=>'dabur_usertype',
				'created' => date('Y-m-d H:i:s'),
				'created_by' => $_SESSION['user_id']
			);
			$q = $this->db->insert('dabur_create_log',$data);
			return TRUE;
		}
		else{
			return FALSE;
		}
	}

	public function insert_distributor($distributor_name, $region_id, $country_id, $exchange_rate){
		$data = array(
			'distributor_name'=> $distributor_name,
			'region_id' => $region_id,
			'country_id' => $country_id,
			'exchange_rate' => $exchange_rate
		);

		$q = $this->db->insert('dabur_distributor', $data);
		if($q){
			$lastid = $this->db->insert_id();
			$data = array(
				'concerning_id'=> $lastid,
				'table_name'=>'dabur_distributor',
				'created' => date('Y-m-d H:i:s'),
				'created_by' => $_SESSION['user_id']
			);
			$q = $this->db->insert('dabur_create_log',$data);
			return TRUE;
		}
		else{
			return FALSE;
		}
	}
	public function insert_country($country_name, $region_id, $currency_name, $currency_code){
		$data = array(
			'country_name'=> $country_name,
			'region_id'=> $region_id,
			'currency_name'=> $currency_name,
			'currency_code'=> $currency_code

		);

		$q = $this->db->insert('dabur_countries', $data);
		if($q){
			$lastid = $this->db->insert_id();
			$data = array(
				'concerning_id'=> $lastid,
				'table_name'=>'dabur_countries',
				'created' => date('Y-m-d H:i:s'),
				'created_by' => $_SESSION['user_id']
			);
			$q = $this->db->insert('dabur_create_log',$data);
			return TRUE;
		}
		else{
			return FALSE;
		}
	}
}
?>
