@extends('layouts.admin')
@section('admin')

@section('css')

  
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">

    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
@endsection
 

<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                  <th class="th-sm">Service  Name

                  </th>
                  <th class="th-sm">Price

                  </th>
                  <th class="th-sm">Description

                  </th>
                  <th class="th-sm">Action

                  </th>
                
            </tr>
          </thead>
        <tbody>
            @foreach ($services as $service)
            <tr>
                  <td>{{ $service->service_name }}</td>
                  <td>{{ $service->price }}</td>
                  <td>{{ $service->description }}</td>
                  
                  <td>
                      <a href="{{route('edit.service',$service->id)}}" class="btn btn-primary">Edit</a>
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#deleteuser">delete</a>

                  </td>
            </tr>
            @endforeach
     
        </tbody>
        
    </table>



    <div class="modal fade" id="deleteuser" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Delete User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="{{route('admin.service.delete',$service->id)}}" method="get">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            Are you sure to delete this service ?
                            <input type="hidden" name="deleteuser" class="deleteuser">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Delete</button>
                        </div>
                </form>
            </div>
        </div>
    </div>



@endsection

@section('js')

    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
            <script>
        $(document).ready(function() {
            $('#example').DataTable();
        } );
    </script>
@endsection
