@extends('layouts.layout')

@section('title')
    InstaClona - Resultados
@endsection

@section('content')
    <div class="container container-home">
        @include('layouts.menu')
        @foreach($users as $user)
            <div class="card row d-flex" style="margin: 0;">
                <a class="" href="{{ route('perfil.user', ['perfil' => $user->user]) }}">
                    <div class="card-body col">
                        <img class="post-img-user col-lg-2" src="/img/user_img/{{ $user->user_img }}" alt="">
                        <a class="fw-bold text-dark col-lg ms-2" href="{{ route('perfil.user', ['perfil' => $user->user]) }}">{{ $user->name }}</a>
                    </div>
                </a>

            </div>
        @endforeach
    </div>
@endsection
