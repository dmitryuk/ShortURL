

$(function(){
    $('.form-inline').bind('submit',function(){
        var url = $('#url').val();
        if(!ValidURL(url))
            $('.form-group').addClass('has-error');
        else{
            $('.form-group').removeClass('has-error');
            $('.glyphicon-refresh').show();
            $.post('ajaxAddUrl', {'url': url})
                .done(function(data){
                    var shorted = location.protocol + '//' + location.host + location.pathname + data;
                    $('#result').val(shorted);
                    $('.result_div').show();
                })
                .error(function(){
                    alert("Невозможно создать короткую ссылку");
                })
                .always(function(){
                    $('.glyphicon-refresh-animate').hide();
                })

        }
        return false;
    })
});



function ValidURL(str) {
    var regex = /(http|https):\/\/(\w+:{0,1}\w*)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%!\-\/]))?/;
    if(!regex .test(str)) {
        alert("Please enter valid URL.");
        return false;
    } else {
        return true;
    }
}