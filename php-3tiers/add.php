<?php
require_once('loader.php');
$errorMessage = '';
if(isset($_POST['studentSubmitButton']) && $_POST['studentSubmitButton'] == 'Add Student'){
    $studentBllObj = new StudentBLO();
    $studentName = $_POST['studentName'];
    $studentRoll = $_POST['studentRoll'];
$studentDateOfBirth = $_POST['']}