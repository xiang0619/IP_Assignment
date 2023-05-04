<?php
session_start();
include('../includes/config.php');
//login 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userEmail = $_POST['email'];
    $userPass = $_POST['pass']; //double encrypt to increase security sha1(md5())
    
    $stmt = $dbc->prepare("SELECT email_address, password, people_id  FROM  people WHERE (email_address = ? AND password = ?)"); //sql to log in user
    $stmt->bind_param('ss',  $userEmail, $userPass); //bind fetched parameters
    $stmt->execute(); //execute bind 
    $stmt->bind_result($custEmail, $custPass, $peopleID); //bind result
    $rs = $stmt->fetch();
   
    if ($rs) {
         $_SESSION['peopleID'] = $peopleID;
        echo '<script>alert("Login successful!");</script>';
        header("location:homepage.php");
    } else {
        echo '<script>alert("Incorrect email or password");</script>';
    }
    
    if (isset($_POST['submit'])) {
    processForm();
}

    function processForm() {
        // Perform some processing here
        echo "Form submitted successfully!";
    }
}

function display(){
    
} 
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        display()
        ?>
        
        
            <?php
        // Define the number of buttons to generate
        $num_buttons = 2;
        
        // Generate the buttons and text elements
        for ($i = 0; $i < $num_buttons; $i++) {
            // Generate a random color for the button
            $colors = array("red", "green", "blue");
            $color = $colors[rand(0, count($colors) - 1)];
            
            // Generate the button and text HTML
            $button_html = "<button id='increment-button-$i' style='background-color: $color;'>Click me!</button>";
            $text_html = "<p id='text-$i'>0</p>";
            
            // Output the button and text HTML
            echo $button_html;
            echo $text_html;
        }
    ?>
        
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
