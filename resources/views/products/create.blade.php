@extends('layouts.app')

@section('content')
<div class="container">
    <h1>商品新規登録画面</h1>

    @if (session('success'))
        <div class="block__message">{{ session('success') }}</div>
    @endif

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-row">
            <label for="txtProductName">商品名 <span class="required">*</span></label>
            <input type="text" id="txtProductName" name="product_name" value="{{ old('product_name') }}">
            @error('product_name')
                <div class="block__error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-row">
            <label for="txtCompanyName">メーカー名 <span class="required">*</span></label>
            <input type="text" id="txtCompanyName" name="company_name" value="{{ old('company_name') }}">
            @error('company_name')
                <div class="block__error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-row">
            <label for="numPrice">価格 <span class="required">*</span></label>
            <input type="number" id="numPrice" name="price" value="{{ old('price') }}">
            @error('price')
                <div class="block__error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-row">
            <label for="numStock">在庫数 <span class="required">*</span></label>
            <input type="number" id="numStock" name="stock" value="{{ old('stock') }}">
            @error('stock')
                <div class="block__error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-row">
            <label for="areaComment">コメント</label>
            <textarea id="areaComment" name="comment">{{ old('comment') }}</textarea>
        </div>

        <div class="form-row">
            <label for="fileImage">商品画像</label>
            <input type="file" id="fileImage" name="image" class="custom-file">
        </div>

        <div class="form-buttons">
            <button type="submit" class="btn-orange">新規登録</button>
            <a href="{{ route('products.index') }}" class="btn-blue">戻る</a>
        </div>
    </form>
</div>
@endsection