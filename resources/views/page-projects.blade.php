@extends('layouts.app')

@section('content')

    @while(have_posts()) @php the_post() @endphp

    <section class="py-5 font-sans min-vh-100 -mb-10 leading-normal">
        <h2 class="text-2xl mb-4">{{ the_title() }}</h2>
        {!! the_content() !!}

    {{-- WP_query --}}

    @php
        $args = [
            'posts_per_page' => -1,
            'offset' => 0,
            'orderby' => 'date',
            'order' => 'DESC',
                'post_type' => 'project'
            ];  

            $the_query = new \WP_Query($args);

        @endphp

    <div class="row text-center padding">

        @while($the_query->have_posts()) @php $the_query->the_post() @endphp

            @php
                $count++;
                $image = get_field('project_image');

                //Khai bao bien
                $url = $image['url'];
                $title = $image['title'];
                $alt = $image['alt'];
                $caption = $image['caption'];

                // //kich thuoc anh
                $size = 'medium';
                $thumbnail = $image['sizes'][$size];
                $width = $image['sizes'][$size.'-width'];
                $height = $image['sizes'][$size.'-height'];

                $name = get_field('name');

            @endphp

            
        <div class="col-xs-12 col-sm-6 col-md-4">
            <div class="projects-img">
                <img src="{{ $thumbnail }}" alt="{{$alt}}" title="{{$title}}">
            </div>
            <p> {{$name}} </p>
        </div>
            
        @if ($count % 3 === 0)
        </div>

        <div class="row text-center padding">    
        @endif

        @endwhile
    </div>

        @php
            @wp_reset_postdata();
        @endphp

    @endwhile
    
</section>
@endsection