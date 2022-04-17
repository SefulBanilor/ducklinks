<?php

namespace App\Http\Controllers;
use App\Models\company_details;
use Illuminate\Http\Request;

class FeedBackController extends Controller
{
    function post_feedback($id, $rating){
        $company_details = company_details::find($id);
        $company_rating = $company_details->rating;
        $review_number = $company_details->nr_review;
        $new_rating = ($review_number*$company_rating + $rating)/($review_number+1);
        $company_details::where('id_company_details', $id)
            ->update(['rating' => $new_rating, 'nr_review'=>$review_number+1]);
        return 'Rating updated succesfully';
    }

    function get_feedback($id){
        $company_details = company_details::find($id);
        $company_rating = $company_details->rating;
        return $company_rating;
    }
}
