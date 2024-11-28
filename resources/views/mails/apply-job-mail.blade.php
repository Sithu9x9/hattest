<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border: 1px solid #dddddd;
        }

        .header {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            text-align: center;
        }

        .content {
            margin: 20px 0;
        }

        .content p {
            line-height: 1.6;
        }

        .footer {
            text-align: center;
            color: #888888;
            font-size: 12px;
            margin-top: 20px;
        }

        .applicant-info {
            margin: 20px 0;
            border-top: 1px solid #dddddd;
            padding-top: 10px;
        }

        .applicant-info p {
            margin: 5px 0;
        }
    </style>
</head>

<body>
    <div class="email-container">
        <div class="header">
            <h2>Job Application For {{ $career->position }}</h2>
        </div>
        <div class="content">
            <p><strong>Candidate's Cover Letter</strong></p>
            <div>
                {!! $mail['cover_letter'] !!}
            </div>
        </div>
        <div class="applicant-info">
            <h3>Applicant Information</h3>
            <p><strong>Email:</strong> {{ $mail['email'] }}</p>
            <p><strong>Datetime:</strong> {{ now() }}</p>
        </div>
        <div class="footer">
            <p>&copy; MTI. All rights reserved.</p>
        </div>
    </div>
</body>

</html>
