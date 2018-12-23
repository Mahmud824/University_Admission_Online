<html>
<head>
    <link type="text/css" rel="stylesheet" href="css/headerstyle.css">
    <link rel="stylesheet" href="css/subjectdecision.css">
</head>
<?php
include "db_connect.php";
    $sql0 = "select student_info.admission_roll from student_info join selected_student on student_info.admission_roll = selected_student.admission_roll where choiced is null";
    $res0 = mysqli_query($db_connect,$sql0);
    $mRow = mysqli_num_rows($res0);
    $adm_roll = array();
    $inc = 0;
    while($row0 = mysqli_fetch_array($res0,MYSQLI_ASSOC)){
        $adm_roll[$inc] = $row0['admission_roll'];
        $inc++;
    }
    $inc = 0;
    while($inc<$mRow){
        if(isset($_POST["A".$inc])&&isset($_POST["B".$inc])){
            $sql4 = "update selected_student set choiced = '".$_POST["A".$inc]."' where admission_roll = ".$adm_roll[$inc];
            //echo $sql;
            if(mysqli_query($db_connect,$sql4)){
                $sql5 = "select available_seat from department where name = '".$_POST["A".$inc]."'";
                $res5 = mysqli_query($db_connect,$sql5);
                $row5 = mysqli_fetch_array($res5,MYSQLI_ASSOC);
                    $seat = $row5['available_seat']-1;
                    $sql6 = "update department set available_seat = ".$seat." where name = '".$_POST["A".$inc]."'";
                    //echo $sql6;
                    if(mysqli_query($db_connect,$sql6)){
                        header('location:subjectdecision.php');
                    }
            }

        }
        $inc++;
    }

?>
<body>
<div class="main">
    <ul>
        <li><a href="admissioncontrol.php">Admin</a></li>
        <li><a href="index.html">Home</a></li>
        <li><a href="createmerit.php">Set Merit</a></li>
        <li><a href="callstudent.php">Call Student</a></li>
        <li class="active"><a href="subjectdecision.php">Sub Decision</a></li>
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

    <div class="ttl">
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
                        <div class="ahar">
                            <p>Admission Roll</p>
                        </div>
                        <div class="ahm">
                            <p>Merit Position</p>
                        </div>
                        <div class="ahu">
                            <p>Unit</p>
                        </div>
                        <div class="ahc1">
                            <p>1st Choice</p>
                        </div>
                        <div class="ahc2">
                            <p>2nd Choice</p>
                        </div>
                        <div class="ahd">
                            <p>Decision</p>
                        </div>
                        <div class="aha">
                            <p>Activity</p>
                        </div>
                    </div>

                    <?php
                    $sql = "select student_image,s_name,student_info.admission_roll,merit_position,unit,choice1,choice2 from student_info join selected_student on student_info.admission_roll = selected_student.admission_roll where choiced is null order by merit_position asc";
                    $res = mysqli_query($db_connect, $sql);

                    $count = 0;
                    while ($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) {

                        echo '<div class="amb">
                        <div class="ai">
                            <img src="data:image;base64,' . $row['student_image'] . ' ">
                        </div>
                        <div class="an">
                            <p>' . $row['s_name'] . '</p>
                        </div>
                        <div class="aar">
                            <p>' . $row['admission_roll'] . '</p>
                        </div>
                        <div class="am">
                            <p>' . $row['merit_position'] . '</p>
                        </div>
                        <div class="au">
                            <p>' . $row['unit'] . '</p>
                        </div>
                        <div class="ac1">
                            <p>' . $row['choice1'] . '</p>
                        </div>
                        <div class="ac2">
                            <p>' . $row['choice2'] . '</p>
                        </div>
                        <div class="ad">
                            <select name="A' . $count . '" size="1">';
                        $sql1 = "select name from department where unit_name = '" . $row['unit'] . "'";
                        $res1 = mysqli_query($db_connect, $sql1);
                        while ($row1 = mysqli_fetch_array($res1, MYSQLI_ASSOC)) {
                            echo '<option value="' . $row1['name'] . '">' . $row1['name'] . '</option>';
                        }
                        echo '</select></div><div class="aa">
                            <input type="submit" name="B' . $count . '" value="OK">
                        </div>
                    </div>';

                    $count++;
                    }

                    ?>

                    <!--       <div class="amb">
                               <div class="ai">
                                   <img src="img/494588-env.jpg">
                               </div>
                               <div class="an">
                                   <p>Mahmud Foysal Sumon</p>
                               </div>
                               <div class="aar">
                                   <p>12345678</p>
                               </div>
                               <div class="am">
                                   <p>123</p>
                               </div>
                               <div class="au">
                                   <p>A</p>
                               </div>
                               <div class="ac1">
                                   <p>CSTE</p>
                               </div>
                               <div class="ac2">
                                   <p>ICT</p>
                               </div>
                               <div class="ad">
                                   <select name="dcs" size="1">
                                       <option>CSTE</option>
                                       <option>ICT</option>
                                   </select>
                               </div>
                               <div class="aa">
                                   <input type="submit" name="submit" value="submit">
                               </div>
                           </div>  -->


                </div>
            </fieldset>
        </form>
        <div class="sidetable">
            <div class="dh">
                <div class="dhn">
                    <p>Name</p>
                </div>
                <div class="dhts">
                    <p>Available Seat</p>
                </div>
                <div class="dhas">
                    <p>Total Seat</p>
                </div>
                <div class="dhp">
                    <p>Payment Completed</p>
                </div>
            </div>

            <?php
            $sql2 = "select name,total_seat,available_seat from department";
            $res2 = mysqli_query($db_connect,$sql2);
            while($row2 = mysqli_fetch_array($res2,MYSQLI_ASSOC)){
                echo '<div class="dd">
                    <div class="dn">
                        <p>'.$row2['name'].'</p>
                    </div>
                    <div class="dts">
                        <p>'.$row2['available_seat'].'</p>
                    </div>
                    <div class="das">
                        <p>'.$row2['total_seat'].'</p>
                    </div>
                    <div class="dp">
                        <p>0</p>
                    </div>
                </div>';
            }

            ?>
            <!--    <div class="dd">
                    <div class="dn">
                        <p>CSTE</p>
                    </div>
                    <div class="dts">
                        <p>50</p>
                    </div>
                    <div class="das">
                        <p>45</p>
                    </div>
                    <div class="dp">
                        <p>10</p>
                    </div>
                </div>-->
        </div>
    </div>

</div>
</body>
</html>