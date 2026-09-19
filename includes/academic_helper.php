<?php
/**
 * Academic Helper Functions
 * Manages SEO metadata, page information, documents, circulars & activities
 * across all 46 Academic sub-pages (Faculties [14], Committees [9], Core [9], Activities [6], T&P [2], NAAC [8]).
 */

require_once __DIR__ . '/../config.php';

/**
 * Returns full master catalog of all 46 Academic pages grouped into 6 categories.
 */
function get_academic_page_catalog() {
    return [
        // Category 1: Faculties and Departments (14 Pages)
        'EngineeringAndTechnology' => [
            'category' => 'Faculties & Departments',
            'cat_key' => 'faculties',
            'title' => 'Faculty of Engineering & Technology',
            'slug' => 'Academic/FacultiesAndDepartments/EngineeringAndTechnology.php',
            'icon' => 'fa-microchip',
            'default_title' => 'Faculty of Engineering & Technology | SSSUTMS',
            'default_desc' => 'Explore B.Tech, M.Tech, and Diploma engineering programs with advanced labs, experienced faculty, and industry-oriented curriculum at SSSUTMS.',
            'default_keywords' => 'engineering college bhopal, btech mp, mechanical electrical cse, sssutms engineering faculty'
        ],
        'Pharmacy' => [
            'category' => 'Faculties & Departments',
            'cat_key' => 'faculties',
            'title' => 'Faculty of Pharmacy',
            'slug' => 'Academic/FacultiesAndDepartments/Pharmacy.php',
            'icon' => 'fa-pills',
            'default_title' => 'Faculty of Pharmacy - B.Pharm & M.Pharm | SSSUTMS',
            'default_desc' => 'PCI approved Pharmacy college offering B.Pharm, M.Pharm, and D.Pharm with advanced formulation labs and pharmaceutical research facilities.',
            'default_keywords' => 'pharmacy college sehore, b pharm admission, pci approved institute mp, sssutms pharmacy'
        ],
        'Education' => [
            'category' => 'Faculties & Departments',
            'cat_key' => 'faculties',
            'title' => 'Faculty of Education',
            'slug' => 'Academic/FacultiesAndDepartments/Education.php',
            'icon' => 'fa-book-open-reader',
            'default_title' => 'Faculty of Education - B.Ed, M.Ed, B.P.Ed | SSSUTMS',
            'default_desc' => 'NCTE recognized Faculty of Education offering B.Ed, M.Ed, B.P.Ed, and D.El.Ed teacher training programs with practical pedagogy training.',
            'default_keywords' => 'bed college bhopal, ncte approved bed, teacher training education faculty, sssutms bed'
        ],
        'Management' => [
            'category' => 'Faculties & Departments',
            'cat_key' => 'faculties',
            'title' => 'Faculty of Management Studies',
            'slug' => 'Academic/FacultiesAndDepartments/Management.php',
            'icon' => 'fa-chart-line',
            'default_title' => 'Faculty of Management Studies - MBA & BBA | SSSUTMS',
            'default_desc' => 'Premier Business School offering MBA, BBA, and executive management programs with dual specialization, corporate internships, and live case studies.',
            'default_keywords' => 'mba college bhopal, best bba program, management studies mp, sssutms mba'
        ],
        'Design' => [
            'category' => 'Faculties & Departments',
            'cat_key' => 'faculties',
            'title' => 'Faculty of Design',
            'slug' => 'Academic/FacultiesAndDepartments/Design.php',
            'icon' => 'fa-palette',
            'default_title' => 'Faculty of Design - Fashion & Interior Design | SSSUTMS',
            'default_desc' => 'Innovative design programs in Fashion Design, Interior Design, and Visual Communication with creative studios and modern computer design labs.',
            'default_keywords' => 'design college mp, fashion design bachelors, interior design course, sssutms design faculty'
        ],
        'HumanitiesAndLanguages' => [
            'category' => 'Faculties & Departments',
            'cat_key' => 'faculties',
            'title' => 'Faculty of Humanities & Languages',
            'slug' => 'Academic/FacultiesAndDepartments/HumanitiesAndLanguages.php',
            'icon' => 'fa-language',
            'default_title' => 'Faculty of Humanities & Languages - BA, MA | SSSUTMS',
            'default_desc' => 'Comprehensive programs in Literature, Social Sciences, History, Political Science, and Modern Indian & International Languages.',
            'default_keywords' => 'ba ma courses, humanities faculty, language studies, sssutms arts and humanities'
        ],
        'ComputerScienceAndApplication' => [
            'category' => 'Faculties & Departments',
            'cat_key' => 'faculties',
            'title' => 'Faculty of Computer Science & Application',
            'slug' => 'Academic/FacultiesAndDepartments/ComputerScienceAndApplication.php',
            'icon' => 'fa-laptop-code',
            'default_title' => 'Faculty of Computer Applications - MCA & BCA | SSSUTMS',
            'default_desc' => 'Industry-focused BCA, MCA, and Data Science programs offering high-speed compute labs, cloud computing, AI/ML, and software development training.',
            'default_keywords' => 'bca mca college, computer applications bhopal, data science ai ml sssutms'
        ],
        'Commerce' => [
            'category' => 'Faculties & Departments',
            'cat_key' => 'faculties',
            'title' => 'Faculty of Commerce',
            'slug' => 'Academic/FacultiesAndDepartments/Commerce.php',
            'icon' => 'fa-coins',
            'default_title' => 'Faculty of Commerce - B.Com & M.Com | SSSUTMS',
            'default_desc' => 'Leading commerce education with B.Com (Hons), M.Com, Taxation, Banking & Insurance, and Financial Accounting courses.',
            'default_keywords' => 'bcom hons, mcom admission, commerce college bhopal, sssutms commerce faculty'
        ],
        'Science' => [
            'category' => 'Faculties & Departments',
            'cat_key' => 'faculties',
            'title' => 'Faculty of Science',
            'slug' => 'Academic/FacultiesAndDepartments/Science.php',
            'icon' => 'fa-atom',
            'default_title' => 'Faculty of Science - B.Sc & M.Sc Programs | SSSUTMS',
            'default_desc' => 'B.Sc and M.Sc degrees in Physics, Chemistry, Mathematics, Biotechnology, Microbiology, and Botany with state-of-the-art research laboratories.',
            'default_keywords' => 'bsc msc college, pure science courses, biotechnology microbiology sssutms'
        ],
        'Ayurveda' => [
            'category' => 'Faculties & Departments',
            'cat_key' => 'faculties',
            'title' => 'Faculty of Ayurveda (BAMS)',
            'slug' => 'Academic/FacultiesAndDepartments/Ayurveda.php',
            'icon' => 'fa-leaf',
            'default_title' => 'Faculty of Ayurveda - BAMS & Ayurvedic Hospital | SSSUTMS',
            'default_desc' => 'NCISM approved Ayurvedic medical college offering BAMS degree with a 100+ bedded teaching hospital and extensive herbal botanical garden.',
            'default_keywords' => 'bams college bhopal, ayurveda medical admission, ncism approved bams mp, sssutms ayurveda'
        ],
        'Law' => [
            'category' => 'Faculties & Departments',
            'cat_key' => 'faculties',
            'title' => 'Faculty of Law',
            'slug' => 'Academic/FacultiesAndDepartments/Law.php',
            'icon' => 'fa-scale-balanced',
            'default_title' => 'Faculty of Law - LL.B., BA LL.B. & LL.M. | SSSUTMS',
            'default_desc' => 'BCI approved Law school offering integrated BA LL.B, BBA LL.B, 3-year LL.B, and LL.M. with active Moot Court, legal aid clinic, and law library.',
            'default_keywords' => 'law college mp, llb ba llb admission, bci approved law institute, sssutms law faculty'
        ],
        'Homeopathy' => [
            'category' => 'Faculties & Departments',
            'cat_key' => 'faculties',
            'title' => 'Faculty of Homeopathy (BHMS)',
            'slug' => 'Academic/FacultiesAndDepartments/Homeopathy.php',
            'icon' => 'fa-prescription-bottle-medical',
            'default_title' => 'Faculty of Homeopathy - BHMS Medical College | SSSUTMS',
            'default_desc' => 'NCH approved Homeopathic medical institute offering BHMS degree with an affiliated general hospital and clinical OPD facilities.',
            'default_keywords' => 'bhms college bhopal, homeopathic medical admission, nch approved bhms, sssutms homeopathy'
        ],
        'Paramedical' => [
            'category' => 'Faculties & Departments',
            'cat_key' => 'faculties',
            'title' => 'Faculty of Paramedical Sciences',
            'slug' => 'Academic/FacultiesAndDepartments/Paramedical.php',
            'icon' => 'fa-heart-pulse',
            'default_title' => 'Faculty of Paramedical Sciences - BMLT, DMLT, BPT | SSSUTMS',
            'default_desc' => 'Allied healthcare education offering BPT (Physiotherapy), BMLT, DMLT, and X-Ray/Radiology technician courses with hospital rotations.',
            'default_keywords' => 'paramedical college sehore, bmlt dmlt bpt admission, healthcare sciences sssutms'
        ],
        'Nursing' => [
            'category' => 'Faculties & Departments',
            'cat_key' => 'faculties',
            'title' => 'Faculty of Nursing',
            'slug' => 'Academic/FacultiesAndDepartments/Nursing.php',
            'icon' => 'fa-user-nurse',
            'default_title' => 'Faculty of Nursing - B.Sc Nursing, GNM, Post Basic | SSSUTMS',
            'default_desc' => 'INC & MPNRC recognized nursing college offering B.Sc Nursing, Post Basic B.Sc Nursing, and GNM with clinical training in multi-specialty hospitals.',
            'default_keywords' => 'bsc nursing bhopal, gnm nursing admission, inc approved nursing college mp, sssutms nursing'
        ],

        // Category 2: Statutory Committees & Cells (9 Pages)
        'AntiRagging' => [
            'category' => 'Statutory Committees',
            'cat_key' => 'committee',
            'title' => 'Anti-Ragging Committee & Squad',
            'slug' => 'Academic/Committee/AntiRagging.php',
            'icon' => 'fa-shield-halved',
            'default_title' => 'Anti Ragging Committee & Squad Guidelines | SSSUTMS',
            'default_desc' => 'Zero tolerance anti-ragging policy, squad details, emergency contact numbers, and UGC compliance directives at SSSUTMS.',
            'default_keywords' => 'anti ragging committee sssutms, helpline, squad members, ugc anti ragging regulations'
        ],
        'ProctorialBoard' => [
            'category' => 'Statutory Committees',
            'cat_key' => 'committee',
            'title' => 'Proctorial Board',
            'slug' => 'Academic/Committee/ProctorialBoard.php',
            'icon' => 'fa-user-shield',
            'default_title' => 'Proctorial Board - Student Discipline & Campus Welfare | SSSUTMS',
            'default_desc' => 'Overview of the Proctorial Board ensuring campus discipline, safety, student welfare, and code of conduct at SSSUTMS.',
            'default_keywords' => 'proctorial board sssutms, chief proctor, campus discipline, student safety'
        ],
        'InternalComplaintCommittee' => [
            'category' => 'Statutory Committees',
            'cat_key' => 'committee',
            'title' => 'Internal Complaint Committee (ICC)',
            'slug' => 'Academic/Committee/InternalComplaintCommittee.php',
            'icon' => 'fa-scale-balanced',
            'default_title' => 'Internal Complaint Committee (ICC) - Women Safety | SSSUTMS',
            'default_desc' => 'Prevention of sexual harassment of women at workplace (POSH) cell, committee members, and grievance submission mechanisms.',
            'default_keywords' => 'internal complaint committee sssutms, posh act, icc grievance, women safety cell'
        ],
        'GrievanceRedressal' => [
            'category' => 'Statutory Committees',
            'cat_key' => 'committee',
            'title' => 'Student Grievance Redressal Committee (SGRC)',
            'slug' => 'Academic/Committee/GrievanceRedressal.php',
            'icon' => 'fa-comments',
            'default_title' => 'Student Grievance Redressal Committee (SGRC) | SSSUTMS',
            'default_desc' => 'Official student grievance redressal portal, ombudsperson guidelines, member contacts, and swift complaint resolution process.',
            'default_keywords' => 'grievance redressal committee, sgrc portal, student complaints redressal sssutms'
        ],
        'ForSCST' => [
            'category' => 'Statutory Committees',
            'cat_key' => 'committee',
            'title' => 'Committee for SC/ST',
            'slug' => 'Academic/Committee/ForSCST.php',
            'icon' => 'fa-handshake-angle',
            'default_title' => 'Committee for SC/ST - Welfare & Equal Rights | SSSUTMS',
            'default_desc' => 'Safeguarding interests of SC/ST students and staff members, scholarship facilitation, and anti-discrimination cell.',
            'default_keywords' => 'sc st committee sssutms, sc st cell, equal opportunity, scholarship support'
        ],
        'EDC' => [
            'category' => 'Statutory Committees',
            'cat_key' => 'committee',
            'title' => 'Entrepreneurship Development Cell (EDC)',
            'slug' => 'Academic/Committee/EDC.php',
            'icon' => 'fa-lightbulb',
            'default_title' => 'Entrepreneurship Development Cell (EDC) | SSSUTMS',
            'default_desc' => 'Fostering startup culture, student innovations, bootcamps, and entrepreneurial mentoring at SSSUTMS EDC.',
            'default_keywords' => 'edc sssutms, entrepreneurship development cell, student startups, innovation hub'
        ],
        'InternationalHigherEducationCell' => [
            'category' => 'Statutory Committees',
            'cat_key' => 'committee',
            'title' => 'International Higher Education Cell',
            'slug' => 'Academic/Committee/InternationalHigherEducationCell.php',
            'icon' => 'fa-globe',
            'default_title' => 'International Higher Education Cell - Global Relations | SSSUTMS',
            'default_desc' => 'Facilitating foreign student admissions, global university exchange partnerships, and international academic collaborations.',
            'default_keywords' => 'international cell sssutms, foreign admissions, global exchange programs'
        ],
        'IncubationCell' => [
            'category' => 'Statutory Committees',
            'cat_key' => 'committee',
            'title' => 'Incubation Cell',
            'slug' => 'Academic/Committee/IncubationCell.php',
            'icon' => 'fa-rocket',
            'default_title' => 'Incubation & Innovation Cell - Startup Accelerator | SSSUTMS',
            'default_desc' => 'Seed funding support, intellectual property facilitation, prototyping labs, and startup acceleration at SSSUTMS Incubation Cell.',
            'default_keywords' => 'incubation cell sssutms, startup accelerator, innovation center, seed funding'
        ],
        'Equal_Opportunity_Cell' => [
            'category' => 'Statutory Committees',
            'cat_key' => 'committee',
            'title' => 'Equal Opportunity Cell (EOC)',
            'slug' => 'Academic/Committee/Equal_Opportunity_Cell.php',
            'icon' => 'fa-people-arrows',
            'default_title' => 'Equal Opportunity Cell (EOC) - Inclusive Campus | SSSUTMS',
            'default_desc' => 'Promoting diversity, inclusivity, accessible infrastructure for differently-abled students, and non-discrimination policies.',
            'default_keywords' => 'equal opportunity cell, eoc sssutms, inclusive education, pwd support cell'
        ],

        // Category 3: Core Academic Programs & Governance (9 Pages)
        'PHD' => [
            'category' => 'Core Academic Programs',
            'cat_key' => 'core',
            'title' => 'Doctor of Philosophy (Ph.D.) Programs',
            'slug' => 'Academic/PHD.php',
            'icon' => 'fa-user-graduate',
            'default_title' => 'Ph.D. Research Programs & Admissions | SSSUTMS',
            'default_desc' => 'Explore Doctoral (Ph.D.) research programs across Engineering, Pharmacy, Management, Science, and Humanities at SSSUTMS.',
            'default_keywords' => 'phd admission bhopal, doctoral research program mp, phd notifications sssutms'
        ],
        'AcademicCalendar' => [
            'category' => 'Core Academic Programs',
            'cat_key' => 'core',
            'title' => 'University Academic Calendar',
            'slug' => 'Academic/AcademicCalendar.php',
            'icon' => 'fa-calendar-days',
            'default_title' => 'Official Academic Calendar & Session Schedule | SSSUTMS',
            'default_desc' => 'Download official semester commencement dates, exam schedules, vacation periods, and academic year planner of SSSUTMS.',
            'default_keywords' => 'academic calendar sssutms, semester schedule, holiday list, university calendar mp'
        ],
        'Scholarship' => [
            'category' => 'Core Academic Programs',
            'cat_key' => 'core',
            'title' => 'Scholarship Schemes & Financial Aid',
            'slug' => 'Academic/Scholarship.php',
            'icon' => 'fa-award',
            'default_title' => 'Student Scholarships & Financial Assistance | SSSUTMS',
            'default_desc' => 'Information on government scholarships (SC/ST/OBC/Post-Matric), merit-based fee concessions, and financial aid schemes at SSSUTMS.',
            'default_keywords' => 'scholarship schemes mp, post matric scholarship, financial aid sssutms, fee concession'
        ],
        'ConstituentUnits' => [
            'category' => 'Core Academic Programs',
            'cat_key' => 'core',
            'title' => 'Constituent Units & Institutes',
            'slug' => 'Academic/ConstituentUnits.php',
            'icon' => 'fa-landmark',
            'default_title' => 'Constituent Institutes & Academic Units | SSSUTMS',
            'default_desc' => 'Comprehensive directory of university colleges, teaching hospitals, polytechnic colleges, and specialized centers of SSSUTMS.',
            'default_keywords' => 'constituent units sssutms, engineering college, ayurveda hospital, polytechnic sehore'
        ],
        'HEIHandbook' => [
            'category' => 'Core Academic Programs',
            'cat_key' => 'core',
            'title' => 'HEI Handbook & Code of Conduct',
            'slug' => 'Academic/HEIHandbook.php',
            'icon' => 'fa-book-bookmark',
            'default_title' => 'Higher Education Institution Handbook & Governance Code | SSSUTMS',
            'default_desc' => 'Official Higher Education Institution (HEI) handbook outlining ethical codes, academic regulations, and university governance charters.',
            'default_keywords' => 'hei handbook sssutms, code of conduct, academic policies, university rules'
        ],
        'IQACCell' => [
            'category' => 'Core Academic Programs',
            'cat_key' => 'core',
            'title' => 'Internal Quality Assurance Cell (IQAC)',
            'slug' => 'Academic/IQACCell.php',
            'icon' => 'fa-medal',
            'default_title' => 'Internal Quality Assurance Cell (IQAC) Reports | SSSUTMS',
            'default_desc' => 'IQAC quality initiatives, meeting minutes, annual quality assurance reports (AQAR), feedback analysis, and institutional development plans.',
            'default_keywords' => 'iqac cell sssutms, quality assurance, aqar reports, feedback analysis, naac iqac'
        ],
        'MandatoryDisclosures' => [
            'category' => 'Core Academic Programs',
            'cat_key' => 'core',
            'title' => 'Mandatory Disclosures & Approvals',
            'slug' => 'Academic/MandatoryDisclosures.php',
            'icon' => 'fa-file-shield',
            'default_title' => 'Public Mandatory Disclosures & Regulatory Compliance | SSSUTMS',
            'default_desc' => 'Statutory regulatory disclosures, UGC 2(f) compliance, statutory council approvals, fee structure, and RTI declarations of SSSUTMS.',
            'default_keywords' => 'mandatory disclosure sssutms, ugc approvals, aicte pci compliance, rti details'
        ],
        'NIRF' => [
            'category' => 'Core Academic Programs',
            'cat_key' => 'core',
            'title' => 'National Institutional Ranking Framework (NIRF)',
            'slug' => 'Academic/NIRF.php',
            'icon' => 'fa-ranking-star',
            'default_title' => 'NIRF Data & Institutional Ranking Submissions | SSSUTMS',
            'default_desc' => 'Official National Institutional Ranking Framework (NIRF) data disclosures, overall and disciplinary ranking reports of SSSUTMS.',
            'default_keywords' => 'nirf ranking sssutms, mhrd nirf data, ranking reports, institutional data'
        ],
        'FacultyStaffDetails' => [
            'category' => 'Core Academic Programs',
            'cat_key' => 'core',
            'title' => 'Faculty & Staff Details Directory',
            'slug' => 'Academic/Faculty_Staff_Details.php',
            'icon' => 'fa-id-card-clip',
            'default_title' => 'Faculty & Staff Profiles Directory | SSSUTMS',
            'default_desc' => 'List of teaching professors, assistant professors, heads of departments, and administrative officers at SSSUTMS.',
            'default_keywords' => 'faculty staff list sssutms, professor directory, academic staff details, department hods'
        ],

        // Category 4: Academic Activities (6 Pages)
        'ExpertLectures' => [
            'category' => 'Academic Activities',
            'cat_key' => 'activities',
            'title' => 'Expert Lectures & Guest Sessions',
            'slug' => 'Academic/Activities/ExpertLectures.php',
            'icon' => 'fa-chalkboard-user',
            'default_title' => 'Expert Lectures & Distinguished Guest Speaker Series | SSSUTMS',
            'default_desc' => 'Read about expert technical talks, guest lecture sessions by industry titans, and academic knowledge exchange events at SSSUTMS.',
            'default_keywords' => 'expert lectures sssutms, guest speakers, industry experts session, technical talks'
        ],
        'Webinar' => [
            'category' => 'Academic Activities',
            'cat_key' => 'activities',
            'title' => 'National & International Webinars',
            'slug' => 'Academic/Activities/Webinar.php',
            'icon' => 'fa-video',
            'default_title' => 'Webinars & Online Masterclasses | SSSUTMS',
            'default_desc' => 'Virtual conferences, live technical webinars, and global online workshops organized across academic faculties at SSSUTMS.',
            'default_keywords' => 'webinars sssutms, online technical session, national webinar, virtual conference'
        ],
        'IndustrialVisits' => [
            'category' => 'Academic Activities',
            'cat_key' => 'activities',
            'title' => 'Industrial Visits & Field Exposure',
            'slug' => 'Academic/Activities/IndustrialVisits.php',
            'icon' => 'fa-industry',
            'default_title' => 'Industrial Visits & Practical Factory Tours | SSSUTMS',
            'default_desc' => 'Practical industry exposure tours, manufacturing plant visits, power station tours, and IT park excursions organized for SSSUTMS students.',
            'default_keywords' => 'industrial visits sssutms, factory tour, practical industry training, corporate visit'
        ],
        'Events' => [
            'category' => 'Academic Activities',
            'cat_key' => 'activities',
            'title' => 'Academic Events & Annual Conclaves',
            'slug' => 'Academic/Activities/Events.php',
            'icon' => 'fa-calendar-check',
            'default_title' => 'Academic Events, Symposiums & Tech Fests | SSSUTMS',
            'default_desc' => 'Explore technical symposiums, hackathons, science exhibitions, and academic celebration events hosted across the university.',
            'default_keywords' => 'academic events sssutms, tech fest, symposium, annual conclave, student competitions'
        ],
        'FDP' => [
            'category' => 'Academic Activities',
            'cat_key' => 'activities',
            'title' => 'Faculty Development Programs (FDP)',
            'slug' => 'Academic/Activities/FDP.php',
            'icon' => 'fa-users-rays',
            'default_title' => 'Faculty Development Programs (FDP) & Pedagogy Training | SSSUTMS',
            'default_desc' => 'Enhancing educator pedagogical skills, modern research methodologies, and continuous teacher training workshops at SSSUTMS.',
            'default_keywords' => 'fdp sssutms, faculty development program, teacher pedagogy training, aiicte fdp'
        ],
        'WorkshopAndSeminars' => [
            'category' => 'Academic Activities',
            'cat_key' => 'activities',
            'title' => 'Workshops & Research Seminars',
            'slug' => 'Academic/Activities/WorkshopAndSeminars.php',
            'icon' => 'fa-hand-holding-hand',
            'default_title' => 'Hands-on Workshops & National Research Seminars | SSSUTMS',
            'default_desc' => 'Hands-on technical workshops, national seminars, skill bootcamps, and research colloquiums organized by university departments.',
            'default_keywords' => 'workshops seminars sssutms, technical bootcamps, research seminar, skill enhancement'
        ],

        // Category 5: Training & Placement (2 Pages)
        'TrainingAndPlacementCell' => [
            'category' => 'Training & Placement',
            'cat_key' => 'tp',
            'title' => 'Training & Placement Cell',
            'slug' => 'Academic/TrainingAndPlacement/TrainingAndPlacementCell.php',
            'icon' => 'fa-briefcase',
            'default_title' => 'Training & Placement Cell - Career Opportunities | SSSUTMS',
            'default_desc' => 'Dedicated placement cell offering campus recruitment drives, soft-skills training, industry internships, and record placement packages.',
            'default_keywords' => 'placement cell sssutms, campus placement bhopal, top recruiters, career opportunities'
        ],
        'TrainingPartner' => [
            'category' => 'Training & Placement',
            'cat_key' => 'tp',
            'title' => 'Corporate Training Partners & MOUs',
            'slug' => 'Academic/TrainingAndPlacement/TrainingPartner.php',
            'icon' => 'fa-handshake',
            'default_title' => 'Corporate Training Partners & Industry Collaborations | SSSUTMS',
            'default_desc' => 'Strategic MOUs, certification training partners, technology alliances, and corporate skill centers empowering student employability.',
            'default_keywords' => 'training partners sssutms, corporate mous, industry collaborations, skill certification'
        ],

        // Category 6: NAAC & Accreditations (8 Pages)
        'NAAC_SSR' => [
            'category' => 'NAAC & Accreditations',
            'cat_key' => 'naac',
            'title' => 'NAAC Self Study Report (SSR)',
            'slug' => 'Academic/NAAC/SSR.php',
            'icon' => 'fa-file-circle-check',
            'default_title' => 'NAAC Self Study Report (SSR) & Assessment Dossier | SSSUTMS',
            'default_desc' => 'Access the official NAAC Self Study Report (SSR), institutional eligibility documents, and accreditation self-appraisal submissions.',
            'default_keywords' => 'naac ssr sssutms, self study report, naac assessment, university accreditation'
        ],
        'NAAC_Criteria1' => [
            'category' => 'NAAC & Accreditations',
            'cat_key' => 'naac',
            'title' => 'NAAC Criteria 1 – Curricular Aspects',
            'slug' => 'Academic/NAAC/CriteriaOne.php',
            'icon' => 'fa-list-check',
            'default_title' => 'NAAC Criteria 1 - Curricular Aspects & Syllabus Design | SSSUTMS',
            'default_desc' => 'Curriculum design, academic flexibility, value-added courses, and stakeholder feedback documentation for NAAC Criteria 1.',
            'default_keywords' => 'naac criteria 1 sssutms, curricular aspects, academic flexibility, feedback system'
        ],
        'NAAC_Criteria2' => [
            'category' => 'NAAC & Accreditations',
            'cat_key' => 'naac',
            'title' => 'NAAC Criteria 2 – Teaching-Learning & Evaluation',
            'slug' => 'Academic/NAAC/CriteriaTwo.php',
            'icon' => 'fa-chalkboard',
            'default_title' => 'NAAC Criteria 2 - Teaching-Learning and Evaluation | SSSUTMS',
            'default_desc' => 'Student enrollment profile, teacher profile, student-centric teaching methods, evaluation reforms, and learning outcomes for NAAC Criteria 2.',
            'default_keywords' => 'naac criteria 2, teaching learning evaluation, student teacher ratio, outcome based education'
        ],
        'NAAC_Criteria3' => [
            'category' => 'NAAC & Accreditations',
            'cat_key' => 'naac',
            'title' => 'NAAC Criteria 3 – Research, Innovations & Extension',
            'slug' => 'Academic/NAAC/CriteriaThree.php',
            'icon' => 'fa-flask-vial',
            'default_title' => 'NAAC Criteria 3 - Research, Innovations and Extension | SSSUTMS',
            'default_desc' => 'Research facilities, funded research projects, patents, extension activities, and institutional collaborations for NAAC Criteria 3.',
            'default_keywords' => 'naac criteria 3 sssutms, research innovations, patents publications, extension activities'
        ],
        'NAAC_Criteria4' => [
            'category' => 'NAAC & Accreditations',
            'cat_key' => 'naac',
            'title' => 'NAAC Criteria 4 – Infrastructure & Learning Resources',
            'slug' => 'Academic/NAAC/CriteriaFour.php',
            'icon' => 'fa-building-columns',
            'default_title' => 'NAAC Criteria 4 - Infrastructure and Learning Resources | SSSUTMS',
            'default_desc' => 'Physical infrastructure, digital library, ICT classrooms, laboratory assets, sports facilities, and IT infrastructure for NAAC Criteria 4.',
            'default_keywords' => 'naac criteria 4, infrastructure learning resources, digital library, it facilities'
        ],
        'NAAC_Criteria5' => [
            'category' => 'NAAC & Accreditations',
            'cat_key' => 'naac',
            'title' => 'NAAC Criteria 5 – Student Support & Progression',
            'slug' => 'Academic/NAAC/CriteriaFive.php',
            'icon' => 'fa-hands-holding-child',
            'default_title' => 'NAAC Criteria 5 - Student Support and Progression | SSSUTMS',
            'default_desc' => 'Scholarships, capability enhancement schemes, career guidance, placement records, and alumni engagement metrics for NAAC Criteria 5.',
            'default_keywords' => 'naac criteria 5, student support progression, placement guidance, alumni network'
        ],
        'NAAC_Criteria6' => [
            'category' => 'NAAC & Accreditations',
            'cat_key' => 'naac',
            'title' => 'NAAC Criteria 6 – Governance, Leadership & Management',
            'slug' => 'Academic/NAAC/CriteriaSix.php',
            'icon' => 'fa-chess-queen',
            'default_title' => 'NAAC Criteria 6 - Governance, Leadership and Management | SSSUTMS',
            'default_desc' => 'Institutional vision, strategic governance, e-governance policies, faculty empowerment, and financial management for NAAC Criteria 6.',
            'default_keywords' => 'naac criteria 6, governance leadership management, strategic planning, e governance'
        ],
        'NAAC_Criteria7' => [
            'category' => 'NAAC & Accreditations',
            'cat_key' => 'naac',
            'title' => 'NAAC Criteria 7 – Institutional Values & Best Practices',
            'slug' => 'Academic/NAAC/CriteriaSeven.php',
            'icon' => 'fa-solar-panel',
            'default_title' => 'NAAC Criteria 7 - Institutional Values and Best Practices | SSSUTMS',
            'default_desc' => 'Gender equity initiatives, green energy campus, waste management, institutional distinctiveness, and best practices for NAAC Criteria 7.',
            'default_keywords' => 'naac criteria 7, institutional values best practices, green campus, solar energy'
        ]
    ];
}

/**
 * Get dynamic SEO metadata for any Academic page
 */
function get_academic_page_info($pageKey, $defaultOverrides = []) {
    $catalog = get_academic_page_catalog();
    $catItem = $catalog[$pageKey] ?? null;

    $allData = get_json_data('page_documents.json', []);
    
    // Check multiple potential keys: Academic_{Key}, Committee_{Key}, Faculty_{Key}, or plain {Key}
    $stored = $allData['Academic_' . $pageKey] 
           ?? $allData['Committee_' . $pageKey] 
           ?? $allData['Faculty_' . $pageKey] 
           ?? $allData[$pageKey] 
           ?? [];

    $defaults = [
        'page_key' => $pageKey,
        'page_title' => $catItem['title'] ?? $pageKey,
        'category' => $catItem['category'] ?? 'Academic',
        'meta_title' => $catItem['default_title'] ?? (($catItem['title'] ?? $pageKey) . ' - SSSUTMS'),
        'meta_description' => $catItem['default_desc'] ?? 'Explore official academic resources, departments, programs, and guidelines at Sri Satya Sai University of Technology & Medical Sciences.',
        'meta_keywords' => $catItem['default_keywords'] ?? 'sssutms academic, university bhopal sehore mp',
        'canonical_url' => !empty($catItem['slug']) ? (rtrim(BASE_URL, '/') . '/' . ltrim($catItem['slug'], '/')) : '',
        'og_image' => 'assets/images/logo/logo.jpg',
        'banner_title' => $catItem['title'] ?? $pageKey,
        'banner_category' => $catItem['category'] ?? 'Academic'
    ];

    if (!empty($defaultOverrides) && is_array($defaultOverrides)) {
        $defaults = array_merge($defaults, $defaultOverrides);
    }

    $seo = $stored['seo'] ?? $stored['page_info'] ?? [];
    
    return [
        'page_key' => $pageKey,
        'page_title' => !empty($seo['page_title']) ? $seo['page_title'] : $defaults['page_title'],
        'category' => !empty($stored['section']) ? $stored['section'] : $defaults['category'],
        'meta_title' => !empty($seo['meta_title']) ? $seo['meta_title'] : $defaults['meta_title'],
        'meta_description' => !empty($seo['meta_description']) ? $seo['meta_description'] : $defaults['meta_description'],
        'meta_keywords' => !empty($seo['meta_keywords']) ? $seo['meta_keywords'] : $defaults['meta_keywords'],
        'canonical_url' => !empty($seo['canonical_url']) ? $seo['canonical_url'] : $defaults['canonical_url'],
        'og_image' => !empty($seo['og_image']) ? $seo['og_image'] : $defaults['og_image'],
        'banner_title' => !empty($seo['banner_title']) ? $seo['banner_title'] : $defaults['banner_title'],
        'banner_category' => !empty($seo['banner_category']) ? $seo['banner_category'] : $defaults['banner_category'],
        'slug' => $catItem['slug'] ?? ''
    ];
}

/**
 * Save dynamic SEO metadata for any Academic page
 */
function save_academic_page_info($pageKey, $info) {
    $catalog = get_academic_page_catalog();
    $catItem = $catalog[$pageKey] ?? null;

    $allData = get_json_data('page_documents.json', []);
    
    $storeKey = 'Academic_' . $pageKey;
    if (isset($catItem['cat_key']) && $catItem['cat_key'] === 'committee') {
        $storeKey = 'Committee_' . $pageKey;
    } elseif (isset($catItem['cat_key']) && $catItem['cat_key'] === 'faculties') {
        $storeKey = 'Faculty_' . $pageKey;
    }

    if (!isset($allData[$storeKey])) {
        $allData[$storeKey] = [
            'title' => $catItem['title'] ?? $pageKey,
            'section' => $catItem['category'] ?? 'Academic',
            'source_file' => $catItem['slug'] ?? '',
            'documents' => []
        ];
    }

    $allData[$storeKey]['seo'] = [
        'page_title' => sanitize_input($info['page_title'] ?? ($catItem['title'] ?? $pageKey)),
        'meta_title' => sanitize_input($info['meta_title'] ?? ''),
        'meta_description' => sanitize_input($info['meta_description'] ?? ''),
        'meta_keywords' => sanitize_input($info['meta_keywords'] ?? ''),
        'canonical_url' => trim($info['canonical_url'] ?? ''),
        'og_image' => trim($info['og_image'] ?? 'assets/images/logo/logo.jpg'),
        'banner_title' => sanitize_input($info['banner_title'] ?? ($catItem['title'] ?? $pageKey)),
        'banner_category' => sanitize_input($info['banner_category'] ?? ($catItem['category'] ?? 'Academic')),
        'updated_at' => date('Y-m-d H:i:s')
    ];

    // Mirror under plain pageKey
    $allData[$pageKey]['seo'] = $allData[$storeKey]['seo'];

    return save_json_data('page_documents.json', $allData);
}

/**
 * Get attached dynamic documents/orders/circulars for an Academic page
 */
function get_academic_documents($pageKey) {
    $allData = get_json_data('page_documents.json', []);
    
    $catalog = get_academic_page_catalog();
    $catItem = $catalog[$pageKey] ?? null;

    $storeKey = 'Academic_' . $pageKey;
    if (isset($catItem['cat_key']) && $catItem['cat_key'] === 'committee') {
        $storeKey = 'Committee_' . $pageKey;
    } elseif (isset($catItem['cat_key']) && $catItem['cat_key'] === 'faculties') {
        $storeKey = 'Faculty_' . $pageKey;
    }

    $docs = $allData[$storeKey]['documents'] 
         ?? $allData[$pageKey]['documents'] 
         ?? $allData['Academic_' . $pageKey]['documents'] 
         ?? [];

    $active = [];
    foreach ($docs as $d) {
        if (!isset($d['status']) || strtolower($d['status']) === 'active') {
            $active[] = $d;
        }
    }
    return $active;
}

/**
 * Save / Attach a document to an Academic page
 */
function save_academic_document($pageKey, $docData) {
    $catalog = get_academic_page_catalog();
    $catItem = $catalog[$pageKey] ?? null;

    $allData = get_json_data('page_documents.json', []);
    
    $storeKey = 'Academic_' . $pageKey;
    if (isset($catItem['cat_key']) && $catItem['cat_key'] === 'committee') {
        $storeKey = 'Committee_' . $pageKey;
    } elseif (isset($catItem['cat_key']) && $catItem['cat_key'] === 'faculties') {
        $storeKey = 'Faculty_' . $pageKey;
    }

    if (!isset($allData[$storeKey])) {
        $allData[$storeKey] = [
            'title' => $catItem['title'] ?? $pageKey,
            'section' => $catItem['category'] ?? 'Academic',
            'source_file' => $catItem['slug'] ?? '',
            'documents' => []
        ];
    }

    $docId = $docData['id'] ?? (time() . rand(100, 999));
    $found = false;

    if (!isset($allData[$storeKey]['documents'])) {
        $allData[$storeKey]['documents'] = [];
    }

    foreach ($allData[$storeKey]['documents'] as $i => $d) {
        if (($d['id'] ?? '') === $docId) {
            $allData[$storeKey]['documents'][$i] = array_merge($d, $docData);
            $found = true;
            break;
        }
    }

    if (!$found) {
        $docData['id'] = $docId;
        $docData['created_at'] = date('Y-m-d H:i:s');
        $allData[$storeKey]['documents'][] = $docData;
    }

    return save_json_data('page_documents.json', $allData);
}

/**
 * Delete an attached document from an Academic page
 */
function delete_academic_document($pageKey, $docId) {
    $catalog = get_academic_page_catalog();
    $catItem = $catalog[$pageKey] ?? null;

    $allData = get_json_data('page_documents.json', []);
    
    $storeKey = 'Academic_' . $pageKey;
    if (isset($catItem['cat_key']) && $catItem['cat_key'] === 'committee') {
        $storeKey = 'Committee_' . $pageKey;
    } elseif (isset($catItem['cat_key']) && $catItem['cat_key'] === 'faculties') {
        $storeKey = 'Faculty_' . $pageKey;
    }

    if (isset($allData[$storeKey]['documents'])) {
        $newList = [];
        foreach ($allData[$storeKey]['documents'] as $d) {
            if (($d['id'] ?? '') !== $docId) {
                $newList[] = $d;
            }
        }
        $allData[$storeKey]['documents'] = $newList;
        return save_json_data('page_documents.json', $allData);
    }
    return false;
}
