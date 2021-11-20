@extends('layouts.layout')

@section('title')
    InstaClone - Login
@endsection

@section('content')
<section id="login">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <img src="https://cdn.pixabay.com/photo/2020/04/24/14/49/smartphone-5087176_960_720.png" class="img-fluid">
            </div>
            <div class="col-lg-5">
                <div class="box">
                    <div class="box-header">
                        <h2>InstaClone</h2>
                    </div>
                    <div class="box-content">
                        <form action="{{ route('post.login') }}" method="post" class="form-login">
                            @csrf
                            <div class="form-group">
                                <input class="form-control" type="text" name="email" id="" placeholder="E-mail">
                                <input class="form-control" type="password" name="password" id="" placeholder="Senha">
                                <button class="btn btn-insta" type="submit">Entrar</button>
                                <input type="hidden" name="_token" value="{{ Session::token() }}">
                            </div>
                        </form>
                    </div>
                </div>

                <div class="box">
                    <div class="box-content text-center">
                        Não tem uma conta? <a href="{{ route('register') }}">Cadastre-se</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
