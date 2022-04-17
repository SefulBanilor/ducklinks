<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\jobs;
use App\Models\users;
use App\Models\user_details;
//use App\Models\users;
use App\Models\Applications;
use App\Http\Controllers\Auth;
use JWTAuth;


class MatchController extends Controller
{
    public function getJobs(){
        $job_array = jobs::all();
        $user = JWTAuth::user();
        $id_user = $user->id_user;
        $user_detail = user_details::find($id_user);
        $skill_array = explode(',',$user_detail->skills);
        $skill_array= array_map('trim', $skill_array);
        $job_list = array();
    //requested_skills
        foreach ($job_array as $job){
            $flag = 0;
            $job_skills_array=explode(',',$job->requested_skills);
            $job_skills_array= array_map('trim', $job_skills_array);
            $application = applications::where('id_user', $id_user)->where('id_job',$job->id_job)->first();
            if(isset($application)) {
                        $flag = 1;
            }
            if( !array_diff($job_skills_array, $skill_array) && !$flag){
                $job_list += array($job->id_job => 0.5);
            }
        }

        foreach ($job_list as $key=>$value){
            $match = 0;
            $job2 = jobs::find($key);
            $optional_job_skills_array=explode(',',$job2->optional_skills);
            $optional_job_skills_array= array_map('trim', $optional_job_skills_array);
            $count_optionals = count($optional_job_skills_array);
            foreach ($skill_array as $skill){
                if(in_array($skill, $optional_job_skills_array)) {
                    $match += 1;
                }
            }
            $job_list[$key]+=0.5*$match/$count_optionals;
        }
        return $job_list;
//        dd($user);
    }

}
