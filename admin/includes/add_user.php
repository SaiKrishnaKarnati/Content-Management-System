<?php 
if(isset($_POST['create_user']))
{
    //$post_title=$_POST['user_id'];
    $username=$_POST['Username'];
    $user_email=$_POST['User_email'];
    $user_password=$_POST['user_password'];
    $user_role=$_POST['user_role'];
   echo $user_image=$_FILES['image']['name'];
   echo $user_image_temp=$_FILES['image']['tmp_name'];
    $dummy=$_FILES['image'];
    $user_firstname=$_POST['user_firstname'];
    $user_lastname=$_POST['user_lastname'];
    
   // $post_date=date('d-m-y');
  //  mysqli_real_escape_string($conn,$post_content);
   // $post_comment_count=4;
    
   
 
   move_uploaded_file($user_image_temp,"../images/$user_image");
    $query="insert into users(user_firstname,user_lastname,username,user_role,user_image,user_email,user_password)
     values('{$user_firstname}','{$user_lastname}','{$username}','{$user_role}','{$user_image}','{$user_email}','{$user_password}')";
    $Add_users_to_db=mysqli_query($conn,$query);
    confirmQuery($Add_users_to_db);
        
}



?>
   

   
   
   
   
   <form action="" method="post" enctype="multipart/form-data">
   <div class="form-group">
        <label for="title">Username</label>
        <input type="text" class="form-control" name="Username">
    </div>
    <div class="form-group">
        <label for="title">Email</label>
        <input type="email" class="form-control" name="User_email">
    </div>
    <div class="form-group">
       <select name="user_role" id="">
       <option value="">select any</option>
       <option value="user_role">admin</option>
       <option value="user_role">Subscriber</option>

       </select>
    </div>
    <div class="form-group">
        <label for="title">password</label>
        <input type="password" class="form-control" name="user_password">
    </div>
    <div class="form-group">
        <label for="image">Image</label>
        <input type="file"  name="image">
    </div>
    
    <div class="form-group">
        <label for="title">First Name</label>
        <input type="text" class="form-control" name="user_firstname">
    </div>

    <div class="form-group">
        <label for="Post_category_Id">Last Name</label>
       <input type="text" class="form-control" name="user_lastname">
    </div>

    
    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="create_user" value="Add User">
    </div>




</form>