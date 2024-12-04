<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/your-fontawesome-kit.js" crossorigin="anonymous"></script>

</head>

<body>
    <div class="dashboard">
        <aside class="sidebar">
            <div class="sidebar-header">
            </div>
            <nav class="sidebar-nav">
                <div id="img"><img src="https://www.absglobaltravel.com/public/images/footer-abs-logo.webp" height="50">
                </div>
                <ul>
                    <li><a href="/dashboard" class="active"><i class="fa fa-home"></i>Home</a>
                    </li>
                    <li><a href="/profile"><i class="fas fa-user"></i>Profile</a></li>
                    <li>
                        <button class="dropdown-btn"><i class="fas fa-blog"></i>Blogs
                            <i class="fa fa-caret-down"></i>
                        </button>
                        <div class="dropdown-container">
                            <a href=""><i class="fas fa-blog"></i> Blog List</a>
                            <a href=""><i class="fa fa-list"></i> Category</a>
                        </div>
                    </li>
                    <li>
                        <button class="dropdown-btn"><i class="fas fa-newspaper"></i>News
                            <i class="fa fa-caret-down"></i>
                        </button>
                        <div class="dropdown-container">
                            <a href=""><i class="fas fa-newspaper"></i> News List</a>
                            <a href=""><i class="fa fa-list"></i> Category</a>
                        </div>
                    </li>

                    <li><a href=""><i class="fa fa-copy"></i> Pages</a></li>
                    <li><a href="/users"><i class="fas fa-users"></i> Users</a></li>
                    <li><a href=""><i class="far fa-address-book"></i> Company Profile</a></li>


                </ul>
            </nav>
        </aside>

        <script>
        var dropdown = document.getElementsByClassName("dropdown-btn");
        var i;

        for (i = 0; i < dropdown.length; i++) {
            dropdown[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var dropdownContent = this.nextElementSibling;
                if (dropdownContent.style.display === "block") {
                    dropdownContent.style.display = "none";
                } else {
                    dropdownContent.style.display = "block";
                }
            });
        }
        </script>