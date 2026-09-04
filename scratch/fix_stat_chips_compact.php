<?php

$res_file = 'd:/xampp/htdocs/sssu/satya-sai/Examination/Results.php';
$exam_file = 'd:/xampp/htdocs/sssu/satya-sai/Examination/ExamSchedule.php';

$compact_css = <<<'CSS'
/* Stat Chips (Compact & Sleek) */
.res-stat-chip,
.es-stat-chip {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 10px;
  padding: 10px 12px;
  display: flex;
  align-items: center;
  gap: 10px;
  height: 100%;
  transition: all 0.2s ease;
  box-shadow: 0 2px 6px rgba(15,23,42,0.03);
}
.res-stat-chip:hover,
.es-stat-chip:hover {
  border-color: #cbd5e1;
  box-shadow: 0 4px 12px rgba(11,37,69,0.06);
  transform: translateY(-2px);
}
.res-stat-icon,
.es-stat-icon {
  width: 32px;
  height: 32px;
  border-radius: 8px;
  background: rgba(245,158,11,0.12);
  color: #d97706;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 0.9rem;
  flex-shrink: 0;
}
.res-stat-label,
.es-stat-label {
  font-size: 0.7rem !important;
  font-weight: 700 !important;
  text-transform: uppercase !important;
  color: #64748b !important;
  letter-spacing: 0.3px !important;
  line-height: 1.2 !important;
  margin-bottom: 2px !important;
}
.res-stat-value,
.es-stat-value {
  font-size: 0.8rem !important;
  font-weight: 700 !important;
  color: #0f172a !important;
  line-height: 1.25 !important;
}
CSS;

// Update Results.php
$content = file_get_contents($res_file);

// Replace CSS
$content = preg_replace('/(\/\* Stat Chips \*\/.*?\.res-stat-icon \{[^}]+\})/s', $compact_css, $content);

// Replace Stat Chips HTML in Results.php
$old_results_html = <<<'HTML'
              <!-- Stat Chips -->
              <div class="row g-3 align-items-stretch mb-4">
                <div class="col-sm-6 col-md-3">
                  <div class="res-stat-chip">
                    <div class="res-stat-icon"><i class="fa-solid fa-square-poll-vertical"></i></div>
                    <div>
                      <div class="text-muted extra-small uppercase fw-bold">Declarations</div>
                      <div class="fw-bold text-dark fs-6">Session 2026-2024</div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 col-md-3">
                  <div class="res-stat-chip">
                    <div class="res-stat-icon"><i class="fa-solid fa-laptop-medical"></i></div>
                    <div>
                      <div class="text-muted extra-small uppercase fw-bold">Medical / Ayush</div>
                      <div class="fw-bold text-dark fs-6">MBBS / BAMS / BHMS</div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 col-md-3">
                  <div class="res-stat-chip">
                    <div class="res-stat-icon"><i class="fa-solid fa-gears"></i></div>
                    <div>
                      <div class="text-muted extra-small uppercase fw-bold">Engineering / Tech</div>
                      <div class="fw-bold text-dark fs-6">BE / BCA / MCA</div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 col-md-3">
                  <div class="res-stat-chip">
                    <div class="res-stat-icon"><i class="fa-solid fa-briefcase"></i></div>
                    <div>
                      <div class="text-muted extra-small uppercase fw-bold">Management &amp; Arts</div>
                      <div class="fw-bold text-dark fs-6">MBA / BBA / BA</div>
                    </div>
                  </div>
                </div>
              </div>
HTML;

$new_results_html = <<<'HTML'
              <!-- Stat Chips (Compact) -->
              <div class="row g-2 align-items-stretch mb-4">
                <div class="col-sm-6 col-md-3">
                  <div class="res-stat-chip">
                    <div class="res-stat-icon"><i class="fa-solid fa-square-poll-vertical"></i></div>
                    <div>
                      <div class="res-stat-label">Declarations</div>
                      <div class="res-stat-value">Session 2026-24</div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 col-md-3">
                  <div class="res-stat-chip">
                    <div class="res-stat-icon"><i class="fa-solid fa-laptop-medical"></i></div>
                    <div>
                      <div class="res-stat-label">Medical / Ayush</div>
                      <div class="res-stat-value">MBBS / BAMS / BHMS</div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 col-md-3">
                  <div class="res-stat-chip">
                    <div class="res-stat-icon"><i class="fa-solid fa-gears"></i></div>
                    <div>
                      <div class="res-stat-label">Engineering / Tech</div>
                      <div class="res-stat-value">BE / BCA / MCA</div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 col-md-3">
                  <div class="res-stat-chip">
                    <div class="res-stat-icon"><i class="fa-solid fa-briefcase"></i></div>
                    <div>
                      <div class="res-stat-label">Management / Arts</div>
                      <div class="res-stat-value">MBA / BBA / BA</div>
                    </div>
                  </div>
                </div>
              </div>
HTML;

$content = str_replace($old_results_html, $new_results_html, $content);
file_put_contents($res_file, $content);
echo "Updated Results.php with compact stat chips!\n";


// Update ExamSchedule.php
$content_exam = file_get_contents($exam_file);
$content_exam = preg_replace('/(\/\* Stat Chips \*\/.*?\.es-stat-icon \{[^}]+\})/s', $compact_css, $content_exam);

$old_exam_html = <<<'HTML'
              <!-- Stat Chips -->
              <div class="row g-3 align-items-stretch mb-4">
                <div class="col-sm-6 col-md-3">
                  <div class="es-stat-chip">
                    <div class="es-stat-icon"><i class="fa-solid fa-calendar-days"></i></div>
                    <div>
                      <div class="text-muted extra-small uppercase fw-bold">Session</div>
                      <div class="fw-bold text-dark fs-6">2026 - 2024</div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 col-md-3">
                  <div class="es-stat-chip">
                    <div class="es-stat-icon"><i class="fa-solid fa-notes-medical"></i></div>
                    <div>
                      <div class="text-muted extra-small uppercase fw-bold">Medical</div>
                      <div class="fw-bold text-dark fs-6">BAMS / BHMS</div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 col-md-3">
                  <div class="es-stat-chip">
                    <div class="es-stat-icon"><i class="fa-solid fa-laptop-code"></i></div>
                    <div>
                      <div class="text-muted extra-small uppercase fw-bold">Technical</div>
                      <div class="fw-bold text-dark fs-6">BE / BCA / MCA</div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 col-md-3">
                  <div class="es-stat-chip">
                    <div class="es-stat-icon"><i class="fa-solid fa-file-pdf"></i></div>
                    <div>
                      <div class="text-muted extra-small uppercase fw-bold">Downloads</div>
                      <div class="fw-bold text-dark fs-6">PDF Timetables</div>
                    </div>
                  </div>
                </div>
              </div>
HTML;

$new_exam_html = <<<'HTML'
              <!-- Stat Chips (Compact) -->
              <div class="row g-2 align-items-stretch mb-4">
                <div class="col-sm-6 col-md-3">
                  <div class="es-stat-chip">
                    <div class="es-stat-icon"><i class="fa-solid fa-calendar-days"></i></div>
                    <div>
                      <div class="es-stat-label">Session</div>
                      <div class="es-stat-value">2026 - 2024</div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 col-md-3">
                  <div class="es-stat-chip">
                    <div class="es-stat-icon"><i class="fa-solid fa-notes-medical"></i></div>
                    <div>
                      <div class="es-stat-label">Medical</div>
                      <div class="es-stat-value">BAMS / BHMS</div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 col-md-3">
                  <div class="es-stat-chip">
                    <div class="es-stat-icon"><i class="fa-solid fa-laptop-code"></i></div>
                    <div>
                      <div class="es-stat-label">Technical</div>
                      <div class="es-stat-value">BE / BCA / MCA</div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 col-md-3">
                  <div class="es-stat-chip">
                    <div class="es-stat-icon"><i class="fa-solid fa-file-pdf"></i></div>
                    <div>
                      <div class="es-stat-label">Downloads</div>
                      <div class="es-stat-value">PDF Timetables</div>
                    </div>
                  </div>
                </div>
              </div>
HTML;

$content_exam = str_replace($old_exam_html, $new_exam_html, $content_exam);
file_put_contents($exam_file, $content_exam);
echo "Updated ExamSchedule.php with compact stat chips!\n";

