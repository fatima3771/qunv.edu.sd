<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReportDetails extends Model
{
    protected $table = 'report_details';

    public function getPDF(){
        return '/public/includes/Reports/'.$this->report->year.'/'.$this->pdf;
    }

    public function report(){
        return $this->belongsTo('App\Report','annual_report_id');
    }
}