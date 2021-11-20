@extends('layouts.layout')

@section('title')
    InstaClone - Cadastre-se
@endsection

@section('content')
    <section id="register">
        <dic class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4">
                    <div class="box">
                        <div class="box-header">
                            <h2>InstaClone</h2>
                            <p>Cadastre-se para ver fotos e vídeos dos seus amigos.</p>
                        </div>
                        <div class="box-content">
                            <form action="{{ route('post.register') }}" method="post" class="form-login">
                                @csrf
                                <div class="form-group">
                                    <input class="form-control" type="text" name="email" id="" placeholder="E-mail">
                                    <input class="form-control" type="text" name="name" id="" placeholder="Nome completo">
                                    <input class="form-control" type="text" name="user" id="" placeholder="Nome de usuário">
                                    <input class="form-control" type="password" name="password" id="" placeholder="Senha">
                                    <button class="btn btn-insta" type="submit">Cadastre-se</button>
                                    <input type="hidden" name="_token" value="{{ Session::token() }}">
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="box">
                        <div class="box-content text-center">
                            Tem uma conta? <a href="{{ route('login') }}">Conecte-se</a>
                        </div>
                    </div>
                </div>
            </div>
        </dic>
    </section>
@endsection
