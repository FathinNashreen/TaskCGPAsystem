<?php
require 'config.php';
include 'header.php';

if (isset($_POST['add'])) {
    $stmt = $conn->prepare('INSERT INTO student(stud_name,stud_matricno,stud_id,stud_age,stud_course,stud_sem,stud_credithour) VALUE(:stud_name,:stud_matricno,:stud_id.:stud_age,:stud_course,:stud_sem,:stud_credithour)');

    $stmt->bindValue('stud_name', $_POST['stud_name']);
    $stmt->bindValue('stud_matricno', $_POST['stud_matricno']);
    $stmt->bindValue('stud_id', $_POST['stud_id']);
    $stmt->bindValue('stud_age', $_POST['stud_age']);
    $stmt->bindValue('stud_course', $_POST['stud_course']);
    $stmt->bindValue('stud_sem', $_POST['stud_sem']);
    $stmt->bindValue('stud_credithour', $_POST['stud_credithour']);

    $stmt->execute();
    header("location:index.php");
}
?>

<!DOCTYPE html>
<h3>Add Student Detail</h3>

<div>
    <form>
        <div>
            <label class="form-label" for="stud_name">Student Name: </label>
            <input type="text" name="stud_name" value="" id="stud_name" class="form-control" placeholder="Enter Name">
        </div>
        <div>
            <label class="form-label" for="stud_matricno">Matric Number: </label>
            <input type="text" name="stud_matricno" value="" id="stud_matricno" class="form-control" placeholder="Enter Matric Number">
        </div>
        <div>
            <label class="form-label" for="stud_id">Student ID: </label>
            <input type="text" name="stud_id" value="" id="stud_id" class="form-control" placeholder="Enter ID">
        </div>
        <div>
            <label class="form-label" for="stud_age">Age: </label>
            <input type="text" name="stud_age" value="" id="stud_age" class="form-control" placeholder="Enter Age">
        </div>
        <div>
            <label class="form-label" for="stud_course">Course: </label>
            <input type="text" name="stud_course" value="" id="stud_course" class="form-control" placeholder="Enter Course">
        </div>
        <div>
            <label class="form-label" for="stud_sem">Semester: </label>
            <input type="text" name="stud_sem" value="" id="stud_sem" class="form-control" placeholder="Enter Semester">
        </div>
        <div>
            <label class="form-label" for="stud_credithour">Total Credit Hour: </label>
            <input type="text" name="stud_credithour" value="" id="stud_credithour" class="form-control" placeholder="Enter Name">
        </div>
        <div>
            <button type="submit" name="add" value="add" class="btn btn-primary">Add Student</button>
        </div>
    </form>
</div>
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