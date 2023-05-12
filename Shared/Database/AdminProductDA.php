<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of AdminProductDA
 *
 * @author KahSeng
 */
include_once '../class/ProductAdmin.php';

class AdminProductDA {
    private $conn;

    public function __construct(PDO $pdo) {
        $this->conn = $pdo;
    }

    public function add(ProductAdmin $product) {
        $pstmt = $this->conn->prepare("INSERT INTO product(name,uploadDate,quantity,status,unitPrice,updatedID,updatedDate,createID,createdDate,image,description, productTypeID) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)"); //prepare an Insert Into statement
        //prepare statements are important feature of PDO which can help to prevent SQL injection attacks by separating SQL code from user input
        $pstmt ->bindParam(1, $product->getName());
        $pstmt ->bindParam(2, $product->getUploadDate());
        $pstmt ->bindParam(3, $product->getQuantity());
        $pstmt ->bindParam(4, $product->getStatus());
        $pstmt ->bindParam(5, $product->getUnitPrice());
        $pstmt ->bindParam(6, $product->getUpdatedID());
        $pstmt ->bindParam(7, $product->getUpdatedDate());
        $pstmt ->bindParam(8, $product->getCreateID());
        $pstmt ->bindParam(9, $product->getCreatedDate());
        $pstmt ->bindParam(10, $product->getImage());
        $pstmt ->bindParam(11, $product->getDescription());
        $pstmt ->bindParam(12, $product->getProductTypeID());
        $result = $pstmt ->execute();
        
        if($result) { // check if the insert was successful
            header("Location: AdminProduct.php");
            exit();
        } else {
            header("Location: AdminErrorPage.php");
            exit();
        }
        
    }
    
    public function addProductType($productTypeName) {
        $pstmt = $this->conn->prepare("INSERT INTO producttype(productTypeName) VALUES (?)"); //prepare an Insert Into statement
        //prepare statements are important feature of PDO which can help to prevent SQL injection attacks by separating SQL code from user input
        $pstmt ->bindParam(1, $productTypeName);       
        $result = $pstmt ->execute();
        
        if($result) { // check if the insert was successful
            header("Location: AdminProduct.php");
            exit();
        } else {
            header("Location: AdminErrorPage.php");
            exit();
        }
    }

    public function retrieve($productID) {
        $query = "SELECT * FROM product WHERE productID = ?";
        $pstmt = $this->conn->prepare($query);
        $pstmt->execute([$productID]);
        $product = $pstmt->fetch(PDO::FETCH_ASSOC);
        
        if ($product === false) {
            // handle the case where the query execution is unsuccessful
            // redirect to the error page
            header("Location: AdminErrorPage.php");
            exit();
        }
        
        return $product;
    }
    
    public function checkNameExist() {
        $query = "SELECT name FROM product";
        $pstmt = $this->conn->prepare($query);
        $pstmt->execute();
        $product = $pstmt->fetchAll(PDO::FETCH_ASSOC);
        
        if ($product === false) {
            // handle the case where the query execution is unsuccessful
            // redirect to the error page
            header("Location: AdminErrorPage.php");
            exit();
        }
        
        return $product;
    }
    
    public function retrieveAll() {
        $query = "SELECT * FROM product";
        $pstmt = $this->conn->prepare($query);
        $pstmt->execute();
        $product = $pstmt->fetchAll(PDO::FETCH_ASSOC);
        
        if ($product === false) {
            // handle the case where the query execution is unsuccessful
            // redirect to the error page
            header("Location: AdminErrorPage.php");
            exit();
        }
        
        return $product;
    }
    
    public function updateAdminProductXML($productID) {
        $query = "SELECT * FROM product WHERE productID = ?";
        $pstmt = $this->conn->prepare($query);
        $pstmt->execute([$productID]);
        $product = $pstmt->fetch(PDO::FETCH_ASSOC);
        
        $newId = $product["productID"];
        $newName = $product["name"];
        $newQty = $product["quantity"];
        $newStatus = $product["status"];
        $newUnitPrice = $product["unitPrice"];
        $newImage = $product["image"];
        $newDescription = $product["description"];
        $newProductTypeID = $product["productTypeID"];
        $newUploadDate = $product["uploadDate"];
        $newUpdatedID = $product["updatedID"];
        $newUpdatedDate = $product["updatedDate"];
        $newCreateID = $product["createID"];
        $newCreatedDate = $product["createdDate"];

        // Load the XML file and locate the element to update
        $xmlDoc = new DOMDocument();
        $xmlDoc->load('xml/AdminProduct.xml');
        $productElement = $xmlDoc->getElementsByTagName('Product')->item(0);

        // Update the value of each child element
        $productElement->getElementsByTagName('id')->item(0)->nodeValue = $newId;
        $productElement->getElementsByTagName('name')->item(0)->nodeValue = $newName;
        $productElement->getElementsByTagName('quantity')->item(0)->nodeValue = $newQty;
        $productElement->getElementsByTagName('status')->item(0)->nodeValue = $newStatus;
        $productElement->getElementsByTagName('unitPrice')->item(0)->nodeValue = $newUnitPrice;
        $productElement->getElementsByTagName('image')->item(0)->nodeValue = $newImage;
        $productElement->getElementsByTagName('description')->item(0)->nodeValue = $newDescription;
        $productElement->getElementsByTagName('uploadDate')->item(0)->nodeValue = $newUploadDate;
        $productElement->getElementsByTagName('updatedID')->item(0)->nodeValue = $newUpdatedID;
        $productElement->getElementsByTagName('updatedDate')->item(0)->nodeValue = $newUpdatedDate;
        $productElement->getElementsByTagName('createID')->item(0)->nodeValue = $newCreateID;
        $productElement->getElementsByTagName('createdDate')->item(0)->nodeValue = $newCreatedDate;
        $productElement->getElementsByTagName('productTypeID')->item(0)->nodeValue = $newProductTypeID;

        // Save the updated XML document to disk
        $xmlDoc->save('xml/AdminProduct.xml');
        return $product;
    }
    
    public function updateAdminOrderXML($orderID, $cartID, $customerName, $paymentID, $paymentMethod, $totalPayment) {
        $query = "SELECT * FROM cart WHERE cartID = ?";
        $pstmt = $this->conn->prepare($query);
        $pstmt->execute([$cartID]);
        $order = $pstmt->fetch(PDO::FETCH_ASSOC);
        
        $newCustomerID = $order["customerID"];
        $newQty = $order["quantity"];
        $newProductID = $order["productID"]; 
        
        $query1 = "SELECT * FROM product WHERE productID = ?";
        $pstmt1 = $this->conn->prepare($query1);
        $pstmt1->bindParam(1, $newProductID);
        $pstmt1->execute();
        $productName = $pstmt1->fetch(PDO::FETCH_ASSOC);           

        // Load the XML file and locate the element to update
        $xmlDoc = new DOMDocument();
        $xmlDoc->load('xml/AdminOrder.xml');
        $orderElement = $xmlDoc->getElementsByTagName('Order')->item(0);

        // Update the value of each child element
        $orderElement->getElementsByTagName('paymentID')->item(0)->nodeValue = $paymentID;
        $orderElement->getElementsByTagName('customerID')->item(0)->nodeValue = $newCustomerID;
        $orderElement->getElementsByTagName('paymentMethod')->item(0)->nodeValue = $paymentMethod;
        $orderElement->getElementsByTagName('totalPayment')->item(0)->nodeValue = $totalPayment;
        $orderElement->getElementsByTagName('orderID')->item(0)->nodeValue = $orderID;
        $orderElement->getElementsByTagName('customerName')->item(0)->nodeValue = $customerName;
        $orderElement->getElementsByTagName('productID')->item(0)->nodeValue = $newProductID;
        $orderElement->getElementsByTagName('productName')->item(0)->nodeValue = $productName["name"];
        $orderElement->getElementsByTagName('productQty')->item(0)->nodeValue = $newQty;

        // Save the updated XML document to disk
        $xmlDoc->save('xml/AdminOrder.xml');
        return $order;
    }
    
    public function retrieveProductTypeName($productTypeID) {
        $query = "SELECT * FROM producttype WHERE productTypeID = ?";
        $pstmt = $this->conn->prepare($query);
        $pstmt->execute([$productTypeID]);
        $result = $pstmt->fetch(PDO::FETCH_ASSOC);
        
        if ($result === false) {
            // handle the case where the query execution is unsuccessful
            // redirect to the error page
            header("Location: AdminErrorPage.php");
            exit();
        }
        
        return $result;
    }
    
    public function retrieveProductTypeID($productTypeName) {
        $query = "SELECT * FROM producttype WHERE productTypeName = ?";
        $pstmt = $this->conn->prepare($query);
        $pstmt->execute([$productTypeName]);
        $result = $pstmt->fetch(PDO::FETCH_ASSOC);
        
        if ($result === false) {
            // handle the case where the query execution is unsuccessful
            // redirect to the error page
            header("Location: AdminErrorPage.php");
            exit();
        }
        
        return $result;
    }
    
    public function retrieveProductTypes() {
        $query = "SELECT * FROM producttype";
        $pstmt = $this->conn->prepare($query);
        $pstmt->execute();
        $result = $pstmt->fetchAll(PDO::FETCH_ASSOC);
        
        if ($result === false) {
            // handle the case where the query execution is unsuccessful
            // redirect to the error page
            header("Location: AdminErrorPage.php");
            exit();
        }
        
        return $result;
    }

    public function edit(ProductAdmin $product) {
        $query = "UPDATE product SET name = ?, uploadDate = ?, quantity = ?, status = ?, unitPrice = ?, updatedID = ?, updatedDate = ?, createID = ?, createdDate = ?, image = ?, description = ?, productTypeID = ? WHERE productID = ?";
        $pstmt = $this->conn->prepare($query);
        $pstmt->bindParam(1, $product->getName());
        $pstmt->bindParam(2, $product->getUploadDate());
        $pstmt->bindParam(3, $product->getQuantity());
        $pstmt->bindParam(4, $product->getStatus());
        $pstmt->bindParam(5, $product->getUnitPrice());
        $pstmt->bindParam(6, $product->getUpdatedID());
        $pstmt->bindParam(7, $product->getUpdatedDate());
        $pstmt->bindParam(8, $product->getCreateID());
        $pstmt->bindParam(9, $product->getCreatedDate());
        $pstmt->bindParam(10, $product->getImage());
        $pstmt->bindParam(11, $product->getDescription());
        $pstmt->bindParam(12, $product->getProductTypeID());
        $pstmt->bindParam(13, $product->getProductID());
        $result = $pstmt->execute();
        
        if($result) { // check if the insert was successful
            header("Location: AdminProduct.php");
            exit();
        } else {
            header("Location: AdminErrorPage.php");
            exit();
        }
        
    }

    public function delete($productID) {
        $query = "DELETE FROM product WHERE productID = ?";
        $pstmt = $this->conn->prepare($query);
        $pstmt->bindParam(1, $productID);
        $result = $pstmt->execute();
        
        if($result) { // check if the insert was successful
            header("Location: AdminProduct.php");
            exit();
        } else {
            header("Location: AdminErrorPage.php");
            exit();
        }
    }
    
    public function editProductType($productTypeOldName, $productTypeNewName) {
        $query = "UPDATE producttype SET productTypeName = ? WHERE productTypeName = ?";
        $pstmt = $this->conn->prepare($query);
        $pstmt->bindParam(1, $productTypeNewName);
        $pstmt->bindParam(2, $productTypeOldName);       
        $result = $pstmt->execute();
        
        if($result) { // check if the insert was successful
            header("Location: AdminProduct.php");
            exit();
        } else {
            header("Location: AdminErrorPage.php");
            exit();
        }
    }
    
    public function getNoOfCustomer() {
        $query = "SELECT COUNT(*) FROM customer";
        $pstmt = $this->conn->prepare($query);
        $pstmt->execute();
        $result = $pstmt->fetchColumn();    
        
        if ($result === false) {
            // handle the case where the query execution is unsuccessful
            // redirect to the error page
            header("Location: AdminErrorPage.php");
            exit();
        }
        
        return $result;
    }
    
    public function retrieveAllOrders() {
        $query = "SELECT * FROM payment";
        $pstmt = $this->conn->prepare($query);
        $pstmt->execute();
        $order = $pstmt->fetchAll(PDO::FETCH_ASSOC);
        
        if ($order === false) {
            // handle the case where the query execution is unsuccessful
            // redirect to the error page
            header("Location: AdminErrorPage.php");
            exit();
        }
        
        return $order;
    }
    
    public function totalSales() {
        $query = "SELECT SUM(totalPayment) FROM payment";
        $pstmt = $this->conn->prepare($query);
        $pstmt->execute();
        $result = $pstmt->fetchColumn();
        
        if ($result === false) {
            // handle the case where the query execution is unsuccessful
            // redirect to the error page
            header("Location: AdminErrorPage.php");
            exit();
        }
        
        return $result;
    }
    
    public function retrieveCartID($orderID) {
        $query = "SELECT * FROM `order` WHERE orderID = ?";
        $pstmt = $this->conn->prepare($query);
        $pstmt->bindParam(1, $orderID);
        $pstmt->execute();
        $result = $pstmt->fetch(PDO::FETCH_ASSOC);
        
        if ($result === false) {
            // handle the case where the query execution is unsuccessful
            // redirect to the error page
            header("Location: AdminErrorPage.php");
            exit();
        }
        
        return $result;
    }
    
    public function retrieveOrderDetails($orderID) {
        $query = "SELECT * FROM payment WHERE orderID = ?";
        $pstmt = $this->conn->prepare($query);
        $pstmt->execute([$orderID]);
        $result = $pstmt->fetch(PDO::FETCH_ASSOC);
        
        if ($result === false) {
            // handle the case where the query execution is unsuccessful
            // redirect to the error page
            header("Location: AdminErrorPage.php");
            exit();
        }
        
        return $result;
    }
}
