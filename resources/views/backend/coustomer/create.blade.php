<x-sg-master>
 
    <x-sg-card>
<x-slot name="heading">Coustomer Create </x-slot>
        
        <x-slot name="body" >

          @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif
            <form action="/coustomer/store" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">   
                    <div class="col-lg-6 col-sm-6 col-12">
                      <div class="form-group">
                        <label class="font-weight-semibold">Coustomers code</label><br>
                        <input type="text" name="cous_code" class="form-control">
                    
                      </div>
                    </div>
                  <div class="col-lg-6 col-sm-6 col-12">
                    <div class="form-group">
                      <label class="font-weight-semibold">Coustomers Name</label><br>
                      <input type="text" name="cous_name" class="form-control">
                      {{-- error Print Session --}}
                      @if($errors->has('cous_name'))
                         <span class="text-danger">{{$errors->first('cous_name')}}</span></span>
                      @endif
                    </div>
                  </div>
                  <div class="col-lg-6 col-sm-6 col-12">
                    <div class="form-group">
                      <label class="font-weight-semibold">Coustomers Phone</label><br>
                      <input type="tel" name="cous_phone" class="form-control" placeholder="018XX-XXXXXX" >
                      {{-- error Print Session --}}
                      @if($errors->has('cous_phone'))
                         <span class="text-danger">{{$errors->first('cous_phone')}}</span></span>
                      @endif
                    </div>
                  </div>
                  <div class="col-lg-6 col-sm-6 col-12">
                    <div class="form-group">
                      <label class="font-weight-semibold">Coustomers Email</label><br>
                      <input type="email" name="cous_email" class="form-control">
                    </div>
                  </div>
                  <div class="col-lg-6 col-sm-6 col-12">
                    <div class="form-group">
                      <label class="font-weight-semibold">Country</label><br>
                      <input type="text" name="cous_country" class="form-control">
                    </div>
                  </div>
                  <div class="col-lg-6 col-sm-6 col-12">
                    <div class="form-group">
                      <label class="font-weight-semibold">Address</label><br>
                      <input type="text" name="cous_address" class="form-control">
                    </div>
                  </div>
                  <div class="col-lg-12">    
                    <div class="form-group row">
                      <label class="col-lg-2 col-form-label font-weight-semibold">coustomer image</label>
                      <div class="col-lg-10">
                        <input type="file" name="cous_image" class="file-input" multiple="multiple"  data-fouc>
                      </div>
                    </div>    
                  </div>
                  <a href="/coustomer" ><button type="submit" class="btn btn-outline-success" style="margin: 10px">Submit</button></a>
                  <a href="/coustomer" class="btn btn-outline-primary" style="margin: 10px">Back</button></a>
                </div>    
              </form>    
        </x-slot>
    </x-sg-card>    
</x-sg-master>
{{-- toastr Notification part --}}
<script>
  toastr.options = {
      "closeButton": true,
      "progressBar" : true,
      "showDuration": "300",
      "hideDuration": "1000",
      "timeOut": "5000",
      "extendedTimeOut": "1000",
  }
</script> 
@if(Session::has('success'))
<script>
  toastr.success("{{Session::get('success')}}");
</script>
@endif
