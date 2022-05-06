<?php

namespace App\Http\Controllers\Api\v2;

use App\Http\Controllers\Controller;
use App\Http\Requests\DeskStoreRequest;
use App\Http\Resources\DeskResource;
use App\Models\Desk;
use http\Client\Response;

class DeskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return DeskResource::collection(Desk::limit(1)->get());

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return DeskResource
     */
    public function store(DeskStoreRequest $request)
    {

        $created_desk = Desk::create($request->validated());

        return new DeskResource($created_desk);


    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return DeskResource
     */
    public function show(Desk $desk)
    {

        return new DeskResource($desk);

        //        return  Desk::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return Desk
     */
    public function update(DeskStoreRequest $request, Desk $desk)
    {
        $desk->update($request->validated());

        return $desk;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Desk $desk)
    {
        $desk->delete();

        return  response(null, status: Response::$HTTP_NO_CONTENT);
    }
}
