<?php
class GoogleMerchantFeedModuleFrontController extends ModuleFrontController
{
    public function initContent()
    {
        parent::initContent();

        ob_start(); // Start output buffering

        $feed = $this->module->generateFeed();

        if ($feed === false) {
            header('HTTP/1.1 500 Internal Server Error');
            echo 'Error generating feed. Please check logs for more details.';
            ob_end_flush(); // Flush the buffer and turn off output buffering
            exit;
        }

        header('Content-Type: application/xml');
        echo $feed;

        ob_end_flush(); // Flush the buffer and turn off output buffering
        exit;
    }
}
