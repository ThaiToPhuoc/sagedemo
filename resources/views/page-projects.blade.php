@extends('layouts.app')

@section('content')


    <section class="py-5 font-sans min-vh-100 -mb-10 leading-normal container">
        <h2 class="text-2xl mb-4">{{ $post->post_title }}</h2>
        {!! $post->post_content !!}

    <div class="row text-center container">
    @foreach ($project as $item)
            <div class="col-xs-12 col-sm-6 col-md-4">
                <a href="{{$item->permalink}}" class="no-underline text-uppercase text-dark">
                <div class="projects-img border">
                    <img src="{{ $item->thumb }}" alt="{{$item->alt}}" title="{{$item->title}}">
                </div>
                <p> {{$item->name}} 
                </p>
                </a>
            </div>
    @endforeach
    </div>
    
</section>
@endsection