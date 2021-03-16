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
        $update = "UPDATE viewproperty SET status=0 WHERE id='$user_id'";
        $result= mysqli_query($db_conection,$update);
    }
    else{
        $update = "UPDATE viewproperty SET status=1 WHERE id= $user_id";
        $result= mysqli_query($db_conection,$update);
    }
}

$select_viewproperty = " SELECT * FROM viewproperty";
$viewproperty_result = mysqli_query($db_conection, $select_viewproperty);

?>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-3">
            <div class="card">
                <div class="card-header text-center" style="font-weight:700;">
                    Property add
                </div>
                <div class="card-body">
                    <form action="./resource/admin/site/property_post.php" method="post" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Property price</label>
                                    <input type="text" name="price" class="form-control">
                                    <?php if(!empty($_GET['propertyprerr'])){ ?>
                                    <div class="alert alert-danger mt-1 mb-0" role="alert">
                                        <?php echo $_GET['propertyprerr'];?>
                                    </div>
                                    <?php }?>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Property union</label>
                                    <input type="text" name="union" class="form-control">
                                    <?php if(!empty($_GET['propertyuerr'])){ ?>
                                    <div class="alert alert-danger mt-1 mb-0" role="alert">
                                        <?php echo $_GET['propertyuerr'];?>
                                    </div>
                                    <?php }?>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Property address</label>
                                    <input type="text" name="address" class="form-control">
                                    <?php if(!empty($_GET['propertyaderr'])){ ?>
                                    <div class="alert alert-danger mt-1 mb-0" role="alert">
                                        <?php echo $_GET['propertyaderr'];?>
                                    </div>
                                    <?php }?>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Property link</label>
                                    <input type="text" name="link" class="form-control">
                                    <?php if(!empty($_GET['propertylerr'])){ ?>
                                    <div class="alert alert-danger mt-1 mb-0" role="alert">
                                        <?php echo $_GET['propertylerr'];?>
                                    </div>
                                    <?php }?>
                                </div>
                            </div>
                            <div class="form-group col-lg-12">
                                <label>Property image</label>
                                <input type="file" name="image" class="form-control" id="exampleFormControlFile1">
                                <?php if(!empty($_GET['propertyimerr'])){ ?>
                                <div class="alert alert-danger mt-1 mb-0" role="alert">
                                    <?php echo $_GET['propertyimerr'];?>
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
                        <?php if(!empty($_GET['propertysucc'])){ ?>
                        <div class="alert alert-success mb-2" role="alert">
                            <?php echo $_GET['propertysucc'];?>
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

        <div class="col-lg-9">
            <div class="card ">
                <div class="card-header text-center">
                    Property table
                </div>
                <div class="card-body">
                    <table id="propertyTable" class="table table-bordered">
                        <thead class="bg-light text-capitalize">
                            <tr>
                                <th>Serial</th>
                                <th>Property image</th>
                                <th>Property price</th>
                                <th>Property Union</th>
                                <th>Property Address</th>
                                <th>Property Link</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach ($viewproperty_result as $value) {
                            ?>
                            <tr>
                                <td><?php echo $value['id']; ?></td>
                                <td><img src="public/upload/property/<?php echo $value['image']; ?>" width="100">
                                </td>
                                <td><?php echo $value['price']; ?></td>
                                <td><?php echo $value['union']; ?></td>
                                <td><?php echo $value['address']; ?></td>
                                <td><?php echo substr($value['link'], 0, 10).((strlen($value['link']) > 10)? '...' :''); ?>
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
                                    <a href="property.php?id=<?php echo $value['id'];?> & $status=<?php echo $value['status'];
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
                                    <a href="resource/admin/site/property_delete.php?id=<?php echo $value['id'];?>"
                                        class="btn btn-danger btn-sm mt-2">Delete</a>
                                    <?php } ?>
                                    <a href="property_update.php?id=<?php echo $value['id'];?>"
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

    $('#propertyTable').DataTable();

});
</script>