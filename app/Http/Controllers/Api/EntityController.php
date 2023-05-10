<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\EntityRepository;
use App\Http\Resources\EntityResource;
use App\Http\Requests\StoreEntityRequest;
use App\Http\Requests\UpdateEntityRequest;

class EntityController extends Controller
{
    public function __construct(private EntityRepository $entityRepository)
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        $entities = $this->entityRepository->get(false , true , [] , [], 10);
        return EntityResource::collection($entities);
    }

    public function store(StoreEntityRequest $request)
    {
        $data = $request->validated();
        $this->entityRepository->store($data);
        return response()->json(['message' => 'Entity Stored Successfully']);
    }

    public function show($id)
    {
        return EntityResource::make($this->entityRepository->find($id));
    }

    public function update(UpdateEntityRequest $request , $id)
    {
        $data = $request->validated();
        $this->entityRepository->update($data,$id);
        return response()->json(['message' => 'Entity Updated Successfully']);
    }

    public function destroy($id)
    {
        $this->entityRepository->destroy($id);
        return response()->json(['message' => 'Entity Deleted Successfully']);
    }
}
