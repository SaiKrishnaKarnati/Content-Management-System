 <?php
if(isset($_GET['edit']))
    $edit_id=$_GET['edit'];
    $query="select * from posts where post_id={$edit_id}";
$result=mysqli_query($conn,$query);
confirmQuery($result);
    while($row=mysqli_fetch_assoc($result))
    {
        
        $post_title=$row['post_title'];
        $post_category_id=$row['post_category_id'];
        $post_Author=$row['post_author'];
        $post_status=$row['post_status'];
        $post_tags=$row['post_tags'];
        $post_content=$row['post_content'];
        $post_title=$row['post_title'];
        $post_present_image=$row['post_image'];
        $post_image=$row['post_image'];

   
    }
?>
  <?php
if(isset($_POST['update_post']))
{
    echo print_r($_POST);
 $post_title=$_POST['post_title'];
    $post_category_id=$_POST['post_category_id'];
   $post_author=$_POST['author'];
    $post_status=$_POST['post_status'];
    $post_image=$_FILES['image']['name'];
    $post_image_temp=$_FILES['image']['tmp_name'];
    $post_tags=$_POST['post_tags'];
    $post_content=$_POST['post_content'];
    $edit_id=$_GET['edit'];
    $post_comment_count=5;
    echo $post_category_id;
    echo $post_title;
    move_uploaded_file($post_image_temp,"../images/$post_image");
    
    
    $update_query="update posts set post_category_id='{$post_category_id}',post_author='{$post_author}',post_title='{$post_title}',post_date=now(), post_content='{$post_content}',post_tags='{$post_tags}',post_comment_count='{$post_comment_count}',post_status='{$post_status}',post_image='{$post_image}' where post_id={$edit_id}";
    
    $update_post=mysqli_query($conn,$update_query);
    confirmQuery($update_post);


}





?>
   
   <form action='' method='post' enctype='multipart/form-data'>
    <div class='form-group'>
        <label for='title'>Post Title</label>
        <input type='text' class='form-control' name='post_title' value="<?php echo $post_title ?>">
    </div>

    <div class='form-group'>
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

    <div class='form-group'>
        <label for='post_author'>Post Author</label>
    <input type='text' class='form-control' name='author' value='<?php echo $post_Author ?>'>
    </div>

    <div class='form-group'>
        <label for='Post_status'>Post Status</label>
        <input type='text' class='form-control' name='post_status' value='<?php echo $post_status ?>'>
    </div>

    <div class='form-group'>
        <img src='../images/<?php echo $post_image ?> 'width='100' alt='image'>
        <input type="file" name="image">
        
    </div>

    <div class='form-group'>
        <label for='Post_tags'>Post tags</label>
        <input type='text' class='form-control' name='post_tags' value='<?php echo $post_tags ?>'>
    </div>

    <div class='form-group'>
        <label for='Post_Content'>Post Content</label>
        <textarea class='form-control' name='post_content' id='' cols='30' rows='10'><?php echo $post_title ?></textarea>
    </div>

    <div class='form-group'>
        <input type='submit' class='btn btn-primary' name='update_post' value='Publish Post'>
    </div>
</form>
