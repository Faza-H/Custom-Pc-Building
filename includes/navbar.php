<header class="d-flex justify-content-right text-light bg-black py-1">
        <svg class="me-1" width="10" height="20"><use xlink:href="#bootstrap"></use></svg>
        <span class="fs-2">Ultimate Builds</span>
      </a>
    </header>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand d-block d-sm-none d-md-none" href="#"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">

      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="pre-builds.php">Pre Builds</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="builder.html">PC Builder</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="laptops.php">Laptops</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="components.php">PC Componenets</a>
        </li>
        <?php if(isset($_SESSION['auth_user'])) : ?>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?= $_SESSION['auth_user']['user_name']; ?>
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">My Profile</a></li>
            <li>
              <form action="allcode.php" method="POST">
                <button type="submit" name="logout_btn" class="dropdown-item" >Logout</button>
              </form>
          </li>
          </ul>
        </li>
        <?php else : ?>
        <li class="nav-item">
          <a class="nav-link" href="login.php">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="register.php">Register</a>
        </li>
        <?php endif; ?>

      </ul>

    </div>
  </div>
</nav>