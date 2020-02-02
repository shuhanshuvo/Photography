@extends('layouts.admin')
@section('admin')

<div class="container">

     <form class="parsley-examples" action="{{route('add.service')}}" novalidate="" method="post">
            @csrf
            <div class="row" style=" width: 40%;">
                <div class="form-group col-md-12">
                    <label for="emailaddress">Service Name</label>
                    <input class="form-control" type="text" name="service_name" value="" id="emailaddress" required="" placeholder="Enter your email" >
                </div>
                <div class="form-group col-md-12">
                    <label for="emailaddress">Price</label>
                    <input class="form-control" type="number" name="price" value="" id="emailaddress" required=""  >
                </div>
                <div class="form-group col-md-12">
                    <label for="emailaddress">Description</label>
                    <input class="form-control" type="text" name="description" value="" id="emailaddress" required="" placeholder="Enter your email" >
                </div>

            </div>
            <button class="btn btn-gradient waves-effect waves-light" type="submit">
                    Submit
                </button>


            <!-- div class="form-group text-right mb-0">
                <button class="btn btn-gradient waves-effect waves-light" type="submit">
                    Submit
                </button>
            </div> -->
        </form>
      </div>

@endsection

