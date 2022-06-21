

<?php

class users {

   
  

    function display_account() {

        $connect = new connect();
        $conn = $connect->getConn();
        $user_id = $_SESSION['user_id'];
        $user_query = "SELECT * from users where user_id='" . $user_id . "'";
        $result = $conn->query($user_query);
        $row = mysqli_fetch_array($result);
        if ($result->num_rows > 0) {
            ?>

            <div class="container" style="background-image: linear-gradient(to left top, #d0e3ff, #dfe9ff, #ecf0ff, #f7f7ff, #ffffff);padding:15px;font-family: 'Exo', sans-serif;">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#generalInfo" >General Information</a></li>
                    <li><a data-toggle="tab" href="#security">Security & Password</a></li>
                </ul>
                <br><br>
                <div class="tab-content">
                    <div id="generalInfo" class="tab-pane fade in active">
                        <form method="POST" action="#" class=""  enctype="multipart/form-data">
                            <div class="table-responsive">
                                <table class="table" >
                                    <tr>
                                        <th>
            <?php
            $connect = new connect();
            $conn = $connect->getConn();
            $id = $_SESSION['user_id'];
            $query = "SELECT * FROM users where user_id='" . $id . "'";
            $result = $conn->query($query);
            if ($result->num_rows > 0) {
                $row = mysqli_fetch_array($result);
                $profile = $row['user_profile'];
            }
            if ($profile != null) {
                echo "<img src=\"..\backend\image\uploadedProfiles/" . $profile . "\" class=\"img-circle\" alt=\"\" style=\"height: 200px;\" name=\"output\">";
            } else {
                echo "<img src=\"..\backend\image\uploadedProfiles\profile.jpg\" class=\"img-circle\" alt=\"Profile\" style=\"height: 30px;\" name=\"output\">";
            }
            ?>
                                        </th>
                                        <td></td></tr>
                                    <tr>
                                        <th>#ID</th>
                                        <th>Address</th>
                                    </tr>
                                    <tr>
                                        <td><input  type="text" value="<?= $row['user_id'] ?>" class="form-control" name="id" disabled style="border: 2px solid #ddd;"/></td>
                                        <td><input  type="text" value="<?= $row['address'] ?>" class="form-control" name="address"  style="border: 2px solid #ddd;" /></td>
                                    </tr>
                                    <tr>
                                        <th>First name </th>
                                        <th>Last name </th>
                                    </tr>
                                    <tr>
                                        <td><input type="text" value="<?= $row['fname'] ?>" class="form-control" name="fname"  style="border: 2px solid #ddd;" /></td>
                                        <td><input type="text" value="<?= $row['lname'] ?>" class="form-control" name="lname"  style="border: 2px solid #ddd;" /></td>
                                    </tr>

                                    <tr>
                                        <th>Birthdate </th>
                                        <th>Phone number  </th>
                                    </tr>
                                    <tr>
                                        <td><input type="date" value="<?= $row['birthdate'] ?>" class="form-control" name="birthdate" style="border: 2px solid #ddd;" /></td>
                                        <td><input type="text" value="<?= $row['phone_number'] ?>" class="form-control" name="phone_number" style="border: 2px solid #ddd;"  /></td>
                                    </tr>

                                    <tr>
                                        <th>Gender </th>
                                        <th>Profile photo  </th>
                                    </tr>
                                    <tr>
                                        <td><select name="admin_gender" id="" class="form-control" required="required" style="border: 2px solid #ddd;" >
                                                <option value="" disabled selected>Gender</option>
                                                <option value="male">Male</option>
                                                <option value="femal">Female</option>
                                                <option value="other">Other</option>
                                            </select></td>
                                        <td><label for="uploadedImage" class="btn btn-danger">Upload  Image</label>
                                            <input type="file" name="profileImages" id="uploadedImage" multiple="multiple" accept="image/*"  onchange="loadFile(event)" style="display: none" />&nbsp;&nbsp;&nbsp;
                                            <img id="output" width="250" /></td>
                                    </tr>
                                    <br>
                                    <tr>
                                        <td></td>
                                        <td colspan="2">
                                            <button type="submit" class="btn btn-primary" name="update_profile" id="update_profile">UPDATE
                                                <i class="fa fa-arrow-right"></i>	
                                        </td>
                                    </tr>
                                </table>


                            </div>
                    </div>
                    </form>

                    <div id="security" class="tab-pane fade  ">
                        <form method="POST" action="#" class="" >
                            <div class="table-responsive">
                                <table class="table" >
                                    <tr>
                                        <th>Current Username </th>
                                        <th>Private Email </th>
                                    </tr>
                                    <tr>
                                        <td><input type="text" value="<?= $row['username'] ?>" class="form-control" name="username" disabled  style="border: 2px solid #ddd;" /></td>
                                        <td><input type="email" value="<?= $row['email'] ?>" class="form-control" name="email"  style="border: 2px solid #ddd;" /></td>
                                    </tr>
                                    <tr>
                                        <th>New  Username </th>
                                        <th>Old Password </th>
                                    </tr>
                                    <tr>
                                        <td><input type="text" value="<?= $row['username'] ?>"  class="form-control" name="new_username"  style="border: 2px solid #ddd;" /></td>
                                        <td><input type="password" value="<?= $row['password'] ?>" class="form-control" name="pass0" disabled style="border: 2px solid #ddd;" /></td>
                                    </tr>

                                    <tr>
                                        <th>New Password  </th>
                                        <th>Confirm New Password  </th>
                                    </tr>
                                    <tr>
                                        <td><input type="password" value="<?= $row['password'] ?>" class="form-control" name="pass1" style="border: 2px solid #ddd;" /></td>
                                        <td><input type="password" value="<?= $row['password'] ?>" class="form-control" name="pass2`" style="border: 2px solid #ddd;" /></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td><button type="submit" class="btn btn-primary" name="update_security" id="update_security">UPDATE
                                                <i class="fas fa-arrow-right"></td>
                                                    </tr>
                                                    </table>
                                                    </div>
                                                    </div>
                                                    </form></div></div>

            <?php
            $genInfo_update = filter_input(INPUT_POST, "update_profile");
            $secInfo_update = filter_input(INPUT_POST, "update_security");
            if (isset($genInfo_update)) {
                $user = new users();
                $user->update_profile();
            }
            if (isset($secInfo_update)) {
                $admin = new users();
                $admin->update_security();
            }
        }
    }

    public function update_profile() {
        $connect = new connect();
        $conn = $connect->getConn();
        $user_id = $_SESSION["user_id"];
        $f_name = filter_input(INPUT_POST, 'fname');
        $l_name = filter_input(INPUT_POST, 'lname');
        $user_address = filter_input(INPUT_POST, 'address');
        $user_gender = $_POST['admin_gender'];
        //uploaded file info's
        $n = $_FILES['profileImages']['name'];
        $s = $_FILES['profileImages']['size'];
        $t = $_FILES['profileImages']['tmp_name'];
        $e = $_FILES['profileImages']['error'];
        $ty = $_FILES['profileImages']['type'];
        move_uploaded_file($t, "../frontend/images/profiles/$user_id" . "_" . $n);
        $path = "$user_id" . "_" . $n;
        $query = "UPDATE `users` SET `fname` ='" . $f_name . "', `lname` = '" . $l_name . "',`phone_number`='" . $_POST['phone_number'] . "',`address`='" . $user_address . "',`user_profile`='" . $path . "',`gender`='" . $user_gender . "',`birthdate`='" . $_POST['birthdate'] . "'  WHERE `user_id`='" . $user_id . "'";
        $result = $conn->query($query);
        $header = new header_process();
        $header->header("index.php?p=account");
    }

    public function update_security() {
        $connect = new connect();
        $conn = $connect->getConn();
        $user_id = $_SESSION["user_id"];
        $email = filter_input(INPUT_POST, 'email');
        $new_username = filter_input(INPUT_POST, 'new_username');
        $new_pass = filter_input(INPUT_POST, 'pass1');
        $new_pass_conf = filter_input(INPUT_POST, 'pass2');
        $query = "UPDATE `users` SET `username`='" . $new_username . "',`email`='" . $email . "',`password`='" . $new_pass . "'  WHERE `user_id`='" . $user_id . "'";
        $result = $conn->query($query);
        $header = new header_process();
        $header->header("index.php?p=account");
    }

    public function display_image_profile() {

        $connect = new connect();
        $conn = $connect->getConn();
        $id = $_SESSION['user_id'];
        $query = "SELECT * FROM users where user_id='" . $id . "'";
        $result = $conn->query($query);
        if ($result->num_rows > 0) {
            $row = mysqli_fetch_array($result);
            $profile = $row['user_profile'];
        }
        if ($profile != null) {
            echo "<img src=\"..\frontend\images\profiles/" . $profile . "\" class=\"img-circle\" alt=\"\" style=\"height: 200px; width: 200px;\" name=\"output\">";
        } else {
            echo "<img src=\"..\frontend\images\profiles\profile.jpg\" class=\"img-circle\" alt=\"Profile\" style=\"height: 60px;\" name=\"output\">";
        }
    }

    public function logout() {
        $header_process = new header_process();
        session_unset();
        // destroy the session 
        session_destroy();
        $header_process->header("index.php");
    }

// escape value from form
    public function esc(String $value) {
        $connect = new connect();
        $conn = $connect->getConn();
        $val = trim($value); // remove empty space sorrounding string
        $val = mysqli_real_escape_string($conn, $value);
        return $val;
    }

}
