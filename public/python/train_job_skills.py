import pandas as pd
import numpy as np
from sklearn.model_selection import train_test_split
from sklearn.preprocessing import LabelEncoder
from sklearn.ensemble import RandomForestClassifier, RandomForestRegressor
import pickle

# Load the dataset
df = pd.read_csv('python/job_skills_dataset.csv')

# Select only relevant columns and drop rows with missing values
df = df[['Job Title', 'Experience', 'Salary Range', 'Qualifications']].dropna()

# Encode categorical variables
experience_encoder = LabelEncoder()
qualification_encoder = LabelEncoder()
job_encoder = LabelEncoder()

df['Experience Encoded'] = experience_encoder.fit_transform(df['Experience'])
df['Qualifications Encoded'] = qualification_encoder.fit_transform(df['Qualifications'])
df['Job Title Encoded'] = job_encoder.fit_transform(df['Job Title'])

# Convert Salary Range to numerical values
def extract_salary_range(salary):
    salary = salary.replace('$', '').replace('K', '').strip()  # Remove '$' and 'K'
    if '-' in salary:
        low, high = salary.split('-')
        return int(low) * 1000, int(high) * 1000
    elif '+' in salary:
        return int(salary.replace('+', '').strip()) * 1000, np.nan  # Handle "$50K+"
    else:
        return int(salary) * 1000, int(salary) * 1000  # If single value like "$50K"

df[['Salary Low', 'Salary High']] = df['Salary Range'].apply(lambda x: pd.Series(extract_salary_range(x)))

# Drop rows with missing or inconsistent values
df = df.dropna(subset=['Salary Low', 'Salary High', 'Experience Encoded', 'Qualifications Encoded'])

# Define Features (X) and Targets (y)
X = df[['Job Title Encoded']]
y_salary = df[['Salary Low', 'Salary High']]
y_experience = df['Experience Encoded']
y_qualifications = df['Qualifications Encoded']

# Ensure consistent lengths
valid_indices = X.index.intersection(y_salary.index).intersection(y_experience.index).intersection(y_qualifications.index)
X = X.loc[valid_indices]
y_salary = y_salary.loc[valid_indices]
y_experience = y_experience.loc[valid_indices]
y_qualifications = y_qualifications.loc[valid_indices]

# Train-test split
X_train, X_test, y_train_salary, y_test_salary = train_test_split(X, y_salary, test_size=0.2, random_state=42)
_, _, y_train_experience, y_test_experience = train_test_split(X, y_experience, test_size=0.2, random_state=42)
_, _, y_train_qualifications, y_test_qualifications = train_test_split(X, y_qualifications, test_size=0.2, random_state=42)

# Train a RandomForestRegressor for Salary
salary_model = RandomForestRegressor(n_estimators=100, random_state=42)
salary_model.fit(X_train, y_train_salary)

# Train a RandomForestClassifier for Experience
experience_model = RandomForestClassifier(n_estimators=100, random_state=42)
experience_model.fit(X_train, y_train_experience)

# Train a RandomForestClassifier for Qualifications
qualification_model = RandomForestClassifier(n_estimators=100, random_state=42)
qualification_model.fit(X_train, y_train_qualifications)

# Save models
with open('python/salary_model.pkl', 'wb') as f:
    pickle.dump(salary_model, f)
with open('python/experience_model.pkl', 'wb') as f:
    pickle.dump(experience_model, f)
with open('python/qualification_model.pkl', 'wb') as f:
    pickle.dump(qualification_model, f)

# Save encoders
with open('python/job_encoder.pkl', 'wb') as f:
    pickle.dump(job_encoder, f)
with open('python/experience_encoder.pkl', 'wb') as f:
    pickle.dump(experience_encoder, f)
with open('python/qualification_encoder.pkl', 'wb') as f:
    pickle.dump(qualification_encoder, f)

print("Training complete! Models saved successfully.")
