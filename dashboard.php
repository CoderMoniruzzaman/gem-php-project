<?php
require 'session.php';
require_once 'resource/layouts/header.php';
?>
<?php
require 'resource/db.php';
?>

<div class="container">
    <div class="row">
        <div class="col-lg-12 m-auto">
            <div class="card text-center">
                <div class="card-header">
                    Dasboard
                </div>
                <div class="card-body">
                    <h6>You are admin</h6>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require_once 'resource/layouts/footer.php';
?>