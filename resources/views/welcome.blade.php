
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="css/style.css"> 
    <title>Bloges Tech</title>
</head>
<body>
    <div class="header">
        <div class="container">
                
            <div class="slider">
                <div class="container">

                    <div class="intro">
                        <h2> Blog Tech </h2>
                       

                 </div>

            </div>
                        
     </div>
     
            <div class="navbar">
                <!-- start header -->
                    
                
                







                                <div class="container">
                                    <h2><span>B</span>logs </h2>
                                    <ul>
                                        
                                            @if (Route::has('login'))
                                                
                                            @auth
                                                <li class="active"> <a href="{{ url('/home') }}" class="">Home</a></li>
                                            @else
                                                <li> <a href="{{ route('login.user') }}" class="">Login</a></li>
                                                <li> <a href="{{ route('login.admin') }}" class="">Login As Admin</a></li>
                                                @if (Route::has('register'))
                                                    <li> <a href="{{ route('register') }}" class="">Singup</a></li>
                                                @endif
                                            @endauth

                                            @endif
                                        
                                    </ul>
                                </div>
                        
                    </div>


                </div>
    </div>
                        <!-- end header -->
                       


                           <!--   start featuers -->
                                    <div class="features">
                                            <div class="container">
                                                <div class="feat">
                                                <h3>Definition of blogging</h3>
                                                        <p>Blogging is a collection of skills that one needs to run and supervise a blog. 
                                                            This entails equipping a web page with tools to make the process of writing, posting,
                                                            linking,
                                                            and sharing content easier on the internet.</p>
                                                </div>
                                                <div class="feat">
                                                    <h3>Why is blogging so popular?</h3>
                                                        <p>It’s important to mention that the popularity of blogging grows with each passing day!
                                                            To answer the question ‘what is blogging’,
                                                            we need to look at the factors behind its rise.</p>
                                                </div>
                                                <div class="feat">
                                                    <h3>Definition of a blogger</h3>
                                                        <p>A blogger is someone who runs and controls a blog.
                                                            He or she shares his or her opinion and knowledge on different topics
                                                            for a target audience.</p>
                                                </div>
                                            </div>
                                        </div>

                                                 <!--   end featuers -->




                        



                        <!-- start About use -->

                                <div class="about-use">
                                    <div class="container">
                                        <div class="image">
                                            <img src="../images/how-to-write-a-good-blog-post.png" alt="test">
            
                                            </div>

                                        <div class="info">
                                            <h2>What is Blog? </h2>
                                            <p>  A blog (a shortened version of “weblog”) is an online journal or informational website displaying information in reverse chronological order,
                                                    with the latest posts appearing first, at the top. 
                                                It is a platform where a writer or a group of writers share their views on an individual subject.</p>
                                        </div> 
                                    </div>
                                </div>
                        <!-- end About use -->

                            <div class="contact-use">
                                <h2>information about contact  </h2>
                                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                        Placeat quo nulla voluptate ab.
                                        Natus in possimus quidem aspernatur suscipit facilis
                                        deserunt eveniet numquam. Voluptas in dolore quibusdam
                                        cupiditate.
                                        Eveniet, architecto!</p>
                            </div>

                    <div class="footer">
                    
                                <p>  Copyright &copy 2022 - 2023 by Ammar Abu Azzam • All Rights Reserved</p>
                    </div>






</body>
</html>









{{-- hhhhhhhhhhhhhhhhhhhhhhhhh --}}



