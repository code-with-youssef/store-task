@extends('Layout')
@section('content')
    <div class="row justify-content-center g-4" style="margin-top: 15%">
        <h1 class="text-center">Select a role</h1>
        <div class="col-md-4">
            <form method="POST" action="{{ route('login.login') }}">
                @csrf
                <input type="hidden" name="role" value="admin">
                <button type="submit" class="card h-100 w-100 text-center shadow role-card" style="cursor:pointer;">
                    <div class="card-body d-flex flex-column justify-content-center">
                        <h5 class="card-title mb-0">Admin</h5>
                    </div>
                </button>
            </form>
        </div>

        <div class="col-md-4">
            <form method="POST" action="{{ route('login.login') }}">
                @csrf
                <input type="hidden" name="role" value="user">
                <button type="submit" class="card h-100 w-100 text-center shadow role-card" style="cursor:pointer;">
                    <div class="card-body d-flex flex-column justify-content-center">
                        <h5 class="card-title mb-0">User</h5>
                    </div>
                </button>
            </form>
        </div>

        <div class="col-md-6">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <input type="hidden" name="role" value="user">
                <button type="submit" class="card h-100 w-100 text-center shadow role-card" style="cursor:pointer;">
                    <div class="card-body d-flex flex-column justify-content-center">
                        <h5 class="card-title mb-0">Logout</h5>
                    </div>
                </button>
            </form>
        </div>
    </div>
@endsection
