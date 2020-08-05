<?php
class Admin extends My_Controller{


public function index(){
    $username = $this -> input -> post('username');
    $password = $this -> input -> post('password');

    // echo "username is ".$username."</br> password is ".$password;
    $this->load->model("loginmodel");
    $userdata = $this->loginmodel->isvalidate($username, $password);
    // print_r($login_id);
    // exit;
    if($userdata){
        foreach($userdata as $udata){
            // echo udata->user_id;
        $this -> session ->set_userdata('user_id', $udata->user_id);
        $this -> session ->set_userdata('username', $udata->username);
        $this -> session ->set_userdata('email', $udata->email);
        $this -> session ->set_userdata('first_name', $udata->first_name);
        $this -> session ->set_userdata('last_name', $udata->last_name);
        $user_type = $udata->user_type_id;
			 $usertype = $this->loginmodel->usertype($user_type);
//			 print_r($usertype);
			 $result = $usertype[0]->user_type;
//			echo $result;
//			exit;
        $this -> session ->set_userdata('user_type', $result);
		 }

        //   print_r($this->session);
        //   exit
       return redirect('Home/index');
    }
    else{
            $this -> session -> set_flashdata('login_failed', 'Invalid Username/Password');
            return redirect('Login/index');
    }
}
	public function get_description(){
		if($this->input->post('user_type_id'))
		{
			$user_type_id = $this->input->post('user_type_id');
			$this->load->model("adminmodel");
			echo $decription= $this -> adminmodel -> get_description($user_type_id);
		}
	}
	public function get_product_description(){
		if($this->input->post('country_id'))
		{
			$country_id = $this->input->post('country_id');
			$this->load->model("adminmodel");
			echo $product= $this -> adminmodel -> get_product_description($country_id);
		}
	}
	public function get_countries(){
		if($this->input->post('region_id'))
		{
			$region_id = $this->input->post('region_id');
			$this->load->model("adminmodel");
			echo $countries = $this -> adminmodel -> get_countries($region_id);
		}
	}
	public function get_subcategory(){
		if($this->input->post('category_id'))
		{
			$category_id = $this->input->post('category_id');
			$this->load->model("adminmodel");
			echo $category_id = $this -> adminmodel -> get_subcategory($category_id);
		}
	}
    public function all_categories(){
    $this->load->model("adminmodel");
    $category = $this -> adminmodel -> get_all_categories();
    $this -> load -> view('admin/all_categories', ['category' => $category]);
    }
	public function all_sales_planning(){
		$this->load->model("adminmodel");
		$planning = $this -> adminmodel -> get_all_salesplanning();
		$this -> load -> view('admin/all_sales_planning', ['planning' => $planning]
		);
	}
	public function all_users(){
		$this->load->model("adminmodel");
		$users = $this -> adminmodel -> get_all_users();
		$this -> load -> view('admin/all_users', ['users' => $users]);
	}
	public function all_countries(){
		$this->load->model("adminmodel");
		$countries = $this -> adminmodel -> get_all_countries();
		$this -> load -> view('admin/all_countries', ['countries' => $countries]);

	}
	public function all_distributors(){
		$this->load->model("adminmodel");
		$distributors = $this -> adminmodel -> get_all_distributors();
		$this -> load -> view('admin/all_distributors', ['distributors' => $distributors]);

	}
	public function all_products(){
		$this->load->model("adminmodel");
		$products = $this -> adminmodel -> get_all_products();
		$this -> load -> view('admin/all_products', ['products' => $products]);

	}
	public function all_pricestructure(){
		$this->load->model("adminmodel");
		$pricestructure = $this -> adminmodel -> get_all_pricestructure();
		$this -> load -> view('admin/all_pricestructure', ['pricestructure' => $pricestructure]
		);

	}

    public function add_category(){
    $this->load->model("adminmodel");
    $parentid = $this -> adminmodel -> get_parent_id();
    $this -> load -> view('admin/add_category', ['parentid' => $parentid]);

    }
	public function add_pricestructure(){
		$this->load->model("adminmodel");
		$country = $this -> adminmodel -> get_distinct_country();
		$this -> load -> view('admin/add_pricestructure', ['country' => $country]);

	}
	public function add_distributor(){
		$this->load->model("adminmodel");
		$region = $this -> adminmodel -> get_all_region();
		$this -> load -> view('admin/add_distributor', ['region' => $region]);

	}
	public function add_product(){
		$this->load->model("adminmodel");
		$parentid = $this -> adminmodel -> get_parent_id();
		$uom= $this -> adminmodel -> get_all_uom();
		$countries = $this -> adminmodel -> all_countries();
		$this -> load -> view('admin/add_product', ['uom' => $uom, 'parentid' => $parentid, 'countries' => $countries]);

	}
	public function add_sales_plan(){
		$this->load->model("adminmodel");
//		$parentid = $this -> adminmodel -> get_parent_id();
//		$uom= $this -> adminmodel -> get_all_uom();
//		$countries = $this -> adminmodel -> all_countries();
		$country = $this -> adminmodel -> get_country();
		$this -> load -> view('admin/add_sales_plan', ['country' => $country]);

	}
	public function add_country(){
		$this->load->model("adminmodel");
		$regions = $this -> adminmodel -> get_all_region();
		$this -> load -> view('admin/add_country', ['regions' => $regions]);
	}
	public function add_user(){
		$this->load->model("adminmodel");
		$user_type = $this -> adminmodel -> get_user_type();
		$this -> load -> view('admin/add_user', ['user_type' => $user_type]);
	}
	public function edit_category(){
		$id = $this -> uri -> segment(3);
		$this->load->model("adminmodel");
		$parentid = $this -> adminmodel -> get_parent_id();
		$singlerecord = $this -> adminmodel -> get_single_record($id);
		$this -> load -> view('admin/edit_category', ['singlerecord' => $singlerecord, 'parentid' => $parentid]);

	}
	public function edit_user(){
		$id = $this -> uri -> segment(3);
		$this->load->model("adminmodel");
		$parentid = $this -> adminmodel -> get_parent_id();
		$user_type = $this -> adminmodel -> get_user_type();
		$singleuserrecord = $this -> adminmodel -> get_singleuser_record($id);
		$user_type_id = $singleuserrecord[0] -> user_type_id;
		$description = $this -> adminmodel -> get_description($user_type_id);
		$this -> load -> view('admin/edit_user', ['singleuserrecord' => $singleuserrecord, 'user_type' => $user_type, 'description' => $description]);

	}
	public function edit_country(){
		$id = $this -> uri -> segment(3);
		$this->load->model("adminmodel");
		$regions = $this -> adminmodel -> get_all_region();
		$single_country_record = $this -> adminmodel -> get_single_country_record($id);
		$this -> load -> view('admin/edit_country', ['single_country_record' => $single_country_record, 'regions' => $regions]);

	}
	public function edit_region(){
		$id = $this -> uri -> segment(3);
		$this->load->model("adminmodel");
		$singlerecordregion = $this -> adminmodel -> get_single_record_region($id);
		$region = $this -> adminmodel -> get_all_region();
		$this -> load -> view('admin/region', ['singlerecordregion' => $singlerecordregion, 'region' => $region]);

	}
	public function edit_uom(){
		$id = $this -> uri -> segment(3);
		$this->load->model("adminmodel");
		$singlerecorduom = $this -> adminmodel -> get_single_record_uom($id);
		$uom= $this -> adminmodel -> get_all_uom();
		$this -> load -> view('admin/uom', ['singlerecorduom' => $singlerecorduom, 'uom' => $uom]);

	}
	public function edit_usertype(){
		$id = $this -> uri -> segment(3);
		$this->load->model("adminmodel");
		$singlerecordusertype = $this -> adminmodel -> get_single_record_usertype($id);
		$usertype= $this -> adminmodel -> get_all_usertype();
		$this -> load -> view('admin/usertype', ['singlerecordusertype' => $singlerecordusertype, 'usertype' => $usertype]);

	}
	public function edit_distributor(){
		$id = $this -> uri -> segment(3);
		$this->load->model("adminmodel");
		$singledistributor = $this -> adminmodel -> get_single_distributor($id);
		$getregionid = $this -> adminmodel -> getregionid($id);
		$region_id = $getregionid[0] -> region_id;
		$getsinglecountry = $this -> adminmodel -> get_region_countries($region_id);
		$region = $this -> adminmodel -> get_all_region();
		$this -> load -> view('admin/edit_distributor', ['singledistributor' => $singledistributor, 'region' => $region, 'getsinglecountry' => $getsinglecountry]);

	}
	public function edit_salesplan(){
		$id = $this -> uri -> segment(3);
		$this->load->model("adminmodel");
		$singlesalesplan = $this -> adminmodel -> get_single_salesplan($id);
		$country = $this -> adminmodel -> get_country();
		$this -> load -> view('admin/edit_salesplan', ['singlesalesplan' => $singlesalesplan, 'country' => $country]);

	}
	public function edit_product(){
		$id = $this -> uri -> segment(3);
		$this->load->model("adminmodel");
		$singleproduct = $this -> adminmodel -> get_single_product($id);
		$parentid = $this -> adminmodel -> get_parent_id();
		$categoryid = $this -> adminmodel -> get_categoryid($id);
		$category_id = $categoryid[0] -> category_id;
		$getsubcategory = $this -> adminmodel -> get_subcategory_id($category_id);
//		echo '<pre/>';
//		print_r($getsubcategory);
//		exit;
		$uom= $this -> adminmodel -> get_all_uom();
		$countries = $this -> adminmodel -> all_countries();
		$this -> load -> view('admin/edit_product', ['singleproduct' => $singleproduct, 'countries' => $countries, 'uom' => $uom, 'parentid' => $parentid, 'getsubcategory'=>$getsubcategory]);

	}
	public function edit_pricestructure(){
		$id = $this -> uri -> segment(3);
		$this->load->model("adminmodel");
		$singlepricestructure = $this -> adminmodel -> get_single_product_pricestructure($id);
		$country = $this -> adminmodel -> get_distinct_country();
		$this -> load -> view('admin/edit_pricestructure', ['singlepricestructure' => $singlepricestructure, 'country' => $country]);

	}
	public function delete_category(){
		$id = $this -> uri -> segment(3);
		$this->load->model("adminmodel");
		$delete_category = $this -> adminmodel -> delete_category($id);
		if($delete_category == TRUE){
			$this -> session -> set_flashdata('deleted', 'Row Deleted Successfully');
			return redirect('Admin/all_categories');
		}else{
			$this -> session -> set_flashdata('error', 'Row Deletion Failed');
			return redirect('Admin/all_categories');
		}
//		$this -> load -> view('admin/edit_category', ['singlerecord' => $delete_category]);

	}
	public function delete_pricestructure(){
		$id = $this -> uri -> segment(3);
		$this->load->model("adminmodel");
		$delete_pricestructure = $this -> adminmodel -> delete_pricestructure($id);
		if($delete_pricestructure == TRUE){
			$this -> session -> set_flashdata('deleted', 'Row Deleted Successfully');
			return redirect('Admin/all_pricestructure');
		}else{
			$this -> session -> set_flashdata('error', 'Row Deletion Failed');
			return redirect('Admin/all_pricestructure');
		}
	}
	public function delete_salesplan(){
		$id = $this -> uri -> segment(3);
		$this->load->model("adminmodel");
		$delete_salesplan = $this -> adminmodel -> delete_salesplan($id);
		if($delete_salesplan == TRUE){
			$this -> session -> set_flashdata('deleted', 'Row Deleted Successfully');
			return redirect('Admin/all_sales_planning');
		}else{
			$this -> session -> set_flashdata('error', 'Row Deletion Failed');
			return redirect('Admin/all_sales_planning');
		}
	}
	public function delete_region(){
		$id = $this -> uri -> segment(3);
		$this->load->model("adminmodel");
		$delete_region = $this -> adminmodel -> delete_region($id);
		if($delete_region == TRUE){
			$this -> session -> set_flashdata('deleted', 'Row Deleted Successfully');
			return redirect('Admin/region');
		}else{
			$this -> session -> set_flashdata('error', 'Row Deletion Failed');
			return redirect('Admin/region');
		}
	}
	public function delete_user(){
		$id = $this -> uri -> segment(3);
		$this->load->model("adminmodel");
		$delete_user = $this -> adminmodel -> delete_user($id);
		if($delete_user == TRUE){
			$this -> session -> set_flashdata('deleted', 'Row Deleted Successfully');
			return redirect('Admin/all_users');
		}else{
			$this -> session -> set_flashdata('error', 'Row Deletion Failed');
			return redirect('Admin/all_users');
		}
	}
	public function delete_country(){
		$id = $this -> uri -> segment(3);
		$this->load->model("adminmodel");
		$delete_country = $this -> adminmodel -> delete_country($id);
		if($delete_country == TRUE){
			$this -> session -> set_flashdata('deleted', 'Row Deleted Successfully');
			return redirect('Admin/all_countries');
		}else{
			$this -> session -> set_flashdata('error', 'Row Deletion Failed');
			return redirect('Admin/all_countries');
		}
	}
	public function delete_product(){
		$id = $this -> uri -> segment(3);
		$this->load->model("adminmodel");
		$delete_product = $this -> adminmodel -> delete_product($id);
		if($delete_product == TRUE){
			$this -> session -> set_flashdata('deleted', 'Row Deleted Successfully');
			return redirect('Admin/all_products');
		}else{
			$this -> session -> set_flashdata('error', 'Row Deletion Failed');
			return redirect('Admin/all_products');
		}
	}
	public function delete_distributor(){
		$id = $this -> uri -> segment(3);
		$this->load->model("adminmodel");
		$delete_distributor = $this -> adminmodel -> delete_distributor($id);
		if($delete_distributor == TRUE){
			$this -> session -> set_flashdata('deleted', 'Row Deleted Successfully');
			return redirect('Admin/all_distributors');
		}else{
			$this -> session -> set_flashdata('error', 'Row Deletion Failed');
			return redirect('Admin/all_distributors');
		}
	}
	public function delete_uom(){
		$id = $this -> uri -> segment(3);
		$this->load->model("adminmodel");
		$delete_uom = $this -> adminmodel -> delete_uom($id);
		if($delete_uom == TRUE){
			$this -> session -> set_flashdata('deleted', 'Row Deleted Successfully');
			return redirect('Admin/uom');
		}else{
			$this -> session -> set_flashdata('error', 'Row Deletion Failed');
			return redirect('Admin/uom');
		}
	}
	public function delete_usertype(){
		$id = $this -> uri -> segment(3);
		$this->load->model("adminmodel");
		$delete_usertype = $this -> adminmodel -> delete_usertype($id);
		if($delete_usertype == TRUE){
			$this -> session -> set_flashdata('deleted', 'Row Deleted Successfully');
			return redirect('Admin/usertype');
		}else{
			$this -> session -> set_flashdata('error', 'Row Deletion Failed');
			return redirect('Admin/usertype');
		}
	}
	public function update_category(){
		$idd = $this -> input -> post('id');
		$category_title = $this -> input -> post('category_title');
		$parent_id = $this -> input -> post('parent_id');
		$status = $this -> input -> post('status');
		$this->load->model("adminmodel");
		$update_category = $this -> adminmodel -> update_category($idd, $category_title, $parent_id, $status);
		if($update_category == TRUE){
			$this -> session -> set_flashdata('updated', 'Row Updated Successfully');
			return redirect('Admin/all_categories');
		}else{
			$this -> session -> set_flashdata('error', 'Row Updation Failed');
			return redirect('Admin/edit_category');
		}
	}
	public function update_salesplanning(){
		$idd = $this -> input -> post('id');
		$product_id = $this -> input -> post('product_id');
		$sales = $this -> input -> post('sales');
		$month = $this -> input -> post('month');
		$m = date_create($month);
		$start_date = date_format($m, 'Y-m-01');
		$end_date = date_format($m, 'Y-m-t');
		$this->load->model("adminmodel");
		$update_salesplanning = $this -> adminmodel -> update_salesplanning($idd, $product_id, $sales, $start_date, $end_date);
		if($update_salesplanning == TRUE){
			$this -> session -> set_flashdata('updated', 'Row Updated Successfully');
			return redirect('Admin/all_sales_planning');
		}else{
			$this -> session -> set_flashdata('error', 'Row Updation Failed');
			return redirect('Admin/edit_salesplan/'.$idd);
		}
	}
	public function update_pricestructure(){
		$idd = $this -> input -> post('id');
		$product_id = $this -> input -> post('product_id');
//		$country_id = $this -> input -> post('country_id');
		$case_config = $this -> input -> post('case_config');
		$rsp_aed = $this -> input -> post('rsp_aed');
		$rsp_pc = $this -> input -> post('rsp_pc');
		$ptr_aed = $this -> input -> post('ptr_aed');
		$ptw_aed = $this -> input -> post('ptw_aed');
		$dplc_aed = $this -> input -> post('dplc_aed');
		$billing_price_aed = $this -> input -> post('billing_price_aed');
		$this->load->model("adminmodel");
		$update_pricestructure = $this -> adminmodel -> update_pricestructure($idd, $product_id, $case_config,
			$rsp_aed,$rsp_pc, $ptr_aed, $ptw_aed, $dplc_aed, $billing_price_aed );
		if($update_pricestructure == TRUE){
			$this -> session -> set_flashdata('updated', 'Row Updated Successfully');
			return redirect('Admin/all_pricestructure');
		}else{
			$this -> session -> set_flashdata('error', 'Row Updation Failed');
			return redirect('Admin/edit_pricestructure');
		}
	}
	public function update_user(){
		$idd = $this -> input -> post('user_id');
		$username = $this -> input -> post('username');
		$email = $this -> input -> post('email');
		$password = $this -> input -> post('password');
		$first_name = $this -> input -> post('first_name');
		$last_name = $this -> input -> post('last_name');
		$phone = $this -> input -> post('phone');
		$user_type_id = $this -> input -> post('user_type_id');
//		$description = $this -> input -> post('description');
		$status = $this -> input -> post('status');
		$this->load->model("adminmodel");
		$update_user = $this -> adminmodel -> update_user($idd, $username, $email, $password,
			$first_name, $last_name, $phone, $user_type_id, $status);
		if($update_user == TRUE){
			$this -> session -> set_flashdata('updated', 'Row Updated Successfully');
			return redirect('Admin/all_users');
		}else{
			$this -> session -> set_flashdata('error', 'Row Updation Failed');
			return redirect('Admin/all_users');
		}
	}
	public function update_distributor(){
		$idd = $this -> input -> post('id');
		$distributor_name = $this -> input -> post('distributor_name');
		$region_id = $this -> input -> post('region_id');
		$country_id = $this -> input -> post('country_id');
		$exchange_rate = $this -> input -> post('exchange_rate');
		$this->load->model("adminmodel");
		$update_distributor = $this -> adminmodel -> update_distributor($idd, $distributor_name, $region_id, $country_id, $exchange_rate);
		if($update_distributor == TRUE){
			$this -> session -> set_flashdata('updated', 'Row Updated Successfully');
			return redirect('Admin/all_distributors');
		}else{
			$this -> session -> set_flashdata('error', 'Row Updation Failed');
			return redirect('Admin/all_distributors');
		}
	}
	public function update_country(){
		$idd = $this -> input -> post('id');
		$country_name = $this -> input -> post('country_name');
		$region_id = $this -> input -> post('region_id');
		$currency_name = $this -> input -> post('currency_name');
		$currency_code = $this -> input -> post('currency_code');
		$this->load->model("adminmodel");
		$update_country = $this -> adminmodel -> update_country($idd, $country_name, $region_id, $currency_name,$currency_code);
		if($update_country == TRUE){
			$this -> session -> set_flashdata('updated', 'Row Updated Successfully');
			return redirect('Admin/all_countries');
		}else{
			$this -> session -> set_flashdata('error', 'Row Updation Failed');
			return redirect('Admin/all_countries');
		}
	}
	public function update_region(){
		$idd = $this -> input -> post('id');
		$region_title = $this -> input -> post('region_title');

		$this->load->model("adminmodel");
		$update_region = $this -> adminmodel -> update_region($idd, $region_title);
		if($update_region == TRUE){
			$this -> session -> set_flashdata('updated', 'Row Updated Successfully');
			return redirect('Admin/region');
		}else{
			$this -> session -> set_flashdata('error', 'Row Updation Failed');
			return redirect('Admin/region');
		}
	}
	public function update_uom(){
		$idd = $this -> input -> post('id');
		$unit_of_measure = $this -> input -> post('unit_of_measure');

		$this->load->model("adminmodel");
		$update_uom = $this -> adminmodel -> update_uom($idd, $unit_of_measure);
		if($update_uom == TRUE){
			$this -> session -> set_flashdata('updated', 'Row Updated Successfully');
			return redirect('Admin/uom');
		}else{
			$this -> session -> set_flashdata('error', 'Row Updation Failed');
			return redirect('Admin/uom');
		}
	}
	public function update_usertype(){
		$idd = $this -> input -> post('user_type_id');
		$user_type = $this -> input -> post('user_type');
		$description = $this -> input -> post('description');

		$this->load->model("adminmodel");
		$update_usertype = $this -> adminmodel -> update_usertype($idd, $user_type, $description);
		if($update_usertype == TRUE){
			$this -> session -> set_flashdata('updated', 'Row Updated Successfully');
			return redirect('Admin/usertype');
		}else{
			$this -> session -> set_flashdata('error', 'Row Updation Failed');
			return redirect('Admin/usertype');
		}
	}
	public function update_product(){
		$idd = $this -> input -> post('id');
		$country_id = $this -> input -> post('country_id');
		$category_id = $this -> input -> post('category_id');
		$sub_category_id = $this -> input -> post('sub_category_id');
		$brand = $this -> input -> post('brand');
		$variant = $this -> input -> post('variant');
		$size = $this -> input -> post('size');
		$uom_id = $this -> input -> post('uom_id');
		$fgcode = $this -> input -> post('fgcode');
		$description = $this -> input -> post('description');
//		exit;
		$this->load->model("adminmodel");
		$update_product = $this -> adminmodel -> update_product($idd, $country_id, $category_id, $sub_category_id, $brand
			,$variant, $size,$uom_id, $fgcode, $description);
		if($update_product == TRUE){
			$this -> session -> set_flashdata('updated', 'Row Updated Successfully');
			return redirect('Admin/all_products');
		}else{
			$this -> session -> set_flashdata('error', 'Row Updation Failed');
			return redirect('Admin/all_products');
		}
	}
	public function insert_category(){
        $category_title = $this -> input -> post('category_title');
        $parent_id = $this -> input -> post('parent_id');
        $status = $this -> input -> post('status');

        $this->load->model("adminmodel");
        $insert_category = $this -> adminmodel -> insert_category($category_title, $parent_id, $status);
        if($insert_category == TRUE){
            $this -> session -> set_flashdata('inserted', 'Data Inserted');
            return redirect('Admin/all_categories');
        }
    }
	public function insert_pricestructure(){
		$product_id = $this -> input -> post('product_id');
		$country_id = $this -> input -> post('country_id');
		$case_config = $this -> input -> post('case_config');
		$rsp_aed = $this -> input -> post('rsp_aed');
		$rsp_pc = $this -> input -> post('rsp_pc');
		$ptr_aed = $this -> input -> post('ptr_aed');
		$ptw_aed = $this -> input -> post('ptw_aed');
		$dplc_aed = $this -> input -> post('dplc_aed');
		$billing_price_aed = $this -> input -> post('billing_price_aed');

		$this->load->model("adminmodel");
		$insert_pricestructure = $this -> adminmodel -> insert_pricestructure($product_id, $case_config,
			$rsp_aed, $rsp_pc, $ptr_aed, $ptw_aed, $dplc_aed, $billing_price_aed);
		if($insert_pricestructure == TRUE){
			$this -> session -> set_flashdata('inserted', 'Data Inserted');
			return redirect('Admin/all_pricestructure');
		}
	}

	public function insert_salesplanning(){
		$product_id = $this -> input -> post('product_id');
		$sales = $this -> input -> post('sales');
		$month = $this -> input -> post('month');
		$m = date_create($month);
		$start_date = date_format($m, 'Y-m-01');
		$end_date = date_format($m, 'Y-m-t');
//		$startdate = $this -> input -> post('start_date');
//		$enddate = $this -> input -> post('end_date');
//		$start = date_create($startdate);
//		$end = date_create($enddate);
//		$start_date = date_format($start, "Y-m-d");
//		$end_date = date_format($end, "Y-m-d");
		$this->load->model("adminmodel");
		$insert_salesplanning = $this -> adminmodel -> insert_salesplanning($product_id, $sales, $start_date, $end_date);
		if($insert_salesplanning == TRUE){
			$this -> session -> set_flashdata('inserted', 'Data Inserted');
			return redirect('Admin/all_sales_planning');
		}
	}

	public function insert_user(){
		$username = $this -> input -> post('username');
		$email = $this -> input -> post('email');
		$password = $this -> input -> post('password');
		$first_name = $this -> input -> post('first_name');
		$last_name = $this -> input -> post('last_name');
		$phone = $this -> input -> post('phone');
		$user_type_id = $this -> input -> post('user_type_id');
//		$description = $this -> input -> post('description');
		$status = $this -> input -> post('status');
		$this->load->model("adminmodel");
		$insert_user = $this -> adminmodel -> insert_user($username, $email, $password,
			$first_name, $last_name, $phone, $user_type_id, $status);
		if($insert_user == TRUE){
			$this -> session -> set_flashdata('inserted', 'Data Inserted');
			return redirect('Admin/all_users');
		}

	}
	public function insert_product(){
		$country_id = $this -> input -> post('country_id');
		$category_id = $this -> input -> post('category_id');
		$sub_category_id = $this -> input -> post('sub_category_id');
		$brand = $this -> input -> post('brand');
		$variant = $this -> input -> post('variant');
		$size = $this -> input -> post('size');
		$uom_id = $this -> input -> post('uom_id');
		$fgcode = $this -> input -> post('fgcode');
		$description = $this -> input -> post('description');
		$this->load->model("adminmodel");
		$insert_product = $this -> adminmodel -> insert_product($country_id, $category_id, $sub_category_id, $brand
		,$variant, $size,$uom_id, $fgcode, $description );
		if($insert_product == TRUE){
			$this -> session -> set_flashdata('inserted', 'Data Inserted');
			return redirect('Admin/all_products');
		}

	}
	public function insert_distributor(){
		$distributor_name = $this -> input -> post('distributor_name');
		$region_id = $this -> input -> post('region_id');
		$country_id = $this -> input -> post('country_id');
		$exchange_rate = $this -> input -> post('exchange_rate');

		$this->load->model("adminmodel");
		$insert_distributor = $this -> adminmodel -> insert_distributor($distributor_name, $region_id, $country_id, $exchange_rate);
		if($insert_distributor == TRUE){
			$this -> session -> set_flashdata('inserted', 'Data Inserted');
			return redirect('Admin/all_distributors');
		}

	}
	public function insert_region(){
		$region_title = $this -> input -> post('region_title');
		$this->load->model("adminmodel");
		$insert_region = $this -> adminmodel -> insert_region($region_title);
		if($insert_region == TRUE){
			$this -> session -> set_flashdata('inserted', 'Data Inserted');
			return redirect('Admin/region');
		}

	}
	public function insert_uom(){
		$unit_of_measure = $this -> input -> post('unit_of_measure');
		$this->load->model("adminmodel");
		$insert_uom = $this -> adminmodel -> insert_uom($unit_of_measure);
		if($insert_uom == TRUE){
			$this -> session -> set_flashdata('inserted', 'Data Inserted');
			return redirect('Admin/uom');
		}

	}
	public function insert_usertype(){
		$user_type = $this -> input -> post('user_type');
		$description = $this -> input -> post('description');
		$this->load->model("adminmodel");
		$insert_usertype = $this -> adminmodel -> insert_usertype($user_type, $description);
		if($insert_usertype == TRUE){
			$this -> session -> set_flashdata('inserted', 'Data Inserted');
			return redirect('Admin/usertype');
		}

	}
	public function insert_country(){
		$country_name = $this -> input -> post('country_name');
		$region_id = $this -> input -> post('region_id');
		$currency_name = $this -> input -> post('currency_name');
		$currency_code = $this -> input -> post('currency_code');
		$this->load->model("adminmodel");
		$insert_country = $this -> adminmodel -> insert_country($country_name, $region_id, $currency_name, $currency_code);
		if($insert_country == TRUE){
			$this -> session -> set_flashdata('inserted', 'Data Inserted');
			return redirect('Admin/all_countries');
		}

	}
    public function region(){
         $this->load->model("adminmodel");
         $region = $this -> adminmodel -> get_all_region();
        $this -> load -> view('admin/region', ['region' => $region]);
    
    }
	public function uom(){
		$this->load->model("adminmodel");
		$uom = $this -> adminmodel -> get_all_uom();
		$this -> load -> view('admin/uom', ['uom' => $uom]);

	}
	public function usertype(){
		$this->load->model("adminmodel");
		$usertype = $this -> adminmodel -> get_all_usertype();
		$this -> load -> view('admin/usertype', ['usertype' => $usertype]);

	}
	function upload_products()
	{

		$mimes = array('application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.oasis.opendocument.spreadsheet','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		if(in_array($_FILES["file"]["type"],$mimes))
		{
			$uploadFilePath = 'uploads/'.basename($_FILES['file']['name']);

			move_uploaded_file($_FILES['file']['tmp_name'], $uploadFilePath);
			//$Reader = new SpreadsheetReader($uploadFilePath);

			///=====

			$Spreadsheet = new SpreadsheetReader($uploadFilePath);
			$Sheets = $Spreadsheet->Sheets();
			$count = 0;
			foreach ($Sheets as $Index => $Name) {
				$Spreadsheet->ChangeSheet($Index);
				foreach ($Spreadsheet as $Key => $Row) {
					if($count != 0){
						if ($Row) {
							$image_name= isset($Row[0]) ? $Row[0] : '';
							$product_name= isset($Row[1]) ? $Row[1] : '';
							$type = isset($Row[2]) ? $Row[2] : '';
							$product_price = isset($Row[3]) ? $Row[3] : '';
							$product_discount = isset($Row[4]) ? $Row[4] : '';

							$sql = "SELECT * FROM so_products WHERE product_name='".$product_name."' AND type='".$type."'";
							$r = $conn->query($sql);
							if ($r->num_rows > 0) {
								while($row = $r->fetch_assoc()) {
									if($row['product_price']!=floatval($product_price) OR $row['product_discount']!=floatval($product_discount)){
										$sql = "UPDATE so_product_discount_history SET end_date = NOW() where product_id = ".$row['id']." ORDER BY id desc limit 1";
										$conn->query($sql);
										$sql = "INSERT INTO so_product_discount_history (product_id, discount, price, start_date)
									values (".$row['id'].", ".floatval($product_discount).", ".$product_price.", NOW())";
										$conn->query($sql);
										$sql = "UPDATE so_products SET product_price = ".$product_price.", product_discount=".floatval($product_discount)." where id = ".$row['id'];
										$conn->query($sql);
										$sql = "UPDATE so_product_images SET image_name = 'uploads/products/".$image_name."' where product_id = ".$row['id'];
										$conn->query($sql);
									}
								}
							}else{
								$sql = "INSERT INTO so_products (product_name,type,product_price,product_discount)
							 VALUES ('" . $product_name . "', '" . $type . "','".$product_price."','".floatval($product_discount)."')";
								$result = $conn->query($sql);
								if($result === false) {
									trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
								}
								$product_id = $conn->insert_id;
								$sql = "INSERT INTO so_product_discount_history (product_id, discount, price, start_date)
									values (".$product_id.", ".floatval($product_discount).", ".$product_price.", NOW())";
								$conn->query($sql);
								$sql = "INSERT INTO so_product_images (image_name,product_id) VALUES ('uploads/products/".$image_name."', ".$product_id.")";
								$conn->query($sql);
							}
							//////uploading images
							$error=array();
							$extension=array("jpeg","jpg","png","gif");
							foreach($_FILES["images"]["tmp_name"] as $key=>$tmp_name) {
								$file_name=$_FILES["images"]["name"][$key];
								$file_tmp=$_FILES["images"]["tmp_name"][$key];
								$ext=pathinfo($file_name,PATHINFO_EXTENSION);
								//unlink("uploads/products/".$file_name);
								if(in_array($ext,$extension)) {
									if(!file_exists("uploads/products/".$file_name)) {
										move_uploaded_file($file_tmp=$_FILES["images"]["tmp_name"][$key],"uploads/products/".$file_name);
									}else{
										move_uploaded_file($file_tmp=$_FILES["images"]["tmp_name"][$key],"uploads/products/".$file_name);
										/*$filename=basename($file_name,$ext);
										$newFileName=$filename.time().".".$ext;
										move_uploaded_file($file_tmp=$_FILES["images"]["tmp_name"][$key],"uploads/products/".$newFileName);*/
									}
								}
								else {
									array_push($error,"$file_name, ");
								}
							}
							/// end uploading images
						}
					}
					$count++;
				}
			}
			header("Location: product_list.php");
		}
	}
  
}


?>
