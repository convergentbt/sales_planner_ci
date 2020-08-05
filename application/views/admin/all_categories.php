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
            <h1>All Categories</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">All Categories</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
	<section class="content">
		<div class="container-fluid">
			<div class="container-fluid">
				<div class="row">  <!-- /.col -->
					<div class="col-md-11">
						<a href="<?php echo base_url("index.php/Admin/add_category")?>" class="btn btn-success float-right" style="color: white">Add Category</a>
					</div>
					<div class="col-md-1"></div>
				</div>
			</div>
			<br/>
			<div class="row">
				<!-- left column -->
				<div class="col-md-1"></div>
				<div class="col-md-10">
					<?php if($message = $this->session->flashdata('inserted')){?>
						<div class="row">
							<div class="col-12">
								<div class="alert alert-success">
									<?php echo $message; ?>
								</div>
							</div>
						</div>
					<?php }  if($message = $this->session->flashdata('deleted')){?>
						<div class="row">
							<div class="col-12">
								<div class="alert alert-success">
									<?php echo $message; ?>
								</div>
							</div>
						</div>
					<?php } if($message = $this->session->flashdata('updated')){ ?>
						<div class="row">
							<div class="col-12">
								<div class="alert alert-success">
									<?php echo $message; ?>
								</div>
							</div>
						</div>
					<?php } ?>
					<div class="card card-info">
						<div class="card-header">
							<h3 class="card-title">All Categories</h3>
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col-md-12">
									<table class="table table-striped">
										<thead>
										<tr>
											<th>Category Name</th>
											<th>Parent Category</th>
											<th>Status</th>
											<th>Action</th>
										</tr>
										</thead>
										<tbody>
										<?php if($category){
											foreach($category as $cat){ ?>
												<tr>
													<td><?= $cat -> category_title ?></td>
													<td><?= $cat -> parent ?></td>
													<td><?= $cat -> status ?></td>
													<td><a href="<?= base_url('index.php/Admin/edit_category/');echo $cat -> id ?>" class="fa fa-edit" style="color: orange"></a> &nbsp;
														<a href="<?= base_url('index.php/Admin/delete_category/');echo $cat -> id ?>" class="fa fa-trash" style="color: red"></a></td>
												</tr>
											<?php } }?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-1"></div>
					<!-- /.row -->
				</div><!-- /.container-fluid -->
	</section>
    <!-- Main content -->
    <!-- /.content -->
  </div>

<?php
 $this->load->view('layouts/footer.php');

}else{
    redirect('Login/index');
} ?>
