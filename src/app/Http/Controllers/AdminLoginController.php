<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminLoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\Shop;

class AdminLoginController extends Controller
{
    public function view(): View
    {
        return view('admin.admin_login');
    }

    /**
     * ログイン
     */
    public function store(AdminLoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(route('admin'));
    }

    /**
     * ログアウト
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return to_route('admin.login');
    }

    public function index()
    {
        $shops = Shop::all();
        return view('admin.admin_index', compact('shops'));
    }
}
