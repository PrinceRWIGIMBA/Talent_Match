<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\storeAdmin;
use App\Http\Resources\AdminResource;
use App\Traits\HttpResponses;



class AdminController extends Controller
{
    use HttpResponses;
   
     /**
     * @OA\get(
     *     path="/api/admin",
     *    operationId="index_admin",
*      tags={"Admin"},
*      summary="list of all admin",
*      description="this API List All Information about admins",
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
        return AdminResource::collection(

            admin::where('admin_id',Auth::user()->id)->get()
        );
    }

      /**
     * @OA\Post(
     *     path="/api/admin/store",
     *    operationId="store_admin",
*      tags={"Admin"},
*      summary="store_admin info",
*      description="this API store information of admins",
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

     public function createadmin(storeadmin $request)
     {
         $request->validated($request->all());
       
         $admin=admin::create([
             'name'=>Auth::User()->name,
             'admin_id'=>Auth::User()->id,
             'admin_email'=>Auth::User()->email,
             'phone'=>$request->phone,
             'address'=>$request->address,
             'professional'=>$request->professional,
             'profile'=>$request->profile

             
         ]);
 
         return response()->json($admin);
     }

    /**
    * @OA\Put(
    *      path="/api/admin/update",
    *      operationId="admin_update_id",
    *      tags={"Admin"},
    *      summary="update admin info",
    *      description="this API update user information",
    *   
    *     
    *      @OA\Response(
    *          response=200,
    *          description="the data",
    *       ),
    *     )
    */
    public function updateAdmin(Request $request, Admin $admin)
    {
       if($admin->update($request->all())){
        return new AdminResource($admin);
       }
       
    }
/**
* @OA\Delete(
*      path="/api/admin/delete",
*      operationId="admin_delete_id",
*      tags={"Admin"},
*      summary="this API delete admin info",
*      description="this API delete admin information from database",
*    
*      @OA\Response(
*          response=200,
*          description="the data",
*       ),
*     )
*/

public function destroyadmin(Admin $admin)
{
    return $this->isNotauthorized($admin) ? $this->isNotauthorized($admin) : $admin->delete();

}

public function isNotauthorized($admin){

    if(Auth::user()->id !==$admin->admin_id){
        return $this->error('','you are not authorized to make this request',403);
        
    }

}
}
