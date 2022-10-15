<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\UserRegisterRequest;
use App\Http\Requests\Web\UserUpdateRequest;
use App\Http\Traits\ImageUploadTrait;
use App\Http\Traits\PermisionsTrait;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;
use Laravel\Socialite\Facades\Socialite;

class UserController extends Controller
{
    use ImageUploadTrait, PermisionsTrait;

    public function __construct()
    {
        $this->middleware('guest')->only(['loginForm', 'login', 'create', 'store']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::withCount('books')->orderBy('books_count', 'desc')->with('books')->get();
        return view('Web.User.index', compact(['users']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Web.Auth.Register');
    }
    public function loginForm()
    {
        return view('Web.Auth.Login');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRegisterRequest $request)
    {
        $request = $request->except(['_token']);
        $request['password'] = bcrypt($request['password']);
        if (request()->hasFile('image')) {
            $avatar = $this->uploadphoto('image', 'users', 'email');
        } else {
            $avatar = null;
        }
        $request['image'] = $avatar;
        $user = User::create($request);
        if ($user->id == 1) {
            $user->makeAdmin('supervisor');
        }
        Auth::login($user);
        return redirect(route('user.edit', $user->id));
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        $user = Auth::attempt([
            'email' => $request->email,
            'password' => ($request->password),
        ], $request->remember);
        if (!$user) {
            return back()->withErrors(['Wrong entry' => 'Wrong email or password']);
        }
        return redirect('/');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::with('books')->findOrFail($id);
        $userBooks = $user->Books->paginate(8);
        // dd($userBooks);
        return view('Web.User.Show', compact(['user', 'userBooks']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::withTrashed()->findOrFail($id);
        // if (!$this->owner($user->id)) {
        //     return   $this->OwnerRedierect($user->id, 'Not allowed to edit This profile');
        // }
        if (!Gate::allows('update', $id)) {
            abort(403);
        }
        return view('Web.User.edit', compact(['user']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $request['password'] = $request->password ? bcrypt($request->password) :  $user->password;
        $avatar = $user->image;
        if (request()->hasFile('image')) {
            $avatar = $this->uploadphoto('image', 'users', 'email');
        }
        $request = $request->except('_token', '_method', 'password_confirmation');
        $request['image'] = $avatar;
        $user->update($request);
        if ($user->is_admin) {
            $user->adminAccount->update([
                'email' => $request['email'],
                'password' => $request['password']
            ]);
        }
        return redirect(route('user.show', $user->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}