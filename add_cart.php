<?php
include './Shared/Helper/EncryptionHelper.php';
include 'config.php';


if(isset($_POST['submit'])){
    $productid = $_POST['productid'];
    $quantity = $_POST['quantity'];
    $type = $_POST['type'];
    $addCart = $_POST['addCart'];
    $doubleAdd = $_POST['doubleAdd'];
    
    $customerID = 1001;
    
    if($productid!=null){
        $encryptionHelper = new EncryptionHelper("id");
        $eid= $encryptionHelper->encrypt($productid);
    }

    if($customerID==null){
        echo '<script>';
        echo "alert('you haven't log in yet, the cart function will be open when you logged in');";
        echo '</script>';
        //send user back to log in
        
    }
    if($quantity==null&&$type=="product"){
        echo '<script>';
        echo 'alert("unexpected value of quantity detected. error");';
        echo '</script>';
        header("Location: ./Stationary_Details.php?id='{$eid}'");
    }
    if($quantity!=-1 &&$productid!=-1&&$customerID!=null&&$type=="product"){
        
        
        
        $stmt = $dbc->prepare("SELECT cartID from cart where customerID=? AND productID=?");
        $stmt->bind_param('ss',  $customerID, $productid);
            $stmt->execute(); //execute bind 
            $stmt->bind_result($cartID); //bind result    
            while ($stmt->fetch()) {
                $cartID=$cartID;
                        
            }       

            if($cartID!=null){

                    $stmt = $dbc->prepare("SELECT quantity from cart where cartID=?");
                    $stmt->bind_param('s', $cartID );
                    $stmt->execute(); //execute bind 
                    $stmt->bind_result($qty); //bind result    
                    while ($stmt->fetch()) {
                        $qty=$qty;

                    }   
                    $newqty=$qty+$quantity;
                        //update cart

                    $stmt = $dbc->prepare("update cart set quantity = ? where cartID = ?");
                    $stmt->bind_param('is', $newqty,$cartID );
                    $stmt->execute();
                    echo "<script>";
                    echo "alert('$doubleAdd');";
                    echo "setTimeout(function(){window.location.href='./Stationary_Details.php?id={$eid}';}, 500);"; // delay redirection by 3 seconds (3000 milliseconds)
                    echo "</script>";

            }
            else
            {
                $stmt = $dbc->prepare("insert into cart (customerID,status,productID,type,quantity ) values (?,'pending',?,'Product',?);");
                $stmt->bind_param('ssi', $customerID,$productid,$quantity );
                $stmt->execute(); //execute bind 
                echo "<script>";
                    echo "alert('$addCart');";
                    echo "setTimeout(function(){window.location.href='./Stationary_Details.php?id={$eid}';}, 500);"; // delay redirection by 3 seconds (3000 milliseconds)
                    echo "</script>";
            }
    
    }
    else if($customerID!=-1&&$type=="service"){
        //service
        if ($_FILES["pdf_file"]["type"] == "application/pdf") {
            

            
            $filename=$customerID.$_FILES['pdf_file']['name'];
            
            
            $stmt = $dbc->prepare("select file from cart where customerID=? AND file=?");
            $stmt->bind_param('ss', $customerID,$filename );
            $stmt->execute(); //execute bind 
            $stmt->bind_result($result); //bind result
            $stmt->fetch();
            
            if($result!=null){
                //error double upload the file
                echo "<script>";
                    echo "alert('$doubleAdd');";
                    echo "setTimeout(function(){window.location.href='./Service.php';}, 500);"; // delay redirection by 3 seconds (3000 milliseconds)
                    echo "</script>";
                
            }
            else
            {
                // Get the uploaded file and its MIME type
                $file = $_FILES['pdf_file']['tmp_name'];
                $file_type = $_FILES['pdf_file']['type'];

                // Check if the file is a PDF
                if ($file_type != 'application/pdf') {
                    echo 'Selected file is not a PDF';
                    exit;
                }


                // Upload the file to the server
                $target_dir = './Shared/pdfFile/';
                $target_file = $target_dir.$customerID . basename($_FILES['pdf_file']['name']);
                move_uploaded_file($_FILES['pdf_file']['tmp_name'], $target_file);
            
                function check($path)
                {
                  $pdf = file_get_contents($path);
                  $number = preg_match_all("/\/Page\W/", $pdf, $dummy);
                  return $number;
                }
            
               $path = $target_file;
                $totalPages = check($path);

                



            
                //update database
                
                $stmt = $dbc->prepare("insert into cart (customerID, status, serviceID,type,quantity,file,downloadStatus) "
                        . "values (?,'pending',1,'Service',?,?,'pending');");
                  $stmt->bind_param('sis', $customerID,$totalPages,$filename );      
                $stmt->execute(); //execute bind 
                
                 echo "<script>";
                    echo "alert('$addCart');";
                    echo "setTimeout(function(){window.location.href='./Service.php';}, 500);"; // delay redirection by 3 seconds (3000 milliseconds)
                    echo "</script>";
            }
            
            
            
            
        } else {
            echo "Please select a PDF file.";
}
    }
}
?>
