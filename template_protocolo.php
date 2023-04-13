<?php

$nome    = $_POST['nome'];
$exames  = $_POST['exames'];
$empresa = $_POST['empresa'];
$data    = $_POST['data'];

include './vendor/autoload.php';

use PhpOffice\PhpSpreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

# Criação de um objeto novo chamado da classe Spreadsheet
$spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();

$sheet = $spreadsheet->getActiveSheet();

# Estilização da planilha
$default_styles = [ 'font' => [ 'name' => 'Calibri', 'size' => 11 ] ];

$header = [
    'font' => [
        'bold' => true,
        'color' => ['argb' => 'ffff00']
    ],

    'fill' => [
        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_GRADIENT_LINEAR,
        'startColor' => ['argb' => '376092'],
        'endColor' => ['argb' => '376092']
    ],

    'borders' => [
        'allBorders' => [ 
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            'color' => ['argb' => '376092']
        ]
    ]
    
];

$lines = [
    'borders' => [
        'allBorders' => [ 
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            'color' => ['argb' => '376092']
        ]
    ]
];

$redFont = [
    'font' => [
        'color' => ['argb' => 'ff0000']
    ]
];

$blueBoldFont = [
    'font' => [
        'bold' => true,
        'color' => ['argb' => '376092']
    ]
];

function alignTextCenter($sheet, $cell) {
    $sheet->getStyle($cell)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
    $sheet->getStyle($cell)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
}


# Array com identificação das células
# ATENÇÃO: NUNCA ADICIONE CÉLULAS NO COMEÇO OU NO MEIO DO ARRAY, SEMPRE ADICIONAR APÓS O ÚLTIMO ÍNDICE
$utilizedCells = ['A1', 'A8', 'A9', 'A10', 'A12', 'B8', 'B9' ,'B10', 'B12', 'C12', 'C10'];
$sheet->getStyle('A1:L40')->applyFromArray($default_styles);
$sheet->getStyle('A1:C5')->applyFromArray($header);
$sheet->getStyle('A1:C5')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
$sheet->getStyle('A1:C5')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$sheet->getStyle('A12:C12')->applyFromArray($header);

# Aqui está o cabeçalho da planilha
$sheet->setCellValue($utilizedCells[0], 'PROTOCOLO DE EMPRESAS');
$sheet->setCellValue($utilizedCells[1], 'EMPRESA:');
$sheet->setCellValue($utilizedCells[2], 'NOME DO REALIZADOR:');
$sheet->setCellValue($utilizedCells[3], 'DATA:');

$sheet->setCellValue($utilizedCells[5], "{$empresa}");
$sheet->setCellValue($utilizedCells[7], "{$data}");
$sheet->getStyle("{$utilizedCells[1]}:{$utilizedCells[10]}")->applyFromArray($lines);
$sheet->getStyle("{$utilizedCells[1]}:{$utilizedCells[3]}")->applyFromArray($blueBoldFont);

# mescla de células do cabeçalho
$sheet->mergeCells('A1:C5');
$sheet->mergeCells('B8:C8');
$sheet->mergeCells('B9:C9');
$sheet->mergeCells('B10:C10');


# Cabeçalho da lista
$sheet->setCellValue($utilizedCells[4], 'NOME DO COLABORADOR');
$sheet->setCellValue($utilizedCells[8], 'EXAMES');
$sheet->setCellValue($utilizedCells[9], 'ENTREGUE');

$sheet->getColumnDimension('A')->setAutoSize(true);
$sheet->getColumnDimension('B')->setAutoSize(true);
$sheet->getColumnDimension('C')->setAutoSize(true);
  
# Cria uma lista de acordo com os dados adicionados na tabela
# A função da variável $id_linha é aumentar + 1 número a cada célula adicionada para que seja possível a inserção de mais de uma linha a nossa lista
$id_linha = 13;

foreach($nome as $indice => $valor) {
    $sheet->setCellValue("A{$id_linha}", "{$valor}");
    $sheet->setCellValue("B{$id_linha}", "{$exames[$indice]}");
    $sheet->setCellValue("C{$id_linha}", "*");

    $sheet->getStyle("A{$id_linha}:C{$id_linha}")->applyFromArray($lines);
    $sheet->getStyle("B{$id_linha}:C{$id_linha}")->applyFromArray($redFont);
    
    alignTextCenter($sheet, "A{$id_linha}");
    alignTextCenter($sheet, "B{$id_linha}");
    alignTextCenter($sheet, "C{$id_linha}");
    
    $id_linha++;
}

# Definição do tipo de arquivo, destino e nome do arquivo
$writer = new Xlsx($spreadsheet);
$writer->save("./excel_docs/PROTOCOLO {$data} {$empresa}.xlsx");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <script>
        alert('Protocolo criado com sucesso, verifique sua pasta.');

        window.location.href = './criar_protocolos.php'
    </script>
</body>
</html>