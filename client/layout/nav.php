<nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
    <ul class="nav sidebar-nav">
        <li class="sidebar-brand">
            <a href="#">
              Hello there <?php echo $_SESSION['username'] ?>!
            </a>
        </li>
        <li>
            <a href="index.php"><i class="fa fa-fw fa-home"></i>Home</a>
        </li>
        <li>
            <a href="hire.php"><i class="fa fa-fw fa-bus"></i>Hire a bus</a>
        </li>
        <li>
            <a href="../blog/index.php"><i class="fa fa-fw fa-info"></i>Blog</a>
        </li>
        <li>
            <a href="viewCart.php"><i class="fa fa-fw fa-ticket"></i>View tickets</a>
        </li>
        <li>
            <a href="../logout.php"><i class="fa fa-fw fa-sign-out"></i>Log out</a>
        </li>
    </ul>
</nav>
<!-- /#sidebar-wrapper -->

<!-- Page Content -->
<div id="page-content-wrapper">
  <button type="button" class="hamburger is-closed animated fadeInLeft" data-toggle="offcanvas">
    <span class="hamb-top"></span>
    <span class="hamb-middle"></span>
    <span class="hamb-bottom"></span>
  </button>
