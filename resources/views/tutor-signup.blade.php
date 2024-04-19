<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="theme-color" content="#42b979" />
    <link rel="shortcut icon" href="favicon.png" type="image/png" />
    <title>Sign-up as Tutor</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="./css/style.css">
    <style>
        main {
            background: url(./images/bg_image_1.png), #000000a0;
            background-blend-mode: screen;
        }

    </style>
</head>

<body>
<main class="container-fluid m-0 bg-body-secondary p-0">
    <header class="text-center bg-light m-0 p-2 d-flex align-items-end justify-content-center">
        <!-- <a class="nav-link active  px-3" aria-current="page" href="./hire_tutor.html"><i> &#8592; Hire Tutor</i></a> -->
        <a class="mx-auto" href="{{route('home')}}"><img src="{{asset('images/logo.png')}}" alt="EDEXCEL-logo" height="50px"></a>

    </header>
    <div class="d-flex justify-content-center">
        <form class="bg-light rounded shadow p-3">
            <div class="form-row d-flex flex-column flex-md-row">
                <div class="col-md-6 px-2 mb-2">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" required />
                </div>
                <div class="col-md-6 px-2 mb-2">
                    <label for="name" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" required />

                </div>
            </div>
            <div class="form-row d-flex flex-column flex-md-row">
                <div class="col-md-6 px-2 mb-2">
                    <label for="name" class="form-label">Set passward</label>
                    <input type="password" class="form-control" id="passward" required />
                </div>
                <div class="col-md-6 px-2 mb-2">
                    <label for="name" class="form-label">Confirm passward</label>
                    <input type="password" class="form-control" id="passward" required />

                </div>
            </div>

            <div class="form-row d-flex flex-column flex-md-row">
                <div class="col-md-6 px-2 mb-2">
                    <label for="gender" class="form-label">Gender</label>
                    <select class="form-select" id="gender" required>
                        <option selected>Select Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                <div class="col-md-6 px-2 mb-2">
                    <label for="age" class="form-label">Age</label>
                    <input type="number" min="18" class="form-control" id="age" required />
                </div>
            </div>

            <div class="form-row d-flex flex-column flex-md-row">
                <div class="col-md-6 px-2 mb-2">
                    <label for="qualification" class="form-label">Qualification</label>
                    <input type="text" class="form-control" id="qualification" required />
                </div>
                <div class="col-md-6 px-2 mb-2">
                    <label for="teaching" class="form-label">Teachs</label>
                    <select class="form-select" id="teaching" required>
                        <option selected>Select Teaching</option>
                        <option>English</option>
                        <option>Mathematics</option>
                        <option>Physics</option>
                        <option>Chemistry</option>
                    </select>
                </div>
            </div>

            <div class="form-row d-flex flex-column flex-md-row">
                <div class="col-md-6 px-2 mb-2">
                    <label for="experience" class="form-label">Experience (in years)</label>
                    <input type="number" min="0" class="form-control" id="experience" required />
                </div>
                <div class="col-md-6 px-2 mb-2">
                    <label for="location" class="form-label">Location</label>
                    <input type="text" class="form-control" id="location" required />
                </div>
            </div>

            <div class="form-row d-flex flex-column flex-md-row">
                <div class="col-md-6 px-2 mb-2">
                    <label for="mobile" class="form-label">Mobile Number</label>
                    <input type="number" class="form-control" id="mobile" required />
                </div>
                <div class="col-md-6 px-2 mb-2">
                    <label for="whatsapp" class="form-label">WhatsApp Number</label>
                    <input type="number" class="form-control" id="whatsapp" required />
                </div>
            </div>

            <div class="form-row d-flex flex-column flex-md-row">
                <div class="col-md-6 px-2 mb-2">
                    <label for="profilePicture" class="form-label">Profile Picture</label>
                    <input type="file" class="form-control" id="profilePicture" required />


                </div>
                <div class="col-md-6 px-2 mb-2">
                    <label for="teaching" class="form-label">Available Time</label>
                    <select class="form-select" id="teaching" required>
                        <option selected>Select Time</option>
                        <option>9:00 to 10:00</option>
                        <option>10:00 to 11:00</option>
                    </select>
                </div>
            </div>
            <div class="col-12 px-2 py-2"><label for="curriculum" class="form-label">Curriculum</label>
                <textarea class="form-control" id="curriculum" rows="2" required></textarea></div>

            <div class="col d-flex justify-content-center py-3">
                <button type="submit" class="btn bg_theme_green text-light fw-bold">Submit Form</button>
            </div>

        </form>
    </div>
    @include('layouts.footer')
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
