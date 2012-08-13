#!/bin/bash
#-vx

# ---------------------------------------------------------------
#
# Batch compression for static website assets with yui-compressor
#
# @author Jens-Andre Koch <vain@clansuite.com>
# @license GPLv2+
# v18.02.2012
#
# ---------------------------------------------------------------<3

# exit on non-true
set -e

#
# fetch path as parameter 1
#
#if test $# -lt 1 ; then
#  echo Usage: "${0##/*} [target file path]"
#  echo Please append a target file path.
#  exit
#fi

echo "Compressing Javascript and CSS files with YUI-Compressor"
echo;

sum_normal=0
sum_compressed=0

# replace ./ with $1 to accept parameter 1

files=`find ./ -type f -not -path "*/.svn*" -iname "*.js" -or -iname "*.css"`;

for filepath in $files
do
  echo "Processing $filepath"

  file=${filepath#*/}
  filename=${file%.*}
  ext=${file##*.}
  path=${filepath%.*}
  filen=$( basename "$filepath")

  if [[ "$file" == *.js ]] ;
  then
     uncompressed_filename=${filepath%.*}".js"
     output_filename=${filepath%.*}".min.js" # DOT file.min.js
  fi

  if [[ "$file" == *.css ]] ;
  then
     output_filename=${filepath%.*}"-min.css" # MINUS file-min.css
  fi

  #echo "File $file"
  #echo "Filename $filename"
  #echo "Extension $ext"
  #echo "File on Path $path"
  #echo "New filename $output_filename"

  # ignore Jquery minified
  if [[ "$file" == *jquery.min.js ]];
  then
        echo 'Ignoring JQuery (minified).';
        continue;
  fi

  # Delete existing minified files, if uncompressed version exists
  if [[ "$file" == *min.js ]] || [[ "$file" == *min.css ]];
  then
    #echo "The minifed file is deleted, when a uncompressed version of this file is found."

    # if the uncompressed version is no newer than the compressed version
    # and might be deleted.
    # @todo debug condition
    if [ ! "$file" -nt "$filename.$ext" ] ;
    then
       echo "File already minified. Removing..  rm.$path.$ext"
       echo "uncompressed file exists $uncompressed_filename - $filen or $filename"
       rm -v -f $path.$ext
       continue;
    fi
    break;
  fi

# save and show the filesize before compression
size_normal=`cat $filepath | wc -c`
echo "Normal: $size_normal"

# apply compression; save and show the filesize after compression
echo "Excuting command: yui-compressor --type $ext $filepath -o $output_filename"

yui-compressor --type $ext $filepath -o $output_filename

size_compressed=`cat $output_filename | wc -c`
echo "Compressed: $size_compressed"

# do some stats calculations
sum_normal=$(expr $sum_normal + $size_normal)
sum_compressed=$(expr $sum_compressed + $size_compressed)
savings=$(($sum_normal-$sum_compressed))

done

# print stats
echo "Total uncompressed: $sum_normal"
echo "Total compressed: $sum_compressed"
echo "Your savings by applying compression: $savings"

# goodbye
echo "Have a nice day!"