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


class TranslatorRequest extends doorGetsUserRequest{
    
    private $sizeMax = 8192000;
    
    private $typeFile = array();
    private $typeExtension = array();
    private $typeImage = array();
    
    public function __construct(&$doorGets) {
        
        parent::__construct($doorGets);
        
    }
    
    public function doAction() {
                
        $out = '';
        $User               = $this->doorGets->user;
        $lgActuel           = $this->doorGets->getLangueTradution();
        $allLanguages       = $this->doorGets->getAllLanguages();
        $isVersionActive    = false;
        $version_id         = 0;
        $isContent          = array();

        // Check if is content modo
        (in_array('traduction', $User['liste_module_interne'])) ? $is_modo = true : $is_modo = false;

        // Check if is module modo
        (
            in_array('traduction', $User['liste_module_interne'])  
            && in_array('traduction_modo',  $User['liste_module_interne'])

        ) ? $is_modules_modo = true : $is_modules_modo = false;

        // get Content for edit / delete
        $params = $this->doorGets->Params();
        if (array_key_exists('id',$params['GET'])) {
            
            $id = $params['GET']['id'];
            $isContent = $this->doorGets->dbQS($id,$this->doorGets->Table);
            if (!empty($isContent)) {
                
                if ($lgGroupe = @unserialize($isContent['groupe_traduction'])) {
                    
                    $idLgGroupe = $lgGroupe[$lgActuel];
                    
                    $isContentTraduction = $this->doorGets->dbQS($idLgGroupe,$this->doorGets->Table.'_traduction');
                    
                    if (!empty($isContentTraduction)) {
                        
                        $isContent = array_merge($isContent,$isContentTraduction);
                        $this->isContent = $isContent;
                    }
                }
            }
        }
        
        switch($this->Action) {
            
            case 'index':
                
                break;
            
            case 'tofile':
            
                if (
                    !empty($this->doorGets->Form['_saveToFile']->i) 
                    && $is_modules_modo
                ) {
                    
                    $this->doorGets->checkMode();

                    $temp = array();
                    $dirTraduction = LANGUE;
                    // Création des variables pour chaque langue
                    foreach ($allLanguages as $langue => $label) {
                        $$langue = array();
                    }

                    $allTraductions = $this->doorGets->dbQA('_dg_translator','LIMIT 5000');
                    foreach ($allTraductions as $traduction) {

                        $temp[] = $traduction['sentence'];
                        if ($groupeTraduction = @unserialize($traduction['groupe_traduction'])) {
                            
                            foreach ($groupeTraduction as $langue => $idTraduction) {
                                
                                $traductionTraduction = $this->doorGets->dbQS($idTraduction,'_dg_translator_traduction');
                                if(!empty($traductionTraduction)) {
                                    
                                    array_push($$langue, $traductionTraduction['translated_sentence']); 
                                }
                            }
                        }
                    }

                    foreach ($allLanguages as $_toLanguage => $value) {

                        $iAdd = 0;
                        $fileTraduction = $dirTraduction.$_toLanguage.'.lg.php';

                        $outTempTranslate = '<?php '.PHP_EOL;
                        
                        foreach($$_toLanguage as $k => $w) {
                            $w = trim($w);
                            $outTempTranslate .= "\t".'$_w[] = "'.$w.'"; '.PHP_EOL;
                            $iAdd++; 
                        }
                        
                        if (empty($iAdd)) {
                            $outTempTranslate .= "\t".'$_w = array(); ';
                        }
                        
                        file_put_contents($fileTraduction,$outTempTranslate);
                            
                    }

                    $iAdd = 0;
                    $fileTempTraduction = $dirTraduction.'temp.lg.php';

                    $outTempTranslate = '<?php //je suis la'.PHP_EOL;
                    foreach($temp as $k => $w) {
                        $w = str_replace('&#39;',"'",trim($w));
                        $outTempTranslate .= "\t".'$wTranslate[] = "'.$w.'"; '.PHP_EOL;
                        $iAdd++; 
                    }

                    if (empty($iAdd)) {
                        $outTempTranslate .= "\t".'$wTraslate = array(); ';
                    }
                    
                    file_put_contents($fileTempTraduction,$outTempTranslate);

                    FlashInfo::set($this->doorGets->__("Les traductions sont maintenant en ligne"));
                }
                break;

            case 'tobase':

                if (
                    !empty($this->doorGets->Form['_saveToBase']->i) 
                    && $is_modules_modo
                ) {
                    
                    $this->doorGets->checkMode();
                
                    $isOkForTranfert = true;
                    $filesTraduction = array();

                    $_fileTempTraduction = LANGUE.'temp.lg.php';
                    if (is_file($_fileTempTraduction)) {

                        include $_fileTempTraduction;
                        $countSentences = count($wTranslate);

                        //echo $countSentences;
                        $filesTraduction['temp']['file'] = $_fileTempTraduction;
                        $filesTraduction['temp']['sentences'] = $wTranslate;

                        // loading
                        foreach ($allLanguages as $langue => $label) {

                            $_fileName = LANGUE.$langue.'.lg.php';
                            if (is_file($_fileName)) {
                                
                                if (isset($_w)) {
                                    unset($_w);
                                }

                                include $_fileName;
                                $filesTraduction[$langue]['file'] = $_fileName;
                                $filesTraduction[$langue]['sentences'] = $_w;
                            }
                            
                        }
                    }

                    foreach ($filesTraduction['temp']['sentences'] as $position => $sentence) {

                        $idsTraduction = array();
                        $sentence = trim(filter_var($sentence, FILTER_SANITIZE_STRING));

                        $isSentence = $this->doorGets->dbQS($sentence,'_dg_translator','sentence');
                        if (empty($isSentence)) {

                            $dataSentence = array(
                                'sentence'      => $sentence,
                                'id_user'       => $User['id'],
                                'id_groupe'     => $User['groupe'],
                                'date_creation' => time()
                            );

                            $idContent = $this->doorGets->dbQI($dataSentence,'_dg_translator');

                            foreach ($allLanguages as $langue => $label) {

                                $traduction = '';
                                if (array_key_exists($position, $filesTraduction[$langue]['sentences'])) {
                                    $traduction = $filesTraduction[$langue]['sentences'][$position];
                                }

                                $dataTraduction['translated_sentence']  = $traduction;
                                $dataTraduction['langue']               = $langue;
                                $dataTraduction['id_translator']        = $idContent;
                                $dataTraduction['is_translated']        = 1;
                                $dataTraduction['date_modification']    = time();
                                
                                $idsTraduction[$langue]  = $this->doorGets->dbQI($dataTraduction,'_dg_translator_traduction');
                            }   
                            //file_put_contents($filesTraduction,);
                            $idsTraduction = serialize($idsTraduction);
                            $this->doorGets->dbQU($idContent,array('groupe_traduction'=>$idsTraduction),'_dg_translator');

                        }
                    }

                    FlashInfo::set($this->doorGets->__("Les traductions sont sauvegardées"));
                }
                break;

            case 'add':
                
                if (!empty($this->doorGets->Form->i) && empty($this->doorGets->Form->e) && $is_modules_modo) {
                    
                    $this->doorGets->checkMode();
                    
                    if (empty($this->doorGets->Form->i['sentence'])) {
                        
                        FlashInfo::set($this->doorGets->__("Veuillez saisir une phrase"),"error");
                        $this->doorGets->Form->e['translator_add_sentence'] = 'ok';
                        
                    }
                    
                    if (empty($this->doorGets->Form->e)) {
                        
                        
                        $data['sentence']       = $this->doorGets->Form->i['sentence'];
                        $data['id_user']        = $this->doorGets->user['id'];
                        $data['id_groupe']      = $this->doorGets->user['groupe'];
                        $data['date_creation']  = time();
                        
                        $idContent = $this->doorGets->dbQI($data,$this->doorGets->Table);
                        
                        foreach($this->doorGets->getAllLanguages() as $k=>$v) {
                            
                            $dataTraduction['translated_sentence']  = $this->doorGets->Form->i['sentence'];
                            $dataTraduction['langue']               = $k;
                            $dataTraduction['id_translator']        = $idContent;
                            $dataTraduction['date_modification']    = time();
                            
                            $idsTraduction[$k]           = $this->doorGets->dbQI($dataTraduction,$this->doorGets->Table.'_traduction');

                        }

                        $dataModification['groupe_traduction'] = serialize($idsTraduction);
                        $this->doorGets->dbQU($idContent,$dataModification,$this->doorGets->Table);
                        
                        // Tracker
                        $usersTracking = new UsersTrackEntity(null,$this->doorGets);
                        $usersTracking->setIdSession(session_id())
                            ->setIpUser($_SERVER['REMOTE_ADDR'])
                            ->setUrlPage($_SERVER['REQUEST_URI'])
                            ->setUrlReferer($_SERVER['HTTP_REFERER'])
                            ->setIdUser($User['id'])
                            ->setTitle($data['sentence'])
                            ->setIdGroupe($User['groupe'])
                            ->setLangue($lgActuel)
                            ->setUriModule('translator')
                            ->setIdContent($idContent)
                            ->setAction($this->Action)
                            ->setDate(time())
                            ->save();

                        FlashInfo::set($this->doorGets->__("Vos informations ont bien été mises à jour"));
                        header('Location:./?controller=translator&action=edit&id='.$idContent.'&lg='.$lgActuel); exit();
                        
                    }
                    
                }
                
                break;
            
            case 'edit':
                
                $error = false;
                
                if (!empty($this->doorGets->Form->i)) {
                    
                    $this->doorGets->checkMode();
                    
                    if (empty($this->doorGets->Form->e)) {
                        
                        $dataTraduction['translated_sentence']  = $this->doorGets->Form->i['translated_sentence'];
                        $dataTraduction['is_translated']        = $this->doorGets->Form->i['is_translated'];
                        $dataTraduction['date_modification']    = time();
                        
                        $dataVersion = $dataTraduction;
                        $this->saveLastContentVersion($isContent['id_translator'],$dataVersion);

                        $this->doorGets->dbQU($isContent['id'],$dataTraduction,$this->doorGets->Table.'_traduction');

                        // Tracker
                        $usersTracking = new UsersTrackEntity(null,$this->doorGets);
                        $usersTracking->setIdSession(session_id())
                            ->setIpUser($_SERVER['REMOTE_ADDR'])
                            ->setUrlPage($_SERVER['REQUEST_URI'])
                            ->setUrlReferer($_SERVER['HTTP_REFERER'])
                            ->setIdUser($User['id'])
                            ->setTitle($isContent['sentence'].' -> '.$lgActuel.' -> '.$dataTraduction['translated_sentence'])
                            ->setIdGroupe($User['groupe'])
                            ->setLangue($lgActuel)
                            ->setUriModule('translator')
                            ->setIdContent($isContent['id_translator'])
                            ->setAction($this->Action)
                            ->setDate(time())
                            ->save();

                        FlashInfo::set($this->doorGets->__("Vos informations ont bien été mises à jour"));
                        
                        if (array_key_exists('go_to_next', $this->doorGets->Form->i)) {
                            
                            $idNextContent = $this->doorGets->getContentPaginatePosition('sentence',$isContent['sentence']);
                            header('Location:./?controller=translator&action=edit&id='.$idNextContent.'&lg='.$lgActuel); exit();
                        }

                        header('Location:./?controller=translator&action=edit&id='.$isContent['id_translator'].'&lg='.$lgActuel); exit();
                        
                    }
                    
                    FlashInfo::set($this->doorGets->__("Veuillez remplir correctement le formulaire"),"error");
                    
                }
                
                break;
            
            case 'delete':
                
                if (!empty($this->doorGets->Form->i) && $is_modules_modo) {
                    
                    $this->doorGets->checkMode();
                    
                    if (empty($this->doorGets->Form->e)) {
                        
                        $this->doorGets->dbQD($isContent['id_translator'],$this->doorGets->Table);
                        $this->doorGets->dbQD($isContent['id_translator'],$this->doorGets->Table.'_traduction','id_translator','=','');
                        $this->doorGets->dbQD($isContent['id_translator'],$this->doorGets->Table.'_version','id_content','=','');

                        // Tracker
                        $usersTracking = new UsersTrackEntity(null,$this->doorGets);
                        $usersTracking->setIdSession(session_id())
                            ->setIpUser($_SERVER['REMOTE_ADDR'])
                            ->setUrlPage($_SERVER['REQUEST_URI'])
                            ->setUrlReferer($_SERVER['HTTP_REFERER'])
                            ->setIdUser($User['id'])
                            ->setTitle($isContent['sentence'])
                            ->setIdGroupe($User['groupe'])
                            ->setLangue($lgActuel)
                            ->setUriModule('translator')
                            ->setIdContent($isContent['id_translator'])
                            ->setAction($this->Action)
                            ->setDate(time())
                            ->save();

                        FlashInfo::set($this->doorGets->__("La phrase a été corréctement supprimer"));
                        header('Location:./?controller=translator');
                        exit();
                        
                    }
                }
                
                break;
        }
    }

    public function saveLastContentVersion($id_translator,$next_content = array()) {

        $lgActuel       = $this->doorGets->getLangueTradution();
        $User           = $this->doorGets->user;

        // Save last Version
        $isLastVersionTemp = $isLastVersion = $this->doorGets->dbQS($id_translator,$this->doorGets->Table.'_traduction',"id_translator"," AND langue='$lgActuel' LIMIT 1 ");
        if (!empty($isLastVersion)) {

            unset($isLastVersion['id']);
            unset($isLastVersionTemp['id']);
            if (array_key_exists('date_modification', $isLastVersionTemp)) {
                unset($isLastVersionTemp['date_modification']);
            }
            if (array_key_exists('id_translator', $isLastVersionTemp)) {
                $isLastVersionTemp['id_translator'] =  $isLastVersionTemp['id_translator'];
                unset($isLastVersionTemp['id_translator']);
            }
            
            $next_content['pseudo']         = $isLastVersion['pseudo']          = $isLastVersionTemp['pseudo']          = $User['pseudo'];
            $next_content['id_user']        = $isLastVersion['id_user']         = $isLastVersionTemp['id_user']         = $User['id'];
            $next_content['id_groupe']      = $isLastVersion['id_groupe']       = $isLastVersionTemp['id_groupe']       = $User['groupe'];
            $next_content['date_creation']  = $isLastVersion['date_creation']   = $isLastVersionTemp['date_creation']   = time();

            if (count($next_content) > 4) {

                foreach ($isLastVersion as $key => $value) {
                    if (!array_key_exists($key, $next_content)) {
                        unset($isLastVersion[$key]);
                    }
                }

                ksort($isLastVersion);
                ksort($next_content);
                
                $tempIsLastVersion  = $isLastVersion;
                $tempNext_content   = $next_content;

                unset($tempNext_content['date_modification']);
                unset($tempIsLastVersion['date_modification']);

                $checkIfDataEqualLastVersion = strcmp(serialize($tempNext_content), serialize($tempIsLastVersion));

                if ($checkIfDataEqualLastVersion !== 0) {

                    $this->doorGets->dbQI($isLastVersionTemp,$this->doorGets->Table.'_version');
                }
            }
        }
    }
}

