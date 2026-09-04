<?php

$res_file = 'd:/xampp/htdocs/sssu/satya-sai/Examination/Results.php';
$exam_file = 'd:/xampp/htdocs/sssu/satya-sai/Examination/ExamSchedule.php';

$medium_css = <<<'CSS'
/* Stat Chips (Medium Sized & Balanced) */
.res-stat-chip,
.es-stat-chip {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 12px;
  padding: 12px 14px;
  display: flex;
  align-items: center;
  gap: 12px;
  height: 100%;
  transition: all 0.2s ease;
  box-shadow: 0 2px 6px rgba(15,23,42,0.03);
}
.res-stat-chip:hover,
.es-stat-chip:hover {
  border-color: #cbd5e1;
  box-shadow: 0 4px 14px rgba(11,37,69,0.06);
  transform: translateY(-2px);
}
.res-stat-icon,
.es-stat-icon {
  width: 38px;
  height: 38px;
  border-radius: 9px;
  background: rgba(245,158,11,0.12);
  color: #d97706;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1.05rem;
  flex-shrink: 0;
}
.res-stat-label,
.es-stat-label {
  font-size: 0.75rem !important;
  font-weight: 700 !important;
  text-transform: uppercase !important;
  color: #64748b !important;
  letter-spacing: 0.3px !important;
  line-height: 1.25 !important;
  margin-bottom: 2px !important;
}
.res-stat-value,
.es-stat-value {
  font-size: 0.88rem !important;
  font-weight: 700 !important;
  color: #0f172a !important;
  line-height: 1.3 !important;
}
CSS;

// Update Results.php
$content = file_get_contents($res_file);
$content = preg_replace('/(\/\* Stat Chips \(Compact & Sleek\) \*\/.*?\.es-stat-value \{[^}]+\})/s', $medium_css, $content);
$content = preg_replace('/(\/\* Stat Chips \*\/.*?\.es-stat-icon \{[^}]+\})/s', $medium_css, $content);
file_put_contents($res_file, $content);

// Update ExamSchedule.php
$content_exam = file_get_contents($exam_file);
$content_exam = preg_replace('/(\/\* Stat Chips \(Compact & Sleek\) \*\/.*?\.es-stat-value \{[^}]+\})/s', $medium_css, $content_exam);
$content_exam = preg_replace('/(\/\* Stat Chips \*\/.*?\.es-stat-icon \{[^}]+\})/s', $medium_css, $content_exam);
file_put_contents($exam_file, $content_exam);

echo "Updated both pages with Medium Sized Stat Chips!\n";

