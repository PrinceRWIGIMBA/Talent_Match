<?php

namespace App\Http\Controllers;

use App\Models\applied_job;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AppliedJobController extends Controller
{
//     use HttpResponses;
   
//     /**
//     * @OA\get(
//     *     path="/api/job_post",
//     *    operationId="index_job_post",
// *      tags={"Job_post"},
// *      summary="list of all job_post",
// *      description="this API list all information about job_posts",
//        *@OA\RequestBody(
//    *          required=true,
//    *          @OA\JsonContent()
//    *      ),
//     *     @OA\Response(
//     *         response="200",
//     *         description="The data"
//     *     )
//     * )
//     */
//    use HttpResponses;
//    public function getAll()
//    {
//        return job_postResource::collection(

//            job_post::where('recruiter_id',Auth::user()->id)->get()
//        );
//    }

//      /**
//     * @OA\Post(
//     *     path="/api/job_post/store",
//     *    operationId="store_job_post",
// *      tags={"Job_post"},
// *      summary="store_job_post info",
// *      description="this API store information of job_posts",
// * @OA\RequestBody(
//    *          required=true,
//    *          @OA\JsonContent()
//    *      ),
//     *     @OA\Response(
//     *         response="200",
//     *         description="The data"
//     *     )
//     * )
//     */

//     public function createjob_post(storejob_post $request)
//     {
    
      
//         $job_post=job_post::create([
//             'employee_id',
//             'recruiter_id',
//             'job_post_id',
//             'status'

            
//         ]);

//         return response()->json($job_post);
//     }

//    /**
//    * @OA\Put(
//    *      path="/api/job_post/update",
//    *      operationId="job_post_update_id",
//    *      tags={"Job_post"},
//    *      summary="update job_post info",
//    *      description="this API update user information",
//    *   
//    *     
//    *      @OA\Response(
//    *          response=200,
//    *          description="the data",
//    *       ),
//    *     )
//    */
//    public function updatejob_post(Request $request, job_post $job_post)
//    {
//       if($job_post->update($request->all())){
//        return new job_postResource($job_post);
//       }
      
//    }
// /**
// * @OA\Delete(
// *      path="/api/job_post/delete",
// *      operationId="job_post_delete_id",
// *      tags={"Job_post"},
// *      summary="this API delete job_post info",
// *      description="this API delete job_post information from database",
// *    
// *      @OA\Response(
// *          response=200,
// *          description="the data",
// *       ),
// *     )
// */

// public function destroyjob_post(job_post $job_post)
// {
//    return $this->isNotauthorized($job_post) ? $this->isNotauthorized($job_post) : $job_post->delete();

// }

// public function isNotauthorized($job_post){

//    if(Auth::user()->id !==$job_post->id){
//        return $this->error('','you are not authorized to make this request',403);
       
//    }

// }
}