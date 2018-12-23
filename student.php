<html>
<head>
    <link type="text/css" rel="stylesheet" href="css/headerstyle.css">
    <link type="text/css" rel="stylesheet" href="css/loginstyle.css">
    <link rel="stylesheet" href="css/choicedformstyle.css">
</head>
<body>
<div class="main">
    <ul>
        <li><a href="index.html">NSTU</a></li>
        <li><a href="index.html">Home</a></li>
        <li><a href="registration.php">Registration</a></li>
        <li><a href="choiceformlogin.php">Choice Form</a></li>
        <li class="active"><a href="login.php">Student List</a></li>
        <li><a href="login.php">Result</a></li>
        <li><a href="login.php">Payment</a></li>
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
    <div class="std_h">
        <h2>Thanks For Submission.....</h2>
        <h1>Your Informations</h1>
    </div>
    <?php
    session_start();
    include 'db_connect.php';
    if(isset($_SESSION['email'])&&isset($_SESSION['psw']))
    {
    $sql = "select s_name,email,unit,secret_id,student_image,result,merit_position,admission_roll from student_info where email = '".$_SESSION['email']."' and password = '".$_SESSION['psw']."'";
    $res = mysqli_query($db_connect,$sql);
    $row = mysqli_fetch_array($res,MYSQLI_ASSOC);
    }

    ?>
    <div class="std_img">
        <?php echo '<img src="data:image;base64,'.$row['student_image'].' ">';?>
    </div>
    <div class="std_inform">

        <p>Name &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;: <?php echo $row['s_name'];?></p>
        <p>Email &emsp;&nbsp;&emsp;&emsp;&emsp;&emsp;&ensp;&nbsp;: <?php echo $row['email'];?></p>
        <p>Unit &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;: <?php echo $row['unit'];?></p>
        <p>Reference Number &ensp;&nbsp;: <?php echo $row['secret_id'];?></p>
        <p>Admission Roll &emsp;&emsp;: <?php if($row['admission_roll']) {echo $row['admission_roll'];} else {echo "N/A(Send Money By Ref.)";}?></p>
        <p>Score &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;: <?php if($row['result']) {echo $row['result'];} else {echo "N/A";}?></p>
        <p>Merit Position &emsp;&emsp;&ensp;: <?php if($row['merit_position']) {echo $row['merit_position'];} else {echo "N/A";}?></p>
    </div>
</div>
</body>
</html>