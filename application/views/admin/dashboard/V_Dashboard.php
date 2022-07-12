<div id="content" class="p-4 p-md-5 pt-5">
    <h2 class="mb-4">Dashboard</h2>

    <div class="container-fluid">
        <div class="row">
            <!-- Start User Total -->
            <div class="col-md-4">
                <div class="card" style="border-radius: 40px; border: 3px solid #007bff;">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="align-self-center">
                                    <i class="fa fa-user-o fa-4x fa-primary" style="color: #007bff;"></i>
                                </div>
                                <div class="media-body text-right">
                                    <h3>278</h3>
                                    <span>Total Users</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End User Total -->

            <!-- Start Book Total -->
            <div class="col-md-4">
                <div class="card" style="border-radius: 40px; border: 3px solid #007bff;">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="align-self-center">
                                    <i class="fa fa-book fa-4x fa-primary" style="color: #007bff;"></i>
                                </div>
                                <div class="media-body text-right">
                                    <h3>898</h3>
                                    <span>Total Books</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Book Total -->

            <!-- Start Book Total -->
            <div class="col-md-4">
                <div class="card" style="border-radius: 40px; border: 3px solid #007bff;">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="align-self-center">
                                    <i class="fa fa-line-chart fa-4x fa-primary" style="color: #007bff;"></i>
                                </div>
                                <div class="media-body text-right">
                                    <h3>88 %</h3>
                                    <span>Traffic</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Book Total -->
        </div>

        <br>

        <!-- Start User Activity Graphics -->
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h5 class="card-title">Grafik User Activity</h5>
                    </div>
                    <div class="card-body">
                        <div class="chart">
                            <canvas id="areaChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End User Activity Graphics -->

        <br>

        <div class="row">
            <!-- Start Book Read Percentage -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Book Percentage</h5>
                    </div>
                    <div class="card-body">
                        <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                    </div>
                </div>
            </div>
            <!-- End Book Read Percentage -->

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Monthly Report</h5>
                    </div>
                    <div class="card-body">
                        <div class="card card-success">
                            <div class="chart">
                                <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        
        <br>

        <!-- Start Top 10 Book -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Top 10 Book</h5>
                    </div>
                    <div class="card-body">
                        <table id="dashboard_table_top_20_book" class="table table-stripped table-bordered">
                            <thead class="bg-primary">
                                <tr>
                                    <th width="5%" class="text-center">No.</th>
                                    <th width="40%" class="text-center">Book Name</th>
                                    <th width="30%" class="text-center">Total Read</th>
                                    <th width="25%" class="text-center">Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Top 10 Book -->

    </div>


</div>

</div>