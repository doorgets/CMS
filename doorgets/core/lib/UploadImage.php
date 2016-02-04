<?php

/*******************************************************************************
/*******************************************************************************
    doorGets 7.0 - 01, February 2016
    doorgets it's free PHP Open Source CMS PHP & MySQL
    Copyright (C) 2012 - 2015 By Mounir R'Quiba -> Crazy PHP Lover
    
/*******************************************************************************

    Website : http://www.doorgets.com
    Contact : http://www.doorgets.com/t/en/?contact
    
/*******************************************************************************
    -= One life, One code =-
/*******************************************************************************
    
    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.
    
******************************************************************************
******************************************************************************/


class UploadImage{

    static function send($module,$fichier_temp,$fichier_nom,$fichier_n_nom,$taille_max = 150) {
        
        if (!is_file($fichier_temp)) {return null;}
        $fichier_dossier_min = BASE.'data/'.$module.'/min/';
        $fichier_dossier_m = BASE.'data/'.$module.'/m/';
        $fichier_dossier_profile = BASE.'data/'.$module.'/middle/';
        $fichier_dossier = BASE.'data/'.$module.'/real/';
        $fichier_dossier_temp = BASE.'data/'.$module.'/temp/';
        
        
        if (!is_dir(BASE.'data/'.$module.'/')) { @mkdir(BASE.'data/'.$module.'/', 0777, true);@copy(BASE.'data/index.php',BASE.'data/'.$module.'/index.php');}
        if (!is_dir(BASE.'data/'.$module.'/m/')) { @mkdir(BASE.'data/'.$module.'/m/', 0777, true);@copy(BASE.'data/index.php',$fichier_dossier_m.'index.php');}
        if (!is_dir(BASE.'data/'.$module.'/min/')) { @mkdir(BASE.'data/'.$module.'/min/', 0777, true);@copy(BASE.'data/index.php',$fichier_dossier_min.'index.php');}
        if (!is_dir(BASE.'data/'.$module.'/middle/')) { @mkdir(BASE.'data/'.$module.'/middle/', 0777, true);@copy(BASE.'data/index.php',$fichier_dossier_profile.'index.php');}
        if (!is_dir(BASE.'data/'.$module.'/real/')) { @mkdir(BASE.'data/'.$module.'/real/', 0777, true);@copy(BASE.'data/index.php',$fichier_dossier.'index.php');}
        if (!is_dir(BASE.'data/'.$module.'/temp/')) { @mkdir(BASE.'data/'.$module.'/temp/', 0777, true);@copy(BASE.'data/index.php',$fichier_dossier_temp.'index.php');}
        
        list($fichier_larg, $fichier_haut, $fichier_type)=getimagesize($fichier_temp);
        $mini_larg = $big_larg = $profile_larg = $fichier_larg;
        $mini_haut = $big_haut = $profile_haut = $fichier_haut;
        $fichier_poids_max = 5000000;
        $fichier_h_min = 50;
        $fichier_l_min = 50;
        $fichier_h_max = 5000;
        $fichier_l_max = 5000;
        $opacite = 100;
        $taille_big = $fichier_larg;
        if ($fichier_larg > 950) { $taille_big = 950; }
        $taille_profile = 250;
        
        $fichier_ext = substr($fichier_nom,strrpos( $fichier_nom, '.')+1);
        $fichier_date = date("ymdhis");
        $fichier_n_nom = $fichier_n_nom.".".strtolower($fichier_ext);
    
        if (!empty($fichier_temp) && is_uploaded_file($fichier_temp)) {
            if (filesize($fichier_temp)<$fichier_poids_max) {
                if (($fichier_type===2) || ($fichier_type===3)) {
                    if (($fichier_larg<=$fichier_l_max) && ($fichier_haut<=$fichier_h_max) && ($fichier_larg>=$fichier_l_min) && ($fichier_haut>=$fichier_h_min)) {
                        if (move_uploaded_file($fichier_temp, $fichier_dossier_temp.$fichier_n_nom)) {
                                chmod ($fichier_dossier_temp.$fichier_n_nom, 0777);
                                // si le fichier est plus grand que $taille_max on le miniaturise
                                if ($fichier_larg >= $taille_max  ) {
                                    $ratior = $fichier_larg / $taille_max;
                                    $mini_haut = $fichier_haut / $ratior;
                                    $mini_larg = $taille_max;
                                    
                                    $ratior_big = $fichier_larg / $taille_big;
                                    $big_haut = $fichier_haut / $ratior_big;
                                    $big_larg = $taille_big;
                                    
                                    $ratior_profile = $fichier_larg / $taille_profile;
                                    $profile_haut = $fichier_haut / $ratior_profile;
                                    $profile_larg = $taille_profile;
                                }
                                $ratio_orig = $fichier_larg/$fichier_haut;
                                
                                if (1 > $ratio_orig) {
            
                                    $new_height = 100/$ratio_orig;
                                    $new_width = 100;
                                } else {
                                    $new_width = 100*$ratio_orig;
                                    $new_height = 100;
            
                                }
                                
                                $x_mid = $new_width/2;  //horizontal middle
                                $y_mid = $new_height/2; //vertical middle
                                
                                
                                    // si le fichier est un .jpg / .jpeg
                                    if ($fichier_type===2) {
                                        
                                        $qualite=70;
                                        $fichier_source = imagecreatefromjpeg($fichier_dossier_temp.$fichier_n_nom);
                                        
                                        $fichier_reduit = imagecreatetruecolor($mini_larg, $mini_haut);
                                        $fichier_larg_red = imagesx($fichier_reduit);
                                        $fichier_haut_red = imagesy($fichier_reduit);
                                        $nom_fichier_reduit = strtolower($fichier_n_nom);
                                        imagecopyresampled($fichier_reduit, $fichier_source, 0, 0, 0, 0, $fichier_larg_red, $fichier_haut_red, $fichier_larg, $fichier_haut);
                                        imagejpeg($fichier_reduit, $fichier_dossier_min.$nom_fichier_reduit, $qualite);
                                        chmod($fichier_dossier_temp.$nom_fichier_reduit, 0777);
                                        
                                        $fichier_source_x = imagecreatefromjpeg($fichier_dossier_min.$nom_fichier_reduit);
                                        
                                        $fichier_reduit_x = imagecreatetruecolor(97, 97);
                                        $fichier_larg_red_x = imagesx($fichier_reduit_x);
                                        $fichier_haut_red_x = imagesy($fichier_reduit_x);
                                        $vaPos = 0;
                                        if ($fichier_larg > $fichier_haut) {$vaPos = -15;}
                                        $nom_fichier_reduit_x = strtolower($fichier_n_nom);
                                        imagecopyresampled($fichier_reduit_x, $fichier_source_x, 0, 0, 0, $vaPos, $fichier_larg_red_x, $fichier_haut_red_x, 97, 97);
                                        imagejpeg($fichier_reduit_x, $fichier_dossier_m.$nom_fichier_reduit_x, $qualite);
                                        chmod($fichier_dossier_m.$nom_fichier_reduit_x, 0777);
                                        
                                        $fichier_grand = imagecreatetruecolor($big_larg, $big_haut);
                                        $fichier_larg_big = imagesx($fichier_grand);
                                        $fichier_haut_big = imagesy($fichier_grand);
                                        $nom_fichier_grand = strtolower($fichier_n_nom);
                                        imagecopyresampled($fichier_grand, $fichier_source, 0, 0, 0, 0, $fichier_larg_big, $fichier_haut_big, $fichier_larg, $fichier_haut);
                                        imagejpeg($fichier_grand, $fichier_dossier.$nom_fichier_grand, $qualite);
                                        chmod($fichier_dossier_temp.$nom_fichier_reduit, 0777);
                                        
                                        $fichier_profile = imagecreatetruecolor($profile_larg, $profile_haut);
                                        $fichier_larg_profile = imagesx($fichier_profile);
                                        $fichier_haut_profile = imagesy($fichier_profile);
                                        $nom_fichier_profile = strtolower($fichier_n_nom);
                                        imagecopyresampled($fichier_profile, $fichier_source, 0, 0, 0, 0, $fichier_larg_profile, $fichier_haut_profile, $fichier_larg, $fichier_haut);
                                        imagejpeg($fichier_profile, $fichier_dossier_profile.$nom_fichier_profile, $qualite);
                                        chmod($fichier_dossier_temp.$nom_fichier_reduit, 0777);
                                          
                                    }
                            
                                // si le fichier est un .png
                                if ($fichier_type===3) {
            
                                    $fichier_source = imagecreatefrompng($fichier_dossier_temp.$fichier_n_nom);
                                    
                                    $fichier_reduit = imagecreatetruecolor($mini_larg, $mini_haut);
                                    imagesavealpha($fichier_reduit, true);
                                    $trans_colour = imagecolorallocatealpha($fichier_reduit, 0, 0, 0, 127);
                                    imagefill($fichier_reduit, 0, 0, $trans_colour);
                                    $fichier_larg_red = imagesx($fichier_reduit);
                                    $fichier_haut_red = imagesy($fichier_reduit);
                                    $nom_fichier_reduit = strtolower($fichier_n_nom);
                                    imagecopyresampled($fichier_reduit, $fichier_source, 0, 0, 0, 0, $fichier_larg_red, $fichier_haut_red, $fichier_larg, $fichier_haut);
                                    imagepng($fichier_reduit, $fichier_dossier_min.$nom_fichier_reduit);
                                    chmod($fichier_dossier_temp.$nom_fichier_reduit, 0777);
                                    
                                    $fichier_source_x = imagecreatefrompng($fichier_dossier_min.$fichier_n_nom);
                                    
                                    $fichier_reduit_x = imagecreatetruecolor(97, 97);
                                    imagesavealpha($fichier_reduit_x, true);
                                    $trans_colour = imagecolorallocatealpha($fichier_reduit_x, 0, 0, 0, 127);
                                    imagefill($fichier_reduit_x, 0, 0, $trans_colour);
                                    $fichier_larg_red_x = imagesx($fichier_reduit_x);
                                    $fichier_haut_red_x = imagesy($fichier_reduit_x);
                                    $nom_fichier_reduit_x = $fichier_n_nom;
                                    $vaPos = 0;
                                    if ($fichier_larg > $fichier_haut) {$vaPos = -15;}
                                    imagecopyresampled($fichier_reduit_x, $fichier_source_x, 0, 0, 0, $vaPos, 97, 97, 97, 97);
                                    imagepng($fichier_reduit_x, $fichier_dossier_m.$nom_fichier_reduit_x);
                                    chmod($fichier_dossier_m.$nom_fichier_reduit_x, 0777);
                                    
                                    $fichier_grand = imagecreatetruecolor($big_larg, $big_haut);
                                    imagesavealpha($fichier_grand, true);
                                    $trans_colour = imagecolorallocatealpha($fichier_grand, 0, 0, 0, 127);
                                    imagefill($fichier_grand, 0, 0, $trans_colour);
                                    $fichier_larg_big = imagesx($fichier_grand);
                                    $fichier_haut_big = imagesy($fichier_grand);
                                    $nom_fichier_grand = strtolower($fichier_n_nom);
                                    imagecopyresampled($fichier_grand, $fichier_source, 0, 0, 0, 0, $fichier_larg_big, $fichier_haut_big, $fichier_larg, $fichier_haut);
                                    imagepng($fichier_grand, $fichier_dossier.$nom_fichier_grand);
                                    chmod($fichier_dossier_temp.$nom_fichier_grand, 0777);
                                    
                                    $fichier_profile = imagecreatetruecolor($profile_larg, $profile_haut);
                                    imagesavealpha($fichier_profile, true);
                                    $trans_colour = imagecolorallocatealpha($fichier_profile, 0, 0, 0, 127);
                                    imagefill($fichier_profile, 0, 0, $trans_colour);
                                    $fichier_larg_profile = imagesx($fichier_profile);
                                    $fichier_haut_profile = imagesy($fichier_profile);
                                    $nom_fichier_profile = strtolower($fichier_n_nom);
                                    imagecopyresampled($fichier_profile, $fichier_source, 0, 0, 0, 0, $fichier_larg_profile, $fichier_haut_profile, $fichier_larg, $fichier_haut);
                                    imagepng($fichier_profile, $fichier_dossier_profile.$nom_fichier_profile);
                                    chmod($fichier_dossier_temp.$nom_fichier_grand, 0777);
                                }
                            }else { $nom_fichier_reduit = $fichier_n_nom; }
                            
                            unlink($fichier_dossier_temp.$nom_fichier_grand);
                            $name_moon_img = $fichier_n_nom;
                            return $name_moon_img;
                        
                        }
                    }
                }
            }
            
            return null;
    }
}