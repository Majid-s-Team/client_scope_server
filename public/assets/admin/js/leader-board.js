$(document).ready(function(){
    loadLeaderBoard()
    $('.kpi_group_id, .time_frame').change(function(){
        loadLeaderBoard()
        $(".user-chat-detail").addClass('d-none');

        setTimeout(()=>{
            var tr=jQuery(".bg-first");
            if(tr.length>0){
             $(".user-chat-detail").removeClass('d-none');
             $(".user_image").attr("src",$(tr).data('image_url'));
             $(".user_name").html($(tr).data("name"));
             $(".user_no").html($(tr).data("mobile_no"));
             $(".user_email").html($(tr).data("email"));
             $(".team_title").html($(tr).data("team_title"));
            }
          
         },1000);
    });
})

var loadLeaderBoard = () => {
    ajax_request(window.location.href,'GET',$('#leader_board_form').serialize()).then( (res) => {
        // $('#leader_board').html(res);
        $('.leader').html(res);

    });
}
