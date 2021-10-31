<?php

namespace App\Http\Controllers;

use App\Models\Nationality;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __construct(Nationality $nationality)
    {
        $this->nationality = $nationality;
    }
    public function getNationalityTypeahead(Request $request)
    {
        $input = $request->all();
        $data = $this->nationality->select("title")
            ->where("title", "LIKE", "%{$input['query']}%")
            ->pluck('title');
        return response()->json($data);
    }
}
