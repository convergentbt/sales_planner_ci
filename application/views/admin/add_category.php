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
              <li class="breadcrumb-item active">Add Category</li>
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
                <h3 class="card-title">Add Category</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
    
				  <?php echo form_open('Admin/insert_category'); ?>
                <div class="card-body">
                  <div class="form-group">
                    <label for="categorytitle">Category Title</label>
                    <?php
					$title = array('type' => 'text', 'class' => 'form-control',
							'id' => 'category_title', 'name' => 'category_title',
							'placeholder' => 'Enter Title'
							);
					 echo form_input($title);
					?>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Parent Category</label>
                    <select class="form-control" name="parent_id">
                          <option  value = "0">Select Parent Category</option>
                          <?php
						  if($parentid){
                              foreach($parentid as $par){?>
                               <option  value = "<?= $par -> id ?>"><?= $par -> category_title ?></option>
                          <?php } } else{ ?>
                            <option>No Parent Category Found</option>
                            <?php } ?>
                        </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Status</label>
                    <select class="form-control" name="status">
                          <option>Select Status</option>
                          <option value="Enable">Enable</option>
                          <option value="Disable">Disbale</option>
                    </select>
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
