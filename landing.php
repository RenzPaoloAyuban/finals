<?php include("login.php"); ?>
<?php include("signup.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="U    TF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Furfolio | Be A Proud Cat Parent</title>
    
    <?php include("header.php"); ?>
    <div class="container" id="container">
        <section class="panel1" id="home">
            <div class="welcome-pic">
                <h1>WELCOME, <br> 
                FUR PARENTS</h1>
                <img src="img/cats.png" alt="cats">
            </div>
            <div class="join-us">
                <h1>Join Furfolio Today!</h1>
                <p>Showcase your cat's unique personality, adorable photos, and <br>
                fascinating stories. Explore a world of delightful cat content, from <br>
                cute antics to heartwarming moments.</p>
                <p>Sign up now and let your cat’s story be heard. Join FurFolio and <br>
                celebrate the joy of being a cat parent!</p>
                <div class="join-buttons">
                    <button onclick="signupPopup()">SIGN UP</button>
                    <p>or</p>
                    <button onclick="loginPopup()">LOGIN</button>
                </div>
            </div>
        </section>
        <section class="panel2" id="aboutus">
            <div class="aboutus-desc">
                <h1>About Us</h1>
                <p>At FurFolio, we believe every cat has a unique story that deserves to <br>
                be shared. Our platform is dedicated to celebrating the charm, <br>
                personality, and beauty of cats from around the world.</p>
                <p>Whether you're a proud cat parent, an enthusiastic admirer, or <br>
                someone looking to connect with a community of like-minded cat <br>
                lovers, FurFolio is the place for you.</p>
                <p>We aim to provide a vibrant and welcoming space where cat <br>
                enthusiasts can come together to share, connect, and celebrate their <br>
                feline companions. We aim to foster a community that appreciates the <br>
                joy, companionship, and wonder that cats bring into our lives.</p>
            </div>
            <div class="aboutus-pic">
                <img src="img/cat-parent.jpg" alt="catparent">
            </div>
        </section>
        <section class="panel3" id="whycats">
            <h1>Why We Love Cats?</h1>
            <div class="lovecat-rect">
                <div class="lovecat-catpics">
                    <div class="image-container">
                        <img src="img/cats.png" alt="cat1">
                    </div>
                    <p>Cats are known for their distinct and often quirky personalities. 
                    From playful and adventurous to calm and contemplative, 
                    every cat has a unique character that makes them truly special.</p>
                </div>
                <div class="lovecat-catpics">
                    <div class="image-container">
                        <img src="img/cats.png" alt="cat1">
                    </div>
                    <p>Cats have an incredible ability to provide comfort and companionship. 
                    Their presence can be soothing and uplifting, offering emotional 
                    support and unconditional love.</p>
                </div>
                <div class="lovecat-catpics">
                    <div class="image-container">
                        <img src="img/cats.png" alt="cat1">
                    </div>
                    <p>Whether it’s their playful antics, graceful movements, or curious explorations, 
                    cats never cease to entertain us. They bring joy and laughter into our lives 
                    with their unpredictable and often amusing behavior.</p>            
                </div>
            </div>
        </section>
        
        <div class="login-container" id="loginPop">
            <h2>Login</h2>
            <form action="" method="post" autocomplete="off">
                <label for="useremail">Username or Email: </label>
                <input type="text" name="useremail" id="useremail" required>
                <label for="userpassword">Password: </label>
                <input type="password" name="userpassword" id="userpassword" required>
                <button type="submit" name="login-sbmt">LOGIN</button>
            </form>
                <button type="submit" onclick="closePopup()">CLOSE</button>
                <hr>
                <p>No Account?<a onclick="signupPopup()">Sign Up</a> Now!</p>
        </div>

        <div class="signup-container" id="signupPop">
        <h2>Sign Up</h2>
            <form action="" method="post" autocomplete="off">
                <label for="name">Name: </label>
                <input type="text" name="name" id="name" required>
                <label for="username">Username: </label>
                <input type="text" name="username" id="username" required>
                <label for="email">Email: </label>
                <input type="email" name="email" id="email" required>
                <label for="password">Password: </label>
                <input type="password" name="password" id="password" required>
                <label for="confirmpassword">Confirm Password: </label>
                <input type="password" name="confirmpassword" id="confirmpassword" required>
                <button type="submit" name="signup-sbmt">SIGN UP</button>
            </form>
            <button type="submit" onclick="closePopup()">CLOSE</button>
        </div>
    </div>
    <?php include("footer.php"); ?>

   