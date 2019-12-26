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
        		<div class="dropdown-menu" aria-labelledby="navbarDropdown">
          			<a class="dropdown-item" href="#">Import student list</a>
          			<a class="dropdown-item" href="#">Import student</a>
					<a class="dropdown-item" href="#">Create exam PERIOD</a>
          			<div class="dropdown-divider"></div>
          			<a class="dropdown-item" href="#">Student CRUD</a>
					<a class="dropdown-item" href="#">Subject CRUD</a>  
        		</div>
      		</li-->
    	</ul>
    	<ul class="form-inline my-2 my-lg-0">
        	<!--a class="nav-link active">Welcome, StudentName <span class="sr-only">(current)</span></a--> 
			<?php echo anchor('/logout', 'Logout', ['class'=>'btn btn-primary btn-sm'], ['id'=>'logout']) ?>
    	</ul>
  	</div>
</nav>

<div class="bg-dark border-right col-5" id="sidebar-wrapper">
    <div class="list-group list-group-flush">
        <a href="#" class="list-group-item list-group-item-action bg-dark active">Student CRUD</a>
        <a href="#" class="list-group-item list-group-item-action bg-dark list-group-item-light">Subject CRUD</a>
        <a href="#" class="list-group-item list-group-item-action bg-dark list-group-item-light">Import student list</a>
        <a href="#" class="list-group-item list-group-item-action bg-dark list-group-item-light">Import student</a>
        <a href="#" class="list-group-item list-group-item-action bg-dark list-group-item-light">Create exam PERIOD</a>
    </div>
</div>