<div class="borrower-list">
    <div class="card card-primary">
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Borrower ID or Name" />
                        <div class="input-group-append">
                            <button class="btn btn-primary">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="btn-group">
                        <button class="btn btn-success newborrower">NEW BORROWER</button>
                        <!-- <button class="btn btn-success">BORROWER</button> -->
                    </div>
                </div>
            </div><br>
            <table class="table table-striped table-sm table-dark">
                <thead>
                    <th>ID</th>
                    <th>BORROWER</th>
                    <th>GENDER</th>
                    <th>EMAIL</th>
                    <th>MOBILE</th>
                    <th>ACTION</th>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
</div>
<?php include_once PATH_PRT.'modal_borrower_details.php'; ?>
<style type="text/css">
    .borrower-list table td:last-of-type{width: 9em;}
    .borrower-list table td:first-of-type{font-weight: bold;}
    table > thead th, table > tbody td{text-align:center;vertical-align: middle !important;}
    @media print {
        .borrower-list table td:last-of-type,.borrower-list table th:last-of-type{display: none;}
    }
</style>