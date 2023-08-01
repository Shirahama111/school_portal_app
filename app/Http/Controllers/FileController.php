<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;
use App\Models\File;
use App\Models\Directory;


class FileController extends Controller
{
    //

    public function index(Request $request): View
    {
        //directory_pathの復号
        $request->directory_path = decrypt($request->directory_path);

        // 初回アクセス時に学校idとクラスidでディレクトリを作る、すでにあれば作られない
        Storage::makeDirectory('public/'.$request->user()->school_id.'_'.$request->user()->classroom_id);


        //リクエストのディレクトリパス配下に存在するファイルを取得
        $files_path = Storage::files($request->directory_path);

        //データを扱いやすいように配列を作る
        $files = array();

        foreach ($files_path as $file_path) {

            $str_array = explode('/', $file_path);

            array_push($files, ['url' => Storage::url($file_path),
                                'name' => end($str_array),
                                'path' => $file_path]);
        }

        //リクエストのディレクトリパス配下に存在するディレクトリを取得
        $directories_path = Storage::directories($request->directory_path);

        //データを扱いやすいように配列を作る
        $directories = array();

        foreach ($directories_path as $directorie_path) {

            $str_array = explode('/', $directorie_path);
            array_push($directories, array('path' => $directorie_path,'name' => end($str_array)));
        }


        //パンくずリストを作る
        $breadcrumbs = array();
        $str_array = explode('/', $request->directory_path);

        $path = '';
        for ($i=0; $i < count($str_array)-1 ; $i++) { 
            for ($j=0; $j < $i+2; $j++) { 
                $path .= $str_array[$j];
                if($j != $i+1){
                    $path .= '/';
                }
            }
            array_push($breadcrumbs, array('path' => $path,'name' => $str_array[$i+1]));
            $path = '';
        }

        // dd($breadcrumbs);


        return view('file-share')->with(['files' => $files,'directories' => $directories,'current_directory' => $request->directory_path, 'breadcrumbs' => $breadcrumbs]);
    }

    public function store(Request $request)
    {

        $file_name = $request->file('file')->getClientOriginalName();
        
        $files = File::where(['path' => decrypt($request->directory_path).'/'.$file_name])->first();

        // dd($files);

        if($files == null){

            File::create([
                'name' => $file_name,
                'created_user' => $request->user()->id,
                'url' => decrypt($request->directory_path).'/'.$file_name,
                'path' => decrypt($request->directory_path).'/'.$file_name,
            ]);


            $request->file('file')->storeAs(decrypt($request->directory_path),$file_name);

        }

        return $this->index($request);
    }

    public function delete(Request $request)
    {

        Storage::delete($request->delete_file_path);

        return $this->index($request);
    }


    public function download(Request $request)
    {

        // Storage::makeDirectory('public/dir');
        // Storage::deleteDirectory('public/dir');
        // dd($request);
        // return view('file-share');
    }



    public function makeDirectory(Request $request)
    {
        
        Storage::makeDirectory(decrypt($request->directory_path).'/'.$request->directory_name);

        return $this->index($request);
    }

    public function deleteDirectory(Request $request)
    {
        Storage::deleteDirectory($request->delete_directory_path);

        return $this->index($request);
    }
}
