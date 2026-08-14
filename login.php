<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Flood Monitoring Login</title>

<link rel="stylesheet" href="css/login.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>
<body>

<div class="container">

    <div class="login-card">

        <div class="logo">
            <img src="imgs/logo1.png" alt="">
        </div>

        <h1>Flood Monitoring System</h1>
        <p class="subtitle">Monitoring System For Drainage</p>

        <form method="POST" action="php/login_process.php">

            <div class="input-group">
                <i class="fa-solid fa-user"></i>
                <input type="text" name="username" placeholder="Username" required>
            </div>

            <div class="input-group">
                <i class="fa-solid fa-lock"></i>
                <input type="password" name="password" placeholder="Password" required>
            </div>

            <button type="submit" name="login" class="btn-login">
                Login
            </button>
            <?php if(isset($_GET['error'])) { ?>
                <p class="error-message">
                    <?php echo htmlspecialchars($_GET['error']); ?>
                </p>
            <?php } ?>

        </form>

        <p class="footer-text">
            Protected Monitoring Dashboard
        </p>

        <div class="Sign_up">
            <p>Don't have an account yet? <a href="pages/sign_in.php">Sign Up</a> </p>
        </div>
        

    </div>

</div>


</body> 
</html>