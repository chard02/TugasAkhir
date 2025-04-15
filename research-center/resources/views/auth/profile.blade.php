@include('layouts.header')
<div class="container mt-4">
    <div class="card shadow-lg p-4">
        <h2 class="text-center mb-4">Profile</h2>
        <div class="row">
            <div class="col-md-4 text-center">
                <img src="https://via.placeholder.com/150" class="rounded-circle img-thumbnail" alt="Profile Picture">
            </div>
            <div class="col-md-8">
                <table class="table">
                    <tr>
                        <th>Name:</th>
                        <td>{{ $user->name }}</td>
                    </tr>
                    <tr>
                        <th>Email:</th>
                        <td>{{ $user->email }}</td>
                    </tr>
                    <tr>
                        <th>Role:</th>
                        <td>{{ $user->getRoleNames()->first() }}</td>
                    </tr>
                </table>
                <a href="{{ route('logout') }}" 
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
                   class="btn btn-danger">Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>

@include('layouts.footer')
