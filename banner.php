<?php
require 'session.php';
require_once 'resource/layouts/header.php';
?>
<?php
require 'resource/db.php';

?>

<?php
if(isset($_GET['id'])){
    $status_id= $_GET['id'];
    $status= $_GET['$status'];
    if($status==1){
        $update = "UPDATE banner SET status=0";
        $result= mysqli_query($db_conection,$update);
    }
    else{
        $update = "UPDATE banner SET status=0";
        $result= mysqli_query($db_conection,$update);
        $update = "UPDATE banner SET status=1 WHERE id= $status_id";
        $result= mysqli_query($db_conection,$update);
    }
}
$select_banner = " SELECT * FROM banner";
$banner_result = mysqli_query($db_conection, $select_banner);

?>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header text-center" style="font-weight:700;">
                    Banner form
                </div>
                <div class="card-body">
                    <form action="./resource/admin/site/banner_post.php" method="post" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label> banner title</label>
                                    <input type="text" name="banner_heading" class="form-control"
                                        placeholder="Please enter banner heading">
                                    <?php if(!empty($_GET['banhdrr'])){ ?>
                                    <div class="alert alert-danger mt-1 mb-0" role="alert">
                                        <?php echo $_GET['banhdrr'];?>
                                    </div>
                                    <?php }?>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label> banner slogan</label>
                                    <input type="text" name="banner_slog" class="form-control"
                                        placeholder="Please enter banner slogan">
                                    <?php if(!empty($_GET['banslgdrr'])){ ?>
                                    <div class="alert alert-danger mt-1 mb-0" role="alert">
                                        <?php echo $_GET['banslgdrr'];?>
                                    </div>
                                    <?php }?>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-lg-12">
                                <label>Upload banner image</label>
                                <input type="file" name="banner_image" class="form-control"
                                    id="exampleFormControlFile1">
                                <?php if(!empty($_GET['banimerr'])){ ?>
                                <div class="alert alert-danger mt-1 mb-0" role="alert">
                                    <?php echo $_GET['banimerr'];?>
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
                        <?php if(!empty($_GET['bansucc'])){ ?>
                        <div class="alert alert-success mb-2" role="alert">
                            <?php echo $_GET['bansucc'];?>
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
                    logo table
                </div>
                <div class="card-body">
                    <table id="bannerTable" class="table table-bordered">
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
                                foreach ($banner_result as $value) {
                            ?>
                            <tr>
                                <td><?php echo $value['id']; ?></td>
                                <td>
                                    <?php echo substr($value['banner_heading'], 0, 20).((strlen($value['banner_heading']) > 20)? '...' :''); ?>
                                </td>
                                <td>
                                    <?php echo substr($value['banner_slog'], 0, 10).((strlen($value['banner_slog']) > 10)? '...' :''); ?>
                                </td>
                                <td>
                                    <img src="public/upload/banner/<?php echo $value['banner_image']; ?>" width="50">
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
                                    <a href="banner.php?id=<?php echo $value['id'];?> & $status=<?php echo $value['status'];
                                    ?>">
                                        <button type="submit" class="
                                            <?php
                                                if($value['status']==1)
                                                    echo "btn btn-danger";
                                                else 
                                                    echo "btn btn-warning";
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
                                    <a href="resource/admin/site/banner_delete.php?id=<?php echo $value['id'];?>"
                                        class="btn btn-danger">Delete</a>
                                    <?php } ?>
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

    $('#bannerTable').DataTable();

});
</script>