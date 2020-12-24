<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class CountryController extends Controller
{
public function country(){
  return response()->json(Country::get(),200);
}

public function countrybyid($id){
  $country= Country::find($id);
  if (is_null($country)) {
    return response()->json(["message" => "Record Not Found!"], 404);
  }
  return response()->json($country, 200);
}

public function countrysave(Request $request){
$rules = [
  'name' => 'required|min:3|max:8|unique:_z_country',
  'iso' => 'required|min:3|max:6|unique:_z_country',
  'dname' => 'required|min:3|max:|unique:_z_country6',
  'iso3' => 'required|min:3|max:|unique:_z_country6',
  'position' => 'required|min:3|max:10|unique:_z_country',
  'numcode' => 'required|min:3|max:10|unique:_z_country',
  'phonecode' => 'required|min:3|max:10|unique:_z_country',
  'created' => 'required|min:3|max:10|unique:_z_country',
  'register_by' => 'required|min:3|max:10|unique:_z_country',
  'modified' => 'required|min:3|max:10|unique:_z_country',
  'modified_by'  => 'required|min:3|max:10|unique:_z_country',
];
$validator = Validator::make($request->all(),$rules);
if ($validator->fails()) {

  return response()->json($validator->errors(),400);
}
  $country = Country::create($request->all());
  return response()->json($country,201);

}

public function countryupdate(Request $request, $id){
  $country= Country::find($id);
    if (is_null($country)) {
    return response()->json(["message" => "Record Not Found!"], 404);
       }
     $country->update($request->all());
     return response()->json($country, 200);
}

public function countrydelete(Request $request, $id){
  $country= Country::find($id);
    if (is_null($country)) {
    return response()->json(["message" => "Record Not Found!"], 404);
       }
  $country->delete();
  return response()->json(null, 204);
}
}
