<?php
session_start();
include 'db_connect.php';
?>
<?php
include 'db_connect.php';
if(isset($_POST['upload'])){
    $imageai = addslashes($_FILES['applicant_image']['tmp_name']);
    $imagesc = addslashes($_FILES['scerti']['tmp_name']);
    $imagehc = addslashes($_FILES['hcerti']['tmp_name']);
    $imageai = file_get_contents($imageai);
    $imagesc = file_get_contents($imagesc);
    $imagehc = file_get_contents($imagehc);
    $imageai = base64_encode($imageai);
    $imagesc = base64_encode($imagesc);
    $imagehc = base64_encode($imagehc);
    $sql2=$_SESSION['sql1']."'".$imageai."','".$imagesc."','".$imagehc."');";

    if(mysqli_query($db_connect,$sql2)){
        while(1){
            $random = rand(10000,100000);
            $sql = "update student_info set secret_id = ".$random." where email = '".$_SESSION['email']."' and password = '".$_SESSION['psw']."'";
            if(mysqli_query($db_connect,$sql)) {
                break;
            }
        }
        header('location:student.php');
    }




}

?>
<html>
<head>
    <link type="text/css" rel="stylesheet" href="css/headerstyle.css">
    <link type="text/css" rel="stylesheet" href="css/uploadimagestyle.css">
</head>
<body>
<div class="main">
    <ul>
        <li><a href="index.html">NSTU</a></li>
        <li><a href="index.html">Home</a></li>
        <li class="active"><a href="registration.php">Registration</a></li>
        <li><a href="login.php">Choice Form</a></li>
        <li><a href="login.php">Student List</a></li>
        <li><a href="login.php">Result</a></li>
        <li><a href="login.php">Payment</a></li>
        <li class="last"><a href="">Login</a></li>
    </ul>
</div>
<div class="super_main">
    <div class="header_reg">
        <div class="hr_logo_reg">
            <img src="img/nstu_logo.png">
        </div>
        <div class="hr_text">
            <h1>Noakhali Science & Technology University</h1>
        </div>
    </div>

    <form method="POST" enctype="multipart/form-data">
        <fieldset>
            <legend>Registration(continued)</legend>
            <div class="fpem1">
                <h2 class="fpem1h">Upload Image</h2>
                <p>--------------------------------------------------------------------</p>
                <div class="fpe1">
                <label for="ai">Applicant Image:&emsp;&emsp;&emsp;</label><input id="ai" type="file" name="applicant_image" required="1">
                <br><br>
                <label for="sc">SSC certificate:&emsp;&emsp;&emsp;&ensp;&ensp;</label><input id="sc" type="file" name="scerti" required="1">
                <br><br>
                <label for="hc">HSC certificate:&emsp;&emsp;&emsp;&ensp;&nbsp;</label><input id="hc" type="file" name="hcerti" required="1"><br><br>
                <input type="submit" name="upload" value="Upload">
            </div>


        </legend>
    </fieldset>
</form>



</body>



</html>