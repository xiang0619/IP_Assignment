<?php
$id = $_GET['id'];

include 'config.php';



    
            $stmt = $dbc->prepare("SELECT file from cart where cartID ='{$id}'");
            $stmt->execute(); //execute bind 
            $stmt->bind_result($file); //bind result
            $stmt->fetch();

        $file_path = "./Shared/pdfFile/".$file;

        if (file_exists($file_path)) {
            include 'config.php';
            $a = $dbc->prepare("delete from cart where cartID ='{$id}'");
            $a->execute(); //execute bind 
            unlink($file_path);
               
                
        } else {
                 include 'CartView.php';
                 header("Location: CartView.php");
        }
include 'CartView.php';
header("Location: CartView.php");
?>

