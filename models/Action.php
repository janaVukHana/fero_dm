<?php

class Action extends DB {
    /**
     * This funtion return number of total items in database
     * @return int
     */
    public static function get_num_of_items():int {
        $sql = "SELECT * FROM `Actions`";
        
        $pdo = new DB();
        $stmt = $pdo->connect()->query($sql);

        $rows= $stmt->fetchAll();
        return count($rows);
    }

     /**
     * This funtion return number of total items in database
     * @param string $category
     * @return int
     */
    public static function get_num_of_filtered_items(string $category):int {
        $sql = "SELECT * FROM `Actions` WHERE category = '$category'";
        
        $pdo = new DB();
        $stmt = $pdo->connect()->query($sql);

        $rows= $stmt->fetchAll();
        return count($rows);
    }

    /**
     * This function create return boolean if action item is created in database
     * @param string $file_path
     * @param string $title
     * @param string $description
     * @param string $category
     * @return bool
     */
    public static function create_action(string $file_path, string $title, string $description, string $category):bool {
        $sql = "INSERT INTO `Actions` (file_path, title, description, category) VALUES (:file_path, :title, :description, :category);";

        $pdo = new DB();
        $stmt = $pdo->connect()->prepare($sql);
        $stmt->bindValue(':file_path', $file_path);
        $stmt->bindValue(':title', $title);
        $stmt->bindValue(':description', $description);
        $stmt->bindValue(':category', $category);

        $result = $stmt->execute();

        if($result) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * This function return all action items from DB
     * @param string $items_per_page
     * @param string $items_start_from
     * @param string $order
     * @return array $rows
     */
    public static function get_all_action_items(string $items_start_from, string $items_per_page, string $order):array {

        $sql = "SELECT * FROM `Actions` ORDER BY id $order LIMIT $items_start_from, $items_per_page";
        $pdo = new DB();
        
        $stmt = $pdo->connect()->query($sql);

        $rows= $stmt->fetchAll();
        return $rows;
    }

    /**
     * This function return all filtered items from DB by category
     * @param string $items_per_page
     * @param string $items_start_from
     * @param string $order
     * @param string $category
     * @return array $rows
     */
    public static function get_filtered_action_items(string $items_start_from, string $items_per_page, string $order, string $category):array {

        $sql = "SELECT * FROM `Actions` WHERE category = '$category' ORDER BY id $order LIMIT $items_start_from, $items_per_page";
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
     * @param string $id
     * @param string $title
     * @param string $description
     * @param string $category
     * @return bool
     */
    public static function update_action(string $id, string $title, string $description, string $category):bool {
        $sql = "UPDATE `Actions` SET `title`= :title,`description`= :description, `category`= :category WHERE id = :id";
        $pdo = new DB();
        $stmt = $pdo->connect()->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->bindValue(':title', $title);
        $stmt->bindValue(':description', $description);
        $stmt->bindValue(':category', $category);

        $result = $stmt->execute();

        if($result) {
            return true;
        } 
        return false;
    }

    /**
     * This function get item by id
     * @param string $id
     * @return array $result
     */
    public static function get_one_by_id(string $id):array {
        $sql = "SELECT `id`, `file_path`, `title`, `description`, `category` FROM `Actions` WHERE id = :id";
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

        return $result;
    }
}