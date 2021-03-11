$(document).ready(function(){
    // Load more data
    $('.load-more').click(function(){
        var category = Number($('#category').val());
        var row = Number($('#row').val());
        var allcount = Number($('#all').val());
        var max_post = Number($(this).attr("max_post"));
        row = row + max_post;
        if(row <= allcount){
            $("#row").val(row);

            $.ajax({
                url: $(this).attr("action"),
                type: 'post',
                data: "row=" + row + "&category=" + category,
                beforeSend:function(){
                    $(".load-more").text("Cargando...");
                },
                success: function(response){
                    setTimeout(function() {
                        $(".post:last").after(response).show().fadeIn("slow");
                        var rowno = row + max_post;
                        if(rowno > allcount){
                            $('.load-more').text("Ocultar registros");
                        }else{
                            $(".load-more").text("Cargar más registros");
                        }
                    }, 2000);
                }
            });
        }else{
            $('.load-more').text("Cargando...");
            setTimeout(function() {
                $('.post:nth-child('+ max_post +')').nextAll('.post').remove().fadeIn("slow");
                $("#row").val(0);
                $('.load-more').text("Cargar más registros");
            }, 2000);


        }

    });

});