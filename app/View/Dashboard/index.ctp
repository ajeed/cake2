 <!-- Morris Charts CSS -->
 <?php echo $this->Html->script('../css/bower_components/morrisjs/morris.min', array('block' => 'scriptBottom')); ?>

 <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            <!-- /.row -->
            <?php echo $this->element('dashboardIcon'); ?>
            <!-- /.row -->
             <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            List of in-store
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Plate Number</th>
                                            <th>Make Model</th>
                                            <th>Date Reg/Make</th>
                                            <th>Status</th>
                                            <th>Purchase Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>WYB6818</td>
                                            <td>KIA OPTIMA TF 2.0 L AT</td>
                                            <td>2012 / 2013</td>
                                            <td>AVAILABLE</td>
                                            <td>Mar 12th 2016</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>JMB6298</td>
                                            <td>PROTON EXORA 1.6</td>
                                            <td>2010 / 2010</td>
                                            <td>AVAILABLE</td>
                                            <td>Mar 12th 2016</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
            </div>
            <!-- /.row -->
             <div class="row">
                <div class="col-lg-6">
                    <!-- /.panel -->
                    <div class="panel panel-default">
                        <?php echo $this->element('SalesChartMonthly'); ?>
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-8 -->
                <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Donut Chart Example
                        </div>
                        <div class="panel-body">
                            <div id="morris-donut-chart"></div>
                            <a href="#" class="btn btn-default btn-block">View Details</a>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->
