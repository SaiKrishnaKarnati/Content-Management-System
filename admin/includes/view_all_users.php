<table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Username </th>
                                    <th>Image</th>
                                    <th>firstname</th>
                                    <th>Lastname</th>
                                     <th>Email</th>
                                     <th>Role</th>
                                     <th>Date</th>
                                     
                                   
                                </tr>
                            </thead>
                           
                            
                             
                              
                                <tbody>
                            <tr>
                                <?php   
                                    $query="select * from users";
                                    $select_all_users=mysqli_query($conn,$query);
                                    while($row=mysqli_fetch_assoc($select_all_users))
                                    {$user_image=$row['user_image'];
                                        $user_id=$row['user_id'];
                                    $username=$row['username'];
                                    $user_password=$row['user_password'];
                                   $user_email=$row['user_email'];
                                    $user_firstname=$row['user_firstname'];
                                   // $user_date=$row['user_date'];
                                    $user_lastname=$row['user_lastname'];
                                    $user_image=$row['user_image'];
                                    $user_role=$row['user_role'];
                                    
                                    echo "<td>{$user_id}</td>";
                                    echo " <td>{$username}</td>";
                                    echo " <td><img width=100 src='../images/{$user_image}' alt='image'></td>";
                                    echo "<td>{$user_firstname}</td>";
                                    echo "<td>{$user_lastname}</td> ";
                                    echo "  <td>{$user_email}</td>";
                                    echo "<td>{$user_role}</td>";
                                 /*   $query="select * from posts where post_id={$comment_post_id}";
                                        $select_post_id_query=mysqli_query($conn,$query);
                                        confirmQuery($select_post_id_query);
                                        while($row=mysqli_fetch_assoc($select_post_id_query))
                                        {
                                            $post_id=$row['post_id'];
                                            $post_title=$row['post_title'];
                                            
                                            echo "<td><a href='../post.php?p_id=$post_id'>{$post_title}</a></td>" ;
                                        }*/
                                        
                                        
                                        
                                    echo "<td>{Fix me fast}</td>";
                                   echo " <td><a href=users.php?change_to_admin={$user_id} />Change to admin</a></td>";
                                    echo "<td><a href=users.php?change_to_subscriber={$user_id} />Change to Subscriber</a></td>";
                                       
                                        echo "<td><a href=users.php?delete={$user_id} />Delete </a></td>";
                                        echo "<td><a href=users.php?source=edit_user&edit={$user_id} />Edit </a></td>";
                                   echo "</tr>";
                                        
                                    }
                                    
                                  
                                  if(isset($_GET['delete']))
                                  {
                                      $delete_id=$_GET['delete'];
                                      $query="delete from users where user_id={$delete_id}";
                                      $delete_user=mysqli_query($conn,$query);
                                      confirmQuery($delete_user);
                                      header('Location:users.php');
                                  }
                                
                                
                                
                                 if(isset($_GET['change_to_admin']))
                                  {
                                      $user_id=$_GET['change_to_admin'];
                                      $query="update  users  set user_role='admin' where user_id={$user_id}";
                                      $change_role=mysqli_query($conn,$query);
                                      confirmQuery($change_role);
                                      header('Location:users.php');
                                  }
                                if(isset($_GET['change_to_subscriber']))
                                  {
                                      $user_id=$_GET['change_to_subscriber'];
                                      $query="update  users  set user_role='subscriber' where user_id={$user_id}";                                     
                                       $change_role=mysqli_query($conn,$query);
                                      confirmQuery($user_id);
                                      header('Location:users.php');
                                  }
                                
                                
                                ?>
                                

                        </tbody>
                        </table>


                       