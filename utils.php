<?php
require_once 'conf.php';

function get_file_paths($rep="bootstrap-5.0.1-dist"){
    /**
     * return an array containing all valide paths of $extension 
     * adapted to bootstrap-5.0.1-dist where there are 2 sub-folders
     */

    $BASE = get_base();

    // assert it's a folder
    assert(is_dir($BASE.$rep), true);

    // get the sub folders : css and js
    $subf = array_diff(scandir($BASE.$rep), array('.', '..')); 
    
    assert(array_count_values($subf) != 0);

    $css_paths = array_diff(scandir($BASE.$rep.'\\'.$subf[2]), array('.', '..'));
    $js_paths = array_diff(scandir($BASE.$rep.'\\'.$subf[3]), array('.', '..'));

    return array($css_paths, $js_paths);
}

function afficher($t){
    echo "<pre>";
    print_r($t);
    echo "</pre>";
}

function ends_with( $haystack, $needle ) {
    $length = strlen( $needle );
    if( !$length ) {
        return true;
    }
    return substr( $haystack, -$length ) === $needle;
}

function verifier($jour, $mois, $annee){
    /**
     * retourne vrai si la date est valide, faux sinon
     */
    $nbr_jr_ms = array(
        1 => 31,
        2 => array(28, 29),
        3 => 31,
        4 => 30,
        5 => 31,
        6 => 30,
        7 => 31,
        8 => 31,
        9 => 30,
        10 => 31,
        11 => 30,
        12 => 31
    );

    if($mois != 2){
        return 1 <= $jour and $jour <= $nbr_jr_ms[$mois] ;
    }else{
        if($annee%4 == 0){
            return 1 <= $jour and $jour <= $nbr_jr_ms[$mois][1];
        }else{
            return 1 <= $jour and $jour <= $nbr_jr_ms[$mois][0];
        }
    } 
}