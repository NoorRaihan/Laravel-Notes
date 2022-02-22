@extends('layout')

@section('title', 'Guitar')

@section('content')
<div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

    <div>
        <h3>
            {{$guitar['name']}}
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

</div>
@endsection