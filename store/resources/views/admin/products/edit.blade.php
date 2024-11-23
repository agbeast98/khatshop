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
            <label for="english_name">نام انگلیسی محصول</label>
            <input type="text" name="english_name" class="form-control" value="{{ $product->english_name }}">
        </div>
        <div class="form-group">
            <label for="brand">برند</label>
            <input type="text" name="brand" class="form-control" value="{{ $product->brand }}">
        </div>
        <div class="form-group">
            <label for="weight">وزن (گرم)</label>
            <input type="number" name="weight" class="form-control" value="{{ $product->weight }}">
        </div>
        <div class="form-group">
            <label for="dimensions">ابعاد (ارتفاع، عرض، طول)</label>
            <div class="d-flex">
                <input type="number" name="height" class="form-control mr-2" placeholder="ارتفاع" value="{{ $product->height }}">
                <input type="number" name="width" class="form-control mr-2" placeholder="عرض" value="{{ $product->width }}">
                <input type="number" name="length" class="form-control" placeholder="طول" value="{{ $product->length }}">
            </div>
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
            <label for="categories">دسته‌بندی‌ها</label>
            <select name="categories[]" class="form-control" multiple>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}"
                        @if(in_array($category->id, json_decode($product->categories, true) ?? [])) selected @endif>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="tags">برچسب‌ها</label>
            <input type="text" name="tags" class="form-control" value="{{ implode(',', json_decode($product->tags, true) ?? []) }}">
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
            <label for="stock">موجودی انبار</label>
            <input type="number" name="stock" class="form-control" value="{{ $product->stock }}" min="0">
        </div>
        <button type="submit" class="btn btn-primary">ذخیره تغییرات</button>
    </form>
@endsection
