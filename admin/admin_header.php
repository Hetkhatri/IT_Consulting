<?php
$currentPage = basename($_SERVER['SCRIPT_NAME']);
$pageTitle = "";

$menuItems = [
    [
        "menuTitle" => "Menu",
        "icon" => "fas fa-home",
        "pages" => [
            ["title" => "Home", "url" => "index.php"]
        ],
    ],
    // [
    //     "menuTitle" => "Settings",
    //     "icon" => "fas fa-cogs",
    //     "pages" => [
    //         ["title" => "Profile", "url" => "profile.php"],
    //     ]
    // ]
];

$breadcrumbItems = [];
foreach ($menuItems as $menuItem) {
    foreach ($menuItem['pages'] as $page) {
        if ($currentPage === $page['url']) {
            $breadcrumbItems[] = ["title" => $menuItem['menuTitle'], "url" => "#"];
            $breadcrumbItems[] = ["title" => $page['title'], "url" => $page['url']];
            $pageTitle = $page['title'];
            break;
        }
    }
}
?><ul class="navbar-nav ml-auto">
     

<head>
    <title><?= $pageTitle ?></title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="admin_home.php" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a onclick="logout()" class="nav-link">Logout</a>
        </li>
    </ul>
    <!-- <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Search" name="search">
            <div class="input-group-append">
                <button class="btn btn-navbar" type="submit"><i class="fas fa-search"></i></button>
            </div>
        </div>
    </form> -->
       
    </ul>
</nav>

<div class="main-header" style="padding: 0px 10px; background-color: #f4f6f9; border-bottom: none !important;">
    <div class="content-header">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark"> <?= $pageTitle ?> </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <?php foreach ($breadcrumbItems as $item): ?>
                        <li class="breadcrumb-item <?= $item['url'] === '#' ? 'active' : '' ?>">
                            <?= $item['url'] === '#' ? $item['title'] : "<a href='{$item['url']}'>{$item['title']}</a>" ?>
                        </li>
                    <?php endforeach; ?>
                </ol>
            </div>
        </div>
    </div>
</div>
<?php
include('../Database/database_connectivity.php');
// Check if the session variable 'email' is set
?>
<?php
// Check if the session variable 'email' is set
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    // Database query to fetch username
    $query = "SELECT username FROM admin_signup WHERE email = '$email'";
    $stmt = $connection->prepare($query);
    //  $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $username = $row['username'];
    } else {
        $username = "Guest1";  // Default if user is not found in the database
    }
    $stmt->close();
} else {
    // If 'email' is not in the session, set a default username
    $username = "Guest";
    // Optionally redirect to login page if not logged in
    // header("Location: login.php");
    // exit();
}
?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="./" class="brand-link">
        <img src="../src/images/logo.png" alt="Admin Panel Logo" class="brand-image img-circle elevation-3">
        <span class="brand-text font-weight-light"><?php echo $username ?></span>
    </a>
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="../src/images/default.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="./" class="d-block">Twinder spot</a>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
                <?php foreach ($menuItems as $menuItem): ?>
                    <?php $isMenuOpen = false;
                    $isActive = false;
                    foreach ($menuItem['pages'] as $page) {
                        if ($currentPage === $page['url']) {
                            $isActive = true;
                            $isMenuOpen = true;
                            break;
                        }
                    }
                    ?>
                    <li class="nav-item has-treeview <?= $isMenuOpen ? 'menu-open' : '' ?>">
                        <a class="nav-link <?= $isActive ? 'active' : '' ?>">
                            <i class="nav-icon <?= $menuItem['icon'] ?>"></i>
                            <p>
                                <?= $menuItem['menuTitle'] ?>
                                <?= !empty($menuItem['pages']) ? '<i class="right fas fa-angle-left"></i>' : '' ?>
                            </p>
                        </a>
                        <?php if (!empty($menuItem['pages'])): ?>
                            <ul class="nav nav-treeview">
                                <?php foreach ($menuItem['pages'] as $page): ?>
                                    <li class="nav-item">
                                        <a href="<?= $page['url'] ?>"
                                            class="nav-link <?= $currentPage === $page['url'] ? 'active' : '' ?>">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p><?= $page['title'] ?></p>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </nav>
    </div>
</aside>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function logout() {
        Swal.fire({
            title: 'Are you sure?',
            text: "You will be logged out!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, log me out!'
        }).then((result) => {
            if (result.value) {
                window.location.href = '../index.php';
            }
        });
    }
</script>