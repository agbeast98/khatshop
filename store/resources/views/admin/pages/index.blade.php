@extends('admin.layout')

@section('content')
<h1>مدیریت برگه‌ها</h1>

<a href="{{ route('admin.pages.create') }}" class="btn btn-primary">ایجاد برگه جدید</a>

<table class="table">
    <thead>
        <tr>
            <th>عنوان</th>
            <th>لینک</th>
            <th>وضعیت</th>
            <th>عملیات</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pages as $page)
        <tr>
            <td>{{ $page->title }}</td>
            <td><a href="{{ url($page->slug) }}" target="_blank">{{ url($page->slug) }}</a></td>
            <td>{{ $page->status ? 'فعال' : 'غیرفعال' }}</td>
            <td>
                <a href="{{ route('admin.pages.edit', $page->id) }}" class="btn btn-warning">ویرایش</a>
                <form action="{{ route('admin.pages.destroy', $page->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">حذف</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
