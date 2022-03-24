<?php 
    $page_title = 'Edit room';
    include '../lib/dfunc.php';
    include '../includes/header.php';

    $message = '';
    if(isset($_POST['editroom'])){
        $roomId = $_POST['room_id'];
        $roomName = $_POST['room_name'];
        $roomLoc = $_POST['room_location'];
        $roomDec = $_POST['room_description'];
        $roomCat = $_POST['room_category'];
        $roomPrice = $_POST['room_price'];
        $keywords = $_POST['keywords'];
        $videoUrl = $_POST['video_url'];
        $imageUrl = $_POST['image_url'];

        //Unset submit
        unset($_POST['submit']);

        $cmdtext = "UPDATE `room_details` SET `room_name`='$roomName', `room_price`='$roomPrice', `room_location`='$roomLoc', `room_description`='$roomDec',`room_category`='$roomCat',`keywords`='$keywords',`video_url`='$videoUrl',`image_url`='$imageUrl' WHERE room_id = '$roomId'";

        $res = executeQuery($cmdtext);
        if($res){
            $message = $room_edit_success;
        }
        else{
            $message = $room_edit_error;
        }
    }

    $inc = array();
    if(!isset($_GET['id'])){
        // Redirect to view
        redirect($base_url.'user');
    }
    else{
        $cmdtext = "SELECT * FROM room_details WHERE room_id = ".$_GET['id'];
        $result = executeQuery($cmdtext);
        $inc = mysqli_fetch_array($result);
    }
?>
        <link rel="stylesheet" href="../css/addroom.css">
    </head>
<body>
    <div class="section_header-color">
        <header>
            <h1>
                CMet
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
    <div class="room_details">
        <h3>Add Room Details/Edit Room Details</h3>
        <p>When adding room details here, fill in the required fields completely and follow the room adding rules./</p>
        <hr />
        <form method="post">
            <?php if($message != ''): ?>
                <div style="color: #0f5132; background-color: #d1e7dd; border-color: #badbcc; padding: 20px 10px;"><?php echo $message ?></div>
            <?php endif; ?>
            <input type="hidden" name="room_id" value="<?php echo $inc['room_id'] ?>">
            <div class="form_container">
                <div class="form_container-element">
                    <label for="room_name">Room Name</label>
                    <input type="text" name="room_name" value="<?php echo $inc['room_name'] ?>" />
                </div>
            </div>
            <div class="form_container">
                <div class="form_container-element">
                    <label for="room_location">Room Location</label>
                    <input type="text" name="room_location" value="<?php echo $inc['room_location'] ?>" />
                </div>
            </div>
            <div class="form_container">
                <div class="form_container-element">
                    <label for="room_category">Room Category</label>
                    <input type="text" name="room_category" value="<?php echo $inc['room_category'] ?>" />
                </div>
                <div class="form_container-element">
                        <label for="room_price">Room price</label>
                        <input type="number" name="room_price" value="<?php echo $inc['room_price'] ?>" />
                </div>
            </div>

            <div class="form_container">
                <div class="form_container-element">
                    <label for="room_available">Room Available</label>
                    <input type="number" name="room_available" value="<?php echo $inc['room_available'] ?>" />
                </div>
                <div class="form_container-element">
                        <label for="keywords">Keywords</label>
                        <input type="text" name="keywords" value="<?php echo $inc['keywords'] ?>" />
                </div>
            </div>

            <div class="form_container">
                <div class="form_container-element">
                    <label for="image_url">Image Url</label>
                    <input type="text" name="image_url" value="<?php echo $inc['image_url'] ?>" />
                </div>
                <div class="form_container-element">
                        <label for="video_url password">Video Url</label>
                        <input type="text" name="video_url" value="<?php echo $inc['video_url'] ?>" />
                </div>
            </div>
        
            <div class="form_container" style="flex-direction: column;">
                <p>Description </p>
                <textarea name="room_description" rows="5" style="width: 100%;"><?php echo $inc['room_description'] ?></textarea>
            </div>

            <div class="form_container-button">
                <button type="submit" name="editroom">Edit Room</button>
                <a href="#" onclick="document.location.href='<?php echo $base_url ?>user';">Cancel</a>
                <a href="<?php echo $base_url.'user/deleteroom.php?id='.$inc['room_id'] ?>">Delete</a>
            </div>
        </form>
    </div>
    <script src="../js/main.js"></script>