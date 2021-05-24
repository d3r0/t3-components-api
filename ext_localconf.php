<?php

defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    static function () {
        if (version_compare(TYPO3_branch, '9.5', '>=')) {
            $GLOBALS['TYPO3_CONF_VARS']['SYS']['routing']['enhancers'][\D3r0\ComponentsApi\Routing\Enhancer\ResourceEnhancer::ENHANCER_NAME] = \D3r0\ComponentsApi\Routing\Enhancer\ResourceEnhancer::class;
        } 
    }
);
