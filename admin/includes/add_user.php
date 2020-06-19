<?php 
if(isset($_POST['create_post']))
{
    $post_title=$_POST['post_title'];
    $post_category_id=$_POST['post_category_id'];
   $post_author=$_POST['author'];
    $post_status=$_POST['post_status'];
    $post_image=$_FILES['image']['name'];
    $post_image_temp=$_FILES['image']['tmp_name'];
    $post_tags=$_POST['post_tags'];
    $post_content=$_POST['post_content'];
    $post_date=date('d-m-y');
    mysqli_real_escape_string($conn,$post_content);
   // $post_comment_count=4;
    
   
    echo $post_image;
    echo $post_image_temp;
    
   move_uploaded_file($post_image_temp,"../images/$post_image");
    $query="insert into posts(post_category_id,post_author,post_title,post_date,post_image,post_content,post_tags,post_status) values('{$post_category_id}','{$post_author}','{$post_title}',now(),'{$post_image}','{$post_content}','{$post_tags}','{$post_status}')";
    $Add_posts_to_db=mysqli_query($conn,$query);
    confirmQuery($Add_posts_to_db);
        
}



?>
   

   
   
   
   
   <form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" class="form-control" name="post_title">
    </div>

    <div class="form-group">
        <label for="Post_category_Id">Post category Id</label>
       <select name="post_category_id">
        <?php  
       $query = 'select * from categories';
      $get_all_categories = mysqli_query( $conn, $query );
               confirmQuery($get_all_categories);
      while( $row = mysqli_fetch_assoc($get_all_categories) ) {

      $cat_id = $row['cat_id'];
      $cat_title = $row['cat_title'];
       echo "<option value='{$cat_id}'>{$cat_title}</option>";
        }?>
      </select>
    </div>

    <div class="form-group">
        <label for="post_author">Post Author</label>
    <input type="text" class="form-control" name="author">
    </div>

    <div class="form-group">
        <label for="Post_status">Post Status</label>
        <input type="text" class="form-control" name="post_status">
    </div>

    <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file" name="image">
    </div>

    <div class="form-group">
        <label for="Post_tags">Post tags</label>
        <input type="text" class="form-control" name="post_tags">
    </div>

    <div class="form-group">
        <label for="Post_Content">Post Content</label>
        <textarea class="form-control" name="post_content" id="" cols="30" rows="10"></textarea>
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="create_post" value="Publish Post">
    </div>




</form>