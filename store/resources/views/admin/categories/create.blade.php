@extends('admin.layout')

@section('content')
    <h1>ایجاد محصول جدید</h1>
    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">نام محصول</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="price">قیمت</label>
            <input type="number" name="price" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="stock">موجودی انبار</label>
            <input type="number" name="stock" class="form-control" value="0" min="0">
        </div>
        <div class="form-group">
            <label for="tags">برچسب‌ها (با کاما جدا کنید)</label>
            <input type="text" name="tags" class="form-control">
        </div>
        <div class="form-group">
            <label for="categories">دسته‌بندی‌ها</label>
            <select name="categories[]" class="form-control" multiple>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="description">توضیحات</label>
            <textarea name="description" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="short_description">توضیحات کوتاه</label>
            <textarea name="short_description" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="discount_price">قیمت تخفیف خورده</label>
            <input type="number" name="discount_price" class="form-control">
        </div>
        <div class="form-group">
            <label for="discount_expiry">تاریخ انقضای تخفیف</label>
            <input type="date" name="discount_expiry" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">ذخیره</button>
    </form>
@endsection
