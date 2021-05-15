<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#loginModal">
  Login
</button> -->

<!-- Modal -->


<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModal">Login to iDiscuss</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>



            <form action="/ayush/forum/partials/_handleLogin.php" method="POST">
            <div class="modal-body">

                    <div class="mb-3">

                        <label for="loginEmail" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="loginEmail" aria-describedby="emailHelp" name="loginEmail">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="loginPassword" class="form-label">Password</label>
                        <input type="password" class="form-control" id="loginPassword" name="loginPassword">
                    </div>

                    <!-- <div class="mb-3 form-check">
  <input type="checkbox" class="form-check-input" id="exampleCheck1">
  <label class="form-check-label" for="exampleCheck1">Check me out</label>
</div> -->

                    <!-- <button type="submit" class="btn btn-primary">Submit</button> -->

                </div>
                <div class="modal-footer align-left justify-content-start">
                    <button type="submit" class="btn btn-success fw-bold" style="background-color: #04E930;">Login</button>
                    <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                </div>
                
            </form>



        </div>
    </div>
</div>