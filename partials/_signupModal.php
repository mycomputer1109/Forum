<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#signupModal">
  SignUp Modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="signupModal">Sign Up to iDiscuss</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>


            <form action="/ayush/forum/partials/_handleSignup.php" method="POST" class="needs-validation" novalidate>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="signupEmail" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="signupEmail" aria-describedby="emailHelp"
                            name="signupEmail" required>
                        <div class="invalid-feedback">
                            Please provide a valid Email ID
                        </div>


                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="signupPassword" class="form-label">Password</label>
                        <input type="password" class="form-control" id="signupPassword" name="signupPassword" required>
                        <div class="invalid-feedback">
                            Please provide a valid Password.
                        </div>

                    </div>
                    <div class="mb-3">
                        <label for="signupcPassword" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="signupcPassword" name="signupcPassword"
                            required>
                        <div class="invalid-feedback">
                            Please provide a valid Password.
                        </div>

                    </div>
                </div>
                <div class="modal-footer align-left justify-content-start">
                    <button type="submit" class="btn btn-danger fw-bold" style="background-color: #FC810C;">Sign
                        Up</button>
                    <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                </div>
            </form>

        </div>
    </div>
</div>