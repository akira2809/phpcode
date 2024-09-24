
<body>
    <div class="container-login">
        <div class="image-container-login">
            <img src="./layout/public/img/login_1100x1100.webp" alt="Coffee Beans Roasting">
        </div>
        <div class="login-container">
            <h1>Sign in</h1>
            <?php if (isset($_SESSION['error'])): ?>
                <div class="error-message"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></div>
            <?php endif; ?>
            <form action="index.php?trang=login" method="post">
                <input name="email" type="email" placeholder="Email" required>
                <input name="password" type="password" placeholder="Password" required>
                <button name="login" type="submit">Sign In</button>
            </form>
            <div class="links">
                <a href="#">Manage subscriptions</a>
                <a href="#">Forgot your password?</a>
                <p>Don't have an account? <a href="index.php?trang=register">Sign up</a></p>
            </div>
        </div>
    </div>
</body>
