<?php $this->load->view('includes/header'); ?>
<!-- HEADER SECTION -->
  <div class="container-fluid" style="width: 80%;">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <h5 class="card-header">Featured</h5>
            <div class="card-body" style="height: 600px;">
                <h5 class="card-title">Datatables</h5>
               <div class="items">
                   <a href="<?php echo base_url()?>welcome/add_item" type="button" class="btn btn-primary">Items</a>
                   <a href="" type="button" class="btn btn-primary">Products1</a>
                   <a href="" type="button" class="btn btn-primary">Products2</a>
               </div>
            </div>
            </div>
        </div>
      </div>
  </div>
<!-- FOOTER SECTION -->
<?php $this->load->view('includes/footer'); ?>