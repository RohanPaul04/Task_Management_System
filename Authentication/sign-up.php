<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Task Management System</title>
    <link rel="stylesheet" href="sign-up.css">
</head>

<body>

    <div class="auth-container">
        <!-- Card Container -->
        <div class="auth-card">
            <h2>Create an Account</h2>

            <form action="sign-up-db.php" method="POST" onsubmit="return checkPassword()">

                <div class="form-group">
                    <label for="full_name">Full Name</label>
                    <input type="text" id="full_name" name="full_name" placeholder="Enter your full name" required>
                </div>

                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" placeholder="your.email@example.com" required>
                </div>


                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Create a strong password"
                        required>
                </div>

                <span id="error1"></span>

                <div class="form-group">
                    <label for="confirm_password">Confirm Password</label>
                    <input type="password" id="confirm_password" name="confirm" placeholder="Re-enter your password"
                        required>
                </div>

                <span id="error2"></span>

                <div class="form-group">
                    <label for="role">Select Role</label>
                    <select id="role" name="role" required>
                        <option value="" disabled selected>-- Choose your role --</option>
                        <option value="admin">Admin</option>
                        <option value="member">Team Member</option>
                    </select>
                </div>

                <button type="submit">Create Account</button>

            </form>

            <p>Already have an account? <a href="sign-in.php">Sign In</a></p>
        </div>
    </div>
    

</body>
<script>



function checkPassword() {
    var pass = document.getElementById("password").value;
    var confirmPass = document.getElementById("confirm_password").value;
    var error2 = document.getElementById("error2");
    var error1 = document.getElementById("error1");
    var hasLetter = /[a-zA-Z]/.test(pass);
    var hasNumber = /[0-9]/.test(pass);

    if (!hasLetter || !hasNumber) {
        error1.innerHTML = "*password must contain both letters and numbers";
        return false;
    }
    

    if (pass !== confirmPass) {
        error2.innerHTML = "*passwords do not match";
        return false;
    }
    error1.innerHTML = "";
    error2.innerHTML = "";
    return true;
}

// Optional: Add loading state to button on submit
document.querySelector('form').addEventListener('submit', function(e) {
    if (checkPassword()) {
        document.querySelector('button[type="submit"]').classList.add('loading');
    }
});
</script>

</html>