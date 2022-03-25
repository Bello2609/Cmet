<?php 
    $page_title = 'Add room';
    include '../lib/dfunc.php';
    include '../includes/header.php';

    $message = '';
    $userId = $_SESSION['ssUser']['user_id'];
    if(isset($_POST['addroom'])){
        $_POST['user_id'] = $userId;

        //Unset submit
        unset($_POST['addroom']);
        $cmdtext = sprintf(
            "INSERT INTO %s (%s) values ('%s')",
            "room_details",
            implode(", ", array_keys($_POST)),
            implode("', '", array_values($_POST))
        );

        $res = executeQuery($cmdtext);
        if($res){
            $message = $room_create_success;
        }
        else{
            $message = $room_create_error;
        }
    }
?>  
        
        <link rel="stylesheet" href="../css/addroom.css">
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
    <div class="room_details">
        <h3>Add Room Details/Edit Room Details</h3>
        <p>When adding room details here, fill in the required fields completely and follow the room adding rules./</p>
        <hr />
        <form method="post">
            <?php if($message != ''): ?>
                <div style="color: #0f5132; background-color: #d1e7dd; border-color: #badbcc; padding: 20px 10px;"><?php echo $message ?></div>
            <?php endif; ?>
            <div class="form_container">
                <div class="form_container-element">
                    <label for="room_name">Room Name</label>
                    <input type="text" name="room_name" />
                </div>
            </div>
            <div class="form_container">
                <div class="form_container-element">
                    <label for="room_location">Room Location</label>
                    <input type="text" name="room_location" />
                </div>
            </div>
            <div class="form_container">
                <div class="form_container-element">
                    <label for="room_category">Room Category</label>
                    <input type="text" name="room_category" />
                </div>
                <div class="form_container-element">
                        <label for="room_price">Room price</label>
                        <input type="number" name="room_price" />
                </div>
            </div>

            <div class="form_container">
                <div class="form_container-element">
                    <label for="room_available">Room Available</label>
                    <input type="number" name="room_available" />
                </div>
                <div class="form_container-element">
                        <label for="keywords">Keywords</label>
                        <input type="text" name="keywords" />
                </div>
            </div>

            <div class="form_container">
                <div class="form_container-element">
                    <label for="image_url">Image Url</label>
                    <input type="text" name="image_url" />
                </div>
                <div class="form_container-element">
                        <label for="video_url password">Video Url</label>
                        <input type="text" name="video_url" />
                </div>
            </div>
        
            <div class="form_container" style="flex-direction: column;">
                <label style="display: block;">Description </label>
                <textarea name="room_description" rows="5" style="width: 100%;"></textarea>
            </div>

            <div class="form_container-button">
                <button type="submit" name="addroom">Add Room</button>
                <a href="#" onclick="document.location.href='<?php echo $base_url ?>user';">Cancel</a>
            </div>
            
        </form>
    </div>