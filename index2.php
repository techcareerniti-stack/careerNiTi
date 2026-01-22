<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CareerNiti</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="icon" type="image/png" href="./assets/images/title-logo.png">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="./assets/css/index.css" rel="stylesheet">
    <link href="./assets/css/output.css" rel="stylesheet">
</head>
<body>
<?php include './includes/navbar.php'; ?>
<?php
$quickCategories = [
    [
        'id' => 'engineering',
        'name' => 'Engineering',
        'icon' => '🔧',
        'category' => 'engineering',
        'gradient' => 'bg-gradient-to-br from-orange-400 via-orange-500 to-red-500',
        'description' => 'Design, build, and innovate with cutting-edge technology',
        'courses' => ['Computer Science Engineering', 'Mechanical Engineering', 'Civil Engineering', 'Electrical Engineering', 'Electronics Engineering', 'Biomedical Engineering', 'Chemical Engineering', 'Aerospace Engineering'],
        'colleges' => ['Indian Institute of Technology (IIT)', 'National Institute of Technology (NIT)', 'BITS Pilani', 'Vellore Institute of Technology (VIT)', 'Delhi Technological University (DTU)'],
        'exams' => ['JEE Main & Advanced', 'BITSAT', 'VITEEE', 'MHT CET', 'WBJEE']
    ],
    [
        'id' => 'medical',
        'name' => 'Medical',
        'icon' => '⚕️',
        'category' => 'medical',
        'gradient' => 'bg-gradient-to-br from-blue-400 via-blue-500 to-purple-600',
        'description' => 'Heal, care, and save lives in healthcare sector',
        'courses' => ['MBBS (Doctor of Medicine)', 'BDS (Dentistry)', 'BAMS (Ayurvedic Medicine)', 'B.Sc Nursing', 'Physiotherapy', 'Pharmacy', 'Veterinary Science', 'Medical Laboratory Technology'],
        'colleges' => ['All India Institute of Medical Sciences (AIIMS)', 'Christian Medical College (CMC)', 'Armed Forces Medical College (AFMC)', 'Maulana Azad Medical College (MAMC)', "King George's Medical University"],
        'exams' => ['NEET UG', 'NEET PG', 'AIIMS MBBS', 'JIPMER MBBS', 'FMGE']
    ],
    [
        'id' => 'science',
        'name' => 'Pure Science',
        'icon' => '🔬',
        'category' => 'science',
        'gradient' => 'bg-gradient-to-br from-green-400 via-green-500 to-teal-600',
        'description' => 'Discover, research, and explore scientific frontiers',
        'courses' => ['B.Sc Physics', 'B.Sc Chemistry', 'B.Sc Mathematics', 'B.Sc Biology', 'B.Sc Computer Science', 'B.Sc Statistics', 'B.Sc Biotechnology', 'B.Sc Environmental Science'],
        'colleges' => ["St. Stephen's College, Delhi", 'Presidency College, Chennai', 'Loyola College, Chennai', 'Hindu College, Delhi', 'Miranda House, Delhi'],
        'exams' => ['IISER Aptitude Test', 'NEST', 'CUCET', 'BHU UET', 'DU Entrance Exam']
    ],
    [
        'id' => 'engineering-predictor',
        'name' => 'Engineering College Predictor',
        'icon' => '⚙️',
        'category' => 'engineering',
        'gradient' => 'bg-gradient-to-br from-purple-400 via-purple-500 to-pink-600',
        'description' => 'Predict your engineering college based on rank',
        'courses' => ['JEE Main Rank Based Prediction', 'JEE Advanced Rank Based Prediction', 'State CET Rank Prediction', 'Private College Prediction'],
        'colleges' => ['IIT College Predictor', 'NIT College Predictor', 'IIIT College Predictor', 'State Government College Predictor'],
        'exams' => ['JEE Main', 'JEE Advanced', 'State Engineering Entrance Exams']
    ],
    [
        'id' => 'medical-predictor',
        'name' => 'Medical College Predictor',
        'icon' => '🩺',
        'category' => 'medical',
        'gradient' => 'bg-gradient-to-br from-pink-400 via-pink-500 to-red-600',
        'description' => 'Predict your medical college based on NEET rank',
        'courses' => ['MBBS College Prediction', 'BDS College Prediction', 'Ayurveda College Prediction', 'Nursing College Prediction'],
        'colleges' => ['AIIMS College Predictor', 'Government Medical College Predictor', 'Private Medical College Predictor', 'Deemed University Predictor'],
        'exams' => ['NEET UG', 'NEET PG', 'State Medical Entrance Exams']
    ]
];
?>
<div class="relative h-[500px] w-full mb-7">
    <div class="absolute inset-0 bg-cover bg-center h-full w-full" style="background-image: url('assets/images/misssion.jpg');">
        <div class="absolute inset-0 bg-black/40"></div>
    </div>
    <div class="relative h-full flex flex-col items-center justify-center px-4">
        <h1 class="text-4xl md:text-5xl text-white font-bold mb-2 mt-20 text-center">Choose the right career with</h1>
        <h2 class="text-3xl md:text-4xl text-white font-bold">Careerniti</h2>
        <p class="text-white text-lg mb-8 opacity-90">Guide your future with us</p>
        <div class="w-full max-w-3xl relative mb-20 text-white">
            <input type="text" placeholder="Search for careers..." class="w-full px-6 py-4 rounded-full text-lg focus:outline-none shadow-lg focus:ring-2 focus:ring-orange-400 text-gray-800 border border-black"/>
            <div class="w-full max-w-4xl mt-12 flex flex-col items-center gap-4">
                <div class="flex flex-wrap justify-center gap-4 w-full">
                    <?php foreach (array_slice($quickCategories, 0, 3) as $item): ?>
                    <button type="button" class="flex items-center justify-center gap-1 bg-gradient-to-r from-orange-500 to-pink-500 text-white border border-white/20 shadow-md rounded-lg flex-1 min-w-[120px] py-2 sm:py-3 text-[10px] sm:text-sm md:text-base hover:bg-white/20 transition-all duration-300 category-button" data-category='<?php echo htmlspecialchars(json_encode($item), ENT_QUOTES, 'UTF-8'); ?>' onclick="handleCategoryClick(this, event)">
                        <span class="text-xl"><?php echo $item['icon']; ?></span>
                        <span class="font-semibold whitespace-nowrap"><?php echo htmlspecialchars($item['name']); ?></span>
                    </button>
                    <?php endforeach; ?>
                </div>
                <div class="flex flex-wrap justify-center gap-4 w-full">
                    <?php foreach (array_slice($quickCategories, 3, 2) as $item): ?>
                    <button type="button" class="flex items-center bg-gradient-to-r from-blue-500 to-pink-500 justify-center gap-1 text-white border border-white/20 shadow-md rounded-lg flex-1 min-w-[120px] py-2 sm:py-3 text-[10px] sm:text-sm md:text-base hover:bg-white/20 transition-all duration-300 category-button" data-category='<?php echo htmlspecialchars(json_encode($item), ENT_QUOTES, 'UTF-8'); ?>' onclick="handleCategoryClick(this, event)">
                        <span class="text-xl"><?php echo $item['icon']; ?></span>
                        <span class="font-semibold whitespace-nowrap"><?php echo htmlspecialchars($item['name']); ?></span>
                    </button>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container mx-auto px-4 sm:px-6 lg:px-8 mb-4 md:mb-8">
    <div class="text-center mb-8 md:mb-12">
        <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-900 mb-3">Notification & Updates</h2>
        <p class="text-gray-600 text-sm sm:text-base">Stay updated with the latest career opportunities and exam notifications</p>
    </div>
    <div class="marquee-container bg-gradient-to-r from-orange-50 to-orange-100 rounded-xl p-4 border border-orange-200">
        <div class="marquee-content">
            <?php
            $notifications = ["📢 JEE Main 2024 registration starts from December 15!", "🎓 NEET UG 2024 exam date announced: May 5, 2024", "🔥 New scholarship program for engineering students launched", "📅 IIM CAT 2023 results to be declared on January 4, 2024", "🏆 Career counseling session with IIT alumni on Saturday", "📚 Free webinar on 'How to crack UPSC' this Sunday", "🎯 BITSAT 2024 application portal now open", "🌟 Internship opportunities with top IT companies"];
            foreach ($notifications as $notification) { 
                echo '<span class="inline-block mx-6 md:mx-10 px-4 py-2 bg-white rounded-lg shadow-sm border border-orange-300 text-gray-800 font-medium">' . $notification . '</span>'; 
            }
            foreach ($notifications as $notification) { 
                echo '<span class="inline-block mx-6 md:mx-10 px-4 py-2 bg-white rounded-lg shadow-sm border border-orange-300 text-gray-800 font-medium">' . $notification . '</span>'; 
            }
            ?>
        </div>
    </div>
</div>

<section class="max-w-7xl mx-auto px-4 py-8">
    <h2 class="text-2xl font-bold text-center mb-8">Updates</h2>
    <div class="block md:hidden relative min-h-[400px]">
        <div class="mobile-slider-container overflow-hidden h-[400px]">
            <div class="mobile-slider flex transition-transform duration-500 ease-in-out"></div>
        </div>
        <button class="mobile-prev absolute left-2 top-1/2 -translate-y-1/2 z-10 bg-white rounded-full w-10 h-10 flex items-center justify-center shadow-lg hover:bg-gray-50">
            <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
        </button>
        <button class="mobile-next absolute right-2 top-1/2 -translate-y-1/2 z-10 bg-white rounded-full w-10 h-10 flex items-center justify-center shadow-lg hover:bg-gray-50">
            <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
        </button>
        <div class="mobile-indicators flex justify-center gap-2 mt-6"></div>
    </div>
    <div class="hidden md:flex gap-6 justify-center">
        <div class="w-80 bg-white rounded-xl shadow p-4 overflow-hidden">
            <h2 class="text-lg font-semibold mb-4 text-center">Career</h2>
            <div class="relative">
                <button class="career-prev absolute left-0 top-1/2 -translate-y-1/2 z-10 bg-white rounded-full w-8 h-8 flex items-center justify-center shadow-md hover:bg-gray-50">
                    <svg class="w-5 h-5 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                </button>
                <div class="overflow-hidden h-full">
                    <div class="career-slider flex transition-transform duration-300 ease-in-out">
                        <div class="min-w-full text-center px-4"><img src="./assets/images/AACCC.jpeg" class="h-50 mx-auto mb-3"><p class="text-lg font-medium">Business</p><p class="text-sm text-gray-600 mt-1">Lead the corporate world</p></div>
                        <div class="min-w-full text-center px-4"><img src="./assets/images/AACCC.jpeg" class="h-50 mx-auto mb-3"><p class="text-lg font-medium">Medical</p><p class="text-sm text-gray-600 mt-1">Serve humanity with care</p></div>
                        <div class="min-w-full text-center px-4"><img src="./assets/images/AACCC.jpeg" class="h-50 mx-auto mb-3"><p class="text-lg font-medium">Engineering</p><p class="text-sm text-gray-600 mt-1">Build innovative solutions</p></div>
                    </div>
                </div>
                <button class="career-next absolute right-0 top-1/2 -translate-y-1/2 z-10 bg-white rounded-full w-8 h-8 flex items-center justify-center shadow-md hover:bg-gray-50">
                    <svg class="w-5 h-5 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </button>
            </div>
            <div class="flex justify-center gap-2 mt-4">
                <div class="career-dot w-2 h-2 rounded-full bg-blue-500 cursor-pointer" data-slide="0"></div>
                <div class="career-dot w-2 h-2 rounded-full bg-gray-300 cursor-pointer" data-slide="1"></div>
                <div class="career-dot w-2 h-2 rounded-full bg-gray-300 cursor-pointer" data-slide="2"></div>
            </div>
        </div>
        <div class="w-80 bg-white rounded-xl shadow p-4 overflow-hidden">
            <h2 class="text-lg font-semibold mb-4 text-center">Exam</h2>
            <div class="relative">
                <button class="exam-prev absolute left-0 top-1/2 -translate-y-1/2 z-10 bg-white rounded-full w-8 h-8 flex items-center justify-center shadow-md hover:bg-gray-50">
                    <svg class="w-5 h-5 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                </button>
                <div class="overflow-hidden h-full">
                    <div class="exam-slider flex transition-transform duration-300 ease-in-out">
                        <div class="min-w-full text-center px-4"><img src="assets/images/aptitudeTest.png" class="h-50 mx-auto mb-3"><p class="text-lg font-medium">UPSC</p><p class="text-sm text-gray-600 mt-1">Civil services examination</p></div>
                        <div class="min-w-full text-center px-4"><img src="assets/images/aptitudeTest.png" class="h-50 mx-auto mb-3"><p class="text-lg font-medium">NEET</p><p class="text-sm text-gray-600 mt-1">Medical entrance exam</p></div>
                        <div class="min-w-full text-center px-4"><img src="assets/images/aptitudeTest.png" class="h-50 mx-auto mb-3"><p class="text-lg font-medium">JEE</p><p class="text-sm text-gray-600 mt-1">Engineering entrance exam</p></div>
                    </div>
                </div>
                <button class="exam-next absolute right-0 top-1/2 -translate-y-1/2 z-10 bg-white rounded-full w-8 h-8 flex items-center justify-center shadow-md hover:bg-gray-50">
                    <svg class="w-5 h-5 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </button>
            </div>
            <div class="flex justify-center gap-2 mt-4">
                <div class="exam-dot w-2 h-2 rounded-full bg-blue-500 cursor-pointer" data-slide="0"></div>
                <div class="exam-dot w-2 h-2 rounded-full bg-gray-300 cursor-pointer" data-slide="1"></div>
                <div class="exam-dot w-2 h-2 rounded-full bg-gray-300 cursor-pointer" data-slide="2"></div>
            </div>
        </div>
        <div class="w-80 bg-white rounded-xl shadow p-4 overflow-hidden">
            <h2 class="text-lg font-semibold mb-4 text-center">Admission</h2>
            <div class="relative">
                <button class="admission-prev absolute left-0 top-1/2 -translate-y-1/2 z-10 bg-white rounded-full w-8 h-8 flex items-center justify-center shadow-md hover:bg-gray-50">
                    <svg class="w-5 h-5 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                </button>
                <div class="overflow-hidden h-full">
                    <div class="admission-slider flex transition-transform duration-300 ease-in-out">
                        <div class="min-w-full text-center px-4"><img src="assets/images/admissionImg.jpeg" class="h-50 mx-auto mb-3"><p class="text-lg font-medium">Scholarships</p><p class="text-sm text-gray-600 mt-1">Financial aid opportunities</p></div>
                        <div class="min-w-full text-center px-4"><img src="assets/images/admissionImg.jpeg" class="h-50 mx-auto mb-3"><p class="text-lg font-medium">Universities</p><p class="text-sm text-gray-600 mt-1">Prestigious universities</p></div>
                        <div class="min-w-full text-center px-4"><img src="assets/images/admissionImg.jpeg" class="h-50 mx-auto mb-3"><p class="text-lg font-medium">Colleges</p><p class="text-sm text-gray-600 mt-1">Top institutions worldwide</p></div>
                    </div>
                </div>
                <button class="admission-next absolute right-0 top-1/2 -translate-y-1/2 z-10 bg-white rounded-full w-8 h-8 flex items-center justify-center shadow-md hover:bg-gray-50">
                    <svg class="w-5 h-5 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </button>
            </div>
            <div class="flex justify-center gap-2 mt-4">
                <div class="admission-dot w-2 h-2 rounded-full bg-blue-500 cursor-pointer" data-slide="0"></div>
                <div class="admission-dot w-2 h-2 rounded-full bg-gray-300 cursor-pointer" data-slide="1"></div>
                <div class="admission-dot w-2 h-2 rounded-full bg-gray-300 cursor-pointer" data-slide="2"></div>
            </div>
        </div>
    </div>
</section>

<!-- ================= TOP TO EXPLORE ================= -->
<div class="text-center mb-2">
    <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-900">Top To Explore</h2>
    <p class="text-gray-600 text-base max-w-3xl justify-center p-4 mx-auto">Find the best colleges easily! Explore colleges either by your <b>Course</b> or by your preferred <b>City</b>.</p>
</div>
<div class="flex flex-nowrap justify-center items-center px-4 gap-2 sm:gap-4 md:gap-6 mb-2 md:mb-10 overflow-x-auto py-2">
    <button onclick="showCourseWise()" class="flex-shrink-0 px-3 sm:px-4 md:px-8 py-2 sm:py-3 rounded-lg md:rounded-2xl bg-orange-500 hover:bg-orange-600 text-white font-semibold text-xs sm:text-sm md:text-base whitespace-nowrap transition-colors duration-200 shadow-md hover:shadow-lg mr-4">🎓 Explore by Course</button>
    <button onclick="showCityWise()" class="flex-shrink-0 px-3 sm:px-4 md:px-8 py-2 sm:py-3 rounded-lg md:rounded-2xl bg-orange-500 hover:bg-orange-600 text-white font-semibold text-xs sm:text-sm md:text-base whitespace-nowrap transition-colors duration-200 shadow-md hover:shadow-lg">📍 Explore by City</button>
</div>
<div id="courseWise" class="max-w-6xl mx-auto p-8 bg-white rounded-2xl shadow">
    <p class="text-gray-500 mb-6">
        Step 1: Select your course stream <br>
        Step 2: Choose your study level (UG / PG) <br>
        Step 3: Click <b>View Colleges</b> to see matching colleges
    </p>
    <div class="grid md:grid-cols-2 gap-6 mb-8">
        <select id="courseSelect" onchange="enableLevel()" class="p-3 border rounded">
            <option value="">Select Course</option>
            <option value="engineering">Engineering</option>
            <option value="medical">Medical</option>
            <option value="science">Science</option>
            <option value="design">Design</option>
            <option value="defence">Defence</option>
        </select>
        <select id="levelSelect" disabled class="p-3 border rounded bg-gray-100 cursor-not-allowed">
            <option value="">Select Level</option>
            <option value="ug">UG</option>
            <option value="pg">PG</option>
        </select>
    </div>
    <button onclick="goCourseResult()" class="px-6 py-3 bg-orange-500 text-white rounded-xl font-semibold"> View Colleges →</button>
</div>
<div id="cityWise" class="max-w-6xl mx-auto p-8 bg-white rounded-2xl shadow hidden">
    <p class="text-gray-500 mb-6">
        Step 1: Select your preferred city <br>
        Step 2: Choose study level (UG / PG) <br>
        Step 3: Select course type <br>
        Step 4: Click <b>View Colleges</b>
    </p>
    <div class="grid md:grid-cols-3 gap-6 mb-8">
        <select id="citySelect" onchange="enableCityLevel()" class="p-3 border rounded">
            <option value="">Select City</option>
            <option value="sangli">Sangli</option>
            <option value="miraj">Miraj</option>
            <option value="satara">Satara</option>
            <option value="karad">Karad</option>
            <option value="pune">Pune</option>
            <option value="mumbai">Mumbai</option>
        </select>
        <select id="levelSelectCity" disabled onchange="enableCityCourse()" class="p-3 border rounded bg-gray-100 cursor-not-allowed">
            <option value="">Select Level</option>
            <option value="ug">UG</option>
            <option value="pg">PG</option>
        </select>
        <select id="cityCourseSelect" disabled class="p-3 border rounded bg-gray-100 cursor-not-allowed">
            <option value="">Select Course</option>
            <option value="engineering">Engineering</option>
            <option value="medical">Medical</option>
            <option value="science">Science</option>
            <option value="design">Design</option>
        </select>
    </div>
    <button onclick="goCityResult()" class="px-6 py-3 bg-orange-500 text-white rounded-xl font-semibold"> View Colleges →</button>
</div>

<div class="container mx-auto px-4 py-12">
    <div class="text-center mb-12">
        <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-900 mb-3">Our Services</h2>        
        <p>Comprehensive career solutions tailored for your success</p>
    </div>
    <div class="relative flex flex-col md:flex-row items-center gap-8 bg-white rounded-2xl border border-gray-200 p-6 md:p-10 mb-10 shadow-md">
        <h3 class="absolute top-0 left-0 bg-gradient-to-r from-orange-500 to-red-600 text-white font-bold text-sm md:text-base px-4 py-1 rounded-tr-lg rounded-br-lg shadow-lg z-10 animate-pulse">Career</h3>
        <div class="relative w-full md:w-1/2 flex justify-center">
            <img src="assets/images/serviceCareer.png" alt="Career Guidance" class="w-full sm:w-4/5 md:w-4/5 object-contain rounded-xl shadow-lg"/>
        </div>
        <div class="w-full md:w-1/2 flex flex-col justify-center gap-4">
            <div>
                <h3 class="text-xl sm:text-2xl md:text-3xl font-bold text-gray-900 mb-2">Career Guidance</h3>
                <p class="text-gray-600 text-sm md:text-base mb-4 leading-relaxed"> Our career guidance helps students identify their strengths, interests, and suitable career paths.</p>
                <button class="mb-6 px-6 py-3 bg-gradient-to-r from-orange-500 to-red-600 text-white text-base font-semibold rounded-lg hover:shadow-xl transition-all">Get Career Guidance »</button>
            </div>
            <div>
                <h3 class="text-xl sm:text-2xl md:text-3xl font-bold text-gray-900 mb-2">Career Counselling</h3>
                <p class="text-gray-600 text-sm md:text-base mb-4 leading-relaxed">One-on-one counselling for personalized career planning and strategy development.</p>
                <button class="px-6 py-3 bg-gradient-to-r from-orange-500 to-red-600 text-white text-base font-semibold rounded-lg hover:shadow-xl transition-all">Book Counselling »</button>
            </div>
        </div>
    </div>
    <div class="relative flex flex-col md:flex-row-reverse items-center gap-8 bg-white rounded-2xl border border-gray-200 p-6 md:p-10 mb-10 shadow-md">
        <div class="absolute top-0 right-0 bg-gradient-to-r from-blue-500 to-purple-600 text-white font-bold text-sm md:text-base px-4 py-1 rounded-tl-lg rounded-bl-lg shadow-lg z-10 animate-pulse desktop-only">Entrance Exam</div>
        <h3 class="absolute top-0 left-0 md:left-auto md:right-0 bg-gradient-to-r from-blue-500 to-purple-600 text-white font-bold text-sm md:text-base px-4 py-1 rounded-tr-lg rounded-br-lg md:rounded-tl-lg md:rounded-bl-lg shadow-lg z-10 animate-pulse block md:hidden">Entrance Exam</h3>
        <div class="relative w-full md:w-1/2 flex justify-center">
            <img src="assets/images/serviceEntrance.png" alt="Entrance Exam Guidance" class="w-full sm:w-4/5 md:w-4/5 object-contain rounded-xl shadow-lg"/>
        </div>
        <div class="w-full md:w-1/2 flex flex-col justify-center gap-4">
            <div>
                <h3 class="text-xl sm:text-2xl md:text-3xl font-bold text-gray-900 mb-2">Exam Guidance</h3>
                <p class="text-gray-600 text-sm md:text-base mb-4 leading-relaxed">Comprehensive guidance for JEE, NEET, and other competitive entrance exams with study strategies.</p>
                <button class="mb-6 px-6 py-3 bg-gradient-to-r from-blue-500 to-purple-600 text-white text-base font-semibold rounded-lg hover:shadow-xl transition-all">Get Exam Guidance »</button>
            </div>
            <div>
                <h3 class="text-xl sm:text-2xl md:text-3xl font-bold text-gray-900 mb-2">Exam Counselling</h3>
                <p class="text-gray-600 text-sm md:text-base mb-4 leading-relaxed">Personalized counselling for exam preparation, time management, and stress handling.</p>
                <button class="px-6 py-3 bg-gradient-to-r from-blue-500 to-purple-600 text-white text-base font-semibold rounded-lg hover:shadow-xl transition-all">Book Counselling »</button>
            </div>
        </div>
    </div>
    <div class="relative flex flex-col md:flex-row items-center gap-8 bg-white rounded-2xl border border-gray-200 p-6 md:p-10 mb-10 shadow-md">
        <h3 class="absolute top-0 left-0 bg-gradient-to-r from-green-500 to-teal-600 text-white font-bold text-sm md:text-base px-4 py-1 rounded-tr-lg rounded-br-lg shadow-lg z-10 animate-pulse">Admission</h3>
        <div class="relative w-full md:w-1/2 flex flex-col gap-4 items-center">
            <img src="assets/images/serviceAdmission.png" alt="Admission Guidance" class="w-full sm:w-4/5 md:w-full object-contain rounded-xl shadow-lg mt-6"/>    
        </div>
        <div class="w-full md:w-1/2 flex flex-col justify-center gap-4">
            <div>
                <h3 class="text-xl sm:text-2xl md:text-3xl font-bold text-gray-900 mb-2">Admission Guidance</h3>
                <p class="text-gray-600 text-sm md:text-base mb-4 leading-relaxed">Our admission guidance helps students understand eligibility, documentation, and counselling rounds.</p>
                <button class="px-6 py-3 bg-gradient-to-r from-green-500 to-teal-600 text-white text-base font-semibold rounded-lg hover:shadow-xl transition-all"> Get Admission Guidance »</button>
            </div>
            <div>
                <h3 class="text-xl sm:text-2xl md:text-3xl font-bold text-gray-900 mb-2">Admission Counselling</h3>
                <p class="text-gray-600 text-sm md:text-base mb-4 leading-relaxed">One-on-one counselling ensures correct college and course selection based on preferences and scores.</p>
                <button class="px-6 py-3 bg-gradient-to-r from-green-500 to-teal-600 text-white text-base font-semibold rounded-lg hover:shadow-xl transition-all">Book Counselling »</button>
            </div>
        </div>
    </div>
</div>

<!-- ===== Our Success ===== -->
<div class="w-full bg-white min-h-screen flex items-center justify-center mb-8 p-4">
    <div class="max-w-6xl w-full bg-white py-16 px-4 sm:px-6 lg:px-8 flex flex-col items-center">
        <div class="text-center mb-16 w-full">
            <h2 class="text-3xl sm:text-4xl md:text-5xl text-gray-900 font-bold tracking-tight mb-6 text-center">Our Success</h2>
            <div class="w-24 h-1.5 bg-orange-600 mx-auto rounded-full"></div>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 md:gap-10 w-full place-items-center">
            <div class="rounded-3xl flex flex-col items-center text-center">
                <div class="text-5xl md:text-6xl font-bold leading-none mb-6 flex justify-center">
                    <span style="color:#FC506F;filter:brightness(1.2)">2</span><span style="color:#FC506F;filter:brightness(1)">,</span><span style="color:#FC506F;filter:brightness(0.85)">0</span><span style="color:#FC506F;filter:brightness(0.7)">0</span><span style="color:#FC506F;filter:brightness(0.6)">0</span><span style="color:#FC506F;filter:brightness(0.5)">+</span>
                </div>
                <p class="text-lg text-gray-700 leading-relaxed text-center"> No. Of Students Counseled</p>
            </div>
            <div class="rounded-3xl flex flex-col items-center text-center">
                <div class="text-5xl md:text-6xl font-bold leading-none mb-6 flex justify-center">
                    <span style="color:#FC506F;filter:brightness(1.2)">1</span><span style="color:#FC506F;filter:brightness(0.9)">0</span><span style="color:#FC506F;filter:brightness(1)">,</span><span style="color:#FC506F;filter:brightness(0.85)">0</span><span style="color:#FC506F;filter:brightness(0.7)">0</span><span style="color:#FC506F;filter:brightness(0.6)">0</span><span style="color:#FC506F;filter:brightness(0.5)">+</span>
                </div>
                <p class="text-lg text-gray-700 leading-relaxed text-center"> No. Of Students Guided</p>
            </div>
            <div class="rounded-3xl flex flex-col items-center text-center">
                <div class="text-5xl md:text-6xl font-bold leading-none mb-6 flex justify-center">
                    <span style="color:#FC506F;filter:brightness(1.2)">2</span><span style="color:#FC506F;filter:brightness(0.9)">0</span><span style="color:#FC506F;filter:brightness(0.75)">0</span><span style="color:#FC506F;filter:brightness(0.5)">+</span>
                </div>
                <p class="text-lg text-gray-700 leading-relaxed text-center">No. Of Classes Connected </p>
            </div>
        </div>
    </div>
</div>

<!-- ===== Student Testimonials ===== -->
<section class="py-8 md:py-14 bg-white overflow-hidden">
    <div class="text-center mb-8 md:mb-12 px-4">
        <h2 class="text-3xl sm:text-4xl md:text-5xl font-bold text-gray-900 mb-3">Student Testimonials</h2>
    </div>
    
    <div class="max-w-6xl px-6 sm:px-4 md:px-8 relative">
        <!-- Navigation Buttons -->
        <button id="testimonialPrevBtn" aria-label="Previous testimonial">❮</button>
        <button id="testimonialNextBtn" aria-label="Next testimonial">❯</button>
        
        <!-- Gradient Overlays -->
        <div class="testimonials-gradient-overlay-left"></div>
        <div class="testimonials-gradient-overlay-right"></div>
        
        <!-- Testimonials Track -->
        <div class="overflow-visible px-4 sm:px-8 md:px-12">
            <div id="carouselTrack" class="flex gap-2 sm:gap-4 no-scrollbar transition-transform duration-500 ease-linear">
                <?php
                $testimonials = [
                    [
                        'name' => 'Sakshi Ingale',
                        'college' => 'Seth G S Medical College (KEM), Mumbai',
                        'image' => 'assets/images/sakshiIngale.png',
                        'rating' => 'assets/images/ratingStar.png',
                        'text' => 'Career Niti helped me in proper per result procedures like form filling was kept in batches so that students don\'t have to wait for their turn to come n waste their preparatory time. Many informative n guiding google meets were arranged that kept me up to date with the live notifications n I didn\'t have to keep searching. After results admission related queries were solved through google meetings. The round procedures were smooth enough n the staff was always available for any queries.'
                    ],
                    [
                        'name' => 'Kartikeyan Rajan Kumar',
                        'college' => 'IIT Bhilai',
                        'image' => 'assets/images/kartikeyan.png',
                        'rating' => 'assets/images/ratingStar.png',
                        'text' => 'I received assistance from Career Niti in understanding appropriate procedures based on the results for form filling. I was able to stay updated with live notifications. They organized Google meets to resolve the queries. The personnel was always willing to answer any questions and the round procedures went smoothly. They provide effective and beneficial guidance.'
                    ],
                    [
                        'name' => 'Sumit Garad',
                        'college' => 'IIT Palakkad',
                        'image' => 'assets/images/sumitGarad.png',
                        'rating' => 'assets/images/ratingStar4.png',
                        'text' => 'From start to finish, CareerNiti demonstrated a commitment to excellence that significantly eased the often stressful journey of applying to colleges. The team at CareerNiti is comprised of knowledgeable and dedicated professionals who are well-versed in the intricacies of the admission process.'
                    ],
                    [
                        'name' => 'Bhushan Shinde',
                        'college' => 'IISER Pune',
                        'image' => 'assets/images/bhushanShinde.png',
                        'rating' => 'assets/images/ratingStar.png',
                        'text' => 'Suraj sir from Career Niti provided valuable guidance on medical field options and IISER, suggesting a career in the research field. His professionalism, knowledge, and experience in guiding students through the complex admissions and counseling processes are commendable.'
                    ]
                ];
                
                $duplicatedTestimonials = array_merge($testimonials, $testimonials, $testimonials, $testimonials);
                
                foreach ($duplicatedTestimonials as $testimonial) {
                    echo '<div class="flex-shrink-0 w-80 md:w-96 px-4">';
                    echo '<div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-6 md:p-8 h-full">';
                    echo '<div class="flex items-start space-x-4 md:space-x-6 mb-6">';
                    echo '<img src="'.$testimonial['image'].'" alt="'.$testimonial['name'].'" class="w-20 h-20 md:w-24 md:h-24 rounded-full object-cover border-4 border-white shadow-lg flex-shrink-0"/>';
                    echo '<div>';
                    echo '<h3 class="text-xl md:text-2xl font-bold text-gray-900 mb-1">'.$testimonial['name'].'</h3>';
                    echo '<p class="text-blue-600 font-medium text-sm md:text-base">'.$testimonial['college'].'</p>';
                    echo '<div class="mt-2"><img src="'.$testimonial['rating'].'" alt="Rating" class="w-24 md:w-28 h-auto"/></div>';
                    echo '</div></div>';
                    echo '<div class="text-gray-700 leading-relaxed text-sm md:text-base">"'.$testimonial['text'].'"</div>';
                    echo '</div></div>';
                }
                ?>
            </div>
        </div>
    </div>
</section>

<!-- ===== Insights ===== -->
<div class="max-w-4xl mx-auto px-4 relative mb-12">
    <h2 class="text-3xl sm:text-4xl md:text-5xl font-bold text-center text-gray-900 mb-3 p-3">Insights</h2>
    <div class="overflow-hidden rounded-xl shadow-lg bg-black">
        <div id="player"></div>
    </div>
    <button onclick="prevVideo()" class="absolute top-1/2 -translate-y-1/2 left-4 bg-black/70 text-white p-4 rounded-full hover:bg-red-600 transition">❮</button>
    <button onclick="nextVideo()" class="absolute top-1/2 -translate-y-1/2 right-4 bg-black/70 text-white p-4 rounded-full hover:bg-red-600 transition">❯</button>
</div>

<!-- ===== Associates ===== -->
<div class="associations-full-width bg-white py-12 md:py-16">
    <div class="text-center mb-2 md:mb-12">
        <h1 class="text-4xl font-bold text-center mb-2">Associates With Us</h1>
    </div>
    <div class="partners-marquee-container">
        <div class="partners-marquee-content space-x-8 md:space-x-12">
            <?php
            $partners = [
                'assets/images/dice.jpeg',
                'assets/images/chate.jpeg', 
                'assets/images/kcp.jpeg',
                'assets/images/kapsan.jpeg',
                'assets/images/guidancePoint.jpeg',
                'assets/images/photon.jpeg',
                'assets/images/rajlakshmi.jpeg',
                'assets/images/royalAcademy.jpeg',
                'assets/images/hiremath.jpeg',
                'assets/images/saraswatiAcademy.jpeg'
            ];
            
            foreach ($partners as $partner) { 
                echo '<div class="flex-shrink-0 w-32 h-32 md:w-40 md:h-40 bg-white rounded-xl flex items-center justify-center p-2 border border-gray-200 shadow-sm">';
                echo '<img src="'.$partner.'" alt="Partner Logo" class="w-full h-full object-contain"/>';
                echo '</div>'; 
            }
            
            foreach ($partners as $partner) { 
                echo '<div class="flex-shrink-0 w-32 h-32 md:w-40 md:h-40 bg-white rounded-xl flex items-center justify-center p-2 border border-gray-200 shadow-sm">';
                echo '<img src="'.$partner.'" alt="Partner Logo" class="w-full h-full object-contain"/>';
                echo '</div>'; 
            }
            ?>
        </div>
    </div>
</div>

<!-- ===== Call to Action ===== -->
<div class="bg-gradient-to-r from-orange-500 to-red-600 text-white py-12 md:py-16">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold mb-4">Ready to Transform Your Career?</h2>
        <p class="text-lg sm:text-xl opacity-90 mb-8 max-w-2xl mx-auto">Take the first step towards your dream career with personalized guidance</p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <button class="px-8 py-4 bg-white text-orange-600 font-bold rounded-xl hover:bg-gray-100 hover:shadow-xl transition-all transform hover:-translate-y-1">Book Free Consultation</button>
            <button class="px-8 py-4 border-3 border-white text-white font-bold rounded-xl hover:bg-white/10 hover:shadow-xl transition-all transform hover:-translate-y-1">Explore All Services</button>
        </div>
    </div>
</div>

<?php include 'whatsapp.php'; ?>
<?php include 'includes/footer.php'; ?>

<!-- Modals -->
<div id="hoverModal" class="fixed z-50">
    <div class="modal-arrow"></div>
    <div class="p-0"></div>
</div>

<div id="mobileModal" class="fixed z-50">
    <div class="mobile-modal-content">
        <div class="p-4"></div>
    </div>
</div>

<script>
// YouTube Video Player
let tag = document.createElement('script');
tag.src = "https://www.youtube.com/iframe_api";
document.body.appendChild(tag);

const videos = [
    "xxnotD2GybA",
    "Act3nE-3iwU",
    "unnT-PPmfks",
    "d_Q_PvzDdcI",
    "ttiz7ozwQ3w"
];

let currentIndex = 0;
let player;
let autoCarouselInterval;
let userPlaying = false;

function onYouTubeIframeAPIReady() {
    player = new YT.Player('player', {
        height: '500',
        width: '100%',
        videoId: videos[currentIndex],
        playerVars: { autoplay: 0, controls: 1 },
        events: { onStateChange: onPlayerStateChange }
    });

    startAutoCarousel();
}

function onPlayerStateChange(event) {
    if (event.data === YT.PlayerState.PLAYING) {
        userPlaying = true;
        stopAutoCarousel();
    } else if (event.data === YT.PlayerState.ENDED) {
        userPlaying = false;
        nextVideo(true);
    } else if (event.data === YT.PlayerState.PAUSED || event.data === YT.PlayerState.CUED) {
        if (!userPlaying) startAutoCarousel();
    }
}

function loadVideo(index) {
    currentIndex = index;
    player.cueVideoById(videos[currentIndex]);
    userPlaying = false;
}

function nextVideo(auto = false) {
    currentIndex = (currentIndex + 1) % videos.length;
    loadVideo(currentIndex);
    if (auto) startAutoCarousel();
}

function prevVideo() {
    currentIndex = (currentIndex - 1 + videos.length) % videos.length;
    loadVideo(currentIndex);
    if (!userPlaying) startAutoCarousel();
}

function startAutoCarousel() {
    stopAutoCarousel();
    autoCarouselInterval = setInterval(() => {
        if (!userPlaying) nextVideo();
    }, 5000);
}

function stopAutoCarousel() {
    if (autoCarouselInterval) clearInterval(autoCarouselInterval);
}

// Testimonials Carousel
const track = document.getElementById("carouselTrack");
const nextBtn = document.getElementById("testimonialNextBtn");
const prevBtn = document.getElementById("testimonialPrevBtn");

function getCardWidth() {
    const screenWidth = window.innerWidth;
    if (screenWidth < 640) { return 280 + 16; }
    else if (screenWidth < 768) { return 300 + 16; }
    else if (screenWidth < 1024) { return 320 + 24; }
    else { return 384 + 24; }
}

let cardWidth = getCardWidth();
let position = 0;
let autoScroll, resumeTimer;
const totalWidth = (track.scrollWidth / 4);

function checkInfinite() {
    if (position >= totalWidth) {
        position = position - totalWidth;
        track.style.transition = 'none';
        track.style.transform = `translateX(-${position}px)`;
        track.offsetHeight;
        track.style.transition = 'transform 500ms ease-linear';
    }
    if (position < 0) {
        position = totalWidth + position;
        track.style.transition = 'none';
        track.style.transform = `translateX(-${position}px)`;
        track.offsetHeight;
        track.style.transition = 'transform 500ms ease-linear';
    }
}

function startAuto() {
    stopAuto();
    autoScroll = setInterval(() => {
        position += 0.8;
        checkInfinite();
        track.style.transform = `translateX(-${position}px)`;
    }, 16);
}

function stopAuto() {
    clearInterval(autoScroll);
}

function pauseAndResume() {
    stopAuto();
    clearTimeout(resumeTimer);
    resumeTimer = setTimeout(startAuto, 3000);
}

nextBtn.addEventListener("click", () => {
    pauseAndResume();
    position += cardWidth * 2;
    checkInfinite();
    track.style.transform = `translateX(-${position}px)`;
});

prevBtn.addEventListener("click", () => {
    pauseAndResume();
    position -= cardWidth * 2;
    checkInfinite();
    track.style.transform = `translateX(-${position}px)`;
});

track.addEventListener("mouseenter", stopAuto);
track.addEventListener("mouseleave", startAuto);

window.addEventListener('resize', () => {
    cardWidth = getCardWidth();
    const currentIndex = Math.round(position / cardWidth);
    position = currentIndex * cardWidth;
    track.style.transform = `translateX(-${position}px)`;
});

startAuto();

// Mobile Slider
const mobileCards = [
    { category: 'Career', title: 'Business', desc: 'Lead the corporate world', img: './assets/images/AACCC.jpeg' },
    { category: 'Exam', title: 'UPSC', desc: 'Civil services examination', img: 'assets/images/aptitudeTest.png' },
    { category: 'Admission', title: 'Scholarships', desc: 'Financial aid opportunities', img: 'assets/images/admissionImg.jpeg' },
    { category: 'Career', title: 'Medical', desc: 'Serve humanity with care', img: './assets/images/AACCC.jpeg' },
    { category: 'Exam', title: 'NEET', desc: 'Medical entrance exam', img: 'assets/images/aptitudeTest.png' },
    { category: 'Admission', title: 'Universities', desc: 'Prestigious universities', img: 'assets/images/admissionImg.jpeg' },
    { category: 'Career', title: 'Engineering', desc: 'Build innovative solutions', img: './assets/images/AACCC.jpeg' },
    { category: 'Exam', title: 'JEE', desc: 'Engineering entrance exam', img: 'assets/images/aptitudeTest.png' },
    { category: 'Admission', title: 'Colleges', desc: 'Top institutions worldwide', img: 'assets/images/admissionImg.jpeg' }
];

function initMobileSlider() {
    const sliderContainer = document.querySelector('.mobile-slider');
    const indicatorsContainer = document.querySelector('.mobile-indicators');
    
    if (!sliderContainer) return;
    
    sliderContainer.innerHTML = ''; 
    indicatorsContainer.innerHTML = '';
    
    mobileCards.forEach((card, index) => {
        const cardDiv = document.createElement('div');
        cardDiv.className = 'min-w-full';
        cardDiv.innerHTML = `
            <div class="bg-white rounded-xl shadow p-6 mx-4 h-[350px] flex flex-col items-center justify-center">
                <h2 class="text-lg font-semibold mb-4 text-center">${card.category}</h2>
                <img src="${card.img}" class="h-40 mx-auto mb-4" alt="${card.title}">
                <p class="text-xl font-bold mb-2">${card.title}</p>
                <p class="text-sm text-gray-600 text-center">${card.desc}</p>
            </div>`;
        sliderContainer.appendChild(cardDiv);
        
        const indicator = document.createElement('div');
        indicator.className = `w-2.5 h-2.5 rounded-full ${index === 0 ? 'bg-blue-500' : 'bg-gray-300'} mobile-dot-indicator`;
        indicator.dataset.index = index;
        indicatorsContainer.appendChild(indicator);
    });
    
    const mobileSlider = document.querySelector('.mobile-slider');
    const mobileDots = document.querySelectorAll('.mobile-dot-indicator');
    const prevBtn = document.querySelector('.mobile-prev');
    const nextBtn = document.querySelector('.mobile-next');
    let currentSlide = 0;
    const totalSlides = mobileCards.length;
    
    function updateMobileSlider() {
        mobileSlider.style.transform = `translateX(-${currentSlide * 100}%)`;
        mobileDots.forEach((dot, index) => {
            if (index === currentSlide) { 
                dot.classList.remove('bg-gray-300'); 
                dot.classList.add('bg-blue-500'); 
            } else { 
                dot.classList.remove('bg-blue-500'); 
                dot.classList.add('bg-gray-300'); 
            }
        });
    }
    
    if (nextBtn) { 
        nextBtn.onclick = function() { 
            currentSlide = (currentSlide + 1) % totalSlides; 
            updateMobileSlider(); 
        }; 
    }
    
    if (prevBtn) { 
        prevBtn.onclick = function() { 
            currentSlide = (currentSlide - 1 + totalSlides) % totalSlides; 
            updateMobileSlider(); 
        }; 
    }
    
    window.mobileInterval = setInterval(() => { 
        currentSlide = (currentSlide + 1) % totalSlides; 
        updateMobileSlider(); 
    }, 5000);
    
    const mobileContainer = document.querySelector('.mobile-slider-container');
    if (mobileContainer) {
        mobileContainer.addEventListener('mouseenter', () => { 
            clearInterval(window.mobileInterval); 
        });
        mobileContainer.addEventListener('mouseleave', () => { 
            window.mobileInterval = setInterval(() => { 
                currentSlide = (currentSlide + 1) % totalSlides; 
                updateMobileSlider(); 
            }, 5000); 
        });
    }
    
    updateMobileSlider();
}

// Desktop Sliders
function initDesktopSliders() {
    const careerSlider = document.querySelector('.career-slider'); 
    const careerDots = document.querySelectorAll('.career-dot'); 
    const careerPrev = document.querySelector('.career-prev'); 
    const careerNext = document.querySelector('.career-next');
    
    let careerCurrent = 0; 
    const careerTotal = 3;
    
    function updateCareerSlider() { 
        careerSlider.style.transform = `translateX(-${careerCurrent * 100}%)`; 
        careerDots.forEach((dot, index) => { 
            dot.classList.toggle('bg-blue-500', index === careerCurrent); 
            dot.classList.toggle('bg-gray-300', index !== careerCurrent); 
        }); 
    }
    
    if (careerNext) careerNext.onclick = () => { 
        careerCurrent = (careerCurrent + 1) % careerTotal; 
        updateCareerSlider(); 
    };
    
    if (careerPrev) careerPrev.onclick = () => { 
        careerCurrent = (careerCurrent - 1 + careerTotal) % careerTotal; 
        updateCareerSlider(); 
    };
    
    careerDots.forEach(dot => { 
        dot.onclick = () => { 
            careerCurrent = parseInt(dot.dataset.slide); 
            updateCareerSlider(); 
        }; 
    });
    
    window.careerInterval = setInterval(() => { 
        careerCurrent = (careerCurrent + 1) % careerTotal; 
        updateCareerSlider(); 
    }, 5000);
    
    const careerContainer = careerSlider.closest('.relative');
    if (careerContainer) { 
        careerContainer.addEventListener('mouseenter', () => clearInterval(window.careerInterval)); 
        careerContainer.addEventListener('mouseleave', () => { 
            window.careerInterval = setInterval(() => { 
                careerCurrent = (careerCurrent + 1) % careerTotal; 
                updateCareerSlider(); 
            }, 5000); 
        }); 
    }
    
    updateCareerSlider();

    const examSlider = document.querySelector('.exam-slider'); 
    const examDots = document.querySelectorAll('.exam-dot'); 
    const examPrev = document.querySelector('.exam-prev'); 
    const examNext = document.querySelector('.exam-next');
    
    let examCurrent = 0; 
    const examTotal = 3;
    
    function updateExamSlider() { 
        examSlider.style.transform = `translateX(-${examCurrent * 100}%)`; 
        examDots.forEach((dot, index) => { 
            dot.classList.toggle('bg-blue-500', index === examCurrent); 
            dot.classList.toggle('bg-gray-300', index !== examCurrent); 
        }); 
    }
    
    if (examNext) examNext.onclick = () => { 
        examCurrent = (examCurrent + 1) % examTotal; 
        updateExamSlider(); 
    };
    
    if (examPrev) examPrev.onclick = () => { 
        examCurrent = (examCurrent - 1 + examTotal) % examTotal; 
        updateExamSlider(); 
    };
    
    examDots.forEach(dot => { 
        dot.onclick = () => { 
            examCurrent = parseInt(dot.dataset.slide); 
            updateExamSlider(); 
        }; 
    });
    
    window.examInterval = setInterval(() => { 
        examCurrent = (examCurrent + 1) % examTotal; 
        updateExamSlider(); 
    }, 5000);
    
    const examContainer = examSlider.closest('.relative');
    if (examContainer) { 
        examContainer.addEventListener('mouseenter', () => clearInterval(window.examInterval)); 
        examContainer.addEventListener('mouseleave', () => { 
            window.examInterval = setInterval(() => { 
                examCurrent = (examCurrent + 1) % examTotal; 
                updateExamSlider(); 
            }, 5000); 
        }); 
    }
    
    updateExamSlider();

    const admissionSlider = document.querySelector('.admission-slider'); 
    const admissionDots = document.querySelectorAll('.admission-dot'); 
    const admissionPrev = document.querySelector('.admission-prev'); 
    const admissionNext = document.querySelector('.admission-next');
    
    let admissionCurrent = 0; 
    const admissionTotal = 3;
    
    function updateAdmissionSlider() { 
        admissionSlider.style.transform = `translateX(-${admissionCurrent * 100}%)`; 
        admissionDots.forEach((dot, index) => { 
            dot.classList.toggle('bg-blue-500', index === admissionCurrent); 
            dot.classList.toggle('bg-gray-300', index !== admissionCurrent); 
        }); 
    }
    
    if (admissionNext) admissionNext.onclick = () => { 
        admissionCurrent = (admissionCurrent + 1) % admissionTotal; 
        updateAdmissionSlider(); 
    };
    
    if (admissionPrev) admissionPrev.onclick = () => { 
        admissionCurrent = (admissionCurrent - 1 + admissionTotal) % admissionTotal; 
        updateAdmissionSlider(); 
    };
    
    admissionDots.forEach(dot => { 
        dot.onclick = () => { 
            admissionCurrent = parseInt(dot.dataset.slide); 
            updateAdmissionSlider(); 
        }; 
    });
    
    window.admissionInterval = setInterval(() => { 
        admissionCurrent = (admissionCurrent + 1) % admissionTotal; 
        updateAdmissionSlider(); 
    }, 5000);
    
    const admissionContainer = admissionSlider.closest('.relative');
    if (admissionContainer) { 
        admissionContainer.addEventListener('mouseenter', () => clearInterval(window.admissionInterval)); 
        admissionContainer.addEventListener('mouseleave', () => { 
            window.admissionInterval = setInterval(() => { 
                admissionCurrent = (admissionCurrent + 1) % admissionTotal; 
                updateAdmissionSlider(); 
            }, 5000); 
        }); 
    }
    
    updateAdmissionSlider();
}

// Modal Functions
let activeModal = null; 
let currentCategory = null; 
let isMobile = window.innerWidth < 768;

window.addEventListener('resize', () => { 
    isMobile = window.innerWidth < 768; 
});

function handleCategoryClick(button, event) {
    event.preventDefault(); 
    event.stopPropagation();
    
    try {
        const categoryData = JSON.parse(button.getAttribute('data-category'));
        currentCategory = categoryData;
        
        const predictorCategories = ['engineering-predictor', 'medical-predictor'];
        if (predictorCategories.includes(categoryData.id)) { 
            window.location.href = 'login.php'; 
            return; 
        }
        
        if (isMobile) { 
            showMobileModal(categoryData); 
        } else { 
            showDesktopModal(categoryData, event); 
        }
    } catch (error) { 
        console.error('Error in click handler:', error); 
        alert('Error loading category data. Please try again.'); 
    }
}

function showDesktopModal(categoryData, event) {
    const modal = document.getElementById('hoverModal');
    const modalContent = modal.querySelector('.p-0');
    
    if (activeModal) hideDesktopModal();
    
    modalContent.innerHTML = createModalContent(categoryData, false);
    modal.style.display = 'block';
    
    modal.style.position = 'fixed';
    modal.style.top = '100px';
    modal.style.left = '50%';
    modal.style.transform = 'translateX(-50%)';
    
    activeModal = modal;
    
    initializeTabs(modal, categoryData);
    
    const closeBtn = modalContent.querySelector('.close-desktop-modal');
    if (closeBtn) {
        closeBtn.onclick = function(e) {
            e.stopPropagation();
            hideDesktopModal();
        };
    }
}

function showMobileModal(categoryData) {
    const modal = document.getElementById('mobileModal');
    const content = modal.querySelector('.mobile-modal-content .p-4');
    
    content.innerHTML = createModalContent(categoryData, true);
    modal.style.display = 'block'; 
    activeModal = modal;
    
    initializeTabs(modal.querySelector('.mobile-modal-content'), categoryData);
    
    const closeBtn = content.querySelector('.close-mobile-modal');
    if (closeBtn) {
        closeBtn.onclick = function(e) {
            e.stopPropagation();
            closeMobileModal();
        };
    }
    
    document.body.classList.add('modal-open');
}

function createModalContent(categoryData, isMobile) {
    const name = categoryData.name; 
    const icon = categoryData.icon; 
    const gradient = categoryData.gradient; 
    const description = categoryData.description; 
    const categoryId = categoryData.id;
    
    return `
    <div>
        <div class="${gradient} p-4 text-white ${isMobile ? 'rounded-t-2xl' : 'rounded-t-lg'}">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-lg bg-white/20 flex items-center justify-center">
                        <span class="text-xl">${icon}</span>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold">${name}</h3>
                        <p class="text-white/90 text-sm">${description}</p>
                    </div>
                </div>
                <button class="${isMobile ? 'close-mobile-modal' : 'close-desktop-modal'} w-8 h-8 flex items-center justify-center rounded-full hover:bg-white/20 transition-colors">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="flex border-b">
            <button class="modal-tab active flex-1 py-3 text-center text-sm font-semibold" data-tab="courses">Courses</button>
            <button class="modal-tab flex-1 py-3 text-center text-sm font-semibold text-gray-600" data-tab="colleges">Colleges</button>
            <button class="modal-tab flex-1 py-3 text-center text-sm font-semibold text-gray-600" data-tab="exams">Exams</button>
        </div>
        <div class="hover-modal-content p-4" id="modalContent" style="max-height: 300px; overflow-y: auto;">
            ${renderTabContent(categoryData.courses, 'courses')}
        </div>
        <div class="border-t p-4 bg-gray-50 ${isMobile ? 'rounded-b-2xl' : ''}">
            <a href="/careers/${categoryId}" class="block w-full py-3 text-center text-sm font-semibold text-white ${gradient.replace('bg-gradient-to-br', 'bg-gradient-to-r')} rounded-lg hover:shadow-lg transition-all">
                View all ${name} options
            </a>
        </div>
    </div>`;
}

function renderTabContent(items, tabType) {
    let content = ''; 
    const colors = { 
        'courses': { bg: 'bg-orange-100', text: 'text-orange-600' }, 
        'colleges': { bg: 'bg-blue-100', text: 'text-blue-600' }, 
        'exams': { bg: 'bg-green-100', text: 'text-green-600' } 
    };
    const color = colors[tabType] || colors.courses;
    
    if (!items || items.length === 0) return '<p class="text-gray-500 text-center p-4">No data available</p>';
    
    items.forEach((item, index) => {
        if (index < 5) {
            const safeItem = item.replace(/'/g, "\\'").replace(/"/g, '&quot;');
            content += `
            <div class="modal-item p-3 rounded-lg mb-2 border border-transparent hover:border-orange-200 cursor-pointer" onclick="selectItem('${safeItem}', '${tabType}')">
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 rounded-md ${color.bg} flex items-center justify-center flex-shrink-0">
                        <span class="text-sm font-semibold ${color.text}">${index + 1}</span>
                    </div>
                    <span class="text-gray-800 font-medium text-sm">${item}</span>
                    <i class="fas fa-chevron-right text-gray-400 ml-auto text-xs"></i>
                </div>
            </div>`;
        }
    });
    
    return content;
}

function initializeTabs(container, categoryData) {
    const tabButtons = container.querySelectorAll('.modal-tab');
    const contentDiv = container.querySelector('#modalContent');
    
    tabButtons.forEach(button => {
        button.addEventListener('click', () => {
            const tab = button.getAttribute('data-tab');
            
            tabButtons.forEach(btn => { 
                btn.classList.remove('active'); 
                btn.classList.add('text-gray-600'); 
            });
            
            button.classList.add('active'); 
            button.classList.remove('text-gray-600');
            
            const items = categoryData[tab];
            if (items) {
                contentDiv.innerHTML = renderTabContent(items, tab);
            } else {
                contentDiv.innerHTML = '<p class="text-gray-500 text-center p-4">No data available for this tab</p>';
            }
        });
    });
}

function hideDesktopModal() {
    const modal = document.getElementById('hoverModal');
    if (modal) { 
        modal.style.display = 'none'; 
        activeModal = null; 
        currentCategory = null;
    }
}

function closeMobileModal() {
    const modal = document.getElementById('mobileModal');
    if (modal) { 
        modal.style.display = 'none'; 
        activeModal = null; 
        currentCategory = null; 
        document.body.classList.remove('modal-open');
    }
}

function selectItem(item, type) { 
    console.log(`Selected ${type}: ${item}`); 
    alert(`You selected: ${item}`); 
    
    if (isMobile) {
        closeMobileModal(); 
    } else { 
        hideDesktopModal(); 
    }
}

// Top To Explore Functions
function showCourseWise() {
    document.getElementById('courseWise').classList.remove("hidden");
    document.getElementById('cityWise').classList.add("hidden");
}

function showCityWise() {
    document.getElementById('cityWise').classList.remove("hidden");
    document.getElementById('courseWise').classList.add("hidden");
}

/* COURSE WISE */
function enableLevel() {
    const levelSelect = document.getElementById('levelSelect');
    levelSelect.disabled = !document.getElementById('courseSelect').value;
    levelSelect.value = "";
}

function goCourseResult() {
    const courseSelect = document.getElementById('courseSelect');
    const levelSelect = document.getElementById('levelSelect');
    
    if (!courseSelect.value || !levelSelect.value) {
        alert("Please select Course and Level");
        return;
    }
    window.location.href = `colleges.php?mode=course&course_type=${courseSelect.value}&level=${levelSelect.value}`;
}

/* CITY WISE */
function enableCityLevel() {
    const levelSelectCity = document.getElementById('levelSelectCity');
    levelSelectCity.disabled = !document.getElementById('citySelect').value;
    levelSelectCity.value = "";
    document.getElementById('cityCourseSelect').disabled = true;
}

function enableCityCourse() {
    document.getElementById('cityCourseSelect').disabled = !document.getElementById('levelSelectCity').value;
}

function goCityResult() {
    const citySelect = document.getElementById('citySelect');
    const levelSelectCity = document.getElementById('levelSelectCity');
    const cityCourseSelect = document.getElementById('cityCourseSelect');
    
    if (!citySelect.value || !levelSelectCity.value || !cityCourseSelect.value) {
        alert("Please complete all selections");
        return;
    }
    window.location.href = `colleges.php?mode=city&city=${citySelect.value}&level=${levelSelectCity.value}&course_type=${cityCourseSelect.value}`;
}

// Close modals when clicking outside
document.addEventListener('click', (e) => {
    const desktopModal = document.getElementById('hoverModal');
    const mobileModal = document.getElementById('mobileModal');
    
    if (desktopModal && desktopModal.style.display === 'block' && 
        !desktopModal.contains(e.target) && 
        !e.target.closest('.category-button')) {
        hideDesktopModal();
    }
    
    if (mobileModal && mobileModal.style.display === 'block' && 
        e.target === mobileModal) {
        closeMobileModal();
    }
});

// Close modals with Escape key
document.addEventListener('keydown', (e) => { 
    if (e.key === 'Escape') { 
        if (activeModal) { 
            if (isMobile) {
                closeMobileModal(); 
            } else { 
                hideDesktopModal(); 
            } 
        }
    } 
});

// Search functionality
const searchInput = document.querySelector('input[type="text"]');
if (searchInput) {
    searchInput.addEventListener('keypress', function(e) { 
        if (e.key === 'Enter') { 
            const searchTerm = searchInput.value.trim(); 
            if (searchTerm) window.location.href = `/search.php?q=${encodeURIComponent(searchTerm)}`; 
        } 
    });
}

// Initialize on DOM ready
document.addEventListener('DOMContentLoaded', function() {
    if (window.innerWidth < 768) { 
        initMobileSlider(); 
    } else { 
        initDesktopSliders(); 
    }
    
    window.addEventListener('resize', function() {
        if (window.mobileInterval) clearInterval(window.mobileInterval);
        if (window.careerInterval) clearInterval(window.careerInterval);
        if (window.examInterval) clearInterval(window.examInterval);
        if (window.admissionInterval) clearInterval(window.admissionInterval);
        
        if (window.innerWidth < 768) { 
            initMobileSlider(); 
        } else { 
            initDesktopSliders(); 
        }
    });
});
</script>
</body>
</html>
