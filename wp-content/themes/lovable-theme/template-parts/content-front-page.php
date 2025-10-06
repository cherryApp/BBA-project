<?php
/**
 * Template part for displaying the front page content
 * 
 * This recreates the main content from the Next.js Index.tsx file
 */

// Get theme data or use defaults
$threats_data = array(
    array(
        'icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.996-.833-2.732 0L3.732 19c-.77.833.192 2.5 1.732 2.5z"></path></svg>',
        'title' => 'Adathalászat (Phishing)',
        'description' => 'Hamis e-mailek és weboldalak segítségével próbálják megszerezni személyes adatait.',
        'severity' => 'Magas',
        'tips' => array(
            'Soha ne kattintson gyanús linkekre',
            'Ellenőrizze a feladó címét',
            'Bankja sosem kér jelszót e-mailben'
        )
    ),
    array(
        'icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>',
        'title' => 'Gyenge jelszavak',
        'description' => 'Egyszerű vagy újrahasznált jelszavak könnyen feltörhetők.',
        'severity' => 'Közepes',
        'tips' => array(
            'Használjon erős, egyedi jelszavakat',
            'Alkalmazzon kétfaktoros hitelesítést',
            'Jelszókezelő használata ajánlott'
        )
    ),
    array(
        'icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.111 16.404a5.5 5.5 0 017.778 0M12 20h.01m-7.08-7.071c3.904-3.905 10.236-3.905 14.141 0M1.394 9.393c5.857-5.857 15.355-5.857 21.213 0"></path></svg>',
        'title' => 'Nem biztonságos WiFi',
        'description' => 'Nyilvános WiFi hálózatok veszélyeztethetik adatait.',
        'severity' => 'Közepes',
        'tips' => array(
            'Kerülje a bankolást nyilvános WiFi-n',
            'Használjon VPN-t',
            'Kapcsolja ki az automatikus csatlakozást'
        )
    ),
    array(
        'icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>',
        'title' => 'Kártékony alkalmazások',
        'description' => 'Gyanús appok vírusokat telepíthetnek eszközére.',
        'severity' => 'Magas',
        'tips' => array(
            'Csak hivatalos áruházakból töltse le az appokat',
            'Ellenőrizze az engedélyeket',
            'Tartsa naprakészen az alkalmazásokat'
        )
    )
);

$best_practices_data = array(
    array(
        'icon' => '<svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>',
        'title' => 'Rendszeres biztonsági mentés',
        'description' => 'Készítsen rendszeresen biztonsági másolatot fontos adatairól.'
    ),
    array(
        'icon' => '<svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>',
        'title' => 'Adatvédelmi beállítások',
        'description' => 'Ellenőrizze és állítsa be a közösségi média és online szolgáltatások adatvédelmi beállításait.'
    ),
    array(
        'icon' => '<svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>',
        'title' => 'Szoftver frissítések',
        'description' => 'Tartsa naprakészen operációs rendszerét és alkalmazásait a biztonsági javítások miatt.'
    ),
    array(
        'icon' => '<svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>',
        'title' => 'Digitális tudatosság',
        'description' => 'Legyen óvatos az online megosztásokkal és a személyes információk közzétételével.'
    )
);

$target_groups_data = array(
    array(
        'icon' => '<svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"></path></svg>',
        'title' => 'Általános és középiskolák',
        'description' => 'Oktatási intézmények',
        'color' => 'blue'
    ),
    array(
        'icon' => '<svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>',
        'title' => 'Felnőttek',
        'description' => 'Aktív korú lakosság',
        'color' => 'green'
    ),
    array(
        'icon' => '<svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>',
        'title' => 'Idősek',
        'description' => '65+ korosztály',
        'color' => 'purple'
    ),
    array(
        'icon' => '<svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>',
        'title' => 'Vállalatok, Intézmények',
        'description' => 'Üzleti és közszféra',
        'color' => 'orange'
    )
);
?>

<!-- Target Groups -->
<section class="py-12 px-4 sm:px-6 lg:px-8 bg-gray-50">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-4">
                Célcsoportjaink
            </h2>
            <p class="text-gray-600">
                Programjaink különböző korcsoportok számára nyújtanak segítséget a digitális biztonság területén
            </p>
        </div>
        
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="text-center">
                <div class="w-20 h-20 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-10 h-10 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-gray-900">Általános és középiskolák</h3>
                <p class="text-sm text-gray-600">Oktatási intézmények</p>
            </div>
            
            <div class="text-center">
                <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-10 h-10 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-gray-900">Felnőttek</h3>
                <p class="text-sm text-gray-600">Aktív korú lakosság</p>
            </div>
            
            <div class="text-center">
                <div class="w-20 h-20 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-10 h-10 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-gray-900">Idősek</h3>
                <p class="text-sm text-gray-600">65+ korosztály</p>
            </div>
            
            <div class="text-center">
                <div class="w-20 h-20 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-10 h-10 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-gray-900">Vállalatok, Intézmények</h3>
                <p class="text-sm text-gray-600">Üzleti és közszféra</p>
            </div>
        </div>
    </div>
</section>

<!-- Hero Section -->
<section class="py-16 px-4 sm:px-6 lg:px-8 bg-gradient-blue">
    <div class="max-w-4xl mx-auto text-center">
        <div class="space-y-6">
            <h2 class="text-4xl font-bold text-gray-900 mb-6">
                <?php esc_html_e('Védje meg magát a digitális térben', 'lovable-theme'); ?>
            </h2>
            <p class="text-xl text-gray-700 mb-8 leading-relaxed">
                <?php esc_html_e('Kecskemét lakosainak szóló útmutató a leggyakoribb kiberbiztonsági fenyegetésekről és a biztonságos internethasználatról. Ismerje meg a veszélyeket és védekezzen ellenük!', 'lovable-theme'); ?>
            </p>
            <div class="flex flex-wrap justify-center gap-4 mb-12">
                <span class="badge badge-outline px-4 py-2 text-sm">
                    <svg class="w-4 h-4 mr-2 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                    </svg>
                    <?php esc_html_e('Adatvédelem', 'lovable-theme'); ?>
                </span>
                <span class="badge badge-outline px-4 py-2 text-sm">
                    <svg class="w-4 h-4 mr-2 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                    </svg>
                    <?php esc_html_e('Biztonságos jelszavak', 'lovable-theme'); ?>
                </span>
                <span class="badge badge-outline px-4 py-2 text-sm">
                    <svg class="w-4 h-4 mr-2 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.996-.833-2.732 0L3.732 19c-.77.833.192 2.5 1.732 2.5z"></path>
                    </svg>
                    <?php esc_html_e('Fenyegetések felismerése', 'lovable-theme'); ?>
                </span>
            </div>
        </div>
    </div>
</section>

<!-- Threats Section -->
<section class="py-16 px-4 sm:px-6 lg:px-8 bg-white">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-12">
            <h3 class="text-3xl font-bold text-gray-900 mb-4">
                <?php esc_html_e('Leggyakoribb digitális fenyegetések', 'lovable-theme'); ?>
            </h3>
            <p class="text-gray-600 max-w-2xl mx-auto">
                <?php esc_html_e('Ismerje meg azokat a veszélyeket, amelyekkel napi szinten találkozhat az interneten, és tanulja meg, hogyan védekezhet ellenük.', 'lovable-theme'); ?>
            </p>
        </div>

        <div class="grid md:grid-cols-2 gap-8">
            <?php foreach ($threats_data as $threat): ?>
                <?php lovable_display_threat_card($threat); ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Best Practices Section -->
<section class="py-16 px-4 sm:px-6 lg:px-8 bg-gradient-green-blue">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-12">
            <h3 class="text-3xl font-bold text-gray-900 mb-4">
                <?php esc_html_e('Biztonsági ajánlások', 'lovable-theme'); ?>
            </h3>
            <p class="text-gray-600 max-w-2xl mx-auto">
                <?php esc_html_e('Kövesse ezeket az egyszerű lépéseket a biztonságos digitális környezet kialakításához.', 'lovable-theme'); ?>
            </p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            <?php foreach ($best_practices_data as $practice): ?>
                <?php lovable_display_best_practice_card($practice); ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Emergency Contact Section -->
<section class="py-16 px-4 sm:px-6 lg:px-8 bg-white">
    <div class="max-w-4xl mx-auto">
        <div class="card border-orange-200 bg-orange-50">
            <div class="card-header text-center">
                <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="card-title text-2xl text-orange-900">
                    <?php esc_html_e('Segítségre van szüksége?', 'lovable-theme'); ?>
                </h3>
                <p class="card-description text-orange-700 text-base">
                    <?php esc_html_e('Ha kiberbiztonsági incidensbe keveredett, vagy gyanús tevékenységet észlelt, ne habozzon segítséget kérni.', 'lovable-theme'); ?>
                </p>
            </div>
            <div class="card-content text-center space-y-4">
                <div class="grid md:grid-cols-2 gap-6">
                    <div class="bg-white p-6 rounded-lg border border-orange-200">
                        <h4 class="font-semibold text-gray-900 mb-2">
                            <?php esc_html_e('Rendőrség Kiberbűnözés Elleni Főosztály', 'lovable-theme'); ?>
                        </h4>
                        <p class="text-sm text-gray-600 mb-3">
                            <?php esc_html_e('Kiberbiztonsági incidensek bejelentése', 'lovable-theme'); ?>
                        </p>
                        <a href="#" class="btn btn-outline w-full">
                            <?php esc_html_e('Bejelentés', 'lovable-theme'); ?>
                        </a>
                    </div>
                    <div class="bg-white p-6 rounded-lg border border-orange-200">
                        <h4 class="font-semibold text-gray-900 mb-2">
                            <?php esc_html_e('Kecskemét Informatikai Irodája', 'lovable-theme'); ?>
                        </h4>
                        <p class="text-sm text-gray-600 mb-3">
                            <?php esc_html_e('Helyi támogatás és tanácsadás', 'lovable-theme'); ?>
                        </p>
                        <a href="#" class="btn btn-outline w-full">
                            <?php esc_html_e('Kapcsolat', 'lovable-theme'); ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>