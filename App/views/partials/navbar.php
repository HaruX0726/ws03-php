<?php
    $isLoggedIn = \Framework\Session::has('user');
    $userName = $isLoggedIn ? \Framework\Session::get('user')['name'] : '';
    $initials = $isLoggedIn ? strtoupper(substr($userName, 0, 1)) : '';
?>

<!-- Nav -->
<header class="navbar-header text-white p-4">
    <div class="container mx-auto flex justify-between items-center">
        <h1 class="text-3xl font-semibold tracking-tight">
            <a href="/" class="navbar-brand">JobSeek</a>
        </h1>
        <nav class="flex items-center gap-4">
            <?php if ($isLoggedIn): ?>
                <div class="welcome-wrapper flex items-center gap-2">
                    <div class="avatar-bubble" title="<?= htmlspecialchars($userName) ?>">
                        <?= $initials ?>
                    </div>
                    <span class="welcome-text">Welcome, <span id="typed-name" data-name="<?= htmlspecialchars($userName) ?>"></span><span class="typing-cursor">|</span></span>
                </div>

                <form method="POST" action="/auth/logout" class="contents">
                    <button type="submit" class="logout-btn">
                        <i class="fa fa-sign-out"></i> Logout
                    </button>
                </form>
            <?php else: ?>
                <a href="/auth/login" class="nav-link">
                    <i class="fa fa-sign-in"></i> Login
                </a>
                <a href="/auth/register" class="nav-link">
                    <i class="fa fa-user-plus"></i> Register
                </a>
            <?php endif; ?>

            <a href="/listings/create" class="post-job-btn">
                <i class="fa fa-edit"></i> Post a Job
            </a>
        </nav>
    </div>
</header>

<style>
.navbar-header {
    background: linear-gradient(135deg, #0f2c5c 0%, #1a3f7a 60%, #1e4fa0 100%);
    box-shadow: 0 2px 12px rgba(0,0,0,0.3);
    position: sticky;
    top: 0;
    z-index: 100;
}
.navbar-brand {
    background: linear-gradient(90deg, #fff 30%, #93c5fd);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    letter-spacing: -0.5px;
    transition: opacity 0.2s;
}
.navbar-brand:hover { opacity: 0.85; }

.avatar-bubble {
    width: 34px;
    height: 34px;
    border-radius: 50%;
    background: linear-gradient(135deg, #3b82f6, #60a5fa);
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
    font-size: 14px;
    color: #fff;
    box-shadow: 0 0 0 2px rgba(255,255,255,0.3);
    flex-shrink: 0;
}
.welcome-text {
    font-size: 0.95rem;
    color: #bfdbfe;
    font-weight: 500;
    white-space: nowrap;
}
#typed-name {
    color: #fff;
    font-weight: 700;
}
.typing-cursor {
    display: inline-block;
    color: #60a5fd;
    font-weight: 300;
    animation: blink 0.75s step-end infinite;
}
@keyframes blink { 50% { opacity: 0; } }

.nav-link {
    color: #bfdbfe;
    font-size: 0.9rem;
    font-weight: 500;
    padding: 6px 10px;
    border-radius: 6px;
    transition: background 0.2s, color 0.2s;
    text-decoration: none;
}
.nav-link:hover {
    background: rgba(255,255,255,0.12);
    color: #fff;
}
.logout-btn {
    color: #fca5a5;
    background: transparent;
    border: 1px solid rgba(252,165,165,0.35);
    border-radius: 6px;
    padding: 5px 12px;
    font-size: 0.875rem;
    font-weight: 500;
    cursor: pointer;
    transition: background 0.2s, color 0.2s, border-color 0.2s;
}
.logout-btn:hover {
    background: rgba(239,68,68,0.18);
    color: #fff;
    border-color: #f87171;
}
.post-job-btn {
    background: linear-gradient(135deg, #3b82f6, #2563eb);
    color: #fff;
    padding: 8px 18px;
    border-radius: 8px;
    font-weight: 600;
    font-size: 0.9rem;
    text-decoration: none;
    box-shadow: 0 0 12px rgba(59,130,246,0.5);
    transition: box-shadow 0.25s, transform 0.2s, background 0.25s;
    display: inline-flex;
    align-items: center;
    gap: 6px;
}
.post-job-btn:hover {
    background: linear-gradient(135deg, #2563eb, #1d4ed8);
    box-shadow: 0 0 20px rgba(59,130,246,0.75);
    transform: translateY(-1px);
}
</style>

<script>
(function(){
    const el = document.getElementById('typed-name');
    const cursor = document.querySelector('.typing-cursor');
    if (!el) return;
    const name = el.dataset.name || '';
    let i = 0;
    function type() {
        if (i <= name.length) {
            el.textContent = name.slice(0, i);
            i++;
            setTimeout(type, 65);
        } else {
            // hide cursor after done
            setTimeout(() => { if(cursor) cursor.style.display = 'none'; }, 800);
        }
    }
    type();
})();
</script>