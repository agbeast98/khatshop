@extends('admin.layout')

@section('title', 'افزودن محصول جدید')

@section('content')
<div class="container mt-4">
    <h1>افزودن محصول جدید</h1>

    <!-- نمایش خطاها -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- فرم ایجاد محصول -->
    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- نام محصول -->
        <div class="form-group">
            <label for="name">نام محصول</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
        </div>

        <!-- نام انگلیسی -->
        <div class="form-group">
            <label for="english_name">نام انگلیسی محصول</label>
            <input type="text" name="english_name" id="english_name" class="form-control" value="{{ old('english_name') }}">
        </div>

        <!-- برند -->
        <div class="form-group">
            <label for="brand">برند</label>
            <input type="text" name="brand" id="brand" class="form-control" value="{{ old('brand') }}">
        </div>

        <!-- قیمت -->
        <div class="form-group">
            <label for="price">قیمت (تومان)</label>
            <input type="number" name="price" id="price" class="form-control" value="{{ old('price') }}" required>
        </div>

        <!-- قیمت تخفیف‌خورده -->
        <div class="form-group">
            <label for="discount_price">قیمت تخفیف‌خورده (تومان)</label>
            <input type="number" name="discount_price" id="discount_price" class="form-control" value="{{ old('discount_price') }}">
        </div>

        <!-- تاریخ انقضای تخفیف -->
        <div class="form-group">
            <label for="discount_expiry">تاریخ انقضای تخفیف</label>
            <input type="date" name="discount_expiry" id="discount_expiry" class="form-control" value="{{ old('discount_expiry') }}">
        </div>

        <!-- دسته‌بندی -->
        <div class="form-group">
            <label for="categories">دسته‌بندی</label>
            <select name="categories[]" id="categories" class="form-control" multiple>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ in_array($category->id, old('categories', [])) ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- تصویر اصلی -->
        <div class="form-group">
            <label for="main_image">تصویر اصلی</label>
            <input type="file" name="main_image" id="main_image" class="form-control-file" accept="image/*">
        </div>

        <!-- گالری تصاویر -->
        <div class="form-group">
            <label for="gallery">گالری تصاویر</label>
            <input type="file" name="gallery[]" id="gallery" class="form-control-file" accept="image/*" multiple>
        </div>

        <!-- وزن -->
        <div class="form-group">
            <label for="weight">وزن (گرم)</label>
            <input type="number" name="weight" id="weight" class="form-control" value="{{ old('weight') }}">
        </div>

        <!-- ابعاد -->
        <div class="form-group">
            <label for="dimensions">ابعاد (سانتی‌متر)</label>
            <div class="row">
                <div class="col">
                    <input type="number" name="height" id="height" class="form-control" placeholder="ارتفاع" value="{{ old('height') }}">
                </div>
                <div class="col">
                    <input type="number" name="width" id="width" class="form-control" placeholder="عرض" value="{{ old('width') }}">
                </div>
                <div class="col">
                    <input type="number" name="length" id="length" class="form-control" placeholder="طول" value="{{ old('length') }}">
                </div>
            </div>
        </div>

        <!-- توضیحات کوتاه -->
        <div class="form-group">
            <label for="short_description">توضیحات کوتاه</label>
            <textarea name="short_description" id="short_description" class="form-control" rows="3">{{ old('short_description') }}</textarea>
        </div>

        <!-- توضیحات -->
        <div class="form-group">
            <label for="description">توضیحات</label>
            <textarea name="description" id="description" class="form-control" rows="5">{{ old('description') }}</textarea>
        </div>

        <!-- برچسب‌ها -->
        <div class="form-group">
            <label for="tags">برچسب‌ها (با کاما جدا کنید)</label>
            <input type="text" name="tags" id="tags" class="form-control" value="{{ old('tags') }}">
        </div>

        <!-- تعداد موجودی -->
        <div class="form-group">
            <label for="stock">موجودی</label>
            <input type="number" name="stock" id="stock" class="form-control" value="{{ old('stock') }}">
        </div>

        <button type="submit" class="btn btn-primary">ذخیره محصول</button>
    </form>
</div>
@endsection
