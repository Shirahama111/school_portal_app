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
          進路 送信画面
      </h2>
  </x-slot>

  <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <form class="w-full max-w-2xl mx-auto my-8 p-8 bg-pastelblue-900 rounded-md shadow-2xl" action="{{route('course.store')}}" method="POST">
      @method('POST')
      @csrf
      <label class="block uppercase tracking-wide text-gray-700 text-lg font-bold mb-4 border-b-2 border-gray-700 pb-2">
            進路報告フォーム
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

      <div>
        <label class="block tracking-wide text-gray-700 text-md font-bold my-3" for="company_name">
            会社名
        </label>
        <x-text-input id="company_name" class="block mt-1 w-full" type="text" name="company_name" required/>
      </div>
      <div>
        <label class="block tracking-wide text-gray-700 text-md font-bold my-3" for="address">
            住所
        </label>
        <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" required/>
      </div>
      <div>
        <label class="block tracking-wide text-gray-700 text-md font-bold my-3" for="content">
            選考内容
        </label>
        <textarea name="content" id="content" cols="30" rows="3" required class="block w-full bg-gray-50 text-gray-700 border border-gray-200 rounded-lg py-3 px-4 focus:outline-none focus:bg-white focus:border-gray-500"></textarea>
      </div>
      <div>
        <label class="block tracking-wide text-gray-700 text-md font-bold my-3" for="remarks">
            備考
        </label>
        <textarea name="remarks" id="remarks" cols="30" rows="2" class="block w-full bg-gray-50 text-gray-700 border border-gray-200 rounded-lg py-3 px-4 focus:outline-none focus:bg-white focus:border-gray-500"></textarea>
      </div>

      <input type="hidden" name="from" value="{{Auth::user()->id}}">
      <x-input-error :messages="$errors->get('from')" class="mt-2" />

      <div class="flex items-center justify-end mt-4">

        @if (session('status') === 'course.created')
        <p
        x-data="{ show: true }"
        x-show="show"
        x-transition
        x-init="setTimeout(() => show = false, 2000)"
        class="text-sm text-gray-900"
        >{{ __('Posted.') }}</p>
        @endif

        <x-primary-button class="ml-4">
            {{ __('Post') }}
        </x-primary-button>

      </div>
    </form>
  </div>

  @if(isset($fromCourse))
  <div class="max-w-4xl mx-auto sm:p-6 lg:p-8 bg-gray-300 bg-opacity-70 rounded-lg shadow-2xl">
    <label class="text-gray-900 text-xl font-bold" for="anonymity">報告済みの進路</label>
    <div class="max-w-3xl my-8 mx-auto bg-pastelblue-900 shadow-md sm:rounded-lg p-6">
      <div class="text-lg mb-2">宛先 : {{ $fromCourse->toUser->name }}</div>  
      <div class="text-md p-2 bg-gray-100 rounded-lg">
        会社名 : {{ $fromCourse->company_name }}<br>
        住所 : {{ $fromCourse->address }}<br>
        選考内容 : {{ $fromCourse->content }}<br>
        備考 : {{ $fromCourse->remarks }}
      </div>
      <div class="text-sm text-right mt-2">{{ $fromCourse->date }}</div>
    </div>
  </div>
  @endif

@elseif($auth === '指導員')
  <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            進路 確認画面
        </h2>
  </x-slot>

   @if(isset($toCourses))
  <div class="my-4 max-w-4xl mx-auto sm:p-6 lg:p-8 bg-gray-300 bg-opacity-70 rounded-lg shadow-2xl">
    <label class="text-gray-900 text-xl font-bold" for="anonymity">生徒進路一覧</label>
    @foreach($toCourses as $toCourse)
    <div class="max-w-3xl my-8 mx-auto bg-pastelpurple-900 shadow-md sm:rounded-lg p-6">
      <div class="text-lg mb-2">差出人 : {{ $toCourse->fromUser->name }}</div>  
      <div class="text-md p-2 bg-gray-100 rounded-lg">
        会社名 : {{ $toCourse->company_name }}<br>
        住所 : {{ $toCourse->address }}<br>
        選考内容 : {{ $toCourse->content }}<br>
        備考 : {{ $toCourse->remarks }}
      </div>
      <div class="text-sm text-right mt-2">{{ $toCourse->date }}</div>
    </div>
    @endforeach
  </div>
  @endif
@endif

</x-app-layout>