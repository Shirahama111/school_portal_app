@switch(Auth::user()->position->name)

    @case('生徒')
          @php
          $auth = '生徒';
          @endphp
        @break

    @case('指導員')
          @php
          $auth = '指導員';
          @endphp
        @break

    @default

    @break
@endswitch

<x-app-layout>
    
      <x-slot name="header">
          <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            ファイル共有画面
          </h2>
      </x-slot>
    
      <div class="py-12">

      

        <div class="max-w-4xl mx-auto text-center">
          <p>現在のディレクトリ : {{$current_directory}}</p>

          @foreach($breadcrumbs as $breadcrumb)
          -> <a href="{{ route('file-share.index',['directory_path' => encrypt($breadcrumb['path']) ]) }}">{{$breadcrumb['name']}}</a>
          @endforeach

          <div class="max-w-4xl mx-auto text-center bg-gray-500 p-4 m-8 rounded-md">
            <form action="{{ route('file-share.make-directory') }}" method="post">
              @csrf
              <input type="hidden" name="directory_path" value="{{ encrypt($current_directory)}}">
              <div class="">
                <label>ディレクトリ名</label>
                <input type="text" name="directory_name" required>
                <x-primary-button>
                  作成
                </x-primary-button>
              </div>
            </form>
          </div>

          <div class="max-w-4xl mx-auto text-center bg-gray-500 p-4 rounded-md">
            <form method="POST" action="{{route('file-share.store')}}" enctype="multipart/form-data">
                @csrf
                <input type="file" id="file" name="file" required/>
                <input type="hidden" name="directory_path" value="{{ encrypt($current_directory) }}">
                <button type="submit">アップロード</button>
            </form>
          </div>

          @foreach($directories as $directory)
          <div class="max-w-4xl mx-auto flex justify-center my-3">
            <a href="{{ route('file-share.index',['directory_path' => encrypt($directory['path']) ]) }}">{{$directory['name']}}</a>
            <form action="{{ route('file-share.delete-directory') }}" method="post">
              @csrf
              <input type="hidden" name="directory_path" value="{{ encrypt($current_directory)}}">
              <input type="hidden" name="delete_directory_path" value="{{$directory['path']}}">
              <x-primary-button class="ml-3">
                削除
              </x-primary-button>
            </form>
          </div>
          @endforeach

          @foreach($files as $file)
          <div class="max-w-4xl mx-auto flex justify-center my-3">
            <a href="{{$file['url']}}">{{$file['name']}}</a>
            <a href="{{route('file-share.download',['file_name' => $file['name']])}}">download</a>
            <form action="{{ route('file-share.delete') }}" method="post">
            @method('delete')
            @csrf
              <input type="hidden" name="directory_path" value="{{ encrypt($current_directory)}}">
              <input type="hidden" name="delete_file_path" value="{{$file['path']}}">
              <x-primary-button class="ml-3">
                削除
              </x-primary-button>
            </form>
          </div>
          @endforeach


        </div>


      </div>
    
    
</x-app-layout>
