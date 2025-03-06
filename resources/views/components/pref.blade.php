@props([
    'message'=>'選択してください', 
    'default'
])

@php
$prefs = ['東京都', '千葉県', '埼玉県'];
@endphp

<select {{$attributes->merge(['name'=>'pref', 'class' => 'aa'])}}>
    <option value="">{{$message}}</option>
    @foreach($prefs as $pref)
        <option value="{{$pref}}" @selected($pref === $default)>{{$pref}}</option>
    @endforeach
</select>
