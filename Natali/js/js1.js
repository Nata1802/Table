//alert(`привет`)
var categorys;
var score=0;
var rezult=[];



$(document).ready(function () {
//Основной запрос на получение категорий

    $.ajax({
        url: "https://jservice.io//api/categories",// Адрес сервера + метод
        data: {count:5}, // дополнительные параметры
        //функция выполняющая запрос, когда придет ответ
        success: function (massiv) {

            categorys=massiv;


        }

    });
// функция выполнящаяся после ожидания в 1 секунду, для чтобы дошли все ответы

    setTimeout(() => {
        $.each(categorys, function (key,category){
    //дополнительный запрос на получение вопросов и ответов

        $.ajax({
            url: "https://jservice.io/api/clues",
            data: {category:category['id']},
            success:function (massiv){

            rezult.push({
                cat:category[`title`],
                data:massiv
            });


            }
        });
        });

    }, 1000);

    setTimeout(() =>{
        console.log(rezult);
    $(`thead`).append('<tr>\n' +
        '    <th></th>\n' +
        '    <th>'+rezult['0'][`data`]['0']['value']+'</th>\n' +
        '    <th>'+rezult['0'][`data`]['1']['value']+'</th>\n' +
        '    <th>'+rezult['0'][`data`]['2']['value']+'</th>\n' +
        '    <th>'+rezult['0'][`data`]['3']['value']+'</th>\n' +
        '    <th>'+rezult['0'][`data`]['4']['value']+'</th>\n' +
        '</tr>')

      $.each(rezult,function (key,category){

          $(`tbody`).append('<tr>\n' +
              '    <td>'+category['cat']+'</td>\n' +
              '    <td data-value="'+rezult['0'][`data`]['0']['value']+'" data-answer="'+category['data'][0]['answer']+'">'+category['data'][0]['question']+'</td>\n' +
              '    <td data-value="'+rezult['0'][`data`]['1']['value']+'" data-answer="'+category['data'][1]['answer']+'">'+category['data'][1]['question']+'</td>\n' +
              '    <td data-value="'+rezult['0'][`data`]['2']['value']+'" data-answer="'+category['data'][2]['answer']+'">'+category['data'][2]['question']+'</td>\n' +
              '    <td data-value="'+rezult['0'][`data`]['3']['value']+'" data-answer="'+category['data'][3]['answer']+'">'+category['data'][3]['question']+'</td>\n' +
              '    <td data-value="'+rezult['0'][`data`]['4']['value']+'" data-answer="'+category['data'][4]['answer']+'">'+category['data'][4]['question']+'</td>\n' +
              '</tr>')
      })
        $('td').one('click', (function (){
            let value = $(this).attr('data-value');
            let answer =$(this).attr('data-answer');
            console.log(value);
            console.log(answer);
            let users_answer=prompt(`введите ответ`)

           if(users_answer==answer){

               alert(`ответ верный`);
               score=score+parseInt(value);
               $(`.score`).text(score);

            }else{
                alert(`ответ не правильный!`)

            }
        }))

    }, 3000);
    });





    //categoryes=GetCategory(4);
    //console.log(GetCategory(4))

    // function GetCategory(count_categoryes=1){
    // $.ajax({
    //     url:"https://jservice.io//api/categories",
    //     data: {count:count_categoryes},
    //     success:function(massiv){
    //         return massiv;
    //     },

        //success:function (massiv) {
            //console.log(massiv);
            // obje = massiv[0];
            // console.log(obje);
            // question = obje[`question`];
            // console.log(question);
            // answer = obje[`answer`];
            // console.log(answer);
//         }
//     });
//
//
// }