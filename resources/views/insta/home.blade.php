@extends('layouts.layout')

@section('title')
    LinstaClone
@endsection

@section('content')
    <div class="container container-home">
        @include('layouts.menu')
        <div class="row">
            <div class="col-lg-8">
            @foreach($posts as $post)
                <div class="card">
                    <div class="card-header">
                        <img class="post-img-user" src="/img/user_img/{{ $post->user()->first()->user_img }}" alt="">
                        <a class="name-user" href="/user/{{ $post->user()->first()->user }}" style="color: #1a202c">{{  $post->user()->first()->user }}</a>
                    </div>

                    <div class="card-body post-image" data-img="/img/user_img/{{ $post->img }}"></div>

                    <div class="card-footer">
                        <div class="d-flex justify-content-start">
                            <div class="action-buttons">
                                <a value="{{ route('like', ['post_id' => $post->id, 'user_id' => Auth::user()->id ]) }}" class="item like {{ (isset($post->postLike()->first()->user_id) && $post->postLike()->where('user_id', Auth::user()->id)->count() > 0)? 'liked': '' }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                                        <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
                                    </svg>
                                </a>
                            </div>
                            <div class="action-buttons">
                                <a href="" class="item">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-chat-dots-fill" viewBox="0 0 16 16">
                                        <path d="M16 8c0 3.866-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.584.296-1.925.864-4.181 1.234-.2.032-.352-.176-.273-.362.354-.836.674-1.95.77-2.966C.744 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7zM5 8a1 1 0 1 0-2 0 1 1 0 0 0 2 0zm4 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                                    </svg>
                                </a>
                            </div>
                            <div class="action-buttons">
                                <a href="" class="item">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-share" viewBox="0 0 16 16">
                                        <path d="M13.5 1a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM11 2.5a2.5 2.5 0 1 1 .603 1.628l-6.718 3.12a2.499 2.499 0 0 1 0 1.504l6.718 3.12a2.5 2.5 0 1 1-.488.876l-6.718-3.12a2.5 2.5 0 1 1 0-3.256l6.718-3.12A2.5 2.5 0 0 1 11 2.5zm-8.5 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zm11 5.5a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3z"/>
                                    </svg>
                                </a>
                            </div>
                        </div>

                        <span class="test-bold item">{{ $post->postLike()->get()->count() }} curtidas</span>

                        <div class="card-comment">
                            <div class="post-comments">
                                <dic class="comment">
                                    <span class="user">{{  $post->user()->first()->user }}</span>
                                    <span class="text">{{  $post->descript }}</span>
                                </dic>

                                <hr style="margin: 5px">
                                @foreach($post->postComment()->get() as $comment)
                                    <dic class="comment">
                                        <span class="user">{{  $comment->user()->first()->user }}</span>
                                        <span class="text">{{  $comment->comment }}</span>
                                    </dic>
                                    <br>
                                @endforeach

                                <form class="row form-group me-2 form-comment" action="{{ route('comment') }}" method="post">
                                    @csrf
                                    <div class="col-lg-10">
                                        <input type="text" name="comment" class="form-control" placeholder="comentário">
                                    </div>
                                    <div class="col-lg-2">
                                        <button type="summit" class="btn btn-light border">Comentar</button>
                                    </div>
                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
            <div class="col-lg-4">
                <h1>Stories</h1>
            </div>
        </div>
    </div>
@endsection
