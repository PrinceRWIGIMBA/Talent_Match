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
     * @OA\get(
     *     path="/api/message",
     *    operationId="index_message",
*      tags={"message"},
*      summary="list of all message",
*      description="this API List All Information About messages",
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
    use HttpResponses;
    public function getAll()
    {
        return messageResource::collection(

            message::where('message_id',Auth::user()->id)->get()
        );
    }

      /**
     * @OA\Post(
     *     path="/api/message/store",
     *    operationId="store_message",
*      tags={"message"},
*      summary="store_message info",
*      description="this API store information of messages",
* @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent()
    *      ),
     *     @OA\Response(
     *         response="200",
     *         description="The data"
     *     )
     * )
     */

     public function createmessage(storemessage $request)
     {
         $request->validated($request->all());
       
         $message=message::create([
             'company_name'=>Auth::User()->name,
             'message_id'=>Auth::User()->id,
             'company_email'=>Auth::User()->email,
             'contact'=>$request->contact,
             'address'=>$request->address,
             'about'=>$request->about,
             'profile'=>$request->profile
         ]);
 
         return response()->json($message);
     }

    /**
    * @OA\Put(
    *      path="/api/message/update",
    *      operationId="update_id1",
    *      tags={"message"},
    *      summary="update message info",
    *      description="this API update user information",
    *   
    *     
    *      @OA\Response(
    *          response=200,
    *          description="the data",
    *       ),
    *     )
    */
    public function updatemessage(Request $request, message $message)
    {
       $message->update($request->all());
       return new messageResource($message);
    }
/**
* @OA\Delete(
*      path="/api/message/delete",
*      operationId="message_delete_id",
*      tags={"message"},
*      summary="this API delete message info",
*      description="this API Delete message Information From Database",
*    
*      @OA\Response(
*          response=200,
*          description="the data",
*       ),
*     )
*/

public function destroymessage(message $message)
{
    return $this->isNotauthorized($message) ? $this->isNotauthorized($message) : $message->delete();

}

public function isNotauthorized($message){

    if(Auth::user()->id !==$message->message_id){
        return $this->error('','you are not authorized to make this request',403);
        
    }

}
}

