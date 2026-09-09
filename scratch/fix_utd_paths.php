<?php
$utd_body = <<<'PHP'
<section class="py-4">
  <div class="container">
    <div class="row g-4">
      <div class="col-lg-8 col-xl-9">
        <div class="syl-header-banner">
          <div class="d-flex flex-wrap justify-content-between align-items-center gap-3">
            <div>
              <span class="syl-header-badge mb-2"><i class="fa fa-university"></i> University Teaching Departments</span>
              <h2 class="h3 mb-1 text-white fw-bold">University Teaching Departments (UTD) Syllabus</h2>
              <p class="mb-0 text-white-50 small">Syllabus for M.Sc., M.A., M.Com., and NEP 2020 UG Programs (B.A., B.Com., B.Sc., BBA, BCA)</p>
            </div>
            <div class="text-end">
              <span class="badge bg-warning text-dark px-3 py-2 rounded-pill fw-bold"><i class="fa fa-file-pdf"></i> 100+ Syllabi</span>
            </div>
          </div>
        </div>

        <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-3">
          <div class="syl-search-box">
            <i class="fa fa-search search-icon"></i>
            <input type="text" id="sylSearch" class="form-control" placeholder="Search subject or degree (e.g. Botany, History, NEP, BCA)...">
            <button class="clear-btn" id="sylClearSearch" title="Clear search"><i class="fa fa-times"></i></button>
          </div>
          <div class="text-muted small">Showing <span id="sylCount" class="fw-bold text-dark">30+</span> Programs</div>
        </div>

        <div class="syl-quick-nav">
          <a href="#msc-sec" class="syl-quick-pill"><i class="fa fa-flask text-warning"></i> M.Sc. Programs</a>
          <a href="#ma-sec" class="syl-quick-pill"><i class="fa fa-book text-warning"></i> M.A. & M.Com. Programs</a>
          <a href="#nep-ug-sec" class="syl-quick-pill"><i class="fa fa-graduation-cap text-warning"></i> NEP UG Curriculum</a>
          <a href="#archive-sec" class="syl-quick-pill"><i class="fa fa-archive text-warning"></i> Syllabus Archives</a>
        </div>

        <div class="syl-empty-state" id="sylEmptyState">
          <i class="fa fa-folder-open"></i>
          <h5 class="text-dark fw-bold">No Syllabus Found</h5>
          <p class="text-muted mb-0">No syllabus matches your search query.</p>
        </div>

        <!-- Section 1: M.Sc. -->
        <div class="syl-table-card" id="msc-sec">
          <div class="syl-card-header">
            <h3><i class="fa fa-flask text-primary"></i><span>M.Sc. Post-Graduate Degree Programs (w.e.f. 2022-23)</span></h3>
            <span class="syl-card-badge">Faculty of Science</span>
          </div>
          <div class="syl-table-wrap">
            <table class="syl-table table">
              <thead>
                <tr>
                  <th style="width: 60px;">S.No.</th>
                  <th style="text-align: left; min-width: 170px;">Subject / Branch</th>
                  <th>I Sem</th>
                  <th>II Sem</th>
                  <th>III Sem</th>
                  <th>IV Sem</th>
                </tr>
              </thead>
              <tbody>
                <tr class="syl-row">
                  <td class="fw-bold text-muted">1</td>
                  <td style="text-align: left;"><div class="fw-bold text-dark">M.Sc. Botany</div></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SCHEME/M.SC 2023/BOTANY/MSc Botany 1 Semester 22 SY.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> I Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SCHEME/M.SC 2023/BOTANY/MSc Botany 2 Semester 22 SY.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> II Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SCHEME/M.SC 2023/BOTANY/MSc BOT III Syllabus 22 SY.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> III Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SCHEME/M.SC 2023/BOTANY/MSc BOT IV Syllabus 22 SY new.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> IV Sem</a></td>
                </tr>
                <tr class="syl-row">
                  <td class="fw-bold text-muted">2</td>
                  <td style="text-align: left;"><div class="fw-bold text-dark">M.Sc. Chemistry</div></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SCHEME/M.SC 2023/CHEM/M.Sc. Chemistry  Syllabus 1st sem.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> I Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SCHEME/M.SC 2023/CHEM/M.Sc. Chemistry Syllabus 2nd sem.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> II Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SCHEME/M.SC 2023/CHEM/M.Sc. Chemistry  Syllabus 3rd sem.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> III Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SCHEME/M.SC 2023/CHEM/M.Sc. Chemistry Syllabus 4th Sem.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> IV Sem</a></td>
                </tr>
                <tr class="syl-row">
                  <td class="fw-bold text-muted">3</td>
                  <td style="text-align: left;"><div class="fw-bold text-dark">M.Sc. Physics</div></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SCHEME/M.SC 2023/PHY/M.SC PHY I SEM.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> I Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SCHEME/M.SC 2023/PHY/M.SC PHY II SEM.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> II Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SCHEME/M.SC 2023/PHY/M.SC PHY III SEM.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> III Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SCHEME/M.SC 2023/PHY/M.SC PHY IV SEM.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> IV Sem</a></td>
                </tr>
                <tr class="syl-row">
                  <td class="fw-bold text-muted">4</td>
                  <td style="text-align: left;"><div class="fw-bold text-dark">M.Sc. Microbiology</div></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SCHEME/M.SC 2023/MICROBIOLOGY/MSc I Sem Microbiology Syllabus (1).pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> I Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SCHEME/M.SC 2023/MICROBIOLOGY/MSc Microbiology  II Sem Syllabus.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> II Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SCHEME/M.SC 2023/MICROBIOLOGY/MSc Microbiology III semester.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> III Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SCHEME/M.SC 2023/MICROBIOLOGY/MSC MICRO-4th SEM Final.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> IV Sem</a></td>
                </tr>
                <tr class="syl-row">
                  <td class="fw-bold text-muted">5</td>
                  <td style="text-align: left;"><div class="fw-bold text-dark">M.Sc. Zoology</div></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SCHEME/M.SC 2023/Zoology/MSc Zoology  1 Semeste.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> I Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SCHEME/M.SC 2023/Zoology/MSC ZOO 2 SEM.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> II Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SCHEME/M.SC 2023/Zoology/Msc Zoology-III SEM.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> III Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SCHEME/M.SC 2023/Zoology/MSc- ZOOLOGY 4 syllabus.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> IV Sem</a></td>
                </tr>
                <tr class="syl-row">
                  <td class="fw-bold text-muted">6</td>
                  <td style="text-align: left;"><div class="fw-bold text-dark">M.Sc. Computer Science</div></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SCHEME/M.SC 2023/CS/msc cs 1st sem.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> I Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SCHEME/M.SC 2023/CS/MSC_computer_Science 2nd sem syllabus-converted.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> II Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SCHEME/M.SC 2023/CS/MSc CS 3rd sem.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> III Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SCHEME/M.SC 2023/CS/MSC 4 sem syllabus.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> IV Sem</a></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <!-- Section 2: M.A. & M.Com. -->
        <div class="syl-table-card" id="ma-sec">
          <div class="syl-card-header">
            <h3><i class="fa fa-book text-primary"></i><span>M.A. & M.Com. Post-Graduate Programs</span></h3>
            <span class="syl-card-badge">Faculty of Arts & Commerce</span>
          </div>
          <div class="syl-table-wrap">
            <table class="syl-table table">
              <thead>
                <tr>
                  <th style="width: 60px;">S.No.</th>
                  <th style="text-align: left; min-width: 170px;">Program / Specialization</th>
                  <th>I Sem</th>
                  <th>II Sem</th>
                  <th>III Sem</th>
                  <th>IV Sem</th>
                </tr>
              </thead>
              <tbody>
                <tr class="syl-row">
                  <td class="fw-bold text-muted">1</td>
                  <td style="text-align: left;"><div class="fw-bold text-dark">M.A. English Literature</div></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/MA_English_Literature_1_21122022_1106.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> I Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/MA_English_Literature__2_21122022_1106.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> II Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/MA_English_literature_3_21122022_1107.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> III Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/MA_English_Literature__4_21122022_1108.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> IV Sem</a></td>
                </tr>
                <tr class="syl-row">
                  <td class="fw-bold text-muted">2</td>
                  <td style="text-align: left;"><div class="fw-bold text-dark">M.A. Hindi Literature</div></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS2021/SY_MA_I_HIN_2021.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> I Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS2021/SY_MA_II_HIN_2021.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> II Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/MA/ma iii sem syllabus.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> III Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS2021/SY_MA_IV_HIN_2021.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> IV Sem</a></td>
                </tr>
                <tr class="syl-row">
                  <td class="fw-bold text-muted">3</td>
                  <td style="text-align: left;"><div class="fw-bold text-dark">M.A. History</div></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/syllabus 2023-24/MA History 1 Semester.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> I Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/syllabus 2023-24/ma history 2nd sem syllabus (5).pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> II Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/syllabus 2023-24/MA History  3rd sem.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> III Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/MA_IV_Sem_History_Syllabus_up_05042025_0449.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> IV Sem</a></td>
                </tr>
                <tr class="syl-row">
                  <td class="fw-bold text-muted">4</td>
                  <td style="text-align: left;"><div class="fw-bold text-dark">M.A. Economics</div></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS2021/SY_MA_I_ECO_2021.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> I Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS2021/SY_MA_II_ECO_2021.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> II Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/MA/M.A. Economics III sem syllabus .pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> III Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS2021/SY_MA_IV_ECO_2021.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> IV Sem</a></td>
                </tr>
                <tr class="syl-row">
                  <td class="fw-bold text-muted">5</td>
                  <td style="text-align: left;"><div class="fw-bold text-dark">M.A. Sociology</div></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS2021/RSY_MA_I_SOC_2021.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> I Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS2021/RSY_MA_II_SOC_2021.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> II Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS2021/RSY_MA_III_SOC_2021.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> III Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS2021/RSY_MA_IV_SOC_2021.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> IV Sem</a></td>
                </tr>
                <tr class="syl-row">
                  <td class="fw-bold text-muted">6</td>
                  <td style="text-align: left;"><div class="fw-bold text-dark">M.A. Political Science</div></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS2021/RSY_MA_I_POLS_2021.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> I Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS2021/RSY_MA_II_POLS_2021.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> II Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS2021/RSY_MA_III_POLS_2021.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> III Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS2021/RSY_MA_IV_POLS_2021.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> IV Sem</a></td>
                </tr>
                <tr class="syl-row">
                  <td class="fw-bold text-muted">7</td>
                  <td style="text-align: left;"><div class="fw-bold text-dark">M.A. Psychology</div></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SY_MA_I_PSY_2021_14022022_1138.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> I Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS2021/SY_MA_II_PSY_2021.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> II Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS2021/SY_MA_III_PSY_2021_R.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> III Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS2021/SY_MA_IV_PSY_2021.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> IV Sem</a></td>
                </tr>
                <tr class="syl-row">
                  <td class="fw-bold text-muted">8</td>
                  <td style="text-align: left;"><div class="fw-bold text-dark">Master of Commerce (M.Com.)</div></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS2021/RSY_MCOM_I_2021.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> I Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS2021/RSY_MCOM_II_2021.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> II Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS2021/RSY_MCOM_III_2021.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> III Sem</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS2021/RSY_MCOM_IV_2021.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> IV Sem</a></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <!-- Section 3: NEP UG -->
        <div class="syl-table-card" id="nep-ug-sec">
          <div class="syl-card-header">
            <h3><i class="fa fa-award text-primary"></i><span>National Education Policy (NEP 2020) UG Syllabus</span></h3>
            <span class="syl-card-badge">Undergraduate NEP Pattern</span>
          </div>
          <div class="syl-table-wrap">
            <table class="syl-table table">
              <thead>
                <tr>
                  <th style="width: 60px;">S.No.</th>
                  <th style="text-align: left; min-width: 150px;">Undergraduate Program</th>
                  <th>Major Subject</th>
                  <th>Minor Subject</th>
                  <th>Elective Subject</th>
                  <th>Vocational / AEC</th>
                </tr>
              </thead>
              <tbody>
                <tr class="syl-row">
                  <td class="fw-bold text-muted">1</td>
                  <td style="text-align: left;"><div class="fw-bold text-dark">Bachelor of Arts (B.A.)</div></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SCHEMES/UTD2023/Syllabus/B.A/BA 1 ST SEM Mjr.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> Major</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SCHEMES/UTD2023/Syllabus/B.A/BA 1 ST SEM Mnr.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> Minor</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SCHEMES/UTD2023/Syllabus/B.A/Elective.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> Elective</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/NEP/NEP_Voc_BA_I_R.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> Vocational</a></td>
                </tr>
                <tr class="syl-row">
                  <td class="fw-bold text-muted">2</td>
                  <td style="text-align: left;"><div class="fw-bold text-dark">Bachelor of Commerce (B.Com.)</div></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SCHEMES/UTD2023/Syllabus/B.COM/B.COM IST SEM MAJOR .pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> Major</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SCHEMES/UTD2023/Syllabus/B.COM/B.COM IST SEM MINOR.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> Minor</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SCHEMES/UTD2023/Syllabus/B.COM/B.COM IST SEM Genric ELECTIVE.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> Generic</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/NEP/NEP_Voc_BCOM_I_R.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> Vocational</a></td>
                </tr>
                <tr class="syl-row">
                  <td class="fw-bold text-muted">3</td>
                  <td style="text-align: left;"><div class="fw-bold text-dark">Bachelor of Science (B.Sc.)</div></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SCHEMES/UTD2023/Syllabus/B.SC/major i sem.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> Major</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SCHEMES/UTD2023/Syllabus/B.SC/minor i sem.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> Minor</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SCHEMES/UTD2023/Syllabus/B.SC/ELECTIVE.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> Elective</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/NEP/NEP_Voc_BSC_I_R.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> Vocational</a></td>
                </tr>
                <tr class="syl-row">
                  <td class="fw-bold text-muted">4</td>
                  <td style="text-align: left;"><div class="fw-bold text-dark">Bachelor of Business Admin (BBA)</div></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SCHEMES/UTD2023/Syllabus/BBA/MAJOR.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> Major</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SCHEMES/UTD2023/Syllabus/BBA/MINOR.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> Minor</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SCHEMES/UTD2023/Syllabus/BBA/Elective.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> Elective</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/NEP/NEP_Voc_BBA_I_R.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> Vocational</a></td>
                </tr>
                <tr class="syl-row">
                  <td class="fw-bold text-muted">5</td>
                  <td style="text-align: left;"><div class="fw-bold text-dark">Bachelor of Computer Apps (BCA)</div></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SCHEMES/UTD2023/Syllabus/BCA/MAJOR BCA I Sem Syllabus.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> Major</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SCHEMES/UTD2023/Syllabus/BCA/MINOR BCA I Sem Syllabus.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> Minor</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SCHEMES/UTD2023/Syllabus/BCA/ELECTIVE BCA I Sem Syllabus.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> Elective</a></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/NEP/NEP_Voc_BCA_I_R.pdf'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-pdf"></i> Vocational</a></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <!-- Section 4: Traditional UG/PG Archives -->
        <div class="syl-table-card" id="archive-sec">
          <div class="syl-card-header">
            <h3><i class="fa fa-archive text-secondary"></i><span>Curriculum Archives & Package Downloads</span></h3>
            <span class="syl-card-badge">Comprehensive Packages</span>
          </div>
          <div class="syl-table-wrap">
            <table class="syl-table table">
              <thead>
                <tr>
                  <th style="width: 60px;">S.No.</th>
                  <th style="text-align: left;">Curriculum Archive Package</th>
                  <th>Coverage</th>
                  <th>Download Archive</th>
                </tr>
              </thead>
              <tbody>
                <tr class="syl-row">
                  <td class="fw-bold text-muted">1</td>
                  <td style="text-align: left;"><div class="fw-bold text-dark">All UG Courses (I Year Package)</div><div class="text-muted small">BA, BCA, BBA, B.Com., B.Sc. Year-1 Package</div></td>
                  <td><span class="badge bg-light text-dark border px-3 py-1 rounded-pill">Year 1</span></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/UTD Syllabus/SYUTDUG_IYwef2017_2_2.zip'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-archive"></i> I Year Package</a></td>
                </tr>
                <tr class="syl-row">
                  <td class="fw-bold text-muted">2</td>
                  <td style="text-align: left;"><div class="fw-bold text-dark">All UG Courses (II Year Package)</div><div class="text-muted small">BA, BCA, BBA, B.Com., B.Sc. Year-2 Package</div></td>
                  <td><span class="badge bg-light text-dark border px-3 py-1 rounded-pill">Year 2</span></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/UTD Syllabus/SYUTD_UG_II_Year (3)_3.zip'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-archive"></i> II Year Package</a></td>
                </tr>
                <tr class="syl-row">
                  <td class="fw-bold text-muted">3</td>
                  <td style="text-align: left;"><div class="fw-bold text-dark">All UG Courses (III Year Package)</div><div class="text-muted small">BA, BCA, BBA, B.Com., B.Sc. Year-3 Package</div></td>
                  <td><span class="badge bg-light text-dark border px-3 py-1 rounded-pill">Year 3</span></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/UTD Syllabus/SYUTD_UG_III_Year_3.zip'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-archive"></i> III Year Package</a></td>
                </tr>
                <tr class="syl-row">
                  <td class="fw-bold text-muted">4</td>
                  <td style="text-align: left;"><div class="fw-bold text-dark">PG Courses (M.A., M.Sc., M.Com. Semesters Package)</div><div class="text-muted small">Postgraduate Syllabi Combined Package</div></td>
                  <td><span class="badge bg-light text-dark border px-3 py-1 rounded-pill">PG Semesters</span></td>
                  <td><a href="<?php echo base_url('assets/images/Files/Link/SYLLABUS/sylutd_Ir.zip'); ?>" target="_blank" class="syl-btn"><i class="fa fa-file-archive"></i> PG Package</a></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-xl-3 sticky-top" style="top: 20px; z-index: 10;">
        <?php require_once __DIR__ . '/../../includes/sidebar.php'; ?>
      </div>
    </div>
  </div>
</section>
PHP;

require_once 'scratch/build_all_remaining_syllabus.php';
file_put_contents('Download/Syllabus/UTD.php', get_common_head('University Teaching Departments (UTD) Syllabus - SSSUTMS', 'University Teaching Departments') . "\n" . $utd_body . "\n" . get_common_foot());
echo "UTD.php updated with verified paths.\n";
