<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
        <link href="../Shared/CSS/SharedCSS.css" rel="stylesheet" type="text/css"/>
        <title>Dashboard</title>
        <style>
            #sidebar{
                width:20%;
            }
        </style>
    </head>
    <body>
        
        <div class="table-responsive">
            <table class="table">
                <tr>
                    <td rowspan="2" colspan="1" id="sidebar">
                        <?php
                            include '../Shared/PHP/AdminSidebar.php';
                        ?>
                    </td>
                    <td colspan="3">
                        <div class="mt-4">
                            <h1>Admin Panel</h1>
                            
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <div class=""><h1>Dashboard</h1></div>
                    </td>
                </tr>
                
            </table>
        </div>
    </body>
</html>
