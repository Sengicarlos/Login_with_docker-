<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Create Account</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <form action="register_submit.php" method="post">
        <h1>Register</h1>

        <?php if (!empty($_GET['error'])): ?>
            <p class="error"><?php echo htmlspecialchars($_GET['error']); ?></p>
        <?php endif; ?>

        <?php if (!empty($_GET['success'])): ?>
            <p class="success"><?php echo htmlspecialchars($_GET['success']); ?></p>
        <?php endif; ?>

        <label for="uname">Username</label>
        <input type="text" id="uname" name="uname" placeholder="Enter username" required><br>

        <label for="name">Full Name</label>
        <input type="text" id="name" name="name" placeholder="Enter your name" required><br>

        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Enter password" required><br>

        <label for="re_password">Confirm Password</label>
        <input type="password" id="re_password" name="re_password" placeholder="Re-enter password" required><br>

        <button type="submit">Register</button>

        <p>Already have an account? <a href="login.php">Login</a></p>
    </form>
    
</body>
</html>
