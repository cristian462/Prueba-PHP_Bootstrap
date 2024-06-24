<div class="container mt-5">
        <h1 class="mt-5 d-flex justify-content-center">SignUp Form</h1>
        <h3 id="error" class="mt-3 d-flex justify-content-center text-danger"><?= $error ?></h3>
        <form method="POST" class="mt-4">
                <div class="form-floating">
                  <label for="nombre" class="mx-1">Username</label>
                  <input type="text" class="form-control" id="nombre" placeholder="Username" name="nombre" required />
                </div>

            <div id="nombreMal" class="mb-4 text-danger mx-1"></div>

            <div class="form-floating">
                <label for="pass">Password</label>
                <input type="password" class="form-control rounded-3" id="pass" placeholder="Password" name="pass" required >
            </div>

            <div id="passMal" class="mb-4 text-danger mx-1"></div>

            <div class="form-floating">
                <label for="pass2">Retype Password</label>
                <input type="password" class="form-control rounded-3" id="pass2" placeholder="Re-Password" name="pass2" required >
            </div>

            <div id="pass2Mal" class="mb-5 text-danger mx-1"></div>

            <button class="w-100 my-2 btn btn-lg rounded-3 btn-primary" id="submit" name="submit"
                type="submit">Sign Up</button>
        </form>
</div>
<script src="<?= $baseUrl ?>js/signup.js"></script>