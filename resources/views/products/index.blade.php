@extends('layouts.app')

@section('content')
<div class="container">
    <h1>商品一覧画面</h1>

    <div class="block__form-wrap">
        <form action="{{ route('products.index') }}" method="GET" class="block__form">
            <input type="text" name="keyword" placeholder="検索キーワード" value="{{ $keyword ?? '' }}">
            <select name="company_name">
                <option value="">メーカー名</option>
                @foreach ($companies as $company)
                    <option value="{{ $company }}" @if ($company == $companyName) selected @endif>{{ $company }}</option>
                @endforeach
            </select>
            <button type="submit">検索</button>
        </form>
    </div>

    <table class="block__table">
        <thead>
            <tr>
                <th>ID</th>
                <th>商品画像</th>
                <th>商品名</th>
                <th>価格</th>
                <th>在庫数</th>
                <th>メーカー名</th>
                <th>
                    <a href="{{ route('products.create') }}" class="btn-orange">新規登録</a>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $index => $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>商品画像</td>
                <td>{{ $product->product_name }}</td>
                <td>¥{{ $product->price }}</td>
                <td>{{ $product->stock }}</td>
                <td>{{ $product->company_name }}</td>
                <td>
                    <a href="{{ route('products.show', $product) }}" class="btn-blue">詳細</a>
                    <form action="{{ route('products.destroy', $product) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-red">削除</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="block__pagination">
        {{ $products->links() }}
    </div>
</div>
@endsection