<?php include 'includes/admin_header.php' ; ?>
<?php

if(isset($_SESSION['username']))
{
    $username= $_SESSION['username'];
    $query="select * from users where username ='$username'";
    $select_user_profile_query=mysqli_query($conn,$query);
    while($row=mysqli_fetch_assoc($select_user_profile_query))
    {
        $user_image=$row['user_image'];
        $user_id=$row['user_id'];
        $username=$row['username'];
        $user_password=$row['user_password'];
        $user_email=$row['user_email'];
        $user_firstname=$row['user_firstname'];
        // $user_date=$row['user_date'];
        $user_lastname=$row['user_lastname'];
        $user_image=$row['user_image'];
        $user_role=$row['user_role'];
    }
}
?>

<body>

    <div id='wrapper'>

        <!-- Navigation -->
        <?php include 'includes/admin_navigation.php' ; ?>

        <div id='page-wrapper'>

            <div class='container-fluid'>

                <!-- Page Heading -->
                <div class='row'>
                    <div class='col-lg-12'>
                        <h1 class='page-header'>
                            Welcome to admin
                            <small>Author</small>
                        </h1><?php echo $_SESSION['username'] ?>
                        <form action="" method="post" enctype="multipart/form-data">
   <div class="form-group">
        <label for="title">Username</label>
        <input type="text" class="form-control" name="Username" value=<?php echo $username?>>
    </div>
    <div class="form-group">
        <label for="title">Email</label>
        <input type="email" class="form-control" name="User_email" value=<?php echo $user_email?>>
    </div>
    <div class="form-group">
       <select name="user_role" id="">
       <option value="$user_role"><?php echo $user_role ?></option>
<?php 
       
if($user_role == 'subscriber')
{
   echo " <option value='user_role'>admin</option>";

}
else
{
    echo "<option value='user_role'>Subscriber</option>";
}
?>
</select>
    </div>
    <div class="form-group">
        <label for="title">password</label>
        <input type="password" class="form-control" name="user_password" value=<?php echo $user_password?>>
    </div>
    <div class="form-group">
        <label for="image">Image</label>
        <img width=100 src="../images/<?php  echo $user_image ?>" alt="image">
        <input type="file"  name="image">
    </div>
    
    <div class="form-group">
        <label for="title">First Name</label>
        <input type="text" class="form-control" name="user_firstname" value=<?php echo $user_firstname?>>
    </div>

    <div class="form-group">
        <label for="Post_category_Id">Last Name</label>
       <input type="text" class="form-control" name="user_lastname" value=<?php echo $user_lastname?>>
    </div>

    
    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="edit_user" value="Update user">
    </div>




</form>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->

    </div>
    <?php 
    
    if(isset($_POST['edit_admin']))
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
    <!-- /#page-wrapper -->
    <?php include 'includes/admin_footer.php' ;
?>