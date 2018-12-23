<html>
<head>
    <link type="text/css" rel="stylesheet" href="css/headerstyle.css">
    <link type="text/css" rel="stylesheet" href="css/regstyle.css">

    <link rel="stylesheet" href="css/jquery-ui.css">
    <script src="css/jquery-1.12.4.js"></script>
    <script src="css/jquery-ui.js"></script>
    <script>
        $( function() {
            $( "#datepicker" ).datepicker();
        } );
    </script>
</head>


<?php
include 'db_connect.php';
session_start();
?>
<?php

if(isset($_POST['name'])&&isset($_POST['quota'])&&isset($_POST['birth_date'])&&isset($_POST['blood'])&&isset($_POST['age'])&&isset($_POST['religion'])&&isset($_POST['sex'])&&isset($_POST['scont'])&&isset($_POST['email'])&&isset($_POST['fname'])&&isset($_POST['mname'])&&isset($_POST['focup'])&&isset($_POST['fcont'])&&isset($_POST['padd'])&&isset($_POST['pradd'])&&isset($_POST['sdegree'])&&isset($_POST['sboard'])&&isset($_POST['sinst'])&&isset($_POST['sgrade'])&&isset($_POST['syear'])&&isset($_POST['hdegree'])&&isset($_POST['hboard'])&&isset($_POST['hinst'])&&isset($_POST['hgrade'])&&isset($_POST['hyear'])&&isset($_POST['psw1'])&&isset($_POST['psw2'])&&isset($_POST['unit']))
{

    $_POST['birth_date'] = date('Y-m-d', strtotime($_POST['birth_date']));
    $sql = "insert into student_info(s_name,quota,blood_group,birth_date,religion,sex,father_name,mother_name,father_occupation,father_contact,student_contact,present_address,permanent_address,email,ssc_degree,ssc_pass_year,ssc_board,ssc_institute,hsc_degree,hsc_pass_year,hsc_board,hsc_institute,password,unit,student_image,ssc_certificate,hsc_certificate)
                values ('$_POST[name]','$_POST[quota]','$_POST[blood]','$_POST[birth_date]','$_POST[religion]','$_POST[sex]','$_POST[fname]','$_POST[mname]','$_POST[focup]','$_POST[fcont]','$_POST[scont]','$_POST[padd]','$_POST[pradd]','$_POST[email]','$_POST[sgrade]','$_POST[syear]','$_POST[sboard]','$_POST[sinst]','$_POST[hdegree]','$_POST[hyear]','$_POST[hboard]','$_POST[hinst]','$_POST[psw1]','$_POST[unit]',";
               // '$_POST[applicant_image]','$_POST[scerti]','$_POST[hcerti]')";
    //if(mysqli_query($db_connect,$sql))
    //{
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['psw'] = $_POST['psw1'];
        $_SESSION['sql1'] = $sql;
        //while(1){
            //$random = rand(10000,100000);
            //$sql = "update student_info set secret_id = ".$random." where email = '".$_SESSION['email']."' and password = '".$_SESSION['psw']."'";
            //if(mysqli_query($db_connect,$sql)) {

               // break;
            //}
        //}
        header('location:uplodimage.php');
    //}
    //else
        //echo 'error';

}
?>




<body>
<div class="super_main">
    <div class="header_reg">
        <div class="hr_logo_reg">
            <img src="img/nstu_logo.png">
        </div>
        <div class="hr_text">
            <h1>Noakhali Science & Technology University</h1>
        </div>
    </div>
    <div class="main">
        <ul>
            <li><a href="index.html">NSTU</a></li>
            <li><a href="index.html">Home</a></li>
            <li class="active"><a href="registration.php">Registration</a></li>
            <li><a href="choiceformlogin.php">Choice Form</a></li>
            <li><a href="login.php">Student List</a></li>
            <li><a href="login.php">Result</a></li>
            <li><a href="login.php">Payment</a></li>
            <li><a href="login.php">Login</a></li>
        </ul>
    </div>
    <form method="POST" enctype="multipart/form-data">
        <fieldset>
            <legend>Enter required Information</legend>
            <div class="fpe">
                <h2 class="fpeh">Personal Information</h2>
                <p>-----------------------------------------</p>
                <div class="fpe1">
                    <label for="sn">Student Name<span class="required">*</span>:</label>&emsp;
                    <input type="text" name="name" id="sn" placeholder="Enter student name" required="1"
                           regexp="JSVAL_RX_ALPHA">
                    <br>
                    <br>
                    <label for="qt">Quota<span class="required">*</span>:</label>&nbsp;&emsp;&emsp;&emsp;&emsp;&nbsp;
                    <select name="quota" required="1" exclude=" " id="qt">

                        <?php
                            $sql = "select name from quota";
                            $res = mysqli_query($db_connect,$sql);
                            while ($row = mysqli_fetch_array($res,MYSQLI_ASSOC)){
                                echo '<option value="'.$row['name'].'">'.$row['name'].'</option>';
                            }
                        ?>
                    </select>
                    <br><br>
                    <label>Birth Date: &emsp;&emsp;&ensp;&nbsp;</label>
                    <input type="text" id="datepicker" required="1" name="birth_date">
                </div>

                <div class="fpe2">
                    <label for="bg">Blood Group<span class="required">*</span>:</label>&emsp;
                    <select name="blood" required="1" exclude=" " id="bg">
                        <?php
                        $sql = "select name from blood_group";
                        $res = mysqli_query($db_connect,$sql);
                        while ($row = mysqli_fetch_array($res,MYSQLI_ASSOC)){
                            echo '<option value="'.$row['name'].'">'.$row['name'].'</option>';
                        }
                        ?>
                    </select>
                    <br>
                    <br>
                    <label for="ag">Age<span class="required">*</span>:</label>&emsp;&emsp;&emsp;&emsp;&ensp;&ensp;&nbsp;
                    <input type="text" name="age" placeholder="Enter Age" id="ag" required="1"
                           regexp="JSVAL_RX_NUMERIC">
                    <br>
                    <br>
                    <label for="rlg">Religion<span class="required">*</span>:</label>&emsp;&emsp;&ensp;&nbsp;&ensp;
                    <select name="religion" required="1" exclude=" " id="rlg">
                        <?php
                        $sql = "select name from religion";
                        $res = mysqli_query($db_connect,$sql);
                        while ($row = mysqli_fetch_array($res,MYSQLI_ASSOC)){
                            echo '<option value="'.$row['name'].'">'.$row['name'].'</option>';
                        }
                        ?>
                    </select>
                    <br><br>
                    <!--<label for="flai">Image<span class="required">*</span>:</label>&emsp;&emsp;
                    <input id="flai" type="file" name="applicant_image" required="1">-->
                </div>

                <div class="fpe3">
                    <label for="gd">Sex<span class="required">*</span>:</label>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                    <select name="sex" required="1" exclude=" " id="gd">
                        <?php
                        $sql = "select name from sex";
                        $res = mysqli_query($db_connect,$sql);
                        while ($row = mysqli_fetch_array($res,MYSQLI_ASSOC)){
                            echo '<option value="'.$row['name'].'">'.$row['name'].'</option>';
                        }
                        ?>
                    </select>
                    <br>
                    <br>
                    <label for="smn">Mobile no<span class="required">*</span>:</label>&emsp;&emsp;&emsp;
                    <input type="text" name="scont" placeholder="Enter Student Mobile no." id="smn" required="1"
                           regexp="JSVAL_RX_MOB">
                    <br>
                    <br>
                    <label for="em">Email<span class="required">*</span>:</label>&emsp;&emsp;&emsp;&emsp;&emsp;
                    <input type="text" name="email" placeholder="Enter your Email" required="1" regexp="JSVAL_RX_EMAIL"
                           id="em">
                </div>
            </div>

            <div class="fpa">
                <h2 class="fpah">Parents Information</h2>
                <p>-----------------------------------------</p>
                <div class="fpa1">
                    <label for="fn">Father Name<span class="required">*</span>:</label>&emsp;&emsp;&emsp;&emsp;&emsp;
                    <input id="fn" type="text" name="fname" placeholder="Enter Father Name" required="1"
                           regexp="JSVAL_RX_ALPHA"><br><br>
                    <label for="mn">Mother Name<span class="required">*</span>:</label>&emsp;&emsp;&emsp;&emsp;&ensp;
                    <input type="text" id="mn" name="mname" placeholder="Enter Mother Name" required="1"
                           regexp="JSVAL_RX_ALPHA">
                </div>
                <div class="fpa2">
                    <label for="fo"> Ocupation<span class="required">*</span>:</label>&emsp;&emsp;&emsp;&emsp;&emsp;
                    <select name="focup" required="1" exclude=" " id="fo">
                        <option value=" ">--Select ocupation--</option>
                        <option value="JOb">Job</option>
                        <option value="Bussiness">Bussiness</option>
                        <option value="Other">Other</option>
                    </select>
                    <br><br>
                    <label for="fmn"> Contact<span class="required">*</span>:</label>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                    <input id="fmn" type="text" name="fcont" placeholder="Enter father Mobile no." required="1"
                           regexp="JSVAL_RX_MOB">
                </div>

            </div>

            <div class="fai">
                <h2 class="faih">Address Information</h2>
                <p>-----------------------------------------</p>
                <div class="fai1">
                    <label for="pra">Present Address<span class="required">*</span>:</label>&emsp;&emsp;&emsp;&ensp;
                    <input id="pra" type="text" name="padd" placeholder="Enter  whole address using comma" required="1"
                           regexp="JSVAL_RX_ADDRESS">
                </div>
                <div class="fai2">
                    <label for="pea">Permanent Address<span class="required">*</span>:</label>&emsp;&emsp;
                    <input id="pea" type="text" name="pradd" placeholder="Enter  whole address using comma" required="1"
                           regexp="JSVAL_RX_ADDRESS">
                </div>
            </div>


            <div class="feis">
                <h2 class="feish">Educational Information(SSC)</h2>
                <p>-----------------------------------------</p>
                <div class="feis1">
                    <label for="dgs">Degree<span class="required">*</span>:</label>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                    <select id="dgs" name="sdegree" required="1" exclude=" ">
                        <option value="SSC">SSC</option>
                        <option value="HSC">HSC</option>
                    </select>
                    <br>
                    <br>
                    <label for="brds">Board<span class="required">*</span>:</label>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;
                    <select id="brds" name="sboard" required="1" exclude=" ">
                        <?php
                        $sql = "select name from ssc_board";
                        $res = mysqli_query($db_connect,$sql);
                        while ($row = mysqli_fetch_array($res,MYSQLI_ASSOC)){
                            echo '<option value="'.$row['name'].'">'.$row['name'].'</option>';
                        }
                        ?>

                    </select>
                    <br>
                    <br>
                    <label for="ins"> Institute<span class="required">*</span>:</label>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;
                    <input id="ins" type="text" name="sinst" placeholder="Enter your school name" required="1"
                           regexp="JSVAL_RX_ALPHA"><br>
                </div>

                <div class="feis2">
                    <label for="gds">Grade<span class="required">*</span>:</label>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;&nbsp;
                    <input id="gds" type="text" name="sgrade" placeholder="0.00" required="1">
                    <br>
                    <br>
                    <label for="pys">Passing Year<span class="required">*</span>:</label>&emsp;&emsp;&emsp;&emsp;
                    <select id="pys" name="syear" required="1" exclude=" ">
                        <option value=" ">--Select year--</option>
                        <option value="2010">2010</option>
                        <option value="2011">2011</option>
                        <option value="2012">2012</option>
                        <option value="2013">2013</option>
                        <option value="2014">2014</option>
                        <option value="2015">2015</option>
                        <option value="2016">2016</option>
                        <option value="2017">2017</option>
                        <option value="2018">2018</option>
                        <option value="2019">2019</option>
                        <option value="2020">2020</option>
                        <option value="2021">2021</option>
                        <option value="2022">2022</option>
                        <option value="2023">2023</option>
                    </select>
                    <br>
                    <br>
                    <!--<label for="fls">Certificate<span class="required">*</span>:</label>&emsp;&emsp;&emsp;&emsp;
                    <input id="fls" type="file" name="scerti" required="1">-->
                </div>
            </div>

            <div class="feih">
                <h2 class="feihh">Educational Information(HSC)</h2>
                <p>-----------------------------------------</p>
                <div class="feih1">
                    <label for="dgh">Degree<span class="required">*</span>:</label>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                    <select id="dgh" name="hdegree" required="1" exclude=" ">
                        <option value="SSC">SSC</option>
                        <option value="HSC">HSC</option>
                    </select>
                    <br>
                    <br>
                    <label for="brdh">Board<span class="required">*</span>:</label>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;
                    <select id="brdh" name="hboard" required="1" exclude=" ">
                        <?php
                        $sql = "select name from hsc_board";
                        $res = mysqli_query($db_connect,$sql);
                        while ($row = mysqli_fetch_array($res,MYSQLI_ASSOC)){
                            echo '<option value="'.$row['name'].'">'.$row['name'].'</option>';
                        }
                        ?>

                    </select>
                    <br>
                    <br>
                    <label for="inh">Institute<span class="required">*</span>: </label>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;
                    <input id="inh" type="text" name="hinst" placeholder="Enter your college name" required="1"
                           regexp="JSVAL_RX_ALPHA"><br>
                </div>
                <div class="feih2">
                    <label for="gdh"> Grade<span class="required">*</span>: </label>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;&nbsp;
                    <input id="gdh" type="text" name="hgrade" placeholder="0.00" required="1">
                    <br>
                    <br>
                    <label for="pyh"> Passing Year<span class="required">*</span>:</label>&nbsp;&emsp;&emsp;&emsp;&emsp;
                    <select id="pyh" name="hyear" required="1" exclude=" ">
                        <option value=" ">--Select year--</option>
                        <option value="2010">2010</option>
                        <option value="2011">2011</option>
                        <option value="2012">2012</option>
                        <option value="2013">2013</option>
                        <option value="2014">2014</option>
                        <option value="2015">2015</option>
                        <option value="2016">2016</option>
                        <option value="2017">2017</option>
                        <option value="2018">2018</option>
                        <option value="2019">2019</option>
                        <option value="2020">2020</option>
                        <option value="2021">2021</option>
                        <option value="2022">2022</option>
                        <option value="2023">2023</option>
                    </select>
                    <br>
                    <br>
                    <!--<label for="cth"> Certificate<span class="required">*</span>:</label>&emsp;&emsp;&emsp;&emsp;
                    <input id="cth" type="file" name="hcerti" required="1">-->
                </div>
            </div>

            <div class="feih">
                <h2 class="feihh">Additional Information</h2>
                <p>-----------------------------------------</p>
                <div class="feih1">
                    <label for="psw1">Enter Password<span class="required">*</span>:</label>&emsp;&emsp;&emsp;&ensp;
                    <input id="psw1" type="password" name="psw1" placeholder="Enter  Password" required="1" onkeyup='check();'>
                    <br>
                    <br>
                    <label for="unit">Unit<span class="required">*</span>:</label>&nbsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;
                    <select name="unit" id="unit">
                        <?php
                        $sql = "select name from unit";
                        $res = mysqli_query($db_connect,$sql);
                        while ($row = mysqli_fetch_array($res,MYSQLI_ASSOC)){
                            echo '<option value="'.$row['name'].'">'.$row['name'].'</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="feih2">
                    <label for="psw2"> Retype Password<span class="required">*</span>:</label>&emsp;&emsp;&emsp;
                    <input id="psw2" type="password" name="psw2" placeholder="Retype Password" required="1" onkeyup='check();'>
                    <span id='message'></span>
                </div>
            </div>






            <div class="btn">
                <button class="button" name="submit"><span>Next Page</span></button>

            </div>
        </fieldset>
    </form>
    <script>
        var check = function() {
            if (document.getElementById('psw1').value ==
                document.getElementById('psw2').value) {
                document.getElementById('message').style.color = 'green';
                document.getElementById('message').innerHTML = 'matching';
            } else {
                document.getElementById('message').style.color = 'red';
                document.getElementById('message').innerHTML = 'not matching';
            }
        }
    </script>


</div>


</body>


</html>