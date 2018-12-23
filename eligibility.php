<html>
<head>
    <link type="text/css" rel="stylesheet" href="css/headerstyle.css">
    <link type="text/css" rel="stylesheet" href="css/loginstyle.css">
    <link rel="stylesheet" href="css/eligibilitystyle.css">
</head>
<?php
//session_start();
include "db_connect.php";
$sql1 = "select s_id from student_info where transaction is NOT TRUE ";
$res1 = mysqli_query($db_connect,$sql1);
$mRow = mysqli_num_rows($res1);
$count = 0;
$count2 = 0;
$idRow = array();
while($row2 = mysqli_fetch_array($res1)){
    $idRow[$count2] = $row2['s_id'];
    $count2++;
}
while($count<$mRow){
    if(isset($_POST["A".$count])&&isset($_POST["B".$count])){
        $sql3 = "select s_id from student_info where transaction is TRUE";
        $nRow = 0;
        $res4 = mysqli_query($db_connect,$sql3);
        $nRow = mysqli_num_rows($res4);
        $roll = 1000+$nRow;
        //$sql4 = "update st
        $sql = "update student_info set transaction = TRUE, admission_roll = ".$roll." where s_id = ".$idRow[$count];
        if(mysqli_query($db_connect,$sql)){
            //$sql3 = "select s_id from student_info where transaction is TRUE";
            //$nRow = 0;
            //$nRow = mysqli_num_rows($db_connect,$sql3);
            //$roll = 1000+$nRow;
            //$sql4 = "update student_info set admission_roll = ".$roll." where s_id = ".$idRow[$count];
            //mysqli_query($db_connect,$sql4);
            //if(mysqli_query($db_connect,$sql4)){
                //echo "success";
            //}
            //else echo "fail";
            header('location:eligibility.php');
        }

    }
    $count++;
}

?>
<body>
<div class="main">
    <ul>
        <li><a href="admissioncontrol.php">Admin</a></li>
        <li><a href="index.html">Home</a></li>
        <li><a href="createmerit.php">Set Merit</a></li>
        <li><a href="callstudent.php">Call Student</a></li>
        <li><a href="subjectdecision.php">Sub Decision</a></li>
        <li><a href="resultmanagement_A.php">Result</a></li>
        <li class="active"><a href="eligibility.php">Payment</a></li>
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
            <legend>Applicants Information</legend>
            <div class="applicant">
                <div class="ah">
                    <div class="ahi">
                        <p>Image</p>
                    </div>
                    <div class="ahn">
                        <p>Name</p>
                    </div>
                    <div class="ahe">
                        <p>Email</p>
                    </div>
                    <div class="ahrn">
                        <p>Reference</p>
                    </div>
                    <div class="ahp">
                        <p>Paid</p>
                    </div>
                    <div class="aha">
                        <p>Activity</p>
                    </div>
                </div>
                <!-- <div class="amb"> -->

                <?php
                $sql = "select s_id,student_image,s_name,email,secret_id from student_info where transaction is NOT TRUE ";
                $res = mysqli_query($db_connect, $sql);
                //$idRow = array();

                $count1 = 0;
                while ($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
                    //$idRow[$count] = $row['s_id'];
                    echo '<div class="amb">
                      <div class="ai">
                          <img src="data:image;base64,' . $row['student_image'] . ' ">
                      </div>
                      <div class="an">
                          <p>' . $row['s_name'] . '</p>
                      </div>
                      <div class="ae">
                          <p>' . $row['email'] . '</p>
                      </div>
                      <div class="arn">
                          <p>' . $row['secret_id'] . '</p>
                      </div>
                      <div class="ap">
                          <input type="checkbox" name="A' . $count1 . '" value="">
                      </div>
                      <div class="aa">
                          <input type="submit" name="B' . $count1 . '" value="OK">
                      </div>
                  </div>';
                    $count1++;
                }

                ?>
                <!--    <div class="ai">
                        <img src="img/494588-env.jpg">
                    </div>
                    <div class="an">
                        <p>Mahmud Foysal Sumon</p>
                    </div>
                    <div class="ae">
                        <p>mdghkjj@gmail.com</p>
                    </div>
                    <div class="arn">
                        <p>1234567</p>
                    </div>
                    <div class="ap">
                        <input type="checkbox" name="paid" value="">
                    </div>
                    <div class="aa">
                        <input type="submit" name="submit" value="OK">
                    </div>  -->
                <!--</div> -->

            </div>
        </fieldset>
    </form>
</div>
</body>
</html>