<?php
include('baseservice/json.php');
use \Simple\json;

include('baseservice/baseservice.php');	
include("connecter.php");

function getfriend($id ){
	
	
	
     $link = @Conection(new json());
     $sql  = "SELECT `patient`.`Name`, `patient`.`Surname`, `patient`.`Email` ,`patient`.`ID` as 'patientID', `friend`.`ID` FROM `friend` , `patient` WHERE (`friend`.`IDA` = '$id' OR `friend`.`IDB` = '$id') AND ( IF( `friend`.`IDA` = '$id' , `patient`.`ID` = `friend`.`IDB` , `patient`.`ID` = `friend`.`IDA` )) and `friend`.`Status` = '2'";

     $dt =  @getElements($sql,new json());
	 $dt->error = "-1";
//SELECT `patient`.`Name`, `patient`.`Surname`, `patient`.`Email` , `friend`.`ID` FROM `friend` , `patient` WHERE (`friend`.`IDA` = '$id' OR `friend`.`IDB` = '$id') AND ( IF( `friend`.`IDA` = '$id' , `patient`.`ID` = `friend`.`IDB` , `patient`.`ID` = `friend`.`IDA` )) and `friend`.`Status` = '2'
	$dt->datatype = "friend";
	
   return $dt;
}

getfriend($_GET['id'])->send();
?>