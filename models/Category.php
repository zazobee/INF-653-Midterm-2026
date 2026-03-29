<?php
    class Category {
        private $conn;
        private $table = 'categories';

        public $id;
        public $category;

        public function__construct($db) {
            $this->conn = $db;

        }

        public function read() {
            $query = 'SELECT id, category 
                      FROM ' . $this->table . ' 
                      ORDER BY id DESC';
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return stmt;
        }

        public function read_single() {
            $query = 'SELECT id, category 
                      FROM ' . $this->table . 
                      'WHERE id = ?';
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $this->id);
            $stmt->execute();
            return $stmt;
        }

        public function create() {
            $query = 'INSERT INTO ' . $this->table . '(category) 
                      VALUES (:category)';
            $stmt = $this->conn->prepare($query);
            $this->category= htmlspecialchars(strip_tags($this->category ));
            $stmt->bindParam(':category', $this->category);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);

        }

        public function update() {
            $query = 'UPDATE ' . $this->table . 
                      'SET category
                    = :category
                    
                       WHERE id = :id';
            $stmt = $this->conn->prepare($query);
            $this->category= htmlspecialchars(strip_tags($this->category ));
            $this->id = htmlspecialchars(strip_tags($this->id));
            $stmt->bindParam(':category', $this->category);
            $stmt->bindParam('id', $this->id);
            
            if($stmt->execute()) {
                return true;
            }
            return false;
        }

        public function delete() {
            $query = 'DELETE FROM ' . $this->table . 
                      'WHERE id = :id';
            $stmt = $this->conn->prepare($query);
            $this->id = htmlspecialchars(strip_tags($this->id));
            $stmt->bindParam(':id', $this->id);

            if($stmt->execute()) {
                return true;
            }
            return false;
        }

    }