#!/bin/sh
# get list of files in AE ftp site(experiment)
lftp <<-END
        open ftp.ebi.ac.uk:/pub/databases/microarray/data/experiment
        find
END
