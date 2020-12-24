<?php
/**
 * NOVIUS OS - Web OS for digital communication
 *
 * @copyright  2011 Novius
 * @license    GNU Affero General Public License v3 or (at your option) any later version
 *             http://www.gnu.org/licenses/agpl-3.0.html
 * @link http://www.novius-os.org
 */
?>
<h1 class="appwizard">
    <?= __('‘Build your app’ wizard') ?>
</h1>
<div class="appwizard_error">
    <div class="appwizard_error_inside">
        <p>
            <?= __("The application wizard needs to be able to write in the local/applications folder. Please change the folder permissions.") ?>
        </p>
        <div class="appwizard_command_line_container">
            <p>
                <?= __('You could execute the following command line for doing so:') ?>
            </p>
            <div class="appwizard_command_line">
                chmod a+w <?= APPPATH.'applications' ?>
            </div>
        </div>
        <p>
            <a class="appwizard_refresh_link" href="#"><?= __('Refresh when you are ready.') ?></a>
        </p>
    </div>
</div>
<script type="text/javascript">
    require(
        [
            'jquery-nos',
            'link!static/apps/noviusos_appwizard/css/appwizard.css'
        ], function($) {
            jQuery.fn.selectText = function(){
                var doc = document;
                var element = this[0];
                console.log(this, element);
                if (doc.body.createTextRange) {
                    var range = document.body.createTextRange();
                    range.moveToElementText(element);
                    range.select();
                } else if (window.getSelection) {
                    var selection = window.getSelection();
                    var range = document.createRange();
                    range.selectNodeContents(element);
                    selection.removeAllRanges();
                    selection.addRange(range);
                }
            };

            $('.appwizard_command_line').unbind('click').bind('click', function() {
                $(this).selectText();
            });

            $('.appwizard_refresh_link').unbind('click').bind('click', function(e) {
                e.preventDefault();
                $(this).nosAction({
                    action: 'nosTabs',
                    method: 'update',
                    tab: {
                        url: 'admin/noviusos_appwizard/application',
                        reload: true
                    }
                })
            });
        }
    );
</script>
