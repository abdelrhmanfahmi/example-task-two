<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\AttributeEntityRepository;
use App\Http\Requests\AssignAttributeEntityRequest;

class AssignAttributeController extends Controller
{
    public function __construct(private AttributeEntityRepository $attributeEntityRepository)
    {
        $this->middleware('auth:api');
    }

    public function assignAttributeToEntity(AssignAttributeEntityRequest $request)
    {
        $data = $request->validated();
        $isAssigned = $this->attributeEntityRepository->assignAttributes($data);
        if($isAssigned == false){
            return response()->json(['message' => 'Already This Attribute Assigned before to this Entity'] , 403);
        }
        $this->attributeEntityRepository->store($data);
        return response()->json(['message' => 'Assign Process Done Successfully']);

    }
}
