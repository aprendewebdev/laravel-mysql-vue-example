<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Todo;

class ApiController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function get()
    {
      $user = User::find(Auth::id());
      
      return response()->json([
        'success' => true,
        'results' => $user->todos,
      ]);
    }

    public function create(Request $request) {
      $description = $request->input('description');

      $todo = Todo::create([
        "description" => $description,
        "user_id" => Auth::id(),
      ]);

      return response()->json([
        "success" => true,
        "results" => [$todo]
      ]);
    }

    public function delete($id) {
      Todo::destroy($id);

      return response()->json([
        'success' => true,
      ]);
    }
}
