<?php
$page_title = 'Science - SSSUTMS';
$banner_title = 'Science';
$banner_category = 'Academic';

require_once __DIR__ . '/../../config.php';
require_once __DIR__ . '/../../includes/header.php';
require_once __DIR__ . '/../../includes/topbar.php';
require_once __DIR__ . '/../../includes/navbar.php';
require_once __DIR__ . '/../../includes/page-banner.php';
?>

<section class="subpage-main-section py-4 bg-light">
  <div class="container-fluid px-lg-5">
    <div class="row g-4 align-items-start">
      
      <!-- Main Content Area (Left) -->
      <div class="col-lg-8 col-xl-9">
        <div class="content-card">
          <div class="content-card-body">
            <p><b> Faculty  of  Science</b></p><table class="table table-bordered" ><tbody><tr><td colspan="3" style="text-align: center;">M.Sc.</td></tr><tr><td><span style="font-weight: bolder;">Branch</span></td><td><span style="font-weight: bolder;">Duration in Year</span></td><td><span style="font-weight: bolder;">Intake</span></td></tr><tr><td <br="">Physics</td><td>&nbsp;2 Year</td><td>20</td></tr><tr><td <br="">Chemistry</td><td><p>&nbsp;2 Year</p></td><td>20</td></tr><tr><td <br="">Computer Science</td><td>&nbsp;2 Year</td><td>20</td></tr><tr><td <br="">Mathematics</td><td>2 Year</td><td>20</td></tr><tr><td <br="">Botany</td><td>2 Year</td><td>20</td></tr><tr><td <br="">Zoology</td><td>2 Year</td><td>20</td></tr><tr><td <br=""><br></td><td><br></td><td><br></td></tr></tbody></table><table class="table table-bordered"><tbody><tr><td><p style="font-size: 14px;"><br></p><table class="table table-bordered" style="width: 743px; background-color: rgba(0, 0, 0, 0.03);"><tbody><tr><td colspan="3" style="text-align: center;"><span style="font-family: Arial, Helvetica, sans-serif; font-size: 16px; text-align: start;">B. Sc.&nbsp;</span></td></tr><tr><td><span style="font-weight: bolder;">Branch</span></td><td><span style="font-weight: bolder;">Duration in Year</span></td><td><span style="font-weight: bolder;">Intake</span></td></tr><tr><td <br=""><span style="font-family: Arial, Helvetica, sans-serif; font-size: 16px;">Bachelor of Science in CS/IT/Bio/Maths/Microbiology/Biochemistry/</span></td><td>&nbsp;3 Year</td><td>120</td></tr><tr><td <br=""></td><td></td><td></td></tr></tbody></table></td></tr></tbody></table><br>
          </div>
        </div>
      </div>

      <!-- Sticky Category Sidebar (Right) -->
      <div class="col-lg-4 col-xl-3 sticky-top" style="top: 20px; z-index: 10;">
        <?php require_once __DIR__ . '/../../includes/sidebar.php'; ?>
      </div>

    </div>
  </div>
</section>

<?php require_once __DIR__ . '/../../includes/footer.php'; ?>