<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แก้ไขครุภัณฑ์</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>

    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="text-center">แก้ไขครุภัณฑ์</h1>
            </div>
            <div><a href="{{ route('companies.index') }}" class="btn btn-warning">Back</a></div>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ sesssion('status') }}
                </div>
            @endif
            <form action=" {{ route('companies.update', $company->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <strong>หมายเลขครุภัณฑ์</strong>
                            <input type="text" name="num_asset" value="{{ $company->num_asset }}"
                                class="form-control" placeholder="Company Name" />
                            @error('num_asset')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <strong>วันที่รับเข้าคลัง</strong>
                            <input type="date" name="date_into" value="{{ $company->date_into }}"
                                class="form-control" placeholder="Company Address" />
                            @error('date_into')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>


                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <strong>ชื่อครุภัณฑ์</strong>
                            <input type="text" name="name_asset" value="{{ $company->name_asset }}"
                                class="form-control" placeholder="Company Email" />
                            @error('name_asset')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>


                    <!--
    <div class="col-md-12">
        <div class="form-group my-3">
            <strong>คุณสมบัติ</strong>
            <input type="text" name="propoty" value="{{ $company->propoty }}" class="form-control" placeholder="Company Address" />
            @error('propoty')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
        </div>
    </div>
-->

                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <strong>รายละเอียด</strong>
                            <input type="text" name="detail" value="{{ $company->detail }}" class="form-control"
                                placeholder="Company Address" />
                            @error('detail')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <strong>หน่วยนับ</strong>
                            <input type="text" name="unit" value="{{ $company->unit }}" class="form-control"
                                placeholder="Company Address" />
                            @error('unit')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <strong>สถานที่ตั้ง</strong>
                            <input type="text" name="place" value="{{ $company->place }}" class="form-control"
                                placeholder="Company Address" />
                            @error('place')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>


                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <strong>ราคา/หน่วย</strong>
                            <input type="text" name="per_price" value="{{ $company->per_price }}"
                                class="form-control" placeholder="Company Address" />
                            @error('per_price')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>





                    <!--
    <div class="col-md-12">
        <div class="form-group my-3">
            <strong>มูลค่าครุภัณฑ์</strong>
            <input type="number" name="price" value="{{ $company->price }}" class="form-control" placeholder="Company Address" />
            @error('price')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
        </div>
    </div>
-->




                    <!--
    <div class="col-md-12">
        <div class="form-group my-3">
            <strong>ชื่อ - สกุล ผู้ครอบครองครุภัณฑ์</strong>
            <input type="text" name="fullname" value="{{ $company->fullname }}" class="form-control" placeholder="ชื่อ - สกุล ผู้ครอบครองครุภัณฑ์" />
            @error('fullname')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group my-3">
            <strong>ฝ่ายที่ครอบครองครุภัณฑ์</strong>
            <input type="text" name="department" value="{{ $company->department }}" class="form-control" placeholder="ฝ่ายที่ครอบครองครุภัณฑ์" />
            @error('department')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group my-3">
            <strong>ชื่อ - สกุล ผู้นำเข้าคลัง</strong>
            <input type="text" name="name_info" value="{{ $company->name_info }}" class="form-control" placeholder="ชื่อ - สกุล ผู้นำเข้าคลัง" />
            @error('name_info')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group my-3">
            <strong>รหัสแหล่งเงิน</strong>
            <input type="number" name="code_money" value="{{ $company->code_money }}" class="form-control" placeholder="รหัสแหล่งเงิน" />
            @error('code_money')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group my-3">
            <strong>ชื่อแหล่งเงิน</strong>
            <input type="text" name="name_money" value="{{ $company->name_money }}" class="form-control" placeholder="ชื่อแหล่งเงิน" />
            @error('name_money')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group my-3">
            <strong>ปีงบประมาณ</strong>
            <input type="number" name="budget" value="{{ $company->budget }}" class="form-control" placeholder="ปีงบประมาณ" />
            @error('budget')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
        </div>
    </div>
-->


                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <strong>สถานะ</strong>
                            <input type="text" name="status_buy" value="{{ $company->status_buy }}"
                                class="form-control" placeholder="สถานะ (จัดซื้อ, รับโอน)" />
                            @error('status_buy')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>


                    <!--
                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <strong>สถานะ (จำหน่าย, ออกภายนอก)</strong>
                            <input type="text" name="status_sell" value="{{ $company->status_sell }}"
                                class="form-control" placeholder="สถานะ (จำหน่าย, ออกภายนอก)" />
                            @error('status_sell')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
                        </div>
                    </div>
                -->

                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <strong>หมายเลขครุภัณฑ์เก่า</strong>
                            <input type="text" name="num_old_asset" value="{{ $company->num_old_asset }}"
                                class="form-control" placeholder="หมายเลขครุภัณฑ์เก่า" />
                            @error('num_old_asset')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>


                    <!--
                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <strong>เลขอัตรา (เลขประจำตำแหน่ง)</strong>
                            <input type="text" name="num_department" value="{{ $company->num_department }}"
                                class="form-control" placeholder="เลขอัตรา (เลขประจำตำแหน่ง)" />
                            @error('num_department')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
                        </div>
                    </div>

                -->

                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <strong>รูปภาพ</strong>
                            <input type="file" name="pic" value="{{ $company->pic }}"
                                class="form-control" />
                            <img src="{{ asset('upload/companies/' . $company->pic) }}" width="150px"
                                heigth="150px" alt="Image">

                            @error('pic')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>


                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary mt-1">Submit</button>
                    </div>

                </div>
            </form>

        </div>
    </div>
</body>

</html>
