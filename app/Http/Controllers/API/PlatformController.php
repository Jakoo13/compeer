<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Platform;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PlatformController extends Controller
{
    public function index()
    {
        return Platform::all();
    }
 
    public function show($id)
    {
        return Platform::find($id);
    }
    
	public function store(Request $request, $id)
    {
        $user=User::find($id);
        

        return Platform::create([
            'id' => $user->id,
            'onePassword' => $request['onePassword'],
            'dressbarnEmail' => $request['dressbarnEmail'],
            'dressbarnSlack' => $request['dressbarnSlack']
        ]);
    }

	public function update(Request $request, $id)
    {
        $platform = Platform::findOrFail($id);
        $platform->update($request->all());
	    return $platform;
    }
	public function delete(Request $request, $id)
    {
        $platform = Platform::findOrFail($id);
        $platform->delete();
	    return 204;
    }
}

