<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ข้อมูลครุภัณฑ์</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
@extends('layouts.app')
<body>
    @section('content')
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1>ข้อมูลครุภัณฑ์</h1>
            </div>
        </div>

        <table class="table table-bordered">
            <tr>
                <th>No.</th>
                <th>หมายเลขครุภัณฑ์</th>
                <th>ชื่อครุภัณฑ์</th>
                <th>คุณสมบัติ</th>
                <th>รายละเอียด</th>
                <th>หน่วยนับ</th>
                <th>วันที่รับเข้าคลัง</th>
                <th>มูลค่าครุภัณฑ์</th>
                <th>ที่ตั้งครุภัณฑ์</th>
            </tr>
            @foreach($companies as $company)
            <tr>
                <td>{{ $company->id }}</td>
                <td>{{ $company->num_asset }}</td>
                <td>{{ $company->name_asset }}</td>
                <td>{{ $company->propoty}}</td>
                <td>{{ $company->detail}}</td>
                <td>{{ $company->unit}}</td>
                <td>{{ $company->date_into}}</td>
                <td>{{ $company->price}}</td>
                <td>{{ $company->place}}</td>
            </tr>
            @endforeach
        </table>

{!! $companies->links('pagination::bootstrap-5') !!}

    </div>
    @endsection

</body>

</html>