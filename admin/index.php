<?php include "includes/admin_header.php" ;?>

<body>

    <div id="wrapper">
        

        <!-- Navigation -->
        <?php include "includes/admin_navigation.php" ;?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to admin page
                            <small><?php echo $_SESSION['username']; ?></small>
                        </h1>
                        
                    </div>
                </div>
                <!-- /.row -->
                       
                <!-- /.row -->
                
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-file-text fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                  <div class='huge'>
                                  <?php 
                                  $query="select * from posts";
                                  $count_posts=mysqli_query($conn,$query);
                                  confirmQuery($count_posts);
                                  $post_count=mysqli_num_rows($count_posts);
                                  echo $post_count;
                                  
                                  
                                  ?>




                                  </div>
                                        <div>Posts</div>
                                    </div>
                                </div>
                            </div>
                            <a href="posts.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-comments fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                     <div class='huge'>
                                     <?php 
                                  $query="select * from comments";
                                  $count_comments=mysqli_query($conn,$query);
                                  confirmQuery($count_comments);
                                  $comment_count=mysqli_num_rows($count_comments);
                                  echo $comment_count;
                                  
                                  
                                  ?>

                                     </div>
                                      <div>Comments</div>
                                    </div>
                                </div>
                            </div>
                            <a href="comments.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-user fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                    <div class='huge'>
                                    <?php 
                                  $query="select * from users";
                                  $count_users=mysqli_query($conn,$query);
                                  confirmQuery($count_users);
                                  $users_count=mysqli_num_rows($count_users);
                                  echo $users_count;
                                  
                                  
                                  ?>

                                    </div>
                                        <div> Users</div>
                                    </div>
                                </div>
                            </div>
                            <a href="users.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-list fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class='huge'>
                                        <?php 
                                  $query="select * from categories";
                                  $count_categories=mysqli_query($conn,$query);
                                  confirmQuery($count_categories);
                                  $categories_count=mysqli_num_rows($count_categories);
                                  echo $categories_count;
                                  
                                  
                                  ?>



                                        </div>
                                         <div>Categories</div>
                                    </div>
                                </div>
                            </div>
                            <a href="categories.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

             <?php
            
            $query="select * from posts where post_status='draft'";
            $select_all_draft_posts=mysqli_query($conn,$query);
            
            $post_draft_count=mysqli_num_rows($select_all_draft_posts);

            $query="select * from posts where post_status='published'";
            $select_all_published_posts=mysqli_query($conn,$query);
            
            $post_published_count=mysqli_num_rows($select_all_published_posts);

             
            $query="select * from comments where comment_status='unapproved'";
            $select_all_unapproved_comments=mysqli_query($conn,$query);
            $unapproved_comment_count=mysqli_num_rows($select_all_unapproved_comments);

             
            $query="select * from users where user_role='subscriber'";
            $select_all_subscribers=mysqli_query($conn,$query);
            $subscriber_count=mysqli_num_rows($select_all_subscribers);
       





             ?>








                                <!-- /.row -->
                                <div class="row">
                                <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Data', 'count'],
          <?php 
          $element_text=['Published Posts','Draft Posts','Comments','Pending Comments','Users','Subscriber','Categories'];
          $element_count=[$post_published_count,$post_draft_count,$comment_count,$unapproved_comment_count,$users_count,$subscriber_count,$categories_count];
          for($i =0;$i < 7;$i++)
          {
            echo "['{$element_text[$i]}'" ."," ."{$element_count[$i]}],";
          }
          
          ?>
         // ['posts', 1000],
       
        ]);

        var options = {
          chart: {
            title: '',
            subtitle: '',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>

<div id="columnchart_material" style="width: 'auto'; height: 500px;"></div>





                                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
<?php include "includes/admin_footer.php" ;?>
