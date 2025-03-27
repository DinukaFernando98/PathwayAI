import sys
import json

career_paths = {
    'Business Management': [
        'Intern', 'Junior Manager', 'Assistant Manager', 'Manager', 'Senior Manager', 
        'Lead Manager', 'Department Head', 'General Manager', 'Executive Manager', 
        'Vice President', 'Senior Vice President', 'Chief Operating Officer (COO)', 
        'Chief Executive Officer (CEO)'
    ],
    'Accounting': [
        'Intern', 'Junior Accountant', 'Accountant', 'Senior Accountant', 
        'Accounting Supervisor', 'Accounting Manager', 'Finance Manager', 
        'Senior Finance Manager', 'Financial Controller', 'Finance Director', 
        'Vice President of Finance', 'Chief Financial Officer (CFO)'
    ],
    'Information Technology': [
        'Intern', 'Junior Developer', 'Developer', 'Senior Developer', 
        'Lead Developer', 'Software Engineer', 'Senior Software Engineer', 
        'Tech Lead', 'Engineering Manager', 'Software Architect', 'Engineering Director', 
        'Vice President of Engineering', 'Chief Technology Officer (CTO)'
    ],
    'Human Resources': [
        'Intern', 'Junior HR Officer', 'HR Officer', 'Senior HR Officer', 
        'HR Manager', 'Senior HR Manager', 'HR Director', 'VP of HR', 
        'Chief Human Resources Officer (CHRO)'
    ],
    'Engineering': [
        'Intern', 'Junior Engineer', 'Engineer', 'Senior Engineer', 
        'Lead Engineer', 'Principal Engineer', 'Engineering Manager', 
        'Senior Engineering Manager', 'Director of Engineering', 
        'VP of Engineering', 'Chief Engineering Officer (CEO)'
    ],
    'Architecture': [
        'Intern', 'Junior Architect', 'Architect', 'Senior Architect', 
        'Lead Architect', 'Principal Architect', 'Senior Principal Architect', 
        'Director of Architecture', 'VP of Architecture', 'Chief Architect'
    ]
}

def get_career_path(field):
    # Return the career path based on the field
    return career_paths.get(field, [])

if __name__ == "__main__":
    # Get the user input (career field)
    field = sys.argv[1] if len(sys.argv) > 1 else None
    
    if field:
        career_path = get_career_path(field)
        print(json.dumps({"career_path": career_path}))
    else:
        print(json.dumps({"error": "No career field provided"}))
