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
	<title>StudentTest</title>
	

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

    #accordion {
        padding-top: 50px;
    }

	</style>
</head>

<body>

<!-- Navigation bar + Sidemenu -->
<?php 
	include_once(dirname(__FILE__).'/../templates/student_navigationBar.php');
?> 
        
<!-- Main content -->
<div id="container">
<div class="database">
        <div class="database-header">
            <h1 class="database-title">
				Thông tin ca cho kì thi học kỳ <?php echo $ca[0]->hoc_ky; ?> 
										năm <?php echo $ca[0]->nam; ?> 
										môn <?php echo $mon->ten_mon; ?>
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
						<!--th>Checkbox</th-->
						<th>Ca</th>
						<th>Thời gian</th>
						<th>Phòng</th>
					</tr>
				</thead>

				<!-- Database retrival -->
                <tbody>
                    <?php foreach ($ca as $ca) : ?>
                        <!-- Table -->
                        <tr>
                            <!--td>
								<div class="custom-control custom-checkbox">
									<input type="checkbox" class="custom-control-input" id="checkbox-<?php echo $ca->id;?>">
									<label class="custom-control-label" for="checkbox-<?php echo $ca->id;?>"></label>
								</div>
							</td-->
                            <td><?php echo $ca->id; ?></td>
                            <td>(<?php echo $ca->bat_dau; ?> - <?php echo $ca->ket_thuc; ?>)</td>
                            <td><?php echo anchor('student/subject-details/'.$mon->id.'/'.$ca->id, 'Xem phòng cho ca', ['class'=>'btn btn-primary btn-sm'], ['id'=>'viewRoomButton']) ?></td>
                        </tr>
                                                
                    <?php endforeach; ?>
				</tbody>
				
                <tfoot>
					<tr>
                        <!--th>Checkbox</th-->
						<th>Ca</th>
						<th>Thời gian</th>
						<th>Phòng</th>
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