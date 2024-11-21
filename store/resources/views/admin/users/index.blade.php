@extends('admin.layout')

@section('content')
    <h1>لیست کاربران</h1>
    <a href="{{ route('users.create') }}" class="btn btn-primary">افزودن کاربر جدید</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>آواتار</th>
                <th>نام کامل</th>
                <th>ایمیل</th>
                <th>شماره موبایل</th>
                <th>نقش</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>
                        @if($user->avatar)
                            <img src="{{ asset('storage/' . $user->avatar) }}" alt="آواتار" width="50" height="50" class="rounded-circle">
                        @else
                            <span>بدون آواتار</span>
                        @endif
                    </td>
                    <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>{{ $user->role }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
