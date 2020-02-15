

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
                  <th class="th-sm">First Name

                  </th>
                  <th class="th-sm">Last Name

                  </th>
                  <th class="th-sm">Email

                  </th>
                  <th class="th-sm">Company

                  </th>
                  <th class="th-sm">Address

                  </th>
                  <th class="th-sm">Country

                  </th>
                   <th class="th-sm">Zip

                  </th>
                   <th class="th-sm">Phone

                  </th>
                  <th class="th-sm">Action

                  </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($photographers as $photo)
            <tr>
                  <td>{{ $photo->first_name }}</td>
                  <td>{{ $photo->last_name }}</td>
                  <td>{{ $photo->email }}</td>
                  <td>{{ $photo->company }}</td>
                  <td>{{ $photo->address }}</td>
                  <td>{{ $photo->country }}</td>
                  <td>{{ $photo->zip }}</td>
                  <td>{{ $photo->phone }}</td>
                  <td>
                      <a href="{{route('admin.edit.photo',$photo->id)}}" class="btn btn-primary" >Edit</a>

                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#deleteuser">delete</button>
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

                <form action="{{route('admin.photo.delete',$photo ?? ''->id)}}" method="get">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            Are you sure to delete this user ?
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
