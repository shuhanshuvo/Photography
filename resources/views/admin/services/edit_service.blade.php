@extends('layouts.admin')
@section('admin')


<div class="row">
        <div class="col-lg-12">

            <div class="card-box">



              <form class="parsley-examples" action="{{route('update.service')}}" novalidate="" method="post">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="emailaddress">Service Name</label>
                            <input type="hidden" name="service_id" value="{{$service->id}}">
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
                            Update
                        </button>
                    </div>
                </form>

                     
  
@endsection
