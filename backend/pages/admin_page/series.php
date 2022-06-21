<?php

class series {

    public function display_series() {
        $connect = new connect();
        $conn = $connect->getConn();
        $user_query = "SELECT * FROM series ";
        $result = $conn->query($user_query);
        if ($result->num_rows > 0) {
            ?>
            <!-- Breadcrumbs-->
            <ol class="breadcrumb" style="font-family: 'Exo', sans-serif;margin: 7px;">
                <li class="breadcrumb-item active">
                    <a href="index.php?p=home" style="text-decoration:none;color:black;">Home</a>
                </li>
                <li class="breadcrumb-item active "> <a href="#" style="text-decoration:none;color:#007CF8;">Available Series ! </a></li>
                <li class="breadcrumb-item active "> <a href="index.php?p=add_series" style="text-decoration:none;color:red;">Add Series ! </a></li>
            </ol><div class="container-fluid" style="padding:15px;font-family: 'Exo', sans-serif; padding:10px;">
                <div class="row" style="margin:10px;">
                    <?php while ($row = mysqli_fetch_array($result)) { ?>

                        <div class="card bg-dark " style="max-width: 18rem; margin: 10px;">
                            <div class="card-header text-center">
                                <?php echo ucwords($row['title']); ?>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title "><?php echo $row['description']; ?></h5>
                                <p class="card-text">Categories : <?php echo $row['category']; ?></p>
                                <p class="card-text">Languages : <?php echo $row['languages']; ?></p>
                                <p class="card-text">Episode number : <?php echo $row['episodes_number']; ?></p>

                            </div>
                            <div class="card-footer text-muted text-center">
                                <a href="#" class="btn btn-default btn-lg" data-toggle="modal" data-target="#delete_it<?php echo $row["series_id"]; ?>">
                                    <i class="fas fa-trash" aria-hidden="true"></i></a>        
                                <div class="modal fade" id="delete_it<?php echo $row["series_id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">Do you want to delete this episode!</div>
                                            <div class="modal-footer">
                                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                                <button onclick="delete_from_table('<?php echo "series"; ?>', 'series', '<?php echo $row["series_id"]; ?>')" class="btn btn-primary" >Delete</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a href="index.php?p=series_edit&amp;series_id=<?= $row['series_id']; ?>" class="btn btn-default btn-lg" data-toggle="tooltip" data-placement="bottom" title="Edit Episod Details!">
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
                    <a href="index.php?p=add_series" style="text-decoration:none;color:red;">Add Series</a>
                </li>
            </ol><?php
            echo "<h2>No Movies Yet! </h2>       ";
        }
    }

    public function display_add_series() {
        ?>  <ol class="breadcrumb" style="font-family: 'Exo', sans-serif;color:black;margin: 7px;">
            <li class="breadcrumb-item">
                <a href="index.php?p=series">Home</a>
            </li><li class="breadcrumb-item active">Add Series</li>
        </ol>
        <div class="container-fluid" style="background-image: linear-gradient(to left top, #d0e3ff, #dfe9ff, #ecf0ff, #f7f7ff, #ffffff);padding:15px;font-family: 'Exo', sans-serif;margin: 7px;"> 
            <form method="post" action="#" enctype="multipart/form-data">
                <div class="row">
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Series Title" name="series_title">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Series Rating over 10" name="series_rating">
                    </div>
                </div>
                <br><br>

                <div class="row">
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Series Category such as : action , romance ..." name="series_category">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Series Language" name="series_language">
                    </div>
                </div>

                <br><br>
                <div class="row">
                    <div class="col ">
                        <input type="text" class="form-control" placeholder="Series duration" name="series_duration">
                    </div>
                    <div class="col">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFile" name="uploadedSerie">
                            <label class="custom-file-label" for="customFile">Choose series</label>
                        </div>

                    </div>
                </div>


                <br><br>
                <div class="row">
                    <div class="col ">
                        <input type="text" class="form-control" placeholder="Episode number" name="episode_number">
                    </div>
                    <div class="col">
                        <div class="custom-file">
                            <textarea class="form-control" rows="1" name="series_description"
                                      placeholder="Series Description"></textarea>
                        </div>

                    </div>
                </div>
                <br><br>

                <div class="row">
                    <div class="col">
                        <button class="btn btn-primary" type="submit"  name = "publish_btn">Publish Your Series </button>

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
            $new_series = new series();
            $new_series->add_series();
        }
    }

    public function add_series() {
        $connect = new connect();
        $conn = $connect->getConn();
        $series_description = filter_input(INPUT_POST, 'series_description');
        $series_title = filter_input(INPUT_POST, 'series_title');
        $series_rating = filter_input(INPUT_POST, 'series_rating');
        $series_category = filter_input(INPUT_POST, 'series_category');
        $series_language = filter_input(INPUT_POST, 'series_language');
        $series_duration = filter_input(INPUT_POST, 'series_duration');
        $episode_number = filter_input(INPUT_POST, 'episode_number');

        $publish_date = date("Y/m/d");
        //uploaded file info's
        $n = $_FILES["uploadedSerie"]['name'];
        $t = $_FILES['uploadedSerie']['tmp_name'];
        move_uploaded_file($t, "../backend/series/" . $n);
        $path = $n;
        $new_serie_query = "  INSERT INTO `series`(`series_id`, `title`, `description`, `category`, `rating`, `languages`, `date`, `episodes_number`, `series_path`)
        VALUES (Null,'$series_title','$series_description','$series_category','$series_rating','$series_language','$publish_date','$episode_number','$path')";
        $new_result = $conn->query($new_serie_query);
        if ($new_result) {
            echo "<script>
               Swal.fire('Good job!','Your Series is Uploaded !','success')</script>";
        } else {
            echo "<script>
               Swal.fire({ type: 'error',title: 'Oops...',text: 'Something went wrong!'})</script>";
        }
    }

    public function display_edit_series() {
        $connect = new connect();
        $conn = $connect->getConn();
        $series_id = $_GET['series_id'];
        $new_query = "select * from series where series_id=$series_id";
        $result = $conn->query($new_query);
        $row = mysqli_fetch_array($result);
        if ($result->num_rows > 0) {
            ?>
            <!-- Breadcrumbs-->
            <ol class="breadcrumb" style="font-family: 'Exo', sans-serif;margin: 7px;">
                <li class="breadcrumb-item active">
                    <a href="index.php?p=series" style="text-decoration:none;color:black;">Home</a>
                </li>
                <li class="breadcrumb-item active "><a href="#" style="text-decoration:none;color:#007CF8;">Update Series Details </a></li>
            </ol><div class="container-fluid">
                <form method="POST" action="" enctype="multipart/form-data" style="padding:5px;">
                    <br>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label><b>Series Title </b></label>
                            <input type="text" value="<?= $row['title'] ?>"  class="form-control" name="series_title" >

                        </div>
                        <div class="form-group col-md-6">
                            <label><b>Series Rating </b></label>
                            <input type="text" value="<?= $row['rating'] ?>" class="form-control" name="rating">

                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label><b>Series Categories </b></label>
                            <input type="text" value="<?= $row['category'] ?>" placeholder="<?= $row['category'] ?>"  class="form-control" name="series_category" >

                        </div>
                        <div class="form-group col-md-6">
                            <label><b>Episode Number </b></label>
                            <input type="text" value="<?= $row['episodes_number'] ?>" class="form-control" name="episode_number">

                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label ><b>Series Language</b></label>
                            <input type="text" value="<?= $row['languages'] ?>" class="form-control" name="series_language">
                        </div>
                        <div class="form-group col-md-6">
                            <label ><b>Episode Duration</b></label>
                            <input type="text" value="<?= $row['episode_duration'] ?>" class="form-control" name="series_duration">
                        </div> 
                    </div>
                    <div class="row">
                        <div class="col ">
                            <label ><b>Description</b></label>

                            <textarea class="form-control" rows="1" name="series_description"
                                      placeholder="<?= $row['description'] ?>"><?= $row['description'] ?></textarea>
                        </div>
                        <div class="col">
                            <label ><b>Episode Path</b></label>

                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile" name="uploadedSeries" value="<?= $row['series_path'] ?>">
                                <label class="custom-file-label" for="customFile">Choose episode</label>
                            </div>

                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col ">
                            <input type="hidden" name="series_id" value="<?= $_GET['series_id']; ?>" />

                        </div>
                        <div class="col">
                            <button type="submit" class="btn btn-primary" name="update_info" id="update_info">UPDATE
                                <i class="fas fa-arrow-right"></i>
                            </button>
                        </div>
                    </div>
                    <div class="input-group">
                        <div class="col-md-10 mb-8"></div>
                        <div class="col-md-2 mb-4">
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
            $series_update = filter_input(INPUT_POST, "update_info");
            if (isset($series_update)) {
                $updated_series = new series();
                $updated_series->update_series();
            }
        }
    }

    public function update_series() {
        $connect = new connect();
        $conn = $connect->getConn();
        $series_id = $_POST['series_id'];
        $new_title = filter_input(INPUT_POST, 'series_title');
        $new_rating = filter_input(INPUT_POST, 'series_rating');
        $new_category = filter_input(INPUT_POST, 'series_category');
        $new_episode_number = filter_input(INPUT_POST, 'episode_number');
        $new_language = filter_input(INPUT_POST, 'series_language');
        $new_duration = filter_input(INPUT_POST, 'series_duration');
        $new_description = filter_input(INPUT_POST, 'series_description');

        //uploaded file info's
        $n = $_FILES['uploadedSeries']['name'];
        $t = $_FILES['uploadedSeries']['tmp_name'];
        move_uploaded_file($t, "../backend/series/" . $n);
        $new_path = $n;

        $query = "UPDATE `series` SET `title`='$new_title',`description`='$new_description',`category`='$new_category',`rating`='$new_rating',`languages`='$new_language',`episodes_number`='$new_episode_number',`episode_duration`='$new_duration',`series_path`='$new_path' WHERE series_id='$series_id'";
        $result = $conn->query($query);
        if ($result) {
            echo "<script>
                    Swal.fire('Good job!','Your series is edited','success')</script>";
        } else {
            printf("Errormessage: %s\n", $conn->error);
            echo "<script>
               Swal.fire({ type: 'error',title: 'Oops...',text: 'Something went wrong!'})</script>";
        }
    }

}
