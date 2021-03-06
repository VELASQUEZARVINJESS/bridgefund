<div class="content">
    <div class="section">
        <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
				<div class="info-box">
					<span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>
					<div class="info-box-content">
						<span class="info-box-text">Borrowers</span>
						<span class="info-box-number borrowers">0</span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
				<div class="info-box">
					<span class="info-box-icon bg-danger elevation-1"><i class="fas fa-file-invoice-dollar"></i></span>
					<div class="info-box-content">
						<span class="info-box-text">Active Loans</span>
						<span class="info-box-number loans">0</span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
				<div class="info-box">
					<span class="info-box-icon bg-success elevation-1"><i class="fas fa-bell"></i></span>
					<div class="info-box-content">
						<span class="info-box-text">Penalty</span>
						<span class="info-box-number penalty">0</span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
				<div class="info-box">
					<span class="info-box-icon bg-warning elevation-1"><i class="fas fa-piggy-bank"></i></span>
					<div class="info-box-content">
						<span class="info-box-text">Bank</span>
						<span class="info-box-number account_balance">0</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

	<div class="section">
		<div class="row">
			<div class="col-12 col-md-4">
				<div class="card">
					<div class="card-header"><strong>Counter</strong></div>
					<div class="card-bodyr">
						<canvas id="pieChart" height="161" width="322" class="chartjs-render-monitor mt-3"></canvas>
					</div>
					<div class="card-footer bg-white p-0">
						<ul class="nav nav-pills flex-column">
							<li class="nav-item">
								<a href="#" class="nav-link">
									Approved
									<span class="float-right text-danger">
										<span class="approve">0</span>
									</span>
								</a>
							</li>
							<li class="nav-item">
								<a href="#" class="nav-link">
									Pending
									<span class="float-right text-success">
										<span class="pending">0</span>
									</span>
								</a>
							</li>
							<li class="nav-item">
								<a href="#" class="nav-link">
									Declined
									<span class="float-right text-warning">
										<span class="decline">0</span>
									</span>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-12 col-md-4">
				<div class="card collection">
					<div class="card-header"><strong>For Collection</strong></div>
					<div class="card-body">
						<ul class="products-list product-list-in-card pl-2 pr-2"></ul>
					</div>
				</div>
			</div>
			<div class="col-12 col-md-4">
				<div class="card recentTrans">
					<div class="card-header"><strong>Recent Activity</strong></div>
					<div class="card-body">
						<ul class="products-list product-list-in-card pl-2 pr-2"></ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php include_once PATH_PRT.'modal_payment.php'; ?>
</div>