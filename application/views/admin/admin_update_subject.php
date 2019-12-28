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
		padding-top: 70px;
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
<?php 
	include_once(dirname(__FILE__).'/../templates/navigationBar.php');
?>
        
<div id="container">



	<!--div id="top-actions-container">
		<div class="row">
  			<div class="col-sm-3">
    			<div class="card">
      				<div class="card-body">
        				<h5 class="card-title">Add</h5>
						<p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
						<?php echo anchor('admin/add-student', 'Add', ['class'=>'btn btn-primary btn-sm']);?>
      				</div>
    			</div>
  			</div>
  			<div class="col-sm-3"> 
    			<div class="card">
      				<div class="card-body">
        				<h5 class="card-title">Update</h5>
        				<p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        				<a href="#" class="btn btn-primary btn-sm">Go somewhere</a>
      				</div>
    			</div>
  			</div>
		  	<div class="col-sm-3">
				<div class="card">
					<div class="card-body">
						<h5 class="card-title">Delete</h5>
						<p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
						<a href="#" class="btn btn-primary btn-sm">Go somewhere</a>
					</div>
				</div>
  			</div>
		  	<div class="col-sm-3">
    			<div class="card">
      				<div class="card-body">
        				<h5 class="card-title">Import a list</h5>
        				<p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        				<a href="#" class="btn btn-primary btn-sm">Go somewhere</a>
      				</div>
    			</div>
  			</div>
		</div>
    </div-->

	<!-- Form nhập -->
    <?php echo form_open('admin/update-subject/'.$subject_data->id);?>
		<div class="form-row justify-content-md-center">
			<?php if ($this->session->flashdata('success')) { ?>
				<div class="alert alert-success alert-dismissible text-center col-md-6"> 
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<?php echo $this->session->flashdata('success'); ?>
				</div>
				<?php } else if ($this->session->flashdata('error')) { ?>
				<div class = "alert alert-danger alert-dismissible text-center col-md-6">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<?php echo $this->session->flashdata('error'); ?>
				</div>
			<?php } ?>
		</div>

		<div class="form-row justify-content-md-center">
			<div class="form-group col-md-3">
				<label for="id">ID</label>
				<?php echo form_input(['name'=>'id', 'value'=>$subject_data->id, 'placeholder'=>'ID', 'class'=>'form-control']); ?>
			</div>
			<div class="form-group col-md-5">
				<label for="ten_mon">Tên môn</label>
				<?php echo form_input(['name'=>'ten_mon', 'value'=>$subject_data->ten_mon, 'placeholder'=>'Tên môn', 'class'=>'form-control']); ?>
			</div>
		</div>

		<?php echo form_submit(['name'=>'submit', 'value'=>'Sửa', 'class'=>'btn btn-primary btn-sm offset-md-2']);?>


        <!--div class="update-form">
			<div id="form-input-container" class="form-row">
				<div class="col-3">
					<?php echo form_input(['name'=>'id', 'value'=>$subject_data->id, 'placeholder'=>'ID', 'class'=>'form-control']); ?>
				</div>
				<div class="col-3">
					<?php echo form_input(['name'=>'ten_mon', 'value'=>$subject_data->ten_mon, 'placeholder'=>'Tên môn', 'class'=>'form-control']); ?>
				</div>
			</div>
			<?php echo validation_errors(); ?>
			<div>
				<?php echo form_submit(['name'=>'submit', 'value'=>'Thêm', 'class'=>'btn btn-primary btn-sm']);?>
			</div>
        </div-->     
    </form>	
</div>


<!-- Bootstrap relevant frameworks import -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

</body>
</html>