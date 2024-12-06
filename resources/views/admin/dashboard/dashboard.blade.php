@include('admin.adminLayout.header')
<!-- Page header -->
<div class="page-header page-header-default">
    <div class="page-header-content">
        <div class="page-title">
            <h4><span class="text-semibold">Dashboard</span></h4>
        </div>

        <!--<div class="heading-elements">-->
        <!--    <a href="#" class="btn btn-labeled btn-labeled-right bg-blue heading-btn">Button <b><i class="icon-menu7"></i></b></a>-->
        <!--</div>-->
    </div>
</div>
<!-- /page header -->
<!-- Content area -->
<div class="content">
    <div class="row">
        <div class="col-md-3">
            <div class="panel bg-green-400">
                <div class="panel-body">
                    <div class="heading-elements">
                        <ul class="icons-list">
                            <li><a data-action="reload"></a></li>
                        </ul>
                    </div>
                    <h3 class="no-margin">₹{{ $todaySalesInr->amount ? $todaySalesInr->amount : 0 }}</h3>
                    Today's Sales In INR
                    <div class="text-muted text-size-small">{{ $todaySalesInr->totalSales }} Orders</div>
                </div>
            </div>

            <div class="panel bg-success-300">
                <div class="panel-body">
                    <div class="heading-elements">
                        <ul class="icons-list">
                            <li><a data-action="reload"></a></li>
                        </ul>
                    </div>
                    <h3 class="no-margin">₹{{ $last7SalesInr->amount ? $last7SalesInr->amount : 0 }}</h3>
                    Last 7 Days Sales In INR
                    <div class="text-muted text-size-small">{{ $last7SalesInr->totalSales }} Orders</div>
                </div>
            </div>

            <div class="panel bg-teal-300">
                <div class="panel-body">
                    <div class="heading-elements">
                        <ul class="icons-list">
                            <li><a data-action="reload"></a></li>
                        </ul>
                    </div>
                    <h3 class="no-margin">₹{{ $lastMnthInr->amount }}</h3>
                    Last 30 Days Sales In INR
                    <div class="text-muted text-size-small">{{ $lastMnthInr->totalSales }} Orders (Last 30 Days)</div>
                </div>
            </div>

        </div>
        <div class="col-md-3">
            <div class="panel bg-green-400">
                <div class="panel-body">
                    <div class="heading-elements">
                        <ul class="icons-list">
                            <li><a data-action="reload"></a></li>
                        </ul>
                    </div>
                    <h3 class="no-margin">${{ $todaySalesUsd->amount ? $todaySalesUsd->amount : 0 }}</h3>
                    Today's Sales In USD
                    <div class="text-muted text-size-small">{{ $todaySalesUsd->totalSales }} Orders</div>
                </div>
            </div>

            <div class="panel bg-success-300">
                <div class="panel-body">
                    <div class="heading-elements">
                        <ul class="icons-list">
                            <li><a data-action="reload"></a></li>
                        </ul>
                    </div>
                    <h3 class="no-margin">${{ $last7SalesUsd->amount ? $last7SalesUsd->amount : 0 }}</h3>
                    Last 7 Days Sales In USD
                    <div class="text-muted text-size-small">{{ $last7SalesUsd->totalSales }} Orders</div>
                </div>
            </div>

            <div class="panel bg-teal-300">
                <div class="panel-body">
                    <div class="heading-elements">
                        <ul class="icons-list">
                            <li><a data-action="reload"></a></li>
                        </ul>
                    </div>
                    <h3 class="no-margin">${{ $lastMnthUsd->amount }}</h3>
                    Last 30 Days Sales In USD
                    <div class="text-muted text-size-small">{{ $lastMnthUsd->totalSales }} Orders (Last 30 Days)</div>
                </div>
            </div>

        </div>
        <div class="col-md-6">
            <!-- Simple panel -->
            <div class="panel panel-flat">

                <div class="panel-heading">
                    <h5 class="panel-title">Last 30 Days Sales</h5>
                </div>
                <div class="panel-body">
                    <canvas id="salesChart" class="chart"></canvas>
                </div>
            </div>
            <!-- /simple panel -->
        </div>
    </div>
    <!-- Table -->
    <!--<div class="panel panel-flat">-->
    <!--    <div class="panel-heading">-->
    <!--        <h5 class="panel-title">Basic table</h5>-->
    <!--        <div class="heading-elements">-->
    <!--            <ul class="icons-list">-->
    <!--                <li><a data-action="collapse"></a></li>-->
    <!--                <li><a data-action="close"></a></li>-->
    <!--            </ul>-->
    <!--        </div>-->
    <!--    </div>-->

    <!--    <div class="panel-body">-->
    <!--        Starter pages include the most basic components that may help you start your development process - basic grid example, panel, table and form layouts with standard components. Nothing extra.-->
    <!--    </div>-->
    <!--</div>-->
    <!-- /table -->
    <!-- Footer -->
    @include('admin.adminLayout.copyright')
    <!-- /footer -->
    {{-- dd({{ $dates }}) --}}
</div>
<!-- /content area -->
<script>
    var ctx = document.getElementById('salesChart');
    ctx.height = 310;
    ctx.width = '100%';
    var lables = '{{ $dateString }}';
    var data = '{{ $salesString }}';
    var salesChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: lables.split(','),
            datasets: [{
                label: 'Sales (₹)',
                data: data.split(','),
                backgroundColor: '#81C784',
                barPercentage: 0.7
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>
@include('admin.adminLayout.footer')
