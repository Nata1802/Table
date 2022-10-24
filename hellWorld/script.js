// $('.submit_button').click(function (){
//     short_empression_text=$('.short_empression').val();
//     console.log(short_empression_text);
//     console.log(full_empression)
//     let full_empression = $(.full_empression).val()
//
// });


$(`#books_select`).change(function (){
    sic=$(#books_select).val()
    console.log(sic);

    if(sic==){
        $(`.short_empression`)val('')
        $(`.Full_empression`)val('')
        $(.add_book_button)prop(`disedleb`, false)
    }

    if(sic==){
        $(.add_book_button)prop(`disedleb`, true)
        $(`.short_empression`)val(`Прикольную грозу`)
        $(`.Full_empression`)val(`Прикольную `)
    }




