<?php

use App\Models\Advertise;
use App\Models\Category;
use App\Models\Comment;
use App\Models\HadithCategory;
use App\Models\HadithCollection;
use App\Models\News;
use App\Models\Post;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

function getTagString($tagArray) {
    $string = '';
    if (is_array($tagArray)) {
        foreach ($tagArray as $value) {
            if (isset($value['value'])) {
                $string .= ','.$value['value'];
            }
        }
    }
    return ltrim($string, ',');
}

function getRecentPost($limit=10, $postid=null) {
    $query = Post::query();
    if ($postid) {
        $psot = Post::find($postid);
        $query->where('category_id', $psot->category_id);
    }
    $query->orderBy('created_at', 'DESC')->limit($limit);
    return $query->get();
}

function getComment($postId, $all=false) {
    $query = Comment::where('post_id', $postId)
            ->where('status', 1);
            if (!$all) {
                $query->whereNull('parent_id');
            }
    return $query->orderBy('created_at', 'DESC')->get();
}

function getCommentQuery() {
    return Comment::query();
}

function getRecentNews($limit=10, $postid=null) {
    $query = News::query();
    // if ($postid) {
    //     $psot = News::find($postid);
    //     $query->where('category_id', $psot->category_id);
    // }
    $query->orderBy('created_at', 'DESC')->limit($limit);
    return $query->get();
}

function getPopularPost($limit=10, $postid=null) {
    $query = Post::query();
    if ($postid) {
        $post = Post::find($postid);
        $query->where('category_id', $post->category_id);
    }
    $query->orderBy('view', 'DESC')->limit($limit);
    return $query->get();
}
function getPopularNews($limit=10, $postid=null) {
    $query = Post::query();
    // if ($postid) {
    //     $post = Post::find($postid);
    //     $query->where('category_id', $post->category_id);
    // }
    $query->orderBy('view', 'DESC')->limit($limit);
    return $query->get();
}

function getNextPreviousPost($postId)
{
    $currentPost = Post::find($postId);
    $nextPost = Post::where('id', '>', $postId)->where('category_id', $currentPost->category_id)->orderBy('id')->first();
    if (!$nextPost) {
        $nextPost = Post::orderBy('id')->first();
    }
    $previousPost = Post::where('id', '<', $postId)->where('category_id', $currentPost->category_id)->orderBy('id', 'desc')->first();
    if (!$previousPost) {
        $previousPost = Post::orderBy('id', 'desc')->first();
    }
    return [
        'valid' => !empty($nextPost) && !empty($previousPost),
        'nextPost' => $nextPost,
        'previousPost' => $previousPost
    ];
}

function getNextPreviousNews($postId)
{
    $currentPost = News::find($postId);
    $nextPost = News::where('id', '>', $postId)->orderBy('id')->first();
    if (!$nextPost) {
        $nextPost = News::orderBy('id')->first();
    }
    $previousPost = News::where('id', '<', $postId)->orderBy('id', 'desc')->first();
    if (!$previousPost) {
        $previousPost = News::orderBy('id', 'desc')->first();
    }
    return [
        'valid' => !empty($nextPost) && !empty($previousPost),
        'nextPost' => $nextPost,
        'previousPost' => $previousPost
    ];
}

function getRandomNextPreviousPost($postId)
{
    $currentPost = Post::find($postId);
    $categoryId = $currentPost->category_id;
    $nextPost = Post::where('category_id', $categoryId)
                    ->where('id', '!=', $postId)
                    ->inRandomOrder()
                    ->first();
    $previousPost = Post::where('category_id', $categoryId)
                        ->where('id', '!=', $postId)
                        ->inRandomOrder()
                        ->first();
    return [
        'nextPost' => $nextPost,
        'previousPost' => $previousPost
    ];
}

function getCategoryWithPostCount($limit=5) {
    return Category::where('slug', '!=', 'al-quran')->withCount('posts')->limit($limit)->orderBy('posts_count', 'desc')->get();
}

function getHadithCategory($limit=null) {
    $query = HadithCategory::orderBy('created_at', 'DESC');
    if ($limit > 0) {
        $query->limit($limit);
    }
    return $query->get();
}

function getHadithCollections($limit=null, $categoryId=null) {
    $hadith_category = HadithCategory::find($categoryId);
    $query = HadithCollection::orderBy('created_at', 'DESC');
    if ($hadith_category) {
        $query->where('hadith_category_id', $hadith_category->id);
    }
    if ($limit > 0) {
        $query->limit($limit);
    }
    return $query->get();
}

function getAdvertise($categoryId, $type = null) {
    $query = Advertise::query();
        $query->where('category_id', $categoryId);
            // ->whereDate('start_date', '>', now())
            // ->whereDate('end_date', '<', now())
            // ->where('status', 1);
        // if ($type) {
        //     $query->where('type', $type);
        // }
    return $query->first();
}

function stringLimit($string, $limit=200) {
    $decodedDescription = html_entity_decode($string);

    $plainText = strip_tags($decodedDescription);
    return Str::limit($plainText, $limit, '...');;
}

function getAllRouteNameAsArray()
{
    $app = app();

    // $routes = $app->routes->getRoutes();
    $routes = Route::getRoutes();
    // dd($routes);
    $data = [];
    foreach ($routes as $key => $route) {

        if(isset($route->action))
        {
            $action = $route->action;
            if(isset($action['as']) && !empty($action['prefix'] && Str::startsWith($action['as'], 'app')))
            {
                // dd(explode('.', substr($action['as'], 6)));
                $permission = explode('.', substr($action['as'], 4));
                if (array_key_exists(1, $permission)){
                    $data[$permission[0]][] = $permission[1];
                } else {
                    $data['app'][] = $permission[0];
                }
            }
        }
    }
    // dd($data);
    if (!empty($data)) {
        return $data;
    }
}

function getAllRouteNames()
{
    $app = app();

    // $routes = $app->routes->getRoutes();
    $routes = Route::getRoutes();
    $data = [];
    foreach ($routes as $key => $route) {
        if(isset($route->action))
        {
            $action = $route->action;
            if(isset($action['as']) && !empty($action['prefix'] && Str::startsWith($action['as'], 'app')))
            {
                $permission = explode('.', substr($action['as'], 4));
                // dd($action);
                if (array_key_exists(1, $permission)){
                    $data[] = substr($action['as'], 4);
                } else {
                    $data[] = $action['as'];
                }
            }
        }
    }
    // dd($data);
    if (!empty($data)) {
        return $data;
    }
}


function get_serial_no($table, $field, $length=5) {
    $orderObj = \Illuminate\Support\Facades\DB::table($table)->select($field)->latest('id')->first();
    if ($orderObj) {
        $orderNr = $orderObj->purchase_no;
        $removed1char = substr($orderNr, 1);
        $generateOrder_nr = '#' . str_pad($removed1char + 1, $length, "0", STR_PAD_LEFT);
    } else {
        $generateOrder_nr = '#' . str_pad(1, $length, "0", STR_PAD_LEFT);
    }
    return $generateOrder_nr;
}


function num_to_word($num = '') {
    $num    = (string) ((int) $num);

    if ((int) ($num) && ctype_digit($num)) {
        $words  = array();

        $num    = str_replace(array(',', ' '), '', trim($num));

        $list1  = array(
            '', 'one', 'two', 'three', 'four', 'five', 'six', 'seven',
            'eight', 'nine', 'ten', 'eleven', 'twelve', 'thirteen', 'fourteen',
            'fifteen', 'sixteen', 'seventeen', 'eighteen', 'nineteen'
        );

        $list2  = array(
            '', 'ten', 'twenty', 'thirty', 'forty', 'fifty', 'sixty',
            'seventy', 'eighty', 'ninety', 'hundred'
        );

        $list3  = array(
            '', 'thousand', 'million', 'billion', 'trillion',
            'quadrillion', 'quintillion', 'sextillion', 'septillion',
            'octillion', 'nonillion', 'decillion', 'undecillion',
            'duodecillion', 'tredecillion', 'quattuordecillion',
            'quindecillion', 'sexdecillion', 'septendecillion',
            'octodecillion', 'novemdecillion', 'vigintillion'
        );

        $num_length = strlen($num);
        $levels = (int) (($num_length + 2) / 3);
        $max_length = $levels * 3;
        $num    = substr('00' . $num, -$max_length);
        $num_levels = str_split($num, 3);

        foreach ($num_levels as $num_part) {
            $levels--;
            $hundreds   = (int) ($num_part / 100);
            $hundreds   = ($hundreds ? ' ' . $list1[$hundreds] . ' Hundred' . ($hundreds == 1 ? '' : 's') . ' ' : '');
            $tens       = (int) ($num_part % 100);
            $singles    = '';

            if ($tens < 20) {
                $tens   = ($tens ? ' ' . $list1[$tens] . ' ' : '');
            } else {
                $tens   = (int) ($tens / 10);
                $tens   = ' ' . $list2[$tens] . ' ';
                $singles    = (int) ($num_part % 10);
                $singles    = ' ' . $list1[$singles] . ' ';
            }
            $words[]    = $hundreds . $tens . $singles . (($levels && (int) ($num_part)) ? ' ' . $list3[$levels] . ' ' : '');
        }

        $commas = count($words);

        if ($commas > 1) {
            $commas = $commas - 1;
        }

        $words  = implode(', ', $words);

        //Some Finishing Touch
        //Replacing multiples of spaces with one space
        $words  = trim(str_replace(' ,', ',', trim_all(ucwords($words))), ', ');
        if ($commas) {
            $words  = str_replace_last(',', ' and', $words);
        }

        return $words;
    } else if (!((int) $num)) {
        return 'Zero';
    }
    return '';
}

function trim_all($str, $what = NULL, $with = ' ')
{
    if ($what === NULL) {
        //  Character      Decimal      Use
        //  "\0"            0           Null Character
        //  "\t"            9           Tab
        //  "\n"           10           New line
        //  "\x0B"         11           Vertical Tab
        //  "\r"           13           New Line in Mac
        //  " "            32           Space

        $what   = "\\x00-\\x20";    //all white-spaces and control chars
    }

    return trim(preg_replace("/[" . $what . "]+/", $with, $str), $what);
}

function str_replace_last($search, $replace, $str)
{
    if (($pos = strrpos($str, $search)) !== false) {
        $search_length  = strlen($search);
        $str    = substr_replace($str, $replace, $pos, $search_length);
    }
    return $str;
}



function getSettings($settings=null, $name=null, $key=null) {
    if($settings && $name && $key) {
        $row = collect($settings)->where('name', $name)->first();
        if ($row) {
            return isset($row->settings[$key]) ? $row->settings[$key] : '';
        }
    }
}
function getCountry($code){
    $country_list = [
        "AF" => "Afghanistan",
        "AX" => "Aland Islands",
        "AL" => "Albania",
        "DZ" => "Algeria",
        "AS" => "American Samoa",
        "AD" => "Andorra",
        "AO" => "Angola",
        "AI" => "Anguilla",
        "AQ" => "Antarctica",
        "AG" => "Antigua and Barbuda",
        "AR" => "Argentina",
        "AM" => "Armenia",
        "AW" => "Aruba",
        "AU" => "Australia",
        "AT" => "Austria",
        "AZ" => "Azerbaijan",
        "BS" => "Bahamas",
        "BH" => "Bahrain",
        "BD" => "Bangladesh",
        "BB" => "Barbados",
        "BY" => "Belarus",
        "BE" => "Belgium",
        "BZ" => "Belize",
        "BJ" => "Benin",
        "BM" => "Bermuda",
        "BT" => "Bhutan",
        "BO" => "Bolivia",
        "BQ" => "Bonaire, Sint Eustatius and Saba",
        "BA" => "Bosnia and Herzegovina",
        "BW" => "Botswana",
        "BV" => "Bouvet Island",
        "BR" => "Brazil",
        "IO" => "British Indian Ocean Territory",
        "BN" => "Brunei Darussalam",
        "BG" => "Bulgaria",
        "BF" => "Burkina Faso",
        "BI" => "Burundi",
        "KH" => "Cambodia",
        "CM" => "Cameroon",
        "CA" => "Canada",
        "CV" => "Cape Verde",
        "KY" => "Cayman Islands",
        "CF" => "Central African Republic",
        "TD" => "Chad",
        "CL" => "Chile",
        "CN" => "China",
        "CX" => "Christmas Island",
        "CC" => "Cocos (Keeling) Islands",
        "CO" => "Colombia",
        "KM" => "Comoros",
        "CG" => "Congo",
        "CD" => "Congo, the Democratic Republic of the",
        "CK" => "Cook Islands",
        "CR" => "Costa Rica",
        "CI" => "Cote D'Ivoire",
        "HR" => "Croatia",
        "CU" => "Cuba",
        "CW" => "Curacao",
        "CY" => "Cyprus",
        "CZ" => "Czech Republic",
        "DK" => "Denmark",
        "DJ" => "Djibouti",
        "DM" => "Dominica",
        "DO" => "Dominican Republic",
        "EC" => "Ecuador",
        "EG" => "Egypt",
        "SV" => "El Salvador",
        "GQ" => "Equatorial Guinea",
        "ER" => "Eritrea",
        "EE" => "Estonia",
        "ET" => "Ethiopia",
        "FK" => "Falkland Islands (Malvinas)",
        "FO" => "Faroe Islands",
        "FJ" => "Fiji",
        "FI" => "Finland",
        "FR" => "France",
        "GF" => "French Guiana",
        "PF" => "French Polynesia",
        "TF" => "French Southern Territories",
        "GA" => "Gabon",
        "GM" => "Gambia",
        "GE" => "Georgia",
        "DE" => "Germany",
        "GH" => "Ghana",
        "GI" => "Gibraltar",
        "GR" => "Greece",
        "GL" => "Greenland",
        "GD" => "Grenada",
        "GP" => "Guadeloupe",
        "GU" => "Guam",
        "GT" => "Guatemala",
        "GG" => "Guernsey",
        "GN" => "Guinea",
        "GW" => "Guinea-Bissau",
        "GY" => "Guyana",
        "HT" => "Haiti",
        "HM" => "Heard Island and Mcdonald Islands",
        "VA" => "Holy See (Vatican City State)",
        "HN" => "Honduras",
        "HK" => "Hong Kong",
        "HU" => "Hungary",
        "IS" => "Iceland",
        "IN" => "India",
        "ID" => "Indonesia",
        "IR" => "Iran, Islamic Republic of",
        "IQ" => "Iraq",
        "IE" => "Ireland",
        "IM" => "Isle of Man",
        "IL" => "Israel",
        "IT" => "Italy",
        "JM" => "Jamaica",
        "JP" => "Japan",
        "JE" => "Jersey",
        "JO" => "Jordan",
        "KZ" => "Kazakhstan",
        "KE" => "Kenya",
        "KI" => "Kiribati",
        "KP" => "Korea, Democratic People's Republic of",
        "KR" => "Korea, Republic of",
        "XK" => "Kosovo",
        "KW" => "Kuwait",
        "KG" => "Kyrgyzstan",
        "LA" => "Lao People's Democratic Republic",
        "LV" => "Latvia",
        "LB" => "Lebanon",
        "LS" => "Lesotho",
        "LR" => "Liberia",
        "LY" => "Libyan Arab Jamahiriya",
        "LI" => "Liechtenstein",
        "LT" => "Lithuania",
        "LU" => "Luxembourg",
        "MO" => "Macao",
        "MK" => "Macedonia, the Former Yugoslav Republic of",
        "MG" => "Madagascar",
        "MW" => "Malawi",
        "MY" => "Malaysia",
        "MV" => "Maldives",
        "ML" => "Mali",
        "MT" => "Malta",
        "MH" => "Marshall Islands",
        "MQ" => "Martinique",
        "MR" => "Mauritania",
        "MU" => "Mauritius",
        "YT" => "Mayotte",
        "MX" => "Mexico",
        "FM" => "Micronesia, Federated States of",
        "MD" => "Moldova, Republic of",
        "MC" => "Monaco",
        "MN" => "Mongolia",
        "ME" => "Montenegro",
        "MS" => "Montserrat",
        "MA" => "Morocco",
        "MZ" => "Mozambique",
        "MM" => "Myanmar",
        "NA" => "Namibia",
        "NR" => "Nauru",
        "NP" => "Nepal",
        "NL" => "Netherlands",
        "AN" => "Netherlands Antilles",
        "NC" => "New Caledonia",
        "NZ" => "New Zealand",
        "NI" => "Nicaragua",
        "NE" => "Niger",
        "NG" => "Nigeria",
        "NU" => "Niue",
        "NF" => "Norfolk Island",
        "MP" => "Northern Mariana Islands",
        "NO" => "Norway",
        "OM" => "Oman",
        "PK" => "Pakistan",
        "PW" => "Palau",
        "PS" => "Palestinian Territory, Occupied",
        "PA" => "Panama",
        "PG" => "Papua New Guinea",
        "PY" => "Paraguay",
        "PE" => "Peru",
        "PH" => "Philippines",
        "PN" => "Pitcairn",
        "PL" => "Poland",
        "PT" => "Portugal",
        "PR" => "Puerto Rico",
        "QA" => "Qatar",
        "RE" => "Reunion",
        "RO" => "Romania",
        "RU" => "Russian Federation",
        "RW" => "Rwanda",
        "BL" => "Saint Barthelemy",
        "SH" => "Saint Helena",
        "KN" => "Saint Kitts and Nevis",
        "LC" => "Saint Lucia",
        "MF" => "Saint Martin",
        "PM" => "Saint Pierre and Miquelon",
        "VC" => "Saint Vincent and the Grenadines",
        "WS" => "Samoa",
        "SM" => "San Marino",
        "ST" => "Sao Tome and Principe",
        "SA" => "Saudi Arabia",
        "SN" => "Senegal",
        "RS" => "Serbia",
        "CS" => "Serbia and Montenegro",
        "SC" => "Seychelles",
        "SL" => "Sierra Leone",
        "SG" => "Singapore",
        "SX" => "Sint Maarten",
        "SK" => "Slovakia",
        "SI" => "Slovenia",
        "SB" => "Solomon Islands",
        "SO" => "Somalia",
        "ZA" => "South Africa",
        "GS" => "South Georgia and the South Sandwich Islands",
        "SS" => "South Sudan",
        "ES" => "Spain",
        "LK" => "Sri Lanka",
        "SD" => "Sudan",
        "SR" => "Suriname",
        "SJ" => "Svalbard and Jan Mayen",
        "SZ" => "Swaziland",
        "SE" => "Sweden",
        "CH" => "Switzerland",
        "SY" => "Syrian Arab Republic",
        "TW" => "Taiwan, Province of China",
        "TJ" => "Tajikistan",
        "TZ" => "Tanzania, United Republic of",
        "TH" => "Thailand",
        "TL" => "Timor-Leste",
        "TG" => "Togo",
        "TK" => "Tokelau",
        "TO" => "Tonga",
        "TT" => "Trinidad and Tobago",
        "TN" => "Tunisia",
        "TR" => "Turkey",
        "TM" => "Turkmenistan",
        "TC" => "Turks and Caicos Islands",
        "TV" => "Tuvalu",
        "UG" => "Uganda",
        "UA" => "Ukraine",
        "AE" => "United Arab Emirates",
        "GB" => "United Kingdom",
        "US" => "United States",
        "UM" => "United States Minor Outlying Islands",
        "UY" => "Uruguay",
        "UZ" => "Uzbekistan",
        "VU" => "Vanuatu",
        "VE" => "Venezuela",
        "VN" => "Viet Nam",
        "VG" => "Virgin Islands, British",
        "VI" => "Virgin Islands, U.s.",
        "WF" => "Wallis and Futuna",
        "EH" => "Western Sahara",
        "YE" => "Yemen",
        "ZM" => "Zambia",
        "ZW" => "Zimbabwe"
    ];
    if (isset($country_list[$code])) {
        return $country_list[$code];
    }
    return $code;
}

