<html>
<head>
    <link type="text/css" rel="stylesheet" href="css/headerstyle.css">
    <link type="text/css" rel="stylesheet" href="css/loginstyle.css">
    <link rel="stylesheet" href="css/callstudentstyle.css">
</head>
<?php
include "db_connect.php";
?>

<body>
<div class="main">
    <ul>
        <li><a href="admissioncontrol.php">Admin</a></li>
        <li><a href="index.html">Home</a></li>
        <li><a href="createmerit.php">Set Merit</a></li>
        <li class="active"><a href="callstudent.php">Call Student</a></li>
        <li><a href="subjectdecision.php">Sub Decision</a></li>
        <li><a href="resultmanagement_A.php">Result</a></li>
        <li><a href="eligibility.php">Payment</a></li>
        <li class="last"><a href="login.php">Log Out</a></li>
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
            <div class="mainform">
                <legend>Set Merit Position Limit For Admission</legend>
                <p>-----------------------------------------------------------------------------------------------</p>
                <label>Unit&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;:&emsp;</label>
                <select name="unit">
                    <?php
                    $sql = "select name from unit";
                    $res = mysqli_query($db_connect,$sql);
                    while ($row = mysqli_fetch_array($res,MYSQLI_ASSOC)){
                        echo '<option value="'.$row['name'].'">'.$row['name'].'</option>';
                    }
                    ?>
                    <option></option>
                </select>
                <br><br>
                <label>Minimum Merit Position&nbsp;&emsp;:&emsp;</label>
                <input type="number" name="min">
                <br><br>
                <label>Maximum Merit Position&emsp;:&emsp;</label>
                <input type="number" name="max">
                <br><br>
                <input type="submit" value="Set" name="set">
            </div>
        </fieldset>
    </form>
    <?php
    if(isset($_POST['set'])&&isset($_POST['unit'])&&isset($_POST['min'])&&isset($_POST['max'])){
        $sql = "insert into merit_call (min,max,unit_name) values (".$_POST['min'].",".$_POST['max'].",'".$_POST['unit']."')";
        if(mysqli_query($db_connect,$sql)){
            echo '<script>alert("Successfully Registered")</script>';

        }
        else
            echo '<script>alert("Failed")</script>';
    }

    ?>
</div>
</body>
</html>