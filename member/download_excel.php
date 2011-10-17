<?php
ob_start();
include "../admin/config.inc.php";
    $sql_excel="SELECT * FROM bbs_class_member";
    if(isset($_SESSION["excel"]))
    {
    	$sql_excel=$_SESSION["excel"];
    }
    unset($_SESSION["excel"]);
    header("Content-type:application/vnd.ms-excel");
    header("Content-Disposition:attachment;filename=export_data.xls");
    $result=mysql_query($sql_excel);
    echo "id"."\t";
    echo "name"."\t";
	echo "Mobile"."\t";
  echo "QQ"."\t";
	echo "Work"."\t";
	echo "Address"."\t";
	echo "WorkAddress"."\t";
	echo "\n";
	$sum=0;
while($out=mysql_fetch_array($result))
{
//	foreach ($out as $values)
//		echo $values."\t";
//	echo "\n";
      echo $out["id"]."\t"; 
	    $sum+=1;
   	  echo $out['name']."\t";
   	  echo "'".$out['ph']."\t";
   	  echo $out['oicq']."\t";
   	  echo $out['account']."\t";
   	  echo $out['ad']."\t";
   	  echo $out['work']."\t";
   	  
   	  echo "\n";
}
echo "总计"."\t";
echo $sum."\t";
ob_end_flush();
?>