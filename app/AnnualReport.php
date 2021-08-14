<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnnualReport extends Model
{
    protected $table = 'annual_report';

    public function getImage(){
        return request()->root().'/public/includes/annualReports/'.app()->getLocale().'/covers/'.$this->picture;
    }

    public function getPDF(){
        $pdf_file = request()->root().'/public/includes/annualReports/'.app()->getLocale().'/FIB_annual_report_'.$this->year.'.pdf';
        $pdf_file_for_check = public_path().'/includes/annualReports/'.app()->getLocale().'/FIB_annual_report_'.$this->year.'.pdf';
        // dd($pdf_file_for_check);
        if(file_exists($pdf_file_for_check)){
            return $pdf_file;
        }else{
            return false;
        }
    }

    public function getPDFSize(){
        $pdf_file_for_check = public_path().'/includes/annualReports/'.app()->getLocale().'/FIB_annual_report_'.$this->year.'.pdf';
        // dd($pdf_file_for_check);
        if(file_exists($pdf_file_for_check)){
            return filesize($pdf_file_for_check);
        }else{
            return false;
        }
    }

    public function getLink(){
        return route('annualReport', [app()->getLocale(), $this->year]);
        // return request()->root().'/annualReport/'.$this->year;
    }

    public function details(){
        return $this->hasMany('App\AnnualReportDetails');
    }
}