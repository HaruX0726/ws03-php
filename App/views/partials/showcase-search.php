<!-- Showcase -->
<style>
/* Force button text — inline beats Tailwind CDN */
button.btn-search, button.btn-search:hover {
    color: #ffffff !important;
}

.showcase {
    position: relative;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    min-height: 280px;
    display: flex;
    align-items: center;
}
.showcase .overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(135deg, rgba(10,20,50,0.82) 0%, rgba(15,40,100,0.7) 100%);
}
.showcase-inner {
    position: relative;
    z-index: 10;
    text-align: center;
    width: 100%;
    padding: 0 1.5rem;
}
.showcase-title {
    font-size: 2.5rem;
    font-weight: 800;
    color: #fff;
    margin-bottom: 0.4rem;
    letter-spacing: -0.5px;
    text-shadow: 0 2px 16px rgba(0,0,0,0.5);
}
.showcase-sub {
    color: #bfdbfe;
    font-size: 1rem;
    margin-bottom: 1.75rem;
    font-weight: 400;
}
.search-form {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 10px;
    max-width: 640px;
    margin: 0 auto;
}
.search-input {
    flex: 1;
    min-width: 160px;
    padding: 12px 18px;
    border-radius: 10px;
    border: 1px solid rgba(255,255,255,0.2);
    background: rgba(255,255,255,0.12);
    backdrop-filter: blur(8px);
    color: #fff;
    font-size: 0.9rem;
    outline: none;
    transition: border-color 0.2s, background 0.2s;
}
.search-input::placeholder { color: rgba(255,255,255,0.55); }
.search-input:focus {
    border-color: rgba(96,165,250,0.7);
    background: rgba(255,255,255,0.18);
}
.btn-search {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 12px 28px;
    background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
    color: #fff;
    font-weight: 700;
    font-size: 0.9rem;
    border: none;
    border-radius: 10px;
    cursor: pointer;
    box-shadow: 0 4px 16px rgba(59,130,246,0.5);
    transition: filter 0.18s, box-shadow 0.2s, transform 0.18s;
    letter-spacing: 0.3px;
}
.btn-search:hover {
    filter: brightness(1.12);
    box-shadow: 0 8px 24px rgba(59,130,246,0.7);
    transform: translateY(-2px);
}
.btn-search:active { transform: translateY(0); filter: brightness(0.95); }
</style>

<section class="showcase">
    <div class="overlay"></div>
    <div class="showcase-inner">
        <h2 class="showcase-title">Find Your Dream Job</h2>
        <p class="showcase-sub">Search thousands of opportunities across the country</p>
        <form method="GET" action="/listings/search" class="search-form">
            <input type="text" name="keywords" placeholder="🔍 Keywords, title, company..."
                value="<?= htmlspecialchars($_GET['keywords'] ?? '') ?>"
                class="search-input" />
            <input type="text" name="location" placeholder="📍 City or state"
                value="<?= htmlspecialchars($_GET['location'] ?? '') ?>"
                class="search-input" />
            <button type="submit" class="btn-search">
                <i class="fa fa-search"></i> Search
            </button>
        </form>
    </div>
</section>
