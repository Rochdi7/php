<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\TransportController;
use App\Http\Controllers\ExcursionController;
use App\Http\Controllers\CircuitController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SitemapController;

Route::get('/', function () {
    $excursions = [
        [
            'name' => 'Ourika',
            'duration' => '1 jour',
            'image' => 'ourika/ourika.jpg',
            'transport' => 'PK Tours',
            'description' => 'Découvrez l\'une des meilleures vallées du Maroc, au milieu de la nature qui entoure Marrakech.',
            'gallery' => ['ourika/ourika1.jpg', 'ourika/ourika2.jpg', 'ourika/ourika3.jpg', 'ourika/ourika4.jpg'],
            'programme' => [
                'Matin' => [
                    'title' => 'Départ de Marrakech',
                    'details' => 'Départ de votre hôtel à 10h00 en direction de la vallée de l’Ourika.'
                ],
                'Découverte' => [
                    'title' => 'Exploration de la nature',
                    'details' => 'Découverte des villages berbères, visite d’une coopérative d’huile d’argan et promenade dans la vallée.'
                ],
                'Retour' => [
                    'title' => 'Retour à Marrakech',
                    'details' => 'Fin de l’excursion et retour vers 16h00.'
                ]
            ],
            'inclus' => [
                'Transport privé climatisé',
                'Guide professionnel',
                'Bon service'
            ]
        ],
        [
            'name' => 'Essaouira',
            'duration' => '1 jour',
            'image' => 'essaouira/essaouira.jpg',
            'transport' => 'PK Tours',
            'description' => 'Découvrez la ville côtière d’Essaouira et ses magnifiques plages.',
            'gallery' => ['essaouira/essaouira1.jpg', 'essaouira/essaouira2.jpg', 'essaouira/essaouira3.jpg'],
            'programme' => [
                'Matin' => [
                    'title' => 'Départ de Marrakech',
                    'details' => 'Départ à 8h00, visite d’une coopérative d’huile d’argan en route.'
                ],
                'Exploration' => [
                    'title' => 'Découverte d’Essaouira',
                    'details' => 'Visite du port, des ruelles, shopping et temps libre pour déjeuner.'
                ],
                'Retour' => [
                    'title' => 'Retour à Marrakech',
                    'details' => 'Départ d’Essaouira à 16h00 pour un retour prévu à 18h00.'
                ]
            ],
            'inclus' => [
                'Transport privé',
                'Chauffeur professionnel',
                'Bon service'
            ]
        ],
        [
            'name' => 'agafay',
            'duration' => '6 heures',
            'image' => 'agafay/agafay.jpg',
            'transport' => 'PK Tours',
            'description' => 'Savourez un dîner marocain traditionnel sous les étoiles dans le désert d’Agafay.',
            'gallery' => ['agafay/agafay1.jpg', 'agafay/agafay2.jpg', 'agafay/agafay3.jpg'],
            'programme' => [
                'Départ' => [
                    'title' => 'Départ de Marrakech',
                    'details' => 'Transfert depuis l’hôtel à 16h00 en véhicule climatisé.'
                ],
                'Dîner' => [
                    'title' => 'Dîner sous les étoiles',
                    'details' => 'Expérience gastronomique avec vue sur les montagnes de l’Atlas.'
                ],
                'Retour' => [
                    'title' => 'Retour à Marrakech',
                    'details' => 'Retour à l’hôtel vers 22h00.'
                ]
            ],
            'inclus' => [
                'Transport privé aller-retour',
                'Dîner marocain sous tente',
                'Bon service'
            ]
        ],
        [
            'name' => 'Ouarzazate',
            'duration' => '1 jour',
            'image' => 'ouarzazate/ouarzazate7.jpg',
            'transport' => 'PK Tours',
            'description' => 'Découvrez Ouarzazate, la porte du désert et la Kasbah Aït Ben Haddou.',
            'gallery' => ['ouarzazate/ouarzazate5.jpg', 'ouarzazate/ouarzazate2.jpg', 'ouarzazate/ouarzazate3.jpg'],
            'programme' => [
                'Matin' => [
                    'title' => 'Route vers Ouarzazate',
                    'details' => 'Passage par le col du Tizi’n Tichka et visite de la Kasbah Aït Ben Haddou.'
                ],
                'Exploration' => [
                    'title' => 'Découverte de la ville',
                    'details' => 'Visite des studios de cinéma et du centre historique.'
                ],
                'Retour' => [
                    'title' => 'Retour à Marrakech',
                    'details' => 'Départ de Ouarzazate vers 17h00.'
                ]
            ],
            'inclus' => [
                'Transport privé',
                'Chauffeur professionnel',
                'Bon service'
            ]
        ],
        [
            'name' => 'Imlil',
            'duration' => '1 jour',
            'image' => 'imlil/imlil.jpg',
            'transport' => 'PK Tours',
            'description' => 'Explorez les montagnes du Haut Atlas et découvrez la culture berbère à Imlil.',
            'gallery' => ['imlil/imlil1.jpg', 'imlil/imlil2.jpg', 'imlil/imlil3.jpg'],
            'programme' => [
                'Matin' => [
                    'title' => 'Départ de Marrakech',
                    'details' => 'Départ à 9h00 pour un trajet vers Imlil, arrêt dans des villages berbères.'
                ],
                'Randonnée' => [
                    'title' => 'Balade à pied',
                    'details' => 'Randonnée de 2 heures avec guide à travers la vallée.'
                ],
                'Retour' => [
                    'title' => 'Retour à Marrakech',
                    'details' => 'Départ d’Imlil vers 16h00.'
                ]
            ],
            'inclus' => [
                'Transport privé climatisé',
                'Guide local',
                'Bon service'
            ]
        ],
        [
            'name' => 'Ouzoud',
            'duration' => '1 jour',
            'image' => 'ouzoud/ouzoud.jpg',
            'transport' => 'PK Tours',
            'description' => 'Admirez les impressionnantes cascades d’Ouzoud et profitez d’une promenade en nature.',
            'gallery' => ['ouzoud/ouzoud1.jpg', 'ouzoud/ouzoud2.jpg', 'ouzoud/ouzoud3.jpg'],
            'programme' => [
                'Matin' => [
                    'title' => 'Départ de Marrakech',
                    'details' => 'Départ à 8h00, trajet de 2h30 vers les cascades.'
                ],
                'Exploration' => [
                    'title' => 'Visite des cascades',
                    'details' => 'Balade autour des cascades et rencontre avec les singes magots.'
                ],
                'Retour' => [
                    'title' => 'Retour à Marrakech',
                    'details' => 'Départ vers 17h00 et retour à Marrakech.'
                ]
            ],
            'inclus' => [
                'Transport privé aller-retour',
                'Chauffeur professionnel',
                'Bon service'
            ]
        ]
    ];
    $circuits = [
        [
            'name' => 'Marrakech - Zagora',
            'image' => 'zagora/zagora.jpg',
            'transport' => 'PK Tours',
            'description' => 'Découvrez le désert de Zagora lors d’un circuit inoubliable avec bivouac et balade en chameau.',
            'gallery' => ['zagora/zagora1.jpg', 'zagora/zagora2.jpg', 'zagora/zagora3.jpg', 'zagora/zagora4.jpg', 'zagora/zagora5.jpg', 'zagora/zagora6.jpg']
        ],
        [
            'name' => 'Marrakech - Merzouga',
            'image' => 'merzouga/merzouga.jpg',
            'transport' => 'PK Tours',
            'description' => 'Traversez les dunes de Merzouga et vivez une expérience saharienne authentique avec nuit sous tente.',
            'gallery' => ['merzouga/merzouga1.jpg', 'merzouga/merzouga2.jpg', 'merzouga/merzouga3.jpg', 'merzouga/merzouga4.jpg', 'merzouga/merzouga5.jpg', 'merzouga/merzouga6.jpg']
        ],
    ];
    return view('index', compact('excursions', 'circuits'));
})->name('home');


// Transport Routes
Route::get('/transport', [TransportController::class, 'index'])->name('transport.list');

// Excursion Routes
Route::prefix('excursions')->group(function () {
    Route::get('/', [ExcursionController::class, 'index'])->name('excursions.index');
    Route::get('/{slug}', [ExcursionController::class, 'show'])->name('excursions.show');
});

// Circuit Routes
Route::prefix('circuits')->group(function () {
    Route::get('/', [CircuitController::class, 'index'])->name('circuits.index');
    Route::get('/{slug}', [CircuitController::class, 'show'])->name('circuits.show');
});

// Contact Routes
Route::get('/contact', [ContactController::class, 'showForm'])->name('contact.form');
Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');

// Search Route
Route::get('/search', [SearchController::class, 'search'])->name('search');

// Language Selection Route
Route::get('/lang/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'fr'])) {
        session(['locale' => $locale]);
        App::setLocale($locale);
    }
    return back();
})->name('setLocale');

// AJAX Language Setter
Route::post('/set-language', function (Request $request) {
    $language = $request->input('language');
    Session::put('locale', $language);
    return response()->json(['message' => 'Language set successfully']);
})->name('set.language');

Route::get('/robots.txt', function () {
    return response()->view('robots')->header('Content-Type', 'text/plain');
});


Route::get('/sitemap.xml', [SitemapController::class, 'sitemap']);


Route::view('/termes-et-conditions', 'terms')->name('terms');
Route::view('/politique-de-confidentialite', 'privacy')->name('privacy');