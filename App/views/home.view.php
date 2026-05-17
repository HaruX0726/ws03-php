<?php loadPartial('head'); ?>
<?php loadPartial('navbar'); ?>
<?php loadPartial('showcase-search'); ?>
<?php loadPartial('top-banner'); ?>

<style>
/* Force button text — inline beats Tailwind CDN */
a.btn-details, a.btn-details:hover, a.btn-details:visited,
a.btn-show-all, a.btn-show-all:hover, a.btn-show-all:visited {
    color: #0f172a !important;
    text-decoration: none !important;
    font-weight: 700;
}

/* Reuse same job card styles */
.job-card {
    background: linear-gradient(145deg, #1a2f4e 0%, #162540 100%);
    border: 1px solid rgba(255,255,255,0.07);
    border-radius: 14px;
    padding: 1.25rem;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    transition: transform 0.22s, box-shadow 0.22s, border-color 0.22s;
    box-shadow: 0 4px 18px rgba(0,0,0,0.25);
}
.job-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 32px rgba(0,0,0,0.38);
    border-color: rgba(59,130,246,0.4);
}
.job-card-title { font-size: 1.1rem; font-weight: 700; color: #60a5fa; margin-bottom: 4px; }
.job-card-desc {
    color: #94a3b8; font-size: 0.875rem; line-height: 1.55; margin-bottom: 12px;
    display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;
}
.job-meta { background: rgba(255,255,255,0.04); border-radius: 8px; padding: 0.75rem; margin-bottom: 14px; list-style: none; }
.job-meta li { color: #cbd5e1; font-size: 0.82rem; margin-bottom: 5px; display: flex; align-items: center; gap: 5px; flex-wrap: wrap; }
.job-meta li:last-child { margin-bottom: 0; }
.job-meta strong { color: #e2e8f0; }
.badge-local {
    display: inline-block; background: linear-gradient(135deg, #3b82f6, #2563eb);
    color: #fff; font-size: 0.65rem; font-weight: 700; padding: 2px 8px;
    border-radius: 999px; letter-spacing: 0.4px; text-transform: uppercase;
}
.tag-chip {
    display: inline-block; background: rgba(59,130,246,0.15); color: #93c5fd;
    font-size: 0.72rem; font-weight: 500; padding: 2px 9px; border-radius: 999px;
    border: 1px solid rgba(59,130,246,0.25); margin: 2px 2px 0 0;
}
.btn-details {
    display: flex; align-items: center; justify-content: center; gap: 7px;
    width: 100%; padding: 10px 0;
    background: linear-gradient(135deg, #60a5fa 0%, #3b82f6 100%);
    color: #0f172a; font-weight: 700; font-size: 0.875rem; border-radius: 8px;
    text-decoration: none; box-shadow: 0 3px 10px rgba(59,130,246,0.35);
    transition: filter 0.18s, box-shadow 0.2s, transform 0.18s; letter-spacing: 0.3px;
}
.btn-details:hover { filter: brightness(1.12); box-shadow: 0 6px 18px rgba(59,130,246,0.55); transform: translateY(-2px); }
.btn-details:active { transform: translateY(0); filter: brightness(0.94); }

.section-heading {
    text-align: center;
    font-size: 1.75rem;
    font-weight: 700;
    color: #e2e8f0;
    padding: 12px 24px;
    border-bottom: 2px solid rgba(59,130,246,0.35);
    margin-bottom: 1.5rem;
}
.btn-show-all {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    margin: 1.5rem auto 0;
    padding: 12px 28px;
    background: linear-gradient(135deg, #93c5fd, #60a5fa);
    color: #0f172a;
    font-weight: 700;
    font-size: 0.95rem;
    border-radius: 10px;
    text-decoration: none;
    box-shadow: 0 4px 14px rgba(59,130,246,0.4);
    transition: filter 0.18s, box-shadow 0.2s, transform 0.18s;
}
.btn-show-all:hover { filter: brightness(1.12); box-shadow: 0 8px 22px rgba(59,130,246,0.6); transform: translateY(-2px); }
.btn-show-all:active { transform: translateY(0); }
</style>

<!-- Job Listings -->
<section>
    <div class="container mx-auto p-4 mt-4">
        <div class="section-heading">Recent Jobs</div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-6">
            <?php foreach ($listings as $listing) : ?>
                <div class="job-card">
                    <div>
                        <h2 class="job-card-title"><?= $listing->title ?></h2>
                        <p class="job-card-desc"><?= $listing->description ?></p>
                        <ul class="job-meta">
                            <li>
                                <i class="fa fa-dollar" style="color:#10b981;width:14px;"></i>
                                <strong>Salary:</strong> <?= formatSalary($listing->salary) ?>
                            </li>
                            <li>
                                <i class="fa fa-map-marker" style="color:#f59e0b;width:14px;"></i>
                                <strong>Location:</strong> <?= $listing->city ?>, <?= $listing->state ?>
                                <span class="badge-local">Local</span>
                            </li>
                            <?php if(!empty($listing->tags)): ?>
                            <li>
                                <i class="fa fa-tag" style="color:#a78bfa;width:14px;"></i>
                                <?php foreach(explode(',', $listing->tags) as $tag): ?>
                                    <span class="tag-chip"><?= trim(htmlspecialchars($tag)) ?></span>
                                <?php endforeach ?>
                            </li>
                            <?php endif ?>
                        </ul>
                    </div>
                    <a href="/listings/<?= $listing->id ?>" class="btn-details">
                        <i class="fa fa-arrow-right"></i> View Details
                    </a>
                </div>
            <?php endforeach; ?>
        </div>

        <div style="text-align:center;">
            <a href="/listings" class="btn-show-all">
                <i class="fa fa-th-list"></i> Show All Jobs
            </a>
        </div>
    </div>
</section>

<?php loadPartial('bottom-banner'); ?>
<?php loadPartial('footer'); ?>