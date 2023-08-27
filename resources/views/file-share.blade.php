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
          
          @foreach($breadcrumbs as $breadcrumb)
          -> <a href="{{ route('file-share.index',['directory_path' => encrypt($breadcrumb['path']) ]) }}">{{$breadcrumb['name']}}</a>
          @endforeach

          <div class="max-w-4xl mx-auto text-center bg-gray-300 p-2 rounded-md shadow-xl my-3">
            <form action="{{ route('file-share.make-directory') }}" method="post">
              @csrf
              <input type="hidden" name="directory_path" value="{{ encrypt($current_directory)}}">
              <div class="">
                <label>ディレクトリ名</label>
                <input type="text" name="directory_name" class="rounded-md" required>
                <x-primary-button>
                  作成
                </x-primary-button>
              </div>
            </form>
          </div>

          <div class="max-w-4xl mx-auto my-3 text-center bg-gray-300 p-2 rounded-md shadow-xl">
            <form method="POST" action="{{route('file-share.store')}}" enctype="multipart/form-data">
                @csrf
                <input type="file" id="file" name="file" required/>
                <input type="hidden" name="directory_path" value="{{ encrypt($current_directory) }}">
                <x-primary-button class="ml-3">
                  アップロード
                </x-primary-button>
            </form>
            @isset($upload_message)
              <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-green-600"
                >{{$upload_message}}</p>
            @endisset
          </div>

          @foreach($directories as $directory)
          <div class="max-w-4xl mx-auto flex justify-center items-center my-3 text-xl">
            <x-directory-logo></x-directory-logo>
            <a href="{{ route('file-share.index',['directory_path' => encrypt($directory['path']) ]) }}" class="mx-5">
              {{$directory['name']}}
            </a>
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

          @if(!empty($files[0]))
            @foreach($files as $file)
              <div class="max-w-4xl mx-auto flex justify-center items-center my-3 text-lg">
                <p class="flex-2">{{$file->createdUser->name}} : {{$file->created_at}}</p>
                <a href="{{$file->url}}" class="mx-5 flex-1" target="_blank">{{$file->name}}</a>
                <a href="{{route('file-share.download',['file_path' => encrypt($file->path) ])}}" class="mx-5 flex-1">download</a>
                <form action="{{ route('file-share.delete') }}" method="post" class="flex-1">
                  @method('delete')
                  @csrf
                    <input type="hidden" name="directory_path" value="{{ encrypt($current_directory)}}">
                    <input type="hidden" name="delete_file_path" value="{{$file->path}}">
                    <x-primary-button class="ml-3">
                      削除
                    </x-primary-button>
                </form>
              </div>
            @endforeach
          @endif

          @isset($delete_message)
              <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-red-600"
                >{{$delete_message}}</p>
            @endisset
  
        </div>


      </div>

      

        
     
</x-app-layout>
