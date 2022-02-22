@extends('layout')

@section('title', 'Guitar')

@section('content')
<div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
    
    @foreach ($guitars as $guitar)

    <div>
        <h3>
            <a href="{{ route('guitars.show', ['guitar' => $guitar['id']]) }}">{{$guitar['name']}}</a>
        </h3>

        <ul>
            <li>
                Made By: {{$guitar['brand']}}
            </li>
            <li>
                Made On: {{$guitar['year_made']}}
            </li>
        </ul>
    </div>

    @endforeach

    <div>
        User Input: {{$userInput}}
    </div>
</div>
@endsection