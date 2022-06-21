<?php

class post {

    public function display_post_area() {
        $connect = new connect();
        $conn = $connect->getConn();
        $user_query = "SELECT * FROM posts ";
        $result = $conn->query($user_query);
        if ($result->num_rows > 0) {
            ?><nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php?p=home">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Available Posts !</a></li>
                    <li class="breadcrumb-item"><a href="index.php?p=add_movie_post">Available Posts !</a></li>
                    <li class="breadcrumb-item"><a href="index.php?p=add_series_post">Available Series !</a></li>
             </ol>
            </nav>
           <div class="container-fluid" style="padding:15px;font-family: 'Exo', sans-serif; padding:10px;">
                <div class="row" style="margin:10px;">
                    <?php while ($row = mysqli_fetch_array($result)) { ?>
                        <div class="col-md-4">
                            <div class="card  border-info " style="width: 18rem;">
                                <div class="card-img-top" style="padding: 5px;">
                                    <?php
                                    if ($row['image_path'] != null) {

                                        echo "<img src=\"../backend/image/postsImage/" . $row['image_path'] . "\"
                                alt=\"" . $row['title'] . "Poster\"  class=\"\" height=\"300px;\"width=\"100%;\" name=\"output\">";
                                    }
                                    ?>
                                </div>

                                <div class="card-body text-primary">
                                    <h1 class="text-center" style="color: black;font-size: 33px;"><?php echo ucwords($row['title']); ?></h1><br>
                                    <p class="" style="color: black;"><b>Categories:</b> <?php echo $row['category']; ?></p>
                                    <p class="" style="color: black;"><b>Rating:</b> <?php echo $row['rating']; ?></p>
                                    <p class="" style="color: black;"><b>Publish Date:</b> <?php echo $row['post_date']; ?></p>
                                </div>
                                <div class="card-footer text-muted text-center">
                                    <a href="#" class="btn btn-default btn-lg" data-toggle="modal" data-target="#delete_it<?php echo $row["post_id"]; ?>">
                                        <i class="fas fa-trash" aria-hidden="true"></i></a>        
                                    <div class="modal fade" id="delete_it<?php echo $row["post_id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">Do you want to delete this post!</div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                                    <button onclick="delete_from_table('<?php echo "posts"; ?>', 'post_id', '<?php echo $row["post_id"]; ?>')" class="btn btn-primary" >Delete</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><br>
                        </div>
                    <?php } ?>
                    <hr>
                </div>

            </div><?php } else { ?><!-- Breadcrumbs--><ol class="breadcrumb" style="font-family: 'Exo', sans-serif;">
                <li class="breadcrumb-item active">
                    <a href="index.php?p=home" style="text-decoration:none;color:black;">Home</a>
                </li>
                <li class="breadcrumb-item active">
                    <a href="index.php?p=add_movie_post" style="text-decoration:none;color:red;">Add Movie Post </a>
                </li>
                <li class="breadcrumb-item active">
                    <a href="index.php?p=add_series_post" style="text-decoration:none;color:blue;">Add Series Post</a>
                </li>
            </ol><?php
            echo "<h2>No Posts Yet! </h2>       ";
        }
    }

    public function display_add_movie_post() {
        $connect = new connect();
        $conn = $connect->getConn();
        $user_query = "SELECT * FROM movies ";
        $result = $conn->query($user_query);
        ?><ol class="breadcrumb" style="font-family: 'Exo', sans-serif;color:black;margin: 7px;">
            <li class="breadcrumb-item">
                <a href="index.php?p=show_posts">Home</a>
            </li><li class="breadcrumb-item active">Select Movie to Post</li>
        </ol><div class="container-fluid" style="background-image: linear-gradient(to left top, #d0e3ff, #dfe9ff, #ecf0ff, #f7f7ff, #ffffff);padding:15px;font-family: 'Exo', sans-serif;margin: 7px;"> 
             <div class="row" style="margin:10px;">
            <?php
            if ($result->num_rows > 0) {
                while ($row = mysqli_fetch_array($result)) {
                    ?>

                    <div class="card bg-dark " style="max-width: 18rem;margin: 10px;">
                        <div class="card-header text-center">
                            <?php echo ucwords($row['title']); ?>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title "><?php echo $row['description']; ?></h5>
                            <p class="card-text">Categories : <?php echo $row['category']; ?></p>
                            <p class="card-text">Languages : <?php echo $row['languages']; ?></p>
                            <p class="card-text">Rating: <?php echo $row['rating']; ?></p>

                        </div>
                        <div class="card-footer text-muted text-center">
                            <a href="index.php?p=movies_post&amp;movies_id=<?= $row['movie_id']; ?>" class="btn btn-default btn-lg">
                                Publish Post</a>


                        </div>
                    </div>
                    <?php
                }
            }
            ?>
             </div>
        </div><?php
    }

    public function display_add_series_post() {
        $connect = new connect();
        $conn = $connect->getConn();
        $user_query = "SELECT * FROM series ";
        $result = $conn->query($user_query);
        ?><ol class="breadcrumb" style="font-family: 'Exo', sans-serif;color:black;margin: 7px;">
            <li class="breadcrumb-item">
                <a href="index.php?p=show_posts">Home</a>
            </li><li class="breadcrumb-item active">Select Series to Post</li>
        </ol><div class="container-fluid" style="background-image: linear-gradient(to left top, #d0e3ff, #dfe9ff, #ecf0ff, #f7f7ff, #ffffff);padding:15px;font-family: 'Exo', sans-serif;margin: 7px;"> 
 <div class="row" style="">           
 <?php
            if ($result->num_rows > 0) {
                while ($row = mysqli_fetch_array($result)) {
                    ?>

                    <div class="card bg-dark " style="max-width: 18rem;margin: 10px">
                        <div class="card-header text-center">
                            <?php echo ucwords($row['title']); ?>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title "><?php echo $row['description']; ?></h5>
                            <p class="card-text">Categories : <?php echo $row['category']; ?></p>
                            <p class="card-text">Languages : <?php echo $row['languages']; ?></p>
                            <p class="card-text">Rating: <?php echo $row['rating']; ?></p>
                            <p class="card-text">Episode Number : <?php echo $row['episodes_number']; ?></p>

                        </div>
                        <div class="card-footer text-muted text-center">
                            <a href="index.php?p=series_post&amp;series_id=<?= $row['series_id']; ?>" class="btn btn-default btn-lg">
                                Publish Post</a>


                        </div>
                    </div>
                    <?php
                }
            }
            ?>
 </div>
        </div><?php
    }

    public function movie_post() {
        $connect = new connect();
        $conn = $connect->getConn();
        $movie_id = $_GET['movies_id'];
        $user_query = "SELECT * FROM movies where movie_id='$movie_id' ";
        $result = $conn->query($user_query);
        if ($result->num_rows > 0)
            $row = mysqli_fetch_array($result);
        ?><ol class="breadcrumb" style="font-family: 'Exo', sans-serif;color:black;margin: 7px;">
            <li class="breadcrumb-item">
                <a href="index.php?p=show_posts">Home</a>
            </li><li class="breadcrumb-item active">Add Movie Post</li>
        </ol>
        <form method="post" action="#" enctype="multipart/form-data">
            <div class="form-group">
                <img id="output" width="250" />
            </div> 
            <br><br>

            <div class="row">
                <div class="col">
                    <label><b>Poster Title </b></label>
                    <input type="text" class="form-control" placeholder="Post Title" name="post_title" value="<?= $row['title'] ?>">
                </div>
                <div class="col">
                    <label><b>Poster Category </b></label>
                    <input type="text" class="form-control" placeholder="Movie Category" name="post_category" value="<?= $row['category'] ?>">
                </div>
            </div>
            <br><br>

            <div class="row">
                <div class="col">
                    <label><b>Poster Rating </b></label>
                    <input type="text" class="form-control" placeholder="movie rating" name="movie_rating" value="<?= $row['rating'] ?>">
                </div>
                <div class="col">
                    <label ><b>Select Your Post Image:</b></label>

                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile" name="uploadedImage" 
                               accept="image/*" value="<?= $row['image_path'] ?>" onchange="loadFile(event)" >
                        <label class="custom-file-label" for="customFile">choose image</label>
                    </div>
                </div>
            </div>
            <br><br>

            <div class="row">
                <div class="col">
                    <input type="hidden" name="movies_id" value="<?= $row['movie_id'] ?>">
                </div>
                <div class="col ">
                    <button class="btn btn-primary float-right" type="submit"  name = "publish_btn">Publish Post </button>

                </div>
            </div>
            <br><br>

        </form>


        <script>
            var loadFile = function (event) {
                var image = document.getElementById('output');
                image.src = URL.createObjectURL(event.target.files[0]);
            };
        </script>
        <?php
        $publish_btn = filter_input(INPUT_POST, "publish_btn");
        if (isset($publish_btn)) {
            $new_post = new post();
            $new_post->add_movie_post();
        }
    }

    public function series_post() {
        $connect = new connect();
        $conn = $connect->getConn();
        $series_id = $_GET['series_id'];
        $user_query = "SELECT * FROM series where series_id='$series_id' ";
        $result = $conn->query($user_query);
        if ($result->num_rows > 0)
            $row = mysqli_fetch_array($result);
        ?><ol class="breadcrumb" style="font-family: 'Exo', sans-serif;color:black;margin: 7px;">
            <li class="breadcrumb-item">
                <a href="index.php?p=show_posts">Home</a>
            </li><li class="breadcrumb-item active">Add Series Post</li>
        </ol>
        <form method="post" action="#" enctype="multipart/form-data">
            <div class="form-group">
                <img id="output" width="250" />
            </div> 
            <br><br>

            <div class="row">
                <div class="col">
                    <label><b>Poster Title </b></label>
                    <input type="text" class="form-control" placeholder="Post Title" name="post_title" value="<?= $row['title'] ?>">
                </div>
                <div class="col">
                    <label><b>Poster Category </b></label>
                    <input type="text" class="form-control" placeholder="Movie Category" name="post_category" value="<?= $row['category'] ?>">
                </div>
            </div>
            <br><br>

            <div class="row">
                <div class="col">
                    <label><b>Series Rating </b></label>
                    <input type="text" class="form-control" placeholder="series rating" name="series_rating" value="<?= $row['rating'] ?>">
                </div>
                <div class="col">
                    <label><b>Episode Number </b></label>
                    <input type="text" class="form-control" placeholder="episode number" name="episodes_number" value="<?= $row['episodes_number'] ?>">

                </div>
            </div>
            <br><br>

            <div class="row">
                <div class="col">
                    <label ><b>Select Your Post Image:</b></label>

                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile" name="uploadedImage" 
                               accept="image/*" value="<?= $row['image_path'] ?>" onchange="loadFile(event)" >
                        <label class="custom-file-label" for="customFile">choose image</label>    

                    </div>
                </div>
                <div class="col">
                    <br>
                    <input type="hidden" name="series_id" value="<?= $row['series_id'] ?>">
                    <button class="btn btn-primary" type="submit"  name = "publish_btn">Publish Post </button>

                </div>
            </div>
            <br><br>

        </form>


        <script>
            var loadFile = function (event) {
                var image = document.getElementById('output');
                image.src = URL.createObjectURL(event.target.files[0]);
            };
        </script>
        <?php
        $publish_btn = filter_input(INPUT_POST, "publish_btn");
        if (isset($publish_btn)) {
            $new_post = new post();
            $new_post->add_series_post();
        }
    }

    public function add_movie_post() {
        $connect = new connect();
        $conn = $connect->getConn();
        $movie_id = filter_input(INPUT_POST, 'movies_id');
        $post_title = filter_input(INPUT_POST, 'post_title');
        $post_category = filter_input(INPUT_POST, 'post_category');
        $post_rating = filter_input(INPUT_POST, 'movie_rating');
        date_default_timezone_set("Asia/Beirut");
        $post_date = date("Y-n-j");
        //uploaded Post image
        $n = $_FILES['uploadedImage']['name'];
        $t = $_FILES['uploadedImage']['tmp_name'];
        $path = $n;


        $new_post_query = "INSERT INTO `posts`(`post_id`, `title`, `category`, `rating`, `post_date`, `image_path`)
        VALUES (NULL,'$post_title','$post_category','$post_rating','$post_date','$path')";
        $new_result = $conn->query($new_post_query);
        $last_id = mysqli_insert_id($conn);
        $relation_query = "INSERT INTO `movieposter`(`id`, `movie_id`, `post_id`) VALUES (NULL,'$movie_id','$last_id')";
        $relation_result = $conn->query($relation_query);
        if ($new_result && $relation_result) {
            move_uploaded_file($t, "../backend/image/postsImage/" . $n);
            echo "<script>
            Swal.fire('Good job!', 'You post is added', 'success')</script>";
        } else {
            echo "<script>
            Swal.fire({type: 'error', title: 'Oops...', text: 'Something went wrong!'})</script>";
        }
    }

    public function add_series_post() {
        $connect = new connect();
        $conn = $connect->getConn();
        $series_id = filter_input(INPUT_POST, 'series_id');
        $post_title = filter_input(INPUT_POST, 'post_title');
        $post_category = filter_input(INPUT_POST, 'post_category');
        $post_rating = filter_input(INPUT_POST, 'series_rating');
        date_default_timezone_set("Asia/Beirut");
        $post_date = date("Y-n-j");
        //uploaded Post image
        $n = $_FILES['uploadedImage']['name'];
        $t = $_FILES['uploadedImage']['tmp_name'];
        $path = $n;


        $new_post_query = "INSERT INTO `posts`(`post_id`, `title`, `category`, `rating`, `post_date`, `image_path`)
        VALUES (NULL,'$post_title','$post_category','$post_rating','$post_date','$path')";
        $new_result = $conn->query($new_post_query);
        $last_id = mysqli_insert_id($conn);

        $relation_query = "INSERT INTO `seriesposter`(`id`, `series_id`, `post_id`) VALUES (NULL,'$series_id','$last_id')";
        $relation_result = $conn->query($relation_query);
        if ($new_result && $relation_result) {
            move_uploaded_file($t, "../backend/image/postsImage/" . $n);
            echo "<script>
            Swal.fire('Good job!', 'You post is added', 'success')</script>";
        } else {
            echo "<script>
            Swal.fire({type: 'error', title: 'Oops...', text: 'Something went wrong!'})</script>";
        }
    }

    public function display_edit_post() {
        $connect = new connect();
        $conn = $connect->getConn();
        $post_id = $_GET['post_id'];
        $new_query = "select * from posts where post_id=$post_id";
        $result = $conn->query($new_query);
        $row = mysqli_fetch_array($result);
        if ($result->num_rows > 0) {
            ?>
            <!-- Breadcrumbs-->
            <ol class="breadcrumb" style="font-family: 'Exo', sans-serif;margin: 7px;">
                <li class="breadcrumb-item active">
                    <a href="index.php?p=show_posts" style="text-decoration:none;color:black;">Home</a>
                </li>
                <li class="breadcrumb-item active "><a href="#" style="text-decoration:none;color:#007CF8;">Update Post Details </a></li>
            </ol><div class="container-fluid">
                <form method="POST" action="" enctype="multipart/form-data" style="padding:5px;">
                    <br>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <?php
                            if ($row['image_path'] != null) {
                                echo "<img src=\"..\backend\image\postsImage/" . $row['image_path'] . "\"
                                alt=\"Image\" style=\"padding:3px;height:200px;width:200px;\" id=\"output\">";
                            }
                            ?>
                        </div>
                        <div class="form-group col-md-6">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4"><b>Post Rating </b></label>
                            <input type="text" value="<?= $row['rating'] ?>" class="form-control" name="rating"  id="inputPassword4" >
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4"><b>Post Title </b></label>
                            <input type="text" value="<?= $row['title'] ?>"  class="form-control" name="post_title" id="inputPassword4" >
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4"><b>Post Content</b></label>
                            <input type="text" value="<?= $row['content'] ?>" class="form-control" name="post_content"  id="inputPassword4" >
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4"><b>Post Image </b></label><br>
                            <label for="post_image" class="form-control btn border border-primary">Upload New Image</label>
                            <input type="file" value="<?= $row['image_path'] ?>" name="post_image" id="post_image" multiple="multiple" accept="image/*"  onchange="loadFile(event)" style="display: none" />&nbsp;&nbsp;&nbsp;

                        </div> 
                    </div>

                    <input type="hidden" name="post_id" value="<?= $_GET['post_id']; ?>" />
                    <div class="input-group">
                        <div class="col-md-10 mb-8"></div>
                        <div class="col-md-2 mb-4">
                            <button type="submit" class="btn btn-primary" name="update_info" id="update_info">UPDATE
                                <i class="fas fa-arrow-right"></i>
                            </button></div>
                    </div>
                </form></div><script>
                    var loadFile = function (event) {
                        var image = document.getElementById('output');
                        image.src = URL.createObjectURL(event.target.files[0]);
                    };
            </script><?php
            $post_update = filter_input(INPUT_POST, "update_info");
            if (isset($post_update)) {
                $new_post = new post();
                $new_post->update_post_info();
            }
        }
    }

    public function update_post_info() {
        $connect = new connect();
        $conn = $connect->getConn();
        $post_id = $_POST['post_id'];
        $new_title = filter_input(INPUT_POST, 'post_title');
        $new_content = filter_input(INPUT_POST, 'post_content');
        $new_rate = filter_input(INPUT_POST, 'rating');

        //uploaded file info's
        $n = $_FILES['post_image']['name'];
        $s = $_FILES['post_image']['size'];
        $t = $_FILES['post_image']['tmp_name'];
        $e = $_FILES['post_image']['error'];
        $ty = $_FILES['post_image']['type'];
        move_uploaded_file($t, "../backend/image/postsImage/" . $n);
        $path = $n;
        $query = "UPDATE `posts` SET `title`='" . $new_title . "',`content`='" . $new_content . "',`rating`='" . $new_rate . "',`image_path`='" . $path . "'  WHERE `post_id`='" . $post_id . "'";
        $result = $conn->query($query);
        if ($result) {
            echo "<script>
                    Swal.fire('Good job!','You post is edited','success')</script>";
//$header=new header_process();
//$header->header("index.php?p=show_posts");
        } else {
            echo "<script>
               Swal.fire({ type: 'error',title: 'Oops...',text: 'Something went wrong!'})</script>";
        }
    }

}
