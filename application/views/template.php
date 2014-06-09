<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=0" />
    <meta name="description" content="<?php echo company(); ?>">
    <meta name="author" content="<?php echo developer(); ?>" >
    <meta name="keywords" content="assembla">
    <title><?php echo $title; ?></title>
    <meta content="index,follow" name="robots" />
    <meta content="index,follow" name="googlebot" />
    <meta content="general" name="rating" />
    <meta content="2 days" name="revisit-after" />
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo path_img('favicon.png'); ?>" />
    <link rel="stylesheet" href="<?php echo path_css('style.css'); ?>" type="text/css" />
    <link type="text/css" href="<?php echo path_css('ui-lightness/jquery-ui-1.10.3.custom.css'); ?>" rel="stylesheet" />
    <link href="<?php echo path_css("datepicker.css"); ?>" rel="stylesheet" />
    <script src="<?php echo path_js(); ?>jquery.min.js" type="text/javascript"></script>
    
    <link rel="stylesheet" type="text/css" href="<?php echo path_js('easyui/themes/default/easyui.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo path_js('easyui/themes/icon.css'); ?>">
    <script type="text/javascript" src="<?php echo path_js('easyui/jquery.easyui.min.js'); ?>"></script>
    <script src="<?php echo path_js('fun.jquery.js'); ?>" type="text/javascript"></script>

    <script>
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
    </script>
</head>
<body>

<div id="container">
    
    <div id="left-menu">
        <h1>SILVA<span>TEL</span></h1>
        <ul class="master">
            <li><?php echo anchor("master/room", 'room'); ?></li>
            <li><?php echo anchor("master/food", 'food'); ?></li>
            <li><?php echo anchor('master/laundry', 'laundry'); ?></li>
            <li><?php echo anchor("master/restaurant", 'restaurant'); ?></li>
            <li><?php echo anchor("master/spa", 'SPA Type'); ?></li>
        </ul>
        <ul class="trans">
            <li><?php echo anchor('transaksi/check_in', 'check in'); ?></li>
            <li><?php echo anchor('transaksi/receipt', 'receipt form'); ?></li>
            <li><?php echo anchor('transaksi/guest_list', 'guest list'); ?></li>
            <li><?php echo anchor('transaksi/restaurant', 'restaurant'); ?></li>
            <li><?php echo anchor('transaksi/miscell', 'miscellaneous'); ?></li>
            <li><?php echo anchor('transaksi/laundry', 'laundry'); ?></li>
            <li><?php echo anchor('transaksi/spa', 'SPA'); ?></li>            
            <li><?php echo anchor('transaksi/check_out', 'check out'); ?></li>
        </ul>
<!--        <ul class="report">
            <li><?php echo anchor('laporan/sales_laundry', 'sales laundry'); ?></li>
        </ul>-->
    </div>
    
    <div id="body">
        <h1>
            <?php echo $subTitle; ?>
            <span class="unread">
                <a href="<?php echo site_url('home/logout'); ?>" >Logout </a>
            </span>
        </h1>
        
        <br />
        <div id="here">
        <?php $this->load->view($content); ?>   
        </div>
    </div>
    <div class="footer">
        <?php echo strtolower(company())." - ".address(); ?> 
        <strong style="float: right;">Powered by <?php echo "<a href='silvanix.com'>".developer()."</a>"; ?></strong>
    </div>
</div>

</body>
</html>