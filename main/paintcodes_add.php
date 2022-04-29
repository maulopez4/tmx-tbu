<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
include("errors.php");
?>
<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<form action="paintcode_addsave.php" method="post">
<?php include("../connect.php"); ?>    
<div id="add_form_title"><i class="icon-plus-sign icon-large"></i> Add Paint Code</div>
<hr>
<div id="ac" style="width:500px">
    <span>Code : </span><input type="text" name="code" placeholder="Code" Required/><br>
    <span>Brand : </span><input type="text" name="brand" placeholder="Brand" Required/><br>
    <span>Description : </span><input type="text" name="description" placeholder="Description" Required/><br>
    
    <div style="float:right; margin-right:35px">
    <button class="btn btn-success btn-block btn-large" style="width:300px;"><i class="icon icon-save icon-large"></i> Save</button>
    </div>
</div>
</form>
