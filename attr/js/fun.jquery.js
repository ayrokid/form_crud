function confirm_page(page,msg,url){
    $.messager.confirm('Confirm', msg, function(r){
        if (r){
            $.ajax({
                url: page,
                dataType: "html",
                timeout: 10000,
                success: function(data){
                    var data = eval('(' + data + ')');
                    if(data.back==='true'){
                        $.messager.alert('Info','Successfully','info', function(){ window.location = url; });                            
                    }else{
                        $.messager.alert('Error',data.msg,'error');
                    }
                },error: function(x, t, m) {
                    if(t==="timeout") {
                        $("#form-info").hide();
                        $.messager.alert('Error','timeout','error');
                    }else {
                        $("#form-info").hide();
                        $.messager.alert('Error',m,'error');
                    }
                }   
            });
        }
    });
}
function load_page(url){
    $("#here").html("<center><p class='load'></p></center>");
    $.ajax({
        url: url,
        dataType: "HTML",                       
        success: function(data){
            $("#here").html(data);
        }         
    });
}
function new_page(page, pjg){
    var params  = 'width='+pjg;
    params += ', height=650';
    params += ', fullscreen=yes,scrollbars=yes';
    window.open(page,'_blank', params);
}  
function myformatter(date){
    var y = date.getFullYear();
    var m = date.getMonth()+1;
    var d = date.getDate();
    return (d<10?('0'+d):d)+'/'+(m<10?('0'+m):m)+'/'+y;
}
function datetime(date){
    var y = date.getFullYear();
    var m = date.getMonth()+1;
    var d = date.getDate();
    var h = date.getHours();
    var i = date.getMinutes();
    var s = date.getSeconds();
    return (d<10?('0'+d):d)+'/'+(m<10?('0'+m):m)+'/'+y+' '+h+':'+i+':'+s;
}