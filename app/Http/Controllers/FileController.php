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

        // dd($files_path);

        //データを扱いやすいように配列を作る
        $files = array();

        foreach ($files_path as $file_path) {

            $file = File::where(['path' => $file_path])->first();

            array_push($files, $file);
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

        $directory_path = decrypt($request->directory_path);

        // ファイルを取得
        $uploadedFile = $request->file('file');

        // ファイルがアップロードされているか確認
        if ($request->hasFile('file')) {
            // ファイルの元の名前を取得
            $originalName = $uploadedFile->getClientOriginalName();

            // ファイルの拡張子を取得
            $extension = $uploadedFile->getClientOriginalExtension();

            // ファイルのMIMEタイプを取得
            $mimeType = $uploadedFile->getClientMimeType();

            // ファイルサイズを取得
            $size = $uploadedFile->getSize();

            // ファイルを保存したい場所に保存
            Storage::putFileAs($directory_path, $uploadedFile, $originalName);

            // ファイルの保存先のパスやその他の情報をデータベースなどに保存する処理を記述
            File::where(['path' => $directory_path.'/'.$originalName])->delete();

            File::create([
                'created_user' => $request->user()->id,
                'name' => $originalName,
                'path' => $directory_path.'/'.$originalName,
                'url' => Storage::url($directory_path.'/'.$originalName),
                'extension' => $extension,
                'mime_type' => $mimeType,
                'size' => $size,
            ]);

            // 成功メッセージなどを返す
            $upload_message = 'ファイルがアップロードされました。';
        } else {
            // アップロードされたファイルがない場合のエラーメッセージなどを返す
           $upload_message = 'ファイルがアップロードされていません。';
        }
        return $this->index($request)->with('upload_message',$upload_message);
    }


    public function delete(Request $request)
    {

        File::where(['path' => $request->delete_file_path])->delete();

        Storage::delete($request->delete_file_path);

        return $this->index($request)->with('delete_message','ファイルを削除しました');
    }


    public function download(Request $request)
    {
        // dd(decrypt($request->file_path));

        

        $filePath = public_path(str_replace("public", "storage", decrypt($request->file_path))); // 保存されているパスを取得


        if (file_exists($filePath))
        {
            return response()->download($filePath); // ファイルをダウンロード
                    
        } else {
            return response('File Not Found', 404);
        }
                

    }



    public function makeDirectory(Request $request)
    {

        // $directories = Directory::where(['path' => decrypt($request->directory_path).'/'.$request->directory_name])->first();

        // if($directories == null){

        //     Directory::create([
        //         'name' => $request->directory_name,
        //         'created_user' => $request->user()->id,
        //         'path' => decrypt($request->directory_path).'/'.$request->directory_name,
        //     ]);

        //     Storage::makeDirectory(decrypt($request->directory_path).'/'.$request->directory_name);
        // }
        // else{

        //     $files->delete();

        //     File::create([
        //         'name' => $file_name,
        //         'created_user' => $request->user()->id,
        //         'url' => Storage::url(decrypt($request->directory_path).'/'.$file_name),
        //         'path' => decrypt($request->directory_path).'/'.$file_name,
        //     ]);


        //     $request->file('file')->storeAs(decrypt($request->directory_path),$file_name);

        // }
        
        Storage::makeDirectory(decrypt($request->directory_path).'/'.$request->directory_name);

        return $this->index($request);
    }

    public function deleteDirectory(Request $request)
    {
        
        //選択したディレクトリ以下のファイルをデータベースから削除
        File::where('path', 'LIKE', '%'.$request->delete_directory_path.'%')->delete();

        //ディレクトリを削除
        Storage::deleteDirectory($request->delete_directory_path);

        return $this->index($request);
    }
}
