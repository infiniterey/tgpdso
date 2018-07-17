<?php
	include_once 'pdolib.php';

	$dbc = new Pdolib();

	$table1 = "units";
	$query1 = "CREATE TABLE IF NOT EXISTS units
	(
		unitID int NOT NULL auto_increment,
		unitName varchar(100) NOT NULL,
		unitManager varchar(200) NOT NULL,
		PRIMARY KEY(unitId)
	) ENGINE = MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=0;";

	if (!$dbc->tableExists($table1)) {	
      $dbc->createTable($table1,$query1);
  }

  $table2 = "plans";
  $query2 = "CREATE TABLE IF NOT EXISTS plans
  (
  	planID int NOT NULL auto_increment,
  	planCode varchar(20) NOT NULL,
  	planDesc varchar(150) NOT NULL,
  	planRate varchar(10) NOT NULL,
  	PRIMARY KEY(planID)
  ) ENGINE = MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=0;";

	if (!$dbc->tableExists($table2)) {	
      $dbc->createTable($table2,$query2);
  }

  $table3 = "agents";
  $query3 = "CREATE TABLE IF NOT EXISTS agents
  (
  	agentCode int NOT NULL,
  	agentLastname varchar(100) NOT NULL,
  	agentFirstname varchar(100) NOT NULL,
  	agentMiddlename varchar(100) NOT NULL,
  	agentBirthdate date NOT NULL,
  	agentApptDate date NOT NULL,
  	agentUnit varchar(100) NOT NULL,
  	agentPosition varchar(100) NOT NULL,
  	PRIMARY KEY(agentCode)
  ) ENGINE = MyISAM DEFAULT CHARSET=latin1;";

	if (!$dbc->tableExists($table3)) {	
      $dbc->createTable($table3,$query3);
  }

  $table4 = "production";
  $query4 = "CREATE TABLE IF NOT EXISTS production
  (
  	prodID int NOT NULL auto_increment,
  	transDate date NOT NULL,
  	lastName varchar(100) NOT NULL,
  	firstName varchar(100) NOT NULL,
  	policyNo varchar(20) NOT NULL,
  	plan varchar(50) NOT NULL,
  	premium varchar(20) NOT NULL,
  	receiptNo varchar(20),
  	faceAmount varchar(20) NOT NULL,
  	rate varchar(10) NOT NULL,
  	FYC varchar(20) NOT NULL,
  	modeOfPayment varchar(20) NOT NULL,
    issuedDate date,
    SOAdate date,
  	agent varchar(200) NOT NULL,
  	remarks varchar(20) NOT NULL,
  	PRIMARY KEY(prodID)
  ) ENGINE = MyISAM DEFAULT CHARSET=latin1 auto_increment=0;";

	if (!$dbc->tableExists($table4)) {	
      $dbc->createTable($table4,$query4);
  }
?>