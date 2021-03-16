<?php
require 'session.php';
require_once 'resource/layouts/header.php';
?>
<?php
require 'resource/db.php';

$user_id = $_GET['id'];
$select_query = "SELECT * FROM client WHERE id=$user_id";
$db_return = mysqli_query($db_conection, $select_query);
$after_assoc = mysqli_fetch_assoc($db_return);
$client_name = $after_assoc['name'];
$review = $after_assoc['description'];
$photo = $after_assoc['image'];
$status = $after_assoc['status'];



?>
<div class="page-title-area mb-5">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="breadcrumbs-area clearfix">
                <ul class="breadcrumbs pull-left">
                    <li><a href="dashboard.php">Dashboard</a></li>
                    <li><a href="client.php">Client</a></li>
                    <li><span>Client update</span></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-4">
            <div class="card ">
                <div class="card-header text-center">
                    Property image
                </div>
                <div class="card-body">
                    <div class="card" style="width: 100%">
                        <img class="card-img-top img-fluid" src="public/upload/client/<?php echo $photo; ?>"
                            alt="Card image cap" style="height: 400px">
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
                            <h5 class="card-title mt-3"><?php echo $client_name; ?></h5>
                            <p class="card-text pt-2"><?php echo $review; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="card">
                <div class="card-header" style="font-weight:700;">
                    Cilent update
                </div>
                <div class="card-body">
                    <form action="./resource/admin/site/client_update_post.php" method="post"
                        enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input type="hidden" name="id" class="form-control" value="<?php echo $user_id; ?>">
                                    <label> Client name</label>
                                    <input type="text" name="name" class="form-control"
                                        value="<?php echo $client_name; ?>">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Client review</label>
                                    <textarea name="description" class="form-control" id="exampleFormControlTextarea1"
                                        rows="3"><?php echo $review; ?></textarea>
                                    <label> </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-lg-12">
                                <label>Upload client image</label>
                                <input type="file" name="image" class="form-control" id="exampleFormControlFile1">
                                <img src="public/upload/client/<?php echo $photo; ?>" alt="" class="img-fluid"
                                    style="display:block; width:200px;">
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
    </div>
</div>

<?php
require_once 'resource/layouts/footer.php';
?>

</script>