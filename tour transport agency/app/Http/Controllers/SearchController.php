<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SearchController extends Controller
{
    private $excursions = [
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
            'name' => 'Agafay',
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
            'gallery' => ['ouarzazate/ouarzazate4.jpg', 'ouarzazate/ouarzazate2.jpg', 'ouarzazate/ouarzazate3.jpg'],
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

    private $circuits = [
        [
            'name' => 'Marrakech - Zagora',
            'duration' => '2 jours', // Added duration
            'image' => 'zagora/zagora.jpg',
            'transport' => 'PK Tours',
            'description' => 'Vivez la vie d\'un berbère pendant une nuit lors d\'un safari dans le désert de 2 jours à Zagora et dans la vallée du Draa de Marrakech.',
            'gallery' => ['zagora/zagora1.jpg', 'zagora/zagora2.jpg', 'zagora/zagora3.jpg', 'zagora/zagora4.jpg', 'zagora/zagora5.jpg', 'zagora/zagora6.jpg'],
            'programme' => [
                'Jour 1' => [
                    'title' => 'MARRAKECH - AIT BENHADDOU - OUARZAZATE - DRAA VALLEY - ZAGORA - DUNES',
                    'details' => 'Départ de Marrakech via le col de Tichka, visite de la Kasbah Ait Ben Haddou et Ouarzazate. Arrivée à Zagora, balade en chameau et nuit sous tente.'
                ],
                'Jour 2' => [
                    'title' => 'ZAGORA DUNES - AGDEZ - OUARZAZATE - TICHKA - MARRAKECH',
                    'details' => 'Lever du soleil optionnel, petit-déjeuner et retour en minibus vers Marrakech via Agdez et la vallée du Draa.'
                ]
            ],
            'inclus' => [
                'Transport privé climatisé et confortable aller-retour',
                'Chauffeur professionnel',
                'Bon service'
            ]
        ],
        [
            'name' => 'Marrakech - Merzouga',
            'duration' => '3 jours', // Added duration
            'image' => 'merzouga/merzouga.jpg',
            'transport' => 'PK Tours',
            'description' => 'Traversez les dunes de l\'Erg Chebbi et vivez une expérience saharienne authentique avec nuit sous tente.',
            'gallery' => ['merzouga/merzouga1.jpg', 'merzouga/merzouga2.jpg', 'merzouga/merzouga3.jpg', 'merzouga/merzouga4.jpg', 'merzouga/merzouga5.jpg', 'merzouga/merzouga6.jpg'],
            'programme' => [
                'Jour 1' => [
                    'title' => 'Marrakech – Ait Ben Haddou – Dadès',
                    'details' => 'Départ de Marrakech, visite de la Kasbah Ait Ben Haddou et route vers Boumalne Dadès pour la nuit.'
                ],
                'Jour 2' => [
                    'title' => 'Dadès – Gorges du Todgha – Merzouga',
                    'details' => 'Exploration des Gorges du Todgha, balade en chameau et nuit en camp dans le désert de Merzouga.'
                ],
                'Jour 3' => [
                    'title' => 'Merzouga – Ouarzazate – Marrakech',
                    'details' => 'Retour vers Marrakech via Ouarzazate avec plusieurs arrêts en chemin.'
                ]
            ],
            'inclus' => [
                'Transport climatisé et confortable aller-retour',
                'Chauffeur professionnel',
                'Bon service'
            ]
        ]
    ];

    private $transports = [
        [
            'departure' => 'Marrakech',
            'destination' => 'Casablanca Aéroport',
            'price' => '1500 DH',
            'image' => 'casa-airo.jpg',
            'description' => 'Voyagez confortablement de Marrakech à l’aéroport de Casablanca avec notre service de transport premium.'
        ],
        [
            'departure' => 'Marrakech',
            'destination' => 'Casablanca Centre',
            'price' => '1700 DH',
            'image' => 'casa.webp',
            'description' => 'Transfert fiable et pratique de Marrakech au centre-ville de Casablanca.'
        ],
        [
            'departure' => 'Marrakech',
            'destination' => 'Agadir',
            'price' => '1700 DH',
            'image' => 'agadir-centre.webp',
            'description' => 'Profitez d’un voyage agréable de Marrakech à Agadir dans nos véhicules confortables.'
        ],
        [
            'departure' => 'Marrakech',
            'destination' => 'Essaouira',
            'price' => '1300 DH',
            'image' => 'Essaouira.jpg',
            'description' => 'Détendez-vous et admirez le paysage en route de Marrakech à Essaouira.'
        ],
        [
            'departure' => 'Marrakech',
            'destination' => 'Rabat',
            'price' => '2000 DH',
            'image' => 'rabat.JPG',
            'description' => 'Un service de transport rapide et sécurisé entre Marrakech et Rabat.'
        ],
        [
            'departure' => 'Hôtel en ville',
            'destination' => 'Hôtel en ville',
            'price' => '150 DH',
            'image' => 'hotel-enville.jpg',
            'description' => 'Déplacements rapides et efficaces entre hôtels dans la ville de Marrakech.'
        ],
        [
            'departure' => 'Aéroport',
            'destination' => 'Hôtel en ville',
            'price' => '150 DH',
            'image' => 'marrakech-airport.webp',
            'description' => 'Transfert fluide entre l’aéroport et votre hôtel en ville à Marrakech.'
        ],
        [
            'departure' => 'Aéroport',
            'destination' => 'Hôtel Palmeraie',
            'price' => '200 DH',
            'image' => 'palmerie.jpg',
            'description' => 'Voyagez en toute sérénité de l’aéroport à votre hôtel dans la Palmeraie.'
        ],
        [
            'departure' => 'Visite de ville',
            'destination' => 'La journée',
            'price' => '800 DH',
            'image' => 'visite.jpg',
            'description' => 'Explorez Marrakech toute la journée avec notre service de transport privé.'
        ],
        [
            'departure' => 'Mise à disposition',
            'destination' => '',
            'price' => '1200 DH',
            'image' => 'logo.png',
            'description' => 'Service de transport sur mesure avec chauffeur privé à disposition.'
        ],
        [
            'departure' => 'Soirée restaurant',
            'destination' => '',
            'price' => '400 DH',
            'image' => 'soiree-evenings.jpg',
            'description' => 'Profitez d’une soirée sans stress avec notre transport vers votre restaurant préféré.'
        ],
    ];

    public function search(Request $request)
    {
        $query = Str::lower(trim($request->input('query')));

        // ✅ Search Excursions
        $excursions = collect($this->excursions)->filter(function ($excursion) use ($query) {
            return Str::contains(Str::lower($excursion['name']), $query);
        })->values()->all(); // Ensure array keys reset

        // ✅ Search Circuits
        $circuits = collect($this->circuits)->filter(function ($circuit) use ($query) {
            return Str::contains(Str::lower($circuit['name']), $query);
        })->values()->all();

        // ✅ Search Transport (Check departure & destination instead of 'name')
        $transport = collect($this->transports)->filter(function ($item) use ($query) {
            return Str::contains(Str::lower($item['departure']), $query) || Str::contains(Str::lower($item['destination']), $query);
        })->values()->all();

        // ✅ If no results found
        if (empty($excursions) && empty($circuits) && empty($transport)) {
            return view('search_results', ['query' => $query, 'noResults' => true]);
        }

        return view('search_results', compact('query', 'excursions', 'circuits', 'transport'));
    }
}