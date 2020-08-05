<?php if($_SESSION['user_type'] == 'admin'){

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
							<li class="breadcrumb-item active">Add Product Price Structure</li>
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
								<h3 class="card-title">Add Product Price Structure</h3>
							</div>
							<!-- /.card-header -->
							<!-- form start -->

							<?php echo form_open('Admin/insert_pricestructure'); ?>
							<div class="card-body">
								<div class="row">
									<div class="col-md-6">
								<div class="form-group">
									<label for="categorytitle">Country</label>
									<select class="form-control" name="country_id" id="country_id">
										<option value="">Select Country</option>
										<?php
										if($country){
											foreach($country as $cou){?>
												<option  value = "<?= $cou -> country_id ?>"><?= $cou -> country_name ?></option>
											<?php } } else{ ?>
											<option>No Country Found</option>
										<?php } ?>
									</select>
								</div>
								<div class="form-group">
									<label>Products</label>
									<select class="form-control select2" name="product_id" id="product_id" style="width: 100%">
										<option>Select Product</option>
									</select>
								</div>
								<div class="form-group">
									<label for="categorytitle">Case Config</label>
									<?php
									$title = array('type' => 'double', 'class' => 'form-control',
										'id' => 'currency_name', 'name' => 'case_config',
										'placeholder' => 'Enter Case Config'
									);
									echo form_input($title);
									?>
								</div>
								<div class="form-group">
									<label for="currency_code">RSP (AED)</label>
									<?php
									$title = array('type' => 'double', 'class' => 'form-control',
										'id' => 'currency_code', 'name' => 'rsp_aed',
										'placeholder' => 'Enter RSP (AED)'
									);
									echo form_input($title);
									?>
								</div>
								<div class="form-group">
									<label for="currency_code">RSP (PC)</label>
									<?php
									$title = array('type' => 'double', 'class' => 'form-control',
											'id' => 'currency_code', 'name' => 'rsp_pc',
											'placeholder' => 'Enter RSP (PC)'
									);
									echo form_input($title);
									?>
								</div>

									</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="currency_code">PTR (AED)</label>
									<?php
									$title = array('type' => 'double', 'class' => 'form-control',
											'id' => 'currency_code', 'name' => 'ptr_aed',
											'placeholder' => 'Enter PTR (AED)'
									);
									echo form_input($title);
									?>
								</div>
								<div class="form-group">
									<label for="currency_code">PTW (AED)</label>
									<?php
									$title = array('type' => 'double', 'class' => 'form-control',
											'id' => 'currency_code', 'name' => 'ptw_aed',
											'placeholder' => 'Enter PTW (AED)'
									);
									echo form_input($title);
									?>
								</div>
								<div class="form-group">
									<label for="currency_code">DPLC (AED)</label>
									<?php
									$title = array('type' => 'double', 'class' => 'form-control',
											'id' => 'currency_code', 'name' => 'dplc_aed',
											'placeholder' => 'Enter DPLC (AED)'
									);
									echo form_input($title);
									?>
								</div>
								<div class="form-group">
									<label for="currency_code">Billing Price (AED)</label>
									<?php
									$title = array('type' => 'double', 'class' => 'form-control',
											'id' => 'currency_code', 'name' => 'billing_price_aed',
											'placeholder' => 'Enter Billing Price (AED)'
									);
									echo form_input($title);
									?>
								</div>
							</div>
								</div>
								<div class="col-md-12">
									<?php
									$formsubmitdata = array('class' => 'btn btn-info float-right', 'type' => 'submit', 'value' => 'Submit');
									echo form_submit($formsubmitdata); ?>
								</div>

							</div>
							</form>
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
		$('#country_id').change(function () {
			var country_id = $('#country_id').val();
			// console.log(country_id);
			//var q = "<?php //echo base_url();?>//index.php/Admin/get_description";
			//alert(q);
			if(country_id != ''){
				$.ajax({
					url: "<?php echo base_url();?>index.php/Admin/get_product_description",
					method: "POST",
					data: {country_id:country_id},
					success: function (data) {
						// alert(data);
						$('#product_id').html(data);
					}
				})
			}

		})
	})
</script>
