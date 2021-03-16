<?php
require 'session.php';
require_once 'resource/layouts/header.php';
?>
<?php
require 'resource/db.php';
if(isset($_GET['id'])){
    $status_id= $_GET['id'];
    $status= $_GET['$status'];
    if(!$status){
        $update = "UPDATE contact SET status=0";
        $result= mysqli_query($db_conection,$update);
        $update = "UPDATE contact SET status=1 WHERE id= $status_id";
        $result= mysqli_query($db_conection,$update);
    }
}

$select_contact = " SELECT * FROM contact";
$contact_result = mysqli_query($db_conection, $select_contact);
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header text-center" style="font-weight:700;">
                    Contact
                </div>
                <div class="card-body">
                    <form action="./resource/admin/site/conact_post.php" method="post" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Company Address</label>
                                    <input type="text" name="address" class="form-control"
                                        placeholder="Please enter address">
                                    <?php if(!empty($_GET['addressrr'])){ ?>
                                    <div class="alert alert-danger mt-1 mb-0" role="alert">
                                        <?php echo $_GET['addressrr'];?>
                                    </div>
                                    <?php }?>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label> Phone</label>
                                    <input type="text" name="phone" class="form-control"
                                        placeholder="Please enter phone number">
                                    <?php if(!empty($_GET['phoneerr'])){ ?>
                                    <div class="alert alert-danger mt-1 mb-0" role="alert">
                                        <?php echo $_GET['phoneerr'];?>
                                    </div>
                                    <?php }?>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label> Email</label>
                                    <input type="email" name="email" class="form-control"
                                        placeholder="Please enter email">
                                    <?php if(!empty($_GET['emailerr'])){ ?>
                                    <div class="alert alert-danger mt-1 mb-0" role="alert">
                                        <?php echo $_GET['emailerr'];?>
                                    </div>
                                    <?php }?>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Website</label>
                                    <input type="text" name="web" class="form-control"
                                        placeholder="Please enter Website">
                                    <?php if(!empty($_GET['weberr'])){ ?>
                                    <div class="alert alert-danger mt-1 mb-0" role="alert">
                                        <?php echo $_GET['weberr'];?>
                                    </div>
                                    <?php }?>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-lg-12">
                                <label>Upload contact cover image</label>
                                <input type="file" name="conact_image" class="form-control"
                                    id="exampleFormControlFile1">
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
                    Contact table
                </div>
                <div class="card-body">
                    <table id="contactTable" class="table table-bordered">
                        <thead class="bg-light text-capitalize">
                            <tr>
                                <th>Serial</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Mail</th>
                                <th>Website</th>
                                <th>Cover Image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach ($contact_result as $value) {
                            ?>
                            <tr>
                                <td><?php echo $value['id']; ?></td>
                                <td><?php echo $value['address']; ?></td>
                                <td><?php echo $value['phone']; ?></td>
                                <td><?php echo $value['email']; ?></td>
                                <td><?php echo $value['web']; ?></td>
                                <td>
                                    <img src="public/upload/contact/<?php echo $value['conact_image']; ?>" width="50">
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
                                    <a href="contact.php?id=<?php echo $value['id'];?> & $status=<?php echo $value['status'];
                                    ?>">
                                        <button type="submit" class="
                                            <?php
                                                if($value['status']==1)
                                                    echo "btn btn-success";
                                                else 
                                                    echo "btn btn-warning mt-2";
                                            ?>">
                                            <?php
                                                if($value['status']==1)
                                                    echo "Published";
                                                else 
                                                echo "Active";
                                            ?>
                                        </button>
                                    </a>
                                    <?php
                                    if($value['status']==0){ ?>
                                    <a href="resource/admin/site/contact_delete.php?id=<?php echo $value['id'];?>"
                                        class="btn btn-danger mt-2">Delete</a>
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
    $('#contactTable').DataTable();
});
</script>