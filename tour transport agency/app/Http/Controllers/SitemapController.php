<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class SitemapController extends Controller
{
    public function sitemap()
    {
        // Manually define excursions and circuits (if not using models)
        $excursions = [
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
                'image' => 'ouarzazate/ouarzazate.jpg',
                'transport' => 'PK Tours',
                'description' => "Parcourir la route de Marrakech à Ouarzazate est déjà une expérience passionnante car ce parcours est un concentré des paysages du grand sud marocain. Après avoir traversé la plaine du Haouz pendant une heure environ, vous arrivez au piémont de l’Atlas et ses collines verdoyantes. Vous montez progressivement jusqu’au col du Tizi’n Tichka (Col des pâturages en tamazight) à 2260 m d’altitude. Ce col entouré de sommets de 3000 m marque le basculement vers le sud plus aride et désertique. 30 km avant Ouarzazate, la route débouche sur le Ksar d’Aït Ben Haddou classé au patrimoine mondial de l’Unesco. Ouarzazate, surnommée « La porte du désert », est connue pour son cœur historique : la Kasbah de Taourirt ainsi que pour les studios cinématographiques Atlas Corporation et CLA que les amateurs du 7ème art peuvent visiter.",
                'gallery' => ['ouarzazate/ouarzazate1.jpg', 'ouarzazate/ouarzazate2.jpg', 'ouarzazate/ouarzazate3.jpg', 'ouarzazate/ouarzazate4.jpg', 'ouarzazate/ouarzazate5.jpg','ouarzazate/ouarzazate6.jpg'],
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

        $circuits = [
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

        return Response::make(view('sitemap', compact('excursions', 'circuits')))
            ->header('Content-Type', 'application/xml; charset=UTF-8');
    }
}
