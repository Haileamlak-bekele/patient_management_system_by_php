<?php
// Include the database connection file
include('include/connection.php');

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get username and password from form
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Get user type from form
  $userType = $_POST['user-type'];

  // Check if user exists in database
  $sql = "SELECT * FROM staff_members WHERE username='$username' AND password='$password'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // User exists in database, redirect based on selected user type
    switch ($userType) {
      case 'doctor':
        header('Location: docthom.php');
        break;
      case 'LabTech':
        header('Location: LabTechHome.php');
        break;
      case 'reception':
        header('Location: RecepHome.php');
        break;
      case 'phy_assist':
        header('Location: PhysicianAss_Home.php');
        break;
      default:
        echo "Invalid user type";
    }
  } else {
    echo "Invalid username or password";
  }
  
}

// Close database connection
$conn->close();
?>