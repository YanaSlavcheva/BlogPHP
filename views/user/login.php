<article class="col-xs-12 col-md-12 col-lg-12 post-short">
    <header class="col-xs-12 col-md-12 col-lg-12">
        <h1>Login</h1>
    </header>

    <div class="col-xs-12 col-md-12 col-lg-12">
        <form action="/user/login" method="post">
            <div class="row">
                <div class="col-xs-12 col-md-6 col-lg-4">
                    <label for="username">Username: </label>
                </div>
                <div class="col-xs-12 col-md-6 col-lg-8">
                    <input type="text" name="username" id="username" class="inputs"/>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 col-md-6 col-lg-4">
                    <label for="password">Password: </label>
                </div>
                <div class="col-xs-12 col-md-6 col-lg-8">
                    <input type="password" name="password" id="password" class="inputs"/>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 col-md-12 col-lg-12">
                    <button type="submit" class="btn-default">Login</button>
                </div>
            </div>
        </form>
    </div>
</article>