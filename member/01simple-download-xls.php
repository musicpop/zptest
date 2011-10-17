<?php
/**
 * PHPExcel
 *
 * Copyright (C) 2006 - 2011 PHPExcel
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * @category   PHPExcel
 * @package    PHPExcel
 * @copyright  Copyright (c) 2006 - 2011 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt	LGPL
 * @version    1.7.6, 2011-02-27
 */

/** Error reporting */
error_reporting(E_ALL);

date_default_timezone_set('Europe/London');

/** PHPExcel */
require_once '../Classes/PHPExcel.php';
include "../admin/config.inc.php";
    $sql_excel="SELECT * FROM bbs_class_member";
    if(isset($_SESSION["excel"]))
    {
    	$sql_excel=$_SESSION["excel"];
    }
 
     $result=mysql_query($sql_excel);

// Create new PHPExcel object
$objPHPExcel = new PHPExcel();



 
// Set properties
$objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
							 ->setLastModifiedBy("Maarten Balliauw")
							 ->setTitle("Office 2007 XLSX Test Document")
							 ->setSubject("Office 2007 XLSX Test Document")
							 ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
							 ->setKeywords("office 2007 openxml php")
							 ->setCategory("Test result file");
$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(30);   
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(30);
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(30);  
// Add some data
$objPHPExcel->getActiveSheet()
            ->setCellValue('A1', '姓名')
            ->setCellValue('B1', '电话')
            ->setCellValue('C1', 'QQ') 
            ->setCellValue('D1', '职业')
            ->setCellValue('E1', '通讯地址')
            ->setCellValue('F1', 'Email');
            $datarow=2;
while($out=mysql_fetch_array($result))
{
    $objPHPExcel->getActiveSheet()->setTitle("通讯录"); 
    $objPHPExcel->getActiveSheet()->getCell('A'.$datarow)->setValue( iconv('gbk', 'utf-8',$out['name'])); 
    $objPHPExcel->getActiveSheet()->setCellValueExplicit('B'.$datarow,$out['ph'],PHPExcel_Cell_DataType::TYPE_STRING); 
    $objPHPExcel->getActiveSheet()->setCellValueExplicit('C'.$datarow,$out['oicq'],PHPExcel_Cell_DataType::TYPE_STRING); 
    $objPHPExcel->getActiveSheet()->setCellValueExplicit('D'.$datarow, iconv('gbk', 'utf-8',$out['account']),PHPExcel_Cell_DataType::TYPE_STRING); 
    $objPHPExcel->getActiveSheet()->setCellValueExplicit('E'.$datarow,iconv('gbk', 'utf-8',$out['ad']),PHPExcel_Cell_DataType::TYPE_STRING);
     $objPHPExcel->getActiveSheet()->setCellValueExplicit('F'.$datarow,iconv('gbk', 'utf-8',$out['email']),PHPExcel_Cell_DataType::TYPE_STRING);
$datarow++; 
}

// Redirect output to a client’s web browser (Excel5)
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="基三一.xls"');
header('Cache-Control: max-age=0');

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
exit;
