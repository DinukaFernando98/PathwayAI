import pickle
import numpy as np
import sys
import json

# Load models and encoders
with open('python/salary_model.pkl', 'rb') as f:
    salary_model = pickle.load(f)
with open('python/job_encoder.pkl', 'rb') as f:
    job_encoder = pickle.load(f)
with open('python/experience_model.pkl', 'rb') as f:
    experience_model = pickle.load(f)
with open('python/qualification_model.pkl', 'rb') as f:
    qualification_model = pickle.load(f)
with open('python/experience_encoder.pkl', 'rb') as f:
    experience_encoder = pickle.load(f)
with open('python/qualification_encoder.pkl', 'rb') as f:
    qualification_encoder = pickle.load(f)

# Qualification Mapping
qualification_mapping = {
    "MBA": ["Master of Business Administration", "Bachelor of Business Administration", "Diploma in Business Management"],
    "MCA": ["Master of Computer Applications", "Bachelor of Computer Applications", "Diploma in Computer Science"],
    "B.Tech": ["Master of Technology", "Bachelor of Technology", "Diploma in Engineering"],
    "PhD": ["Doctor of Philosophy"],
    "M.Tech": ["Master of Technology", "Bachelor of Technology", "Diploma in Engineering"],
    "BCA": ["Master of Computer Applications", "Bachelor of Computer Applications", "Diploma in Computer Science"],
    "BBA": ["Master of Business Administration", "Bachelor of Business Administration", "Diploma in Business Management"],
    "M.Com": ["Master of Commerce", "Bachelor of Commerce", "Diploma in Accounting & Finance"],
    "B.Com": ["Master of Commerce", "Bachelor of Commerce", "Diploma in Business Finance"],
    "BA": ["Master of Arts", "Bachelor of Arts", "Diploma in Humanities"],
    "MSc": ["Master of Science in IT", "Bachelor of Science in IT", "Bachelor of Science in Software Engineering", "Bachelor of Science in Computer Science", "Bachelor of Science in IT"]
}

# Additional Relevant Qualifications per Job Role
job_specific_qualifications = {
    "Software Engineer": ["B.Tech", "M.Tech", "BCA", "MCA", "MSc"],
    "Data Scientist": ["M.Tech", "B.Tech", "MCA", "PhD", "MSc in Data Science", "Diploma in Machine Learning"],
    "HR Manager": ["MBA", "BBA", "Diploma in Human Resource Management", "MSc in Organizational Psychology"],
    "Marketing Manager": ["MBA", "BBA", "BA in Marketing", "Diploma in Digital Marketing", "MSc in Marketing Analytics"],
    "Accountant": ["M.Com", "B.Com", "Diploma in Accounting", "CPA Certification"],
    "Mechanical Engineer": ["B.Tech", "M.Tech", "Diploma in Mechanical Engineering"],
    "Civil Engineer": ["B.Tech", "M.Tech", "Diploma in Civil Engineering"],
    "Doctor": ["MBBS", "MD", "Diploma in Medical Sciences"],
    "Lawyer": ["LLB", "LLM", "Diploma in Legal Studies"],
    "Teacher": ["BA", "MA", "Diploma in Education", "B.Ed"]
}

def predict_job_info(job_titles):
    results = {}

    for job_title in job_titles:
        job_title = job_title.strip()
        try:
            job_encoded = job_encoder.transform([job_title])[0]
        except ValueError:
            results[job_title] = {"Error": "Job title not found in training data. Try a similar title."}
            continue

        # Predict Salary Range
        salary_pred = salary_model.predict(np.array([[job_encoded]], dtype=np.float32))
        if salary_pred.ndim == 1:
            salary_pred = salary_pred.reshape(1, -1)

        # Predict Experience and Qualifications
        experience_pred = experience_model.predict(np.array([[job_encoded]], dtype=np.float32))[0]
        qualifications_pred = qualification_model.predict(np.array([[job_encoded]], dtype=np.float32))[0]

        # Decode predicted values
        experience = experience_encoder.inverse_transform([experience_pred])[0]
        qualifications = qualification_encoder.inverse_transform([qualifications_pred])[0]

        # Get full qualification details
        relevant_qualifications = job_specific_qualifications.get(job_title, [qualifications])
        detailed_qualifications = []
        for q in relevant_qualifications:
            if q in qualification_mapping:
                detailed_qualifications.extend(qualification_mapping[q])
            else:
                detailed_qualifications.append(q)

        results[job_title] = {
            'Salary Range': f"${salary_pred[0][0]:,.0f} - ${salary_pred[0][1]:,.0f}",
            'Experience Required': experience,
            'Qualifications Required': list(set(detailed_qualifications))  # Remove duplicates
        }

    return results

if __name__ == "__main__":
    job_titles_input = sys.argv[1:]  # All arguments passed after the script name
    job_info = predict_job_info(job_titles_input)

    # Print the result as JSON
    print(json.dumps(job_info))