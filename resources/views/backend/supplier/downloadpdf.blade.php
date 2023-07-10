<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Cloud Pos System</title>
  </head>
  <body>
    <div class="card-body">
      <h1>{{$title}}</h1>
      {{-- <h1>{{$image->$supplier->sup_image}}</h1> --}}

      <table class="table table-bordered table-responsive{-sm|-md|-lg|-xl}">
        <thead>

          <tr style="background-color: #00695C">
                        
            <th>Supplier Code</th>
            <th>Supplier name</th>
            <th>Supplier Email</th>
            <th>Supplier Phone</th>
            <th class="sorting">Supplier Country</th>
            <th>Supplier Address</th>
            <th>Supplier Status</th>
            <th>Supplier image</th>
          
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
              <td>
                  @if ($supplier->sup_status==1)
                  <a href="" class="btn btn-sm btn-success" style="border: 2px solid transparent; background:linear-gradient(#00695C, #00695C) padding-box,
                      linear-gradient(60deg, #20bf55 0%, #01baef 74%) border-box; color:aliceblue;">Active <i class="icon-checkmark2"></i></a>
                  @else
                  <a href="" class="btn btn-sm btn-danger" style="border: 2px solid transparent; background:linear-gradient(#d51062, #d51062) padding-box,
                      linear-gradient(60deg, #20bf55 0%, #01baef 74%) border-box; color:aliceblue;">Inactive <i class="icon-cross"></i></a>
                  @endif
              </td>

              <td><div class="d-flex align-items-center">
                  <div class="col-md-2 ">
                
                        
                          <img src="{{$image.$supplier['sup_image']" width="160px" alt="">


                  </div>
              </td>
            
             
          </tr>
          @endforeach 
        </tbody>
      </table>

    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>