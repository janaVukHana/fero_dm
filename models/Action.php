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

    /**
     * This function return all action items from DB
     * @return array $rows
     */
    public static function get_all_action_items():array {
        // $sql = "SELECT * FROM `Actions`";
        $sql = "SELECT * FROM `Actions` ORDER BY id DESC";
        
        $pdo = new DB();
        $stmt = $pdo->connect()->query($sql);

        $rows= $stmt->fetchAll();
        return $rows;
    }

    /**
     * This function delete action item and return boolean value
     * @param string $id
     * @return bool
     */
    public static function delete_one_by_id(string $id):bool {
        $sql = "DELETE FROM `Actions` WHERE id = :id";
        $pdo = new DB();
        $stmt = $pdo->connect()->prepare($sql);
        $stmt->bindValue(':id', $id);
        $result = $stmt->execute();

        if($result) {
            return true;
        } 
        return false;
        
    }

     /**
     * This function update action item
     */

    /**
     * This function get item by id
     * @param string $id
     * @return array $result
     */
    public static function get_one_by_id(string $id):array {
        $sql = "SELECT `id`, `file_path`, `title`, `description` FROM `Actions` WHERE id = :id";
        $pdo = new DB();
        $stmt = $pdo->connect()->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        
        $result= $stmt->fetch();
        return $result;
    }

    /**
     * This function return image path so you can delete it from img folder when you are deleting item from database
     * @param string id
     * @return array
     */
    public static function get_image_path(string $id):array {
        $sql = "SELECT `file_path` FROM `Actions` WHERE id = :id";
        $pdo = new DB();
        $stmt = $pdo->connect()->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        
        $result= $stmt->fetch();
        var_dump($result);
        return $result;
    }
}