<body>
    <div class="container-login">
        <div class="image-container-login">
            <img src="./layout/public/img/login_1100x1100.webp" alt="Coffee Beans Roasting">
        </div>
        <div class="login-container">
            <h1>Register</h1>
            <?php if (isset($_SESSION['error'])): ?>
                <div class="error-message"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></div>
            <?php endif; ?>
            <form action="index.php?trang=register" method="post">
                <input name="username" type="text" placeholder="Name" required>
                <input name="email" type="email" placeholder="Email" required>
                <input name="password" type="password" placeholder="Password" required>
                <input name="confirm_password" type="password" placeholder="Confirm Password" required>
                <button name="register" type="submit">Sign Up</button>
            </form>
            <div class="links">
                <p>Already have an account? <a href="index.php?trang=login">Sign in</a></p>
            </div>
        </div>
    </div>
</body>
