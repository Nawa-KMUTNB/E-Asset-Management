<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>จัดการผู้ใช้งาน</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
@extends('layouts.app')

<body>
    @section('content')
        <div class="container mt-2">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h1>จัดการผู้ใช้งาน</h1>
                </div>

                <div class="mt-2 mb-2 "><a href="{{ route('companies.index') }}" class="btn btn-warning">Back</a>
                </div>




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
                    <th>ลำดับ</th>
                    <th>ชื่อผู้ใช้</th>
                    <th>อี-เมล ผู้ใช้งาน</th>
                    <th>เลขอัตรา (เลขประจำตำแหน่ง)</th>
                    <th>ตำแหน่ง</th>
                    <th>ชื่อฝ่าย</th>
                    <th>ชื่องาน</th>
                    <th>รหัสผ่าน</th>
                    <th width="220px">Action</th>
                </tr>
                @foreach ($user as $users)
                    <tr>
                        <td>{{ $users->id }}</td>
                        <td>{{ $users->name }}</td>
                        <td>{{ $users->email }}</td>
                        <td>{{ $users->num_position }}</td>
                        <td>{{ $users->position }}</td>
                        <td>{{ $users->department }}</td>
                        <td>{{ $users->task }}</td>
                        <td><input type="password" value="{{ $users->password }}" width="200px"></td>
                        <td>
                            <form action="{{ route('user.destroy', $users->id) }}" method="POST">
                                <a href="{{ route('user.edit', $users->id) }}" class="btn btn-warning">แก้ไขครุภัณฑ์</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">ลบครุภัณฑ์</button>

                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>

            {!! $user->links('pagination::bootstrap-5') !!}

        </div>
    @endsection

</body>

</html>
