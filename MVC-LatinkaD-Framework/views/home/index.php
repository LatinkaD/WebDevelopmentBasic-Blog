

<h1>Welcome to home!</h1>

<a href="/accounts/login">Login</a>
<a href="/accounts/register">Register</a>

<button id="show-books">Show Books</button>
<div id="books"></div>

<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script>
    $('#show-books').on('click', function(ev) {
        $.ajax({
            url: 'books/showBooks',
            method: 'GET'
        }).success(function (data) {
            $('#books').html(data);
        })
    });
</script>