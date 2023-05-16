<?php

namespace App\Http\Controllers;

use App\Models\message;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use App\Http\Requests\StoreMessage;
use App\Http\Resources\MessageResource;

class MessageController extends Controller
{
    /**
* @OA\Get(
*      path="/api/message",
*      operationId="get_all_users",
*      tags={"message API"},
*      summary="GET ALL USER",
*      description="GETING ALL THE USERS FROM DATABASE",
*      @OA\Response(
*          response=200,
*          description="the data",
*       ),
*     )
*/
use HttpResponses;
/**
 * Display a listing of the resource.
 */
public function getAll()
{
    return MessageResource::collection(

        message::all()
    );
}
/**
 * Show the form for creating a new resource.
 */
public function create()
{
    //
}
 /**
 * @OA\Post(
 *     path="/api/message/store",
 *    operationId="message_store",
*      tags={"message API"},
*      summary="store message",
*      description="this api is used to store the information of message",
    *@OA\RequestBody(
*          required=true,
*          @OA\JsonContent()
*      ),
 *     @OA\Response(
 *         response="200",
 *         description="The data"
 *     )
 * )
 */
/**
 * Store a newly created resource in storage.
 */
public function store(StoreMessage $request)
{
    $request->validated($request->all());
  
    $message=message::create([
        'full_name'=>$request->full_name,
        'email'=>$request->email,
        'message'=>$request->message
    ]);

    return response()->json($message);
}

/**
 * Display the specified resource.
 */
public function show(Message $message)
{
  
    return $this->isNotauthorized($message) ? $this->isNotauthorized($message) : new MessageResource($message);
}

/**
 * Show the form for editing the specified resource.
 */
public function edit(string $id)
{
    //
}
/**
* @OA\Put(
*      path="/api/message/update",
*      operationId="message-update",
*      tags={"message API"},
*      description="this api if for updating message",
*      @OA\Parameter(
*          description="Parameter with example",
*          in="path",
*          name="id",
*          required=true,
*          @OA\Schema(type="int"),
*          @OA\Examples(example="int", value="1", summary="an int value"),
*      ),
*      @OA\RequestBody(
*          required=Parameter with example,
*          @OA\JsonContent(ref="#/components/schemas/path")
*      ),
*      @OA\Response(
*          response=int,
*          description="1",
*       ),
*     )
*/    /**
 * Update the specified resource in storage.
 */

public function update(Request $request, Message $message)
{
   $message->update($request->all());
   return new MessageResource($message);
}
/**
* @OA\Delete(
*      path="/api/message/delete",
*      operationId="message_delete",
*      tags={"message API"},
*      summary="this is used to delete particural user",
*      description="this api will be used to delete message form database ",
*      @OA\Parameter(
*          description="Parameter with example",
*          in="path",
*          name="id",
*          required=true,
*          @OA\Schema(type="int"),
*          @OA\Examples(example="int", value="1", summary="an int value"),
*      ),
*      @OA\Response(
*          response=Response Code,
*          description="Response Message",
*       ),
*     )
*/
/**
 * Remove the specified resource from storage.
 */
public function destroy(Message $message)
{
    return $message->delete();

}

public function isNotauthorized($message){

    if(Auth::user()->id !==$message->message_id){
        return $this->error('','you are not authorized to make this request',403);
        
    }

}
}
