<table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Username </th>
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
                                    {
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
                                   echo " <td><a href=comments.php?approve= />Approve</a></td>";
                                    echo "<td><a href=comments.php?unapprove= />UnApprove</a></td>";
                                       
                                        echo "<td><a href=comments.php?delete= />Delete </a></td>";
                                   echo "</tr>";
                                        
                                    }
                                    
                                  
                                  if(isset($_GET['delete']))
                                  {
                                      $delete_id=$_GET['delete'];
                                      $query="delete from comments where comment_id={$delete_id}";
                                      $delete_comment=mysqli_query($conn,$query);
                                      confirmQuery($delete_comment);
                                      header('Location:comments.php');
                                  }
                                
                                
                                
                                 if(isset($_GET['unapprove']))
                                  {
                                      $unapprove_id=$_GET['unapprove'];
                                      $query="update  comments  set comment_status='unapprove' where comment_id={$unapprove_id}";
                                      $unapprove_comment=mysqli_query($conn,$query);
                                      confirmQuery($unapprove_comment);
                                      header('Location:comments.php');
                                  }
                                if(isset($_GET['approve']))
                                  {
                                      $approve_id=$_GET['approve'];
                                      $query="update  comments  set comment_status='approved' where comment_id={$approve_id}";
                                      $approve_comment=mysqli_query($conn,$query);
                                      confirmQuery($approve_comment);
                                      header('Location:comments.php');
                                  }
                                
                                
                                ?>
                                

                        </tbody>
                        </table>


                       