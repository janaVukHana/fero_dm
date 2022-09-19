<div class="form-login">
    <h2>Login</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <div class="form-group">
            <label for="username">Username</label><br>
            <input type="text" id="username" name="username" value='<?php echo htmlspecialchars($username); ?>'>
        </div>
        <div class="form-group">
            <label for="password">Password</label><br>
            <input type="password" id="password" name="password" value="<?php echo htmlspecialchars($password) ?>">
        </div>
        <button class="btn-login" type="submit" name="login">Login</button>
    </form>
</div>