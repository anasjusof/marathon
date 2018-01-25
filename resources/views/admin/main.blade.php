@extends('layouts.master')

@section('head')

@stop

@section('title')
    Participant
@stop

@section('breadcrumb')
    <li>
        <i class="fa fa-home"></i>
        <a href="">Home</a>
        <i class="fa fa-angle-right"></i>
    </li>
    <li>
        <a href="#">Participant</a>
    </li>
@stop

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="pull-right"  style="padding-top: 5px; padding-bottom: 5px;">
			<div class="input-group">
                <input type="text" class="form-control border-color-light-turquoise" placeholder="Search by IC" id="search_ic">
                <span class="input-group-btn">
                    <button class="btn blue background-color-light-turquoise" type="button" id="search_btn">Search</button>
                </span>
            </div>
		</div>
	</div>
	<div class="col-md-12">
		<!-- BEGIN BORDERED TABLE PORTLET-->
	    <div class="portlet box portlet-box-border-color">
	        <div class="portlet-title portlet-title-color">
	            <div class="caption">
	                <i class=""></i>
	                <span class="uppercase">List of Participant</span>
	            </div>
	        </div>
	        <div class="portlet-body">
	            <div class="table-scrollable table-scrollable-borderless">
	                <table class="table table-hover table-light">

			        	<div class="col-md-12">
			        		<!-- <a href="" class="btn btn-sm green-jungle pull-right" id="createButton" data-toggle="modal" data-target="#createModal">Create New Vehicle</a> -->
			        	</div>
	                    <thead>
	                        <tr class="uppercase">
	                            <th> # </th>
	                            <th> Name </th>
	                            <th> IC Number </th>
	                            <th> Mobile No. </th>
	                            <th> Category</th>
	                            <th> T Shirt Size</th>
	                            <th> Details</th>
	                            <th> Collect</th>
	                            <th> Collector Name</th>
	                            <th> Collector IC</th>
	                            <th> Collector No.</th>
	                        </tr>
	                    </thead>
	                    <tbody id="tbody">
	                    	@if(count($participants) > 0)
	                    	<?php $count = 1; ?>
	                        @foreach($participants as $participant)
	                        <?php $currentPageTotalNumber = ($participants->currentPage() - 1) * 5; ?>
	                    	<tr class="">
	                            <td> {{ $count + $currentPageTotalNumber }} </td>
	                            <td> {{ $participant->name_on_bib }} </td>
	                            <td> {{ $participant->nric_passport }} </td>
	                            <td> {{ $participant->mobile_no }} </td>
	                            <td> 24KM</td>
	                            <td style="padding-left: 45px"> S</td>
	                            <td> <a href="" class="btn btn-success btn-sm ">View</a></td>
	                            <td  style="padding-left: 25px"> 
	                            	<input type="checkbox" value="<?php echo $participant->id; ?>" name="p_id[<?php echo $participant->id; ?>]" form="form_update_status" <?php if($participant->collection_status == 1){ echo 'checked';} ?>>
	                            </td>
	                            <td> 
	                            	<input type="text" name="c_name[<?php echo $participant->id; ?>]" class="form-control" form="form_update_status" value="{{ $participant->collection_name }}">
	                            </td>
	                            <td>
	                            	<input type="text" name="c_ic[<?php echo $participant->id; ?>]" class="form-control" form="form_update_status" value="{{ $participant->collection_ic }}">
	                            </td>
	                            <td>
	                            	<input type="text" name="c_no[<?php echo $participant->id; ?>]" class="form-control" form="form_update_status" value="{{ $participant->collection_no }}">
	                            </td>
	                        </tr>
	                        <?php $count++ ?>
	                        @endforeach
	                        @else
	                        <tr class="">
	                        	<td colspan="8" class="text-center">No data available </td>
	                        </tr>
	                        @endif
	                        <!-- <tr class="">
	                            <td> 2 </td>
	                            <td> Danila </td>
	                            <td> 911114136155 </td>
	                            <td> 013-3456789 </td>
	                            <td> 5KM </td>
	                            <td style="padding-left: 45px"> M</td>
	                            <td> <a href="" class="btn btn-success btn-sm ">View</a></td>
	                            <td style="padding-left: 25px"> <input type="checkbox" value="1" name="test"></td>
	                        </tr> -->
	                    </tbody>
	                </table>
	            </div>

	            <div class="row">
		        	<div class="col-md-6">
		        		{{$participants->render()}}
		        	</div>
		        	<div class="col-md-6">
		        		<div class="pull-right"  style="padding-right: 25px; padding-top: 15px;">
		        			{!! Form::open(['method'=>'PATCH', 'action'=>['AdminController@updateCollection'], 'id'=>'form_update_status']) !!}
		        			<button class="btn btn-sm btn-primary">Collect & Update</button>
		        			{!! Form::close() !!}
		        		</div>
		        	</div>
	        </div>

	        
	    </div>
	    <!-- END BORDERED TABLE PORTLET-->
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

       $('#search_btn').click(function(){
		    if($('#search_ic').val() == ''){
				window.location.href = '/main';
			}
			else{
				window.location.href = '/main?ic=' + $( "#search_ic" ).val();
			}
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
    	alertify.error("{{Session::get('delete_message')}}");
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