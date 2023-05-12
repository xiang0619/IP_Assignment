<!--Author: Jason Lee Kar Chun -->
<?php

include '../Shared/DesignPattern/StaffFactoryMethod.php';
$staffId = $_GET["id"];
$deleteStaff = AuthenticationFactory::createAuthentication("deleteStaff", $staffId, null, null, null, null, null, null);
$deleteStaff->authenticate();
