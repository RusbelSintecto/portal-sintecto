<?php

Yii::import('application.extensions.PHPExcel.*');

//ksort($qualityPorc);
$firstRow = 10;
$lastDataRow = 1;
$lastRow = $lastDataRow;

/** Error reporting */
error_reporting(E_ALL);
date_default_timezone_set('America/Bogota');

$date1 = new \DateTime($invoiceVisit->invoiceDate);
$DateFac=$date1->format('d-m-Y');

$nomVisitador=$invoiceVisit->user->firstName.' '.$invoiceVisit->user->lastName;

// Create new PHPExcel object
$objPHPExcel = new PHPExcel();

$objPHPExcel->setActiveSheetIndex(0)->getColumnDimension('A')->setWidth(15);
$objPHPExcel->setActiveSheetIndex(0)->getColumnDimension('B')->setWidth(25);
$objPHPExcel->setActiveSheetIndex(0)->getColumnDimension('C')->setWidth(30);
$objPHPExcel->setActiveSheetIndex(0)->getColumnDimension('D')->setWidth(35);
$objPHPExcel->setActiveSheetIndex(0)->getColumnDimension('E')->setWidth(30);
$objPHPExcel->setActiveSheetIndex(0)->getColumnDimension('F')->setWidth(30);
$objPHPExcel->setActiveSheetIndex(0)->getColumnDimension('G')->setWidth(20);
$objPHPExcel->setActiveSheetIndex(0)->getColumnDimension('H')->setWidth(20);
$objPHPExcel->setActiveSheetIndex(0)->getColumnDimension('I')->setWidth(30);
$objPHPExcel->setActiveSheetIndex(0)->getColumnDimension('J')->setWidth(25);
$objPHPExcel->setActiveSheetIndex(0)->getColumnDimension('K')->setWidth(25);
$objPHPExcel->setActiveSheetIndex(0)->getColumnDimension('L')->setWidth(25);
$objPHPExcel->setActiveSheetIndex(0)->getColumnDimension('M')->setWidth(20);
$objPHPExcel->setActiveSheetIndex(0)->getColumnDimension('N')->setWidth(30);
$objPHPExcel->setActiveSheetIndex(0)->getColumnDimension('O')->setWidth(30);
$objPHPExcel->setActiveSheetIndex(0)->getColumnDimension('P')->setWidth(25);

$gdImage = imagecreatefromjpeg('../svpold/mantenimiento/images/fondo_blanco.jpg');

$objDrawing = new PHPExcel_Worksheet_MemoryDrawing();
$objDrawing->setName('Sample image');$objDrawing->setDescription('Sample image');
$objDrawing->setImageResource($gdImage);
$objDrawing->setRenderingFunction(PHPExcel_Worksheet_MemoryDrawing::RENDERING_JPEG);
$objDrawing->setMimeType(PHPExcel_Worksheet_MemoryDrawing::MIMETYPE_DEFAULT);
$objDrawing->setHeight(60);
$objDrawing->setCoordinates('A1');
$objDrawing->setOffsetX(50);                    
$objDrawing->setOffsetY(10);  
$objDrawing->setWorksheet($objPHPExcel->getActiveSheet());

$objPHPExcel->setActiveSheetIndex(0)
        //->setCellValue('A1', $gdImage)
        ->setCellValue('B1', 'FORMATO RELACIÓN DE PUBLICACIONES REALIZADAS '.$DateFac)
        ->setCellValue('A5', 'FECHA DE RELACIÓN')
        ->setCellValue('C5', 'NOMBRE')
        ->setCellValue('D5', $nomVisitador)
        ->setCellValue('A6', 'DESDE')
        ->setCellValue('B6', 'HASTA')
        ->setCellValue('C6', 'CIUDAD DE RESIDENCIA')
        ->setCellValue('D6', $invoiceVisit->user->city)
        ->setCellValue('A7', $invoiceVisit->from)
        ->setCellValue('B7', $invoiceVisit->until);

$style_cell = array(
    'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
    ) 
    ); 

//$spreadsheet->getActiveSheet()->getStyle('A1')->getFont()->setSize(10);    

$objPHPExcel->getActiveSheet()->getStyle("B1")->getFont()->setSize(16)->setBold(true)->getColor()->setRGB('FFFFFF');
$objPHPExcel->getActiveSheet()->getStyle("A5")->getFont()->setSize(12)->setBold(true)->getColor()->setRGB('000000');
$objPHPExcel->getActiveSheet()->getStyle("A6")->getFont()->setSize(12)->setBold(true)->getColor()->setRGB('000000');
$objPHPExcel->getActiveSheet()->getStyle("B6")->getFont()->setSize(12)->setBold(true)->getColor()->setRGB('000000');
$objPHPExcel->getActiveSheet()->getStyle("A7")->getFont()->setSize(12)->setBold(true)->getColor()->setRGB('C82626');
$objPHPExcel->getActiveSheet()->getStyle("B7")->getFont()->setSize(12)->setBold(true)->getColor()->setRGB('C82626');
$objPHPExcel->getActiveSheet()->getStyle("C5")->getFont()->setSize(12)->setBold(true)->getColor()->setRGB('000000');
$objPHPExcel->getActiveSheet()->getStyle("C6")->getFont()->setSize(12)->setBold(true)->getColor()->setRGB('000000');

$objPHPExcel->getActiveSheet()->getStyle("D5")->getFont()->setSize(12)->setBold(true)->getColor()->setRGB('002060');
$objPHPExcel->getActiveSheet()->getStyle("D6")->getFont()->setSize(12)->setBold(true)->getColor()->setRGB('002060');

$objPHPExcel->getActiveSheet()->getStyle('B1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$objPHPExcel->getActiveSheet()->getStyle('A5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$objPHPExcel->getActiveSheet()->getStyle('A6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$objPHPExcel->getActiveSheet()->getStyle('B6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$objPHPExcel->getActiveSheet()->getStyle('A7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$objPHPExcel->getActiveSheet()->getStyle('B7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$objPHPExcel->getActiveSheet()->getStyle('C5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$objPHPExcel->getActiveSheet()->getStyle('C6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$objPHPExcel->getActiveSheet()->getStyle('B1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
$objPHPExcel->getActiveSheet()->getStyle('C6')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
$objPHPExcel->getActiveSheet()->getStyle('D6')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);

$objPHPExcel->getActiveSheet()->mergeCells('B1:P3');   
$objPHPExcel->getActiveSheet()->mergeCells('A1:A3');   

$objPHPExcel->getActiveSheet()->mergeCells('A5:B5');   
$objPHPExcel->getActiveSheet()->mergeCells('C5:C5');   
$objPHPExcel->getActiveSheet()->mergeCells("D5:P5");     
$objPHPExcel->getActiveSheet()->mergeCells("A6:A6");   
$objPHPExcel->getActiveSheet()->mergeCells("B6:B6");   
$objPHPExcel->getActiveSheet()->mergeCells("C6:C7");  
$objPHPExcel->getActiveSheet()->mergeCells("D6:P7");  
$objPHPExcel->getActiveSheet()->mergeCells("A7:A7");   
$objPHPExcel->getActiveSheet()->mergeCells("B7:B7");   

$styleArray = array(
    'font' => array(
        'bold' => true
    ),
);

$objPHPExcel->getActiveSheet()->getStyle('B1')->applyFromArray($styleArray);

$styleArrayBorder = array(
    'borders' => array(
        'top' => array('style' => PHPExcel_Style_Border::BORDER_DASHED),  //BORDER_DASHED
        'bottom' => array('style' => PHPExcel_Style_Border::BORDER_DASHED),
        'right' => array('style' => PHPExcel_Style_Border::BORDER_DASHED),
        'left' => array('style' => PHPExcel_Style_Border::BORDER_DASHED),
    )
);

$objPHPExcel->getActiveSheet()->getStyle('B1:P3')->applyFromArray( array( 'fill' => array( 'type' => PHPExcel_Style_Fill::FILL_SOLID, 'color' => array('rgb' => '002060'))));
$objPHPExcel->getActiveSheet()->getStyle('A1:A3')->applyFromArray( array( 'fill' => array( 'type' => PHPExcel_Style_Fill::FILL_SOLID, 'color' => array('rgb' => '002060'))));
$objPHPExcel->getActiveSheet()->getStyle('A5:P5')->applyFromArray( array( 'fill' => array( 'type' => PHPExcel_Style_Fill::FILL_SOLID, 'color' => array('rgb' => 'CFCFCF'))));
$objPHPExcel->getActiveSheet()->getStyle('A6:P6')->applyFromArray( array( 'fill' => array( 'type' => PHPExcel_Style_Fill::FILL_SOLID, 'color' => array('rgb' => 'CFCFCF'))));
$objPHPExcel->getActiveSheet()->getStyle('A7:B7')->applyFromArray( array( 'fill' => array( 'type' => PHPExcel_Style_Fill::FILL_SOLID, 'color' => array('rgb' => 'CFCFCF'))));

$objPHPExcel->getActiveSheet()->getStyle('A5:B5')->applyFromArray($styleArrayBorder);
$objPHPExcel->getActiveSheet()->getStyle('C5')->applyFromArray($styleArrayBorder);
$objPHPExcel->getActiveSheet()->getStyle('D5:P5')->applyFromArray($styleArrayBorder);
$objPHPExcel->getActiveSheet()->getStyle('A6')->applyFromArray($styleArrayBorder);
$objPHPExcel->getActiveSheet()->getStyle('B6')->applyFromArray($styleArrayBorder);
$objPHPExcel->getActiveSheet()->getStyle('C6:C7')->applyFromArray($styleArrayBorder);
$objPHPExcel->getActiveSheet()->getStyle('D6:P7')->applyFromArray($styleArrayBorder);
$objPHPExcel->getActiveSheet()->getStyle('A7')->applyFromArray($styleArrayBorder);
$objPHPExcel->getActiveSheet()->getStyle('B7')->applyFromArray($styleArrayBorder);

$headerStyle = new PHPExcel_Style();

$headerStyle->applyFromArray(
        array(
//            'fill' => array(
//                'type' => PHPExcel_Style_Fill::FILL_SOLID,
//                'color' => array('argb' => '00276C99')  //39, 108, 153
//            ),
            'borders' => array(
                'top' => array('style' => PHPExcel_Style_Border::BORDER_THICK),
                'bottom' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
                'right' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
                'left' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
            ),
            'font' => array(
                'bold' => true,
            ),
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
            )
));


//$objPHPExcel->getActiveSheet()->setSharedStyle($headerStyle, "A9:J9");


$cellStyle = new PHPExcel_Style();

$cellStyle->applyFromArray(
        array(
            'borders' => array(
                'top' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
                'bottom' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
                'right' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
                'left' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
            )
));

$objPHPExcel->getActiveSheet()->setSharedStyle($cellStyle, "A{$firstRow}:I{$lastRow}");
$objPHPExcel->getActiveSheet()->setAutoFilter("A9:P9");

$objPHPExcel->getActiveSheet()->getRowDimension(1)->setRowHeight(30);


$objPHPExcel->getActiveSheet()
        ->setCellValue('A9', 'ITEM')
        ->setCellValue('B9', 'FECHA DE LA VISITA')
        ->setCellValue('C9', 'REFERENCIA')
        ->setCellValue('D9', 'IDENTIFICACIÓN DEL EVALUADO')
        ->setCellValue('E9', 'NOMBRE')
        ->setCellValue('F9', 'CLIENTE')
        ->setCellValue('G9', 'CIUDAD VISITA')
        ->setCellValue('H9', 'COSTO VISITA')
        ->setCellValue('I9', 'COSTO ADICIONAL VISITA')
        ->setCellValue('j9', 'COSTO TRANSPORTE')
        ->setCellValue('K9', 'COSTO ALIMENTACIÓN')
        ->setCellValue('L9', 'COSTO PAPELERIA')
        ->setCellValue('M9', 'APROBADO')
        ->setCellValue('N9', 'VIÁTICO APROBADO POR')
        ->setCellValue('O9', 'VIÁTICO APROBADO EN')
        ->setCellValue('P9', 'VALOR TOTAL');

$styleArray = array(
    'font' => array(
        'bold' => true
    ),
);

$styleArrayBorderCell= array(
    'borders' => array(
        'top' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
        'bottom' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
        'right' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
        'left' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
    )
);

$objPHPExcel->getActiveSheet()->getStyle("A9:P9")->getFont()->setBold(true)->getColor()->setRGB('FFFFFF');
$objPHPExcel->getActiveSheet()->getStyle("A9:P9")->applyFromArray( array( 'fill' => array( 'type' => PHPExcel_Style_Fill::FILL_SOLID, 'color' => array('rgb' => '0277BC') ) ) );
$objPHPExcel->getActiveSheet()->getStyle("A9:P9")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);


$date1 = new \DateTime("");
$Date=$date1->format('Y-m-d');

$i=1;
$row = $firstRow;
foreach ($exportInvoicePreFac as $result){

    $assignedUser=AssignedUser::model()->findByAttributes(['verificationSectionId'=>$result['idverifisection']]);
    
    if($assignedUser){
        $finishOn=$assignedUser->finishedAt;
    }else{
        $finishOn='';
    }

    if($result['idSection']==5){
        $detailHousing =  DetailHousing::model()->findByAttributes(['verificationSectionId'=>$result['idverifisection']]);
        $visitaOn=$detailHousing->visitedOn; 
    }else if($result['idSection']==17){
        $detailCompanyVisit =  DetailCompanyVisit::model()->findByAttributes(['verificationSectionId'=>$result['idverifisection']]);
        $visitaOn=$detailCompanyVisit->verifiedOn; 
    }else{
        $otherSectionXml =  XmlSection::model()->findByAttributes(['verificationSectionId'=>$result['idverifisection']]);
        $xmlanswer=$otherSectionXml->answer; 

        $XMLQuestionResult = array();
        $resultxml =  unserialize($otherSectionXml->answer) ;
        $XMLQuestionResult = array_merge($XMLQuestionResult, $resultxml);   
        if(isset($XMLQuestionResult['verifiedOn'])){
            $visitaOn=$XMLQuestionResult['verifiedOn'];
        }else{
            $visitaOn='';
        }
        
    }

    $totalvisita=$result['totalValueCostVisit']+$result['totalValueAddVisit']+$result['totalValueTransportation']+$result['totalValueFeeding']+$result['totalValueStationery'];

    $objPHPExcel->getActiveSheet()->getStyle('A' . $row)->applyFromArray($styleArrayBorderCell);
    $objPHPExcel->getActiveSheet()->getStyle('B' . $row)->applyFromArray($styleArrayBorderCell);
    $objPHPExcel->getActiveSheet()->getStyle('C' . $row)->applyFromArray($styleArrayBorderCell);
    $objPHPExcel->getActiveSheet()->getStyle('D' . $row)->applyFromArray($styleArrayBorderCell);
    $objPHPExcel->getActiveSheet()->getStyle('E' . $row)->applyFromArray($styleArrayBorderCell);
    $objPHPExcel->getActiveSheet()->getStyle('F' . $row)->applyFromArray($styleArrayBorderCell);
    $objPHPExcel->getActiveSheet()->getStyle('G' . $row)->applyFromArray($styleArrayBorderCell);
    $objPHPExcel->getActiveSheet()->getStyle('H' . $row)->applyFromArray($styleArrayBorderCell);
    $objPHPExcel->getActiveSheet()->getStyle('I' . $row)->applyFromArray($styleArrayBorderCell);
    $objPHPExcel->getActiveSheet()->getStyle('J' . $row)->applyFromArray($styleArrayBorderCell);
    $objPHPExcel->getActiveSheet()->getStyle('K' . $row)->applyFromArray($styleArrayBorderCell);
    $objPHPExcel->getActiveSheet()->getStyle('L' . $row)->applyFromArray($styleArrayBorderCell);
    $objPHPExcel->getActiveSheet()->getStyle('M' . $row)->applyFromArray($styleArrayBorderCell);
    $objPHPExcel->getActiveSheet()->getStyle('N' . $row)->applyFromArray($styleArrayBorderCell);
    $objPHPExcel->getActiveSheet()->getStyle('O' . $row)->applyFromArray($styleArrayBorderCell);
    $objPHPExcel->getActiveSheet()->getStyle('P' . $row)->applyFromArray($styleArrayBorderCell);

    $objPHPExcel->getActiveSheet()->getStyle('A' . $row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $objPHPExcel->getActiveSheet()->getStyle('B' . $row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $objPHPExcel->getActiveSheet()->getStyle('C' . $row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $objPHPExcel->getActiveSheet()->getStyle('D' . $row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $objPHPExcel->getActiveSheet()->getStyle('E' . $row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
    $objPHPExcel->getActiveSheet()->getStyle('F' . $row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
    $objPHPExcel->getActiveSheet()->getStyle('G' . $row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
    $objPHPExcel->getActiveSheet()->getStyle('H' . $row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
    $objPHPExcel->getActiveSheet()->getStyle('I' . $row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
    $objPHPExcel->getActiveSheet()->getStyle('J' . $row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
    $objPHPExcel->getActiveSheet()->getStyle('K' . $row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
    $objPHPExcel->getActiveSheet()->getStyle('L' . $row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
    $objPHPExcel->getActiveSheet()->getStyle('M' . $row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $objPHPExcel->getActiveSheet()->getStyle('N' . $row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
    $objPHPExcel->getActiveSheet()->getStyle('O' . $row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
    $objPHPExcel->getActiveSheet()->getStyle('P' . $row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);

    $objPHPExcel->getActiveSheet()->getStyle('H'. $row)->applyFromArray($styleArray);
    $objPHPExcel->getActiveSheet()->getStyle('I'. $row)->applyFromArray($styleArray);
    $objPHPExcel->getActiveSheet()->getStyle('J'. $row)->applyFromArray($styleArray);
    $objPHPExcel->getActiveSheet()->getStyle('K'. $row)->applyFromArray($styleArray);
    $objPHPExcel->getActiveSheet()->getStyle('L'. $row)->applyFromArray($styleArray);
    $objPHPExcel->getActiveSheet()->getStyle('P'. $row)->applyFromArray($styleArray);

    $objPHPExcel->getActiveSheet()
            ->setCellValue('A' . $row, $i)
            ->setCellValue('B' . $row, $finishOn)
            ->setCellValue('C' . $row, $result['code'])
            ->setCellValue('D' . $row, $result['idNumber'])
            ->setCellValue('E' . $row, $result['nombreCandidato'])
            ->setCellValue('F' . $row, $result['name'])
            ->setCellValue('G' . $row, $result['city'])
            ->setCellValue('H' . $row, $result['totalValueCostVisit'])
            ->setCellValue('I' . $row, $result['totalValueAddVisit'])
            ->setCellValue('J' . $row, $result['totalValueTransportation'])
            ->setCellValue('K' . $row, $result['totalValueFeeding'])
            ->setCellValue('L' . $row, $result['totalValueStationery'])
            ->setCellValue('M' . $row, $result['aprobado'])
            ->setCellValue('N' . $row, $result['aprobadoPor'])
            ->setCellValue('O' . $row, $result['DateApprovedOP'])
            ->setCellValue('P' . $row, $totalvisita);
        
    $i=$i+1;
    $row++;
}

WebUser::logAccess("Relación Cuenta de Cobro ".$row." filas.");

$objPHPExcel->getActiveSheet()->setTitle('Relcn_Cuent_Cobro_'.$DateFac);

// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);


// Redirect output to a client’s web browser (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Relación cuenta de cobro"'.$nomVisitador.'_'.date("Ymd_His").'".xlsx"');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header('Pragma: public'); // HTTP/1.0

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
exit;
