<x-sg-master>
    <div class="card">
        <div class="card-body">
            <table class="table datatable-highlight text-warp table-responsive table-border-solid">
                <thead>
                    <tr>
                    <th>Sl</th>
                    <th>Supplier Code</th>
                    <th>Supplier name</th>
                    <th>Supplier Email</th>
                    <th>Supplier Phone</th>
                    <th>Supplier Country</th>
                    <th>Supplier Address</th>
                    <th>Supplier image</th>
                    <th>action</th>
				
                    </tr>
                </thead>
                <tbody>
                    @foreach ($suppliers as $supplier )
                    <tr>
                        <td>{{$supplier->id}}</td>
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
                                <a href="#" class="list-icons-item" ><i class="icon-eye"></i></a>
                                <a href="#" class="list-icons-item"><i class="icon-pencil7"></i></a>
                                <a href="#" class="list-icons-item"><i class="icon-trash"></i></a>
                                <div class="dropdown">
                                    <a href="#" class="list-icons-item dropdown-toggle" data-toggle="dropdown"><i class="icon-cog6"></i></a>

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
    </div>
    </x-sg-master> 