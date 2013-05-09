#!/bin/sh

for TYP  in AFMX  BASE  BUGS  CVDE  EMBL  FPMI  HGMP  JJRD  MARS  MIMR  MUGN  RUBN  SGRP  SYBR  TIGR  UMCU ATMX  BIID  CAGE  DKFZ  ERAD  GEOD  IPKG  LGCL  MAXD  MNIA  NASC  RZPD  SMDB  TABM  TOXM  WMIT BAIR  BIOD  CBIL  DORD  FLYC  GEUV  JCVI  MANP  MEXP  MTAB  NCMF  SEDF  SNGR  TAGC  UCON
do
	echo $TYP
	mkdir $TYP
	cd $TYP
	lftp <<-END
		open ftp.ebi.ac.uk:/pub/databases/microarray/data
		mget experiment/$TYP/*/*.idf.txt
		mget experiment/$TYP/*/*.sdrf.txt
	END
	cd ..
done
