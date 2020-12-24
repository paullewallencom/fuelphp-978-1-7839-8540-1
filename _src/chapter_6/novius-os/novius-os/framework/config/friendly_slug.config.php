<?php
/**
 * NOVIUS OS - Web OS for digital communication
 *
 * @copyright  2011 Novius
 * @license    GNU Affero General Public License v3 or (at your option) any later version
 *             http://www.gnu.org/licenses/agpl-3.0.html
 * @link http://www.novius-os.org
 */

return array(
    'always_last' => array(
        '-{2,}' => '-',
        '-$' => '',
        '^-' => '',
        'lowercase',
    ),

    'active_setup' => 'default',

    'setups' => array(
        'default' => array(
            ' ' => '-',
            '[\?|:|\\|\/|\#|\[|\]|@|&]' => '-',
        ),
        'no_accent' => array(
            '[éèêë]' => array('replacement' => 'e', 'flags' => 'i'),
            '[áàâä]' => array('replacement' => 'a', 'flags' => 'i'),
            '[íìîï]' => array('replacement' => 'i', 'flags' => 'i'),
            '[óòôõö]' => array('replacement' => 'o', 'flags' => 'i'),
            '[úùûü]' => array('replacement' => 'u', 'flags' => 'i'),
            '[ç]' => array('replacement' => 'c', 'flags' => 'i'),
            '[ñ]' => array('replacement' => 'n', 'flags' => 'i'),
        ),
        'no_special' => array(
            '[^\w\-_]' => array('replacement' => '-', 'flags' => 'i'),
        ),
        'no_accent_and_special' => array(
            'no_accent',
            'no_special',
        ),
    ),
);
