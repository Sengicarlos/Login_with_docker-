<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login System</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <form action="login.php" method="post">
        <h1>Login</h1>

        <?php if (!empty($_GET['error'])): ?>
            <p class="error"><?php echo htmlspecialchars($_GET['error']); ?></p>
        <?php endif; ?>

        <label for="uname">Username</label>
        <input type="text" id="uname" name="uname" placeholder="Enter username" required><br>

        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Enter password" required><br>

        <button type="submit">Login</button>
    </form>
    
</body>
</html>
