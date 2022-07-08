<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    public static $pageTitle = 'User';
    
    public function index ()
    {
        $Users = User::all();
        $pageTitle = self::$pageTitle;
        return view ('user.index', compact('pageTitle', 'Users'));
    }

    public function create()
    {
        $User = new User();
        $pageTitle = self::$pageTitle;
        return view('user.create', compact('User', 'pageTitle'));
    }

    public function store(Request $request)
    {
        request()->validate(User::$rules);

        $req = $request->all();
        $req['password'] = Hash::make($req['password']);
        $user = User::create($req);

        return redirect()->route('user.index')
            ->with('success', 'User created successfully.');
    }

    public function show ($id)
    {
        $User = User::find($id);
        $pageTitle = self::$pageTitle;

        return view ('user.show', compact('pageTitle', 'user'));
    }

    public function edit($id)
    {
        $User = User::find(decrypt($id));
        $pageTitle = self::$pageTitle;
        // $pageBreadcrumbs = self::$pageBreadcrumbs;
        // $pageBreadcrumbs[] = [
        //     'page' => '/application/memoItemIns/'.$id.'/edit',
        //     'title' => 'Update '.self::$pageTitle,
        // ];

        return view('user.edit', compact('User', 'pageTitle'));
    }

    public function update(Request $request, User $User )
    {
        request()->validate(User::$rules);

        $req = $request->all();
        $User->update($req);

        return redirect()->route('user.index')
            ->with('success', self::$pageTitle.' updated successfully');
    }

    public function destroy(Request $request, $id)
    {
        $User = User::find($id)->delete();

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'code' => 200,
                'message' => self::$pageTitle.' deleted successfully'
            ], 200);
        }

        return redirect()->route('user.index')
            ->with('success', self::$pageTitle.' deleted successfully');
    }
}
