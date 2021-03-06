<?php
    class Category {
        private $categoryName;

        public function __construct($categoryName) {
            $this->categoryName = $categoryName;
        }

        // Gets and returns all categories in the db
        public static function getAll() {
            try {
                // Connect to database
                $db = Db::connect();

                // Prepare
                $sql = "SELECT *
                        FROM categories";
                $stmt = $db->prepare($sql);

                // Nothing to bind...
                // Execute
                $stmt->execute();

                // Store categories as objects
                $categories = $stmt->fetchAll(PDO::FETCH_OBJ);

                 // Return success data
                return array(
                    "status" => 200,
                    "data" => array(
                        "Success" => True,
                        "Error" => False,
                        "Message" => "Categories retrieved successfully!",
                        "Categories" => $categories
                    )
                );
            } catch (PDOException $e) {
                // Return error data
                return array(
                    "status" => 400,
                    "data" => array(
                        "Success" => False,
                        "Error" => True,
                        "Message" => $e->getMessage()
                    )
                );
            }
        } // getAll

        // Gets and returns all items belonging to a category
        public function getItems() {
            try {
                // Connect to db
                $db = Db::connect();

                // Prepare
                $sql = "SELECT *
                        FROM items
                        WHERE categoryName = :categoryName
                        ORDER BY timeAdded DESC";
                $stmt = $db->prepare($sql);

                // Bind
                $stmt->bindParam(':categoryName', $this->categoryName, PDO::PARAM_INT);

                // Execute
                $stmt->execute();

                // Store items as objects
                $items = $stmt->fetchAll(PDO::FETCH_OBJ);

                 // Return success data
                return array(
                    "status" => 200,
                    "data" => array(
                        "Success" => True,
                        "Error" => False,
                        "Message" => "Items from category with id $this->categoryName retrieved successfully!",
                        "Items" => $items
                    )
                );
            } catch (PDOException $e) {
                // Return error data
                return array(
                    "status" => 400,
                    "data" => array(
                        "Success" => False,
                        "Error" => True,
                        "Message" => $e->getMessage()
                    )
                );
            }
        } // getItems
    }
?>