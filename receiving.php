<?php
  error_reporting(0);
  require_once "conn.php";
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
 
</head>
<body class="hold-transition fixed skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
     <a href="index.php" class="logo">
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
         
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs"><?= $_SESSION['EName'];?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                 <?= $_SESSION['EName'];?>
                  <small><?= $_SESSION['UserType'];?></small>
                </p>
              </li>
              <!-- Menu Body -->
             
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
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
    <?php include "sideBar.php"; ?>

  <!-- Content Wrapper. Contains page content -->
 
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
       <h1>
         Receiving
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Receiving</li>
      </ol>
    </section>
    <?php 
        require_once "Config.php"; 
        require_once "fpdf.php";
        //require_once "conn.php";

        $con = mysqli_connect('localhost','root','','primo');
        // Check connection
        if (mysqli_connect_errno())
        {
          echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }

        /* Search Emails having the specified keyword in the email subject */
        $emailData = imap_search($connection, 'FROM "@wecode-x.com" ');

        //fetch email from @sendthisfile
        $emailDataSendThisFile = imap_search($connection, 'UNSEEN FROM "@sendthisfile.com" ');

    ?>  

    <!-- Main content -->
    <section class="content">
      <div class="row">
  
  
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
                
            </div>
            <div class="box-body">
              <h2>Receiving</h2>
              <br />
              <br />
              <?php if(!empty($emailData)): ?>
              <table id="example1" class="table table-bordered table-striped" style="overflow:auto;">
                 <thead>
                      <tr>
                       
                         <th width="15%">From</th>
                         <th class="bg bg-info">Subject</th>
                         <th>Messages</th>
                         <th class="bg bg-info" width="">Attachments</th>
                         <th width="15%">Date</th>
                      </tr>
                  </thead>
                  <tbody >
                      <?php foreach($emailData as $emailIdent): ?>
                      <?php
                            $overview = imap_fetch_overview($connection, $emailIdent, 0);
                            $message = imap_fetchbody($connection, $emailIdent, '1.1');
                            $messageExcerpt = substr($message, 0, 150);
                            $partialMessage = trim(quoted_printable_decode($messageExcerpt)); 
                            $date = date("d F, Y", strtotime($overview[0]->date));
      
                            $structure = imap_fetchstructure($connection,$emailIdent);

                            $header = imap_header($connection, $emailIdent);

                            
                            $toAddress = $header->toaddress;
                            $toPersonal  = $header->to[0]->personal;
                            $toMailBox = $header->to[0]->mailbox;
                            $toHost = $header->to[0]->host;
                            $cc = $header->ccaddress;
                            $ccPersonal = $header->cc[0]->personal;
                            $ccMailbox = $header->cc[0]->mailbox;
                            $ccHost = $header->cc[0]->host;
                            $subject = $header->cc[0]->subject;
                            $date = $header->Date;
                            $from = $header->fromaddress;
                            $fromPersonal = $header->from[0]->personal;
                            $fromMailbox = $header->from[0]->mailbox;
                            $fromHost = $header->from[0]->host; 
                            $mainSubject = $header->Subject;

                            //convert to PDF then create a folder 
                            $pdf = new FPDF();
                            $pdf->AddPage();
                            $pdf->SetFont('Arial','B', 18);
                            $pdf->Ln();
                            $pdf->Cell(40,10, ucfirst($mainSubject));
                            $pdf->Ln();
                            $pdf->SetFont('Arial','B', 10);
                            $pdf->Cell(40,10,'From: '.$from.', <'.$fromMailbox.'@'.$fromHost.'>');
                            $pdf->Ln();
                            $pdf->Cell(40, 10,'To: '.$toAddress.', <'.$toPersonal.'@'.$toHost.'>');
                            $pdf->Ln();
                            $pdf->Cell(40, 10,'CC: '.$ccMailbox.', <'.$ccPersonal.'>');
                            $pdf->Ln();
                            $pdf->Cell(40, 10,'Subject: '.$mainSubject.'');
                            $pdf->Ln();
                            $pdf->Cell(40, 10,'Date: '.$date.'');
                            $pdf->Ln();
                            $pdf->Ln();
                            $pdf->Cell(40,10,'From: '.$from.'');
                            $pdf->Ln();
                            $pdf->Cell(40,10,'Re: '.$mainSubject.'');
                            $pdf->Ln();
                            $pdf->Cell(40,10,'Date: '.$date.'');
                            $pdf->Ln();
                            $pdf->Cell(40,10,'Ref: '.$mainSubject.'');
                            $pdf->Ln();
                            $pdf->Cell(40,10,'_____________________________________________________________');
                            $pdf->Ln();
                            $pdf->Cell(40,10,''.$partialMessage.'');

                            
                            //make directory
                            mkdir("TPCCR-Inventory/".$mainSubject."/");

                            $filename12 = "TPCCR-Inventory/$mainSubject/".$mainSubject.".pdf";
                            $pdf->Output($filename12,'F');

                            $fileNamePDF = $mainSubject.".pdf";

                            $created_at = date('Y-m-d H:i:s');
                            $updated_at = date('Y-m-d H:i:s');

                            $query = "SELECT * FROM tbl_tpccr_outlook_files WHERE Ref='$mainSubject'";
                            //$result = mysqli_query($con, $query);
                            //$result = ExecuteQuerySQLSERVER($query,$conWMS);

                            $queryResult = odbc_exec($conWMS, $query);
                            if(odbc_num_rows($queryResult) > 0){
                                //
                            }else{
                                $mainSubjectSplit = explode("-", $mainSubject);
                                $mainSubjectCode = $mainSubjectSplit[0];

                                //candy cane
                                if($mainSubjectCode == "AB" || $mainSubjectCode == "AW" 
                                  || $mainSubjectCode == "BN" || $mainSubjectCode == "CA" || $mainSubjectCode == "CP" 
                                  || $mainSubjectCode == "CV" || $mainSubjectCode == "DK" || $mainSubjectCode == "HB"
                                  || $mainSubjectCode == "JC" || $mainSubjectCode == "MB" || $mainSubjectCode == "SL"
                                  || $mainSubjectCode == "SM" || $mainSubjectCode == "RN" || $mainSubjectCode == "LH"){
                                  $sourceType = "CandyCane";
                                }else{
                                  $sourceType = "";
                                  
                                }

                                //proofs
                                if($mainSubjectCode == "ADavison" || $mainSubjectCode == "LChong" || $mainSubjectCode == "MAppleford"){
                                  $sourceType = "Proofs";
                                }else{
                                  $sourceType = "";
                                }

                                //GenCon
                                if($mainSubjectCode == "BCSEC" || $mainSubjectCode == "ONSEC" || $mainSubjectCode == "CD-ROM" 
                                  || $mainSubjectCode == "CED" || $mainSubjectCode == "CIVIL" || $mainSubjectCode == "CoA" 
                                  || $mainSubjectCode == "CRIM" || $mainSubjectCode == "EMP" || $mainSubjectCode == "SAFE" 
                                  || $mainSubjectCode == "SOL" || $mainSubjectCode == "EREF" || $mainSubjectCode == "ESTRUST"
                                  || $mainSubjectCode == "FAM" || $mainSubjectCode == "GST" || $mainSubjectCode == "HUM"
                                  || $mainSubjectCode == "LABOUR" || $mainSubjectCode == "LA" || $mainSubjectCode == "IP" 
                                  || $mainSubjectCode == "SA" || $mainSubjectCode == "TAXPRO" || $mainSubjectCode == "LAB"
                                  || $mainSubjectCode == "LAWREP" || $mainSubjectCode == "LAWSOURCE" || $mainSubjectCode == "LIT"
                                  || $mainSubjectCode == "MONLEG" || $mainSubjectCode == "PRINT" || $mainSubjectCode == "PROOF" 
                                  || $mainSubjectCode == "SEC"){
                                  $sourceType = "GenCon";
                                }else{
                                  $sourceType = "";
                                }

                                $shipmentNamePlusRef = $mainSubjectCode . $created_at;


                                $insertSql = "INSERT INTO tbl_tpccr_outlook_files(Ref, Bundle_No, Subject1, TAT, Delivery_date, No_of_files, Source_Type, Source_Path, created_at, updated_at)
                                VALUES('$mainSubject', '$mainSubject', '$partialMessage', '1', '$created_at', '1', '$sourceType', '$fileNamePDF', '$created_at', '$updated_at')";
                                $res = ExecuteQuerySQLSERVER($insertSql,$conWMS);

                                //$getIds = "SELECT Id FROM tbl_tpccr_outlook_files WHERE Ref='$mainSubject'";
                                //$resultId = odbc_exec($conWMS, $getIds);
                                $getIds = "SELECT Id FROM tbl_tpccr_outlook_files where Ref='$mainSubject'";
                                $res9= odbc_exec($conWMS, $getIds);   
                                $data = odbc_fetch_array($res9);
                                $dataId = $data['Id']; 

                                //insert the data into tppcr_inventory table in wms 
                                $insertData = "INSERT INTO TPCCR_INVENTORY(RefId, DocFilename, Data, flag, Pages, NumberOfPages, ProductType, INITID, TI_content, N_content, Date, FinalFilename, GraphicsFilename, InlineCode, ProcessType, WithTIFF, WithImageEdit, WithDocSegregate, WithCropSource, ShipmentName, Source_Type, TAT, FileType, ByteSize, Jobname, JobId, PriorityNo, DateRegistered)
                                VALUES('$dataId', '$fileNamePDF', '0', '$mainSubject', '1', '1', '0', '0', '0', '0', '$created_at', '1', '1', '1', '1', '1', '1', '1', '1', '$shipmentNamePlusRef',  '$sourceType' 'tat','1', '1', '1', '1', '1', '$created_at')";
                                $resIn = ExecuteQuerySQLSERVER($insertData, $conWMS);


                            }
            
                            //$res = mysqli_query($con, $insertSql);
                            /*if($result) {
                              if (odbc_num_rows($result) > 0) {
                                  //
                              } else {
                                  $insertSql = "INSERT INTO tbl_tpccr_outlook_files(Ref, Bundle_no, Subject1, TAT, Delivery_date, No_of_files, Source_type, Source_path, created_at, updated_at)
                                  VALUES('$mainSubject', '$mainSubject', '$partialMessage', '1', '$created_at', '11', 'CandyCane', '$fileNamePDF', '$created_at', '$updated_at')";
                                  $res = ExecuteQuerySQLSERVER($insertSql,$conWMS);
                                  //$res = mysqli_query($con, $insertSql);    

                              }
                            }*/
                          
                            $attachments = array();
                            if(isset($structure->parts) && count($structure->parts)) {
                              for($i = 0; $i < count($structure->parts); $i++) {
                                $attachments[$i] = array(
                                   'is_attachment' => false,
                                   'filename' => '',
                                   'name' => '',
                                   'att
                                   achment' => '');
                     
                                if($structure->parts[$i]->ifdparameters) {
                                  foreach($structure->parts[$i]->dparameters as $object) {
                                    if(strtolower($object->attribute) == 'filename') {
                                      $attachments[$i]['is_attachment'] = true;
                                      $attachments[$i]['filename'] = $object->value;
                                      $emailAttachments = $attachments[$i]['filename'] .'<br />';
                                    }
                                  }
                                }
                     
                                if($structure->parts[$i]->ifparameters) {
                                  foreach($structure->parts[$i]->parameters as $object) {
                                    if(strtolower($object->attribute) == 'name') {
                                      $attachments[$i]['is_attachment'] = true;
                                      $attachments[$i]['name'] = $object->value;
                                      //echo $attachments[$i]['filename'] .'<br />';
                                    }
                                  }
                                }
                     
                                if($attachments[$i]['is_attachment']) {
                                  $attachments[$i]['attachment'] = imap_fetchbody($connection, $emailIdent, $i+1);
                                  if($structure->parts[$i]->encoding == 3) { // 3 = BASE64
                                    $attachments[$i]['attachment'] = base64_decode($attachments[$i]['attachment']);
                                  }
                                  elseif($structure->parts[$i]->encoding == 4) { // 4 = QUOTED-PRINTABLE
                                    $attachments[$i]['attachment'] = quoted_printable_decode($attachments[$i]['attachment']);
                                  }
                                }             
                              } // for($i = 0; $i < count($structure->parts); $i++)
                          }


                      ?>
                      <tr>
                          <td> <?= $overview[0]->from; ?></td>
                          <td class="bg bg-info">  <?= $overview[0]->subject; ?> </td>
                          <td><?= $partialMessage; ?></td>
                          <td class="bg bg-info"><?= $emailAttachments; ?></td>
                          <td><?= $date; ?></td>
                          
                      </tr>
                      
                      <?php endforeach; ?>
                  </tbody>
              </table>
              <?php endif; ?>
            </div>
            <!-- fetch the email from sendthisfile -->
            <?php if(!empty($emailDataSendThisFile)): ?>
              <?php foreach($emailDataSendThisFile as $emailDataIdent): ?>
                    <?php
                    
                      $overview1 = imap_fetch_overview($connection, $emailDataIdent, 0);
                  
                      $message1 = imap_fetchbody($connection, $emailDataIdent, "1");

                      $messageExcerpt1 = substr($message1, 0, 500);
                      $partialMessage1 = trim(quoted_printable_decode($messageExcerpt1)); 
                      $date = date("d F, Y", strtotime($overview1[0]->date));
           
                      $structure = imap_fetchstructure($connection,$emailDataIdent);
           
                      $header = imap_header($connection, $emailDataIdent);

                      $mainSubject = $header->Subject;

                      $created_at = date('Y-m-d H:i:s');
                      $updated_at = date('Y-m-d H:i:s');
                    
                    ?>
                     <?php
                        $pattern = '~[a-z]+://\S+~';
                        $str = $message1;         
                        if(preg_match_all($pattern, $str, $out)){
                            foreach($out[0] as $url){
                              $page = file_get_contents($url);
                            
                              //$rawHtml =  htmlspecialchars($page);
                              //$testing = str_replace('<','&lt;',$rawHtml);
                              preg_match_all('/href=["\']?([^"\'>]+)["\']?/',$page, $matches);
                                      
                              $exp = explode('="', $matches[0][4]);
          
                              $cleanUrl = explode('"', $exp[1]);

                              $zipUrl = $cleanUrl[0];

      
                              $filename = rand().".zip"; //create a random name or certain kind of name here
                          
                              $fh = fopen($filename, 'w');
                              $ch = curl_init();
                              curl_setopt($ch, CURLOPT_URL, $zipUrl);
                              curl_setopt($ch, CURLOPT_FILE, $fh); 
                              curl_setopt($ch, CURLOPT_TIMEOUT, 0);
                              curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); // this will follow redirects
                              curl_exec($ch);
                              curl_close($ch);
                              fclose($fh);  

                              
                              $query1 = "SELECT * FROM tbl_tpccr_outlook_files WHERE Ref='$mainSubject'";
                              
                              $queryResult1 = odbc_exec($conWMS, $query1);
                              
                              $mainSubjectSplitSF = explode("-", $mainSubject);
                              $mainSubjectCodeSendFile = $mainSubjectSplitSF[0];

                              if(odbc_num_rows($queryResult1) > 0){
                                //
                              }else{
                                  
                                    //candy cane
                                  if($mainSubjectCodeSendFile == "AB" || $mainSubjectCodeSendFile == "AW" || $mainSubjectCodeSendFile == "BN" || $mainSubjectCodeSendFile == "CA" || $mainSubjectCodeSendFile == "CP" || $mainSubjectCodeSendFile == "CV" || $mainSubjectCodeSendFile == "DK" || $mainSubjectCodeSendFile == "HB" || $mainSubjectCodeSendFile == "JC" || $mainSubjectCodeSendFile == "MB" || $mainSubjectCodeSendFile == "SL" || $mainSubjectCodeSendFile == "SM" || $mainSubjectCodeSendFile == "RN" || $mainSubjectCodeSendFile == "LH"){
                                     $sourceType = "CandyCane";
                                  }

                                  //proofs
                                  if($mainSubjectCodeSendFile == "ADavison" || $mainSubjectCodeSendFile == "LChong" || $mainSubjectCodeSendFile == "MAppleford" || $mainSubjectCodeSendFile == "AIreland" || $mainSubjectCodeSendFile == "sec"){
                                      $sourceType = "Proofs";
                                  }

                                  //GenCon
                                  if($mainSubjectCodeSendFile == "BCSEC" || $mainSubjectCodeSendFile == "ONSEC" || $mainSubjectCodeSendFile == "CD-ROM" 
                                    || $mainSubjectCodeSendFile == "CED" || $mainSubjectCodeSendFile == "CIVIL" || $mainSubjectCodeSendFile == "CoA" 
                                    || $mainSubjectCodeSendFile == "CRIM" || $mainSubjectCodeSendFile == "EMP" || $mainSubjectCodeSendFile == "SAFE" 
                                    || $mainSubjectCodeSendFile == "SOL" || $mainSubjectCodeSendFile == "EREF" || $mainSubjectCodeSendFile == "ESTRUST"
                                    || $mainSubjectCodeSendFile == "FAM" || $mainSubjectCodeSendFile == "GST" || $mainSubjectCodeSendFile == "HUM"
                                    || $mainSubjectCodeSendFile == "LABOUR" || $mainSubjectCodeSendFile == "LA" || $mainSubjectCodeSendFile == "IP" 
                                    || $mainSubjectCodeSendFile == "SA" || $mainSubjectCodeSendFile == "TAXPRO" || $mainSubjectCodeSendFile == "LAB"
                                    || $mainSubjectCodeSendFile == "LAWREP" || $mainSubjectCodeSendFile == "LAWSOURCE" || $mainSubjectCodeSendFile == "LIT"
                                    || $mainSubjectCodeSendFile == "MONLEG" || $mainSubjectCodeSendFile == "PRINT" || $mainSubjectCodeSendFile == "PROOF" 
                                    || $mainSubjectCodeSendFile == "SEC" || $mainSubjectCodeSendFile == "lab"){
                                    $sourceType = "GenCon";
                                  }

                                //$shipmentNamePlusRef1 = $mainSubjectCode . $created_at;

                                $insertSql1 ="INSERT INTO tbl_tpccr_outlook_files(Ref, Bundle_No, Subject1, TAT, Delivery_Date, No_of_files, Source_Type, Source_Path, created_at, updated_at)
                                VALUES('$mainSubject', '$mainSubject', '$mainSubject', '1', '$created_at', '1', '$sourceType', '0', '$created_at', '$updated_at')";
                                $res = ExecuteQuerySQLSERVER($insertSql1, $conWMS);  


                                $getIds9 = "SELECT Id FROM tbl_tpccr_outlook_files where Ref='$mainSubject'";
                                $res90= odbc_exec($conWMS, $getIds9);   
                                $data1s = odbc_fetch_array($res90);
                                $dataId1 = $data1s['Id']; 

                              } 

                              $path = "TPCCR-Inventory/";
                              $zip = new ZipArchive;
                              $resFile = $zip->open($filename);
                              $file_count = $zip->count();

                              if($resFile === TRUE) {
                                $zip->extractTo($path);
                                
                                for($i = 0; $i < $file_count; $i++) {
                                    $file_name = $zip->getNameIndex($i);
                                    $fileExp = explode("/", $file_name);
                                    $fileZ = $fileExp[1];
                                    
                                    //if the filename has a word inventory
                                    /*$patternInv = '\b(inventory)\b';
                                    echo $fileZ; 
                                    echo "<br />";
                                    echo $patternInv;
                                    if(preg_match_all($patternInv, $fileZ, $resultOut)){
                                         
                                    }*/
                                    
                                    $explodeFileExt = explode(".", $fileZ);
                                    $fileExt = $explodeFileExt[1];

                                    if($fileExt == "xls"){
                                        $productTypeInv = "Inventory";
                                    }else{
                                        $productTypeInv = "null";
                                    }
                                    
                                          
                                    $querySql = "SELECT * FROM TPCCR_INVENTORY WHERE DocFilename='$fileZ'";
                                    $queryResult2 = odbc_exec($conWMS, $querySql);

                                    if(odbc_num_rows($queryResult2) > 0){
                                      //
                                    }else{

                                          //candy cane
                                        if($mainSubjectCodeSendFile == "AB" || $mainSubjectCodeSendFile == "AW" || $mainSubjectCodeSendFile == "BN" || $mainSubjectCodeSendFile == "CA" || $mainSubjectCodeSendFile == "CP" || $mainSubjectCodeSendFile == "CV" || $mainSubjectCodeSendFile == "DK" || $mainSubjectCodeSendFile == "HB" || $mainSubjectCodeSendFile == "JC" || $mainSubjectCodeSendFile == "MB" || $mainSubjectCodeSendFile == "SL" || $mainSubjectCodeSendFile == "SM" || $mainSubjectCodeSendFile == "RN" || $mainSubjectCodeSendFile == "LH"){
                                            $processType = "New";
                                        }

                                        //proofs
                                        if($mainSubjectCodeSendFile == "ADavison" || $mainSubjectCodeSendFile == "LChong" || $mainSubjectCodeSendFile == "MAppleford" || $mainSubjectCodeSendFile == "sec" || $mainSubjectCodeSendFile == "AIreland"){
                                            $processType = "Updating";
                                        }

                                         //GenCon
                                        if($mainSubjectCodeSendFile == "BCSEC" || $mainSubjectCodeSendFile == "ONSEC" || $mainSubjectCodeSendFile == "CD-ROM" 
                                          || $mainSubjectCodeSendFile == "CED" || $mainSubjectCodeSendFile == "CIVIL" || $mainSubjectCodeSendFile == "CoA" 
                                          || $mainSubjectCodeSendFile == "CRIM" || $mainSubjectCodeSendFile == "EMP" || $mainSubjectCodeSendFile == "SAFE" 
                                          || $mainSubjectCodeSendFile == "SOL" || $mainSubjectCodeSendFile == "EREF" || $mainSubjectCodeSendFile == "ESTRUST"
                                          || $mainSubjectCodeSendFile == "FAM" || $mainSubjectCodeSendFile == "GST" || $mainSubjectCodeSendFile == "HUM"
                                          || $mainSubjectCodeSendFile == "LABOUR" || $mainSubjectCodeSendFile == "LA" || $mainSubjectCodeSendFile == "IP" 
                                          || $mainSubjectCodeSendFile == "SA" || $mainSubjectCodeSendFile == "TAXPRO" || $mainSubjectCodeSendFile == "LAB"
                                          || $mainSubjectCodeSendFile == "LAWREP" || $mainSubjectCodeSendFile == "LAWSOURCE" || $mainSubjectCodeSendFile == "LIT"
                                          || $mainSubjectCodeSendFile == "MONLEG" || $mainSubjectCodeSendFile == "PRINT" || $mainSubjectCodeSendFile == "PROOF" 
                                          || $mainSubjectCodeSendFile == "SEC" || $mainSubjectCodeSendFile == "lab" || $mainSubjectCodeSendFile == "FedPress" || $mainSubjectCodeSendFile == "OECD"){
                                            $processType = "New";
                                        }


                                        $insertInventory = "INSERT INTO TPCCR_INVENTORY(RefId, DocFilename, Data, flag, Pages, NumberOfPages, ProductType, remarks, status, INITID, TI_content, N_content, Date, FinalFilename, GraphicsFilename, InlineCode, ProcessType, WithTIFF, WithImageEdit, WithDocSegregate,  FileType, ByteSize, Jobname, JobId, PriorityNo, DateRegistered)
                                        VALUES('$dataId1', '$fileZ', '0', '$mainSubject', '0', '0', '$productTypeInv', 'null', 'null', '0', '0', '0', '$created_at', 'NULL', 'NULL', 'NULL', '$processType',  '0', '0', 'Yes', 'NULL', '0',  '0', '0', '0', '$created_at')";
                                        $res1 = ExecuteQuerySQLSERVER($insertInventory, $conWMS);
                                    }

                                 }
                                
                                $zip->close(); 
                                echo "Woot successfully extract $filename to $path";
                                echo "<br />";
                                
                              }else{
                                   echo "Error opening the file $filename";
                                 
                              }
                            

                            }// end foreach in $out[0]
                        }// if end in preg_match_all          
                     ?>
                  
                     
               <?php endforeach; ?>
            <?php endif; ?>
            <?php 
               imap_close($connection);
            ?>
           
            <!-- /.box-footer -->
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
 
 
  <!-- /.content-wrapper -->
  

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
       
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
         

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
       
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

    <script src="bower_components/jquery/dist/jquery.min.js"></script>
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
        $('#example1').DataTable()
          $('#example2').DataTable({
            'paging'      : true,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false
          })
      })
    </script>
</body>
</html>
