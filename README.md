How to install Clinic-Appointment
1.composer install
2.php artisan migrate (you can use my sql_dummy for the database)
3.php artisan serve

How To Use Clinic-Appointment using postman
Authorization using JWT

    Click tab authorization on postman
    Choose Type "Bearer Token" on the left
    Insert token on the right

User API
Register User

    URL: http://localhost:8000/api/register
    Method: POST
    Request Body:

{
"name": "admazra",
"email": "azrsssa@gmail.com",
"password": "1234567"
}

Login User

    URL: http://localhost:8000/api/login
    Method: POST
    Request Body:

{
"email": "test@gmail.com",
"password": "rahasia"
}

Get all User

Need Authorization

    URL: http://localhost:8000/api/user
    Method: GET
    Request Body:

"user",
[
{
"id": 1,
"name": "azra",
"email": "azra@gmail.com",
"created_at": "2024-05-27T17:55:48.000000Z",
"updated_at": "2024-05-27T17:55:48.000000Z"
}
]

Remove User

Need Authorization

    URL: http://localhost:8000/api/user/:id
    Method: DELETE
    Request Body:

{
"message": "User has been removed"
}

Doctor API
Get All doctors

Need Authorization

    URL: http://localhost:8000/api/doctor
    Method: GET
    Request Body:

[
{
"id": 1,
"name": "SOLEH",
"specialization": "Dentist"
}
]

Add new Doctor

Need Authorization

    URL: http://localhost:8000/api/doctor
    Method: POST
    Request Body:

{
"name": "SOLEH",
"specialization": "Dentist"
}

Get detail Doctor

Need Authorization

    URL: http://localhost:8000/api/doctor/:id
    Method: GET
    Request Body:

{
"id": 1,
"name": "SOLEH",
"specialization": "Dentist"
"created_at": "2024-200-20"
}

Update Doctor

Need Authorization

    URL: http://localhost:8000/api/doctor/:id
    Method: PUT
    Request Body:

{
"name": "Satrio",
"specialization": "Ortopedi"
}

Remove Doctor

Need Authorization

    URL: http://localhost:8000/api/doctor/:id
    Method: DELETE
    Request Body:

{
message: "Doctor has been removed"
}

Treatment API
Get all Treatments

Need Authorization

    URL: http://localhost:8000/api/treatment
    Method: GET
    Request Body:

[
{
"id": 1,
"name": "Ortopedi222",
"description": "Diagnosis, pengobatan, pencegahan, dan rehabilitasi dari gangguan dan cedera pada sistem saraf, ulang, sendi, otot, ligamen, dan tendon."
}

]

Create new Treatment

Need Authorization

    URL: http://localhost:8000/api/treatment
    Method: POST
    Request Body:

{
"name": "Ortopedi222",
"description": "Diagnosis, pengobatan, pencegahan, dan rehabilitasi dari gangguan dan cedera pada sistem saraf, ulang, sendi, otot, ligamen, dan tendon."
}

Get detail Treatment

Need Authorization

    URL: http://localhost:8000/api/treatment/:id
    Method: GET
    Request Body:

{
"id": 1,
"name": "Ortopedi222",
"description": "Diagnosis, pengobatan, pencegahan, dan rehabilitasi dari gangguan dan cedera pada sistem saraf, ulang, sendi, otot, ligamen, dan tendon."
}

Update Treatment

Need Authorization

    URL: http://localhost:8000/api/treatment/:id
    Method: PUT
    Request Body:

{
"name": "Ortopedi222",
"description": "Diagnosis, pengobatan, pencegahan, dan rehabilitasi dari gangguan dan cedera pada sistem saraf, ulang, sendi, otot, ligamen, dan tendon."
}

Delete Treatment

Need Authorization

    URL: http://localhost:4000/api/v1/party/:id
    Method: DELETE
    Request Body:

{
message: "Treatment has been removed"
}

Appointment API
Get all Appointment

Need Authorization

    URL: http://localhost:8000/api/appointment
    Method: GET
    Request Body:

[
{
"id": 6,
"user_id": 4,
"doctor_id": 2,
"treatment_id": 1,
"date": "2024-01-24",
"created_at": "2024-05-28T00:05:04.000000Z",
"updated_at": "2024-05-28T00:05:04.000000Z",
"user": {
"id": 4,
"name": "test",
"email": "test@gmail.com",
"created_at": "2024-05-27T22:16:33.000000Z",
"updated_at": "2024-05-27T22:16:33.000000Z"
},
"doctor": {
"id": 2,
"name": "Jhonny2",
"specialization": "Ortopedi",
"created_at": "2024-05-27T18:07:02.000000Z",
"updated_at": "2024-05-27T18:07:02.000000Z"
},
"treatment": {
"id": 1,
"name": "Ortopedi222",
"description": "Diagnosis, pengobatan, pencegahan, dan rehabilitasi dari gangguan dan cedera pada sistem saraf, ulang, sendi, otot, ligamen, dan tendon.",
"created_at": "2024-05-27T17:56:00.000000Z",
"updated_at": "2024-05-27T17:56:00.000000Z"
}
}
]

Make new Appointment

Need Authorization

    URL: http://localhost:8000/api/appointment
    Method: POST
    Request Body:

{
"doctor_id": 2,
"treatment_id": 1,
"date": "2024-01-24"
}

Get detail Appointment

Need Authorization

    URL: http://localhost:8000/api/appointment/:id
    Method: GET
    Request Body:

{
"id": 1,
"doctor_id": 2,
"treatment_id": 1,
"date": "2024-01-24"
}

Get detail Appointment by user Login

Need Authorization

    URL: http://localhost:8000/api/appointment
    Method: GET
    Request Body:

{
"id": 1,
"doctor_id": 2,
"treatment_id": 1,
"date": "2024-01-24"
}

Update Appointment

Need Authorization

    URL: http://localhost:8000/api/appointment/:id
    Method: PUT
    Request Body:

{
"doctor_id": 2,
"treatment_id": 1,
"date": "2024-01-24"
}

Cancel Appointment

Need Authorization

    URL: http://localhost:8000/api/appointment/:id
    Method: DELETE
    Request Body:

{
message: "Appointment has been removed"
}
