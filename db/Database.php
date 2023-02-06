<?php

namespace app\db;

use PDO;
use PDOException;
use app\models\Product;

class Database
{
    private $db;
    private $dbHost = "localhost";
    private $dbUsername = "root"; // Change this to your Db Username;
    private $dbPassword = ""; // Change this to your password;
    private $dbName = "scandiweb"; // Cahnge this to your Db name;
    private $tblName = "productlist";
    
    protected function __construct()
    {
        if (!isset($this->db)) {
            // Connect to the database
            try {
                $conn = new PDO("mysql:host=" . $this->dbHost . ";dbname=" . $this->dbName, $this->dbUsername, $this->dbPassword);
                $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->db = $conn;
            } catch (PDOException $e) {
                die("Failed to connect with MySQL: " . $e->getMessage());
            }
        }
    }

    protected function fetchProductsArr()
    {
        $stmt = "SELECT * FROM " . $this->tblName;
        $result = $this->db->query($stmt);
        $productsArr = $result->fetchAll(PDO::FETCH_ASSOC);
        return $productsArr;
    }

    protected function insert(Product $product)
    {
        $options = $product->getOptions();
        $data = [
            'sku' => $product->getSku(),
            'name' => $product->getName(),
            'price' => $product->getPrice(),
            'productType' => $product->getType(),
        ];

        $data = array_merge($data, $options);

        $columnString = implode(', ', array_keys($data));
        $valueString = ":" . implode(', :', array_keys($data));
        $sql = "INSERT INTO " . $this->tblName . " (" . $columnString . ") VALUES (" . $valueString . ")";
        $query = $this->db->prepare($sql);
        foreach ($data as $key => $val) {
                $query->bindValue(':' . $key, $val);
        }
        $query->execute();
        return true;
    }

    protected function delete($id)
    {
        $sql = "DELETE FROM " . $this->tblName . " WHERE id = :id";
        $query = $this->db->prepare($sql);
        $query->bindValue(':id', $id);
        $query->execute();
        return true;
    }
}
