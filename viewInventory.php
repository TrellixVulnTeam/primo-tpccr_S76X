<?php
include "conn.php";
error_reporting(0);
session_start();
  if ($_SESSION['login_user']==''){
     header("location: login.php");
  }
  ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Tpccr</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <link rel="stylesheet" href="../../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!-- jQuery 2.2.3 -->
   <script src="assets/jQuery/jquery-2.2.3.min.js"></script>
   <!-- jQuery UI 1.11.4 -->
   <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
   <!-- Bootstrap 3.3.6 -->
   <script src="assets/bootstrap/js/bootstrap.min.js"></script>
	 
	
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
	<!-- Waitme -->
	<link rel="stylesheet" href="assets/waitme/waitMe.css">
	<script src="assets/waitme/waitMe.min.js" ></script>
	
	<!-- sweet Alert -->	
	<link rel="stylesheet" type="text/css" href="assets/sweetalert/sweetalert2.css">
	<script src="assets/sweetalert/sweetalert2.js"></script>



  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <link rel="icon" href="innodata.png">
  <script type="text/javascript">
    function checkAll(checkId){
        var inputs = document.getElementsByTagName("input");
        for (var i = 0; i < inputs.length; i++) { 
            if (inputs[i].type == "checkbox" && inputs[i].id == checkId) { 
                if(inputs[i].checked == true) {
                    inputs[i].checked = false ;
                } else if (inputs[i].checked == false ) {
                    inputs[i].checked = true ;
                }
            }  
        }  
    }
</script>
  <style style="text/css">
  	.hoverTable{
		width:100%; 
		border-collapse:collapse; 
	}
	.hoverTable td{ 
		padding:7px; border:#4e95f4 1px solid;
    
	}
	/* Define the default color for all the table rows */
	.hoverTable tr{
		background: #b8d1f3;
	}
  
	/* Define the hover highlight color for the table row */
    .hoverTable tr:hover {
          background-color: #ffff99;
    }

    .ScrollStyle{
    max-height:850px;
    overflow-y: scroll;
    }
   
</style>

 
</head>
<body class="hold-transition fixed skin-blue sidebar-mini">
<div class="wrapper">
<header class="main-header">
    <!-- Logo -->
  
          
      <?php
      if ($_SESSION['UserType']=='Admin'){
      ?>
          <a href="index.php" class="logo">
      <?php
            }
            else{
      ?>
      <a href="Dashboard.php" class="logo">
      <?php
      }
      ?>
      <!-- mini logo for sidebar mini 50x50 pixels -->
     <span class="logo-mini"><img src="innodata.png" class="img-circle"></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg pull-left"><img src="innodata.png" class="img-circle" alt="User Image">&nbsp;<b>T</b>pccr</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
     <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
         <?php include ("Notifications.php");?>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs"><?= $_SESSION['EName'];?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <?php
            $UserId = $_SESSION['login_user'];
             if (file_exists("images/user/".$UserId.".jpg")) {  
              ?>
              <img src="images/user/<?=$UserId;?>.jpg"  class="img-circle" alt="">
              <?php
             }
             else{
              ?>
               
               <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
              <?php
             }
              ?>

                <p>
                 <?= $_SESSION['EName'];?>
                  <small><?= $_SESSION['UserType'];?></small>
                </p>
              </li>
              <!-- Menu Body -->
             
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
                  Change Password
                  </button>
                </div>
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
    <!-- Left side column. contains the logo and sidebar -->
<?php
include ("sideBar.php");
?>
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
       <h1>
         View Inventory
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">View Inventory</li>
      </ol>
    </section>
     <!-- Main content -->
     <section class="content">
         <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                    <div style="overflow-x:auto; overflow-y:auto;" class="box-header with-border ScrollStyle">
                    <a href="inventory.php">Back to main directory</a>
                    <?php 
                      require_once "conn.php";
                      $getFilePath = $_GET['path'];
                      $mydir = 'TPCCR-Inventory'; 

                      $getFilePaths = "SELECT * FROM TPCCR_INVENTORY WHERE RefId='$getFilePath'";
                      $getResults = odbc_exec($conWMS, $getFilePaths);

                      $sql = "SELECT Ref, Source_Type FROM tbl_tpccr_outlook_files where Id =".$getFilePath;
                      $res=odbc_exec($conWMS,$sql);	
                      $data = odbc_fetch_array($res);


                      $getInventoryFlag = "SELECT * FROM TPCCR_INVENTORY WHERE RefId='$getFilePath' AND ProductType='Inventory'";
                      $getInventory = odbc_exec($conWMS, $getInventoryFlag);

                      $dataI = odbc_fetch_array($getInventory);

                      $getInventorySpecs = "SELECT * FROM TPCCR_INVENTORY WHERE RefId='$getFilePath' AND ProductType='specs'";
                      $getSpecs = odbc_exec($conWMS, $getInventorySpecs);

                      $dataSpecs = odbc_fetch_array($getSpecs);



                      $getEmailNotif = "SELECT * FROM TPCCR_INVENTORY WHERE RefId='$getFilePath' AND ProductType='null'";
                      $getEmailN = odbc_exec($conWMS, $getEmailNotif);

                      $dataN = odbc_fetch_array($getEmailN);

                      //get the subcategory in tpccr inventory
                      $getSub = "SELECT * FROM TPCCR_INVENTORY WHERE RefId='$getFilePath'";
                      $getSubCat = odbc_exec($conWMS, $getSub);

                      $dataSub = odbc_fetch_array($getSubCat);
                     

                    ?>
                    <br />
                    <br />
                    <?php 
                      $dataExplode = $data['Ref'];
                      $dataExplode1 = explode('-', $dataExplode);
                                       
                    ?>
					
                    <form id="InventoryFiles" name="InventoryFiles" action="updateInventory.php" method="post">
                  

                   <?php if($dataExplode1[0] != "Ref"): ?>
                    <table width="30%" id='table' border='0'>
                      <tr>
                        <td>
                          <?php if(!empty($getFilePath)): ?>
                          <button type="submit" class="btn btn-success btn-lg">Update Details</button>
                          <?php endif; ?>
                        </td>
                        <td>
                          <?php if(!empty($getFilePath)): ?>
                            <button type="button" name="approvedfiles"  id="approvedfiles" class="btn btn-primary btn-lg">Approve Files</button>
                          <?php endif; ?>
                        </td>
                      </tr>
                    </table>
                    <?php endif;  ?>
                    <br/> 
                    <h3>Source Type: <?= $data['Source_Type']; ?></h3>
                    <h4>Ref Source Path: <?= $mydir ; ?>/<?= $data['Ref']?></h4>  
                   
                    <?php if($data['Source_Type'] != "FTP"): ?>
                      <p style="font-size:15px;">Open this inventory sheet here.</p>
                    <?php endif;?>
                    <?php if($dataExplode1[0] == "Ref"): ?>
                      <a target="_blank" style="font-size:20px;"href="https://docs.google.com/viewerng/viewer?url=https://13.229.35.164/primotpccr/TPCCR-Inventory/<?= $dataN['flag']?>/<?= $dataN['DocFilename'];?>"><?= $dataN['DocFilename'];?></a>
                   
                    <?php else: ?>
                      <a target="_blank" style="font-size:20px;"href="https://docs.google.com/viewerng/viewer?url=https://13.229.35.164/primotpccr/TPCCR-Inventory/<?= $dataI['flag']?>/<?= $dataI['DocFilename'];?>"><?= $dataI['DocFilename'];?></a>
                   
                    <?php endif; ?>
                    <?php if($data['Source_Type'] == "GenCon"): ?>
                    <h4>Specs: </h4>
                    <a target="_blank" style="font-size:20px;"href="https://docs.google.com/viewerng/viewer?url=https://13.229.35.164/primotpccr/TPCCR-Inventory/<?= $dataSpecs['flag']?>/<?= $dataSpecs['DocFilename'];?>"><?= $dataSpecs['DocFilename'];?></a>
                   
                    <?php endif;?>
                    <br />
                    <?php if(isset($_SESSION['updateInventory'])): ?>
                    <div class="alert alert-success " role="alert">
                      <strong><?= $_SESSION['updateInventory']; ?></strong>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <?php endif; ?>
                    <br />
                    <?php if($dataExplode1[0] != "Ref"): ?>
                    <table id="example3" class="hoverTable table">
                        <thead>
                            <tr>
                              <td class="bg bg-success">DocFileName</td>
                              <?php if($data['Source_Type'] != "CandyCane" && $data['Source_Type'] != "FTP"): ?>
                                  <td class="bg bg-success">Shipment Name</td>
                              <?php endif; ?>
                              <td class="bg bg-success">Pages (input e.g 1-10)</td>
                              <td class="bg bg-success">Number Of Pages</td>
                              <?php if($data['Source_Type'] == "CandyCane"): ?>
                                <td class="bg bg-success">Document Type</td>
                                <td id="subCat1" class="bg bg-success">Sub Category</td>
                                <td id="subCat2" class="bg bg-success">Sub Category</td>
                                <td id="subCat3" class="bg bg-success">Sub Category</td>
                              <?php else:?>
                                <td class="bg bg-success">Product Type</td>
                              <?php endif; ?>
                              <?php if($data['Source_Type'] != "GenCon" && $data['Source_Type'] != "Proofs" && $data['Source_Type'] != "FTP"): ?>
                              <td class="bg bg-success">INIT ID</td>
                              <td class="bg bg-success">TI_content</td>
                              <td class="bg bg-success">N_content</td>
                              <?php endif;?>
                              <td class="bg bg-success">Date</td>
                              <td class="bg bg-success">Final Filename</td>
                              <td class="bg bg-success">Graphics Filename</td>
                              <td class="bg bg-success">Inline Code</td>
                              <td class="bg bg-success">Process Type</td>
                              <td class="bg bg-success">WithTIFF</td>
                              <td class="bg bg-success">WithImageEdit</td>
                              <td class="bg bg-success">WithDocSegregate</td>
                              <td class="bg bg-success">Segregations</td>
                              <td class="bg bg-success">FileType</td>
                              <td class="bg bg-success">ByteSize</td>
                              <!--<td class="bg bg-success">Jobname</td>
                              <td class="bg bg-success">JobId</td>
                              <td class="bg bg-success">PriorityNo</td>-->
                              <td class="bg bg-success">Date Registered</td>
                              <td class="bg bg-success">Due Date</td>
                             
                            </tr>
                        </thead>
                        <tbody>
                            <?php while(odbc_fetch_row($getResults)): ?>  
                            <?php if(!empty(odbc_result($getResults, "DocFilename"))): ?>
                            <?php if(odbc_result($getResults, "ProductType") != "Inventory" && odbc_result($getResults, "ProductType") != "specs"): ?>
                            <tr id="<?= odbc_result($getResults, "Id"); ?>">
                                <td><a href="https://docs.google.com/viewerng/viewer?url=https://13.229.35.164/primotpccr/TPCCR-Inventory/<?= odbc_result($getResults, "flag")?>/<?= odbc_result($getResults, "DocFilename")?>"  target="_blank"><?= odbc_result($getResults, "DocFilename"); ?></a></td>
                                <?php if($data['Source_Type'] != "CandyCane" && $data['Source_Type'] != "FTP"): ?>
                                <td><textarea placeholder="Data" class="form-control" name="data[<?= odbc_result($getResults, "Id"); ?>][data]"><?= odbc_result($getResults, "Data"); ?></textarea></td>
                                <?php endif; ?>
                                <td><input type="text" placeholder="Pages" onkeyup="getPages(<?= odbc_result($getResults, 'Id'); ?>)" class="form-control" id="pages<?= odbc_result($getResults, "Id"); ?>" name="data[<?= odbc_result($getResults, "Id"); ?>][pages]" value="<?= odbc_result($getResults, "Pages"); ?>" /> </td>
                                <td><input type="text" readonly="readonly" placeholder="Number Of Pages" class="form-control" id="numberOfPages<?= odbc_result($getResults, "Id"); ?>" name="data[<?= odbc_result($getResults, "Id"); ?>][numberOfPages]" value="<?= odbc_result($getResults, "NumberOfPages"); ?>" ></td>
                                <td>
                                    <?php if($data['Source_Type'] == "CandyCane"): ?>
                                        <select id="my-select" class="form-control" name="data[<?= odbc_result($getResults, "Id"); ?>][productType]">
                                            <option value="">-- SELECT PRODUCT TYPE --</option>
                                            <option value="1" <?= (odbc_result($getResults, "ProductType") == "1") ? ' selected="selected"' : '';?>>BUDGET DOCUMENTS</option>
                                            <option value="2" <?= (odbc_result($getResults, "ProductType") ==  "2") ? ' selected="selected"' : '';?>>CANADA BORDER MEMORANDA</option>
                                            <option value="3" <?= (odbc_result($getResults, "ProductType") ==  "3") ? ' selected="selected"' : '';?>>CANADIAN TAX HIGHLIGHTS</option>
                                            <option value="4" <?= (odbc_result($getResults, "ProductType") ==  "4") ? ' selected="selected"' : '';?>>COMMENTARY DOCUMENTS</option>
                                            <option value="5" <?= (odbc_result($getResults, "ProductType") ==  "5") ? ' selected="selected"' : '';?>>CORPORATE TAX DOCUMENTS</option>
                                            <option value="6" <?= (odbc_result($getResults, "ProductType") ==  "6") ? ' selected="selected"' : '';?>>CRA DOCUMENTS / POLICY DOCUMENTS</option>
                                            <option value="7" <?= (odbc_result($getResults, "ProductType") ==  "7") ? ' selected="selected"' : '';?>>FEDERAL DEPARTMENT OF FINANCE</option>
                                            <option value="8" <?= (odbc_result($getResults, "ProductType") ==  "8") ? ' selected="selected"' : '';?>>GST CASE NOTES</option>
                                            <option value="9" <?= (odbc_result($getResults, "ProductType") ==  "9") ? ' selected="selected"' : '';?>>GST TIMES</option>
                                            <option value="10" <?= (odbc_result($getResults, "ProductType") ==  "10") ? ' selected="selected"' : '';?>>NEWSLETTERS</option>
                                            <option value="11" <?= (odbc_result($getResults, "ProductType") ==  "11") ? ' selected="selected"' : '';?>>POUNDS TAX CASE NOTES</option> 
                                            <option value="12" <?= (odbc_result($getResults, "ProductType") ==  "12") ? ' selected="selected"' : '';?>>TAX HYPERION</option>
                                            <option value="13" <?= (odbc_result($getResults, "ProductType") ==  "13") ? ' selected="selected"' : '';?>>TAX TIMES</option>
                                            <option value="14" <?= (odbc_result($getResults, "ProductType") ==  "14") ? ' selected="selected"' : '';?>>TEI (Tax Executives Institute, Inc.) COMMENTARY</option> 
                                            <option value="15"  <?= (odbc_result($getResults, "ProductType") ==  "15") ? ' selected="selected"' : '';?>>PROVINCIAL DOCUMENTS</option>
                                            <option value="16" <?= (odbc_result($getResults, "ProductType") ==  "16") ? ' selected="selected"' : '';?>>TREATIES/CONVENTIONS</option>
                                            <option value="17" <?= (odbc_result($getResults, "ProductType") ==  "17") ? ' selected="selected"' : '';?>>REMISSIONS/REMISSION ORDERS</option> 
                                            <option value="18" <?= (odbc_result($getResults, "ProductType") ==  "18") ? ' selected="selected"' : '';?>>PRIVATE LETTER RULINGS</option>
                                            <option value="19" <?= (odbc_result($getResults, "ProductType") ==  "19") ? ' selected="selected"' : '';?>>PRACTICAL INSIGHTS</option>
                                        </select>

                                    <?php elseif($data['Source_Type'] == "GenCon"): ?>
                                      <select class="form-control" name="data[<?= odbc_result($getResults, "Id"); ?>][productType]">
                                        <option value="">-- SELECT PRODUCT TYPE --</option>
                                        <option value="CDROM"<?= (odbc_result($getResults, "ProductType") ==  "CDROM") ? ' selected="selected"' : '';?>>CDROM</option> 
                                        <option value="CIVIL"<?= (odbc_result($getResults, "ProductType") ==  "CIVIL") ? ' selected="selected"' : '';?>>CIVIL</option>
                                        <option value="CRIMINAL"<?= (odbc_result($getResults, "ProductType") ==  "CRIMINAL") ? ' selected="selected"' : '';?>>CRIMINAL</option>
                                        <option value="Canadian Encyclopedic Digest"<?= (odbc_result($getResults, "ProductType") ==  "Canadian Encyclopedic Digest") ? ' selected="selected"' : '';?>>Canadian Encyclopedic Digest</option>
                                        <option value="CRIMINAL"<?= (odbc_result($getResults, "ProductType") ==  "CRIMINAL") ? ' selected="selected"' : '';?>>CRIMINAL</option>
                                        <option value="FAMILY"<?= (odbc_result($getResults, "ProductType") ==  "FAMILY") ? ' selected="selected"' : '';?>>FAMILY</option>
                                        <option value="GST" <?= (odbc_result($getResults, "ProductType") ==  "GST") ? ' selected="selected"' : '';?>>GST</option>
                                        <option value="IPSOURCE" <?= (odbc_result($getResults, "ProductType") ==  "IPSOURCE") ? ' selected="selected"' : '';?>>IPSOURCE</option>
                                        <option value="LABORLAW" <?= (odbc_result($getResults, "ProductType") ==  "LABORLAW") ? ' selected="selected"' : '';?>>LABORLAW</option>
                                        <option value="LAWREPORTS" <?= (odbc_result($getResults, "ProductType") ==  "LAWREPORTS") ? ' selected="selected"' : '';?>>LAWREPORTS</option>
                                        <option value="LITIGATION" <?= (odbc_result($getResults, "ProductType") ==  "LITIGATION") ? ' selected="selected"' : '';?>>LITIGATION</option>
                                        <option value="Montreal Legislation" <?= (odbc_result($getResults, "ProductType") ==  "Montreal Legislation") ? ' selected="selected"' : '';?>>Montreal Legislation</option>
                                        <option value="PRINT" <?= (odbc_result($getResults, "ProductType") ==  "PRINT") ? ' selected="selected"' : '';?>>PRINT</option>
                                        <option value="PROVIEW"<?= (odbc_result($getResults, "ProductType") ==  "PROVIEW") ? ' selected="selected"' : '';?>>PROVIEW</option>
                                        <option value="SECURITIES" <?= (odbc_result($getResults, "ProductType") ==  "SECURITIES") ? ' selected="selected"' : '';?>>SECURITIES</option>
                                        <option value="TAX" <?= (odbc_result($getResults, "ProductType") ==  "TAX") ? ' selected="selected"' : '';?>>TAX</option>
                                        <option value="British Columbia Securities" <?= (odbc_result($getResults, "ProductType") ==  "British Columbia Securities") ? ' selected="selected"' : '';?>>British Columbia Securities</option>
                                        <option value="Ontario Securities" <?= (odbc_result($getResults, "ProductType") ==  "Ontario Securities") ? ' selected="selected"' : '';?>>Ontario Securities</option>
                                        <option value="Bankruptcy / Insolvency" <?= (odbc_result($getResults, "ProductType") ==  "Bankruptcy / Insolvency") ? ' selected="selected"' : '';?>>Bankruptcy / Insolvency</option>
                                       
                                      </select> 
                                    <?php elseif($data['Source_Type'] == "Proofs"): ?>
                                      <select class="form-control" name="data[<?= odbc_result($getResults, "Id"); ?>][productType]">
                                        <option value="">-- SELECT PRODUCT TYPE --</option>
                                        <option value="PROOFS"<?= (odbc_result($getResults, "ProductType") ==  "PROOFS") ? ' selected="selected"' : '';?>>PROOFS</option>
                                        </select> 
                                    
                                    <?php elseif($data['Source_Type'] == "FTP"): ?>
                                      <select class="form-control" name="data[<?= odbc_result($getResults, "Id"); ?>][productType]">
                                        <option value="">-- SELECT PRODUCT TYPE --</option>
                                        <option value="BCSC"<?= (odbc_result($getResults, "ProductType") ==  "BCSC") ? ' selected="selected"' : '';?>>BCSC</option>
                                        <option value="ONSEC"<?= (odbc_result($getResults, "ProductType") ==  "ONSEC") ? ' selected="selected"' : '';?>>ONSEC</option>
                                      </select>

                                    <?php else:?>
                                      <select class="form-control" name="data[<?= odbc_result($getResults, "Id"); ?>][productType]">
                                        <option value="">-- SELECT PRODUCT TYPE --</option>
                                        <option value="Specs" <?= (odbc_result($getResults, "ProductType") ==  "Specs") ? ' selected="selected"' : '';?>>Specs</option>
                                        <option value="Inventory" <?= (odbc_result($getResults, "ProductType") ==  "Inventory") ? ' selected="selected"' : '';?>>Inventory</option>                           
                                        <option value="INSOLVENCY"<?= (odbc_result($getResults, "ProductType") ==  "INSOLVENCY") ? ' selected="selected"' : '';?>>INSOLVENCY</option>
                                        <option value="BCSC"<?= (odbc_result($getResults, "ProductType") ==  "BCSC") ? ' selected="selected"' : '';?>>BCSC</option>
                                        <option value="CDROM"<?= (odbc_result($getResults, "ProductType") ==  "CDROM") ? ' selected="selected"' : '';?>>CDROM</option>
                                        <option value="CED"<?= (odbc_result($getResults, "ProductType") ==  "CED") ? ' selected="selected"' : '';?>>CED</option>
                                        <option value="CIVIL"<?= (odbc_result($getResults, "ProductType") ==  "CIVIL") ? ' selected="selected"' : '';?>>CIVIL</option>
                                        <option value="CRIMINAL"<?= (odbc_result($getResults, "ProductType") ==  "CRIMINAL") ? ' selected="selected"' : '';?>>CRIMINAL</option>
                                        <option value="ESTATES"<?= (odbc_result($getResults, "ProductType") ==  "ESTATES") ? ' selected="selected"' : '';?>>ESTATES</option>
                                        <option value="FAMILY"<?= (odbc_result($getResults, "ProductType") ==  "FAMILY") ? ' selected="selected"' : '';?>>FAMILY</option>
                                        <option value="FILELAW"<?= (odbc_result($getResults, "ProductType") ==  "FILELAW") ? ' selected="selected"' : '';?>>FILELAW</option>
                                        <option value="GST" <?= (odbc_result($getResults, "ProductType") ==  "GST") ? ' selected="selected"' : '';?>>GST</option>
                                        <option value="IPSOURCE" <?= (odbc_result($getResults, "ProductType") ==  "IPSOURCE") ? ' selected="selected"' : '';?>>IPSOURCE</option>
                                        <option value="LAB-ONLINELEGALSMG" <?= (odbc_result($getResults, "ProductType") ==  "LAB-ONLINELEGALSMG") ? ' selected="selected"' : '';?>>LAB-ONLINELEGALSMG</option>
                                        <option value="LAWREPORTS" <?= (odbc_result($getResults, "ProductType") ==  "LAWREPORTS") ? ' selected="selected"' : '';?>>LAWREPORTS</option>
                                        <option value="LITIGATION" <?= (odbc_result($getResults, "ProductType") ==  "LITIGATION") ? ' selected="selected"' : '';?>>LITIGATION</option>
                                        <option value="MONTREAL-LEGIS" <?= (odbc_result($getResults, "ProductType") ==  "MONTREAL-LEGIS") ? ' selected="selected"' : '';?>>MONTREAL-LEGIS</option>
                                        <option value="PRINT" <?= (odbc_result($getResults, "ProductType") ==  "PRINT") ? ' selected="selected"' : '';?>>PRINT</option>
                                        <option value="PROVIEW"<?= (odbc_result($getResults, "ProductType") ==  "PROVIEW") ? ' selected="selected"' : '';?>>PROVIEW</option>
                                        <option value="SECURITIES" <?= (odbc_result($getResults, "ProductType") ==  "SECURITIES") ? ' selected="selected"' : '';?>>SECURITIES</option>
                                        <option value="TAXPRO" <?= (odbc_result($getResults, "ProductType") ==  "TAXPRO") ? ' selected="selected"' : '';?>>TAXPRO</option>
                                      </select>

                                    <?php endif; ?>
                                    
                                </td>
                                <?php if($data['Source_Type'] == "CandyCane"): ?>
                               
                                <td id="innerSubCat1">
                                      <select  class="form-control" name="data[<?= odbc_result($getResults, "Id"); ?>][subCat1]">
                                          <option value="0">--Please Select--</option>
                                          <option value="Application Policies" <?= (odbc_result($getResults, "sub_category") ==  "Application Policies") ? ' selected="selected"' : '';?>>Application Policies</option>
                                          <option value="Charities Policy Statements" <?= (odbc_result($getResults, "sub_category") ==  "Charities Policy Statements") ? ' selected="selected"' : '';?>>Charities Policy Statements </option>
                                          <option value="Fact Sheets" <?= (odbc_result($getResults, "sub_category") ==  "Fact Sheets") ? ' selected="selected"' : '';?>>Fact Sheets </option>
                                          <option value="GST/HST Policy Statements" <?= (odbc_result($getResults, "sub_category") ==  "GST/HST Policy Statements") ? ' selected="selected"' : '';?>>GST/HST Policy Statements </option>
                                          <option value="GST/HST Memoranda (New Series)" <?= (odbc_result($getResults, "sub_category") ==  "GST/HST Memoranda (New Series)") ? ' selected="selected"' : '';?>>GST/HST Memoranda (New Series) </option>
                                          <option value="GST/HST Notices" <?= (odbc_result($getResults, "sub_category") ==  "GST/HST Notices") ? ' selected="selected"' : '';?>>GST/HST Notices </option>
                                          <option value="GST/HST Technical Information Bulletins" <?= (odbc_result($getResults, "sub_category") ==  "GST/HST Technical Information Bulletins") ? ' selected="selected"' : '';?>>GST/HST Technical Information Bulletins </option>
                                          <option value="GST/HST News" <?= (odbc_result($getResults, "sub_category") ==  "GST/HST News") ? ' selected="selected"' : '';?>>GST/HST News </option>
                                          <option value="GST/HST Views (Headquarter Letters)" <?= (odbc_result($getResults, "sub_category") ==  "GST/HST Views (Headquarter Letters)") ? ' selected="selected"' : '';?>>GST/HST Views (Headquarter Letters)</option>
                                          <option value="Guides and Pamphlets" <?= (odbc_result($getResults, "sub_category") ==  "Guides and Pamphlets") ? ' selected="selected"' : '';?>>Guides and Pamphlets </option>
                                          <option value="Information Circulars:" <?= (odbc_result($getResults, "sub_category") ==  "Information Circulars:") ? ' selected="selected"' : '';?>>Information Circulars: </option>
                                          <option value="Interpretation Bulletins" <?= (odbc_result($getResults, "sub_category") ==  "Interpretation Bulletins") ? ' selected="selected"' : '';?>>Interpretation Bulletins </option>
                                          <option value="News Releases/Communiqué De Presse" <?= (odbc_result($getResults, "sub_category") ==  "News Releases/Communiqué De Presse") ? ' selected="selected"' : '';?>>News Releases/Communiqué De Presse </option>
                                          <option value="Toronto Centre Canada Revenue Agency & Professionals Group Newsletter" <?= (odbc_result($getResults, "sub_category") ==  "Toronto Centre Canada Revenue Agency & Professionals Group Newsletter") ? ' selected="selected"' : '';?>>Toronto Centre Canada Revenue Agency & Professionals Group Newsletter </option>
                                          <option value="Notice / Avis / Newsletter / Nouvelles" <?= (odbc_result($getResults, "sub_category") ==  "Notice / Avis / Newsletter / Nouvelles") ? ' selected="selected"' : '';?>>Notice / Avis / Newsletter / Nouvelles </option>
                                          <option value="Tax Alert" <?= (odbc_result($getResults, "sub_category") ==  "Tax Alert") ? ' selected="selected"' : '';?> >Tax Alert </option>
                                          <option value="Technical News" <?= (odbc_result($getResults, "sub_category") ==  "Technical News") ? ' selected="selected"' : '';?>>Technical News</option>
                                      </select>
                                </td>
                               
                                <td id="innerSubCat2">
                                      <select class="form-control" name="data[<?= odbc_result($getResults, "Id"); ?>][subCat2]">
                                          <option value="0">--Please Select--</option>
                                          <option value="News Releases" <?= (odbc_result($getResults, "sub_category") ==  "News Releases") ? ' selected="selected"' : '';?>>News Releases</option>
                                          <option value="Treaties" <?= (odbc_result($getResults, "sub_category") ==  "Treaties") ? ' selected="selected"' : '';?>>Treaties</option>
                                      </select>
                                </td>
                                <td id="innerSubCat3">
                                      <select class="form-control" name="data[<?= odbc_result($getResults, "Id"); ?>][subCat3]">
                                          <option value="0">--Please Select--</option>
                                          <option value="i.Alberta" <?= (odbc_result($getResults, "sub_category") ==  "i.Alberta") ? ' selected="selected"' : '';?>>i. Alberta</option>
                                          <option value="ii.British Columbia" <?= (odbc_result($getResults, "sub_category") ==  "ii.British Columbia") ? ' selected="selected"' : '';?>>ii.British Columbia</option>
                                          <option value="iii.Manitoba" <?= (odbc_result($getResults, "sub_category") ==  "iii.Manitoba") ? ' selected="selected"' : '';?>>iii.Manitoba</option>
                                          <option value="iv.New Brunswick" <?= (odbc_result($getResults, "sub_category") ==  "iv.New Brunswick") ? ' selected="selected"' : '';?>>iv.New Brunswick</option>
                                          <option value="v.Newfoundland and Labrador" <?= (odbc_result($getResults, "sub_category") ==  "v.Newfoundland and Labrador") ? ' selected="selected"' : '';?>>v.Newfoundland and Labrador</option>
                                          <option value="vi.Northwest Territories" <?= (odbc_result($getResults, "sub_category") ==  "vi.Northwest Territories") ? ' selected="selected"' : '';?>>vi. Northwest Territories </option>
                                          <option value="vii.Nova Scotia" <?= (odbc_result($getResults, "sub_category") ==  "vii.Nova Scotia") ? ' selected="selected"' : '';?>>vii. Nova Scotia </option>
                                          <option value="viii.Nunavut" <?= (odbc_result($getResults, "sub_category") ==  "viii.Nunavut") ? ' selected="selected"' : '';?>>viii.Nunavut</option>
                                          <option value="ix.Ontario" <?= (odbc_result($getResults, "sub_category") ==  "ix.Ontario") ? ' selected="selected"' : '';?>>ix.Ontario</option>
                                          <option value="x.P.E.I." <?= (odbc_result($getResults, "sub_category") ==  "x.P.E.I.") ? ' selected="selected"' : '';?>>x.P.E.I.</option>
                                          <option value="xi.Quebec-a) Guides" <?= (odbc_result($getResults, "sub_category") ==  "xi.Quebec-a) Guides") ? ' selected="selected"' : '';?>>xi.Quebec-a) Guides</option>
                                          <option value="xi.Quebec-b) Interpretation Bulletins/Bulletins d’interprétation: Abbrev" <?= (odbc_result($getResults, "sub_category") ==  "xi.Quebec-b) Interpretation Bulletins/Bulletins d’interprétation: Abbrev") ? ' selected="selected"' : '';?>>xi.Quebec-b) Interpretation Bulletins/Bulletins d’interprétation: Abbrev</option>
                                          <option value="xi.Quebec-c) Lettres d’interprétation" <?= (odbc_result($getResults, "sub_category") ==  "xi.Quebec-c) Lettres d’interprétation") ? ' selected="selected"' : '';?>>xi.Quebec-c) Lettres d’interprétation</option>
                                          <option value="xii.Saskatchewan" <?= (odbc_result($getResults, "sub_category") ==  "xii.Saskatchewan") ? ' selected="selected"' : '';?>>xii.Saskatchewan</option>
                                          <option value="xiii.Yukon Territory" <?= (odbc_result($getResults, "sub_category") ==  "xiii.Yukon Territory") ? ' selected="selected"' : '';?>>xiii.Yukon Territory</option>
                                      </select>
                                </td>
                                <?php endif; ?>
                                <?php if($data['Source_Type'] != "GenCon" && $data['Source_Type'] != "Proofs" && $data['Source_Type'] != "FTP"): ?>
                                  <td><textarea placeholder="INIT ID"class="form-control" name="data[<?= odbc_result($getResults, "Id"); ?>][initId]"><?= odbc_result($getResults, "INITID"); ?></textarea></td>
                                  <td><textarea placeholder="TI Content"class="form-control" name="data[<?= odbc_result($getResults, "Id"); ?>][tiContent]"><?= odbc_result($getResults, "TI_content"); ?></textarea></td>
                                  <td><textarea placeholder="N Content" class="form-control" name="data[<?= odbc_result($getResults, "Id"); ?>][nContent]"><?= odbc_result($getResults, "N_content"); ?></textarea></td>
                                <?php endif;?>
                                <td><textarea placeholder="date" class="form-control" name="data[<?= odbc_result($getResults, "Id"); ?>][date]"><?= odbc_result($getResults, "Date"); ?></textarea></td>
                                <td><textarea placeholder="FinalFileName" class="form-control" name="data[<?= odbc_result($getResults, "Id"); ?>][finalFileName]"><?= odbc_result($getResults, "FinalFIlename"); ?></textarea></td>
                                <td><textarea placeholder="GraphicsFileName" class="form-control" name="data[<?= odbc_result($getResults, "Id"); ?>][graphicsFileName]"><?= odbc_result($getResults, "GraphicsFilename"); ?></textarea></td>
                                <td><textarea placeholder="InlineCode" class="form-control" name="data[<?= odbc_result($getResults, "Id"); ?>][inlineCode]"><?= odbc_result($getResults, "InlineCode"); ?></textarea></td>
                                <td>
                                    <select class="form-control" name="data[<?= odbc_result($getResults, "Id"); ?>][processType]" >
                                        <option value="New" <?= (odbc_result($getResults, "ProcessType") ==  "New") ? ' selected="selected"' : '';?>>New</option>
                                        <option value="Updating" <?= (odbc_result($getResults, "ProcessType") ==  "Updating") ? ' selected="selected"' : '';?>>Updating</option>
                                    </select>
                                
                                </td>
                                
                                <td>
                                    <select class="form-control" name="data[<?= odbc_result($getResults, "Id") ?>][withTiff]">
                                        <option value="0" <?= (odbc_result($getResults, "WithTIFF") == 0) ? 'selected="selected"' : '';?>>No</option>
                                        <option value="1" <?= (odbc_result($getResults, "WithTIFF") == 1) ? 'selected="selected"' : '';?>>Yes</option>
                                    </select>
                                </td>
                                <td>
                                    <select class="form-control" name="data[<?= odbc_result($getResults, "Id") ?>][withImageEdit]">
                                        <option value="0" <?= (odbc_result($getResults, "WithImageEdit") == 0) ? 'selected="selected"' : ''; ?>>No</option>
                                        <option value="1" <?= (odbc_result($getResults, "WithImageEdit") == 1) ? 'selected="selected"' : ''; ?>>Yes</option>
                                    </select>    
                                </td>
                                <td>
                                    <select class="form-control" name="data[<?= odbc_result($getResults, "Id"); ?>][withDocSegregate]"> 
                                        <option value="Yes" <?= (odbc_result($getResults, "WithDocSegregate") ==  "Yes") ? ' selected="selected"' : '';?>>Yes</option>
                                        <option value="No" <?= (odbc_result($getResults, "WithDocSegregate") ==  "No") ? ' selected="selected"' : '';?>>No</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="radio" name="segregateFile" value="auto-segregation"  /> auto-segregation
                                    <input type="radio" name="segregateFile" value="manual-segregation"  /> manual-segregation
                                </td>
                                <td><textarea placeholder="FileType" class="form-control" name="data[<?= odbc_result($getResults, "Id"); ?>][fileType]"><?= odbc_result($getResults, "FileType"); ?></textarea></td>
                                <td><textarea readonly="readonly" placeholder="ByteSize" class="form-control" name="data[<?= odbc_result($getResults, "Id"); ?>][byteSize]"><?= odbc_result($getResults, "ByteSize"); ?></textarea></td>
                                <td><textarea disabled><?= odbc_result($getResults, "DateRegistered")?></textarea></td>
                                <td class="bg-danger"><textarea disabled><?= odbc_result($getResults, "due_date")?></textarea></td>
                                <!-- <td><textarea placeholder="Jobname" class="form-control" name="data[<?= odbc_result($getResults, "Id"); ?>][jobName]"><?= odbc_result($getResults, "Jobname"); ?></textarea></td>
                                <td><textarea placeholder="JobId" class="form-control" name="data[<?= odbc_result($getResults, "Id"); ?>][jobId]"><?= odbc_result($getResults, "JobId"); ?></textarea></td>
                                <td><textarea placeholder="PriorityNo" class="form-control" name="data[<?= odbc_result($getResults, "Id"); ?>][priorityNo]"><?= odbc_result($getResults, "PriorityNo"); ?></textarea></td>
                                -->
                            </tr>
                            <?php endif; ?>
                            <?php endif; ?>
                           
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                    <?php endif; ?>
                    <input type="hidden" name="getUrl" value="<?= $getFilePath; ?>" />
                    </form>
                   
                    <?php if(!empty($getFilePath)): ?>
                    <?php
                        if(isset($_POST['approved'])){
                          
                            $approved = "Approved";
                            $updateQuery = "UPDATE tbl_tpccr_outlook_files SET
                                            status='$approved'
                                            WHERE Ref='$getFilePath'";

                            $resQ = ExecuteQuerySQLSERVER($updateQuery,$conWMS);
                            //header("location: inventory.php");
                        }                     
                      
                    ?>
                    <?php endif; ?>
                    <?php unset($_SESSION['updateInventory']); ?>
                </div>
                    </div>
                </div>
            </div>
         </div>
     </section>
 </div>

</div>


    <!-- Bootstrap 3.3.7 -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
 <script>
  $(function () {
        $('table.display').DataTable( {} );
        $('#example1').DataTable()
          $('#example2').DataTable({
            'paging'      : true,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false
          })
          $('#example3').DataTable({
            'paging'      : true,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false
          })
          $('#example4').DataTable({
            'paging'      : true,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false
          })
      })


</script>
<script type="text/javascript">
	$(document).on('click', '#approvedfiles', function(e){
	e.preventDefault(); 
		$.ajax({
			url: 'Controller/ApprovedFilesInventory.php',
			type: "post",
			data: {
                Ref:"<?= $data['Ref'] ?>",
                RefId:"<?= $getFilePath ?>"
            },
			beforeSend:function(){
			    $("body").waitMe({
					effect: 'roundBounce',
					text: 'Please Wait ........ ',
					bg: 'rgba(255,255,255,0.90)',
					color: '#555'
				});		
			},
			success: function (response) {
				$('body').waitMe('hide');
				if(response === "EMPTY" ){
				    swal({
						type:'warning',
						title:"Please Update All Product Type",
						text:""
					}).then(function(){
							
							
					});	
					
				}else if(response === "DONE" ){
					
					swal({
						type:'success',
						title:"Approved!",
						text:""
					}).then(function(){
							
							window.location.replace("./inventory.php");
					});	
					
				}
				
			},
			error: function(jqXHR, textStatus, errorThrown) {
			   console.log(textStatus, errorThrown);
			}
		});
		

	}); 
	</script>
    <script>
        const getPages = (id) =>{
        const pages = $(`#pages${id}`).val();
        console.log(pages);
        let res = pages.split("-");
            console.log(res[0]);
            console.log(res[1]);
            //calculate
            let comp = parseInt(res[1]) - parseInt(res[0]);
            let calc = comp + 1; 
            console.log(calc);

            let tt = document.getElementById(`numberOfPages${id}`).value = calc;
            console.log(tt);
        };
    </script>
    <script>     
      <?php if($dataSub['sub_category'] != "" && $dataSub['ProductType'] == 6): ?>
           $('#subCat1').show();
           $("#innerSubCat1").show();
      <?php else: ?>
           $("#innerSubCat1").hide();
           $('#subCat1').hide();
      <?php endif;?>
     
      <?php if($dataSub['sub_category'] != "" && $dataSub['ProductType'] == 7): ?>
           $('#subCat2').show();
           $("#innerSubCat2").show();
      <?php else: ?>
           $("#innerSubCat2").hide();
           $('#subCat2').hide();
      <?php endif;?>


      <?php if($dataSub['sub_category'] != "" && $dataSub['ProductType'] == 15): ?>
           $('#subCat3').show();
           $("#innerSubCat3").show();
      <?php else: ?>
           $("#innerSubCat3").hide();
           $('#subCat3').hide();
      <?php endif;?>

      const mySelect = document.getElementById("my-select");
      mySelect.addEventListener('change', function(){
          if(this.value == "6"){
            $('#subCat1').show();
            $("#innerSubCat1").show();

            $('#subCat2').hide();
            $("#innerSubCat2").hide();
          }else if(this.value == "7"){
            $('#subCat2').show();
            $("#innerSubCat2").show();

            $('#subCat1').hide();
            $("#innerSubCat1").hide();
          }else if(this.value == "15"){
            $('#subCat1').hide();
            $("#innerSubCat1").hide();
            $('#subCat2').hide();
            $("#innerSubCat2").hide();


            $('#subCat3').show();
            $("#innerSubCat3").show();
          }else{
            $('#subCat1').hide();
            $('#subCat2').hide();
            $('#subCat3').hide();

            $("#innerSubCat1").hide();
            $("#innerSubCat2").hide();
            $("#innerSubCat3").hide();

          }
      });

</script>

</body>
</html>

