<div id="tb">  
    <span>Search :</span>  
    <input id="nama" type="text" class="text-medium" placeholder="" onkeyup="cari()" />
</div>
<table id="grid" class="easyui-datagrid" url="<?php echo site_url("transaksi/load_guest"); ?>" style="height: 450px; margin: 0 auto" rownumbers="true" singleSelect="true" toolbar="#tb" pagination="true">  
    <thead>  
        <tr>    
            <th field="room" width="60">Room</th>  
            <th field="guest" width="270">Guest Name</th>
            <th field="deposit" width="100" align="right">Deposit (IDR)</th>  
            <th field="balance" width="100" align="right">Balance (IDR)</th>  
            <th field="in" width="200" align="right">Check In</th>
            <th field="out" width="200" align="right">Check Out</th>
            <th field="action" align="center" width="50">Action</th>
        </tr>                            
    </thead>                                                       
</table> 

<script type="text/javascript">
function cari(){
    $('#grid').datagrid('load',{
        cari: $('#nama').val()
    });
}
</script>