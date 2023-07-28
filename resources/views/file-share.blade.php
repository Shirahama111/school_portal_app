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
      </div>
    
    
</x-app-layout>
