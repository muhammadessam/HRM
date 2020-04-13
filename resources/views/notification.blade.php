@extends('layouts.app')
@section('content')

    <table class="table">
        <caption>
            <h3>notifications</h3>
        </caption>
        <tr>
            <th>اسم الموظف</th>
            <th>نوع الاشعار</th>
            <th>الوقت</th>
            <th>التاريخ</th>
        </tr>
        @foreach($nots as $not)
            <tr>
                <td>{{$not->user->name}}</td>
                <td>
                    @if($not->type == "in")
                        تسجيل حضور
                    @endif
                    @if($not->type == "out")
                        تسجيل انصراف
                    @endif
                    @if($not->type == "in_req")
                         اذن دخول
                    @endif
                    @if($not->type == "out_req")
                        اذن خروج
                    @endif
                </td>
                <td>{{$not->time}}</td>
                <td>{{$not->date}}</td>
            </tr>
        @endforeach
    </table>
@endsection