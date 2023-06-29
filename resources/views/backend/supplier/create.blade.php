<x-sg-master>
    <x-sg-card>
        <x-slot name="heading">Supplier Create</x-slot>
        <x-slot name="body">
            <form action="" method="POST" enctype="multipart/form-data">

                <div class="row">
                 
    
                    <div class="col-lg-6 col-sm-6 col-12">
                      <div class="form-group">
                        <label class="font-weight-semibold">Suppliers Code</label><br>
                        <input type="text" class="form-control">
                      </div>
                    </div>
                  <div class="col-lg-6 col-sm-6 col-12">
                    <div class="form-group">
                      <label class="font-weight-semibold">Suppliers Name</label><br>
                      <input type="text" class="form-control">
                    </div>
                  </div>
                  <div class="col-lg-6 col-sm-6 col-12">
                    <div class="form-group">
                      <label class="font-weight-semibold">Suppliers Phone</label><br>
                      <input type="tel" class="form-control" placeholder="018XX-XXXXXX" pattern="[0-9]{5}-[0-9]{6}" required>
                    </div>
                  </div>
                  <div class="col-lg-6 col-sm-6 col-12">
                    <div class="form-group">
                      <label class="font-weight-semibold">Suppliers Email</label><br>
                      <input type="email" class="form-control">
                    </div>
                  </div>
                  <div class="col-lg-6 col-sm-6 col-12">
                    <div class="form-group">
                      <label class="font-weight-semibold">Country</label><br>
                      <input type="email" class="form-control">
                    </div>
                  </div>
                  <div class="col-lg-6 col-sm-6 col-12">
                    <div class="form-group">
                      <label class="font-weight-semibold">Address</label><br>
                      <input type="email" class="form-control">
                    </div>
                  </div>

    
    
                  <div class="col-lg-12">
    
                    <div class="form-group row">
                      <label class="col-lg-2 col-form-label font-weight-semibold">Supplier image</label>
                      <div class="col-lg-10">
                        <input type="file" class="file-input" multiple="multiple"  data-fouc>
                      </div>
                    </div>
    
                  </div>
    
    
    
    
    
    
    
                </div>
    
    
    
              </form>
    
        </x-slot>
    </x-sg-card>
</x-sg-master>