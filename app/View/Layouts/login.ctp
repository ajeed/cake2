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

    <!-- Custom CSS -->
    <?php echo $this->Html->css('dist/css/sb-admin-2'); ?>    
 
    <!-- Custom Fonts -->
    <?php echo $this->Html->css('bower_components/font-awesome/css/font-awesome.min',array('type'=>'text/css')); ?>

    <!-- DataTables CSS -->
    <?php echo $this->Html->css('bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap'); ?>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- jQuery -->
    <?php echo $this->Html->script('../css/bower_components/jquery/dist/jquery.min'); ?>
</head>

<body>

    <div id="wrapper">

            <?php echo $this->fetch('content'); ?>
    </div>
    <!-- /#wrapper -->



    <!-- Bootstrap Core JavaScript -->
    <?php echo $this->Html->script('../css/bower_components/bootstrap/dist/js/bootstrap.min'); ?>

    <!-- Metis Menu Plugin JavaScript -->
    <?php echo $this->Html->script('../css/bower_components/metisMenu/dist/metisMenu.min'); ?>

    <!-- Custom Theme JavaScript -->
    <?php echo $this->Html->script('../css/dist/js/sb-admin-2'); ?>

</body>

</html>
