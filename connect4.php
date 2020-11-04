<?php
                  
                    $r_email = $_POST['r_email'];
                    $r_password = $_POST['r_password'];


                    // Create Connection
                    $conn = new mysqli('localhost', 'root', '', 'fit_gym', 3307);
                    
                        if ((isset($_POST['search_by_r_email']) && isset($_POST['search_by_r_password']))
                         {

                            $r_email = $_POST['get_r_email']
                            $r_password = $_POST['get_r_password']

                            $sql = "select * from trainerregister_tb where r_email='".$r_email."'AND r_password='".$r_password."' limit 1";
                            $query_run = mysqli_query($conn, $query);

                          
                            

                    ?>
                    <div class="table-responsive">

                    </div>
                    <table class="table">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">r_login_id</th>
                                    <th scope="col">r_name</th>
                                    <th scope="col">r_email</th>
                                    <th scope="col">r_password</th>
                                    <th scope="col">r_contact</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                 if(mysqli_num_rows($query_run)> 0)
                                 {
                                   while($row = mysqli_fetch_array($query_run))
                                   {
                                 ?>

                                        <tr>
                                            <td><?php echo $row['r_login_id'] ?></td>
                                                <td><?php echo $row['r_name'] ?></td>
                                                <td><?php echo $row['r_email'] ?></td>
                                                <td><?php echo $row['r_password'] ?></td>
                                                <td><?php echo $row['r_contact'] ?></td>
                                        </tr>
                                        
                                    <?php
                                    }
                                }
                                 else {
                                    ?>

                                    <tr>
                                        <td colspan="6">no record found</td>
                                    </tr>
                                    <?php
                                 }
                                  ?>

                            </tbody>
                        </table>
                    <?php
                                }
                    ?>
                </div>
            </div>
        </div>
