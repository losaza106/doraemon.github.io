<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Doraemon</title>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="style2.css">
</head>

<body>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><b>ค้นหาผัก ผลผลิต</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <label for="">เลือกฤดูของผัก</label>
                        <select id="select_season" class="form-control form-control">
                            <option value="Spring">ฤดูใบไม้ผลิ (Spring)</option>
                            <option value="Summer">ฤดูร้อน (Summer)</option>
                            <option value="Autumn">ฤดูใบไม้ร่วง (Autumn)</option>
                            <option value="Winter">ฤดูหนาว (Winter)</option>
                        </select>
                    </div>
                    <div class="col-md-12 mt-4">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                <th scope="col">รูป</th>
                                <th scope="col">ชื่อภาษาอังกฤษ</th>
                                <th scope="col">ชื่อภาษาไทย</th>
                                <th scope="col">ราคาต่อเมล็ด</th>
                                <th scope="col">ราคาขาย / ชิ้น</th>
                                <th scope="col">ระเวลาเก็บเกี่ยว</th>
                                <th scope="col">เก็บเกี่ยวต่อเนื่อง</th>
                                <th scope="col">#</th>
                                </tr>
                            </thead>
                            <tbody id="items_list">
                                <tr>
                                <th scope="row"><img src="img/no_img.jpg" width="50" height="50" alt=""></th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                                <td>@mdo</td>
                                <td>@mdo</td>
                                <td>@mdo</td>
                                <td><button class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i></button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg row navbar-dark bg-dark" style="background-color: #e3f2fd;">
        <div class="col-md-12 text-center">
            <a class="navbar-brand" href="#"><span style="color:white;">Doraemon : Story of Season</span></a>
        </div>
    </nav>
    <div class="container">
        <div class="col-12 mt-3">
            <div class="card">
                <h5 class="card-header">คำนวณราคาผัก</h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Step 1 >>>>>>>>>>>>>>></label> 
                                <button type="button" class="ml-2 btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
                                    ค้นหาผัก
                                </button>
                                    <hr>
                                        <table>
                                            <tr>
                                                <td >
                                                    <img src="img/Turnip.jpg" id="img_crop" class="mr-3" width="100" height="100" alt="">                                    
                                                </td>
                                                <td>
                                                <b>ชื่อภาษาอังกฤษ</b> : <span class="badge badge-success" id="Name_Eng" style="font-size:20px;">Turnip</span> &nbsp; <b>ราคาเมล็ด</b> : <span class="badge badge-warning" id="Price">50</span> &nbsp; <b>ราคาขาย/ชิ้น</b> : <span id="Sale" class="badge badge-warning">110</span> <br>
                                                <b>ชื่อภาษาไทย</b> : <span class="badge badge-success" id="Name_Thai">หัวผักกาด</span> &nbsp; <b>ระยะเวลาเก็บเกี่ยว :</b> <span class="badge badge-danger" id="Grow_Frist">5 วัน</span> &nbsp; <b>เก็บเกี่ยวต่อเนื่อง :</b> <span id="Grow_Next" class="badge badge-danger">- วัน</span>
                                                </td>
                                            </tr>
                                        </table>
                                        
                            </div>
                            <div class="form-group">
                                <label for="">ปลูกกี่เมล็ด</label>
                                <input type="text" id="Unit_Plant" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">วันที่เริ่มปลูก</label>
                                <select id="start_date" class="form-control">
                                    <?php 
                                    for ($i = 1 ; $i<= 30 ; $i++){
                                        ?>
                                            <option value="<?=$i?>"><?=$i?></option>
                                        <?php
                                    }
                                    ?>
                                </select>

                                <button class="btn btn-success btn-block mt-3" id="calculate"><i class="fa fa-calculator" aria-hidden="true"></i> Calculate</button>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="alert alert-danger" style="display:none;" id="alert_text" role="alert">
                                ปล. ผักชนิดนี้ยังไม่มีข้อมูล การเก็บเกี่ยวครั้งต่อไปว่าใช้กี่วัน
                            </div>
                        </div>
                        <div class="col-md-12 mt-2">
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                    <th scope="col">เก็บเกี่ยวได้ทั้งหมด</th>
                                    <th scope="col">ทุน</th>
                                    <th scope="col">กำไรแบบไม่หักทุน (ครั้งเดียว)</th>
                                    <th scope="col">กำไรแบบหักทุนแล้ว (ครั้งเดียว)</th>
                                    <th scope="col">กำไรทั้งเดือน (หักทุนแล้ว)</th>
                                    </tr>
                                </thead>
                                <tbody id="calculate">
                                    
                                </tbody>
                                </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-md-12 mt-3">
            <div class="accordion" id="accordionExample">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h2 class="mb-0">
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne"
                                aria-expanded="true" aria-controls="collapseOne">
                                รวมข้อมูลต่างๆ (Infomation)
                            </button>
                        </h2>
                    </div>

                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                        data-parent="#accordionExample">
                        <div class="card-body">
                            <ul class="list-group">
                                <li class="list-group-item"><b>ข้อมูลเบื้องต้น ( กลุ่ม Doraemon: Nobita's Story of Seasons [Thailand] )</b></li>
                                <li class="list-group-item"><a target="_blank" href="https://docs.google.com/spreadsheets/d/11l-pGe3w0FWZOhsHBzlSfhd0keyCwWILi14YbPlkN6A/edit?fbclid=IwAR2yVLKOM0YJYh9gAvCafsnd0mwcPmpU-0ADN14skZcj5AV774p2frUcQsI#gid=157925494" class="btn btn-danger btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</a>&nbsp;&nbsp;&nbsp;- ข้อมูลเบื้องต้นทั้งหมด ของโปรดชาวเมือง วันเวลาที่ร้านเปิดปิด เทศกาล ผลผลิต ข้อมูลทั้งหมด</li>
                                <li class="list-group-item"><a target="_blank" href="https://bit.ly/2otbyCn?fbclid=IwAR36oturhyy3PcjOgeNFMm30sCVcXnLSzTG58PhkRPj28F6B-rNPXsAzbWo" class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</a>&nbsp;&nbsp;&nbsp;- <i class="fa fa-info-circle" style="color:red" aria-hidden="true"></i> ทริคแนะนำผู้เล่นใหม่ ควรเริ่มตรงไหนก่อน </li>
                                <li class="list-group-item"><a target="_blank" href="https://bit.ly/2IN7Muh?fbclid=IwAR2SykCGHYhcROCy5wYJzOXgR9wUAeOB_rBBB9wFpnMSB8a7ohUb4y9tH8A" class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</a>&nbsp;&nbsp;&nbsp;- <i class="fa fa-money" style="color:red" aria-hidden="true"></i>  วิธีหาเงินสำหรับผู้เล่นใหม่ </li>

                                <li class="list-group-item"><a target="_blank" href="https://bit.ly/31goHMj?fbclid=IwAR1lJjGDcb26aV-hg5ekq44deo52SN_obp0KKKbgIzf2Ogu7-WvfwGGuG1c" class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</a>&nbsp;&nbsp;&nbsp;- <i class="fa fa-money" style="color:red" aria-hidden="true"></i> วิธีหาเงินสำหรับสายทำฟาร์ม </li>

                                <li class="list-group-item"><a target="_blank" href="https://bit.ly/2B4dCTQ?fbclid=IwAR2KpR6NuR5mKTsmf7cDvS8pBFd0DxTU3rW5ug9ClZmwfGEFWff9rEBJk4c" class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</a>&nbsp;&nbsp;&nbsp;- <i class="fa fa-calendar" style="color:red;" aria-hidden="true"></i> ตารางเวลาตกปลาในเหมือง </li>

                                <li class="list-group-item"><a target="_blank" href="https://bit.ly/2OJUzX4?fbclid=IwAR0aYls6eznZMqeDH21Dy0p2TRXdaPbYWBOTyHItSp7TF-4f1OCZw2uc0A4" class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</a>&nbsp;&nbsp;&nbsp;- <i class="fa fa-money" style="color:red;" aria-hidden="true"></i> วิธีตกปลาให้ได้รอบละ 50k </li>

                                <li class="list-group-item"><a target="_blank" href="https://bit.ly/2B3Nw3t?fbclid=IwAR2eSeXcP4Oovup-Y4fwi0ygszUp81vAi-QYFubXw6pbjAnDhIShE03N2vk" class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</a>&nbsp;&nbsp;&nbsp;- <i class="fa fa-gavel" style="color:red;" aria-hidden="true"></i> ล่าด้วงไปแข่งกัน </li>

                                <li class="list-group-item"><a target="_blank" href="https://bit.ly/2q9M9hq?fbclid=IwAR0eljXaiZqa4s-0B3J8hKmizT-d2Ki3wKr7SL9gsfLZxlen6XbVtNhs-TU" class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</a>&nbsp;&nbsp;&nbsp;- <i class="fa fa-map-marker" style="color:red;" aria-hidden="true"></i> รวมที่อยู่ภูติ Harvest Spirit </li>
                                
                                <li class="list-group-item"><a target="_blank" href="https://bit.ly/2OErHiZ?fbclid=IwAR0x7KxecpW6TsEJYB31iLi-KnSa3-CUmoVJijvF2bs_2y3oFCEzwP35FFU" class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</a>&nbsp;&nbsp;&nbsp;- <i class="fa fa-money" style="color:red;" aria-hidden="true"></i> ทริคเก็บเงินในเหมือง </li>

                                <li class="list-group-item"><a target="_blank" href="https://l.facebook.com/l.php?u=https%3A%2F%2Fbit.ly%2F2OIxjZr%3Ffbclid%3DIwAR2laavEv73_rFoJyJYCiHbTVF8frsPJ1VCMn5rlgi6ZWcs6ZGl-YWa_J4k&h=AT2sxf0hgo2L1n9vhlW6sBHWYQnrNGaWrMITRX0if1lHY7RtjjrHUjqWSJ2gRMnSjIuuw6qjsKUW764CGfP37ZOZgG97k-ZZxSd0o0DC9DZpyyBqaJeYX_oHsUlycudlsXW3mIyIV-_z_X8hvCrua8r_nqUKiJ0OQmpxmg304giu" class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</a>&nbsp;&nbsp;&nbsp;- <i class="fa fa-question" style="color:red;" aria-hidden="true"></i> จุดทำเควสชิ้นส่วนศิลา </li>

                                <li class="list-group-item"><a target="_blank" href="https://www.facebook.com/groups/DoraemonNobitaSoSTH/permalink/480604459208019/" class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</a>&nbsp;&nbsp;&nbsp;- <i class="fa fa-question" style="color:red;" aria-hidden="true"></i> เมล็ดผักฟรีต้นเกม </li>

                                <li class="list-group-item"><a target="_blank" href="https://www.facebook.com/groups/DoraemonNobitaSoSTH/permalink/480694099199055/" class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</a>&nbsp;&nbsp;&nbsp;- <i class="fa fa-star" style="color:red;" aria-hidden="true"></i> ปลูกผักให้ได้ 5 ดาว </li>
                                
                                <li class="list-group-item"><a target="_blank" href="https://bit.ly/2X0P1N0?fbclid=IwAR3KrYACCGXsta9CYF9yyH2Kzmo2a5KHEpDRRjBcidT5i7pGfEDdwKQoUYA" class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</a>&nbsp;&nbsp;&nbsp;- <i class="fa fa-question" style="color:red;" aria-hidden="true"></i> เว็บรวมข้อมูลเกม Doraemon Store of season อีกเว็บ </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card">
                        <div class="card-header" id="headingTwo">
                            <h2 class="mb-0">
                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseTwo"
                                    aria-expanded="true" aria-controls="collapseTwo">
                                    โปรแกรมโกง Trainer (แถมๆ เผื่อใครรีบ)
                                </button>
                            </h2>
                        </div>
    
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                            data-parent="#accordionExample">
                            <div class="card-body">
                                <a href="https://flingtrainer.com/attachments/2722" class="btn btn-success"><i class="fa fa-download"></i> Download</a> Function ตามรูปเลยครับ<br>
                                <img class="img" src="https://flingtrainer.com/wp-content/uploads/2019/10/1-6.png" alt="">
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
    <script src="test.js"></script>
</body>

</html>