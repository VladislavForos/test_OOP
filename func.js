function sendNext(){
    $.ajax({
        type: 'post',
        url: 'test.php',
        data:{'action':'next'},
        response: 'text',
        success: function(data){}
    });
}
function sendBack(){
    $.ajax({
        type: 'post',
        url: 'test.php',
        data:{'action':'back'},
        response: 'text',
        success: function(data){}
    });
}