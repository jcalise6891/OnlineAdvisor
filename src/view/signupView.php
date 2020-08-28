<?php
require_once(dirname(__FILE__, 3).'\assets\php\header.php');
?>
<div class="container">
    <div class="row justify-content-center h-100">
        <div class="col-md-8 my-auto py-5 mx-5">
            <div class="card">
                <header class="card-header">
                    <h4 class="card-title mt-2">Sign up</h4>
                </header>
                <article class="card-body">
                    <form method="post" action="/OnlineAdvisor/src/controller/signup.php">
                        <div class="form-row">
                            <div class="col form-group">
                                <label>Full name </label>
                                <input type="text" name="fullName" class="form-control" placeholder="">
                            </div> <!-- form-group end.// -->
                        </div> <!-- form-row end.// -->
                        <div class="form-group">
                            <label>Email address</label>
                            <input type="email" name="mail" class="form-control" placeholder="">
                            <small class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div> <!-- form-group end.// -->
                        <div class="form-group">
                            <label>Create password</label>
                            <input class="form-control" type="password" name="pass">
                            <label>Confirm password</label>
                            <input class="form-control" type="password" name="confirmpass">
                        </div> <!-- form-group end.// -->
                        <div class="form-group">
                            <button type="submit" name="submit" class="btn btn-primary d-flex mx-auto"> Register </button>
                        </div> <!-- form-group// -->
                        <small class="text-muted">By clicking the 'Register' button, you confirm that you accept our <br> Terms of use and Privacy Policy.</small>
                    </form>
                </article> <!-- card-body end .// -->
                <div class="border-top card-body text-center">Have an account? <a href="/OnlineAdvisor/login">Log In</a></div>
            </div> <!-- card.// -->
        </div> <!-- col.//-->

    </div> <!-- row.//-->


</div>
<?php
require_once(dirname(__FILE__, 3).'\assets\php\footer.php');
?>