<?php
include'php/pdo.php';
include'sidebar.php';
?>
<div class="row show-grid">
    <!-- Customer ROW -->
    <div class="col-md-3">
        <h1>account shop details</h1>
        <!-- Customer record -->
        <div class="col-md-12 mb-3">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-0">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Customers</div>
                            <div class="h6 mb-0 font-weight-bold text-gray-800">
                            <?php 
                           $nRows = $pdo2->query('select count(*) from aptc_shop_user')->fetchColumn(); 
                           echo $nRows;
                          
                                                                  ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 mb-3">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-0">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Command</div>
                            <div class="h6 mb-0 font-weight-bold text-gray-800">
                            <?php 
                           $nRows = $pdo2->query('select count(*) from aptc_shop_cart where confirme=1')->fetchColumn(); 
                           echo $nRows;
                          
                                                                  ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Supplier record -->
        <div class="col-md-12 mb-3">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-0">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Spotify</div>
                            <div class="h6 mb-0 font-weight-bold text-gray-800">
                            <?php 
                        
                    
                           $spotify = $pdo2->prepare("SELECT badge FROM account WHERE title = 'spotify'  ");
                            $spotify->execute();
                            $sRows = $spotify->fetchColumn();
                           
                           echo $sRows;

                          
                                                                  ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 mb-3">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-0">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Netflix</div>
                            <div class="h6 mb-0 font-weight-bold text-gray-800">
                            <?php 
                        
                    
                        $netflix = $pdo2->prepare("SELECT badge FROM account WHERE title = 'netflix'  ");
                         $netflix->execute();
                         $sRows = $netflix->fetchColumn();
                        
                        echo $sRows;

                       
                                                               ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 mb-3">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-0">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Deezer</div>
                            <div class="h6 mb-0 font-weight-bold text-gray-800">
                            <?php 
                        
                    
                        $deezer = $pdo2->prepare("SELECT badge FROM account WHERE title = 'deezer'  ");
                         $deezer->execute();
                         $sRows = $deezer->fetchColumn();
                        
                        echo $sRows;

                       
                                                               ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 mb-3">
            <div class="card border-left-secondary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-0">
                            <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">tidal</div>
                            <div class="h6 mb-0 font-weight-bold text-gray-800">
                            <?php 
                        
                    
                        $tidal = $pdo2->prepare("SELECT badge FROM account WHERE title = 'tidal'  ");
                         $tidal->execute();
                         $sRows = $tidal->fetchColumn();
                        
                        echo $sRows;

                       
                                                               ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 mb-3">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-0">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Supplier</div>
                            <div class="h6 mb-0 font-weight-bold text-gray-800">
                            <?php 
                        
                    
                        $crunchyroll = $pdo2->prepare("SELECT badge FROM account WHERE title = 'crunchyroll'  ");
                         $crunchyroll->execute();
                         $sRows = $crunchyroll->fetchColumn();
                        
                        echo $sRows;

                       
                                                               ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="col-md-3">
    <h1>APTC details general</h1>
        <!-- Customer record -->
        <div class="col-md-12 mb-3">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-0">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Customers</div>
                            <div class="h6 mb-0 font-weight-bold text-gray-800">
                                50
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Supplier record -->
        <div class="col-md-12 mb-3">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-0">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Supplier</div>
                            <div class="h6 mb-0 font-weight-bold text-gray-800">

                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- Employee ROW -->
    <div class="col-md-3">
    <h1>APTC e-commerce details</h1>
        <!-- Employee record -->
        <div class="col-md-12 mb-3">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-0">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Employees</div>
                            <div class="h6 mb-0 font-weight-bold text-gray-800">
                                <?php 
                           $nRows = $pdo->query('select count(*) from employe')->fetchColumn(); 
                           echo $nRows;
                          
                                                                  ?>




                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- User record -->
        <div class="col-md-12 mb-3">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-0">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Registered Account
                            </div>
                            <div class="h6 mb-0 font-weight-bold text-gray-800">
                                <?php 
                           $nRows = $pdo->query('select count(*) from users')->fetchColumn(); 
                           echo $nRows;
                          
                                                                  ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- PRODUCTS ROW -->
    <div class="col-md-3">
        <!-- Product record -->
        <h1>APTC trading</h1>
        <div class="col-md-12 mb-3">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">

                        <div class="col mr-0">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Product</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h6 mb-0 mr-3 font-weight-bold text-gray-800">

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        

    </div>

    <!-- RECENT PRODUCTS -->
    <div class="col-lg-3">
        <div class="card shadow h-100">
            <div class="card-body">
                <div class="row no-gutters align-items-center">

                    <div class="col-auto">
                        <i class="fa fa-th-list fa-fw"></i>
                    </div>

                    <div class="panel-heading"> Recent Products
                    </div>
                    <div class="row no-gutters align-items-center mt-1">
                        <div class="col-auto">
                            <div class="h6 mb-0 mr-0 text-gray-800">
                                <!-- /.panel-heading -->

                                <div class="panel-body">
                                    <div class="list-group">

                                    </div>
                                    <!-- /.list-group -->
                                    <a href="product.php" class="btn btn-default btn-block">View All Products</a>
                                </div>
                                <!-- /.panel-body -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- 
          <div class="col-md-3">
           <div class="col-md-12 mb-2">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-danger text-uppercase mb-1"><i class="fas fa-list text-danger">&nbsp;&nbsp;&nbsp;</i>Recent Products</div>
                      <div class="h6 mb-0 font-weight-bold text-gray-800">
                    
                      </div>
                    </div>
                    <div class="col-auto">
                      
                    </div>
                  </div>
                </div>
              </div>
            </div>
            </div> -->


    </div>

    <?php
include'footer.php';
?>