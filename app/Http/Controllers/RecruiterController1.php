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
* @OA\Get(
*      path="/api/recruiter/index",
*      operationId="get_all_users",
*      tags={"get_all_recruiter"},
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
    public function index()
    {
        return RecruiterResource::collection(

            Recruiter::where('recruiter_id',Auth::user()->id)->get()
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
     *     path="/api/recruiter/store",
     *    operationId="recruiter_store",
*      tags={"Recruiter API"},
*      summary="store recruiter",
*      description="this api is used to store the information of recruiter",
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
    public function store(storeRecruiter $request)
    {
        $request->validated($request->all());
      
        $recruiter=Recruiter::create([
            'company_name'=>$request->company_name,
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
     * Display the specified resource.
     */
    public function show(Recruiter $recruiter)
    {
      
        return $this->isNotauthorized($recruiter) ? $this->isNotauthorized($recruiter) : new RecruiterResource($recruiter);
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
    *      path="/api/recruiter/update",
    *      operationId="Recruiter-update",
    *      tags={"Recruiter"},
    *      description="this api if for updating recruiter",
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

    public function update(Request $request, Recruiter $recruiter)
    {
       $recruiter->update($request->all());
       return new RecruiterResource($recruiter);
    }
  /**
  * @OA\Delete(
  *      path="/api/recruiter/delete",
  *      operationId="recruiter_delete",
  *      tags={"Recruiter"},
  *      summary="this is used to delete particural user",
  *      description="this api will be used to delete recruiter form database ",
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
    public function destroy(Recruiter $recruiter)
    {
        return $this->isNotauthorized($recruiter) ? $this->isNotauthorized($recruiter) : $recruiter->delete();

    }

    public function isNotauthorized($recruiter){

        if(Auth::user()->id !==$recruiter->recruiter_id){
            return $this->error('','you are not authorized to make this request',403);
            
        }

    }
}
