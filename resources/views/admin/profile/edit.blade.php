{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.edit')


{{-- admin.blade.php,の＠yield('title')に'ニュースの新規作成'を埋め込む --}}
@section('title', 'PHPは難しい！！！')

{{-- admin.blad.phpの＠yield('content')に以下のタグを埋め込む --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2> PHPは難しい！！！</h2>
            </div>
        </div>
    </div>
@endsection  