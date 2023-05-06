
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <title></title>
</head>
<body>
    
    //<?php
//// Establish a connection to the database
//include 'config.php';
//// Execute the query to retrieve the data
//$sql = "SELECT productID,name,quantity,status,unitPrice,image,description from product where productID ='P0001'";
//$result = mysqli_query($dbc, $sql);
//
//// Create a new DOM document object
//$dom = new DOMDocument();
//
//// Load the DTD file
//$dom->load('Cart.dtd');
//
//// Create the root element
//$root = $dom->createElement('Cart');
//$dom->appendChild($root);
//
//// Loop through the result set and add each row as an element
//while ($row = mysqli_fetch_assoc($result)) {
//    $product = $dom->createElement('Product');
//    foreach ($row as $field => $value) {
//        $element = $dom->createElement($field, $value);
//        $product->appendChild($element);
//    }
//    $root->appendChild($product);
//}
//
//// Set the header to "Content-Type: text/xml"
//header('Content-Type: text/xml');
//
//// Output the XML
//echo $dom->saveXML();
//?>

    
    <script>
        // Add click event listeners to the buttons
        <?php for ($i = 0; $i < $num_buttons; $i++) { ?>
            var button<?php echo $i; ?> = document.getElementById("increment-button-<?php echo $i; ?>");
            var text<?php echo $i; ?> = document.getElementById("text-<?php echo $i; ?>");
            
            button<?php echo $i; ?>.addEventListener("click", function() {
                var count = parseInt(text<?php echo $i; ?>.innerHTML);
                count++;
                text<?php echo $i; ?>.innerHTML = count;
            });
        <?php } ?>
    </script>
    
    <form method="POST">
        <input type="submit" name="submit1" value="Submit Form 1">
        <input type="submit" name="submit2" value="Submit Form 2">
    </form>
</body>
</html>
