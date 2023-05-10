<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreEntityUserRequest;
use App\Repositories\EntityUserRepository;
use App\Http\Resources\FetchValuesResource;

class EntityUserController extends Controller
{
    public function __construct(private EntityUserRepository $entityUserRepository)
    {
        $this->middleware('auth:api');
    }

    public function storeValues(StoreEntityUserRequest $request)
    {
        $data = $request->validated();
        $data['values'] = json_encode($data['values']);
        $this->entityUserRepository->store($data);
        return response()->json(['message' => 'Record Created Successfully']);
    }

    public function fetchAllValuesForEntity()
    {
        return FetchValuesResource::collection($this->entityUserRepository->get(false , true , ['user' , 'entity']));
    }

    public function fetchSpecificValuesForEntity($entityId)
    {
        return FetchValuesResource::collection($this->entityUserRepository->get(['entity_id' => $entityId] , true , ['user' , 'entity']));
    }
}
