@extends('admin.layout')

@section('content')
    <h1>افزودن سفارش جدید</h1>
    <form action="{{ route('orders.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="user_id">مشتری</label>
            <select name="user_id" class="form-control" required>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->first_name }} {{ $user->last_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="order_date">تاریخ ثبت</label>
            <input type="date" name="order_date" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="products">محصولات</label>
            <textarea name="products" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label for="total_price">قیمت کل</label>
            <input type="number" name="total_price" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="discount_price">قیمت تخفیف خورده</label>
            <input type="number" name="discount_price" class="form-control">
        </div>
        <div class="form-group">
            <label for="shipping_method">نحوه ارسال</label>
            <input type="text" name="shipping_method" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="shipping_cost">هزینه ارسال</label>
            <input type="number" name="shipping_cost" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="state">استان</label>
            <input type="text" name="state" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="city">شهر</label>
            <input type="text" name="city" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="full_address">آدرس کامل</label>
            <textarea name="full_address" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label for="postal_code">کد پستی</label>
            <input type="text" name="postal_code" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="order_notes">توضیحات سفارش</label>
            <textarea name="order_notes" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="status">وضعیت سفارش</label>
            <select name="status" class="form-control" required>
                <option value="pending">در انتظار</option>
                <option value="processing">در حال پردازش</option>
                <option value="completed">تکمیل شده</option>
                <option value="cancelled">لغو شده</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">ذخیره</button>
    </form>
@endsection
