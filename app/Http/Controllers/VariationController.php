<?php

namespace App\Http\Controllers;

use App\VariationCategory;
use App\Variation;
use Illuminate\Http\Request;
use App\Http\Resources\VariationCategory as VariationCategoryResource;
use App\Http\Resources\Variation as VariationResource;
use Validator;

class VariationController extends Controller
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
        $variations = VariationCategory::with(['variations:id,name,variation_category_id'])->get();
        return VariationCategoryResource::collection($variations);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'variation_category_id' => !$request->isMethod('put') ? 'required' : 'sometimes'
        ]);
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }

        $variation = $request->isMethod('put') && $request->id ? Variation::findOrFail($request->id) : new Variation;

        $variation->name = $request->name;
        $variation->variation_category_id = $request->variation_category_id ?: $variation->variation_category_id;
        $variation->save();

        return new VariationResource($variation);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Variation  $variation
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $variation = Variation::where('id', $id)->with(['variation_category:id,name'])->first();

        if (!$variation) {
            return response()->json(['error' => 'No variation with id ' . $id], 401);
        }

        return new VariationResource($variation);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Variation  $variation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $variation = Variation::findOrFail($id);

        $variation->delete();

        $response['success'] = true;
        $response['msg'] = "Variation " . $variation->name . " deleted!";

        return $response;
    }
}
