<?php

/* Text */

add_filter( 'of_sanitize_text', 'sanitize_text_field' );

/* Textarea */

function of_sanitize_textarea($input) {
	global $allowedposttags;
	$output = wp_kses( $input, $allowedposttags);
	return $output;
}

add_filter( 'of_sanitize_textarea', 'of_sanitize_textarea' );

/* Info */

add_filter( 'of_sanitize_info', 'of_sanitize_allowedposttags' );

/* Select */

add_filter( 'of_sanitize_select', 'of_sanitize_enum', 10, 2);

/* Radio */

add_filter( 'of_sanitize_radio', 'of_sanitize_enum', 10, 2);

/* Images */

add_filter( 'of_sanitize_images', 'of_sanitize_enum', 10, 2);

/* Checkbox */

function of_sanitize_checkbox( $input ) {
	if ( $input ) {
		$output = "1";
	} else {
		$output = "0";
	}
	return $output;
}
add_filter( 'of_sanitize_checkbox', 'of_sanitize_checkbox' );

/* Multicheck */

function of_sanitize_multicheck( $input, $option ) {
	$output = '';
	if ( is_array( $input ) ) {
		foreach( $option['options'] as $key => $value ) {
			$output[$key] = "0";
		}
		foreach( $input as $key => $value ) {
			if ( array_key_exists( $key, $option['options'] ) && $value ) {
				$output[$key] = "1"; 
			}
		}
	}
	return $output;
}
add_filter( 'of_sanitize_multicheck', 'of_sanitize_multicheck', 10, 2 );

/* Color Picker */

add_filter( 'of_sanitize_color', 'of_sanitize_hex' );

/* Uploader */

function of_sanitize_upload( $input ) {
	$output = '';
	$filetype = wp_check_filetype($input);
	if ( $filetype["ext"] ) {
		$output = $input;
	}
	return $output;
}
add_filter( 'of_sanitize_upload', 'of_sanitize_upload' );

/* Allowed Tags */

function of_sanitize_allowedtags($input) {
	global $allowedtags;
	$output = wpautop(wp_kses( $input, $allowedtags));
	return $output;
}

add_filter( 'of_sanitize_info', 'of_sanitize_allowedtags' );

/* Allowed Post Tags */

function of_sanitize_allowedposttags($input) {
	global $allowedposttags;
	$output = wpautop(wp_kses( $input, $allowedposttags));
	return $output;
}

add_filter( 'of_sanitize_info', 'of_sanitize_allowedposttags' );


/* Check that the key value sent is valid */

function of_sanitize_enum( $input, $option ) {
	$output = '';
	if ( array_key_exists( $input, $option['options'] ) ) {
		$output = $input;
	}
	return $output;
}

/* Background */

function of_sanitize_background( $input ) {
	$output = wp_parse_args( $input, array(
		'color' => '',
		'image'  => '',
		'repeat'  => 'repeat',
		'position' => 'top center',
		'attachment' => 'scroll'
	) );

	$output['color'] = apply_filters( 'of_sanitize_hex', $input['color'] );
	$output['image'] = apply_filters( 'of_sanitize_upload', $input['image'] );
	$output['repeat'] = apply_filters( 'of_background_repeat', $input['repeat'] );
	$output['position'] = apply_filters( 'of_background_position', $input['position'] );
	$output['attachment'] = apply_filters( 'of_background_attachment', $input['attachment'] );

	return $output;
}
add_filter( 'of_sanitize_background', 'of_sanitize_background' );

function of_sanitize_background_repeat( $value ) {
	$recognized = of_recognized_background_repeat();
	if ( array_key_exists( $value, $recognized ) ) {
		return $value;
	}
	return apply_filters( 'of_default_background_repeat', current( $recognized ) );
}
add_filter( 'of_background_repeat', 'of_sanitize_background_repeat' );

function of_sanitize_background_position( $value ) {
	$recognized = of_recognized_background_position();
	if ( array_key_exists( $value, $recognized ) ) {
		return $value;
	}
	return apply_filters( 'of_default_background_position', current( $recognized ) );
}
add_filter( 'of_background_position', 'of_sanitize_background_position' );

function of_sanitize_background_attachment( $value ) {
	$recognized = of_recognized_background_attachment();
	if ( array_key_exists( $value, $recognized ) ) {
		return $value;
	}
	return apply_filters( 'of_default_background_attachment', current( $recognized ) );
}
add_filter( 'of_background_attachment', 'of_sanitize_background_attachment' );


/* Typography */

function of_sanitize_typography( $input ) {
	$output = wp_parse_args( $input, array(
		'size'  => '',
		'face'  => '',
		'style' => '',
		'color' => ''
	) );

	$output['size']  = apply_filters( 'of_font_size', $output['size'] );
	$output['face']  = apply_filters( 'of_font_face', $output['face'] );
	$output['style'] = apply_filters( 'of_font_style', $output['style'] );
	$output['color'] = apply_filters( 'of_color', $output['color'] );

	return $output;
}
add_filter( 'of_sanitize_typography', 'of_sanitize_typography' );


function of_sanitize_font_size( $value ) {
	$recognized = of_recognized_font_sizes();
	$value = preg_replace('/px/','', $value);
	if ( in_array( (int) $value, $recognized ) ) {
		return (int) $value;
	}
	return (int) apply_filters( 'of_default_font_size', $recognized );
}
add_filter( 'of_font_face', 'of_sanitize_font_face' );


function of_sanitize_font_style( $value ) {
	$recognized = of_recognized_font_styles();
	if ( array_key_exists( $value, $recognized ) ) {
		return $value;
	}
	return apply_filters( 'of_default_font_style', current( $recognized ) );
}
add_filter( 'of_font_style', 'of_sanitize_font_style' );


function of_sanitize_font_face( $value ) {
	$recognized = of_recognized_font_faces();
	if ( array_key_exists( $value, $recognized ) ) {
		return $value;
	}
	return apply_filters( 'of_default_font_face', current( $recognized ) );
}
add_filter( 'of_font_face', 'of_sanitize_font_face' );

/**
 * Get recognized background repeat settings
 *
 * @return   array
 *
 */
function of_recognized_background_repeat() {
	$default = array(
		'no-repeat' => 'No Repeat',
		'repeat-x'  => 'Repeat Horizontally',
		'repeat-y'  => 'Repeat Vertically',
		'repeat'    => 'Repeat All',
		);
	return apply_filters( 'of_recognized_background_repeat', $default );
}

/**
 * Get recognized background positions
 *
 * @return   array
 *
 */
function of_recognized_background_position() {
	$default = array(
		'top left'      => 'Top Left',
		'top center'    => 'Top Center',
		'top right'     => 'Top Right',
		'center left'   => 'Middle Left',
		'center center' => 'Middle Center',
		'center right'  => 'Middle Right',
		'bottom left'   => 'Bottom Left',
		'bottom center' => 'Bottom Center',
		'bottom right'  => 'Bottom Right'
		);
	return apply_filters( 'of_recognized_background_position', $default );
}

/**
 * Get recognized background attachment
 *
 * @return   array
 *
 */
function of_recognized_background_attachment() {
	$default = array(
		'scroll' => 'Scroll Normally',
		'fixed'  => 'Fixed in Place'
		);
	return apply_filters( 'of_recognized_background_attachment', $default );
}

/**
 * Sanitize a color represented in hexidecimal notation.
 *
 * @param    string    Color in hexidecimal notation. "#" may or may not be prepended to the string.
 * @param    string    The value that this function should return if it cannot be recognized as a color.
 * @return   string
 *
 */
 
function of_sanitize_hex( $hex, $default = '' ) {
	if ( of_validate_hex( $hex ) ) {
		return $hex;
	}
	return $default;
}

/**
 * Get recognized font sizes.
 *
 * Returns an indexed array of all recognized font sizes.
 * Values are integers and represent a range of sizes from
 * smallest to largest.
 *
 * @return   array
 */
 
function of_recognized_font_sizes() {
	$sizes = range( 9, 71 );
	$sizes = apply_filters( 'of_recognized_font_sizes', $sizes );
	$sizes = array_map( 'absint', $sizes );
	return $sizes;
}

 
//function of_recognized_font_faces() {
//$fonts = file_get_contents(dirname( __FILE__ ) . '/g_ff.php');
//$arg = unserialize($fonts);
//foreach($arg as $font)
//{
//    $default[$font['css-name']] = $font['font-name'];
//}
//	return apply_filters( 'of_recognized_font_faces', $default );
//}


//Google Font Files
function of_recognized_font_faces() {
	$default = array(

			"Abel"=>"Abel",
			"Abril+Fatface"=>"Abril Fatface",
			"Aclonica"=>"Aclonica",
			"Acme"=>"Acme",
			"Actor"=>"Actor",
			"Adamina"=>"Adamina",
			"Advent+Pro"=>"Advent Pro",
			"Aguafina+Script"=>"Aguafina Script",
			"Aladin"=>"Aladin",
			"Aldrich"=>"Aldrich",
			"Alex+Brush"=>"Alex Brush",
			"Alfa+Slab+One"=>"Alfa Slab One",
			"Alice"=>"Alice",
			"Alike+Angular"=>"Alike Angular",
			"Alike"=>"Alike",
			"Allan"=>"Allan",
			"Allerta+Stencil"=>"Allerta Stencil",
			"Allerta"=>"Allerta",
			"Allura"=>"Allura",
			"Almendra+SC"=>"Almendra SC",
			"Almendra"=>"Almendra",
			"Amaranth"=>"Amaranth",
			"Amatic SC"=>"Amatic SC",
			"Amethysta"=>"Amethysta",
			"Andada"=>"Andada",
			"Andika"=>"Andika",
			"Annie+Use+Your+Telescope"=>"Annie Use Your Telescope",
			"Anonymous+Pro"=>"Anonymous Pro",
			"Antic+Didone"=>"Antic Didone",
			"Antic+Slab"=>"Antic Slab",
			"Antic"=>"Antic",
			"Anton"=>"Anton",
			"Arapey"=>"Arapey",
			"Arbutus"=>"Arbutus",
			"Architects+Daughter"=>"Architects Daughter",
			"Arimo"=>"Arimo",
			"Arizonia"=>"Arizonia",
			"Armata"=>"Armata",
			"Artifika"=>"Artifika",
			"Arvo"=>"Arvo",
			"Asap"=>"Asap",
			"Asset"=>"Asset",
			"Astloch"=>"Astloch",
			"Asul"=>"Asul",
			"Atomic+Age"=>"Atomic Age",
			"Aubrey"=>"Aubrey",
			"Average"=>"Average",
			"Averia+Gruesa+Libre"=>"Averia Gruesa Libre",
			"Averia+Libre"=>"Averia Libre",
			"Averia+Sans+Libre"=>"Averia Sans Libre",
			"Averia+Serif+Libre"=>"Averia Serif Libre", 
			"Bad+Script"=>"Bad Script",
			"Balthazar"=>"Balthazar",
			"Bangers"=>"Bangers",
			"Basic"=>"Basic",
			"Baumans"=>"Baumans",
			"Belgrano"=>"Belgrano",
			"Bentham"=>"Bentham",
			"Berkshire+Swash"=>"Berkshire Swash",
			"Bevan"=>"Bevan",
			"Bigshot+One"=>"Bigshot One",
			"Bilbo+Swash+Caps"=>"Bilbo Swash Caps",
			"Bilbo"=>"Bilbo",
			"Bitter"=>"Bitter",
			"Black+Ops+One"=>"Black Ops One",
			"Bonbon"=>"Bonbon",
			"Boogaloo"=>"Boogaloo",
			"Bowlby+One+SC"=>"Bowlby One SC",
			"Bowlby+One"=>"Bowlby One",
			"Brawler"=>"Brawler",
			"Bree+Serif"=>"Bree Serif",
			"Bubblegum+Sans"=>"Bubblegum Sans",
			"Buda"=>"Buda",
			"Buenard"=>"Buenard",
			"Butcherman"=>"Butcherman",
			"Butterfly+Kids"=>"Butterfly Kids",
			"Cabin+Condensed"=>"Cabin Condensed",
			"Cabin+Sketch"=>"Cabin Sketch",
			"Cabin"=>"Cabin",
			"Caesar+Dressing"=>"Caesar Dressing",
			"Cagliostro"=>"Cagliostro",
			"Calligraffitti"=>"Calligraffitti",
			"Cambo"=>"Cambo",
			"Candal"=>"Candal",
			"Cantarell"=>"Cantarell",
			"Cantata+One"=>"Cantata One",
			"Cardo"=>"Cardo",
			"Carme"=>"Carme",
			"Carter+One"=>"Carter One",
			"Caudex"=>"Caudex",
			"Cedarville+Cursive"=>"Cedarville Cursive",
			"Ceviche+One"=>"Ceviche One",
			"Changa+One"=>"Changa One",
			"Chango"=>"Chango",
			"Chelsea+Market"=>"Chelsea Market",
			"Cherry+Cream+Soda"=>"Cherry Cream Soda",
			"Chewy"=>"Chewy",
			"Chicle"=>"Chicle",
			"Chivo"=>"Chivo",
			"Coda"=>"Coda",
			"Codystar"=>"Codystar",
			"Comfortaa"=>"Comfortaa",
			"Coming+Soon"=>"Coming Soon",
			"Concert+One"=>"Concert One",
			"Condiment"=>"Condiment",
			"Contrail+One"=>"Contrail One",
			"Convergence"=>"Convergence",
			"Cookie"=>"Cookie",
			"Copse"=>"Copse",
			"Corben"=>"Corben",
			"Corben:bold"=>"Corben Bold",
			"Cousine"=>"Cousine",
			"Coustard"=>"Coustard",
			"Covered+By+Your+Grace"=>"Covered By Your Grace",
			"Crafty+Girls"=>"Crafty Girls",
			"Creepster"=>"Creepster",
			"Crete+Round"=>"Crete Round",
			"Crimson+Text"=>"Crimson Text",
			"Crushed"=>"Crushed",
			"Cuprum"=>"Cuprum",
			"Cutive"=>"Cutive",
			"Damion"=>"Damion",
			"Dancing+Script"=>"Dancing Script",
			"Dawning+of+a+New+Day"=>"Dawning of a New Day",
			"Days+One"=>"Days One",
			"Delius+Swash+Caps"=>"Delius Swash Caps",
			"Delius+Unicase"=>"Delius Unicase",
			"Delius"=>"Delius",
			"Devonshire"=>"Devonshire",
			"Didact+Gothic"=>"Didact Gothic",
			"Diplomata+SC"=>"Diplomata SC",
			"Diplomata"=>"Diplomata",
			"Doppio+One"=>"Doppio One",
			"Dorsa"=>"Dorsa",
			"Dr+Sugiyama"=>"Dr Sugiyama",
			"Droid+Sans+Mono"=>"Droid Sans Mono",
			"Droid+Sans"=>"Droid Sans",
			"Droid+Serif"=>"Droid Serif",
			"Duru+Sans"=>"Duru Sans",
			"Dynalight"=>"Dynalight",
			"EB+Garamond"=>"EB Garamond",
			"Eater"=>"Eater",
			"Economica"=>"Economica",
			"Electrolize"=>"Electrolize",
			"Emblema+One"=>"Emblema One",
			"Emilys+Candy"=>"Emilys Candy",
			"Engagement"=>"Engagement",
			"Enriqueta"=>"Enriqueta",
			"Erica+One"=>"Erica One",
			"Esteban"=>"Esteban",
			"Euphoria+Script"=>"Euphoria Script",
			"Ewert"=>"Ewert",
			"Exo"=>"Exo",
			"Expletus+Sans"=>"Expletus Sans",
			"Fanwood+Text"=>"Fanwood Text",
			"Fascinate+Inline"=>"Fascinate Inline",
			"Fascinate"=>"Fascinate",
			"Federant"=>"Federant",
			"Federo"=>"Federo",
			"Felipa"=>"Felipa",
			"Fjord+One"=>"Fjord One",
			"Flamenco"=>"Flamenco",
			"Flavors"=>"Flavors",
			"Fondamento"=>"Fondamento",
			"Fontdiner+Swanky"=>"Fontdiner Swanky",
			"Forum"=>"Forum",
			"Francois+One"=>"Francois One",
			"Fredoka+One"=>"Fredoka One",
			"Fresca"=>"Fresca",
			"Frijole"=>"Frijole",
			"Fugaz+One"=>"Fugaz One",
			"Galdeano"=>"Galdeano",
			"Gentium+Basic"=>"Gentium Basic",
			"Gentium+Book+Basic"=>"Gentium Book Basic",
			"Geo"=>"Geo",
			"Geostar+Fill"=>"Geostar Fill",
			"Geostar"=>"Geostar",
			"Germania+One"=>"Germania One",
			"Give+You+Glory"=>"Give You Glory",
			"Glass+Antiqua"=>"Glass Antiqua",
			"Glegoo"=>"Glegoo",
			"Gloria+Hallelujah"=>"Gloria Hallelujah",
			"Goblin+One"=>"Goblin One",
			"Gochi+Hand"=>"Gochi Hand",
			"Gorditas"=>"Gorditas",
			"Goudy+Bookletter+1911"=>"Goudy Bookletter 1911",
			"Graduate"=>"Graduate",
			"Gravitas+One"=>"Gravitas One",
			"Gruppo"=>"Gruppo",
			"Gudea"=>"Gudea",
			"Habibi"=>"Habibi",
			"Hammersmith+One"=>"Hammersmith One",
			"Handlee"=>"Handlee",
			"Happy+Monkey"=>"Happy Monkey",
			"Henny+Penny"=>"Henny Penny",
			"Herr+Von+Muellerhoff"=>"Herr Von Muellerhoff",
			"Holtwood+One+SC"=>"Holtwood One SC",
			"Homemade+Apple"=>"Homemade Apple",
			"Homenaje"=>"Homenaje",
			"IM+Fell+DW+Pica SC"=>"IM Fell DW Pica SC",
			"IM=Fell+DW+Pica"=>"IM Fell DW Pica",
			"IM+Fell+Double+Pica+SC"=>"IM Fell Double Pica SC",
			"IM+Fell+Double+Pica"=>"IM Fell Double Pica",
			"IM+Fell+English+SC"=>"IM Fell English SC",
			"IM+Fell+English"=>"IM Fell English",
			"IM+Fell+French+Canon+SC"=>"IM Fell French Canon SC",
			"IM+Fell+French+Canon"=>"IM Fell French Canon",
			"IM+Fell+Great+Primer+SC"=>"IM Fell Great Primer SC",
			"IM+Fell+Great+Primer"=>"IM Fell Great Primer",
			"Iceberg"=>"Iceberg",
			"Iceland"=>"Iceland",
			"Imprima"=>"Imprima",
			"Inconsolata"=>"Inconsolata",
			"Inder"=>"Inder",
			"Indie+Flower"=>"Indie Flower",
			"Inika"=>"Inika",
			"Irish+Grover"=>"Irish Grover",
			"Irish+Growler"=>"Irish Growler",
			"Istok+Web"=>"Istok Web",
			"Italiana"=>"Italiana",
			"Italianno"=>"Italianno",
			"Jim+Nightshade"=>"Jim Nightshade",
			"Jockey+One"=>"Jockey One",
			"Jolly+Lodger"=>"Jolly Lodger",
			"Josefin+Sans"=>"Josefin Sans",
			"Josefin+Slab"=>"Josefin Slab",
			"Judson"=>"Judson",
			"Julee"=>"Julee",
			"Junge"=>"Junge",
			"Jura"=>" Jura",
			"Just+Another+Hand"=>"Just Another Hand",
			"Just+Me+Again+Down+Here"=>"Just Me Again Down Here",
			"Kameron"=>"Kameron",
			"Karla"=>"Karla",
			"Kaushan+Script"=>"Kaushan Script",
			"Kelly+Slab"=>"Kelly Slab",
			"Kenia"=>"Kenia",
			"Knewave"=>"Knewave",
			"Kotta+One"=>"Kotta One",
			"Kranky"=>"Kranky",
			"Kreon"=>"Kreon",
			"Kristi"=>"Kristi",
			"Krona+One"=>"Krona One",
			"La+Belle+Aurore"=>"La Belle Aurore",
			"Lancelot"=>"Lancelot",
			"Lato"=>"Lato",
			"League+Script"=>"League Script",
			"Leckerli+One"=>"Leckerli One",
			"Ledger"=>"Ledger",
			"Lekton"=>" Lekton",
			"Lemon"=>"Lemon",
			"Lilita+One"=>"Lilita One",
			"Limelight"=>" Limelight",
			"Linden+Hill"=>"Linden Hill",
			"Lobster+Two"=>"Lobster Two",
			"Lobster"=>"Lobster",
			"Londrina+Outline"=>"Londrina Outline",
			"Londrina+Shadow"=>"Londrina Shadow",
			"Londrina+Sketch"=>"Londrina Sketch",
			"Londrina+Solid"=>"Londrina Solid",
			"Lora"=>"Lora",
			"Love+Ya+Like+A+Sister"=>"Love Ya Like A Sister",
			"Loved+by+the+King"=>"Loved by the King",
			"Luckiest+Guy"=>"Luckiest Guy",
			"Lusitana"=>"Lusitana",
			"Lustria"=>"Lustria",
			"Macondo+Swash+Caps"=>"Macondo Swash Caps",
			"Macondo"=>"Macondo",
			"Magra"=>"Magra",
			"Maiden Orange"=>"Maiden Orange",
			"Mako"=>"Mako",
			"Marck+Script"=>"Marck Script",
			"Marko+One"=>"Marko One",
			"Marmelad"=>"Marmelad",
			"Marvel"=>"Marvel",
			"Mate+SC"=>"Mate SC",
			"Mate"=>"Mate",
			"Maven+Pro"=>" Maven Pro",
			"Meddon"=>"Meddon",
			"MedievalSharp"=>"MedievalSharp",
			"Medula+One"=>"Medula One",
			"Megrim"=>"Megrim",
			"Merienda+One"=>"Merienda One",
			"Merriweather"=>"Merriweather",
			"Metamorphous"=>"Metamorphous",
			"Metrophobic"=>"Metrophobic",
			"Michroma"=>"Michroma",
			"Miltonian+Tattoo"=>"Miltonian Tattoo",
			"Miltonian"=>"Miltonian",
			"Miniver"=>"Miniver",
			"Miss+Fajardose"=>"Miss Fajardose",
			"Miss+Saint+Delafield"=>"Miss Saint Delafield",
			"Modern+Antiqua"=>"Modern Antiqua",
			"Molengo"=>"Molengo",
			"Monofett"=>"Monofett",
			"Monoton"=>"Monoton",
			"Monsieur+La+Doulaise"=>"Monsieur La Doulaise",
			"Montaga"=>"Montaga",
			"Montez"=>"Montez",
			"Montserrat"=>"Montserrat",
			"Mountains+of+Christmas"=>"Mountains of Christmas",
			"Mr+Bedford"=>"Mr Bedford",
			"Mr+Dafoe"=>"Mr Dafoe",
			"Mr+De+Haviland"=>"Mr De Haviland",
			"Mrs+Saint+Delafield"=>"Mrs Saint Delafield",
			"Mrs+Sheppards"=>"Mrs Sheppards",
			"Muli"=>"Muli",
			"Mystery Quest"=>"Mystery Quest",
			"Neucha"=>"Neucha",
			"Neuton"=>"Neuton",
			"News+Cycle"=>"News Cycle",
			"Niconne"=>"Niconne",
			"Nixie+One"=>"Nixie One",
			"Nobile"=>"Nobile",
			"Nokora"=>"Nokora",
			"Norican"=>"Norican",
			"Nosifer"=>"Nosifer",
			"Noticia Text"=>"Noticia Text",
			"Nova+Cut"=>"Nova Cut",
			"Nova+Flat"=>"Nova Flat",
			"Nova+Mono"=>"Nova Mono",
			"Nova+Oval"=>"Nova Oval",
			"Nova+Round"=>"Nova Round",
			"Nova+Script"=>"Nova Script",
			"Nova+Slim"=>"Nova Slim",
			"Nova+Square"=>"Nova Square",
			"Numans"=>"Numans",
			"Nunito"=>" Nunito",
			"OFL+Sorts+Mill+Goudy+TT"=>"OFL Sorts Mill Goudy TT",
			"Old+Standard+TT"=>"Old Standard TT",
			"Oldenburg"=>"Oldenburg",
			"Open+Sans+Condensed"=>"Open Sans Condensed",
			"Open+Sans"=>"Open Sans",
			"Orbitron"=>"Orbitron",
			"Original+Surfer"=>"Original Surfer",
			"Oswald"=>"Oswald",
			"Over+the+Rainbow"=>"Over the Rainbow",
			"Overlock+SC"=>"Overlock SC",
			"Overlock"=>"Overlock",
			"Ovo"=>"Ovo",
			"PT+Mono"=>"PT Mono",
			"PT+Sans Caption"=>"PT Sans Caption",
			"PT+Sans Narrow"=>"PT Sans Narrow",
			"PT+Sans"=>"PT Sans",
			"PT+Serif Caption"=>"PT Serif Caption",
			"PT+Serif"=>"PT Serif",
			"Pacifico"=>"Pacifico",
			"Parisienne"=>"Parisienne",
			"Passero+One"=>"Passero One",
			"Passion+One"=>"Passion One",
			"Patrick+Hand"=>"Patrick Hand",
			"Patua+One"=>"Patua One",
			"Paytone+One"=>"Paytone One",
			"Permanent+Marker"=>"Permanent Marker",
			"Petrona"=>"Petrona",
			"Philosopher"=>"Philosopher",
			"Piedra"=>"Piedra",
			"Pinyon+Script"=>"Pinyon Script",
			"Plaster"=>"Plaster",
			"Play"=>"Play",
			"Playball"=>"Playball",
			"Playfair+Display"=>" Playfair Display",
			"Podkova"=>" Podkova",
			"Poiret+One"=>"Poiret One",
			"Poller+One"=>"Poller One",
			"Poly"=>"Poly",
			"Pompiere"=>"Pompiere",
			"Pontano+Sans"=>"Pontano Sans",
			"Port+Lligat+Sans"=>"Port Lligat Sans",
			"Port+Lligat+Slab"=>"Port Lligat Slab",
			"Prata"=>"Prata",
			"Princess+Sofia"=>"Princess Sofia",
			"Prociono"=>"Prociono",
			"Prosto+One"=>"Prosto One",
			"Puritan"=>"Puritan",
			"Quantico"=>"Quantico",
			"Quattrocento+Sans"=>"Quattrocento Sans",
			"Quattrocento"=>"Quattrocento",
			"Questrial"=>"Questrial",
			"Quicksand"=>"Quicksand",
			"Qwigley"=>"Qwigley",
			"Radley"=>"Radley",
			"Raleway"=>"Raleway",
			"Rammetto+One"=>"Rammetto One",
			"Rancho"=>"Rancho",
			"Rationale"=>"Rationale",
			"Redressed"=>"Redressed",
			"Reenie+Beanie"=>"Reenie Beanie",
			"Revalia"=>"Revalia",
			"Ribeye+Marrow"=>"Ribeye Marrow",
			"Ribeye"=>"Ribeye",
			"Righteous"=>"Righteous",
			"Rochester"=>"Rochester",
			"Rock+Salt"=>"Rock Salt",
			"Rokkitt"=>"Rokkitt",
			"Ropa+Sans"=>"Ropa Sans",
			"Rosario"=>"Rosario",
			"Rouge Script"=>"Rouge Script",
			"Ruda"=>"Ruda",
			"Ruge+Boogie"=>"Ruge Boogie",
			"Ruluko"=>"Ruluko",
			"Ruslan+Display"=>"Ruslan Display",
			"Ruthie"=>"Ruthie",
			"Sail"=>"Sail",
			"Salsa"=>"Salsa",
			"Sancreek"=>"Sancreek",
			"Sansita+One"=>"Sansita One",
			"Sarina"=>"Sarina",
			"Satisfy"=>"Satisfy",
			"Schoolbell"=>"Schoolbell",
			"Seaweed+Script"=>"Seaweed Script",
			"Sevillana"=>"Sevillana",
			"Shadows+Into+Light+Two"=>"Shadows Into Light Two",
			"Shadows+Into+Light"=>"Shadows Into Light",
			"Shanti"=>"Shanti",
			"Share"=>"Share",
			"Shojumaru"=>"Shojumaru",
			"Short+Stack"=>"Short Stack",
			"Sigmar+One"=>"Sigmar One",
			"Signika+Negative"=>"Signika Negative",
			"Signika"=>"Signika",
			"Simonetta"=>"Simonetta",
			"Sirin+Stencil"=>"Sirin Stencil",
			"Six+Caps"=>"Six Caps",
			"Slackey"=>"Slackey",
			"Smokum"=>"Smokum",
			"Smythe"=>"Smythe",
			"Sniglet"=>"Sniglet",
			"Snippet"=>"Snippet",
			"Sofia"=>"Sofia",
			"Sonsie+One"=>"Sonsie One",
			"Sorts+Mill+Goudy"=>"Sorts Mill Goudy",
			"Special+Elite"=>"Special Elite",
			"Spicy+Rice"=>"Spicy Rice",
			"Spinnaker"=>"Spinnaker",
			"Spirax"=>"Spirax",
			"Squada+One"=>"Squada One",
			"Stardos+Stencil"=>"Stardos Stencil",
			"Stint+Ultra+Condensed"=>"Stint Ultra Condensed",
			"Stint+Ultra+Expanded"=>"Stint Ultra Expanded",
			"Stoke"=>"Stoke",
			"Sue+Ellen+Francisco"=>"Sue Ellen Francisco",
			"Sunshiney"=>"Sunshiney",
			"Supermercado+One"=>"Supermercado One",
			"Swanky+and+Moo+Moo"=>"Swanky and Moo Moo",
			"Syncopate"=>"Syncopate",
			"Tangerine"=>"Tangerine",
			"Telex"=>"Telex",
			"Tenor+Sans"=>" Tenor Sans",
			"Terminal+Dosis+Light"=>"Terminal Dosis Light",
			"Terminal+Dosis"=>"Terminal Dosis Regular",
			"The+Girl+Next+Door"=>"The Girl Next Door",
			"Tinos"=>"Tinos",
			"Titan+One"=>"Titan One",
			"Trade+Winds"=>"Trade Winds",
			"Trochut"=>"Trochut",
			"Trykker"=>"Trykker",
			"Tulpen+One"=>"Tulpen One",
			"Ubuntu+Condensed"=>"Ubuntu Condensed",
			"Ubuntu+Mono"=>"Ubuntu Mono",
			"Ubuntu"=>"Ubuntu",
			"Ultra"=>"Ultra",
			"Uncial+Antiqua"=>"Uncial Antiqua",
			"UnifrakturCook"=>"UnifrakturCook",
			"UnifrakturMaguntia"=>"UnifrakturMaguntia",
			"Unkempt"=>"Unkempt",
			"Unlock"=>"Unlock",
			"Unna"=>"Unna",
			"VT323"=>"VT323",
			"Varela+Round"=>"Varela Round",
			"Varela"=>"Varela",
			"Vast+Shadow"=>"Vast Shadow",
			"Vibur"=>"Vibur",
			"Vidaloka"=>"Vidaloka",
			"Viga"=>"Viga",
			"Voces"=>"Voces",
			"Volkhov"=>"Volkhov",
			"Vollkorn"=>"Vollkorn",
			"Voltaire"=>"Voltaire",
			"Waiting+for+the+Sunrise"=>"Waiting for the Sunrise",
			"Wallpoet"=>"Wallpoet",
			"Walter+Turncoat"=>"Walter Turncoat",
			"Wellfleet"=>"Wellfleet",
			"Wire+One"=>"Wire One",
			"Yanone+Kaffeesatz"=>"Yanone Kaffeesatz",
			"Yellowtail"=>"Yellowtail",
			"Yeseva+One"=>"Yeseva One",
			"Yesteryear"=>"Yesteryear",
			"Zeyada"=>"Zeyada"
		);


	return apply_filters( 'of_recognized_font_faces', $default );
}
/**
 * Get recognized font styles.
 *
 * Returns an array of all recognized font styles.
 * Keys are intended to be stored in the database
 * while values are ready for display in in html.
 *
 * @return   array
 *
 */
 
function of_recognized_font_styles() {
	$default = array(
		'300'      => '300',
		'400'      => '400',
		'700'        => '700'//,
		//'bold italic' => 'Bold Italic'
		);
	return apply_filters( 'of_recognized_font_styles', $default );
}
		

/**
 * Is a given string a color formatted in hexidecimal notation?
 *
 * @param    string    Color in hexidecimal notation. "#" may or may not be prepended to the string.
 * @return   bool
 *
 */
 
function of_validate_hex( $hex ) {
	$hex = trim( $hex );
	/* Strip recognized prefixes. */
	if ( 0 === strpos( $hex, '#' ) ) {
		$hex = substr( $hex, 1 );
	}
	elseif ( 0 === strpos( $hex, '%23' ) ) {
		$hex = substr( $hex, 3 );
	}
	/* Regex match. */
	if ( 0 === preg_match( '/^[0-9a-fA-F]{6}$/', $hex ) ) {
		return false;
	}
	else {
		return true;
	}
}