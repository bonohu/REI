#!/bin/sh

for TYP  in AFFY AGIL ATMX BASE BUGS CBIL DORD EMBL FLYC FPMI GEHB GEOD IPKG JCVI MANP MARS MAXD MEXP NCMF NGEN RUBN RZPD SGRP SMDB SNGR TAGC TIGR TOGR TOXM UCON UHNC UHTS UMCU WMIT

do
	echo $TYP
	mkdir $TYP
	cd $TYP
	lftp <<-END
		open ftp.ebi.ac.uk:/pub/databases/microarray/data
		mget array/$TYP/*/*.adf.txt
	END
	cd ..
done
