/**
 * Created by Administrator on 2018/7/27 0027.
 */

$(function () {
   $('#discuss').keydown(function (event) {
        if (event.keyCode == 13) {
            var text = $(this).val();
            var url = "http://118.24.112.162:8811/?s=index/chart/index";
            var data = {
                'content':text,
                'game_id':1
            };
            $.post(url,data,(result)=>{
                $(this).val('');
            },'json');
        }
   })
});