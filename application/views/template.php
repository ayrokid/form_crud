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
    <script src="<?php echo path_js('jquery.min.js'); ?>" type="text/javascript"></script>
    <script src="<?php echo path_js('jquery-ui.js'); ?>" type="text/javascript"></script>
    
    <link rel="stylesheet" type="text/css" href="<?php echo path_js('easyui/themes/default/easyui.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo path_js('easyui/themes/icon.css'); ?>">
    <script type="text/javascript" src="<?php echo path_js('easyui/jquery.easyui.min.js'); ?>"></script>
    <script src="<?php echo path_js('fun.jquery.js'); ?>" type="text/javascript"></script>
    </script>
</head>
<body>

<div id="container">
    
    <div id="left-menu">
        <h1>CMS <span>EDITOR</span></h1>
        <ul class="master">
            <li><?php echo anchor("artikel", 'artikel'); ?></li>
        </ul>
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