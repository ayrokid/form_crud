<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
        <title>Silvatel</title>
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo path_img('favicon.png'); ?>" />
        <!-- CSS -->
        <link href="<?php echo path_css('login.css') ?>" rel="stylesheet" type="text/css" />
</head>
<body>
    <div class="title">
        <h2>Vasanti</h2>
        <span>seminyak resort - bali</span><br>
        <strong>managed by topotels</strong>
    </div>
    <div id="content">
        <div id="container">
                <h1>SILVA<span>TEL</span></h1>
                <div id="body">
                    <form action="" method="POST">
                        <div class='error'><?php echo $this->session->flashdata('msg'); ?><br /><br /></div>
                        <p><label>Username:</label><input type="text" name="username" class="text-long" /></p>
                        <div class='error'><?php echo form_error('username'); ?></div>
                        <p><label>Password:</label><input type="password" name="password" class="text-long" /></p>
                        <div class='error'><?php echo form_error('password'); ?></div>
                        <p><input type="submit" name="login" class="submit" value="Login" /></p>
                    </form>
                </div>
                <p class="footer"><?php echo company(); ?> &copy 2013 All rights reserved</p>
        </div>
    </div>
    <p class="bottom">
        Powered by <a href="http://www.silvanix.com"><?php echo developer(); ?></a>
    </p>
</body>
</html>