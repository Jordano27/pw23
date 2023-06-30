<div  style="border: 1px solid peru; width: 50%;">

    <h1>Login</h1>

    @if (session('erro'))
        <div>{{ session('erro') }}</div>
    @endif

        <form action="{{ url()->current() }}" method="post">
            @csrf
            <input type="email" name="email" id="" placeholder="Email">
            <br>
            <input type="password" name="password" id="" placeholder="Senha">
            <br>
            <input type="submit" value="Login">
        </form>

</div>
