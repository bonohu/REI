--
-- database; rei
--
use rei;
 
CREATE TABLE test (
  id          varchar(16) NOT NULL,
  description text,
  date	date,
  arraytype text,
  arraygroup varchar(16),
  organisms text,	
  reporg text,	
  PRIMARY KEY  (id)
) TYPE=MyISAM;
