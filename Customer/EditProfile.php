<!DOCTYPE html>
<?php
/*Author : Ng Wen Xiang*/
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
        <link href="../Shared/CSS/SharedCSS.css" rel="stylesheet" type="text/css"/>
        <title>Edit Profile</title>
    </head>
    <body>
        <?php
            include '../Shared/PHP/CustomerHeader.php';
            require '../Shared/Database/CustomerDatabase.php';
            
            if($_SESSION['customerID'] == null){
                header("Location : http://localhost/IP_Assignment/Homepage.php");
            }
            
            $customerID = $_SESSION['customerID'];

            $customerDatabase = new CustomerDatabase();
            $customer = $customerDatabase->getProfile($customerID);
            $encryptionHelper = new EncryptionHelper("Customer");
        ?>

        
        <form  id="profileUpdateForm" onsubmit="handleProfileUpdate(event)" >
            <div class="row">
                <!-- Make div center -->
                <div class="col-3"></div>

                <div class="col-6 shadow-lg text-center m-5">
                    <div class="row">
                        <!-- Icon position -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-people-fill primary-color col-12 m-0" viewBox="0 0 16 16">
                            <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
                        </svg>

                        <div class="col-12 primary-color fs-3">Profile</div>

                        <div class="col-4 fs-5 primary-color mt-2 mb-2">Email : </div>
                        <div class="col-8 fs-5 primary-color mt-2 mb-2"><?php echo $customer->getEmail(); ?></div>

                        <div class="col-4 fs-5 primary-color mt-2 mb-2"><label for="name">Name : </label></div>
                        <div class="col-8 fs-5 primary-color mt-2 mb-2"><input type="text" name="name" class="form-control" id="name" value="<?php echo $customer->getName() ?>" maxlength="40"></div>

                        <div class="col-4 fs-5 primary-color mt-2 mb-2"><label for="mobile">Mobile Number : </label></div>
                        <div class="col-8 fs-5 primary-color mt-2 mb-2"><input type="text" name="mobile" class="form-control" id="mobile" value="<?php echo $customer->getMobile()?>" placeholder="012-345678910" maxlength="40"></div>
                        
                        <!--Edit button position  -->
                        <div class="col-4 mt-2 mb-2"><button class="form-control" style="border-color: #2BDEDE; border-radius: 25px;background-color: none; color:#2BDEDE;"><a style="text-decoration: none;color: #2BDEDE;" href="Profile.php">Back To Profile</a></div>
                        <div class="col-4 mt-2 mb-2"></div>
                        <div class="col-4 mt-2 mb-2 "><input type="Submit" class="form-control" name="submit" style="border-color: #2BDEDE; border-radius: 25px;background-color: none; color:#2BDEDE;" value="Edit"></div>
                    </div>
                </div>

                <!-- Make div center -->
                <div class="col-3"></div>

            </div>
        </form>
        <?php
            include '../Shared/PHP/CustomerFooter.php';
        ?>
        <script>
        function handleProfileUpdate(event) {
        event.preventDefault(); // Prevent form submission

        // Get the form data
        var form = document.getElementById('profileUpdateForm');
        var formData = new FormData(form);

        // Make the API call
        fetch('http://localhost/IP_Assignment/Customer/api/EditProfile.php', {
           method: 'POST',
           body: formData
        })
           .then(response => response.json())
           .then(data => {
              // Handle the response
              if (data.status == 200) {
                 // Profile update successful
                 alert(data.message);
                 window.location.href = 'http://localhost/IP_Assignment/Customer/Profile.php';
                 // Redirect to profile page
              } else {
                 // Profile update failed
                 alert(data.message);
              }
           })
           .catch(error => {
              // Request failed
              console.log(error);
              alert('An error occurred while updating the profile.');
           });
     }

    </script>
    </body>
</html>