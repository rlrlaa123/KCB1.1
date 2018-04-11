@if(\Illuminate\Support\Facades\Auth::guard('web')->check())
    <p>
        You are Logged In as a <strong>User</strong>
    </p>
@else
    <p>
        You are Logged Out as a <strong>User</strong>
    </p>
@endif

@if(\Illuminate\Support\Facades\Auth::guard('admin')->check())
    <p>
        You are Logged In as a <strong>Admin</strong>
    </p>
@else
    <p>
        You are Logged Out as a <strong>Admin</strong>
    </p>
@endif