<?php
$page_title   = 'University Teaching Departments (UTD) - Course Syllabus - SSSUTMS';
$banner_title = 'University Teaching Departments (UTD)';
$banner_category = 'Course Syllabus';

require_once __DIR__ . '/../../config.php';
require_once __DIR__ . '/../../includes/scheme_helper.php';
require_once __DIR__ . '/../../includes/header.php';
require_once __DIR__ . '/../../includes/topbar.php';
require_once __DIR__ . '/../../includes/navbar.php';
require_once __DIR__ . '/../../includes/page-banner.php';

$BASE = 'https://www.sssutms.co.in/cms/Areas/Website/Files/Link/';

$groups = array (
  0 => 
  array (
    'title' => 'Undergraduate Courses (NEP 2020 — B.A., BBA, BCA, B.Com, B.Sc.)',
    'icon' => 'fa-graduation-cap',
    'items' => 
    array (
      0 => 
      array (
        'name' => 'B.A. 2nd Semester — Major Subject',
        'badge' => 'B.A. NEP',
        'desc' => 'B.A. 2nd Semester Core Major Syllabus',
        'url' => $BASE . 'SYLLABUS/NEP/second%20sem/BA/MAJOR.pdf',
      ),
      1 => 
      array (
        'name' => 'B.A. 2nd Semester — Minor Subject',
        'badge' => 'B.A. NEP',
        'desc' => 'B.A. 2nd Semester Core Minor Syllabus',
        'url' => $BASE . 'SYLLABUS/NEP/second%20sem/BA/MINAR.pdf',
      ),
      2 => 
      array (
        'name' => 'B.A. 2nd Semester — Elective Subject',
        'badge' => 'B.A. NEP',
        'desc' => 'B.A. 2nd Semester Generic Elective Syllabus',
        'url' => $BASE . 'SYLLABUS/NEP/second%20sem/BA/ELECTIVE%202%20SEM.pdf',
      ),
      3 => 
      array (
        'name' => 'B.A. 3rd Semester — Major Subject',
        'badge' => 'B.A. NEP',
        'desc' => 'B.A. 3rd Semester Advanced Major Syllabus',
        'url' => $BASE . 'syllabus%202023-24/nep2023-24/ba3rd/ba%20major%203rd.pdf',
      ),
      4 => 
      array (
        'name' => 'B.A. 3rd Semester — Minor Subject',
        'badge' => 'B.A. NEP',
        'desc' => 'B.A. 3rd Semester Advanced Minor Syllabus',
        'url' => $BASE . 'syllabus%202023-24/nep2023-24/ba3rd/ba%20minor%203rd.pdf',
      ),
      5 => 
      array (
        'name' => 'BBA 1st Year — Major Subject',
        'badge' => 'BBA NEP',
        'desc' => 'BBA 1st Year Management Core Major Syllabus',
        'url' => $BASE . 'Syllabus2022/BBA/MAJOR.pdf',
      ),
      6 => 
      array (
        'name' => 'BBA 1st Year — Minor Subject',
        'badge' => 'BBA NEP',
        'desc' => 'BBA 1st Year Management Allied Minor Syllabus',
        'url' => $BASE . 'Syllabus2022/BBA/MINOR.pdf',
      ),
      7 => 
      array (
        'name' => 'BBA 1st Year — Elective Subject',
        'badge' => 'BBA NEP',
        'desc' => 'BBA 1st Year Open Generic Elective Syllabus',
        'url' => $BASE . 'Syllabus2022/BBA/ELECTIVE.pdf',
      ),
      8 => 
      array (
        'name' => 'BBA 1st Year — Vocational',
        'badge' => 'BBA NEP',
        'desc' => 'BBA 1st Year Practical & Vocational Modules',
        'url' => $BASE . 'Syllabus2022/BBA/vocational.pdf',
      ),
      9 => 
      array (
        'name' => 'BCA 1st Year — Major Subject',
        'badge' => 'BCA NEP',
        'desc' => 'BCA 1st Year Programming & CS Major Syllabus',
        'url' => $BASE . 'Syllabus2022/BCA/BCA%20Major_0001%20-%20Copy%201.pdf',
      ),
      10 => 
      array (
        'name' => 'BCA 1st Year — Minor Subject',
        'badge' => 'BCA NEP',
        'desc' => 'BCA 1st Year Mathematics & CS Minor Syllabus',
        'url' => $BASE . 'Syllabus2022/BCA/BCA%20Minor_0001.pdf',
      ),
      11 => 
      array (
        'name' => 'BCA 1st Year — Elective Subject',
        'badge' => 'BCA NEP',
        'desc' => 'BCA 1st Year CS Generic Elective Syllabus',
        'url' => $BASE . 'Syllabus2022/BCA/BCA%20Elective.pdf',
      ),
      12 => 
      array (
        'name' => 'BCA 2nd Semester — Major Subject',
        'badge' => 'BCA NEP',
        'desc' => 'BCA 2nd Semester Data Structures Major Syllabus',
        'url' => $BASE . 'SYLLABUS/NEP/second%20sem/BCA/MAJOR%20BCA%20II%20Sem.pdf',
      ),
      13 => 
      array (
        'name' => 'BCA 2nd Semester — Minor Subject',
        'badge' => 'BCA NEP',
        'desc' => 'BCA 2nd Semester Discrete Math Minor Syllabus',
        'url' => $BASE . 'SYLLABUS/NEP/second%20sem/BCA/MINOR%20BCA%20II%20Sem.pdf',
      ),
      14 => 
      array (
        'name' => 'BCA 2nd Semester — Elective Subject',
        'badge' => 'BCA NEP',
        'desc' => 'BCA 2nd Semester Web Development Elective Syllabus',
        'url' => $BASE . 'SYLLABUS/NEP/second%20sem/BCA/ELECTIVE%20BCA%20II%20Sem.pdf',
      ),
      15 => 
      array (
        'name' => 'B.Com. 1st Year — Major Subject',
        'badge' => 'B.Com. NEP',
        'desc' => 'B.Com. 1st Year Financial Accounting Major Syllabus',
        'url' => $BASE . 'Syllabus2022/b.com/Commerce_0001.pdf',
      ),
      16 => 
      array (
        'name' => 'B.Com. 1st Year — Minor Subject',
        'badge' => 'B.Com. NEP',
        'desc' => 'B.Com. 1st Year Business Law Minor Syllabus',
        'url' => $BASE . 'Syllabus2022/b.com/Commerce%20Minor%20B2T_0001.pdf',
      ),
      17 => 
      array (
        'name' => 'B.Com. 1st Year — Elective Subject',
        'badge' => 'B.Com. NEP',
        'desc' => 'B.Com. 1st Year Applied Economics Elective Syllabus',
        'url' => $BASE . 'Syllabus2022/b.com/Elective.pdf',
      ),
      18 => 
      array (
        'name' => 'B.Com. 2nd Semester — Major Subject',
        'badge' => 'B.Com. NEP',
        'desc' => 'B.Com. 2nd Semester Corporate Accounting Major Syllabus',
        'url' => $BASE . 'SYLLABUS/NEP/second%20sem/B.COM%202%20SEM%20MAJOR%20.pdf',
      ),
      19 => 
      array (
        'name' => 'B.Com. 2nd Semester — Minor Subject',
        'badge' => 'B.Com. NEP',
        'desc' => 'B.Com. 2nd Semester Business Organization Minor Syllabus',
        'url' => $BASE . 'SYLLABUS/NEP/second%20sem/B.COM%202%20SEM%20MINOR.pdf',
      ),
      20 => 
      array (
        'name' => 'B.Com. 2nd Semester — Elective Subject',
        'badge' => 'B.Com. NEP',
        'desc' => 'B.Com. 2nd Semester Business Economics Elective Syllabus',
        'url' => $BASE . 'SYLLABUS/NEP/second%20sem/b.com%20elective%202%20sem.pdf',
      ),
      21 => 
      array (
        'name' => 'B.Sc. 1st Year — Major Subject',
        'badge' => 'B.Sc. NEP',
        'desc' => 'B.Sc. 1st Year Natural Sciences Major Syllabus',
        'url' => $BASE . 'Syllabus2022/BSC/Major.pdf',
      ),
      22 => 
      array (
        'name' => 'B.Sc. 1st Year — Minor Subject',
        'badge' => 'B.Sc. NEP',
        'desc' => 'B.Sc. 1st Year Natural Sciences Minor Syllabus',
        'url' => $BASE . 'Syllabus2022/BSC/Minor.pdf',
      ),
      23 => 
      array (
        'name' => 'B.Sc. 1st Year — Elective Subject',
        'badge' => 'B.Sc. NEP',
        'desc' => 'B.Sc. 1st Year Interdisciplinary Science Electives',
        'url' => $BASE . 'Syllabus2022/BSC/Elective.pdf',
      ),
      24 => 
      array (
        'name' => 'B.Sc. 2nd Semester — Major Subject',
        'badge' => 'B.Sc. NEP',
        'desc' => 'B.Sc. 2nd Semester Advanced Science Major Syllabus',
        'url' => $BASE . 'SYLLABUS/NEP/second%20sem/b.sc/MAJOR%20II%20SEM%20NEP.pdf',
      ),
      25 => 
      array (
        'name' => 'B.Sc. 2nd Semester — Minor Subject',
        'badge' => 'B.Sc. NEP',
        'desc' => 'B.Sc. 2nd Semester Advanced Science Minor Syllabus',
        'url' => $BASE . 'SYLLABUS/NEP/second%20sem/b.sc/MINOR%20II%20SEM%20NEP.pdf',
      ),
      26 => 
      array (
        'name' => 'B.Sc. 2nd Semester — Elective Subject',
        'badge' => 'B.Sc. NEP',
        'desc' => 'B.Sc. 2nd Semester Science Generic Elective Syllabus',
        'url' => $BASE . 'SYLLABUS/NEP/second%20sem/b.sc/elective%20ii%20sem.pdf',
      ),
      27 => 
      array (
        'name' => 'B.Sc. 3rd Year — Major Modules',
        'badge' => 'B.Sc. NEP',
        'desc' => 'B.Sc. 3rd Year Core Advanced Major Modules',
        'url' => $BASE . 'syllabus%202023-24/B%20SC%20NEP%203%20YEAR/MAJAR%201.pdf',
      ),
      28 => 
      array (
        'name' => 'B.Sc. 3rd Year — Minor Modules',
        'badge' => 'B.Sc. NEP',
        'desc' => 'B.Sc. 3rd Year Core Advanced Minor Modules',
        'url' => $BASE . 'syllabus%202023-24/B%20SC%20NEP%203%20YEAR/minor1.pdf',
      ),
      29 => 
      array (
        'name' => 'B.Sc. 3rd Year — Foundation Modules',
        'badge' => 'B.Sc. NEP',
        'desc' => 'B.Sc. 3rd Year Science Foundation Curriculum',
        'url' => $BASE . 'syllabus%202023-24/B%20SC%20NEP%203%20YEAR/Foundation%201.pdf',
      ),
    ),
  ),
  1 => 
  array (
    'title' => 'Postgraduate Courses — M.A. / M.Com. (All Departments w.e.f. 2021)',
    'icon' => 'fa-landmark',
    'items' => 
    array (
      0 => 
      array (
        'name' => 'M.A. English — Semester I',
        'badge' => 'M.A. English',
        'desc' => 'M.A. English Literature First Semester Syllabus',
        'url' => $BASE . 'MA_English_Literature_1_21122022_1106.pdf',
      ),
      1 => 
      array (
        'name' => 'M.A. English — Semester II',
        'badge' => 'M.A. English',
        'desc' => 'M.A. English Literature Second Semester Syllabus',
        'url' => $BASE . 'MA_English_Literature__2_21122022_1106.pdf',
      ),
      2 => 
      array (
        'name' => 'M.A. English — Semester III',
        'badge' => 'M.A. English',
        'desc' => 'M.A. English Literature Third Semester Syllabus',
        'url' => $BASE . 'MA_English_literature_3_21122022_1107.pdf',
      ),
      3 => 
      array (
        'name' => 'M.A. English — Semester IV',
        'badge' => 'M.A. English',
        'desc' => 'M.A. English Literature Fourth Semester Syllabus',
        'url' => $BASE . 'MA_English_Literature__4_21122022_1108.pdf',
      ),
      4 => 
      array (
        'name' => 'M.A. Hindi — Semester I',
        'badge' => 'M.A. Hindi',
        'desc' => 'M.A. Hindi Sahitya & Bhasha Vigyan Sem I Syllabus',
        'url' => $BASE . 'SYLLABUS2021/SY_MA_I_HIN_2021.pdf',
      ),
      5 => 
      array (
        'name' => 'M.A. Hindi — Semester II',
        'badge' => 'M.A. Hindi',
        'desc' => 'M.A. Hindi Sahitya & Kavya Shastra Sem II Syllabus',
        'url' => $BASE . 'SYLLABUS2021/SY_MA_II_HIN_2021.pdf',
      ),
      6 => 
      array (
        'name' => 'M.A. Hindi — Semester III',
        'badge' => 'M.A. Hindi',
        'desc' => 'M.A. Hindi Natak & Gadya Sahitya Sem III Syllabus',
        'url' => $BASE . 'SYLLABUS/MA/ma%20iii%20sem%20syllabus.pdf',
      ),
      7 => 
      array (
        'name' => 'M.A. Hindi — Semester IV',
        'badge' => 'M.A. Hindi',
        'desc' => 'M.A. Hindi Prayojanmoolak Hindi Sem IV Syllabus',
        'url' => $BASE . 'SYLLABUS2021/SY_MA_IV_HIN_2021.pdf',
      ),
      8 => 
      array (
        'name' => 'M.A. History — Semester I',
        'badge' => 'M.A. History',
        'desc' => 'M.A. History Ancient India & Historiography Sem I',
        'url' => $BASE . 'syllabus%202023-24/MA%20History%201%20Semester.pdf',
      ),
      9 => 
      array (
        'name' => 'M.A. History — Semester II',
        'badge' => 'M.A. History',
        'desc' => 'M.A. History Medieval India & Culture Sem II',
        'url' => $BASE . 'syllabus%202023-24/ma%20history%202nd%20sem%20syllabus%20(5).pdf',
      ),
      10 => 
      array (
        'name' => 'M.A. History — Semester III',
        'badge' => 'M.A. History',
        'desc' => 'M.A. History Modern India & Freedom Movement Sem III',
        'url' => $BASE . 'syllabus%202023-24/MA%20History%20%203rd%20sem.pdf',
      ),
      11 => 
      array (
        'name' => 'M.A. History — Semester IV',
        'badge' => 'M.A. History',
        'desc' => 'M.A. History Contemporary World & MP History Sem IV',
        'url' => $BASE . 'MA_IV_Sem_History_Syllabus_up_05042025_0449.pdf',
      ),
      12 => 
      array (
        'name' => 'M.A. Economics — Semester I',
        'badge' => 'M.A. Economics',
        'desc' => 'M.A. Economics Microeconomic Analysis Sem I',
        'url' => $BASE . 'SYLLABUS2021/SY_MA_I_ECO_2021.pdf',
      ),
      13 => 
      array (
        'name' => 'M.A. Economics — Semester II',
        'badge' => 'M.A. Economics',
        'desc' => 'M.A. Economics Macroeconomic Analysis Sem II',
        'url' => $BASE . 'SYLLABUS2021/SY_MA_II_ECO_2021.pdf',
      ),
      14 => 
      array (
        'name' => 'M.A. Economics — Semester III',
        'badge' => 'M.A. Economics',
        'desc' => 'M.A. Economics Public Finance & Research Sem III',
        'url' => $BASE . 'SYLLABUS/MA/M.A.%20Economics%20III%20sem%20syllabus%20.pdf',
      ),
      15 => 
      array (
        'name' => 'M.A. Economics — Semester IV',
        'badge' => 'M.A. Economics',
        'desc' => 'M.A. Economics Indian Economy & Development Sem IV',
        'url' => $BASE . 'SYLLABUS2021/SY_MA_IV_ECO_2021.pdf',
      ),
      16 => 
      array (
        'name' => 'M.A. Sociology — Semester I',
        'badge' => 'M.A. Sociology',
        'desc' => 'M.A. Sociology Classical Sociological Tradition Sem I',
        'url' => $BASE . 'SYLLABUS2021/RSY_MA_I_SOC_2021.pdf',
      ),
      17 => 
      array (
        'name' => 'M.A. Sociology — Semester II',
        'badge' => 'M.A. Sociology',
        'desc' => 'M.A. Sociology Methodology of Social Research Sem II',
        'url' => $BASE . 'SYLLABUS2021/RSY_MA_II_SOC_2021.pdf',
      ),
      18 => 
      array (
        'name' => 'M.A. Sociology — Semester III',
        'badge' => 'M.A. Sociology',
        'desc' => 'M.A. Sociology Theoretical Perspectives Sem III',
        'url' => $BASE . 'SYLLABUS2021/RSY_MA_III_SOC_2021.pdf',
      ),
      19 => 
      array (
        'name' => 'M.A. Sociology — Semester IV',
        'badge' => 'M.A. Sociology',
        'desc' => 'M.A. Sociology Sociology of Change & Development Sem IV',
        'url' => $BASE . 'SYLLABUS2021/RSY_MA_IV_SOC_2021.pdf',
      ),
      20 => 
      array (
        'name' => 'M.A. Political Science — Semester I',
        'badge' => 'M.A. Pol Sci',
        'desc' => 'M.A. Political Science Western Political Thought Sem I',
        'url' => $BASE . 'SYLLABUS2021/RSY_MA_I_POLS_2021.pdf',
      ),
      21 => 
      array (
        'name' => 'M.A. Political Science — Semester II',
        'badge' => 'M.A. Pol Sci',
        'desc' => 'M.A. Political Science Comparative Politics Sem II',
        'url' => $BASE . 'SYLLABUS2021/RSY_MA_II_POLS_2021.pdf',
      ),
      22 => 
      array (
        'name' => 'M.A. Political Science — Semester III',
        'badge' => 'M.A. Pol Sci',
        'desc' => 'M.A. Political Science International Relations Sem III',
        'url' => $BASE . 'SYLLABUS2021/RSY_MA_III_POLS_2021.pdf',
      ),
      23 => 
      array (
        'name' => 'M.A. Political Science — Semester IV',
        'badge' => 'M.A. Pol Sci',
        'desc' => 'M.A. Political Science Indian Govt & Politics Sem IV',
        'url' => $BASE . 'SYLLABUS2021/RSY_MA_IV_POLS_2021.pdf',
      ),
      24 => 
      array (
        'name' => 'M.A. Psychology — Semester I',
        'badge' => 'M.A. Psychology',
        'desc' => 'M.A. Psychology Cognitive Processes Sem I',
        'url' => $BASE . 'SY_MA_I_PSY_2021_14022022_1138.pdf',
      ),
      25 => 
      array (
        'name' => 'M.A. Psychology — Semester II',
        'badge' => 'M.A. Psychology',
        'desc' => 'M.A. Psychology Research Methods & Statistics Sem II',
        'url' => $BASE . 'SYLLABUS2021/SY_MA_II_PSY_2021.pdf',
      ),
      26 => 
      array (
        'name' => 'M.A. Psychology — Semester III',
        'badge' => 'M.A. Psychology',
        'desc' => 'M.A. Psychology Clinical & Counseling Psychology Sem III',
        'url' => $BASE . 'SYLLABUS2021/SY_MA_III_PSY_2021_R.pdf',
      ),
      27 => 
      array (
        'name' => 'M.A. Psychology — Semester IV',
        'badge' => 'M.A. Psychology',
        'desc' => 'M.A. Psychology Positive & Applied Psychology Sem IV',
        'url' => $BASE . 'SYLLABUS2021/SY_MA_IV_PSY_2021.pdf',
      ),
      28 => 
      array (
        'name' => 'M.Com. (Commerce) — Semester I',
        'badge' => 'M.Com.',
        'desc' => 'M.Com. First Semester Advanced Accounting & Schemes',
        'url' => $BASE . 'SYLLABUS2021/RSY_MCOM_I_2021.pdf',
      ),
      29 => 
      array (
        'name' => 'M.Com. (Commerce) — Semester II',
        'badge' => 'M.Com.',
        'desc' => 'M.Com. Second Semester Corporate Taxation & Audit',
        'url' => $BASE . 'SYLLABUS2021/RSY_MCOM_II_2021.pdf',
      ),
      30 => 
      array (
        'name' => 'M.Com. (Commerce) — Semester III',
        'badge' => 'M.Com.',
        'desc' => 'M.Com. Third Semester Business Environment & Research',
        'url' => $BASE . 'SYLLABUS2021/RSY_MCOM_III_2021.pdf',
      ),
      31 => 
      array (
        'name' => 'M.Com. (Commerce) — Semester IV',
        'badge' => 'M.Com.',
        'desc' => 'M.Com. Fourth Semester Strategic Financial Management',
        'url' => $BASE . 'SYLLABUS2021/RSY_MCOM_IV_2021.pdf',
      ),
    ),
  ),
  2 => 
  array (
    'title' => 'Comprehensive Syllabus Packages (UG & PG Degree Archives)',
    'icon' => 'fa-box-archive',
    'items' => 
    array (
      0 => 
      array (
        'name' => 'UG Courses — Year I Syllabus Package (w.e.f. 2017-18)',
        'badge' => 'UG Package',
        'desc' => 'B.A./BBA/BCA/B.Com/B.Sc. 1st Year Syllabus Bundle',
        'url' => $BASE . 'UTD%20Syllabus/SYUTDUG_IYwef2017_2_2.zip',
      ),
      1 => 
      array (
        'name' => 'UG Courses — Year II Syllabus Package',
        'badge' => 'UG Package',
        'desc' => 'B.A./BBA/BCA/B.Com/B.Sc. 2nd Year Syllabus Bundle',
        'url' => $BASE . 'UTD%20Syllabus/SYUTD_UG_II_Year%20(3)_3.zip',
      ),
      2 => 
      array (
        'name' => 'UG Courses — Year III Syllabus Package',
        'badge' => 'UG Package',
        'desc' => 'B.A./BBA/BCA/B.Com/B.Sc. 3rd Year Syllabus Bundle',
        'url' => $BASE . 'UTD%20Syllabus/SYUTD_UG_III_Year_3.zip',
      ),
      3 => 
      array (
        'name' => 'UG Courses — Semester I (CBCS Scheme)',
        'badge' => 'CBCS Bundle',
        'desc' => 'All UG Programmes 1st Semester CBCS Syllabus Package',
        'url' => $BASE . 'UTD%20Syllabus/UTDCBCS_ISYL_2_2.rar',
      ),
      4 => 
      array (
        'name' => 'UG Courses — Semester II (CBCS Scheme)',
        'badge' => 'CBCS Bundle',
        'desc' => 'All UG Programmes 2nd Semester CBCS Syllabus Package',
        'url' => $BASE . 'UTD%20Syllabus/UTDUGCBCS%20_IISYL_2_2.rar',
      ),
      5 => 
      array (
        'name' => 'UG Courses — Semester III (CBCS Scheme)',
        'badge' => 'CBCS Bundle',
        'desc' => 'All UG Programmes 3rd Semester CBCS Syllabus Package',
        'url' => $BASE . 'UTD%20Syllabus/SYUTD_UGIII2017_2_2.rar',
      ),
      6 => 
      array (
        'name' => 'UG Courses — Semester IV (CBCS Scheme)',
        'badge' => 'CBCS Bundle',
        'desc' => 'All UG Programmes 4th Semester CBCS Syllabus Package',
        'url' => $BASE . 'UTD%20Syllabus/SYUTD_IV_2_2.zip',
      ),
      7 => 
      array (
        'name' => 'UG Courses — Semester V (CBCS Scheme)',
        'badge' => 'CBCS Bundle',
        'desc' => 'All UG Programmes 5th Semester CBCS Syllabus Package',
        'url' => $BASE . 'UTD%20Syllabus/UTD_V_Sem_Syllabus_2_2.zip',
      ),
      8 => 
      array (
        'name' => 'UG Courses — Semester VI (CBCS Scheme)',
        'badge' => 'CBCS Bundle',
        'desc' => 'All UG Programmes 6th Semester CBCS Syllabus Package',
        'url' => $BASE . 'UTD%20Syllabus/SYrUTD_VI_Sem_2_2.zip',
      ),
      9 => 
      array (
        'name' => 'PG Courses — Semester I (All MA/M.Sc./M.Com.)',
        'badge' => 'PG Bundle',
        'desc' => 'All PG Programmes 1st Semester Syllabus Package',
        'url' => $BASE . 'SYLLABUS/sylutd_Ir.zip',
      ),
      10 => 
      array (
        'name' => 'PG Courses — Semester II (All MA/M.Sc./M.Com.)',
        'badge' => 'PG Bundle',
        'desc' => 'All PG Programmes 2nd Semester Syllabus Package',
        'url' => $BASE . 'SYLLABUS/UTDPGSY%20(2)r.zip',
      ),
      11 => 
      array (
        'name' => 'PG Courses — Semester III (All MA/M.Sc./M.Com.)',
        'badge' => 'PG Bundle',
        'desc' => 'All PG Programmes 3rd Semester Syllabus Package',
        'url' => $BASE . 'SYLLABUS/sylutd_IIIr.zip',
      ),
      12 => 
      array (
        'name' => 'PG Courses — Semester IV (All MA/M.Sc./M.Com.)',
        'badge' => 'PG Bundle',
        'desc' => 'All PG Programmes 4th Semester Syllabus Package',
        'url' => $BASE . 'SYLLABUS/4thsemsyllabus.zip',
      ),
    ),
  ),
);
?>

<style>
  .academic-card {
    background: #ffffff;
    border: 1px solid #e2e8f0;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(11, 37, 69, 0.04);
  }
  .btn-standard-doc {
    background: #ffffff;
    color: #0b2545;
    border: 1px solid #cbd5e1;
    border-radius: 6px;
    font-size: 0.84rem;
    font-weight: 500;
    padding: 5px 12px;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    transition: all 0.2s ease;
    text-decoration: none;
    white-space: nowrap;
  }
  .btn-standard-doc:hover {
    background: #0b2545;
    color: #ffffff;
    border-color: #0b2545;
    transform: translateY(-1px);
    box-shadow: 0 2px 6px rgba(11, 37, 69, 0.15);
  }
  .btn-standard-doc:hover i {
    color: #ffffff !important;
  }
  .standard-table {
    width: 100%;
    margin-bottom: 0;
    border-collapse: collapse;
  }
  .standard-table th {
    background: #0b2545;
    color: #ffffff;
    font-weight: 600;
    font-size: 0.85rem;
    padding: 12px 14px;
    letter-spacing: 0.3px;
    border: none;
  }
  .standard-table td {
    padding: 12px 14px;
    vertical-align: middle;
    border-color: #f1f5f9;
    color: #334155;
    font-size: 0.88rem;
  }
  .standard-table tbody tr:hover td {
    background: #f8fafc;
  }
  .standard-badge {
    background: #f1f5f9;
    color: #475569;
    border: 1px solid #e2e8f0;
    font-weight: 500;
    font-size: 0.76rem;
    padding: 3px 8px;
    border-radius: 4px;
    display: inline-block;
  }
  /* Group separator row */
  .group-row td {
    background: #eef4fa !important;
    color: #0b2545 !important;
    font-weight: 700 !important;
    font-size: 0.85rem !important;
    letter-spacing: 0.4px;
    padding: 10px 14px !important;
    border-top: 1px solid #cbd5e1 !important;
    border-bottom: 1px solid #cbd5e1 !important;
  }
  .group-row td i {
    color: #0b2545;
  }
  .filter-input {
    font-size: 0.85rem;
    border-color: #cbd5e1;
    border-radius: 8px;
  }
  .filter-input:focus {
    border-color: #0b2545;
    box-shadow: 0 0 0 3px rgba(11, 37, 69, 0.1);
  }
</style>

<section class="subpage-main-section py-4" style="background-color: #f8fafc;">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">

      <!-- Main Content Area -->
      <div class="col-lg-8 col-xl-9">
        <div class="academic-card bg-white p-4">

          <!-- Standard Document Header -->
          <div class="d-flex flex-wrap justify-content-between align-items-center pb-3 mb-4 border-bottom" style="border-color: #e2e8f0 !important;">
            <div>
              <span class="standard-badge mb-2 d-inline-block">
                <i class="fa fa-graduation-cap me-1 text-secondary"></i> Course Syllabus
              </span>
              <h3 class="fw-bold mb-1" style="color: #0b2545; font-size: 1.45rem;">University Teaching Departments (UTD) Syllabus</h3>
              <p class="text-muted small mb-0">Official Teaching Curricula for UG (B.A., BBA, BCA, B.Com, B.Sc. NEP 2020) and PG (M.A. &amp; M.Com. Departments).</p>
            </div>
            <div class="mt-2 mt-md-0">
              <span class="standard-badge text-dark">
                <i class="fa fa-check-circle text-success me-1"></i> NEP 2020 Approved
              </span>
            </div>
          </div>

          <!-- Search & Filter Bar -->
          <div class="row g-2 mb-3 align-items-center">
            <div class="col-md-6 col-lg-5">
              <div class="input-group">
                <span class="input-group-text bg-white border-end-0" style="border-color:#cbd5e1;"><i class="fa fa-search text-muted"></i></span>
                <input type="text" id="schemeFilter" class="form-control border-start-0 ps-0 filter-input" placeholder="Search UTD course, branch, semester...">
              </div>
            </div>
            <div class="col text-md-end text-muted small">
              <i class="fa fa-file-pdf text-danger me-1"></i> Click to view &amp; download PDF in new tab
            </div>
          </div>

          <!-- Schemes Table -->
          <div class="table-responsive rounded-2 border overflow-hidden">
            <table class="table standard-table" id="schemeTable">
              <thead>
                <tr>
                  <th style="width: 6%;" class="text-center">#</th>
                  <th style="width: 34%;">Programme / Semester</th>
                  <th style="width: 42%;">Details &amp; Subject Modules</th>
                  <th style="width: 18%;" class="text-center">Download</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($groups as $grp): ?>
                <!-- Section Header Row -->
                <tr class="group-row">
                  <td colspan="4">
                    <i class="fa <?= $grp['icon'] ?> me-2"></i>
                    <?= htmlspecialchars($grp['title']) ?>
                  </td>
                </tr>

                <?php 
                $sno = 1;
                foreach ($grp['items'] as $item): 
                  $ext = pathinfo(urldecode($item['url']), PATHINFO_EXTENSION);
                  $iconClass = ($ext === 'zip' || $ext === 'rar') ? 'fa-file-zipper text-warning' : 'fa-file-pdf text-danger';
                  $btnLabel = ($ext === 'zip' || $ext === 'rar') ? 'Download Package' : 'View PDF';
                ?>
                <tr class="scheme-row">
                  <td class="text-center text-muted fw-semibold"><?= $sno++ ?></td>
                  <td class="fw-bold text-dark"><?= htmlspecialchars($item['name']) ?></td>
                  <td>
                    <span class="standard-badge me-2"><?= htmlspecialchars($item['badge']) ?></span>
                    <span class="text-muted small"><?= htmlspecialchars($item['desc']) ?></span>
                  </td>
                  <td class="text-center">
                    <a href="<?= scheme_local_path($item['url']) ?>" target="_blank" rel="noopener noreferrer" class="btn-standard-doc">
                      <i class="fa <?= $iconClass ?>"></i>
                      <span><?= $btnLabel ?></span>
                    </a>
                  </td>
                </tr>
                <?php endforeach; ?>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>

        </div>
      </div>

      <!-- Right Sidebar Column -->
      <div class="col-lg-4 col-xl-3 sticky-top" style="top:20px;z-index:10;">
        <?php require_once __DIR__ . '/../../includes/sidebar.php'; ?>
      </div>

    </div>
  </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function () {
  const filterInput = document.getElementById('schemeFilter');
  if (!filterInput) return;

  filterInput.addEventListener('input', function () {
    const q = this.value.toLowerCase().trim();
    document.querySelectorAll('#schemeTable tbody tr.scheme-row').forEach(function (row) {
      const text = row.textContent.toLowerCase();
      row.style.display = text.includes(q) ? '' : 'none';
    });
  });
});
</script>

<?php require_once __DIR__ . '/../../includes/footer.php'; ?>