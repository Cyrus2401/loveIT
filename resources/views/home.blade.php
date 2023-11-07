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

                @auth
                  @if(Auth::user()->role == "sadmin")

                    <div class="d-flex justify-content-between flex-wrap">
                      <div>
                        <a href="{{ route('updateMeme', $meme->id) }}"><button class="btn btn-outline-primary">Modifier</button></a>
                        <button value="{{ $meme->id }}" class="btn btn-outline-danger showDeleteMemeModal">Supprimer</button>
                      </div>
                    </div>
                    
                  @endif
                @endauth

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

          <div class="alert alert-info">Aucun mêmes n'a été posté !</div>
          
        @endif

      </div>

    </div>
  </section>

  {{-- Modal de suppression du post --}}
  <div class="modal fade" id="deletePostModal" tabindex="-1" aria-labelledby="deletePostModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deletePostModalLabel">DESACTIVATION DE L'ADMIN</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            Voulez-vous vraiment supprimer ce poste ? 
            </div>
            <form action="/deletePost/" id="disableUserForm" method="POST">
                @csrf
                <div class="modal-footer">
                    <button type="submit" href="" class="btn btn-primary">Confirmer</button>
                </div>
            </form>
        </div>
    </div>
  </div>

@endsection

@section('script')
    <script>
      $('.showDeleteMemeModal').on('click', function() {

        var val = $(this).val()

        $('#disableUserForm').attr('action', '/deletePost/'+val)
        
        $('#deletePostModal').modal('show');

      })
    </script>
@endsection