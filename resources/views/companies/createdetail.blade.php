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
            <div><a href="{{ route('companies.index') }}" class="btn btn-warning">ย้อนกลับ</a></div>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ sesssion('status') }}
                </div>
            @endif


            <form action=" {{ route('money.store') }}" method="POST" enctype="multipart/form-data">
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
                            <textarea name="detail" cols="30" rows="2" class="form-control" placeholder="รายละเอียด"></textarea>

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
                            <input type="file" name="pic" class="form-control" />
                            @error('pic')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!--

                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <strong>มูลค่าครุภัณฑ์</strong>
                            <input type="number" name="price" class="form-control" placeholder="มูลค่าครุภัณฑ์" />
                            @error('price')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
                        </div>
                    </div>
-->


                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <strong>ชื่อ - สกุล ผู้ครอบครองครุภัณฑ์</strong>
                            <input type="" name="fullname" class="form-control"
                                placeholder="ชื่อ - สกุล ผู้ครอบครองครุภัณฑ์" />
                            @error('fullname')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <strong>ฝ่ายที่ครอบครองครุภัณฑ์</strong> <br>
                            <select name="department" class="form-select">
                                <option selected>โปรดเลือกฝ่ายที่ครอบครองครุภัณฑ์</option>
                                <option value="สำนักงานผู้อำนวยการ">สำนักงานผู้อำนวยการ</option>
                                <option value="ศูนย์รับองสมรรถนะบุคคล">ศูนย์รับองสมรรถนะบุคคล</option>
                                <option value="ฝ่ายบริการวิชาการ">ฝ่ายบริการวิชาการ</option>
                                <option value="ฝ่ายพัฒนาระบบสารสนเทศ">ฝ่ายพัฒนาระบบสารสนเทศ</option>
                                <option value="ฝ่ายสื่อการเรียนการสอน">ฝ่ายสื่อการเรียนการสอน</option>
                            </select>

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
                            <strong>ชื่อ - สกุล ผู้นำเข้าคลัง</strong>
                            <input type="text" name="name_info" class="form-control"
                                value="นางจารุดา วราภรณ์นิลอุบล" placeholder="ชื่อ - สกุล ผู้นำเข้าคลัง" />
                            @error('name_info')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>


                    <!---------------------------------------------------------------->

                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <strong>เลขแหล่งเงิน</strong> <br>
                            <select name="code_money" id="code_money" class="form-control dynamic"
                                data-dependent="name_money">
                                <option selected>โปรดเลือกเลขแหล่งเงิน</option>
                                @foreach ($cashes_list as $cash)
                                    <option value="{{ $cash->code_money }}">{{ $cash->code_money }}</option>
                                @endforeach
                                <!--
                                <option value="101010">101010</option>
                                <option value="201030">201030</option>
                                <option value="203010">203010</option>
                                <option value="203090">203090</option>
                                <option value="206010">206010</option>
                                <option value="206031">206031</option>
                                <option value="901010">901010</option>
                                <option value="906011">906011</option>
                                -->
                            </select>

                            @error('code_money')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <strong>ชื่อแหล่งเงิน</strong> <br>

                            <select name="name_money" id="name_money" class="form-control dynamic"
                                data-dependent="budget">
                                <option value="">โปรดเลือกชื่อแหล่งเงิน</option>

                                <!--
                                <option selected>โปรดเลือกชื่อแหล่งเงิน</option>
                                <option value="เงินงบประมาณแผ่นดิน-เงินจัดสรร">เงินงบประมาณแผ่นดิน-เงินจัดสรร</option>
                                <option value="เงินจัดสรรงานบริการวิชาการ (หน่วยงาน)">
                                    เงินจัดสรรงานบริการวิชาการ (หน่วยงาน)
                                </option>
                                <option value="เงินบริการวิชาการ (หน่วยงาน)">เงินบริการวิชาการ (หน่วยงาน)</option>
                                <option value="เงินอื่นๆ (หน่วยงาน)">เงินอื่นๆ (หน่วยงาน)</option>
                                <option value="เงินเหลือจ่าย (หน่วยงาน)">เงินเหลือจ่าย (หน่วยงาน)</option>
                                <option value="เงินเหลือจ่าย-เงินบริการวิชาการ (หน่วยงาน)">
                                    เงินเหลือจ่าย-เงินบริการวิชาการ (หน่วยงาน)
                                </option>
                                <option value="เงินจัดสรรโครงการพัฒนาสถาบันฯ">เงินจัดสรรโครงการพัฒนาสถาบันฯ</option>
                                <option value="เงินเหลือจ่าย - เงินจัดสรรโครงการพัฒนาสถาบันฯ">
                                    เงินเหลือจ่าย - เงินจัดสรรโครงการพัฒนาสถาบันฯ
                                </option>
                            -->
                            </select>

                            @error('name_money')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <strong>ปีงบประมาณ</strong> <br>
                            <select name="budget" class="form-control" id="budget">
                                <option value="">โปรดเลือกปีงบประมาณ</option>
                                <!--
                                <option value="2551">2551</option>
                                <option value="2552">2552</option>
                                <option value="2553">2553</option>
                                <option value="2554">2554</option>
                                <option value="2555">2555</option>
                                <option value="2556">2556</option>
                                <option value="2557">2557</option>
                                <option value="2558">2558</option>
                                <option value="2559">2559</option>
                                <option value="2560">2560</option>
                                <option value="2561">2561</option>
                                <option value="2562">2562</option>
                                <option value="2563">2563</option>
                                -->
                            </select>
                            @error('budget')
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
