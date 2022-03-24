<?php 
    $page_title = 'About Us';
    include '../includes/header.php';
?>
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
            </nav>
            <div class="nav-left">
                <a href="<?php echo $base_url ?>user/auth/logout.php">Log out</a>
                <a href="<?php echo $base_url ?>user/addroom.php" >Add rooms</a>
            </div>
        </header>
    </div>
    <div class="about-body">
        <h3>About CMet</h3>
        <hr />
        <div class="about-cmet">
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                Elit venenatis hendrerit nulla in justo blandit. Pulvinar mi dui diam in. 
                Tellus tristique eget auctor suspendisse lobortis consectetur augue egestas. 
                Scelerisque cum ante cras nunc non. Sem tristique ipsum massa dignissim dui enim ac 
                sit. Egestas amet pretium neque sollicitudin sapien, vulputate. Vitae fermentum, sit 
                velit aenean tristique in. Gravida dictum sodales pharetra, suspendisse. In tincidunt 
                gravida blandit massa. Pharetra interdum egestas sit a in egestas. Enim lacinia non 
                fringilla nulla habitant urna leo semper.
            </p>
            <img src="../assets/img/about2.png" alt="">
        </div>
        <h3>About the developer</h3>
        <hr />
        <div class="about-cmet">
            <img src="../assets/img/about1.png" alt="">
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                Elit venenatis hendrerit nulla in justo blandit. Pulvinar mi dui diam in. 
                Tellus tristique eget auctor suspendisse lobortis consectetur augue egestas. 
                Scelerisque cum ante cras nunc non. Sem tristique ipsum massa dignissim dui enim ac 
                sit. Egestas amet pretium neque sollicitudin sapien, vulputate. Vitae fermentum, sit 
                velit aenean tristique in. Gravida dictum sodales pharetra, suspendisse. In tincidunt 
                gravida blandit massa. Pharetra interdum egestas sit a in egestas. Enim lacinia non 
                fringilla nulla habitant urna leo semper.
            </p>
        </div>
    </div>