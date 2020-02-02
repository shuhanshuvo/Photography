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
            @foreach ($users as $user)
            <tr>
                  <td>{{ $user->first_name }}</td>
                  <td>{{ $user->last_name }}</td>
                  <td>{{ $user->email }}</td>
                  <td>{{ $user->company }}</td>
                  <td>{{ $user->address }}</td>
                  <td>{{ $user->country }}</td>
                  <td>{{ $user->zip }}</td>
                  <td>{{ $user->phone }}</td>
                  <td>
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Edit</button>

                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#deleteuser">delete</button>
                  </td>
            </tr>
            @endforeach
     
        </tbody>
        
    </table>



<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit User Profile</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
        <div class="col-lg-12">

            <div class="card-box">

                <form class="parsley-examples" action="{{route('admin.user.profile.update')}}" novalidate="" method="post">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="emailaddress">First Name</label>
                            <input type="hidden" name="edit_user" value="{{$user->id}}">
                            <input class="form-control" type="text" name="first_name" value="{{$user->first_name}}" id="emailaddress" required="" placeholder="Enter your email" >
                        </div>
                        <div class="form-group col-md-6">
                            <label for="emailaddress">Last Name</label>
                            <input class="form-control" type="text" name="last_name" value="{{$user->last_name}}" id="emailaddress" required="" placeholder="Enter your email" >
                        </div>
                        <div class="form-group col-md-6">
                            <label for="emailaddress">Email</label>
                            <input class="form-control" type="email" name="email" value="{{$user->email}}" id="emailaddress" required="" placeholder="Enter your email" >
                        </div>
                        <div class="form-group col-md-6">
                            <label for="emailaddress">Company</label>
                            <input class="form-control" type="text" name="company" value="{{$user->company}}" id="emailaddress" required="" placeholder="Enter your email" >
                        </div>
                        <div class="form-group col-md-6">
                            <label for="emailaddress">Address</label>
                            <input class="form-control" type="text" name="address" value="{{$user->address}}" id="emailaddress" required="" placeholder="Enter your email" >
                        </div>
                        
                        <div class="form-group col-md-6">
                            <label for="emailaddress">Country</label>
                            <input class="form-control" type="text" name="country" value="{{$user->country}}" id="emailaddress" required="" placeholder="Enter your email" >
                        </div>
                        <div class="form-group col-md-6">
                            <label for="emailaddress">Zip</label>
                            <input class="form-control" type="text" name="zip" value="{{$user->zip}}" id="emailaddress" required="" placeholder="Enter your email" >
                        </div>
                        <div class="form-group col-md-6">
                            <label for="emailaddress">Phone</label>
                            <input class="form-control" type="text" name="phone" value="{{$user->phone}}" id="emailaddress" required="" placeholder="Enter your email" >
                        </div>


                    </div>


                    <div class="form-group text-right mb-0">
                        <button class="btn btn-gradient waves-effect waves-light" type="submit">
                            Submit
                        </button>
                    </div>
                </form>
            </div> <!-- end card-box -->
        </div>
    </div>
      </div>
    </div>
  </div>
</div>



    <div class="modal fade" id="deleteuser" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Delete User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="{{route('admin.user.delete',$user->id)}}" method="get">
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
