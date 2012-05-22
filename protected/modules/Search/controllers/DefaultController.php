<?php

/**
 * 
 * Functions are under this (c) and licesnse
 *      extrac_css_urls
 *      extrac_html_urls
 *      get_web_page
 *      strip_html_tags
 *      strip_numbers
 *      strip_punctuation
 *      strip_symbols
 * 
 * Copyright (c) 2008, David R. Nadeau, NadeauSoftware.com.
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions
 * are met:
 *
 *	* Redistributions of source code must retain the above copyright
 *	  notice, this list of conditions and the following disclaimer.
 *
 *	* Redistributions in binary form must reproduce the above
 *	  copyright notice, this list of conditions and the following
 *	  disclaimer in the documentation and/or other materials provided
 *	  with the distribution.
 *
 *	* Neither the names of David R. Nadeau or NadeauSoftware.com, nor
 *	  the names of its contributors may be used to endorse or promote
 *	  products derived from this software without specific prior
 *	  written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS
 * FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE
 * COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT,
 * INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING,
 * BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
 * LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER
 * CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT
 * LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY
 * WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY
 * OF SUCH DAMAGE.
 */

/*
 * This is a BSD License approved by the Open Source Initiative (OSI).
 * See:  http://www.opensource.org/licenses/bsd-license.php
 */


class DefaultController extends Controller {

	const PAGE_SIZE=10;
	
	public $stopWordsEng = array("a", "about", "above", "above", "across", "after", "afterwards", "again", "against", "all", "almost", "alone", "along", "already", "also","although","always","am","among", "amongst", "amoungst", "amount", "an", "and", "another", "any","anyhow","anyone","anything","anyway", "anywhere", "are", "around", "as", "at", "back","be","became", "because","become","becomes", "becoming", "been", "before", "beforehand", "behind", "being", "below", "beside", "besides", "between", "beyond", "bill", "both", "bottom","but", "by", "call", "can", "cannot", "cant", "co", "con", "could", "couldnt", "cry", "de", "describe", "detail", "do", "done", "down", "due", "during", "each", "eg", "eight", "either", "eleven","else", "elsewhere", "empty", "enough", "etc", "even", "ever", "every", "everyone", "everything", "everywhere", "except", "few", "fifteen", "fify", "fill", "find", "fire", "first", "five", "for", "former", "formerly", "forty", "found", "four", "from", "front", "full", "further", "get", "give", "go", "had", "has", "hasnt", "have", "he", "hence", "her", "here", "hereafter", "hereby", "herein", "hereupon", "hers", "herself", "him", "himself", "his", "how", "however", "hundred", "ie", "if", "in", "inc", "indeed", "interest", "into", "is", "it", "its", "itself", "keep", "last", "latter", "latterly", "least", "less", "ltd", "made", "many", "may", "me", "meanwhile", "might", "mill", "mine", "more", "moreover", "most", "mostly", "move", "much", "must", "my", "myself", "name", "namely", "neither", "never", "nevertheless", "next", "nine", "no", "nobody", "none", "noone", "nor", "not", "nothing", "now", "nowhere", "of", "off", "often", "on", "once", "one", "only", "onto", "or", "other", "others", "otherwise", "our", "ours", "ourselves", "out", "over", "own","part", "per", "perhaps", "please", "put", "rather", "re", "same", "see", "seem", "seemed", "seeming", "seems", "serious", "several", "she", "should", "show", "side", "since", "sincere", "six", "sixty", "so", "some", "somehow", "someone", "something", "sometime", "sometimes", "somewhere", "still", "such", "system", "take", "ten", "than", "that", "the", "their", "them", "themselves", "then", "thence", "there", "thereafter", "thereby", "therefore", "therein", "thereupon", "these", "they", "thickv", "thin", "third", "this", "those", "though", "three", "through", "throughout", "thru", "thus", "to", "together", "too", "top", "toward", "towards", "twelve", "twenty", "two", "un", "under", "until", "up", "upon", "us", "very", "via", "was", "we", "well", "were", "what", "whatever", "when", "whence", "whenever", "where", "whereafter", "whereas", "whereby", "wherein", "whereupon", "wherever", "whether", "which", "while", "whither", "who", "whoever", "whole", "whom", "whose", "why", "will", "with", "within", "without", "would", "yet", "you", "your", "yours", "yourself", "yourselves", "the");
 public $stopWords = array(
"a",
"b",
"c",
"d",
"e",
"f",
"g",
"h",
"i",
"j",
"k",
"l",
"m",
"n",
"ñ",
"o",
"p",
"q",
"r",
"s",
"t",
"u",
"v",
"w",
"x",
"y",
"z",
"el",
"la",
"los",
"les",
"las",
"de",
"del",
"a",
"ante",
"con",
"en",
"para",
"por",
"y",
"o",
"u",
"tu",
"te",
"ti",
"le",
"que",
"al",
"ha",
"un",
"han",
"lo",
"su",
"una",
"estas",
"esto",
"este",
"es",
"tras",
"a",
"acá",
"ahí",
"al",
"algo",
"algún",
"alguna",
"algunas",
"alguno",
"algunos",
"allá",
"alli",
"allí",
"antes",
"aquel",
"aquella",
"aquellas",
"aquello",
"aquellos",
"aqui",
"aquí",
"asi",
"atras",
"aun",
"aunque",
"bajo",
"bastante",
"bien",
"cabe",
"cada",
"casi",
"cierta",
"ciertas",
"cierto",
"ciertos",
"como",
"cómo",
"con",
"conmigo",
"conseguimos",
"conseguir",
"consigo",
"consigue",
"consiguen",
"consigues",
"contigo",
"contra",
"cual",
"cuales",
"cualquier",
"cualquiera",
"cualquieras",
"cuando",
"cuanta",
"cuánta",
"cuantas",
"cuántas",
"cuanto",
"cuánto",
"cuantos",
"cuántos",
"de",
"dejar",
"del",
"demás",
"demas",
"demasiada",
"demasiadas",
"demasiado",
"demasiados",
"dentro",
"desde",
"donde",
"dos",
"el",
"él",
"ella",
"ellas",
"ello",
"ellos",
"en",
"encima",
"entonces",
"entre",
"era",
"eramos",
"eran",
"eras",
"eres",
"es",
"esa",
"esas",
"ese",
"eso",
"esos",
"esta",
"estaba",
"estado",
"estais",
"estamos",
"estan",
"estar",
"estas",
"este",
"esto",
"estos",
"estoy",
"etc",
"fin",
"fue",
"fueron",
"fui",
"fuimos",
"gueno",
"ha",
"hace",
"haceis",
"hacemos",
"hacen",
"hacer",
"haces",
"hacia",
"hago",
"hasta",
"incluso",
"intenta",
"intentais",
"intentamos",
"intentan",
"intentar",
"intentas",
"intento",
"ir",
"jamás",
"junto",
"juntos",
"la",
"largo",
"las",
"lo",
"los",
"mas",
"más",
"me",
"menos",
"mi",
"mía",
"mia",
"mias",
"mientras",
"mio",
"mío",
"mios",
"mis",
"misma",
"mismas",
"mismo",
"mismos",
"modo",
"mucha",
"muchas",
"muchísima",
"muchísimas",
"muchísimo",
"muchísimos",
"mucho",
"muchos",
"muy",
"nada",
"ni",
"ningun",
"ninguna",
"ningunas",
"ninguno",
"ningunos",
"no",
"nos",
"nosotras",
"nosotros",
"nuestra",
"nuestras",
"nuestro",
"nuestros",
"nunca",
"os",
"otra",
"otras",
"otro",
"otros",
"para",
"parecer",
"pero",
"poca",
"pocas",
"poco",
"pocos",
"podeis",
"podemos",
"poder",
"podria",
"podriais",
"podriamos",
"podrian",
"podrias",
"por",
"por qué",
"porque",
"primero",
"primero desde",
"puede",
"pueden",
"puedo",
"pues",
"que",
"qué",
"querer",
"quien",
"quién",
"quienes",
"quienes",
"quiera",
"quienquiera",
"quiza",
"quizas",
"sabe",
"sabeis",
"sabemos",
"saben",
"saber",
"sabes",
"se",
"segun",
"según",
"ser",
"si",
"sí",
"siempre",
"siendo",
"sin",
"sín",
"sino",
"so",
"sobre",
"sois",
"solamente",
"solo",
"somos",
"soy",
"sr",
"sra",
"sres",
"esta",
"su",
"sus",
"suya",
"suyas",
"suyo",
"suyos",
"tal",
"tales",
"también",
"tambien",
"tampoco",
"tan",
"tanta",
"tantas",
"tanto",
"tantos",
"te",
"teneis",
"tenemos",
"tener",
"tengo",
"ti",
"tiempo",
"tiene",
"tienen",
"toda",
"todas",
"todo",
"todos",
"tras",
"tú",
"tu",
"tus",
"tuya",
"tuyo",
"tuyos",
"ultimo",
"un",
"una",
"unas",
"uno",
"unos",
"usa",
"usais",
"usamos",
"usan",
"usar",
"usas",
"uso",
"usted",
"ustedes",
"va",
"vais",
"vamos",
"van",
"varias",
"varios",
"vaya",
"verdad",
"verdadera",
"vosotras",
"vosotros",
"voy",
"vuestra",
"vuestras",
"vuestro",
"vuestros",
"y",
"ya",
"yo"
);


    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'list' and 'show' actions
                'actions' => array('login', 'captcha', 'index'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticate users
                'actions' => array('stats', 'spider'),
                'users' => User::usernamesByRole((User::ADMIN | User::GESTOR), User::PERM_PREFERENCIAS),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    public function actionIndex() {
		$lookfor=$_GET['q'];
		$lookfor=strtolower($lookfor);
		$lookforArr=split(" ",$lookfor);
		$lookfor=join("' OR words.word='",$lookforArr);
		
		$query="words.word='".$lookfor."'";
		
		$data=SearchPage::model()->with(array('words'=>array('joinType'=>'INNER JOIN','condition'=>$query)))->findAll();
        $dataProvider=new CArrayDataProvider($data,array(
        	'keyField'=>'idSearchPage',
        	'pagination'=>array(
                            'pageSize'=>self::PAGE_SIZE,
                    ))
        );
        /*$dataProvider=new CActiveDataProvider('SearchPage',array(
        	'criteria'=>array(
        		'with'=>array('words'=>array('joinType'=>'INNER JOIN','condition'=>$query))
        	),
        	'pagination'=>array(
                            'pageSize'=>self::PAGE_SIZE,
                    ),
        	)
        );*/
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
    }

    public function actionStats() {
        $this->render('index');
    }

    public function actionSpider() {
    	$this->indexedLinks=array("#");
    	set_time_limit(0);
    	ini_set("memory_limit","50M");
        //$this->renderText("Starting index<br>");
        $this->indexNewPage("index.php");
    }

    
    /**
     * Strip punctuation from text.
     */
    private function strip_punctuation( $text )
    {
        $urlbrackets    = '\[\]\(\)';
        $urlspacebefore = ':;\'_\*%@&?!' . $urlbrackets;
        $urlspaceafter  = '\.,:;\'\-_\*@&\/\\\\\?!#' . $urlbrackets;
        $urlall         = '\.,:;\'\-_\*%@&\/\\\\\?!#' . $urlbrackets;

        $specialquotes  = '\'"\*<>';

        $fullstop       = '\x{002E}\x{FE52}\x{FF0E}';
        $comma          = '\x{002C}\x{FE50}\x{FF0C}';
        $arabsep        = '\x{066B}\x{066C}';
        $numseparators  = $fullstop . $comma . $arabsep;

        $numbersign     = '\x{0023}\x{FE5F}\x{FF03}';
        $percent        = '\x{066A}\x{0025}\x{066A}\x{FE6A}\x{FF05}\x{2030}\x{2031}';
        $prime          = '\x{2032}\x{2033}\x{2034}\x{2057}';
        $nummodifiers   = $numbersign . $percent . $prime;

        return preg_replace(
            array(
            // Remove separator, control, formatting, surrogate,
            // open/close quotes.
                '/[\p{Z}\p{Cc}\p{Cf}\p{Cs}\p{Pi}\p{Pf}]/u',
            // Remove other punctuation except special cases
                '/\p{Po}(?<![' . $specialquotes .
                    $numseparators . $urlall . $nummodifiers . '])/u',
            // Remove non-URL open/close brackets, except URL brackets.
                '/[\p{Ps}\p{Pe}](?<![' . $urlbrackets . '])/u',
            // Remove special quotes, dashes, connectors, number
            // separators, and URL characters followed by a space
                '/[' . $specialquotes . $numseparators . $urlspaceafter .
                    '\p{Pd}\p{Pc}]+((?= )|$)/u',
            // Remove special quotes, connectors, and URL characters
            // preceded by a space
                '/((?<= )|^)[' . $specialquotes . $urlspacebefore . '\p{Pc}]+/u',
            // Remove dashes preceded by a space, but not followed by a number
                '/((?<= )|^)\p{Pd}+(?![\p{N}\p{Sc}])/u',
            // Remove consecutive spaces
                '/ +/',
            ),
            ' ',
            $text );
    }
    
    /**
     * Strip symbols from text.
     */
    private function strip_symbols( $text )
    {
        $plus   = '\+\x{FE62}\x{FF0B}\x{208A}\x{207A}';
        $minus  = '\x{2012}\x{208B}\x{207B}';

        $units  = '\\x{00B0}\x{2103}\x{2109}\\x{23CD}';
        $units .= '\\x{32CC}-\\x{32CE}';
        $units .= '\\x{3300}-\\x{3357}';
        $units .= '\\x{3371}-\\x{33DF}';
        $units .= '\\x{33FF}';

        $ideo   = '\\x{2E80}-\\x{2EF3}';
        $ideo  .= '\\x{2F00}-\\x{2FD5}';
        $ideo  .= '\\x{2FF0}-\\x{2FFB}';
        $ideo  .= '\\x{3037}-\\x{303F}';
        $ideo  .= '\\x{3190}-\\x{319F}';
        $ideo  .= '\\x{31C0}-\\x{31CF}';
        $ideo  .= '\\x{32C0}-\\x{32CB}';
        $ideo  .= '\\x{3358}-\\x{3370}';
        $ideo  .= '\\x{33E0}-\\x{33FE}';
        $ideo  .= '\\x{A490}-\\x{A4C6}';

        return preg_replace(
            array(
            // Remove modifier and private use symbols.
                '/[\p{Sk}\p{Co}]/u',
            // Remove mathematics symbols except + - = ~ and fraction slash
                '/\p{Sm}(?<![' . $plus . $minus . '=~\x{2044}])/u',
            // Remove + - if space before, no number or currency after
                '/((?<= )|^)[' . $plus . $minus . ']+((?![\p{N}\p{Sc}])|$)/u',
            // Remove = if space before
                '/((?<= )|^)=+/u',
            // Remove + - = ~ if space after
                '/[' . $plus . $minus . '=~]+((?= )|$)/u',
            // Remove other symbols except units and ideograph parts
                '/\p{So}(?<![' . $units . $ideo . '])/u',
            // Remove consecutive white space
                '/ +/',
            ),
            ' ',
            $text );
    }
    
    /**
     * Strip numbers from text.
     */
    private function strip_numbers( $text )
    {
        $urlchars      = '\.,:;\'=+\-_\*%@&\/\\\\?!#~\[\]\(\)';
        $notdelim      = '\p{L}\p{M}\p{N}\p{Pc}\p{Pd}' . $urlchars;
        $predelim      = '((?<=[^' . $notdelim . '])|^)';
        $postdelim     = '((?=[^'  . $notdelim . '])|$)';

        $fullstop      = '\x{002E}\x{FE52}\x{FF0E}';
        $comma         = '\x{002C}\x{FE50}\x{FF0C}';
        $arabsep       = '\x{066B}\x{066C}';
        $numseparators = $fullstop . $comma . $arabsep;
        $plus          = '\+\x{FE62}\x{FF0B}\x{208A}\x{207A}';
        $minus         = '\x{2212}\x{208B}\x{207B}\p{Pd}';
        $slash         = '[\/\x{2044}]';
        $colon         = ':\x{FE55}\x{FF1A}\x{2236}';
        $units         = '%\x{FF05}\x{FE64}\x{2030}\x{2031}';
        $units        .= '\x{00B0}\x{2103}\x{2109}\x{23CD}';
        $units        .= '\x{32CC}-\x{32CE}';
        $units        .= '\x{3300}-\x{3357}';
        $units        .= '\x{3371}-\x{33DF}';
        $units        .= '\x{33FF}';
        $percents      = '%\x{FE64}\x{FF05}\x{2030}\x{2031}';
        $ampm          = '([aApP][mM])';

        $digits        = '[\p{N}' . $numseparators . ']+';
        $sign          = '[' . $plus . $minus . ']?';
        $exponent      = '([eE]' . $sign . $digits . ')?';
        $prenum        = $sign . '[\p{Sc}#]?' . $sign;
        $postnum       = '([\p{Sc}' . $units . $percents . ']|' . $ampm . ')?';
        $number        = $prenum . $digits . $exponent . $postnum;
        $fraction      = $number . '(' . $slash . $number . ')?';
        $numpair       = $fraction . '([' . $minus . $colon . $fullstop . ']' .
            $fraction . ')*';

        return preg_replace(
            array(
            // Match delimited numbers
                '/' . $predelim . $numpair . $postdelim . '/u',
            // Match consecutive white space
                '/ +/u',
            ),
            ' ',
            $text );
    }
    
    private function indexContent($idPage, $text) {
        
        
        $text = mb_strtolower( $text, "utf-8" );
        
        /*
         * PHP's explode( ) function is often used to split text into an array 
         * of words. Unfortunately, it isn't safe with multibyte characters. 
         * Instead, use the mb_split( ) function. Its first argument is a 
         * pattern for a word delimiter (use a space). The second argument is 
         * the string to split. Unlike most of the other "mb" functions, 
         * mb_split( ) doesn't have an argument to select the character encoding 
         * to use. Instead, use the mb_regex_encoding( ) function first to set 
         * the character encoding to use.
         */
        mb_regex_encoding( "utf-8" );
        $words = mb_split( ' +', $text );
        
        /**
         * ToDo: Borrar palabras cortas "stop words"
         * 
         * Ver: http://nadeausoftware.com/articles/2008/04/php_tip_how_extract_keywords_web_page
         * 
         * array de palabras cortas y realizar un array_diff 
         * 
         */
        $allStopWords=array_merge($this->stopWordsEng, $this->stopWords);
		$words = array_diff( $words, $allStopWords );
        
        foreach ( $words as $key => $word ){
            
            $word_id = 0;
                /* Does the current word already have a record in the word-table? */
                $cur_word = addslashes(strtolower($word));

                $result = SearchWord::model()->findByAttributes(array("word" => $cur_word));

                if ($result) {
                    /* If yes, use the old word_id: */
                    $word_id = $result->idSearchWord;
                } else {
                    /* If not, create one: */
                    $newWord = new SearchWord();
                    $newWord->word = $cur_word;
                    if(!$newWord->save()){
                    	echo "<span style='color:#f00; font-size:10px;'>error saving word".$word."<br><code>";
                    	print_r($newWord->getErrors());
                    	echo "</code></span><br>";
                    }
                    $word_id = $newWord->idSearchWord;
                }

                /* And finally, register the occurrence of the word: */
                //ToDo comprobar si la occurencia existe.
                if($word_id){
	                $result=  SearchOccurrence::model()->findByAttributes(array("idSearchPage"=>$idPage,"idSearchWord"=>$word_id));
	                if(!$result){
	                    $so = new SearchOccurrence();
	                    $so->idSearchPage = $idPage;
	                    $so->idSearchWord = $word_id;
	                    //ToDo Calcular el peso
	                    $so->weight = 0;
	                    if(!$so->save()){
	                    	echo "<span style='color:#f00; font-size:10px;'>error saving word".$word."<br><code>";
	                    	print_r($so->getErrors());
	                    	echo "</code></span><br>";
	                    }
                }
                }
                //echo "Indexing: $cur_word<br>";
        }
    }
    
    private function extract_css_urls( $text )
    {
            $urls = array( );

            $url_pattern     = '(([^\\\\\'", \(\)]*(\\\\.)?)+)';
            $urlfunc_pattern = 'url\(\s*[\'"]?' . $url_pattern . '[\'"]?\s*\)';
            $pattern         = '/(' .
                     '(@import\s*[\'"]' . $url_pattern     . '[\'"])' .
                    '|(@import\s*'      . $urlfunc_pattern . ')'      .
                    '|('                . $urlfunc_pattern . ')'      .  ')/iu';
            if ( !preg_match_all( $pattern, $text, $matches ) )
                    return $urls;

            // @import '...'
            // @import "..."
            foreach ( $matches[3] as $match )
                    if ( !empty($match) )
                            $urls['import'][] = 
                                    preg_replace( '/\\\\(.)/u', '\\1', $match );

            // @import url(...)
            // @import url('...')
            // @import url("...")
            foreach ( $matches[7] as $match )
                    if ( !empty($match) )
                            $urls['import'][] = 
                                    preg_replace( '/\\\\(.)/u', '\\1', $match );

            // url(...)
            // url('...')
            // url("...")
            foreach ( $matches[11] as $match )
                    if ( !empty($match) )
                            $urls['property'][] = 
                                    preg_replace( '/\\\\(.)/u', '\\1', $match );

            return $urls;
    }


    /**
     * Extract URLs from a web page.
     */
    private function extract_html_urls( $text )
    {
        
        $match_elements = array(
            // HTML
            array('element'=>'a',       'attribute'=>'href'),       // 2.0
            array('element'=>'a',       'attribute'=>'urn'),        // 2.0
            array('element'=>'base',    'attribute'=>'href'),       // 2.0
            array('element'=>'form',    'attribute'=>'action'),     // 2.0
            array('element'=>'img',     'attribute'=>'src'),        // 2.0
            array('element'=>'link',    'attribute'=>'href'),       // 2.0

            array('element'=>'applet',  'attribute'=>'code'),       // 3.2
            array('element'=>'applet',  'attribute'=>'codebase'),   // 3.2
            array('element'=>'area',    'attribute'=>'href'),       // 3.2
            array('element'=>'body',    'attribute'=>'background'), // 3.2
            array('element'=>'img',     'attribute'=>'usemap'),     // 3.2
            array('element'=>'input',   'attribute'=>'src'),        // 3.2

            array('element'=>'applet',  'attribute'=>'archive'),    // 4.01
            array('element'=>'applet',  'attribute'=>'object'),     // 4.01
            array('element'=>'blockquote','attribute'=>'cite'),     // 4.01
            array('element'=>'del',     'attribute'=>'cite'),       // 4.01
            array('element'=>'frame',   'attribute'=>'longdesc'),   // 4.01
            array('element'=>'frame',   'attribute'=>'src'),        // 4.01
            array('element'=>'head',    'attribute'=>'profile'),    // 4.01
            array('element'=>'iframe',  'attribute'=>'longdesc'),   // 4.01
            array('element'=>'iframe',  'attribute'=>'src'),        // 4.01
            array('element'=>'img',     'attribute'=>'longdesc'),   // 4.01
            array('element'=>'input',   'attribute'=>'usemap'),     // 4.01
            array('element'=>'ins',     'attribute'=>'cite'),       // 4.01
            array('element'=>'object',  'attribute'=>'archive'),    // 4.01
            array('element'=>'object',  'attribute'=>'classid'),    // 4.01
            array('element'=>'object',  'attribute'=>'codebase'),   // 4.01
            array('element'=>'object',  'attribute'=>'data'),       // 4.01
            array('element'=>'object',  'attribute'=>'usemap'),     // 4.01
            array('element'=>'q',       'attribute'=>'cite'),       // 4.01
            array('element'=>'script',  'attribute'=>'src'),        // 4.01

            array('element'=>'audio',   'attribute'=>'src'),        // 5.0
            array('element'=>'command', 'attribute'=>'icon'),       // 5.0
            array('element'=>'embed',   'attribute'=>'src'),        // 5.0
            array('element'=>'event-source','attribute'=>'src'),    // 5.0
            array('element'=>'html',    'attribute'=>'manifest'),   // 5.0
            array('element'=>'source',  'attribute'=>'src'),        // 5.0
            array('element'=>'video',   'attribute'=>'src'),        // 5.0
            array('element'=>'video',   'attribute'=>'poster'),     // 5.0

            array('element'=>'bgsound', 'attribute'=>'src'),        // Extension
            array('element'=>'body',    'attribute'=>'credits'),    // Extension
            array('element'=>'body',    'attribute'=>'instructions'),//Extension
            array('element'=>'body',    'attribute'=>'logo'),       // Extension
            array('element'=>'div',     'attribute'=>'href'),       // Extension
            array('element'=>'div',     'attribute'=>'src'),        // Extension
            array('element'=>'embed',   'attribute'=>'code'),       // Extension
            array('element'=>'embed',   'attribute'=>'pluginspage'),// Extension
            array('element'=>'html',    'attribute'=>'background'), // Extension
            array('element'=>'ilayer',  'attribute'=>'src'),        // Extension
            array('element'=>'img',     'attribute'=>'dynsrc'),     // Extension
            array('element'=>'img',     'attribute'=>'lowsrc'),     // Extension
            array('element'=>'input',   'attribute'=>'dynsrc'),     // Extension
            array('element'=>'input',   'attribute'=>'lowsrc'),     // Extension
            array('element'=>'table',   'attribute'=>'background'), // Extension
            array('element'=>'td',      'attribute'=>'background'), // Extension
            array('element'=>'th',      'attribute'=>'background'), // Extension
            array('element'=>'layer',   'attribute'=>'src'),        // Extension
            array('element'=>'xml',     'attribute'=>'src'),        // Extension

            array('element'=>'button',  'attribute'=>'action'),     // Forms 2.0
            array('element'=>'datalist','attribute'=>'data'),       // Forms 2.0
            array('element'=>'form',    'attribute'=>'data'),       // Forms 2.0
            array('element'=>'input',   'attribute'=>'action'),     // Forms 2.0
            array('element'=>'select',  'attribute'=>'data'),       // Forms 2.0

            // XHTML
            array('element'=>'html',    'attribute'=>'xmlns'),

            // WML
            array('element'=>'access',  'attribute'=>'path'),       // 1.3
            array('element'=>'card',    'attribute'=>'onenterforward'),// 1.3
            array('element'=>'card',    'attribute'=>'onenterbackward'),// 1.3
            array('element'=>'card',    'attribute'=>'ontimer'),    // 1.3
            array('element'=>'go',      'attribute'=>'href'),       // 1.3
            array('element'=>'option',  'attribute'=>'onpick'),     // 1.3
            array('element'=>'template','attribute'=>'onenterforward'),// 1.3
            array('element'=>'template','attribute'=>'onenterbackward'),// 1.3
            array('element'=>'template','attribute'=>'ontimer'),    // 1.3
            array('element'=>'wml',     'attribute'=>'xmlns'),      // 2.0
        );

        $match_metas = array(
            'content-base',
            'content-location',
            'referer',
            'location',
            'refresh',
        );

        // Extract all elements
        if ( !preg_match_all( '/<([a-z][^>]*)>/iu', $text, $matches ) )
            return array( );
        $elements = $matches[1];
        $value_pattern = '=(("([^"]*)")|([^\s]*))';

        // Match elements and attributes
        foreach ( $match_elements as $match_element )
        {
            $name = $match_element['element'];
            $attr = $match_element['attribute'];
            $pattern = '/^' . $name . '\s.*' . $attr . $value_pattern . '/iu';
            if ( $name == 'object' )
                $split_pattern = '/\s*/u';  // Space-separated URL list
            else if ( $name == 'archive' )
                $split_pattern = '/,\s*/u'; // Comma-separated URL list
            else
                unset( $split_pattern );    // Single URL
            foreach ( $elements as $element )
            {
                if ( !preg_match( $pattern, $element, $match ) )
                    continue;
                $m = empty($match[3]) ? $match[4] : $match[3];
                if ( !isset( $split_pattern ) )
                    $urls[$name][$attr][] = $m;
                else
                {
                    $msplit = preg_split( $split_pattern, $m );
                    foreach ( $msplit as $ms )
                        $urls[$name][$attr][] = $ms;
                }
            }
        }

        // Match meta http-equiv elements
        foreach ( $match_metas as $match_meta )
        {
            $attr_pattern    = '/http-equiv="?' . $match_meta . '"?/iu';
            $content_pattern = '/content'  . $value_pattern . '/iu';
            $refresh_pattern = '/\d*;\s*(url=)?(.*)$/iu';
            foreach ( $elements as $element )
            {
                if ( !preg_match( '/^meta/iu', $element ) ||
                    !preg_match( $attr_pattern, $element ) ||
                    !preg_match( $content_pattern, $element, $match ) )
                    continue;
                $m = empty($match[3]) ? $match[4] : $match[3];
                if ( $match_meta != 'refresh' )
                    $urls['meta']['http-equiv'][] = $m;
                else if ( preg_match( $refresh_pattern, $m, $match ) )
                    $urls['meta']['http-equiv'][] = $match[2];
            }
        }

        // Match style attributes
        $urls['style'] = array( );
        $style_pattern = '/style' . $value_pattern . '/iu';
        foreach ( $elements as $element )
        {
            if ( !preg_match( $style_pattern, $element, $match ) )
                continue;
            $m = empty($match[3]) ? $match[4] : $match[3];
            $style_urls = $this->extract_css_urls( $m );
            if ( !empty( $style_urls ) )
                $urls['style'] = array_merge_recursive(
                    $urls['style'], $style_urls );
        }
        
        // Match style bodies
        if ( preg_match_all( '/<style[^>]*>(.*?)<\/style>/siu', $text, $style_bodies ) )
        {
            foreach ( $style_bodies[1] as $style_body )
            {
                $style_urls = $this->extract_css_urls( $style_body );
                if ( !empty( $style_urls ) )
                    $urls['style'] = array_merge_recursive(
                        $urls['style'], $style_urls );
            }
        }
        if ( empty($urls['style']) )
            unset( $urls['style'] );

        return $urls;
    }
    
    private function getHtmlTitle( $htmlPage, $default = 'No Title' )
	{
	    $match = array();
	    return preg_match( '/<title>(.+?)<\/title>/i', $htmlPage, $match) ? $match[1] : $default;
	}
	    

    private function get_web_page( $url )
    {
            $options = array(
                    CURLOPT_RETURNTRANSFER => true,     // return web page
                    CURLOPT_HEADER         => false,    // don't return headers
                    CURLOPT_FOLLOWLOCATION => true,     // follow redirects
                    CURLOPT_ENCODING       => "",       // handle compressed
                    CURLOPT_USERAGENT      => "spider", // who am i
                    CURLOPT_AUTOREFERER    => true,     // set referer on redirect
                    CURLOPT_CONNECTTIMEOUT => 120,      // timeout on connect
                    CURLOPT_TIMEOUT        => 120,      // timeout on response
                    CURLOPT_MAXREDIRS      => 10,       // stop after 10 redirects
            );

            $ch      = curl_init( $url );
            curl_setopt_array( $ch, $options );
            $content = curl_exec( $ch );
            $err     = curl_errno( $ch );
            $errmsg  = curl_error( $ch );
            $header  = curl_getinfo( $ch );
            curl_close( $ch );

            $header['errno']   = $err;
            $header['errmsg']  = $errmsg;
            $header['content'] = $content;
            return $header;
    }

    private function strip_html_tags( $text )
    {
            // PHP's strip_tags() function will remove tags, but it
            // doesn't remove scripts, styles, and other unwanted
            // invisible text between tags.  Also, as a prelude to
            // tokenizing the text, we need to insure that when
            // block-level tags (such as <p> or <div>) are removed,
            // neighboring words aren't joined.
            $text = preg_replace(
            array(
                    // Remove invisible content
                    '@<head[^>]*?>.*?</head>@siu',
                    '@<style[^>]*?>.*?</style>@siu',
                    '@<script[^>]*?.*?</script>@siu',
                    '@<object[^>]*?.*?</object>@siu',
                    '@<embed[^>]*?.*?</embed>@siu',
                    '@<applet[^>]*?.*?</applet>@siu',
                    '@<noframes[^>]*?.*?</noframes>@siu',
                    '@<noscript[^>]*?.*?</noscript>@siu',
                    '@<noembed[^>]*?.*?</noembed>@siu',

                    // Add line breaks before & after blocks
                    '@<((br)|(hr))@iu',
                    '@</?((address)|(blockquote)|(center)|(del))@iu',
                    '@</?((div)|(h[1-9])|(ins)|(isindex)|(p)|(pre))@iu',
                    '@</?((dir)|(dl)|(dt)|(dd)|(li)|(menu)|(ol)|(ul))@iu',
                    '@</?((table)|(th)|(td)|(caption))@iu',
                    '@</?((form)|(button)|(fieldset)|(legend)|(input))@iu',
                    '@</?((label)|(select)|(optgroup)|(option)|(textarea))@iu',
                    '@</?((frameset)|(frame)|(iframe))@iu',
            ),
            array(
                    ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ',
                    "\n\$0", "\n\$0", "\n\$0", "\n\$0", "\n\$0", "\n\$0",
                    "\n\$0", "\n\$0",
            ),
            $text );

	// Remove all remaining tags and comments and return.
	return strip_tags( $text );
    }


    public $indexedLinks=array("#");
    
    private function isIndexed($url){
    	for($i=0;$i<sizeof($this->indexedLinks);$i++){
    		if($this->indexedLinks[$i]==$url){
    			return true;
    		}
    	}
    	return false;
    }
    
    private function showMessage($msg){
    	print $msg;
    	flush();
    }
    public function indexNewPage($url) {
		array_push($this->indexedLinks,$url);
		
        $Protocol = "http://";
        $urlBase = $Protocol . $_SERVER['SERVER_NAME'] . ":" . $_SERVER['SERVER_PORT'] . Yii::app()->params['path'];
        if ($this->robots_allowed($urlBase . $url)) {
            //Existe la pagina en la BD?
            $page = SearchPage::model()->findByAttributes(array("url" => $url));
            if ($page){
                if(strtotime($page->indexdate)>  strtotime("-1 hour")){
                    //echo "Recien indexado. No volvemos a indexar <br>";
                    return true;
                }/*else{
                	echo "<span style='color:#0f0;'>".$url."</span><br>";
                    echo "Volvemos a indexar<br>";
                }*/
                
            }
            
            //Abrimos fichero
            //Recogemos contenido
            $file = $this->get_web_page($urlBase . $url);

            $contentType = $file['content_type'];
            if($contentType!="text/html"){
            	 $this->showMessage( "<span style='color:#900;'>No indexamos: ".$url." al no poseer formato text/html</span> <br>");
            	return;
            }
            
            if($file['errno']==0 && $file['http_code']==200 ){

                //realizamos el sumatorio md5 del archivo
                //para pder comprobar si se ha modificado
                $newmd5sum = md5($file['content']);
                $this->showMessage( "<span style='color:#080;'>Pagina: ".$url." </span> <span style='color:#aaa;'>md5=".$newmd5sum . "</span><br>");
                
                $text = $this->strip_html_tags($file['content']);
		        $text = html_entity_decode( $text, ENT_QUOTES, "utf-8" );
		        $text = $this->strip_punctuation($text);
		        $text = $this->strip_symbols($text);
		        $text = $this->strip_numbers($text);
		        
                
                if ($page) {
                    if ($newmd5sum != $page->md5sum) {
                        $this->showMessage( "Pagina con modificaciones. Reindexado<br/>");                        
                        $this->indexContent($page->idSearchPage, $text);
                    }else{
                        $this->showMessage( "Pagina sin actualizaciones. No Reindexado<br/>");
                    }
                } else {
                    $this->showMessage( "La pagina no esta indexada<br/>Indexamos nuevo contenido<br/>");
                    $page = new SearchPage();
                    $page->md5sum = $newmd5sum;
	                $page->url = $url;
	                $page->indexdate = date("Y/m/d H:i:s");
	                //ToDo acabar atributos
	                //guardamos
	                $page->save();
                    $this->indexContent($page->idSearchPage, $text);
                }
                
                $page->md5sum = $newmd5sum;
                $page->url = $url;
                $page->fulltxt=$text;
                $page->title=$this->getHtmlTitle($file['content']);
                $page->size=$file['download_content_length'];
                $page->indexdate = date("Y/m/d H:i:s");
                //ToDo acabar atributos
                //guardamos
                $page->save();
                
                //$this->showMessage( "Nuevos enlaces a analizar<br/>");
            
                $enlaces = $this->extract_html_urls($file['content']);
                //print_r($enlaces);
                
                if ( !empty( $enlaces['a'] ) ){
                    $this->showMessage( "Analizando enlaces de $url<br/>");
                	//Eliminamos los enlaces visitados
                	foreach($enlaces['a']['href'] as $enlace){
						
                		//echo "enlace: ".$enlace."<br>";
                        //Comprobamos si el enlace pertenece a otro site
                        if(!$this->is_url_external($enlace)){
                         
                            $startPath=Yii::app()->params['path'];
                            if(substr_compare($startPath, $enlace , 0,  strlen($startPath))==0){
                                $enlace=substr($enlace, strlen($startPath));
                            }
                            $enlace=html_entity_decode( $enlace, ENT_QUOTES, "utf-8" );
                            if(!$this->isIndexed($enlace)){
	                            //$this->showMessage("-->Indexamos contenido del enlace ".$enlace."<br>");
	                            $this->indexNewPage($enlace);
                            }
                            
                        }
					
                        
                            
                    }
                }
                //$this->showMessage( "Fin analisis de enlaces <br><br><br>");

            }
        }
    }

    private function is_url_external($enlace){
    	//Comprobamos que no enlace a si mismo
    	if($enlace=="#")
    		return true;
    	//Comprobamos que no sea un enlace a mail
    	$mailto="mailto:";
        if(substr_compare($mailto, $enlace , 0,  strlen($mailto))==0){
       		return true;
        }
        $newurl=parse_url($enlace);
        if(isset($newurl['host'])){
            if($_SERVER['SERVER_NAME']==$newurl['host']){
                return false;
            }else{
                return true;
            }
        }else{
            return false;
        }
    }
    
    private function robots_allowed($url, $useragent=false) {
        # parse url to retrieve host and path 
        $parsed = parse_url($url);

        $agents = array(preg_quote('*'));
        if ($useragent)
            $agents[] = preg_quote($useragent);
        $agents = implode('|', $agents);

        # location of robots.txt file 
        $robotstxt = @file("http://{$parsed['host']}/robots.txt");
        if (!$robotstxt)
            return true;

        $rules = array();
        $ruleapplies = false;
        foreach ($robotstxt as $line) {
            # skip blank lines 
            if (!$line = trim($line))
                continue;

            # following rules only apply if User-agent matches $useragent or '*' 
            if (preg_match('/User-agent: (.*)/i', $line, $match)) {
                $ruleapplies = preg_match("/($agents)/i", $match[1]);
            }

            if ($ruleapplies && preg_match('/Disallow:(.*)/i', $line, $regs)) {
                # an empty rule implies full access - no further tests required 
                if (!$regs[1])
                    return true;
                # add rules that apply to array for testing 
                $rules[] = preg_quote(trim($regs[1]), '/');
            }
        }
        foreach ($rules as $rule) {
            # check if page is disallowed to us 
            if (preg_match("/^$rule/", $parsed['path']))
                return false;
        } # page is not disallowed 
        return true;
    }

}
