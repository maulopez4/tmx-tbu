 <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="index.php"><b><img src="img/leer_ultra_small_logo.jpg" alt="leer_logo"> <?php include("../title.php");?></b></a>
          <div class="nav-collapse collapse">
            <ul class="nav pull-left">
            <?php
              $position=$_SESSION['SESS_USER_ROLE'];
              if($position=='USER') {
            ?>   
            <li><a href="entries.php"><i class="icon-edit"></i></a></li>              
            <!--<li><a href="search_entry.php"><i class="icon-search"></i></a></li>-->
            <li><a href="export.php"><i class="icon-bar-chart"></i></a></li>
            <?php
                  }
              if($position=='SUPERVISOR') {
                  ?>
            <li><a href="entries.php"><i class="icon-edit"></i></a></li>
            <li><a href="entries_reported.php"><i class="icon-bell"></i></a></li>                
            <!--<li><a href="search_entry.php"><i class="icon-search"></i></a></li>-->
            <li><a href="molds.php"><i class="icon-download-alt"></i></a></li>      
            <li><a href="paintcodes.php"><i class="icon-tint"></i></a></li> 
            <li><a href="defects.php"><i class="icon-warning-sign"></i></a></li>      
            <li><a href="export.php"><i class="icon-bar-chart"></i></a></li>
            <?php
                  }
              if($position=='ADMIN') {
                  ?>
            <li><a href="entries.php"><i class="icon-edit"></i></a></li>
            <li><a href="entries_reported.php"><i class="icon-bell"></i></a></li>               
            <!--<li><a href="search_entry.php"><i class="icon-search"></i></a></li>-->
            <li><a href="users.php"><i class="icon-group"></i></a></li>
            <li><a href="molds.php"><i class="icon-download-alt"></i></a></li>      
            <li><a href="paintcodes.php"><i class="icon-tint"></i></a></li> 
            <li><a href="defects.php"><i class="icon-warning-sign"></i></a></li>      
            <li><a href="export.php"><i class="icon-bar-chart"></i></a></li>
            <?php
                  }
                  ?>
            </ul>
            <ul class="nav pull-right">      
            <li><a><i class="icon-user icon-large"></i> Welcome: <strong><?php echo $_SESSION['SESS_USER_NAME'];?></strong></a></li>
			      <li><a> <i class="icon-calendar icon-large"></i>
								<?php
								$Today = date('y:m:d',mktime(0,0,0));
								$today = date('l, F d, Y', strtotime($Today));
								echo $today;
								?>
				</a></li>
              <li><a href="../index.php"><font color="red"><i class="icon-off icon-large"></i></font> Log Out</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
	