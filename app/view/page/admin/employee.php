<div class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
               <div class="card-header bg-gradient-dark">
                <h6 class="card-title"><i class="fas fas fa-circle nav-icon text-primary"></i><b> USER MANAGEMENT</b></h6>
                    <div class="card-tools">
                        <a href="#" class="btn btn-tool btn-secondary" data-toggle="modal" data-target="#addEmployee"><i class="fas fa-plus"></i> ADD USER </a>
                    </div>
              </div>

              <div class="card-table table-responsive p-2 ">
              <div class="tools">
                        <div class="row">
                            <div class="col-4">
                                <div class="card-body">
                                    <h6 class="card-title text-blue"><b>TOTAL USER</b>:  <span class="text-muted">0</span></h6>
                                </div>
                            </div>

                            <div class="col-8">
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

                <table class="table table-hover table-bordered">
                    <th>#</th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>No.</th>
                    <th>Username</th>
                    <th>Role</th>
                    <th class="text-center">Action</th>
                </table>
              </div>
            </div><!-- ./card -->
        </div>
    </div><!-- ./row -->
</div><!-- ./content -->


<!-- MODAL -->

<div class="modal fade" id="addEmployee" tabindex="-1" role="dialog" aria-labeledby="depositeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title "><b>NEW EMPLOYEE</b></h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <div class="row">
                       <div class="col-12">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-sm" placeholder="First Name">
                            </div>
                       </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-sm" placeholder="Last Name">
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-sm" placeholder="Middle Name">
                            </div>
                        </div>
                    </div>
                    <!-- ./row -->

                    <div class="row">
                        <div class="col-3">
                            <div class="form-group">
                                <input type="number" placeholder="Age" class="form-control form-control-sm" name="" id="">
                            </div>
                        </div>

                        <div class="col-4">
                                <select class="form-control form-control-sm" placeholder="Gender" name="" id="">
                                    <option value="MALE">MALE</option>
                                    <option value="FEMALE">FEMALE</option>
                                </select>
                        </div>

                        <div class="col-4">
                            
                        </div>
                    </div>

                    <hr class="style1">
                    
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    hr.style1{
	border-top: 1px solid #8c8b8b;
}
</style>