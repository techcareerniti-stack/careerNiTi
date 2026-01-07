<?php
// admission.php (at root)
require_once 'config/db.php';

$database = new Database();
$db = $database->getConnection();
$currentTab = isset($_GET['tab']) ? $_GET['tab'] : 'UG';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CareerNiti - Admission</title>
    <link rel="icon" type="image/png" href="assets/images/title-logo.png">
    <link rel="stylesheet" href="assets/css/output.css">
    <style>
        .program-card {
            width: 100%;
            max-width: 384px; 
        }
        @media (max-width: 640px) {
            #programCards {
                display: grid;
                grid-template-columns: repeat(2, 1fr);
                gap: 1rem;
            }
            
            .program-card {
                max-width: 100%;
                min-width: 0; 
            }
        }
        .admission-grid {
            display: grid;
            gap: 1rem;
            grid-template-columns: repeat(2, 1fr);
        }
        
        @media (min-width: 640px) {
            .admission-grid {
                grid-template-columns: repeat(3, 1fr); 
            }
        }
        
        @media (min-width: 768px) {
            .admission-grid {
                grid-template-columns: repeat(4, 1fr); 
            }
        }
        
        @media (min-width: 1024px) {
            .admission-grid {
                grid-template-columns: repeat(5, 1fr);
            }
        }
        
        @media (min-width: 1280px) {
            .admission-grid {
                grid-template-columns: repeat(6, 1fr); 
            }
        }
        
        @media (min-width: 1536px) {
            .admission-grid {
                grid-template-columns: repeat(7, 1fr);
            }
        }
        .process-image {
            width: 100%;
            height: 120px;
            object-fit: contain;
        }
        
        @media (min-width: 768px) {
            .process-image {
                height: 140px;
            }
        }
        .tab-container {
            width: 160px; 
        }
        .header-title {
            font-size: 2rem;
        }
        
        @media (max-width: 768px) {
            .header-title {
                font-size: 1.875rem;
            }
        }
        
        @media (max-width: 640px) {
            .header-title {
                font-size: 1.5rem;
            }
            
            .tab-container {
                width: 140px;
            }
        }
        .program-card, .tab-container a, .process-card {
            transition: all 0.3s ease;
        }
        
        .h-48 {
            height: 12rem;
        }
    </style>
</head>
<body class="bg-gray-50">
   <?php include 'includes/navbar.php'; ?>
    <div class="relative text-center py-8 bg-gradient-to-r from-orange-400 to-pink-600 text-white">
        <h1 class="header-title font-bold">Admission</h1>
    </div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="mt-10 mb-10 flex tab-container mx-auto h-8 rounded-lg overflow-hidden border-none">
            <a href="?tab=UG" class="w-full flex items-center justify-center cursor-pointer transition-colors <?php echo $currentTab === 'UG' ? 'bg-orange-500 text-white' : 'bg-gray-100 text-gray-600'; ?>">
                <span class="font-medium">UG</span>
            </a>
            <a href="?tab=PG" class="w-full flex items-center justify-center cursor-pointer transition-colors <?php echo $currentTab === 'PG' ? 'bg-orange-500 text-white' : 'bg-gray-100 text-gray-600'; ?>">
                <span class="font-medium">PG</span>
            </a>
        </div>
        <div id="programCards" class="flex flex-wrap justify-center gap-4 my-4">
            <?php
            $query = "SELECT * FROM admission_programs WHERE is_active = 1 ORDER BY display_order";
            $result = $db->query($query);
            
            if ($result && $result->num_rows > 0):
                while ($program = $result->fetch_assoc()):
                    $programKey = strtolower(str_replace(' ', '-', $program['title']));
            ?>
            <div data-program="<?php echo $programKey; ?>" data-program-id="<?php echo $program['id']; ?>"data-type="<?php echo $currentTab; ?>" class="program-card max-w-sm bg-white rounded-lg border border-gray-200 cursor-pointer hover:shadow-lg overflow-hidden transition-shadow duration-300">
                <div class="w-full h-45">
                    <img src="<?php echo htmlspecialchars($program['image_path']); ?>" alt="<?php echo htmlspecialchars($program['alt_text']); ?>" class="w-full h-full object-cover">
                </div>
                <div class="p-4">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-orange-500 font-medium text-lg"><?php echo htmlspecialchars($program['title']); ?></h3>
                            <p class="text-gray-600 text-sm"><?php echo $currentTab; ?></p>
                        </div>
                        <div class="text-gray-400">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
            <?php 
                endwhile;
            else:
                echo '<p class="text-center text-gray-600 col-span-full">No programs available.</p>';
            endif;            
            $db->close();
            ?>
        </div>
        <div id="admissionProcesses" class="hidden mt-12"></div>
    </div>
    <?php include 'whatsapp.php'; ?>
    <?php include 'includes/footer.php'; ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const programCards = document.querySelectorAll('.program-card');
            const admissionProcessesContainer = document.getElementById('admissionProcesses');            
            programCards.forEach(card => {
                card.addEventListener('click', function() {
                    const programId = this.getAttribute('data-program-id');
                    const programType = this.getAttribute('data-type');
                    const programName = this.querySelector('h3').textContent;
                    
                    // IMPORTANT: Use correct path to API
                    fetch(`api/get_admission_processes.php?program_id=${programId}&type=${programType}`)
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Network response was not ok');
                            }
                            return response.json();
                        })
                        .then(data => {
                            if (data.success && data.processes.length > 0) {
                                programCards.forEach(c => c.classList.remove('ring-2', 'ring-orange-500', 'ring-offset-2'));
                                this.classList.add('ring-2', 'ring-orange-500', 'ring-offset-2');
                                
                                let processesHTML = `
                                    <div class="mb-6">
                                        <h2 class="text-2xl text-center font-bold text-gray-800 mb-2">Admission Process for ${programName} (${programType})</h2>
                                        <p class="text-gray-600 text-center">Click on any process to view details</p>
                                    </div>
                                    <div class="admission-grid">`;
                                
                                data.processes.forEach(process => {
                                    // IMPORTANT: Correct path to details page
                                    processesHTML += `
                                        <div class="process-card bg-white border border-gray-200 rounded-lg cursor-pointer hover:shadow-md transition-all duration-300 hover:border-orange-300 p-3 flex flex-col items-center h-full"
                                             onclick="window.location.href='admission/medical/details.php?id=${process.id}'">
                                            <div class="w-full aspect-square flex items-center justify-center mb-3">
                                                <img src="${process.image_path}" 
                                                     alt="${process.alt_text}" 
                                                     class="process-image object-contain p-2">
                                            </div>
                                            <div class="text-center mt-auto">
                                                <h3 class="text-sm font-medium text-gray-800 mb-1 break-words">${process.title}</h3>
                                            </div>
                                        </div>`;
                                });
                                
                                processesHTML += `</div>`;
                                admissionProcessesContainer.innerHTML = processesHTML;
                                admissionProcessesContainer.classList.remove('hidden');
                                admissionProcessesContainer.scrollIntoView({ 
                                    behavior: 'smooth',
                                    block: 'start'
                                });
                            } else {
                                admissionProcessesContainer.innerHTML = `
                                    <div class="text-center py-8">
                                        <p class="text-gray-600">No admission processes found for this program.</p>
                                    </div>`;
                                admissionProcessesContainer.classList.remove('hidden');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            admissionProcessesContainer.innerHTML = `
                                <div class="text-center py-8">
                                    <p class="text-red-600">Error loading admission processes. Please try again.</p>
                                </div>`;
                            admissionProcessesContainer.classList.remove('hidden');
                        });
                });
            });
            
            const urlParams = new URLSearchParams(window.location.search);
            const programParam = urlParams.get('program');
            const tabParam = urlParams.get('tab') || 'UG';
            
            if (programParam) {
                const targetCard = document.querySelector(`[data-program="${programParam}"]`);
                if (targetCard) {
                    setTimeout(() => {
                        targetCard.click();
                    }, 500);
                }
            }
            
            if (tabParam) {
                sessionStorage.setItem('admissionTab', tabParam);
            }
            
            const storedTab = sessionStorage.getItem('admissionTab');
            if (!urlParams.get('tab') && storedTab) {
                window.history.replaceState(null, '', `?tab=${storedTab}`);
            }
        });
    </script>
</body>
</html>
