<div id="tb">  
    <a href="<?php echo site_url("artikel/new"); ?>" class="easyui-linkbutton" iconCls="icon-add" >New</a>
</div>
<table id="grid" class="easyui-datagrid" url="<?php echo site_url("artikel/load_artikel"); ?>" style="height: 430px; margin: 0 auto" rownumbers="true" singleSelect="true" toolbar="#tb" pagination="true">  
    <thead>  
        <tr>     
            <th field="ar_title" width="650">Title</th>
            <th field="date" width="200">Expired Date</th>  
            <th field="action" align="center" width="100">Action</th>
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