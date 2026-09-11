<?php
$file = __DIR__ . '/../data/page_documents.json';
$data = json_decode(file_get_contents($file), true);

// 1. DirectorRD (already exists, ensure structure)
if (empty($data['DirectorRD'])) {
    $data['DirectorRD'] = [
        [
            'id' => '1',
            'name' => 'Dr. Hemant Kumar Sharma',
            'designation' => 'Director (R & D)',
            'university' => 'Sri Satya Sai University of Technology & Medical Sciences',
            'photo' => 'assets/images/research/h.k.SHARMA_05042022_1258.jpg',
            'quote' => 'Our endeavor is to make our system effective and sensitive to the requirements of all stakeholders by undertaking collaborations with industry and fostering engineering, pharmacy, science, and medical research as an integral part of quality education.',
            'message' => "<p>Sri Satya Sai University of Technology and Medical Sciences (SSSUTMS) is a multi-disciplinary University comprising various disciplines of Technology as well as Medical Sciences, established in 2013 to offer quality education among the deserving youth of India and abroad.</p>\n<p>It has immense Research potential, as evident from the spontaneous Research activities performed by the Students and the Faculties. So far more than 1500 Research Papers have been published by research aspirants in reputed Foreign and Indian Journals. We intend to form an R & D unit of International standing by striving continuously in pursuit of excellence in education, research, entrepreneurship, technology implementation, and other related fields for the services of society. We promise to provide high quality education in all our Constituent schools/units of our University from undergraduate to doctoral levels through a creative balance of academic, professional, as well as extracurricular programs.</p>\n<p>The SSSUTMS Research and Development Cell operates with an objective to promote research activities among faculty members to achieve academic excellence. In our endeavor to make our system effective and sensitive to the requirements of all stakeholders, we undertake collaboration with industry to foster Engineering, Pharmacy, Science, and Medical research which is an integral part of quality education.</p>\n<p class=\"mb-0\">We conduct research-oriented workshops, seminars, and development programs to augment the quality of research being conducted by various faculties of SSSUTMS.</p>",
            'updated_at' => date('Y-m-d H:i:s')
        ]
    ];
}

// 2. RAndDCell
if (empty($data['RAndDCell'])) {
    $data['RAndDCell'] = [
        [
            'id' => '1',
            'title' => 'R & D Cell Objectives & Preamble',
            'preamble' => 'Research and Development cell (R & D Cell) operates with the following objectives to promote research activities among faculty members to achieve academic excellence.',
            'objectives' => [
                'To promote research activities in rugged areas of engineering, science, pharmacy, and medical technology.',
                'To encourage and support faculty members and students to publish papers in reputed National and International Conferences and Journals.',
                'To motivate and mentor scholars for filing National and International Patents.',
                'To support faculty members for applying for research grants and projects from various government and non-government funding agencies (DST, SERB, AICTE, ICMR, etc.).',
                'To establish Centres of Excellence in cutting-edge research domains.',
                'To conduct Faculty Development Programmes (FDPs), workshops, and technical training on modern scientific tools.',
                'To build industry-academia linkages and facilitate commercialization of innovative student research.'
            ],
            'updated_at' => date('Y-m-d H:i:s')
        ]
    ];
}

// 5. ConsultancyServices
if (empty($data['ConsultancyServices'])) {
    $data['ConsultancyServices'] = [
        [
            'id' => '1',
            'title' => 'Consultancy Policy & Services',
            'intro' => 'Sri Satya Sai University of Technology & Medical Sciences provides expert consultancy services to industrial, governmental, and commercial enterprises.',
            'sections' => [
                [
                    'title' => 'Scope of Consultancy Services',
                    'desc' => 'Consultancy services cover expert advice, design evaluation, material testing, feasibility studies, environmental audits, software development, clinical evaluations, and turnkey project development.'
                ],
                [
                    'title' => 'Standard Operating Procedure (SOP)',
                    'desc' => 'Any faculty member receiving a consultancy inquiry must submit the proposal through the Dean / Head of the Department to the R&D Cell for administrative and financial sanction.'
                ],
                [
                    'title' => 'Sharing of Consultancy Revenue',
                    'desc' => 'Revenue generated from institutional and individual consultancy projects shall be shared between the University and the consultancy team as per approved University Statutes and Ordinances.'
                ],
                [
                    'title' => 'Quality Assurance & Non-Disclosure',
                    'desc' => 'All consultancy assignments must maintain strict quality benchmarks and adhere to non-disclosure and intellectual property confidentiality agreements signed with client agencies.'
                ]
            ],
            'updated_at' => date('Y-m-d H:i:s')
        ]
    ];
}

// 7. CollaborationandMou
if (empty($data['CollaborationandMou'])) {
    $data['CollaborationandMou'] = [
        [
            'id' => '1',
            'title' => 'Collaborations & Memorandums of Understanding',
            'overview' => 'Sri Satya Sai University of Technology and Medical Sciences (SSSUTMS) actively collaborates with leading national and international universities, research organizations, corporate houses, and government agencies to bridge academic theory with industry practice. These strategic alliances facilitate joint research projects, exchange of academic materials, student and faculty exchange programs, industrial training, joint conferences, and technology transfer for community benefit.',
            'key_areas' => [
                [
                    'title' => 'Joint R&D Projects',
                    'desc' => 'Collaborative scientific investigation and sponsored research projects with government funding bodies and industrial partners.',
                    'icon' => 'fa-microscope'
                ],
                [
                    'title' => 'Industrial Training & Internships',
                    'desc' => 'Providing real-world exposure, practical skill development, and industry mentor-guided internships for undergraduate and postgraduate scholars.',
                    'icon' => 'fa-user-gear'
                ],
                [
                    'title' => 'Faculty & Scholar Exchange',
                    'desc' => 'Academic exchange programs enabling faculty members and research scholars to share expertise and utilize specialized laboratories.',
                    'icon' => 'fa-graduation-cap'
                ],
                [
                    'title' => 'Technology Commercialization',
                    'desc' => 'Translating laboratory patent innovations into market-ready commercial products through corporate licensing agreements.',
                    'icon' => 'fa-lightbulb'
                ]
            ],
            'updated_at' => date('Y-m-d H:i:s')
        ]
    ];
}

// 8. Iic_Cell
if (empty($data['Iic_Cell'])) {
    $data['Iic_Cell'] = [
        [
            'id' => '1',
            'title' => "Institution's Innovation Council (IIC)",
            'vision' => 'To promote innovation, entrepreneurial skills, and the growth of student start-ups.',
            'missions' => [
                'To nurture a culture of innovation among students.',
                'To instill and cultivate entrepreneurial abilities and competencies among students.',
                'To encourage the progress and advancement of student-led startups.'
            ],
            'gallery' => [
                ['title' => 'IIC Establishment Certificate', 'image' => 'assets/images/research/iic/certificate_06072023_1205.jpg'],
                ['title' => 'Innovation Cell Initiative', 'image' => 'assets/images/research/iic/inno_06072023_1207.jpg'],
                ['title' => 'Entrepreneurship Development', 'image' => 'assets/images/research/iic/entr_06072023_1209.jpg'],
                ['title' => 'IIC Workshop Event', 'image' => 'assets/images/research/iic/WhatsApp_Image_2023-09-26_at_15.01.28_26092023_0425.jpg'],
                ['title' => 'COMSOL Multiphysics Workshop', 'image' => 'assets/images/research/iic/COMSOL_Workshop_10072023_1027.jpg'],
                ['title' => 'National IP Awareness Mission (NIPAM)', 'image' => 'assets/images/research/iic/NIPAM_workshop_10072023_1029.jpg'],
                ['title' => 'NIPAM Intellectual Property Program', 'image' => 'assets/images/research/iic/NIPAM_10072023_1029.jpg'],
                ['title' => 'UIT Innovation Appreciation Certificate', 'image' => 'assets/images/research/iic/certificate_uit_10072023_1033.jpg']
            ],
            'updated_at' => date('Y-m-d H:i:s')
        ]
    ];
}

// 10. Exposition
if (empty($data['Exposition'])) {
    $data['Exposition'] = [
        [
            'id' => '1',
            'title' => "EXPOSITION: A CARNIVAL OF STUDENT'S INNOVATION",
            'intro' => "Exposition – The mega fest of energy and ideas of 20,000 students from more than 300 schools and colleges in Madhya Pradesh has started at the SSSUTMS University campus, Sehore. The seeds of Exposition were sown in the year 2017 and since then there was no turn back.",
            'body' => "Exposition as the name suggests is an amalgamation of Creation and Exposure. Young minds use their inventiveness and fervour to create new projects that find solutions to real life issues. Exposition is fundamental to research innovation and economic vitality and healthy environment. Most of the innovation are rooted in inter-disciplinary efforts.\n\nFaculties and students from various schools and colleges of Madhya Pradesh participate in this three-day event. More than 300 schools and colleges take part in this grand fest. More than 20000 students from different schools and colleges showcased their projects. The projects covered topics ranging from science, technology, arts, law, commerce etc.\n\nHere one got to explore the marvels of engineering and technology. More than 250 stalls is normally on display. Some of the basic highlights of the event will be Nukkad Nataks, Robotics, Project Innovations and Drone competition. Nukkad Nataks are to hear the voices from the streets. It is where young minds displayed their performing potential in front of the crowd. The themes dealt with topics like Beti Bachao, Beti Padao Andolan, Harmful effects of Plastic, Depletion of Ground water, Awareness about Pollution etc. Robotic competition too, is quite action packed. Robo-War, Robo-race and innovation challenge intrigued the audience. In project innovation the projects themes revolved around scientific solutions for different challenges in life. 'War of Wings' was one of the highlight of the events. Eminent Personalities grace the occasion as chief guests on the consecutive days of the events.",
            'quote' => 'Exposition is in true sense the carnival of innovations.',
            'updated_at' => date('Y-m-d H:i:s')
        ]
    ];
}

// 11. UGAndPGScholarsProject
if (empty($data['UGAndPGScholarsProject'])) {
    $data['UGAndPGScholarsProject'] = [
        [
            'id' => '1',
            'title' => "UG/PG SCHOLAR'S PROJECT",
            'philosophy' => "SSSUTMS University aims at sculpting young creative professional with an intellect to throughly know the past, critically analyze the present and creatively shape the future.\n\nIn the university idea of the teaching is not conventional and pedagogic limiting the students to information rather it is progressive and creative facilitating them to think, experiment and discover under able guidance.\n\nOver the past years, research and innovation was the forte of the post graduate students, Ph.D. scholars and faculty members, however, this year, it was decided by the competent authorities to also include the under graduate students as the spark of curiosity should be inculcated as early as possible.\n\nThe university has a scholars hub which includes all academic rank holders of the various faculties. Academic activities, guest lectures, educational tours etc are organized for these scholars. As a part of hub activities, this year it was proposed that academics research projects/short studies/surveys etc be carried out by groups of these scholars under designated faculty members. Each group carried out their study and compiled the results in the form of a scientific paper.\n\nThe aim of carrying out these project was to give these students an exposure to the research methodology. A glimpse to the long, tough but immensely beautiful and satiating path of research and innovation.\n\nSo this is the compendium of all the various short studies /research projects /survey etc carried out by the undergraduate scholars as their first step towards research.\n\nWe hope to come up with newer ideas and innovation every year.",
            'quote_text' => 'Excellence is a continuous process and not an accident',
            'quote_author' => 'Dr. A.P.J. Abdul Kalam',
            'notice' => 'Department wise List Of Abstracts Are compiled and published annually under the Directorate of Research & Development.',
            'updated_at' => date('Y-m-d H:i:s')
        ]
    ];
}

// 12. NPTEL
if (empty($data['NPTEL'])) {
    $data['NPTEL'] = [
        [
            'id' => '1',
            'title' => 'NPTEL Local Chapter',
            'about_text' => 'The National Programme on Technology Enhanced Learning (NPTEL) is a project initiated and handled by seven Indian Institute of Technology (IIT-Bombay, Delhi, Kanpur, Kharagpur, Madras, Roorkee and Guwahati) and Indian Institute of Science, Bangalore. It is project funded by MHRD, Government of India, to develop and promote multimedia and web technology-based learning open for all. Currently more than 940 courses are available on web portal http://nptel.ac.in for viewing and downloading. NPTEL has also initiated open online courses with certification where courses in different domains are regularly launched. Courses are free to enroll and are available at http://onlinecourses.nptel.ac.in. At the end of the course a certification exam (optional) is held on specific dates at specific centers. Certificate from IIT is awarded to those who register and appear for the examination. These exams have nominal fees with facility of scholarship and partial fee waiver for SC/ST candidates.',
            'portal_url' => 'https://onlinecourses.nptel.ac.in/',
            'guidelines' => [
                'Use a unique email id throughout the course run.',
                "Select 'Yes' to the query - Are you a part of NPTEL Local Chapter.",
                'Choose the correct Local Chapter from the drop-down list while enrolling.',
                'Students - Enter college roll number (college id number).',
                'Faculty - Enter college Employee id no.'
            ],
            'links' => [
                ['title' => 'Video on How to Enroll to the NPTEL Online Courses', 'url' => 'http://nptel.ac.in/LocalChapter/videos.php'],
                ['title' => 'Link for NPTEL Brochures and Booklet', 'url' => 'http://nptel.ac.in/Brochures/'],
                ['title' => 'How do students select their mentors', 'url' => 'https://drive.google.com/file/d/1JFS3yGPkMSeQZ3UHIZo8vrq9Z1LI6UCp/view'],
                ['title' => 'Guidelines for Mentors', 'url' => 'https://drive.google.com/file/d/1RukTlxUWN-XmBXCeVzP4o20b5fo1gGOe/view'],
                ['title' => 'Mentors flow in NPTEL Local Chapters', 'url' => 'https://drive.google.com/file/d/1NTIlO45DtQtJBCWZeDx9oWFHMZD2m9Wq/view']
            ],
            'updated_at' => date('Y-m-d H:i:s')
        ]
    ];
}

file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
echo "All 12 Research datasets successfully seeded in data/page_documents.json\n";
