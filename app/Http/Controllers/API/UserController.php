<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::latest()->paginate(10);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,[
            'name' => 'required|string|max:191',
            'email' => 'required|string|email|max:191|unique:users',
            'password' => 'required|string|min:8',
        ]);

        return User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'position' => $request['position'],
            'team' => $request['team'],
            'photo' => $request['photo'],
            'password' => Hash::make($request['password'])
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        {
            $user=User::find($id);
            if($user){
            return response()->json(['status'=>true,'user'=>$user]);
            }else{
            return response()->json(['status'=>false]);
            }
         }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        return auth('api')->user();
        
    }

    public function uploadPhoto(Request $request, $id)
    {
        //$user = auth('api')->user();
        $user=User::find($id);
        
        $currentPhoto = $user->photo;

        if($request->file) {

            //the base 64 data in the request looks like 'data:image/png;base64,iVBORw0KGgo....' This function gets the file type for example in this one will get png

            $name = time().'.'. explode('/', explode(':', substr($request->file, 0, strpos($request->file, ';')))[1])[1];

            //uses intervention image to save in our laravel public folder
            \Image::make($request->file)->save(public_path('img/profile/').$name);
            $request->merge(['photo' => $name]);

            //delete the previous photo of the user
            $userPreviousPhoto = public_path('img/profile/').$currentPhoto;
            $defaultPhoto = public_path('img/profile/user.png');
            if(file_exists($userPreviousPhoto) && ($userPreviousPhoto !== $defaultPhoto)){
                    @unlink($userPreviousPhoto);
            }
        }

        
        
        $user->update($request->all());
        return ['message' => 'Success'];
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $this->validate($request,[
            'name' => 'required|string|max:191',
            'email' => 'required|string|email|max:191|unique:users,email,'.$user->id,
            'password' => 'sometimes|min:8',
        ]);

        $user->update($request->all());
        return ['message' => 'Updated the user info'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        // delete the user
        $user->delete();

        return ['message' => 'User Deleted'];

    }
}
