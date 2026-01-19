<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Cut off Software</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link href="./assets/css/output.css" rel="stylesheet">
  <style>
    /* Additional styles for better hover effects */
   /* Limit dropdown to show ~5 items + nice scrollbar */
.dropdown ul {
  max-height: 260px;          /* ≈ 5 items × ~52px each */
  overflow-y: auto;
  scrollbar-width: thin;      /* Firefox */
  scrollbar-color: #f97316 #fed7aa;
}

/* Webkit browsers (Chrome, Edge, Safari) */
.dropdown ul::-webkit-scrollbar {
  width: 8px;
}

.dropdown ul::-webkit-scrollbar-track {
  background: #fed7aa;
  border-radius: 4px;
}

.dropdown ul::-webkit-scrollbar-thumb {
  background: #f97316;
  border-radius: 4px;
}

.dropdown ul::-webkit-scrollbar-thumb:hover {
  background: #ea580c;
}
    /* Results table styling */
    #resultsContainer {
      margin-top: 2rem;
      max-width: 1200px;
      margin-left: auto;
      margin-right: auto;
    }

    .results-table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 1rem;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .results-table th {
      background-color: #f97316;
      color: white;
      padding: 12px;
      text-align: left;
      font-weight: bold;
    }

    .results-table td {
      padding: 10px 12px;
      border-bottom: 1px solid #e5e7eb;
    }

    .results-table tr:nth-child(even) {
      background-color: #fffbeb;
    }

    .results-table tr:hover {
      background-color: #fed7aa;
    }

    .no-results {
      text-align: center;
      padding: 2rem;
      color: #6b7280;
      font-style: italic;
    }

    .loading {
      text-align: center;
      padding: 2rem;
      color: #f97316;
    }

    /* Scrollable container for table on mobile */
    .table-container {
      overflow-x: auto;
      margin-top: 1rem;
    }
    
    /* Input styling */
    input[type="number"] {
      -moz-appearance: textfield;
    }
    
    input[type="number"]::-webkit-outer-spin-button,
    input[type="number"]::-webkit-inner-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }
    
    .select-input:focus,
    input[type="number"]:focus {
      outline: none;
      box-shadow: 0 0 0 2px #fdba74;
    }
    
    /* Button styling */
    #searchBtn {
      transition: all 0.3s ease;
    }
    
    #searchBtn:hover {
      transform: translateY(-2px);
      box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
    }
    
    #searchBtn:active {
      transform: translateY(0);
    }
  </style>
</head>
<body>

<div class="bg-white pt-10 w-full max-w-4xl 
            p-3 sm:p-4 md:p-6 lg:p-10 
            rounded-xl shadow-lg mx-auto mt-20">

  <!-- Title -->
  <div class="text-center mb-6">
    <h2 class="bg-orange-500 text-white inline-block px-6 py-2 rounded-md font-bold">
      Cut off Software
    </h2>
    <div class="mt-3">
      <span class="bg-yellow-700 px-10 py-1 rounded-md font-semibold">Engineering</span>
    </div>
  </div>

  <!-- Form Grid -->
  <div class="grid md:grid-cols-2 gap-8">

    <!-- LEFT -->
    <div class="space-y-4">
      <div>
        <label class="font-bold">Select Home University</label>
        <div class="search-select" data-name="college"></div>
      </div>
      <div>
        <label class="font-bold">Select Home University2</label>
        <div class="search-select" data-name="college"></div>
      </div>
      <div>
        <label class="font-bold">Gender</label>
        <div class="search-select" data-name="gender"></div>
      </div>
      <div>
        <label class="font-bold">Select Round</label>
        <div class="search-select" data-name="round"></div>
      </div>
      <div>
        <label class="font-bold">Preferred Branch 2</label>
        <div class="search-select" data-name="branch"></div>
      </div>
      <div>
        <label class="font-bold">Preferred Branch 4</label>
        <div class="search-select" data-name="branch"></div>
      </div>
      <div>
        <label class="font-bold">State Merit List Rank</label>
        <input type="number" id="rank" name="rank" placeholder="Enter max rank" 
               class="w-full bg-orange-500 text-white px-4 py-2 rounded-md focus:outline-none">
      </div>
    </div>

    <!-- RIGHT -->
    <div class="space-y-4">
      <div>
        <label class="font-bold">Select Other Home University 1:</label>
        <div class="search-select" data-name="college"></div>
      </div>
      <div>
        <label class="font-bold">Category</label>
        <div class="search-select" data-name="category"></div>
      </div>
      <div>
        <label class="font-bold">Special Reservation</label>
        <div class="search-select" data-name="category"></div>
      </div>
      <div>
        <label class="font-bold">Preferred Branch 1</label>
        <div class="search-select" data-name="branch"></div>
      </div>
      <div>
        <label class="font-bold">Preferred Branch 3</label>
        <div class="search-select" data-name="branch"></div>
      </div>
      <div>
        <label class="font-bold">Preferred Branch 5</label>
        <div class="search-select" data-name="branch"></div>
      </div>
      <div>
        <label class="font-bold">Percentile</label>
        <input type="number" id="percentile" step="0.01" min="0" max="100" 
               placeholder="Enter min percentile" 
               class="w-full bg-orange-500 text-white px-4 py-2 rounded-md focus:outline-none">
      </div>
    </div>

  </div>
  
  <!-- SEARCH BUTTON -->
  <div class="text-center mt-8">
    <button id="searchBtn"
      class="bg-orange-500 hover:bg-orange-600 
             text-white font-bold px-10 py-3 
             rounded-md shadow-md transition">
      🔍 Search
    </button>
  </div>

</div>

<!-- Results Section -->
<div id="resultsContainer" class="hidden">
  <div class="text-center mb-4">
    <h3 class="text-xl font-bold text-orange-600">Search Results</h3>
    <p class="text-gray-600">Found <span id="resultCount">0</span> records</p>
  </div>
  <div class="table-container">
    <table class="results-table">
     <thead>
  <tr>
    <th>Sr.No</th>
    <th>University</th>
    <th>College</th>
    <th>Branch</th>
    <th>Category</th>
    <th>Rank</th>
    <th>Percentile</th>
  </tr>
</thead>

      <tbody id="resultsBody">
        <!-- Results will be populated here -->
      </tbody>
    </table>
  </div>
  <div id="noResults" class="no-results hidden">
    No results found matching your criteria.
  </div>
  <div id="loading" class="loading hidden">
    <i class="fas fa-spinner fa-spin mr-2"></i> Searching...
  </div>
</div>

<script>
// Fetch options from Excel file on page load
async function fetchOptionsFromExcel() {
  try {
    console.log('Fetching dropdown options from Excel...');
    const response = await fetch('get_options.php');
    
    if (!response.ok) {
      throw new Error(`HTTP error! status: ${response.status}`);
    }
    
    const data = await response.json();
    console.log('Data received from Excel:', data);
    
    // Check for error in response
    if (data.error) {
      console.error('Error from server:', data.error);
      // Use sample data as fallback
      dataSets.college = ["VJTI Mumbai", "COEP Pune", "SPIT Mumbai"];
      dataSets.branch = ["Computer Engineering", "IT", "Electronics"];
      dataSets.category = ["OPEN", "OBC", "SC", "ST"];
      return;
    }
    
    // Update the dataSets with actual data from Excel
    if (data.colleges && data.colleges.length > 0) {
      dataSets.college = data.colleges;
      console.log(`Loaded ${data.colleges.length} colleges`);
    }
    if (data.branches && data.branches.length > 0) {
      dataSets.branch = data.branches;
      console.log(`Loaded ${data.branches.length} branches`);
    }
    if (data.categories && data.categories.length > 0) {
      dataSets.category = data.categories;
      console.log(`Loaded ${data.categories.length} categories`);
    }
    
  } catch (error) {
    console.error('Error fetching options:', error);
    // Fallback data
    dataSets.college = ["VJTI Mumbai", "COEP Pune", "SPIT Mumbai", "PICT Pune"];
    dataSets.branch = ["Computer Engineering", "IT", "Electronics", "Mechanical", "Civil"];
    dataSets.category = ["OPEN", "OBC", "SC", "ST", "EWS"];
  }
}

// Data sets for dropdowns
const dataSets = {
  college: [],
  gender: ["Male", "Female"],
  category: [],
  branch: [],
  round: ["Round 1", "Round 2", "Round 3", "Round 4"]
};

// Get all selected values from a specific dropdown type
function getAllValues(dropdownName) {
  const inputs = document.querySelectorAll(`[data-name="${dropdownName}"] .select-input`);
  const values = [];
  inputs.forEach(input => {
    if (input.value && input.value.trim() !== '' && input.value.toLowerCase() !== 'any') {
      values.push(input.value.trim());
    }
  });
  return values;
}

// Search function - fetches only rank and percentile data from Excel
async function performSearch() {
  console.log('Starting search...');
  
  // Get all filter values
  const colleges = getAllValues('college');
  const branches = getAllValues('branch');
  const categories = getAllValues('category');
  const rank = document.getElementById('rank').value.trim();
  const percentile = document.getElementById('percentile').value.trim();

  console.log('Search criteria:', { colleges, branches, categories, rank, percentile });

  // Show loading
  document.getElementById('loading').classList.remove('hidden');
  document.getElementById('resultsContainer').classList.remove('hidden');
  document.getElementById('noResults').classList.add('hidden');
  document.getElementById('resultsBody').innerHTML = '';

  try {
    // Build query string
    const params = new URLSearchParams();
    if (colleges.length > 0) params.append('college', colleges.join(','));
    if (branches.length > 0) params.append('branch', branches.join(','));
    if (categories.length > 0) params.append('category', categories.join(','));
    if (rank) params.append('max_rank', rank);
    if (percentile) params.append('min_percentile', percentile);

    console.log('Fetching from: fetch_results.php?' + params.toString());

    // Fetch results from Excel
    const response = await fetch(`fetch_results.php?${params.toString()}`);
    
    if (!response.ok) {
      throw new Error(`HTTP error! status: ${response.status}`);
    }
    
    const results = await response.json();
    console.log(`Received ${results ? results.length : 0} results`);

    // Hide loading
    document.getElementById('loading').classList.add('hidden');

    // Display results
    if (results && results.length > 0) {
      const resultsBody = document.getElementById('resultsBody');
      results.forEach((result, index) => {
  const row = document.createElement('tr');

  row.innerHTML = `
    <td>${index + 1}</td>   <!-- AUTO Sr.No -->
    <td>${result.university || 'N/A'}</td>
    <td>${result.college || 'N/A'}</td>
    <td>${result.branch || 'N/A'}</td>
    <td>${result.category || 'N/A'}</td>
    <td>${result.rank || 'N/A'}</td>
    <td>${result.percentile ? result.percentile.toFixed(2) : 'N/A'}</td>
  `;

  resultsBody.appendChild(row);
});

      document.getElementById('resultCount').textContent = results.length;
      document.getElementById('noResults').classList.add('hidden');
    } else {
      document.getElementById('noResults').classList.remove('hidden');
      document.getElementById('resultCount').textContent = '0';
    }
  } catch (error) {
    console.error('Search error:', error);
    document.getElementById('loading').classList.add('hidden');
    document.getElementById('noResults').classList.remove('hidden');
    document.getElementById('noResults').textContent = 'Error fetching results. Please try again.';
  }
}

// Initialize all search-select dropdowns
function initializeDropdowns() {
  console.log('Initializing dropdowns...');
  
  document.querySelectorAll(".search-select").forEach(box => {
    const name = box.dataset.name;
    const options = dataSets[name] || [];

    console.log(`Setting up ${name} dropdown with ${options.length} options`);

    box.innerHTML = `
      <div class="relative">
        <input type="text" placeholder="Select or type to search..."
          class="select-input w-full bg-orange-500 text-white px-4 py-2 rounded-md cursor-pointer focus:outline-none"
          readonly>

        <div class="dropdown hidden absolute z-10 w-full bg-white border rounded-md shadow-lg mt-1">
          <input type="text" placeholder="Search..."
            class="search-box w-full px-3 py-2 border-b focus:outline-none">

          <ul class="max-h-60 overflow-y-auto"></ul>
        </div>
      </div>
    `;

    const input = box.querySelector(".select-input");
    const dropdown = box.querySelector(".dropdown");
    const searchBox = box.querySelector(".search-box");
    const list = box.querySelector("ul");

    // Render items
    function render(items) {
      list.innerHTML = "";
      
      // Add empty option
      const emptyLi = document.createElement("li");
      emptyLi.textContent = "Any";
      emptyLi.className = "px-4 py-3 hover:bg-orange-100 cursor-pointer font-medium";
      emptyLi.onclick = () => {
        input.value = "";
        dropdown.classList.add("hidden");
      };
      list.appendChild(emptyLi);
      
      if (items.length === 0) {
        const noDataLi = document.createElement("li");
        noDataLi.textContent = "No data available";
        noDataLi.className = "px-4 py-3 text-gray-500 italic";
        list.appendChild(noDataLi);
        return;
      }
      
      items.forEach(item => {
        const li = document.createElement("li");
        li.textContent = item;
        li.className = "px-4 py-3 hover:bg-orange-100 cursor-pointer";
        li.onclick = () => {
          input.value = item;
          dropdown.classList.add("hidden");
        };
        list.appendChild(li);
      });
    }

    // Show items
    function showItems() {
      if (options.length === 0) {
        render([]);
        input.placeholder = "Loading options...";
      } else {
        render(options.slice(0, 20));
        input.placeholder = `Select ${name} (${options.length} options)`;
      }
    }

    // Initial load
    showItems();

    input.addEventListener("click", () => {
      dropdown.classList.toggle("hidden");
      if (!dropdown.classList.contains("hidden")) {
        showItems();
        searchBox.value = "";
        searchBox.focus();
      }
    });

    searchBox.addEventListener("input", () => {
      const val = searchBox.value.toLowerCase();
      if (val === "") {
        render(options.slice(0, 20));
      } else {
        const filtered = options.filter(o => o.toLowerCase().includes(val));
        render(filtered.slice(0, 20));
      }
    });

    // Allow typing in main input
    input.removeAttribute("readonly");
    input.addEventListener("input", () => {
      const val = input.value.toLowerCase();
      if (!dropdown.classList.contains("hidden")) {
        if (val === "") {
          render(options.slice(0, 20));
        } else {
          const filtered = options.filter(o => o.toLowerCase().includes(val));
          render(filtered.slice(0, 20));
        }
      }
    });

    // Close dropdown when clicking outside
    document.addEventListener("click", e => {
      if (!box.contains(e.target)) {
        dropdown.classList.add("hidden");
      }
    });
  });
  
  console.log('Dropdowns initialized');
}

// Initialize on page load
document.addEventListener('DOMContentLoaded', async () => {
  console.log('DOM loaded, initializing application...');
  
  // Fetch options from Excel first
  await fetchOptionsFromExcel();
  
  // Initialize dropdowns with data
  initializeDropdowns();
  
  // Add search button event
  document.getElementById('searchBtn').addEventListener('click', performSearch);
  
  // Allow Enter key in inputs to trigger search
  document.querySelectorAll('input[type="text"], input[type="number"]').forEach(input => {
    input.addEventListener('keypress', (e) => {
      if (e.key === 'Enter') {
        performSearch();
      }
    });
  });
  
  console.log('Application ready');
});
</script>

</body>
</html>