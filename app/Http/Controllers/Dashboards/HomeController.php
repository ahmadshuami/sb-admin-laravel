<?php

namespace App\Http\Controllers\Dashboards;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Traits\ResponseTrait;

class HomeController extends Controller
{
    /*
    |----------------------------------------------------------------------------------------------------------------------------------
    | Dashboard Controller
    | 
    | path: app/Http/Controllers/Dashboards/HomeController.php
    |----------------------------------------------------------------------------------------------------------------------------------
    |
    | List of methods:
    | 1. __construct
    |
    */

    use ResponseTrait;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Dashboard index.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('secure_pages.home');
    }

    /**
     * Blank page.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function blankPage(Request $request)
    {
        return view('secure_pages.blank_page');
    }

    /**
     * User list page.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function userList(Request $request)
    {
        return view('secure_pages.user_list');
    }

    /**
     * Render user data.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getUserList(Request $request)
    {
        if ($request->ajax()) {
            $users = User::orderBy('id', 'asc')->get();

            foreach ($users as $val) {
                $action_btn = '
                <div class="dropdown show no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="bi bi-list-task"></i></a>
                    <div class="dropdown-menu shadow" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item ev_update" role="button" data-bs-toggle="modal" data-bs-target="#edit_form" data-bs-code="'.$val->id.'"><i class="bi bi-pencil me-2"></i>Edit</a>
                        <a class="dropdown-item ev_remove" href="javascript:void(0);" ev-id="'.$val->id.'"><i class="bi bi-trash text-danger me-2"></i></i>Remove</a>
                    </div>
                </div>';

                $row = ['', $val->name, $val->email, $action_btn];

                $record[] = $row;
            }
            
            $response['data'] = $record ?? [];

            echo json_encode($response);
        }
    }

    /**
     * Get data for updating based on user id.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getUserData(Request $request)
    {
        // if (!$request->ajax()) {
        //     return $this->ajaxResponse(false, [], 'Permintaan tidak sah.', 400);
        // }

        $user = User::where('id', $request->id)
            ->first(['id','name','email']);
        
        $response = [
            'id'    => $user->ministry_id,
            'name'  => $user->name,
            'email' => $user->email
        ];

        return $this->ajaxResponse(true, $response, '', 200);
    }
}
