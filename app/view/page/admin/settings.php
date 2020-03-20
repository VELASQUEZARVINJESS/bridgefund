


<!-- ------------------------------------------------------EMPLOYEE----------------------------------------------------------------------- -->

<div class="userEmployee">
    <div class="row">
        <div class="col-6">
            <div class="card">
               <div class="card-header bg-dark">
                <h6 class="card-title"> USER MANAGEMENT</h6>
                    <div class="card-tools">
                         <a href="#" class="btn btn-tool btn-secondary" data-toggle="modal" data-target="#addEmployee"><i class="fas fa-plus"></i> ADD USER </a>
                    </div>
              </div>
              <div class="card-table table-responsive p-2 ">
                <table class="table table-hover table-sm table-bordered">
                    <th>#</th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Level</th>
                    <th class="text-center">Action</th>
                </table>
              </div>
            </div><!-- ./card -->
        </div>   <!-- ./col -->

            <div class="col-2">
                <div class="card">
                    <div class="card-header bg-dark">
                        SETTINGS
                        <div class="card-tools">
                            <button class="btn btn-tool btn-secondary"> <i class="fas fa-cog"></i> OPTION</button>
                        </div>
                    </div>

                    <div class="card-body table-responsive p-2">
                        <table class="table table-hover table-sm table-bordered">
                           <th>Fees</th>
                            <th class="text-center">Amout</th>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </div>
</div>

<!-- -------------------------------------------------------BANK ACCOUNT------------------------------------------------------------- -->
 <div class="bankAccount">
    <div class="row">
        <div class="col-10">
            <div class="card">
                <div class="card-header bg-dark">
                    <h6 class="card-title">BRIDGEFUND ACCOUNT</h6>
                        <div class="card-tools">
                            <a href="#" class="btn btn-tool btn-secondary">
                                <i class="fas fa-print"></i> PRINT
                            </a>
                                <a href="#" class="btn btn-tool btn-secondary">
                                    <i class="fas fa-donate"></i> Deposite
                                </a>
                        </div>
                    </div>
                <div class="card-body table-responsive p-2">
                    <div class="tools">
                        <div class="row">
                            <div class="col-12">
                                <div class="card-body float-right">
                                    <div class="input-group input-group-sm">
                                       <input type="text" name="table_search" class="form-control" placeholder="Search">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-sm btn-success"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <table class="table table-hover table-sm table-bordered">
                        <th>#</th>
                        <th>ID</th>
                        <th>Amount</th>
                        <th>Type</th>
                        <th>Description</th>
                        <th>Add By</th>
                        <th class="text-center">Date</th>
                        <th class="text-center">Action</th>
                            <tbody>
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div> 

<?php include_once PATH_PRT.'modal_nemployee.php'; ?>