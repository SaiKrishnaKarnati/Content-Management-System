<?php include 'includes/admin_header.php' ;
          
?>

<body>

    <div id='wrapper'>

        <!-- Navigation -->
        <?php include 'includes/admin_navigation.php' ;
?>

        <div id='page-wrapper'>

            <div class='container-fluid'>

                <!-- Page Heading -->
                <div class='row'>
                    <div class='col-lg-12'>
                        <h1 class='page-header'>
                            Welcome to admin
                            <small>Author</small>
                        </h1>

                        <div class='col-xs-6'>
                        <?php  insert_categories() ; ?>

                            <form action='' method='post'>
                                <div class='form-group'>
                                    <label for='cat_title'>ADD Category</label>

                                    <input type='text' class='form-control' name='cat_title'>
                                </div>
                               
                                <div class='formgroup'>
                                    <input class='btn btn-primary' type='submit' name='submit' value='Add category'>
                                </div>

                            </form>
                            <br />
                            <form action='' method='post'>
                                <div class='form-group'>

                    <?php  
                                
                    editcategory_display(); //Query to display edit category box
                    Update_category(); //Update the edited title to database 
                         ?>

                            </form>

                        </div>

                        <div class='col-xs-6'>

                            <table class='table table-bordered table-hover'>
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Cateogory Title</th>
                                        <th>Delete categories</th>
                                        <th>Edit categories</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
            <?php Show_all_categories();  //Display all the categories?>
       
     <?php  Delete_category(); //Delete the specified category ?>
       

                                    </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
        <?php include 'includes/admin_footer.php' ;
?>