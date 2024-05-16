<?php 
  $data = file_get_contents('./assets/config/blog.json');
  $dataArray = json_decode($data, true);
  $idToFilter = $_GET['id'];
  $result = array_filter($dataArray, function($item) use ($idToFilter) {
      return $item["id"] == $idToFilter;
  });

  // print_r($result);
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DevBlog - Julia Walker's Personal Blog</title>
<style>
  select:focus {
    border: none;
    outline-offset: 0px;
    text-decoration: none;
    outline: none;
  }
  select:focus-visible {
    border: none;
    outline-offset: 0px;
    text-decoration: none;
    outline: none;
  }
  
</style>
  <!--
    - favicon
  -->
  <link rel="shortcut icon" href="./assets/images/favicon.ico" type="image/x-icon">

  <!--
    - custom css link
  -->
  <link rel="stylesheet" href="./assets/css/style.min.css">
  <link rel="stylesheet" href="./assets/css/blog.css">


  <!--
    - google font link
  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;900&display=swap" rel="stylesheet">
  <script src="./assets/js/tailwindcss.js"></script>
</head>

<body class="light-theme">

  <!--
    - #HEADER
  -->

  <header>

    <div class="container">

      <nav class="navbar">

        <a href="#">
          <img src="./assets/images/logo-light.svg" alt="Devblog's logo" width="150" height="40" class="logo-light">
          <img src="./assets/images/logo-dark.svg" alt="Devblog's logo" width="150" height="40" class="logo-dark">
        </a>

        <div class="btn-group">

          <button class="theme-btn theme-btn-mobile light">
            <ion-icon name="moon" class="moon"></ion-icon>
            <ion-icon name="sunny" class="sun"></ion-icon>
          </button>

          <button class="nav-menu-btn">
            <ion-icon name="menu-outline"></ion-icon>
          </button>

        </div>

        <div class="flex-wrapper">

          <ul class="desktop-nav">

            <li>
              <a href="./index.html" class="nav-link">Home</a>
            </li>

            <li>
              <a href="./blog.html" class="nav-link">Blog</a>
            </li>

            <li>
              <a class="nav-link">
                <select class="py-2 bg-transparent" onchange="Category(this)">
                  <option value="">Category</option>
                  <option value="database">database</option>
                  <option value="nodejs">nodejs</option>
                  <option value="performance">performance</option>
                  <option value="optimize">optimize</option>
                  <option value="inclusion">inclusion</option>
                  <option value="a11y">a11y</option>
                </select>
              </a>
            </li>

            <li>
              <a href="./about.html" class="nav-link">About</a>
            </li>

            <li>
              <a href="#" class="nav-link">Contact</a>
            </li>

          </ul>

          <button class="theme-btn theme-btn-desktop light">
            <ion-icon name="moon" class="moon"></ion-icon>
            <ion-icon name="sunny" class="sun"></ion-icon>
          </button>

        </div>

        <div class="mobile-nav">

          <button class="nav-close-btn">
            <ion-icon name="close-outline"></ion-icon>
          </button>

          <div class="wrapper">

            <p class="h3 nav-title">Main Menu</p>

            <ul>
              <li class="nav-item">
                <a href="./index.html" class="nav-link">Home</a>
              </li>

              <li>
                <a href="./blog.html" class="nav-link">Blog</a>
              </li>

              <li class="nav-item">
                <a href="./about.html" class="nav-link">About</a>
              </li>

              <li class="nav-item">
                <a href="#" class="nav-link">Contact</a>
              </li>
            </ul>

          </div>

        </div>

      </nav>

    </div>

  </header>





  <main>

    <!--
      - #HERO SECTION
    -->

<?php foreach($result as $items) {?>
    <div style="background: var(--background-secondary);" class="hero">
        <div class="view-page h2">
          <h2><?php echo $items['head']; ?></h2>
          <br>
          <img class="rounded-lg" src="<?php echo $items['url']; ?>" alt="blog">
          <br>
          <p class="block" style="font-weight: 500;font-size: 1.1rem;line-height: 1.8;color: var(--foreground-secondary);">
            <?php echo $items['paragraph']; ?>
          </p>
          <div class="space-y-2 mt-4 ">
            <div class="text-base shadow-lg h-20 flex items-center px-4 rounded-lg border-l-2 border-s-lime-700" >MongoDB Orchestration With Spring & Atlas Kubernetes Operator</div>
            <div class="text-base shadow-lg h-20 flex items-center px-4 rounded-lg border-l-2 border-s-lime-700" >Atlas Online Archive: Efficiently Manage the Data Lifecycle</div>
          </div>
          <div class="space-y-2 mt-12 text-center">
              <a target="blank" href="<?php echo $items['link']; ?>" class="border-2 py-2 px-4 rounded-lg text-lg bg-sky-500 border-sky-500 text-white">Click Here</a>
          </div>
          <p class="block mt-4" style="font-weight: 500;font-size: 1.1rem;line-height: 1.8;color: var(--foreground-secondary);">
            <?php echo $items['miniparagraph']; ?>
          </p>
          <div class="mt-8">
            <video class="h-full w-full rounded-lg" controls>
              <source
                src="<?php echo $items['video']; ?>"
                type="video/mp4"
              />
              Your browser does not support the video tag.
            </video>
          </div>
        </div>
    </div>
<?php } ?>





  </main>





  <!--
    - #FOOTER
  -->

  <footer>

    <div class="container">

      <div class="wrapper">

        <a href="#" class="footer-logo">
          <img src="./assets/images/logo-light.svg" alt="DevBlog's Logo" width="150" height="40" class="logo-light">
          <img src="./assets/images/logo-dark.svg" alt="DevBlog's Logo" width="150" height="40" class="logo-dark">
        </a>

        <p class="footer-text">
          Learn about Web accessibility, Web performance, and Database management.
        </p>

      </div>

      <div class="wrapper">

        <p class="footer-title">Quick Links</p>

        <ul>

          <li>
            <a href="#" class="footer-link">Advertise with us</a>
          </li>

          <li>
            <a href="#" class="footer-link">About Us</a>
          </li>

          <li>
            <a href="#" class="footer-link">Contact Us</a>
          </li>

        </ul>

      </div>

      <div class="wrapper">

        <p class="footer-title">Legal Stuff</p>

        <ul>

          <li>
            <a href="#" class="footer-link">Privacy Notice</a>
          </li>

          <li>
            <a href="#" class="footer-link">Cookie Policy</a>
          </li>

          <li>
            <a href="#" class="footer-link">Terms Of Use</a>
          </li>

        </ul>

      </div>

    </div>

  </footer>





  <!--
    - custom js link
  -->
  <script src="./assets/js/script.min.js"></script>

  <!--
    - ionicon link
  -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  <script>
    

    function Category(event) {
      // console.log(event.value)
      window.location.replace("http://localhost/devblog-personal-blog-website-master/blog.html?ref="+event.value);
    }
  </script>
</body>

</html>
