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
	                            <td>
	                            	<a href="" class="btn btn-success btn-sm editBtn"
	                            	 data-toggle="modal" data-target="#editModal" 
	                            	 data-reg_code="{{ $participant->reg_code }}" 
	                            	 data-main_category="{{ $participant->main_category }}" 
	                            	 data-competition_name="{{ $participant->competition_name }}" 
	                            	 data-first_name="{{ $participant->first_name }}" 
	                            	 data-name_on_bib="{{ $participant->name_on_bib }}" 
	                            	 data-address1="{{ $participant->address1 }}" 
	                            	 data-address2="{{ $participant->address2 }}" 
	                            	 data-postcode="{{ $participant->postcode }}" 
	                            	 data-city="{{ $participant->city }}" 
	                            	 data-state="{{ $participant->state }}" 
	                            	 data-country_name="{{ $participant->country_name }}" 
	                            	 data-nationality_name="{{ $participant->nationality_name }}" 
	                            	 data-email="{{ $participant->email }}" 
	                            	 data-mobile_no="{{ $participant->mobile_no }}" 
	                            	 data-nric_passport="{{ $participant->nric_passport }}" 
	                            	 data-date_of_birth="{{ $participant->date_of_birth }}" 
	                            	 data-age_as_event_year="{{ $participant->age_as_event_year }}" 
	                            	 data-apparel_size="{{ $participant->apparel_size }}" 
	                            	 data-shirt_color="{{ $participant->shirt_color }}" 
	                            	 data-emergency_name="{{ $participant->emergency_name }}" 
	                            	 data-emergency_contact="{{ $participant->emergency_contact }}" 
	                            	 data-emergency_relation="{{ $participant->emergency_relation }}" 
	                            	 data-blood_type="{{ $participant->blood_type }}" 
	                            	 data-gender="{{ $participant->gender }}" 
	                            	 data-collection_status="{{ $participant->collection_status }}" 
	                            	 data-collection_name="{{ $participant->collection_name }}" 
	                            	 data-collection_ic="{{ $participant->collection_ic }}" 
	                            	 data-collection_no="{{ $participant->collection_no }}" 
	                            	>View</a>
	                            </td>
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
        <h4 class="modal-title">Participant Info</h4>
      </div>
      <div class="modal-body">
      	<div class="row">
      		<div class="form-group col-md-12">
	            <label for="inputPassword1" class="col-md-4 control-label">Registration Code</label>
	            <div class="col-md-8">
	                    <input type="text" name="model" class="form-control input-line" id="m_reg_code" readonly>
	            </div>
	        </div>
	        <div class="form-group col-md-12">
	            <label for="inputPassword1" class="col-md-4 control-label">Main Category</label>
	            <div class="col-md-8">
	                    <input type="text" name="plate" class="form-control input-line" id="m_main_category" readonly>
	            </div>
	        </div>
	        <div class="form-group col-md-12">
	            <label for="inputPassword1" class="col-md-4 control-label">Competition Name</label>
	            <div class="col-md-8">
	                    <input type="text" name="type" class="form-control input-line" id="m_competition_name" readonly>
	            </div>
	        </div>
	        <div class="form-group col-md-12">
	            <label for="inputPassword1" class="col-md-4 control-label">First Name</label>
	            <div class="col-md-8">
	                    <input type="text" name="model" class="form-control input-line" id="m_first_name" readonly>
	            </div>
	        </div>
	        <div class="form-group col-md-12">
	            <label for="inputPassword1" class="col-md-4 control-label">Name on BIB</label>
	            <div class="col-md-8">
	                    <input type="text" name="plate" class="form-control input-line" id="m_name_on_bib" readonly>
	            </div>
	        </div>
	        <div class="form-group col-md-12">
	            <label for="inputPassword1" class="col-md-4 control-label">Address 1</label>
	            <div class="col-md-8">
	                    <input type="text" name="type" class="form-control input-line" id="m_address1" readonly>
	            </div>
	        </div>
	        <div class="form-group col-md-12">
	            <label for="inputPassword1" class="col-md-4 control-label">Address 2</label>
	            <div class="col-md-8">
	                    <input type="text" name="model" class="form-control input-line" id="m_address2" readonly>
	            </div>
	        </div>
	        <div class="form-group col-md-12">
	            <label for="inputPassword1" class="col-md-4 control-label">Postcode</label>
	            <div class="col-md-8">
	                    <input type="text" name="plate" class="form-control input-line" id="m_postcode" readonly>
	            </div>
	        </div>
	        <div class="form-group col-md-12">
	            <label for="inputPassword1" class="col-md-4 control-label">City</label>
	            <div class="col-md-8">
	                    <input type="text" name="type" class="form-control input-line" id="m_city" readonly>
	            </div>
	        </div>
	        <div class="form-group col-md-12">
	            <label for="inputPassword1" class="col-md-4 control-label">State</label>
	            <div class="col-md-8">
	                    <input type="text" name="model" class="form-control input-line" id="m_state" readonly>
	            </div>
	        </div>
	        <div class="form-group col-md-12">
	            <label for="inputPassword1" class="col-md-4 control-label">Country</label>
	            <div class="col-md-8">
	                    <input type="text" name="plate" class="form-control input-line" id="m_country_name" readonly>
	            </div>
	        </div>
	        <div class="form-group col-md-12">
	            <label for="inputPassword1" class="col-md-4 control-label">Nationality</label>
	            <div class="col-md-8">
	                    <input type="text" name="type" class="form-control input-line" id="m_nationality_name" readonly>
	            </div>
	        </div>
	        <div class="form-group col-md-12">
	            <label for="inputPassword1" class="col-md-4 control-label">Email</label>
	            <div class="col-md-8">
	                    <input type="text" name="model" class="form-control input-line" id="m_email" readonly>
	            </div>
	        </div>
	        <div class="form-group col-md-12">
	            <label for="inputPassword1" class="col-md-4 control-label">Mobile No.</label>
	            <div class="col-md-8">
	                    <input type="text" name="plate" class="form-control input-line" id="m_mobile_no" readonly>
	            </div>
	        </div>
	        <div class="form-group col-md-12">
	            <label for="inputPassword1" class="col-md-4 control-label">NRIC / Passport</label>
	            <div class="col-md-8">
	                    <input type="text" name="type" class="form-control input-line" id="m_nric_passport" readonly>
	            </div>
	        </div>
	        <div class="form-group col-md-12">
	            <label for="inputPassword1" class="col-md-4 control-label">Date of Birth</label>
	            <div class="col-md-8">
	                    <input type="text" name="model" class="form-control input-line" id="m_date_of_birth" readonly>
	            </div>
	        </div>
	        <div class="form-group col-md-12">
	            <label for="inputPassword1" class="col-md-4 control-label">Age as Event Year</label>
	            <div class="col-md-8">
	                    <input type="text" name="plate" class="form-control input-line" id="m_age_as_event_year" readonly>
	            </div>
	        </div>
	        <div class="form-group col-md-12">
	            <label for="inputPassword1" class="col-md-4 control-label">Apparel Size</label>
	            <div class="col-md-8">
	                    <input type="text" name="type" class="form-control input-line" id="m_apparel_size" readonly>
	            </div>
	        </div>
	        <div class="form-group col-md-12">
	            <label for="inputPassword1" class="col-md-4 control-label">Shirt Color</label>
	            <div class="col-md-8">
	                    <input type="text" name="model" class="form-control input-line" id="m_shirt_color" readonly>
	            </div>
	        </div>
	        <div class="form-group col-md-12">
	            <label for="inputPassword1" class="col-md-4 control-label">Emergency Name</label>
	            <div class="col-md-8">
	                    <input type="text" name="plate" class="form-control input-line" id="m_emergency_name" readonly>
	            </div>
	        </div>
	        <div class="form-group col-md-12">
	            <label for="inputPassword1" class="col-md-4 control-label">Emergency Contact</label>
	            <div class="col-md-8">
	                    <input type="text" name="type" class="form-control input-line" id="m_emergency_contact" readonly>
	            </div>
	        </div>
	        <div class="form-group col-md-12">
	            <label for="inputPassword1" class="col-md-4 control-label">Emergency Relation</label>
	            <div class="col-md-8">
	                    <input type="text" name="model" class="form-control input-line" id="m_emergency_relation" readonly>
	            </div>
	        </div>
	        <div class="form-group col-md-12">
	            <label for="inputPassword1" class="col-md-4 control-label">Blood Type</label>
	            <div class="col-md-8">
	                    <input type="text" name="plate" class="form-control input-line" id="m_blood_type" readonly>
	            </div>
	        </div>
	        <div class="form-group col-md-12">
	            <label for="inputPassword1" class="col-md-4 control-label">Gender</label>
	            <div class="col-md-8">
	                    <input type="text" name="type" class="form-control input-line" id="m_gender" readonly>
	            </div>
	        </div>
	  	</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!-- End Modal -->

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

       		$("#m_reg_code").val($(this).data('reg_code'));
		 	$("#m_main_category").val($(this).data('main_category'));
		 	$("#m_competition_name").val($(this).data('competition_name'));
		 	$("#m_first_name").val($(this).data('first_name'));
		 	$("#m_name_on_bib").val($(this).data('name_on_bib'));
		 	$("#m_address1").val($(this).data('address1'));
		 	$("#m_address2").val($(this).data('address2'));
		 	$("#m_postcode").val($(this).data('postcode'));
		 	$("#m_city").val($(this).data('city'));
		 	$("#m_state").val($(this).data('state'));
		 	$("#m_country_name").val($(this).data('country_name'));
		 	$("#m_nationality_name").val($(this).data('nationality_name'));
		 	$("#m_email").val($(this).data('email'));
		 	$("#m_mobile_no").val($(this).data('mobile_no'));
		 	$("#m_nric_passport").val($(this).data('nric_passport'));
		 	$("#m_date_of_birth").val($(this).data('date_of_birth'));
		 	$("#m_age_as_event_year").val($(this).data('age_as_event_year'));
		 	$("#m_apparel_size").val($(this).data('apparel_size'));
		 	$("#m_shirt_color").val($(this).data('shirt_color'));
		 	$("#m_emergency_name").val($(this).data('emergency_name'));
		 	$("#m_emergency_contact").val($(this).data('emergency_contact'));
		 	$("#m_emergency_relation").val($(this).data('emergency_relation'));
		 	$("#m_blood_type").val($(this).data('blood_type'));
		 	$("#m_gender").val($(this).data('gender'));

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