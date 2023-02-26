<?php
 define('HOST','localhost');
 //define('USER','automat_ccc');//wavesofc_cox // automat_ccc
 //define('PASS','!MN+CMfctA(4');//!MN+CMfctA(4
 //define('DB','automat_cccApp'); //automorc_cccApp //wavesofc_all_info_db

define('USER','automa_user');//wavesofc_cox // automat_ccc
define('PASS','parvez@good');//!MN+CMfctA(4
define('DB','automa_bongomata'); //automorc_cccApp //wavesofc_all_info_db
 $con = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect');
 mysqli_query($con,'SET CHARACTER SET utf8'); 
 mysqli_query($con,"SET SESSION collation_connection ='utf8_unicode_ci'");