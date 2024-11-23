@extends('admin.layout')

@section('content')
    <h1>ایجاد محصول جدید</h1>
    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">نام محصول</label>
            <input type="text" name="name" class="field" placeholder="نام محصول را وارد کنید" required>
        </div>
        <div class="form-group">
            <label for="english_name">نام انگلیسی محصول</label>
            <input type="text" name="english_name" class="field" placeholder="نام انگلیسی محصول را وارد کنید">
        </div>
        <div class="form-group">
            <label for="brand">برند</label>
            <input type="text" name="brand" class="field" placeholder="برند محصول را وارد کنید">
        </div>
        <div class="form-group">
            <label for="weight">وزن (گرم)</label>
            <input type="number" name="weight" class="field" placeholder="وزن محصول">
        </div>
        <div class="form-group">
            <label for="dimensions">ابعاد (ارتفاع، عرض، طول)</label>
            <div class="d-flex">
                <input type="number" name="height" class="field mr-2" placeholder="ارتفاع">
                <input type="number" name="width" class="field mr-2" placeholder="عرض">
                <input type="number" name="length" class="field" placeholder="طول">
            </div>
        </div>
        <div class="form-group">
            <label for="price">قیمت</label>
            <input type="number" name="price" class="field" placeholder="قیمت محصول" required>
        </div>
        <div class="form-group">
            <label for="discount_price">قیمت تخفیف خورده</label>
            <input type="number" name="discount_price" class="field" placeholder="قیمت تخفیف خورده">
        </div>
        <div class="form-group">
            <label for="discount_expiry">تاریخ انقضای تخفیف</label>
            <input type="date" name="discount_expiry" class="field">
        </div>
        <div class="form-group">
            <label for="categories">دسته‌بندی‌ها</label>
            <select name="categories[]" class="field" multiple>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="tags">برچسب‌ها (با کاما جدا کنید)</label>
            <input type="text" name="tags" class="field" placeholder="برچسب‌ها را وارد کنید">
        </div>
        <div class="form-group">
            <label for="description">توضیحات</label>
            <textarea name="description" class="field" placeholder="توضیحات محصول"></textarea>
        </div>
        <div class="form-group">
            <label for="short_description">توضیحات کوتاه</label>
            <textarea name="short_description" class="field" placeholder="توضیحات کوتاه"></textarea>
        </div>
        <div class="form-group">
            <label for="stock">موجودی انبار</label>
            <input type="number" name="stock" class="field" placeholder="تعداد موجودی" value="0" min="0">
        </div>
        <button type="submit" class="button">ذخیره محصول</button>
    </form>
@endsection
