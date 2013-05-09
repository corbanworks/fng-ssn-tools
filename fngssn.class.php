<?php

/*
PHP US Social Security Number Generator and Validator v1.3
Copyright © 2007-2013 Corban Works, LLC <http://www.fakenamegenerator.com/>

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/

class fngssn{

    // Populate this variable with the high group list provided by the Social Security Administration:
    // http://www.ssa.gov/employer/ssnvhighgroup.htm

    // We only want the numbers. Omit the explanatory text at the beginning of the file.
    // This list is from June 2011
    private $highgroup = 
'001 11  002 11  003 08  004 13  005 13* 006 11
007 11  008 94  009 94* 010 94  011 94  012 94
013 94  014 94  015 94  016 94  017 94  018 94
019 94  020 94  021 94* 022 92  023 92  024 92
025 92  026 92  027 92  028 92  029 92  030 92
031 92  032 92  033 92  034 92  035 74  036 74
037 74  038 74  039 74  040 15  041 15  042 15
043 15  044 15  045 15  046 15  047 15  048 15
049 15* 050 02  051 02  052 02  053 02  054 02
055 02  056 02  057 02  058 02  059 02  060 02
061 02  062 02  063 02  064 02  065 02  066 02
067 02  068 02  069 02  070 02  071 02  072 02
073 02  074 02  075 02  076 02  077 02  078 02
079 02  080 02  081 02  082 02  083 02  084 02
085 02  086 02  087 02  088 02  089 02  090 02
091 02  092 02  093 02  094 02  095 02  096 02
097 02  098 02  099 02  100 02  101 02  102 02
103 02* 104 02* 105 02* 106 98  107 98  108 98
109 98  110 98  111 98  112 98  113 98  114 98
115 98  116 98  117 98  118 98  119 98  120 98
121 98  122 98  123 98  124 98  125 98  126 98
127 98  128 98  129 98  130 98  131 98  132 98
133 98  134 98  135 25  136 25  137 25  138 25*
139 23  140 23  141 23  142 23  143 23  144 23
145 23  146 23  147 23  148 23  149 23  150 23
151 23  152 23  153 23  154 23  155 23  156 23
157 23  158 23  159 86  160 86  161 86  162 86
163 86  164 86  165 86  166 86  167 86  168 86
169 86  170 86  171 86  172 86  173 86  174 86
175 86  176 86  177 86  178 86  179 86  180 86
181 86  182 86  183 86  184 86  185 86  186 86
187 86  188 86  189 86  190 86  191 86  192 86
193 86  194 86  195 86* 196 84  197 84  198 84
199 84  200 84  201 84  202 84  203 84  204 84
205 84  206 84  207 84  208 84  209 84  210 84
211 84  212 91  213 91  214 91  215 91* 216 89
217 89  218 89  219 89  220 89  221 13  222 11
223 99  224 99  225 99  226 99  227 99  228 99
229 99  230 99  231 99  232 57  233 57  234 57
235 57* 236 55  237 99  238 99  239 99  240 99
241 99  242 99  243 99  244 99  245 99  246 99
247 99  248 99  249 99  250 99  251 99  252 99
253 99  254 99  255 99  256 99  257 99  258 99
259 99  260 99  261 99  262 99  263 99  264 99
265 99  266 99  267 99  268 17  269 17  270 17
271 17  272 17  273 17  274 17  275 17  276 17
277 17  278 17* 279 15  280 15  281 15  282 15
283 15  284 15  285 15  286 15  287 15  288 15
289 15  290 15  291 15  292 15  293 15  294 15
295 15  296 15  297 15  298 15  299 15  300 15
301 15  302 15  303 37  304 37  305 37  306 37
307 37  308 37  309 37  310 37  311 35  312 35
313 35  314 35  315 35  316 35  317 35  318 11
319 11  320 11  321 11  322 11  323 11  324 11
325 11  326 11  327 11  328 11  329 11  330 11
331 11  332 11  333 11  334 11  335 11  336 11
337 11  338 11  339 11  340 11  341 11  342 11
343 11  344 11  345 11* 346 08  347 08  348 08
349 08  350 08  351 08  352 08  353 08  354 08
355 08  356 08  357 08  358 08  359 08  360 08
361 08  362 39  363 39  364 39  365 39  366 39
367 39  368 39  369 39* 370 37  371 37  372 37
373 37  374 37  375 37  376 37  377 37  378 37
379 37  380 37  381 37  382 37  383 37  384 37
385 37  386 37  387 33  388 33  389 33  390 33
391 33  392 33  393 33  394 33  395 33  396 33
397 33  398 31  399 31  400 73  401 73  402 73
403 73  404 73  405 73  406 73  407 73  408 99
409 99  410 99  411 99  412 99  413 99  414 99
415 99  416 67  417 67  418 67  419 67  420 67
421 67  422 67  423 67  424 65  425 99  426 99
427 99  428 99  429 99  430 99  431 99  432 99
433 99  434 99  435 99  436 99  437 99  438 99
439 99  440 29  441 29  442 29* 443 27  444 27
445 27  446 27  447 27  448 27  449 99  450 99
451 99  452 99  453 99  454 99  455 99  456 99
457 99  458 99  459 99  460 99  461 99  462 99
463 99  464 99  465 99  466 99  467 99  468 57
469 57  470 57  471 57  472 57* 473 55  474 55
475 55  476 55  477 55  478 43* 479 41  480 41
481 41  482 41  483 41  484 41  485 41  486 29
487 29  488 29  489 29  490 29  491 29  492 29
493 29  494 29  495 29  496 29  497 29  498 29
499 29  500 29* 501 37  502 37  503 45  504 45
505 59  506 57  507 57  508 57  509 33  510 33
511 33  512 33* 513 31  514 31  515 31  516 49
517 49  518 89  519 87  520 61  521 99  522 99
523 99  524 99  525 99  526 99  527 99  528 99
529 99  530 99  531 71  532 71  533 71  534 71
535 71  536 71  537 71  538 71  539 71* 540 83
541 83* 542 81  543 81  544 81  545 99  546 99
547 99  548 99  549 99  550 99  551 99  552 99
553 99  554 99  555 99  556 99  557 99  558 99
559 99  560 99  561 99  562 99  563 99  564 99
565 99  566 99  567 99  568 99  569 99  570 99
571 99  572 99  573 99  574 61  575 99  576 99
577 53  578 53  579 53  580 41* 581 99  582 99
583 99  584 99  585 99  586 67  587 99  588 09
589 99  590 99  591 99  592 99  593 99  594 99
595 99  596 94* 597 92  598 92  599 92  600 99
601 99  602 87  603 87  604 87  605 87  606 87
607 87  608 87  609 87  610 87  611 87  612 87
613 87  614 87  615 87* 616 87* 617 87* 618 87*
619 87* 620 85  621 85  622 85  623 85  624 85
625 85  626 85  627 31  628 31  629 31  630 31
631 31  632 31  633 31  634 31* 635 31* 636 31*
637 29  638 29  639 29  640 29  641 29  642 29
643 29  644 29  645 29  646 23  647 21  648 58
649 56  650 62  651 62  652 62  653 60  654 38
655 36  656 36  657 36  658 36  659 24  660 24*
661 22  662 22  663 22  664 22  665 22  667 48
668 48  669 48  670 48  671 48  672 48  673 48
674 48  675 48* 676 22  677 22  678 22* 679 20
680 31  681 24  682 24  683 24  684 24  685 24
686 24  687 24  688 24  689 24* 690 22  691 18
692 18* 693 16  694 16  695 16  696 16  697 16
698 16  699 16  700 18  701 18  702 18  703 18
704 18  705 18  706 18  707 18  708 18  709 18
710 18  711 18  712 18  713 18  714 18  715 18
716 18  717 18  718 18  719 18  720 18  721 18
722 18  723 18  724 28  725 18  726 18  727 10
728 14  729 28  730 28  731 28  732 28* 733 26
750 20  751 18  752 09  753 07  754 07  755 07
756 12  757 12  758 12  759 12  760 12  761 12
762 12  763 12  764 29* 765 27  766 04* 767 02
768 02  769 02  770 02  771 02  772 02*';
    
    // This information is obtained from:
    // http://www.ssa.gov/employer/stateweb.htm    
    var $statePrefixes = array(
    'AK'=>array(574),
    'AL'=>array(416,417,418,419,420,421,422,423,424),
    'AR'=>array(429,430,431,432,676,677,678,679),
    'AZ'=>array(526,527,600,601,764,765),
    'CA'=>array(545,546,547,548,549,550,551,552,553,554,555,556,557,558,559,560,561,562,563,564,565,566,567,568,569,570,571,572,573,602,603,604,605,606,607,608,609,610,611,612,613,614,615,616,617,618,619,620,621,622,623,624,625,626),
    'CO'=>array(521,522,523,524,650,651,652,653),
    'CT'=>array(40,41,42,43,44,45,46,47,48,49),
    'DC'=>array(577,578,579),
    'DE'=>array(221,222),
    'FL'=>array(261,262,263,264,265,266,267,589,590,591,592,593,594,595,766,767,768,769,770,771,772),
    'GA'=>array(252,253,254,255,256,257,258,259,260,667,668,669,670,671,672,673,674,675),
    'HI'=>array(575,576,750,751),
    'IA'=>array(478,479,480,481,482,483,484,485),
    'ID'=>array(518,519),
    'IL'=>array(318,319,320,321,322,323,324,325,326,327,328,329,330,331,332,333,334,335,336,337,338,339,340,341,342,343,344,345,346,347,348,349,350,351,352,353,354,355,356,357,358,359,360,361),
    'IN'=>array(303,304,305,306,307,308,309,310,311,312,313,314,315,316,317),
    'KS'=>array(509,510,511,512,513,514,515),
    'KY'=>array(400,401,402,403,404,405,406,407),
    'LA'=>array(433,434,435,436,437,438,439,659,660,661,662,663,664,665),
    'MA'=>array(10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34),
    'MD'=>array(212,213,214,215,216,217,218,219,220),
    'ME'=>array(4,5,6,7),
    'MI'=>array(362,363,364,365,366,367,368,369,370,371,372,373,374,375,376,377,378,379,380,381,382,383,384,385,386),
    'MN'=>array(468,469,470,471,472,473,474,475,476,477),
    'MO'=>array(486,487,488,489,490,491,492,493,494,495,496,497,498,499,500),
    'MS'=>array(425,426,427,428,587),
    'MT'=>array(516,517),
    'NC'=>array(237,238,239,240,241,242,243,244,245,246,681,682,683,684,685,686,687,688,689,690),
    'ND'=>array(501,502),
    'NE'=>array(505,506,507,508),
    'NH'=>array(1,2,3),
    'NJ'=>array(135,136,137,138,139,140,141,142,143,144,145,146,147,148,149,150,151,152,153,154,155,156,157,158),
    'NM'=>array(525,585,648,649),
    'NV'=>array(530,680),
    'NY'=>array(50,51,52,53,54,55,56,57,58,59,60,61,62,63,64,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,91,92,93,94,95,96,97,98,99,100,101,102,103,104,105,106,107,108,109,110,111,112,113,114,115,116,117,118,119,120,121,122,123,124,125,126,127,128,129,130,131,132,133,134),
    'OH'=>array(268,269,270,271,272,273,274,275,276,277,278,279,280,281,282,283,284,285,286,287,288,289,290,291,292,293,294,295,296,297,298,299,300,301,302),
    'OK'=>array(440,441,442,443,444,445,446,447,448),
    'OR'=>array(540,541,542,543,544),
    'PA'=>array(159,160,161,162,163,164,165,166,167,168,169,170,171,172,173,174,175,176,177,178,179,180,181,182,183,184,185,186,187,188,189,190,191,192,193,194,195,196,197,198,199,200,201,202,203,204,205,206,207,208,209,210,211),
    'RI'=>array(35,36,37,38,39),
    'SC'=>array(247,248,249,250,251,654,655,656,657,658),
    'SD'=>array(503,504),
    'TN'=>array(408,409,410,411,412,413,414,415,756,757,758,759,760,761,762,763),
    'TX'=>array(449,450,451,452,453,454,455,456,457,458,459,460,461,462,463,464,465,466,467,627,628,629,630,631,632,633,634,635,636,637,638,639,640,641,642,643,644,645),
    'UT'=>array(528,529,646,647),
    'VA'=>array(223,224,225,226,227,228,229,230,231,691,692,693,694,695,696,697,698,699),
    'VT'=>array(8,9),
    'WA'=>array(531,532,533,534,535,536,537,538,539),
    'WI'=>array(387,388,389,390,391,392,393,394,395,396,397,398,399),
    'WV'=>array(232,233,234,235,236),
    'WY'=>array(520)
    );

    var $states = array('AK','AL','AR','AZ','CA','CO','CT','DC','DE','FL','GA','HI','IA','ID','IL','IN','KS','KY','LA','MA','MD','ME','MI','MN','MO','MS','MT','NC','ND','NE','NH','NJ','NM','NV','NY','OH','OK','OR','PA','RI','SC','SD','TN','TX','UT','VA','VT','WA','WI','WV','WY');

    // The SSA uses a funky method of figuring out what group number to use next. This area has them in the proper order and makes it easier to generate a SSN.
    var $possibleGroups = array(1,3,5,7,9,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48,50,52,54,56,58,60,62,64,66,68,70,72,74,76,78,80,82,84,86,88,90,92,94,96,98,2,4,6,8,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63,65,67,69,71,73,75,77,79,81,83,85,87,89,91,93,95,97,99);

    // Cleans the high group number list so it is useful.
    function __CONSTRUCT(){
        $highgroup = $this->highgroup;    
    
        // Trim the high group list and remove asterisks, fix space/tabs, and replace new lines with tabs.
        // The data isn't formatted well so we have to do quite a bit of random replacing.
        $highgroup = trim($highgroup);
        $highgroup = str_replace(array('* ','*'," \t","\n",'  '),array("\t",'',"\t","\t","\t"),$highgroup);
    
        // Explode on tab. This should give us an array of prefixes and group numbers, IE '203 82', '204 82', etc
        $highgroup = explode("\t",$highgroup);

        // Make array useful by splitting the prefix and group number
        // We also convert the string to an int for easier handling later down the road
        foreach($highgroup as $value){
            if(trim($value) != ''){
                $temp = explode(' ',$value);
                $cleangroup[(int)trim($temp[0])] = (int)trim($temp[1]);
            }
        }
        
        $this->highgroup = $cleangroup;
    }

    // Print the cleaned high group array. This is useful when putting in a new high group list.
    function printHighGroup(){
        echo '<pre>';
        print_r($this->highgroup);
        echo '</pre>';
    }
        
    // Generate an SSN based on state
    // Returns false if bad state
    function generateSSN($state = false, $separator = '-'){
        $states = $this->states;
        $statePrefixes = $this->statePrefixes;
        $highgroup = $this->highgroup;
        $possibleGroups = $this->possibleGroups;

        if($state == false){
            $state = $states[mt_rand(0,count($states)-1)];
        }

        $state = strtoupper($state);

        // Sanity check: is this a valid state?
        if(!isset($statePrefixes[$state])){
            return false;
        }
        
        // Generate area number
        $area = $statePrefixes[$state][array_rand($statePrefixes[$state])];
        
        // Generate group number
        $group = $possibleGroups[mt_rand(0,array_search($highgroup[$area], $possibleGroups))]; // Generate valid group number
        
        // Generate last four
        $lastfour = sprintf("%04s",trim(mt_rand(0,9999)));
        
        return sprintf("%03s",$area) . $separator . sprintf("%02s",$group) . $separator . $lastfour;
    }
    
    // See if a SSN is valid
    // Returns false is not, or two letter state abbreviation if it is valid
    function validateSSN($ssn){
        $statePrefixes = $this->statePrefixes;
        $highgroup = $this->highgroup;
        $possibleGroups = $this->possibleGroups;

        // Split up the SSN
        // If not 9 or 11 long, then return false
        $length = strlen($ssn);
        if($length == 9){
            $areaNumber = substr($ssn,0,3);
            $groupNumber = substr($ssn,3,2);
            $lastFour = substr($ssn,5);
        }elseif($length == 11){
            $areaNumber = substr($ssn,0,3);
            $groupNumber = substr($ssn,4,2);
            $lastFour = substr($ssn,7);
        }else{
            return false;
        }

        // Strip leading zeros
        $areaNumber = ltrim($areaNumber, 0);
        $groupNumber = ltrim($groupNumber, 0);
        
        // Check if parts are numeric
        if(!is_numeric($areaNumber) || !is_numeric($groupNumber) || !is_numeric($lastFour)){
            return false;
        }
        
        foreach($statePrefixes as $state => $numbers){
            // Search for the area number in the state list
            if(in_array($areaNumber, $numbers)){
                // Make sure the group number is valid
                if(array_search($highgroup[$areaNumber],$possibleGroups) >= array_search($groupNumber,$possibleGroups)){
                    return $state;
                }else{
                    return false;
                }
                break;
            }
        }
        return false;
    }
}

/* Example usage: */

/*

// Instantiate the class
$fngssn = new fngssn();

// Generate a SSN for California
echo $fngssn->generateSSN('CA');

// Validate a SSN
echo $fngssn->validateSSN('421-61-1998');

*/

