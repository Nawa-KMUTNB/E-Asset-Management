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


                <form action="{{ route('web.find') }}" method="GET">

                    <div class="input-group">
                        <input type="text" class="form-control" name="query" placeholder="Search here....."
                            value="{{ request()->input('query') }}">
                        <span class="text-danger">
                            @error('query')
                                {{ $message }}
                            @enderror
                        </span>
                        <button type="submit" class="btn btn-outline-primary">ค้นหา</button>
                        <a href="{{ route('companies.index') }}" class="btn btn-outline-danger">ล้างการค้นหา </a>

                    </div>
                </form>


                <table>
                    <tr>
                        <td>
                            <div class="mt-2 mb-2 "><a href="{{ route('user.index') }}"
                                    class="btn btn-success">จัดการผู้ใช้งาน</a>
                            </div>

                        </td>
                        <td>
                            <div class="mt-2 mb-2 d-grid gap-2 d-md-flex justify-content-md-end "><a
                                    href="{{ route('money.create') }}" class="btn btn-info">เพิ่มครุภัณฑ์</a>
                            </div>

                        </td>
                    </tr>
                </table>




                <!--
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <div class="mb-2"><a href="{{ route('companies.create') }}" class="btn btn-primary">เพิ่มครุภัณฑ์</a></div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                -->
            </div>
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <table class="table table-bordered">
                <tr>
                    <th width="90px"></th>
                    <th>ลำดับ</th>
                    <th>หมายเลขครุภัณฑ์</th>
                    <th>วันที่รับเข้าคลัง</th>
                    <th>ชื่อครุภัณฑ์</th>
                    <th>รายละเอียด</th>
                    <th>หน่วยนับ</th>
                    <th>สถานที่ตั้ง</th>
                    <th>ราคา/หน่วย</th>
                    <th>สถานะ</th>
                    <th>หมายเลขครุภัณฑ์เก่า</th>
                    <th>รูปภาพ</th>
                    <th width="220px">Action</th>
                </tr>
                @foreach ($companies as $company)
                    <tr>
                        <td>
                            <a href="{{ route('detail_companies.edit', $company->id) }}" class="text-primary">รายละเอียด</a>
                        </td>
                        <td>{{ $company->id }}</td>
                        <td>{{ $company->num_asset }}</td>
                        <td>{{ $company->date_into }}</td>
                        <td>{{ $company->name_asset }}</td>
                        <td>{{ $company->detail }}</td>
                        <td>{{ $company->unit }}</td>
                        <td>{{ $company->place }}</td>
                        <td>{{ $company->per_price }}</td>
                        <td>{{ $company->status_buy }}</td>
                        <td>{{ $company->num_old_asset }}</td>
                        <td>
                            <img src="{{ asset('upload/companies/' . $company->pic) }}" width="150px" heigth="150px"
                                alt="Image">

                        </td>
                        <td>
                            <form action="{{ route('companies.destroy', $company->id) }}" method="POST">
                                <a href="{{ route('companies.edit', $company->id) }}"
                                    class="btn btn-warning">แก้ไขครุภัณฑ์</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">ลบครุภัณฑ์</button>

                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>

            {!! $companies->links('pagination::bootstrap-5') !!}

        </div>
    @endsection

</body>

</html>
