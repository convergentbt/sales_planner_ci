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
							<li class="breadcrumb-item active">Edit Country</li>
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

						<div class="card card-info">
							<div class="card-header">
								<h3 class="card-title">Edit Country</h3>
							</div>
							<!-- /.card-header -->
							<!-- form start -->
							<?php if($single_country_record){
							foreach($single_country_record as $record){ ?>
							<?php echo form_open('Admin/update_country'); ?>
							<div class="card-body">
								<?php
								echo form_hidden('id', $record->id);
								?>
								<div class="form-group">
									<label for="categorytitle">Country Name</label>
									<?php
									$title = array('type' => 'text', 'class' => 'form-control',
										'id' => 'country_name', 'name' => 'country_name',
										'placeholder' => 'Enter Country Name', 'value' => $record->country_name
									);
									echo form_input($title);
									?>
								</div>
								<div class="form-group">
									<label for="exampleInputEmail1">Region</label>
									<select class="form-control" name="region_id">
										<option value="">Select Region</option>
										<?php
										if($regions){
											foreach($regions as $reg){?>
												<option <?php if($reg -> id == $record->region_id){echo 'selected';}?> value = "<?= $reg -> id ?>"><?= $reg -> region_title ?></option>
											<?php } } else{ ?>
											<option>No Regions Found</option>
										<?php } ?>
									</select>
								</div>
								<div class="form-group">
									<label for="categorytitle">Currency Name</label>
									<?php
									$title = array('type' => 'text', 'class' => 'form-control',
										'id' => 'currency_name', 'name' => 'currency_name',
										'placeholder' => 'Enter Currency Name', 'value' => $record->currency_name
									);
									echo form_input($title);
									?>
								</div>
								<div class="form-group">
									<label for="currency_code">Currency Code</label>
									<?php
									$title = array('type' => 'number', 'class' => 'form-control',
										'id' => 'currency_code', 'name' => 'currency_code',
										'placeholder' => 'Enter Currency Code', 'value' => $record ->currency_code
									);
									echo form_input($title);
									?>
								</div>
								<?php } } ?>
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
