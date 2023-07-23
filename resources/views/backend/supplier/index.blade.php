<x-sg-master>

    <div class="content">
        <div class="card">
            <div class="card-header bg-teal-800 text-white header-elements-inline">
                <h6 class="card-title">Supplier List</h6>
            <div class="header-elements">
            <div class="list-icons">
                <a href="{{route('supplier.create')}}"><button type="submit" class="btn  ml-0 legitRipple" style="border: 2px solid transparent; background:linear-gradient(#00695C, #00695C) padding-box,
                    linear-gradient(60deg, #20bf55 0%, #01baef 74%) border-box; color:aliceblue;">Create Supplier<i class="icon-checkmark2 ml-1"></i></button></a>
                <a href="{{route('supplier.trashed')}}"><button type="submit" class="btn  ml-0 legitRipple" style="border: 2px solid transparent; background:linear-gradient(#00695C, #00695C) padding-box,
                    linear-gradient(60deg, #20bf55 0%, #01baef 74%) border-box; color:aliceblue;">Trashed Supplier<i class="icon-checkmark2 ml-1"></i></button></a>
                <a class="list-icons-item" data-action="collapse"></a>
                <a class="list-icons-item ui-sortable-handle" data-action="move"></a>
                <a class="list-icons-item" data-action="reload"></a>
                <a class="list-icons-item" data-action="remove"></a>
                <a class="list-icons-item" data-action="fullscreen"></a>
            </div>
        </div>
        </div>

        <div class="content" >
            
            <table class="table datatable-responsive table-bordered">
                {{-- @if($message = Session::get('success'))
                    <div class="alert alert-danger alert-block">
                     <strong>{{$message}}</strong>
     
                      </div> 
                      @endif --}}
                <thead>
                    <tr class="bg-teal-400" style="text-align: center">
                        
                        <th style="width:20px">Supplier Code</th>
                        <th>Supplier name</th>
                        <th>Supplier Email</th>
                        <th>Supplier Phone</th>
                        <th>Supplier Country</th>
                        <th class="sorting">Supplier Address</th>
                        <th>Supplier Status</th>
                        <th>Supplier image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody style="text-align: center">
                    @foreach ($suppliers as $supplier )
                    <tr>
                        
                        <td>{{$supplier->sup_code}}</td>
                        <td>{{$supplier->sup_name}}</td>
                        <td>{{$supplier->sup_email}}</td>
                        <td>{{$supplier->sup_phone}}</td>
                        <td>{{$supplier->sup_country}}</td>
                        <td>{{$supplier->sup_address}}</td>
                        <td>
                            @if ($supplier->sup_status==1)
                            <a href="{{ route('supplier.change-status', $supplier->id)}}" class="btn btn-sm btn-success" style="border: 2px solid transparent; background:linear-gradient(#00695C, #00695C) padding-box,
                                linear-gradient(60deg, #20bf55 0%, #01baef 74%) border-box; color:aliceblue;">Active <i class="icon-checkmark2"></i></a>
                            @else
                            <a href="{{ route('supplier.change-status', $supplier->id)}}" class="btn btn-sm btn-danger" style="border: 2px solid transparent; background:linear-gradient(#d51062, #d51062) padding-box,
                                linear-gradient(60deg, #20bf55 0%, #01baef 74%) border-box; color:aliceblue;">Inactive <i class="icon-cross"></i></a>
                            @endif
                        </td>

                        <td><div class="d-flex align-items-center">
                            <div class="col-md-2 ">
                                <a href="../../images/suppliers/{{$supplier->sup_image}}" data-popup="lightbox">
                                    <img src="images/suppliers/{{$supplier->sup_image}}" width="160px" alt="">
                                </a>
                            </div>
                        </td>
                        <td>
                            <div class="list-icons">                             
                                {{-- <a href="{{route('supplier.delete', $supplier->id)}}" class=" list-icons-item " type="submit" onclick="return confirm('Are you sure want to delete ?')"><i class="btn icon-bin" title="Edit" style="font-size: 20px"></i></a> --}}
                                <form action="{{ route('supplier.delete', $supplier->id)}}" method="post">
                                    <a href="{{route('supplier.show', $supplier->id)}}" class=" btn list-icons-item" ><i class="icon-eye" title="Show" style="font-size: 20px; "></i></a>
                                    <a href="{{route('supplier.edit', $supplier->id)}}" class="btn list-icons-item"><i class="icon-pencil7" title="Edit" style="font-size: 20px"></i></a>
                                    @csrf
                                    @method('DELETE')
                                    
                                    <button onclick="return confirm('Are you sure want to delete ?')" class="btn"><i class="icon-trash" title="Delete" style="font-size:20px; padding:0;"></i></button>

                                </form>
                                <div class="dropdown">
                                    <a href="#" class="list-icons-item dropdown-toggle" data-toggle="dropdown"><i class="icon-cog6" style="font-size: 20px"></i></a>

                                    <div class="dropdown-menu">
                                        <a href="/supplier/generatepdf" class="dropdown-item"><i class="icon-file-pdf"></i> Export to PDF</a>
                                        <a href="#" class="dropdown-item"><i class="icon-file-excel"></i> Export to CSV</a>
                                        <a href="#" class="dropdown-item"><i class="icon-file-word"></i> Export to DOC</a>
                                    </div>
                                </div>
                            </div>
                        </td>
                       
                    </tr>
                    @endforeach 
                </tbody>
            </table>
    </div>
   
    </x-sg-master> 
    <script>

        toastr.options = {

      
            "showDuration": "300",
      
            "hideDuration": "1000",
      
            "timeOut": "5000",
      
            "extendedTimeOut": "1000",
      
        }
      
      </script> 
      @if(Session::has('success'))
      <script>
        toastr.error("{{Session::get('success')}}");
      </script>
      @endif
      @if(Session::has('info'))
      <script>
        toastr.info("{{Session::get('info')}}");
      </script>
      @endif
      @if(Session::has('restore'))
      <script>
        toastr.success("{{Session::get('restore')}}");
      </script>
      @endif
      @if(Session::has('warning'))
      <script>
        toastr.warning("{{Session::get('warning')}}");
      </script>
      @endif
 
    