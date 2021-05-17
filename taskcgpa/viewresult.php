<?php
require 'config.php';
include 'header.php';

if (isset($_POST['add'])) {

    $sql = "INSERT INTO result (result_id, stud_id, sub_id, marks, grade, pointer) VALUE (:result_id, :stud_id, :sub_id, :marks, :grade, :pointer)";

    $stmt = $conn->prepare($sql);
    $stmt->bindValue('result_id', $_POST['result_id']);
    $stmt->bindValue('stud_id', $_POST['stud_id']);
    $stmt->bindValue('sub_id', $_POST['sub_id']);
    $stmt->bindValue('marks', $_POST['marks']);
    $stmt->bindValue('grade', $_POST['grade']);
    $stmt->bindValue('pointer', $_POST['pointer']);

    $stmt->execute();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>View Result</title>
</head>

<body>
<h3>Student Result</h3>

<form>
    <div>
        <label class="form-label" for="stud_name">Student Name: </label>
        
        <?php
        $stmt = $connection->prepare('SELECT * FROM student');
        $stmt->execute();
        ?>

        <select name="stud_id" class="form-select" aria-label="student">
            <option selected>Click Student</option>
        
            <?php while ($student = $stmt->fetch(PDO::FETCH_OBJ)) { ?>
                <option value="<?= $student->stud_id ?>"><?= $student->stud_name ?></option>
            <?php } ?>
        </select>
    </div>
    <div>
        <label class="form-label" for="stud_name">Subject: </label>
        
        <?php
        $stmt = $connection->prepare('SELECT * FROM subject');
        $stmt->execute();
        ?>

        <select name="sub_id" class="form-select" aria-label="subject">
            <option selected>Choose Subject</option>
        
            <?php while ($subject = $stmt->fetch(PDO::FETCH_OBJ)) { ?>
                <option value="<?= $subject->sub_id ?>"><?= $subject->sub_code ?><?= $subject->sub_name ?></option>
            <?php } ?>
        </select>
    </div>
    <div>
        <label class="form-label" for="grade">Grade: </label>
        <select class="form-select" aria-label="">
            <option selected>Choose Grade</option>
            <option value="A">A</option>
            <option value="A-">A-</option>
            <option value="B+">B+</option>
            <option value="B">B</option>
            <option value="B-">B-</option>
            <option value="C+">C+</option>
            <option value="C">C</option>
            <option value="C-">C-</option>
            <option value="D+">D</option>
            <option value="D">D+</option>
            <option value="E">E</option>
            <option value="F">F</option>
        </select>
    </div>
    <div>
        <label class="form-label" for="pointer">Pointer: </label>
        <input type="text" name="pointer" value="" id="pointer" class="form-control" placeholder="Pointer">
    </div>
</form>
</body>
</html>

<style>
Body {  
  font-family: Arial, Helvetica, sans-serif;  
  background-color: lightyellow;  
} 

button {   
    background-color: #4CAF50;   
    width: 20%;  
    color: black;   
    padding: 15px;   
    margin: 10px 0px;   
    border: none;   
    cursor: pointer;   
    } 
	  
 form {   
    border: 3px solid #f1f1f1; 
	text-align: left; 
    }   

 input[type=text] {   
        width: 80%;   
        margin: 8px 0;  
        padding: 12px 20px;   
        display: inline-block;   
        border: 2px solid black;   
        box-sizing: border-box;   
    }  

 button:hover {   
    opacity: 0.7;   
    }    
</style>