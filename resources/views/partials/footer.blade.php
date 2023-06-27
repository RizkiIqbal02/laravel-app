    <div class="footer flex-shrink-0">
    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top px-5 ">
        <p class="col-md-4 mb-0 text-body-secondary">&copy; 2023 Rizki Iqbal Muladi</p>

        <a href="/" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
        <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#love"/></svg>
        </a>

        <ul class="nav col-md-4 justify-content-end">
        <li><a href="/" class="nav-link px-2 {{ ($active==="home") ? 'text-primary' : 'text-secondary' }}"><svg class="bi me-2" width="20" height="20" aria-label="Bootstrap"><use xlink:href="#home"/></svg>Home</a></li>
        <li><a href="/about" class="nav-link px-2 {{ ($active==="about") ? 'text-primary' : 'text-secondary' }}"><svg class="bi me-2" width="20" height="20" aria-label="Bootstrap"><use xlink:href="#about"/></svg>About</a></li>
        <li><a href="/posts" class="nav-link px-2 {{ ($active==="posts") ? 'text-primary' : 'text-secondary' }}"><svg class="bi me-2" width="20" height="20" aria-label="Bootstrap"><use xlink:href="#post"/></svg>Blog</a></li>
        <li><a href="/categories" class="nav-link px-2 {{ ($active==="categories") ? 'text-primary' : 'text-secondary' }}"><svg class="bi me-2" width="20" height="20" aria-label="Bootstrap"><use xlink:href="#grid"/></svg>Categories</a></li>
        </ul>
    </footer>
    </div>
    <script src="../assets/dist/js/bootstrap.bundle.js"></script>

    </body>
</html>
