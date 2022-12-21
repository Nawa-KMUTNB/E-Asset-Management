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
                    <h1>รายละเอียดข้อมูลครุภัณฑ์</h1>
                </div>
                <div class="mb-1"><a href="{{ route('companies.index') }}" class="btn btn-warning">Back</a></div>
                <!-- <div class="mb-2"><a href="{{ route('companies.create') }}" class="btn btn-primary">เพิ่มครุภัณฑ์</a></div> -->
            </div>
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif

            <table class="table table-bordered">
                <tr>
                    <th>หมายเลขครุภัณฑ์</th>
                    <th>ชื่อครุภัณฑ์</th>
                    <th>คุณสมบัติ</th>
                    <th>รายละเอียด</th>
                    <th>หน่วยนับ</th>
                    <th>วันที่รับเข้าคลัง</th>
                    <th>มูลค่าครุภัณฑ์</th>
                    <th>ที่ตั้งครุภัณฑ์</th>
                    <th width="220px">Action</th>
                </tr>

                <tr>
                    <td>

                        <form action="{{ route('detail_companies.update', ['detail_companies' => $company->id]) }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="col-md-12">
                                <div class="form-group my-3">
                                    <input type="text" name="num_asset" value="{{ $company->num_asset }}"
                                        class="form-control" placeholder="Company Name" />
                                    @error('num_asset')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </form>
                    </td>
                </tr>


            </table>


        </div>
    @endsection

</body>

</html>
