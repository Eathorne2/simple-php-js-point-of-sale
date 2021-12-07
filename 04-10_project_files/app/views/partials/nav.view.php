<nav class="navbar navbar-expand-lg navbar-light bg-light" style="min-width:350px">
	  <div class="container-fluid">
	    <a class="navbar-brand" href="index.php?pg=home"><?=esc(APP_NAME)?></a>
	    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	      <span class="navbar-toggler-icon"></span>
	    </button>
	    <div class="collapse navbar-collapse" id="navbarSupportedContent">
	      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
	        <li class="nav-item">
	          <a class="nav-link active" aria-current="page" href="index.php?pg=home">Point of sale</a>
	        </li>
	        
	        <li class="nav-item">
	          <a class="nav-link" href="index.php?pg=admin">Admin</a>
	        </li>

	        <li class="nav-item">
	          <a class="nav-link" href="index.php?pg=login">Login</a>
	        </li>

	        <li class="nav-item">
	          <a class="nav-link" href="index.php?pg=signup">Signup</a>
	        </li>

	        
	        <li class="nav-item dropdown">
	          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
	            Hi, User
	          </a>
	          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
	            <li><a class="dropdown-item" href="index.php?pg=profile">Profile</a></li>
	            <li><a class="dropdown-item" href="index.php?pg=page-settings">Profile-Settings</a></li>
	            <li><hr class="dropdown-divider"></li>
	            <li><a class="dropdown-item" href="index.php?pg=logout">Logout</a></li>
	          </ul>
	        </li>
	    
	      </ul>
	      <form class="d-flex">
	        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
	        <button class="btn btn-outline-success" type="submit">Search</button>
	      </form>
	    </div>
	  </div>
	</nav>