<h1>Register</h1>

<form action="/accounts/register" method="POST">
    <label for="username">Username</label>
    <input type="text" id="username" name="username"/>
    <br/>
    <label for="password">Password</label>
    <input type="password" id="password" name="password"/>
    <br/>
    <input type="submit" value="Register" />
    <a href="/accounts/login">Login now</a>
</form>