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
        $update = "UPDATE client SET status=0 WHERE id='$user_id'";
        $result= mysqli_query($db_conection,$update);
    }
    else{
        $update = "UPDATE client SET status=1 WHERE id= $user_id";
        $result= mysqli_query($db_conection,$update);
    }
}


$select_client = " SELECT * FROM client";
$client_result = mysqli_query($db_conection, $select_client);

?>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header text-center" style="font-weight:700;">
                    Cilent add
                </div>
                <div class="card-body">
                    <form action="./resource/admin/site/client_post.php" method="post" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label> Client name</label>
                                    <input type="text" name="name" class="form-control"
                                        placeholder="Please enter client name">
                                    <?php if(!empty($_GET['namrr'])){ ?>
                                    <div class="alert alert-danger mt-1 mb-0" role="alert">
                                        <?php echo $_GET['namrr'];?>
                                    </div>
                                    <?php }?>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label> Client review</label>
                                    <textarea type="text" name="description" class="form-control" rows="5"></textarea>
                                    <?php if(!empty($_GET['reviewerr'])){ ?>
                                    <div class="alert alert-danger mt-1 mb-0" role="alert">
                                        <?php echo $_GET['reviewerr'];?>
                                    </div>
                                    <?php }?>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-lg-12">
                                <label>Upload client image</label>
                                <input type="file" name="image" class="form-control" id="exampleFormControlFile1">
                                <?php if(!empty($_GET['imageerr'])){ ?>
                                <div class="alert alert-danger mt-1 mb-0" role="alert">
                                    <?php echo $_GET['imageerr'];?>
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
                        <?php if(!empty($_GET['succ'])){ ?>
                        <div class="alert alert-success mb-2" role="alert">
                            <?php echo $_GET['succ'];?>
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
                    Client table
                </div>
                <div class="card-body">
                    <table id="clientTable" class="table table-bordered">
                        <thead class="bg-light text-capitalize">
                            <tr>
                                <th>Serial</th>
                                <th>Name</th>
                                <th>Review</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach ($client_result as $value) {
                            ?>
                            <tr>
                                <td><?php echo $value['id']; ?></td>
                                <td><?php echo $value['name']; ?></td>
                                <td><?php echo substr($value['description'], 0, 10).((strlen($value['description']) > 10)? '...' :''); ?>
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
                                <td><img src="public/upload/client/<?php echo $value['image']; ?>" width="100"></td>
                                <td>
                                    <a href="client.php?id=<?php echo $value['id'];?> & $status=<?php echo $value['status'];
                                    ?>">
                                        <button type="submit" class="
                                            <?php
                                                if($value['status']==1)
                                                    echo "btn btn-danger btn-sm mt-2";
                                                else 
                                                    echo "btn btn-warning btn-sm mt-2";
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
                                    <a href="resource/admin/site/client_delete.php?id=<?php echo $value['id'];?>"
                                        class="btn btn-danger btn-sm mt-2">Delete</a>
                                    <?php } ?>
                                    <a href="client_update.php?id=<?php echo $value['id'];?>"
                                        class="btn btn-info btn-sm mt-2">update</a>
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

    $('#clientTable').DataTable();

});
</script>