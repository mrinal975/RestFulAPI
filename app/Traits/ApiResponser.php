<?php
namespace App\Traits;
Use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
trait ApiResponser
{
    private function successResponse($data,$code){
        return response()->json($data,$code);
    }
    protected function errorResponse($message,$code){
        return response()->json(['error'=>$message,'code'=>$code]);
    }
    protected function showAll(Collection $Collection,$code=200){
        return response()->json(['data'=>$Collection],$code);
    }
    protected function showOne(Model $model,$code=200){
        return response()->json(['data'=>$model],$code);
    }
}
