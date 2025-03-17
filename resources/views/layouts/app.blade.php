<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <style>
        .header {
            position: fixed;
            top: 0;
            left: 250px;
            width: calc(100% - 250px);
            background: #6a6b5f;
            color: white;
            padding: 15px;
            text-align: center;
            z-index: 1000;
        }

        .sidebar {
            width: 250px;
            background: #3a6b6c;
            height: 100vh;
            position: fixed;
            color: white;
            top: 0;
            left: 0;
            overflow-y: auto;
            padding: 15px;
            transition: 0.3s;
        }
        .content {
            margin-left: 250px;
            padding: 20px;
            padding-top: 80px;
        }

        footer {
            position: relative;
            bottom: 0;
            left: 250px;
            width: calc(100% - 250px);
            background: #343a40;
            color: white;
            padding: 10px;
            transition: all 0.3s ease-in-out;
        }

        .nav-links {
            list-style: none;
            padding: 0;
            margin-top: 15px;
        }
        .nav-links li {
            width: 100%;
            position: relative;
        }
        .nav-links li a {
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: white;
            text-decoration: none;
            padding: 12px 15px;
            font-size: 16px;
            transition: background 0.3s;
            border-radius: 5px;
        }
        .nav-links li a:hover {
            background: #5c7a7a;
        }

        .submenu {
            list-style: none;
            padding: 0;
            margin: 0;
            padding-left: 20px;
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease-out;
        }
        .submenu li a {
            padding: 8px 15px;
            font-size: 14px;
            display: block;
            color: #f1f1f1;
            transition: background 0.3s;
        }
        .submenu li a:hover {
            background: #5c8f8f;
        }

        .arrow {
            transition: transform 0.3s ease;
        }

        .has-submenu.open .submenu {
            max-height: 200px;
        }
        .has-submenu.open .arrow {
            transform: rotate(90deg);
        }
        .breadcrumb-item a {
            text-decoration: none;
        }

        a:hover {
            color: red;
        }

        
    </style>
</head>
<body style="background:#e0e7e3;">

    <header class="header">
        <h5>My Website Header</h5>
    </header>

    <aside class="sidebar">
        <div class="navbar-header">
            <h2 class="brand-text mb-0">Kalyanamalai</h2>
        </div>

        <ul class="nav-links">
            <li><a href="#">🏠 Dashboard</a></li>

            <li class="has-submenu">
                <a href="#" class="submenu-toggle">📂 Master <span class="arrow">▶</span></a>
                <ul class="submenu">
                    <li><a href="{{ route('Employee-List') }}">🔹 Employee</a></li>
                    <li><a href="{{route('Month-Master-List') }}">🔹 Salary Month</a></li>
                </ul>
                
            </li>
            

            <li class="has-submenu">
                <a href="#" class="submenu-toggle">👥 Task Management <span class="arrow">▶</span></a>
                <ul class="submenu">
                    <li><a href="{{route('Employee-task') }}">🔹 Employee Task Assign</a></li>
                </ul>
            </li>
            <li class="has-submenu">
                <a href="#" class="submenu-toggle"> 💳 Selary<span class="arrow">▶</span></a>
                <ul class="submenu">
                    <li><a href="{{route('Salary-Genarate') }}">🔹 Selary Genarate</a></li>
                </ul>
            </li>
            <li><a href="#">🔓 Logout</a></li>
        </ul>
    </aside>

    <main class="content">
        @if($message=Session::get('success'))
            <div class='alert alert-success alert-dismissible fade show'>
                <strong>{{$message}}</strong>
                <button type="button" class='btn-close' data-bs-dismiss='alert' area-lable="Close"></button>
            </div>
        @endif
        @if($message=Session::get('error'))
            <div class='alert alert-success alert-dismissible fade show'>
                <strong>{{$message}}</strong>
                <button type="button" class='btn-close' data-bs-dismiss='alert' area-lable="Close"></button>
            </div>
        @endif
        @yield('main')
    </main>

    <footer>
        <p>&copy; <script>document.write(new Date().getFullYear());</script> My Website</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        document.querySelectorAll(".submenu-toggle").forEach(item => {
            item.addEventListener("click", function (e) {
                e.preventDefault();
                let parent = this.parentElement;
                let submenu = this.nextElementSibling;

                document.querySelectorAll(".has-submenu").forEach(sub => {
                    if (sub !== parent) {
                        sub.classList.remove("open");
                        sub.querySelector(".submenu").style.maxHeight = "0px";
                    }
                });
                if (parent.classList.contains("open")) {
                    parent.classList.remove("open");
                    submenu.style.maxHeight = "0px";
                } else {
                    parent.classList.add("open");
                    submenu.style.maxHeight = submenu.scrollHeight + "px";
                }
            });
        });

        function adjustFooter() {
            let footer = document.querySelector("footer");
            let bodyHeight = document.body.scrollHeight;
            let windowHeight = window.innerHeight;
            footer.style.position = bodyHeight > windowHeight ? "relative" : "fixed";
        }

        window.onload = adjustFooter;
        window.onresize = adjustFooter;
    </script>

</body>
</html>
