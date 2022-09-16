<div class="form-login">
    <h2>Registration</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <div class="form-group">
            <label for="username">Username</label><br>
            <input type="text" id="username" name="username">
            <small class="err-msg"><?php echo $systemErrors['username_err']; ?></small>
        </div>
        <div class="form-group">
            <label for="email">Email</label><br>
            <input type="email" id="email" name="email">
        </div>
        <div class="form-group">
            <label for="password">Password</label><br>
            <input type="password" id="password" name="password">
        </div>
        <button class="btn-login" type="submit" name="registration">Registration</button>
    </form>
</div>