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
                <h1>เพิ่มการเบิกครุภัณฑ์</h1>
            </div>
            <div><a href="{{ route('bring.index') }}" class="btn btn-warning">ย้อนกลับ</a></div>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ sesssion('status') }}
                </div>
            @endif


            <form action=" {{ route('bring.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <strong>ชื่อผู้เบิก</strong>
                            <input type="text" name="fullname" class="form-control" placeholder="ชื่อผู้เบิก" />
                            @error('fullname')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <strong>วันที่เบิก</strong>
                            <input type="date" name="date_bring" class="form-control" placeholder="วันที่เบิก" />
                            @error('date_bring')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <strong>รายละเอียด</strong>
                            <textarea name="detail" cols="30" rows="2" class="form-control" placeholder="รายละเอียด"></textarea>

                            @error('detail')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

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
                            <strong>ชื่อครุภัณฑ์</strong>
                            <input type="text" name="name_asset" class="form-control" placeholder="ชื่อครุภัณฑ์" />
                            @error('name_asset')
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
                            <strong>เลขที่ใบส่งของ</strong>
                            <input type="text" name="num_sent" value="-" class="form-control"
                                placeholder="เลขที่ใบส่งของ" />
                            @error('num_sent')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <strong>วันที่เข้าคลัง</strong>
                            <input type="date" name="date_into" value="-" class="form-control"
                                placeholder="วันที่เข้าคลัง" />
                            @error('date_into')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!--
                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <strong>รูปภาพ</strong>
                            <input type="file" name="pic" class="form-control" />
                            @error('pic')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
                        </div>
                    </div>
                -->

                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <strong>ฝ่ายที่เบิก</strong>
                            <input type="text" name="department" class="form-control" placeholder="ฝ่ายที่เบิก" />
                            @error('department')
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

                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <strong>ที่ตั้งครุภัณฑ์</strong>
                            <input type="text" name="place" class="form-control"
                                placeholder="ที่ตั้งครุภัณฑ์" />
                            @error('place')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>


                    <div class="col-md-12">
                        <button type="submit" class="btn btn-success">ยืนยัน</button>
                    </div>

                </div>
            </form>

        </div>
    </div>
</body>

</html>
