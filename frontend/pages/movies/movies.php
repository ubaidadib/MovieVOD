<?php

class movies {

    public function display_movies($page) {
        $connect = new connect();
        $conn = $connect->getConn();
        $post_query = "SELECT * FROM posts NATURAL JOIN movieposter NATURAL JOIN movies";
        $result = $conn->query($post_query);
        if ($result->num_rows > 0) {
            ?>   <!-- Breadcrumb Section Begin -->
            <section class="breadcrumb-section set-bg" data-setbg="img/bg-1.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <div class="breadcrumb-text">
                                <div class="bt-option">
                                    <a href="index.php?p=home">Home</a>
                                    <span>Movies</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Breadcrumb Section End -->

            <!-- Blog Section Begin -->
            <section class="blog-section spad" >
                <div class="container">
                    <div class="row">
                        <div class="col-lg-2 p-0"></div>
                        <div class="col-lg-8 p-0">
                            <input class="form-control form-control-lg" type="text" placeholder="Search..." id="myInput">
                        </div>
                        <div class="col-lg-2 p-0"></div>
                    </div>
                    <br><br>
                    <div class="row">
                        <div class="col-lg-8 p-0">
                            <?php
                            while ($row = mysqli_fetch_array($result)) {
                                $link=$row['movie_path'];
                                ?>

                                <div class = "blog-item" id="myDIV" >
                                    <div class = "bi-pic">
                                        <img src ="../backend/image/postsImage/<?= $row['image_path'] ?>" alt = "">
                                    </div>
                                    <div class = "bi-text">
                                        <h5><a href = ""><?= $row['title'] ?></a></h5>
                                        <ul>
                                            <li><i class="fa fa-list-alt" aria-hidden="true"></i> <?= $row['category'] ?></li>
                                            <li><i class="fas fa-calendar-week"></i> <?= $row['publish_date'] ?></li>
                                            <li><i class="fas fa-clock"></i> <?= $row['duration'] ?></li>
                                        </ul>
                                        <p><?= $row['description'] ?></p>
                                        <br>
                                        <?php if ((isset($_SESSION['isUserloggedin']) && ($_SESSION['isUserloggedin'] == 1))) { ?>
                                        <a href="../backend/movies/<?=$row['movie_path']?>" class="btn btn-primary" role="button" data-lity >Watch Movie</a>

                                        <?php } else { ?>
                                            <a href="index.php?p=view_post_details&amp;post_id=<?= $row['post_id']; ?>" class="btn btn-primary" role="button">View More</a>

                                        <?php } ?>
                                        
                                    </div>
                                </div>

                                <?php
                            }
                        }
                        ?>


                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

                        <script>
                            $(document).ready(function () {
                                $("#myInput").on("keyup", function () {
                                    var value = $(this).val().toLowerCase();
                                    $("#myDIV ").filter(function () {
                                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                                    });
                                });
                            });
                        </script>


                    </div>
                    <div class = "col-lg-4 col-md-8 p-0">
                        <div class = "sidebar-option">
                            <div class = "so-categories">
                                <h5 class = "title">Feature Movies</h5>
                                <ul>
                                    <?php
                                    $feature_movie = "SELECT * FROM posts NATURAL JOIN movieposter NATURAL JOIN movies LIMIT 5";
                                    $feature_result = $conn->query($feature_movie);
                                    if ($feature_result->num_rows > 0) {
                                        while ($feature_row = mysqli_fetch_array($feature_result)) {
                                            ?>

                                            <li><a href = "#"><?php echo $feature_row['title'] ?><span><?php echo $feature_row['rating'] ?></span></a></li>
                                            <?php
                                        }
                                    }
                                    ?>


                                </ul>
                            </div>
                            <div class = "so-latest">
                                <h5 class = "title">Feature posts</h5>
                                <?php
                                $feature_post = "SELECT * FROM posts ORDER BY post_date  DESC LIMIT 5";
                                $feature_result = $conn->query($feature_post);
                                if ($feature_result->num_rows > 0) {
                                    while ($feature_post_row = mysqli_fetch_array($feature_result)) {
                                        ?>
                                        <div class = "latest-item">

                                            <div class = "li-pic">
                                                <img src = "../backend/image/postsImage/<?= $feature_post_row['image_path'] ?>" alt = "" style="height: 150px;width: 150px;">
                                            </div>
                                            <div class = "li-text">
                                                <h6><a href = ""><?= $feature_post_row['title'] ?></a></h6>
                                                <span class = "li-time"><?= $feature_post_row['post_date'] ?></span>
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
            </div>
        </section>
        <!-- Blog Section End -->
        <?php
    }

}
?>