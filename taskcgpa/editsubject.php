<?php
require 'config.php';
include 'header.php';

$stmt = $connection->prepare ('SELECT * FROM subject WHERE sub_id = :sub_id');
$stmt->bindValue('sub_id', $_GET['sub_id']);
$stmt->execute();

$subject = $stmt->fetch(PDO::FETCH_OBJ);

if (isset($_POST['edit'])) {

    $stmt = $connection->prepare("UPDATE subject SET sub_id=:sub_id, sub_code=:sub_code, sub_name=:sub_name, credit_hour=:credit_hour WHERE sub_code=:sub_code");
    $stmt->bindValue('sub_id', $_POST['sub_id']);
    $stmt->bindValue('sub_code', $_POST['sub_code']);
    $stmt->bindValue('sub_name', $_POST['sub_name']);
    $stmt->bindValue('credit_hour', $_POST['credit_hour']);

    $stmt->execute();
    header("Location:subject.php");
}
?>

<!DOCTYPE html>
<form>
<h3>Edit Subject</h3>

<table>
    <tr>
        <td>Subject ID</td>
        <td><input class="form-control" type="text" name="sub_id" value="<?php echo $subject->sub_id; ?>"></td>
    </tr>
    <tr>
        <td>Subject Code</td>
        <td><input class="form-control" type="text" name="sub_code" value="<?php echo $subject->sub_code; ?>"></td>
    </tr>
    <tr>
        <td>Subject Name</td>
        <td><input class="form-control" type="text" name="sub_name" value="<?php echo $subject->sub_name; ?>"></td>
    </tr>
    <tr>
        <td>Credit Hour</td>
        <td><input class="form-control" type="text" name="credit_hour" value="<?php echo $subject->credit_hour; ?>"></td>
    </tr>
    <tr>
        <td><input class="btn" type="submit" name="edit" value="Edit Subject"></td>
    </tr>
</table>
</form>
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
