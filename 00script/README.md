# REI (AOE1) scripts

Scripts to make data for AOE (All of gene Expresion) version1 (index for ArrayExpress) are maintained in this directory.

* `00getarfind.sh`, `00getexfind.sh` shell scripts to run `lftp` command to get the list of files in array types and experiments respectively.
	* Array contains adf files, while Experient contains idf & sdrf files.
* `01AA2REI.prl` Perl script to make updated array list for AOE index. The output is thought to be renamed to `99A.txt`.
* `01AE2REI.prl` Perl script to make update experiment list for AOE index. The output will be copied to AOE web server for the update.
