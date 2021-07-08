<?php
require_once "include/header.php";

require_once "include/db.php";
?>


<body class="bg-brand-primary">
  <section class="container">
    <div class="my-20">
      <h1 class="text-4xl mb-20 md:text-5xl text-brand-text font-bold text-center">Create Account</h1>
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
              <label class="font-normal text-lg text-brand-text">PAN Number *</label>
            </div>
            <div class="mb-8">
              <input type="text" name="pan" required
                class="bg-brand-primary shadow-lg w-full text-brand-text text-lg font-normal py-2 px-5 rounded-lg focus:ring-1 focus:ring-brand-accent-secondary outline-none">
            </div>
          </div>
           <div>
            <div class="mb-2">
              <label class="font-normal text-lg text-brand-text" required>Gender *</label>
            </div>
            <div class="mb-8">
              <input type="radio" name = "gender" value = "Male"
                class="bg-brand-text focus:ring-1 mr-3 focus:ring-brand-accent-secondary outline-none"> <span
                class="font-normal text-base text-brand-text">Male</span> 
              <input type="radio"  name = "gender" value = "Female"
                class="bg-brand-text focus:ring-1 mr-3 focus:ring-brand-accent-secondary outline-none"> <span
                class="font-normal text-base text-brand-text"> Female</span>
              <input type="radio"  name = "gender" value = "Other"
                class="bg-brand-text focus:ring-1 mr-3 focus:ring-brand-accent-secondary outline-none"> <span
                class="font-normal text-base text-brand-text">Other</span> 
            </div>
          </div>
          <div class="col-span-2">
            <div class="mb-2">
              <label class="font-normal text-lg text-brand-text">Address *</label>
            </div>
            <div class="mb-11">
              <textarea name="address" cols="30" rows="5"
                class="bg-brand-primary mb-3 shadow-lg w-full text-brand-text text-lg font-normal py-2 px-5 rounded-lg focus:ring-1 focus:ring-brand-accent-secondary outline-none"></textarea>
            </div>
          </div>
          <div>
            <div class="mb-2">
              <label class="font-normal text-lg text-brand-text">Address Proof *</label>
            </div>
            <div class="mb-8">
              <input type="radio" name = "doc" value="aadhar" 
                class="bg-brand-text focus:ring-1 mr-3 focus:ring-brand-accent-secondary outline-none"> <span
                class="font-normal text-base text-brand-text">Aadhar Card</span> <br>
              <input type="radio"  name = "doc" value="voter" 
                class="bg-brand-text focus:ring-1 mr-3 focus:ring-brand-accent-secondary outline-none"> <span
                class="font-normal text-base text-brand-text">Voter ID</span> <br>
              <input type="radio"  name = "doc" value="passport" 
                class="bg-brand-text focus:ring-1 mr-3 focus:ring-brand-accent-secondary outline-none"> <span
                class="font-normal text-base text-brand-text">Passport</span> <br>
            </div>
          </div>
          <div>
            <div class="mb-2">
              <label class="font-normal text-lg text-brand-text">Document Number *</label>
            </div>
            <div class="mb-8">
              <input type="text" name="doc_no" required
                class="bg-brand-primary w-full text-brand-text text-lg font-normal py-2 px-5 rounded-lg focus:ring-1 focus:ring-brand-accent-secondary outline-none">
            </div>
          </div>
          <div class="mb-8">
            <label
              class=" text-brand-text  tracking-wide uppercase  cursor-pointer  hover:text-brand-accent-primary outline-none transition-all">
              <i class="fa fa-cloud-upload-alt mr-2"></i>
              <span class="mt-2 text-base leading-normal">Upload User Image</span>
             <input type="file" name="user_image" class="hidden" id="customFile" />
            </label>
          </div>
          <div class="mb-8">
            <label
              class=" text-brand-text tracking-wide uppercase cursor-pointer  hover:text-brand-accent-primary outline-none transition-all">
              <i class="fa fa-cloud-upload-alt mr-2"></i>
              <span class="mt-2 text-base leading-normal">Upload Documents</span>
               <input type="file" name="doc_image" class="hidden" id="customFile" />
            </label>
          </div>
          <div>
            <div class="mb-2">
              <label class="font-normal text-lg text-brand-text">Select Branch *</label>
            </div>
            <div class="mb-8">
              <select name="branch" 
                class="bg-brand-primary w-full text-brand-text text-lg font-normal py-2 px-5 rounded-lg focus:ring-1 focus:ring-brand-accent-secondary outline-none">

                <option value="">Choose Your Branch</option>
                
<?php 
$query = "SELECT * FROM branch";
                        $connection = mysqli_query($db_connection, $query);
                       
                        while($row = mysqli_fetch_assoc($connection))
                        {
                           echo '<option value="'.$row['branch_id'].'">'.$row['branch_name'].'</option>';
                        }
                        ?>
                     
              </select>
            </div>
          </div>
          <div>
            <div class="mb-2">
              <label class="font-normal text-lg text-brand-text">Select Account Type*</label>
            </div>
            <div class="mb-8">
              <select name="type" 
                class="bg-brand-primary w-full text-brand-text text-lg font-normal py-2 px-5 rounded-lg focus:ring-1 focus:ring-brand-accent-secondary outline-none">
                <option value="Savings">Savings</option>
                <option value="Salary">Salary</option>
                <option value="Current">Current</option>
                <option value="Fixed Deposit">Fixed Deposit</option>
              </select>
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
            <button type="submit" name="create" class="btn-primary w-full shadow-lg">Create Account</button>
          </div>
        </div>

      </form>
    </div>
  </section>

  <script src="./script.js"></script>
</body>

</html>