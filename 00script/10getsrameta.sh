#!/bin/sh

#lftp -c "open ftp://ftp.ncbi.nlm.nih.gov/sra/reports/Metadata && pget -n 8 SRA_Accessions.tab"
lftp -c "open http://sra.dbcls.jp/data && pget -n 8 sra2geo.tab"
