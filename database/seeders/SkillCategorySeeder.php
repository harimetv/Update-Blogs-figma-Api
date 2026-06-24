<?php
namespace Database\Seeders;

use App\Models\Skill;
use App\Models\SkillCategory;
use Illuminate\Database\Seeder;

class SkillCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories =
            [
            [
                'name'        => 'Web Development',
                'description' => 'Frontend and backend website development.',
                'skills'      => [
                    'HTML5', 'CSS3', 'JavaScript', 'React', 'Vue.js', 'Angular', 'Next.js', 'Nuxt.js', 'Node.js', 'Express.js',
                    'Laravel', 'Django', 'Flask', 'REST APIs', 'GraphQL', 'MySQL', 'PostgreSQL', 'MongoDB', 'Redis', 'Tailwind CSS',
                ],
            ],
            [
                'name'        => 'Mobile Development',
                'description' => 'Building Android, iOS, and cross-platform mobile apps.',
                'skills'      => [
                    'Flutter', 'React Native', 'Swift', 'Kotlin', 'Objective-C', 'Jetpack Compose', 'Ionic', 'Xamarin',
                    'Firebase', 'App Store Deployment', 'Play Store Deployment', 'Push Notifications', 'SQLite', 'Realm DB',
                    'Bluetooth APIs', 'Camera Integration', 'In-App Purchases', 'UI Animations', 'MVVM Architecture', 'Unit Testing',
                ],
            ],
            [
                'name'        => 'Cloud Computing',
                'description' => 'Cloud infrastructure and services management.',
                'skills'      => [
                    'AWS', 'Google Cloud', 'Microsoft Azure', 'CloudFormation', 'Terraform', 'Kubernetes', 'Docker',
                    'CI/CD Pipelines', 'Lambda Functions', 'API Gateway', 'Serverless', 'Load Balancing', 'S3 Storage',
                    'EC2 Management', 'Cloud Monitoring', 'VPC Networking', 'Elastic Beanstalk', 'IAM Roles', 'Cloud Security', 'Cost Optimization',
                ],
            ],
            [
                'name'        => 'Artificial Intelligence',
                'description' => 'Machine learning, neural networks, and deep learning.',
                'skills'      => [
                    'Python', 'NumPy', 'Pandas', 'Scikit-learn', 'TensorFlow', 'Keras', 'Matplotlib', 'Seaborn',
                    'Data Visualization', 'Data Cleaning', 'Jupyter Notebooks', 'Machine Learning Models',
                    'Predictive Analytics', 'Feature Engineering', 'Statistics', 'A/B Testing', 'BigQuery',
                    'SQL for Data', 'Regression Analysis', 'Data Pipelines',
                ],
            ],
            [
                'name'        => 'Data Science',
                'description' => 'Data analysis, visualization, and predictive modeling.',
                'skills'      => [
                    'Data Mining', 'Exploratory Data Analysis', 'Machine Learning', 'R Programming', 'Python',
                    'Pandas', 'NumPy', 'Matplotlib', 'Seaborn', 'Data Cleaning', 'SQL', 'Power BI', 'Tableau',
                    'Data Storytelling', 'Predictive Modeling', 'Big Data Analytics', 'Feature Selection',
                    'Deep Learning Basics', 'Data Governance', 'Data Ethics',
                ],
            ],
            [
                'name'        => 'Cybersecurity',
                'description' => 'Protecting systems, networks, and data from digital attacks.',
                'skills'      => [
                    'Penetration Testing', 'Ethical Hacking', 'Kali Linux', 'Burp Suite', 'Metasploit',
                    'Network Security', 'Cryptography', 'OWASP', 'Firewalls', 'SIEM Tools', 'Incident Response',
                    'Forensics', 'Phishing Prevention', 'Security Audits', 'Zero Trust Architecture',
                    'Vulnerability Scanning', 'ISO 27001', 'Identity Management', 'Data Encryption', 'Security Policies',
                ],
            ],
            [
                'name'        => 'Blockchain',
                'description' => 'Distributed ledger technology and smart contracts.',
                'skills'      => [
                    'Solidity', 'Ethereum', 'Web3.js', 'Smart Contracts', 'Hardhat', 'Truffle Suite', 'IPFS',
                    'Polygon', 'Solana', 'Rust', 'Tokenomics', 'DeFi', 'NFT Development', 'Metamask Integration',
                    'Chainlink', 'Ethers.js', 'Crypto Wallets', 'Consensus Algorithms', 'Gas Optimization', 'Blockchain APIs',
                ],
            ],
            [
                'name'        => 'UI/UX Design',
                'description' => 'Designing user interfaces and improving user experience.',
                'skills'      => [
                    'Figma', 'Adobe XD', 'Sketch', 'User Research', 'Wireframing', 'Prototyping', 'Usability Testing',
                    'Design Systems', 'Accessibility (WCAG)', 'Interaction Design', 'Journey Mapping', 'Color Theory',
                    'Typography', 'Mobile UX', 'Information Architecture', 'Responsive Design', 'Persona Building',
                    'Heuristic Evaluation', 'Component Libraries', 'Microinteractions',
                ],
            ],
            [
                'name'        => 'Graphic Design',
                'description' => 'Creating visual content for branding and marketing.',
                'skills'      => [
                    'Adobe Photoshop', 'Illustrator', 'InDesign', 'Canva', 'CorelDRAW', 'Brand Identity', 'Logo Design',
                    'Typography', 'Poster Design', 'Brochure Design', 'Social Media Design', 'Print Design', 'Color Theory',
                    'Packaging Design', 'Layout Design', 'Digital Illustration', 'Motion Graphics', '3D Mockups', 'Photo Editing', 'Iconography',
                ],
            ],
            [
                'name'        => 'Product Management',
                'description' => 'Planning and executing product lifecycles.',
                'skills'      => [
                    'Product Roadmaps', 'Market Analysis', 'Agile Planning', 'User Stories', 'MVP Definition', 'Feature Prioritization',
                    'Stakeholder Communication', 'Customer Interviews', 'A/B Testing', 'KPI Metrics', 'Backlog Grooming',
                    'Cross-functional Leadership', 'Competitive Research', 'Product Lifecycle', 'Pricing Models',
                    'UX Collaboration', 'Data-driven Decisions', 'Product Launch', 'OKR Setting', 'User Retention Metrics',
                ],
            ],
            [
                'name'        => 'Digital Marketing',
                'description' => 'Promoting products and brands through online channels.',
                'skills'      => [
                    'SEO Optimization', 'Google Ads', 'Content Marketing', 'Social Media Strategy', 'Email Campaigns',
                    'Affiliate Marketing', 'Influencer Marketing', 'Brand Storytelling', 'YouTube Ads', 'Conversion Rate Optimization',
                    'Landing Page Design', 'Analytics Tracking', 'Marketing Funnels', 'Retargeting Ads', 'Copywriting',
                    'Community Engagement', 'Hashtag Research', 'Performance Marketing', 'A/B Testing Campaigns', 'Marketing Automation',
                ],
            ],
            [
                'name'        => 'Digital Marketing',
                'description' => 'Promoting products, brands, and services through digital channels.',
                'skills'      => [
                    'SEO Optimization', 'Google Ads', 'Facebook Ads', 'Instagram Marketing', 'Email Marketing',
                    'Content Strategy', 'Google Analytics', 'Keyword Research', 'A/B Testing', 'Conversion Optimization',
                    'Affiliate Marketing', 'Influencer Marketing', 'Copywriting', 'Social Media Strategy',
                    'Video Marketing', 'Marketing Automation', 'Landing Page Optimization', 'CRO Tools',
                    'Funnel Building', 'CRM Management',
                ],
            ],
            [
                'name'        => 'DevOps Engineering',
                'description' => 'Automating software delivery and infrastructure operations.',
                'skills'      => [
                    'Jenkins', 'Ansible', 'Terraform', 'Docker', 'Kubernetes', 'AWS EC2', 'Monitoring Systems',
                    'Load Balancing', 'CI/CD Pipelines', 'Infrastructure as Code', 'Linux Administration',
                    'Scripting (Bash/Python)', 'GitHub Actions', 'Cloud Deployment', 'Helm Charts', 'Network Configuration',
                    'Prometheus', 'Grafana', 'Log Aggregation', 'Disaster Recovery',
                ],
            ],
            [
                'name'        => 'Game Development',
                'description' => 'Designing and developing 2D and 3D games across multiple platforms.',
                'skills'      => [
                    'Unity', 'Unreal Engine', 'C#', 'C++', '3D Modeling', 'Physics Engines', 'Animation', 'AI for Games',
                    'Shader Programming', 'Game Monetization', 'Level Design', 'Multiplayer Networking',
                    'UI/UX for Games', 'Game Optimization', 'Mobile Game Development', 'VR Development',
                    'AR Development', 'Audio Integration', 'Storyboarding', 'Performance Debugging',
                ],
            ],
            [
                'name'        => 'E-commerce Development',
                'description' => 'Building and optimizing online stores and digital commerce systems.',
                'skills'      => [
                    'Shopify', 'WooCommerce', 'Magento', 'OpenCart', 'BigCommerce', 'Stripe Integration',
                    'PayPal APIs', 'Product Management', 'Inventory Systems', 'SEO for E-commerce',
                    'Conversion Funnels', 'Abandoned Cart Recovery', 'Email Campaigns', 'Payment Gateways',
                    'User Reviews', 'Shipping Integration', 'Sales Analytics', 'Google Shopping', 'Performance Optimization', 'UI Customization',
                ],
            ],
            [
                'name'        => 'Content Creation',
                'description' => 'Producing engaging written, visual, and multimedia content.',
                'skills'      => [
                    'Copywriting', 'Storytelling', 'Video Editing', 'Script Writing', 'Podcast Production',
                    'Voice-over Recording', 'Content Scheduling', 'Social Media Trends', 'Photography',
                    'Caption Writing', 'Hashtag Research', 'Content SEO', 'YouTube Optimization',
                    'Livestreaming', 'Short-form Video Creation', 'Reel Editing', 'Engagement Analysis',
                    'Thumbnail Design', 'Creative Direction', 'Brand Tone Development',
                ],
            ],
            [
                'name'        => 'Machine Learning',
                'description' => 'Designing and deploying intelligent predictive models and algorithms.',
                'skills'      => [
                    'Supervised Learning', 'Unsupervised Learning', 'Reinforcement Learning', 'TensorFlow',
                    'PyTorch', 'Feature Engineering', 'Model Evaluation', 'Hyperparameter Tuning',
                    'Data Cleaning', 'NLP', 'Computer Vision', 'Deep Learning', 'Neural Networks',
                    'Model Deployment', 'Data Preprocessing', 'Dimensionality Reduction', 'Gradient Boosting',
                    'Time Series Forecasting', 'Recommendation Systems', 'Clustering Algorithms',
                ],
            ],
            [
                'name'        => 'Augmented & Virtual Reality',
                'description' => 'Creating immersive AR and VR experiences for diverse applications.',
                'skills'      => [
                    'Unity 3D', 'ARKit', 'ARCore', 'Unreal Engine', '3D Object Tracking', 'Scene Rendering',
                    '360° Video Integration', 'Spatial Audio', 'VR Interaction Design', '3D Modeling',
                    'Blender', 'Oculus SDK', 'Mixed Reality Toolkit', 'Gesture Recognition',
                    'Marker-based AR', 'SLAM Technology', 'Virtual Tours', 'Environment Design',
                    'XR Optimization', 'Performance Profiling',
                ],
            ],
            [
                'name'        => 'Internet of Things (IoT)',
                'description' => 'Connecting devices and systems through smart technologies.',
                'skills'      => [
                    'Arduino', 'Raspberry Pi', 'MQTT Protocol', 'Embedded C', 'IoT Security', 'Cloud Integration',
                    'Sensor Data Processing', 'Edge Computing', 'IoT Architecture', 'Bluetooth LE', 'Zigbee',
                    'LoRaWAN', 'Smart Home Automation', 'Microcontrollers', 'Real-time Monitoring',
                    'Device Calibration', 'IoT Dashboards', 'Data Transmission', 'Hardware Troubleshooting',
                    'Firmware Updates',
                ],
            ],
            [
                'name'        => 'Data Engineering',
                'description' => 'Building systems for data collection, transformation, and analysis.',
                'skills'      => [
                    'ETL Pipelines', 'Apache Spark', 'Kafka', 'Airflow', 'Hadoop', 'SQL', 'Data Warehousing',
                    'Snowflake', 'BigQuery', 'Data Modeling', 'Python', 'Data Lakes', 'Redshift',
                    'Performance Tuning', 'Data Governance', 'Schema Design', 'Batch Processing',
                    'Real-time Data Processing', 'Data Quality Checks', 'API Integrations',
                ],
            ],
            [
                'name'        => 'Video Production',
                'description' => 'Planning, shooting, and editing professional video content.',
                'skills'      => [
                    'Cinematography', 'Storyboarding', 'Lighting Setup', 'Sound Mixing', 'Video Editing',
                    'Color Grading', 'After Effects', 'Premiere Pro', 'DaVinci Resolve', 'Green Screen Editing',
                    'Drone Videography', 'Camera Angles', 'Visual Effects', 'B-Roll Shooting',
                    'Audio Syncing', 'Video Compression', 'Export Settings', 'Post-Production Workflow',
                    'Short Film Editing', 'Live Video Production',
                ],
            ],
            [

                'name'        => 'Cloud Architecture',
                'description' => 'Designing scalable, secure, and efficient cloud systems.',
                'skills'      => [
                    'AWS Architecture', 'Azure Solutions', 'GCP Design', 'Load Balancing', 'Auto Scaling',
                    'Disaster Recovery', 'Cloud Security', 'Hybrid Cloud', 'Serverless Architecture',
                    'VPC Configuration', 'Elastic Load Balancer', 'CloudFormation Templates', 'Identity & Access Management',
                    'Containerization', 'Cost Management', 'Monitoring & Logging', 'API Gateways', 'Microservices Design',
                    'Cloud Storage Optimization', 'Service Meshes',
                ],

            ],
            [

                'name'        => 'Database Administration',
                'description' => 'Managing, optimizing, and securing database systems.',
                'skills'      => [
                    'MySQL', 'PostgreSQL', 'MongoDB', 'Redis', 'Oracle', 'SQL Server', 'Database Replication',
                    'Index Optimization', 'Query Tuning', 'Backup & Recovery', 'Data Partitioning', 'Database Clustering',
                    'Stored Procedures', 'Trigger Management', 'Data Encryption', 'Performance Monitoring',
                    'NoSQL Systems', 'Sharding', 'Transaction Management', 'Database Migration',
                ],
            ],
            [
                'name'        => 'System Administration',
                'description' => 'Maintaining and managing servers, networks, and IT infrastructure.',
                'skills'      => [
                    'Linux Administration', 'Windows Server', 'Active Directory', 'Network Configuration',
                    'Firewall Setup', 'VPN Configuration', 'User Management', 'Server Monitoring',
                    'System Hardening', 'Backup Strategies', 'Shell Scripting', 'DNS Management',
                    'Load Balancing', 'Performance Optimization', 'Patch Management', 'Nginx Configuration',
                    'Apache Setup', 'Log Management', 'RAID Configuration', 'System Auditing',
                ],
            ],
            [
                'name'        => 'Software Testing & QA',
                'description' => 'Ensuring software quality through testing and validation.',
                'skills'      => [
                    'Manual Testing', 'Automated Testing', 'Selenium', 'JUnit', 'TestNG', 'Cypress',
                    'Postman', 'API Testing', 'Performance Testing', 'Load Testing', 'Regression Testing',
                    'Bug Tracking', 'JIRA', 'Smoke Testing', 'Test Cases Design', 'CI/CD Integration',
                    'UAT Testing', 'Defect Reporting', 'Quality Metrics', 'Continuous Testing',
                ],
            ],

            [
                'name'        => 'Business Analysis',
                'description' => 'Identifying business needs and recommending data-driven solutions.',
                'skills'      => [
                    'Requirement Gathering', 'Use Case Modeling', 'Process Mapping', 'SWOT Analysis', 'Data Visualization',
                    'Stakeholder Interviews', 'Agile Methodology', 'User Stories', 'Gap Analysis', 'KPI Definition',
                    'Documentation Writing', 'Wireframing', 'Flowchart Creation', 'Business Intelligence', 'Reporting Tools',
                    'Presentation Skills', 'Excel Modeling', 'Data Interpretation', 'Strategic Planning', 'Project Scoping',
                ],
            ],
            [
                'name'        => 'Project Management',
                'description' => 'Planning, executing, and managing projects efficiently.',
                'skills'      => [
                    'Agile', 'Scrum', 'Kanban', 'Waterfall', 'Risk Management', 'Budgeting', 'Stakeholder Communication',
                    'Team Leadership', 'Time Management', 'Resource Allocation', 'Project Chartering', 'Sprint Planning',
                    'Retrospectives', 'Change Management', 'Project Documentation', 'Timeline Estimation', 'Conflict Resolution',
                    'MS Project', 'Trello', 'JIRA Management',
                ],
            ],
            [
                'name'        => 'Finance & Accounting',
                'description' => 'Managing budgets, auditing, and financial reporting.',
                'skills'      => [
                    'Bookkeeping', 'Financial Analysis', 'Taxation', 'Auditing', 'Budget Forecasting',
                    'Excel Modeling', 'Payroll Management', 'QuickBooks', 'Tally ERP', 'Cash Flow Management',
                    'Profit & Loss Reporting', 'Balance Sheet Analysis', 'Cost Accounting', 'Variance Analysis',
                    'Financial Compliance', 'Accounts Payable', 'Accounts Receivable', 'Ledger Management',
                    'Bank Reconciliation', 'VAT Filing',
                ],
            ],

            [
                'name'        => 'Human Resources',
                'description' => 'Managing employee lifecycle, policies, and engagement.',
                'skills'      => [
                    'Recruitment', 'Onboarding', 'Payroll Management', 'Employee Engagement', 'Performance Appraisal',
                    'Conflict Resolution', 'HR Compliance', 'Policy Drafting', 'Training & Development',
                    'Exit Interviews', 'Time Tracking', 'HRIS Tools', 'Attendance Management', 'Benefits Administration',
                    'Grievance Handling', 'Talent Retention', 'Diversity & Inclusion', 'Succession Planning',
                    'Workforce Analytics', 'HR Strategy',
                ],
            ],
            [
                'name'        => 'Sales & Business Development',
                'description' => 'Driving business growth through strategic sales and partnerships.',
                'skills'      => [
                    'Lead Generation', 'Cold Calling', 'CRM Management', 'Sales Funnel Creation', 'Negotiation Skills',
                    'Customer Retention', 'Email Outreach', 'Presentation Skills', 'Upselling', 'Cross-Selling',
                    'Sales Forecasting', 'Account Management', 'Territory Planning', 'Competitive Analysis',
                    'Market Research', 'Pipeline Management', 'Client Relationship Building', 'B2B Sales', 'Proposal Writing', 'Objection Handling',
                ],
            ],
            [
                'name'        => 'Customer Support',
                'description' => 'Providing professional, empathetic, and efficient customer service.',
                'skills'      => [
                    'Ticket Management', 'Live Chat Support', 'CRM Tools', 'Email Etiquette', 'Conflict Resolution',
                    'Technical Support', 'Customer Retention', 'Phone Communication', 'Knowledge Base Management',
                    'Problem Solving', 'Empathy', 'Escalation Handling', 'Service Level Agreements', 'Zendesk',
                    'Intercom', 'Multilingual Support', 'Feedback Collection', 'Complaint Resolution',
                    'Product Training', 'Customer Journey Mapping',
                ],
            ],
            [
                'name'        => 'Content Creation',
                'description' => 'Producing engaging written, audio, and visual content for multiple platforms.',
                'skills'      => [
                    'Content Strategy', 'Blog Writing', 'SEO Copywriting', 'Video Scripting', 'Podcast Production',
                    'Storytelling', 'Script Editing', 'Keyword Optimization', 'Canva Design', 'YouTube SEO',
                    'Content Repurposing', 'Editorial Planning', 'Hashtag Strategy', 'Content Calendar Management',
                    'Headline Writing', 'Thumbnail Design', 'AI Writing Tools', 'Proofreading', 'Social Copywriting', 'Storyboarding',
                ],
            ],
            [
                'name'        => 'Video Production',
                'description' => 'Creating and editing professional-grade video content.',
                'skills'      => [
                    'Video Editing', 'Premiere Pro', 'Final Cut Pro', 'DaVinci Resolve', 'After Effects',
                    'Color Grading', 'Cinematography', 'Lighting Setup', 'Sound Design', 'Green Screen Editing',
                    'Motion Graphics', 'Audio Mixing', 'Script Writing', 'Storyboarding', 'Transitions & Effects',
                    'Camera Operation', 'Multicam Editing', 'Rendering Optimization', 'Video Compression', 'Subtitling',
                ],
            ],
            [
                'name'        => 'Photography',
                'description' => 'Capturing and editing high-quality images for professional use.',
                'skills'      => [
                    'Portrait Photography', 'Product Photography', 'Event Photography', 'Studio Lighting',
                    'Photo Retouching', 'Color Correction', 'Adobe Lightroom', 'Photoshop', 'Composition Techniques',
                    'Lens Selection', 'RAW Editing', 'Image Sharpening', 'White Balance Adjustment', 'HDR Photography',
                    'Exposure Management', 'Macro Photography', 'Watermarking', 'Stock Photography', 'Metadata Editing', 'Photo Backup Management',
                ],
            ],
            [
                'name'        => 'E-Commerce Management',
                'description' => 'Operating and optimizing online retail platforms.',
                'skills'      => [
                    'Shopify', 'WooCommerce', 'Magento', 'Product Listing Optimization', 'Inventory Management',
                    'Dropshipping', 'Conversion Rate Optimization', 'Email Automation', 'Google Merchant Center',
                    'A/B Testing', 'Customer Reviews Management', 'Payment Gateway Setup', 'Order Fulfillment',
                    'Analytics & Reporting', 'Abandoned Cart Recovery', 'Coupon Campaigns', 'Affiliate Marketing',
                    'Upselling & Cross-selling', 'Multi-channel Selling', 'E-commerce SEO',
                ],
            ],
            [
                'name'        => 'Search Engine Optimization',
                'description' => 'Improving website visibility and ranking in search results.',
                'skills'      => [
                    'On-page SEO', 'Off-page SEO', 'Technical SEO', 'Keyword Research', 'Backlink Building',
                    'Google Search Console', 'Google Analytics', 'Schema Markup', 'SEO Audits', 'Local SEO',
                    'Content Optimization', 'SERP Analysis', 'Ahrefs', 'SEMrush', 'Yoast SEO',
                    'Mobile Optimization', 'Core Web Vitals', 'Link Outreach', 'Competitor Analysis', 'CTR Optimization',
                ],
            ],
            [
                'name'        => 'Social Media Management',
                'description' => 'Building brand presence across social platforms.',
                'skills'      => [
                    'Instagram Strategy', 'Facebook Ads', 'Twitter Growth', 'LinkedIn Marketing', 'Hashtag Optimization',
                    'Influencer Collaboration', 'Content Calendar Creation', 'Brand Voice Management',
                    'Audience Targeting', 'Ad Copywriting', 'Reels Editing', 'Social Analytics',
                    'Community Engagement', 'Campaign Management', 'A/B Testing for Ads', 'Hashtag Research',
                    'Social Listening', 'Crisis Communication', 'Trend Analysis', 'Cross-Platform Branding',
                ],
            ],
            [
                'name'        => 'Game Development',
                'description' => 'Designing and developing interactive video games.',
                'skills'      => [
                    'Unity 3D', 'Unreal Engine', 'C# Scripting', 'Blueprint Visual Scripting', 'Level Design',
                    'Game Physics', 'AI Pathfinding', 'Game Balancing', 'Multiplayer Networking', 'Animation Rigging',
                    'Particle Systems', 'Lighting & Shadows', '2D Sprite Animation', 'VR Development', 'ARKit Integration',
                    'Performance Optimization', 'Mobile Game Publishing', 'Sound FX Design', 'Storyboarding', 'UI/UX for Games',
                ],
            ],
            [
                'name'        => 'Internet of Things (IoT)',
                'description' => 'Connecting devices and systems to enable smart automation.',
                'skills'      => [
                    'Arduino', 'Raspberry Pi', 'MQTT Protocol', 'IoT Security', 'Edge Computing',
                    'Sensor Integration', 'Wireless Communication', 'LoRaWAN', 'NB-IoT', 'Zigbee',
                    'Cloud IoT Platforms', 'Embedded C', 'Python IoT', 'Microcontrollers', 'Device Provisioning',
                    'Telemetry Data Handling', 'OTA Updates', 'Smart Home Automation', 'Industrial IoT', 'Power Management',
                ],
            ],
            [
                'name'        => 'Robotics Engineering',
                'description' => 'Designing, building, and programming robotic systems.',
                'skills'      => [
                    'ROS (Robot Operating System)', 'Arduino Programming', 'C++ Robotics', 'Path Planning',
                    'Kinematics', 'PID Control', 'Autonomous Navigation', 'Computer Vision', 'OpenCV', 'SLAM Algorithms',
                    'Actuators', 'Motor Control', '3D Simulation', 'Sensor Fusion', 'Inverse Kinematics',
                    'Machine Learning for Robotics', 'ROS2', 'Gazebo Simulation', 'Robot Calibration', 'Obstacle Detection',
                ],
            ],
            [
                'name'        => 'Networking & Infrastructure',
                'description' => 'Building and maintaining secure network systems.',
                'skills'      => [
                    'Cisco Routing', 'Switch Configuration', 'TCP/IP', 'LAN/WAN Design', 'Firewalls & Security',
                    'VPN Setup', 'Subnetting', 'Network Monitoring', 'Wireshark Analysis', 'Load Balancers',
                    'DNS Configuration', 'DHCP Setup', 'BGP', 'OSPF', 'QoS Management',
                    'Network Automation', 'SD-WAN', 'Cloud Networking', 'Zero Trust Networking', 'Wireless Standards',
                ],
            ],
            [
                'name'        => 'Augmented & Virtual Reality',
                'description' => 'Developing immersive digital experiences using AR and VR technologies.',
                'skills'      => [
                    'Unity 3D', 'Unreal Engine', 'ARKit', 'ARCore', 'Blender', '3D Modeling',
                    'XR Interaction Toolkit', 'Spatial Audio', 'Oculus SDK', 'HTC Vive Development',
                    'Hand Tracking', 'Gesture Recognition', 'Scene Optimization', 'Lighting in VR',
                    'OpenXR', 'Mixed Reality Toolkit', '3D Animation', 'VR UX Design', 'Volumetric Video', 'Motion Capture',
                ],
            ],
            [
                'name'        => 'Embedded Systems',
                'description' => 'Designing hardware-software integrated systems for devices.',
                'skills'      => [
                    'C Programming', 'Embedded C', 'RTOS', 'ARM Cortex', 'Microcontrollers', 'PCB Design',
                    'UART Communication', 'SPI Protocol', 'I2C Protocol', 'Embedded Linux', 'Firmware Development',
                    'Bootloaders', 'Memory Optimization', 'Low Power Design', 'Interrupt Handling',
                    'Signal Processing', 'Sensor Calibration', 'FPGA Programming', 'JTAG Debugging', 'Hardware Testing',
                ],
            ],
            [
                'name'        => 'EdTech Development',
                'description' => 'Building educational platforms, tools, and content systems.',
                'skills'      => [
                    'LMS Platforms', 'Moodle', 'Gamification Design', 'Learning Analytics', 'Adaptive Learning',
                    'SCORM Integration', 'Interactive Videos', 'E-learning Authoring Tools', 'Content Management Systems',
                    'Progress Tracking', 'Quizzing Systems', 'AI Tutors', 'Personalized Learning Paths',
                    'Accessibility Compliance', 'Mobile Learning Apps', 'Teacher Dashboards', 'Virtual Classrooms',
                    'WebRTC', 'User Engagement Analytics', 'Certification Systems',
                ],
            ],
            [
                'name'        => 'Legal & Compliance Tech',
                'description' => 'Developing systems for legal, compliance, and data governance.',
                'skills'      => [
                    'GDPR Compliance', 'CCPA', 'Data Retention Policies', 'Legal Documentation Automation',
                    'Contract Lifecycle Management', 'E-signature APIs', 'Access Control Systems',
                    'ISO Standards', 'Audit Trail Design', 'Regulatory Reporting', 'Risk Assessment',
                    'Policy Management', 'SOX Compliance', 'HIPAA Regulations', 'Data Masking',
                    'Identity Verification', 'Consent Management', 'Fraud Detection', 'Legal Analytics', 'Security Auditing',
                ],
            ],
            [
                'name'        => 'Healthcare IT',
                'description' => 'Creating software and systems for healthcare management and telemedicine.',
                'skills'      => [
                    'HL7', 'FHIR Standards', 'Telemedicine Platforms', 'EHR Systems', 'Medical Billing',
                    'Patient Portals', 'HIPAA Compliance', 'Wearable Data Integration', 'IoMT Devices',
                    'Healthcare APIs', 'Appointment Scheduling', 'Clinical Data Analysis', 'AI Diagnostics',
                    'Medical Image Processing', 'Healthcare Analytics', 'Pharmacy Management',
                    'Claims Processing', 'Doctor-Patient Chat', 'Lab Report Automation', 'Secure Data Sharing',
                ],
            ],
            [
                'name'        => 'Real Estate Tech',
                'description' => 'Software solutions for property listings, management, and investment.',
                'skills'      => [
                    'MLS Integration', 'Property Listing Systems', 'Mapbox API', 'Google Maps API',
                    'Geolocation Search', 'Virtual Tours', 'CRM Integration', 'Real Estate Analytics',
                    'Booking Engines', 'Price Estimation Models', 'Tenant Portals', 'Mortgage Calculators',
                    'Payment Gateways', 'Property Management Systems', 'Lead Management', '3D Floor Plans',
                    'Push Notifications', 'Data Visualization', 'Customer Dashboards', 'SEO for Real Estate',
                ],
            ],
            [
                'name'        => 'Automotive Technology',
                'description' => 'Developing intelligent vehicle and mobility systems.',
                'skills'      => [
                    'CAN Protocol', 'OBD-II', 'Telematics Systems', 'ADAS Development', 'Autonomous Driving',
                    'Vehicle Networking', 'Automotive Ethernet', 'Embedded Diagnostics', 'Sensor Fusion',
                    'Battery Management Systems', 'Vehicle Simulation', '3D Modeling', 'Functional Safety (ISO 26262)',
                    'Real-time OS', 'In-vehicle Infotainment', 'HIL Testing', 'AI for Vehicles', 'Fleet Management',
                    'Over-the-Air Updates', 'Cybersecurity for Vehicles',
                ],
            ],
            [
                'name'        => 'Renewable Energy Engineering',
                'description' => 'Developing sustainable energy systems and smart grids.',
                'skills'      => [
                    'Solar PV Systems', 'Wind Turbine Design', 'Battery Storage', 'Energy Modeling',
                    'Microgrids', 'Power Electronics', 'Grid Integration', 'Smart Meters',
                    'Energy Efficiency Audits', 'IoT in Energy', 'Load Forecasting', 'Power Simulation',
                    'Data Acquisition', 'HVAC Optimization', 'Sustainable Design', 'Energy Policy Compliance',
                    'Renewable Forecasting', 'Hydrogen Systems', 'EV Charging Networks', 'Energy Monitoring Dashboards',
                ],
            ],
            [
                'name'        => 'FinTech Development',
                'description' => 'Building financial technology platforms and digital payment systems.',
                'skills'      => [
                    'Stripe Integration', 'Plaid API', 'Payment Gateways', 'Cryptocurrency Wallets', 'Open Banking APIs',
                    'KYC/AML Systems', 'Financial Data Encryption', 'Fraud Detection Models', 'Blockchain Payments',
                    'Smart Contracts', 'Microservices Architecture', 'Accounting Automation', 'Razorpay Integration',
                    'Real-time Transaction Processing', 'Data Tokenization', 'Bank API Integration',
                    'Wealth Management Platforms', 'Peer-to-Peer Lending', 'Financial Dashboards', 'Budgeting Tools',
                ],
            ],
            [
                'name'        => 'Supply Chain & Logistics',
                'description' => 'Optimizing transportation, warehousing, and inventory operations.',
                'skills'      => [
                    'Warehouse Management Systems', 'ERP Integration', 'Fleet Tracking', 'RFID Implementation',
                    'Inventory Forecasting', 'Logistics Planning', 'Supply Chain Analytics', 'Route Optimization',
                    'Shipment Tracking', 'Vendor Management', 'Cold Chain Logistics', 'Barcode Systems',
                    'Order Fulfillment Automation', 'Procurement Software', 'Demand Planning', '3PL Integration',
                    'EDI Standards', 'Customs Compliance', 'Reverse Logistics', 'Logistics Cost Analysis',
                ],
            ],
        ];

        foreach ($categories as $data) {
            $category = SkillCategory::updateOrCreate(
                ['name' => $data['name']],
                ['description' => $data['description']]
            );

            foreach ($data['skills'] as $skillName) {
                Skill::updateOrCreate(
                    ['name' => $skillName, 'skill_category_id' => $category->id],
                    ['is_approved' => true]
                );
            }
        }
    }
}
