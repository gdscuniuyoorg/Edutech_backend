## GDSC-Uniuyo Free Online Learning Platform

This project aims to develop a free, ad-supported online learning platform that empowers individuals to pursue personal and professional growth through accessible education. Educators can also benefit by generating income through ad revenue, fostering knowledge sharing, and reaching a wider audience.

### Technologies

* Backend: Python Django

### Features (Planned)

* User Management: Account creation, login, profile management.
* Course Discovery: Browse and search for courses by subject or keyword.
* Course Enrollment: Free enrollment with optional paid features (future).
* Content Delivery: Access various learning materials (videos, text lectures, quizzes). 
* Basic Progress Tracking (Optional): Track course completion and revisit content.
* Ad Integration (Optional): Display targeted ads for revenue generation.
* Community Features (Optional): Facilitate learner interaction and discussion forums (future).

**Note:** This is a starting point, and features may be added or modified based on development progress and feedback.

### Installation

This project requires Python 3.x and pip (the Python package installer) to be installed on your system. You can get them from [https://www.python.org/downloads/](https://www.python.org/downloads/).

1. Clone this repository:

```bash
git clone https://github.com/your-username/gdsc-uol-learning-platform.git
```

2. Navigate to the project directory:

```bash
cd gdsc-uol-learning-platform
```

3. Create a virtual environment (recommended):

```bash
python -m venv venv
source venv/bin/activate  # For Linux/macOS
venv\Scripts\activate.bat  # For Windows
```

4. Install the required dependencies:

```bash
pip install -r requirements.txt
```

5. (Optional) Create a database and configure database settings in `mysite/settings.py`.

6. Run database migrations:

```bash
python manage.py makemigrations
python manage.py migrate
```

7. Run the development server:

```bash
python manage.py runserver
```

This will start the development server at http://127.0.0.1:8000/ by default.

### Contributing

We welcome contributions to this project! Please see the CONTRIBUTING.md file for guidelines on how to contribute.

### License

This project is licensed under the MIT License - see the LICENSE.md file for details.

**Note:** This is a basic README.md file. As development progresses, you can add more details about specific functionalities, API documentation (if applicable), deployment instructions, and testing procedures. 