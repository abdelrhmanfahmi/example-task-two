<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\OperatorRepository;
use App\Http\Resources\OperatorResource;
use App\Http\Requests\StoreOperatorRequest;
use App\Http\Requests\UpdateOperatorRequest;

class OperatorController extends Controller
{
    public function __construct(private OperatorRepository $operatorRepository)
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        $users = $this->operatorRepository->get(false , true , [] , [], 10);
        return OperatorResource::collection($users);
    }

    public function store(StoreOperatorRequest $request)
    {
        $data = $request->validated();
        $operator = $this->operatorRepository->store($data);
        $operator->assignRole('operator');
        return response()->json(['message' => 'Operator Stored Successfully']);
    }

    public function show($id)
    {
        return OperatorResource::make($this->operatorRepository->find($id));
    }

    public function update(UpdateOperatorRequest $request , $id)
    {
        $data = $request->validated();
        $this->operatorRepository->update($data,$id);
        return response()->json(['message' => 'Operator Updated Successfully']);
    }

    public function destroy($id)
    {
        $this->operatorRepository->destroy($id);
        return response()->json(['message' => 'Operator Deleted Successfully']);
    }
}
