<?php

class movies {

    public function display_movies() {
        $connect = new connect();
        $conn = $connect->getConn();
        $user_query = "SELECT * FROM movies ";
        $result = $conn->query($user_query);
        if ($result->num_rows > 0) {
            ?>
            <!-- Breadcrumbs-->
            <ol class="breadcrumb" style="font-family: 'Exo', sans-serif;margin: 7px;">
                <li class="breadcrumb-item active">
                    <a href="index.php?p=home" style="text-decoration:none;color:black;">Home</a>
                </li>
                <li class="breadcrumb-item active "> <a href="#" style="text-decoration:none;color:#007CF8;">Available Movies ! </a></li>
                <li class="breadcrumb-item active "> <a href="index.php?p=add_movie" style="text-decoration:none;color:red;">Add Movie ! </a></li>
            </ol><div class="container-fluid" style="padding:15px;font-family: 'Exo', sans-serif; padding:10px;">
                <div class="row" style="margin:10px;">
                        <?php while ($row = mysqli_fetch_array($result)) { ?>

                            <div class="card bg-dark " style="max-width: 18rem;margin:10px;">
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
                                    <a href="#" class="btn btn-default btn-lg" data-toggle="modal" data-target="#delete_it<?php echo $row["movie_id"]; ?>">
                                        <i class="fas fa-trash" aria-hidden="true"></i></a>        
                                    <div class="modal fade" id="delete_it<?php echo $row["movie_id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">Do you want to delete this movie!</div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                                    <button onclick="delete_from_table('<?php echo "movies"; ?>', 'movies', '<?php echo $row["movie_id"]; ?>')" class="btn btn-primary" >Delete</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="index.php?p=movies_edit&amp;movies_id=<?= $row['movie_id']; ?>" class="btn btn-default btn-lg" data-toggle="tooltip" data-placement="bottom" title="Edit Movie Details!">
                                        <i class="fas fa-edit" aria-hidden="true"></i></a>


                                </div>
                            </div>
                        <?php } ?>
                    <hr>
                </div>

            </div><?php } else { ?><!-- Breadcrumbs--><ol class="breadcrumb" style="font-family: 'Exo', sans-serif;">
                <li class="breadcrumb-item active">
                    <a href="index.php?p=home" style="text-decoration:none;color:black;">Home</a>
                </li>
                <li class="breadcrumb-item active">
                    <a href="index.php?p=add_movie" style="text-decoration:none;color:red;">Add Movie</a>
                </li>
            </ol><?php
            echo "<h2>No Movies Yet! </h2>       ";
        }
    }

    public function display_add_movie() {
        ?>  <ol class="breadcrumb" style="font-family: 'Exo', sans-serif;color:black;margin: 7px;">
            <li class="breadcrumb-item">
                <a href="index.php?p=movies">Home</a>
            </li><li class="breadcrumb-item active">Add Movies</li>
        </ol>
        <div class="container-fluid" style="background-image: linear-gradient(to left top, #d0e3ff, #dfe9ff, #ecf0ff, #f7f7ff, #ffffff);padding:15px;font-family: 'Exo', sans-serif;margin: 7px;"> 
            <form method="post" action="#" enctype="multipart/form-data">
                <div class="row">
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Movie Title" name="movie_title">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Movie Rating over 10" name="movie_rating">
                    </div>
                </div>
                <br><br>

                <div class="row">
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Movie Category such as : action , romance ..." name="movie_category">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Movie Language" name="movie_language">
                    </div>
                </div>
                <br><br>
                <div class="row">
                    <div class="col ">
                        <input type="text" class="form-control" placeholder="Movie duration" name="movie_duration">
                    </div>
                    <div class="col">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFile" name="uploadedMovie">
                            <label class="custom-file-label" for="customFile">Choose movie</label>
                        </div>

                    </div>
                </div>
                <br><br>
                <div class="form-group">
                    <textarea class="form-control" rows="3" name="movie_description"
                              placeholder="Movie Description"></textarea>
                </div>
                <br><br>

                <div class="row">
                    <div class="col">
                        <button class="btn btn-primary" type="submit"  name = "publish_btn">Publish Your Movie </button>

                    </div>
                </div>
            </form>
        </div>
        <script>
            // Add the following code if you want the name of the file appear on select
            $(".custom-file-input").on("change", function () {
                var fileName = $(this).val().split("\\").pop();
                $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
            });
        </script>   
        <?php
        $publish_btn = filter_input(INPUT_POST, "publish_btn");
        if (isset($publish_btn)) {
            $new_movie = new movies();
            $new_movie->add_movie();
        }
    }

    public function add_movie() {
        $connect = new connect();
        $conn = $connect->getConn();
        $movie_description = filter_input(INPUT_POST, 'movie_description');
        $movie_title = filter_input(INPUT_POST, 'movie_title');
        $movie_rating = filter_input(INPUT_POST, 'movie_rating');
        $movie_category = filter_input(INPUT_POST, 'movie_category');
        $movie_language = filter_input(INPUT_POST, 'movie_language');
        $movie_duration = filter_input(INPUT_POST, 'movie_duration');
        $publish_date = date("Y/m/d");
        //uploaded file info's
        $n = $_FILES["uploadedMovie"]['name'];
        $t = $_FILES['uploadedMovie']['tmp_name'];
        move_uploaded_file($t, "../backend/movies/" . $n);
        $path = $n;
        $new_movie_query = " INSERT INTO `movies`(`movie_id`, `title`, `languages`, `category`, `description`, `movie_path`, `rating`, `duration`, `publish_date`)
        VALUES (Null,'$movie_title','$movie_language','$movie_category','$movie_description','$path','$movie_rating','$movie_duration','$publish_date')";
        $new_result = $conn->query($new_movie_query);
        if ($new_result) {
            echo "<script>
               Swal.fire('Good job!','Your Movie is Uploaded !','success')</script>";
        } else {
            echo "<script>
               Swal.fire({ type: 'error',title: 'Oops...',text: 'Something went wrong!'})</script>";
        }
    }

    public function display_edit_movie() {
        $connect = new connect();
        $conn = $connect->getConn();
        $movie_id = $_GET['movies_id'];
        $new_query = "select * from movies where movie_id=$movie_id";
        $result = $conn->query($new_query);
        $row = mysqli_fetch_array($result);
        if ($result->num_rows > 0) {
            ?>
            <!-- Breadcrumbs-->
            <ol class="breadcrumb" style="font-family: 'Exo', sans-serif;margin: 7px;">
                <li class="breadcrumb-item active">
                    <a href="index.php?p=movies" style="text-decoration:none;color:black;">Home</a>
                </li>
                <li class="breadcrumb-item active "><a href="#" style="text-decoration:none;color:#007CF8;">Update Movie Details </a></li>
            </ol><div class="container-fluid">
                <form method="POST" action="" enctype="multipart/form-data" style="padding:5px;">
                    <br>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label><b>Movie Title </b></label>
                            <input type="text" value="<?= $row['title'] ?>"  class="form-control" name="movie_title" >

                        </div>
                        <div class="form-group col-md-6">
                            <label><b>Movie Rating </b></label>
                            <input type="text" value="<?= $row['rating'] ?>" class="form-control" name="rating">

                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label><b>Movie Categories </b></label>
                            <input type="text" value="<?= $row['category'] ?>" placeholder="<?= $row['category'] ?>"  class="form-control" name="movie_category" >

                        </div>
                        <div class="form-group col-md-6">
                            <label ><b>Movie Path</b></label>

                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile2" name="uploadedMovie" value="<?= $row['movie_path'] ?>">
                                <label class="custom-file-label" for="customFile2">Choose movie</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label ><b>Movie Language</b></label>
                            <input type="text" value="<?= $row['languages'] ?>" class="form-control" name="movie_language">
                        </div>
                        <div class="form-group col-md-6">
                            <label ><b>Movie Duration</b></label>
                            <input type="text" value="<?= $row['duration'] ?>" class="form-control" name="movie_duration">
                        </div> 
                    </div>
                    <div class="row">
                        <div class="col ">
                            <label ><b>Movie Publish Date</b></label>
                            <input type="text" value="<?= $row['publish_date'] ?>" class="form-control" name="movie_date">

                        </div>
                        <div class="col ">
                            <label ><b>Description</b></label>

                            <textarea class="form-control" rows="1" name="movie_description"
                                      placeholder="<?= $row['description'] ?>"><?= $row['description'] ?></textarea>
                        </div>

                    </div>
                    <br>
                    <div class="row">
                        <div class="col ">
                        </div>
                        <div class="col mr-sm-2">
                            <button type="submit" class="btn btn-primary  float-md-right" name="update_info" id="update_info">UPDATE
                                <i class="fas fa-arrow-right"></i>
                            </button>
                            <input type="hidden" name="movie_id" value="<?= $_GET['movies_id']; ?>" />


                        </div>
                    </div>

                </form>
            </div>
            <script>
            // Add the following code if you want the name of the file appear on select
                $(".custom-file-input").on("change", function () {
                    var fileName = $(this).val().split("\\").pop();
                    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
                });
            </script>  

            <?php
            $movie_update = filter_input(INPUT_POST, "update_info");
            if (isset($movie_update)) {
                $updated_movie = new movies();
                $updated_movie->update_movie();
            }
        }
    }

    public function update_movie() {
        $connect = new connect();
        $conn = $connect->getConn();
        $movie_id = $_POST['movie_id'];
        $new_title = filter_input(INPUT_POST, 'movie_title');
        $new_rating = filter_input(INPUT_POST, 'rating');
        $new_category = filter_input(INPUT_POST, 'movie_category');
        $new_language = filter_input(INPUT_POST, 'movie_language');
        $new_duration = filter_input(INPUT_POST, 'movie_duration');
        $new_description = filter_input(INPUT_POST, 'movie_description');
        $new_date = filter_input(INPUT_POST, 'movie_date');

        //uploaded file info's
        $n = $_FILES['uploadedMovie']['name'];
        $t = $_FILES['uploadedMovie']['tmp_name'];
        $new_path = $n;

        $query = "UPDATE `movies` SET `title`='$new_title',`languages`='$new_language',`category`='$new_category',`description`='$new_description',`movie_path`='$new_path',`rating`='$new_rating',`duration`='$new_duration',`publish_date`='$new_date' WHERE  movie_id='$movie_id'";
        $result = $conn->query($query);
        if ($result) {
            move_uploaded_file($t, "../backend/movies/" . $n);
            
            $header_process = new header_process();
            $header_process->header("index.php?p=movies");
        } else {
            printf("Errormessage: %s\n", $conn->error);
            echo "<script>
               Swal.fire({ type: 'error',title: 'Oops...',text: 'Something went wrong!'})</script>";
        }
    }

}
