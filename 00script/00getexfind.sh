#!/bin/sh
# Get list of files in arrayexpress ftp site(experiment)
lftp <<-END
        open ftp.ebi.ac.uk:/pub/databases/microarray/data/experiment
        find
END
