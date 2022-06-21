<?php

class login {

    public function display_login() {
        ?>  <section class="breadcrumb-section set-bg" data-setbg="img/bg-1.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="breadcrumb-text">
                            <div class="bt-option">
                                <a href="index.php?p=home">Home</a>
                                <span>Sign in </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Breadcrumb Section End -->

        <!-- Contact Section Begin -->
        <section class="contact-section spad">
            <div class="container">
                <div class="row">
                    <div class="col-4"></div>
                    <div class="col-4">
                        <div class="container">
                            <div class="row">
                                <p style="font-size: 24px;">Login Here:</p>
                                <div class="leave-comment">
                                    <form action="#" method="POST">
                                        <input type="text" placeholder="Username" name="username" id="username">
                                        <input type="password" placeholder="Password" name="password" id="password">
                                        <button type="submit" name="user_login">Sign in</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-4"></div>
                    </div>

                </div>
        </section>
        <!-- Contact Section End -->
        <?php

        $user_login = filter_input(INPUT_POST, "user_login");
        $user_register = filter_input(INPUT_POST, "user_register");
        if (isset($user_login)) {
            $login = new login();
            $login->Login_page();
        }
    }

        public function Login_page() {
        $connect = new connect();
        $conn = $connect->getConn();
        $user_name = filter_input(INPUT_POST, 'username');
        $user_password = filter_input(INPUT_POST, 'password');
        $user_query = "SELECT * FROM users WHERE username='" . $user_name . "' AND password='" . $user_password . "' LIMIT 1";
        $result = $conn->query($user_query);
        if ($result->num_rows == 1) {
            while ($row = mysqli_fetch_array($result)) {
                $user_id = $row['user_id'];
                $user_role = $row['role'];
               // $user_profile = $row['user_profile'];
                $fullname = ucwords($row['fname']);
            }

            switch ($user_role) {
                case '0':
                    session_start();
                    $_SESSION['isUserloggedin'] = 1;
                    $_SESSION["fullname"] = $fullname;
                    $_SESSION["user_id"] = $user_id;
                    $header_process = new header_process();
                    $header_process->header("index.php?p=home");
                    break;
                case '1':
                    session_start();
                    $_SESSION["isAdminloggedin"] = 1;
                    $_SESSION["admin_name"] = $fullname;
                    $_SESSION["admin_id"] = $user_id;
                    //$_SESSION["profile_photo_path"] = $user_profile;
                    $header_process = new header_process();
                    $header_process->header("../backend/index.php");
                    break;

                default:
                    break;
            }
        } else {
            echo "<script>
               Swal.fire({ type: 'error',title: 'Oops...',text: 'Username or Password is Incorrect.'})</script>";
        }
    }
}
?>
