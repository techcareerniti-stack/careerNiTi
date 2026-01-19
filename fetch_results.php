<?php
require __DIR__ . '/vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\IOFactory;

header('Content-Type: application/json');

$excelFile = __DIR__ . '/uploads/cap.xlsx';

if (!file_exists($excelFile)) {
    echo json_encode(["error" => "Excel file not found"]);
    exit;
}

/* ---------------- GET FILTERS ---------------- */
$selectedColleges   = isset($_GET['college']) ? array_map('trim', explode(',', $_GET['college'])) : [];
$selectedBranches   = isset($_GET['branch']) ? array_map('trim', explode(',', $_GET['branch'])) : [];
$selectedCategories = isset($_GET['category']) ? array_map('trim', explode(',', $_GET['category'])) : [];
$selectedReserve    = isset($_GET['reservation']) ? array_map('trim', explode(',', $_GET['reservation'])) : [];

$minRank        = isset($_GET['max_rank']) ? (int)$_GET['max_rank'] : null;          // >=
$maxPercentile  = isset($_GET['min_percentile']) ? (float)$_GET['min_percentile'] : null; // <=

try {

    $spreadsheet = IOFactory::load($excelFile);
    $sheet = $spreadsheet->getActiveSheet();
    $rows = $sheet->toArray();

    $results = [];

    foreach ($rows as $index => $row) {
        if ($index === 0) continue; // skip header

        // Excel mapping
        // A = College, B = Branch, C = Category, D = Rank, E = Percentile, F = Reservation
        $college     = isset($row[0]) ? trim($row[0]) : '';
        $branch      = isset($row[1]) ? trim($row[1]) : '';
        $category    = isset($row[2]) ? trim($row[2]) : '';
        $rank        = isset($row[3]) ? (int)$row[3] : 0;
        $percentile  = isset($row[4]) ? (float)$row[4] : 0;
        $reservation = isset($row[5]) ? trim($row[5]) : '';

        if ($college === '' || $branch === '') continue;

        /* -------- MATCH DROPDOWNS -------- */
        if (!empty($selectedColleges) && !in_array($college, $selectedColleges, true)) continue;
        if (!empty($selectedBranches) && !in_array($branch, $selectedBranches, true)) continue;
        if (!empty($selectedCategories) && !in_array($category, $selectedCategories, true)) continue;
        if (!empty($selectedReserve) && !in_array($reservation, $selectedReserve, true)) continue;

        /* -------- RANK & PERCENTILE RULES -------- */
        // Rank must be >= entered rank
        if ($minRank !== null && $rank < $minRank) continue;

        // Percentile must be <= entered percentile
        if ($maxPercentile !== null && $percentile > $maxPercentile) continue;

        $results[] = [
            "college"     => $college,
            "branch"      => $branch,
            "category"    => $category,
            "reservation" => $reservation,
            "rank"        => $rank,
            "percentile"  => $percentile
        ];
    }

    // Sort by rank ASC
    usort($results, fn($a, $b) => $a['rank'] <=> $b['rank']);

    echo json_encode($results);

} catch (Exception $e) {
    echo json_encode(["error" => "Error: " . $e->getMessage()]);
}
