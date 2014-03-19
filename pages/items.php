<?php

if (!defined('AOWOW_REVISION'))
    die('illegal access');


$cats       = Util::extractURLParams($pageParam);
$path       = [0, 0];
$title      = [Lang::$game['items']];
$filter     = ['panel1' => false, 'panel2' => false];
$filterHash = !empty($_GET['filter']) ? '#'.sha1(serialize($_GET['filter'])) : null;
$cacheKey   = implode('_', [CACHETYPE_PAGE, TYPE_ITEM, -1, implode('.', $cats).$filterHash, User::$localeId]);
$validCats  = array(                                        // if > 0 class => subclass
     2 => [15, 13, 0, 4, 7, 6, 10, 1, 5, 8, 2, 18, 3, 16, 19, 20, 14],
     4 => array(
         0 => true,
         1 => [1, 3, 5, 6, 7, 8, 9, 10],
         2 => [1, 3, 5, 6, 7, 8, 9, 10],
         3 => [1, 3, 5, 6, 7, 8, 9, 10],
         4 => [1, 3, 5, 6, 7, 8, 9, 10],
         6 => true,
         7 => true,
         8 => true,
         9 => true,
        10 => true,
        -2 => true,                                         // Rings
        -3 => true,                                         // Amulets
        -4 => true,                                         // Trinkets
        -5 => true,                                         // Off-hand Frills
        -6 => true,                                         // Cloaks
        -7 => true,                                         // Tabards
        -8 => true                                          // Shirts
    ),
     1 => [0, 1, 2, 3, 4, 5, 6, 7, 8],
     0 => array(
         7 => true,
         0 => true,
         2 => [1, 2],                                       // elixirs: [Battle, Guardian]
         3 => true,
         5 => true,
         6 => true,                                         // Item Enhancements (Permanent)
        -3 => true,                                         // Item Enhancements (Temporary)
         1 => true,
         4 => true,
         8 => true
    ),
    16 => array(                                            // Glyphs by class: [major, minor]
        1  => [1, 2],
        2  => [1, 2],
        3  => [1, 2],
        4  => [1, 2],
        5  => [1, 2],
        6  => [1, 2],
        7  => [1, 2],
        8  => [1, 2],
        9  => [1, 2],
        11 => [1, 2]
    ),
     7 => [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15],
     6 => [2, 3],
    11 => [2, 3],
     9 => [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12],       // some of the books to propper professions
     3 => [0, 1, 2, 3, 4, 5, 6, 7, 8],
    15 => [-2, -7, 0, 1, 2, 3, 4, 5],                       // -2: armor tokes, -7: flying mounts               fuck it .. need major overhaul
    10 => true,
    12 => true,                                             // todo: contains enchantments
    13 => true
);

if (!Util::isValidPage($validCats, $cats))
    $smarty->error();

if (!$smarty->loadCache($cacheKey, $pageData, $filter))
{
    $conditions  = [];
    $visibleCols = [];
    $hiddenCols  = [];

    if ($cats)
        $path = array_merge($path, $cats);

    // display available submenu and slot, if applicable
    $type = $slot = [[], null];
    if (!$cats)
    {
        $slot = [Lang::$item['inventoryType'], null];
        asort($slot[0]);
    }
    else
    {
        if (isset($cats[2]))
            $catList = Lang::$item['cat'][$cats[0]][1][$cats[1]][1][$cats[2]];
        else if (isset($cats[1]))
            $catList = Lang::$item['cat'][$cats[0]][1][$cats[1]];
        else
            $catList = Lang::$item['cat'][$cats[0]];

        array_unshift($title, is_array($catList) ? $catList[0] : $catList);

        switch ($cats[0])
        {
            case 0:
                if (!isset($cats[1]))
                    $type = [Lang::$item['cat'][0][1], null];

                if (!isset($cats[1]) || in_array($cats[1], [6, -3]))
                {
                    $slot = [Lang::$item['inventoryType'], 0x63EFEA];
                    asort($slot[0]);
                }
                break;
            case 2:
                if (!isset($cats[1]))
                    $type = [Lang::$spell['weaponSubClass'], null];

                $slot = [Lang::$item['inventoryType'], 0x262A000];
                asort($slot[0]);
                break;
            case 4:
                if (!isset($cats[1]))
                {
                    $slot = [Lang::$item['inventoryType'], 0x10895FFE];
                    $type = [Lang::$item['cat'][4][1], null];
                }
                else if (in_array($cats[1], [1, 2, 3, 4]))
                    $slot = [Lang::$item['inventoryType'], 0x7EA];

                asort($slot[0]);
                break;
            case 16:
                if (!isset($cats[2]))
                    $visibleCols[] = 'glyph';
            case 1:
                if ($cats[0] == 1)
                    $visibleCols[] = 'slots';
            case 3:
                if (!isset($cats[1]))
                    asort($catList[1]);
            case 7:
            case 9:
                $hiddenCols[] = 'slot';
            case 15:
                if (!isset($cats[1]))
                    $type = [$catList[1], null];

                break;
        }
    }

    foreach ($type[0] as $k => $str)
        if ($str && (!$type[1] || ($type[1] & (1 << $k))))
            $filter['type'][$k] = $str;

    foreach ($slot[0] as $k => $str)
        if ($str && (!$slot[1] || ($slot[1] & (1 << $k))))
            $filter['slot'][$k] = $str;

    if (isset($filter['slot'][INVTYPE_SHIELD]))             // "Off Hand" => "Shield"
        $filter['slot'][INVTYPE_SHIELD] = Lang::$item['armorSubClass'][6];


    /*
        set conditions
    */

    /*
     * todo (low): this is a long term issue.
     * Filter is used as a subSystem to each TypeList
     * but here we would need to preemptive check for $filter['gb']
     *  .. bummer ..  this is to be removed when the issue is _really_ solved
     *
     * ALSO upgradeItems .. Profiler can send them as lists, so multiple lv-tabs would occur
     *
    */
    $itemFilter = new ItemListFilter();

    if (preg_match('/gb\=(1|2|3)/i', $_SERVER['QUERY_STRING'], $match))
        $filter['gb'] = $match[1];

    if (isset($cats[0]))
        $conditions[] = ['i.class', $cats[0]];
    if (isset($cats[1]))
        $conditions[] = ['i.subClass', $cats[1]];
    if (isset($cats[2]))
        $conditions[] = ['i.subSubClass', $cats[2]];

    if ($_ = $itemFilter->getConditions())
        $conditions[] = $_;

    $items = new ItemList($conditions, ['extraOpts' => $itemFilter->extraOpts]);

    $items->addGlobalsToJscript($smarty);

    // recreate form selection
    $filter = array_merge($itemFilter->getForm('form'), $filter);
    $filter['query'] = isset($_GET['filter']) ? $_GET['filter'] : NULL;
    $filter['fi']    =  $itemFilter->getForm();

    $xCols = $itemFilter->getForm('extraCols', true);

    // if slot-dropdown is available && Armor && $path points to Armor-Class
    if (count($path) == 4 && $cats[0] == 4 && isset($filter['sl']) && !is_array($filter['sl']))
        $path[] = $filter['sl'];

    $infoMask = ITEMINFO_JSON;
    if (array_intersect([63, 64], $xCols))                  // 63:buyPrice; 64:sellPrice
        $infoMask |= ITEMINFO_VENDOR;

    // menuId 0: Item     g_initPath()
    //  tabId 0: Database g_initHeader()
    $pageData = array(
        'page'   => array(
            'title'  => implode(' - ', $title),
            'path'   => json_encode($path, JSON_NUMERIC_CHECK),
            'tab'    => 0,
            'subCat' => $pageParam !== null ? '='.$pageParam : '',
            'reqJS'  => array(
                'static/js/filters.js',
                'static/js/swfobject.js',
                '?data=weight-presets'
            )
        ),
        'lv' => array(
            'data'   => $items->getListviewData($infoMask),
            'params' => []
        )
    );

    if ($itemFilter->error)
        $pageData['lv']['params']['_errors'] = '$1';

    if (!empty($filter['upg']))
    {
        // upgrade-item got deleted by filter
        if (empty($pageData['lv']['data'][$filter['upg']]))
        {
            if ($w = $itemFilter->getForm('setWeights', true))
            {
                $upgItem = new ItemList(array(['id', $filter['upg']]), false, ['wt' => $w[0], 'wtv' => $w[1]]);

                // still it may not be found if you apply really weired filters (e.g. search for a melee item with caster-weights) .. not my fault :[
                if (!$upgItem->error)
                {
                    $upgItem->addGlobalsToJScript($smarty);
                    $pageData['lv']['data'][$filter['upg']] = $upgItem->getListviewData($infoMask)[$filter['upg']];
                }
            }
        }

        if (!empty($filter['gb']))
            $pageData['lv']['params']['customFilter'] = '$fi_filterUpgradeListview';

        $pageData['lv']['params']['_upgradeIds']  = "$[".$filter['upg']."]";
    }
/*
    by level: max 10 itemlevel steps (Level X) +1x Other|Autre|Anderes|Otros|Другое levels
    by slot: all slots available
    by source: .. well .. no

	template: 'item',
	id: 'one-hand',
	name: 'One-Hand',
	tabs: tabsGroups,
	parent: 'lkljbjkb574',
	hideCount: 1,
	note: $WH.sprintf(LANG.lvnote_viewmoreslot, '=2', 'sl=13;ub=10;cr=161;crs=1;crv=0;gm=3;rf=1;wt=23:123:24:103:96:170;wtv=100:85:75:60:50:40;upg=104585'),
	customFilter: fi_filterUpgradeListview,
	_upgradeIds: [104585],
	extraCols: fi_getExtraCols(fi_extraCols, 3, 1, 0),
	sort: ['-score', 'name'],
	computeDataFunc: fi_scoreSockets,
	onBeforeCreate: fi_initWeightedListview,
	onAfterCreate: fi_addUpgradeIndicator,
	hiddenCols: ['type', 'source'],
	data: []

    template: 'item',
	id: 'two-hand',
	name: 'Two-Hand',
	tabs: tabsGroups,
	parent: 'lkljbjkb574',
	hideCount: 1,
	note: $WH.sprintf(LANG.lvnote_viewmoreslot, '=2', 'sl=17;ub=10;cr=161;crs=1;crv=0;gm=3;rf=1;wt=23:123:24:103:96:170;wtv=100:85:75:60:50:40;upg=104585'),
	customFilter: fi_filterUpgradeListview,
	_upgradeIds: [104585],
	extraCols: fi_getExtraCols(fi_extraCols, 3, 1, 0),
	sort: ['-score', 'name'],
	computeDataFunc: fi_scoreSockets,
	onBeforeCreate: fi_initWeightedListview,
	onAfterCreate: fi_addUpgradeIndicator,
	hiddenCols: ['type', 'source'],
	data: []
*/
    if (!empty($filter['fi']['extraCols']))
    {
        $gem  = empty($filter['gm']) ? 0 : $filter['gm'];
        $cost = array_intersect([63], $xCols) ? 1 : 0;
        $pageData['lv']['params']['extraCols'] = '$fi_getExtraCols(fi_extraCols, '.$gem.', '.$cost.')';
    }

    if (!empty($filter['fi']['setWeights']))
    {
        if (!empty($filter['gm']))
        {
            $pageData['lv']['params']['computeDataFunc'] = '$fi_scoreSockets';

            $w    = $itemFilter->getForm('setWeights', true);
            $q    = intVal($filter['gm']);
            $mask = 14;
            $cnd  = [10, ['class', ITEM_CLASS_GEM], ['gemColorMask', &$mask, '&'], ['quality', &$q]];
            if (!isset($filter['jc']))
                $cnd[] = ['itemLimitCategory', 0];          // Jeweler's Gems

            $wData = ['wt' => $w[0], 'wtv' => $w[1]];
            If ($_ = $itemFilter->createConditionsForWeights($wData))
                $cnd[] = $_;

            $anyColor = new ItemList($cnd, ['extraOpts' => $itemFilter->extraOpts]);
            if (!$anyColor->error)
            {
                $anyColor->addGlobalsToJScript($smarty);
                $pageData['page']['gemScores'][0] = array_values($anyColor->getListviewData(ITEMINFO_GEM));
            }

            for ($i = 0; $i < 4; $i++)
            {
                $mask = 1 << $i;
                $q    = !$i ? 3 : intVal($filter['gm']);    // meta gems are always included.. ($q is backReferenced)
                $byColor = new ItemList($cnd, ['extraOpts' => $itemFilter->extraOpts]);
                if (!$byColor->error)
                {
                    $byColor->addGlobalsToJScript($smarty);
                    $pageData['page']['gemScores'][$mask] = array_values($byColor->getListviewData(ITEMINFO_GEM));
                }
            }

            $pageData['page']['gemScores'] = json_encode($pageData['page']['gemScores'], JSON_NUMERIC_CHECK);
        }

        $pageData['lv']['params']['onBeforeCreate'] = '$fi_initWeightedListview';
        $pageData['lv']['params']['onAfterCreate']  = '$fi_addUpgradeIndicator';
        $pageData['lv']['params']['sort']           = "$['-score', 'name']";

        if ($items->hasSetFields(['armor']))
            $visibleCols[] = 'armor';

        array_push($hiddenCols, 'type', 'source');
    }

    // create note if search limit was exceeded; overwriting 'note' is intentional
    if ($items->getMatches() > CFG_SQL_LIMIT_DEFAULT && empty($filter['upg']))
    {
        $pageData['lv']['params']['note'] = sprintf(Util::$tryFilteringString, 'LANG.lvnote_itemsfound', $items->getMatches(), CFG_SQL_LIMIT_DEFAULT);
        $pageData['lv']['params']['_truncated'] = 1;
    }

    if ($hiddenCols)
        $pageData['lv']['params']['hiddenCols'] = '$'.json_encode($hiddenCols);

    if ($visibleCols)
        $pageData['lv']['params']['visibleCols'] = '$'.json_encode($visibleCols);

    $smarty->saveCache($cacheKey, $pageData, $filter);
}


// sort for dropdown-menus
asort(Lang::$game['ra']);
asort(Lang::$game['cl']);

$smarty->updatePageVars($pageData['page']);
$smarty->assign('filter', $filter);
$smarty->assign('lang', array_merge(Lang::$main, Lang::$game, Lang::$item, ['colon' => Lang::$colon]));
$smarty->assign('lvData', $pageData['lv']);

// load the page
$smarty->display('items.tpl');

?>
