
<div class="userEmployee">
    <div class="row">
        <div class="col-6 d-print-none">
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
                            <th class="text-center">ID</th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Level</th>
                            <th class="d-print-none text-center">Action</th>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div><!-- ./card -->
        </div><!-- ./col-12 -->
    </div><!-- ./row -->
</div><!-- ./userEmployee -->

<!-- MODAL LINK EMPLOYEE REGISTRATION -->
<?php include_once PATH_PRT.'modal_nemployee.php'; ?>