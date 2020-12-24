<?php
/**
 * NOVIUS OS - Web OS for digital communication
 *
 * @copyright  2011 Novius
 * @license    GNU Affero General Public License v3 or (at your option) any later version
 *             http://www.gnu.org/licenses/agpl-3.0.html
 * @link http://www.novius-os.org
 */

# loadViewConfig()
# LOADS CONFIG FOR THE CURRENT VIEW
# You can add configs in the file config/template.config.php

namespace Nos\Templates\Basic;

function loadViewConfig()
{
    \Config::load('noviusos_templates_basic::template', 'template');
    $config = \Config::get('template');

    return $config;
}
