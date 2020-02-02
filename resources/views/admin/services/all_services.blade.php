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
        <h5 class="modal-title" id="exampleModalLabel">Edit Service</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
        <div class="col-lg-12">

            <div class="card-box">



              <form class="parsley-examples" action="{{route('add.service')}}" novalidate="" method="post">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="emailaddress">Service Name</label>
                            <input class="form-control" type="text" name="service_name" value="{{$service->service_name}}" id="emailaddress" required="" placeholder="Enter your email" >
                        </div>
                        <div class="form-group col-md-12">
                            <label for="emailaddress">Price</label>
                            <input class="form-control" type="number" name="price" value="{{$service->price}}" id="emailaddress" required=""  >
                        </div>
                        <div class="form-group col-md-12">
                            <label for="emailaddress">Description</label>
                            <input class="form-control" type="text" name="description" value="{{$service->description}}" id="emailaddress" required="" placeholder="Enter your email" >
                        </div>

                    </div>


                    <div class="form-group text-right mb-0">
                        <button class="btn btn-gradient waves-effect waves-light" type="submit">
                            Submit
                        </button>
                    </div>
                </form>

                     <!-- <form class="form-horizontal" action="{{route('add.service')}}" method="post" enctype="multipart/form-data">
                  {{csrf_field()}}
                <fieldset>

                  <div class="control-group">
                      <label class="control-label">Service Title</label>
                      <div class="controls">
                        <input type="text"  name="service_name" placeholder="service name" required="">
                      </div>
                  </div>

                  <div class="control-group">
                      <label class="control-label">Price</label>
                      <div class="controls">
                        <input type="number"  name="price" placeholder="price" required="">
                      </div>
                  </div>
                  <br>

                  <div class="control-group">
                      <label class="control-label">Service Description</label>
                      <div class="controls" >
                        <textarea type="text" name="description" placeholder="description" required="" rows="5"></textarea>
                      </div>
                  </div>
                  <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Add Service</button>
                    <button type="reset" class="btn">Cancel</button>
                  </div>

                </fieldset>
              </form> -->
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
