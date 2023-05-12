
<!--Author: ONG ENG HUAT-->
    <?php
$id = $_GET['id'];

include 'config.php';

        $stmt = $dbc->prepare("SELECT file from cart where cartID = ?");
        $stmt->execute([$id]); // pass the value of $id as an argument to execute()
        $stmt->bind_result($file); // bind result
        $stmt->fetch();

        $stmt->close(); // free the result set

        $file_path = "./Shared/pdfFile/".$file;

        if($file!=null){
            if (file_exists($file_path)) {
                unlink($file_path);
            }
        }

        $a = $dbc->prepare("delete from cart where cartID = ?");
        $a->execute([$id]); // pass the value of $cartid as an argument to execute()

        $a->close(); // free the result set

?>

