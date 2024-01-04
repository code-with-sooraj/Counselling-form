<?php
// Database connection parameters
$hostname = "localhost";
$username = "root";
$password = "";
$database = "Counselling";

// Create a database connection
$conn = new mysqli($hostname, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle the form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['photo']) && isset($_FILES['tenth']) && isset($_FILES['twelth']) && $_FILES["photo"]["error"] == 0) {
        $cid = $_POST['cid'];
        $name = $_POST['fname']." ".$_POST['lname'];
        $email = $_POST['email'];
        $phone = $_POST['contact'];
        $addr = $_POST['address'];
        $photo = $_FILES['photo'];
        $twelth = $_FILES['twelth'];
        $tenth = $_FILES['tenth'];

        $photoData = file_get_contents($photo['tmp_name']);
        $intermediateData = file_get_contents($twelth['tmp_name']);
        $tenthData = file_get_contents($tenth['tmp_name']);

        $photoData = mysqli_real_escape_string($conn, $photoData);
        $intermediateData = mysqli_real_escape_string($conn, $intermediateData);
        $tenthData = mysqli_real_escape_string($conn, $tenthData);

        $query = "insert INTO student(c_id,f_name,email,phone_no,address,photo,twelth, tenth) VALUES ('$cid','$name','$email','$phone', '$addr','$photoData', '$intermediateData', '$tenthData')";
        try{
            if (mysqli_query($conn, $query)) {
                echo "<script>alert('successful');
                location.href = 'details.php'</script>";
            }
        }catch(mysqli_sql_exception $e){
            if ($e->getCode() == 1062) { 
                echo "<script>alert('Duplicate Entry');location.href = 'details.php'</script>";
                die();
            } else {
                echo "Database error: " . $e->getMessage();
            }
        }
        finally{
            mysqli_close($conn);
        }
    }else{
        echo "error";
    }
}
?>