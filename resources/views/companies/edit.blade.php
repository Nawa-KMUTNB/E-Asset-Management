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
            <div><a href="{{ route('companies.index') }}" class="btn btn-warning">ย้อนกลับ</a></div>
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
                                class="form-control" placeholder="หมายเลขครุภัณฑ์" />
                            @error('num_asset')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <strong>วันที่รับเข้าคลัง</strong>
                            <input type="date" name="date_into" value="{{ $company->date_into }}"
                                class="form-control" placeholder="วันที่รับเข้าคลัง" />
                            @error('date_into')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>


                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <strong>ชื่อครุภัณฑ์</strong>
                            <input type="text" name="name_asset" value="{{ $company->name_asset }}"
                                class="form-control" placeholder="ชื่อครุภัณฑ์" />
                            @error('name_asset')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>


                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <strong>รายละเอียด</strong>
                            <textarea name="detail" cols="30" rows="2" class="form-control" placeholder="รายละเอียด">{{ $company->detail }}</textarea>

                            @error('detail')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <strong>หน่วยนับ</strong>
                            <input type="text" name="unit" value="{{ $company->unit }}" class="form-control"
                                placeholder="หน่วยนับ" />
                            @error('unit')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <strong>สถานที่ตั้ง</strong>
                            <input type="text" name="place" value="{{ $company->place }}" class="form-control"
                                placeholder="สถานที่ตั้ง" />
                            @error('place')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>


                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <strong>ราคา/หน่วย</strong>
                            <input type="text" name="per_price" value="{{ $company->per_price }}"
                                class="form-control" placeholder="ราคา/หน่วย" />
                            @error('per_price')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <strong>สถานะ</strong>
                            <input type="text" name="status_buy" value="-" class="form-control "
                                value="{{ $company->status_buy }}"
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
                                value="{{ $company->num_old_asset }}" placeholder="หมายเลขครุภัณฑ์เก่า" />
                            @error('num_old_asset')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>


                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <strong>รูปภาพ</strong>
                            <input type="file" name="pic" class="form-control" />

                            <img src="{{ asset('upload/companies/' . $company->pic) }}" width="150px"
                                heigth="150px" alt="Image">

                            @error('pic')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <strong>ชื่อ - สกุล ผู้ครอบครองครุภัณฑ์</strong>
                            <input type="" name="fullname" class="form-control"
                                value="{{ $company->fullname }}" placeholder="ชื่อ - สกุล ผู้ครอบครองครุภัณฑ์" />
                            @error('fullname')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row g-2">
                        <strong>ฝ่ายที่ครอบครองครุภัณฑ์</strong>
                        <div class="col-md-6">
                            <select name="department" class="form-select">
                                <option selected>โปรดเลือกฝ่ายที่ครอบครองครุภัณฑ์</option>
                                <option value="สำนักงานผู้อำนวยการ">สำนักงานผู้อำนวยการ</option>
                                <option value="ศูนย์รับองสมรรถนะบุคคล">ศูนย์รับองสมรรถนะบุคคล</option>
                                <option value="ฝ่ายบริการวิชาการ">ฝ่ายบริการวิชาการ</option>
                                <option value="ฝ่ายพัฒนาระบบสารสนเทศ">ฝ่ายพัฒนาระบบสารสนเทศ</option>
                                <option value="ฝ่ายสื่อการเรียนการสอน">ฝ่ายสื่อการเรียนการสอน</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="department" class="form-control" disabled
                                placeholder="ฝ่ายที่ครอบครองครุภัณฑ์" value="{{ $company->department }}">

                            @error('department')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <strong>เลขอัตรา (เลขประจำตำแหน่ง)</strong>
                            <input type="text" name="num_department" class="form-control"
                                value="{{ $company->num_department }}" placeholder="เลขอัตรา (เลขประจำตำแหน่ง)" />
                            @error('num_department')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>


                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <strong>ชื่อ - สกุล ผู้นำเข้าคลัง</strong>
                            <input type="text" name="name_info" class="form-control"
                                value="{{ $company->name_info }}" placeholder="ชื่อ - สกุล ผู้นำเข้าคลัง" />
                            @error('name_info')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!---------------------------------------------------------------->
                    <div class="row g-2">
                        <strong>เลขแหล่งเงิน</strong> <br>
                        <div class="col-md-6">
                            <select name="code_money" id="code_money" class="form-control dynamic"
                                data-dependent="name_money">
                                <option selected>โปรดเลือกเลขแหล่งเงิน</option>
                                @foreach ($cashes as $cashing)
                                    <option value="{{ $cashing->code_money }}">{{ $cashing->code_money }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="code_money" class="form-control" disabled
                                value="{{ $cash->code_money }}">
                            @error('code_money')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row g-2">
                        <strong>ชื่อแหล่งเงิน</strong> <br>
                        <div class="col-md-6">
                            <select name="name_money" id="name_money" class="form-control dynamic"
                                data-dependent="budget">
                                <option value="">โปรดเลือกชื่อแหล่งเงิน</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="name_money" class="form-control" disabled
                                value="{{ $cash->name_money }}">



                            @error('name_money')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row g-2">
                        <strong>ปีงบประมาณ</strong> <br>
                        <div class="col-md-6">
                            <select name="budget" class="form-control" id="budget">
                                <option value="">โปรดเลือกปีงบประมาณ</option>
                            </select>
                        </div>
                        <div class="col-md-6">

                            <input type="text" name="budget" class="form-control" disabled
                                value="{{ $cash->budget }}">



                            @error('budget')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <button type="submit" class="btn btn-success mt-2">ยืนยัน</button>
                    </div>

                </div>
            </form>

        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {

            $('.dynamic').change(function() {
                if ($(this).val() != '') {
                    var select = $(this).attr("id");
                    var value = $(this).val();
                    var dependent = $(this).data('dependent');
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url: "{{ route('dynamicdependent.fetch') }}",
                        method: "POST",
                        data: {
                            select: select,
                            value: value,
                            _token: _token,
                            dependent: dependent
                        },
                        success: function(result) {
                            $('#' + dependent).html(result);
                        }

                    })
                }
            });

            $('#code_money').change(function() {
                $('#name_money').val('');
                $('#budget').val('');
            });

            $('#name_money').change(function() {
                $('#budget').val('');
            });


        });
    </script>



</body>

</html>
