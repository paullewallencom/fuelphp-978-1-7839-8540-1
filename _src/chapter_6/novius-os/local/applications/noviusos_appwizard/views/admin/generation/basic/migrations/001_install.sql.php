<?php
/**
 * NOVIUS OS - Web OS for digital communication
 *
 * @copyright  2011 Novius
 * @license    GNU Affero General Public License v3 or (at your option) any later version
 *             http://www.gnu.org/licenses/agpl-3.0.html
 * @link http://www.novius-os.org
 */

if (isset($data['models'])) {
    foreach ($data['models'] as $model) {
        echo render(
            $config['generation_path'].'/misc/model.sql',
            array(
                'model' => $model,
                'data' => $data,
                'config' => $config,
            )
        );
        echo "\n";
    }
}
