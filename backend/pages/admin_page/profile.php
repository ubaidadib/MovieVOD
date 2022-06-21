<?php

class profile {

    public function display_account() {

        $connect = new connect();
        $conn = $connect->getConn();
        $user_id = $_SESSION['admin_id'];
        $user_query = "SELECT * from users where user_id='$user_id'";
        $result = $conn->query($user_query);
        $row = mysqli_fetch_array($result);
        if ($result->num_rows > 0) {
            ?>
            <!-- Breadcrumbs-->
            <ol class="breadcrumb" style="font-family: 'Exo', sans-serif;margin: 7px;">
                <li class="breadcrumb-item active">
                    <a href="index.php?p=home" style="text-decoration:none;color:black;">Home</a>
                </li>
                <li class="breadcrumb-item active "> <a href="index.php?p=profile" style="text-decoration:none;color:#007CF8;">General Information </a></li>
                <li class="breadcrumb-item active "> <a href="index.php?p=security" style="text-decoration:none;color:red;">Security</a></li>
            </ol><div class="container-fluid" style="background-image: linear-gradient(to left top, #d0e3ff, #dfe9ff, #ecf0ff, #f7f7ff, #ffffff);padding:15px;font-family: 'Exo', sans-serif;">
                <form method="POST" action="" enctype="multipart/form-data" style="padding:5px;">

                    <div class="row">
                        <div class="col ">
                            <label for="inputEmail4"><b>#ID </b></label>
                            <input type="text" value="<?= $row['user_id'] ?>" id="inputEmail4" 
                                   class="form-control" name="id" disabled  />

                        </div>
                        <div class="col">
                            <label for="inputEmail4"><b>Address </b></label>
                            <input type="text" value="<?= $row['address'] ?>" value="<?= $row['address'] ?>"
                                   id="inputEmail4"  value="" class="form-control" name="address"/>

                        </div>
                    </div>
                    <br><br>
                    <div class="row">
                        <div class="col ">
                            <label for="inputEmail4"><b>First name </b></label>
                            <input type="text" value="<?= $row['fname'] ?>"  class="form-control" name="fname"
                                   id="inputEmail4"/>

                        </div>
                        <div class="col">
                            <label for="inputEmail4"><b>Last name </b></label>
                            <input type="text" value="<?= $row['lname'] ?>"  class="form-control"
                                   id="inputEmail4"  name="lname"  />

                        </div>
                    </div>

                    <br><br>
                    <div class="row">
                        <div class="col ">
                            <label for="inputEmail4"><b>Phone number</b></label>
                            <input type="text" value="<?= $row['phonenumber'] ?>"id="inputEmail4"   class="form-control" name="phonenumber" />

                        </div>
                        <div class="col">

                            <button type="submit" class="btn btn-primary" name="update_profile" id="update_profile">UPDATE
                                <i class="fas fa-arrow-right"></i>
                            </button>


                        </div>
                    </div>

                </form></div>
            <?php
            $genInfo_update = filter_input(INPUT_POST, "update_profile");
            if (isset($genInfo_update)) {
                $admin = new profile();
                $admin->update_profile();
            }
        }
    }

    public function update_profile() {
        $connect = new connect();
        $conn = $connect->getConn();
        $user_id = $_SESSION["admin_id"];
        $f_name = filter_input(INPUT_POST, 'fname');
        $l_name = filter_input(INPUT_POST, 'lname');
        $user_address = filter_input(INPUT_POST, 'address');
        $phone_number = filter_input(INPUT_POST, 'phonenumber');

        $query = "UPDATE `users` SET `fname` ='" . $f_name . "', `lname` = '" . $l_name . "',`phonenumber`='" . $_POST['phone_number'] . "',`address`='" . $user_address . "' WHERE `user_id`='" . $user_id . "'";
        $result = $conn->query($query);
        if ($result) {
            echo "<script>
                Swal.fire('Good job!','Your General Information is updated','success')</script>";
        } else {
            echo "<script>
               Swal.fire({ type: 'error',title: 'Oops...',text: 'Something went wrong!'})</script>";
        }
    }

    public function display_security() {
        $connect = new connect();
        $conn = $connect->getConn();
        $user_id = $_SESSION['admin_id'];
        $user_query = "SELECT * from users where user_id='$user_id'";
        $result = $conn->query($user_query);
        $row = mysqli_fetch_array($result);
        if ($result->num_rows > 0) {
            ?>
            <!-- Breadcrumbs-->
            <ol class="breadcrumb" style="font-family: 'Exo', sans-serif;margin: 7px;">
                <li class="breadcrumb-item active">
                    <a href="index.php?p=home" style="text-decoration:none;color:black;">Home</a>
                </li>
                <li class="breadcrumb-item active "> <a href="index.php?p=profile" style="text-decoration:none;color:#007CF8;">General Information </a></li>
                <li class="breadcrumb-item active "> <a href="index.php?p=security" style="text-decoration:none;color:#ff2626;">Security</a></li>
            </ol>
            <div class="container-fluid">

                <form method="POST" action="">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Username</label>
                            <input type="text" value="<?= $row['username'] ?>" class="form-control" name="username" disabled id="inputEmail4"/>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Email</label>
                            <input type="text" value="<?= $row['email'] ?>" class="form-control" name="email" id="inputEmail4"/>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">New Username</label>
                            <input type="text" value="<?= $row['username'] ?>"  class="form-control" name="new_username" id="inputEmail4"  />
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Old Password</label>
                            <input type="text" value="<?= $row['password'] ?>" class="form-control" name="pass0" disabled id="inputEmail4"/>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">New Password</label>
                            <input type="password" placeholder="********************" class="form-control" name="pass1" id="inputEmail4"  />
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Confirmed Password</label>
                            <input type="password" placeholder="********************" class="form-control" name="pass2`"  id="inputEmail4"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col ">
                        </div>
                        <div class="col">
                            <button type="submit" class="btn btn-primary float-right" name="update_security" id="update_security">UPDATE
                                <i class="fas fa-arrow-right"></i>
                            </button>

                        </div>
                    </div>


            </div>
            </div>
            </form>
            </div><?php
            $admin_update = filter_input(INPUT_POST, "update_security");
            if (isset($admin_update)) {
                $admin = new profile();
                $admin->update_security();
            }
        }
    }

    public function update_security() {
        $connect = new connect();
        $conn = $connect->getConn();
        $user_id = $_SESSION["admin_id"];
        $email = filter_input(INPUT_POST, 'email');
        $new_username = filter_input(INPUT_POST, 'new_username');
        $new_pass = filter_input(INPUT_POST, 'pass1');
        $new_pass_conf = filter_input(INPUT_POST, 'pass2');
        if (strcmp($new_pass, $new_pass_conf)) {
            $query = "UPDATE `users` SET `username`='" . $new_username . "',`email`='" . $email . "',`password`='" . $new_pass . "'  WHERE `user_id`='" . $user_id . "'";
            $result = $conn->query($query);

            if ($result) {
                echo "<script>
                Swal.fire('Good job!','Your Security Informations is updated','success')</script>";
                // $header=new header_process();
                //$header->header("index.php?p=security");
            } else {
                echo "<script>
               Swal.fire({ type: 'error',title: 'Oops...',text: 'Something went wrong!'})</script>";
            }
        } else {
            echo "<script>
               Swal.fire({ type: 'error',title: 'Oops...',text: 'Passwords not matched!'})</script>";
        }
    }


    }
    