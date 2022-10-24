<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = new mysqli("localhost", "root", "", "test_bd");

$mysqli->real_query("SELECT * FROM `student` WHERE `status`");
$result =$mysqli->use_result();
$finaly=$result->fetch_all(MYSQLI_ASSOC);

$mysqli->real_query("SELECT * FROM `groups`");
$newgroups =$mysqli->use_result();
$groups=$newgroups->fetch_all(MYSQLI_ASSOC);
print_r($groups);
?>
///




<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<br>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
        </div>
            <table class="table table-dark table-striped">
                <thead>
                <th style="text-align: center" >ID</th>
                <th style="text-align: center">Имя</th>
                <th style="text-align: center">Фамилия</th>
                <th style="text-align: center">Отчество</th>
                <th style="text-align: center">№ Группы</th>
                <th style="text-align: center">Возраст</th>
                <th style="text-align: center">Пол</th>
                <th style="text-align: center"></th>
                </thead>
                <tbody>
                <?php
                foreach ($finaly as $finaly_row){
                    echo '
                     <tr data-row-id="'.$finaly_row['ID'].'">
                        <td style="text-align: center">'.$finaly_row['ID'].'</td>
                        <td style="text-align: center">'.$finaly_row['name'].'</td>
                        <td style="text-align: center">'.$finaly_row['lastname'].'</td>
                        <td style="text-align: center">'.$finaly_row['patronymic'].'</td>
                        <td style="text-align: center">'.$finaly_row['group_Number'].'</td>
                        <td style="text-align: center">'.$finaly_row['age'].'</td>
                        <td style="text-align: center">'.$finaly_row['sex'].'</td>
                        <td style="text-align: center"><button class="btn btn-danger" onclick="Delete('.$finaly_row['ID'].')">X</button></td>
                    </tr>';
                }
                ?>
                </tbody>
            </table>

</div>
<div class="row">
    <div class="col-sm-3">
        <button type="button" class="btn btn-secondary" onclick="addStudent()">Добавить члена группы </button>
    </div>

<div class="modal" id="exampleModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Удаление</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Вы действительно хотите удалить запись?</p>
            </div>
            <div class="modal-footer">
                <button type="button" ID ="Confermed_delete_button" class="btn btn-primary" onclick="Confermed_delete()">Удалить</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

    <div id="LargeModal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">

                    <h5 class="modal-title">Добавление</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                     <div class="container">
                         <div class="row">
                             <div class="col-sm-4">
                                 <div class="form-group">
                                     <label for="name">Имя</label>
                                     <input type="text" class="form-control" name="name" id="name"  placeholder="Введите имя" autocomplete="off" >
                                 </div>
                             </div>
                             <div class="col-sm-4">
                                     <div class="form-group">
                                         <label for="lastname">Фамилия</label>
                                         <input type="text" class="form-control" name="lastname" id="lastname"  placeholder="Введите фамилию" autocomplete="off" >
                                     </div>
                             </div>
                             <div class="col-sm-4">
                                         <div class="form-group">
                                             <label for="patronymic">Отчество</label>
                                             <input type="text" class="form-control" name="patronymic" id="patronymic"  placeholder="Введите отчество" autocomplete="off" ></div>
                             </div>
                         </div>
                         <div class="row">
                             <div class="col-sm-4">
                                 <label> Выберите пол</label>
                                 <div class="form-check">
                                     <input class="form-check-input" type="radio" name="male" value="male">
                                     <label class="form-check-label" for="male">
                                        Мужчина
                                     </label>
                                 </div>
                                 <div class="form-check">
                                     <input class="form-check-input" type="radio" name="male" value="female" checked>
                                     <label class="form-check-label" for="female">
                                         Женщина
                                     </label>

                                 </div>
                             </div>
                             <div class="col-sm-4">
                                 <div class="form-group">
                                     <label for="age">Возраст</label>
                                     <input type="number" class="form-control" name="age" id="age"  placeholder="Введите возраст" autocomplete="off" >
                                 </div>
                             </div>
                             <div class="col-sm-4">
                                     <label for="groups">Группа</label>

                                     <select  class="form-select" name="groups" id="groups"  placeholder="Введите группу" autocomplete="off" >

                                     <?php
                                foreach ($groups as $group){
                                    echo '<option value="'.$group['ID'].'">'.$group['number'].'</option>';
                                     }
                                     ?>
                                 </select>

                                 </div>
                         </div>
                     </div>
                </div>
                  <div class="modal-footer">
                    <button type="button" ID ="add_button" class="btn btn-primary"  onclick="SendStudent()" ">Добавить</button>
                    <button type="button" class="btn btn-primary">Отмена</button>
            </div>
        </div>
    </div>
</div>
<script
        src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous"
></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script type="text/javascript" src="script.js"></script>

</body>
</html>