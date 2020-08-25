<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Mouse Tracker</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.css'?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/jquery.dataTables.css'?>">
</head>
<body>
<div class="container">
	<!-- Page Heading -->
        <div class="row">
            <h1 class="page-header">Mouse Tracker Pages
                <small>Pages</small>
			
            </h1>
        </div>

    <div class="row">
        <div class="col-lg-6"><div class="pull-left">
                <a href="<?php echo base_url().'MouseTrack/inputPage'?>" class="btn btn-lg btn-success" ><span class="fa fa-plus"></span> Input Page</a></div></div>
        <div class="col-lg-6"><div class="pull-right">
                <a href="<?php echo base_url().'MouseTrack/outputPage'?>" class="btn btn-lg btn-default" ><span class="fa fa-plus"></span> Output Page</a></div></div>
    </div>

</div>



<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.dataTables.js'?>"></script>

</body>
</html>