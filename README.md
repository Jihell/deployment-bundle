DeploymentBundle
======================

Simple bundle to run multiple commands at once for deployment

1- Install
----------

Add plugin to your composer.json require:

    {
        "require": {
            "jihel/deployment-bundle": "dev-master",
        }
    }

or

    php composer.phar require jihel/deployment-bundle

Add bundle to AppKernel.php

    public function registerBundles()
    {
        $bundles = array(
            ...
            new Jihel\Plugin\DeploymentBundle\JihelPluginDeploymentBundle(),
        );
    }


2- Configure your config.yml
----------------------------

Add commands to your config.yml in the exact order you want them to be executed:

    jihel_plugin_deployment:
        commands:
            - "php app/console cache:clear --env=prod"
            - "php app/console assets:install web/"
            - "php app/console assetic:dump --force --env=prod"
            - "php app/console fos:js-routing:dump"


3- Usage
--------

Simply run the command:

    php app/console jihel:plugin:deploy


4- Thanks
---------

Thanks to me for giving my free time doing class for lazy developers.
You can access read CV [here](http://www.joseph-lemoine.fr)
