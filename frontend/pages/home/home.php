<?php

class home {

    public function display_home() {
        $connect = new connect();
        $conn = $connect->getConn();
        ?>

        

        <!-- Header Slider Section Begin -->
        <section class="hero-section">
            <div class="hs-slider owl-carousel">
                <div class="hs-item set-bg" data-setbg="img/header.jpg">
                </div>
                <div class="hs-item set-bg" data-setbg="img/header2.jpg">
                </div>
            </div>
        </section>
        <!-- Header Slider Section End -->
        <!-- ChoseUs Section Begin -->

        <section class="choseus-section spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title">
                            <span>READY TO WATCH? </span>
                            <h2> FEEL FREE TO CONTACT US AND GET ACCESS TO YOUR ACCOUNT.</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="cs-item">
                            <span class="fas fa-video-camera fa-3x"></span>
                            <h4>Movies</h4>

                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="cs-item">
                            <span class="fas fa-film fa-3x"></span>
                            <h4>Series</h4>

                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">

                    </div>
                </div>
            </div>
        </section>

        <!-- ChoseUs Section End -->

        <!-- Banner Section Begin -->
        <section class="banner-section set-bg" data-setbg="img/home-featuerd.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="bs-text">
                            <h2 style="color: black">Contact us and get your login info's</h2>
                            <button type="button" class="btn btn-danger"><a href="index.php?p=contact">Contact us </a></button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Banner Section End -->
        <section class="choseus-section spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title">
                            <h2> Unlimited movies, TV shows, and more.<br><br>Watch anywhere. Cancel anytime. </h2>
                            <h3></h3>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Banner Posters Begin -->
        <section class="team-section spad">
            <section class="team-section team-page spad">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="team-title">
                                <div class="section-title">
                                    <span>Posters</span>
                                    <h2>Movies & Series</h2>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="ts-slider owl-carousel">
                            <?php
                            $post_query = "SELECT * FROM posts";
                            $result = $conn->query($post_query);
                            if ($result->num_rows > 0) {
                                while ($row = mysqli_fetch_array($result)) {
                                    $image_path=$row['image_path'];
                                    ?>
                                    <div class="col-lg-4">
                                        <div class="ts-item set-bg" data-setbg="../backend/image/postsImage/<?=$image_path?>">
                                            <div class="ts_text">
                                                <h4><?= $row['title'] ?></h4>
                                                <span>
                                                    <?php
                                                    $rating = $row['rating'];
                                                    if ($rating == 10)
                                                        for ($x = 0; $x < 5; $x++) {
                                                            echo "<i class='fa fa-star' aria-hidden='true' style='color: yellow'></i>";
                                                        } elseif ($rating == 9)
                                                        for ($x = 0; $x < 4; $x++) {
                                                            echo "<i class='fa fa-star' aria-hidden='true' style='color: yellow'></i>";
                                                        } elseif ($rating == 8) {
                                                        for ($x = 0; $x < 3; $x++) {
                                                            echo "<i class='fa fa-star' aria-hidden='true' style='color: yellow'></i>";
                                                        }
                                                    } else {
                                                        for ($x = 0; $x < 2; $x++) {
                                                            echo "<i class='fa fa-star' aria-hidden='true' style='color: yellow'></i>";
                                                        }
                                                    }
                                                    ?>


                                                </span>
                                            </div>
                                        </div>
                                    </div>
                <?php
            }
        }
        ?>
                        </div>
                    </div>



                </div>
                </div>
            </section>
        </section>

        <!-- Banner Posters End -->


        <!-- Get In Touch Section Begin -->
        <div class="gettouch-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="gt-text">
                            <i class="fa fa-map-marker"></i>
                            <p>AL Badawi Camp<br/> Norhth Lebanon</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="gt-text">
                            <i class="fa fa-mobile"></i>
                            <ul>
                                <li>06-369852</li>
                                <li>06-147852</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="gt-text email">
                            <i class="fa fa-envelope"></i>
                            <p>support.moviesvod@gmail.com</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Get In Touch Section End -->
        <div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h4 class="modal-title w-100 font-weight-bold">Sign in</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body mx-3">
                        <div class="md-form mb-5">
                            <i class="fas fa-envelope prefix grey-text"></i>
                            <input type="email" id="defaultForm-email" class="form-control validate">
                            <label data-error="wrong" data-success="right" for="defaultForm-email">Your email</label>
                        </div>

                        <div class="md-form mb-4">
                            <i class="fas fa-lock prefix grey-text"></i>
                            <input type="password" id="defaultForm-pass" class="form-control validate">
                            <label data-error="wrong" data-success="right" for="defaultForm-pass">Your password</label>
                        </div>

                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button class="btn btn-default">Login</button>
                    </div>
                </div>
            </div>
        </div>

        <?php
    }

}
?>
    
