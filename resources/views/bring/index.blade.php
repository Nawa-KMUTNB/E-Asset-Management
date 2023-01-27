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
                <div class="col-lg-12 text-center" id="brData2">
                    <h3>ข้อมูลการเบิกครุภัณฑ์</h3>
                </div>


                <form action="{{ route('web.search') }}" method="GET">

                    <div class="input-group">
                        <div class="mt-2 mb-2 d-grid gap-2 d-md-flex justify-content-md-end ">
                            <a href="{{ route('bring.create') }}" class="btn btn-info">เพิ่มการเบิกครุภัณฑ์</a>
                        </div>

                        <input type="text" style=" border-radius: 10px;margin-top:10px;" class="form-control"
                            name="query" placeholder="ค้นหาครุภัณฑ์" value="{{ request()->input('query') }}"
                            id="search">
                        <span class="text-danger">
                            @error('query')
                                {{ $message }}
                            @enderror
                        </span>

                        <button type="submit" class="btn btn-outline-primary"
                            style="margin-left: 5px;margin-top:10px;margin-right: 5px; border-radius :10px;"
                            id="height">ค้นหา</button>
                        <a href="{{ route('bring.index') }}" class="btn btn-outline-danger"
                            style="margin-top:10px;border-radius:10px; "id="height">ล้างการค้นหา </a>

                    </div>
                </form>





            </div>
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <table class="table table-hover table-bordered">
                <thead class="table-dark" style="text-align:center;font-size:16px;">
                    <tr>
                        <th>ลำดับ</th>
                        <th>ชื่อ - สกุลผู้เบิก</th>
                        <th>วันที่เบิก</th>
                        <th>รายละเอียด</th>
                        <th>หมายเลขครุภัณฑ์</th>
                        <th>ชื่อครุภัณฑ์</th>
                        <th>ราคา/หน่วย</th>
                        <th>เลขที่ใบส่งของ</th>
                        <th>วันที่รับเข้าคลัง</th>
                        <th>ฝ่ายที่เบิก</th>
                        <th>เลขประจำตำแหน่ง</th>
                        <th>สถานที่ตั้งครุภัณฑ์</th>
                        <th width="220px">Action</th>
                    </tr>
                </thead>
                @foreach ($brings as $bring)
                    <tr>
                        <td>{{ $bring->id }}</td>
                        <td>{{ $bring->FullName }}</td>
                        <td>{{ $bring->date_bring }}</td>
                        <td>{{ $bring->detail }}</td>
                        <td>{{ $bring->num_asset }}</td>
                        <td>{{ $bring->name_asset }}</td>
                        <td>{{ $bring->per_price }}</td>
                        <td>{{ $bring->num_sent }}</td>
                        <td>{{ $bring->Date_into }}</td>
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
