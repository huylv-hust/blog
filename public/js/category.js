var category = function(){

    //click btn active
    var click_active_btn = function(){
        $('.btn_active').off('click').on('click',function(){
            if(confirm('有効にします、よろしいですか？'))
            {
                var form = $("#form-category");
                form.attr('action', baseUrl + '/admin/category/status');
                $('input[name = "status"]').attr('value', '1');
                form.submit();
            }
        });
    };

    //click btn deactive
    var click_deactive_btn = function(){
        $('.btn_deactive').off('click').on('click',function(){
            if(confirm('無効にします、よろしいですか？')) {
                var form = $("#form-category");
                form.attr('action', baseUrl + '/admin/category/status');
                $('input[name = "status"]').attr('value', '2');
                form.submit();
            }
        });
    };

    //click btn delete
    var click_delete_btn = function(){
        $('.btn_delete').off('click').on('click',function(){
            if(confirm(message_confirm_del))
            {
                var form = $("#form-category");
                form.attr('action', baseUrl + '/admin/category/delete');
                form.submit();
            }
        });
    };

    return {
        init:function(){
            click_active_btn();
            click_deactive_btn();
            click_delete_btn();
        }
    };
}();

$(function(){
    category.init();
});
