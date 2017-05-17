<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Admin;

use App\Author;

use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function getLogin()
    {
         return view('admin.login');
    }

    public function adminLogOut()
    {
         Auth::logout();
         return redirect()->route('index');

    }
    public function getAdminDashboard()
    {
          $authors = Author::all();
          return view('admin.dashboard', compact('authors'));
    }

    public function postLogin(Request $request)
    {
         $this->validate($request, [
              'name' => 'required',
              'password' => 'required',
         ]);
         if(!Auth::attempt(['name' => $request->name, 'password' => $request->password])) {
              return redirect()->back()->with(['fail' => 'cannot log in']);
         }
         return redirect()->route('admin.dashboard');
    }
}
