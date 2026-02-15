<?php
session_start();
$error = '';
if (isset($_SESSION['error'])) {
    $error = $_SESSION['error'];
    unset($_SESSION['error']);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In - Task Management System</title>
    <link rel="stylesheet" href="sign-up.css">
    <style>
        .error-message {
            color: #dc3545;
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
            padding: 10px 15px;
            border-radius: 4px;
            margin-bottom: 15px;
            font-size: 14px;
            text-align: center;
            display: none;
        }
        
        .error-message.show {
            display: block;
        }
    </style>
</head>

<body>

    <div class="auth-container">
        <!-- Card Container -->
        <div class="auth-card">
            <h2>Welcome Back</h2>

            <form action="sign-in-db.php" method="POST">

                <div class="form-group">
                    <label for="login_email">Email Address</label>
                    <input type="email" id="login_email" name="email" placeholder="your.email@example.com" required>
                </div>

                <div class="form-group">
                    <label for="login_password">Password</label>
                    <input type="password" id="login_password" name="password" placeholder="Enter your password" required>
                </div>

                <div class="error-message <?php echo !empty($error) ? 'show' : ''; ?>" id="error">
                    <?php echo htmlspecialchars($error); ?>
                </div>

                <button type="submit">Sign In</button>

            </form>

            <p>Don't have an account? <a href="sign-up.php">Sign Up</a></p>
        </div>
    </div>

</body>

<script>
// Optional: Add loading state to button on submit
document.querySelector('form').addEventListener('submit', function(e) {
    document.querySelector('button[type="submit"]').classList.add('loading');
});
</script>

</html>