<?php

/* * *************************************************************
 * Extension Manager/Repository config file for ext: "cdsrc_jsoncobj"
 *
 * Auto generated by Extension Builder 2014-04-15
 *
 * Manual updates:
 * Only the data in the array - anything else is removed by next write.
 * "version" and "dependencies" must not be touched!
 * ************************************************************* */

$EM_CONF[$_EXTKEY] = array(
    'title' => 'Recaptcha for form',
    'description' => 'Extend default CORE form extension with recaptcha predifined element',
    'category' => 'plugin',
    'author' => 'Matthias Toscanelli',
    'author_email' => 'm.toscanelli@code-source.ch',
    'author_company' => 'Code-Source',
    'shy' => '',
    'priority' => '',
    'module' => '',
    'state' => 'stable',
    'internal' => '',
    'uploadfolder' => '0',
    'createDirs' => '',
    'modify_tables' => '',
    'clearCacheOnLoad' => 0,
    'lockType' => '',
    'version' => '1.0.0',
    'constraints' => array(
        'depends' => array(
            'extbase' => '6.2.0-6.2.99',
            'fluid' => '6.2.0-6.2.99',
            'typo3' => '6.2.0-6.2.99',
            'jm_recaptcha' => '1.3.3+',
        ),
        'conflicts' => array(
        ),
        'suggests' => array(
        ),
    ),
);
?>