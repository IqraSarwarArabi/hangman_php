<?php
$themes = [
    'People' => [
        ['word' => 'Mahira', 'hint' => 'Female actress'],
        ['word' => 'Adnan', 'hint' => 'Male actor'],
        ['word' => 'Mehwish', 'hint' => 'Television artist'],
        ['word' => 'Atif', 'hint' => 'Singer'],
        ['word' => 'Imran', 'hint' => 'Prime Minister'],
        ['word' => 'Malala', 'hint' => 'Nobel laureate'],
        ['word' => 'Bilquis', 'hint' => 'Philanthropist'],
        ['word' => 'Fawad', 'hint' => 'Multitalented'],
        ['word' => 'Sania', 'hint' => 'Tennis star'],
        ['word' => 'Nusrat', 'hint' => 'Qawwali legend'],
    ],
    'Books' => [
        ['word' => 'Udas', 'hint' => 'Sadness'],
        ['word' => 'Chiragh', 'hint' => 'Lamp'],
        ['word' => 'Aangan', 'hint' => 'Courtyard'],
        ['word' => 'Awara', 'hint' => 'Vagabond'],
        ['word' => 'Khuda', 'hint' => 'God'],
        ['word' => 'Zarb', 'hint' => 'Strike'],
        ['word' => 'Kainat', 'hint' => 'Universe'],
        ['word' => 'Khushboo', 'hint' => 'Fragrance'],
        ['word' => 'Safar', 'hint' => 'Journey'],
        ['word' => 'Champa', 'hint' => 'Flower'],
    ],
    'Movies' => [
        ['word' => 'Waar', 'hint' => 'Warfare'],
        ['word' => 'Bol', 'hint' => 'Speak'],
        ['word' => 'Jawani', 'hint' => 'Youth'],
        ['word' => 'Punjab', 'hint' => 'Land'],
        ['word' => 'Manto', 'hint' => 'Writer'],
        ['word' => 'Khuda', 'hint' => 'God'],
        ['word' => 'Cake', 'hint' => 'Celebration'],
        ['word' => 'Parwaaz', 'hint' => 'Flight'],
        ['word' => 'Dobara', 'hint' => 'Again'],
        ['word' => 'Teefa', 'hint' => 'Troublemaker'],
    ],
    'Writers' => [
        ['word' => 'Faiz', 'hint' => 'Poet'],
        ['word' => 'Ismat', 'hint' => 'Short stories'],
        ['word' => 'Ashfaq', 'hint' => 'Novelist'],
        ['word' => 'Intezar', 'hint' => 'Waiting'],
        ['word' => 'Bano', 'hint' => 'Playwright'],
        ['word' => 'Munir', 'hint' => 'Humorist'],
        ['word' => 'Faraz', 'hint' => 'Poet'],
        ['word' => 'Saadat', 'hint' => 'Novelist'],
        ['word' => 'Ibn-e-Insha', 'hint' => 'Humor'],
        ['word' => 'Qudrat', 'hint' => 'Nature'],
    ],
    'Countries' => [
        ['word' => 'Bharat', 'hint' => 'Neighbor'],
        ['word' => 'Hindustan', 'hint' => 'Subcontinent'],
        ['word' => 'Saudiya', 'hint' => 'Oil-rich'],
        ['word' => 'Afghanistan', 'hint' => 'Neighbor'],
        ['word' => 'Bangla', 'hint' => 'East'],
        ['word' => 'Srilanka', 'hint' => 'Island'],
        ['word' => 'Misr', 'hint' => 'Pyramids'],
        ['word' => 'Turkey', 'hint' => 'Ottoman'],
        ['word' => 'Malaysia', 'hint' => 'Diversity'],
        ['word' => 'China', 'hint' => 'Great Wall'],
    ],
    'Cities' => [
        ['word' => 'Karachi', 'hint' => 'Largest city'],
        ['word' => 'Lahore', 'hint' => 'Cultural capital'],
        ['word' => 'Islamabad', 'hint' => 'Capital'],
        ['word' => 'Peshawar', 'hint' => 'Gateway'],
        ['word' => 'Multan', 'hint' => 'Saints'],
        ['word' => 'Quetta', 'hint' => 'Balochistan'],
        ['word' => 'Faisalabad', 'hint' => 'Textiles'],
        ['word' => 'Sialkot', 'hint' => 'Sports'],
        ['word' => 'Hyderabad', 'hint' => 'Sindh'],
        ['word' => 'Rawalpindi', 'hint' => 'Twin city'],
    ],
];

session_start(); // Start the session

$response = ['success' => false, 'message' => 'Invalid theme selected'];

if (isset($_GET['theme']) && array_key_exists($_GET['theme'], $themes)) {
    $selectedTheme = $_GET['theme'];
    $selectedThemeWords = $themes[$selectedTheme];
    
    $randomIndex = mt_rand(0, 9); // Generate a random index from 0 to 9
    
    if (isset($selectedThemeWords[$randomIndex])) {
        $randomWordData = $selectedThemeWords[$randomIndex];
        
        $_SESSION['selected_word'] = $randomWordData['word']; // Store word in session
        $_SESSION['selected_hint'] = $randomWordData['hint']; // Store hint in session
        
        $response = [
            'success' => true,
            'word' => $randomWordData['word'],
            'hint' => $randomWordData['hint']
        ];
    } else {
        $response['message'] = 'No word found at the random index';
    }
}

header('Content-Type: application/json');
echo json_encode($response);

?>