<?php
// Initialize the session
session_start();

// Include config file
require_once "../../backend/config.php";
require_once "../../utils/createSlug.php";

include('../../backend/blog/create.php');
// include('../../utils/upload.php');

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.108.0">
    <title>Dashboard MY ADS</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <!-- include summernote css -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../../assets/summernote/summernote-lite.css">

    <!-- Custom sty les for this template -->
    <link href="../../css/dashboard.css" rel="stylesheet">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .b-example-divider {
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }

        /* Customize summernote background fullscreen bcs it was transparent */
        .note-editor.note-frame.fullscreen {
            background-color: white;
        }
    </style>
</head>

<body>

    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#">MY ADS</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <input class="form-control form-control-dark w-100 rounded-0 border-0" type="text" placeholder="Search" aria-label="Search">
        <div class="navbar-nav">
            <div class="nav-item text-nowrap">
                <a class="nav-link px-3" href="../../backend/authentication/logout.php">Sign out</a>
            </div>
        </div>
    </header>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3 sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="/myads/admin/">
                                <span data-feather="home" class="align-text-bottom"></span>
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/myads/admin/layouts/blog/blog.php">
                                <span data-feather="layout" class="align-text-bottom"></span>
                                Blogs
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="/myads/admin/layouts/categories/categories.php">
                                <span data-feather="tag" class="align-text-bottom"></span>
                                Categories
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="/myads/admin/layouts/banner/banner.php">
                                <span data-feather="image" class="align-text-bottom"></span>
                                Banner
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="/myads/admin/layouts/users/users.php">
                                <span data-feather="user" class="align-text-bottom"></span>
                                Users
                            </a>
                        </li>
                    </ul>

                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">My Blogs</h1>
                </div>

                <!-- Error Handling -->
                <?php
                if (!empty($exec_err)) {
                    echo '<div class="alert alert-danger">' . $exec_err . '</div>';
                }
                ?>
                <!-- End Error Handling -->

                <form method="post" action="create.php" enctype="multipart/form-data" class="mb-5">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control <?php echo (!empty($title_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $title; ?>" id="title" name="title">
                        <span class="invalid-feedback"><?php echo $title_err; ?></span>
                    </div>
                    <div class="mb-3">
                        <label for="category" class="form-label">Category</label>
                        <select id="category" class="form-select <?php echo (!empty($category_id_err)) ? 'is-invalid' : ''; ?>" name="category_id">
                            <option value="" selected>Pilih Kategori</option>
                            <?php
                            $query = "SELECT * FROM `categories`";
                            // FETCHING DATA FROM DATABASE
                            $result = mysqli_query($link, $query);

                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    if ($row["id"] == $category_id) {
                            ?>
                                        <option value="<?php echo $row["id"] ?>" selected>
                                            <?php echo $row["name"] ?></option>
                                    <?php
                                    } else {
                                    ?>
                                        <option value="<?php echo $row["id"] ?>">
                                            <?php echo $row["name"] ?></option>
                            <?php
                                    }
                                }
                            }
                            ?>
                        </select>
                        <span class="invalid-feedback"><?php echo $category_id_err; ?></span>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Upload images</label>
                        <img class="img-preview img-fluid mb-1 d-block" width="150px">
                        <input type="file" name="image" id="image" class="form-control <?php echo (!empty($image_err)) ? 'is-invalid' : ''; ?>" onchange="previewImage(event)">
                        <span class="invalid-feedback"><?php echo $image_err; ?></span>
                    </div>
                    <div class="mb-3">
                        <label for="body" class="form-label">Body</label>
                        <textarea name="body" id="summernote" class="<?php echo (!empty($body_err)) ? 'is-invalid' : ''; ?>"><?php echo $body; ?></textarea>
                        <span class="invalid-feedback"><?php echo $body_err; ?></span>
                    </div>

                    <button type="submit" class="btn btn-primary" name="submit">Publish</button>
                </form>
            </main>
        </div>
    </div>

    <!-- include summernote libraries(jQuery, js) -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

    <!-- summernote -->
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                height: 400,
                toolbar: [
                    // [groupName, [list of button]]
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']],
                    ['view', ['table', 'fullscreen', 'codeview', 'help']],
                ],
                disableDragAndDrop: true,
                tabDisable: true,
            });
        });
    </script>

    <!-- summernote js -->
    <script src="../../../assets/summernote/summernote-lite.js"></script>

    <!-- Bootstrap script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- Feather Icon -->
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous">
    </script>

    <!-- Customize js -->
    <script src="../../js/dashboard.js"></script>

    <script>
        function previewImage(event) {
            var input = event.target;
            var image = document.querySelector('.img-preview');
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    image.src = e.target.result;
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</body>

</html>