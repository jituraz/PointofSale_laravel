<x-sg-master>
  <div class="col-md-6">
    <div class="card">
      <img class="card-img-top img-fluid" src="../../images/suppliers/{{$supplier->sup_image}}" alt="">

      <div class="card-body">
        <div class="row d-flex">
          <h3 class="card-title">Supplier Code: {{$supplier->sup_code}}</h3>
          <h4 class="card-title -ml-6">Supplier Name: {{$supplier->sup_name}}</h4>
         

        </div>
        <h5 class="card-title">Supplier Status:
          @if ($supplier->sup_status==1)
          <a href="{{ route('supplier.change-status', $supplier->id)}}" class="btn btn-sm btn-success">Active</a>
          @else
          <a href="{{ route('supplier.change-status', $supplier->id)}}" class="btn btn-sm btn-danger">Inactive</a>
          @endif
        </h5>
        <p class="card-text">It prepare is ye nothing blushes up brought. Or as gravity pasture limited evening on. Wicket around beauty say she. Frankness resembled say not new smallness.</p>
      </div>

      <div class="card-footer d-flex justify-content-between">
        <span class="text-muted">Last updated 3 mins ago</span>
        <span>
          <i class="icon-star-full2 font-size-base text-warning-300"></i>
          <i class="icon-star-full2 font-size-base text-warning-300"></i>
          <i class="icon-star-full2 font-size-base text-warning-300"></i>
          <i class="icon-star-full2 font-size-base text-warning-300"></i>
          <i class="icon-star-half font-size-base text-warning-300"></i>
          <span class="text-muted ml-2">(12)</span>
        </span>
      </div>
    </div>
  </div>
</x-sg-master>