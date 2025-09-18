$(document).ready(function(){

    loadManageUsers()

    $(document).on('click','._edit_user', function(e){
        e.preventDefault();
        var element = $(this);
        $.ajax({
            type:'GET',
            url: element.attr('href'),
            beforeSend: function(){
                $('#overlay').show();
            },
            success: function(data){
                $('#overlay').hide();
                $('#edit_user_modal').html(data.html);
                $('.select2').select2();
                var target_modal = element.data('target');
                $(target_modal).modal('show');
            }
        }) 
    })

})

var loadManageUsers = () => {
    ajax_request(window.location.href,'GET',{keyword:$(".search_user").val()}).then( (res) => {
        // $('#manage_user').html(res);
        $('.manage_user').html(res);

        
    });
}

$(document).on("keyup",".search_user",function(){
    loadManageUsers();
})