<?php

namespace App\Services;

class PdfService
{
    public function store($pdfFile, String $path = 'pdfs')
    {
        $pdfFileName = $path .'/' . $pdfFile->getClientOriginalName();
        $pdfFile->move(public_path('pdfs'), $pdfFileName);
        return $pdfFileName;
    }
}
