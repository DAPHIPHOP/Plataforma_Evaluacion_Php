<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Quizz;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;

class ReporteController extends Controller
{
    public function index(Request $request)
    {
        $evaluacion=Quizz::find($request->quizz);
        $spreadsheet = new Spreadsheet();


        $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('A1', 'Registro  de notas  ' . $evaluacion->name);
        $spreadsheet->getActiveSheet()->setCellValue('A3', '#')
        ->setCellValue('B3', 'DNI  ')
        ->setCellValue('c3', 'Nombres y Apellidos  ')
        ->setCellValue('D3', 'Nota  ');
        $spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(5);
        $spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(10);
        $spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(50);
        $spreadsheet->getActiveSheet()->getStyleByColumnAndRow(1, 3, 4, 3)
        ->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

        $row=4;
        $i=1;
        foreach ($evaluacion->students as $student) {

            $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(1, $row, $i);
            $spreadsheet->getActiveSheet()->getStyleByColumnAndRow(1, $row)->getBorders()->getAllBorders()
            ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(2, $row,$student->alumno->user->dni);
            $spreadsheet->getActiveSheet()->getStyleByColumnAndRow(2, $row)->getBorders()->getAllBorders()
            ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(3, $row, $student->alumno->user->name);
            $spreadsheet->getActiveSheet()->getStyleByColumnAndRow(3, $row)->getBorders()->getAllBorders()
            ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(4, $row, $student->results->sum('points'));
            $spreadsheet->getActiveSheet()->getStyleByColumnAndRow(4, $row)->getBorders()->getAllBorders()
            ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $row++;
            $i++;
        }

//exportar  excel
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Registro de notas '.$evaluacion->name.' .xlsx"');
        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('php://output');
    }
}
