<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มครุภัณฑ์</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>

    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1>เพิ่มครุภัณฑ์</h1>
            </div>
            <div><a href="{{ route('companies.index') }}" class="btn btn-warning">Back</a></div>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ sesssion('status') }}
                </div>
            @endif
            <form action=" {{ route('companies.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <strong>หมายเลขครุภัณฑ์</strong>
                            <input type="text" name="num_asset" class="form-control" placeholder="หมายเลขครุภัณฑ์" />
                            @error('num_asset')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <strong>วันที่รับเข้าคลัง</strong>
                            <input type="date" name="date_into" class="form-control"
                                placeholder="วันที่รับเข้าคลัง" />
                            @error('date_into')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <strong>ชื่อครุภัณฑ์</strong>
                            <input type="text" name="name_asset" class="form-control" placeholder="ชื่อครุภัณฑ์" />
                            @error('name_asset')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <strong>รายละเอียด</strong>
                            <input type="text" name="detail" class="form-control" placeholder="รายละเอียด">
                            @error('detail')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <strong>หน่วยนับ</strong>
                            <input type="text" name="unit" class="form-control" placeholder="หน่วยนับ" />
                            @error('unit')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>


                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <strong>สถานที่ตั้ง</strong>
                            <input type="text" name="place" class="form-control" placeholder="ที่ตั้งครุภัณฑ์" />
                            @error('place')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <strong>ราคา/หน่วย</strong>
                            <input type="number" name="per_price" class="form-control" placeholder="ราคา/หน่วย" />
                            @error('per_price')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <strong>สถานะ</strong>
                            <input type="text" name="status_buy" value="-" class="form-control"
                                placeholder="สถานะ (ถ้าไม่มี ให้ใส่ในช่องว่า ไม่มี)" />
                            @error('status_buy')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <strong>หมายเลขครุภัณฑ์เก่า</strong>
                            <input type="text" name="num_old_asset" value="-" class="form-control"
                                placeholder="หมายเลขครุภัณฑ์เก่า" />
                            @error('num_old_asset')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <strong>รูปภาพ</strong>
                            <input type="file" name="pic" multiple class="form-control" />
                            @error('pic')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>


                    <!--    <div class="col-md-12">
                        <div class="form-group my-3">
                            <strong>มูลค่าครุภัณฑ์</strong>
                            <input type="number" name="price" class="form-control" placeholder="มูลค่าครุภัณฑ์" />
                            @error('price')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
                        </div>
                    </div>



                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <strong>ชื่อ - สกุล ผู้ครอบครองครุภัณฑ์</strong>
                            <input type="text" name="fullname" class="form-control"
                                placeholder="ชื่อ - สกุล ผู้ครอบครองครุภัณฑ์" />
                            @error('fullname')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <strong>ฝ่ายที่ครอบครองครุภัณฑ์</strong>
                            <input type="text" name="department" class="form-control"
                                placeholder="ฝ่ายที่ครอบครองครุภัณฑ์" />
                            @error('department')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <strong>ชื่อ - สกุล ผู้นำเข้าคลัง</strong>
                            <input type="text" name="name_info" class="form-control"
                                placeholder="ชื่อ - สกุล ผู้นำเข้าคลัง" />
                            @error('name_info')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <strong>รหัสแหล่งเงิน</strong>
                            <input type="number" name="code_money" class="form-control"
                                placeholder="รหัสแหล่งเงิน" />
                            @error('code_money')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <strong>ชื่อแหล่งเงิน</strong>
                            <input type="text" name="name_money" class="form-control"
                                placeholder="ชื่อแหล่งเงิน" />
                            @error('name_money')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <strong>ปีงบประมาณ</strong>
                            <input type="number" name="budget" class="form-control" placeholder="ปีงบประมาณ" />
                            @error('budget')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
                        </div>
                    </div>


                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <strong>สถานะ (จำหน่าย, ออกภายนอก)</strong>
                            <input type="text" name="status_sell" value="-" class="form-control"
                                placeholder="สถานะ (จำหน่าย, ออกภายนอก)" />
                            @error('status_sell')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
                        </div>
                    </div>


                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <strong>เลขอัตรา (เลขประจำตำแหน่ง)</strong>
                            <input type="text" name="num_department" class="form-control"
                                placeholder="เลขอัตรา (เลขประจำตำแหน่ง)" />
                            @error('num_department')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
                        </div>
                    </div>
                -->


                    <div class="col-md-12">
                        <button type="submit" class="btn btn-success mt-2">Submit</button>
                    </div>

                </div>
            </form>

        </div>
    </div>
</body>

</html>
