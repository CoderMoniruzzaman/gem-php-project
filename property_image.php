<?php
require 'session.php';
require_once 'resource/layouts/header.php';
?>
<?php
require 'resource/db.php';
if(isset($_GET['id'])){
    $user_id= $_GET['id'];
    $status= $_GET['$status'];
    if($status==1){
        $update = "UPDATE photo SET status=0 WHERE id='$user_id'";
        $result= mysqli_query($db_conection,$update);
    }
    else{
        $update = "UPDATE photo SET status=1 WHERE id= $user_id";
        $result= mysqli_query($db_conection,$update);
    }
}
$select_property_image = " SELECT * FROM photo";
$property_image_result = mysqli_query($db_conection, $select_property_image);

?>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header text-center" style="font-weight:700;">
                    Property image form
                </div>
                <div class="card-body">
                    <form action="./resource/admin/site/propertyimage_post.php" method="post"
                        enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Property title</label>
                                    <input type="text" name="photo_heading" class="form-control"
                                        placeholder="Please enter property heading">
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
                                    <textarea type="text" name="photo_slog" class="form-control"></textarea>
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
                                <?php if(!empty($_GET['proimgimerr'])){ ?>
                                <div class="alert alert-danger mt-1 mb-0" role="alert">
                                    <?php echo $_GET['proimgimerr'];?>
                                </div>
                                <?php }?>
                            </div>
                            <div class="form-group col-lg-12">
                                <label for="">Select status</label>
                                <select class="form-control" name="status">
                                    <option value="">Select Status</option>
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
                                <button type="submit" class="button-one">submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card ">
                <div class="card-header text-center">
                    Property image table
                </div>
                <div class="card-body">
                    <table id="propertyimgTable" class="table table-bordered">
                        <thead class="bg-light text-capitalize">
                            <tr>
                                <th>Serial</th>
                                <th>Banner heading</th>
                                <th>Banner Slogan</th>
                                <th>Banner Image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach ($property_image_result as $value) {
                            ?>
                            <tr>
                                <td><?php echo $value['id']; ?></td>
                                <td>
                                    <?php echo substr($value['photo_heading'], 0, 20).((strlen($value['photo_heading']) > 20)? '...' :''); ?>
                                </td>
                                <td>
                                    <?php echo substr($value['photo_slog'], 0, 10).((strlen($value['photo_slog']) > 10)? '...' :''); ?>
                                </td>
                                <td>
                                    <img src="public/upload/property_image/<?php echo $value['photo_image']; ?>"
                                        width="50">
                                </td>
                                <td>
                                    <?php
                                        if($value['status']==1)
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
                                </td>
                                <td>
                                    <a href="property_image.php?id=<?php echo $value['id'];?> & $status=<?php echo $value['status'];
                                    ?>">
                                        <button type="submit" class="
                                            <?php
                                                if($value['status']==1)
                                                    echo "btn btn-danger btn-sm";
                                                else 
                                                    echo "btn btn-warning btn-sm";
                                            ?>">
                                            <?php
                                                if($value['status']==1)
                                                    echo "Deactive";
                                                else 
                                                echo "Active";
                                            ?>
                                        </button>
                                    </a>
                                    <?php
                                    if($value['status']==0){ ?>
                                    <a href="resource/admin/site/propertyimage_delete.php?id=<?php echo $value['id'];?>"
                                        class="btn btn-danger btn-sm">Delete</a>
                                    <?php } ?>
                                    <a href="propertyimage_update.php?id=<?php echo $value['id'];?>"
                                        class="btn btn-info btn-sm">update</a>
                                </td>
                            </tr>
                            <?php } ?>

                        </tbody>
                    </table>
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

    $('#propertyimgTable').DataTable();

});
</script>