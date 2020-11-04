<?php
      
        $c_name = $_POST['c_name'];
        $c_email = $_POST['c_email'];
        $c_message = $_POST['c_message'];
      
       

        // Create Connection
          $conn = new mysqli('localhost','root','','fit_gym', 3307);
          if($conn->connect_error) {
            die("connection failed");
           }
            else{
              $stmt = $conn->prepare("insert into contact_tb(c_name, c_email, c_message) VALUES ( ?, ?, ?)");
               $stmt->bind_param("sss", $c_name,  $c_email, $c_message);
               $stmt->execute();
               echo "Your message is submitted successfully...";
               $stmt->close();
               $conn->close();
            }
?>