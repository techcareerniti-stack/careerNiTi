<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CareerNiti</title>
    <link rel="stylesheet" href="assets/css/output.css">
    <link rel="stylesheet" href="assets/css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="icon" sizes="16x16" type="image/png" href="assets/images/title-logo.png">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">  
</head>
<body>
     <?php include 'includes/navbar.php'; ?>
    <!-- Notification Messages -->
     <?php if(isset($message)): ?>
        <div class="fixed top-4 right-4 z-50 max-w-sm">
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg shadow-lg">
                <div class="flex items-center">
                    <i class="fas fa-check-circle mr-2"></i>
                    <span><?php echo htmlspecialchars($message); ?></span>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php if(isset($error)): ?>
        <div class="fixed top-4 right-4 z-50 max-w-sm">
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg shadow-lg">
                <div class="flex items-center">
                    <i class="fas fa-exclamation-circle mr-2"></i>
                    <span><?php echo htmlspecialchars($error); ?></span>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <div class="font-sans">
        <!-- Header -->
        <div class="relative text-center py-8 bg-gradient-to-r from-orange-400 to-pink-600 text-white"> <h1 class="text-4xl font-bold">Contact Us</h1></div>
        <!-- Main Content -->
        <div class="mx-8 p-4">
            <!-- Contact Form -->
            <form action="contact.php" method="POST" class="max-w-xl mx-auto p-6">
                <h2 class="text-2xl font-bold mb-4 text-center uppercase">Leave Us Your Info</h2>
                <p class="text-center mb-6">And we will get back to you</p>
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 font-medium">Your Name (required)</label>
                    <input name="name" type="text" id="name" class="w-full px-4 py-2 mt-2 border border-[#ec8623] rounded-lg focus:ring focus:ring-[#ec8623] outline-none" value="<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name']) : ''; ?>" required>
                </div>               
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 font-medium">Your Email (required)</label>
                    <input name="email" type="email" id="email" class="w-full px-4 py-2 mt-2 border border-[#ec8623] rounded-lg focus:ring focus:ring-[#ec8623] outline-none" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>" required>
                </div>               
                <div class="mb-4">
                    <label for="phone" class="block text-gray-700 font-medium">Your Phone Number</label>
                    <input name="phone" type="tel" id="phone" class="w-full px-4 py-2 mt-2 border border-[#ec8623] rounded-lg focus:ring focus:ring-[#ec8623] outline-none" value="<?php echo isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : ''; ?>">
                </div>                
                <div class="mb-4">
                    <label for="subject" class="block text-gray-700 font-medium">Subject</label>
                    <input name="subject" type="text" id="subject" class="w-full px-4 py-2 mt-2 border border-[#ec8623] rounded-lg focus:ring focus:ring-[#ec8623] outline-none" value="<?php echo isset($_POST['subject']) ? htmlspecialchars($_POST['subject']) : ''; ?>">
                </div>               
                <div class="mb-4">
                    <label for="message" class="block text-gray-700 font-medium">Your Message (required)</label>
                    <textarea name="message" id="message" rows="5" class="w-full px-4 py-2 mt-2 border border-[#ec8623] rounded-lg focus:ring focus:ring-[#ec8623] outline-none" required><?php echo isset($_POST['message']) ? htmlspecialchars($_POST['message']) : ''; ?></textarea>
                </div>               
                <!-- Hidden honeypot field for spam protection -->
                <div class="hidden">
                    <label for="website">Website</label>
                    <input type="text" name="website" id="website">
                </div>                
                <div class="flex justify-center">
                    <button type="submit" name="submit" class="px-[45px] center bg-[#ec8623] text-white py-3 rounded-lg hover:bg-[#f79739] transition duration-300 flex items-center">
                        <i class="fas fa-paper-plane mr-2"></i> Send Message
                    </button>
                </div>
            </form>
            <!-- Office Locations -->
            <div class="mt-16 mb-10 px-8">
                <h2 class="text-center text-3xl font-bold text-gray-800 mb-8 uppercase">Office Locations</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                    <!-- Sangli -->
                    <div class="bg-white p-4 rounded-lg shadow-md flex flex-col justify-between hover:shadow-lg transition duration-300">
                        <div>
                            <div class="w-full h-40 bg-gradient-to-r from-orange-100 to-pink-100 rounded-lg flex items-center justify-center">
                                 <img src="./assets/images/Sangli.png" alt="Sangli" class="w-full h-40 object-cover rounded-lg">
                            </div>
                            <div class="mt-4">
                                <h3 class="text-lg font-bold">Sangli</h3>
                                <p class="text-gray-500 mt-2">F14, 3rd Floor, Shri Kapila, MSEB Road, Vishrambagh, Sangli</p>
                            </div>
                        </div>
                        <a href="https://www.google.com/maps?q=F14, 3rd Floor, Shri Kapila, MSEB Road, Vishrambagh, Sangli" target="_blank" rel="noopener noreferrer" class="w-full text-center mt-4 px-10 bg-[#ec8623] text-white py-2 rounded-lg hover:bg-[#f79739] transition duration-300 flex items-center justify-center">View Map</a>
                    </div>
                    <!-- Karad -->
                    <div class="bg-white p-4 rounded-lg shadow-md flex flex-col justify-between hover:shadow-lg transition duration-300">
                        <div>
                            <div class="w-full h-40 bg-gradient-to-r from-orange-100 to-pink-100 rounded-lg flex items-center justify-center">
                               <img src="./assets/images/Karad.png" alt="Karad" class="w-full h-40 object-cover rounded-lg">
                            </div>
                            <div class="mt-4">
                                <h3 class="text-lg font-bold">Karad</h3>
                                <p class="text-gray-500 mt-2">Flat No. 2, Suman Appt, Near Hotel Deviprasad, Opposite to Gov Pharmacy College, Vidyanagar, Karad</p>
                            </div>
                        </div>
                        <a href="https://www.google.com/maps?q=Flat No. 2, Suman Appt, Near Hotel Deviprasad, Opposite to Gov Pharmacy College, Vidyanagar, Karad" target="_blank" rel="noopener noreferrer" class="w-full text-center mt-4 px-10 bg-[#ec8623] text-white py-2 rounded-lg hover:bg-[#f79739] transition duration-300 flex items-center justify-center"> View Map </a>
                    </div>
                    <!-- Kolhapur -->
                    <div class="bg-white p-4 rounded-lg shadow-md flex flex-col justify-between hover:shadow-lg transition duration-300">
                        <div>
                            <div class="w-full h-40 bg-gradient-to-r from-orange-100 to-pink-100 rounded-lg flex items-center justify-center">
                               <img src="./assets/images/Kolhapur.png" alt="Kolhapur" class="w-full h-40 object-cover rounded-lg">
                            </div>
                            <div class="mt-4">
                                <h3 class="text-lg font-bold">Kolhapur</h3>
                                <p class="text-gray-500 mt-2">RS No.2107/K 6th Lane, Rajarampuri, Kolhapur</p>
                            </div>
                        </div>
                        <a href="https://www.google.com/maps?q=RS No.2107/K 6th Lane, Rajarampuri, Kolhapur" target="_blank" rel="noopener noreferrer" class="w-full text-center mt-4 px-10 bg-[#ec8623] text-white py-2 rounded-lg hover:bg-[#f79739] transition duration-300 flex items-center justify-center">View Map </a>
                    </div>
                    <!-- Satara -->
                    <div class="bg-white p-4 rounded-lg shadow-md flex flex-col justify-between hover:shadow-lg transition duration-300">
                        <div>
                            <div class="w-full h-40 bg-gradient-to-r from-orange-100 to-pink-100 rounded-lg flex items-center justify-center">
                                <img src="./assets/images/Satara.png" alt="Satara" class="w-full h-40 object-cover rounded-lg">
                            </div>
                            <div class="mt-4">
                                <h3 class="text-lg font-bold">Satara</h3>
                                <p class="text-gray-500 mt-2">Satara</p>
                            </div>
                        </div>
                       <a target="_blank" rel="noopener noreferrer" class="w-full text-center mt-4 px-10 bg-[#ec8623] text-white py-2 rounded-lg hover:bg-[#f79739] transition duration-300">View Map</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
 <?php include 'includes/footer.php'; ?>
</body>
</html>
