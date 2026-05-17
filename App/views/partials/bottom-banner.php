<!-- Bottom Banner -->
<style>
/* Force button text — inline beats Tailwind CDN */
a.btn-post-job, a.btn-post-job:hover, a.btn-post-job:visited {
    color: #1e3a8a !important;
    text-decoration: none !important;
}

.hire-banner {
    margin: 2rem auto;
    max-width: 1200px;
    padding: 0 1rem;
}
.hire-banner-inner {
    background: linear-gradient(135deg, #0f2c5c 0%, #1a3f7a 50%, #1e4fa0 100%);
    border: 1px solid rgba(255,255,255,0.08);
    border-radius: 16px;
    padding: 2rem 2.5rem;
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    justify-content: space-between;
    gap: 1.5rem;
    box-shadow: 0 8px 32px rgba(0,0,0,0.3);
    position: relative;
    overflow: hidden;
}
.hire-banner-inner::before {
    content: '';
    position: absolute;
    top: -50%;
    right: -10%;
    width: 300px;
    height: 300px;
    background: radial-gradient(circle, rgba(59,130,246,0.2) 0%, transparent 70%);
    pointer-events: none;
}
.hire-banner-text h2 {
    font-size: 1.6rem;
    font-weight: 800;
    color: #fff;
    margin-bottom: 4px;
}
.hire-banner-text p {
    color: #93c5fd;
    font-size: 0.95rem;
}
.btn-post-job {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 13px 28px;
    background: linear-gradient(135deg, #fff 0%, #e0f2fe 100%);
    color: #1e3a8a;
    font-weight: 700;
    font-size: 0.95rem;
    border-radius: 10px;
    text-decoration: none;
    box-shadow: 0 4px 16px rgba(255,255,255,0.25);
    transition: filter 0.18s, box-shadow 0.2s, transform 0.18s;
    white-space: nowrap;
}
.btn-post-job:hover {
    filter: brightness(1.06);
    box-shadow: 0 8px 28px rgba(255,255,255,0.4);
    transform: translateY(-3px);
}
.btn-post-job:active { transform: translateY(0); }
</style>

<section class="hire-banner">
    <div class="hire-banner-inner">
        <div class="hire-banner-text">
            <h2>Looking to hire?</h2>
            <p>Post your job listing now and find the perfect candidate.</p>
        </div>
        <?php if (\Framework\Session::has('user')) : ?>
        <a href="/listings/create" class="btn-post-job">
            <i class="fa fa-edit"></i> Post a Job
        </a>
        <?php endif; ?>
    </div>
</section>