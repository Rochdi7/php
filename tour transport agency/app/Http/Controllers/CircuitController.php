<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CircuitController extends Controller
{
    private $circuits = [
        [
            'name' => 'Marrakech - Zagora',
            'duration' => '2 jours', // Added duration
            'image' => 'zagora/zagora.jpg',
            'transport' => 'PK Tours',
            'description' => 'Vivez la vie d\'un berbère pendant une nuit lors d\'un safari dans le désert de 2 jours à Zagora et dans la vallée du Draa de Marrakech. Explorez les dunes de sable mouvantes à dos de chameau, dormez sous un ciel étoilé et suivez les traces de la royauté hollywoodienne lors d\'une visite au village du patrimoine mondial d\'Ait Ben Haddou.',
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
            'description' => 'Commencez votre voyage de 3 jours de Marrakech à Merzouga en traversant les montagnes du Haut Atlas, en passant par des villages berbères traditionnels. Arrêtez-vous à Ait Ben Haddou, site classé au patrimoine mondial de l\'UNESCO, et explorez sa kasbah emblématique. Après le déjeuner dans un restaurant local, continuez vers Ouarzazate, connue sous le nom de « Porte du Sahara ». Terminez la journée à Boumalne Dadès, où vous dînerez et passerez la nuit dans un charmant hôtel. Le deuxième jour, découvrez les magnifiques gorges du Todgha avant de rejoindre Merzouga pour une balade en chameau au coucher du soleil et une nuit sous les étoiles dans un camp de luxe. Le troisième jour, réveillez-vous tôt pour admirer un lever de soleil spectaculaire, avant de retourner à Marrakech avec des arrêts en chemin.',
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

    public function index()
{
    return view('circuits', [
        'circuits' => $this->circuits,
        'meta_title' => 'Circuits au Maroc - Explorez Nos Voyages Inoubliables',
        'meta_description' => 'Découvrez nos circuits au Maroc et partez à l’aventure à travers le désert, les montagnes et les villes impériales.',
        'meta_image' => asset('assets/images/activities/marrakech.jpg'),
        'meta_url' => url()->current()
    ]);
}


    public function show($slug)
    {
        $circuit = collect($this->circuits)->first(function ($circuit) use ($slug) {
            return Str::slug($circuit['name']) === $slug;
        });

        if (!$circuit) {
            abort(404);
        }

        return view('circuit_details', compact('circuit'));
    }
}
