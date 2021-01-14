<?php $this->load->view('includes/header'); ?>
<!-- HEADER SECTION -->
  <div class="container-fluid" style="width: 80%;">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <h5 class="card-header">Datatables</h5>      
               <div class="card-body" style="height: 600px;">
               <table id="item-list" class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Item</th>
                            <th>Attribute</th>
                            <th>Price</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>


                    </tbody>
                </table>
               
            </div>
            </div>
        </div>
      </div>
  </div>
  <script type="text/javascript">
$(document).ready(function() {   
    var baseUrl="http://localhost/practices"
      
    $('#item-list').DataTable({
        dom: 'Bfrtip',
  buttons: [
    'copyHtml5', 'excelHtml5', 'pdfHtml5', 'csvHtml5'
  ],
  "columnDefs": [{
    "defaultContent": "-",
    "targets": "_all"
  }],
        "ajax": {
            url :baseUrl+"/welcome/get_item_list",
            type : 'GET'
        },
    });
});
</script>
<!-- FOOTER SECTION -->
<?php $this->load->view('includes/footer'); ?>