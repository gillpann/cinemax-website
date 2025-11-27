<!-- includes/header_front.php -->
<header class="site-header">
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <img src="assets/logo/cinemax.png" alt="Cinemax Logo"
                    style="height: 60px; object-fit: contain; background-color: white; border-radius: 12px; padding: 4px;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item"><a class="nav-link <?= basename($_SERVER['PHP_SELF'])=='index.php'?'active':'' ?>" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link <?= basename($_SERVER['PHP_SELF'])=='categories.php'?'active':'' ?>" href="categories.php">Categories</a></li>
                    <li class="nav-item"><a class="nav-link <?= basename($_SERVER['PHP_SELF'])=='new-releases.php'?'active':'' ?>" href="new-releases.php">New Releases</a></li>
                    <li class="nav-item"><a class="nav-link <?= basename($_SERVER['PHP_SELF'])=='trending.php'?'active':'' ?>" href="trending.php">Trending</a></li>
                </ul>
                
                <form class="d-flex position-relative" action="categories.php" method="GET">
                    <input class="form-control search-input" type="search" name="q" placeholder="Search movies...">
                    <div class="search-results position-absolute top-100 start-0 end-0 bg-dark mt-1 rounded shadow-lg d-none"></div>
                </form>
            </div>
        </div>
    </nav>
</header>
