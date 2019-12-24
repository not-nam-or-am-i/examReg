<!-- Navigation bar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  	<a class="navbar-brand" href="<?php echo base_url(); ?>">StudentHomepage</a>
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
					<a class="dropdown-item active" href="admin">Đăng kí dự thi</a>
					<a class="dropdown-item" href="admin/subject">In danh sách Đăng kí dự thi</a>
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
        <a href="admin" class="list-group-item list-group-item-action bg-dark active">Đăng kí dự thi</a>
        <a href="admin/subject" class="list-group-item list-group-item-action bg-dark list-group-item-light">In danh sách Đăng kí dự thi</a>
    </div>
</div>