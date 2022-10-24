$(document).ready(function () {

})
function Delete(ID){
    $('#exampleModal').modal('show');
    console.log(ID);

    $('#Confermed_delete_button').attr('onclick','Confermed_delete('+ID+')')
}
function Confermed_delete(ID){
    console.log('Я удалил запись под ID'+ID)
    $.ajax({
        url: '/getAJAX.php',
        method: 'post',
        dataType: 'html',
        data: {
            operetion: 'delete',
            ID: ID
        },
        success: function(data) {
            console.log(data);
            $("[data-row-id='" + ID + "']").remove();
            $('.modal').modal('hide');
        }
    });
}
// function addStudent(){
//     console.log('Событие срабатывание кнопки')
// }
function addStudent() {
    $('#LargeModal').modal('show');
    $('#LargeModal .modal-title').text('Добавление');
    console.log('Событие срабатывания кнопки');
    $('#LargeModal #add_button').attr('onclick','SendStudent');
    $('#name').val('');
    $('#lastname').val('');
    $('#patronymic').val('');
    $('input[name="male"][value="male"]').prop('checked',true);
    //$('input[name="male"]:checked').val(),
    $('#age').val('')
    $('#groups option:first').prop('selected', true);
}
function SendStudent() {
    data = {
        'name': $('#name').val(),
        'lastname': $('#lastname').val(),
        'patronymic': $('#patronymic').val(),
        'sex': $('input[name="male"]:checked').val(),
        'age': $('#age').val(),
        'groups': $('#groups').val(),
    };
    $.ajax({
        url: '/getAJAX.php',
        method: 'post',
        dataType: 'html',
        data: {
            save_data: data,
            operetion: 'save',
        },
        success: function (result) {
            console.log(result);
            // $("[data-row-id='" + ID + "']").remove();
            // $('.modal').modal('hide');
        }
    });
}
$('tr').click(function (){
    edit_id=$(this).attr('data-row-id')
    $.ajax({
        url: '/getAJAX.php',
        method: 'post',
        dataType: 'html',
        data: {
            edit_id: edit_id,
            operetion: 'edit'
        },
        success: function(result){
            console.log(result);
            prepered = JSON.parse(result);
            console.log(prepered)

            if (prepered[0]['sex']==1){
                parametr_attr='male';
            }
            if (prepered[0]['sex']==0){
                parametr_attr='female';
            }
                $('#name').val(prepered[0]['name'])
                $('#lastname').val(prepered[0]['lastname'])
                $('#patronymic').val(prepered[0]['patronymic'])
                $('input[name="male"][value="'+parametr_attr+'"]').prop('checked',true);
                //$('input[name="male"]:checked').val(),
                $('#age').val(prepered[0]['age'])
                $('#LargeModal').modal('show')


                $('#groups option[value="'+prepered[0]['group_Number']+'"]').prop('selected', true);
                $('#LargeModal .modal-title').text('Редактирование');

            // $("[data-row-id='"+id+"']").remove();
            //$('.modal').modal('hide');
                $('#LargeModal #add_button').attr('onclick', 'EditStudent('+prepered[0]['ID']+')');
        }

    });

    })
function EditStudent(ID){
    data = {
        'ID': ID,
        'name': $('#name').val(),
        'lastname': $('#lastname').val(),
        'patronymic': $('#patronymic').val(),
        'sex': $('input[name="male"]:checked').val(),
        'age': $('#age').val(),
        'groups': $('#groups').val(),
    };
    $.ajax({
        url: '/getAJAX.php',
        method: 'post',
        dataType: 'html',
        data: {
            save_data: data,
            operetion: 'editStudent',
        },
        success: function (result) {
            console.log(result);
            // $("[data-row-id='" + ID + "']").remove();
            // $('.modal').modal('hide');
        }
    });
};
}
