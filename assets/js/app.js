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
                      `<a data-id="${data['id']}" class="text-danger delete-button" href="delete.php?id=${data['id']}">DELETE</a>` +
                  `</td>` +
                `</tr>`
        );

        }).fail((error) =>{
            console.log(error);
        })
    });
    // 削除のボタンがクリックされたときの処理
    // $('delete-button).on('click', function(e) {
        $(document).on('click', '.delete-button', function(e){
            // alert('deleteがクリックされたよ');
    
            // formタグの送信を無効化する（二十投稿を防ぐため）
            e.preventDefault();
            // 削除対象のIDの取得
            // $(this)今イベントが実行されている本体
            // →今回の場合は、クリックされたaタグ本体
            let selectedId = $(this).data('id');
            // alert(selectedId);

            // ajax開始
            $.ajax({
                url:'delete.php',
                type:'GET',
                dateType:'json',
                data:{
                    // 送信する値を書く
                    id:selectedId
                }
            }).done( (data) => {
                console.log(data);

                $("a").click(function () {
                    $("a").fadeOut("nomal");
                  });
            }).fail( (error) => {
                console.log(error);

            })
        });
})