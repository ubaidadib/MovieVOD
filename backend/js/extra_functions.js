function delete_from_table(table_name, name_id, id){
//  alert();
jQuery.ajax({
type: "POST",
        url: "pages/admin_pages/calling_product.php?action=delete_from_table",
        data: {table_name:table_name,
                product_id:id,
                name_id:name_id,
        },
        success: function(data) {
        //  console.log(data); // apple
        location.reload();
        },
        error: function(jqXHR, textStatus, errorThrown) {
        console.log(textStatus, errorThrown);
        }
});
}

function display_admin_profile(){
$connect = new connect();
        $conn = $connect - > getConn();
        $user_id = $_SESSION['user_id'];
        $user_query = "SELECT * from users where id='$user_id'";
        $result = $conn - > query($user_query);
        $row = mysqli_fetch_array($result);
        if ($result - > num_rows > 0) {
? >
<!-- Breadcrumbs-->
<ol class="breadcrumb" style="font-family: 'Exo', sans-serif;">
    <li class="breadcrumb-item active">
        <a href="index.php?p=home" style="text-decoration:none;color:black;">Home</a>
    </li>
    <li class="breadcrumb-item active "> <a href="#" style="text-decoration:none;color:#007CF8;">General Information </a></li>
    <li class="breadcrumb-item active "> <a href="index.php?p=security" style="text-decoration:none;color:#579E77;">Security</a></li>
</ol><form method="POST" action="#"  enctype="multipart/form-data">
    <h3>General Information :</h3><br>
    <div class="form-group">
        <?php  
        $profile =  new admin();
        $profile->display_image_profile();
        ?>
    </div>
    <div class="form-group">
        <input type="text" value="<?=$row['id']?>" class="form-control" name="id" disabled/>
        <input type="text" value="<?=$row['address']?>" class="form-control" name="address" />
    </div>
    <div class="form-group">
        <input type="text" value="<?=$row['fname']?>" class="form-control" name="fname" />
        <input type="text" value="<?=$row['lname']?>" class="form-control" name="lname" />
    </div>
    <div class="form-group">
        <input type="text" value="<?=$row['birthdate']?>" class="form-control" name="birthdate"/>
        <input type="text" value="<?=$row['phone_number']?>" class="form-control" name="phone_number`" />
    </div>
    <div class="form-group">
        <input type="text" value="<?=$row['gender']?>" class="form-control" name="gender"/>
        <input type="file" name="profileImages" id="profileImages" value="<?= $user_profile ?>" accept="image/*" onchange="loadFile(event)" ></div>
    <div class="input-group">
        <div class="col-md-10 mb-8"></div>
        <div class="col-md-2 mb-4">
            <input type="hidden" name="action" value="upload">
            <button type="submit" class="btn btn-primary" name="update_profile" id="update_profile">UPDATE
                <i class="fas fa-arrow-right"></i>
            </button></div>
    </div>
</form><script>
var loadFile = function(event) {
        var image = document.getElementById('output');
        image.src = URL.createObjectURL(event.target.files[0]);
};
</script><?php 
$admin_update= filter_input(INPUT_POST, "update_profile");
if(isset($admin_update)){
        $admin = new admin();
        $admin - > update_profile(); } 
}



}
public function update_profile(){
        $connect = new connect();
        $conn = $connect - > getConn();
        $user_id = $_SESSION["user_id"];
        $f_name = filter_input(INPUT_POST, 'fname');
        $l_name = filter_input(INPUT_POST, 'lname');
        $user_phone = filter_input(INPUT_POST, 'phone_number');
        $user_address = filter_input(INPUT_POST, 'address');
        $user_birthdate = filter_input(INPUT_POST, 'birthdate');
        $user_gender = filter_input(INPUT_POST, 'gender');
        //uploaded file info's
        $n = $_FILES['profileImages']['name'];
        $s = $_FILES['profileImages']['size'];
        $t = $_FILES['profileImages']['tmp_name'];
        $e = $_FILES['profileImages']['error'];
        $ty = $_FILES['profileImages']['type'];
        move_uploaded_file($t, "../backend/image/uploadedProfiles/$user_id"."_".$n);
        $path = "$user_id"."_".$n;
        $query = "UPDATE `users` SET `fname` ='null',`lname` = 'null',`birthdate'='null',`phone_number`='null',`address`='null',`user_profile`='null'  WHERE `id`='".$user_id."'";
        $result = $conn - > query($query);
        if ($result){
$header = new header_process();
        $header - > header("index.php?p=profile"); }
else {
        echo "Error!";
}

}
