<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MTCPanelDropzoneController extends Controller
{
    public function upload(Request $request)
    {
        $folder =  $request->get('folder').'/';
        $temp_file =  $request->file;
        $file_name = pathinfo($request->file->getClientOriginalName(), PATHINFO_FILENAME);
        $file_ext = $request->file->getClientOriginalExtension();
        $file_size = $request->file->getSize();
        
        $file = str_slug($file_name).'.'.$file_ext;

		$validation = $this->validate($request,[
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

		// if ($service->pictures->count() >= $service->picturesLimit)
		// {
        //     $errorMsg = 'عفوا، عدد الصور المرفوعة للخدمة تجاوز الحد المسموح به وهو '.$service->picturesLimit.' صور';
		// 	return response()->json($errorMsg, 400);
		// }

        // function seoUrl($string) {
        //     //Lower case everything
        //     $string = strtolower($string);
        //     //Make alphanumeric (removes all other characters)
        //     $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
        //     //Clean up multiple dashes or whitespaces
        //     $string = preg_replace("/[\s-]+/", " ", $string);
        //     //Convert whitespaces and underscore to dash
        //     $string = preg_replace("/[\s_]/", "-", $string);
        //     return $string;
        // }

        // $attachmentName = $service->user->id.'_'.date('Ymd_His').'_'.rand(111,999).'.'.$request->file->getClientOriginalExtension();
        // if (!file_exists($folder)) {
        //     mkdir($folder, 0755, true);
        //  }

        $upload_success = $request->file->move($folder, $file);

        $success_message = array( 
                            'success' => 200,
                            'filename' => $file,
                        );

        if( $upload_success ) {
        	return json_encode($success_message);
        } else {
        	return response()->json('error', 400);
        }
    }
}
