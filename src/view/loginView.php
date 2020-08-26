<?php
    require_once(dirname(__FILE__, 3).'\assets\php\header.php');
?>

<div class="container">
    <div class="row justify-content-center h-100">
        <div class="col-md-8 my-auto py-5 mx-5">
            <div class="card">
                <header class="card-header">
                    <h4 class="card-title mt-2">Log In</h4>
                </header>
                <article class="card-body">
                    <form class="mx-2 mb-4" method="post"   action="/OnlineAdvisor/src/controller/login.php">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" name="password" class="form-control" id="exampleInputPassword1" autocomplete="on" required>
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Check me out</label>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary d-flex mx-auto">Submit</button>
                    </form>
                    <div class="d-flex justify-content-center">
                        <p>Don't have an account? <a href="/OnlineAdvisor/signup">Sign Up</a></p>
                    </div>
                    <div class="d-flex justify-content-center">
                        <a href="#">Forgot your password?</a>
                    </div>
                </article>
            </div>
        </div>
    </div>
</div>
</div>

<?php
    require_once(dirname(__FILE__, 3).'\assets\php\footer.php');
?>