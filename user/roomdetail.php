<?php 
     $page_title = 'Room Detials';
     include '../lib/dfunc.php';
     include '../includes/header.php';

    $inc = array();
    if(!isset($_GET['id'])){
        redirect($base_url.'user');
    }
    else{
        $cmdtext = "SELECT * FROM room_details WHERE room_id = ".$_GET['id'];
        $result = executeQuery($cmdtext);
        $inc = mysqli_fetch_array($result);
    }
?>
        <link rel="stylesheet" href="../css/roomdetails.css">
        <link rel="stylesheet" href="../css/bootstrap.css">
        <link rel="stylesheet" href="../assets/fontawesome/css/all.min.css">
    </head>
<body>
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
    </div>
    <div class="room-header_info">
        <div class="room-header_navigation">
            <p>Home    >    Explore Featured Property    >    Luxury    </p>
        </div>
        <div class="room-header_info-icon" style="margin-top: 70px;">
            <span>
                <a href="<?php echo $base_url.'user/editroom.php?id='.$inc['room_id'] ?>">
                    <i class="fa-regular fa-pen-to-square"></i>
                </a>
                <a href="<?php echo $base_url.'user/deleteroom.php?id='.$inc['room_id'] ?>">
                    <i class="fa-regular fa-trash-can"></i>
                </a>
            </span>
        </div>
    </div>
    <div class="room-container">
        <div class="room-details">
            <div>
                <img src="<?php echo $inc['image_url'] ?>" alt="" />
            </div>
            <div class="room_description">
                <div class="room_details-element">
                    <h4>Luxury rooms for rent</h4>
                    <h5>$<?php echo $inc['room_price'] ?></h5>
                </div>
                <div class="room_details-element">
                    <address><?php echo $inc['room_location'] ?></address>
                    <p>per month</p>
                </div>
                <h5>Available Rooms: <b><?php echo $inc['room_available'] ?></b> </h5>
                <h6>Description</h6>
                <p><?php echo $inc['room_description'] ?></p>
            </div>
            
        </div>
    </div>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/main.js"></script>