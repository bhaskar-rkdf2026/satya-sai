<?php
$page_title = 'B.Sc. (Hons.) Agriculture - Teaching & Examination Scheme - SSSUTMS';
$banner_title = 'B.Sc. (Hons.) Agriculture';
$banner_category = 'Teaching & Examination Scheme';

require_once __DIR__ . '/../../config.php';
require_once __DIR__ . '/../../includes/header.php';
require_once __DIR__ . '/../../includes/topbar.php';
require_once __DIR__ . '/../../includes/navbar.php';
require_once __DIR__ . '/../../includes/page-banner.php';
?>

<style>
  .scheme-header-card {
    background: #ffffff;
    border-radius: 12px;
    box-shadow: 0 4px 20px rgba(0, 43, 91, 0.08);
    border: 1px solid #e2e8f0;
    position: relative;
    overflow: hidden;
  }
  .scheme-header-card::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, #002B5B 0%, #1a569c 100%);
  }
  .scheme-badge {
    background-color: #0b2545;
    color: #ffffff;
    font-size: 0.8rem;
    font-weight: 600;
    padding: 6px 14px;
    border-radius: 50px;
    letter-spacing: 0.5px;
    display: inline-flex;
    align-items: center;
    gap: 6px;
  }
  .scheme-section-card {
    background: #ffffff;
    border-radius: 10px;
    box-shadow: 0 3px 14px rgba(0, 0, 0, 0.04);
    border: 1px solid #e2e8f0;
    overflow: hidden;
    margin-bottom: 25px;
  }
  .scheme-section-header {
    background: #f8fafc;
    border-bottom: 1px solid #e2e8f0;
    padding: 14px 20px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 10px;
  }
  .scheme-section-title {
    color: #0b2545;
    font-weight: 700;
    font-size: 1.05rem;
    margin: 0;
    display: flex;
    align-items: center;
    gap: 8px;
  }
  .scheme-section-badge {
    background: #e2e8f0;
    color: #0b2545;
    font-size: 0.78rem;
    font-weight: 600;
    padding: 4px 10px;
    border-radius: 6px;
  }
  .scheme-table {
    margin-bottom: 0;
    font-size: 0.92rem;
  }
  .scheme-table thead th, .scheme-table tr.table-header-row th, .scheme-table tr.table-header-row td {
    background: #0b2545 !important;
    color: #ffffff !important;
    font-weight: 600;
    text-align: center;
    vertical-align: middle;
    padding: 12px 10px;
    border-color: #134074 !important;
    font-size: 0.88rem;
    letter-spacing: 0.3px;
  }
  .scheme-table tbody td {
    padding: 12px 10px;
    vertical-align: middle;
    border-color: #e2e8f0;
    color: #334155;
  }
  .scheme-table tbody tr:nth-of-type(even) {
    background-color: #f8fafc;
  }
  .scheme-table tbody tr:hover {
    background-color: #f1f5f9;
  }
  .course-chip {
    display: inline-block;
    background: #f1f5f9;
    color: #0b2545;
    font-weight: 600;
    font-size: 0.85rem;
    padding: 4px 10px;
    border-radius: 6px;
    border: 1px solid #cbd5e1;
  }
  .download-btn {
    background: #0b2545;
    color: #ffffff !important;
    font-weight: 500;
    font-size: 0.82rem;
    padding: 5px 12px;
    border-radius: 6px;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    text-decoration: none !important;
    transition: all 0.2s ease;
    white-space: nowrap;
    margin: 2px 2px;
    box-shadow: 0 2px 4px rgba(11,37,69,0.15);
  }
  .download-btn:hover {
    background: #134074;
    color: #ffffff !important;
    transform: translateY(-1px);
    box-shadow: 0 4px 8px rgba(11,37,69,0.25);
  }
  .download-btn i {
    color: #ff7675;
    font-size: 0.95rem;
  }
  .download-btn i.fa-file-archive {
    color: #fdcb6e;
  }
  .scheme-filter-bar {
    background: #ffffff;
    border-radius: 10px;
    padding: 14px 20px;
    border: 1px solid #e2e8f0;
    box-shadow: 0 2px 8px rgba(0,0,0,0.03);
  }
  .search-input-group {
    position: relative;
    max-width: 380px;
    width: 100%;
  }
  .search-input-group input {
    border-radius: 8px;
    padding-left: 38px;
    border: 1px solid #cbd5e1;
    font-size: 0.9rem;
  }
  .search-input-group input:focus {
    border-color: #002B5B;
    box-shadow: 0 0 0 3px rgba(0, 43, 91, 0.15);
  }
  .search-input-group i {
    position: absolute;
    left: 12px;
    top: 50%;
    transform: translateY(-50%);
    color: #94a3b8;
  }
</style>

<section class="subpage-main-section py-4 bg-light">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">
      
      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        
        <!-- Header Banner Card -->
        <div class="scheme-header-card p-4 mb-4">
          <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-2">
            <span class="scheme-badge">
              <i class="fa fa-book"></i> FACULTY OF AGRICULTURE
            </span>
            <span class="badge bg-light text-dark border px-3 py-2">
              <i class="fa fa-university me-1 text-primary"></i> SSSUTMS
            </span>
          </div>
          <h2 class="h3 fw-bold text-dark mt-2 mb-1" style="color: #0b2545 !important;">B.Sc. (Hons.) Agriculture</h2>
          <p class="text-muted mb-0">Bachelor of Science (Honours) Agriculture Scheme</p>
        </div>

        <!-- Filter & Search Bar -->
        <div class="scheme-filter-bar mb-4 d-flex flex-wrap align-items-center justify-content-between gap-3">
          <div class="search-input-group">
            <i class="fa fa-search"></i>
            <input type="text" id="schemeSearch" class="form-control" placeholder="Search branch, course, or semester...">
          </div>
          <div class="text-muted small">
            <i class="fa fa-info-circle me-1 text-primary"></i> Click any semester button to view/download syllabus scheme.
          </div>
        </div>

        <!-- Scheme Content -->
                <!-- Scheme Section Card -->
        <div class="scheme-section-card">
          <div class="scheme-section-header">
            <h5 class="scheme-section-title">
              <i class="fa fa-graduation-cap text-primary"></i> &amp;nbsp;
            </h5>
            <span class="scheme-section-badge">Examination Scheme</span>
          </div>
          <div class="p-0">
            <div class="table-responsive">
              <table class="table table-bordered table-hover align-middle scheme-table mb-0">
<thead><tr class="table-header-row">
<td rowspan="4">
<strong>&nbsp;&nbsp;</strong><!-- [if gte mso 9]><xml>
 <o:OfficeDocumentSettings>
  <o:RelyOnVML/>
  <o:AllowPNG/>
 </o:OfficeDocumentSettings>
</xml><![endif]--><!-- [if gte mso 9]><xml>
 <w:WordDocument>
  <w:View>Normal</w:View>
  <w:Zoom>0</w:Zoom>
  <w:TrackMoves/>
  <w:TrackFormatting/>
  <w:PunctuationKerning/>
  <w:ValidateAgainstSchemas/>
  <w:SaveIfXMLInvalid>false</w:SaveIfXMLInvalid>
  <w:IgnoreMixedContent>false</w:IgnoreMixedContent>
  <w:AlwaysShowPlaceholderText>false</w:AlwaysShowPlaceholderText>
  <w:DoNotPromoteQF/>
  <w:LidThemeOther>EN-US</w:LidThemeOther>
  <w:LidThemeAsian>X-NONE</w:LidThemeAsian>
  <w:LidThemeComplexScript>HI</w:LidThemeComplexScript>
  <w:Compatibility>
   <w:BreakWrappedTables/>
   <w:SnapToGridInCell/>
   <w:WrapTextWithPunct/>
   <w:UseAsianBreakRules/>
   <w:DontGrowAutofit/>
   <w:SplitPgBreakAndParaMark/>
   <w:EnableOpenTypeKerning/>
   <w:DontFlipMirrorIndents/>
   <w:OverrideTableStyleHps/>
  </w:Compatibility>
  <m:mathPr>
   <m:mathFont m:val="Cambria Math"/>
   <m:brkBin m:val="before"/>
   <m:brkBinSub m:val="&#45;-"/>
   <m:smallFrac m:val="off"/>
   <m:dispDef/>
   <m:lMargin m:val="0"/>
   <m:rMargin m:val="0"/>
   <m:defJc m:val="centerGroup"/>
   <m:wrapIndent m:val="1440"/>
   <m:intLim m:val="subSup"/>
   <m:naryLim m:val="undOvr"/>
  </m:mathPr></w:WordDocument>
</xml><![endif]--><!-- [if gte mso 9]><xml>
 <w:LatentStyles DefLockedState="false" DefUnhideWhenUsed="true"
  DefSemiHidden="true" DefQFormat="false" DefPriority="99"
  LatentStyleCount="267">
  <w:LsdException Locked="false" Priority="0" SemiHidden="false"
   UnhideWhenUsed="false" QFormat="true" Name="Normal"/>
  <w:LsdException Locked="false" Priority="9" SemiHidden="false"
   UnhideWhenUsed="false" QFormat="true" Name="heading 1"/>
  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 2"/>
  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 3"/>
  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 4"/>
  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 5"/>
  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 6"/>
  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 7"/>
  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 8"/>
  <w:LsdException Locked="false" Priority="9" QFormat="true" Name="heading 9"/>
  <w:LsdException Locked="false" Priority="39" Name="toc 1"/>
  <w:LsdException Locked="false" Priority="39" Name="toc 2"/>
  <w:LsdException Locked="false" Priority="39" Name="toc 3"/>
  <w:LsdException Locked="false" Priority="39" Name="toc 4"/>
  <w:LsdException Locked="false" Priority="39" Name="toc 5"/>
  <w:LsdException Locked="false" Priority="39" Name="toc 6"/>
  <w:LsdException Locked="false" Priority="39" Name="toc 7"/>
  <w:LsdException Locked="false" Priority="39" Name="toc 8"/>
  <w:LsdException Locked="false" Priority="39" Name="toc 9"/>
  <w:LsdException Locked="false" Priority="35" QFormat="true" Name="caption"/>
  <w:LsdException Locked="false" Priority="10" SemiHidden="false"
   UnhideWhenUsed="false" QFormat="true" Name="Title"/>
  <w:LsdException Locked="false" Priority="1" Name="Default Paragraph Font"/>
  <w:LsdException Locked="false" Priority="11" SemiHidden="false"
   UnhideWhenUsed="false" QFormat="true" Name="Subtitle"/>
  <w:LsdException Locked="false" Priority="22" SemiHidden="false"
   UnhideWhenUsed="false" QFormat="true" Name="Strong"/>
  <w:LsdException Locked="false" Priority="20" SemiHidden="false"
   UnhideWhenUsed="false" QFormat="true" Name="Emphasis"/>
  <w:LsdException Locked="false" QFormat="true" Name="Normal (Web)"/>
  <w:LsdException Locked="false" Priority="59" SemiHidden="false"
   UnhideWhenUsed="false" Name="Table Grid"/>
  <w:LsdException Locked="false" UnhideWhenUsed="false" Name="Placeholder Text"/>
  <w:LsdException Locked="false" Priority="1" SemiHidden="false"
   UnhideWhenUsed="false" QFormat="true" Name="No Spacing"/>
  <w:LsdException Locked="false" Priority="60" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light Shading"/>
  <w:LsdException Locked="false" Priority="61" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light List"/>
  <w:LsdException Locked="false" Priority="62" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light Grid"/>
  <w:LsdException Locked="false" Priority="63" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Shading 1"/>
  <w:LsdException Locked="false" Priority="64" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Shading 2"/>
  <w:LsdException Locked="false" Priority="65" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium List 1"/>
  <w:LsdException Locked="false" Priority="66" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium List 2"/>
  <w:LsdException Locked="false" Priority="67" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 1"/>
  <w:LsdException Locked="false" Priority="68" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 2"/>
  <w:LsdException Locked="false" Priority="69" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 3"/>
  <w:LsdException Locked="false" Priority="70" SemiHidden="false"
   UnhideWhenUsed="false" Name="Dark List"/>
  <w:LsdException Locked="false" Priority="71" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful Shading"/>
  <w:LsdException Locked="false" Priority="72" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful List"/>
  <w:LsdException Locked="false" Priority="73" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful Grid"/>
  <w:LsdException Locked="false" Priority="60" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light Shading Accent 1"/>
  <w:LsdException Locked="false" Priority="61" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light List Accent 1"/>
  <w:LsdException Locked="false" Priority="62" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light Grid Accent 1"/>
  <w:LsdException Locked="false" Priority="63" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 1"/>
  <w:LsdException Locked="false" Priority="64" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 1"/>
  <w:LsdException Locked="false" Priority="65" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium List 1 Accent 1"/>
  <w:LsdException Locked="false" UnhideWhenUsed="false" Name="Revision"/>
  <w:LsdException Locked="false" Priority="34" SemiHidden="false"
   UnhideWhenUsed="false" QFormat="true" Name="List Paragraph"/>
  <w:LsdException Locked="false" Priority="29" SemiHidden="false"
   UnhideWhenUsed="false" QFormat="true" Name="Quote"/>
  <w:LsdException Locked="false" Priority="30" SemiHidden="false"
   UnhideWhenUsed="false" QFormat="true" Name="Intense Quote"/>
  <w:LsdException Locked="false" Priority="66" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium List 2 Accent 1"/>
  <w:LsdException Locked="false" Priority="67" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 1"/>
  <w:LsdException Locked="false" Priority="68" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 1"/>
  <w:LsdException Locked="false" Priority="69" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 1"/>
  <w:LsdException Locked="false" Priority="70" SemiHidden="false"
   UnhideWhenUsed="false" Name="Dark List Accent 1"/>
  <w:LsdException Locked="false" Priority="71" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful Shading Accent 1"/>
  <w:LsdException Locked="false" Priority="72" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful List Accent 1"/>
  <w:LsdException Locked="false" Priority="73" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful Grid Accent 1"/>
  <w:LsdException Locked="false" Priority="60" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light Shading Accent 2"/>
  <w:LsdException Locked="false" Priority="61" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light List Accent 2"/>
  <w:LsdException Locked="false" Priority="62" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light Grid Accent 2"/>
  <w:LsdException Locked="false" Priority="63" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 2"/>
  <w:LsdException Locked="false" Priority="64" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 2"/>
  <w:LsdException Locked="false" Priority="65" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium List 1 Accent 2"/>
  <w:LsdException Locked="false" Priority="66" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium List 2 Accent 2"/>
  <w:LsdException Locked="false" Priority="67" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 2"/>
  <w:LsdException Locked="false" Priority="68" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 2"/>
  <w:LsdException Locked="false" Priority="69" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 2"/>
  <w:LsdException Locked="false" Priority="70" SemiHidden="false"
   UnhideWhenUsed="false" Name="Dark List Accent 2"/>
  <w:LsdException Locked="false" Priority="71" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful Shading Accent 2"/>
  <w:LsdException Locked="false" Priority="72" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful List Accent 2"/>
  <w:LsdException Locked="false" Priority="73" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful Grid Accent 2"/>
  <w:LsdException Locked="false" Priority="60" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light Shading Accent 3"/>
  <w:LsdException Locked="false" Priority="61" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light List Accent 3"/>
  <w:LsdException Locked="false" Priority="62" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light Grid Accent 3"/>
  <w:LsdException Locked="false" Priority="63" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 3"/>
  <w:LsdException Locked="false" Priority="64" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 3"/>
  <w:LsdException Locked="false" Priority="65" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium List 1 Accent 3"/>
  <w:LsdException Locked="false" Priority="66" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium List 2 Accent 3"/>
  <w:LsdException Locked="false" Priority="67" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 3"/>
  <w:LsdException Locked="false" Priority="68" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 3"/>
  <w:LsdException Locked="false" Priority="69" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 3"/>
  <w:LsdException Locked="false" Priority="70" SemiHidden="false"
   UnhideWhenUsed="false" Name="Dark List Accent 3"/>
  <w:LsdException Locked="false" Priority="71" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful Shading Accent 3"/>
  <w:LsdException Locked="false" Priority="72" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful List Accent 3"/>
  <w:LsdException Locked="false" Priority="73" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful Grid Accent 3"/>
  <w:LsdException Locked="false" Priority="60" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light Shading Accent 4"/>
  <w:LsdException Locked="false" Priority="61" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light List Accent 4"/>
  <w:LsdException Locked="false" Priority="62" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light Grid Accent 4"/>
  <w:LsdException Locked="false" Priority="63" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 4"/>
  <w:LsdException Locked="false" Priority="64" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 4"/>
  <w:LsdException Locked="false" Priority="65" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium List 1 Accent 4"/>
  <w:LsdException Locked="false" Priority="66" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium List 2 Accent 4"/>
  <w:LsdException Locked="false" Priority="67" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 4"/>
  <w:LsdException Locked="false" Priority="68" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 4"/>
  <w:LsdException Locked="false" Priority="69" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 4"/>
  <w:LsdException Locked="false" Priority="70" SemiHidden="false"
   UnhideWhenUsed="false" Name="Dark List Accent 4"/>
  <w:LsdException Locked="false" Priority="71" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful Shading Accent 4"/>
  <w:LsdException Locked="false" Priority="72" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful List Accent 4"/>
  <w:LsdException Locked="false" Priority="73" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful Grid Accent 4"/>
  <w:LsdException Locked="false" Priority="60" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light Shading Accent 5"/>
  <w:LsdException Locked="false" Priority="61" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light List Accent 5"/>
  <w:LsdException Locked="false" Priority="62" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light Grid Accent 5"/>
  <w:LsdException Locked="false" Priority="63" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 5"/>
  <w:LsdException Locked="false" Priority="64" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 5"/>
  <w:LsdException Locked="false" Priority="65" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium List 1 Accent 5"/>
  <w:LsdException Locked="false" Priority="66" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium List 2 Accent 5"/>
  <w:LsdException Locked="false" Priority="67" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 5"/>
  <w:LsdException Locked="false" Priority="68" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 5"/>
  <w:LsdException Locked="false" Priority="69" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 5"/>
  <w:LsdException Locked="false" Priority="70" SemiHidden="false"
   UnhideWhenUsed="false" Name="Dark List Accent 5"/>
  <w:LsdException Locked="false" Priority="71" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful Shading Accent 5"/>
  <w:LsdException Locked="false" Priority="72" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful List Accent 5"/>
  <w:LsdException Locked="false" Priority="73" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful Grid Accent 5"/>
  <w:LsdException Locked="false" Priority="60" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light Shading Accent 6"/>
  <w:LsdException Locked="false" Priority="61" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light List Accent 6"/>
  <w:LsdException Locked="false" Priority="62" SemiHidden="false"
   UnhideWhenUsed="false" Name="Light Grid Accent 6"/>
  <w:LsdException Locked="false" Priority="63" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Shading 1 Accent 6"/>
  <w:LsdException Locked="false" Priority="64" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Shading 2 Accent 6"/>
  <w:LsdException Locked="false" Priority="65" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium List 1 Accent 6"/>
  <w:LsdException Locked="false" Priority="66" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium List 2 Accent 6"/>
  <w:LsdException Locked="false" Priority="67" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 1 Accent 6"/>
  <w:LsdException Locked="false" Priority="68" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 2 Accent 6"/>
  <w:LsdException Locked="false" Priority="69" SemiHidden="false"
   UnhideWhenUsed="false" Name="Medium Grid 3 Accent 6"/>
  <w:LsdException Locked="false" Priority="70" SemiHidden="false"
   UnhideWhenUsed="false" Name="Dark List Accent 6"/>
  <w:LsdException Locked="false" Priority="71" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful Shading Accent 6"/>
  <w:LsdException Locked="false" Priority="72" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful List Accent 6"/>
  <w:LsdException Locked="false" Priority="73" SemiHidden="false"
   UnhideWhenUsed="false" Name="Colorful Grid Accent 6"/>
  <w:LsdException Locked="false" Priority="19" SemiHidden="false"
   UnhideWhenUsed="false" QFormat="true" Name="Subtle Emphasis"/>
  <w:LsdException Locked="false" Priority="21" SemiHidden="false"
   UnhideWhenUsed="false" QFormat="true" Name="Intense Emphasis"/>
  <w:LsdException Locked="false" Priority="31" SemiHidden="false"
   UnhideWhenUsed="false" QFormat="true" Name="Subtle Reference"/>
  <w:LsdException Locked="false" Priority="32" SemiHidden="false"
   UnhideWhenUsed="false" QFormat="true" Name="Intense Reference"/>
  <w:LsdException Locked="false" Priority="33" SemiHidden="false"
   UnhideWhenUsed="false" QFormat="true" Name="Book Title"/>
  <w:LsdException Locked="false" Priority="37" Name="Bibliography"/>
  <w:LsdException Locked="false" Priority="39" QFormat="true" Name="TOC Heading"/>
 </w:LatentStyles>
</xml><![endif]--><!-- [if gte mso 10]>
<style>
 /* Style Definitions */
 table.MsoNormalTable
	{mso-style-name:"Table Normal";
	mso-tstyle-rowband-size:0;
	mso-tstyle-colband-size:0;
	mso-style-noshow:yes;
	mso-style-priority:99;
	mso-style-parent:"";
	mso-padding-alt:0cm 5.4pt 0cm 5.4pt;
	mso-para-margin-top:0cm;
	mso-para-margin-right:0cm;
	mso-para-margin-bottom:10.0pt;
	mso-para-margin-left:0cm;
	line-height:115%;
	mso-pagination:widow-orphan;
	font-size:11.0pt;
	mso-bidi-font-size:10.0pt;
	font-family:"Cambria","serif";
	mso-ascii-font-family:Cambria;
	mso-ascii-theme-font:minor-latin;
	mso-hansi-font-family:Cambria;
	mso-hansi-theme-font:minor-latin;
	mso-ansi-language:EN-US;
	mso-fareast-language:EN-US;}
</style>
<![endif]-->
<strong>Bachelor of Science (B.Sc.) (Hon's.) Agriculture</strong>
<strong>Semester-I as per Sixth Dean Committee,</strong>
<strong> w.e.f. 2025-26</strong>
</td>
<td class="text-center"><a href="<?= base_url('assets/images/Files/Link/1st_sem_scheme._02022026_0529.pdf') ?>" target="_blank" class="download-btn"><i class="fa fa-file-pdf"></i> First Semester</a></td>
</tr></thead><tbody><tr>
<td class="text-center">&nbsp;</td>
</tr>
<tr>
<td class="text-center">&nbsp;</td>
</tr>
<tr>
<td class="text-center">&nbsp;</td>
</tr>
</tbody>
</table>
            </div>
          </div>
        </div>
        <!-- Scheme Section Card -->
        <div class="scheme-section-card">
          <div class="scheme-section-header">
            <h5 class="scheme-section-title">
              <i class="fa fa-graduation-cap text-primary"></i> &amp;nbsp;
            </h5>
            <span class="scheme-section-badge">Examination Scheme</span>
          </div>
          <div class="p-0">
            <div class="table-responsive">
              <table class="table table-bordered table-hover align-middle scheme-table mb-0">
<thead><tr class="table-header-row">
<td>
<strong>S.No.</strong>
</td>
<td>
<strong>As per Fifth Dean Committee</strong>
</td>
<td>
<strong>Non CBCS &nbsp;(Old scheme)</strong>
</td>
</tr></thead><tbody><tr>
<td>
<strong>1</strong>
</td>
<td>
<a href="<?= base_url('assets/images/Files/Link/SCHEMES/BSCAG/fifth_Dean/I_Sem_SC.pdf') ?>" target="_blank" class="download-btn"><i class="fa fa-file-pdf"></i> I-Semester</a>
</td>
<td>
<a href="<?= base_url('assets/images/Files/Link/SCHEMES/BSCAG/SCBSCAG_I.pdf') ?>" target="_blank" class="download-btn"><i class="fa fa-file-pdf"></i> I Semester</a>
</td>
</tr>
<tr>
<td>
<strong>2</strong>
</td>
<td>
<a href="<?= base_url('assets/images/Files/Link/SCHEMES/BSCAG/fifth_Dean/II_Sem_SC.pdf') ?>" target="_blank" class="download-btn"><i class="fa fa-file-pdf"></i> II-Semester</a>
</td>
<td>
<a href="<?= base_url('assets/images/Files/Link/SCHEME/II_sc_Non_CBCS.pdf') ?>" target="_blank" class="download-btn"><i class="fa fa-file-pdf"></i> II Semester</a>
</td>
</tr>
<tr>
<td>
<strong>3</strong>
</td>
<td>
<a href="<?= base_url('assets/images/Files/Link/SCHEMES/BSCAG/fifth_Dean/III_Sem_SC.pdf') ?>" target="_blank" class="download-btn"><i class="fa fa-file-pdf"></i> III-Semester</a>
</td>
<td>
<a href="<?= base_url('assets/images/Files/Link/SCHEMES/BSCAG/SCBAG_IIIr.pdf') ?>" target="_blank" class="download-btn"><i class="fa fa-file-pdf"></i> III Semester</a>
</td>
</tr>
<tr>
<td>
<strong>4</strong>
</td>
<td>
<a href="<?= base_url('assets/images/Files/Link/SCHEMES/BSCAG/fifth_Dean/IV_Sem_SC.pdf') ?>" target="_blank" class="download-btn"><i class="fa fa-file-pdf"></i> IV-Semester</a>
</td>
<td>
<a href="<?= base_url('assets/images/Files/Link/SCHEMES/BSCAG/SCBAG_IVr.pdf') ?>" target="_blank" class="download-btn"><i class="fa fa-file-pdf"></i> IV Semester</a>
</td>
</tr>
<tr>
<td>
<strong>5</strong>
</td>
<td>
<a href="<?= base_url('assets/images/Files/Link/SCHEMES/BSCAG/fifth_Dean/V_Sem_SC.pdf') ?>" target="_blank" class="download-btn"><i class="fa fa-file-pdf"></i> V-Semester</a>
</td>
<td>
<a href="<?= base_url('assets/images/Files/Link/SCHEMES/BSCAG/SCBAG_V.pdf') ?>" target="_blank" class="download-btn"><i class="fa fa-file-pdf"></i> V Semester</a>
</td>
</tr>
<tr>
<td>
<strong>6</strong>
</td>
<td>
<a href="<?= base_url('assets/images/Files/Link/SCHEMES/BSCAG/fifth_Dean/VI_Sem_SC.pdf') ?>" target="_blank" class="download-btn"><i class="fa fa-file-pdf"></i> VI-Semester</a>
</td>
<td>
<a href="<?= base_url('assets/images/Files/Link/SCHEMES/BSCAG/SCBAG_VI.pdf') ?>" target="_blank" class="download-btn"><i class="fa fa-file-pdf"></i> VI Semester</a>
</td>
</tr>
<tr>
<td>
<strong>7</strong>
</td>
<td>
<a href="<?= base_url('assets/images/Files/Link/SCHEMES/BSCAG/fifth_Dean/VII_Sem_SC.pdf') ?>" target="_blank" class="download-btn"><i class="fa fa-file-pdf"></i> VII-Semester</a>
</td>
<td>
<a href="<?= base_url('assets/images/Files/Link/SCHEMES/BSCAG/SCB Sc (Agri) 7th Sem non-cbcs.pdf') ?>" target="_blank" class="download-btn"><i class="fa fa-file-pdf"></i> VII Semester</a>
</td>
</tr>
<tr>
<td>
<strong>8</strong>
</td>
<td>
<a href="<?= base_url('assets/images/Files/Link/SCHEMES/BSCAG/fifth_Dean/VIII_Sem_SC.pdf') ?>" target="_blank" class="download-btn"><i class="fa fa-file-pdf"></i> VIII-Semester</a>
</td>
<td>
<a href="<?= base_url('assets/images/Files/Link/SCHEMES/BSCAG/SCBScAG_NonCBCS_ 8.pdf') ?>" target="_blank" class="download-btn"><i class="fa fa-file-pdf"></i> VIII Semester</a>
</td>
</tr>
</tbody>
</table>
            </div>
          </div>
        </div>


      </div>

      <!-- Right Sidebar (3 Cols) -->
      <div class="col-lg-4 col-xl-3">
        <?php require_once __DIR__ . '/../../includes/sidebar.php'; ?>
      </div>

    </div>
  </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
  const searchInput = document.getElementById('schemeSearch');
  if (searchInput) {
    searchInput.addEventListener('input', function() {
      const q = this.value.toLowerCase().trim();
      const tables = document.querySelectorAll('.scheme-table');
      
      tables.forEach(table => {
        const rows = table.querySelectorAll('tbody tr');
        let hasVisibleRow = false;
        
        rows.forEach(row => {
          const text = row.textContent.toLowerCase();
          if (text.includes(q)) {
            row.style.display = '';
            hasVisibleRow = true;
          } else {
            row.style.display = 'none';
          }
        });
        
        // Show/hide parent section card if all rows hidden
        const card = table.closest('.scheme-section-card');
        if (card) {
          card.style.display = (hasVisibleRow || q === '') ? '' : 'none';
        }
      });
    });
  }
});
</script>

<?php require_once __DIR__ . '/../../includes/footer.php'; ?>