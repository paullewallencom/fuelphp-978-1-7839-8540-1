/**
 * NOVIUS OS - Web OS for digital communication
 *
 * @copyright  2011 Novius
 * @license    GNU Affero General Public License v3 or (at your option) any later version
 *             http://www.gnu.org/licenses/agpl-3.0.html
 * @link http://www.novius-os.org
 */

$(document).ready(function(){


    twitter(document, "script", "twitter-wjs");

    //---------------------------------------------------------------------------------
    //------------------------ Configuration Visuelle        --------------------------
    //---------------------------------------------------------------------------------

    $('button , input[type="submit"]').addClass("btn btn-default");
});

function twitter(d,s,id) {
    var js, fjs = d.getElementsByTagName(s)[0], p = /^http:/.test(d.location) ? 'http' : 'https';
    if (1) {//!d.getElementById(id)
        js = d.createElement(s);
        js.id = id;
        js.src = p + "://platform.twitter.com/widgets.js";
        fjs.parentNode.insertBefore(js, fjs);
    }
};

function setStyleSheet(title)
{
    var i, obj, found;

    found = false;
    for (i = 0; (obj = document.getElementsByTagName("link")[i]); i++)
    {
        if (obj.getAttribute("rel").indexOf("style") != -1 && obj.getAttribute("title"))
        {
            obj.disabled = true;
            if (obj.getAttribute("title") == title)
            {
                obj.disabled = false;
                found = true;
            }
        }
    }
    if (found == true)
    {
        date = new Date();
        date.setFullYear(date.getFullYear() + 1);
    }
}

