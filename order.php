<!DOCTYPE html>
<html>
<head>
    <title>Checkout Process</title>
    <link rel="stylesheet" type="text/css" href="./assets/order.css">
</head>
<body>
    <h2>Checkout</h2>
    <form method="POST" action="connect.php">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required placeholder="Enter your Name"><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required placeholder="Enter your Email"><br><br>

        <label for="gender">Gender:</label>
        <select id="gender" name="gender" required placeholder="Enter your Gender">
            <option value="">Select</option>
            <option value="m">Male</option>
            <option value="f">Female</option>
            <option value="o">Other</option>
        </select><br><br>

        <label for="mobile">Mobile:</label>
        <input type="tel" id="mobile" name="mobile" required placeholder="Enter Mobile Number"><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required placeholder="Password"><br><br>

        <div class="btn">
            <button type="submit">Submit Data</button>
        </div>
    </form>
</body>
</html>
