            
                <div class="col-md-4">
                
                       
    
    
                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <form action="search.php" method="post">
                    <div class="input-group">
                        <input type="text" class="form-control" name ="search">
                        <span class="input-group-btn">
                            <button name="submit" class="btn btn-default" type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    </form><!-- search form-->
                    <!-- /.input-group -->
                </div>
                
                <!-- Login -->
                <div class="well">
                    <h4>Login</h4>
                    <form action="includes/login.php" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" name ="username" placeholder="Enter username">
                        </div>
                        <div class="form-group">
                        <input type="password" class="form-control" name ="password" placeholder="Enter password">
                        <br/><span class="input-group-btn">
                        <button class="btn btn-primary" name="login" type="submit">Login</button>
                        </span>
                        </div>
                        
                    </form><!-- search form-->
                    <!-- /.input-group -->
                </div>
               
                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="list-unstyled">
                                 <?php 
                    $query="select * from categories limit 3";
                    $select_all_categories=mysqli_query($conn,$query);
                    while($row=mysqli_fetch_assoc($select_all_categories)){
                        $cat_title=$row['cat_title'];
                        $cat_id=$row['cat_id'];
                echo "<li><a href =category.php?category={$cat_id}>{$cat_title}</a></li>"; 
                    }
                    ?>

                            </ul>
                        </div></div>
                        
                        
                        
                        
                        
                        
                      
                <!-- Side Widget Well -->
                <?php include "widget.php"?>

            </div>