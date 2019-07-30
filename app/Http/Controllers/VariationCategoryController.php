<?php

namespace App\Http\Controllers;

use App\VariationCategory;
use Illuminate\Http\Request;
use App\Http\Resources\VariationCategory as VariationCategoryResource;

class VariationCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api')->except('index', 'show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $variation_categories = VariationCategory::with(['variations:id,name,variation_category_id'])->get();
        return VariationCategoryResource::collection($variation_categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\VariationCategory  $variationCategory
     * @return \Illuminate\Http\Response
     */
    public function show(VariationCategory $variationCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\VariationCategory  $variationCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $variation_category = VariationCategory::findOrFail($id);

        $variation_category->variations()->delete();
        $variation_category->delete();

        $response['success'] = true;
        $response['msg'] = "Variation category " . $variation_category->name . " deleted!";

        return $response;
    }
}
