<?php
require_once 'includes/config.php';
require_once 'includes/functions.php';

$movies = getMovies(12); // Get latest 12 movies
$categories = getCategories();
$slideshow = getSlideshowItems();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cinemax - Stream Movies Online</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/slideshow.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="icon" type="image/png" href="assets/logo/logo.jpg" />
</head>
<body>
    <?php include 'includes/header.php'; ?>
    
    <section class="carousel">
        <div class="list">
            <?php foreach ($slideshow as $slide): ?>
            <div class="item" style="background-image: url('<?= UPLOAD_DIR . 'slides/' . htmlspecialchars($slide['image_url']) ?>');">
                <div class="content">
                    <!-- Removed the title div as requested -->
                    <div class="name"><?= htmlspecialchars($slide['headline']) ?></div>
                    <div class="des"><?= htmlspecialchars($slide['subheadline']) ?></div>
<div class="btn">
    <a href="watch.php?id=<?= htmlspecialchars($slide['movie_id']) ?>" class="btn-link">
        <button>Watch</button>
    </a>
    <button>Trailer</button>
</div>
                </div>
            </div>
            <?php endforeach; ?>

        </div>

        <!--next prev button-->
        <div class="arrows">
            <button class="prev"><</button>
            <button class="next">></button>
        </div>

        <!-- time running -->
        <div class="timeRunning"></div>

    </section>

    <!-- Movie Categories -->
    <section class="movie-categories">
        <div class="container">
            <!-- Featured Movies -->
            <div class="category-section">
                <div class="section-header d-flex justify-content-between align-items-center">
                    <h2>Featured Movies</h2>
                    <a href="categories.php" class="btn btn-sm btn-outline-light">View More</a>
                </div>
                <div class="swiper featured-movies-swiper">
                    <div class="swiper-wrapper">
                        <?php foreach (array_slice($movies, 0, 6) as $movie): ?>
                        <div class="swiper-slide movie-card">
                            <a href="watch.php?id=<?= $movie['id'] ?>">
                                <div class="movie-poster">
                                    <img src="<?= UPLOAD_DIR . 'posters/' . $movie['poster'] ?>" alt="<?= htmlspecialchars($movie['title']) ?>">
                                    <div class="overlay">
                                        <span class="play-icon"><i class="fas fa-play"></i></span>
                                    </div>
                                </div>
                                <h3 class="movie-title"><?= htmlspecialchars($movie['title']) ?></h3>
                            </a>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <!-- Add Arrows -->
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>

            <!-- By Categories -->
            <?php foreach (array_slice($categories, 0, 3) as $category): ?>
            <div class="category-section">
                <div class="section-header d-flex justify-content-between align-items-center">
                    <h2><?= htmlspecialchars($category['name']) ?></h2>
                    <a href="categories.php?id=<?= $category['id'] ?>" class="btn btn-sm btn-outline-light">View More</a>
                </div>
                <div class="swiper category-movies-swiper" id="category-swiper-<?= $category['id'] ?>">
                    <div class="swiper-wrapper">
                        <?php 
                        $categoryMovies = getMovies(6, $category['id']);
                        foreach ($categoryMovies as $movie): 
                        ?>
                        <div class="swiper-slide movie-card">
                            <a href="watch.php?id=<?= $movie['id'] ?>">
                                <div class="movie-poster">
                                    <img src="<?= UPLOAD_DIR . 'posters/' . $movie['poster'] ?>" alt="<?= htmlspecialchars($movie['title']) ?>">
                                    <div class="overlay">
                                        <span class="play-icon"><i class="fas fa-play"></i></span>
                                    </div>
                                </div>
                                <h3 class="movie-title"><?= htmlspecialchars($movie['title']) ?></h3>
                            </a>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- Trailer Modal -->
    <div class="modal fade" id="trailerModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Movie Trailer</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="ratio ratio-16x9">
                        <iframe id="trailerIframe" src="" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include 'includes/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/slideshow.js"></script>
</body>
</html>
