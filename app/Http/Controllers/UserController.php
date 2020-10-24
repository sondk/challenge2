<?php


namespace App\Http\Controllers;

use Hash;
use Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware('teacher')->except('index', 'show');

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::latest()->paginate(5);

        return view('users.index',compact('users'))

            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([

            'username' => 'required',

            'password' => 'required',

            'email' => 'required',

            'name' => 'required',

            'phone_number' => 'required',

        ]);

    

        User::create([
            'username' => $request['username'],
            'password' => Hash::make($request['password']),
            'name' => $request['name'],
            'email' => $request['email'],
            'phone_number' => $request['phone_number'], 
        ]);

        return redirect()->route('users.index')

                        ->with('success','User created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
        $messages = DB::table('messages')->where([
            ['sender_id', '=', Auth::id()],
            ['sent_to_id', '=', $user->id],
        ])->get();
        return view('users.show',compact('user', 'messages'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
        return view('users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
        $request->validate([

            'username' => 'required',

            'name' => 'required',

            'email' => 'required',

            'phone_number' => 'required',


        ]);

    

        $user->update($request->all());

    

        return redirect()->route('users.index')

                        ->with('success','User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
        $user->delete();

        return redirect()->route('users.index')

                        ->with('success','User deleted successfully');
    }
}
