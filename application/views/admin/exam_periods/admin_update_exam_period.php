<?php
//Form ở dòng 179
//Form: CTRL+F "<!-- Form nhập -->"

	defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="vi">
<head>
	<meta charset="utf-8">

	<!-- Bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
	<!-- TODO: Move to a single CSS file -->
	<link rel="stylesheet" href="../../assets/dist/css/AdminLTE.min.css">
	<link rel="stylesheet" href="../../assets/dist/css/skins/_all-skins.min.css">
	<!-- DataTables -->
	<link rel="stylesheet" href="../../assets/plugins/datatables/dataTables.bootstrap.css">
	<title>Admin Test</title>
	

	<!-- CSS -->
	
	<style type="text/css">
	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #000000;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	#container {
		margin: 10px;
		padding-top: 20px;
		padding-left: 200px;
	}

	#top-actions-container {
		padding-top: 30px;
		padding-bottom: 30px;
	}

	#sidebar-wrapper {
		height: 100%; 
  		width: 160px; 
  		position: fixed; 
		left: 0;
		padding-top: 20px;
    }
    #form-input-container {
        padding-bottom: 20px;
    }

	</style>
</head>

<body>

<!-- Navigation bar -->

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  	<a class="navbar-brand" href="<?php echo base_url(); ?>">AdminHomepage</a>
  	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    	<span class="navbar-toggler-icon"></span>
  	</button>

  	<div class="collapse navbar-collapse" id="navbarSupportedContent">
    	<ul class="navbar-nav mr-auto">
      		<li class="nav-item active">
        		<a class="nav-link" href="<?php echo base_url(); ?>">Home <span class="sr-only">(current)</span></a>
      		</li>
      		<li class="nav-item dropdown">
        		<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          			Actions
        		</a>
				<!-- TODO: FIX ALL HREF WHEN DONE -->
        		<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item active" href="admin">Student CRUD</a>
					<a class="dropdown-item" href="">Subject CRUD</a>
					<a class="dropdown-item" href="#">Create exam PERIOD</a>
          			<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="#">Import student list</a>
          			<a class="dropdown-item" href="#">Import student eligibility list</a>
        		</div>
      		</li>
    	</ul>
    	<ul class="form-inline my-2 my-lg-0">
        	<a class="nav-link" id="username">Welcome, #adminName <span class="sr-only">(current)</span></a> 
      		<button class="btn btn-primary" type="submit">Logout</button>
    	</ul>
  	</div>
</nav>

<div class="bg-dark border-right col-5" id="sidebar-wrapper">
    <div class="list-group list-group-flush">
        <a href="admin" class="list-group-item list-group-item-action bg-dark active">Student CRUD</a>
        <a href="" class="list-group-item list-group-item-action bg-dark list-group-item-light">Subject CRUD</a>
        <a href="#" class="list-group-item list-group-item-action bg-dark list-group-item-light">Import student list</a>
        <a href="#" class="list-group-item list-group-item-action bg-dark list-group-item-light">Import student</a>
        <a href="#" class="list-group-item list-group-item-action bg-dark list-group-item-light">Create exam PERIOD</a>
    </div>
</div>


<?php //include '../navigationBar.php'?>
        
<div id="container">

	<!-- Form nhập -->
    <?php echo form_open('admin/update-exam-period/'.$period->id, ['class'=>'form-row']);?>
        <div class="update-form">
                <div id="form-input-container" class="form-row">
                    <div class="col-3">
                        <?php echo form_input(['name'=>'nam', 'value'=>$period->nam, 'placeholder'=>'Năm', 'class'=>'form-control']); ?>
                    </div>
                    <div class="col-3">
                        <?php echo form_input(['name'=>'hoc_ky', 'value'=>$period->hoc_ky, 'placeholder'=>'Học kỳ', 'class'=>'form-control']); ?>
                    </div>
                </div>
				<?php echo validation_errors(); ?>
                <div>
                    <?php echo form_submit(['name'=>'submit', 'value'=>'Sửa', 'class'=>'btn btn-primary btn-sm']);?>
                </div>
        </div>     
    </form>	
</div>


<!-- Bootstrap relevant frameworks import -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

</body>
</html>