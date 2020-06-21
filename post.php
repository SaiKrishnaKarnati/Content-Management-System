<?php 
include "includes/header.php";
include "includes/db.php";
include "admin/includes/functions.php"
?>



<body>

    <!-- Navigation -->
    <?php include "includes/navigation.php" ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
                <?php
    if(isset($_GET['p_id']))
    {
        $the_post_id=$_GET['p_id'];
        echo $the_post_id;
    }
       $query ="select * from posts where post_id={$the_post_id}";
  $select_all_posts_query=mysqli_query($conn,$query);
                    while ($row=mysqli_fetch_assoc($select_all_posts_query))
                    {
                        $post_title=$row['post_title'];
                        $post_author=$row['post_author'];
                        $post_date=$row['post_date'];
                        $post_image=$row['post_image'];
                        $post_content=$row['post_content'];
                    
                        ?>
                        
                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="#"><?php echo $post_title?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span><?php echo $post_date?></p>
                <hr>
    <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">
                <hr><?php echo $post_content?></p>
              

                <hr>

                
                    <?php } ?> 


            </div>

            <!-- Blog Sidebar Widgets Column -->
             <?php include "includes/sidebar.php" ?>

        </div>
        <!-- /.row -->

        <hr>
            <?php
           if(isset($_POST['create_comment']))
           {   $p_id=$_GET['p_id'];
               $comment_author=$_POST['comment_author'];
               $comment_email=$_POST['comment_email'];
              
                $comment_content=$_POST['comment_content'];
                $query="insert into comments(comment_post_id,comment_author,comment_email,comment_content,comment_status,comment_date) ";
                $query .="values($p_id,'{$comment_author}','{$comment_email}','{$comment_content}','Unapproved',now())";
                $send_comment_to_db=mysqli_query($conn,$query);
            confirmQuery($send_comment_to_db);
            $query="update posts set post_comment_count=post_comment_count+1 where post_id=$p_id";
            $update_comment_count=mysqli_query($conn,$query);
            
               
           }
          
             ?>

            

        <hr>

        

                <!-- Posted Comments -->
                    <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form action="" method="post" role="form">
                       <div class="form-group">
                           <label for="Author">Author</label>
                            <input type="text" name="comment_author" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                             <input type="email" name="comment_email" class="form-control">
                        </div>
                        
                        <div class="form-group">
                           <label for="comment">Your Comment</label>
                            <textarea name="comment_content" class="form-control" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" name="create_comment">Submit</button>
                    </form> 
                </div>

                <hr>
                
               
                <?php
          $post_id=$_GET['p_id'];
           $query ="select * from comments where comment_post_id={$post_id} and comment_status='approved' order by comment_id desc";
           $select_comments_from_db=mysqli_query($conn,$query);
           confirmQuery($select_comments_from_db);
          
           while($row=mysqli_fetch_array($select_comments_from_db))
           {
               
              
               $comment_date=$row['comment_date'];
               $comment_content=$row['comment_content'];
               $comment_author=$row['comment_author'];
           
                ?>

              <!-- Comment -->
                <div class="media">
                   cbcvbcvb
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">hii<?php echo $comment_author; ?>
                        <small><?php echo $comment_date; ?></small>
                        </h4>
                        <?php echo $comment_content; ?>
                    </div>
                </div>
                
               <?php } ?>
               
                
                

              

       
 

<?php  include "includes/footer.php"?>