<?php
class Factory {

  private $conn;
  private $table_name = "factory";

  public $id;
  public $name;
  public $created;

  public function __construct($db) {
    $this->conn = $db;
  }
  public function readAll() {

    $query = "SELECT
                    id, name
                FROM
                    " . $this->table_name . "
                ORDER BY
                    name";

    $stmt = $this->conn->prepare($query);
    $stmt->execute();

    return $stmt;
  }
  public function read() {

    $query = "SELECT
                id, name
            FROM
                " . $this->table_name . "
            ORDER BY
                name";

    $stmt = $this->conn->prepare( $query );
    $stmt->execute();

    return $stmt;
  }
  function create(){

      $query = "INSERT INTO
                  " . $this->table_name . "
              SET
                  name=:name";

      $stmt = $this->conn->prepare($query);

      $this->name = htmlspecialchars(strip_tags($this->name));

      $stmt->bindParam(":name", $this->name);

      if($stmt->execute()){
          return true;
      }
      return false;
  }
  function readOne(){

     // query to read single record
     $query = "SELECT
                  id,
                  name
               FROM
               " . $this->table_name . "
               WHERE id = ?
               LIMIT 0,1";

     // prepare query statement
     $stmt = $this->conn->prepare( $query );

     // bind id of product to be updated
     $stmt->bindParam(1, $this->id);

     // execute query
     $stmt->execute();

     // get retrieved row
     $row = $stmt->fetch(PDO::FETCH_ASSOC);

     // set values to object properties
     $this->id = $row['id'];
     $this->name = $row['name'];
     $this->description = $row['description'];
     $this->created = $row['created'];
  }
  function update() {

    $query = "UPDATE
                 " . $this->table_name . "
             SET
                 name = :name
             WHERE
                 id = :id";

   $stmt = $this->conn->prepare($query);

   $this->name = htmlspecialchars(strip_tags($this->name));
   $this->id = htmlspecialchars(strip_tags($this->id));

   $stmt->bindParam(':name', $this->name);
   $stmt->bindParam(':id', $this->id);

   if($stmt->execute()) {
     return true;
   }
   return false;
  }
  function delete() {

     $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";

     $stmt = $this->conn->prepare($query);

     $this->id = htmlspecialchars(strip_tags($this->id));

     $stmt->bindParam(1, $this->id);

     if($stmt->execute()){
         return true;
     }
     return false;
  }
}

 ?>
