<?php
//php /home/w/w99961tq/w99961tq.beget.tech/public_html/index.php > /home/w/w99961tq/w99961tq.beget.tech/public_html/out.txt

define('WORK_DIR', __DIR__);
define('TEMP_DIR', __DIR__.'/temp');
define('REPORTS_DIR', __DIR__.'/reports');
function __autoload($class){
    require 'classes/'.$class.'.class.php';
}


/* $ru60 = new scavenge('ru60', '65e81816');
$ru60->set_cookie('cid=327173088; fakeypress12={1.97}[65,66,67,74,39,37,90][distance,asc,0,1,1,1,0,0,0,0,0,0,0]; ru_auth=d95782410b07:4b5181af8c46620b7df826a52eaa8ce160efd5e205ccd6336de7ed0d4e17d99c; ref=start; PHPSESSID=b43fff55bd2791269a42890232f051b5; popup_pos_emoji_picker=739x262.5; sid=%3Afec5d28446c261df34dd9c0fb047ce24164e725b0ab91157713a0f37be482d6e2372c9cd43625bf786e0e13586ebd165261f5ea463d83f93260a024b9b4f6d75; popup_pos_village_targets=788.5166625976562x493; popup_pos_inline_popup=485x404; global_village_id=8728; io=4S2xTvcdq_7H3T-CAxJZ; websocket_available=true');
$ru60->scavenge_cycle(8728, 1, array('axe'=>866));
$ru60->scavenge_cycle(8728, 2, array('axe'=>347));
$ru60->scavenge_cycle(8728, 3, array('axe'=>174));
$ru60->scavenge_cycle(8728, 4, array('axe'=>113));

$village = 8773; //XRN 	(473|582) K54
$ru60->scavenge_cycle($village, 1, array('axe'=>489));
$ru60->scavenge_cycle($village, 2, array('axe'=>196));
$ru60->scavenge_cycle($village, 3, array('axe'=>98));
$ru60->scavenge_cycle($village, 4, array('axe'=>64));

$village = 8755; //GIG 	(476|584) K54
$ru60->scavenge_cycle($village, 1, array('spear'=>271));
$ru60->scavenge_cycle($village, 2, array('spear'=>109));
$ru60->scavenge_cycle($village, 3, array('spear'=>52, 'sword'=>4));
$ru60->scavenge_cycle($village, 4, array('sword'=>57));

$village = 9368; //v.v.ermak 	(477|587) K54
$ru60->scavenge_cycle($village, 1, array('spear'=>330));
$ru60->scavenge_cycle($village, 2, array('spear'=>132));
$ru60->scavenge_cycle($village, 3, array('spear'=>66));
//$ru60->scavenge_cycle($village, 4, array('sword'=>57));

$village = 8792; //Бонусная деревня 		(475|582) K54
$ru60->scavenge_cycle($village, 1, array('spear'=>181));
$ru60->scavenge_cycle($village, 2, array('spear'=>73));
$ru60->scavenge_cycle($village, 3, array('spear'=>35));
//$ru60->scavenge_cycle($village, 4, array('sword'=>57)); */

$ru60 = new scavenge('ru61', '54ac4a3f');
$ru60->set_cookie('cid=327173088; ru_auth=d95782410b07:4b5181af8c46620b7df826a52eaa8ce160efd5e205ccd6336de7ed0d4e17d99c; ref=start; PHPSESSID=28c9be6660eb29512695a534c9696483; sid=%3A9902fdcd519fcfd53b0cf07a3b57f64216b38f9a21a45bb6df875d1d91d9f11a92f6863a23a4710c8c26f4be729d892b4eccee0668b41c3ddd34ce786c8263bf; popup_pos_emoji_picker=700.5x304.5; websocket_available=true; io=IVhEND5Nhrr8-OhOAGC_; global_village_id=1960');
$ru60->scavenge_cycle(1960, 1, array('spear'=>293, 'light'=>19));
$ru60->scavenge_cycle(1960, 2, array('spear'=>124, 'sword'=>29));
$ru60->scavenge_cycle(1960, 3, array('sword'=>116));
$ru60->scavenge_cycle(1960, 4, array('spear'=>100));
