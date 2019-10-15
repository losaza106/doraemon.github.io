<?php
$Season = $_POST['Season'].".csv";
$objCSV = fopen($Season, "r");
$i = 0;
$array_obj = array(); 
while (($objArr = fgetcsv($objCSV, 1000, ",")) !== FALSE) {
    $array_obj [$i]["Img"]= $objArr[0];
    $array_obj [$i]["NameEng"]= $objArr[1];
    $array_obj [$i]["NameThai"]= $objArr[2];
    $array_obj [$i]["Price"]= $objArr[3];
    $array_obj [$i]["Sale"]= $objArr[4];
    $array_obj [$i]["Grow_First"]= $objArr[5];
    $array_obj [$i]["Grow_Next"]= $objArr[6];
    $i++;
}
?>

<?php
fclose($objCSV);

if(isset($array_obj) AND $array_obj != []){
    echo json_encode($array_obj);
}else{
    $response = [
        "success"=>false
    ];
    echo json_encode($response);
}
?>