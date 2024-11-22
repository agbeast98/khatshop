@extends('admin.layout')

@section('content')
    <h1>ویرایش محصول</h1>
    <form action="{{ route('products.update', $product) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">نام محصول</label>
            <input type="text" name="name" class="form-control" value="{{ $product->name }}" required>
        </div>
        <div class="form-group">
            <label for="description">توضیحات</label>
            <textarea name="description" class="form-control">{{ $product->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="short_description">توضیحات کوتاه</label>
            <textarea name="short_description" class="form-control">{{ $product->short_description }}</textarea>
        </div>
        <div class="form-group">
            <label for="price">قیمت</label>
            <input type="number" name="price" class="form-control" value="{{ $product->price }}" required>
        </div>
        <div class="form-group">
            <label for="discount_price">قیمت تخفیف خورده</label>
            <input type="number" name="discount_price" class="form-control" value="{{ $product->discount_price }}">
        </div>
        <div class="form-group">
            <label for="discount_expiry">تاریخ انقضای تخفیف</label>
            <input type="date" name="discount_expiry" class="form-control" value="{{ $product->discount_expiry }}">
        </div>
        <div class="form-group">
            <label for="tags">برچسب‌ها (با کاما جدا کنید)</label>
            <input type="text" name="tags" class="form-control" value="{{ implode(',', json_decode($product->tags, true) ?? []) }}">
        </div>
        <div class="form-group">
            <label for="categories">دسته‌بندی‌ها</label>
            <select name="categories[]" class="form-control" multiple>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" @if(in_array($category->id, json_decode($product->categories, true) ?? [])) selected @endif>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">ذخیره</button>
    </form>
@endsection
