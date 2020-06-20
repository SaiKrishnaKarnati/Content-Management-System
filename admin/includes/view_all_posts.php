        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Author</th>
                                    <th>title</th>
                                    <th>category</th>
                                    <th>Status</th>
                                    <th>Image</th>
                                    <th>Tags</th>
                                    <th>Comments</th>
                                    <th>Date</th>
                                    <th>Publish</th>
                                    <th>Delete</th>
                                    <th>Edit</th>
                                </tr>
                            </thead>
                           
                            
                             
                              
                                <tbody>
                            <tr>
                                <?php   
                                    $query="select * from posts";
                                    $display_posts_data=mysqli_query($conn,$query);
                                    while($row=mysqli_fetch_assoc($display_posts_data))
                                    {
                                        $post_id=$row['post_id'];
                                    $post_author=$row['post_author'];
                                    $post_title=$row['post_title'];
                                    $post_status=$row['post_status'];
                                    $post_image=$row['post_image'];
                                    $post_date=$row['post_date'];
                                $post_comment=$row['post_content'];
                                    $post_tags=$row['post_tags'];
                                    $post_categoryid=$row['post_category_id'];
                                    echo "<td>{$post_id}</td>
                                    <td>{$post_author}</td>
                                    <td>{$post_title}</td>";
                                    
                          $query = "select * from categories  where cat_id={$post_categoryid}";
                          $get_all_categories = mysqli_query( $conn, $query ); 
                                        confirmQuery($get_all_categories);
                         while( $row = mysqli_fetch_assoc( $get_all_categories ) ) {

                     $cat_id = $row['cat_id'];
                     $cat_title = $row['cat_title'];
                     echo "<td>{$cat_title}</td>" ;
                     }
                                    
                                 
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                echo "  <td>{$post_status}</td>
    <td><img width='100' src='../images/{$post_image}'  alt='image'</td>
                                    <td>{$post_tags}</td>
                                    <td>{$post_comment}</td>
                                    <td>{$post_date}</td>
                                    <td><a href=posts.php?publish={$post_id}>Publish</a></td>;
                                     <td><a href=posts.php?delete={$post_id} />Delete Post</a></td>;
                                     <td><a href=posts.php?edit={$post_id}&source=edit_post />edit Post</a></td>;
                                    </tr>";
                                        
                                    }
                                    
                                  
                                  if(isset($_GET['delete']))
                                  {
                                      $delete_id=$_GET['delete'];
                                      $query="delete from posts where post_id={$delete_id}";
                                      $delete_post=mysqli_query($conn,$query);
                                      confirmQuery($delete_post);
                                      header('Location:posts.php');
                                  }
                                
                                  
                                  if(isset($_GET['publish']))
                                  {
                                      $publish_id=$_GET['publish'];
                                      $query="update posts set post_status='published' where post_id={$publish_id}";
                                      $publish_post=mysqli_query($conn,$query);
                                      confirmQuery($publish_post);
                                      header('Location:posts.php');
                                  }
                                
                                ?>
                                

                        </tbody>
                        </table>


                       