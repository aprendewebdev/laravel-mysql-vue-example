<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class ApiController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getTodos()
    {
      $user = User::find(Auth::id());
      
      if (!$user) {
        return response()->json([
          'success' => false,
          'error' => 'user not autenticated',
        ]);
      }

      return response()->json([
        'success' => true,
        'results' => $user->todos,
      ]);
    }
}
