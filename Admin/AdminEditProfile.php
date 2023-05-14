<?php
/*Author Ng Wen Xiang*/
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JE Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="../Shared/CSS/SharedCSS.css" rel="stylesheet" type="text/css"/>
    <style>
        .dropdown:hover .dropdown-menu {
            display: block;
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            top: 100%;
        }

        #adminProfile {
            color: white;
        }

        #adminService1,
        #adminReport1,
        #adminProduct1,
        #adminStaff {
            color: white;
        }
    </style>
</head>

<body>
    <?php
        include '../Shared/PHP/AdminHeader.php';
        require '../Shared/Database/StaffDatabase.php';
        
        $staffID = $_SESSION['staffID'];
        $staffDatabase = new StaffDatabase();
        $staff = $staffDatabase->getProfile($staffID);
        $encryptionHelper = new EncryptionHelper("Staff");
    ?>

    <main class="container-fluid mb-4 mt-4 text-center">
        <h1>Edit Profile</h1>
    </main>

    <form id="profileUpdateForm" onsubmit="handleProfileUpdate(event)">
        <div class="row">
            <div class="col-3"></div>

            <div class="col-6 shadow-lg text-center m-5">
                <div class="row">
                    <!-- Icon position -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-people-fill col-12 m-0" viewBox="0 0 16 16">
                                            <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z" />
                    </svg>

                    <div class="col-4 fs-5 mt-2 mb-2">Email :</div>
                    <div class="col-8 fs-5 mt-2 mb-2"><?php echo $staff->getEmail(); ?></div>

                    <div class="col-4 fs-5 mt-2 mb-2">Position :</div>
                    <div class="col-8 fs-5 mt-2 mb-2"><?php echo $staff->getPosition(); ?></div>

                    <div class="col-4 fs-5 mt-2 mb-2">Name :</div>
                    <div class="col-8 fs-5 mt-2 mb-2">
                        <input type="text" class="form-control" name="name" id="name" value="<?php echo $staff->getName(); ?>" required>
                    </div>

                    <div class="col-4 fs-5 mt-2 mb-2">Mobile :</div>
                    <div class="col-8 fs-5 mt-2 mb-2">
                        <input type="text" class="form-control" name="mobile" id="mobile" value="<?php echo $staff->getMobile(); ?>" required>
                    </div>

                    <div class="col-4 mt-2 mb-2"><button class="form-control" style=" border-radius: 25px;background-color: none; "><a style="text-decoration: none;color:black;" href="AdminProfile.php">Back To Profile</a></div>
                        <div class="col-4 mt-2 mb-2"></div>
                        <div class="col-4 mt-2 mb-2 "><input type="Submit" class="form-control" name="submit" style=" border-radius: 25px;background-color: none; " value="Edit"></div>
                </div>
            </div>
            <div class="col-3"></div>
        </div>
    </form>
    <script>
        function handleProfileUpdate(event) {
        event.preventDefault(); // Prevent form submission

        // Get the form data
        var form = document.getElementById('profileUpdateForm');
        var formData = new FormData(form);

        // Make the API call
        fetch('http://localhost/IP_Assignment/Admin/api/AdminEditProfile.php', {
           method: 'POST',
           body: formData
        })
           .then(response => response.json())
           .then(data => {
              // Handle the response
              if (data.status == 200) {
                 // Profile update successful
                 alert(data.message);
                 window.location.href = 'http://localhost/IP_Assignment/Admin/AdminProfile.php';
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
