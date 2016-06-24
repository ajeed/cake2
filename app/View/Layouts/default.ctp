<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Silver Speed Store Management</title>

    <!-- Bootstrap Core CSS -->
    <?php echo $this->Html->css('bower_components/bootstrap/dist/css/bootstrap.min'); ?>

    <!-- MetisMenu CSS -->
    <?php echo $this->Html->css('bower_components/metisMenu/dist/metisMenu.min'); ?>

    <!-- Timeline CSS -->
    <?php echo $this->Html->css('dist/css/timeline'); ?>
    <!-- Custom CSS -->
    <?php echo $this->Html->css('dist/css/sb-admin-2'); ?>    

    <!-- C3 CSS -->
    <?php echo $this->Html->css('c3/c3.min'); ?>   
 
    <!-- Morris Charts CSS -->
    <?php echo $this->Html->css('bower_components/morrisjs/morris'); ?>    
    <!-- Custom Fonts -->
    <?php echo $this->Html->css('bower_components/font-awesome/css/font-awesome.min',array('type'=>'text/css')); ?>

    <!-- DataTables CSS -->
    <?php echo $this->Html->css('bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap'); ?>

    <!-- DataTables Responsive CSS -->
     <?php echo $this->Html->css('bower_components/datatables-responsive/css/dataTables.responsive'); ?>  

     <!-- datetimepicker CSS -->
     <?php echo $this->Html->css('bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min'); ?>  

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- jQuery -->
    <?php echo $this->Html->script('../css/bower_components/jquery/dist/jquery.min'); ?>

    <!-- Moment -->
     <?php echo $this->Html->script('../css/bower_components/moment/min/moment.min'); ?>

     <!-- DatePicker -->
     <?php echo $this->Html->script('../css/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min'); ?>

    <!-- C3 Js-->
    <?php echo $this->Html->script('c3.min'); ?>

    <!-- D3 Js-->
    <?php echo $this->Html->script('d3.min'); ?>
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">SilverSpeed Store Management v2.0</a>
            </div>
            <!-- /.navbar-header -->
	        <?php echo $this->element('topMenu'); ?>
	        <?php echo $this->element('sidebarMenu'); ?>
        </nav>
        <div id="page-wrapper">
            <?php echo $this->Flash->render(); ?>
            <?php echo $this->fetch('content'); ?>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->



    <!-- Bootstrap Core JavaScript -->
    <?php echo $this->Html->script('../css/bower_components/bootstrap/dist/js/bootstrap.min'); ?>

    <!-- Metis Menu Plugin JavaScript -->
    <?php echo $this->Html->script('../css/bower_components/metisMenu/dist/metisMenu.min'); ?>
    <!-- Morris Charts JavaScript -->

    <?php echo $this->Html->script('../css/bower_components/raphael/raphael-min'); ?>
    <?php //echo $this->Html->script('../css/bower_components/morrisjs/morris.min'); ?>
	<?php //echo $this->Html->script('morris-data'); ?>
    <?php echo $this->fetch('scriptBottom'); ?>

    <!-- DataTables JavaScript -->
    <?php echo $this->Html->script('../css/bower_components/datatables/media/js/jquery.dataTables.min'); ?>
    <?php echo $this->Html->script('../css/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min'); ?>

    <!-- Custom Theme JavaScript -->
    <?php echo $this->Html->script('../css/dist/js/sb-admin-2'); ?>


</body>

</html>
