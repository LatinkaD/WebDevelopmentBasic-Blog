<h1>Login</h1>

<form action="/accounts/login" method="POST">
    <label for="username">Username</label>
    <input type="text" id="username" name="username"/>
    <br/>
    <label for="password">Password</label>
    <input type="password" id="password" name="password"/>
    <br/>
    <input type="submit" value="Login" />
    <a href="/accounts/register">Register now</a>
</form>