<?php
function insert_categories(){
global $conn;

if ( isset( $_POST['submit'] ) ) {
    $category = $_POST['cat_title'];

    if ( $category == '' || empty( $category ) ) {
        echo '<h4>This field cannot be empty</h4>';
    } else {

        $query = "insert into categories(cat_title) value('{$category}')";
        $result = mysqli_query( $conn, $query );

        if ( !$result )
        die( 'not updated' .mysqli_error( $conn ) );

    }
}

}

function editcategory_display(){
    
    if ( isset( $_GET['edit_id'] ) ) {

    $edit_id = $_GET['edit_id'];

    $edit_cat = $_GET['edit_cat'];

    echo "<label for='cat_title'>Edit Category</label>
        <input type='text' class='form-control' name='cat_title' value='{$edit_cat}'>
                    </div>
        <div class='formgroup'>
        <input class='btn btn-primary' type='submit' name='edit' value='Update category'>
                                </div>";

}
}

function Update_category()
{
    global $conn;
    if ( isset( $_POST['edit'] ) ) {
    $edit_cat = $_POST['cat_title'];
    $edit_id = $_GET['edit_id'];

    $query = "update categories set cat_title='$edit_cat' where cat_id=$edit_id";

    $update_category = mysqli_query( $conn, $query );
    if ( !$update_category ) {
        die( 'update error' .mysqli_error( $conn ) );
    }

}
}

function Show_all_categories()
{

    global $conn;
$query = 'select * from categories';
$get_all_categories = mysqli_query( $conn, $query );
while( $row = mysqli_fetch_assoc( $get_all_categories ) ) {

    $cat_id = $row['cat_id'];
    $cat_title = $row['cat_title'];
    echo '<tr>' ;

    echo "<td>{$cat_id}</td>";

    echo "<td>{$cat_title}</td>";
    echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
    echo "<td><a href='categories.php?edit_id={$cat_id}&edit_cat={$cat_title}'>Edit</a></td>";

    echo '<tr/>';

}
}

function Delete_category()
{
    global $conn;
    if ( isset( $_GET['delete'] ) ) {
    $cat_id = $_GET['delete'];
    $query = "Delete from categories where cat_id={$cat_id}";
    $Delete_category = mysqli_query( $conn, $query );
    header( 'Location:categories.php' );

}

}
function confirmQuery($value)
{
    global $conn;
    if(!$value)
    {
        die(mysqli_error($conn));
    }
    
}
?>