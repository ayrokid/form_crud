<?php 
foreach($data as $val){
?>
<article>
    <h2><?php echo $val->ar_title; ?></h2>
    <div>
        <?php 
        if($val->ar_expired == 'y'){ 
            echo '<i>Expired : '.dateToIndo($val->ar_exp_date).'</i>';
        } 
        ?>
    </div>
    <p class="text">
       <?php echo $val->ar_content; ?>
    </p>
    
</article>
<?php 
} 
