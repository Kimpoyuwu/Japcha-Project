<?php

if ($_SERVER["REQUEST_METHOD"] == "POST"){

    $name = $_POST["usname"];
    
    // Process permissions for different modules
    $dashboard_view = isset($_POST["permissions"]["dashboard"]["view"]) ? 1 : 0;
    $dashboard_edit = isset($_POST["permissions"]["dashboard"]["create"]) ? 1 : 0;
    $appointmentManagement_view = isset($_POST["permissions"]["appointmentManagement"]["view"]) ? 1 : 0;
    $appointmentManagement_create = isset($_POST["permissions"]["appointmentManagement"]["create"]) ? 1 : 0;
    $appointmentManagement_edit = isset($_POST["permissions"]["appointmentManagement"]["edit"]) ? 1 : 0;
    $appointmentManagement_delete = isset($_POST["permissions"]["appointmentManagement"]["delete"]) ? 1 : 0;
    
    // Initialize variables for accountManagement permissions
    $accountManagement_view = isset($_POST["permissions"]["accountManagement"]["view"]) ? 1 : 0;
    $accountManagement_create = isset($_POST["permissions"]["accountManagement"]["create"]) ? 1 : 0;
    $accountManagement_edit = isset($_POST["permissions"]["accountManagement"]["edit"]) ? 1 : 0;
    $accountManagement_delete = isset($_POST["permissions"]["accountManagement"]["delete"]) ? 1 : 0;
    $accountManagement_archive = isset($_POST["permissions"]["accountManagement"]["archive"]) ? 1 : 0;
    $accountManagement_ban = isset($_POST["permissions"]["accountManagement"]["ban"]) ? 1 : 0;

    // Initialize variables for contentManagement permissions
    $contentManagement_view = isset($_POST["permissions"]["contentManagement"]["view"]) ? 1 : 0;
    $contentManagement_create = isset($_POST["permissions"]["contentManagement"]["create"]) ? 1 : 0;
    $contentManagement_edit = isset($_POST["permissions"]["contentManagement"]["edit"]) ? 1 : 0;
    $contentManagement_delete = isset($_POST["permissions"]["contentManagement"]["delete"]) ? 1 : 0;

    // Initialize variables for fileManagement permissions
    $fileManagement_view = isset($_POST["permissions"]["fileManagement"]["view"]) ? 1 : 0;
    $fileManagement_create = isset($_POST["permissions"]["fileManagement"]["create"]) ? 1 : 0;
    $fileManagement_edit = isset($_POST["permissions"]["fileManagement"]["edit"]) ? 1 : 0;
    $fileManagement_delete = isset($_POST["permissions"]["fileManagement"]["delete"]) ? 1 : 0;

    include "../classes/dbh.classes.php";
    include "../classes/user-level-Model.php";
    
    $AddNewUserLevel = new UserLevel();
    $AddNewUserLevel->setUserLevel($name, $dashboard_view, $dashboard_edit,$appointmentManagement_view,  $appointmentManagement_create, $appointmentManagement_edit, $appointmentManagement_delete,$accountManagement_view,  $accountManagement_create, $accountManagement_edit, $accountManagement_delete,$accountManagement_archive,  $accountManagement_ban, $contentManagement_view, $contentManagement_create, $contentManagement_edit,$contentManagement_delete,  $fileManagement_view, $fileManagement_create,  $fileManagement_edit, $fileManagement_delete);

    header("location: ../back-end/userLevel.php?error=none");
}