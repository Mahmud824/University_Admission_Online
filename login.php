<html>
<head>
    <link type="text/css" rel="stylesheet" href="css/headerstyle.css">
    <link type="text/css" rel="stylesheet" href="css/loginstyle.css">
</head>
<body>
<div class="main">
    <ul>
        <li><a href="index.html">NSTU</a></li>
        <li><a href="index.html">Home</a></li>
        <li><a href="registration.php">Registration</a></li>
        <li><a href="choiceformlogin.php">Choice Form</a></li>
        <li><a href="login.php">Student List</a></li>
        <li><a href="login.php">Result</a></li>
        <li><a href="login.php">Payment</a></li>
        <li class="active last"><a href="login.php">Login</a></li>
    </ul>
</div>

<?php
include "db_connect.php";
session_start();
if(isset($_POST['submits'])&&isset($_POST['semail'])&&isset($_POST['spassword'])){
    $_SESSION['email'] = $_POST['semail'];
    $_SESSION['psw'] = $_POST['spassword'];
    $sql = "select s_id from student_info where email = '".$_SESSION['email']."' and password = '".$_SESSION['psw']."'";
    $res = mysqli_query($db_connect,$sql);
    if(mysqli_num_rows($res)>0){
        header('location:student.php');
    }
}
if(isset($_POST['submita'])&&isset($_POST['aemail'])&&isset($_POST['apassword'])){
    $_SESSION['email'] = $_POST['aemail'];
    $_SESSION['psw'] = $_POST['apassword'];
    $sql = "select id from admin where email = '".$_SESSION['email']."' and password = '".$_SESSION['psw']."'";
    $res = mysqli_query($db_connect,$sql);
    if(mysqli_num_rows($res)>0){
        header('location:admincontrol.php');
    }
}

?>

<div class="super_main">
    <div class="header_reg">
        <div class="hr_logo_reg">
            <img src="img/nstu_logo.png">
        </div>
        <div class="hr_text">
            <h1>Noakhali Science & Technology University</h1>
        </div>
    </div>

    <form method="POST">
        <fieldset>
            <legend>Login</legend>
            <div class="fpem1">
                <h2 class="fpem1h">Login for student</h2>
                <p>--------------------------------------------------------------------</p>
                <div class="fpe1">
                    <label for="ar">Student Email<span class="required">*</span>:&ensp;</label>&emsp;&emsp;&emsp;&emsp;&ensp;
                    <input id="ar" type="text" name="semail" placeholder="Enter Email"
                           regexp="JSVAL_RX_NUMERIC">
                    <br>
                    <br>
                    <label for="pw">Password<span class="required">*</span>:</label>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                    <input id="pw" type="text" name="spassword" placeholder="Enter Password here"
                           regexp="JSVAL_RX_ALPHA">
                    <br>
                    <br>
                    <div class="btn">
                        <input name="submits" type="submit" value="Login">
                    </div>
                </div>

            </div>

            <div class="fpem2">
                <h2 class="fpem2h">Login for Admin</h2>
                <p>--------------------------------------------------------------------</p>
                <div class="fpe1">
                    <label for="ar">Admin Email<span class="required">*</span>:&ensp;</label>&emsp;&emsp;&emsp;&emsp;&ensp;
                    <input id="ar" type="text" name="aemail" placeholder="Enter Admin Email"
                           regexp="JSVAL_RX_NUMERIC">
                    <br>
                    <br>
                    <label for="pw">Password<span class="required">*</span>:</label>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                    <input id="pw" type="text" name="apassword" placeholder="Enter Password here"
                           regexp="JSVAL_RX_ALPHA">
                    <br>
                    <br>
                    <div class="btn">
                        <input name="submita" type="submit" value="Login">
                    </div>
                </div>

            </div>


            </legend>
        </fieldset>
    </form>


</body>


</html>