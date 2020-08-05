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
							<li class="breadcrumb-item active">Add Distributor</li>
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
					<div class="col-md-3"></div>
					<div class="col-md-6">
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
								<h3 class="card-title">Add Distributor</h3>
							</div>
							<!-- /.card-header -->
							<!-- form start -->

							<?php echo form_open('Admin/insert_distributor'); ?>
							<div class="card-body">
								<div class="form-group">
									<label for="categorytitle">Distributor Name</label>
									<?php
									$title = array('type' => 'text', 'class' => 'form-control',
										'id' => 'country_name', 'name' => 'distributor_name',
										'placeholder' => 'Enter Distributor Name'
									);
									echo form_input($title);
									?>
								</div>
								<div class="form-group">
									<label for="exampleInputEmail1">Region</label>
									<select class="form-control" name="region_id" id="region_id">
										<option value="">Select Region</option>
										<?php
										if($region){
											foreach($region as $reg){?>
												<option  value = "<?= $reg -> id ?>"><?= $reg -> region_title ?></option>
											<?php } } else{ ?>
											<option>No Regions Found</option>
										<?php } ?>
									</select>
								</div>
								<div class="form-group">
									<label for="exampleInputEmail1">Country</label>
									<select class="form-control" name="country_id" id="country_id">
										<option value="">Select Country</option>
									</select>
								</div>
								<div class="form-group">
									<label for="Exchange">Exchange Rate</label>
									<?php
									$title = array('type' => 'double', 'class' => 'form-control',
										'id' => 'exchange_rate', 'name' => 'exchange_rate',
										'placeholder' => 'Enter Exchange Rate'
									);
									echo form_input($title);
									?>
								</div>
								<div class="card-footer">
									<?php
									$formsubmitdata = array('class' => 'btn btn-info', 'type' => 'submit', 'value' => 'Submit');
									echo form_submit($formsubmitdata); ?>
								</div>
								</form>
							</div>
							<div class="col-md-3"></div>

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
		$('#region_id').change(function () {
			var region_id = $('#region_id').val();
			// console.log(region_id);
			if(region_id != ''){
					$.ajax({
					url: "<?php base_url();?>get_countries",
					method: "POST",
					data: {region_id:region_id},
					success: function (data) {
						// alert(data);
						$('#country_id').html(data);
					}
				})
			 }
		})
	})
</script>
