#!/bin/sh
# argument: ls-lRyymmdd.txt

grep idf.txt $1 \
| sort
# > yymmddidf.txt

# followed by the command like,,,
# diff 141003idf.txt 141110idf.txt|grep ^\>|perl -pe 's/^\>/GET/'
