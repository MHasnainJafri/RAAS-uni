<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use App\Traits\SchoolSession;
use App\Interfaces\UserInterface;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Interfaces\SectionInterface;
use Illuminate\Support\Facades\Hash;
use App\Interfaces\SchoolClassInterface;
use App\Repositories\PromotionRepository;
use App\Http\Requests\StudentStoreRequest;
use App\Interfaces\SchoolSessionInterface;
use App\Repositories\StudentParentInfoRepository;
use App\Repositories\StudentAcademicInfoRepository;

class adminController extends Controller
{

    use SchoolSession;
    protected $userRepository;
    protected $schoolSessionRepository;
    protected $schoolClassRepository;
    protected $schoolSectionRepository;

    public function __construct(UserInterface $userRepository, SchoolSessionInterface $schoolSessionRepository,
    SchoolClassInterface $schoolClassRepository,
    SectionInterface $schoolSectionRepository)
    {
        // $this->middleware(['can:view users']);

        $this->userRepository = $userRepository;
        $this->schoolSessionRepository = $schoolSessionRepository;
        $this->schoolClassRepository = $schoolClassRepository;
        $this->schoolSectionRepository = $schoolSectionRepository;
    }

    



    public function login(Request $req)
    {
  
      $validator = \Validator::make($req->all(), [
        'email' => 'required|email',
        'password' => 'required|min:6',
      ]);
      // Return errors if validation error occur.
      if ($validator->fails()) {
        $errors = $validator->errors();
        return response()->json([
          'error' => $errors
        ], 400);
      }
  
      if (\Auth::attempt($req->only(['email', 'password']))) {
        $user = \Auth::user();
        $token = $user->createToken('adminToken', ['admin'])->plainTextToken;
        return ['token' => $token,'user'=>$user,'status'=>'success'];
      }
      return response()->json([
        'error' => 'Invalid username or password'
      ], 400);;
    }
  
    public function userDetail()
    {
      $user = Auth::user();
      return ['data' => $user];
    }

    public function studentlist(Request $request) {
      $students = User::select('id','first_name','last_name','email','gender','phone')->where('role', 'student')->get();
      return response()->json(['status'=>'success','data'=>$students]);
     
    }
    public function getTeacherList(){
      $students = User::select('id','first_name','last_name','email','gender','phone')->where('role', 'teacher')->get();
      return response()->json(['status'=>'success','data'=>$students]);
    }
    public function addstudent(Request $request)
    {
  
      
   
      
        }
    // public function trainedstudents(){}
    // public function trainedstudents(){}
    public function untrainedstudent(){

          $students = User::select('id','first_name','last_name','email','gender','phone')->where('role', 'student')->where('trainstatus',0)->get();
          return response()->json(['status'=>'success','data'=>$students]);


    }
    public function trainedstudent(){

          $students = User::select('id','first_name','last_name','email','gender','phone')->where('role', 'student')->where('trainstatus',1)->get();
          return response()->json(['status'=>'success','data'=>$students]);


    }

}
