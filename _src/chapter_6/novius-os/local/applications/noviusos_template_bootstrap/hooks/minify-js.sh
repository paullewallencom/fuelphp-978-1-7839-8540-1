#!/bin/bash

# http://stackoverflow.com/questions/59895/can-a-bash-script-tell-what-directory-its-stored-in
DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"
cd $DIR/../static/js

> /tmp/nos-license
printf "/**\n * NOVIUS OS - Web OS for digital communication\n *\n * @copyright  2011 Novius\n * @license    GNU Affero General Public License v3 or (at your option) any later version\n *             http://www.gnu.org/licenses/agpl-3.0.html\n * @link http://www.novius-os.org\n */\n" > /tmp/nos-license

JS_FILES=( script admin/grid admin/iframe admin/layout )

for F in ${JS_FILES[@]}; do
    yui-compressor -o "$F.temp.js" "$F.js"
    cat /tmp/nos-license "$F.temp.js" > "$F.min.js"
    rm "$F.temp.js"
done
