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
          出席・体調報告 送信画面
      </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <form class="w-full max-w-2xl mx-auto mb-8 p-8 bg-pastelblue-900 rounded-md shadow-2xl" action="{{route('attendance.store')}}" method="POST">
        @method('POST')
        @csrf
        <label class="block uppercase tracking-wide text-gray-700 text-lg font-bold mb-4 border-b-2 border-gray-700 pb-2">
              出席・体調報告フォーム
        </label>
        <div class="flex flex-wrap -mx-3 mb-6">
          <div class="w-full md:w-1/2 px-3">
            <div class="mt-4">
                <label class="block uppercase tracking-wide text-gray-700 text-md font-bold mb-2" for="instructor">
                  宛先
                </label>
                <select id="instructor" name="to_user_id" class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option class="hidden"></option>
                    @foreach($instructors as $instructor)
                    <option value="{{ $instructor->id }}">{{ $instructor->name }}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('to_user_id')" class="mt-2" />
              </div>
          </div>
        </div>
        
        <div class="flex -mx-3 mb-6">
          <div class="flex-1 mx-3">
            <label class="block tracking-wide text-gray-700 text-md font-bold mb-2" for="temperature">
              体温
            </label>
            <select id="temperature" name="temperature" class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
              @for($i = 34.0; $i < 37.6; $i+=0.1)
                @if((string)$i == '36.5')
                <option value="{{number_format($i, 1).'℃'}}" selected>{{number_format($i, 1)}}℃</option>
                @else
                <option value="{{number_format($i, 1).'℃'}}">{{number_format($i, 1)}}℃</option>
                @endif
              @endfor
            </select>
          </div>
          <div class="flex-1 mx-3">
            <label class="block tracking-wide text-gray-700 text-md font-bold mb-2" for="condition">
              体調
            </label>
            <select id="condition" name="condition" class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
              <option value="1">良い</option>
              <option value="2">少し良い</option>
              <option value="3" selected>普通</option>
              <option value="4">少し悪い</option>
              <option value="5">悪い</option>
            </select>
          </div>
        </div>

        <div class="flex flex-wrap -mx-3 mb-6">
          <div class="w-full px-3 mb-6 md:mb-0">
            <label class="block tracking-wide text-gray-700 text-md font-bold mb-2" for="remark">
              備考
            </label>
            <textarea name="remark" id="remark" cols="30" rows="2" class="block w-full bg-gray-50 text-gray-700 border border-gray-200 rounded-lg py-3 px-4 focus:outline-none focus:bg-white focus:border-gray-500"></textarea>
          </div>
        </div>
  
        <div class="flex items-center justify-end mt-4">
  
  
          @if (isset($created_massege))
          <p
          x-data="{ show: true }"
          x-show="show"
          x-transition
          x-init="setTimeout(() => show = false, 2000)"
          class="text-sm text-gray-900"
          >{{ $created_massege }}</p>
          @endif
  
          <x-primary-button class="ml-4">
              出席
          </x-primary-button>
  
        </div>
      </form>
    </div>
  
  </div>

@elseif($auth === '指導員')
  <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            出席・体調報告 確認画面
        </h2>
  </x-slot>

  <div class="py-12">

    <div class="max-w-7xl mx-auto p-6 bg-gray-300 rounded-md shadow-xl">
      <label class="text-base font-bold">日付を指定して検索</label>
      <form action="{{route('attendance.search')}}" method="post">
        @method('post')
        @csrf
        <div class="flex">
          <select id="year" name="year" required class="flex-1 mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            @for($i = 2018; $i < now()->addYear()->format('Y'); $i++)
              @if($i == now()->format('Y'))
              <option value="{{$i}}" selected>{{$i}}年</option>
              @else
              <option value="{{$i}}">{{$i}}年</option>
              @endif
            @endfor
          </select>
          <select id="month" name="month" required class="flex-1 mx-3 mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            @for($i = 1; $i < 13; $i++)
              @if($i == now()->format('m'))
              <option value="{{$i}}" selected>{{$i}}月</option>
              @else
              <option value="{{$i}}">{{$i}}月</option>
              @endif
            @endfor
          </select>
          <select id="date" name="date" required class="flex-1 mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option value="0">指定なし</option>
            @for($i = 1; $i < 32; $i++)
              @if($i == now()->format('d'))
              <option value="{{$i}}" selected>{{$i}}日</option>
              @else
              <option value="{{$i}}">{{$i}}日</option>
              @endif
            @endfor
          </select>
          <div class="flex items-center mx-2">
            <x-primary-button>検索</x-primary-button>
          </div>
        </div>
      </form>
    </div>

    @isset($search_date)
    <div class="mt-8 max-w-5xl mx-auto p-6 text-center">
      <label class="text-xl font-bold text-gray-700">{{$search_date}}</label>
    </div>
    @endisset

    @isset($attendances)
    <div class="mt-8 max-w-5xl mx-auto p-6 bg-gray-300 rounded-md shadow-xl">
      <label class="text-lg font-bold text-green-700">出席リスト</label>
  
        @foreach($attendances as $attendance)
  
          <div class="mt-3">
            <p>名前 : {{$attendance->user->name}}</p>
            <p>体温 : {{$attendance->temperature}}</p>
            <p>時刻 : {{$attendance->created_at}}</p>
          </div>
  
        @endforeach
  
    </div>
    @endisset

    @isset($absence_users)
    <div class="mt-8 max-w-5xl mx-auto p-6 bg-gray-300 rounded-md shadow-xl">
      <label class="text-lg font-bold text-red-700">欠席リスト</label>
  
        @foreach($absence_users as $absence_user)
  
          <div class="mt-3">
            <p>名前 : {{$absence_user->name}}</p>
          </div>
  
        @endforeach
  
    </div>
    @endisset

  </div>
@endif

</x-app-layout>