<x-sg-master>
    <div class="content">
        <div class="card">
            <div class="card-header bg-teal-800 text-white header-elements-inline">
                <h6 class="card-title">Supplier List</h6>
            <div class="header-elements">
            <div class="list-icons">
                <a href="/supplier/create"><button>Create Supplier</button></a>
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
                <thead>
                    <tr class="bg-teal-300">
                        
                        <th>Supplier Code</th>
                        <th>Supplier name</th>
                        <th>Supplier Email</th>
                        <th>Supplier Phone</th>
                        <th class="sorting">Supplier Country</th>
                        <th>Supplier Address</th>
                        <th>Supplier image</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($suppliers as $supplier )
                    <tr>
                        
                        <td>{{$supplier->sup_code}}</td>
                        <td>{{$supplier->sup_name}}</td>
                        <td>{{$supplier->sup_email}}</td>
                        <td>{{$supplier->sup_phone}}</td>
                        <td>{{$supplier->sup_country}}</td>
                        <td>{{$supplier->sup_address}}</td>
                        <td><div class="d-flex align-items-center">
                            <div class="col-md-2 ">
                                <a href="images/{{$supplier->sup_image}}" data-popup="lightbox">
                                    <img src="images/{{$supplier->sup_image}}" width="160px" alt="">
                                </a>
                            </div>
                        </td>
                        <td>
                            <div class="list-icons">                             
                                <form action="{{ route('supplier.delete', $supplier->id)}}" method="post">
                                    <a href="#" class="list-icons-item" ><i class="icon-eye" title="Show" style="font-size: 20px; padding:15px"></i></a>
                                    <a href="{{route('supplier.edit', $supplier->id)}}" class="list-icons-item"><i class="icon-pencil7" title="Edit" style="font-size: 20px"></i></a>
                                    @csrf
                                    @method('DELETE')
                                    
                                    <button onclick="return confirm('Are you sure want to delete ?')" class="btn"><i class="icon-trash" title="Delete" style="font-size: 20px"></i></button>

                                </form>
                                <div class="dropdown">
                                    <a href="#" class="list-icons-item dropdown-toggle" data-toggle="dropdown"><i class="icon-cog6" style="font-size: 20px"></i></a>

                                    <div class="dropdown-menu">
                                        <a href="#" class="dropdown-item"><i class="icon-file-pdf"></i> Export to PDF</a>
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