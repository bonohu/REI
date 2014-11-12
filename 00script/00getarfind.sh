#!/bin/sh
# Get list of files in arrayexpress ftp site(array)
lftp <<-END
        open ftp.ebi.ac.uk:/pub/databases/microarray/data/array
        find
END
