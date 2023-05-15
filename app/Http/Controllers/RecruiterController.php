<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\storeRecruiter;
use App\Http\Resources\RecruiterResource;
use App\Models\Recruiter;

class RecruiterController extends Controller
{
     /**
     * @OA\get(
     *     path="/api/recruiter",
     *    operationId="index_recruiter",
*      tags={"Recruiter"},
*      summary="list of all recruiter",
*      description="this API List All Information About Recruiters",
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
        return RecruiterResource::collection(

            Recruiter::where('recruiter_id',Auth::user()->id)->get()
        );
    }

      /**
     * @OA\Post(
     *     path="/api/recruiter/store",
     *    operationId="store_recruiter",
*      tags={"Recruiter"},
*      summary="store_recruiter info",
*      description="this API store information of recruiters",
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

     public function createRecruiter(storeRecruiter $request)
     {
         $request->validated($request->all());
       
         $recruiter=Recruiter::create([
             'company_name'=>Auth::User()->name,
             'recruiter_id'=>Auth::User()->id,
             'company_email'=>Auth::User()->email,
             'contact'=>$request->contact,
             'address'=>$request->address,
             'about'=>$request->about,
             'profile'=>$request->profile
         ]);
 
         return response()->json($recruiter);
     }

    /**
    * @OA\Put(
    *      path="/api/recruiter/update",
    *      operationId="update_id",
    *      tags={"Recruiter"},
    *      summary="update recruiter info",
    *      description="this API update user information",
    *   
    *     
    *      @OA\Response(
    *          response=200,
    *          description="the data",
    *       ),
    *     )
    */
    public function updateRecruiter(Request $request, Recruiter $recruiter)
    {
       $recruiter->update($request->all());
       return new RecruiterResource($recruiter);
    }
/**
* @OA\Delete(
*      path="/api/recruiter/delete",
*      operationId="recruiter_delete_id",
*      tags={"Recruiter"},
*      summary="this API delete recruiter info",
*      description="this API Delete Recruiter Information From Database",
*    
*      @OA\Response(
*          response=200,
*          description="the data",
*       ),
*     )
*/

public function destroyRecruiter(Recruiter $recruiter)
{
    return $this->isNotauthorized($recruiter) ? $this->isNotauthorized($recruiter) : $recruiter->delete();

}

public function isNotauthorized($recruiter){

    if(Auth::user()->id !==$recruiter->recruiter_id){
        return $this->error('','you are not authorized to make this request',403);
        
    }

}
}
