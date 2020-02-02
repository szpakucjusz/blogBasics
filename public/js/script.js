$( document ).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    $(".btn-submit").click(function(e){
        e.preventDefault();
        var name = $("input[name=name]").val();
        var password = $("input[name=password]").val();
        var email = $("input[name=email]").val();
        $.ajax({
            type:'POST',
            url:'/ajaxRequest',
            data:{name:name, password:password, email:email},
            success:function(data){
                alert(data.success);
            }

        });


    });
});
