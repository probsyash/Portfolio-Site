<?php
session_start();
include("connection.php");

$sql = "SELECT * FROM blog_posts";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Blog | My Portfolio</title>

    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/styles.css">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
</head>

<body>

    <!-- Header and Navigation -->
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="education.php">Education</a></li>
                <li><a href="portfolio.php">Portfolio</a></li>
                <li><a href="viewBlog.php">Blog</a></li>
                <li><a href="skills.php">Skills</a></li>
            </ul>
        </nav>

        <!-- Login Button -->
        <button class="loginCircle" id="loginBtn">
            <img src="images/login.png" alt="Login">
        </button>
    </header>

    <!-- Login Modal -->
    <div id="id01" class="modal">
        <form class="modal-content animate" action="loginProcess.php" method="post">
            <div class="container">
                <h2>Login</h2>

                <label for="uname"><b>Email</b></label>
                <input type="email" placeholder="Enter Email" name="uname" id="uname" required>

                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="psw" id="psw" required>

                <button type="submit" class="loginBtn">Login</button>

                <label>
                    <input type="checkbox" checked="checked" name="remember"> Remember me
                </label>
            </div>
        </form>
    </div>

    <!-- Background Video -->
    <div class="backgroundVideo">
        <video loop autoplay muted playsinline src="videos/galaxy.mp4" type="video/mp4"></video>
    </div>

    <article>

        <!-- Page Title Section -->
        <section class="profileHeader">
            <div class="profileInfo">
                <h1 class="name">Blog</h1>
                <p class="welcome">My latest posts</p>
            </div>
        </section>

        <section class="cardsContainer">

            <div class="card aboutMeCard">
                <div class="cardIconWrap">
                    <span class="cardIcon">📝</span>
                </div>
                <span class="cardLabel">Blog</span>
            </div>

            <?php if (isset($_SESSION['username'])): ?>
                <div class="card mainCard">
                    <p>Welcome, Yashaskar!</p>
                    <a href="addEntry.php" class="submitBtn">Add Post</a>
                    <a href="logout.php" class="submitBtn">Logout</a>
                </div>
            <?php endif; ?>

            <?php if (mysqli_num_rows($result) > 0): ?>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <div class="card mainCard blogEntry">
                        <p class="blogDate"><?php echo $row['date_posted'] . " " . $row['time_posted']; ?></p>
                        <h2 class="blogTitle"><?php echo $row['title']; ?></h2>
                        <hr>
                        <p class="blogContent"><?php echo $row['content']; ?></p>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <div class="card mainCard">
                    <p>No blog posts yet.</p>
                </div>
            <?php endif; ?>

        </section>

    </article>

    <!-- Footer -->
    <footer>
        <p>&copy; 2026 Yashaskar Karmacharya | All Rights Reserved</p>
        
        <p class="videoCredit">
            Background video by 
            <a href="https://www.youtube.com/watch?v=moRqo158NGc" target="_blank">MiladiCode</a> 
            via Youtube
        </p>

        <div class="footerLinks">
            <a href="https://www.linkedin.com/in/yashaskar-karmacharya" target="_blank" class="footerLink">
                <img src="https://img.shields.io/badge/linkedin-%230077B5.svg?style=for-the-badge&logo=linkedin&logoColor=white" alt="LinkedIn">
            </a>
            <a href="https://github.com/probsyash" target="_blank" class="footerLink">
                <img src="https://img.shields.io/badge/github-%23121011.svg?style=for-the-badge&logo=github&logoColor=white" alt="GitHub">
            </a>
        </div>
    </footer>

    <!-- JavaScript -->
    <script src="js/login.js"></script>

</body>
</html>