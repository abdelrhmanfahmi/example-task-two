<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\AttributeRepository;
use App\Http\Resources\AttributeResource;
use App\Http\Requests\StoreAttributeRequest;
use App\Http\Requests\UpdateAttributeRequest;

class AttributeController extends Controller
{
    public function __construct(private AttributeRepository $attributeRepository)
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        $attributes = $this->attributeRepository->get(false , true , [] , [], 10);
        return AttributeResource::collection($attributes);
    }

    public function store(StoreAttributeRequest $request)
    {
        $data = $request->validated();
        $this->attributeRepository->store($data);
        return response()->json(['message' => 'Attribute Stored Successfully']);
    }

    public function show($id)
    {
        return AttributeResource::make($this->attributeRepository->find($id));
    }

    public function update(UpdateAttributeRequest $request , $id)
    {
        $data = $request->validated();
        $this->attributeRepository->update($data,$id);
        return response()->json(['message' => 'Attribute Updated Successfully']);
    }

    public function destroy($id)
    {
        $this->attributeRepository->destroy($id);
        return response()->json(['message' => 'Attribute Deleted Successfully']);
    }
}
