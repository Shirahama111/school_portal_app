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
            <form method="POST" action="{{route('file-share.store',['directory_path' => 11])}}" enctype="multipart/form-data">
                @csrf
                <input type="file" id="file" name="file"/>
                <button type="submit">アップロード</button>
            </form>
a
            @foreach($directories_path as $directory_path)
            <a href="{{ route('file-share.index',['directory_path' => $directory_path]) }}">{{$directory_path}}</a>
            @endforeach

            @foreach($files as $file)
            <a href="{{route('file-share.open-file',['file_path' => $file['url'] ])}}">{{$file['file_name']}}</a>
            @endforeach


        </div>


      </div>
    
    
</x-app-layout>
