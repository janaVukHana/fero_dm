<div class="form-login">
    <h2>Registracija</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <div class="form-group">
            <label for="username">Korisnicko ime</label><br>
            <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($username) ?>">
            <small class="err-msg"><?php echo htmlspecialchars($systemErrors['username_err']); ?></small>
        </div>
        <div class="form-group">
            <label for="email">Email</label><br>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email) ?>">
            <small class="err-msg"><?php echo htmlspecialchars($systemErrors['email_err']); ?></small>
        </div>
        <div class="form-group">
            <label for="password">Sifra</label><br>
            <input type="password" id="password" name="password" value="<?php echo htmlspecialchars($password) ?>">
            <small class="err-msg"><?php echo htmlspecialchars($systemErrors['password_err']); ?></small>
        </div>
        <button class="btn" type="submit">Registracija</button>
    </form>
</div>