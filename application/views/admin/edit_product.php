<?php
if($_SESSION['user_type'] == 'admin'){

	$this->load->view('layouts/header.php');
	$this->load->view('layouts/sidebar.php');
	?>
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1></h1>
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active">Edit Product</li>
						</ol>
					</div>
				</div>
			</div><!-- /.container-fluid -->
		</section>

		<!-- Main content -->
		<section class="content">
			<div class="container-fluid">
				<div class="row">
					<!-- left column -->
					<div class="col-md-2"></div>
					<div class="col-md-8">
						<!-- general form elements -->
						<?php if($error = $this->session->flashdata('inserted')){?>
							<div class="row">
								<div class="col-12">
									<div class="alert alert-success">
										<?php echo $error; ?>
									</div>
								</div>
							</div>
						<?php } ?>
						<div class="card card-info">
							<div class="card-header">
								<h3 class="card-title">Edit Product</h3>
							</div>
							<!-- /.card-header -->
							<!-- form start -->
						<?php if($singleproduct){
							foreach ($singleproduct as $product){
						?>
							<?php echo form_open('Admin/update_product'); ?>
							<div class="card-body">
								<div class="row">
									<div class="col-md-6">
										<?php
										echo form_hidden('id', $product->id);
										?>
										<div class="form-group">
											<label for="exampleInputEmail1">Country</label>
											<select class="form-control" name="country_id" id="country_id">
												<option  value = "">Select Country</option>
												<?php
												if($countries){
													foreach($countries as $coun){?>
														<option <?php if($coun -> id == $product->country_id){echo 'selected';}?> value = "<?= $coun -> id ?>"><?= $coun -> country_name ?></option>
													<?php } } else{ ?>
													<option>No Parent Category Found</option>
												<?php } ?>
											</select>
										</div>
										<div class="form-group">
											<label for="exampleInputEmail1">Category</label>
											<select class="form-control" name="category_id" id="category_id">
												<option  value = "">Select Category</option>
												<?php
												if($parentid){
													foreach($parentid as $par){?>
														<option <?php if($par -> id == $product->category_id){echo 'selected';}?> value = "<?= $par -> id ?>"><?= $par -> category_title ?></option>
													<?php } } else{ ?>
													<option>No Parent Category Found</option>
												<?php } ?>
											</select>
										</div>
										<div class="form-group">
											<label for="exampleInputEmail1">Sub Category</label>
											<select class="form-control" name="sub_category_id" id="sub_category_id">
												<option value="">Select Sub Category</option>
												<?php
												if($getsubcategory){
													foreach($getsubcategory as $sub){?>
														<option <?php if($sub -> id == $product->sub_category_id){echo 'selected';}?> value = "<?= $sub -> id ?>"><?= $sub -> category_title ?></option>
													<?php } } else{ ?>
													<option>No Parent Category Found</option>
												<?php } ?>
											</select>
										</div>
										<div class="form-group">
											<label for="Brand">Brand</label>
											<?php
											$title = array('type' => 'text', 'class' => 'form-control',
												'id' => 'brand', 'name' => 'brand',
												'placeholder' => 'Enter Brand', 'value' => $product -> brand
											);
											echo form_input($title);
											?>
										</div>
										<div class="form-group">
											<label for="categorytitle">Variant</label>
											<?php
											$title = array('type' => 'text', 'class' => 'form-control',
												'id' => 'variant', 'name' => 'variant',
												'placeholder' => 'Enter Variant', 'value' => $product->variant
											);
											echo form_input($title);
											?>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="categorytitle">Size</label>
											<?php
											$title = array('type' => 'number', 'class' => 'form-control',
												'id' => 'size', 'name' => 'size',
												'placeholder' => 'Enter Size', 'value' => $product->size
											);
											echo form_input($title);
											?>
										</div>
										<div class="form-group">
											<label for="exampleInputEmail1">Unit Of Measure</label>
											<select class="form-control" name="uom_id" id="uom_id">
												<option value="">Select Unit Of Measure</option>
												<?php
												if($uom){
													foreach($uom as $u){?>
														<option <?php if($u -> id == $product->uom_id){echo 'selected';}?> value = "<?= $u -> id ?>"><?= $u -> unit_of_measure ?></option>
													<?php } } else{ ?>
													<option>No Unit Of Measure Found</option>
												<?php } ?>
											</select>
										</div>
										<div class="form-group">
											<label for="fgcode">FG Code</label>
											<?php
											$title = array('type' => 'text', 'class' => 'form-control',
												'id' => 'fgcode', 'name' => 'fgcode',
												'placeholder' => 'Enter FG Code', 'value' => $product->fgcode
											);
											echo form_input($title);
											?>
										</div>
										<div class="form-group">
											<label for="description">Product Description</label>
											<?php
											$title = array('type' => 'text', 'class' => 'form-control',
												'id' => 'description', 'name' => 'description',
												'placeholder' => 'Enter Description', 'value' => $product->description
											);
											echo form_input($title);
											?>
										</div>
									</div>
									<div class="col-md-12">
										<?php
										$formsubmitdata = array('class' => 'btn btn-info float-right', 'type' => 'submit', 'value' => 'Submit');
										echo form_submit($formsubmitdata); ?>
									</div>
									</form>
									<?php }} ?>
								</div>
								<div class="col-md-2"></div>

							</div>
							<!--/.col (left) -->

						</div>
						<!-- /.row -->
					</div><!-- /.container-fluid -->
		</section>
		<!-- /.content -->
	</div>

	<?php
	$this->load->view('layouts/footer.php');

}else{
	redirect('Login/index');
} ?>
<script>
	$(document).ready(function () {
		$('#category_id').change(function () {
			var category_id = $('#category_id').val();
			// console.log(region_id);
			//var	url = "<?php //echo base_url();?>//index.php/Admin/get_subcategory";
			// alert(url);
			if(category_id != ''){
				$.ajax({
					url: "<?php echo base_url();?>index.php/Admin/get_subcategory",
					method: "POST",
					data: {category_id:category_id},
					success: function (data) {
						$('#sub_category_id').html(data);
					}
				})

			}
		})
	})
</script>
