<?php
class Product{

    private $conn;
    private $table_name = "products";

    public $id;
    public $name;
    public $description;
    public $price;
    public $factory_id;
    public $factory_name;
    public $created;

    public function __construct($db){
        $this->conn = $db;
    }

    function read(){

    $query = "SELECT
                f.name as factory_name, p.id, p.name, p.description, p.price, p.factory_id, p.created
            FROM
                " . $this->table_name . " p
                LEFT JOIN
                    factory f
                        ON p.factory_id = f.id
            ORDER BY
                p.created DESC";

    $stmt = $this->conn->prepare($query);

    $stmt->execute();

    return $stmt;
 }
 function create(){

     $query = "INSERT INTO
                 " . $this->table_name . "
             SET
                 name=:name, price=:price, description=:description, factory_id = :factory_id, created=:created";

     $stmt = $this->conn->prepare($query);

     $this->name = htmlspecialchars(strip_tags($this->name));
     $this->price = htmlspecialchars(strip_tags($this->price));
     $this->description = htmlspecialchars(strip_tags($this->description));
     $this->factory_id = htmlspecialchars(strip_tags($this->factory_id));
     $this->created = htmlspecialchars(strip_tags($this->created));

     $stmt->bindParam(":name", $this->name);
     $stmt->bindParam(":price", $this->price);
     $stmt->bindParam(":description", $this->description);
     $stmt->bindParam(":factory_id", $this->factory_id);
     $stmt->bindParam(":created", $this->created);

     if($stmt->execute()){
         return true;
     }
     return false;
 }
 function readOne(){

    // query to read single record
    $query = "SELECT
                f.name as factory_name, p.id, p.name, p.description, p.price, p.factory_id, p.created
            FROM
                " . $this->table_name . " p
                LEFT JOIN
                    factory f
                        ON p.factory_id = f.id
            WHERE
               p.id = ?
            LIMIT
                0,1";

    // prepare query statement
    $stmt = $this->conn->prepare( $query );

    // bind id of product to be updated
    $stmt->bindParam(1, $this->id);

    // execute query
    $stmt->execute();

    // get retrieved row
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    // set values to object properties
    $this->name = $row['name'];
    $this->price = $row['price'];
    $this->description = $row['description'];
    $this->factory_id = $row['factory_id'];
    $this->factory_name = $row['factory_name'];
 }
 function update() {

   $query = "UPDATE
                " . $this->table_name . "
            SET
                name = :name,
                price = :price,
                description = :description,
                factory_id = :factory_id
            WHERE
                id = :id";

  $stmt = $this->conn->prepare($query);

  $this->name = htmlspecialchars(strip_tags($this->name));
  $this->price = htmlspecialchars(strip_tags($this->price));
  $this->description = htmlspecialchars(strip_tags($this->description));
  $this->factory_id = htmlspecialchars(strip_tags($this->factory_id));
  $this->id = htmlspecialchars(strip_tags($this->id));

  $stmt->bindParam(':name', $this->name);
  $stmt->bindParam(':price', $this->price);
  $stmt->bindParam(':description', $this->description);
  $stmt->bindParam(':factory_id', $this->factory_id);
  $stmt->bindParam(':id', $this->id);

  if($stmt->execute()) {
    return true;
  }
  return false;
 }
 function delete() {

   // delete query
    $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";

    $stmt = $this->conn->prepare($query);

    $this->id = htmlspecialchars(strip_tags($this->id));

    $stmt->bindParam(1, $this->id);

    if($stmt->execute()){
        return true;
    }

    return false;
 }
 function search($keywords) {

   $query = "SELECT
               f.name as factory_name, p.id, p.name, p.description, p.price, p.factory_id, p.created
           FROM
               " . $this->table_name . " p
               LEFT JOIN
                   factory f
                       ON p.factory_id = f.id
           WHERE
              p.name LIKE ? OR p.description LIKE ? OR f.name LIKE ?
           ORDER BY
               p.created DESC";

    // prepare query statement
    $stmt = $this->conn->prepare($query);

    // sanitize
    $keywords=htmlspecialchars(strip_tags($keywords));
    $keywords = "%{$keywords}%";

    // bind
    $stmt->bindParam(1, $keywords);
    $stmt->bindParam(2, $keywords);
    $stmt->bindParam(3, $keywords);

    // execute query
    $stmt->execute();

    return $stmt;
 }
 public function readPaging($from_record_num, $records_per_page) {

   $query = "SELECT
                f.name as factory_name, p.id, p.name, p.description, p.price, p.factory_id, p.created
            FROM
                " . $this->table_name . " p
                LEFT JOIN
                    factory f
                        ON p.factory_id = f.id
            ORDER BY p.created DESC
            LIMIT ?, ?";

   $stmt = $this->conn->prepare( $query );

   $stmt->bindParam(1, $from_record_num, PDO::PARAM_INT);
   $stmt->bindParam(2, $records_per_page, PDO::PARAM_INT);

   $stmt->execute();

   return $stmt;
 }
 public function count(){
    $query = "SELECT COUNT(*) as total_rows FROM " . $this->table_name . "";

    $stmt = $this->conn->prepare( $query );
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    return $row['total_rows'];
  }
}

 ?>
