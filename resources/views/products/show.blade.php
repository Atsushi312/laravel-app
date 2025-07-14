@extends('layouts.app')

@section('content')
<div class="container">
    <h1>商品情報詳細画面</h1>

    <table class="detail-table">
        <tr>
            <th>ID</th>
            <td>{{ $product->id }}</td>
        </tr>
        <tr>
            <th>商品画像</th>
            <td>画像</td>
        </tr>
        <tr>
            <th>商品名</th>
            <td>{{ $product->product_name }}</td>
        </tr>
        <tr>
            <th>メーカー</th>
            <td>{{ $product->company_name }}</td>
        </tr>
        <tr>
            <th>価格</th>
            <td>¥{{ $product->price }}</td>
        </tr>
        <tr>
            <th>在庫数</th>
            <td>{{ $product->stock }}</td>
        </tr>
        <tr>
            <th>コメント</th>
            <td>{{ $product->comment }}</td>
        </tr>
    </table>

    <div class="detail-buttons">
        <a href="{{ route('products.edit', $product) }}" class="btn-orange">編集</a>
        <a href="{{ route('products.index') }}" class="btn-blue">戻る</a>
    </div>
</div>
@endsection