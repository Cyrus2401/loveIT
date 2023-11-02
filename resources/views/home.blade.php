@extends('layouts.master')

@section('container')


<section id="blog" class="blog">
    {{-- <h6 data-aos="fade-up" class="mb-3">Devenez Admin si vous voulez publier des mếmes également !</h3> --}}

    @if($info = Session::get('info'))
      <div class="alert alert-info">{{ $info }}</div>
    @endif

    <div class="container" data-aos="fade-up">

      <div class="row entries">

        <article class="col-lg-12 entry">

          <h2 class="entry-title">
            <a href="">Dolorum optio tempore voluptas dignissimos cumque fuga qui quibusdam quia</a>
          </h2>

          <div class="mb-3">
            <img src="{{ asset('assets/img/blog/blog-1.jpg') }}" alt="" class="img-fluid">
          </div>

          <div class="d-flex justify-content-between flex-wrap entry-meta">
            <ul class="mt-2">
              <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="blog-single.html">John Doe</a></li>
              <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="blog-single.html"><time datetime="2020-01-01">Jan 1, 2020</time></a></li>
            </ul>
            <ul class="mt-2">
              <li class="d-flex align-items-center"><a href="blog-single.html"><i class="bi bi-whatsapp"></i></a></li>
              <li class="d-flex align-items-center"><a href="blog-single.html"><i class="bi bi-facebook"></i></a></li>
            </ul>
          </div>

        </article>

      </div>

      <div class="blog-pagination">
        <ul class="justify-content-center">
          <li><a href="#">1</a></li>
          <li class="active"><a href="#">2</a></li>
          <li><a href="#">3</a></li>
        </ul>
      </div>

    </div>
  </section>
@endsection