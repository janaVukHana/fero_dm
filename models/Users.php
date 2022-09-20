<?php 

// NOTE - REMINDER: da li koristiti static kod registracije i logina???

class Users extends DB {
    /**
     * This function check if user did make successufuly registration
     * @param string $username
     * @param string $email
     * @param string $password
     * @return boolean
     */
    public function registration(string $username, string $email, string $password):bool {
        // check if that user allready exists
        $sql = "SELECT count(username) AS num FROM `Users` WHERE username=?;";
        $pdo = new DB();
        $stmt = $pdo->connect()->prepare($sql);
        $stmt->execute([$username]);
        // var_dump($stmt);
        $row = $stmt->fetch();

        if($row['num'] > 0) {
            return false;
        }

        $passwordHash = password_hash($password, PASSWORD_BCRYPT, array("cost=>12"));
        $sql = "INSERT INTO `Users` (username, email, password) VALUES (:username, :email, :password);";
        $stmt = $pdo->connect()->prepare($sql);
        $stmt->bindValue(':password', $passwordHash);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':username', $username);

        $result = $stmt->execute();

        if($result) {
            return true;
        }
    }

    /**
     * This function return boolean value if user is admin and username and password match
     * @param string $username
     * @param string $password
     * @return boolean
     */
    public function admin_login(string $username, string $password): bool {
        $sql = "SELECT * FROM `Users`";
        $stmt = $this->connect()->query($sql);

        while($row = $stmt->fetch()) {
            if($row['username'] == 'ilija' && password_verify($password, $row['password'])) {
                return true;
            } 
        }

        return false;
    }

    /**
     * This function return if user username and password match
     * @param string $username
     * @param string $password
     * @return boolean
     */
    public function user_login(string $username, string $password): bool {
        $sql = "SELECT * FROM `Users`";
        $stmt = $this->connect()->query($sql);

        while($row = $stmt->fetch()) {
            if($row['username'] == $username && password_verify($password, $row['password'])) {
                return true;
            } 
        }

        return false;
    }
}