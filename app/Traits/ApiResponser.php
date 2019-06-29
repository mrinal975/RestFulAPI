<?php
namespace App\Traits;
Use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
trait ApiResponser
{
    private function successResponse($data, $code){
        return response()->json($data,$code);
    }
    protected function errorResponse($message, $code){
        return response()->json(['error'=>$message, 'code'=>$code]);
    }
    protected function showAll(Collection $collection, $code = 200){
        if ($collection->isEmpty()){
            return $this->successResponse($collection,$code);
        }
        $transformer = $collection->first()->transformer;
        $collection = $this->TransformData($collection, $transformer);
        return $this->successResponse($collection,$code);
    }
    protected function showOne(Model $instance, $code=200){
        $transformer = $instance->transformer;
        $transformer =$this->TransformData($instance,$transformer);
        return $this->successResponse($transformer,$code);
    }
    protected function showMessage($message, $code=200){
        return response()->json(['data'=>$message], $code);
    }
    protected function TransformData($data, $transformer){
        return fractal($data, new $transformer())->toArray();
    }
}
