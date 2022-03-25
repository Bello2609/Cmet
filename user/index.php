<?php 
    $page_title = 'CMetRentalRooms. Home';
    include '../lib/dfunc.php';
    include '../includes/header.php';

    $currentUser = $_SESSION['ssUser'];
    $currentUserId = $_SESSION['ssUser']['user_id'];

    $cmdtext = "SELECT * FROM room_details WHERE user_id = $currentUserId order by created_at desc";
    $result = executeQuery($cmdtext);

    $cmdtext2 = "SELECT * FROM room_details";
    $result2 = executeQuery($cmdtext2);
?>
        <link rel="stylesheet" href="../css/index.css">
        <link rel="stylesheet" href="../assets/fontawesome/css/all.min.css">
    </head>
<body>
    <section class="section_header">
        
    </section>

    <div class="section_header-color">
        <header>
            <h1>
                CMetRentalRooms
            </h1>
            
            <div class="burger_container">
                <div class="burger"></div>
                <div class="burger"></div>
                <div class="burger"></div>
            </div>
            <nav class="nav">
                <ul>
                    <li><a href="<?php echo $base_url ?>user">Home</a></li>
                    <li><a href="<?php echo $base_url ?>user/about.php">About us</a></li>
                    <li><a href="#">My account</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
                <div class="nav-left">
                    <p><a href="<?php echo $base_url ?>user/auth/logout.php">Log out</a></p>
                    <a class="addroom" href="<?php echo $base_url ?>user/addroom.php" >Add rooms</a>
                </div>
            </nav>
        </header>
        <div class="section_body">
            <h1>Welcome,<br />
            <h1><?php echo ucfirst($currentUser['first_name']) ?>!</h1>
            <p>Explore the various featured rooms and properties by other<br />
                local landlords and property agencies. And advertise<br />
                your own availabe rooms.</p>
        </div>
    </div>

    <section class="explore-room">
        <div class="explore-room_property">
            <h4>Explore Featured Property</h4>
            <p>See all</p>
        </div>
        <div class="explore-room_card">
            <?php if(mysqli_num_rows($result2) > 0): ?>
                <?php $count = 0 ?>
                <?php while($row = mysqli_fetch_assoc($result2)): ?>
                    <?php if($count >3) break; ?>
                    <div class="explore-room_card-element">
                        <img src="<?php echo $row['image_url'] ?>" alt="" srcset="">
                        <div class="info">
                            <p><?php echo $row['room_category'] ?></p>
                            <p>$<?php echo $row['room_price'] ?>/Month</p>
                        </div>
                        <p><?php echo $row['room_available'] ?> availabe rooms</p>
                        <h5><i class="fa-solid fa-location-dot"></i><?php echo $row['room_location'] ?></h5>
                    </div>
                    <?php $count++; ?>
                <?php endwhile; ?>
            <?php else: ?>
                <div class="explore-room_card-element">
                    <img src="../assets/img/card3.png" alt="" srcset="">
                    <div class="info">
                        <p>Luxury </p>
                        <p>$850/Month</p>
                    </div>
                    <p>5 availabe rooms</p>
                    <h5<i class="fa-solid fa-location-dot"></i>>92 Teru Road, Canada</h5>
                </div>
                <div class="explore-room_card-element">
                    <img src="../assets/img/card2.png" alt="" srcset="">
                    <div class="info">
                        <p>Luxury </p>
                        <p>$850/Month</p>
                    </div>
                    <p>5 availabe rooms</p>
                    <h5><i class="fa-solid fa-location-dot"></i>92 Teru Road, Canada</h5>
                </div>
                <div class="explore-room_card-element">
                    <img src="../assets/img/card1.png" alt="" srcset="">
                    <div class="info">
                        <p>Luxury </p>
                        <p>$850/Month</p>
                    </div>
                    <p>5 availabe rooms</p>
                    <h5><i class="fa-solid fa-location-dot"></i>92 Teru Road, Canada</h5>
                </div>
                <div class="explore-room_card-element">
                    <img src="../assets/img/card2.png" alt="" srcset="">
                    <div class="info">
                        <p>Luxury </p>
                        <p>$850/Month</p>
                    </div>
                    <p>5 availabe rooms</p>
                    <h5><i class="fa-solid fa-location-dot"></i>92 Teru Road, Canada</h5>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <section class="explore-room">
        <div class="explore-room_property">
            <h4>Your property</h4>
            <!-- <p>See all</p> -->
        </div>
        <div class="explore-room_card">
            <?php if(mysqli_num_rows($result) > 0): ?>
                <?php while($row = mysqli_fetch_assoc($result)): ?>
                    <div class="explore-room_card-element">
                        <img src="<?php echo $row['image_url'] ?>" alt="" srcset="">
                        <div class="info">
                            <p><?php echo $row['room_category'] ?></p>
                            <p>$<?php echo $row['room_price'] ?>/Month</p>
                        </div>
                        <p><?php echo $row['room_available'] ?> availabe rooms</p>
                        <h5><i class="fa-solid fa-location-dot"></i><?php echo $row['room_location'] ?></h5>
                        <a href="<?php echo $base_url.'user/roomdetail.php?id='.$row['room_id'] ?>">See details</a>
                        <a href="<?php echo $base_url.'user/editroom.php?id='.$row['room_id'] ?>">Edit</a>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p>You have no room yet</p>
            <?php endif; ?>
        </div>
    </section>
    <section class="explore-room">
        <div class="explore-room_property">
            <h4>Recommend</h4>
            <p>See all</p>
        </div>
        <div class="explore-room_card">
            <div class="explore-room_card-element">
                <img src="/assets/img/card3.png" alt="" srcset="">
                <div class="info">
                    <p>First class</p>
                    <p>$850/Month</p>
                </div>
                <p>5 availabe rooms</p>
                <h5><i class="fa-solid fa-location-dot"></i>92 Teru Road, Canada</h5>
            </div>
            <div class="explore-room_card-element">
                <img src="/assets/img/card2.png" alt="" srcset="">
                <div class="info">
                    <p>Luxury </p>
                    <p>$850/Month</p>
                </div>
                <p>5 availabe rooms</p>
                <h5><i class="fa-solid fa-location-dot"></i>92 Teru Road, Canada</h5>
            </div>
            <div class="explore-room_card-element">
                <img src="/assets/img/card1.png" alt="" srcset="">
                <div class="info">
                    <p>Business Suite</p>
                    <p>$850/Month</p>
                </div>
                <p>5 availabe rooms</p>
                <h5><i class="fa-solid fa-location-dot"></i>92 Teru Road, Canada</h5>
            </div>
            <div class="explore-room_card-element">
                <img src="/assets/img/card2.png" alt="" srcset="">
                <div class="info">
                    <p>Royal Double</p>
                    <p>$850/Month</p>
                </div>
                <p>5 availabe rooms</p>
                <h5><i class="fa-solid fa-location-dot"></i>92 Teru Road, Canada</h5>
            </div>
        </div>
    </section>

    <script src="../js/main.js"></script>
<?php include '../includes/footer.php'?>