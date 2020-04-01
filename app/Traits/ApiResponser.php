<?php
namespace App\Traits;
use Illuminate\Pagination\LengthAwarePaginator;
Use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Validator;

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

        $collection = $this->SortData($collection,$transformer);
        $collection = $this->filterData($collection, $transformer);
        $collection = $this->paginate($collection);
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
    
    protected function filterData(Collection $collection ,$transformer){
        foreach (request()->query() as $query => $value){
            $attribute = $transformer ::originalAttribute($query);

            if (isset($attribute,$value)){
                $collection = $collection->where($attribute,$value);
            }
        }
        return $collection;
    }
    
    protected function SortData(Collection $collection,$transformer){
        if (request()->has('sort_by')){
            $attribute = $transformer::originalAttribute(request()->sort_by);
            $collection = $collection->sortBy->{$attribute};
        }
        return $collection;
    }

    protected function paginate(Collection $collection){

        $page = LengthAwarePaginator::resolveCurrentPage();
        $perpage = 15;

        $result = $collection->slice(($page- 1)*$perpage,$perpage)->values();

        $paginated = new LengthAwarePaginator($result,$collection->count(),$perpage,$page,[
            'path' => LengthAwarePaginator::resolveCurrentPath(),
        ]);
        $paginated->appends(request()->all());
        return $paginated;
    }
}
