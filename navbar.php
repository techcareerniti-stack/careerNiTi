<!-- FIXED NAVBAR -->
<nav class="bg-white shadow-md fixed top-0 left-0 w-full z-50">
  <div class="max-w-7xl mx-auto px-4">
    <div class="flex items-center h-16">

      <!-- LEFT: Logo -->
      <div class="flex items-center">
        <img
          src="assets/images/Careerniti_logo.png"
          alt="Careerniti Logo"
          class="h-10 w-auto"
        />
      </div>

      <!-- FLEX SPACER (CREATES BIG GAP) -->
      <div class="flex-1"></div>

      <!-- RIGHT: Desktop Menu -->
      <div class="hidden md:flex items-center space-x-10">
        <a href="index.php" class="text-gray-700 hover:text-orange-500 font-medium no-underline">Home</a>
        <a href="career.php" class="text-gray-700 hover:text-orange-500 font-medium no-underline">Career</a>
        <a href="exam.php" class="text-gray-700 hover:text-orange-500 font-medium no-underline">Exam</a>
        <a href="admission.php" class="text-gray-700 hover:text-orange-500 font-medium no-underline">Admission</a>
        <a href="notification.php" class="text-gray-700 hover:text-orange-500 font-medium no-underline">Notification</a>
        <a href="about.php" class="text-gray-700 hover:text-orange-500 font-medium no-underline">About Us</a>
        <a href="contact.php" class="text-gray-700 hover:text-orange-500 font-medium no-underline">Contact Us</a>

        <!-- Login Button (LAST ITEM) -->
        <a
          href="login.php"
          class="border border-orange-500 text-orange-500 px-8 py-1 rounded-md"
        >
          Login
        </a>
      </div>

      <!-- Mobile Menu Button (RIGHT END) -->
      <button
        id="menu-btn"
        class="md:hidden text-2xl text-gray-700 focus:outline-none"
        aria-label="Toggle Menu"
      >
        <span id="open-icon">☰</span>
        <span id="close-icon" class="hidden">✖</span>
      </button>

    </div>
  </div>

  <!-- Mobile Menu -->
  <div id="mobile-menu" class="hidden md:hidden bg-white border-t shadow-lg">
    <div class="px-4 py-4 space-y-3">
      <a href="index.php" class="block text-gray-700 no-underline">Home</a>
      <a href="career.php" class="block text-gray-700 no-underline">Career</a>
      <a href="exam.php" class="block text-gray-700 no-underline">Exam</a>
      <a href="admission.php" class="block text-gray-700 no-underline">Admission</a>
      <a href="notification.php" class="block text-gray-700 no-underline">Notification</a>
      <a href="about.php" class="block text-gray-700 no-underline">About Us</a>
      <a href="contact.php" class="block text-gray-700 no-underline">Contact Us</a>

      <a
        href="login.php"
        class="border border-orange-500 text-orange-500 px-8 py-1 rounded-md"
      >
        Login
      </a>
    </div>
  </div>
</nav>

<!-- SPACE FOR FIXED NAVBAR -->
<div class="h-16"></div>

<!-- Mobile Menu Toggle Script -->
<script>
  const btn = document.getElementById("menu-btn");
  const menu = document.getElementById("mobile-menu");
  const openIcon = document.getElementById("open-icon");
  const closeIcon = document.getElementById("close-icon");

  btn.addEventListener("click", () => {
    menu.classList.toggle("hidden");
    openIcon.classList.toggle("hidden");
    closeIcon.classList.toggle("hidden");
  });
</script>
