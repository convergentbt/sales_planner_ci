<?php
		include "conn.php";
		require('library/php-excel-reader/excel_reader2.php');
		require('library/SpreadsheetReader.php');
		require('library/SpreadsheetReader_CSV.php');
		require('library/SpreadsheetReader_XLS.php');
		require('library/SpreadsheetReader_XLSX.php');
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
//						if($count != 0){
							$country_name= isset($Row[0]) ? $Row[0] : '';
							if($country_name != "Country"){
							if ($Row) {
								$country_name= isset($Row[0]) ? $Row[0] : '';
								$category= isset($Row[1]) ? $Row[1] : '';
								$category_name = addslashes($category);
								$sub_category_name = isset($Row[2]) ? $Row[2] : '';
								$brand = isset($Row[3]) ? $Row[3] : '';
								$variant = isset($Row[4]) ? $Row[4] : '';
								$size = isset($Row[5]) ? $Row[5] : '';
								$uom = isset($Row[6]) ? $Row[6] : '';
								$fgcode = isset($Row[7]) ? $Row[7] : '';
								$description = isset($Row[8]) ? $Row[8] : '';
								$country = "Select id From dabur_countries Where country_name = '".$country_name."'";
								$count = $conn->query($country);
								if($count->num_rows > 0) {
									while ($row = $count->fetch_assoc()) {
										$country_id = $row['id'];
									}
								}else{
									$country = "INSERT INTO dabur_countries (country_name) VALUE ('".$country_name."')";
									$count = $conn->query($country);
									if($count) {
										$country_id = $conn->insert_id;
									}
								}
											$category = "Select id From dabur_categories WHERE category_title = '".$category_name."'";
											$cat = $conn->query($category);
											if($cat->num_rows > 0) {    //category found
												while ($row = $cat->fetch_assoc()) {
											$category_id = $row['id'];
												}
											}
											else{
												$category = "INSERT INTO dabur_categories (category_title) VALUE ('".$category_name."')";
												$cat = $conn->query($category);
												if($cat) {
												$category_id = $conn->insert_id;
												}
											}
												$sub_category = "SELECT id FROM dabur_categories where category_title = '".$sub_category_name."' AND parent_id = $category_id";
												$sub_cat = $conn -> query($sub_category);
												if ($sub_cat->num_rows > 0) {
//													echo "sub category found";
													while ($r = $sub_cat->fetch_assoc()) {
															$sub_category_id = $r['id'];
													}
												}
												else{
													$sub_category = "INSERT INTO dabur_categories (category_title, parent_id) VALUES ('".$sub_category_name."', $category_id)";
													$sub_cat = $conn->query($sub_category);
													if($sub_cat) {
														$sub_category_id = $conn->insert_id;
													}

												}
								$unitofmeasure = "SELECT id FROM dabur_unit_of_measure WHERE unit_of_measure = '".$uom."'";
													$unit = $conn -> query($unitofmeasure);
													if($unit -> num_rows > 0) {
														while ($ro = $unit->fetch_assoc()) {
															 $uom = $ro['id'];
														}
													}
													else{
														$unitofmeasure = "INSERT INTO dabur_unit_of_measure (unit_of_measure) VALUE ('".$uom."')";
														$unit = $conn->query($unitofmeasure);
														if($unit) {
															$uom = $conn->insert_id;
														}
													}
								$product = "SELECT * FROM dabur_products WHERE country_id = $country_id and category_id = $category_id and fgcode = '".$fgcode."' AND brand = '".$brand."' AND variant = '".$variant."' AND description = '".$description."'";
										$prod = $conn -> query($product);
										if($prod->num_rows > 0) {
//											echo "product found";
											while ($roww = $prod->fetch_assoc()) {
												$product_id = $roww['id'];
											}
												$update_product = "UPDATE dabur_products SET country_id = $country_id, category_id = $category_id, sub_category_id = $sub_category_id, brand = '".$brand."'
														, variant = '".$variant."', size = $size, uom_id = $uom, fgcode = '".$fgcode."', description = '".$description."' where id = $product_id";

														$update = $conn -> query($update_product);
														if($update){
//															echo "Update";
														}
														else{
//															echo "error! not update";
														}
										}
										else{
											$insert_product = "INSERT INTO dabur_products (country_id, category_id, sub_category_id, brand, variant, size, uom_id, fgcode, description)
														VALUES ($country_id, $category_id, $sub_category_id, '".$brand."', '".$variant."',
														$size, $uom, '".$fgcode."', '".$description."')";
														$insert = $conn -> query($insert_product);
														if($insert){
//															echo "added";
														}
														else{
//															echo "error! not added";
														}
										}
							}
						}

						$count++;

					}
				}
			}
	}

?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<script src="jquery-2.1.4.js"></script>
<style>
	body {
		margin: 0;
		padding: 0;
		width:100vw;
		height: 100vh;
		background-color: #eee;
	}
	.content {
		display: flex;
		justify-content: center;
		align-items: center;
		width:100%;
		height:100%;
	}
	.loader-wrapper {
		width: 100%;
		height: 100%;
		position: absolute;
		top: 0;
		left: 0;
		background-color: #242f3f;
		display:flex;
		justify-content: center;
		align-items: center;
	}
	.loader {
		display: inline-block;
		width: 30px;
		height: 30px;
		position: relative;
		border: 4px solid #Fff;
		animation: loader 2s infinite ease;
	}
	.loader-inner {
		vertical-align: top;
		display: inline-block;
		width: 100%;
		background-color: #fff;
		animation: loader-inner 2s infinite ease-in;
	}
	@keyframes loader {
		0% { transform: rotate(0deg);}
		25% { transform: rotate(180deg);}
		50% { transform: rotate(180deg);}
		75% { transform: rotate(360deg);}
		100% { transform: rotate(360deg);}
	}
	@keyframes loader-inner {
		0% { height: 0%;}
		25% { height: 0%;}
		50% { height: 100%;}
		75% { height: 100%;}
		100% { height: 0%;}
	}
</style>
</head>
<body>
<div class="loader-wrapper">
	<span class="loader"><span class="loader-inner"></span></span>
</div>

<script>
	$(window).on("load",function(){
		$(".loader-wrapper").fadeOut("slow");
	});
</script>
</body>
</html>
<script>
	window.location.href = '<?php echo $location ;?>';
</script>
