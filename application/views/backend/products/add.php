<?php $this->load->view('includes/header'); ?>
<!-- HEADER SECTION -->
  <div class="container-fluid" style="width: 80%;">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <h5 class="card-header">Featured</h5>
        <!-- Session Message  Start-->
            <?php if($this->session->flashdata('success')){ ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <?php echo $this->session->flashdata('success'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
                </div>
            <?php }else{ ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <?php echo $this->session->flashdata('error'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <?php } ?>            

            <!-- Session Message End-->


            <div class="card-body" style="height: 600px;">
                <h5 class="card-title">Add Item</h5>
                <form action="<?php echo base_url()?>welcome/store" method="post">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Item Name</label>
                            <input type="text" name="product_name" class="form-control" id="exampleFormControlInput1" placeholder="Write Item">
                            </div>
                        </div>
                        <div class="col-md-4">
                        <div class="mb-3">                      
                            <label for="exampleDataList" class="form-label">Item Category</label>
                            <select class="form-select" name="category_id" aria-label="Default select example">
                            <option selected>Select Category</option>
                            <?php foreach ($categories as $value) {?>
                                 <option value="<?php echo $value->category_id ?>"><?php echo $value->category_name ?></option>
                           <?php }?>
                          
                           
                            </select>
                        </div>
                        </div>
                        <div class="col-md-4">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Item Color</label>
                            <input type="text" name="product_attr" class="form-control" id="exampleFormControlInput1" placeholder="Write Item">
                        </div>
                        </div>                    
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Item Price</label>
                            <input type="text"  name="product_price" class="form-control" id="exampleFormControlInput1" placeholder="Write Item">
                            </div>
                        </div>
                        <div class="col-md-4">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Date</label>
                            <input type="text" name="product_created_at" class="form-control" id="exampleFormControlInput1" placeholder="Write Item">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Descriptions</label>
                            <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                        </div>                   
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12">
                        <div class="d-grid gap-2 col-6 mx-auto">
                        
                            <button type="submit" class="btn btn-outline-info">Submit</button>
                            </div>
                        </div>                    
                    </div>
                </form>
            </div>
            </div>
        </div>
      </div>
  </div>
<!-- FOOTER SECTION -->
<?php $this->load->view('includes/footer'); ?>