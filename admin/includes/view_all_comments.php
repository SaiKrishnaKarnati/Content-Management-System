        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Author </th>
                                    <th>Comment</th>
                                    <th>Email </th>
                                     <th>status </th>
                                     <th>IN Response to</th>
                                     <th>Date</th>
                                     <th>Approve</th>
                                     <th>Unapprove</th>
                                      <th>Delete</th>
                                   
                                </tr>
                            </thead>
                           
                            
                             
                              
                                <tbody>
                            <tr>
                                <?php   
                                    $query="select * from comments";
                                    $display_comments_data=mysqli_query($conn,$query);
                                    while($row=mysqli_fetch_assoc($display_comments_data))
                                    {
                                        $comment_id=$row['comment_id'];
                                    $comment_author=$row['comment_author'];
                                   $comment_email=$row['comment_email'];
                                    $comment_status=$row['comment_status'];
                                    $comment_date=$row['comment_date'];
                                    $comment_content=$row['comment_content'];
                                    $comment_post_id=$row['comment_post_id'];
                                    echo "<td>{$comment_id}</td>";
                                  
                                   echo " <td>{$comment_author}</td>";
                                 echo "<td>{$comment_content}</td>";
                                    echo "  <td>{$comment_email}</td>";
 
                                  
                                    echo "<td>{$comment_status}</td>";
                                    $query="select * from posts where post_id={$comment_post_id}";
                                        $select_post_id_query=mysqli_query($conn,$query);
                                        confirmQuery($select_post_id_query);
                                        while($row=mysqli_fetch_assoc($select_post_id_query))
                                        {
                                            $post_id=$row['post_id'];
                                            $post_title=$row['post_title'];
                                            
                                            echo "<td><a href='../post.php?p_id=$post_id'>{$post_title}</a></td>" ;
                                        }
                                        
                                        
                                        
                                    echo "<td>{$comment_date}</td>";
                                   echo " <td><a href=comments.php?approve={$comment_id} />Approve</a></td>";
                                    echo "<td><a href=comments.php?unapprove={$comment_id} />UnApprove</a></td>";
                                       
                                        echo "<td><a href=comments.php?delete={$comment_id}& />Delete </a></td>";
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


                       