<?php

if (!defined('AOWOW_REVISION'))
    die('illegal access');


$lang = array(
    // page variables
    'main' => array(
        'link'          => "Lien",
        'signIn'        => "S'enregistrer",
        'jsError'       => "S'il vous plait, assurez vous d'avoir le javascript autorisé.",
        'searchButton'  => "Rechercher",
        'language'      => "Langue",
        'numSQL'        => "Nombre de requêtes SQL",
        'timeSQL'       => "Temps d'exécution des requêtes SQL",
        'noJScript'     => "<b>Ce site requiert JavaScript pour fonctionner.</b><br />Veuillez <a href=\"https://www.google.com/support/adsense/bin/answer.py?answer=12654\" target=\"_blank\">activer JavaScript</a> dans votre navigateur.",
        'profiles'      => "Vos personnages",      // translate.google :x
        'links'         => "Liens",
        'pageNotFound'  => "Ce %s n'existe pas.",
        'both'          => "Les deux",
        'gender'        => "Genre",
        'sex'           => [null, 'Homme', 'Femme'],
        'quickFacts'    => "En bref",
        'screenshots'   => "Captures d'écran",
        'videos'        => "Vidéos",
        'side'          => "Coté",
        'related'       => "Informations connexes",
        'contribute'    => "Contribuer",
        // 'replyingTo'    => "En réponse au commentaire de",
        'submit'        => "Soumettre",
        'cancel'        => "Annuler",
        'rewards'       => "Récompenses",
        'gains'         => "Gains",
        'login'         => "[Login]",
        'forum'         => "[Forum]",
        'days'          => "jours",
        'hours'         => "heures",
        'minutes'       => "minutes",
        'seconds'       => "secondes",
        'millisecs'     => "[milliseconds]",
        'daysAbbr'      => "jour",
        'hoursAbbr'     => "h",
        'minutesAbbr'   => "min",
        'secondsAbbr'   => "s",
        'millisecsAbbr' => "[ms]",
        'name'          => "Nom",

        'disabled'      => "[Disabled]",
        'disabledHint'  => "[Cannot be attained or completed]",
        'serverside'    => "[Serverside]",
        'serversideHint' => "[These informations are not in the Client and have been provided by sniffing and/or guessing.]",
    ),
    'search' => array(
        'search'        => "Recherche",
        'foundResult'   => "Résultats de recherche pour",
        'noResult'      => "Aucun résultat pour malordawsne",
        'tryAgain'      => "Veuillez essayer d'autres mots ou vérifiez l'orthographe des termes de recherche.",
    ),
    'game' => array (
        'alliance'      => "Alliance",
        'horde'         => "Horde",
        'class'         => "classe",
        'classes'       => "Classes",
        'races'         => "Races",
        'title'         => "Titre",
        'titles'        => "Titres",
        'eventShort'    => "Évènement",
        'event'         => "Évènement mondial",
        'events'        => "Évènements mondiaux",
        'cooldown'      => "%s de recharge",
        'requires'      => "Requiert",
        'reqLevel'      => "Niveau %s requis",
        'reqLevelHlm'   => "Requiert Niveau %s",
        'valueDelim'    => " - ",
        'resistances'   => array(null, 'Résistance au Sacré', 'Résistance au Feu', 'Résistance à la Nature', 'Résistance au Givre', 'Résistance à l\'Ombre', 'Résistance aux Arcanes'),
        'di'            => array(null, "Magie", "Malédiction", "Maladie", "Poison", "Camouflage", "Invisibilité", null, null, "Enrager"),
        'sc'            => array("Physique", "Sacré", "Feu", "Nature", "Givre", "Ombre", "Arcane"),
        'cl'            => array("UNK_CL0", "Guerrier", "Paladin", "Chasseur", "Voleur", "Prêtre", "DeathChevalier de la mort", "Chaman", "Mage", "Démoniste", 'UNK_CL10', "Druide"),
        'ra'            => array(-2 => "Horde", -1 => "Alliance", "Les deux", "Humain", "Orc", "Nain", "Elfe de la nuit", "Mort-vivant", "Tauren", "Gnome", "Troll", 'UNK_RA9', "Elfe de sang", "Draeneï"),
        'rep'           => array("Détesté", "Hostile", "Inamical", "Neutre", "Amical", "Honoré", "Révéré", "Exalté"),
        'st'            => array(
            null,               "Forme de félin",               "Arbre de vie",                 "Forme de voyage",              "Aquatic Form",
            "Forme d'ours",     null,                           null,                           "Forme d'ours redoutable",      null,
            null,               null,                           null,                           "Danse de l'ombre",             null,
            null,               "Ghostwolf",                    "Posture de combat",            "Posture défensive",            "Posture berserker",
            null,               null,                           "Métamorphe",                   null,                           null,
            null,               null,                           "Forme de vol rapide",          "Forme d'Ombre",                "Forme de vol",
            "Camouflage",       "Forme de sélénien",            "Esprit de rédemption"
        ),
        'pvpRank'       => array(
            null,                                       "Private / Scout",                      "Corporal / Grunt",
            "Sergeant / Sergeant",                      "Master Sergeant / Senior Sergeant",    "Sergeant Major / First Sergeant",
            "Knight / Stone Guard",                     "Knight-Lieutenant / Blood Guard",      "Knight-Captain / Legionnare",
            "Knight-Champion / Centurion",              "Lieutenant Commander / Champion",      "Commander / Lieutenant General",
            "Marshal / General",                        "Field Marshal / Warlord",              "Grand Marshal / High Warlord"
        ),
    ),
    'filter' => array(
        'extSearch'     => "Recherche avancée",
        'onlyAlliance'  => "Alliance seulement",
        'onlyHorde'     => "Horde seulement",
        'addFilter'     => "Ajouter un autre filtre",
        'match'         => "Critère",
        'allFilter'     => "Tous les filtres",
        'oneFilter'     => "Au moins un",
        'applyFilter'   => "Appliquer le filtre",
        'resetForm'     => "Rétablir",
        'refineSearch'  => "Astuce : Affinez votre recherche en utilisant une <a href=\"javascript:;\" id=\"fi_subcat\">sous-catégorie</a>.",
    ),
    'error' => array(
        'errNotFound'   => "Page not found",
        'errPage'       => "What? How did you... nevermind that!\n<br>\n<br>\nIt appears that the page you have requested cannot be found. At least, not in this dimension.\n<br>\n<br>\nPerhaps a few tweaks to the <span class=\"q4\">[WH-799 Major Confabulation Engine]</span> may result in the page suddenly making an appearance!\n<div class=\"pad\"></div>\n<div class=\"pad\"></div>\nOr, you can try \n<a href=\"http://www.wowhead.com/?aboutus#contact\">contacting us</a>\n- the stability of the WH-799 is debatable, and we wouldn't want another accident...",
        'goStart'       => "Return to the <a href=\"index.php\">homepage</a>",
        'goForum'       => "Feedback <a href=\"?forums&board=1\">forum</a>",
    ),
    'account'  => array(),
    'achievement' => array(
        'achievements'  => "hauts faits",
        'criteria'      => "Critères",
        'achievement'   => "haut fait",
        'points'        => "Points",
        'series'        => "Série",
        'outOf'         => "sur",
        'criteriaType'  => "Criterium Type-Id:",
        'itemReward'    => "Vous recevrez:",
        'titleReward'   => "Vous devriez recevoir le titre \"<a href=\"?title=%d\">%s</a>\"",
        'slain'         => "tué",
    ),
    'compare' => array(
        'compare'       => "Outil de comparaison d'objets",
    ),
    'talent' => array(
        'talentCalc'    => "Calculateur de Talents",
        'petCalc'       => "Calculateur de familiers",
        'chooseClass'   => "Choisissez une classe",
        'chooseFamily'  => "Choisissez un familier",
    ),
    'maps' => array(
        'maps'          => "Cartes",
        'linkToThisMap' => "Lien vers cette carte",
        'clear'         => "Effacer",
        'EasternKingdoms' => "Royaumes de l'Est",
        'Kalimdor'      => "Kalimdor",
        'Outland'       => "Outreterre",
        'Northrend'     => "Norfendre",
        'Instances'     => "Instances",
        'Dungeons'      => "Donjons",
        'Raids'         => "Raids",
        'More'          => "Plus",
        'Battlegrounds' => "Champs de bataille",
        'Miscellaneous' => "Divers",
        'Azeroth'       => "Azeroth",
        'CosmicMap'     => "Carte cosmique",
    ),
    'zone' => array(
        'zone'          => "Zone",
        'zonePartOf'    => "Cette zone fait partie de la zone",
    ),
    'title' => array(
        'cat'           => array(
            'Général',      'Joueur ctr. Joueur',    'Réputation',       'Donjons & raids',     'Quêtes',       'Métiers',      'Évènements mondiaux'
        )
    ),
    'spell' => array(
        'remaining'     => "%s restantes",
        'castIn'        => "%s s d'incantation",
        'instantPhys'   => "Incantation immédiate",
        'instantMagic'  => "Instantanée",
        'channeled'     => "Canalisée",
        'range'         => "m de portée",
        'meleeRange'    => "Allonge",
        'reagents'      => "Composants",
        'tools'         => "Outils",
        'pctCostOf'     => "de la %s de base",
        'costPerSec'    => ", plus %s par seconde",
        'costPerLevel'  => ", plus %s par niveau",
        'powerTypes'    => array(
            -2 => "vie",     -1 => null,    "mana",     "rage",     "focus",    "énergie",      "[Happiness]",      "[Rune]",   "puissance runique",
            'AMMOSLOT' => "[Ammo]",         'STEAM' => "[Steam Pressure]",      'WRATH' => "courroux",              'PYRITE' => "Pyrite",
            'HEAT' => "chaleur",            'OOZE' => "limon",                  'BLOOD_POWER' => "puissance de sang"
        )
    ),
    'item' => array(
        'armor'         => "Armure :",
        'block'         => "Bloquer :",
        'charges'       => "Charges",
        'expend'        => "expendable",
        'locked'        => "Verrouillé",
        'ratingString'  => "%s&nbsp;@&nbsp;L%s",
        'heroic'        => "Héroïque",
        'unique'        => "Unique",
        'uniqueEquipped'=> "Unique - Equipé",
        'startQuest'    => "Cet objet permet de lancer une quête",
        'bagSlotString' => "%s %d emplacements",
        'dps'           => "dégâts par seconde",
        'dps2'          => "dégâts par seconde",
        'addsDps'       => "Ajoute",
        'fap'           => "puissance d'attaque en combat farouche",
        'durability'    => "Durabilité",
        'duration'      => "Durée",
        'realTime'      => "temps réel",
        'conjured'      => "Objet invoqué",
        'damagePhys'    => "Dégâts : %s",
        'damageMagic'   => "%s points de dégâts (%s)",
        'speed'         => "Vitesse",
        'sellPrice'     => "Prix de Vente",
        'itemLevel'     => "Niveau d'objet",
        'randEnchant'   => "&lt;Enchantement aléatoire&gt",
        'readClick'     => "&lt;Clique Droit pour Lire&gt",
        'set'           => "Set",
        'socketBonus'   => "Bonus de châsse",
        'socket'        => array(
            "Méta-châsse",          "Châsse rouge",     "Châsse jaune",         "Châsse bleue",           -1 => "Châsse prismatique"
        ),
        'trigger'       => array (
            "Utilise: ",            "Équipé : ",        "Chances quand vous touchez : ", null,                  null,
            null,                   null
        ),
        'bonding'       => array (
            "Lié au compte",                            "Lié quand ramassé",                                    "Lié quand équipé",
            "Lié quand utilisé",                        "[Soulbound]",                                          "Objet de quête"
        ),
        "bagFamily"     => array(
            "Sac",                  "Carquois",         "Giberne",              "Sac d'âmes",                   "Sac de travailleur du cuir",
            "Sac de calligraphie",  "Sac d'herbes",     "Sac d'enchanteur",     "Sac d'ingénieur",              "Clé",
            "Sac de gemmes",        "Sac de mineur"
        ),
        'inventoryType' => array(
            null,                   "Tête",             "Cou",                  "Épaules",                      "Chemise",
            "Torse",                "Taille",           "Jambes",               "Pieds",                        "Poignets",
            "Mains",                "Doigt",            "Bijou",                "À une main",                   "Main gauche",
            "À distance",           "Dos",              "Deux mains",           "Sac",                          "Tabard",
            "Torse",                "Main droite",      "Main gauche",          "Tenu en main gauche",          "Projectile",
            "Armes de jet",         "À distance",       "Carquois",             "Relique"
        ),
        'armorSubclass' => array(
            "Divers",               "Armures en tissu", "Armures en cuir",      "Armures en mailles",           "Armures en plaques",
            null,                   "Bouclier",         "Libram",               "Idole",                        "Totem",
            "Cachet"
        ),
        'weaponSubClass' => array(
            "Hache",                "Hache",            "Arc",                  "Arme à feu",                   "Masse",
            "Masse",                "Armes d'hast",     "Épée",                 "Épée",                         null,
            "Bâton",                null,               null,                   "Arme de pugilat",              "Divers",
            "Dague",                "Armes de jet",     null,                   "Arbalète",                     "Baguette",
            "Canne à pêche"
        ),
        'projectileSubClass' => array(
            null,                   null,               "Flèche",               "Balle",                         null
        ),
        'statType'  => array(
            "Augmente vos points de mana de %d.",
            "Augmente vos points de vie de %d.",
            null,
            "Agilité",
            "Force",
            "Intelligence",
            "Esprit",
            "Endurance",
            null, null, null, null,
            "Augmente le score de défense de %d.",
            "Augmente de %d le score d'esquive.",
            "Augmente de %d le score de parade.",
            "Augmente de %d le score de blocage.",
            "Augmente de %d le score de toucher en mêlée. ",
            "Augmente de %d le score de toucher à distance.",
            "Augmente de %d le score de toucher des sorts.",
            "Augmente de %d le score de coup critique en mêlée.",
            "Augmente de %d le score de coup critique à distance.",
            "Augmente de %d le score de coup critique des sorts.",
            "Augmente de %d le score d'évitement des coups en mêlée.",
            "Augmente de %d le score d'évitement des coups à distance.",
            "Augmente de %d le score d'évitement des coups des sorts.",
            "Augmente de %d le score d'évitement des critiques en mêlée.",
            "Augmente de %d le score d'évitement des critiques à distance.",
            "Augmente de %d le score d'évitement des critiques des sorts.",
            "Augmente de %d le score de hâte en mêlée.",
            "Augmente de %d le score de hâte à distance.",
            "Augmente de %d le score de hâte des sorts.",
            "Augmente votre score de toucher de %d.",
            "Augmente votre score de coup critique de %d.",
            "Augmente de %d le score d'évitement des coups.",
            "Augmente de %d le score d'évitement des critiques.",
            "Augmente votre score de résilience de %d.",
            "Augmente votre score de hâte de %d.",
            "Augmente votre score d'expertise de +%d.",
            "Augmente la puissance d'attaque de %d.",
            "Augmente la puissance d'attaque à distance de %d.",
            "Augmente de %d la puissance d'attaque pour les formes de félin, d'ours, d'ours redoutable et de sélénien uniquement.",
            "Augmente les dégâts des sorts et des effets magiques d'un maximum de %d.",
            "Augmente les soins des sorts et des effets magiques d'un maximum de %d.",
            "Rend %d points de mana toutes les 5 secondes.",
            "Augmente de %d votre score de pénétration d'armure.",
            "Augmente la puissance des sorts de %d.",
            "Rend %d points de vie toutes les 5 s.",
            "Augmente la pénétration des sorts de %d.",
            "Augmente la valeur de blocage de votre bouclier de %d.",
            "Stat Inutilisée #%d (%d)",
        )
    )
);

?>
