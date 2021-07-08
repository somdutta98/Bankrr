<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../dist/style.css">
  <title>Bankrr | Verify Account</title>
</head>

<body class="bg-brand-primary">
  <nav class="bg-brand-primary">
    <div class="container py-4 shadow-lg lg:py-2 md:flex md:justify-between">
      <div class="flex items-center justify-between justify-items-center">
        <div>
          <a href="index.html" class="text-4xl font-bold lg:text-5xl text-brand-accent-primary">Bankrr</a>
        </div>
      </div>
    </div>
  </nav>

  <section class="container">
    <div class="mt-20">
      <h1 class="mb-20 text-4xl font-bold text-center md:text-5xl text-brand-text">Verification</h1>
    </div>
<form method="POST" action="post/account.php">
    <div class="grid md:grid-cols-2 place-items-center">
      <div class="px-6 py-8 shadow-xl bg-brand-secondary rounded-xl">
        <div class="grid place-content-start place-items-center">
          <div class="mb-3">
            <div class="mb-2">
              <label class="text-lg font-normal text-center text-brand-text">Enter OTP</label>
            </div>
            <input type="text" name="Code" required
              class="w-full px-5 py-2 text-lg font-normal rounded-lg shadow-lg outline-none bg-brand-primary text-brand-text focus:ring-1 focus:ring-brand-accent-secondary">
          </div>
          <div class="mb-8">
            <a href="#" class="text-sm font-light text-brand-text-dark">Send another OTP</a>
          </div>
          <div>
           <button type="submit" name="ver_submit" class="text-lg btn-primary">Confirm</button>
          </div>
        </form>
        </div>
      </div>
      <div class="hidden md:block">
        <img src="../assests/verify.png" alt="">
      </div>

    </div>

  </section>


  <script src="./script.js"></script>
</body>

</html>