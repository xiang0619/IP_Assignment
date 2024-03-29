<!DOCTYPE html>
<?php
/*Author : Ng Wen Xiang*/
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>JE Admin</title>
	
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
        <link href="../Shared/CSS/SharedCSS.css" rel="stylesheet" type="text/css"/>
        
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
	
	<!-- Bootstrap JavaScript -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://unpkg.com/@popperjs/core@2.10.3/dist/bundle.min.js"></script>
        <script src="https://unpkg.com/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        
        <style>
            .dropdown:hover .dropdown-menu {
              display: block;
              position: absolute;
              left: 50%;
              transform: translateX(-50%);
              top: 100%;
            }
            
            #adminProfile {
                color:white;
            }
            
            #adminService1, #adminReport1, #adminProduct1,#adminStaff{
                color:white;
            }
        </style>
    </head>
    <body>
        <?php
            include '../Shared/PHP/AdminHeader.php';
        ?>
        
        <main class="container-fluid mb-4 mt-4 text-center" style="">
            <h1>Change Password</h1>
	</main>

        <form    id="passwordUpdateForm" onsubmit="handlePasswordUpdate(event)"    >
            <div class="row">
                <!-- Make div center -->
                <div class="col-3"></div>

                <div class="col-6 shadow-lg text-center m-5">
                    <div class="row">
                        <!-- Icon position -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-shield-lock-fill col-12 m-0 mt-4" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M8 0c-.69 0-1.843.265-2.928.56-1.11.3-2.229.655-2.887.87a1.54 1.54 0 0 0-1.044 1.262c-.596 4.477.787 7.795 2.465 9.99a11.777 11.777 0 0 0 2.517 2.453c.386.273.744.482 1.048.625.28.132.581.24.829.24s.548-.108.829-.24a7.159 7.159 0 0 0 1.048-.625 11.775 11.775 0 0 0 2.517-2.453c1.678-2.195 3.061-5.513 2.465-9.99a1.541 1.541 0 0 0-1.044-1.263 62.467 62.467 0 0 0-2.887-.87C9.843.266 8.69 0 8 0zm0 5a1.5 1.5 0 0 1 .5 2.915l.385 1.99a.5.5 0 0 1-.491.595h-.788a.5.5 0 0 1-.49-.595l.384-1.99A1.5 1.5 0 0 1 8 5z"/>
                        </svg>

                        <div class="col-4 fs-5 mt-2 mb-2"><label for="oldPassword">Old Password : </label></div>
                        <div class="col-8 fs-5 mt-2 mb-2"><input name="oldPass" type="password" class="form-control" id="oldPassword" placeholder="**********" maxlength="40" required></div>

                        <div class="col-4 fs-5 mt-2 mb-2"><label for="newPassword">New Password : </label></div>
                        <div class="col-8 fs-5 mt-2 mb-2"><input name="newPass" type="password" class="form-control" id="newPassword" placeholder="**********" maxlength="40" required></div>

                        <div class="col-4 fs-5 mt-2 mb-2"><label for="rePassword">Confirm Password : </label></div>
                        <div class="col-8 fs-5 mt-2 mb-2"><input name="rePass" type="password" class="form-control" id="rePassword" placeholder="**********" maxlength="40" required></div>

                        <!--Edit button position  -->
                        <div class="col-4 mt-2 mb-2"><button class="form-control" style="border-radius: 25px;background-color: none;"><a style="text-decoration: none;color:black;" href="AdminProfile.php">Back To Profile</a></div>
                        <div class="col-4 mt-2 mb-2"></div>
                        <div class="col-4 mt-2 mb-2 "><input type="Submit" class="form-control" style="border-radius: 25px;background-color: none;" name="submit" value="Change Password"></div>
                    </div>
                </div>

                <!-- Make div center -->
                <div class="col-3"></div>

            </div>
        </form>
        <script>
            function handlePasswordUpdate(event) {
                event.preventDefault(); // Prevent form submission

                // Get the form data
                var form = document.getElementById('passwordUpdateForm');
                var formData = new FormData(form);

                // Make the API call
                fetch('http://localhost/IP_Assignment/Admin/api/AdminChangePassword.php', {
                  method: 'POST',
                  body: formData
                })
                  .then(response => response.json())
                  .then(data => {
                    // Handle the response
                    if (data.status == 200) {
                      // Password update successful
                      alert(data.message);
                      window.location.href = 'http://localhost/IP_Assignment/Admin/AdminProfile.php';
                      // Redirect to profile page
                    } else {
                      // Password update failed
                      alert(data.message);
                    }
                  })
                  .catch(error => {
                    // Request failed or JSON parsing error
                    console.log(error);
                    alert('An error occurred while updating the password.');
                  });
              }

        </script>
    </body>
</html>
