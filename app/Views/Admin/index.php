<div class="col-lg-12  col-md-12 col-sm-12">
    <div class="card shadow-sm card-statistic-2">
        <div class="card-stats">
            <div class="card-stats-title">
                <!-- Order Statistics -
                <div class="dropdown d-inline">
                    <a class="font-weight-600 dropdown-toggle" data-toggle="dropdown" href="#" id="orders-month">August</a>
                    <ul class="dropdown-menu dropdown-menu-sm">
                        <li class="dropdown-title">Select Month</li>
                        <li><a href="#" class="dropdown-item">January</a></li>
                        <li><a href="#" class="dropdown-item">February</a></li>
                        <li><a href="#" class="dropdown-item">March</a></li>
                        <li><a href="#" class="dropdown-item">April</a></li>
                        <li><a href="#" class="dropdown-item">May</a></li>
                        <li><a href="#" class="dropdown-item">June</a></li>
                        <li><a href="#" class="dropdown-item">July</a></li>
                        <li><a href="#" class="dropdown-item active">August</a></li>
                        <li><a href="#" class="dropdown-item">September</a></li>
                        <li><a href="#" class="dropdown-item">October</a></li>
                        <li><a href="#" class="dropdown-item">November</a></li>
                        <li><a href="#" class="dropdown-item">December</a></li>
                    </ul>
                </div> -->
            </div>
            <div class="card-stats-items">
                <div class="card-stats-item">
                    <div class="card-stats-item-count text-danger"><?= $hitkel; ?></div>
                    <div class="card-stats-item-label">Pending</div>
                </div>
                <div class="card-stats-item">
                    <div class="card-stats-item-count"><?= $hitkel; ?></div>
                    <div class="card-stats-item-label">Complain</div>
                </div>
                <div class="card-stats-item">
                    <div class="card-stats-item-count"><?= $hitper; ?></div>
                    <div class="card-stats-item-label">Completed</div>
                </div>
            </div>
        </div>
        <div class="card-icon shadow-primary bg-primary">
            <i class="fas fa-archive"></i>
        </div>
        <div class="card-wrap">
            <div class="card-header">
                <h4>Total Orders</h4>
            </div>
            <div class="card-body"><?= $hitkel + $hitper; ?></div>
        </div>
    </div>
</div>
<div class="col-lg-6 col-md-6 col-sm-6">
    <a href="<?= base_url("Keluhan"); ?>" class="card btn-info btn shadow card-statistic-2">
        <div class="card-chart">
            <canvas id="sales-chart" height="80"></canvas>
        </div>
        <div class="card-icon shadow-primary bg-primary">
            <i class="fas fa-shopping-bag"></i>
        </div>
        <div href='<?= base_url('Keluhan'); ?>' class="card-body ">More Information!</div>
        <h4>Data Keluhan</h4>
        <div class="card-wrap">
            <div class="card-header">
            </div>
        </div>
    </a>
</div>
<div class="col-lg-6 col-md-6 col-sm-6">
    <a href="<?= base_url("Perbaikan"); ?>" class="card btn-info btn shadow card-statistic-2">
        <div class="card-chart">
            <canvas id="sales-chart" height="80"></canvas>
        </div>
        <div class="card-icon shadow-primary bg-primary">
            <i class="fas fa-shopping-bag"></i>
        </div>
        <div href='<?= base_url('Perbaikan'); ?>' class="card-body ">More Information!</div>
        <h4>Data Perbaikan</h4>
        <div class="card-wrap">
            <div class="card-header">
            </div>
        </div>
    </a>
</div>