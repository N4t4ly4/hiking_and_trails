<link rel="stylesheet" href="C:\xampp\htdocs\hiking-and-trails\styles.css">

<ul>
        <li><a class="active" href="#home">Home</a></li>
    
        <?php if ( isset($_SESSION['email'])  ): ?>
        <li><a href="add_hike.php">Submit a Hike</a></li>
        <?php endif ?>

        <!-- These will only show if admin (need to add functionality)-->
        <?php if ( isset($_SESSION['admin']) && $_SESSION['admin'] == 'isAdmin'  ): ?>
        <li><a href="#">Approve Hikes</a></li>
        <li><a href="#">Dashboard</a></li>
        <?php endif ?>
        
        <li style="float:right">
        <?php if (isset($_SESSION['email'])): ?>
        <a href="logout.php"><?php echo $_SESSION['email']. "   - Logout " ?></a>
        <?php else: ?>
            <a href="login.php">Login</a>
        <?php endif ?>
        </li>

        <li style="float:right">
        <?php if (isset($_SESSION['email'])): ?>

        <?php else: ?>
            <a href="signup.php">Sign Up</a>
        <?php endif ?>
        </li>
</ul>