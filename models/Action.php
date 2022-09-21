<?php

class Action extends DB {
    /**
     * This function create return boolean if action item is created in database
     * @param string $file_path
     * @param string $title
     * @param string $description
     * @return bool
     */
    public static function create_action(string $file_path, string $title, string $description):bool {
        $sql = "INSERT INTO `Actions` (file_path, title, description) VALUES (:file_path, :title, :description);";

        $pdo = new DB();
        $stmt = $pdo->connect()->prepare($sql);
        $stmt->bindValue(':file_path', $file_path);
        $stmt->bindValue(':title', $title);
        $stmt->bindValue(':description', $description);

        $result = $stmt->execute();

        if($result) {
            return true;
        } else {
            return false;
        }
    }

    public static function get_all_action_items():array {
        $sql = "SELECT * FROM `Actions`";
        $pdo = new DB();
        $st = $pdo->connect()->query($sql);

        $rows= $st->fetchAll();
        return $rows;
    }
}