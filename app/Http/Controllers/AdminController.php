<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Participant;
use Illuminate\Support\Facades\Input;

class AdminController extends Controller
{
	public function index(){

		$participants = Participant::select('*');

		### Search ###
		$queries = [];
		$filter = 0;

		//If request has status @ filter
        if(request()->has('ic')){
        	$search_ic = $participants->where('nric_passport', request('ic'));
        	$queries['ic'] = request('ic');
        	$filter = 1;
        }

        //If no filter, run default query. Else append filter
        if($filter == 0){
        	$participants = $participants->paginate(5);
        }
        else{
        	$participants = $participants->paginate(5)->appends($queries);
        }

		return view('admin.main', compact('participants'));
	}

    public function uploadExcel(){
    	
        return view('admin.manageexcel');
    }

    public function uploadExcelParticipant(Request $request){
    	//print_r($request['attachment']); exit();
    	if(!empty($request['attachment'])){
    		$csv_array = array();
	        $path = public_path() . '/import/';
	        $extension = strtolower(Input::file('attachment')->getClientOriginalExtension()); // getting csv extension
	        $filename = Input::file('attachment')->getClientOriginalName(); //get name of the file
	        $filename = preg_replace("/[*@\/\(\)&%#\$]/", "", trim(str_replace(" ", "_", $filename)));
	        $csvFilename = str_replace("." . $extension, "", $filename) . '_' . time() . '.' . $extension; // renaming csv
	        Input::file('attachment')->move($path, $csvFilename);
	        chmod($path, 0777);
	        chmod($path . $csvFilename, 0777);
	        $newPath = $path . "/" . $csvFilename;
	        
	        $row = 1;
			$str_length_error = 0;
			$format_error = 0;
		        
	        if($extension != 'csv'){
	            return redirect()->back()->with('delete_message', 'Uploaded file is not an excel format!');
	        }

	        if (($handle = fopen($path . $csvFilename, "r")) !== FALSE) {
	            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {

	                $num = count($data);

	                $row++;

	                if($row>2){
	                	
				    	$input = array(
		                    'reg_code' => $data[1],
		                    'main_category' => $data[2],
		                    'competition_name' => $data[3],
		                    'first_name' => $data[4],
		                    'name_on_bib' => $data[5],
		                    'address1' => $data[6],
		                    'address2' => $data[7],
		                    'postcode' => $data[8],
		                    'city' => $data[9],
		                    'state' => $data[10],
		                    'country_name' => $data[11],
		                    'nationality_name' => $data[12],
		                    'email' => $data[13],
		                    'mobile_no' => $data[14],
		                    'nric_passport' => $data[15],
		                    'date_of_birth' => $data[16],
		                    'age_as_event_year' => $data[17],
		                    'apparel_size' => $data[18],
		                    'shirt_color' => $data[19],
		                    'emergency_name' => $data[20],
		                    'emergency_contact' => $data[21],
		                    'emergency_relation' => $data[22],
		                    'blood_type' => $data[23],
		                    'gender' => $data[24]
		                );

		                Participant::create($input);
				    }  
	            }

	            fclose($handle);

	            #Delete uploaded file 
	            unlink($path . $csvFilename);

	            return redirect()->back()->with('create_message', 'Uploaded successful!');
	    	}
        	
        }
        else{
    		return redirect()->back()->with('error_message', 'No file chosen, please upload file!');
    	}
    }

    public function updateCollection(Request $request){
    	foreach($request->p_id as $p_id){
    		$participant = Participant::where('id', $p_id)->first();

    		$participant->collection_status = 1;
    		$participant->collection_name = $request->c_name[$p_id];
    		$participant->collection_ic = $request->c_ic[$p_id];
    		$participant->collection_no = $request->c_no[$p_id];

    		$participant->save();

    		// $updateCollection = array(
	     //        'collection_status' => 1,
	     //        'collection_name' => $request->c_name[$p_id],
	     //        'collection_ic' => $request->c_ic[$p_id],
	     //        'collection_no' => $request->c_no[$p_id]
	     //    );

	     //    $participant = Participant::update($updateCollection, $p_id);
    	}

    	return redirect()->back()->with('create_message', 'Collection updated!');
    }
}
