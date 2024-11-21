@extends('admin.layout')

@section('content')
    <h1>لیست دسته‌بندی‌ها</h1>
    <a href="{{ route('categories.create') }}" class="btn btn-primary">افزودن دسته‌بندی</a>
    <ul>
        @foreach($categories as $category)
            <li>
                {{ $category->name }}
                @if($category->children->isNotEmpty())
                    <ul>
                        @foreach($category->children as $child)
                            <li>{{ $child->name }}</li>
                        @endforeach
                    </ul>
                @endif
            </li>
        @endforeach
    </ul>
@endsection
