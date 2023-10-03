<?php
// test tout les méthodes
require_once '../../loader.php';

$testFunctions = new StudentBLO();

$printData = $testFunctions->GetAllStudents();
// $printData = $testFunctions->GetStudent(1);
// $printData = $testFunctions->DeleteStudent(5);

// --------if id esxists------------
// $printData = $testFunctions->IsIdExists(13);


// --------if email exist ------------
// $printData = $testFunctions->IsEmailExists("11@gmail.com", 0);


// ----------------add-----------

    // $name = "efe";
    // $email = "adneean@gmail.com";
    // $date = date('Y-m-d H:i:s');
    // $Student = new Student(0, $name, $email, $date);
    // $addStudentResult = $testFunctions->AddStudent($Student);
    // print_r($addStudentResult);

// ---------------modify----------------


    // $name = "A";
    // $email = "a@gmail.com";
    // $date = date('Y-m-d H:i:s');
    // $Student = new Student(6, $name, $email, $date);
    // $addStudentResult = $testFunctions->UpdateStudent($Student);
    // print_r($addStudentResult);




// --------------- invalid student----------------

    
echo "<pre>";
var_dump($printData);
echo "</pre>";



?>