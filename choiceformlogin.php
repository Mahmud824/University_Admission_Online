<html>
<head>
    <link type="text/css" rel="stylesheet" href="css/headerstyle.css">
    <link type="text/css" rel="stylesheet" href="css/loginstyle.css">
    <link rel="stylesheet" href="css/choiceformloginstyle.css">
</head>
<?php
include "db_connect.php";
session_start();
if(isset($_POST['submit'])&&isset($_POST['ar'])&&isset($_POST['password'])&&isset($_POST['unit'])){
    $sql = "select merit_position from student_info where admission_roll = ".$_POST['ar']." and unit = '".$_POST['unit']."'";
    //echo $sql."<br>";
    $sql2 = "select min,max from merit_call where unit_name = '".$_POST['unit']."' order by id asc";
    //echo $sql2."<br>";
    $res2 = mysqli_query($db_connect,$sql2);
    //$row2 = mysqli_fetch_array($res2,MYSQLI_ASSOC);
    $data = array();
    while($row2 = mysqli_fetch_array($res2,MYSQLI_ASSOC)){
        $data[0]=$row2['min'];
        $data[1]=$row2['max'];
    }
    //$data[0] = 1;
    //$data[1] = 1;
    echo "<br>".$data[0]."<br>".$data[1];
    $res = mysqli_query($db_connect,$sql);
    if($row = mysqli_fetch_array($res,MYSQLI_ASSOC)){
        if(($row['merit_position']<=$data[1])&&($row['merit_position']>=$data[0])){
            $_SESSION['ar'] = $_POST['ar'];
            $_SESSION['unit'] = $_POST['unit'];
            header('location:choiceform.php');
        }
        else
            echo "Not eligible";
    }
    echo "No Position";
}
?>
<body>
<div class="main">
    <ul>
        <li><a href="admissioncontrol.php">Admin</a></li>
        <li><a href="index.html">Home</a></li>
        <li><a href="registration.php">Registration</a></li>
        <li class="active"><a href="choiceformlogin.php">Choice Form</a></li>
        <li><a href="login.php">Student List</a></li>
        <li><a href="login.php">Result</a></li>
        <li><a href="login.php">Payment</a></li>
        <li class="last"><a href="login.php">Login</a></li>
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

    <form method="POST">
        <fieldset>
            <legend>Login for selected student</legend>
            <div class="setresult">
                <label>Admission Roll:</label>&emsp;&emsp;&emsp;
                <input type="number" id="ar" name="ar" value="">
                <br>
                <br>
                <label>Password:</label>&emsp;&emsp;&emsp;&emsp;&ensp;&nbsp;&ensp;&nbsp;
                <input type="text" id="password" name="password" value="">
                <br>
                <br>
                <label>Unit:&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</label>
                <select name="unit">
                    <?php
                    $sql = "select name from unit";
                    $res = mysqli_query($db_connect,$sql);
                    while ($row = mysqli_fetch_array($res,MYSQLI_ASSOC)){
                        echo '<option value="'.$row['name'].'">'.$row['name'].'</option>';
                    }
                    ?>
                </select>
                <br><br>
                <input type="submit" name="submit" value="Login">
            </div>
        </fieldset>
    </form>
</div>
</body>
</html>