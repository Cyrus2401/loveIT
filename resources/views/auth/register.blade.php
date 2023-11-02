@extends('layouts.master')

@section('container')
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Devenir Admin</h2>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">

            <div class="col-lg-12">
                <form method="post" role="form" class="php-email-form">
                    @csrf

                    @if($error = session()->get('error'))
                        <div class="alert alert-danger">{{ $error }}</div>
                    @endif

                    @if($success = session()->get('success'))
                        <div class="alert alert-success">{{ $success }} &#127881;</div>
                    @endif

                    <div class="form-group">
                        <input type="text" class="form-control" name="pseudo" id="pseudo" placeholder="Pseudo" value="{{ old('pseudo') }}" required>
                        @error('pseudo')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="{{ old('email') }}" required>
                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input type="password" class="form-control" name="password" id="password" placeholder="Mot de passe" required>
                        @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Confirmation du mot de passe" required>
                        @error('confirm_password')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="text-center">
                        <button type="submit">Devenir Admin</button>
                        <div class="mt-2"><small>Je suis déjà admin</small> - <a href="{{ route('loginVue') }}"><small>Se connecter</small></a></p>
                    </div>
                </form>
            </div>

        </div>

        </div>
    </section><!-- End Contact Section -->
@endsection