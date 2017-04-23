<?php
    class Item {
        private $itemName;
        private $description;
        private $categoryName;

        public function __construct($itemName, $description, $categoryID) {
            $this->itemName = $itemName;
            $this->categoryID = $categoryID;
            $this->description = $description;
        }

        public function create() {
            try {
                // Connect to db
                $db = Db::connect();

                // Prepare
                $sql = "INSERT INTO items (itemName, description, categoryID)
                        VALUES (:itemName, :description, :categoryID)";
                $stmt = $db->prepare($sql);

                // Bind
                $stmt->bindParam("itemName", $this->itemName, PDO::PARAM_STR);
                $stmt->bindParam("description", $this->description, PDO::PARAM_STR);
                $stmt->bindParam("categoryID", $this->categoryID, PDO::PARAM_STR);

                // Execute
                $stmt->execute();

                // Return success data
                return array(
                    "status" => 200,
                    "data" => array(
                        "Success" => True,
                        "Error" => False,
                        "Message" => "Item '$this->itemName' added"
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