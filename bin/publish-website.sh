#!/bin/sh

# One-Click Deployment for the Website "clansuite.com"

# pull master branch from github
wget https://github.com/Clansuite/website-clansuite.com --no-check-certificate -O website-clansuite.zip

# guess what...
unzip website-clansuite.zip

# rename the crappy github hash directory name
mv Clansuite-website-clansuite-* xy

#
# compress static files
#
#compress-static-assets