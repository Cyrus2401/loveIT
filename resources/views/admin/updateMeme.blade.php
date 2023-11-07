@extends('layouts.master')

@section('container')
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>MODIFIER UN MEME</h2>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">

            <div class="col-lg-6 mx-auto">
                <form method="post" role="form" class="php-email-form" enctype="multipart/form-data">
                    @csrf

                    @if($error = session()->get('error'))
                        <div class="alert alert-danger">{{ $error }}</div>
                    @endif

                    @if($success = session()->get('success'))
                        <div class="alert alert-success">{{ $success }} &#127881;</div>
                    @endif

                    <div class="form-group">
                        <input type="text" class="form-control" name="title" id="title" placeholder="Titre" value="{{ $meme->title }}">
                    </div>

                    <div class="form-group">
                        <input type="file" accept=".png,.jpeg,.jpg,.gif" class="form-control" name="file" id="file" required>
                        @error('file')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="text-center">
                        <button type="submit">Modifier</button>
                    </div>
                </form>
            </div>

        </div>

        </div>
    </section>
@endsection