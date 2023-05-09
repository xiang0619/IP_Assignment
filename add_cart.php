<?php
include './Shared/Helper/EncryptionHelper.php';



if(isset($_POST['submit'])){
    $productid = $_POST['productid'];
    $quantity = $_POST['quantity'];
    $type = $_POST['type'];
    $addCart = $_POST['addCart'];
    $doubleAdd = $_POST['doubleAdd'];
    
    $customerID = 1001;
    
    $encryptionHelper = new EncryptionHelper("id");
    $eid= $encryptionHelper->encrypt($productid);
    
    if($customerID==null){
        echo '<script>';
        echo "alert('you haven't log in yet, the cart function will be open when you logged in');";
        echo '</script>';
        //send user back to log in
        //header("Location: Login.php");
    }
    if($quantity==null){
        echo '<script>';
        echo 'alert("unexpected value of quantity detected. error");';
        echo '</script>';
        header("Location: Stationary_Details.php?id='{$eid}'");
    }
    if($quantity!=null &&$productid!=null&&$customerID!=null&&$type=="product"){
        
        include 'config.php';
        
        $stmt = $dbc->prepare("SELECT cartID from cart where customerID='{$customerID}' AND productID='{$productid}'");
            $stmt->execute(); //execute bind 
            $stmt->bind_result($cartID); //bind result    
            while ($stmt->fetch()) {
                $cartID=$cartID;
                        
            }       

            if($cartID!=null){

                    $stmt = $dbc->prepare("SELECT quantity from cart where cartID='{$cartID}'");
                    $stmt->execute(); //execute bind 
                    $stmt->bind_result($qty); //bind result    
                    while ($stmt->fetch()) {
                        $qty=$qty;

                    }   
                    $newqty=$qty+$quantity;
                        //update cart

                    $stmt = $dbc->prepare("update cart set quantity = '{$newqty}' where cartID = '{$cartID}'");
                    $stmt->execute();
                    echo "<script>";
                        echo "alert('$doubleAdd');";
                        echo "window.location.href = 'Stationary_Details.php?id={$eid}';";
                        echo "</script>";
                    
                    

            }
            else
            {
                $stmt = $dbc->prepare("insert into cart (customerID,status,productID,type,quantity ) values ({$customerID},'pending',{$productid},'Product',{$quantity});");
                $stmt->execute(); //execute bind 
                echo "alert('$addCart');";
                        echo "window.location.href = 'Stationary_Details.php?id={$eid}';";
                        echo "</script>";
                
                
            }
    
    }
}
?>
