<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = new mysqli("localhost", "root", "", "test_bd");



if($_POST['operetion']=='delete'){

    $mysqli->real_query("UPDATE `student`
        SET `status` = 1
        WHERE `ID` = ".$_POST['ID'].";");
    $result =$mysqli->use_result();

    echo 'Удалена запись с айди' .$_POST['ID'];
    exit();
}
//print_r('123');

if($_POST['operetion']=='save'){
    if($_POST['save_data']['sex']=='male'){
        $_POST['save_data']['sex']=1;
    }
    if ($_POST['save_data']['sex']=='female'){
        $_POST['save_data']['sex']=0;
    }
    $mysqli->real_query("
        INSERT INTO `student` (`name`,`lastname`,`patronymic`,`group_Number`,`age`,`sex`,`status`)
        VALUES ('".$_POST['save_data']['name']."','"
        .$_POST['save_data']['lastname']."','"
        .$_POST['save_data']['patronymic']."',1215,"
        .$_POST['save_data']['age'].","
        .$_POST['save_data']['sex'].",1);");
    $result =$mysqli->use_result();
    //SET `status` = 0
    // WHERE `id` = ".$_POST['id'].";
    echo 'Добавлена запись с айди ';
    exit();

}
///$finaly=$result->fetch_all(MYSQLI_ASSOC);
///
if($_POST['operetion']=='edit'){
    $mysqli->real_query("SELECT *
    FROM `student`
    WHERE `ID`=".$_POST['edit_id'].";");
    $result=$mysqli->use_result();
    $group=$result->fetch_all(MYSQLI_ASSOC);
    echo json_encode($group);
    exit();
}

if($_POST['operetion']=='editStudent'){
    if($_POST['save_data']['sex']=='male'){
        $_POST['save_data']['sex']=1;
    }
    if ($_POST['save_data']['sex']=='female'){
        $_POST['save_data']['sex']=0;
    }
    $mysqli->real_query("
        UPDATE `student` 
        SET `name`='".$_POST['save_data']['name'].
        "',`lastname`='".$_POST['save_data']['lastname'].
        "', 
        

}

/*INSERT INTO `student` (`name`,`lastname`,`patronymic`,`group_Number`,`age`,`sex`,`status`)
//        VALUES ('".$_POST['save_data']['name']."','"
//        .$_POST['save_data']['lastname']."','"
//        .$_POST['save_data']['patronymic']."',1215,"
//        .$_POST['save_data']['age'].","
//        .$_POST['save_data']['sex'].",1);");*\
///