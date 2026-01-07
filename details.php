<?php
session_start();
// Validate input
if (!isset($_GET['id']) || !is_numeric($_GET['id']) || $_GET['id'] <= 0) {
    header('Location: ../../admission.php'); // Go up 2 levels
    exit();
}

$process_id = intval($_GET['id']);
require_once '../../config/db.php';
$database = new Database();
$conn = $database->getConnection();

// Fetch process details
$query = "SELECT ap.*, p.title as program_title, p.program_key 
          FROM admission_processes ap 
          JOIN admission_programs p ON ap.program_id = p.id 
          WHERE ap.id = ? AND ap.is_active = 1";
          
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $process_id);
$stmt->execute();
$result = $stmt->get_result();
$process = $result->fetch_assoc();
$stmt->close();

if (!$process) {
    $conn->close();
    header('Location: ../../admission.php');
    exit();
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CareerNiti - <?php echo htmlspecialchars($process['title']); ?></title>
    <link rel="icon" type="image/png" href="../../assets/images/title-logo.png">
    <link rel="stylesheet" href="../../assets/css/output.css">
    <style>
        html {
            scroll-behavior: smooth;
            scroll-padding-top: 120px;
        }
        
        .section-active {
            background: linear-gradient(135deg, #f97316 0%, #db2777 100%);
            color: white;
            box-shadow: 0 4px 6px -1px rgba(249, 115, 22, 0.3);
        }
        
        .line-clamp-2 {
            overflow: hidden;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 2;
        }
        
        .transition-all {
            transition: all 0.3s ease;
        }
        
        .sticky-nav-container {
            position: sticky;
            top: 60px;
            z-index: 40;
            background-color: #f9fafb;
            padding-top: 1rem;
            padding-bottom: 1rem;
        }
        
        .main-content-wide {
            width: 100%;
        }
        
        @media (min-width: 1024px) {
            .main-content-wide {
                width: 75%;
            }
        }
        
        .sidebar-narrow {
            width: 100%;
        }
        
        @media (min-width: 1024px) {
            .sidebar-narrow {
                width: 30%;
            }
            
            .sticky-sidebar {
                position: sticky;
                top: 120px;
            }
        }
        
        .prose ul {
            list-style-type: disc;
            margin-left: 1.5em;
            margin-bottom: 1em;
        }
        
        .prose ol {
            list-style-type: decimal;
            margin-left: 1.5em;
            margin-bottom: 1em;
        }
        
        .prose li {
            margin-bottom: 0.5em;
        }
        
        .prose strong {
            font-weight: bold;
        }
        
        .prose em {
            font-style: italic;
        }
        
        .prose table {
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 1em;
        }
        
        .prose th, .prose td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        
        .prose th {
            background-color: #f2f2f2;
        }
        
        .scroll-mt-32 {
            scroll-margin-top: 8rem;
        }
    </style>
</head>
<body>
    <?php include '../../includes/navbar.php'; ?>    
    <div class="relative text-center py-8 bg-gradient-to-r from-orange-400 to-pink-600 text-white">
        <h1 class="text-4xl font-bold">Admission - <?php echo htmlspecialchars($process['program_title']); ?></h1>
    </div>    
    <div class="min-h-screen bg-gray-50">
        <div class="max-w-7xl mx-auto flex flex-col lg:flex-row gap-8 p-4 lg:p-8">
            <div class="main-content-wide">
                <div class="mb-8">
                    <h1 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-2">
                        <?php echo htmlspecialchars($process['title']); ?>
                    </h1>
                    <nav class="text-sm text-gray-500">
                        <a href="../../index.php" class="hover:text-orange-500">Home</a> &gt; 
                        <a href="../../admission.php" class="hover:text-orange-500">Admission</a> &gt; 
                        <span class="text-gray-700"><?php echo htmlspecialchars($process['program_title']); ?></span>
                    </nav>
                </div>               
                <div class="sticky-nav-container mb-8">
                    <div class="flex flex-wrap gap-3 justify-start lg:justify-center">
                        <button onclick="scrollToSection('introduction')" class="px-4 py-2 rounded-full transition-all duration-300 section-active">Introduction</button>
                        <button onclick="scrollToSection('eligibility')" class="px-4 py-2 rounded-full transition-all duration-300 bg-white text-gray-600 hover:bg-gray-100 border border-gray-200">Eligibility</button>
                        <button onclick="scrollToSection('reservation-policy')" class="px-4 py-2 rounded-full transition-all duration-300 bg-white text-gray-600 hover:bg-gray-100 border border-gray-200">Reservation Policy</button>
                        <button onclick="scrollToSection('fees')" class="px-4 py-2 rounded-full transition-all duration-300 bg-white text-gray-600 hover:bg-gray-100 border border-gray-200">Fees</button>
                        <button onclick="scrollToSection('process-flow')" class="px-4 py-2 rounded-full transition-all duration-300 bg-white text-gray-600 hover:bg-gray-100 border border-gray-200">Process Flow</button>
                        <?php if (!empty($faqs)): ?>
                        <button onclick="scrollToSection('faq')" class="px-4 py-2 rounded-full transition-all duration-300 bg-white text-gray-600 hover:bg-gray-100 border border-gray-200">FAQ</button>
                        <?php endif; ?>
                    </div>
                </div>
                <div id="introduction" class="bg-white rounded-lg shadow-sm mb-8 overflow-hidden scroll-mt-32">
                    <div class="p-6">
                        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Introduction</h2>
                        <div class="text-gray-600 leading-relaxed prose max-w-none">
                            <?php echo $process['description'] ? htmlspecialchars_decode($process['description']) : '<p class="text-gray-500 italic">No description available.</p>'; ?>
                        </div>
                    </div>
                </div>
                <div id="eligibility" class="bg-white rounded-lg shadow-sm mb-8 overflow-hidden scroll-mt-32">
                    <div class="p-6">
                        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Eligibility</h2>
                        <div class="text-gray-600 prose max-w-none">
                            <?php echo $process['eligibility'] ? htmlspecialchars_decode($process['eligibility']) : '<p class="text-gray-500 italic">No eligibility criteria specified.</p>'; ?>
                        </div>
                    </div>
                </div>
                <div id="reservation-policy" class="bg-white rounded-lg shadow-sm mb-8 overflow-hidden scroll-mt-32">
                    <div class="p-6">
                        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Reservation Policy</h2>
                        <div class="text-gray-600 prose max-w-none">
                            <?php echo $process['reservation_policy'] ? htmlspecialchars_decode($process['reservation_policy']) : '<p class="text-gray-500 italic">No reservation policy specified.</p>'; ?>
                        </div>
                    </div>
                </div>
                <div id="fees" class="bg-white rounded-lg shadow-sm mb-8 overflow-hidden scroll-mt-32">
                    <div class="p-6">
                        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Fees</h2>
                        <div class="text-gray-600 prose max-w-none">
                            <?php echo $process['fees'] ? htmlspecialchars_decode($process['fees']) : '<p class="text-gray-500 italic">Fee structure not available.</p>'; ?>
                        </div>
                    </div>
                </div>
                <div id="process-flow" class="bg-white rounded-lg shadow-sm mb-8 overflow-hidden scroll-mt-32">
                    <div class="p-6">
                        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Process Flow</h2>
                        <div class="text-gray-600 prose max-w-none">
                            <?php echo $process['process_flow'] ? nl2br(htmlspecialchars($process['process_flow'])) : '<p class="text-gray-500 italic">Process flow not specified.</p>'; ?>
                        </div>
                    </div>
                </div>
                  <div id="faq" class="bg-white rounded-lg shadow-sm mb-8 overflow-hidden scroll-mt-32">
                    <div class="p-6">
                        <h2 class="text-2xl font-semibold text-gray-800 mb-4">FAQs</h2>
                        <div class="text-gray-600 prose max-w-none">
                            <?php echo $process['faqs']; ?>
                        </div>
                    </div>
                </div>                
            </div>
            <div class="sidebar-narrow">
                <div class="sticky-sidebar">
                    <div class="bg-white rounded-lg shadow-sm p-2">
                        <div class="mb-8">
                            <h2 class="text-gray-800 font-medium text-lg mb-4">KNOW YOUR NEAREST COUNSELLING CENTRE</h2>
                            <div class="space-y-4">
                                <div class="relative">
                                    <select id="stateSelect" class="w-full p-3 bg-white border border-gray-300 rounded-lg appearance-none cursor-pointer text-gray-600 focus:outline-none focus:border-orange-500 focus:ring-2 focus:ring-orange-200 transition-colors">
                                        <option value="" disabled selected>Select State</option>
                                        <option value="maharashtra">Maharashtra</option>
                                        <option value="karnataka">Karnataka</option>
                                        <option value="goa">Goa</option>
                                    </select>
                                    <div class="absolute inset-y-0 right-0 flex items-center px-3 pointer-events-none">
                                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="relative">
                                    <select id="districtSelect" class="w-full p-3 bg-white border border-gray-300 rounded-lg appearance-none cursor-pointer text-gray-600 focus:outline-none focus:border-orange-500 focus:ring-2 focus:ring-orange-200 transition-colors" disabled>
                                        <option value="" disabled selected>Select District</option>
                                    </select>
                                    <div class="absolute inset-y-0 right-0 flex items-center px-3 pointer-events-none">
                                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </div>
                                </div>
                                <button id="findLocationBtn" class="w-full py-3 px-4 bg-gradient-to-r from-orange-500 to-pink-500 text-white rounded-lg hover:from-orange-600 hover:to-pink-600 transition-colors font-medium disabled:opacity-50 disabled:cursor-not-allowed" disabled>
                                    Get Location
                                </button>
                            </div>
                        </div>
                        <div>
                            <h2 class="text-gray-800 font-medium text-lg mb-4">POPULAR ARTICLES</h2>
                            <div class="space-y-4">
                                <a href="../../notification.php?id=1" class="flex items-start space-x-3 group cursor-pointer hover:bg-gray-50 p-2 rounded-lg transition-colors">
                                    <div class="w-12 h-12 flex-shrink-0">
                                        <img src="../../assets/newsIcon-Dgiz0zYH.png" alt="News Icon" class="w-full h-full object-cover rounded">
                                    </div>
                                    <div class="flex-1">
                                        <h3 class="text-sm text-gray-800 group-hover:text-orange-500 line-clamp-2 mb-1 transition-colors">
                                            India will need 90,000 forensic scientists in 9 years
                                        </h3>
                                        <p class="text-xs text-gray-500">4.4k views</p>
                                    </div>
                                </a>
                                <a href="../../notification.php?id=2" class="flex items-start space-x-3 group cursor-pointer hover:bg-gray-50 p-2 rounded-lg transition-colors">
                                    <div class="w-12 h-12 flex-shrink-0">
                                        <img src="../../assets/newsIcon-Dgiz0zYH.png" alt="News Icon" class="w-full h-full object-cover rounded">
                                    </div>
                                    <div class="flex-1">
                                        <h3 class="text-sm text-gray-800 group-hover:text-orange-500 line-clamp-2 mb-1 transition-colors">
                                            Update on JEE (Advanced) 2024 Exam date
                                        </h3>
                                        <p class="text-xs text-gray-500">3.5k views</p>
                                    </div>
                                </a>
                                <a href="../../notification.php?id=3" class="flex items-start space-x-3 group cursor-pointer hover:bg-gray-50 p-2 rounded-lg transition-colors">
                                    <div class="w-12 h-12 flex-shrink-0">
                                        <img src="../../assets/newsIcon-Dgiz0zYH.png" alt="News Icon" class="w-full h-full object-cover rounded">
                                    </div>
                                    <div class="flex-1">
                                        <h3 class="text-sm text-gray-800 group-hover:text-orange-500 line-clamp-2 mb-1 transition-colors">
                                            KEAM 2024: Inviting Applications...
                                        </h3>
                                        <p class="text-xs text-gray-500">2.7k views</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include '../../whatsapp.php'; ?>
    <?php include '../../includes/footer.php'; ?>
    <script>
        const districtData = {
            maharashtra: ['Sangli', 'Kolhapur', 'Satara', 'Pune', 'Mumbai'],
            karnataka: ['Bangalore', 'Mysore', 'Hubli', 'Belgaum'],
            goa: ['North Goa', 'South Goa']
        };

        document.addEventListener('DOMContentLoaded', function() {
            const stateSelect = document.getElementById('stateSelect');
            const districtSelect = document.getElementById('districtSelect');
            const findLocationBtn = document.getElementById('findLocationBtn');

            stateSelect.addEventListener('change', function() {
                const selectedState = this.value;
                
                if (selectedState && districtData[selectedState]) {
                    districtSelect.disabled = false;
                    districtSelect.innerHTML = '<option value="" disabled selected>Select District</option>';
                    
                    districtData[selectedState].forEach(district => {
                        const option = document.createElement('option');
                        option.value = district.toLowerCase().replace(/\s+/g, '-');
                        option.textContent = district;
                        districtSelect.appendChild(option);
                    });
                    
                    districtSelect.addEventListener('change', function() {
                        findLocationBtn.disabled = !this.value;
                    });
                } else {
                    districtSelect.disabled = true;
                    districtSelect.innerHTML = '<option value="" disabled selected>Select District</option>';
                    findLocationBtn.disabled = true;
                }
            });

            findLocationBtn.addEventListener('click', function() {
                const state = stateSelect.options[stateSelect.selectedIndex].text;
                const district = districtSelect.options[districtSelect.selectedIndex].text;
                alert(`Finding nearest counseling centre in ${district}, ${state}...`);
            });

            function scrollToSection(sectionId) {
                const section = document.getElementById(sectionId);
                if (section) {
                    const offset = 120;
                    const sectionTop = section.offsetTop - offset;
                    window.scrollTo({
                        top: sectionTop,
                        behavior: 'smooth'
                    });
                    
                    updateActiveTab(sectionId);
                }
            }

            function updateActiveTab(activeId) {
                const buttons = document.querySelectorAll('.sticky-nav-container button');
                buttons.forEach(button => {
                    const match = button.getAttribute('onclick')?.match(/'([^']+)'/);
                    const section = match ? match[1] : null;
                    
                    if (section === activeId) {
                        button.classList.add('section-active');
                        button.classList.remove('bg-white', 'text-gray-600', 'border', 'border-gray-200');
                    } else {
                        button.classList.remove('section-active');
                        button.classList.add('bg-white', 'text-gray-600', 'border', 'border-gray-200');
                    }
                });
            }

            let scrollTimeout;
            function updateActiveSection() {
                const sections = [
                    'introduction',
                    'eligibility', 
                    'reservation-policy',
                    'fees',
                    'process-flow',
                    'faq'
                ];
                
                const scrollPosition = window.scrollY + 140;
                let activeSection = 'introduction';
                
                sections.forEach(sectionId => {
                    const section = document.getElementById(sectionId);
                    if (section) {
                        const sectionTop = section.offsetTop;
                        const sectionHeight = section.offsetHeight;
                        
                        if (scrollPosition >= sectionTop && scrollPosition < sectionTop + sectionHeight) {
                            activeSection = sectionId;
                        }
                    }
                });
                
                updateActiveTab(activeSection);
            }

            window.addEventListener('scroll', () => {
                clearTimeout(scrollTimeout);
                scrollTimeout = setTimeout(updateActiveSection, 100);
            });

            updateActiveSection();
        });
    </script>
</body>
</html>
