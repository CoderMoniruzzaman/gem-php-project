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
        $update = "UPDATE logo SET status=0";
        $result= mysqli_query($db_conection,$update);
    }
    else{
        $update = "UPDATE logo SET status=0";
        $result= mysqli_query($db_conection,$update);
        $update = "UPDATE logo SET status=1 WHERE id= $status_id";
        $result= mysqli_query($db_conection,$update);
        // header('location:logo.php');
    }
}
$select_logo = " SELECT * FROM logo";
$logo_result = mysqli_query($db_conection, $select_logo);

?>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header text-center" style="font-weight:700;">
                    Logo form
                </div>
                <div class="card-body">
                    <form action="./resource/admin/site/logo_post.php" method="post" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="form-group col-lg-12">
                                <label>Upload Logo</label>
                                <input type="file" name="logo" class="form-control" id="exampleFormControlFile1">
                                <?php if(!empty($_GET['logoerr'])){ ?>
                                <div class="alert alert-danger mt-1 mb-0" role="alert">
                                    <?php echo $_GET['logoerr'];?>
                                </div>
                                <?php }?>
                            </div>
                            <div class="form-group col-lg-12">
                                <label for="">Select Logo status</label>
                                <select class="form-control" name="status">
                                    <option value="">Select Status</option>
                                    <option value="1">Active</option>
                                    <option value="0">Deactive</option>
                                </select>
                            </div>
                        </div>
                        <?php if(!empty($_GET['logosucc'])){ ?>
                        <div class="alert alert-success mb-2" role="alert">
                            <?php echo $_GET['logosucc'];?>
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
                    <table id="logoTable" class="table table-bordered">
                        <thead class="bg-light text-capitalize">
                            <tr>
                                <th>Serial</th>
                                <th>Logo</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach ($logo_result as $value) {
                            ?>
                            <tr>
                                <td><?php echo $value['id']; ?></td>
                                <td><img src="public/upload/logo/<?php echo $value['logo']; ?>" width="50"></td>
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
                                    <a href="logo.php?id=<?php echo $value['id'];?> & $status=<?php echo $value['status'];
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
                                    <a href="resource/admin/site/logo_delete.php?id=<?php echo $value['id'];?>"
                                        class="btn btn-danger">Delete</a>
                                    <?php } ?>
                                </td>
                            </tr>
                            <?php }?>
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

    $('#logoTable').DataTable();

});
</script>