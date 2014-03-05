<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
         <a class="navbar-brand" href="home.php">Pintrest</a>
        </div>
        <div class="navbar-collapse collapse">
	<ul class="nav navbar-nav">
            <li><a href="dboard.php">Boards</a></li>
            <li><a href="mypin.php">Pins</a></li>
            <li><a href="dstream.php">Streams</a></li>
            <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="badge"><?php ?></span><?php echo $_SESSION['row']['fname'] ?> <b class="caret"></b></a>
                  <ul class="dropdown-menu">
			<li><a href="profile.php">View profile</a></li>
                    <li><a href="editprofile.php">Edit profile</a></li>
                    <li><a href="findfriends.php">Find friends</a></li>
                    <li><a href="request.php"><span class="badge"><?php ?></span>Requests</a></li>
		    <li><a href="logout.php">Logout</a></li>
                  </ul>
                </li>  
	</ul>	
	
	
	<form class="navbar-form navbar-right" method='post' action='search.php'>
            <div class="form-group">
              <input type="text" placeholder="search tags" name='tag' class="form-control">
            </div>
            <button type="submit" name='search' class="btn btn-success">search</button>
          </form>
        </div><!--/.navbar-collapse -->
      </div>
</div>


