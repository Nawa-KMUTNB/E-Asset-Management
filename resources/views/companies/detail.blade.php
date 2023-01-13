<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รายละเอียดข้อมูลครุภัณฑ์</title>
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

                <table>
                    <tr>
                        <td>
                            <div class="mb-1"><a href="{{ route('companies.index') }}"
                                    class="btn btn-warning">ย้อนกลับ</a></div>
                        </td>
                        <td>
                            <div class="mt-2 mb-2 d-grid gap-2 d-md-flex justify-content-md-end ">
                                <a href="{{ route('bring.index') }}" class="btn btn-info">การเบิกครุภัณฑ์</a>
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
                    <th>ชื่อ - สกุล ผู้ครอบครองครุภัณฑ์</th>
                    <th>ฝ่ายที่ครอบครองครุภัณฑ์</th>
                    <th>เลขอัตรา (เลขประจำตำแหน่ง)</th>
                    <th>ชื่อ - สกุล ผู้นำเข้าคลัง</th>
                    <th>เลขแหล่งเงิน</th>
                    <th>ชื่อแหล่งเงิน</th>
                    <th>ปีงบประมาณ</th>

                    <!-- <th width="220px">Action</th>  -->
                </tr>

                <tr>
                    <form action="{{ route('detail_companies.index', $company->id) }}" method="POST"
                        enctype="multipart/form-data">
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
                        <td>{{ $company->fullname }}</td>
                        <td>{{ $company->department }}</td>
                        <td>{{ $company->num_department }}</td>
                        <td>{{ $company->name_info }}</td>


                        <td>{{ $cash->code_money }}</td>
                        <td>{{ $cash->name_money }}</td>
                        <td>{{ $cash->budget }}</td>


                        <!--
                                                                                                                                                                                                <td>
                                                                                                                                                                                                <form action="{{ route('companies.destroy', $company->id) }}" method="POST">
                                                                                                                                                                                                    <a href="{{ route('companies.edit', $company->id) }}"
                                                                                                                                                                                                        class="btn btn-warning">แก้ไขครุภัณฑ์</a>
                                                                                                                                                                                                    @csrf
                                                                                                                                                                                                    @method('DELETE')
                                                                                                                                                                                                    <button type="submit" class="btn btn-danger">ลบครุภัณฑ์</button>

                                                                                                                                                                                                </form>
                                                                                                                                                                                            </td>
                                                                                                                                                                                        -->

                    </form>
                </tr>


            </table>

        </div>
    @endsection


</body>

</html>
