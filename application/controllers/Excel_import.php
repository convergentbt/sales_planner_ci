<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Excel_import extends CI_Controller
{
//	public function __construct()
//	{
//		parent::__construct();
//		$this->load->model('excel_import_model');
//		$this->load->library('excel');
//	}

//	function index()
//	{
//		$this->load->view('excel_import');
//	}
//
//	function fetch()
//	{
//		$data = $this->excel_import_model->select();
//		$output = '
//		<h3 align="center">Total Data - '.$data->num_rows().'</h3>
//		<table class="table table-striped table-bordered">
//			<tr>
//				<th>Customer Name</th>
//				<th>Address</th>
//				<th>City</th>
//				<th>Postal Code</th>
//				<th>Country</th>
//			</tr>
//		';
//		foreach($data->result() as $row)
//		{
//			$output .= '
//			<tr>
//				<td>'.$row->CustomerName.'</td>
//				<td>'.$row->Address.'</td>
//				<td>'.$row->City.'</td>
//				<td>'.$row->PostalCode.'</td>
//				<td>'.$row->Country.'</td>
//			</tr>
//			';
//		}
//		$output .= '</table>';
//		echo $output;
//	}
	function import(){
		require('public/library/php-excel-reader/excel_reader2.php');
		require('public/library/SpreadsheetReader.php');
		require('public/library/SpreadsheetReader_CSV.php');
		require('public/library/SpreadsheetReader_XLS.php');
		require('public/library/SpreadsheetReader_XLSX.php');
		if(isset($_POST['Submit']))
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
								$country_name= isset($Row[0]) ? $Row[0] : '';
								$category_name= isset($Row[1]) ? $Row[1] : '';
								$sub_category_name = isset($Row[2]) ? $Row[2] : '';
								$brand = isset($Row[3]) ? $Row[3] : '';
								$size = isset($Row[4]) ? $Row[4] : '';
								$uom = isset($Row[5]) ? $Row[5] : '';
								$fgcode = isset($Row[6]) ? $Row[6] : '';
								$description = isset($Row[7]) ? $Row[7] : '';


//								$sql = "SELECT * FROM so_products WHERE product_name='".$product_name."' AND type='".$type."'";
//								$r = $conn->query($sql);
//								if ($r->num_rows > 0) {
//									while($row = $r->fetch_assoc()) {
//										if($row['product_price']!=floatval($product_price) OR $row['product_discount']!=floatval($product_discount)){
//											$sql = "UPDATE so_product_discount_history SET end_date = NOW() where product_id = ".$row['id']." ORDER BY id desc limit 1";
//											$conn->query($sql);
//											$sql = "INSERT INTO so_product_discount_history (product_id, discount, price, start_date)
//									values (".$row['id'].", ".floatval($product_discount).", ".$product_price.", NOW())";
//											$conn->query($sql);
//											$sql = "UPDATE so_products SET product_price = ".$product_price.", product_discount=".floatval($product_discount)." where id = ".$row['id'];
//											$conn->query($sql);
//											$sql = "UPDATE so_product_images SET image_name = 'uploads/products/".$image_name."' where product_id = ".$row['id'];
//											$conn->query($sql);
//										}
//									}
//								}else{
//									$sql = "INSERT INTO so_products (product_name,type,product_price,product_discount)
//							 VALUES ('" . $product_name . "', '" . $type . "','".$product_price."','".floatval($product_discount)."')";
//									$result = $conn->query($sql);
//									if($result === false) {
//										trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
//									}
//									$product_id = $conn->insert_id;
//									$sql = "INSERT INTO so_product_discount_history (product_id, discount, price, start_date)
//									values (".$product_id.", ".floatval($product_discount).", ".$product_price.", NOW())";
//									$conn->query($sql);
//									$sql = "INSERT INTO so_product_images (image_name,product_id) VALUES ('uploads/products/".$image_name."', ".$product_id.")";
//									$conn->query($sql);
//								}
//								//////uploading images
//								$error=array();
//								$extension=array("jpeg","jpg","png","gif");
//								foreach($_FILES["images"]["tmp_name"] as $key=>$tmp_name) {
//									$file_name=$_FILES["images"]["name"][$key];
//									$file_tmp=$_FILES["images"]["tmp_name"][$key];
//									$ext=pathinfo($file_name,PATHINFO_EXTENSION);
//									//unlink("uploads/products/".$file_name);
//									if(in_array($ext,$extension)) {
//										if(!file_exists("uploads/products/".$file_name)) {
//											move_uploaded_file($file_tmp=$_FILES["images"]["tmp_name"][$key],"uploads/products/".$file_name);
//										}else{
//											move_uploaded_file($file_tmp=$_FILES["images"]["tmp_name"][$key],"uploads/products/".$file_name);
//											/*$filename=basename($file_name,$ext);
//											$newFileName=$filename.time().".".$ext;
//											move_uploaded_file($file_tmp=$_FILES["images"]["tmp_name"][$key],"uploads/products/".$newFileName);*/
//										}
//									}
//									else {
//										array_push($error,"$file_name, ");
//									}
//								}
//								/// end uploading images
							}
						}
						$count++;
					}
				}
//				header("Location: product_list.php");
			}
		}
	}
//	function import()
//	{
//		echo "sana";
//		exit;
//		if(isset($_FILES["file"]["name"]))
//		{
//			$path = $_FILES["file"]["tmp_name"];
//			$object = PHPExcel_IOFactory::load($path);
//			foreach($object->getWorksheetIterator() as $worksheet)
//			{
//				$highestRow = $worksheet->getHighestRow();
//				$highestColumn = $worksheet->getHighestColumn();
//				for($row=2; $row<=$highestRow; $row++)
//				{
//					$country_name = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
//					$category_name = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
//					$sub_category_name = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
//					$brand = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
//					$brand = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
//					$size = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
//					$uom = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
//					$fgcode = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
//					$description = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
//					$data[] = array(
//						'country_name'		=>	$country_name,
//						'category_name'			=>	$category_name,
//						'sub_category_name'				=>	$sub_category_name,
//						'brand'		=>	$brand,
//						'variant'			=>	$variant,
//						'size'			=>	$size,
//						'uom'			=>	$uom,
//						'fgcode'			=>	$fgcode,
//						'description'			=>	$description,
//
//					);
//					print_r($data);
//					exit;
//				}
//			}
////			$this->excel_import_model->insert($data);
//			echo 'Data Imported successfully';
//		}
//	}
}

?>
