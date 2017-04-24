<?php
    class Item {
        private $itemName;
        private $description;
        private $categoryName;

        public function __construct($itemName, $description, $categoryID = null) {
            $this->itemName = $itemName;
            $this->categoryID = $categoryID;
            $this->description = $description;
        }

        // Saves an item to the database
        // Returns a success or failure message
        public function create() {
            try {
                // Check for empty strings in itemName or description
                if ($this->itemName === '' || $this->description === '' || $this->category === '') {
                    return array(
                        "status" => 400,
                        "data" => array(
                            "Success" => False,
                            "Error" => True,
                            "Message" => "Item fields cannot be empty."
                        )
                    );
                }

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
        } // Create method

        // Retrieves and returns all items from db or an error message
        public static function getAll() {
            try {
                // Connect to database
                $db = Db::connect();

                // Prepare
                $sql = "SELECT *
                        FROM items";
                $stmt = $db->prepare($sql);

                // Nothing to bind...
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
                        "Message" => "Items retrieved successfully!",
                        "Items" => $items
                    )
                );
            } catch(PDOException $e) {
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
        } // getAll method


        // Returns single item from databsae or an error message
        // Takes in an item id
        public static function getOne($id) {
            try {
                // Connect to database
                $db = Db::connect();

                // Prepare
                $sql = "SELECT *
                        FROM items
                        WHERE id = :id";
                $stmt = $db->prepare($sql);

                // Bind
                $stmt->bindParam(':id', $id, PDO::PARAM_INT);

                // Execute
                $stmt->execute();

                // Store item as object
                $item = $stmt->fetch(PDO::FETCH_OBJ);

                 // Return success data
                return array(
                    "status" => 200,
                    "data" => array(
                        "Success" => True,
                        "Error" => False,
                        "Message" => "Item with id: $id retrieved successfully!",
                        "Item" => $item
                    )
                );
            } catch(PDOException $e) {
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

        // Updates an item in the database
        // Takes in an item id and returns success or error messages
        public function Update($id) {
            try {
                // Check for empty strings in itemName or description
                if ($this->itemName === '' || $this->description === '') {
                    return array(
                        "status" => 400,
                        "data" => array(
                            "Success" => False,
                            "Error" => True,
                            "Message" => "Item fields cannot be empty."
                        )
                    );
                }

                // Connect to db
                $db = Db::connect();

                // Prepare
                $sql = "UPDATE items
                        SET itemName = :itemName,
                            description = :description
                        WHERE id = :id";
                $stmt = $db->prepare($sql);

                // Bind
                $stmt->bindParam("itemName", $this->itemName, PDO::PARAM_STR);
                $stmt->bindParam("description", $this->description, PDO::PARAM_STR);
                $stmt->bindParam("id", $id, PDO::PARAM_INT);

                // Execute
                $stmt->execute();

                // Return success data
                return array(
                    "status" => 200,
                    "data" => array(
                        "Success" => True,
                        "Error" => False,
                        "Message" => "Item '$this->itemName' updated"
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
        } // Update method

        public static function delete($id) {
            try {
                // Create database connection
                $db = Db::connect();

                // Prepare
                $sql = "DELETE FROM items
                        WHERE id = :id";
                $stmt = $db->prepare($sql);

                // Bind
                $stmt->bindParam(':id', $id, PDO::PARAM_INT);

                // Execute
                $stmt->execute();

                // Return success data
                return array(
                    "status" => 200,
                    "data" => array(
                        "Success" => True,
                        "Error" => False,
                        "Message" => "Item deleted"
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