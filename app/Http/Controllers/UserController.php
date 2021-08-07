<?php

namespace App\Http\Controllers;

use App\Exports\UserExport;
use App\Imports\UserImport;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    public function index()
    {
        return view('welcome', ['users' => User::all()]);
    }

    public function export()
    {
        return Excel::download(new UserExport(), 'users.xlsx');
    }

    public function import(Request $request)
    {
        $users = Excel::toCollection(new UserImport(), $request->file('file'));
        foreach ($users[0] as $user) {
            $specificUser = User::where('id', $user[0])->get();

            if ($specificUser[0]->name == $user[1] AND $specificUser[0]->email == $user[2]){
                continue;
            }
            $specificUser[0]->update([
                'name' => $user[1],
                'email' => $user[2]
            ]);
        }
        return redirect()->route('index');
    }
}
