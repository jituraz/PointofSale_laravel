<x-sg-master>
    <x-sg-card>
        <x-slot name="heading">Supplier Edit : {{$supplier->sup_name}}</x-slot>
        <x-slot name="body" >
          @if($message = Session::get('success'))
          <div class="alert alert-success alert-block">
            <strong>{{$message}}</strong>
           
          </div> 
          @endif
            <form action="{{route('supplier.update', $supplier->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="row">   
                    <div class="col-lg-6 col-sm-6 col-12">
                      <div class="form-group">
                        <label class="font-weight-semibold">Suppliers Code</label><br>
                        <input type="text" name="sup_code" value="{{$supplier->sup_code}}" class="form-control">
                       
                      </div>
                    </div>
                  <div class="col-lg-6 col-sm-6 col-12">
                    <div class="form-group">
                      <label class="font-weight-semibold">Suppliers Name</label><br>
                      <input type="text" name="sup_name" value="{{$supplier->sup_name}}"  class="form-control">
                     
                    </div>
                  </div>
                  <div class="col-lg-6 col-sm-6 col-12">
                    <div class="form-group">
                      <label class="font-weight-semibold">Suppliers Phone</label><br>
                      <input type="tel" name="sup_phone"  value="{{$supplier->sup_phone}}"  class="form-control" placeholder="018XX-XXXXXX" required>
                      
                    </div>
                  </div>
                  <div class="col-lg-6 col-sm-6 col-12">
                    <div class="form-group">
                      <label class="font-weight-semibold">Suppliers Email</label><br>
                      <input type="email" name="sup_email"  value="{{$supplier->sup_email}}"  class="form-control">
                    </div>
                  </div>
                  <div class="col-lg-6 col-sm-6 col-12">
                    <div class="form-group">
                      <label class="font-weight-semibold">Country</label><br>
                      <input type="text" name="sup_country" value="{{$supplier->sup_country}}"  class="form-control">
                    </div>
                  </div>
                  <div class="col-lg-6 col-sm-6 col-12">
                    <div class="form-group">
                      <label class="font-weight-semibold">Address</label><br>
                      <input type="text" name="sup_address" value="{{$supplier->sup_address}}"  class="form-control">
                    </div>
                  </div>
                  <div class="col-lg-12">    
                    <div class="form-group row">
                      <label class="col-lg-2 col-form-label font-weight-semibold">Supplier image</label>
                      <div class="col-lg-10">
                        <input type="file" name="sup_image" class="file-input" multiple="multiple"  data-fouc>
                      </div>
                    </div>    
                  </div>
                  <a href="/supplier" ><button type="submit" class="btn btn-outline-primary" style="margin: 10px">Submit</button></a>

               
                   
    
                </div>
    
    
    
              </form>
                              
   
    
        </x-slot>

    </x-sg-card>

    
</x-sg-master>

  </div> 

