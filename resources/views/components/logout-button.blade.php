<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit" class="text-white py-2 px-4">
        <i class="fa fa-sign-out"></i> Logout
    </button>
</form>
