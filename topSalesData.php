<!--Author: ONG ENG HUAT-->
<?php


function getData($dbc){

require './class/Product.php';
    $stmt = $dbc->prepare("SELECT  c.productID, SUM(c.quantity) AS total_quantity,p.name,c.status,unitPrice,image,description
FROM cart c
JOIN product p ON c.productID = p.productID
WHERE c.status= 'payed' AND p.status = 'Available'
GROUP BY c.productID
ORDER BY total_quantity DESC

");
            $stmt->execute(); //execute bind 
            $stmt->bind_result($productID,$total ,$name,$status,$unitPrice,$image,$desc); //bind result
       
            $list = new SplDoublyLinkedList();
       
            while($stmt->fetch()){
                $product = new Product();
                        $product->setId($productID);
                        $product->setName($name);
                        $product->setStatus($status);              
                        $product->setUnitPrice($unitPrice);
                        $product->setImage($image);
                        $product->setDescription($desc);
                        
                        $list->push($product);
                //echo $productID.' '.$total.$name.'</br>';
            
//              echo $product->getName();
            }
            return $list;
}


?>