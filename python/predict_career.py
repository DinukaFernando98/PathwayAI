# predict_career.py

import sys
import json
from career_path_model import get_career_path

if __name__ == "__main__":

    field = sys.argv[1] if len(sys.argv) > 1 else None
    
    if field:
        career_path = get_career_path(field)
        if career_path:
            print(json.dumps({"career_path": career_path}))
        else:
            print(json.dumps({"error": "Invalid career field provided"}))
    else:
        print(json.dumps({"error": "No career field provided"}))
