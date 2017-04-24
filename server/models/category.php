<?php
    class Category {
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
        }
    }
?>