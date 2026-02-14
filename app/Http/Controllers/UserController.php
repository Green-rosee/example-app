<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreReuest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;


class UserController extends Controller
{
    //private $userRepository; видимо ошибся)
    public function __construct(private readonly UserRepository $userRepository)
    {

    }

    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
        $users = User::orderBy('creation_at')->paginate(10);
        return view('users.index', ['users' => $users]);
    }

    //====================================================
    public function indexPaginate():View
    {
        $users = User::paginate(10);
        return view('users.indexPaginate', compact('users'));
    }
    //==========================================================
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //direct users/file create
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserStoreReuest $request):RedirectResponse

    {
        $validated = $request->validated();
        $newUser = new User();

        $newUser->name = $validated['name'];
        $newUser->email = $validated['email'];
        $newUser->password = $validated['password'];
        $newUser->save();

        return redirect()->back()->with('success', 'User created successfully');
        //dd($validated['password'],$newUser);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('users.show', [
            'user' => $user //frontend => backand
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user):View
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserUpdateRequest $userUpdateRequest, User $user):RedirectResponse
    {
        $this->userRepository->update($userUpdateRequest, $user);
        return redirect()->route('users.show', $user)
            ->with('success', 'Данные пользователя обновлены!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user):RedirectResponse
    {
        $this->userRepository->destroy($user);
        return redirect()->route('users.index')
            ->with('success', "Пользователь '{$user->name}' удален!");
    }
}
