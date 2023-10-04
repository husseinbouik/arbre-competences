<?php
class studentBLO {
    private $studentDao;
    public $errorMessage;
public function __construct(){
    $this->studentDao = new StudentDAO();
}
public function GetAllStudent(){
    return $this->studentDao->GetAllStudents();
}
public function GetStudent($studentId){
    return $this->studentDao->GetStudent($studentId);
}
public function AddStudent($student){
    $insertId = 0;
    if ($student->GetName() == '' || $student->GetEmail() == '') {
        $this->errorMessage = 'Student Name, Romm and Email is required.';
        return $insertedId;
    }
    if($this->IsValidStudent($student)){
        $insertedId = (int)$this->studentDao->AddStudent($student);
    }
        return $insertedId;
}
public function UpdateStudent($student){
    $affectedRows = 0;

    if($student->GetName() == '' || $student->GetEmail() == ''){
        $this->errorMessage = 'Student Name,Roll and Email is required.';
        return$affectedRows;
    }
    if($this->IsValidStudent($student)){
        $affectedRows = (int)$this->studentDao->UpdateStudent($student);
    }
    return $affectedRows;
}
public function DeleteStudent($studentId){
    $affectedRows
}
}