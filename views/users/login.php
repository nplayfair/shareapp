<div class="col-md-8">
    <div class="card">
        <div class="card-header">
            User Login
        </div>
        <div class="card-body text-align-left">
            <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="text" name="email" id="email" class="form-control" placeholder="Email address">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                </div>
                <input type="submit" class="btn btn-primary" name="submit" value="Log In">
            </form>
        </div>
    </div>
</div>
