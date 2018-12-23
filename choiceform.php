<html>
<head>
    <link type="text/css" rel="stylesheet" href="css/headerstyle.css">
    <link type="text/css" rel="stylesheet" href="css/loginstyle.css">
    <link rel="stylesheet" href="css/choiceformstyle.css">
</head>

<?php
include "db_connect.php";
session_start();
if(isset($_POST['submit'])&&isset($_POST['ch1'])&&isset($_POST['ch2'])){
    $sql = "insert into selected_student (admission_roll,choice1,choice2)
            values (".$_SESSION['ar'].",'".$_POST['ch1']."','".$_POST['ch2']."')";
            if(mysqli_query($db_connect,$sql)){
                echo '<script>alert("Successfully Registered")</script>';
            }
}
$sql = "select s_name,merit_position,student_image from student_info where admission_roll = ".$_SESSION['ar'];
$res = mysqli_query($db_connect,$sql);
$row = mysqli_fetch_array($res,MYSQLI_ASSOC)
?>

<body>
<div class="main">
    <ul>
        <li><a href="index.html">NSTU</a></li>
        <li><a href="index.html">Home</a></li>
        <li><a href="registration.html">Registration</a></li>
        <li><a href="">Choice Form</a></li>
        <li><a href="">Student List</a></li>
        <li><a href="">Result</a></li>
        <li><a href="">Payment</a></li>
        <li class="active last"><a href="">Login</a></li>
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
            <legend>Subject Choice Form</legend>
            <div class="choice_form">
                <p>Choice Form For A Unit Student</p>
                <p>----------------------------------</p>
                <br>
                <label for="ch1">Subject Choice 1</label>
                <select id="ch1"name="ch1">
                    <?php
                        $sql1 = "select name from department where unit_name = '".$_SESSION['unit']."'";
                        $res1 = mysqli_query($db_connect,$sql1);
                        while($row1 = mysqli_fetch_array($res1,MYSQLI_ASSOC)){
                            echo '<option value="'.$row1['name'].'">'.$row1['name'].'</option>';
                        }
                    ?>
                   <!-- <option>CSTE</option>
                    <option>ICT</option> -->
                </select>
                <br><br>
                <label for="ch2">Subject Choice 2</label>
                <select id="ch2"name="ch2">
                    <?php
                    $sql1 = "select name from department where unit_name = '".$_SESSION['unit']."'";
                    $res1 = mysqli_query($db_connect,$sql1);
                    while($row1 = mysqli_fetch_array($res1,MYSQLI_ASSOC)){
                        echo '<option value="'.$row1['name'].'">'.$row1['name'].'</option>';
                    }
                    ?>
                </select>
                <br><br>
                <input type="submit" name="submit" value="submit">
            </div>
            <div class="std_inform">
                <?php
                    echo '<img src="data:image;base64,'.$row['student_image'].' ">
                    <br><br>
                    <p>Name: '.$row['s_name'].'</p>
                    <p>Admission Roll: '.$_SESSION['ar'].'</p>
                    <p>Merit Position: '.$row['merit_position'].'</p>
                    <p>Unit: '.$_SESSION['unit'].'</p>';
                ?>


                <!--<p>Name: Md. Rezaur Rahman
                <p>Admission Roll: 1234567</p>
                <p>Merit Position: 120</p>
                <p>Unit: A</p>-->
            </div>
        </fieldset>
    </form>
</div>
</body>
</html>