<?php

namespace App\Http\Controllers;

use App\Models\employee;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\storeEmployee;
use App\Http\Resources\EmployeeResource;
use App\Traits\HttpResponses;

class EmployeeController extends Controller
{
    use HttpResponses; 
    
      /**
     * @OA\get(
     *     path="/api/employee",
     *    operationId="index_employee",
*      tags={"Employee"},
*      summary="list of all employee",
*      description="this API list all information about employees",
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
        return EmployeeResource::collection(

            employee::where('employee_id',Auth::user()->id)->get()
        );
    }

      /**
     * @OA\Post(
     *     path="/api/employee/store",
     *    operationId="store_employee",
*      tags={"Employee"},
*      summary="store_employee info",
*      description="this API Store Information Of Employees",
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

     public function createemployee(storeEmployee $request)
     {
         $request->validated($request->all());
       
         $employee=employee::create([
             'name'=>Auth::User()->name,
             'employee_id'=>Auth::User()->id,
             'employee_email'=>Auth::User()->email,
             'avilability'=>$request->avilability,
             'phone'=>$request->phone,
             'gender'=>$request->gender,
             'dob'=>$request->dob,
             'profile'=>$request->profile,
             'region'=>$request->region,
             'address'=>$request->address,
             'patch'=>$request->patch,
             'file'=>$request->file,
             'link'=>$request->link,
             'about'=>$request->about,
         ]);
 
         return response()->json($employee);
     }

    /**
    * @OA\Put(
    *      path="/api/employee/update",
    *      operationId="employee_update_id",
    *      tags={"Employee"},
    *      summary="update employee info",
    *      description="this API update user information",
    *   
    *     
    *      @OA\Response(
    *          response=200,
    *          description="the data",
    *       ),
    *     )
    */
    public function updateemployee(Request $request, Employee $employee)
    {
       if($employee->update($request->all())){
        return new EmployeeResource($employee);
       }
       
    }
/**
* @OA\Delete(
*      path="/api/employee/delete",
*      operationId="employee_delete_id",
*      tags={"Employee"},
*      summary="this API delete employee info",
*      description="this API delete employee information from database",
*    
*      @OA\Response(
*          response=200,
*          description="the data",
*       ),
*     )
*/

public function destroyemployee(Employee $employee)
{
    return $this->isNotauthorized($employee) ? $this->isNotauthorized($employee) : $employee->delete();

}

public function isNotauthorized($employee){

    if(Auth::user()->id !==$employee->employee_id){
        return $this->error('','you are not authorized to make this request',403);
        
    }

}
}
