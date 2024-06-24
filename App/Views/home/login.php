<div class="container mt-5">
        <h1 class="mt-5 d-flex justify-content-center">Login Form</h1>
        <h3 id="error" class="mt-3 d-flex justify-content-center text-danger"><?= $error ?></h3>
        <form method="POST" class="mt-4">
                <div class="form-floating mb-4">
                  <label for="nombre" class="mx-1">Username</label>
                  <input type="text" class="form-control" id="nombre" placeholder="Username" name="nombre" required />
                </div>


            <div class="form-floating mb-4">
                <label for="pass">Password</label>
                <input type="password" class="form-control rounded-3" id="pass" placeholder="Password" name="pass" required />
            </div>

            <button class="w-100 my-2 btn btn-lg rounded-3 btn-primary" id="submit" name="submit"
                type="submit">Login</button>
        </form>
</div>
<script src="<?= $baseUrl ?>js/login.js"></script>