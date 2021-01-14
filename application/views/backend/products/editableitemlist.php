<?php $this->load->view('includes/header'); ?>
<!-- HEADER SECTION -->
  <div class="container-fluid" style="width: 80%;">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <h5 class="card-header">Datatables</h5>      
               <div class="card-body" style="height: 600px;">
               <div class="table-responsive">
                <table id="sample_data" class="table table-bordered table-striped">
                <thead>
                    <tr>
                    <th>ID</th>
                    <th>Item Name</th>
                    <th>Attribute</th>
                    <th>Price</th>
                    </tr>
                </thead>
                <tbody></tbody>
                </table>
                </div>
               
            </div>
            </div>
        </div>
      </div>
  </div>
  <script type="text/javascript">
  $(document).ready(function(){
    var baseUrl="http://localhost/practices"
    var dataTable = $('#sample_data').DataTable({
    "processing" : true,
    "serverSide" : true,
    "order" : [],
    "ajax" : {
    url:baseUrl+"/welcome/fetchitem",
    type:"POST"
    }
    });

    $('#sample_data').on('draw.dt', function(){
    $('#sample_data').Tabledit({
    url:'action.php',
    dataType:'json',
    columns:{
    identifier : [0, 'id'],
    editable:[[1,'product_name'], [2, 'product_attr'], [3, 'product_price']]
    },
    restoreButton:false,
    onSuccess:function(data, textStatus, jqXHR)
    {
    if(data.action == 'delete')
    {
        $('#' + data.id).remove();
        $('#sample_data').DataTable().ajax.reload();
    }
    }
    });
    });
 
}); 
</script>
<!-- FOOTER SECTION -->
<?php $this->load->view('includes/footer'); ?>