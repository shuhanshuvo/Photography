@extends('layouts.admin')
@section('admin')

<div class="container">

        <form class="form-horizontal" action="{{route('add.service')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
          <fieldset>

              <div class="control-group">
                <label class="control-label">Service Title</label>
                <div class="controls">
                  <input type="text"  style="width: 50%; border-radius: 2px;" name="service_name" placeholder="service name" required="">
                </div>
            </div>
            <br>

            <div class="control-group">
                <label class="control-label">Service Description</label>
                <div class="controls" >
                  <textarea type="text" name="description" style="width: 50%; border-radius: 3px;" placeholder="description" required="" rows="5"></textarea>
                </div>
            </div>
            <div class="form-actions">
              <button type="submit" class="btn btn-primary">Add Service</button>
              <button type="reset" class="btn">Cancel</button>
            </div>

          </fieldset>
        </form>


</div>

@endsection

