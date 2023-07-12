<?php
     $Name = $_POST['name'];
     $Age = $_POST['Age'];
     $Weight = $_POST['Weight'];
     $EmailId = $_POST['EmailId'];
     $UploadHealthReport = $_POST['UploadHealthReport'];

     //Database connection
     $conn = new mysqli($Name, $Age, $Weight, $EmailId, $UploadHealthReport);
     if($conn->connect_error){
        die('Connection Failed : '.$conn->connect_error);
     }
     $email = $_POST['email'];
     $stmt = $conn->prepare("SELECT health_report FORM user_reports WHERE email = ?");
     $stmt->bind_param("s", $email);
     $stmt->execute();
     $stmt->store_result();
     
     if($stmt->num_rows > 0){
        $stmt->bind_result($healthReport);
        $stmt->fetch();
        header("Content-Disposition: inline; filename=health_report.pdf");

        readfile($healthReport);
     } else{
        echo "No health report found for the given email";
     }
        $stmt->close();
        $conn->close();
?>
     
