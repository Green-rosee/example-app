<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use App\Repository\User\UserRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;


class UserController extends Controller
{
    //private UserRepository $userRepository; видимо ошибся)

    private const PER_PAGE = 10;


    public function __construct(
        private readonly UserRepository $userRepository
    )
    {

    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        //dd(request()->input());

        /*
        $query = User::query()
            ->where('name', 'LIKE', '%' . $request->get('name') . '%')
            ->paginate(self::PER_PAGE);
        */

        $query = User::query();

        if ($request->has('name') && $request->get('name')) {
            $query->where('name', 'like', '%' . $request->get('name') . '%');
        }

        if ($request->has('slug') && $request->get('slug')) {
            $query->where('slug', $request->get('slug'));
        }

        if ($request->has('email') && $request->get('email')) {
            $query->where('email', $request->get('email'));
        }

        //dd($request->input()); для проверки что приходит

        if ($request->has('active') && $request->get('active') !== null) {
            $query->where('active', $request->get('active'));
        }

        //--------------------------------------------
        if($request->has('date_from') && $request->get('date_from')!==null) {
            $query->whereDate('created_at', '>=', $request->date_from);
        }

        if($request->has('date_to') && $request->get('date_to')!==null) {
            $query->whereDate('created_at', '<=', $request->date_to);
        }


        return view('users.index', [
            'users' => $query->paginate(self::PER_PAGE),
        ]);

        /*
        $page = $request->input('page', 1);
        $users = User::query()->skip(self::PER_PAGE * $page - self::PER_PAGE)//работа пагинации
            ->take(self::PER_PAGE)
            ->paginate(self::PER_PAGE);*/

        //dd($users);
        //return view('users.index', compact('users'));

        /*
        $users = User::orderBy('creation_at')->paginate(10);
        return view('users.index', ['users' => $users]);
        */

    }

    //====================================================
    public function indexPaginate(): View
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
    public function store(UserStoreRequest $userStoreRequest): RedirectResponse

    {
        $user = $this->userRepository->store($userStoreRequest);
        return redirect()
            ->route('users.show', $user)
            ->with('success', 'User created Store UserRepository');
        //dd($validated['password'],$newUser);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user): View
    {
        //dd($user->avatar->path);
        return view('users.show', [
            'user' => $user //frontend => backand
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user): View
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserUpdateRequest $userUpdateRequest, User $user): RedirectResponse
    {
        $this->userRepository->update($userUpdateRequest, $user);
        return redirect()->route('users.show', $user)
            ->with('success', 'Данные пользователя обновлены!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user): RedirectResponse
    {
        $this->userRepository->destroy($user);
        return redirect()
            ->route('users.index')
            ->with('success', "Пользователь '{$user->name}' удален!");
    }
}
