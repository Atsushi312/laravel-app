<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
   public function index(Request $request)
{
    $keyword = $request->input('keyword');
    $companyName = $request->input('company_name');

    // 会社名一覧を取得（distinctで重複なし）
    $companies = Product::select('company_name')->distinct()->pluck('company_name');

    $products = Product::query()
        ->when($keyword, function ($query, $keyword) {
            return $query->where('product_name', 'like', "%{$keyword}%")
                         ->orWhere('company_name', 'like', "%{$keyword}%");
        })
        ->when($companyName, function ($query, $companyName) {
            return $query->where('company_name', $companyName);
        })
        ->paginate(3);

    return view('products.index', compact('products', 'keyword', 'companyName', 'companies'));
}

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_name' => 'required|max:255',
            'company_name' => 'required|max:255',
            'price' => 'required|integer',
            'stock' => 'required|integer',
            'comment' => 'nullable',
        ]);

        Product::create($validated);

        return redirect()->route('products.index')
            ->with('success', '商品を登録しました');
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
{
    $validated = $request->validate([
        'product_name' => 'required|max:255',
        'company_name' => 'required|max:255',
        'price' => 'required|integer',
        'stock' => 'required|integer',
        'comment' => 'nullable',
    ]);

    $product->update($validated);

    return redirect()->route('products.edit', $product)
        ->with('success', '商品情報を更新しました');
}

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')
            ->with('success', '商品を削除しました');
    }
}