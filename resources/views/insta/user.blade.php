@extends('layouts.layout')

@section('title')
    {{ $user->user }}
@endsection

@section('content')
    <div class="container container-home">
        @include('layouts.menu')
        <div class="row d-flex justify-content-center ms-5">
            <div class="col-lg-3 img-fundo-perfil d-flex justify-content-center align-items-center">
                @if($user->user_img != null)
                    <img class="img-perfil" src="/img/user_img/{{ $user->user_img }}">
                @else
                    <form action="{{ route('img.user') }}" method="POST" enctype="multipart/form-data" class="form-user">
                        @csrf
                        <label for="img-user">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-camera" viewBox="0 0 16 16">
                                <path d="M15 12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1h1.172a3 3 0 0 0 2.12-.879l.83-.828A1 1 0 0 1 6.827 3h2.344a1 1 0 0 1 .707.293l.828.828A3 3 0 0 0 12.828 5H14a1 1 0 0 1 1 1v6zM2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4H2z"/>
                                <path d="M8 11a2.5 2.5 0 1 1 0-5 2.5 2.5 0 0 1 0 5zm0 1a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7zM3 6.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z"/>
                            </svg>
                        </label>
                        <input type="file" name="img" id="img-user" class="d-none">
                        <input type="text" name="user" id="user" value="{{ $user->id }}" class="d-none">
                    </form>
                @endif
            </div>
            <div class="col-lg-5">
                <span class="user-perfil">{{ $user->user }}</span>
                <button class="btn btn-edit-perfil">Editar perfil</button>
                <br><br>
                <span><b>{{ $user->post()->get()->count() }}</b> publicações <b>0</b> seguidores <b>0</b> seguindo</span>
                <br><br>
                <span class="name-perfil">{{ $user->name }}</span>
                <br>
                <span>{{ $user->biography }}</span>
            </div>
        </div>
        <hr class="divisor">
        <div class="row">
            <div class="col-lg justify-content-center text-center">
                <span class="item-insta select">PUBLICAÇÕES</span>
                <span class="item-insta">SALVOS</span>
                <span class="item-insta">MARCADOS</span>
            </div>
        </div>
        <div class="row publication">
            @foreach($user->post()->get() as $post)
                <div class="col-lg-4 bg-dark" style="padding: 0px;margin: 0px">
                    <div class="col-12 post-image img-pub effect-img effect-img-perfil p-1" data-img="/img/user_img/{{ $post->img }}"></div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
