   <?php
    $con = mysqli_connect("localhost", "root", "", "gas");

$sql_query = "Select * From updatedata
where id = (select max(id) from updatedata)";
$result = mysqli_query($con,$sql_query);
if(mysqli_num_rows($result)>0) {
//    $response['success'] =1;
    $data = array();
    while ($row = mysqli_fetch_assoc($result)) {
        array_push($data, $row);
    }

//    $response['data'] = $data;
}
echo json_encode($data);