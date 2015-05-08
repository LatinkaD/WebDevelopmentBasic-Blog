<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="/content/style.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <title>
        <?php if (isset($this->title))
            echo htmlspecialchars($this->title)?>
    </title>
</head>

<body>
    <div class="navbar navbar-default navbar-static-top">
        <div class="container">
            <a href="/">
                <img src="/content/images/logo.jpg" />
            </a>
            <button class="navbar-toggle" data-oggle="collapse"
                    data-target=".navHeaderCollapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div class="collapse navbar-collapse navHeaderCollapse">
                <ul class="nav navbar-nav navbar-left">
                    <li><a href="/">Home</a></li>
                    <li><a href="/posts">Posts</a></li>
                       <?php if ($this->isLoggedIn) : ?>
                           <li><a href="/posts/add">New Post</a></li>
                       <?php endif; ?>
                </ul>
                <div class="logged">
                    <?php if ($this->isLoggedIn) : ?>
                        <div id="logged-in-info">
                            <form action="/accounts/logout" id="headerForm">
                                <label for="button">Hello, <?php echo $_SESSION['username']; ?></label>
                                <input type="submit" value="Logout" class="button"/>
                            </form>
                        </div>
                    <?php endif; ?>
                    <?php include('messages.php'); ?>
                </div>
            </div>

        </div>
    </div>