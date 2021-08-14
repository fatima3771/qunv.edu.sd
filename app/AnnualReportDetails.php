<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class AnnualReportDetails extends Model
{
    protected $table = 'annual_report_details';

    public function getPDF(){
        /*  Filename example: 2015_aboutBank.pdf */
        $filename = \Lang::get('site.getContent',['ar'=>$this->pdf,'en'=>$this->pdfEn]);
        // $pdf_file = request()->root().'/public/includes/annualReports/'.$this->report->year.'_'.app()->getLocale().'_'.$this->pdf;
        $pdf_file = request()->root().'/public/includes/annualReports/'.$filename;
        $pdf_file_for_check = public_path().'/includes/annualReports/'.$filename;
        if($filename != null && file_exists($pdf_file_for_check)){
            return $pdf_file;
        }else{
            return false;
        }
        // return request()->root().'/public/includes/annualReports/'.$this->report->year.$extension.'/'.$this->pdf;
    }

    public function getPDFSize(){
        /*  Filename example: 2015_aboutBank.pdf */
        $pdf_file_for_check = public_path().'/includes/annualReports/'.$this->pdf;
        if(file_exists($pdf_file_for_check)){
            return filesize($pdf_file_for_check);
        }else{
            return false;
        }
        // return request()->root().'/public/includes/annualReports/'.$this->report->year.$extension.'/'.$this->pdf;
    }

    

    public function report(){
        return $this->belongsTo('App\AnnualReport','annual_report_id');
    }
}