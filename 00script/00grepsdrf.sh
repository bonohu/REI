#!/bin/sh
# argument: ls-lRyymmdd.txt

grep sdrf.txt $1 \
| sort

# result should be redirected to yymmddsdrf.txt

# followed by the command like
# diff 141003sdrf.txt 141110sdrf.txt|grep ^\>|perl -pe 's/^\>/GET/'
