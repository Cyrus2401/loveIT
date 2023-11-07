@extends('layouts.master')

@section('container')

  <section id="blog" class="blog">
      {{-- <h6 data-aos="fade-up" class="mb-3">Devenez Admin si vous voulez publier des mếmes également !</h3> --}}

      @if($info = Session::get('info'))
        <div class="alert alert-info">{{ $info }}</div>
      @endif

      <div class="container" data-aos="fade-up">

        <div class="row entries">

          @if(count($memes) > 0)

            @foreach ($memes as $meme)

              <article class="col-lg-12 entry">

                @if($meme->title)
                  <h2 class="entry-title">
                    <a href="">{{ $meme->title }}</a>
                  </h2>
                @endif

                <div class="mb-3">
                  <img src="/storage/{{ $meme->image }}" alt="" class="img-fluid">
                </div>

                <div class="d-flex justify-content-between flex-wrap entry-meta">
                  <ul class="mt-2">
                    <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="blog-single.html">Publié par {{ $meme->user->pseudo }}</a></li>
                    <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="blog-single.html"><time datetime="2020-01-01">{{ $meme->created_at->format('d/m/Y') }}</time></a></li>
                  </ul>
                  <ul class="mt-2">
                    <li class="d-flex align-items-center"><a href="blog-single.html"><i class="bi bi-whatsapp"></i></a></li>
                    <li class="d-flex align-items-center"><a href="blog-single.html"><i class="bi bi-facebook"></i></a></li>
                  </ul>
                </div>

                <div class="d-flex justify-content-between flex-wrap">
                  <div>
                    <a href="{{ route('updateMeme', $meme->id) }}"><button class="btn btn-outline-primary">Modifier</button></a>
                    <button id="{{ $meme->id }}" class="btn btn-outline-danger showDeleteMemeModal">Supprimer</button>
                  </div>
                </div>

              </article>
              
            @endforeach

          {{-- <div class="blog-pagination">
            <ul class="justify-content-center">
              <li><a href="#">1</a></li>
              <li class="active"><a href="#">2</a></li>
              <li><a href="#">3</a></li>
            </ul>
          </div> --}}

          {!! $memes->withQueryString()->links('pagination::bootstrap-5') !!}
          
        @else

          <div class="alert alert-info">Aucun mêmes n'a été posté par vous !</div>
          
        @endif

      </div>

    </div>
  </section>

@endsection

@section('script')
  <script>
    $('.showDeleteMemeModal').on('click', function() {

      var val = $(this).val()
      
      $('#deletePostModal').modal('show');

    })
  </script>
@endsection