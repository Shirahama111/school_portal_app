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
    @if($auth === '生徒')
      <x-slot name="header">
          <h2 class="font-semibold text-xl text-gray-800 leading-tight">
              学内予定表 確認画面
          </h2>
      </x-slot>
    
      <div class="py-12">
        <div class="max-w-4xl mx-auto p-8 rounded-md shadow-xl bg-white bg-opacity-60">
        @include('components.calendar',['event' => $event])
        </div>
      </div>
    
    @elseif($auth === '指導員')
      <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                学内予定表 編集画面
            </h2>
      </x-slot>
    
      <div class="py-12">
      </div>
    @endif
</x-app-layout>
