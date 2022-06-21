<?php

class post {

    public function view_post_details() {
        $connect = new connect();
        $conn = $connect->getConn();
        $id = $_GET['post_id'];
        $post_query = "SELECT * FROM posts NATURAL JOIN movieposter NATURAL JOIN movies WHERE post_id='$id'";
        $result = $conn->query($post_query);
        ?> <section class="breadcrumb-section set-bg" data-setbg="img/detail-back.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="breadcrumb-text">
                            <div class="bt-option">
                                <a href="index.php?p=home">Home</a>
                                <span>Poster Details</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="team-section spad">
            <div class="container">
                <div class="row">
                    <?php
                    if ($result->num_rows > 0) {
                        $row = mysqli_fetch_array($result);
                        ?>
                        <div class="col-4">
                            <img src="../backend/image/postsImage/<?php echo $row['image_path'] ?>" alt="..." class="img-thumbnail" >
                        </div>
                        <div class="col-8 align-middle " >
                            <div class="table-responsive">
                                <table class="table table-bordered table-dark ">

                                    <tbody>
                                        <tr>
                                            <th scope="row">Title</th>
                                            <td><?php echo $row['title'] ?></td>

                                        </tr>
                                        <tr>
                                            <th scope="row">Category</th>
                                            <td><?php echo $row['category'] ?></td>

                                        </tr>
                                        <tr>
                                            <th scope="row">Description</th>
                                            <td colspan="2"><?php echo $row['description'] ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Rating over 10 </th>
                                            <td colspan="2"><?php echo $row['rating'] ?> /10 <i class="far fa-star" style="color:yellow"></i></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Date</th>
                                            <td colspan="2"><?php echo $row['post_date'] ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </section>
            <?php
        }
    }
    
    
    
     public function view_series_details() {
        $connect = new connect();
        $conn = $connect->getConn();
        $id = $_GET['post_id'];
        $post_query = "SELECT * FROM series NATURAL JOIN seriesposter NATURAL JOIN posts WHERE post_id='$id'";
        $result = $conn->query($post_query);
        ?> <section class="breadcrumb-section set-bg" data-setbg="img/detail-back.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="breadcrumb-text">
                            <div class="bt-option">
                                <a href="index.php?p=home">Home</a>
                                <span>Poster Details</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="team-section spad">
            <div class="container">
                <div class="row">
                    <?php
                    if ($result->num_rows > 0) {
                        $row = mysqli_fetch_array($result);
                        ?>
                        <div class="col-4">
                            <img src="../backend/image/postsImage/<?php echo $row['image_path'] ?>" alt="..." class="img-thumbnail" >
                        </div>
                        <div class="col-8 align-middle " >
                            <div class="table-responsive">
                                <table class="table table-bordered table-dark ">

                                    <tbody>
                                        <tr>
                                            <th scope="row">Title</th>
                                            <td><?php echo $row['title'] ?></td>

                                        </tr>
                                        <tr>
                                            <th scope="row">Category</th>
                                            <td><?php echo $row['category'] ?></td>

                                        </tr>
                                        <tr>
                                            <th scope="row">Description</th>
                                            <td colspan="2"><?php echo $row['description'] ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Rating over 10 </th>
                                            <td colspan="2"><?php echo $row['rating'] ?> /10 <i class="far fa-star" style="color:yellow"></i></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Date</th>
                                            <td colspan="2"><?php echo $row['post_date'] ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </section>
            <?php
        }
    }

}
?>

