$( document ).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(".btn-submit-edit-role").click(function(e){
        e.preventDefault();
        var parent = $(this).parent('form');
        $.ajax({
            type:'POST',
            url: parent.attr('action'),
            data: parent.serialize(),
            success:function(data){
                console.log(data.success);
            }
        });
    });
});
