@extends('layouts.admin')

@section('content')
<style>
:root {
  --sky-50: #f0f9ff; --sky-100: #e0f2fe; --sky-400: #38bdf8;
  --sky-500: #0ea5e9; --sky-700: #0369a1; --sky-900: #0c4a6e;
}

.dash { padding: 1.5rem; }

.dash-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.8rem; }
.dash-header h2 { font-size: 1.6rem; font-weight: 800; color: var(--sky-900); }
.dash-header p { color: #0ea5e9; font-size: .82rem; margin-top: 2px; }
.clock-badge { background: var(--sky-500); color: #fff; border-radius: 20px; padding: .35rem 1rem; font-size: .8rem; font-weight: 600; }

.stat-grid { display: grid; grid-template-columns: repeat(5, 1fr); gap: 14px; margin-bottom: 1.5rem; }
.stat-card { background: rgba(255,255,255,.85); border: 1px solid rgba(14,165,233,.2); border-radius: 16px; padding: 1.1rem; position: relative; overflow: hidden; transition: transform .2s, box-shadow .2s; cursor: default; }
.stat-card:hover { transform: translateY(-4px); box-shadow: 0 10px 30px rgba(14,165,233,.18); }
.stat-icon { width: 38px; height: 38px; border-radius: 10px; display: flex; align-items: center; justify-content: center; margin-bottom: .6rem; font-size: 17px; }
.stat-num { font-size: 2.2rem; font-weight: 800; color: var(--sky-900); line-height: 1; font-variant-numeric: tabular-nums; }
.stat-label { font-size: .72rem; color: #64748b; margin-top: .25rem; text-transform: uppercase; letter-spacing: .06em; font-weight: 600; }
.stat-trend { position: absolute; top: .8rem; right: .8rem; font-size: .68rem; font-weight: 700; padding: .15rem .45rem; border-radius: 6px; background: #d1fae5; color: #047857; }

.charts-row { display: grid; grid-template-columns: 1.6fr 1fr; gap: 14px; margin-bottom: 1.4rem; }
.chart-card { background: rgba(255,255,255,.85); border: 1px solid rgba(14,165,233,.15); border-radius: 16px; padding: 1.3rem; }
.chart-card h5 { font-size: .9rem; font-weight: 700; color: var(--sky-900); margin-bottom: .2rem; }
.chart-sub { font-size: .72rem; color: #94a3b8; margin-bottom: 1rem; }

.legend-row { display: flex; flex-wrap: wrap; gap: 10px; margin-bottom: .7rem; }
.leg-item { display: flex; align-items: center; gap: 5px; font-size: .72rem; color: #64748b; }
.leg-sq { width: 9px; height: 9px; border-radius: 2px; display: inline-block; }

.bottom-row { display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 14px; }
.mini-card { background: rgba(255,255,255,.85); border: 1px solid rgba(14,165,233,.15); border-radius: 16px; padding: 1.3rem; }
.mini-card h5 { font-size: .9rem; font-weight: 700; color: var(--sky-900); margin-bottom: .9rem; }

.sky-bar-wrap { margin-bottom: .65rem; }
.sky-bar-label { display: flex; justify-content: space-between; font-size: .75rem; color: #475569; margin-bottom: .3rem; font-weight: 500; }
.sky-bar-track { height: 7px; background: #e0f2fe; border-radius: 4px; overflow: hidden; }
.sky-bar-fill { height: 100%; border-radius: 4px; width: 0; transition: width 1.4s cubic-bezier(.4,0,.2,1); }

.mini-row { display: flex; align-items: center; gap: .75rem; padding: .5rem 0; border-bottom: 1px solid rgba(14,165,233,.1); }
.mini-row:last-child { border-bottom: none; }
.dot { width: 9px; height: 9px; border-radius: 50%; flex-shrink: 0; display: inline-block; }

.activity-item { display: flex; align-items: center; gap: .6rem; padding: .48rem 0; border-bottom: 1px solid rgba(14,165,233,.08); }
.activity-item:last-child { border-bottom: none; }
.act-text { font-size: .78rem; color: #334155; flex: 1; }
.act-time { font-size: .7rem; color: #94a3b8; white-space: nowrap; }

@media (max-width: 1100px) {
  .stat-grid { grid-template-columns: repeat(3, 1fr); }
}
@media (max-width: 768px) {
  .stat-grid { grid-template-columns: repeat(2, 1fr); }
  .charts-row { grid-template-columns: 1fr; }
  .bottom-row { grid-template-columns: 1fr; }
}
</style>

<div class="dash">

    {{-- HEADER --}}
    <div class="dash-header">
        <div>
            <h2>Dashboard</h2>
            <p>Welcome back — here's your overview</p>
        </div>
        <div class="clock-badge" id="clock">--:--</div>
    </div>

    {{-- STAT CARDS --}}
    <div class="stat-grid">
        <div class="stat-card">
            <div class="stat-icon" style="background:#e0f2fe;color:#0284c7">
                <i class="fas fa-folder-open"></i>
            </div>
            <div class="stat-num counter" data-target="{{ $projects }}">0</div>
            <div class="stat-label">Projects</div>
            <span class="stat-trend">Active</span>
        </div>

        <div class="stat-card">
            <div class="stat-icon" style="background:#cffafe;color:#0891b2">
                <i class="fas fa-bolt"></i>
            </div>
            <div class="stat-num counter" data-target="{{ $skills }}">0</div>
            <div class="stat-label">Skills</div>
            <span class="stat-trend">Listed</span>
        </div>

        <div class="stat-card">
            <div class="stat-icon" style="background:#e0e7ff;color:#4f46e5">
                <i class="fas fa-tools"></i>
            </div>
            <div class="stat-num counter" data-target="{{ $services }}">0</div>
            <div class="stat-label">Services</div>
            <span class="stat-trend">Live</span>
        </div>

        <div class="stat-card">
            <div class="stat-icon" style="background:#fef3c7;color:#d97706">
                <i class="fas fa-envelope"></i>
            </div>
            <div class="stat-num counter" data-target="{{ $messages }}">0</div>
            <div class="stat-label">Messages</div>
            <span class="stat-trend">New</span>
        </div>

        <div class="stat-card">
            <div class="stat-icon" style="background:#d1fae5;color:#059669">
                <i class="fas fa-users"></i>
            </div>
            <div class="stat-num counter" data-target="{{ $contacts }}">0</div>
            <div class="stat-label">Contacts</div>
            <span class="stat-trend">Total</span>
        </div>
    </div>

    {{-- CHARTS ROW --}}
    <div class="charts-row">
        <div class="chart-card">
            <h5>Portfolio overview</h5>
            <p class="chart-sub">All content types at a glance</p>
            <div class="legend-row">
                @php
                    $legendColors = [
                        'Projects'     => '#2a78d6',
                        'Skills'       => '#06b6d4',
                        'Services'     => '#6366f1',
                        'Messages'     => '#f59e0b',
                        'Contacts'     => '#0ea5e9',
                        'Blogs'        => '#e34948',
                        'Testimonials' => '#10b981',
                        'Experience'   => '#4a3aa7',
                    ];
                @endphp
                @foreach($legendColors as $lbl => $clr)
                    <span class="leg-item">
                        <span class="leg-sq" style="background:{{ $clr }}"></span>{{ $lbl }}
                    </span>
                @endforeach
            </div>
            <div style="position:relative;height:200px">
                <canvas id="barChart" role="img" aria-label="Bar chart of portfolio content counts">Portfolio content counts.</canvas>
            </div>
        </div>

        <div class="chart-card">
            <h5>Content distribution</h5>
            <p class="chart-sub">Proportion by type</p>
            <div style="position:relative;height:230px">
                <canvas id="donutChart" role="img" aria-label="Donut chart of content type distribution">Content type breakdown.</canvas>
            </div>
        </div>
    </div>

    {{-- BOTTOM ROW --}}
    <div class="bottom-row">

        {{-- Dynamic Skill Bars --}}
        <div class="mini-card">
            <h5>Skill proficiency</h5>
            @php
                $barColors = ['#0ea5e9','#6366f1','#06b6d4','#10b981','#f59e0b','#e34948','#4a3aa7','#2a78d6'];
            @endphp
            @forelse($skillsList as $index => $skill)
                <div class="sky-bar-wrap">
                    <div class="sky-bar-label">
                        <span>{{ $skill->name }}</span>
                        <span>{{ $skill->percentage }}%</span>
                    </div>
                    <div class="sky-bar-track">
                        <div class="sky-bar-fill"
                             data-w="{{ $skill->percentage }}"
                             style="background:{{ $barColors[$index % count($barColors)] }};width:0">
                        </div>
                    </div>
                </div>
            @empty
                <p style="font-size:.82rem;color:#94a3b8">No skills added yet.</p>
            @endforelse
        </div>

        {{-- Dynamic Content Summary --}}
        <div class="mini-card">
            <h5>Content summary</h5>
            @php
                $summary = [
                    'Projects'     => [$projects,    '#2a78d6'],
                    'Skills'       => [$skills,       '#06b6d4'],
                    'Services'     => [$services,     '#6366f1'],
                    'Blogs'        => [$blogs,        '#e34948'],
                    'Testimonials' => [$testimonials, '#10b981'],
                    'Experience'   => [$experiences,  '#4a3aa7'],
                    'Messages'     => [$messages,     '#f59e0b'],
                    'Contacts'     => [$contacts,     '#0ea5e9'],
                ];
            @endphp
            @foreach($summary as $item => [$val, $clr])
                <div class="mini-row">
                    <span class="dot" style="background:{{ $clr }}"></span>
                    <span style="flex:1;font-size:.8rem;color:#475569">{{ $item }}</span>
                    <span style="font-size:.88rem;font-weight:700;color:#0c4a6e">{{ $val }}</span>
                </div>
            @endforeach
        </div>

        {{-- Recent Activity --}}
        <div class="mini-card">
            <h5>Recent activity</h5>
            @php
                $activities = [
                    ['New message received',   '2m ago',  '#0ea5e9'],
                    ['Contact form submitted', '18m ago', '#10b981'],
                    ['Project updated',        '1h ago',  '#6366f1'],
                    ['Blog post published',    '3h ago',  '#f59e0b'],
                    ['Skill added',            '1d ago',  '#06b6d4'],
                    ['Testimonial received',   '2d ago',  '#e34948'],
                ];
            @endphp
            @foreach($activities as [$act, $time, $clr])
                <div class="activity-item">
                    <span class="dot" style="background:{{ $clr }}"></span>
                    <span class="act-text">{{ $act }}</span>
                    <span class="act-time">{{ $time }}</span>
                </div>
            @endforeach
        </div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
<script>
    // Live clock
    function tick() {
        document.getElementById('clock').textContent =
            new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
    }
    tick();
    setInterval(tick, 1000);

    // Animated counters
    document.querySelectorAll('.counter').forEach(el => {
        const target = parseInt(el.dataset.target) || 0;
        let cur = 0;
        const step = Math.max(1, Math.ceil(target / 40));
        const timer = setInterval(() => {
            cur = Math.min(cur + step, target);
            el.textContent = cur;
            if (cur >= target) clearInterval(timer);
        }, 30);
    });

    // Chart data from backend
    const chartLabels = ['Projects','Skills','Services','Messages','Contacts','Blogs','Testimonials','Experience'];
    const chartVals   = [
        {{ $projects }},
        {{ $skills }},
        {{ $services }},
        {{ $messages }},
        {{ $contacts }},
        {{ $blogs }},
        {{ $testimonials }},
        {{ $experiences }}
    ];
    const chartColors = ['#2a78d6','#06b6d4','#6366f1','#f59e0b','#0ea5e9','#e34948','#10b981','#4a3aa7'];

    // Bar chart
    new Chart(document.getElementById('barChart'), {
        type: 'bar',
        data: {
            labels: chartLabels,
            datasets: [{
                data: chartVals,
                backgroundColor: chartColors.map(c => c + 'cc'),
                borderColor: chartColors,
                borderWidth: 1.5,
                borderRadius: 6,
                borderSkipped: false
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { display: false } },
            scales: {
                x: {
                    ticks: { color: '#64748b', font: { size: 10 } },
                    grid: { display: false },
                    border: { display: false }
                },
                y: {
                    ticks: { color: '#64748b', font: { size: 10 }, stepSize: 1 },
                    grid: { color: 'rgba(14,165,233,.1)' },
                    border: { display: false },
                    beginAtZero: true
                }
            }
        }
    });

    // Donut chart
    new Chart(document.getElementById('donutChart'), {
        type: 'doughnut',
        data: {
            labels: chartLabels,
            datasets: [{
                data: chartVals,
                backgroundColor: chartColors.map(c => c + 'cc'),
                borderColor: '#fff',
                borderWidth: 2,
                hoverOffset: 6
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            cutout: '65%',
            plugins: {
                legend: { display: false },
                tooltip: {
                    callbacks: {
                        label: ctx => ` ${ctx.label}: ${ctx.raw}`
                    }
                }
            }
        }
    });

    // Animate skill bars on load
    setTimeout(() => {
        document.querySelectorAll('.sky-bar-fill').forEach(bar => {
            bar.style.width = bar.dataset.w + '%';
        });
    }, 300);
</script>

@endsection