 <?php
 require_once "include/header.php";
 echo'<body class="bg-brand-primary">';
 require_once "include/navbar.php";
 require_once "include/db.php";
 ?>

  <section class="container my-24">
    <h1 class="mb-20 text-4xl text-brand-text font-bold text-center">Want To Share Something ? <i
        class="fa fa-comments"></i>
    </h1>

    <div class="grid md:grid-cols-2 md:gap-2 md:place-content-center md:place-items-center mb-20">
      <div>
      <form id = "contact_form">
          <div class="bg-brand-secondary rounded-xl py-12 shadow-xl px-10">
            <div class="mb-2">
              <label class="font-normal text-lg text-brand-text">Name *</label>
            </div>
            <div class="mb-8">
              <input type="text" id = "userName" required
                class="bg-brand-primary shadow-lg w-full text-brand-text text-lg font-normal py-2 px-5 rounded-lg focus:ring-1 focus:ring-brand-accent-secondary outline-none">
            </div>
            <div class="mb-2">
              <label class="font-normal text-lg text-brand-text">Email *</label>
            </div>
            <div class="mb-11">
              <input type="email" id = "userEmail" required
                class="bg-brand-primary mb-3 shadow-lg w-full text-brand-text text-lg font-normal py-2 px-5 rounded-lg focus:ring-1 focus:ring-brand-accent-secondary outline-none">
            </div>
            <div class="mb-2">
              <label class="font-normal text-lg text-brand-text">Message *</label>
            </div>
            <div class="mb-11">
              <textarea id = "message" cols="30" rows="5"
                class="bg-brand-primary mb-3 shadow-lg w-full text-brand-text text-lg font-normal py-2 px-5 rounded-lg focus:ring-1 focus:ring-brand-accent-secondary outline-none"></textarea>
            </div>

            <div>
              <button class="btn-primary w-full shadow-lg" onClick="sendContact();">Send <i class="fa fa-paper-plane"></i></button>
            </div>
          </div>
          <p id = "mail-status"></p>
        </form>
      </div>

      <div class="hidden md:block">
        <img src="../assests/contact-us.png" alt="" class="w-full h-96">
      </div>
    </div>

    <div class="grid md:grid-cols-2 gap-6 place-items-center">
      <div>
        <div>
          <h1 class="text-4xl text-brand-text font-bold text-center">Connect With Us</h1>
        </div>
      </div>

      <div>
        <a href="#"
          class="text-4xl font-semibold mx-5 text-brand-accent-secondary hover:text-brand-accent-primary transition-all"><i
            class="fab fa-facebook"></i></a>
        <a href="#"
          class="text-4xl font-semibold mx-5 text-brand-accent-secondary hover:text-brand-accent-primary transition-all"><i
            class="fab fa-linkedin"></i></a>
        <a href="#"
          class="text-4xl font-semibold mx-5 text-brand-accent-secondary hover:text-brand-accent-primary transition-all"><i
            class="fab fa-twitter"></i></a>
        <a href="#"
          class="text-4xl font-semibold mx-5 text-brand-accent-secondary hover:text-brand-accent-primary transition-all"><i
            class="fab fa-instagram"></i></a>
      </div>
    </div>
  </section>
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<script>
function sendContact() {
    jQuery.ajax({
    url: "post/contact.php",
    data:'userName='+$("#userName").val()+'&userEmail='+$("#userEmail").val()+'&message='+$("#message").val(),
    type: "POST",
    success:function(data){
     $("#mail-status").html(data);
     $( '#contact_form' ).each(function(){
    this.reset();
});
    },
    error:function (){}
    });
  
}
</script>
  <script src="./script.js"></script>
</body>

</html>