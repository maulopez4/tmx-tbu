<?php
$position=$_SESSION['SESS_USER_ROLE'];
if($position=='USER') {
    ?>
    <ul class="nav nav-list">
    <li>&nbsp;</li>   
    <li><a href="entries.php"><i class="icon-edit icon-2x"></i> New Entry</a></li>              
    <!--<li><a href="search_entry.php"><i class="icon-search icon-2x"></i> Search Entry</a></li>-->
    <li><a href="export.php"><i class="icon-bar-chart icon-2x"></i> Export</a></li>
    <li><a href="../index.php"><font color="red"><i class="icon-off icon-2x"></i></font> Logout</a></li>          
    <li>
        <div class="hero-unit-clock">
            <form name="clock">
                <font color="white"><br></font>&nbsp;<input style="width:150px;" type="submit" class="trans" name="face" value="">
            </form>
        </div>
    </li>      		
    </ul>
    <?php
    }
if($position=='SUPERVISOR') {
    ?>
    <ul class="nav nav-list">
    <li>&nbsp;</li>
    <li><a href="entries.php"><i class="icon-edit icon-2x"></i> New Entry</a></li>
    <li><a href="entries_reported.php"><i class="icon-bell icon-2x"></i> Reported Entries</a></li>                
    <!--<li><a href="search_entry.php"><i class="icon-search icon-2x"></i> Search Entry</a></li>-->
    <li><a href="molds.php"><i class="icon-download-alt icon-2x"></i> Molds</a></li>      
    <li><a href="paintcodes.php"><i class="icon-tint icon-2x"></i>Paint Codes</a></li> 
    <li><a href="defects.php"><i class="icon-warning-sign icon-2x"></i> Defects</a></li>      
    <li><a href="export.php"><i class="icon-bar-chart icon-2x"></i> Export</a></li>
    <li><a href="../index.php"><font color="red"><i class="icon-off icon-2x"></i></font> Logout</a></li>
    <li>
    <div class="hero-unit-clock">
            <form name="clock">
                <font color="white"><br></font>&nbsp;<input style="width:150px;" type="submit" class="trans" name="face" value="">
            </form>
        </div>
    </li>      		
    </ul>
    <?php
    }
if($position=='ADMIN') {
    ?>
    <ul class="nav nav-list">
    <li>&nbsp;</li>
    <li><a href="entries.php"><i class="icon-edit icon-2x"></i>Entries</a></li>
    <li><a href="entries_reported.php"><i class="icon-bell icon-2x"></i> Reported Entries</a></li>                 
    <!--<li><a href="search_entry.php"><i class="icon-search icon-2x"></i> Search Entry</a></li>-->
    <li><a href="users.php"><i class="icon-group icon-2x"></i>Users</a></li>
    <li><a href="molds.php"><i class="icon-download-alt icon-2x"></i>Molds</a></li>      
    <li><a href="paintcodes.php"><i class="icon-tint icon-2x"></i>Paint Codes</a></li> 
    <li><a href="defects.php"><i class="icon-warning-sign icon-2x"></i>Defects</a></li>      
    <li><a href="export.php"><i class="icon-bar-chart icon-2x"></i>Export</a></li>
    <li><a href="../index.php"><font color="red"><i class="icon-off icon-2x"></i></font>Logout</a></li>
    <li>
        <div class="hero-unit-clock">
            <form name="clock">
                <font color="white"><br></font>&nbsp;<input style="width:100px;" type="submit" class="trans" name="face" value="">
            </form>
        </div>
    </li>      		
    </ul>  
    <?php
    }
    ?>