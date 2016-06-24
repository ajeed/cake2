<?php

?>
<div class="panel-heading">
    <i class="fa fa-bar-chart-o fa-fw"></i> Bar Chart Example
    <div class="pull-right">
        <div class="btn-group">
            <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                Actions
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu pull-right" role="menu">
                <li><a href="#">Action</a>
                </li>
                <li><a href="#">Another action</a>
                </li>
                <li><a href="#">Something else here</a>
                </li>
                <li class="divider"></li>
                <li><a href="#">Separated link</a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- /.panel-heading -->
<div class="panel-body">
    <div class="row">
        <!-- /.col-lg-8 (nested) -->
        <div id="chart"></div>
        <script>
        var chart = c3.generate({
		    bindto: '#chart',
		    data: {
		      columns: [
		        ['data1', 30, 200, 100, 400, 150, 250],
		        ['data2', 50, 20, 10, 40, 15, 25]
		      ]
		    }
		});
		</script>
    </div>
    <!-- /.row -->
</div>
                        <!-- /.panel-body -->