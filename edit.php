<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['emplogin'])==0)
{   
	header('location:index.php');
}
$lid=$_GET['inid'];
if(isset($_POST['update']))
{

$type=$_POST['leavetype'];
$from=$_POST['from'];   
$to=$_POST['to']; 
$desc=$_POST['description']; 
$sql="update tblleaves set LeaveType=:type,FromDate=:from,ToDate=:to,Description=:desc  where id=:lid";
$query = $dbh->prepare($sql);
$query->bindParam(':type',$type,PDO::PARAM_STR);
$query->bindParam(':from',$from,PDO::PARAM_STR);
$query->bindParam(':to',$to,PDO::PARAM_STR);
$query->bindParam(':desc',$desc,PDO::PARAM_STR);
$query->bindParam(':lid',$lid,PDO::PARAM_STR);
$query->execute();
$msg="Leave record updated Successfully";
}
    ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        
        <!-- Title -->
        <title>Employee | Edit Leave</title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <meta charset="UTF-8">
        <meta name="description" content="Responsive Admin Dashboard Template" />
        <meta name="keywords" content="admin,dashboard" />
        <meta name="author" content="Steelcoders" />
        
        <!-- Styles -->
        <link type="text/css" rel="stylesheet" href="assets/plugins/materialize/css/materialize.min.css"/>
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="assets/plugins/material-preloader/css/materialPreloader.min.css" rel="stylesheet"> 
        <link href="assets/css/alpha.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/custom.css" rel="stylesheet" type="text/css"/>
  <style>
        .errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
        </style>





    </head>
    <body>
  <?php include('includes/header.php');?>
            
       <?php include('includes/sidebar.php');?>
   <main class="mn-inner">
                <div class="row">
                    <div class="col s12">
                        <div class="page-title">Update Leave</div>
                    </div>
                    <div class="col s12 m12 l12">
                        <div class="card">
                            <div class="card-content">
                                <form id="example-form" method="post" name="updatemp">
                                    <div>
                                        <h3>Update Leave Info</h3>
                                           <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo $error; ?> </div><?php } 
											else if($msg){?><div class="succWrap"><strong>SUCCESS</strong> : <?php echo $msg; ?> </div><?php }?>
                                        <section>
                                            <div class="wizard-content">
                                                <div class="row">
                                                    <div class="col m6">
                                                        <div class="row">
														<?php 
														$lid=intval($_GET['inid']);
														$sql = "SELECT * from  tblleaves where id=:lid";
														$query = $dbh -> prepare($sql);
														$query -> bindParam(':lid',$lid, PDO::PARAM_STR);
														$query->execute();
														$results=$query->fetchAll(PDO::FETCH_OBJ);
														$cnt=1;
														if($query->rowCount() > 0)
														{
														foreach($results as $result)
														{               ?> 
														

														<div class="input-field col s12">
														<label for="leavetype">Leave Type</label>
														<input id="leavetype" name="leavetype" value="<?php echo $result->LeaveType;?>"  type="text" readonly required>
														</div>
														<div class="input-field col s12">
														<span for="from">From</span>
														<input id="from" name="from" value="<?php echo $result->FromDate;?>"  type="datetime-local" required>
														</div>
														<div class="input-field col s12">
														<span for="to">To</span>
														<input id="to" name="to" value="<?php echo $result->ToDate;?>"  type="datetime-local" required>
														</div>
														<div class="input-field col s12">
														<label for="description">Description</label>
														<input id="description" name="description" value="<?php echo $result->Description;?>"  type="text" required>
														</div>

														<?php }} ?>														
														<div class="input-field col s12">
														<button type="submit" name="update"  id="update" class="waves-effect waves-light btn indigo m-b-xs">UPDATE</button>

														</div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                     
                                    
                                        </section>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div class="left-sidebar-hover"></div>
        
        <!-- Javascripts -->
        <script src="assets/plugins/jquery/jquery-2.2.0.min.js"></script>
        <script src="assets/plugins/materialize/js/materialize.min.js"></script>
        <script src="assets/plugins/material-preloader/js/materialPreloader.min.js"></script>
        <script src="assets/plugins/jquery-blockui/jquery.blockui.js"></script>
        <script src="assets/js/alpha.min.js"></script>
        <script src="assets/js/pages/form_elements.js"></script>
        
    </body>
</html>