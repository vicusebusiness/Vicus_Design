<?php

namespace Vicus\Design\Model;

use \Vicus\Design\Helper\DesignHelper;
use \Magento\Framework\Filesystem;
use \Magento\Framework\App\Filesystem\DirectoryList;
use Symfony\Component\Console\Input\ArrayInput;

class Generator
{

    protected $helper;
    protected $fileSystem;
    protected $directoryList;

    public function __construct(
        DesignHelper $helper, 
        Filesystem $fileSystem, 
        DirectoryList $directoryList,
    ) {
        $this->helper = $helper;
        $this->fileSystem = $fileSystem;
        $this->directoryList = $directoryList;
    }

    protected function getContents($empty) {

        // $locales = $this->helper->getLocales();
        // foreach ($locales as $locale) {
        //     $materialPath = $this->directoryList->getPath(DirectoryList::APP) . '/design/' . $this->helper->getTheme()->getFullPath() . '/web/css/source/_daniel.less';
        //     $materialPathToDeleteBeforeCompiling = $this->directoryList->getPath(DirectoryList::TMP_MATERIALIZATION_DIR) . '/' . $this->helper->getTheme()->getFullPath() . '/' . $locale . '/css/source/_daniel.less';
        
            // $materialPathArray = [
            //     $materialPathToDeleteBeforeCompiling,
            //     $materialPath
            // ];
            // \Magento\Framework\App\ObjectManager::getInstance()->get('Psr\Log\LoggerInterface')->info(print_r($empty)) . PHP_EOL;
            // echo print_r($empty) . PHP_EOL;
            
            if ($empty == false) {
                \Magento\Framework\App\ObjectManager::getInstance()->get('Psr\Log\LoggerInterface')->info('var empty = true') . PHP_EOL;
                $contents = '';
                // $this->saveFile($contents, $materialPathArray);
                return $contents;
            }

            \Magento\Framework\App\ObjectManager::getInstance()->get('Psr\Log\LoggerInterface')->info('var empty = false') . PHP_EOL;

            $colorEen = $this->helper->getStoreConfig('design/designSetting/color_1');
            $colorTwee = $this->helper->getStoreConfig('design/designSetting/color_2');
            $colorDrie = $this->helper->getStoreConfig('design/designSetting/color_3');
            $colorPagination = $this->helper->getStoreConfig('design/designSetting/color_pagination');
            $paginationColorState = $this->helper->getStoreConfig('design/designSetting/pagination_color_state');
            $heading1Color = $this->helper->getStoreConfig('design/designSetting/heading1_color');
            $heading2Color = $this->helper->getStoreConfig('design/designSetting/heading2_color');
            $heading3Color = $this->helper->getStoreConfig('design/designSetting/heading3_color');
            $heading4Color = $this->helper->getStoreConfig('design/designSetting/heading4_color');
            $heading5Color = $this->helper->getStoreConfig('design/designSetting/heading5_color');
            $heading6Color = $this->helper->getStoreConfig('design/designSetting/heading6_color');
            $linkColor = $this->helper->getStoreConfig('design/designSetting/link_color');
            $callToActionButtonBgColor = $this->helper->getStoreConfig('design/designSetting/call_to_action_button_bg_color');
            $callToActionButtonBgColorState = $this->helper->getStoreConfig('design/designSetting/call_to_action_button_bg_color_state');
            $secondaryBtnBgColor = $this->helper->getStoreConfig('design/designSetting/secondary_btn_bg_color');
            $secondaryBtnBgColorState = $this->helper->getStoreConfig('design/designSetting/secondary_btn_bg_color_state');
            $secondaryBtnTextColor = $this->helper->getStoreConfig('design/designSetting/secondary_btn_text_color');
            $secondaryBtnExtColorState = $this->helper->getStoreConfig('design/designSetting/secondary_btn_text_color_state');
            $listTextColor = $this->helper->getStoreConfig('design/designSetting/list_text_color');
            $navigationBgColor = $this->helper->getStoreConfig('design/designSetting/navigation_bg_color');	
            $headerTopBackgroundColor = $this->helper->getStoreConfig('design/designSetting/header_top_background_color');
            $headerMiddleBackgroundColor = $this->helper->getStoreConfig('design/designSetting/header_mid_background_color');
            $menuTopItemHoverBgColor = $this->helper->getStoreConfig('design/designSetting/menu_top_item_hover_bg_color');	
            $headerTopTextColor = $this->helper->getStoreConfig('design/designSetting/header_top_text_color');	
            $headerMiddleTextColor = $this->helper->getStoreConfig('design/designSetting/header_mid_text_color');
            $menuTopItemColor = $this->helper->getStoreConfig('design/designSetting/menu_top_item_color');
            // $menuMiddleItemColor = $this->helper->getStoreConfig('design/designSetting/menu_mid_item_color');
            $menuTopItemHoverTextColor = $this->helper->getStoreConfig('design/designSetting/menu_top_item_hover_text_color');
            $footerTopBackground = $this->helper->getStoreConfig('design/designSetting/footer_top_background');
            $footerMiddleBackground = $this->helper->getStoreConfig('design/designSetting/footer_middle_background');
            $footerBottomBackground = $this->helper->getStoreConfig('design/designSetting/footer_bottom_background');
            $footerTopTextColor = $this->helper->getStoreConfig('design/designSetting/footer_top_text_color');
            $footerMiddleTextColor = $this->helper->getStoreConfig('design/designSetting/footer_middle_text_color');
            $footerBottomTextColor = $this->helper->getStoreConfig('design/designSetting/footer_bottom_text_color');
            $footerOutsideBackground = $this->helper->getStoreConfig('design/designSetting/footer_outside_background');
            $wishlistBtnColor = $this->helper->getStoreConfig('design/designSetting/wishlist_btn_color');
    
            $colorData = [
                '@primary-color:' . $colorEen . ';', 
                '@secondary-color:' . $colorTwee . ';', 
                '@support-color1:' . $colorDrie . ';',
                '@pagination-color:' . $colorPagination . ';',
                '@pagination-color-state:' . $paginationColorState . ';',
                '@heading1-color:' . $heading1Color . ';',
                '@heading2-color:' . $heading2Color . ';',
                '@heading3-color:' . $heading3Color . ';',
                '@heading4-color:' . $heading4Color . ';',
                '@heading5-color:' . $heading5Color . ';',
                '@heading6-color:' . $heading6Color . ';',
                '@link-color:' . $linkColor . ';',
                '@call-to-action-button-bg-color:' . $callToActionButtonBgColor . ';',
                '@call-to-action-button-bg-color-state:' . $callToActionButtonBgColorState . ';',
                '@secondary-btn-bg-color:' . $secondaryBtnBgColor . ';',
                '@secondary-btn-bg-color-state:' . $secondaryBtnBgColorState . ';',
                '@secondary-btn-text-color:' . $secondaryBtnTextColor . ';',
                '@secondary-btn-text-color-state:' . $secondaryBtnExtColorState . ';',
                '@list-text-color:' . $listTextColor . ';',
                '@navigation-bg-color:' . $navigationBgColor . ';',
                '@header-top-background-color:' . $headerTopBackgroundColor . ';',
                '@header-mid-background-color:' . $headerMiddleBackgroundColor . ';',
                '@menu-top-item-hover-bg-color:' . $menuTopItemHoverBgColor . ';',
                '@header-top-text-color:' . $headerTopTextColor . ';',
                '@header-mid-text-color:' . $headerMiddleTextColor . ';',
                '@menu-top-item-color:' . $menuTopItemColor . ';',
                // '@menu-mid-item-color:' . $menuMiddleItemColor . ';',
                '@menu-top-item-hover-text-color:' . $menuTopItemHoverTextColor . ';',
                '@footer-top-background:' . $footerTopBackground . ';',
                '@footer-middle-background:' . $footerMiddleBackground . ';',
                '@footer-bottom-background:' . $footerBottomBackground . ';',
                '@footer-top-text-color:' . $footerTopTextColor . ';',
                '@footer-middle-text-color:' . $footerMiddleTextColor . ';',
                '@footer-bottom-text-color:' . $footerBottomTextColor . ';',
                '@footer-outside-background:' . $footerOutsideBackground . ';',
                '@wishlist-btn-color:' . $wishlistBtnColor . ';',
            ];
    
                    
            $contents = implode("\n", $colorData);
            // execute($contents);
            // $this->saveFile($contents, $materialPathArray);
            return $contents;
        // }
    }

    public function execute($empty = false) {

        $this->getContents($empty);
        $contents = $this->getContents($empty);

        $pathConfig = DirectoryList::getDefaultConfig();
        $media = $this->fileSystem->getDirectoryWrite(DirectoryList::APP);
      
        $fullPathReal = 'design/' . $this->helper->getTheme()->getFullPath() . '/web/css/source/_daniel.less';
        $locales = $this->helper->getLocales();

        foreach ($locales as $locale) {

            // This line is the dynamic build up for the directory and file that needs to be deleted.
            $materialPathToDeleteBeforeCompiling = $this->directoryList->getPath(DirectoryList::TMP_MATERIALIZATION_DIR) . '/' . $this->helper->getTheme()->getFullPath() . '/' . $locale . '/css/source/_daniel.less';
            $materialPathToDeleteBeforeCompiling2 = $this->directoryList->getPath(DirectoryList::TMP_MATERIALIZATION_DIR) . '/' . $this->helper->getTheme()->getFullPath() . '/' . $locale . '/css/source/_variables_extend.less';
            $materialPath = $this->directoryList->getPath(DirectoryList::APP) . '/design/' . $this->helper->getTheme()->getFullPath() . '/web/css/source/_daniel.less';
            $deleteFolderWithThisPath = $this->directoryList->getPath(DirectoryList::STATIC_VIEW) . '/' . $this->helper->getTheme()->getFullPath() . '/' . $locale . '/css'; 

            $materialPathArray = [
                $materialPathToDeleteBeforeCompiling,
                $materialPath
            ];

            if (file_exists($materialPathToDeleteBeforeCompiling && $materialPathToDeleteBeforeCompiling2)) {
                // unlink($materialPathToDeleteBeforeCompiling);
                unlink($materialPathToDeleteBeforeCompiling2);
            }

            if (is_dir($deleteFolderWithThisPath)) {
                array_map('unlink', glob("$deleteFolderWithThisPath/*.*"));

                rmdir($deleteFolderWithThisPath);
                // Voor debugging redenen
                // echo $materialPathToDeleteBeforeCompiling . PHP_EOL;
                // echo $materialPathToDeleteBeforeCompiling2 . PHP_EOL;
                // echo $materialPath . PHP_EOL;
                // echo $deleteFolderWithThisPath . PHP_EOL;
            }
            $this->saveFile($contents, $materialPathArray);

            
            // if (file_exists($materialPath)) {
                
            //     unlink($materialPath);
            // }
            // $fp = fopen($materialPath, "w");
            // fwrite($fp, $contents);
            // fclose($fp);  
            // shell_exec('php bin/magento setup:static-content:deploy -f');
        }

        

        return 69;
    }

    protected function saveFile($contents, $paths) {
        foreach ($paths as $path) {
            if (file_exists($path)) {
                // echo $path . PHP_EOL;
                // echo 'file deleted' . PHP_EOL;    
                unlink($path);
                // shell_exec('php bin/magento setup:static-content:deploy -f');
            }
            $fp = fopen($path, "w");
            // echo 'write file1' . $path . PHP_EOL;
            // echo 'write file' . $fp . PHP_EOL;
            fwrite($fp, $contents);
            fclose($fp);
            return 69;
        }
    }
}

?>