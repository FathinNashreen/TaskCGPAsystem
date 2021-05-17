<?php
require 'config.php'

?>
<!Doctype Html>  
<Html>     
<Head>      
<Title>     
CGPA GPA SYSTEM 
</Title>  
<style type=text/css>   
body   
{  
height: 125vh;  
margin-top: 80px;  
padding: 30px;  
background-size: cover;  
font-family: sans-serif;  
}  
header {  
background-color: lightblue;  
position: fixed;  
left: 0;  
right: 0;  
top: 5px;  
height: 50px;  
display: flex;  
align-items: center;  
}  
header * {  
display: inline;  
}  
header li {  
margin: 20px;  
}  
header li a {  
color: black;  
text-decoration: none;  
}  
</style>   
</Head>  
<Body>   
<header>  
<nav>  
<ul>  
<li>  
<a href="index.php">HOME</a>				
</li>  
<li>  
<a href = "student.php">STUDENT</a> 
</li>  
<li>  
<a href = "subject.php">SUBJECT</a> 
</li> 
<li>  
<a href = "viewresult.php">RESULT</a>
</li>   
</ul>  
</nav>  
</header>  
</Body>   
</Html>