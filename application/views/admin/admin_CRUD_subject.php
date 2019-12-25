<!-- 
	TODO:
	- Fix all href in navbar
	- Move navbar to templates to load
-->

<?php
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
	<title>AdminTest</title>
	

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

	#username {
		color: white;
	}

	#add-button {
		margin-left: 200px;
	}

	</style>
</head>

<body>

<!-- Navigation bar -->
<?php 
	include_once(dirname(__FILE__).'/../templates/navigationBar.php');
?>
        
<!-- Main content -->
<div id="container">

	<!--
	<div id="top-actions-container">
		<div class="row">
  			<div class="col-sm-3">
    			<div class="card">
      				<div class="card-body">
        				<h5 class="card-title">Add</h5>
						<p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
						<?php // echo anchor('CRUD_Students_Controller/create', 'Add', ['class'=>'btn btn-primary btn-sm']);?>
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
	</div>
	-->

	<div class="database">
        <div class="database-header">
            <h1 class="database-title">
				Subject database
				<?php echo anchor('admin/add-subject', 'Thêm', ['class'=>'btn btn-primary btn-sm']);?>
			</h1>
        </div>

		<?php if ($this->session->flashdata('success')) { ?>
			<div class="alert alert-success alert-dismissible text-center"> 
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<?php echo $this->session->flashdata('success'); ?>
			</div>
        <?php } ?>
            
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>Checkbox</th>
						<th>ID</th>
						<th>Môn học</th>
						<th></th>
					</tr>
				</thead>

				<!-- Database retrival -->
				<tbody>
					<?php foreach ($subjects as $subject) : ?>
						<!-- Table -->
						<tr>
							<th></th>
							<td><?php echo $subject->id; ?></td>
							<td><?php echo $subject->ten_mon; ?></td>
							<th>
								<?php echo anchor('admin/update-subject/'.$subject->id, 'Sửa', ['class'=>'btn btn-primary btn-sm']); ?>
								<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#deleteConfirmModal-<?php echo $subject->id;?>">
  									Xoá
								</button>
								<?php echo anchor('admin/import-eligibilities/'.$subject->id, 'Tải danh sách sinh viên', ['class'=>'btn btn-primary btn-sm']); ?>
								<?php echo anchor('admin/import-ineligibilities/'.$subject->id, 'Tải sinh viên không đủ điêu kiện', ['class'=>'btn btn-primary btn-sm']); ?>
							</th>
						</tr>

						<!-- Modal for Delete Confirmation Pop-up -->
						<div class="modal fade" id="deleteConfirmModal-<?php echo $subject->id;?>" role="dialog" aria-labelledby="exampleModalLabel">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">Xác nhận</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										Xóa môn học này?
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
										<?php echo anchor('admin/delete-subject/'.$subject->id, 'Delete', ['class'=>'btn btn-primary btn-sm']); ?>
									</div>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</tbody>
				
                <tfoot>
					<tr>
						<th data-checkbox="false"></th>
						<th>ID</th>
						<th>Môn học</th>
						<th></th>
					</tr>
                </tfoot>
            </table>

			
        </div>
    </div>		
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>
