var NameCal = "Turnip";
var PriceCal = 50;
var saleCal = 110;
var Day_GrowCal = 5;
var Day_Grow_NextCal = 0;
var Unit_PlantCal = 20;
var Date_startCal = 1;

$(document).ready(function(){

    fetch_data('Spring');

    $('#select_season').change(function(){
        let Season = $(this).val();
        fetch_data(Season);
    });

    function fetch_data(Season){
        $.ajax({
            url:'excel.service.php',
            type:'post',
            data: {Season:Season},
            success:function(res){
                let data = $.parseJSON(res);
                var rows;
                data.shift();
                $.each(data, function(key, item) {
                    console.log(item);
                    if(item.Grow_Next == "-"){
                        var Grow_Next_Show = "ยังไม่ทราบ";
                    }else if(item.Grow_Next == 0){
                        var Grow_Next_Show = "เก็บได้ครั้งเดียว";
                    }else{
                        var Grow_Next_Show = item.Grow_Next+" วัน";
                    }
                    rows +=
                        "<tr>" +
                        "<td><img width='50' height='50' src='img/"+item.Img+"'/></td>" +
                        "<td>" + item.NameEng + "</td>" +
                        "<td>" + item.NameThai + "</td>" +
                        "<td>" + item.Price + "</td>" +
                        "<td>" + item.Sale + "</td>" +
                        "<td>" + item.Grow_First + " / วัน</td>" +
                        "<td>" + Grow_Next_Show + "</td>" +
                        "<td><button class='btn btn-success select_item' NameEng='"+item.NameEng+"' NameThai='"+item.NameThai+"' Price='"+item.Price+"' Sale='"+item.Sale+"' Grow_First='"+item.Grow_First+"' Img='"+item.Img+"' Grow_Next='"+item.Grow_Next+"'><i class='fa fa-check' aria-hidden='true'></i></button></td>" +
                        "</tr>";
                });
                $("tbody#items_list").html(rows);
            }
        });
    }

    $('body').on('click','.select_item',function(){
        let nameeng = $(this).attr('nameeng');
        let Img = $(this).attr('Img');
        let namethai = $(this).attr('namethai');
        let price = $(this).attr('price');
        let sale = $(this).attr('sale');
        let grow_first = $(this).attr('grow_first');
        let grow_next = $(this).attr('grow_next');
        $('#exampleModal').modal('hide');
        if(grow_next == "-"){
            var Grow_Next_Show = "ยังไม่ทราบ";
        }else if(grow_next == 0){
            var Grow_Next_Show = "เก็บได้ครั้งเดียว";
        }else{
            var Grow_Next_Show = grow_next;
        }

        $("#img_crop").attr("src","img/"+Img);

        NameCal = nameeng;
        PriceCal = price;
        saleCal = sale;
        Day_GrowCal = grow_first;
        Day_Grow_NextCal = grow_next;

        $('#Name_Eng').text(nameeng);
        $('#Name_Thai').text(namethai);
        $('#Price').text(price);
        $('#Sale').text(sale);
        $('#Grow_Frist').text(grow_first);
        $('#Grow_Next').text(Grow_Next_Show);
        if(Grow_Next_Show == "ยังไม่ทราบ"){
            $('#alert_text').show();
        }else{
            $('#alert_text').hide();
        }
    })

    $('#calculate').click(function(){
        Unit_PlantCal = $('#Unit_Plant').val();
        Date_startCal = $('#start_date').val();
        /* console.log(NameCal);
        console.log(PriceCal);
        console.log(saleCal);
        console.log(Day_GrowCal);
        console.log(Day_Grow_NextCal);
        console.log(Unit_Plant);
        console.log(start_date); */

        Calculate(PriceCal,saleCal,Day_GrowCal,Day_Grow_NextCal,Unit_PlantCal,Date_startCal);
    });

    function Calculate(Price,Sale,Day_Grow,Day_Grow_Next,Unit_Plant,Date_startD){

        let Date_start_In = 30;
        console.log(Date_startD != 1);
        if(Date_startD != 1){
            Date_start_In = Date_start_In - Date_startD;
        }
        /* console.log(Date_startD);
        if(Date_startD = 1){
            Date_start_In = 30;
            console.log(111);
        }else{
            Date_start_In = Date_start_In - Date_startD;
            console.log(12222);
        } */

        let Budget = Price * Unit_Plant; // ต้นทุน
        let Sale_Frist_Time = Sale * Unit_Plant; // ยังไม่หักต้นทุน
        let Sale_Frist_Time_deBudget = (Sale * Unit_Plant) - Budget; // หักทุนแล้ว
        let Frist_Grow = Date_start_In - Day_Grow; // วันที่เหลือจากการโตครั้งแรก
        let All_Month = (Frist_Grow / Day_Grow_Next); // ทั้งเดือนสามารถปลูกได้ X ครั้ง
        let Total_Month = (parseInt(All_Month) * Sale_Frist_Time) + Sale_Frist_Time_deBudget; // เงินทั้งเดือน

        if(Number.isNaN(Total_Month)){
            Total_Month = "ปลูกได้ครั้งเดียว";
        }

        if(All_Month == "Infinity"){
            All_Month = "ปลูกได้ครั้งเดียว";
        }else{
            All_Month =parseInt(All_Month);
        }
        let rows = "<tr>" +
        "<td>" + All_Month + " </td>" +
        "<td>" + Budget + " บาท</td>" +
        "<td>" + Sale_Frist_Time + " บาท</td>" +
        "<td>" + Sale_Frist_Time_deBudget + " บาท</td>" +
        "<td>" + Total_Month + "</td>" +
        +"</tr>";
        console.log(rows);
        $('tbody#calculate').html(rows);

        console.log("ปลูกได้กี่ครั้ง : " + parseInt(All_Month));
        console.log("ทุน : " + Budget);
        console.log("กำไรแบบไม่หักทุน : " + Sale_Frist_Time);
        console.log("กำไรแบบหักต้นทุนแล้ว : " + Sale_Frist_Time_deBudget);
        console.log("รวมทั้งเดือน (หักทุนแล้ว) : " + Total_Month);
    }
});