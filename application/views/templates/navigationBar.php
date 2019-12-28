<!-- Navigation bar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  	<a class="navbar-brand" href="<?php echo base_url(); ?>">AdminHomepage</a>
  	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    	<span class="navbar-toggler-icon"></span>
  	</button>

  	<div class="collapse navbar-collapse" id="navbarSupportedContent">
    	<ul class="navbar-nav mr-auto">
      		<!--li class="nav-item active">
        		<a class="nav-link" href="<?php echo base_url(); ?>">Home <span class="sr-only">(current)</span></a>
      		</li>
      		<li class="nav-item dropdown">
        		<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          			Actions
        		</a>
      		</li-->
    	</ul>
    	<ul class="form-inline my-2 my-lg-0">
        	<!--a class="nav-link" id="username">Welcome, #adminName <span class="sr-only">(current)</span></a--> 
			<a href="<?php echo base_url(); ?>logout/" class="btn btn-primary">Đăng xuất</a>
    	</ul>
  	</div>
</nav>

<div class="bg-dark border-right col-5" id="sidebar-wrapper">
    <div class="list-group list-group-flush">
		<a 
			href="<?php echo base_url(); ?>admin" 
			class="list-group-item list-group-item-action bg-dark 
				<?php 
				$student = array("admin", "index.php", "add-student", "import-student-list");
				if (in_array(basename($_SERVER['PHP_SELF']), $student) || strpos(dirname($_SERVER['PHP_SELF']), "admin/update-student") !== FALSE) {
					echo "active";
				} else {
					echo "list-group-item-light";
				} ?> ">
			Quản lý sinh viên
		</a>
		<a 
			href="<?php echo base_url(); ?>admin/subject" 
			class="list-group-item list-group-item-action bg-dark 
				<?php 
				$subject = array("subject", "add-subject");
				if (in_array(basename($_SERVER['PHP_SELF']), $subject) || strpos(dirname($_SERVER['PHP_SELF']), "admin/update-subject") !== FALSE
					|| strpos(dirname($_SERVER['PHP_SELF']), "admin/import-eligibilities") !== FALSE || strpos(dirname($_SERVER['PHP_SELF']), "admin/import-ineligibilities") !== FALSE) {
					echo "active";
				} else {
					echo "list-group-item-light";
				} ?> ">
			Quản lý môn học
		</a>
		<a 
			href="<?php echo base_url(); ?>admin/exam-period" 
			class="list-group-item list-group-item-action bg-dark 
				<?php if (basename($_SERVER['PHP_SELF']) == "exam-period" || strpos(dirname($_SERVER['PHP_SELF']), "admin/exam-period") !== FALSE || strpos(dirname($_SERVER['PHP_SELF']), "admin/update-exam-period") !== FALSE
					|| strpos(dirname($_SERVER['PHP_SELF']), "admin/exam-period-details") !== FALSE) {
					echo "active";
				} else {
					echo "list-group-item-light";
				} ?> ">
			Quản lý kỳ thi
		</a>
    </div>
</div>
