<?php
include "layout/head.php"
  ?>
<body>
      <div id="wrapper">
        <div class="overlay"></div>

        <!-- Sidebar -->
        <?php
        include "layout/nav.php"
          ?>
            <div class="container">
              <h1>Book Now!</h1>
              <form id="msform" action="search.php" method="get">
                <!-- progressbar -->
                <ul id="progressbar">
                  <li class="active">Search Route</li>
                  <li>Date of travel</li>
                  <li>Are you coming back?</li>
                </ul>
                <!-- fieldsets -->
                <fieldset>
                  <h2 class="fs-title">Choose the route you want</h2>
                  <h3 class="fs-subtitle">Our robots have to look for the appropriate bus</h3>
                  <!--<script>
                    $(function() {
                      $( "#route" ).autocomplete({
                        source: 'search/search_route.php'
                      });
                    });
                  </script>
                  <input type="text" id="route" name="destination" autofocus required>-->
                  <select name="destination" autofocus required>
                     <option>Nairobi-Mombasa</option>
                     <option>Nairobi-Kisumu</option>
                     <option>Nairobi-Busia</option>
                     <option>Nairobi-Kakamega</option>
                     <option>Nairobi-Kampala</option>
                     <option>Nairobi-Eldoret</option>
                     <option>Mombasa-Nairobi</option>
                     <option>Kisumu-Nairobi</option>
                     <option>Busia-Nairobi</option>
                     <option>Kakamega-Nairobi</option>
                     <option>Eldoret-Nairobi</option>
                 </select>
                  <input type="button" name="next" class="next action-button" value="Next" />
                </fieldset>
                <fieldset>
                  <h2 class="fs-title">When would you want to go?</h2>
                  <h3 class="fs-subtitle">Select any day from today to the unforeseable future</h3>
                  <input type="date" name="date" min="<?php date("m/d/y")?>" required>
                  <h3 class="fs-subtitle">Return Trip?</h3>
                  <input name="return" type="checkbox">
                  <input type="button" name="previous" class="previous action-button" value="Previous" />
                  <input type="button" name="next" class="next action-button" value="Next" />
                </fieldset>
                <fieldset>
                  <h2 class="fs-title"> A few extra personal Details</h2>
                  <h3 class="fs-subtitle">We will never sell it</h3>
                  <input type="text" name="phone" placeholder="Phone" />
                  <input type="button" name="previous" class="previous action-button" value="Previous" required/>
                  <input type="submit" value="go">
                </fieldset>
              </form>
              <form id="form" class="topBefore" >

                  <!--<input placeholder="return" id="checkBox" type="checkbox">-->
              </form>

            </div>
        </div>
        <!-- /#page-content-wrapper -->
    </div>
    <?php
    include "layout/footer.php"
      ?>
