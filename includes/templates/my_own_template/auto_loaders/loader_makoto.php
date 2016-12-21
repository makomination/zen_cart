<?php
/**
* @package Pages
* @copyright Makoto Ishihara
* @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
* Date : 2016/12/21
*/

//load files on pages below
$loaders[] = array('conditions' => array('pages' => array('index_home', 'index', 'products_new', 'featured_products', 'products_all', 'advanced_search_result')),
//load js files below (jquery file and my original file called 'makoto.js')
										'jscript_files' => array(
										  '//code.jquery.com/jquery-1.12.0.min.js' => 1,
										//  'jquery/jquery-migrate-1.2.1.min.js' => 2,
                      'makoto.js' => 5
                    )/*,
                    'css_files' => array(
                      'fec_global.css' => 1,
                      'auto_loaders/fec_overrides.css' => 2
                    )*/
								);