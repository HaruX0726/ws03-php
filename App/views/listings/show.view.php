<?php loadPartial('head'); ?>
<?php loadPartial('navbar'); ?>
<?php loadPartial('top-banner'); ?>

<style>
/* Force button text — inline beats Tailwind CDN */
a.btn-edit, a.btn-edit:hover, a.btn-edit:visited,
button.btn-delete, button.btn-delete:hover,
a.btn-apply, a.btn-apply:hover, a.btn-apply:visited {
    color: #ffffff !important;
    text-decoration: none !important;
}

/* ── Action Bar ─────────────────────────────── */
.action-bar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 1.25rem;
}
.btn-back {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    color: #60a5fa;
    font-weight: 500;
    font-size: 0.9rem;
    text-decoration: none;
    padding: 9px 14px;
    border-radius: 8px;
    border: 1px solid rgba(96,165,250,0.3);
    transition: background 0.18s, color 0.18s, border-color 0.18s, transform 0.15s;
}
.btn-back:hover {
    background: rgba(59,130,246,0.12);
    color: #93c5fd;
    border-color: rgba(96,165,250,0.6);
    transform: translateX(-3px);
}

/* ── Shared button base ─────────────────────── */
.action-btns {
    display: flex;
    gap: 10px;
    align-items: stretch;
}
.btn-edit,
.btn-delete {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 7px;
    padding: 0 22px;
    height: 40px;           /* fixed equal height */
    font-weight: 600;
    font-size: 0.875rem;
    border-radius: 8px;
    border: none;
    cursor: pointer;
    text-decoration: none;
    line-height: 1;
    transition: transform 0.18s, box-shadow 0.2s, filter 0.18s;
}
.btn-edit {
    background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
    color: #fff;
    box-shadow: 0 3px 10px rgba(59,130,246,0.45);
}
.btn-edit:hover {
    filter: brightness(1.12);
    box-shadow: 0 6px 18px rgba(59,130,246,0.65);
    transform: translateY(-2px);
}
.btn-delete {
    background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
    color: #fff;
    box-shadow: 0 3px 10px rgba(239,68,68,0.45);
}
.btn-delete:hover {
    filter: brightness(1.1);
    box-shadow: 0 6px 18px rgba(239,68,68,0.65);
    transform: translateY(-2px);
}
.btn-edit:active, .btn-delete:active { transform: translateY(0); filter: brightness(0.95); }

/* ── Apply Now button ───────────────────────── */
.btn-apply {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    margin-top: 1rem;
    padding: 15px 28px;
    background: linear-gradient(135deg, #10b981 0%, #059669 100%);
    color: #fff;
    font-weight: 700;
    font-size: 1rem;
    border-radius: 10px;
    text-decoration: none;
    box-shadow: 0 4px 16px rgba(16,185,129,0.45);
    transition: transform 0.18s, box-shadow 0.2s, filter 0.18s;
    letter-spacing: 0.4px;
}
.btn-apply:hover {
    filter: brightness(1.1);
    box-shadow: 0 8px 24px rgba(16,185,129,0.65);
    transform: translateY(-3px);
}
.btn-apply:active { transform: translateY(0); filter: brightness(0.95); }

/* ── Cards ──────────────────────────────────── */
.detail-card {
    background: #1e3a5f;
    border: 1px solid rgba(255,255,255,0.08);
    border-radius: 12px;
    padding: 1.5rem;
    margin-bottom: 1.25rem;
    box-shadow: 0 4px 20px rgba(0,0,0,0.2);
}
.detail-card h2 { color: #e2e8f0; font-size: 1.5rem; font-weight: 700; margin-bottom: 0.5rem; }
.detail-card p  { color: #94a3b8; font-size: 1rem; }
.detail-card h3 { color: #e2e8f0; font-size: 1.15rem; font-weight: 700; margin-bottom: 1rem; }
.detail-card h4 { color: #60a5fa; font-weight: 600; margin-bottom: 0.4rem; font-size: 0.95rem; }

.meta-list {
    background: rgba(255,255,255,0.05);
    border-radius: 8px;
    padding: 1rem;
    margin: 1rem 0;
    list-style: none;
}
.meta-list li { color: #cbd5e1; margin-bottom: 6px; font-size: 0.9rem; }
.meta-list li strong { color: #e2e8f0; }
.badge-local {
    display: inline-block;
    background: linear-gradient(135deg, #3b82f6, #2563eb);
    color: #fff;
    font-size: 0.7rem;
    font-weight: 600;
    padding: 2px 10px;
    border-radius: 999px;
    margin-left: 6px;
    vertical-align: middle;
}
</style>

<section>
    <div class="container mx-auto p-4 mt-4">
        <?php loadPartial('message'); ?>

        <!-- Action Bar -->
        <div class="action-bar">
            <a href="/listings" class="btn-back">
                <i class="fa fa-arrow-left"></i> Back To Listings
            </a>

            <?php if(\Framework\Authorization::isOwner($listing->user_id)): ?>
            <div class="action-btns">
                <a href="/listings/edit/<?= $listing->id ?>" class="btn-edit">
                    <i class="fa fa-pencil"></i> Edit
                </a>
                <form method="POST" action="/listings/<?= $listing->id ?>" style="display:contents;">
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="btn-delete">
                        <i class="fa fa-trash"></i> Delete
                    </button>
                </form>
            </div>
            <?php endif; ?>
        </div>

        <!-- Job Overview -->
        <div class="detail-card">
            <h2><?= $listing->title ?></h2>
            <p><?= $listing->description ?></p>
            <ul class="meta-list">
                <li><strong>Salary:</strong> <?= formatSalary($listing->salary) ?></li>
                <li>
                    <strong>Location:</strong> <?= $listing->city ?>, <?= $listing->state ?>
                    <span class="badge-local">Local</span>
                </li>
                <?php if(!empty($listing->tags)): ?>
                <li><strong>Tags:</strong> <?= $listing->tags ?></li>
                <?php endif ?>
            </ul>
        </div>

        <!-- Job Details -->
        <div class="detail-card">
            <h3>Job Details</h3>
            <h4><i class="fa fa-check-circle"></i> Requirements</h4>
            <p class="mb-4"><?= $listing->requirements ?></p>
            <h4><i class="fa fa-gift"></i> Benefits</h4>
            <p><?= $listing->benefits ?></p>
        </div>

        <!-- Apply -->
        <div class="detail-card">
            <p style="color:#94a3b8; font-size:0.9rem;">Put <strong style="color:#e2e8f0;">"Job Application"</strong> as the subject of your email and attach your resume.</p>
            <a href="mailto:<?= $listing->email ?>" class="btn-apply">
                <i class="fa fa-paper-plane"></i> Apply Now
            </a>
        </div>
    </div>
</section>

<?php loadPartial('bottom-banner'); ?>
<?php loadPartial('footer'); ?>


<style>
.btn-edit {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 8px 20px;
    background: linear-gradient(135deg, #3b82f6, #2563eb);
    color: #fff;
    font-weight: 600;
    border-radius: 8px;
    text-decoration: none;
    box-shadow: 0 2px 8px rgba(59,130,246,0.4);
    transition: transform 0.18s, box-shadow 0.18s, background 0.18s;
    font-size: 0.9rem;
}
.btn-edit:hover {
    background: linear-gradient(135deg, #2563eb, #1d4ed8);
    box-shadow: 0 4px 16px rgba(59,130,246,0.6);
    transform: translateY(-2px);
}
.btn-delete {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 8px 20px;
    background: linear-gradient(135deg, #ef4444, #dc2626);
    color: #fff;
    font-weight: 600;
    border-radius: 8px;
    border: none;
    cursor: pointer;
    box-shadow: 0 2px 8px rgba(239,68,68,0.4);
    transition: transform 0.18s, box-shadow 0.18s, background 0.18s;
    font-size: 0.9rem;
}
.btn-delete:hover {
    background: linear-gradient(135deg, #dc2626, #b91c1c);
    box-shadow: 0 4px 16px rgba(239,68,68,0.6);
    transform: translateY(-2px);
}
.btn-back {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    color: #3b82f6;
    font-weight: 500;
    text-decoration: none;
    padding: 8px 12px;
    border-radius: 8px;
    transition: background 0.18s, color 0.18s;
    font-size: 0.9rem;
}
.btn-back:hover {
    background: rgba(59,130,246,0.1);
    color: #1d4ed8;
}
.btn-apply {
    display: block;
    margin-top: 1rem;
    text-align: center;
    background: linear-gradient(135deg, #10b981, #059669);
    color: #fff;
    font-weight: 700;
    padding: 14px 24px;
    border-radius: 10px;
    text-decoration: none;
    font-size: 1rem;
    box-shadow: 0 4px 14px rgba(16,185,129,0.4);
    transition: transform 0.18s, box-shadow 0.18s, background 0.2s;
    letter-spacing: 0.3px;
}
.btn-apply:hover {
    background: linear-gradient(135deg, #059669, #047857);
    box-shadow: 0 6px 20px rgba(16,185,129,0.6);
    transform: translateY(-2px);
}
</style>

<section>
    <div class="container mx-auto p-4 mt-4">
        <?php loadPartial('message'); ?>

        <!-- Top Action Bar -->
        <div class="flex justify-between items-center mb-4">
            <a href="/listings" class="btn-back">
                <i class="fa fa-arrow-left"></i> Back To Listings
            </a>

            <?php if(\Framework\Authorization::isOwner($listing->user_id)): ?>
            <div class="flex gap-2 items-center">
                <a href="/listings/edit/<?= $listing->id ?>" class="btn-edit">
                    <i class="fa fa-pencil"></i> Edit
                </a>
                <form method="POST" action="/listings/<?= $listing->id ?>">
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="btn-delete">
                        <i class="fa fa-trash"></i> Delete
                    </button>
                </form>
            </div>
            <?php endif; ?>
        </div>

        <div class="bg-white rounded-lg shadow-md p-6 mb-6">
            <h2 class="text-2xl font-bold mb-2"><?= $listing->title ?></h2>
            <p class="text-lg mt-2 mb-4"><?= $listing->description ?></p>

            <ul class="my-4 bg-gray-100 p-4 rounded">
                <li class="mb-2"><strong>Salary:</strong> <?= formatSalary($listing->salary) ?></li>
                <li class="mb-2">
                    <strong>Location:</strong> <?= $listing->city ?>, <?= $listing->state ?>
                    <span class="text-xs bg-blue-500 text-white rounded-full px-2 py-1 ml-2">Local</span>
                </li>
                <?php if(!empty($listing->tags)): ?>
                <li class="mb-2">
                    <strong>Tags:</strong><?= $listing->tags ?>
                </li>
                <?php endif ?>
            </ul>
        </div>

        <div class="bg-white rounded-lg shadow-md p-6 mb-6">
            <h3 class="text-xl font-bold mb-4">Job Details</h3>

            <h4 class="text-blue-500 font-semibold mb-2">Job Requirements</h4>
            <p class="mb-4"><?= $listing->requirements ?></p>

            <h4 class="text-blue-500 font-semibold mb-2">Benefits</h4>
            <p class="mb-4"><?= $listing->benefits ?></p>
        </div>

        <div class="bg-white rounded-lg shadow-md p-6">
            <p>Put "Job Application" as the subject of your email and attach your resume.</p>
            <a href="mailto:<?= $listing->email ?>" class="btn-apply">
                <i class="fa fa-envelope"></i> Apply Now
            </a>
        </div>
    </div>
</section>

<?php loadPartial('bottom-banner'); ?>
<?php loadPartial('footer'); ?>