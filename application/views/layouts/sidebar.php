<?php 
    if($_SESSION['user_type'] == 'admin') {
  ?>
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo base_url("index.php/Home/index")?>" class="brand-link">
      <img src="<?= base_url("assets/dist/img/logo.png")?>" alt="Dabur Logo" class="brand-image img-circle elevation-3"
          <!-- style="opacity: .8 -->
          ">
      <span class="brand-text font-weight-light">Dabur Sales Planner</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= base_url("assets/dist/img/user2-160x160.jpg") ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION['first_name']?></a>
        </div>
      </div> -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <!-- <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./index.html" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v1</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index2.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v2</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index3.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v3</p>
                </a>
              </li>
            </ul>
          </li> -->
          <!-- <li class="nav-item">
            <a src="assets/pages/widgets.html" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Category
                <!-- <span class="right badge badge-danger">New</span> -->
              <!-- </p>
            </a>
          </li>  -->
          <li class="nav-item has-treeview">
                      <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                         Users
                          <i class="fas fa-angle-left right"></i>
                     </p>
                      </a>
                      <ul class="nav nav-treeview">
                        <li class="nav-item">
                          <a href="<?= base_url('index.php/Admin/all_users'); ?>" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>All Users</p>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="<?= base_url('index.php/Admin/add_user'); ?>" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Add User</p>
                          </a>
                        </li>
                      </ul>
                    </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
               Categories
                <i class="fas fa-angle-left right"></i>
           </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('index.php/Admin/all_categories'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Categories</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('index.php/Admin/add_category'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Category</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="<?= base_url('index.php/Admin/region'); ?>" class="nav-link">
             <i class="nav-icon fas fa-location-arrow"></i>
              <p>
               Region
            <!--    <i class="fas fa-angle-left right"></i> -->
           </p>
            </a>
            </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-globe"></i>
              <p>
               Country
                <i class="fas fa-angle-left right"></i>
           </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('index.php/Admin/all_countries'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Country</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('index.php/Admin/add_country'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Country</p>
                </a>
              </li>
            </ul>
          </li>
           <li class="nav-item has-treeview">
                      <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-globe"></i>
                        <p>
                         Distributor
                          <i class="fas fa-angle-left right"></i>
                     </p>
                      </a>
                      <ul class="nav nav-treeview">
                        <li class="nav-item">
                          <a href="<?= base_url('index.php/Admin/all_distributors'); ?>" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>All Distributors</p>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="<?= base_url('index.php/Admin/add_distributor'); ?>" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Add Distributors</p>
                          </a>
                        </li>
                      </ul>
                    </li>
                     <li class="nav-item has-treeview">
                                          <a href="#" class="nav-link">
                                            <i class="nav-icon fas fa-globe"></i>
                                            <p>
                                             Product
                                              <i class="fas fa-angle-left right"></i>
                                         </p>
                                          </a>
                                          <ul class="nav nav-treeview">
                                            <li class="nav-item">
                                              <a href="<?= base_url('index.php/Admin/all_products'); ?>" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>All Products</p>
                                              </a>
                                            </li>
                                            <li class="nav-item">
                                              <a href="<?= base_url('index.php/Admin/add_product'); ?>" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Add Products</p>
                                              </a>
                                            </li>
                                          </ul>
                                        </li>
                                             <li class="nav-item has-treeview">
                                                                                  <a href="#" class="nav-link">
                                                                                    <i class="nav-icon fas fa-globe"></i>
                                                                                    <p>
                                                                                     Sales Planning
                                                                                      <i class="fas fa-angle-left right"></i>
                                                                                 </p>
                                                                                  </a>
                                                                                  <ul class="nav nav-treeview">
                                                                                    <li class="nav-item">
                                                                                      <a href="<?= base_url('index.php/Admin/all_sales_planning'); ?>" class="nav-link">
                                                                                        <i class="far fa-circle nav-icon"></i>
                                                                                        <p>All Sales Planing</p>
                                                                                      </a>
                                                                                    </li>
                                                                                    <li class="nav-item">
                                                                                      <a href="<?= base_url('index.php/Admin/add_sales_plan'); ?>" class="nav-link">
                                                                                        <i class="far fa-circle nav-icon"></i>
                                                                                        <p>Add Sales Plan</p>
                                                                                      </a>
                                                                                    </li>
                                                                                  </ul>
                                             </li>
                                         <li class="nav-item has-treeview">
                                            <a href="#" class="nav-link">
                                            <i class="nav-icon fas fa-tag"></i>
                                            <p>
                                             Price Structure
                                             <i class="fas fa-angle-left right"></i>
                                             </p>
                                              </a>
                                            <ul class="nav nav-treeview">
                                              <li class="nav-item">
                                              <a href="<?= base_url('index.php/Admin/all_pricestructure'); ?>" class="nav-link">
                                              <i class="far fa-circle nav-icon"></i>
                                              <p>Show Price Structure</p>
                                              </a>
                                              </li>
                                              <li class="nav-item">
                                              <a href="<?= base_url('index.php/Admin/add_pricestructure'); ?>" class="nav-link">
                                              <i class="far fa-circle nav-icon"></i>
                                              <p>Add Price Structure</p>
                                              </a>
                                              </li>
                                            </ul>
                                          </li>
                                               <li class="nav-item has-treeview">
                                                              <a href="<?= base_url('index.php/Admin/uom'); ?>" class="nav-link">
                                                                <i class="nav-icon fas fa-weight"></i>
                                                                <p>
                                                                 Unit Of Measure
                                                              </p>
                                                              </a>
                                               </li>
                                                   <li class="nav-item has-treeview">
                                                      <a href="<?= base_url('index.php/Admin/usertype'); ?>" class="nav-link">
                                                         <i class="nav-icon fas fa-weight"></i>
                                                     <p>
														User Type
                                                       </p>
                                                        </a>
                                                          </li>
          <!-- <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Charts
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">


                <a src="<?= base_url("assets/pages/charts/chartjs.html") ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>ChartJS</p>
                </a>
              </li>
              <li class="nav-item">
                <a src="<?= base_url("assets/pages/charts/flot.html") ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Flot</p>
                </a>
              </li>
              <li class="nav-item">
                <a src="<?= base_url("assets/pages/charts/inline.html") ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inline</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                UI Elements
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a src="<?= base_url("assets/pages/UI/general.html") ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>General</p>
                </a>
              </li>
              <li class="nav-item">
                <a src="<?= base_url("assets/pages/UI/icons.html") ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Icons</p>
                </a>
              </li>
              <li class="nav-item">
                <a src="<?= base_url("assets/pages/UI/buttons.html") ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Buttons</p>
                </a>
              </li>
              <li class="nav-item">
                <a src="<?= base_url("assets/pages/UI/sliders.html") ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sliders</p>
                </a>
              </li>
              <li class="nav-item">
                <a src="<?= base_url("assets/pages/UI/modals.html") ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Modals & Alerts</p>
                </a>
              </li>
              <li class="nav-item">
                <a src="<?= base_url("assets/pages/UI/navbar.html") ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Navbar & Tabs</p>
                </a>
              </li>
              <li class="nav-item">
                <a src="<?= base_url("assets/pages/UI/timeline.html") ?> " class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Timeline</p>
                </a>
              </li>
              <li class="nav-item">
                <a src="<?= base_url("assets/pages/UI/ribbons.html") ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ribbons</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Forms
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a src="<?= base_url("assets/pages/forms/general.html") ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>General Elements</p>
                </a>
              </li>
              <li class="nav-item">
                <a src="<?= base_url("assets/pages/forms/advanced.html") ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Advanced Elements</p>
                </a>
              </li>
              <li class="nav-item">
                <a src="<?= base_url("assets/pages/forms/editors.html") ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Editors</p>
                </a>
              </li>
              <li class="nav-item">
                <a src="<?= base_url("assets/pages/forms/validation.html") ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Validation</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Tables
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a src="<?= base_url("assets/pages/tables/simple.html") ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Simple Tables</p>
                </a>
              </li>
              <li class="nav-item">
                <a src="<?= base_url("assets/pages/tables/data.html") ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>DataTables</p>
                </a>
              </li>
              <li class="nav-item">
                <a src="<?= base_url("assets/pages/tables/jsgrid.html") ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>jsGrid</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header">EXAMPLES</li>
          <li class="nav-item">
            <a src="<?= base_url("assets/pages/calendar.html") ?>" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Calendar
                <span class="badge badge-info right">2</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a src="<?= base_url("assets/pages/gallery.html") ?>" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                Gallery
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                Mailbox
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a src="<?= base_url("assets/pages/mailbox/mailbox.html") ?> " class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inbox</p>
                </a>
              </li>
              <li class="nav-item">
                <a src=" <?= base_url("assets/pages/mailbox/compose.html") ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Compose</p>
                </a>
              </li>
              <li class="nav-item">
                <a src="<?= base_url("assets/pages/mailbox/read-mail.html") ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Read</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Pages
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a src="assets/pages/examples/invoice.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Invoice</p>
                </a>
              </li>
              <li class="nav-item">
                <a src="assets/pages/examples/profile.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Profile</p>
                </a>
              </li>
              <li class="nav-item">
                <a src="assets/pages/examples/e-commerce.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>E-commerce</p>
                </a>
              </li>
              <li class="nav-item">
                <a src="assets/pages/examples/projects.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Projects</p>
                </a>
              </li>
              <li class="nav-item">
                <a src="assets/pages/examples/project-add.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Project Add</p>
                </a>
              </li>
              <li class="nav-item">
                <a src="assets/pages/examples/project-edit.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Project Edit</p>
                </a>
              </li>
              <li class="nav-item">
                <a src="assets/pages/examples/project-detail.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Project Detail</p>
                </a>
              </li>
              <li class="nav-item">
                <a src="assets/pages/examples/contacts.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Contacts</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-plus-square"></i>
              <p>
                Extras
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a src="assets/pages/examples/login.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Login</p>
                </a>
              </li>
              <li class="nav-item">
                <a src="assets/pages/examples/register.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Register</p>
                </a>
              </li>
              <li class="nav-item">
                <a src="assets/pages/examples/forgot-password.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Forgot Password</p>
                </a>
              </li>
              <li class="nav-item">
                <a src="assets/pages/examples/recover-password.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Recover Password</p>
                </a>
              </li>
              <li class="nav-item">
                <a src="assets/pages/examples/lockscreen.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lockscreen</p>
                </a>
              </li>
              <li class="nav-item">
                <a src="assets/pages/examples/legacy-user-menu.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Legacy User Menu</p>
                </a>
              </li>
              <li class="nav-item">
                <a src="assets/pages/examples/language-menu.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Language Menu</p>
                </a>
              </li>
              <li class="nav-item">
                <a src="assets/pages/examples/404.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Error 404</p>
                </a>
              </li>
              <li class="nav-item">
                <a src="assets/pages/examples/500.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Error 500</p>
                </a>
              </li>
              <li class="nav-item">
                <a src="assets/pages/examples/pace.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pace</p>
                </a>
              </li>
              <li class="nav-item">
                <a src="assets/pages/examples/blank.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Blank Page</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="starter.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Starter Page</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header">MISCELLANEOUS</li>
          <li class="nav-item">
            <a href="https://adminlte.io/docs/3.0" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Documentation</p>
            </a>
          </li>
          <li class="nav-header">MULTI LEVEL EXAMPLE</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
              <p>Level 1</p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-circle"></i>
              <p>
                Level 1
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Level 2</p>
                </a>
              </li>
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Level 2
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Level 3</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Level 3</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Level 3</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Level 2</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
              <p>Level 1</p>
            </a>
          </li>
          <li class="nav-header">LABELS</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-circle text-danger"></i>
              <p class="text">Important</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-circle text-warning"></i>
              <p>Warning</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-circle text-info"></i>
              <p>Informational</p>
            </a>
          </li> -->
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
    <?php } ?>
