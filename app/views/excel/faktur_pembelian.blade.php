<?php
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="faktur_pembelian.xlsx"');
header('Cache-Control: max-age=0');

// objek
$excel = new PHPExcel();
$sheet = $excel->getActiveSheet();

// properti
$excel->getProperties()
  ->setCreator( Auth::user()->nama )
  ->setLastModifiedBy( Auth::user()->nama )
  ->setTitle('Data Faktur Pembelian')
  ->setSubject('Data Faktur Pembelian')
  ->setDescription('Data Faktur Pembelian '.$corp->nama);

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
  ->setCellValue('A2', 'DATA FAKTUR PEMBELIAN')
  ->setCellValue('A3', $corp->alamat)
  ->mergeCells('A1:H1')
  ->mergeCells('A2:H2')
  ->mergeCells('A3:H3');

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
$sheet->getStyle('A3:H3')->applyFromArray($style);
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
$sheet->getStyle('A5:H5')
  ->applyFromArray($style);
$sheet->setCellValue('A5', 'No')
  ->setCellValue('B5', 'Tanggal')
  ->setCellValue('C5', 'Kode')
  ->setCellValue('D5', 'Nama Supplier')
  ->setCellValue('E5', 'Nama Barang')
  ->setCellValue('F5', 'Harga')
  ->setCellValue('G5', 'Jumlah')
  ->setCellValue('H5', 'Total');
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
$sheet->getStyle('A6:H'.(count($faktur) + 5))
  ->applyFromArray($style);
$sheet->getStyle('A6:H'.(count($faktur) + 5))
  ->getAlignment()
  ->setWrapText(true);
$sheet->getStyle('A6:H'.(count($faktur) + 5))
  ->getAlignment()
  ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

// kolom nama pemasok
$sheet->getStyle('D6:D'.(count($faktur) + 5))
  ->getAlignment()
  ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_JUSTIFY);

// kolom nama barang
$sheet->getStyle('E6:E'.(count($faktur) + 5))
  ->getAlignment()
  ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_JUSTIFY);

// lebar kolom
$sheet->getColumnDimension('A')->setWidth(5);
$sheet->getColumnDimension('B')->setWidth(10);
$sheet->getColumnDimension('C')->setWidth(8);
$sheet->getColumnDimension('D')->setWidth(25);
$sheet->getColumnDimension('E')->setWidth(25);
$sheet->getColumnDimension('F')->setWidth(10);
$sheet->getColumnDimension('G')->setWidth(10);
$sheet->getColumnDimension('H')->setWidth(10);

$i = 0;
foreach ($faktur as $data) {
  $i++;

  $sheet->setCellValue('A'.($i + 5), $i)
    ->setCellValue('B'.($i + 5), (date('d-m-Y', strtotime($data->created_at))) ?: '-')
    ->setCellValue('C'.($i + 5), ($data->kode)                  ?: '-')
    ->setCellValue('D'.($i + 5), ($data->nama_pemasok)          ?: '-')
    ->setCellValue('E'.($i + 5), ($data->nama_barang)           ?: '-')
    ->setCellValue('F'.($i + 5), ($data->total / $data->jumlah) ?: '-')
    ->setCellValue('G'.($i + 5), ($data->jumlah)                ?: '-')
    ->setCellValue('H'.($i + 5), ($data->total)                 ?: '-');
}
unset($style);

// buat dan simpan
$objWriter = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
PHPExcel_Settings::setZipClass(PHPExcel_Settings::PCLZIP);
$objWriter->save('php://output');

exit;