$(function(){
    $('#add-button').on('click', function(e) {
        // alert('addがクリックされたよ');

        // formタグの送信を無効化する（二十投稿を防ぐため）
        e.preventDefault();

        // 入力されたタスク名を取得
        let taskName = $('#input-task').val();
        // alert(taskName);

        // ajax開始
        $.ajax({
            // キー（決まった文言）：値
            url:'create.php',
            type:'POST',
            dateType:'json',
            data:{
                // 送信する値を書く
                task:taskName
            }
        }).done((data) =>{
            console.log(data);

            $('tbody').prepend(
                `<tr>` + 
                  `<td>${data['name']}</td>` + 
                  `<td>${data['due_date']}</td>` + 
                  `<td>NOT YET</td>` + 
                  `<td>` + 
                      `<a class="text-success" href="edit.php?id=${data['id']}">EDIT</a>` + 
                  `</td>` + 
                  `<td>` + 
                      `<a class="text-danger" href="delete.php?id=${data['id']}">DELETE</a>` + 
                  `</td>` + 
                `</tr>`
        );

        }).fail((error) =>{

        })
    });
});