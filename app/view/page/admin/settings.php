<?php if ($_SESSION['app']['level'] == 0) { ?>
<div class="userEmployee">
    <div class="row">
        <div class="col-4 d-print-none">
                <div class="card">
                <div class="card-header bg-dark">
                     USER MANAGEMENT
                        <div class="card-tools">
                            <a href="#" class="btn btn-tool btn-secondary" data-toggle="modal" data-target="#addEmployee"><i class="fas fa-plus"></i> ADD USER </a>
                        </div>
                </div>
                <div class="card-table table-responsive p-2 ">
                    <table class="table table-hover table-sm table-bordered">
                        <thead>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Level</th>
                            <th class="d-print-none text-center">Action</th>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include_once PATH_PRT.'modal_nemployee.php'; ?>
<?php } else { include_once PATH_PGE.'404.php'; }?>