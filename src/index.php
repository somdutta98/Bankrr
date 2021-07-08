

 <?php
 require_once "include/header.php";
 echo'<body class="bg-brand-primary">';
 require_once "include/navbar.php";
 require_once "include/db.php";
 ?>

  <section class="container my-20" id="home">
    <div class="grid md:grid-cols-2 gap-4 md:gap-7 place-content-center place-items-center">
      <div class="order-2">
        <div class="md:max-w-lg">
          <h1 class="font-bold text-center mb-4 md:text-left md:leading-snug text-brand-text text-4xl md:text-6xl">
            Banking
            Never Has Been
            Easier</h1>
          <p class="text-center md:text-left text-lg mb-11 text-brand-text-dark">Lorem ipsum dolor sit amet consectetur
            adipisicing elit. Atque nam accusamus voluptatum laborum eaque vel?</p>
        </div>
        <a href="./login.php"><button class="btn-primary w-full md:w-auto mb-6 md:mb-4 md:mr-8 shadow-lg">Log
            In</button></a>
        <a href="./createAccount.php"><button
            class="btn-secondary w-full md:w-auto mb-6 md:mb-4 hover:border-2 border-brand-accent-secondary shadow-lg">Create
            Bank
            Account</button></a>
        <p class="text-base font-normal text-center md:text-left text-brand-text-dark">Already have a bank account ? <a
            href="#"><span class="text-base font-normal text-brand-text">Sign up to Bankrr</span></a></p>
      </div>
      <div class="md:order-2">
        <img src="../assests/landing-hero.png" alt="">
      </div>
    </div>

  </section>


  <script src="./script.js"></script>
</body>

</html>