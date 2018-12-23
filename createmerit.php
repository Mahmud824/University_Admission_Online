<html>
<head>
    <link type="text/css" rel="stylesheet" href="css/headerstyle.css">
    <link type="text/css" rel="stylesheet" href="css/loginstyle.css">
    <link rel="stylesheet" href="css/createmeritstyle.css">
</head>
<?php

include "db_connect.php";
if(isset($_POST['submita'])){
    echo "Pressed A";
    $sql = "select result from student_info where unit = 'A' and result is true";
    $res = mysqli_query($db_connect,$sql);
    if(mysqli_num_rows($res)>0) {
        $data = array();
        $count = 0;
        while ($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
            $data[$count] = $row['result'];
            $count++;
        }

        $count = 0;
        $a = 0;
        $max = count($data);
        $sorted_data = array();
        $sorted_data_fi = array();
        $sorted_data = array_unique($data);
        while ($count < $max) {
            if (isset($sorted_data[$count])) {
                $sorted_data_fi[$a] = $sorted_data[$count];
                $a++;
                $count++;
            } else
                $count++;
        }


        //echo var_dump($sorted_data_fi);
        rsort($sorted_data_fi);
        //echo var_dump($sorted_data_fi);
        $count = 0;
        $maxx = count($sorted_data_fi);
        while ($count < $maxx) {
            $sorted_data_fi[$count] = (float)$sorted_data_fi[$count];
            $count++;
        }
        //echo var_dump($sorted_data_fi);
        $count = 0;
        $max = count($sorted_data_fi);
        while ($count < $max) {
            $merit = $count + 1;
            $sql = "update student_info set merit_position = " . $merit . " where result is true and unit = 'A' and result=" . $sorted_data_fi[$count];
            //echo "<br>".$sql."<br>";
            mysqli_query($db_connect, $sql);
            $count++;

        }
    }

    echo '<script>alert("Successfully Merit Position Assigned")</script>';
}

?>
<body>
<div class="main">
    <ul>
        <li><a href="admissioncontrol.php">Admin</a></li>
        <li><a href="index.html">Home</a></li>
        <li class="active"><a href="createmerit.php">Set Merit</a></li>
        <li><a href="callstudent.php">Call Student</a></li>
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
        <div class="head">
            <h1>Set Merit Position</h1>
            <p>-----------------------------------------------------------------------------------------------</p>
        </div>
        <div class="contentset">
            <div class="set1">
                <div class="b1">
                    <p>Unit A</p>
                    <input type="submit" name="submita" value="">

                </div>
                <div class="b2">
                    <p>Unit B</p>
                    <input type="submit" name="submitb" value="">

                </div>
            </div>

            <div class="set2">
                <div class="b3">
                    <p>Unit C</p>
                    <input type="submit" name="submitc" value="">

                </div>
                <div class="b4">
                    <p>Unit D</p>
                    <input type="submit" name="submitd" value="">

                </div>
            </div>
        </div>
    </form>
</div>
</body>
</html>