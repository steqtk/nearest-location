<?php

namespace App\Http\Controllers;

use App\Location;
use Excel;
use Illuminate\Http\Request;
use Validator;

/**
 * Class CSVController
 * @package App\Http\Controllers
 */
class CSVController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function importCSV()
    {
        return view('excel.import');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function csvToDb(Request $request)
    {
        $file = $request->only('csv-file');
        Excel::load($file['csv-file'], function ($reader) {
            $reader->each(function ($sheet) {
                Location::firstOrCreate($sheet->toArray());
            });
        });
        return view('excel.import');
    }

}
