@extends('layouts.app')

@section('content')
<div class="container">
    <h1>商品情報編集画面</h1>

    <form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data" class="block__form">
        @csrf
        @method('PUT')

        <table class="edit-table">
            <tr>
                <th>ID.</th>
                <td>{{ $product->id }}</td>
            </tr>
        </table>

        <div class="form-row">
            <label>商品名 <span class="required">*</span></label>
            <input type="text" name="product_name" value="{{ old('product_name', $product->product_name) }}">
        </div>
        <div class="form-row">
            <label>メーカー名 <span class="required">*</span></label>
            <input type="text" name="company_name" value="{{ old('company_name', $product->company_name) }}">
        </div>
        <div class="form-row">
            <label>価格 <span class="required">*</span></label>
            <input type="number" name="price" value="{{ old('price', $product->price) }}">
        </div>
        <div class="form-row">
            <label>在庫数 <span class="required">*</span></label>
            <input type="number" name="stock" value="{{ old('stock', $product->stock) }}">
        </div>
        <div class="form-row">
            <label>コメント</label>
            <textarea name="comment">{{ old('comment', $product->comment) }}</textarea>
        </div>
        <div class="form-row">
            <label>商品画像</label>
            <input type="file" name="image" class="custom-file">
        </div>

       <div class="form-buttons">
            <input type="submit" class="btn-orange" value="更新">
            <a href="{{ route('products.index') }}" class="btn-blue">戻る</a>
        </div>
    </form>
</div>
@endsection