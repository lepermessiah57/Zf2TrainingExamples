<?php
/**
 * Global Configuration Override
 *
 * You can use this file for overriding configuration values from modules, etc.
 * You would place values in here that are agnostic to the environment and not
 * sensitive to security.
 *
 * @NOTE: In practice, this file will typically be INCLUDED in your source
 * control, so do not include passwords or other sensitive information in this
 * file.
 */

return array(
    'email' => array(
        'SmtpOptions' =>
            new Zend\Mail\Transport\SmtpOptions(array(
                'name'              => 'gmail',
                'host'              => 'smtp.gmail.com',
                'port'              => 587,
                'connection_class'  => 'login',
                'connection_config' => array(
                    'username'      => '', //put username here
                    'password'      => '', //put password here
                    'ssl'           => 'tls',
                ),
            ))
    )
);
