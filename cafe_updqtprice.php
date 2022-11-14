<?php

if (!defined('_PS_VERSION_')) {
    exit;
}

class Cafe_updqtprice extends Module
{
    public function __construct()
    {
        $this->name = 'cafe_updqtprice';
        $this->tab = 'others';
        $this->version = '1.0.0';
        $this->author = 'presta.cafe';
        $this->bootstrap = true;
        parent::__construct();
        $this->displayName = $this->l('cafe_updqtprice');
        $this->description = $this->l('Update price by quantity on product page');
    }

    /**
     * Installation du module
     * @return bool
     */
    public function install()
    {
        if (!parent::install()
            || !$this->registerHook([
                'header',
            ])
        ) {
            return false;
        }
        return true;
    }

    /**
     * Désinstallation du module
     * @return bool
     */
    public function uninstall()
    {
        if (
            !parent::uninstall()
        ) {
            return false;
        }
        return true;
    }

    public function hookDisplayHeader($params)
    {
        $page = Dispatcher::getInstance()->getController();

        if ($page == 'product') {
            $currency = new Currency((int)$params["cookie"]->id_currency);
            Media::addJsDef(['currency' => $currency->sign]);
            $this->context->controller->addJS(($this->_path).'views/js/cafe_updqtprice.js');
        } else {
            return false;
        }
    }
}
