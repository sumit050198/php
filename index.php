<!DOCTYPE html>
<html>
<head>
    <title>Registration Form</title>
</head>
<body>
    <h2>Registration Form</h2>
    <form method="post" action="xampp\htdocs\phpCode?>">
        <label for="name">Name:</label><br>
        <input class="form-control" type="text" id="name" name="name" required><br><br>
        
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>
        
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        
        <label for="phone">Phone:</label><br>
        <input type="tel" id="phone" name="phone" pattern="[0-9]{10}" required><br><br>
        
        <input type="submit" name="submit" value="Submit">
    </form>

    <?php
    // PHP code to handle form submission and database connection
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Database connection
        $servername = "localhost";
        $username = "root"; // Your MySQL username
        $password = "root"; // Your MySQL password
        $dbname = "test_demo"; // Your MySQL database name

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Escape user inputs for security
        $name = $conn->real_escape_string($_POST['name']);
        $email = $conn->real_escape_string($_POST['email']);
        $password = $conn->real_escape_string($_POST['password']);
        $phone = $conn->real_escape_string($_POST['phone']);

        // Insert user data into database
        $sql = "INSERT INTO `test_demo`.`form` (name, email, password, phone) VALUES ('$name', '$email', '$password', '$phone')";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // Close connection
        $conn->close();
    }
    ?>
</body>
</html>

