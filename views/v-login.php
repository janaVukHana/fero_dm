<div class="form-login">
    <h2>Login</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <div class="form-group">
            <label for="username">Username</label><br>
            <input type="text" id="username" name="username">
        </div>
        <div class="form-group">
            <label for="password">Password</label><br>
            <input type="password" id="password" name="password">
        </div>
        <button class="btn-login" type="submit" name="login">Login</button>
    </form>
</div>