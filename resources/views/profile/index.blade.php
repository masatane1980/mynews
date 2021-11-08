@extends('layouts.front')
@section('title', '登録済みプロフィールの一覧')

@section('content')
    <div class="container">
        <h2>プロフィール一覧</h2>
        @if (!is_null($profileline))
        <div class="row">
            <div class="plofileline col-md-12 mx-auto">
                <div class="row">
                    <table class="table">
                        <thead>
                            <tr>
                                <th width="15%">日付</th>
                                <th width="15%">氏名</th>
                                <th width="10%">性別</th>
                                <th width="25%">趣味</th>
                                <th width="40%">自己紹介欄</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
        @endif
        <div class="row">
            <div class="list-profileline col-md-12 mx-auto">
                @foreach($posts as $post)
                    <div class="post">
                        <div class="row">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th width="15%">{{ $post->updated_at->format('Y年m月d日') }}</th>
                                        <th width="15%">{{ \Str::limit($post->name, 20) }}</th>
                                        <th width="10%">{{ ($post->gender) }}</th>
                                        <th width="25%">{{ \Str::limit($post->hobby, 30) }}</th>
                                        <th width="40%">{{ \Str::limit($post->introduction, 250) }}</th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    <div>
@endsection