<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;


class FileController extends Controller
{
    //

    public function index(Request $request): View
    {
        // dd($request->folder_path);
        // dd(Storage::allFiles('public/'.$request->folder_path));
        // dd(Storage::directories('public/'.$request->folder_path));
        // Storage::get('public/'.$request->folder_path.'/task_8.png');

        $files_path = Storage::files($request->directory_path);

        $files = array();

        // urlに変換

        foreach ($files_path as $file_path) {

            $str_array = explode('/', $file_path);

            array_push($files, ['url' => Storage::url($file_path),
                                'file_name' => end($str_array)]);
        }

        // dd($files[0]);
        

        $directories_path = Storage::directories($request->directory_path);


        return view('file-share')->with(['files' => $files,'directories_path' => $directories_path]);
    }

    public function store(Request $request): View
    {
        // $file_name = $request->file('file')->getClientOriginalName();
        // $folder_path = 'public/'.$request->user()->school_id.'_'.$request->user()->classroom_id;


        // // dd($file_name);
        // $request->file('file')->storeAs($folder_path ,$file_name);

        return view('file-share');
    }

    public function openFile(Request $request)
    {
        
        // $request->file_path

        // return view('file-share');
    }

    public function openDirectory(Request $request): View
    {

        return view('file-share');
    }
}
