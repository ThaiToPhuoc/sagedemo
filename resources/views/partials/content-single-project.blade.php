<article @php post_class() @endphp>
  <header class="mb-5 pb-5 border-bottom">
    <h1 class="entry-title">{{$project->name}}</h1>
    <a href="#">{{$project->url}}</a>
  </header>
  <div class="container leading-normal">
    <section class="mb-5"> 
      <h2>Case study</h2>
      {!!$project->case_study!!}
    </section >
    <section class="mb-5 text-center"> 
      <img class="img-thumbnail img-fluid " src="{{$project->img->url}}" alt="{{$project->img->alt}}">
    </section >
    <section class="mb-5"> 
      <h2>Solution</h2>
      {!!$project->devilery_solution!!}
    </section>
    <section class="mb-5"> 
      <h2>Feedback</h2>
      {!!$project->feedback!!}
    </section>
  </div>
</article>
