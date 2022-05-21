@extends('layouts.profilefront')

@section('content')
    <div class="container">
        <hr color="#c0c0c0">
        <div class="row">
            <div class="posts col-8 mx-auto mt-3">
                @foreach($posts as $post)
                    <div class="post">
                            <div class="title">
                                <h3>{{ \Str::limit($post->name, 150) }}</h3>
                            </div>
                                 <p class="body mx-auto">性別:{{ \Str::limit($post->gender, 50) }}</p>
                                 <p class="body mx-auto">趣味:{{ \Str::limit($post->hobby, 100) }}</p>
                                 <p class="body mx-auto">自己紹介:{{ \Str::limit($post->introduction, 650) }}</p>
                    </div>
                    <hr color="#c0c0c0">
                @endforeach
            </div>
        </div>   
    </div>
@endsection    