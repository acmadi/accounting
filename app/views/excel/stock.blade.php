<?php
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="stocks.xlsx"');
header('Cache-Control: max-age=0');

// objek
$excel = new PHPExcel();
$sheet = $excel->getActiveSheet();

// properti
$excel->getProperties()
  ->setCreator( Auth::user()->nama )
  ->setLastModifiedBy( Auth::user()->nama )
  ->setTitle('Stock Barang')
  ->setSubject('Stock Barang')
  ->setDescription('Stock Barang '.$corp->nama);

// font
$excel->getDefaultStyle()->getFont()->setName('Times New Roman')->setSize(12);

// page setup
$sheet->getPageSetup()
  ->setHorizontalCentered(true)
  ->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4)
  ->setRowsToRepeatAtTopByStartAndEnd(5, 5);

// grid lines
$sheet->setShowGridlines(false);

// margins
$sheet->getPageMargins()
  ->setTop(1)
  ->setRight(0.75)
  ->setLeft(0.75)
  ->setBottom(1);

// nama sheet
$sheet->setTitle(date('d-m-Y'));

// header
$sheet->setCellValue('A1', $corp->nama)
  ->setCellValue('A2', 'STOCK BARANG')
  ->setCellValue('A3', $corp->alamat)
  ->mergeCells('A1:G1')
  ->mergeCells('A2:G2')
  ->mergeCells('A3:G3');

// nama perusahaan dan judul
$style = array(
  'font'      => array(
    'size'       => 15,
    'bold'       => true
  ),
  'alignment' => array(
    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
    'vertical'   => PHPExcel_Style_Alignment::VERTICAL_CENTER
  )
);
$sheet->getStyle('A1:A2')->applyFromArray($style);
unset($style);

// alamat perusahaan
$style = array(
  'font'      => array(
    'size'       => 10,
    'bold'       => false
  ),
  'alignment' => array(
    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
    'vertical'   => PHPExcel_Style_Alignment::VERTICAL_CENTER
  )
);
$sheet->getStyle('A3')->applyFromArray($style);
unset($style);

// border alamat
$style = array(
  'alignment' => array(
    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
    'vertical'   => PHPExcel_Style_Alignment::VERTICAL_CENTER
  ),
  'borders'   => array(
    'bottom'     => array(
      'style'       => PHPExcel_Style_Border::BORDER_DOUBLE
    )
  )
);
$sheet->getStyle('A3:G3')->applyFromArray($style);
unset($style);

// header tabel
$style = array(
  'font'      => array(
    'size'       => 10,
    'bold'       => true
  ),
  'alignment' => array(
    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
    'vertical'   => PHPExcel_Style_Alignment::VERTICAL_CENTER,
    'wrapText'   => true
  ),
  'borders'   => array(
    'allborders' => array(
      'style'       => PHPExcel_Style_Border::BORDER_THIN
    )
  )
);
$sheet->getStyle('A5:G5')
  ->applyFromArray($style);
$sheet->setCellValue('A5', 'No')
  ->setCellValue('B5', 'Kode')
  ->setCellValue('C5', 'Nama')
  ->setCellValue('D5', 'Satuan')
  ->setCellValue('E5', 'Jumlah')
  ->setCellValue('F5', 'Dibuat')
  ->setCellValue('G5', 'Dirubah');
unset($style);

// data tabel
$style = array(
  'font'      => array(
    'size'       => 10
  ),
  'alignment' => array(
    'vertical'   => PHPExcel_Style_Alignment::VERTICAL_CENTER
  ),
  'borders'   => array(
    'allborders' => array(
      'style'       => PHPExcel_Style_Border::BORDER_THIN
    )
  )
);
// semua tabel
$sheet->getStyle('A6:G'.(count($stock) + 5))
  ->applyFromArray($style);
$sheet->getStyle('A6:G'.(count($stock) + 5))
  ->getAlignment()
  ->setWrapText(true);
$sheet->getStyle('A6:G'.(count($stock) + 5))
  ->getAlignment()
  ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

// kolom nama
$sheet->getStyle('C6:C'.(count($stock) + 5))
  ->getAlignment()
  ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_JUSTIFY);

// lebar kolom
$sheet->getColumnDimension('A')->setWidth(5);
$sheet->getColumnDimension('B')->setWidth(8);
$sheet->getColumnDimension('C')->setWidth(20);
$sheet->getColumnDimension('D')->setWidth(10);
$sheet->getColumnDimension('E')->setWidth(10);
$sheet->getColumnDimension('F')->setWidth(10);
$sheet->getColumnDimension('G')->setWidth(10);

$i = 0;
foreach ($stock as $data) {
  $i++;

  $sheet->setCellValue('A'.($i + 5), $i)
    ->setCellValue('B'.($i + 5), ($data->barang)   ?: '-')
    ->setCellValue('C'.($i + 5), ($data->nama)   ?: '-')
    ->setCellValue('D'.($i + 5), ($data->satuan)   ?: '-')
    ->setCellValue('E'.($i + 5), ($data->jumlah) ?: '-')
    ->setCellValue('F'.($i + 5), date('d-m-Y', strtotime($data->created_at)) ?: '-')
    ->setCellValue('G'.($i + 5), date('d-m-Y', strtotime($data->updated_at)) ?: '-');
}
unset($style);

// buat dan simpan
$objWriter = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
PHPExcel_Settings::setZipClass(PHPExcel_Settings::PCLZIP);
$objWriter->save('php://output');

exit;