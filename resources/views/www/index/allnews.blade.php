@extends('www.html')
@section('content')
    @foreach($article->chunk(3) as $row)
        <div class="row">
            @foreach($row as $value)
                <article class="col-md-4">
                    <h2>{{$value->name}}</h2>
                    <img src="{{$value->thumb}}" width="360">
                    <div class="body">
                        {{$value->describe}}
                    </div>
                </article>
            @endforeach
        </div>
    @endforeach
   {{-- {{$article->appends(['id'=>1])->render()}}--}}
     {{$article->appends(['id'=>1])->Links()}}
@stop