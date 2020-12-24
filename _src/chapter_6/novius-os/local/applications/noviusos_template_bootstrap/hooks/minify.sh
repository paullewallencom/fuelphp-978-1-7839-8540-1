#!/bin/bash
files=`git diff --cached --name-status`

# http://stackoverflow.com/questions/59895/can-a-bash-script-tell-what-directory-its-stored-in
DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"
cd $DIR/../

re="static/js/"
if [[ $files =~ $re ]]
then
    ./hooks/minify-js.sh
    git add static/js/*
fi
