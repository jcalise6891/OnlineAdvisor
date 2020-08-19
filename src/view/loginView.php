<?php
    require_once "../assets/php/header.php"
 ?>

    <div class="container h-100">
        <div class="row justify-content-center h-100">
            <div class="col-md-8 bg-light my-auto py-5 mx-5">
                <form class="mx-2 mb-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" autocomplete="on">
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                <div class="d-flex justify-content-center">
                    <p>Don't have an account? <a href="/OnlineAdvisor/src/view/signupView.php">Sign Up</a></p>
                </div>
                <div class="d-flex justify-content-center">
					<a href="#">Forgot your password?</a>
				</div>

            </div>
        </div>
    </div>
    
<?php
    require_once "../assets/php/footer.php"
 ?>