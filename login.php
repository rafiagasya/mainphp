<?php
    session_start();
    if (isset($_SESSION['username'])) {
        header("Location: welcome.php");
        exit();
    }

    $login = false;
    include('connection.php'); // Database connection

    if (isset($_POST['submit'])) {
        $username = $_POST['user'];
        $password = $_POST['pass'];

        // SQL query to fetch user details based on username or email
        $sql = "SELECT * FROM signup WHERE username = '$username' OR email = '$username'";  

        // Execute the query
        $result = mysqli_query($conn, $sql);  

        // Check for errors in the query
        if (!$result) {
            // If the query failed, output the error
            die("Query failed: " . mysqli_error($conn));
        }

        // Fetch the result row
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);  

        if ($row && password_verify($password, $row["password"])) {  
            $_SESSION['username'] = $row['username']; // Store username in session
            $_SESSION['loggedin'] = true; // Mark as logged in
            header("Location: welcome.php"); // Redirect to welcome page
            exit();
        } else {  
            // If login fails
            echo '<script>
                    alert("Login failed. Invalid username or password!");
                    window.location.href = "login.php";
                  </script>';
        }     
    }
?>
