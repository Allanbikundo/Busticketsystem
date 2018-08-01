<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Bus Reservation System</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="css/style.css">


</head>

<body>

<header id="masthead" style="background-color: black;">
  <h1> We will get you the best and cheapest deals .</h1>
</header>
<header id="top-header">
  <nav id="main-menu">
    <ul>
        <a href="#"><li>Home</li></a>
        <a href="../index.php"><li>Log in</li></a>
        <a href="../register.php"><li>Register</li></a>

   </ul>
  </nav>
</header>
<div id="mobile-trigger-open">
  <p><i class="zmdi zmdi-chevron-left"></i></p>
</div>
<main>
  <section id="Book Seat">

<br/><br/>
  </section>
  <section id="articles-container">
    <!-- Article 1-->
    <header class="article-header">
      <h1>TRAVEL TO MOMBASA : Visit the amazing Fort Jesus!</h1>
    </header>
    <article><img src="images/Fort-Jesus.jpg"/>
      <article class="article">
        <p>Built by the Portuguese at the end of the 16th century at the southern edge of the town of Mombasa, over a spur of coral rock, and kept under their control for one century</p>
        <aside class="more-trigger">
          <p>Read More</p>
        </aside>
        <article class="more">
          <p>
              Fort Jesus, Mombasa, bears testimony to the first successful attempt
              by Western civilization to rule the Indian ocean trade routes, which, until then had remained under Eastern influence. The design of the fort, with its proportions, its imposing walls and five bastions, reflects the military architectural theory of the Renaissance. Fort Jesus, Mombasa,
               bears physical witness, in its structures and subsequent transformations,
               also to the interchange of cultural values and influences between and among peoples of African, Arab, Turkish, Persian and European origin that fought to gain and maintain their control over this strategic port.
          </p>
        </article>
      </article>
    </article>
    <hr/>
    <?php //contact us ?>
    <header class="article-header">
      <h1>Contact Us</h1>
    </header>
    <article><img src="images/contactus.jpg"/>
      <article class="article">
        <p>We would be very glad if you would drop as an email and ask any questions, even questions pertaining collaboration if you are a Bus company are allowed.</p>
        <aside class="more-trigger">
          <p>Contact Us</p>
        </aside>
        <article class="more">
          <form class="form" action="index.html" method="post">
            <input type="text" name="" value="">
            <input type="text" name="" value="">
            <input type="text" name="" value="">
            <button type="submit" name="button"></button>
          </form>
        </article>
      </article>
    </article>
    <hr/>
  </section>
  <aside id="sidebar">
    <div id="mobile-trigger-close">
      <p><i class="zmdi zmdi-close"></i></p>
    </div>
    <div class="widget" id="element-1">
      <h4>Latest Deals</h4>
      <img src="images/coastbus.png"/>
      <p> Coast Bus is giving of 50% to trips to Mombasa from Nairobi</p>
      <img src="images/mashpoa.jpg"/>
      <p> Mash Poa is giving of 30% on return tickets </p>
    </div>
  </aside>
</main>
<div id="overlay"></div>
  <script src='../assets/js/jquery.min.js'></script>

    <script  src="js/index.js"></script>

</body>
</html>
