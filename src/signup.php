<?php
require_once "include/header.php";

require_once "include/db.php";
?>


<body class="bg-brand-primary">
  <section class="container">
    <div class="my-20">
      <h1 class="text-4xl mb-20 md:text-5xl text-brand-text font-bold text-center">Create Bankrr Account</h1>
    </div>
    <div class="grid place-content-center place-items-center">
      <form method="POST" action="post/account.php" enctype = "multipart/form-data">
        <div
          class="grid grid-cols-2 gap-5 place-content-between px-7 py-12 bg-brand-secondary rounded-xl shadow-xl mb-20">
          <div>
            <div class="mb-2">
              <label class="font-normal text-lg text-brand-text">Name *</label>
            </div>
            <div class="mb-8">
              <input type="text" name="name" required
                class="bg-brand-primary shadow-lg w-full text-brand-text text-lg font-normal py-2 px-5 rounded-lg focus:ring-1 focus:ring-brand-accent-secondary outline-none">
            </div>
          </div>
          <div>
            <div class="mb-2">
              <label class="font-normal text-lg text-brand-text">Email *</label>
            </div>
            <div class="mb-8">
              <input type="email" name="email" required
                class="bg-brand-primary shadow-lg w-full text-brand-text text-lg font-normal py-2 px-5 rounded-lg focus:ring-1 focus:ring-brand-accent-secondary outline-none">
            </div>
          </div>
          <div>
            <div class="mb-2">
              <label class="font-normal text-lg text-brand-text">Phone *</label>
            </div>
            <div class="mb-8">
              <input type="text" name="phone" required
                class="bg-brand-primary shadow-lg w-full text-brand-text text-lg font-normal py-2 px-5 rounded-lg focus:ring-1 focus:ring-brand-accent-secondary outline-none">
            </div>
          </div>
            <div>
            <div class="mb-2">
              <label class="font-normal text-lg text-brand-text">Account Number *</label>
            </div>
            <div class="mb-8">
              <input type="text" name="num" required
                class="bg-brand-primary shadow-lg w-full text-brand-text text-lg font-normal py-2 px-5 rounded-lg focus:ring-1 focus:ring-brand-accent-secondary outline-none">
            </div>
          </div>
       
          <div>
            <div class="mb-2">
              <label class="font-normal text-lg text-brand-text">Password *</label>
            </div>
            <div class="mb-8">
              <input type="password" name="password" required
                class="bg-brand-primary shadow-lg w-full text-brand-text text-lg font-normal py-2 px-5 rounded-lg focus:ring-1 focus:ring-brand-accent-secondary outline-none">
            </div>
          </div>
          <div>
            <div class="mb-2">
              <label class="font-normal text-lg text-brand-text">Confirm Password *</label>
            </div>
            <div class="mb-8">
              <input type="password" name="ConfirmPassword" required
                class="bg-brand-primary shadow-lg w-full text-brand-text text-lg font-normal py-2 px-5 rounded-lg focus:ring-1 focus:ring-brand-accent-secondary outline-none">
            </div>
          </div>
          <div class="col-span-2">
            <button type="submit" name="signup" class="btn-primary w-full shadow-lg">Sign-Up To Bankrr</button>
          </div>
        </div>

      </form>
    </div>
  </section>

  <script src="./script.js"></script>
</body>

</html>