<?php
require_once "include/header.php";
require_once "include/db.php";
?>

<body class="bg-brand-primary">
 <!--  <nav class="bg-brand-primary">
    <div class="container py-4 shadow-lg lg:py-2 md:flex md:justify-between">
      <div class="flex items-center justify-between justify-items-center">
        <div>
          <a href="/" class="text-4xl font-bold lg:text-5xl text-brand-accent-primary">Bankrr</a>
        </div>

        <div class="md:hidden">
          <button type="button" class="block" id="menuBtn">
            <i class="fa fa-dropdown fa-bars fa-2x text-brand-text hover:text-brand-accent-secondary" id="menuIcon"></i>
          </button>
        </div>
      </div>

      <div class="py-4 md:flex hidden md:justify-items-center md:items-center" id="links">
        <a href="#home"
          class="block mb-2 text-lg md:ml-10 font-medium md:mb-0 text-brand-text hover:text-brand-accennt-primary-dark">Home</a>
        <a href="./loans.html"
          class="block mb-2 text-lg md:ml-10 font-medium md:mb-0 text-brand-text hover:text-brand-accennt-primary-dark">Loans</a>
        <a href="./offers.html"
          class="block mb-2 text-lg md:ml-10 font-medium md:mb-0 text-brand-text hover:text-brand-accennt-primary-dark">Offers</a>
        <a href="./contact.html"
          class="block mb-2 text-lg md:ml-10 font-medium md:mb-0 text-brand-text hover:text-brand-accennt-primary-dark">Contact</a>
      </div>
    </div>
  </nav> -->

  <section class="container my-24">
    <h1 class="text-4xl mb-20 md:text-5xl text-brand-text font-bold text-center">Login <i class="fa fa-user-secret"></i>
    </h1>

<?php
if(isset($_SESSION['login_error'])){
            $Error = $_SESSION['login_error'];
            echo "<p style='color:red;'>".$Error."</p>";
            unset($_SESSION['login_error']);
        }

if(isset($_SESSION['attempt'])){
            $Error = $_SESSION['attempt'];
            echo "<p style='color:red;'>".$Error."</p>";
            unset($_SESSION['attempt']);
        }
        // if(isset($_SESSION['attempts'])){
        //     $Error = $_SESSION['attempts'];
        //     echo "<p style='color:red;'>".$Error."</p>";
        //     unset($_SESSION['attempts']);
        // }

?>

    <div class="grid md:grid-cols-2 md:gap-2 md:place-content-center md:place-items-center">

      <div>
       <form method="POST" action="post/login.php">
          <div class="bg-brand-secondary rounded-xl py-12 shadow-xl px-10">
            <div class="mb-2">
              <label class="font-normal text-lg text-brand-text">Email *</label>
            </div>
            <div class="mb-8">
              <input type="email" name="user_email" required
                class="bg-brand-primary shadow-lg w-full text-brand-text text-lg font-normal py-2 px-5 rounded-lg focus:ring-1 focus:ring-brand-accent-secondary outline-none">
            </div>
            <div class="mb-2">
              <label class="font-normal text-lg text-brand-text">Password *</label>
            </div>
            <div class="mb-11">
              <input type="password" name="user_pass" required
                class="bg-brand-primary mb-3 shadow-lg w-full text-brand-text text-lg font-normal py-2 px-5 rounded-lg focus:ring-1 focus:ring-brand-accent-secondary outline-none">
              <p class="text-base font-light text-right text-brand-text-dark">Forgot Password ?</p>
            </div>

            <div>
             
 <button type="submit" name="login_submit" class="btn-primary w-full shadow-lg">Log In</button>

               
             
            </div>
          </div>
        </form>
      </div>

      <div class="hidden md:block">
        <img src="../assests/login.png" alt="">
      </div>
    </div>
  </section>

  <script src="./script.js"></script>
</body>

</html>