<?php

namespace App\Http\Controllers;

use App\Jobs\ProcessFileJob;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LocationController extends Controller
{

    // should be moved to env file
    const PAGE_LIMIT = 10;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function list()
    {
       // get the list of locations
        $response = [
            'locations' => Location::paginate(SELF::PAGE_LIMIT)
        ];
        return view('list', $response);
    }

    public function uploadForm()
    {
        return view('upload');
    }

    public function upload(Request $request)
    {
        try {
            //validation of limit & offset
            $validator = Validator::make($request->all(), [
                'file' => 'required|mimes:txt,csv|max:20480',
            ]);

            if ($validator->fails()) {
                return view('upload', ['errors' => $validator->errors()->all()]);
            }

            $fileName = time() . '_locations.' . $request->file->extension();

            $fileName = $request->file('file')->getClientOriginalName();
            $fileName = uniqid() . '_' . $fileName;
            // uploaded files will be in APP_BASE_PATH > uploads
            $destinationPath = base_path() . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR;
            $request->file('file')->move($destinationPath, $fileName);

            // dispatch to process file job
            dispatch(new ProcessFileJob($fileName));
            return view('upload', ['message' => 'File is uploaded succesfully. Will be processed in some time.']);
        } catch (\Exception $e) {
            return view('upload', ['errors' => $e->getMessage()]);
        }
    }
}
