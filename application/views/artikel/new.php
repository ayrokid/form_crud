<?php 
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
chmod('upload/media', 0755);
?>
<form id="form" action="<?php echo site_url("artikel/save/i");?>" method="post">
<center><span id="form-info"></span></center>
<input type="hidden" name="id" value="0" id="id" />
<table>
    <tr>
        <td>Judul</td>
        <td>:</td>
        <td>
            <input type="text" name="judul" id="judul" size="45" maxlength="50" required="required" />
        </td>            
    </tr>
    <tr>
        <td style="vertical-align: top;">Content</td>
        <td style="vertical-align: top;">:</td>
        <td>
            <textarea name="content" id="content" rows="2" cols="8"></textarea>
        </td>            
    </tr>
    <tr>
        <td>Expired</td>
        <td>:</td>
        <td>
            <select id="expired" name="expired" required="required">
                <option value="n">No</option>
                <option value="y">Yes</option>
            </select>
        </td>            
    </tr>
    <tr class="date_exp" style="display: none">
        <td>Date</td>
        <td>:</td>
        <td>
            <input type="text" name="date" id="date" />
        </td>            
    </tr>
    <tr>
        <td colspan="3" class="t-center"><input type="submit" class="button" value="Save" /></td>
    </tr>
</table>
</form>
<script type="text/javascript">  
$(function(){   
    $( "#date" ).datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat:'dd-mm-yy'		
    });
    $("#expired").change(function(){
        var ex = $(this).val();
        if(ex == 'y'){
           $(".date_exp").show();  
        }else{
           $(".date_exp").hide();  
        }
    });
});    
</script>