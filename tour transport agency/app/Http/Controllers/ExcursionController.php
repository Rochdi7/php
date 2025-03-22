<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ExcursionController extends Controller
{
    private $excursions = [
        [
            'name' => 'Ourika',
            'duration' => '1 jour',
            'image' => 'ourika/ourika.jpg',
            'transport' => 'PK Tours',
            'description' => "Vivez des moments incroyables dans l'une des meilleures vallées du Maroc, au milieu de la nature qui entoure la ville de Marrakech. Le voyage commence à partir de votre hébergement le matin, en traversant les paysages étonnants pour découvrir la région des montagnes de l'Atlas. Profitez davantage de la nature époustouflante qui entoure la route de l’Ourika, en passant par Al Haouz et en prenant de superbes photos avec la route naturelle. Apprenez-en plus sur les bienfaits d'un produit naturel local appelé huile d'argan dans un petit village, et le personnel local vous expliquera les bienfaits de ce produit spécial. Ensuite, emmenez-le visiter une maison berbère et apprenez-en plus sur la culture berbère. Ourika est un endroit spécifique pour passer du temps en dehors du centre-ville pour profiter de la nature, et c'est aussi l'occasion de découvrir les sites naturels qui entourent Marrakech. Profitez d'une merveilleuse promenade en groupe et n'oubliez pas d'apporter vos chaussures de marche, car il est temps de découvrir les parties cachées à l'intérieur des montagnes de l’Atlas. Vous pourrez vous reposer pour un déjeuner personnel après la promenade, et après avoir découvert tous les paysages naturels à l'intérieur des montagnes de l’Atlas et avoir pris des photos et des selfies pour ce moment agréable et profiter de l'endroit.",
            'gallery' => ['ourika/ourika1.jpg', 'ourika/ourika2.jpg', 'ourika/ourika3.jpg', 'ourika/ourika4.jpg','ourika/ourika5.jpg','ourika/ourika6.jpg'],
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
            'description' => "Le site où est implanté Essaouira, à 170 km de Marrakech, est habité depuis l’Antiquité. Les phéniciens, les romains et les portugais y ont laissé des vestiges. Depuis sa construction au 18ème siècle, elle a été un port de pêche et de commerce. Trois siècles plus tard, elle a conservé son charme et ses secrets. Observez la fabrication des chalutiers en bois, parcourez les ruelles qui se coupent toutes à angle droit, dégustez des poissons grillés sur le port, faites du shopping dans les innombrables échoppes, admirez les windsurfeurs et kitesurfeurs à l’assaut des vagues sur l’immense plage de sable blond, ou encore faites une promenade à cheval, en dromadaire ou en quad. Les activités qui s’offrent à vous sont innombrables. Ici, le temps passe trop vite !",
            'gallery' => ['essaouira/essaouira1.jpg', 'essaouira/essaouira2.jpg', 'essaouira/essaouira3.jpg','essaouira/essaouira4.jpg','essaouira/essaouira5.jpg','essaouira/essaouira6.jpg'],
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
            'description' => "Savourez un dîner de cuisine marocaine traditionnelle dans le désert d’Agafay, juste à côté de Marrakech. Il s'agit d'une excursion privée, où vous pourrez déguster un dîner local sous le ciel étoilé du désert, ou dans une tente confortable. L'activité durera environ 6 heures, pendant lesquelles vous pourrez profiter des paysages et des environs de ce désert, situé au pied des montagnes de l'Atlas. Pour votre confort, vous serez transféré de l'hôtel au désert et retour. Il s'agit d'une activité parfaite à partager en couple ou en famille, idéale pour les gourmands. Savourez un dîner composé de plats locaux dans le désert d'Agafay, admirez les étoiles dans le ciel clair du désert. Pour votre confort, l'activité comprend la prise en charge et le retour à l'hôtel.",
            'gallery' => ['agafay/agafay1.jpg', 'agafay/agafay2.jpg', 'agafay/agafay3.jpg','agafay/agafay4.jpg','agafay/agafay5.jpg','agafay/agafay6.jpg'],
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
                'Dinner+ Dromadaire +Quad',
                'Bon service'
            ]
        ],
        [
            'name' => 'Ouarzazate',
            'duration' => '1 jour',
            'image' => 'ouarzazate/ouarzazate7.jpg',
            'transport' => 'PK Tours',
            'description' => "Parcourir la route de Marrakech à Ouarzazate est déjà une expérience passionnante car ce parcours est un concentré des paysages du grand sud marocain. Après avoir traversé la plaine du Haouz pendant une heure environ, vous arrivez au piémont de l’Atlas et ses collines verdoyantes. Vous montez progressivement jusqu’au col du Tizi’n Tichka (Col des pâturages en tamazight) à 2260 m d’altitude. Ce col entouré de sommets de 3000 m marque le basculement vers le sud plus aride et désertique. 30 km avant Ouarzazate, la route débouche sur le Ksar d’Aït Ben Haddou classé au patrimoine mondial de l’Unesco. Ouarzazate, surnommée « La porte du désert », est connue pour son cœur historique : la Kasbah de Taourirt ainsi que pour les studios cinématographiques Atlas Corporation et CLA que les amateurs du 7ème art peuvent visiter.",
            'gallery' => ['ouarzazate/ouarzazate7.jpg', 'ouarzazate/ouarzazate2.jpg', 'ouarzazate/ouarzazate3.jpg', 'ouarzazate/ouarzazate4.jpg', 'ouarzazate/ouarzazate5.jpg','ouarzazate/ouarzazate6.jpg'],
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
            'description' => "Imlil est un village de montagne typique situé à 90 km de Marrakech, dans le Haut-Atlas. Il est le point de départ incontournable de toutes les randonnées à destination du Toubkal, le plus haut sommet du Maroc et d’Afrique du nord (4167 m). Pendant plusieurs mois de l’année, les crêtes tout autour d’Imlil sont couronnées de neige. Des torrents aux eaux cristallines se jettent dans la rivière qui traverse les villages berbères tout le long de la vallée. La randonnée guidée de 2 heures que nous vous proposons est accessible à la plupart des marcheurs. Elle ne nécessite pas de préparation physique particulière. Elle offre des perspectives sur les montagnes environnantes, sur les villages de pierres et de pisé et donne un aperçu très enrichissant sur le mode de vie des montagnards locaux.",
            'gallery' => ['imlil/imlil1.jpg', 'imlil/imlil2.jpg', 'imlil/imlil3.jpg','imlil/imlil4.jpg','imlil/imlil5.jpg','imlil/imlil6.jpg'],
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
            'description' => "Hautes de 110 m, les cascades d’Ouzoud font partie des merveilles naturelles qu’il ne faut pas manquer. On y accède après un trajet de 150 km soit 2 h 30 environ. Le chemin qui mène au pied des cascades est bordé de nombreuses échoppes et restaurants. L’ambiance est bon enfant ! Une tribu de macaques (singes magots) a élu domicile dans les falaises et les arbres tout autour de la cascade. Ils sont friands des cacahouètes que vous voudrez bien leur offrir. Au bas de la cascade, vous pourrez monter sur l’un des nombreux radeaux de fortune qui vous amènent en toute sécurité à l’approche des chutes d’eau. Les plus sportifs feront une randonnée pédestre tout autour des cascades en suivant le chemin aménagé qui longe la rivière Ouzoud, au milieu des oliviers.",
            'gallery' => ['ouzoud/ouzoud1.jpg', 'ouzoud/ouzoud2.jpg', 'ouzoud/ouzoud3.jpg','ouzoud/ouzoud4.jpg','ouzoud/ouzoud5.jpg','ouzoud/ouzoud6.jpg'],
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



    /**
     * Display a list of all excursions.
     */
    public function index()
    {
        return view('excursions', [
            'excursions' => $this->excursions,
            'meta_title' => 'Excursions au Maroc - Découvrez Nos Meilleures Offres',
            'meta_description' => 'Explorez nos excursions au Maroc et découvrez des expériences uniques à Marrakech, Essaouira, Ourika et plus.',
            'meta_image' => asset('assets/images/activities/marrakech.jpg'),
            'meta_url' => url()->current()
        ]);
    }



    /**
     * Show details for a single excursion.
     */
    public function show($slug)
    {
        // Find the selected excursion
        $excursion = collect($this->excursions)->firstWhere('name', str_replace('-', ' ', ucfirst($slug)));

        if (!$excursion) {
            abort(404); // Return 404 if not found
        }

        // Get related excursions (excluding the selected one)
        $relatedExcursions = collect($this->excursions)->reject(fn($e) => $e['name'] === $excursion['name'])->all();

        // Set dynamic SEO data
        $meta_title = $excursion['name'] . ' - Tour Transport';
        $meta_description = $excursion['description'];
        $meta_image = asset('images/' . $excursion['image']);
        $meta_url = url()->current();

        return view('excursion_details', compact('excursion', 'relatedExcursions', 'meta_title', 'meta_description', 'meta_image', 'meta_url'));
    }

}
