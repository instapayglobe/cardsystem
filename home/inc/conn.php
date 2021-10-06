<?php

$host = 'localhost';
$user = 'rpsseduc_rpss';
$password = 'D^6xlngu4V9S';
$db = 'rpsseduc_rpss';
$_SESSION['message'] = $_SESSION['u_id']= '';
//create mysql connection
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = mysqli_connect($host, $user, $password, $db);
if ($mysqli== False) {
    printf("Connection failed: %s\n", mysqli_connect_error());
    die();
}
	function fetch_data($table_name, $where_to, $where_is, $data )
  { 
$sql = "SELECT $data FROM $table_name WHERE $where_to ='$where_is'";
                            $result = mysqli_query($GLOBALS['mysqli'], $sql);
                                if (mysqli_num_rows($result) > 0) { 
                                    while($row = mysqli_fetch_assoc($result)) {
                                       $f_data = $row[$data]; }       }
                                       else {
                                        $f_data = '0';
                                       }
  return $f_data;
  } 
  $certi_name = "";
function get_certiname($id) { 
switch($id) {//Department of Computer 
case "SCC101" : $certi_name= "ADVANCE DIPLOMA IN COMPUTER APPLICATION (ONE YEAR)";  break;
case "SCC102" : $certi_name= "ADVANCE DIPLOMA IN COMPUTER LANGUAGE (ONE YEAR)";  break;
case "SCC103" : $certi_name= "ADVANCE DIPLOMA IN COMPUTER ACCOUNTING (ONE YEAR)";  break;
case "SCC104" : $certi_name= "ADVANCE DIPLOMA IN COMPUTER TEACHER TRAINING (ONE YEAR)";  break;
case "SCC105" : $certi_name= "ADVANCE DIPLOMA IN COMPUTER HARDWARE  (ONE YEAR)";  break;
case "SCC106" : $certi_name= "DIPLOMA IN COMPUTER APPLICATION(SIX MONTHS)";  break;
case "SCC107" : $certi_name= "DIPLOMA IN COMPUTER TEACHER TRAINING (SIX MONTH)";  break;
case "SCC108" : $certi_name= "DIPLOMA IN COMPUTER ACCOUNTING (SIX MONTH)";  break;
case "SCC109" : $certi_name= "DIPLOMA IN COMPUTER AIDED DESIGNING (SIX MONTH)";  break;
case "SCC110" : $certi_name= "DIPLOMA IN COMPUTER HARDWARE (SIX MONTH)";  break;
case "SCC111" : $certi_name= "DIPLOMA IN COMPUTER DESKTOP PUBLISHING (SIX MONTH)";  break;
case "SCC112" : $certi_name= "CERTIFICATE IN COMPUTER APPLICATION (THREE MONTH)";  break;
case "SCC113" : $certi_name= "CERTIFICATE IN COMPUTER  ACCOUNTING (THREE MONTH)";  break;
case "SCC114" : $certi_name= "CERTIFICATE IN COMPUTER LANGUAGE (THREE MONTH)";  break;
case "SCC115" : $certi_name= "CERTIFICATE IN COMPUTER AIDED DESIGNING (THREE MONTH)";  break;
case "SCC116" : $certi_name= "INDUSTRIAL DIPLOMA IN COMPUTER APPLICATION (TWO YEAR)";  break;
case "SCC117" : $certi_name= "MASTER DIPLOMA IN COMPUTER APPLICATION (ONE YEAR)";  break;
case "SCC118" : $certi_name= "MASTER DIPLOMA IN COMPUTER ACCOUNTING (ONE YEAR)";  break;
case "SCC119" : $certi_name= "POST GRADUATE DIPLOMA IN COMPUTER AIDED DESIGNING (ONE YEAR)";  break;
case "SCC120" : $certi_name= "POST GRADUATE DIPLOMA IN COMPUTER APPLICATION (ONE YEAR)";  break;
case "SCC121" : $certi_name= "MASTER DIPLOMA IN COMPUTER APPLICATION (FIFTEEN MONTH)";  break;
case "SCC122" : $certi_name= "DIPLOMA IN COMPUTER SCIENCE (LATERAL ENTRY) (TWO YEAR)";  break;
case "SCC123" : $certi_name= "DIPLOMA IN COMPUTER SCIENCE  (THREE YEAR)";  break;
case "SCC124" : $certi_name= "INDUSTRIAL DIPLOMA IN COMPUTER APPLICATION (TWO YEAR AND SIX MONTH)";  break;
case "SCC125" : $certi_name= "INDUSTRIAL DIPLOMA IN COMPUTER APPLICATION (EIGHTEEN MONTH)";  break;
case "SCC126" : $certi_name= "COMPUTER TEACHER TRAINING (TWO YEAR)";  break;
case "SCC127" : $certi_name= "INDUSTRIAL DIPLOMA IN COMPUTER ACCOUNTING (TWO YEAR)";  break;

//Department of Accounting 
case "SCC128" : $certi_name= "ADVANCE DIPLOMA IN COMPUTER ACCOUNTING (ONE YEAR)";  break;
case "SCC129" : $certi_name= "DIPLOMA IN COMPUTER ACCOUNTING (SIX MONTH)";  break;
case "SCC130" : $certi_name= "CERTIFICATE IN COMPUTER  ACCOUNTING (THREE MONTH)";  break;
case "SCC131" : $certi_name= "MASTER DIPLOMA IN COMPUTER ACCOUNTING (ONE YEAR)";  break;
case "SCC132" : $certi_name= "CERTIFICATE IN TALLY ERP 9 (THREE MONTH)";  break;
case "SCC133" : $certi_name= "INDUSTRIAL DIPLOMA IN COMPUTER ACCOUNTING (TWO YEAR)";  break;

// Department of Languages
case "SCC134" : $certi_name= "ADVANCE DIPLOMA IN COMPUTER LANGUAGE (ONE YEAR)";  break;
case "SCC135" : $certi_name= "CERTIFICATE IN COMPUTER LANGUAGE (THREE MONTH)";  break;
case "SCC136" : $certi_name= "CERTIFICATE IN VISUAL BASIC (THREE MONTH)";  break;
case "SCC137" : $certi_name= " CERTIFICATE  TRAINING IN HTML (THREE MONTH)";  break;
case "SCC138" : $certi_name= " CERTIFICATE TRAINING IN JAVA (THREE MONTH)";  break;

//Department of Designing
case "SCC139" : $certi_name= "ADVANCE DIPLOMA IN PHOTOGRAPHY (ONE YEAR)";  break;
case "SCC140" : $certi_name= "DIPLOMA IN COMPUTER AIDED DESIGNING (SIX MONTH)";  break;
case "SCC141" : $certi_name= "DIPLOMA IN FASHION DESIGNING (SIX MONTH)";  break;
case "SCC142" : $certi_name= "DIPLOMA IN WEB DESIGNING (SIX MONTH)";  break;
case "SCC143" : $certi_name= "ADVANCE DIPLOMA IN FASHION DESIGNING (ONE YEAR)";  break;
case "SCC144" : $certi_name= "ADVANCE DIPLOMA IN WEB DESIGNING (ONE YEAR)";  break;
case "SCC145" : $certi_name= "ADVANCE DIPLOMA IN INTERIOR DESIGNING (ONE YEAR)";  break;
case "SCC146" : $certi_name= "ADVANCE DIPLOMA IN 2-D ANIMATION (ONE YEAR)";  break;
case "SCC147" : $certi_name= "ADVANCE DIPLOMA IN 3-D DESIGNING (ONE YEAR)";  break;
case "SCC148" : $certi_name= "CERTIFICATE IN WEB DESIGNING (THREE MONTH)";  break;
case "SCC149" : $certi_name= "CERTIFICATE IN FASHION DESIGNING (THREE MONTH)";  break;
case "SCC150" : $certi_name= "CERTIFICATE IN COMPUTER AIDED DESIGNING (THREE MONTH)";  break;
case "SCC151" : $certi_name= "INDUSTRIAL DIPLOMA IN TEXTILE DESIGNING (TWO YEAR)";  break;
case "SCC152" : $certi_name= "ITI - IN - DIGITAL PHOTOGRAPHY (TWO YEAR)";  break;
case "SCC153" : $certi_name= "POST GRADUATE DIPLOMA IN COMPUTER AIDED DESIGNING (ONE YEAR)";  break;
case "SCC154" : $certi_name= "INDUSTRIAL  DIPLOMA IN FASHION DESIGNING (TWO YEAR)";  break;
case "SCC155" : $certi_name= "DIPLOMA IN FASHION DESIGNING (THREE YEAR)";  break;
case "SCC156" : $certi_name= "ADVANCE DIPLOMA IN GRAPHIC DESIGNING (ONE YEAR)";  break;
case "SCC157" : $certi_name= "INDUSTRIAL DIPLOMA IN INTERIOR DESIGNING (TWO YEAR)";  break;
case "SCC158" : $certi_name= "INDUSTRIAL DIPLOMA IN GRAPHIC DESIGNING (TWO YEAR)";  break;
case "SCC159" : $certi_name= "DIPLOMA IN GRAPHIC DESIGNING (SIX MONTH)";  break;

//Department of Hardware & Networking
case "SCC160" : $certi_name= "ADVANCE DIPLOMA IN HARDWARE AND NETWORKING (ONE YEAR)";  break;
case "SCC161" : $certi_name= "ADVANCE DIPLOMA IN COMPUTER HARDWARE  (ONE YEAR)";  break;
case "SCC162" : $certi_name= "DIPLOMA IN COMPUTER HARDWARE (SIX MONTH)";  break;
case "SCC163" : $certi_name= "INDUSTRIAL DIPLOMA IN HARDWARE  (TWO YEAR)";  break;
case "SCC164" : $certi_name= "MASTER DIPLOMA IN HARDWARE AND NETWORKING (ONE YEAR)";  break;
case "SCC165" : $certi_name= "DIPLOMA IN NETWORKING (SIX MONTH)";  break;

//Department of Management
case "SCC166" : $certi_name= "INDUSTRIAL DIPLOMA IN BUSINESS MANAGEMENT (TWO YEAR)";  break;
case "SCC167" : $certi_name= "DIPLOMA IN MEDICAL RECORD MANAGEMENT  (TWO YEAR)";  break;
case "SCC168" : $certi_name= "ITI - IN - FIRE SAFETY  MANAGEMENT  (TWO YEAR)";  break;
case "SCC169" : $certi_name= "ADVANCE DIPLOMA IN BUSINESS MANAGEMENT (ONE YEAR)";  break;
case "SCC170" : $certi_name= "INDUSTRIAL DIPLOMA IN FIRE SAFETY MANAGEMENT (TWO YEAR)";  break;
case "SCC171" : $certi_name= "DIPLOMA IN HOSPITALITY &amp; TOURISM MANAGEMENT (ONE YEAR)";  break;
case "SCC172" : $certi_name= "ADVANCE DIPLOMA IN HOSPITALITY &amp; TOURISM MANAGEMENT (TWO YEAR)";  break;
case "SCC173" : $certi_name= "DIPLOMA IN HOSPITALITY  MANAGEMENT(ONE YEAR)";  break;
case "SCC174" : $certi_name= "ADVANCE DIPLOMA IN HOSPITALITY  MANAGEMENT (TWO YEAR)";  break;
case "SCC175" : $certi_name= "INDUSTRIAL DIPLOMA IN ACCOUNT MANAGEMENT (TWO YEAR)";  break;
case "SCC176" : $certi_name= "DIPLOMA IN BUSINESS MANAGEMENT (SIX MONTH)";  break;
case "SCC177" : $certi_name= "DIPLOMA IN HOSPITALITY MANAGEMENT (ONE YEAR)";  break;
case "SCC178" : $certi_name= "DIPLOMA IN LIBRARY MANAGEMENT (ONE YEAR)";  break;
//Department of Paramedical

case "SCC179" : $certi_name= "ITI - IN - HEALTH SANITARY INSPECTOR (ONE YEAR)";  break;
case "SCC180" : $certi_name= "DIPLOMA IN HEALTH EDUCATION AND COMMUNITY SERVICES (ONE YEAR)";  break;
case "SCC181" : $certi_name= "DIPLOMA IN MEDICAL RECORD MANAGEMENT  (TWO YEAR)";  break;
case "SCC182" : $certi_name= "ADVANCED DIPLOMA IN PHYSIOTHERAPY (TWO YEAR)";  break;
case "SCC183" : $certi_name= "DIPLOMA IN MEDICAL LAB TECHNOLOGY (TWO YEAR)";  break;
case "SCC184" : $certi_name= "DIPLOMA IN OPERATION THEATER ASSISTANT (TWO YEAR)";  break;
case "SCC185" : $certi_name= "DIPLOMA IN NURSING ASSISTANT (ONE YEAR)";  break;
case "SCC186" : $certi_name= "DIPLOMA IN DENTAL ASSISTANT (ONE YEAR)";  break;
case "SCC187" : $certi_name= "ADVANCE DIPLOMA IN CHILD CARE (ONE YEAR)";  break;
case "SCC188" : $certi_name= "ADVANCE DIPLOMA IN MULTIPURPOSE HEALTH WORKER (TWO YEAR)";  break;
case "SCC189" : $certi_name= "GENERAL DUTY ASSISTANT (Two Year)";  break;
case "SCC190" : $certi_name= "CERTIFICATE IN CHILD CARE (THREE MONTH)";  break;
case "SCC191" : $certi_name= "DIPLOMA IN PHYSIOTHERAPY (ONE YEAR)";  break;
case "SCC192" : $certi_name= "DIPLOMA IN ICU TECHNICIAN (Two Year)";  break;
case "SCC193" : $certi_name= "DIPLOMA IN EARLY CHILDHOOD CARE (ONE YEAR)";  break;
case "SCC194" : $certi_name= "ADVANCE DIPLOMA IN CHILD CARE NUTRITION (ONE YEAR)";  break;
case "SCC195" : $certi_name= "DIPLOMA IN MEDICAL LAB TECHNOLOGY (ONE YEAR)";  break;

//Department of Hotel Management
case "SCC196" : $certi_name= "ADVANCE DIPLOMA IN FOOD PROCESSING TECHNOLOGY (ONE YEAR)";  break;
case "SCC197" : $certi_name= "ADVANCE DIPLOMA IN HOUSE KEEPING (ONE YEAR)";  break;
case "SCC198" : $certi_name= "INDUSTRIAL DIPLOMA IN HOUSE KEEPING (TWO YEAR)";  break;
case "SCC199" : $certi_name= "ADVANCE DIPLOMA FOOD AND BEVERAGE SERVICES (ONE YEAR)";  break;
case "SCC200" : $certi_name= "MASTER DIPLOMA IN FOOD AND BEVERAGE SERVICES (ONE YEAR)";  break;
case "SCC201" : $certi_name= "MASTER DIPLOMA FOOD AND BEVERAGE PRODUCTION (ONE YEAR)";  break;
case "SCC202" : $certi_name= "ADVANCE DIPLOMA FRONT OFFICE OPERATIONS (ONE YEAR)";  break;
case "SCC203" : $certi_name= "ADVANCE DIPLOMA FOOD AND BEVERAGE PRODUCTION (ONE YEAR)";  break;
case "SCC204" : $certi_name= "MASTER DIPLOMA FRONT OFFICE OPERATIONS (ONE YEAR)";  break;
case "SCC205" : $certi_name= "CERTIFICATE IN FOOD AND BEVERAGE SERVICES (THREE MONTH)";  break;
case "SCC206" : $certi_name= "DIPLOMA IN FOOD AND BEVERAGE SERVICES (SIX MONTH)";  break;
case "SCC207" : $certi_name= "CERTIFICATE IN FOOD AND BEVERAGE PRODUCTION (THREE MONTH)";  break;
case "SCC208" : $certi_name= "DIPLOMA IN FOOD AND BEVERAGE PRODUCTION (SIX MONTH)";  break;
case "SCC209" : $certi_name= "CERTIFICATE IN HOUSE KEEPING (THREE MONTH)";  break;
case "SCC210" : $certi_name= "DIPLOMA IN HOUSE KEEPING (SIX MONTH)";  break;
case "SCC211" : $certi_name= "DIPLOMA IN FRONT OFFICE OPERATIONS (SIX MONTH)";  break;
case "SCC212" : $certi_name= "INDUSTRIAL DIPLOMA IN FOOD AND BEVERAGE SERVICES (TWO YEAR)";  break;
case "SCC213" : $certi_name= "INDUSTRIAL DIPLOMA IN HOUSE KEEPING (TWO YEAR)";  break;
case "SCC214" : $certi_name= "INDUSTRIAL DIPLOMA IN FRONT OFFICE OPERATIONS (TWO YEAR)";  break;
case "SCC215" : $certi_name= "DIPLOMA IN HOSPITALITY &amp; TOURISM MANAGEMENT (ONE YEAR)";  break;
case "SCC216" : $certi_name= "ADVANCE DIPLOMA IN HOSPITALITY &amp; TOURISM MANAGEMENT (TWO YEAR)";  break;
case "SCC217" : $certi_name= "DIPLOMA IN HOSPITALITY  MANAGEMENT (TWO YEAR)";  break;
case "SCC218" : $certi_name= "ADVANCE DIPLOMA IN HOSPITALITY  MANAGEMENT (TWO YEAR)";  break;
case "SCC219" : $certi_name= "DIPLOMA IN HOSPITALITY MANAGEMENT (ONE YEAR)";  break;
case "SCC220" : $certi_name= "INDUSTRIAL DIPLOMA FOOD AND BEVERAGE PRODUCTION (TWO YEAR)";  break;

//Department of Diploma
case "SCC221" : $certi_name= "DIPLOMA IN MECHANICAL ENGINEERING  (LATERAL  ENTRY) (TWO YEAR)";  break;
case "SCC222" : $certi_name= "DIPLOMA IN MECHANICAL ENGINEERING   (THREE YEAR)";  break;
case "SCC223" : $certi_name= "DIPLOMA IN CIVIL ENGINEERING (THREE YEAR)";  break;
case "SCC224" : $certi_name= "DIPLOMA IN CIVIL ENGINEERING (LATERAL ENTRY)  (TWO YEAR)";  break;
case "SCC225" : $certi_name= "DIPLOMA IN ELECTRONICS  (THREE YEAR)";  break;
case "SCC226" : $certi_name= "DIPLOMA IN COMPUTER SCIENCE (LATERAL ENTRY) (TWO YEAR)";  break;
case "SCC227" : $certi_name= "DIPLOMA IN COMPUTER SCIENCE  (THREE YEAR)";  break;
case "SCC228" : $certi_name= "DIPLOMA IN AUTOMOBILE ENGINEERING (THREE YEAR)";  break;
case "SCC229" : $certi_name= "DIPLOMA IN ELECTRICAL (THREE YEAR)";  break;
case "SCC230" : $certi_name= "DIPLOMA IN ELECTRICAL (LATERAL ENTRY) (TWO YEAR)";  break;
case "SCC231" : $certi_name= "DIPLOMA IN MECHANICAL ENGINEERING (PRODUCTION) (THREE YEAR)"; break;

//Department of Security Management
case "SCC232" : $certi_name= "Certificate in Unarmed Security System(One Year)";  break;
case "SCC233" : $certi_name= "Diploma in Unarmed Security System (Six Month)";  break;

//Department of Stenograph5
case "SCC234" : $certi_name= "CERTIFICATE IN ENGLISH TYPING (SIX MONTH)";  break;
case "SCC235" : $certi_name= "CERTIFICATE IN ENGLISH TYPING (THREE MONTH)";  break;
case "SCC236" : $certi_name= "CERTIFICATE IN ENGLISH TYPING (ONE MONTH)";  break;
case "SCC237" : $certi_name= "CERTIFICATE IN HINDI TYPING (SIX MONTH)";  break;
case "SCC238" : $certi_name= "CERTIFICATE IN HINDI TYPING (THREE MONTH)";  break;
case "SCC239" : $certi_name= "CERTIFICATE IN URDU TYPING (THREE MONTH)";  break;
case "SCC234" : $certi_name= "CERTIFICATE IN ENGLISH AND HINDI TYPING (THREE MONTH)";  break;
case "SCC239" : $certi_name= "ITI - IN - STENOGRAPHY (HINDI) (ONE YEAR)";  break;
case "SCC240" : $certi_name= "ITI - IN - STENOGRAPHY (ENGLISH) (ONE YEAR)";  break;
case "SCC241" : $certi_name= "CERTIFICATE IN PUNJABI TYPING (THREE MONTH)";  break;
case "SCC242" : $certi_name= "CERTIFICATE IN PUNJABI TYPING (ONE MONTH)";  break;
case "SCC243" : $certi_name= "ADVANCE DIPLOMA IN TYPING EXPERT ALL LANGUAGES (TWO YEAR)";  break;

//Department of Vocational ITI
case "SCC244" : $certi_name = "ITI - IN - ELECTRICIAN (TWO YEAR)";  break;
case "SCC245" : $certi_name = "ITI - IN - ELECTRICIAN (one YEAR)";  break;
case "SCC246" : $certi_name = "ITI - IN - ELECTRICIAN (SIX MONTH)";  break;
case "SCC247" : $certi_name = "ITI - IN - WELDER (ONE YEAR)";  break;
case "SCC248" : $certi_name = "ITI - IN - WELDER (TWO YEAR)";  break;
case "SCC249" : $certi_name = "ITI - IN - WELDER (SIX MONTH)";  break;
case "SCC250" : $certi_name = "ITI - IN - FITTER (TWO YEAR)";  break;
case "SCC251" : $certi_name = "ITI - IN - FITTER (ONE YEAR)";  break;
case "SCC252" : $certi_name = "ITI - IN - FITTER (sIX MONTH)";  break;
case "SCC253" : $certi_name = "ITI - IN - PLUMBER (ONE YEAR)";  break;
case "SCC254" : $certi_name = "ITI - IN - PLUMBER (TWO YEAR)";  break;
case "SCC255" : $certi_name = "ITI - IN - PLUMBER (sIX MONTH)";  break;
case "SCC256" : $certi_name = "ITI - IN - DIGITAL PHOTOGRAPHY (TWO YEAR)";  break;
case "SCC257" : $certi_name = "ITI - IN - DIGITAL PHOTOGRAPHY (ONEYEAR)";  break;
case "SCC258" : $certi_name = "ITI - IN - DIGITAL PHOTOGRAPHY (SIX MONTH)";  break;
case "SCC259" : $certi_name = "ITI - IN - COPA (ONE YEAR)";  break;
case "SCC260" : $certi_name = "ITI - IN - HEALTH SANITARY INSPECTOR (ONE YEAR)";  break;
case "SCC261" : $certi_name = "ITI - IN - FIRE SAFETY (ONE YEAR)";  break;
case "SCC262" : $certi_name = "ITI - IN - FIRE SAFETY (SIX MONTH)";  break;
case "SCC263" : $certi_name = "ITI - IN - WIREMAN (TWO YEAR)";  break;
case "SCC264" : $certi_name = "ITI - IN - WIREMAN (ONE YEAR)";  break;
case "SCC265" : $certi_name = "ITI - IN - WIREMAN (SIX MONTH)";  break;
case "SCC266" : $certi_name = "ITI - IN - DRAUGHTSMAN  (Civil) (TWO YEAR)";  break;
case "SCC267" : $certi_name = "ITI - IN - DRAUGHTSMAN  (Civil) (ONE YEAR)";  break;
case "SCC268" : $certi_name = "ITI - IN - CUTTING  &amp; TAILORING (ONE YEAR)";  break;
case "SCC269" : $certi_name = "ITI - IN - FIRE SAFETY  MANAGEMENT  (TWO YEAR)";  break;
case "SCC270" : $certi_name = "ITI - IN - STENOGRAPHY (HINDI) (ONE YEAR)";  break;
case "SCC271" : $certi_name = "ITI - IN - BEAUTY &amp;  WELLNESS (ONE YEAR)";  break;
case "SCC272" : $certi_name = "ITI - IN - CUTTING  &amp; TAILORING &amp;  DRESS MAKING (ONE YEAR)";  break;
case "SCC273" : $certi_name = "ITI - IN - STENOGRAPHY (ENGLISH) (ONE YEAR)";  break;
case "SCC274" : $certi_name = "ITI - IN - INSTRUMENT MECHANIC (TWO YEAR)";  break;
case "SCC275" : $certi_name = "ITI - IN - HAIR &amp; SKIN CARE (ONE YEAR)";  break;
case "SCC276" : $certi_name = "ITI - IN - HAIR &amp; SKIN CARE (SIX MONTH)";  break;
case "SCC277" : $certi_name = "ITI - IN - HAIR &amp; SKIN CARE (THREE MONTH)";  break;
case "SCC278" : $certi_name = "ITI - IN - CARPENTER (ONE YEAR)";  break;
case "SCC279" : $certi_name = "ITI - IN - MOTOR MECHANIC (TWO YEAR)";  break;
case "SCC280" : $certi_name = "ITI - IN - BEAUTY THERAPY  (ONE YEAR)";  break;
case "SCC281" : $certi_name = "ITI - IN - AUTOMOBILE (TWO YEAR)";  break;
case "SCC282" : $certi_name = "ITI - IN - AUTOMOBILE ENGINEERING (ONE YEAR)";  break;
case "SCC283" : $certi_name = "ITI - IN - ATTENDANT OPERATOR (TWO YEAR)";  break;
case "SCC284" : $certi_name = "ITI - IN - DIESEL MECHANIC  (ONE YEAR)";  break;
case "SCC285" : $certi_name = "ITI - IN - STORE KEEPER (TWO YEAR)";  break;
case "SCC286" : $certi_name = "ITI - IN - REFRIGERATION &amp; AIR CONDITIONING (TWO YEAR)";  break;
case "SCC287" : $certi_name = "ITI - IN - MOTOR MECHANIC (ONE YEAR)";  break;
case "SCC288" : $certi_name = "ITI - IN - DRAFTSMAN (TWO YEAR)";  break;
case "SCC289" : $certi_name = "ITI - IN - REFRIGERATION AND AIR CONDITIONING (ONE YEAR)";  break;
case "SCC290" : $certi_name = "ITI - IN - REFRIGERATION AND AIR CONDITIONING (TWO YEAR)";  break;
case "SCC291" : $certi_name = "ITI - IN - INSTRUMENT MECHANIC (ONE YEAR)";  break;
case "SCC292" : $certi_name = "ITI - IN - ART &amp; CRAFT (TWO YEAR)";  break;
case "SCC293" : $certi_name = "ITI - IN - ART &amp; CRAFT (ONE YEAR)";  break;
case "SCC294" : $certi_name = "ITI - IN - TURNER (TWO YEAR)";  break;
case "SCC295" : $certi_name = "ITI - IN - MOTOR MECHANIC VEHICLE (TWO YEAR)";  break;
case "SCC296" : $certi_name = "ITI - IN - MOTOR MECHANIC VEHICLE (ONE YEAR)";  break;
case "SCC297" : $certi_name = "ITI - IN - PAINTER (TWO YEAR)";  break;
case "SCC298" : $certi_name = "ADVANCE DIPLOMA IN CHILD CARE NUTRITION (ONE YEAR)";  break;
case "SCC299" : $certi_name = "ITI - IN - MASON (ONE YEAR)";  break;
case "SCC300" : $certi_name = "ITI - IN - BEAUTY THERAPY  (six month)";  break;
case "SCC301" : $certi_name = "ITI - IN - BEAUTY THERAPY  (THREE MONTH)";  break;
case "SCC302" : $certi_name = "ITI - IN - DRAFTSMAN (ONE YEAR)";  break;
case "SCC303" : $certi_name = "ITI - IN - BEAUTY &amp;  WELLNESS (SIX MONTH)";  break;
case "SCC304" : $certi_name = "ITI - IN - BEAUTY &amp;  WELLNESS (THREE MONTH)";  break;
case "SCC305" : $certi_name= "ADVANCE DIPLOMA IN TUBERCULOSIS HEALTH SUPERVICES (ONE YEAR)";  break;
case "SCC306" : $certi_name = "ADVANCE DIPLOMA IN BEAUTICION (ONE YEAR)";  break;
case "SCC307" : $certi_name = "ADVANCE DIPLOMA IN FASHION DESIGNING (ONE YEAR)";  break;
case "SCC308" : $certi_name= "BASIC CERTIFICATE IN ENG SPOKEN (THREE MONTH)";  break;
case "SCC309" : $certi_name = "ITI - IN - REFRIGERATION,AIR CONDITIONER REPAIRING AND MAINTENANCE(TWO YEAR)";  break;

//Department of Fire Safety Management
case "SCC310" : $certi_name = "ITI - IN - FIRE SAFETY (ONE YEAR)";  break;
case "SCC311" : $certi_name = "ITI - IN - FIRE SAFETY  MANAGEMENT  (TWO YEAR)";  break;
case "SCC312" : $certi_name = "ADVANCE DIPLOMA IN FIRE FIGHTING (ONE YEAR)";  break;
case "SCC313" : $certi_name = "DIPLOMA IN FIRE SAFETY (SIX MONTH)";  break;
case "SCC314" : $certi_name = "DIPLOMA IN FIRE FIGHTING (SIX MONTH)";  break;
case "SCC315" : $certi_name = "ADVANCE DIPLOMA IN FIRE SAFETY (ONE YEAR)";  break;
case "SCC316" : $certi_name = "INDUSTRIAL DIPLOMA IN FIRE SAFETY MANAGEMENT (TWO YEAR)";  break;

//Department of Yoga
case "SCC317" : $certi_name = "ADVANCE DIPLOMA IN YOGA (TWO YEAR)";  break;
case "SCC318" : $certi_name = "DIPLOMA IN YOGA  (ONE YEAR)";  break;
case "SCC319" : $certi_name = "POST GRADUATE DIPLOMA IN YOGA &amp;  NATUROPATHY (TWO YEAR)";  break;
case "SCC320" : $certi_name = "ADVANCE DIPLOMA IN YOGA &amp; NATUROPATHY (ONE YEAR)";  break;

//Department of Music
case "SCC321" : $certi_name = "CERTIFICATE IN INSTRUMENTAL  -  GUNANKAR (THREE MONTH)";  break;
case "SCC322" : $certi_name = "DIPLOMA IN INSTRUMENTAL - SUDARSHAN (SIX MONTH)";  break;
case "SCC323" : $certi_name = "ADVANCE DIPLOMA IN INSTRUMENTAL - PRIKHAYAT (ONE YEAR)";  break;
case "SCC324" : $certi_name = "ADVANCE DIPLOMA IN INSTRUMENTAL - PARANGAT (TWO YEAR)";  break;
case "SCC325" : $certi_name = "CERTIFICATE IN VOCAL -  GUNANKAR (THREE MONTH)";  break;
case "SCC326" : $certi_name = "DIPLOMA IN VOCAL - SUDARSHAN (SIX MONTH)";  break;
case "SCC327" : $certi_name = "ADVANCE DIPLOMA IN VOCAL - PARANGAT (ONE YEAR)";  break;
case "SCC328" : $certi_name = "ADVANCE DIPLOMA IN INSTRUMENTAL (TABLA) - PRIKHAYAT  (ONE YEAR)";  break;

//Department of TEACHING
case "SCC329" : $certi_name= "DIPLOMA IN NURSERY TEACHER TRAINING (ONE YEAR)";  break;
case "SCC330" : $certi_name= "DIPLOMA IN PRIMARY TEACHER TRAINING (ONE YEAR)";  break;
case "SCC331" : $certi_name= "DIPLOMA IN YOGA TEACHER TRAINING (ONE YEAR)";  break;
case "SCC332" : $certi_name= "ADVANCE DIPLOMA IN NURSERY TEACHER TRAINING (TWO YEAR)";  break;
case "SCC333" : $certi_name= "ADVANCE DIPLOMA IN NURSERY AND PRIMARY TEACHER TRAINING (TWO YEAR)";  break;	
case "SCC334" : $certi_name= "DIPLOMA IN OPERATION THEATRE TECHNICIAN (One Year)";  break;		
case "SCC335" : $certi_name= "DIPLOMA IN OPERATION THEATRE TECHNICIAN (Two Year)";  break;														
default: $certi_name = "No Found";
}
return $certi_name;
                                  };
                                  
          function get_certifees($codd) {
                         $certi_fees = "";
                                    switch($codd) {       
 //Department of Computer   
case "SCC101" : $certi_fees= 500;  break;
case "SCC102" : $certi_fees= 500;  break;
case "SCC103" : $certi_fees= 500;  break;
case "SCC104" : $certi_fees= 500;  break;
case "SCC105" : $certi_fees= 500;  break;
case "SCC106" : $certi_fees= 500;  break;
case "SCC107" : $certi_fees= 500;  break;
case "SCC108" : $certi_fees= 500;  break;
case "SCC109" : $certi_fees= 500;  break;
case "SCC110" : $certi_fees= 500;  break;
case "SCC111" : $certi_fees= 500;  break;
case "SCC112" : $certi_fees= 500;  break;
case "SCC113" : $certi_fees= 500;  break;
case "SCC114" : $certi_fees= 500;  break;
case "SCC115" : $certi_fees= 500;  break;
case "SCC116" : $certi_fees= 500;  break;
case "SCC117" : $certi_fees= 1000;  break;
case "SCC118" : $certi_fees= 1000;  break;
case "SCC119" : $certi_fees= 2000;  break;
case "SCC120" : $certi_fees= 2000;  break;
case "SCC121" : $certi_fees= 2000;  break;
case "SCC122" : $certi_fees= 2000;  break;
case "SCC123" : $certi_fees= 2000;  break;
case "SCC124" : $certi_fees= 2000;  break;
case "SCC125" : $certi_fees= 1800;  break;
case "SCC126" : $certi_fees= 2000;  break;
case "SCC127" : $certi_fees= 1000;  break;

//Department of Accounting 
case "SCC128" : $certi_fees= 500;  break;
case "SCC129" : $certi_fees= 500;  break;
case "SCC130" : $certi_fees= 500;  break;
case "SCC131" : $certi_fees= 500;  break;
case "SCC132" : $certi_fees= 500;  break;
case "SCC133" : $certi_fees= 1000;  break;

// Department of Languages
case "SCC134" : $certi_fees= 500;  break;
case "SCC135" : $certi_fees= 500;  break;
case "SCC136" : $certi_fees= 500;  break;
case "SCC137" : $certi_fees=  500;  break;
case "SCC138" : $certi_fees=  500;  break;

//Department of Designing
case "SCC139" : $certi_fees= 1000;  break;
case "SCC140" : $certi_fees= 800;  break;
case "SCC141" : $certi_fees= 800;  break;
case "SCC142" : $certi_fees= 800;  break;
case "SCC143" : $certi_fees= 1000;  break;
case "SCC144" : $certi_fees= 1000;  break;
case "SCC145" : $certi_fees= 1000;  break;
case "SCC146" : $certi_fees= 1000;  break;
case "SCC147" : $certi_fees= 1000;  break;
case "SCC148" : $certi_fees= 500;  break;
case "SCC149" : $certi_fees= 500;  break;
case "SCC150" : $certi_fees= 500;  break;
case "SCC151" : $certi_fees= 1500;  break;
case "SCC152" : $certi_fees= 1500;  break;
case "SCC153" : $certi_fees= 1000;  break;
case "SCC154" : $certi_fees= 1500;  break;
case "SCC155" : $certi_fees= 2000;  break;
case "SCC156" : $certi_fees= 1000;  break;
case "SCC157" : $certi_fees= 1500;  break;
case "SCC158" : $certi_fees= 1500;  break;
case "SCC159" : $certi_fees= 800;  break;

//Department of Hardware & Networking
case "SCC160" : $certi_fees= 500;  break;
case "SCC161" : $certi_fees= 500;  break;
case "SCC162" : $certi_fees= 500;  break;
case "SCC163" : $certi_fees= 1000;  break;
case "SCC164" : $certi_fees= 500;  break;
case "SCC165" : $certi_fees= 500;  break;

//Department of Management
case "SCC166" : $certi_fees= 7500;  break;
case "SCC167" : $certi_fees= 7500;  break;
case "SCC168" : $certi_fees= 7500;  break;
case "SCC169" : $certi_fees= 4000;  break;
case "SCC170" : $certi_fees= 7500;  break;
case "SCC171" : $certi_fees= 4000;  break;
case "SCC172" : $certi_fees= 7500;  break;
case "SCC173" : $certi_fees= 4000;  break;
case "SCC174" : $certi_fees= 7500;  break;
case "SCC175" : $certi_fees= 7500;  break;
case "SCC176" : $certi_fees= 2000;  break;
case "SCC177" : $certi_fees= 4000;  break;
case "SCC178" : $certi_fees= 4000;  break;
 
//Department of Paramedical
case "SCC179" : $certi_fees= 4000;  break;
case "SCC180" : $certi_fees= 4000;  break;
case "SCC181" : $certi_fees= 8000;  break;
case "SCC182" : $certi_fees= 8000;  break;
case "SCC183" : $certi_fees= 8000;  break;
case "SCC184" : $certi_fees= 8000;  break;
case "SCC185" : $certi_fees= 8000;  break;
case "SCC186" : $certi_fees= 4000;  break;
case "SCC187" : $certi_fees= 4000;  break;
case "SCC188" : $certi_fees= 8000;  break;
case "SCC189" : $certi_fees= 8000;  break;
case "SCC190" : $certi_fees= 2500;  break;
case "SCC191" : $certi_fees= 4000;  break;
case "SCC192" : $certi_fees= 8000;  break;
case "SCC193" : $certi_fees= 4000;  break;
case "SCC194" : $certi_fees= 4000;  break;
case "SCC195" : $certi_fees= 4000;  break;

//Department of Hotel Management
case "SCC196" : $certi_fees= 4000;  break;
case "SCC197" : $certi_fees= 4000;  break;
case "SCC198" : $certi_fees= 7500;  break;
case "SCC199" : $certi_fees= 4000;  break;
case "SCC200" : $certi_fees= 4000;  break;
case "SCC201" : $certi_fees= 4000;  break;
case "SCC202" : $certi_fees= 4000;  break;
case "SCC203" : $certi_fees= 4000;  break;
case "SCC204" : $certi_fees= 4000;  break;
case "SCC205" : $certi_fees= 1200;  break;
case "SCC206" : $certi_fees= 2000;  break;
case "SCC207" : $certi_fees= 1200;  break;
case "SCC208" : $certi_fees= 2000;  break;
case "SCC209" : $certi_fees= 1200;  break;
case "SCC210" : $certi_fees= 2000;  break;
case "SCC211" : $certi_fees= 2000;  break;
case "SCC212" : $certi_fees= 7500;  break;
case "SCC213" : $certi_fees= 7500;  break;
case "SCC214" : $certi_fees= 7500;  break;
case "SCC215" : $certi_fees= 4000;  break;
case "SCC216" : $certi_fees= 7500;  break;
case "SCC217" : $certi_fees= 7500;  break;
case "SCC218" : $certi_fees= 2000;  break;
case "SCC219" : $certi_fees= 4000;  break;
case "SCC220" : $certi_fees= 7500;  break;

//Department of Diploma
case "SCC221" : $certi_fees= 8000;  break;
case "SCC222" : $certi_fees= 12000;  break;
case "SCC223" : $certi_fees= 12000;  break;
case "SCC224" : $certi_fees= 8000;  break;
case "SCC225" : $certi_fees= 12000;  break;
case "SCC226" : $certi_fees= 8000;  break;
case "SCC227" : $certi_fees= 12000; break;
case "SCC228" : $certi_fees= 12000;  break;
case "SCC229" : $certi_fees= 12000;  break;
case "SCC230" : $certi_fees= 8000;  break;
case "SCC231" : $certi_fees= 4500; break;

//Department of Security Management
case "SCC232" : $certi_fees= 3000;  break;
case "SCC233" : $certi_fees= 5000;  break;

//Department of Stenograph5
case "SCC234" : $certi_fees= 500;  break;
case "SCC235" : $certi_fees= 300;  break;
case "SCC236" : $certi_fees= 250;  break;
case "SCC237" : $certi_fees= 500;  break;
case "SCC238" : $certi_fees= 300;  break;
case "SCC239" : $certi_fees= 300;  break;
case "SCC234" : $certi_fees= 350;  break;
case "SCC239" : $certi_fees= 500;  break;
case "SCC240" : $certi_fees= 500;  break;
case "SCC241" : $certi_fees= 300;  break;
case "SCC242" : $certi_fees= 250;  break;
case "SCC243" : $certi_fees= 1200;  break;

//Department of Vocational ITI
case "SCC244" : $certi_fees = 2000;  break;
case "SCC245" : $certi_fees = 1000;  break;
case "SCC246" : $certi_fees = 800;  break;
case "SCC247" : $certi_fees = 1000;  break;
case "SCC248" : $certi_fees = 2000;  break;
case "SCC249" : $certi_fees = 800;  break;
case "SCC250" : $certi_fees = 2000;  break;
case "SCC251" : $certi_fees = 1000;  break;
case "SCC252" : $certi_fees = 800;  break;
case "SCC253" : $certi_fees = 1000;  break;
case "SCC254" : $certi_fees = 2000;  break;
case "SCC255" : $certi_fees = 800;  break;
case "SCC256" : $certi_fees = 2000;  break;
case "SCC257" : $certi_fees = 1000;  break;
case "SCC258" : $certi_fees = 800;  break;
case "SCC259" : $certi_fees = 1000;  break;
case "SCC260" : $certi_fees = 1000;  break;
case "SCC261" : $certi_fees = 1000;  break;
case "SCC262" : $certi_fees = 800;  break;
case "SCC263" : $certi_fees = 2000;  break;
case "SCC264" : $certi_fees = 1000;  break;
case "SCC265" : $certi_fees = 800;  break;
case "SCC266" : $certi_fees = 2000;  break;
case "SCC267" : $certi_fees = 1000;  break;
case "SCC268" : $certi_fees = 1000;  break;
case "SCC269" : $certi_fees = 2000;  break;
case "SCC270" : $certi_fees = 1000;  break;
case "SCC271" : $certi_fees = 1000;  break;
case "SCC272" : $certi_fees = 1000;  break;
case "SCC273" : $certi_fees = 1000;  break;
case "SCC274" : $certi_fees = 2000;  break;
case "SCC275" : $certi_fees = 1000;  break;
case "SCC276" : $certi_fees = 800;  break;
case "SCC277" : $certi_fees = 500;  break;
case "SCC278" : $certi_fees = 1000;  break;
case "SCC279" : $certi_fees = 2000;  break;
case "SCC280" : $certi_fees = 1000;  break;
case "SCC281" : $certi_fees = 2000;  break;
case "SCC282" : $certi_fees = 1000;  break;
case "SCC283" : $certi_fees = 2000;  break;
case "SCC284" : $certi_fees = 1000;  break;
case "SCC285" : $certi_fees = 2000;  break;
case "SCC286" : $certi_fees = 2000;  break;
case "SCC287" : $certi_fees = 1000;  break;
case "SCC288" : $certi_fees = 2000;  break;
case "SCC289" : $certi_fees = 1000;  break;
case "SCC290" : $certi_fees = 2000;  break;
case "SCC291" : $certi_fees = 1000;  break;
case "SCC292" : $certi_fees = 2000;  break;
case "SCC293" : $certi_fees = 1000;  break;
case "SCC294" : $certi_fees = 2000;  break;
case "SCC295" : $certi_fees = 2000;  break;
case "SCC296" : $certi_fees = 1000;  break;
case "SCC297" : $certi_fees = 2000;  break;
case "SCC298" : $certi_fees = 1000;  break;
case "SCC299" : $certi_fees = 1000;  break;
case "SCC300" : $certi_fees = 800;  break;
case "SCC301" : $certi_fees = 300;  break;
case "SCC302" : $certi_fees = 1000;  break;
case "SCC303" : $certi_fees = 800;  break;
case "SCC304" : $certi_fees = 500;  break;
case "SCC305" : $certi_fees= 1000;  break;
case "SCC306" : $certi_fees = 1000;  break;
case "SCC307" : $certi_fees = 1000;  break;
case "SCC308" : $certi_fees= 500;  break;
case "SCC309" : $certi_fees = 1000;  break;

//Department of Fire Safety Management
case "SCC310" : $certi_fees = 2500;  break;
case "SCC311" : $certi_fees = 2500;  break;
case "SCC312" : $certi_fees = 2500;  break;
case "SCC313" : $certi_fees = 2500;  break;
case "SCC314" : $certi_fees = 2500;  break;
case "SCC315" : $certi_fees = 3500;  break;
case "SCC316" : $certi_fees = 4500;  break;

//Department of Yoga
case "SCC317" : $certi_fees = 2000;  break;
case "SCC318" : $certi_fees = 1000;  break;
case "SCC319" : $certi_fees = 1000;  break;
case "SCC320" : $certi_fees = 800;  break;

//Department of Music
case "SCC321" : $certi_fees = 2500;  break;
case "SCC322" : $certi_fees = 5000;  break;
case "SCC323" : $certi_fees = 7500;  break;
case "SCC324" : $certi_fees = 15000;  break;
case "SCC325" : $certi_fees = 2500;  break;
case "SCC326" : $certi_fees = 5000;  break;
case "SCC327" : $certi_fees = 7500;  break;
case "SCC328" : $certi_fees = 7500;  break;

//Department of TEACHING
case "SCC329" : $certi_fees= 1000;  break;
case "SCC330" : $certi_fees= 1000;  break;
case "SCC331" : $certi_fees= 1000;  break;
case "SCC332" : $certi_fees= 1500;  break;
case "SCC333" : $certi_fees= 1500;  break;
case "SCC334" : $certi_fees= 4000;  break;
case "SCC335" : $certi_fees= 6000;  break;

default: $certi_fees = $codd;
}
return $certi_fees;
                                  };
        
                                  function get_code($c_id,$sno) {
                                    
                                    $SCC333 = array('NTT101','NTT102','NTT103','NTT104','NTT105','NTT106','NTT107','NTT108','NTT109','NTT110','NTT111','NTT112','NTT113','NTT114');
                                    $SCC101 = array('ADCA115','ADCA116','ADCA117','ADCA118','ADCA119','ADCA120');
                                    $SCC135 = array('DCA119','DCA120','DCA121','DCA122');
                                    $SCC112 = array('CCA124');
                                    $SCC113 = array('CCAC123');
                                    $SCC106 = array('DCA125','DCA126');
                                    $SCC334 = array('OT123','OT124','OT125','OT126','OT127','OT128','OT129','OT130','OT131','OT132');
                                    $SCC335 = array('OT133','OT134','OT135','OT136','OT137','OT138','OT139','OT140','OT141','OT142');
                                    $SCC103 = array('ADCAC143','ADCAC144','ADCAC145','ADCAC146','ADCAC147','ADCAC148');
                                       $options = 'No found';
                                      switch($c_id)
                                      {
                                        case "SCC333":
                                          { $options =$SCC333[$sno]; break; }
                                      case "SCC101":
                                          { $options = $SCC101[$sno]; break; }
                                      case "SCC103":
                                          { $options = $SCC103[$sno]; break; }
                                      case "SCC135":
                                          { $options = $SCC135[$sno]; break; }
                                      case "SCC112":
                                        { $options = $SCC112[$sno]; break; }
                                      case "SCC113":
                                        { $options = $SCC113[$sno]; break; }
                                        case "SCC106":
                                          { $options = $SCC106[$sno]; break; }
                                          case "SCC334":
                                            { $options = $SCC334[$sno]; break; }
                                            case "SCC335":
                                              { $options = $SCC335[$sno]; break; }
                                      
                                    }
                                    return $options;
                                    };
                                    function get_subjectname($codd) {
                                      switch($codd) {  
                                        case "0" : $sub_name= 0;  break;
                                         //Department of Computer   
                                        case "NTT101" : $sub_name= "Child Psychology and Health Care	";  break;
                                        case "NTT102" : $sub_name= "Sociology and Guidance	";  break;
                                        case "NTT103" : $sub_name= "School Organization";  break;
                                        case "NTT104" : $sub_name= "Principles of Education";  break;
                                        case "NTT105" : $sub_name= "Education Psychology";  break;
                                        case "NTT106" : $sub_name= "Modern Mehod of Teaching";  break;
                                        case "NTT107" : $sub_name= "Computer Education";  break;
                                        case "NTT108" : $sub_name= "Advanced Educational Psycology";  break;
                                        case "NTT109" : $sub_name= "Physical and Health Education";  break;
                                        case "NTT110" : $sub_name= "Advanced Teacher Education";  break;
                                        case "NTT111" : $sub_name= "Communication and Education Technology";  break;
                                        case "NTT112" : $sub_name= "Environmental Studies";  break;
                                        case "NTT113" : $sub_name= "Communication Skill";  break;
                                        case "NTT114" : $sub_name= "Personality Development and Parent Teacher Relationship";  break;
                                        case "ADCA115" : $sub_name= "Computer Fundamental & O.S";  break;
                                        case "ADCA116" : $sub_name= "M. S Office – 2007 (M.S Word, M.S Excel, M.S Power Point,M.S Access)";  break;
                                        case "ADCA117" : $sub_name= "Html, Internet & E-Mailing";  break;
                                        case "ADCA118" : $sub_name= "Programming In C Language";  break;
                                        case "ADCA119" : $sub_name= "Introduction To Computer Hardware";  break;
                                        case "ADCA120" : $sub_name= "C++ Programming";  break;
                                        case "DCA119" : $sub_name= "Windows,paint,Notepad,Word pad,Microsoft Office(Word,Excel and Power Point)";  break;
                                        case "DCA120" : $sub_name= "Accounts with Tally ERP9(GST,Payroll,Billing)";  break;
                                        case "DCA121" : $sub_name= "Procedural programming using C Language and couar java";  break;
                                        case "DCA122" : $sub_name= "DTP(Photoshop,Corel DRAW,Page Maker,Project Assignment)";  break;
                                        case "CCAC123" :$sub_name= "COMPUTER ACCOUNTING";  break;
                                        case "CCA124" : $sub_name= "BASIC COURSE";  break;
                                        case "DCA125" : $sub_name= "Windows, Paint, Notepad, Word pad, Microsoft Office";  break;
                                        case "DCA126" : $sub_name= "Accounts with Tally ERP9(GST, Payroll, Billing)";  break;
                                        case "OT123" : $sub_name= "blood banking";  break;
                                        case "OT124" : $sub_name= "computer application and information technology";  break;
                                        case "OT125" : $sub_name= "hospital administration";  break;
                                        case "OT126" : $sub_name= "medical terminology &amp; procedures";  break;
                                        case "OT127" : $sub_name= "patient care and support";  break;
                                        case "OT128" : $sub_name= "anatomy and physiology";  break;
                                        case "OT129" : $sub_name= "electrocardiography";  break;
                                        case "OT130" : $sub_name= "pathology";  break;
                                        case "OT131" : $sub_name= "Lab practice and internal assessment";  break;
                                        case "OT132" : $sub_name= "Practical of laboratory techniques";  break;
                                        case "OT133" : $sub_name= "Histopathology &amp; cytopathology";  break;
                                        case "OT134" : $sub_name= "heathcare administration of clinical and non-clinic";  break;
                                        case "OT135" : $sub_name= "maintaining work area and tools";  break;
                                        case "OT136" : $sub_name= "public health act and adminisrtation";  break;
                                        case "OT137" : $sub_name= "self management skill";  break;
                                        case "OT138" : $sub_name= "pharmacology";  break;
                                        case "OT139" : $sub_name= "medicine relevant to O.T.technology";  break;
                                        case "OT140" : $sub_name= "operation theatre technology";  break;
                                        case "OT141" : $sub_name= "Medical Lab Practical";  break;
                                        case "OT142" : $sub_name= "Lab Practice And Internal Assessment";  break;
                                      case "ADCAC143" : $sub_name= "Computer Fundamental & O.S";  break;
                                      case "ADCAC144" : $sub_name= "M. S Office – 2007 (M.S Word, M.S Excel, M.S Power Point,M.S Access)";  break;
                                      case "ADCAC145" : $sub_name= "Html, Internet & E-Mailing";  break;
                                      case "ADCAC146" : $sub_name= "Tally eRP 9";  break;
                                      case "ADCAC147" : $sub_name= "Introduction To Computer Hardware";  break;
                                      case "ADCAC148" : $sub_name= "Computer Accounting";  break;
                                        default: $sub_name = $codd;
                                        }
                                        return $sub_name;
                                    }
?>