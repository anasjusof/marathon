@extends('layouts.master')

@section('head')

@stop

@section('title')
    Upload Excel
@stop

@section('breadcrumb')
    <li>
        <i class="fa fa-home"></i>
        <a href="">Home</a>
        <i class="fa fa-angle-right"></i>
    </li>
    <li>
        <a href="#">Upload Excel</a>
    </li>
@stop

@section('content')

<div class="row">
	<div class="col-md-12">
		<div class="form-group col-md-12">
        <center>
        {!! Form::open(['method'=>'POST', 'action'=>'AdminController@uploadExcelParticipant', 'files'=>true]) !!}
          <!-- <label for="inputPassword1" class="control-label">Upload file</label> -->
            <input class="form-control input-line input-medium" type="file" name="attachment" id="fileToUpload" style="border-bottom: 1px solid #15B08B;">
            <input type="submit" class="btn btn-success btn-sm" value="Upload" style="margin-top: 15px;" id="upload_btn">
        {!! Form::close() !!}
        </center>
        
    </div>
	</div>
	

<!-- Modal -->
<div id="editModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Info</h4>
      </div>
      <div class="modal-body">
      	<div class="row">
      	{!! Form::open(['method'=>'PATCH']) !!}
      		<div class="form-group col-md-12">
	            <label for="inputPassword1" class="col-md-4 control-label">Model</label>
	            <div class="col-md-8">
	                    <input type="text" name="model" class="form-control input-line" id="m_vehicle_model">
	            </div>
	        </div>
	        <div class="form-group col-md-12">
	            <label for="inputPassword1" class="col-md-4 control-label">Plate</label>
	            <div class="col-md-8">
	                    <input type="text" name="plate" class="form-control input-line" id="m_vehicle_plate">
	            </div>
	        </div>
	        <div class="form-group col-md-12">
	            <label for="inputPassword1" class="col-md-4 control-label">Type</label>
	            <div class="col-md-8">
	                    <input type="text" name="type" class="form-control input-line" id="m_vehicle_type">
	            </div>
	        </div>
	        
	        <input type="hidden" name="id" id="m_vehicle_id">
	    
	  	</div>
      </div>
      <div class="modal-footer">
      	<button type="submit" class="btn btn-primary">Update</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       {!! Form::close() !!}
      </div>
    </div>

  </div>
</div>
<!-- End Modal -->

<!-- Modal -->
<div id="createModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Create New Vehicle</h4>
      </div>
      <div class="modal-body">
      	<div class="table-scrollable table-scrollable-borderless">
            {!! Form::open(['method'=>'POST']) !!}
            	<div class="form-group col-md-12">
		            <label for="inputPassword1" class="col-md-4 control-label">Model</label>
		            <div class="col-md-8">
		                    <input type="text" name="model" class="form-control input-line" id="vmodel" value="{{ old('model') }}">
		            </div>
		        </div>
		        <div class="form-group col-md-12">
		            <label for="inputPassword1" class="col-md-4 control-label">Plate</label>
		            <div class="col-md-8">
		                    <input type="text" name="plate" class="form-control input-line" id="vplate" value="{{ old('plate') }}">
		            </div>
		        </div>
		        <div class="form-group col-md-12">
		            <label for="inputPassword1" class="col-md-4 control-label">Type</label>
		            <div class="col-md-8">
		                    <input type="text" name="type" class="form-control input-line" id="vplate" value="{{ old('type') }}">
		            </div>
		        </div>
        </div>
      </div>
      <div class="modal-footer">
      	<button class="btn btn-transparent blue btn-sm active submitVehicleBtn"> Submit </button>
        <button type="button" class="btn btn-sm btn-warning" data-dismiss="modal">Close</button>
       {!! Form::close() !!}
      </div>
    </div>

  </div>
</div>
<!-- End modal -->

@stop

@section('script')

<script>
	$(document).ready(function(){
       $('#checkall-checkbox').click(function(){
            if(this.checked){
                $('.checker').find('span').addClass('checked');
                $("input.single-checkbox").prop('checked', true).show();
            }
            else{
                $('.checker').find('span').removeClass('checked');
                $("input.single-checkbox").prop('checked', false);
            }
       });

       $('.editBtn').click(function(){

       		var roles_id = $(this).data('roles_id');
       		var faculties_id = $(this).data('faculties_id');

       		$("#m_vehicle_id").val($(this).data('vehicle_id'));
		 	$("#m_vehicle_model").val($(this).data('vehicle_model'));
		 	$("#m_vehicle_plate").val($(this).data('vehicle_plate'));
		 	$("#m_vehicle_type").val($(this).data('vehicle_type'));
       });

      $('#upload_btn').click(function(){
        $('#dimScreen').css("visibility", "visible");
        $('.loader').css("visibility", "visible");
      });
    });
</script>

@if(Session::has('create_message'))
    <script>
    	alertify.success("{{Session::get('create_message')}}");
    </script>
@endif

@if(Session::has('delete_message'))
    <script>
    	alertify.warning("{{Session::get('delete_message')}}");
    </script>
@endif

@if(Session::has('error_message'))
    <script>
      alertify.error("{{Session::get('error_message')}}");
    </script>
@endif

@if(Session::has('update_message'))
    <script>
    	alertify.success("{{Session::get('update_message')}}");
    </script>
@endif

@include('errors.validation-errors')
@include('errors.validation-errors-script')

@stop