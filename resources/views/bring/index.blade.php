<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ข้อมูลการเบิกครุภัณฑ์</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
@extends('layouts.app')

<body>
    @section('content')
        <div class="container mt-2">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h1>ข้อมูลการเบิกครุภัณฑ์</h1>
                </div>


                <form action="{{ route('web.search') }}" method="GET">

                    <div class="input-group">
                        <input type="text" class="form-control" name="query" placeholder="Search here....."
                            value="{{ request()->input('query') }}">
                        <span class="text-danger">
                            @error('query')
                                {{ $message }}
                            @enderror
                        </span>
                        <button type="submit" class="btn btn-outline-primary">ค้นหา</button>
                        <a href="{{ route('bring.index') }}" class="btn btn-outline-danger">ล้างการค้นหา </a>

                    </div>
                </form>

                <table>
                    <tr>
                        <td>
                            <div><a href="{{ route('companies.index') }}" class="btn btn-warning">ย้อนกลับหน้าแรก</a>
                            </div>

                        </td>
                        <td>
                            <div class="mt-2 mb-2 d-grid gap-2 d-md-flex justify-content-md-end ">
                                <a href="{{ route('bring.create') }}" class="btn btn-info">เพิ่มการเบิกครุภัณฑ์</a>
                            </div>

                        </td>
                    </tr>
                </table>

            </div>
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <table class="table table-bordered">
                <tr>
                    <th>ลำดับ</th>
                    <th>ชื่อผู้เบิก</th>
                    <th>วันที่เบิก</th>
                    <th>รายละเอียด</th>
                    <th>หมายเลขครุภัณฑ์</th>
                    <th>ชื่อครุภัณฑ์</th>
                    <th>ราคา/หน่วย</th>
                    <th>เลขที่ใบส่งของ</th>
                    <th>วันที่รับเข้าคลัง</th>
                    <th>ฝ่ายที่เบิก</th>
                    <th>เลขประจำตำแหน่ง</th>
                    <th>ที่ตั้งครุภัณฑ์</th>
                    <th width="220px">Action</th>
                </tr>
                @foreach ($brings as $bring)
                    <tr>
                        <td>{{ $bring->id }}</td>
                        <td>{{ $bring->fullname }}</td>
                        <td>{{ $bring->date_bring }}</td>
                        <td>{{ $bring->detail }}</td>
                        <td>{{ $bring->num_asset }}</td>
                        <td>{{ $bring->name_asset }}</td>
                        <td>{{ $bring->per_price }}</td>
                        <td>{{ $bring->num_sent }}</td>
                        <td>{{ $bring->date_into }}</td>
                        <td>{{ $bring->department }}</td>
                        <td>{{ $bring->num_department }}</td>
                        <td>{{ $bring->place }}</td>

                        <td>
                            <form action="{{ route('bring.destroy', $bring->id) }}" method="POST">
                                <a href="{{ route('bring.edit', $bring->id) }}"
                                    class="btn btn-warning">แก้ไขการเบิกครุภัณฑ์</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger mt-1">ลบการเบิกครุภัณฑ์</button>

                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>

            {!! $brings->links('pagination::bootstrap-5') !!}

        </div>
    @endsection

</body>

</html>
