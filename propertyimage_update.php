<?php
require 'session.php';
require_once 'resource/layouts/header.php';
?>

<?php
    require 'resource/db.php';
    $user_id = $_GET['id'];
    $select_query = "SELECT * FROM photo WHERE id=$user_id";
    $db_return = mysqli_query($db_conection, $select_query);
    $after_assoc = mysqli_fetch_assoc($db_return);
    $pro_heading = $after_assoc['photo_heading'];
    $pro_des = $after_assoc['photo_slog'];
    $status = $after_assoc['status'];
    $proimg_photo = $after_assoc['photo_image'];
?>
<div class="page-title-area mb-5">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="breadcrumbs-area clearfix">
                <ul class="breadcrumbs pull-left">
                    <li><a href="dashboard.php">Dashboard</a></li>
                    <li><a href="property_image.php">Property image</a></li>
                    <li><span>Property image update</span></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6">
            <div class="card ">
                <div class="card-header text-center">
                    Property image
                </div>
                <div class="card-body">
                    <div class="card" style="width: 100%">
                        <img class="card-img-top img-fluid"
                            src="public/upload/property_image/<?php echo $proimg_photo; ?>" alt="Card image cap"
                            style="height: 500px">
                        <div class="card-body">
                            <span class="pb-3">
                                <?php
                                        if($status==1)
                                        {
                                    ?>
                                <div class="" style="color:#27a800;margin-top:40px;">
                                    <i class="fas fa-dot-circle"></i>
                                    <?php
                                    echo " Active";
                                    ?>
                                </div>
                                <?php }
                                    else {
                                    ?>
                                <div class="" style="color:red;padding-top:40px;">
                                    <i class="fas fa-ban"></i>
                                    <?php
                                        echo " Deactive";
                                    ?>
                                </div>
                                <?php }?>
                            </span>
                            <h5 class="card-title mt-3"><?php echo $pro_heading; ?></h5>
                            <p class="card-text"><?php echo $pro_des; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header text-center" style="font-weight:700;">
                    Property image update
                </div>
                <div class="card-body">
                    <form action="./resource/admin/site/propertyimage_update_post.php" method="post"
                        enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Property title</label>
                                    <input type="hidden" name="id" class="form-control" value="<?php echo $user_id; ?>">
                                    <input type="text" name="photo_heading" class="form-control"
                                        value="<?php echo $pro_heading; ?>">
                                    <?php if(!empty($_GET['proimghdrr'])){ ?>
                                    <div class="alert alert-danger mt-1 mb-0" role="alert">
                                        <?php echo $_GET['proimghdrr'];?>
                                    </div>
                                    <?php }?>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Property short Description</label>
                                    <textarea type="text" name="photo_slog"
                                        class="form-control"><?php echo $pro_des; ?></textarea>
                                    <?php if(!empty($_GET['proimgddrr'])){ ?>
                                    <div class="alert alert-danger mt-1 mb-0" role="alert">
                                        <?php echo $_GET['proimgddrr'];?>
                                    </div>
                                    <?php }?>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-lg-12">
                                <label>Upload Property image</label>
                                <input type="file" name="photo_image" class="form-control" id="exampleFormControlFile1">
                                <img src="public/upload/property_image/<?php echo $proimg_photo; ?>" alt=""
                                    class="img-fluid" style="display:block; width:300px;">
                                <?php if(!empty($_GET['proimgimerr'])){ ?>
                                <div class="alert alert-danger mt-1 mb-0" role="alert">
                                    <?php echo $_GET['proimgimerr'];?>
                                </div>
                                <?php }?>
                            </div>
                            <div class="form-group col-lg-12">
                                <label for="">Select status</label>
                                <select class="form-control" name="status">
                                    <option value="<?php echo $status;?>">
                                        <?php
                                        if($status==1)
                                        {
                                            echo " Active";}
                                        else {
                                   
                                        echo " Deactive";
                                        }?>
                                    </option>
                                    <option value="1">Active</option>
                                    <option value="0">Deactive</option>
                                </select>
                            </div>
                        </div>
                        <?php if(!empty($_GET['proimgsucc'])){ ?>
                        <div class="alert alert-success mb-2" role="alert">
                            <?php echo $_GET['proimgsucc'];?>
                        </div>
                        <?php }?>
                        <div class="form-row">
                            <div class="col-lg-12">
                                <button type="submit" class="button-one">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>

<?php
require_once 'resource/layouts/footer.php';
?>
<script type="text/javascript">
document.addEventListener('DOMContentLoaded', function() {



});
</script>