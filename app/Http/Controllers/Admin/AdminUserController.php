<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\DealWithReportsTrait;
use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    use DealWithReportsTrait;
    public $users;
    public $trashedUsers;
    public function __construct(Request $reqquest)
    {
        $this->middleware('admin');
        if ($reqquest->hasAny(['delete', 'make_admin'])) {
            $this->middleware('admin:supervisor');
        }
        $this->users = User::with('books', 'reviews', 'reportedBooks', 'reportedReviews')
            ->whereDoesntHave('adminAccount')
            ->paginate(10);
        $this->trashedUsers = User::onlyTrashed()
            ->with('books', 'reviews', 'reportedBooks', 'reportedReviews', 'adminAccount')
            ->paginate(10);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->users;
        $trashedUsers = $this->trashedUsers;
        return view('Admin.User.index', compact(['users', 'trashedUsers']));
    }
    //
    public function activeUsers()
    {
        $users = $this->users;
        $trashedUsers = $this->users;
        return view('Admin.parts.users.usersidexactivetable', compact(['users', 'trashedUsers']));
    }
    public function trashedUsers()
    {
        $users = $this->users;
        $trashedUsers = $this->trashedUsers;
        return view('Admin.parts.users.usersindextrashedtable', compact(['users', 'trashedUsers']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::withTrashed()
            ->with('books', 'reviews', 'reportedBooks', 'reportedReviews', 'adminAccount')
            ->findOrFail($id);
        $userReports = $user->reports()
            ->sortBy(function ($record) {
                return $record->report->reason;
            })->paginate(10);
        return view('Admin.User.show', compact(['user', 'userReports']));
    }
    public function userReports($id)
    {
        $user = User::withTrashed()
            ->with('books', 'reviews', 'reportedBooks', 'reportedReviews', 'adminAccount')
            ->findOrFail($id);
        $userReports = $user->reports()
            ->sortBy(function ($record) {
                return $record->report->reason;
            })->paginate(10);
        return view('Admin.parts.users.userreportstable', compact(['user', 'userReports']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $user = User::find($id);
        $role = $request->role;
        $user->makeAdmin($role);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $user = User::withTrashed()->where('id', $id)->first();
        if ($request->has('delete')) {
            $this->userReportsAction($id, 'delete');
            $user->forceDelete();
        } elseif ($request->has('restore')) {
            $user->restore();
            return back();
        } else {
            $this->userReportsAction($id, 'suspend');
            $user->delete();
            return back();
        }
        return redirect(route('dashboard.user.index'));
    }
}