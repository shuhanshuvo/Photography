
@extends('layouts.photographer')
@section('photographer')

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">

                    </ol>
                </div>
                <h4 class="page-title">Profile</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-lg-12">

            <div class="card-box">

                <form class="parsley-examples" action="{{route('p_profile_update')}}" novalidate="" method="post">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="emailaddress">First Name</label>
                            <input class="form-control" type="text" name="first_name" value="{{$photographer->first_name}}" id="emailaddress" required="" placeholder="Enter your email" >
                        </div>
                        <div class="form-group col-md-6">
                            <label for="emailaddress">Last Name</label>
                            <input class="form-control" type="text" name="last_name" value="{{$photographer->last_name}}" id="emailaddress" required="" placeholder="Enter your email" >
                        </div>
                        <div class="form-group col-md-6">
                            <label for="emailaddress">Email</label>
                            <input class="form-control" type="email" name="email" value="{{$photographer->email}}" id="emailaddress" required="" placeholder="Enter your email" >
                        </div>
                        <div class="form-group col-md-6">
                            <label for="emailaddress">Company</label>
                            <input class="form-control" type="text" name="company" value="{{$photographer->company}}" id="emailaddress" required="" placeholder="Enter your email" >
                        </div>
                        <div class="form-group col-md-6">
                            <label for="emailaddress">Address</label>
                            <input class="form-control" type="text" name="address" value="{{$photographer->address}}" id="emailaddress" required="" placeholder="Enter your email" >
                        </div>
                        
                        <div class="form-group col-md-6">
                            <label for="emailaddress">Country</label>
                            <input class="form-control" type="text" name="country" value="{{$photographer->country}}" id="emailaddress" required="" placeholder="Enter your email" >
                        </div>
                        <div class="form-group col-md-6">
                            <label for="emailaddress">Zip</label>
                            <input class="form-control" type="text" name="zip" value="{{$photographer->zip}}" id="emailaddress" required="" placeholder="Enter your email" >
                        </div>
                        <div class="form-group col-md-6">
                            <label for="emailaddress">Phone</label>
                            <input class="form-control" type="text" name="phone" value="{{$photographer->phone}}" id="emailaddress" required="" placeholder="Enter your email" >
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

@endsection
