<?php

$nome = $_POST['nome'];
$exames = $_POST['exames'];


include './vendor/autoload.php';
include './teste.php';

use PhpOffice\PhpSpreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

# Criação de um objeto novo chamado da classe Spreadsheet
$spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();

$sheet = $spreadsheet->getActiveSheet();

# Aqui está o cabeçalho da planilha
$sheet->setCellValue('A1', 'PROTOCOLO DE EMPRESAS');
$sheet->setCellValue('A8', 'EMPRESA');
$sheet->setCellValue('A9', 'NOME DO REALIZADOR');
$sheet->setCellValue('A10', 'DATA');


# mescla de células do cabeçalho
$sheet->mergeCells('A1:C5');
$sheet->mergeCells('B8:C8');
$sheet->mergeCells('B9:C9');
$sheet->mergeCells('B10:C10');


# Cabeçalho da lista
$sheet->setCellValue('A12', 'NOME DO COLABORADOR');
$sheet->setCellValue('B12', 'EXAMES');
$sheet->setCellValue('C12', 'ENTREGUE');

  
# Lista
$id_linha = 13;

foreach($nome as $indice => $valor) {
    $sheet->setCellValue("A{$id_linha}", "{$valor}");
    $sheet->setCellValue("B{$id_linha}", "{$exames[$indice]}");

    
    $id_linha++;
    
}


# Definição do tipo de arquivo, destino e nome do arquivo
$writer = new Xlsx($spreadsheet);
$writer->save("./excel_docs/teste.xlsx");