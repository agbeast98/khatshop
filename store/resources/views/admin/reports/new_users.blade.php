@extends('admin.layout')

@section('content')
<div class="report">
    <h1>کاربران جدید (۳۰ روز گذشته)</h1>

    <table class="users">
        <thead>
            <tr>
                <th>نام کاربر</th>
                <th>ایمیل</th>
                <th>تاریخ ثبت‌نام</th>
            </tr>
        </thead>
        <tbody>
            @foreach($newUsers as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at->format('Y-m-d') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
