<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="/career1/assets/css/output.css">
</head>
<body class="bg-gray-100">
<nav class="bg-white shadow-md fixed top-0 left-0 w-full z-50">
  <div class="w-full px-6">
    <div class="flex items-center justify-between h-16"> 
      <div class="flex items-center space-x-8">
        <div class="flex items-center">
          <img src="/career1/assets/images/Careerniti_logo.png" alt="Careerniti Logo" class="h-10 w-auto">
        </div>      
      </div>
      <div class="flex items-center gap-4">
         <div class="hidden md:flex items-center gap-6 h-16">
          <a href="/career1/index1.php" class="text-gray-700 hover:text-orange-500 font-medium">Home</a>
          <a href="/career1/career.php" class="text-gray-700 hover:text-orange-500 font-medium">Career</a>
          <a href="/career1/exam.php" class="text-gray-700 hover:text-orange-500 font-medium">Exam</a>
          <a href="/career1/admission.php" class="text-gray-700 hover:text-orange-500 font-medium">Admission</a>          
          <a href="/career1/notification.php" class="text-gray-700 hover:text-orange-500 font-medium">Notification</a>
          <a href="/career1/about.php" class="text-gray-700 hover:text-orange-500 font-medium">About Us</a>
          <a href="/career1/contact.php" class="text-gray-700 hover:text-orange-500 font-medium">Contact Us</a>
          <a href="/career1/login.php" class="md:block bg-gradient-to-r from-orange-500 to-pink-500 text-white px-8 py-2 rounded-md hover:opacity-90 transition">Login </a>
        </div>       
        <button id="menu-btn" class="md:hidden text-2xl text-gray-700 focus:outline-none" aria-label="Toggle Menu">
          <span id="open-icon">☰</span>
          <span id="close-icon" class="hidden">✖</span>
        </button>
      </div>
    </div>
  </div>
  <div id="mobile-menu" class="hidden md:hidden bg-white border-t shadow-lg">
    <div class="px-4 py-4 space-y-3">
      <a href="/career1/index1.php" class="block py-2 text-gray-700 hover:bg-gray-50 no-underline">Home</a>
      <a href="/career1/career.php" class="block py-2 text-gray-700 hover:bg-gray-50 no-underline">Career</a>
      <a href="/career1/exam.php" class="block py-2 text-gray-700 hover:bg-gray-50 no-underline">Exam</a>
      <a href="/career1/admission.php" class="block py-2 text-gray-700 hover:bg-gray-50 no-underline">Admission</a>
      <a href="/career1/notification.php" class="block py-2 text-gray-700 hover:bg-gray-50 no-underline">Notification</a>
      <a href="/career1/about.php" class="block py-2 text-gray-700 hover:bg-gray-50 no-underline">About Us</a>
      <a href="/career1/contact.php" class="block py-2 text-gray-700 hover:bg-gray-50 no-underline">Contact Us</a>
      <a href="/career1/login.php" class="block text-center bg-gradient-to-r from-orange-500 to-pink-500 text-white px-6 py-2 rounded-md hover:opacity-90 transition duration-200">Login</a>
    </div>
  </div>
</nav>
<div class="h-16"></div>
<!-- SCRIPT -->
<script>
if (!window.navbarInitialized) {
  window.navbarInitialized = true;
  const btn = document.getElementById("menu-btn");
  const menu = document.getElementById("mobile-menu");
  const openIcon = document.getElementById("open-icon");
  const closeIcon = document.getElementById("close-icon");
  btn.addEventListener("click", function (e) {
    e.stopPropagation();
    menu.classList.toggle("hidden");
    openIcon.classList.toggle("hidden");
    closeIcon.classList.toggle("hidden");
  });
  document.addEventListener("click", function (e) {
    if (!menu.contains(e.target) && !btn.contains(e.target)) {
      menu.classList.add("hidden");
      openIcon.classList.remove("hidden");
      closeIcon.classList.add("hidden");
    }
  });
}
</script>
</body>
</html>
