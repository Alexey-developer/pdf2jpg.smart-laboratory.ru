<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConvertRequest;
use File;
use ZipArchive;

class MainController extends Controller
{
    public function index()
    {
        return view('index');
    }
    public function convert(ConvertRequest $request)
    {
        if ($request->hasFile('pdf_file')) {
            set_time_limit(120);

            $pdf_file = $request->file('pdf_file');
            $pdf_path = $pdf_file->store('public/pdf_files');
            $pdf = new \Spatie\PdfToImage\Pdf(str_replace('public', 'storage_local', $pdf_path));
            $numberOfPages = $pdf->getNumberOfPages();
            $name = \Carbon\Carbon::now()->timestamp . rand(1111111111111, 9999999999999);
            File::makeDirectory("storage_local/images/$name");

            $zip = new ZipArchive;

            $zip_name = 'PDF_images-' . $name . '.zip';

            if ($zip->open('storage_local/zip_files/' . $zip_name, ZipArchive::CREATE) === TRUE) {
                for ($i = 1; $i <= $numberOfPages; $i++) {
                    $pdf->setPage($i)->saveImage("storage_local/images/$name/$name-$i.jpg");
                    $zip->addFile("storage_local/images/$name/$name-$i.jpg", "$name-$i.jpg");
                }
                $zip->close();

                File::delete(str_replace('public', 'storage_local', $pdf_path));
                File::deleteDirectory("storage_local/images/$name");

                session()->flash('download_url', "https://pdf2jpg.smart-laboratory.ru/storage_local/zip_files/$zip_name");
                return redirect()->route('index');
            } else {
                return ['error' => 'Ошибка создания архива!'];
            }
        }
    }
}
