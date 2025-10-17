<?php
    class MovieManager{
        public $movies = [];

        public function __construct(){
            $this -> movies = [
            '12345678' => new Movie('12345678', 'Superman','1948','4'),
            '23456789' => new Movie('23456789', 'Superman','1978', '4'),
            '34567890' => new Movie('34567890', 'Batman vs Superman','2016','3'),
            '45678901' => new Movie('45678901', 'Superman & Lois', '2021','1'), ];

        }

         public function ManageCases(){
            $message = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $isan = trim($_POST['isan'] ?? '');
            $name = trim($_POST['name'] ?? '');
            $year = trim($_POST['year'] ?? '');
            $punctuation = trim($_POST['punctuation'] ?? '');

            if ($isan === '' && $name === '') {
                $message = "⚠️ Please enter ISAN or Name.";
            } elseif ($isan === '') {
                // Search by name
                $found = [];
                foreach ($Movies as $id => $movie) {
                    if (stripos($movie['name'], $name) !== false) {
                        $found[] = "{$movie['name']} from {$movie['year']}.";
                    }
                }
                $message = $found ? implode("<br>", $found) : "No movies found.";
            } elseif (isset($Movies[$isan])) {
                // ISAN found
                if ($name === '') {
                    unset($Movies[$isan]);
                    $message = "🗑️ Movie deleted (temporarily, only for this request).";
                } elseif ($year && $punctuation) {
                    $Movies[$isan] = ['name'=>$name, 'year'=>$year, 'punctuation'=>$punctuation];
                    $message = "✅ Movie updated.";
                } else {
                    $message = "⚠️ Fill all fields to update.";
                }
            } elseif (preg_match('/^\d{8}$/', $isan)) {
                // New ISAN
                if ($name && $year && $punctuation) {
                    $Movies[$isan] = ['name'=>$name, 'year'=>$year, 'punctuation'=>$punctuation];
                    $message = "✅ Movie added.";
                } else {
                    $message = "⚠️ Fill all fields to add.";
                }
            } else {
                $message = "⚠️ Invalid ISAN.";
            }
        }
        }
    }

       
?>