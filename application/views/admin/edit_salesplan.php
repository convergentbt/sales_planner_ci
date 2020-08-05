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
							<li class="breadcrumb-item active">Edit Sales Plan</li>
						</ol>
					</div>
				</div>
			</div><!-- /.container-fluid -->
		</section>
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
					</div>
				</div>
			</div>
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
								<h3 class="card-title">Edit Sales Plan</h3>
							</div>
							<!-- /.card-header -->
							<!-- form start -->
					<?php if($singlesalesplan){
							foreach ($singlesalesplan as $salesplan){
						?>
							<?php echo form_open('Admin/update_salesplanning'); ?>
							<div class="card-body">
								<div class="row">
									<div class="col-md-6">
										<?php
										echo form_hidden('id', $salesplan->id);
										?>
										<div class="form-group">
											<label for="categorytitle">Country</label>
											<select class="form-control" name="country_id" id="country_id">
												<option value="">Select Country</option>
												<?php
												if($country){
													foreach($country as $cou){?>
														<option <?php if($salesplan->country_id == $cou ->id){echo "selected"; }?> value = "<?= $cou -> id ?>"><?= $cou -> country_name ?></option>
													<?php } } else{ ?>
													<option>No Country Found</option>
												<?php } ?>
											</select>
										</div>
										<div class="form-group">
											<label>Products</label>
											<select class="form-control select2" name="product_id" id="product_id" style="width: 100%">
												<option selected value="<?php echo $salesplan -> product_id ?>"><?= $salesplan-> product?></option>
											</select>
										</div>


									</div>
									<div class="col-md-6">

										<div class="form-group">
											<label for="Brand">Sales Target</label>
											<?php
											$title = array('type' => 'text', 'class' => 'form-control',
													'id' => 'sales', 'name' => 'sales',
													'placeholder' => 'Enter Sales Target', 'value' => $salesplan -> sales
											);
											echo form_input($title);
											?>
										</div>

										<div class="form-group">
											<label>Select Month</label>
												<?php $startdate = date_create($salesplan->start_date);
												$start_date = date_format($startdate, 'Y-m');
												$mindate = date('Y-m');
												?>
												<input type="month" value="<?php echo $start_date?>" name="month" min="<?php echo $mindate?>" class="form-control datetimepicker-input" data-target="#reservationdate1"/>
										</div>

										<!--										<div class="form-group">-->
										<!--											<label>Date range:</label>-->
										<!---->
										<!--											<div class="input-group">-->
										<!--												<div class="input-group-prepend">-->
										<!--													<span class="input-group-text">-->
										<!--                       								 <i class="far fa-calendar-alt"></i>-->
										<!--													</span>-->
										<!--												</div>-->
										<!--												<input type="text" name="start_date" class="form-control float-right" id="reservation">-->
										<!--											</div>-->
										<!--
										<!--										</div>-->
										<!--										<div class="form-group">-->
										<!--											<label>Start Date</label>-->
										<!--											<div class="input-group date" id="reservationdate" data-target-input="nearest">-->
										<!--												<input type="text" class="form-control datetimepicker-input" data-target="#reservationdate"/>-->
										<!--												<div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">-->
										<!--													<div class="input-group-text"><i class="fa fa-calendar"></i></div>-->
										<!--												</div>-->
										<!--											</div>-->
										<!--										</div>-->
										<!--										<div class="form-group">-->
										<!--											<label>End Date</label>-->
										<!--											<div class="input-group date" id="reservationdate" data-target-input="nearest">-->
										<!--												<input type="text" class="form-control datetimepicker-input" data-target="#reservationdate"/>-->
										<!--												<div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">-->
										<!--													<div class="input-group-text"><i class="fa fa-calendar"></i></div>-->
										<!--												</div>-->
										<!--											</div>-->
										<!--										</div>-->
									</div>
									<div class="col-md-12">
										<?php
										$formsubmitdata = array('class' => 'btn btn-info float-right', 'type' => 'submit', 'value' => 'Submit');
										echo form_submit($formsubmitdata); ?>
									</div>
									</form>
									<?php
									}
									} ?>
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
