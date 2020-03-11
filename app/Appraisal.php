<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appraisal extends Model
{
    protected $table = 'appraisals';

    protected $fillable = ['employee_id','supervisor_id','section_1','section_2','significat_achievemnet','trait','improve','training','employee_signature','appraisee_comment','supervisor_signature','supervisor_comment','hr_comment','management_decision'
    ];

    public static $rulesSection1 = [
				'rank' => 'required|array|answer_checker:section_1,rank|rank_min_max:section_1,rank',
				'comment' => 'required|array|answer_checker:section_1,comment'
			 ];

	public static $rulesSection2 = [
				'rank' => 'required|array|answer_checker:section_2,rank|rank_min_max:section_2,rank',
				'comment' => 'required|array|answer_checker:section_2,comment',
				'significant_achievement' => 'required|min:5'
			 ];

	public static $rulesSection3 = [
				'trait' => 'required|min:5',
				'improve' => 'required|min:5',
				'training' => 'required|min:5'
			 ];

	public static $rulesSection4 = [
				'rank' => 'required|array|answer_checker:section_4,rank|rank_min_max:section_4,rank',
				'comment' => 'required|array|answer_checker:section_4,comment'
			 ];

	public function user(){
		return $this->belongsTo('App\User', 'appraisee_id');
	}

	public function user_sup(){
		return $this->belongsTo('App\User', 'supervisor_id');
	}

}
